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
use App\DataTables\DataDataTable;

Route::get('/', function () {
    return redirect('home');
})->middleware('verified');

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Auth::routes(['verify' => true]);

Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin')->middleware('verified');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('verified');
Route::resource('files','FileController')->middleware('verified');
Route::resource('stations', 'StationController');
Route::resource('datas','DataController');
Route::get('/export_excel','HomeController@index');
Route::post('/export_excel/excel','HomeController@excel')->name('export_excel.excel');
Route::post('/excelData', 'HomeController@excelData')->name('excelData');

Route::post('/filterData','HomeController@filterData')->name('filterData');
Route::post('/graphicsData', 'HomeController@graphicsData')->name('graphicsData');


//Datatables
Route::get('getDaily', 'HomeController@getDaily')->name('getDaily');
//Route::get('getDaily', 'AdminController@getDaily')->name('getDaily');

//Datatables Buttons
 //Route::resource('data', 'HomeController@index');
 //Route::post('home/export', 'HomeController@index');


//LavaCharts
//Route::get('/charts','ChartsController@charts');
Route::get('/daily','DailyController@index');






