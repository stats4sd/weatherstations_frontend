<?php

namespace App\Http\Controllers;

use App\Daily;
use App\Data;
use App\Exports\DailyExport;
use App\Exports\DataExport;
use App\Exports\MonthlyExport;
use App\Exports\TendaysExport;
use App\Exports\YearlyExport;
use App\Http\Controllers\selectStation;
use App\Monthly;
use App\Station;
use App\Tendays;
use App\Yearly;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $station_data = DB::table('data')->get();
        $stations = DB::table('stations')->get();
        $daily = Daily::all();
        $monthly = Monthly::all();
        $tendays = Tendays::all();
        $yearly = Yearly::all();

        return view('home')->with(compact('station_data','stations','daily','monthly','yearly','tendays'));


    }

    public function excel(Request $request){
    
        $stationSelected = $request->input('stationSelected');
        $periodSelected = $request->input('periodSelected');
        //dd($periodSelected);
        if($periodSelected =='1'){    
            return Excel::download(new DailyExport($stationSelected), 'DailyData.csv');

        }else if($periodSelected == '2'){
            return Excel::download(new TendaysExport($stationSelected), 'TendaysData.csv');

        }else if($periodSelected == '3'){
            return Excel::download(new MonthlyExport($stationSelected), 'MontlyData.csv');

        }else if($periodSelected == '4'){
            return Excel::download(new YearlyExport($stationSelected), 'YearlyData.csv');
        }
    
    }
}


