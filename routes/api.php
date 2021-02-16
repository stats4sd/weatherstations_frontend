<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('comunidads', 'Api\\ComunidadController');
Route::apiResource('stations', 'Api\\StationController');
Route::apiResource('parcelas', 'Api\\ParcelaController');
Route::apiResource('departamentos', 'Api\\DepartamentoController');
Route::apiResource('municipios', 'Api\\MunicipioController');
Route::apiResource('years', 'Api\\YearController');