<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index ()

    {
        $station_data = DB::table('data')->get();
        $stations = DB::table('stations')->get();
       


        $lava= new Lavacharts;
        if(!empty($station_data)){
            $data=Daily::select("fecha as 0","max_temperatura_interna as 1", "avg_temperatura_interna as 2","min_temperatura_interna as 3")->get()->toArray();
            $datatable = $lava->DataTable();

            $datatable -> addDateColumn('Date')
                        -> addNumberColumn('Max Temp Int')
                        -> addNumberColumn('Mean Temp Int')
                        -> addNumberColumn('Min Temp Int')
                        -> addRows($data);

            $lava->LineChart('Temperature', $datatable,[
                    'title' => 'DailyTemperatures'                 
            ]);
        }
        

        return view('dashboard')->with(compact('lava'));
    }
}
