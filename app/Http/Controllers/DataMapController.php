<?php

namespace App\Http\Controllers;

use App\Models\DataMap;
use Illuminate\Http\Request;

class DataMapController extends Controller
{
    public static function newRecord(DataMap $dataMap, Array $data)
    {
        
       dd($data);

    }
}
