<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Station;

class UploadController extends Controller
{
    public function index()
    {
    	$stations = Station::all();
    	return view('admin')->with(compact('stations', $stations));
    }


}
