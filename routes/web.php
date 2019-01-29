<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home');
})->middleware('verified');

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Auth::routes(['verify' => true]);


Route::resource('files','FileController')->middleware('verified');
Route::resource('stations', 'StationController');
Route::resource('datas','DataController');
Route::get('/export_excel','HomeController@index');
Route::post('/export_excel/excel','HomeController@excel')->name('export_excel.excel');





