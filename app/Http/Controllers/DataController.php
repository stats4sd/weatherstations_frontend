<?php

namespace App\Http\Controllers;

use App\Models\Data;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data_preview');
    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   
        $weather = null;
        $pachagrama = null;

        foreach ($request->modulesSelected as $module) {
            if($module=='daily_data'){
                $weather = DB::table($module)->where('fecha','>=',$request->startDate)->where('fecha','<=',$request->endDate)->whereIn('id_station', $request->stationsSelected)->paginate(5);
         
            } if($module=='pachagrama') {
                $pachagrama = DB::table($module)->where('fecha_siembra','>=',$request->startDate)->where('fecha_siembra','<=',$request->endDate)->whereIn('comunidad_id', $request->comunidadsSelected)->paginate(5);    
            }
                
        }


        return response()->json([
            'weather' => $weather, 
            'pachagrama' => $pachagrama
        ]);
       


     
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

    public function download()
    {
        $scriptName = 'generate_xlsx_from_query.py';
        $scriptPath = base_path() . '/scripts/' . $scriptName;
        $base_path = base_path();
        $query = "select * from pachagrama;select * from stations;";
        
        $query = '"'.$query.'"';
        
        $file_name = date('c')."data.xlsx";
        $query = str_replace('`',' ',$query);

        //python script accepts 4 arguments in this order: base_path(), query, params and file name
      
      
        $process = new Process("python3.7 {$scriptPath} {$base_path} {$query} {$file_name}");

        $process->run();
        
        if(!$process->isSuccessful()) {
            
           throw new ProcessFailedException($process);
        
        } else {
            
            $process->getOutput();
        }
       

        $path_download =  Storage::url('/data/'.$file_name);
        return response()->json(['path' => $path_download]);
    }

}
