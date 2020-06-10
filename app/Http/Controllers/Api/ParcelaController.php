<?php


namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Parcela; 
use App\Http\Controllers\Controller;

class ParcelaController extends Controller
{
    public function index()
    {
        $parcelas = Parcela::all();
        return $parcelas->toJson(); 
    }
}


