<?php

namespace App\Http\Controllers;

use App\Daily;
use App\Monthly;
use App\Tendays;
use App\Yearly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Khill\Lavacharts\Lavacharts;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function admin()
    {
    	return view('admin');
    }

    public function index()

    {
        $station_data = DB::table('data')->get();
        $stations = DB::table('stations')->get();
        

        return view('admin')->with(compact('station_data','stations'));
    }

    
}
