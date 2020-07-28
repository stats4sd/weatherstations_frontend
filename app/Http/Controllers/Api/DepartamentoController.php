<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Departamento; 

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::select('id', 'name')->get();
       
        return $departamentos->toJson();
    }
}

