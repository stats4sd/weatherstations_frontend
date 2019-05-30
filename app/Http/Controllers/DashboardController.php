<?php

namespace App\Http\Controllers;

use App\Daily;
use App\Dashboard;
use DB;
use Illuminate\Http\Request;
//use Khill\Lavacharts\Dashboard;
use Khill\Lavacharts\Lavacharts;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index ()

    {
        $station_data = DB::table('data')->get();
        $stations = DB::table('stations')->get();
       


        $lava_temp_in= new Lavacharts;
        if(!empty($station_data)){
            $data=Daily::select("fecha as 0","max_temperatura_interna as 1", "avg_temperatura_interna as 2","min_temperatura_interna as 3")->get()->toArray();
            $datatable = $lava_temp_in->DataTable();

            $datatable -> addDateColumn('Date')
                        -> addNumberColumn('Max Temp Int')
                        -> addNumberColumn('Mean Temp Int')
                        -> addNumberColumn('Min Temp Int')
                        -> addRows($data);

            $lava_temp_in->LineChart('TemperatureIn', $datatable,[
                    'title' => 'DailyTemperatures Interna'                 
            ]);
        }

         $lava_temp_out= new Lavacharts;
        if(!empty($station_data)){
            $data=Daily::select("fecha as 0","max_temperatura_externa as 1", "min_temperatura_externa as 2","avg_temperatura_externa as 3")->get()->toArray();
            $datatable = $lava_temp_out->DataTable();

            $datatable -> addDateColumn('Date')
                        -> addNumberColumn('Max Temp Out')
                        -> addNumberColumn('Mean Temp Out')
                        -> addNumberColumn('Min Temp Out')
                        -> addRows($data);

            $lava_temp_out->LineChart('TemperatureOut', $datatable,[
                    'title' => 'DailyTemperatures Externa'                 
            ]);
        }


        return view('dashboard')->with(compact('lava_temp_in', 'lava_temp_out', $lava_temp_in, $lava_temp_out));
    }


    
}
