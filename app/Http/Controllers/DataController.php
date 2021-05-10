<?php

namespace App\Http\Controllers;

use DB;
use ZipArchive;
use App\Models\Data;
use App\Models\Daily;
use App\Models\Plaga;
use App\Models\Suelo;
use App\Models\Parcela;
use App\Models\Comunidad;
use App\Models\Fenologia;
use App\Models\Rendimento;
use App\Models\Enfermedade;
use App\Models\DataTemplate;
use Illuminate\Http\Request;
use App\Models\ManejoParcela;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\AssignOp\Concat;
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
        $weather = [];
        $parcelas = [];
        $suelos = [];
        $manejo_parcelas = [];
        $plagas = [];
        $enfermedades = [];
        $rendimentos = [];
        $fenologia = [];
        $senamhi_data = [];
        foreach ($request->modulesSelected as $module) {
            if($module=='daily_data'){
                if($request->aggregationSelected=='daily_data'){
                    $weather = DB::table('daily_data')->where('fecha','>=',$request->startDate)->where('fecha','<=',$request->endDate)->whereIn('id_station', $request->stationsSelected)->paginate(100);

                }else if($request->aggregationSelected=='tendays_data'){
                    $weather = DB::table($request->aggregationSelected)->where('max_fecha','>=',$request->startDate)->where('min_fecha','<=',$request->endDate)->whereIn('id_station', $request->stationsSelected)->paginate(5);

                }else if($request->aggregationSelected=="monthly_data"){
                    $weather = DB::table($request->aggregationSelected)->where('fecha','>=',$request->startDate)->where('fecha','<=',$request->endDate)->whereIn('id_station', $request->stationsSelected)->paginate(5);
                  
                }else if($request->aggregationSelected=="yearly_data"){
                    $weather = DB::table($request->aggregationSelected)->where('fecha','>=',$request->startDate)->where('fecha','<=',$request->endDate)->whereIn('id_station', $request->stationsSelected)->paginate(5);
                
                }else if($request->aggregationSelected=="senamhi_daily"){
                    $senamhi = DB::table('daily_data')->whereYear('fecha',$request->yearSelected)->select(DB::raw('MONTH(fecha) month, DAY(fecha) day'),$request->meteoParameterSelected)->where('id_station', $request->stationsSelected)->orderBy('day', 'asc')->get();
                    
                    foreach ($senamhi as $month) {
                        $month_name = date('F', mktime(0, 0, 0, $month->month, 10));
                        $short_name = strtoupper(substr($month_name, 0, 3));
                        $parameter = array_keys((array)$month)[2];
                        $month->$short_name = $month->$parameter;
                    }
                

                    $senamhi = $senamhi->groupBy('day');
                   
                    $senamhi_data = [];
                    $data = (object)[];
                   
                    foreach ($senamhi as $days) {
                        foreach($days as $day) {
                            
                            $short_month = array_keys((array)$day)[3];
                            $data->day = $day->day;
                            $data->$short_month = $day->$short_month;
                        }
                        
                        $senamhi_data[]=(array)$data;
                         
                    }
               

                } else {
                    $senamhi = DB::table('monthly_data')->where('id_station', $request->stationsSelected)->whereBetween('year',[$request->yearInitialSelected, $request->yearFinalSelected])->whereBetween('month',[$request->monthInitialSelected, $request->monthFinalSelected])->select('year', 'month', $request->meteoParameterSelected)->orderBy('year', 'asc')->get();
                    
                    foreach ($senamhi as $month) {
                        $month_name = date('F', mktime(0, 0, 0, $month->month, 10));
                        $short_name = strtoupper(substr($month_name, 0, 3));
                        $parameter = array_keys((array)$month)[2];
                        $month->$short_name = $month->$parameter;
                    }
                    
                    $senamhi = $senamhi->groupBy('year');
                    $senamhi_data = [];
                    $data = (object)[];
                    foreach ($senamhi as $year) {
                        foreach($year as $month) {
                            
                            $short_month = array_keys((array)$month)[3];
                            $data->year = $month->year;
                            $data->$short_month = $month->$short_month;
                        }
                        $senamhi_data[]=(array)$data;
                    }
                    

             
                } 

            // } if($module=='parcelas') {
            //     $parcelas = Parcela::select()->whereIn('comunidad_id', $request->comunidadsSelected)->paginate(5);
            //     foreach ($request->parcelasModulesSelected as $parcelas_modules){
            //         if($parcelas_modules=='suelos'){
            //             $suelos = Suelo::select()->whereIn('comunidad_id',$request->comunidadsSelected)->paginate(5);

            //         }
            //         if($parcelas_modules=='manejo_parcelas'){
            //             $manejo_parcelas = ManejoParcela::select()->whereIn('comunidad_id',$request->comunidadsSelected)->paginate(5);

            //         }
            //         if($parcelas_modules=='plagas'){
            //             $plagas = Plaga::select()->whereIn('comunidad_id',$request->comunidadsSelected)->paginate(5);

            //         }
            //         if($parcelas_modules=='enfermedades'){
            //             $enfermedades = Enfermedade::select()->whereIn('comunidad_id',$request->comunidadsSelected)->paginate(5);


            //         }
            //         if($parcelas_modules=='rendimentos'){
            //             $rendimentos = Rendimento::select()->whereIn('comunidad_id',$request->comunidadsSelected)->paginate(5);

            //         }

            //     }


            // } if($module=='cultivos') {

            //     foreach ($request->cultivosModulesSelected as $cultivo_modules){
            //         if($cultivo_modules=='fenologia'){
            //             $fenologia = Fenologia::select()->whereIn('comunidad_id',$request->comunidadsSelected)->paginate(5);

            //         }
            //         if($cultivo_modules=='manejo_parcelas'){
            //             $manejo_parcelas = ManejoParcela::select()->whereIn('comunidad_id',$request->comunidadsSelected)->paginate(5);

            //         }
            //         if($cultivo_modules=='plagas'){
            //             $plagas = Plaga::select()->whereIn('comunidad_id',$request->comunidadsSelected)->paginate(5);

            //         }
            //         if($cultivo_modules=='enfermedades'){
            //             $enfermedades = Enfermedade::select()->whereIn('comunidad_id',$request->comunidadsSelected)->paginate(5);

            //         }
            //         if($cultivo_modules=='rendimentos'){
            //             $rendimentos = Rendimento::select()->whereIn('comunidad_id',$request->comunidadsSelected)->paginate(5);
            //         }

            //     }

            }
        }

        return response()->json([
            'weather' => $weather,
            'senamhi' => $senamhi_data,
            'parcelas' => $parcelas,
            'suelos' => $suelos,
            'manejo_parcelas' => $manejo_parcelas,
            'plagas' => $plagas,
            'enfermedades' => $enfermedades,
            'rendimentos' => $rendimentos,
            'fenologia' => $fenologia,
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
        $file_name = date('c')."Agrometric.xlsx";

        $queries = '';
        $sheet_names = '';

        foreach ($request->modulesSelected as $module) {
            if($module=='daily_data'){
                if($request->aggregationSelected=='tendays_data'){
                    $query = "select * from ". $request->aggregationSelected . " where max_fecha >= '".$request->startDate."' and max_fecha <= '".$request->endDate."' and id_station in (". implode(",",$request->stationsSelected).");";
                }else{

                    $query = "select * from ". $request->aggregationSelected . " where fecha >= '".$request->startDate."' and fecha <= '".$request->endDate."' and id_station in (". implode(",",$request->stationsSelected).");";
                }

                $queries = $queries.$query;
                $sheet_names = $sheet_names.'weatherstations, ';


            } if($module=='parcelas') {

                $query = "select * from ". 'parcela' . " where comunidad_id in (". implode(",",$request->comunidadsSelected).");";

                $queries = $queries.$query;
                $sheet_names = $sheet_names.'parcelas, ';
                foreach ($request->parcelasModulesSelected as $parcelas_modules){
                    if($parcelas_modules=='suelos'){

                        $query = "select * from ". 'suelo' . " where comunidad_id in (". implode(",",$request->comunidadsSelected).");";

                        $queries = $queries.$query;
                        $sheet_names = $sheet_names.'suelos, ';

                    }
                    if($parcelas_modules=='manejo_parcelas'){
                        $query = "select * from ". 'manejo_parcela' . " where comunidad_id in (". implode(",",$request->comunidadsSelected).");";

                        $queries = $queries.$query;
                        $sheet_names = $sheet_names.'manejo_parcelas, ';

                    }
                    if($parcelas_modules=='plagas'){
                        $query = "select * from ". $parcelas_modules . " where comunidad_id in (". implode(",",$request->comunidadsSelected).");";

                        $queries = $queries.$query;
                        $sheet_names = $sheet_names.'plagas, ';
                    }
                    if($parcelas_modules=='enfermedades'){
                        $query = "select * from ". $parcelas_modules . " where comunidad_id in (". implode(",",$request->comunidadsSelected).");";

                        $queries = $queries.$query;
                        $sheet_names = $sheet_names.'enfermedades, ';
                    }
                    if($parcelas_modules=='rendimentos'){
                        $query = "select * from ". $parcelas_modules . " where comunidad_id in (". implode(",",$request->comunidadsSelected).");";

                        $queries = $queries.$query;
                        $sheet_names = $sheet_names.'rendimentos, ';

                    }

                }


            } if($module=='cultivos') {

                foreach ($request->cultivosModulesSelected as $cultivo_modules){
                    if($cultivo_modules=='fenologia'){
                        $query = "select * from ". $cultivo_modules . " where comunidad_id in (". implode(",",$request->comunidadsSelected).");";

                        $queries = $queries.$query;
                        $sheet_names = $sheet_names.'fenologia, ';

                    }
                    if($cultivo_modules=='manejo_parcelas'){
                        $query = "select * from ". 'manejo_parcela' . " where comunidad_id in (". implode(",",$request->comunidadsSelected).");";

                        $queries = $queries.$query;
                        $sheet_names = $sheet_names.'manejo_parcelas, ';

                    }
                    if($cultivo_modules=='plagas'){
                        $query = "select * from ". $cultivo_modules . " where comunidad_id in (". implode(",",$request->comunidadsSelected).");";

                        $queries = $queries.$query;
                        $sheet_names = $sheet_names.'plagas, ';

                    }
                    if($cultivo_modules=='enfermedades'){
                        $query = "select * from ". $cultivo_modules . " where comunidad_id in (". implode(",",$request->comunidadsSelected).");";

                        $queries = $queries.$query;
                        $sheet_names = $sheet_names.'plagas, ';

                    }
                    if($cultivo_modules=='rendimentos'){
                        $query = "select * from ". $cultivo_modules . " where comunidad_id in (". implode(",",$request->comunidadsSelected).");";

                        $queries = $queries.$query;
                        $sheet_names = $sheet_names.'rendimentos, ';
                    }

                }
            }
        }

        $queries = rtrim($queries, ";");
        $sheet_names = rtrim($sheet_names, ", ");
        $queries = '"'.$queries.'"';
        $sheet_names = '"'.$sheet_names.'"';

        // python script accepts 4 arguments in this order: base_path(), queries in string, file name and sheet names in string

        $process = new Process(["pipenv", "run", "python3", $scriptPath, $base_path, $queries, $file_name, $sheet_names]);

        $process->run();

        if(!$process->isSuccessful()) {

           throw new ProcessFailedException($process);

        } else {

            $process->getOutput();
        }
        // $file_name = "Agrometric.xlsx";
        // $public_dir=public_path();
        // $zipFileName = 'WeatherStation.zip';
        // $zip = new ZipArchive;
        // if ($zip->open($public_dir . '/data/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
        //     // Add File in ZipArchive
        //     $invoice_file = '/data/'.$file_name;
        //     $zip->addFile($public_dir . '/'.$invoice_file,$invoice_file);
        //     $zip->close();
        // }
        // // Set Header
        // $headers = array(
        //     'Content-Type' => 'application/octet-stream',
        // );
    


        $path_download =  Storage::url('/data/'.$file_name);
        return response()->json(['path' => $path_download]);
    }

}
