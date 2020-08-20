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
        $response = Http::withBasicAuth(config('services.kobo.username'), config('services.kobo.password'))
        ->withHeaders(['Accept' => 'application/json'])
        ->get(config('services.kobo.endpoint_v2').'/assets/'.$this->form->kobo_id.'/data/')
        ->throw()
        ->json();

        \Log::info($response);

        $data = $response['results'];

        //compare
        $submissions = Submission::where('xlsform_id', '=', $this->form->id)->get();

        foreach($data as $newSubmission) {
            if(!in_array($newSubmission['_id'], $submissions->pluck('id')->toArray())) {
                Submission::create([
                    'id' => $newSubmission['_id'],
                    'uuid' => $newSubmission['_uuid'],
                    'xlsform_id' => $this->form->id,
                    'content' => json_encode($newSubmission),
                    'fecha_hora' => $newSubmission['_submission_time'],
                ]);
               
                $modules = explode(' ', $newSubmission['modulos']);

                foreach ($modules as $module) {

                    $dataMap = DataMap::findorfail($module);
                    
                    // go through submission variables and remove any group names
                  
                    foreach($newSubmission as $key => $value) {

                        // Keep this as it forms part of the media download url
                        if($key == 'formhub/uuid') continue;

                        //creating new parcela
                        if($newSubmission['informacion_basica/registrar_parcela']){
                            $key = explode('/', $key);
                            $key = end($key);
                            array_keys($newSubmission, 'nueva_parcela');
                            $newParcela = array_keys($newSubmission, 'nueva_parcela');
                            dd($newParcela);

                        

                        }
                        if(Str::contains($key,'/')){
                            // e.g. replace $newSubmission['groupname/subgroup/name'] with $newSubmission['name']
                            unset($newSubmission[$key]);
                            $key = explode('/', $key);
                            $key = end($key);

                            $newSubmission[$key] = $value;
                        }
                    }

                }
                 \Log::info("Mapping data to correct model / tables...");
                DataMapController::newRecord($dataMap, $newSubmission);
  
            }
        }

    }
}
