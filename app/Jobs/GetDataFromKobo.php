<?php

namespace App\Jobs;

use App\Http\Controllers\DataMapController;
use App\Models\DataMap;
use App\Models\Submission;
use App\Models\User;
use App\Models\Xlsform;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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
        // $response = Http::withBasicAuth(config('services.kobo.username'), config('services.kobo.password'))
        // ->withHeaders(['Accept' => 'application/json'])
        // ->get(config('services.kobo.endpoint_v2').'/assets/'.$this->form->kobo_id.'/data/')
        // ->throw()
        // ->json();

        // \Log::info($response);

        // $data = $response['results'];
        $data = Submission::select('content')->where('id', '=', '64012805' )->get(); 
        $data = $data[0]['content'];
       
        $newSubmission = json_decode($data, true);

        //compare
        $submissions = Submission::where('xlsform_id', '=', $this->form->id)->get();

        // foreach($data as $newSubmission) {
               
            // if(!in_array($newSubmission['_id'], $submissions->pluck('id')->toArray())) {

                // Submission::create([
                //     'id' => $newSubmission['_id'],
                //     'uuid' => $newSubmission['_uuid'],
                //     'xlsform_id' => $this->form->id,
                //     'content' => json_encode($newSubmission),
                //     'fecha_hora' => $newSubmission['_submission_time'],
                // ]);

                //merge all the modules
                $newSubmission['modulos'] = $newSubmission['modulos'] . ' ' . $newSubmission['modulo_loop'][0]['modulo_loop/extra_modulo'];
                

                $newSubmission = $this->deleteGroupName( $newSubmission);
                    

                $modulo_loop = $newSubmission['modulo_loop'];

                $newSubmission['modulo_loop'] = $newSubmission['modulo_loop'][0] + $newSubmission['modulo_loop'][1];

                    
                if($newSubmission['registrar_parcela'] == 1){
                    $dataMap = DataMap::findorfail('parcela');

                    DataMapController::newRecord($dataMap, $newSubmission);
                } else {
                    $dataMap = DataMap::findorfail('parcela');
                    DataMapController::updateRecord($dataMap, $newSubmission, $newSubmission['parcela_id']);
                }

                if(Str::contains( $newSubmission['modulos'], 'A')){
                    $dataMap = DataMap::findorfail('A');
                    $suelo = $newSubmission['modulo_loop'];
                    $suelo['parcela_id'] =  $newSubmission['parcela_id'];
                    $suelo['_id'] =  $newSubmission['_id'];
                    
                    DataMapController::newRecord($dataMap, $suelo);
                }

                if(Str::contains( $newSubmission['modulos'], 'C')){
                    $dataMap = DataMap::findorfail('C');

                    foreach ($newSubmission['modulo_loop']['cultivo_loop'] as $cultivo) {
                    
                        $cultivo['modulo_cultivo_loop'] = $cultivo['modulo_cultivo_loop'][0] + $cultivo['modulo_cultivo_loop'][1]; 
                        $cultivo['parcela_id'] =  $newSubmission['parcela_id'];
                        $cultivo['_id'] =  $newSubmission['_id'];
                        // get the cultivo_id from the creation of thge cultivo
                        $new_cultivo = DataMapController::newRecord($dataMap, $cultivo);
                        $cultivo['cultivo_id'] =  $new_cultivo->id;

                        $cultivo_modules = $cultivo['modulos_cultivo'] . ' '. $cultivo['modulo_cultivo_loop']['extra_modulo_cultivo'];
                        $cultivo_modules = explode(' ', $cultivo_modules);


                        foreach ($cultivo_modules as $cultivo_module) {
                            $dataMap = DataMap::findorfail($cultivo_module);
          
                            $new_module = DataMapController::newRecord($dataMap, $cultivo);
                    

                            
                        }
                    }

                }

    }

    public function deleteGroupName(Array $array)
    {
        foreach($array as $key => $value) {
            if(Str::contains($key,'/')){    
            // e.g. replace $newSubmission['groupname/subgroup/name'] with $newSubmission['name']
                unset($array[$key]);
                $key = explode('/', $key);
                $key = end($key);
                $array[$key] = $value;
            }
            if(is_array($value)){
                $array[$key] = $this->deleteGroupName($value);
            }
        }
        return $array;
    }
}
