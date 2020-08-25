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
                    foreach($newSubmission as $key => $value) {
                        if(Str::contains($key,'/')){    
                        // e.g. replace $newSubmission['groupname/subgroup/name'] with $newSubmission['name']
                            unset($newSubmission[$key]);
                            $key = explode('/', $key);
                            $key = end($key);
                            $newSubmission[$key] = $value;
                        }
                    }
                    
                    // go through submission variables and remove any group names
                  
                    foreach($newSubmission as $key => $value) {

                        // Keep this as it forms part of the media download url
                        if($key == 'formhub/uuid') continue;

                        // Create the data for the Suelo Module
                        if ($module == 'A'){
                            $dataMap = DataMap::findorfail($module);

                           
                            $suelo = [
                                'parcela_id' => $newSubmission['parcela_id'],
                                'pH' => $newSubmission['modulo_loop'][0]['modulo_loop/suelo/pH'],
                                'textura' => $newSubmission['modulo_loop'][0]['modulo_loop/suelo/textura'],
                                'materia_organica' => $newSubmission['modulo_loop'][0]['modulo_loop/suelo/materia_organica'],
                                'comunidad' => $newSubmission['comunidad']
                            ];
                          
                            DataMapController::newRecord($dataMap, $suelo);
                           
                        }
                        // Create the data for the Cultivo Module
                        if ($module == 'B'){
                            $dataMap = DataMap::findorfail($module);
                            //change 1 with a variable 
                            $cultivo_loop = $newSubmission['modulo_loop'][1]['modulo_loop/cultivo_formulario/cultivo_loop'];
                            foreach ($cultivo_loop as $cultivo_loop_key => $value) {
                                  
                                $cultivo_element = $cultivo_loop[$cultivo_loop_key];
                                foreach ($cultivo_element as $cultivo_element_key => $value) {
                                    if(Str::contains($cultivo_element_key,'/')){    
                                    // e.g. replace $newSubmission['groupname/subgroup/name'] with $newSubmission['name']
                                        unset($cultivo_element[$cultivo_element_key]);
                                        $cultivo_element_key = explode('/', $cultivo_element_key);
                                        $cultivo_element_key = end($cultivo_element_key);
                                        $cultivo_element[$cultivo_element_key] = $value;
                                    }
                                }


                                $cultivo_loop[$cultivo_loop_key] = $cultivo_element;
                            
                            }

                               
                                unset($newSubmission['modulo_loop'][1]['modulo_loop/cultivo_formulario/cultivo_loop']);
                                $newSubmission['modulo_loop'][1]['cultivo_loop'] = $cultivo_loop;

                                //modulo_cultivo_loop
                                $modulo_cultivo_loop =  $newSubmission['modulo_loop'][1]['cultivo_loop'];
                                foreach ($modulo_cultivo_loop as $modulo_cultivo_loop_key => $value) {
                                    foreach ($modulo_cultivo_loop[$modulo_cultivo_loop_key] as $array_key => $value) {
                                        if($array_key == 'modulo_cultivo_loop'){
                                            foreach ($modulo_cultivo_loop[$modulo_cultivo_loop_key][$array_key] as $module_key => $value) {
                                          
                                                foreach ($modulo_cultivo_loop[$modulo_cultivo_loop_key][$array_key][$module_key] as $key => $value) {
                                             
                                                    unset($modulo_cultivo_loop[$modulo_cultivo_loop_key][$array_key][$module_key][$key]);
                                                    $key = explode('/', $key);
                                                    $key = end($key);
                                                    $modulo_cultivo_loop[$modulo_cultivo_loop_key][$array_key][$module_key][$key] = $value;
                                                    if($key == 'begin_repeat_OgRUOpAOf'){
                                                        foreach ($modulo_cultivo_loop[$modulo_cultivo_loop_key][$array_key][$module_key][$key] as $repeat_key => $value) {
                                                            foreach ($modulo_cultivo_loop[$modulo_cultivo_loop_key][$array_key][$module_key][$key][$repeat_key] as $repeat_array_key => $value) {
                                                                unset($modulo_cultivo_loop[$modulo_cultivo_loop_key][$array_key][$module_key][$key][$repeat_key][$repeat_array_key]);
                                                                $new_key = explode('/', $repeat_array_key);
                                                                $new_key = end($new_key);
                                                                $modulo_cultivo_loop[$modulo_cultivo_loop_key][$array_key][$module_key][$key][$repeat_key][$new_key] = $value;
                                                        
                                                            }
                                                        }
                                                                
                                                    }

                                                }
                
                                            }
                                            
                                        }

                                    
                                    }

                                            
                                }
                                unset($newSubmission['modulo_loop'][1]['cultivo_loop']);
                                $newSubmission['modulo_loop'][1]['cultivo_loop'] = $modulo_cultivo_loop;

                                dd($newSubmission);

                            
                            DataMapController::newRecord($dataMap, $cultivo_info);
                           
                            
                        }


                    }
                    

                }
                
            }
        }

    }
}
