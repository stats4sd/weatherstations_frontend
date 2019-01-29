<?php

namespace App\Http\Controllers;

use App\Data;
use App\Exports\DataExport;
use App\Http\Controllers\selectStation;
use App\Station;
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

        return view('home')->with(compact('station_data','stations'));


    }

    public function excel(Request $request){


        $stationSelected = $request->input('stationSelected');

      
        return Excel::download(new DataExport($stationSelected), 'weatherStation.csv');
        


    
    }

 




}


