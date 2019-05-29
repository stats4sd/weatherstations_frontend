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

// use App\DataTables\DataDataTable;

// Route::get('/', function () {
//     return redirect('home');
// })->middleware('verified');

// Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

// Auth::routes(['verify' => true]);

// Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin')->middleware('verified');
// Route::get('/admin', 'AdminController@index')->name('admin')->middleware('verified');
Route::resource('files','FileController');
Route::resource('stations', 'StationController');
Route::resource('datas','DataController');
Route::get('/export_excel','HomeController@index');
Route::post('/export_excel/excel','HomeController@excel')->name('export_excel.excel');
Route::post('/excelData', 'HomeController@excelData')->name('excelData');


// Route::post('/getGraphic', 'HomeController@getGraphic')->name('getGraphic');


// //Datatables
// Route::get('getDaily', 'HomeController@getDaily')->name('getDaily');
// Route::get('getTenDays', 'HomeController@getTenDays')->name('getTenDays');
// Route::get('getMonthly', 'HomeController@getMonthly')->name('getMonthly');
// Route::get('getYearly', 'HomeController@getYearly')->name('getYearly');
// Route::get('getData', 'AdminController@getData')->name('getData');

// //Datatables Buttons




// // //LavaCharts
Route::get('/charts','ChartsController@charts');
Route::get('/daily','DailyController@index');


//NEW Upload page

Route::get('admin/upload', 'UploadController@index');
Route::get('dataTemplate/convertDataFtoC', 'DataTemplateController@convertDataFtoC');
Route::get('dataTemplate/convertDataInhgOrMmhgToHpa', 'DataTemplateController@convertDataInhgOrMmhgToHpa');
Route::get('dataTemplate/convertDatakmOrMToMs', 'DataTemplateController@convertDatakmOrMToMs');
Route::get('dataTemplate/convertDataInchToMm', 'DataTemplateController@convertDataInchToMm');
Route::get('dataTemplate/storeFile', 'DataTemplateController@storeFile');
Route::get('dataTemplate/cleanTable', 'DataTemplateController@cleanTable');