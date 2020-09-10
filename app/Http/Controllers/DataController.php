<?php

namespace App\Http\Controllers;

use App\Models\Daily;
use App\Models\Data;
use App\Models\DataTemplate;
use App\Models\Fenologia;
use App\Models\ManejoParcela;
use App\Models\Pachagrama;
use App\Models\Parcela;
use App\Models\PlagasYEnfermedades;
use App\Models\Rendimento;
use App\Models\Suelo;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

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
        $pachagrama = [];
        $parcelas = [];
        $suelos = [];
        $manejo_parcelas = [];
        $plagas_y_enfermedades = [];
        $rendimentos = [];
        $fenologia = [];

        foreach ($request->modulesSelected as $module) {
            if($module=='daily_data'){
                   
                if($request->aggregationSelected=='tendays_data'){
                    $weather = DB::table($request->aggregationSelected)->select()->where('max_fecha','>=',$request->startDate)->where('max_fecha','<=',$request->endDate)->whereIn('id_station', $request->stationsSelected)->paginate(5);

                }else{
                    $weather = DB::table($request->aggregationSelected)->select()->where('fecha','>=',$request->startDate)->where('fecha','<=',$request->endDate)->whereIn('id_station', $request->stationsSelected)->paginate(5);
               } 

            } if($module=='pachagrama') {
                $pachagrama = Pachagrama::select()->where('fecha_siembra','>=',$request->comunidadsSelected)->paginate(5);

            } if($module=='parcelas') {
                $parcelas = Parcela::select()->whereIn('comunidad_id', $request->comunidadsSelected)->paginate(5);
                foreach ($request->parcelasModulesSelected as $parcelas_modules){
                    if($parcelas_modules=='suelos'){
                        $suelos = Suelo::select()->whereIn('comunidad_id',$request->comunidadsSelected)->paginate(5);

                    }
                    if($parcelas_modules=='manejo_parcelas'){
                        $manejo_parcelas = ManejoParcela::select()->whereIn('comunidad_id',$request->comunidadsSelected)->paginate(5);

                    }
                    if($parcelas_modules=='plagas_y_enfermedades'){
                        $plagas_y_enfermedades = PlagasYEnfermedades::select()->whereIn('comunidad_id',$request->comunidadsSelected)->paginate(5);
                    }
                    if($parcelas_modules=='rendimentos'){
                        $rendimentos = Rendimento::select()->whereIn('comunidad_id',$request->comunidadsSelected)->paginate(5);

                    }

                }


            } if($module=='cultivos') {

                foreach ($request->cultivosModulesSelected as $cultivo_modules){
                    if($cultivo_modules=='fenologia'){
                        $fenologia = Fenologia::select()->whereIn('comunidad_id',$request->comunidadsSelected)->paginate(5);

                    }
                    if($cultivo_modules=='manejo_parcelas'){
                        $manejo_parcelas = ManejoParcela::select()->whereIn('comunidad_id',$request->comunidadsSelected)->paginate(5);

                    }
                    if($cultivo_modules=='plagas_y_enfermedades'){
                        $plagas_y_enfermedades = PlagasYEnfermedades::select()->whereIn('comunidad_id',$request->comunidadsSelected)->paginate(5);

                    }
                    if($cultivo_modules=='rendimentos'){
                        $rendimentos = Rendimento::select()->whereIn('comunidad_id',$request->comunidadsSelected)->paginate(5);
                    }

                }

            }
        }

        return response()->json([
            'weather' => $weather,
            'pachagrama' => $pachagrama,
            'parcelas' => $parcelas,
            'suelos' => $suelos,
            'manejo_parcelas' => $manejo_parcelas,
            'plagas_y_enfermedades' => $plagas_y_enfermedades,
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
        $file_name = date('c')."data.xlsx";

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

            } if($module=='pachagrama') {

                $query = "select * from ". $module . " where fecha_siembra >= '".$request->startDate."' and fecha_siembra <='".$request->endDate."' and comunidad_id in (". implode(",",$request->comunidadsSelected).");";

                $queries = $queries.$query;
                $sheet_names = $sheet_names.'pachagrama, ';

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
                    if($parcelas_modules=='plagas_y_enfermedades'){
                        $query = "select * from ". $parcelas_modules . " where comunidad_id in (". implode(",",$request->comunidadsSelected).");";

                        $queries = $queries.$query;
                        $sheet_names = $sheet_names.'plagas_y_enfermedades, ';
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
                    if($cultivo_modules=='plagas_y_enfermedades'){
                        $query = "select * from ". $cultivo_modules . " where comunidad_id in (". implode(",",$request->comunidadsSelected).");";

                        $queries = $queries.$query;
                        $sheet_names = $sheet_names.'plagas_y_enfermedades, ';

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

        //python script accepts 4 arguments in this order: base_path(), queries in string, file name and sheet names in string

        $process = new Process(["pipenv", "run", "python3", $scriptPath, $base_path, $queries, $file_name, $sheet_names]);

        $process->run();

        if(!$process->isSuccessful()) {

           throw new ProcessFailedException($process);

        } else {

            $process->getOutput();
        }

        $path_download =  Storage::url('/data/'.$file_name);
        return response()->json(['path' => $path_download]);
    }

    public function allData()
    {

        $all_data = DataTemplate::paginate(100);

        return $all_data->toJson();

    }

}
