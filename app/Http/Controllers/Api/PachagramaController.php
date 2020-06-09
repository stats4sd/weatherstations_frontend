<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Pachagrama; 
use App\Http\Controllers\Controller;

class PachagramaController extends Controller
{
    public function index()
    {
        $pachagrama = Pachagrama::paginate(5);

        return $pachagrama->toJson(); 
    }
}
