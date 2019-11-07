<?php

namespace App\Http\Controllers;

use App\Dashboard;
use App\Models\Daily;
use App\Models\Monthly;
use App\Models\TenDays;
use App\Models\Yearly;
use DB;
use Illuminate\Http\Request;
use Khill\Lavacharts\Laravel\LavachartsFacade as Lava;
use Khill\Lavacharts\Lavacharts;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index ()
    {

        $years = Yearly::select('fecha')->get()->unique('fecha');
        return view('dashboard', compact('years'));
    }

    public function charts(Request $request)
    {   
        $id = $request->station_id;
        $aggr = $request->agg;
        $year = $request->year;
        $month = $request->month;
        if($aggr=='daily'){
            $data = Daily::whereYear('fecha','=',$year)->whereMonth('fecha', $month)->where('id_station', $id)->get(); 
        }elseif ($aggr == 'ten_days') {
            $data = TenDays::whereYear('min_fecha','=',$year)->where('id_station', $id)->get(['min_fecha AS fecha', 'tendays_data.*']); 
        }elseif ($aggr == 'monthly') {
            $data = Monthly::where('year','=',$year)->orderBy('month')->where('id_station', $id)->get(); 
        }elseif ($aggr == 'yearly') {
            $data = Yearly::where('id_station', $id)->get(); 
        }

       
        return response()->json([
            'data' => $data
            ]);

    }




    
}
