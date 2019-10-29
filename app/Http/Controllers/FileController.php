<?php
namespace App\Http\Controllers;

use Alert;
use App\File;
use DB;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use \GuzzleHttp\Client;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Retrieve file from POST request
        //sends units type to DataTemplate
        Session::put('temp_unit', $_POST['temp_unit']);
        Session::put('pression_unit', $_POST['pression_unit']);
        Session::put('veloc_viento_unit', $_POST['veloc_viento_unit']);
        Session::put('precip_unit', $_POST['precip_unit']);

        $station = $_POST['weatherstation'];
        
            if($request->hasFile('data-file')){
            
                // handle file and store it for prosperity
                $file = $request->file('data-file');
             
                $name = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('rawfiles',$name);

                $newFile = new File;
                $newFile->path = $path;
                $newFile->name = $name;
                $newFile->station_id = $station;
                #$newFile->save();
      

                $scriptName = 'uploadDatapreview.py';
                $scriptPath = base_path() . '/scripts/' . $scriptName;
                $path_name = Storage::path("/").$path;
            
            
            
        
        //python script accepts 3 arguments in this order: scriptPath, path_name, station_id

        $process = new Process("python3.7 {$scriptPath} {$path_name} {$station}");

        $process->run();
        
        if(!$process->isSuccessful()) {
            
           throw new ProcessFailedException($process);
           \Alert::success('<h4>'.$process->getMessage().'</h4>')->flash();
        
        } 
        Log::info("python done.");
        Log::info($process->getOutput());


                 
                \Alert::success('<h4>El archivo ha sido subido exitosamente</h4>')->flash();
                return Redirect::to('admin/dataTemplate');

            }
            \Alert::error("<h4>El archivo no fue seleccionado</h4>")->flash();

            return Redirect::back();

        // Send file onto cloud function
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
