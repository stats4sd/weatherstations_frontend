<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Region;
use App\Models\DataMap;
use App\Models\Xlsform;
use App\Models\Comunidad;
use App\Models\Municipio;
use App\Models\Submission;
use Illuminate\Support\Str;
use App\Models\Departamento;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Controllers\DataMapController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GetDataFromKobo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $form;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Xlsform $form)
    {
        $this->form = $form;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $response = Http::withBasicAuth(config('services.kobo.username'), config('services.kobo.password'))
        ->withHeaders(['Accept' => 'application/json'])
        ->get(config('services.kobo.endpoint_v2').'/assets/'.$this->form->kobo_id.'/data/')
        ->throw()
        ->json();

        \Log::info($response);

        $data = $response['results'];

        //compare
        $submissions = Submission::where('xlsform_id', '=', $this->form->id)->get();

        foreach ($data as $newSubmission) {
            if (!in_array($newSubmission['_id'], $submissions->pluck('id')->toArray())) {
                Submission::create([
                    'id' => $newSubmission['_id'],
                    'uuid' => $newSubmission['_uuid'],
                    'xlsform_id' => $this->form->id,
                    'content' => json_encode($newSubmission),
                    'fecha_hora' => $newSubmission['_submission_time'],
                ]);

                //merge all the modules
                $newSubmission['modulos'] = $newSubmission['modulos'] . ' ' . $newSubmission['modulo_loop'][0]['modulo_loop/extra_modulo'];
                $newSubmission['modulos'] = explode(' ', $newSubmission['modulos']);


                $newSubmission = $this->deleteGroupName($newSubmission);

                //There are only ever 2 iterations of the modulo_loop, so flatten it.
                $newSubmission['modulo_loop'] = $newSubmission['modulo_loop'][0] + $newSubmission['modulo_loop'][1];

                //Update or create the record for all the locations
                if ($newSubmission['region'] == 999) {
                    $region = Region::updateOrCreate([
                        'name' => $newSubmission['otra_region']
                    ]);

                    //update the region id value
                    $newSubmission['region'] = $region->id;
                }

                if ($newSubmission['departamento'] == 999) {
                    $departamento = Departamento::updateOrCreate([
                        'region_id' => $newSubmission['region'],
                        'name' => $newSubmission['otro_departamento']
                    ]);

                    //update the departamento id value
                    $newSubmission['departamento'] = $departamento->id;
                }

                if ($newSubmission['municipio'] == 999) {
                    $municipio = Municipio::updateOrCreate([
                        'departamento_id' => $newSubmission['departamento'],
                        'name' => $newSubmission['otro_municipio']
                    ]);

                    //update the municipio id value
                    $newSubmission['municipio'] = $municipio->id;
                }

                if ($newSubmission['comunidad'] == 999) {
                    $location = explode(" ", $newSubmission['gps']);
                    $comunidad = Comunidad::updateOrCreate(
                        [
                            'municipio_id' => $newSubmission['municipio'],
                            'name' => $newSubmission['otra_comunidad']
                        ],
                        [
                            'latitude' => isset($location[0]) ? $location[0] : null,
                            'longitude' => isset($location[1]) ? $location[1] : null,
                            'altitude' => isset($location[2]) ? $location[2] : null
                        ]
                    );
                    $newSubmission['comunidad'] = $comunidad->id;
                }

                // Create new parcela record if needed
                if ($newSubmission['registrar_parcela'] == 1) {
                    $dataMap = DataMap::findorfail('parcela');

                    DataMapController::newRecord($dataMap, $newSubmission);
                } else {
                    $dataMap = DataMap::findorfail('parcela');
                    DataMapController::updateRecord($dataMap, $newSubmission, $newSubmission['parcela_id']);
                }

                // Iterate through the other parcela-level modules.
                foreach ($newSubmission['modulos'] as $parcelaModule) {
                    if ($parcelaModule === 'C') {
                        $this->processCultivoData($newSubmission);
                    } else {
                        $dataMap = DataMap::findOrFail($parcelaModule);
                        $data = $newSubmission['modulo_loop'];
                        $data['parcela_id'] = $newSubmission['parcela_id'];
                        $data['_id'] = $newSubmission['_id'];

                        DataMapController::newRecord($dataMap, $data);
                    }
                } // end foreach plot-level module
            } // end if $submission does not exist
        } // end foreach record
    } // end handle method

    public function processCultivoData($newSubmission)
    {
        foreach ($newSubmission['modulo_loop']['cultivo_loop'] as $cultivo) {
            $dataMap = DataMap::findorfail('C');

            $cultivo['modulo_cultivo_loop'] = $cultivo['modulo_cultivo_loop'][0] + $cultivo['modulo_cultivo_loop'][1];
            $cultivo['parcela_id'] =  $newSubmission['parcela_id'];
            $cultivo['_id'] =  $newSubmission['_id'];

            // get the cultivo_id from the creation of the cultivo
            $new_cultivo = DataMapController::newRecord($dataMap, $cultivo);
            $cultivo['cultivo_id'] =  $new_cultivo->id;

            $cultivo_modules = $cultivo['modulos_cultivo'] . ' '. $cultivo['modulo_cultivo_loop']['extra_modulo_cultivo'];
            $cultivo_modules = explode(' ', $cultivo_modules);
            $cultivo = $cultivo + $cultivo['modulo_cultivo_loop'];
            unset($cultivo['modulo_cultivo_loop']);

            foreach ($cultivo_modules as $cultivo_module) {
                if ($cultivo_module == 3) {
                    if ($cultivo['problema'] == 'plagas' || $cultivo['problema'] == 'ambas') {
                        foreach ($cultivo['plaga_repeat'] as $plaga) {
                            $dataMap_cultivo_module = DataMap::findorfail('plagas');
                            $plaga['_id'] =  $newSubmission['_id'];
                            $plaga['cultivo_id'] =  $new_cultivo->id;
                            DataMapController::newRecord($dataMap_cultivo_module, $plaga);
                        }
                    }
                    if ($cultivo['problema'] == 'enfermedades' || $cultivo['enfermedades'] == 'ambas') {
                        $dataMap_cultivo_module = DataMap::findorfail('enfermedades');
                        DataMapController::newRecord($dataMap_cultivo_module, $cultivo);
                    }
                } else {
                    $dataMap_cultivo_module = DataMap::findorfail($cultivo_module);
                    DataMapController::newRecord($dataMap_cultivo_module, $cultivo);
                }
            }
        }
    }



    public function deleteGroupName(array $array)
    {
        foreach ($array as $key => $value) {
            if (Str::contains($key, '/')) {
                // e.g. replace $newSubmission['groupname/subgroup/name'] with $newSubmission['name']
                unset($array[$key]);
                $key = explode('/', $key);
                $key = end($key);
                $array[$key] = $value;
            }
            if (is_array($value)) {
                $array[$key] = $this->deleteGroupName($value);
            }
        }
        return $array;
    }
}
