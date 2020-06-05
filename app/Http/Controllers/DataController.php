<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Daily;
use App\Models\Pachagrama;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Storage;
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
                
                $weather = Daily::select()->where('fecha','>=',$request->startDate)->where('fecha','<=',$request->endDate)->whereIn('id_station', $request->stationsSelected)->paginate(5);
                
            
              
            } if($module=='pachagrama') {
                $pachagrama = Pachagrama::select()->where('fecha_siembra','>=',$request->startDate)->where('fecha_siembra','<=',$request->endDate)->whereIn('comunidad_id', $request->comunidadsSelected)->paginate(5);
                
            }                
        }
        
        return response()->json([
            'weather' => $weather, 
            'pachagrama' => $pachagrama,
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

    public function download(Request $request)
    {
        $scriptPath = base_path() . '/scripts/generate_xlsx_from_query.py';
        $base_path = base_path();    
        $file_name = date('c')."data.xlsx";

        $queries = '';
        $sheet_names = '';

        foreach ($request->modulesSelected as $module) {
            if($module=='daily_data'){
          
                $query = "select * from ". $module . " where fecha >= '".$request->startDate."' and fecha <= '".$request->endDate."' and id_station in (". implode(",",$request->stationsSelected).");";

                $queries = $queries.$query;
                $sheet_names = $sheet_names.'weatherstations, ';
               
            } if($module=='pachagrama') {
               
                $query = "select * from ". $module . " where fecha_siembra >= '".$request->startDate."' and fecha_siembra <='".$request->endDate."' and comunidad_id in (". implode(",",$request->comunidadsSelected).");";

                $queries = $queries.$query;
                $sheet_names = $sheet_names.'pachagrama, ';

            }                
        }

        $queries = rtrim($queries, ";");
        $sheet_names = rtrim($sheet_names, ", ");
        $queries = '"'.$queries.'"';
        $sheet_names = '"'.$sheet_names.'"';
   
        //python script accepts 4 arguments in this order: base_path(), queries in string, file name and sheet names in string
      
        $process = new Process("python3.7 {$scriptPath} {$base_path} {$queries} {$file_name} {$sheet_names}");

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
