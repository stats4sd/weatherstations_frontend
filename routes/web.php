<?php

use App\Events\GenerateFileCompleted;


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



Route::get('', function () {
    return redirect('/admin');
});

// Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::resource('files','FileController');
Route::resource('stations', 'StationController');
Route::resource('datas','DataController');
Route::get('/export_excel','HomeController@index');
Route::post('/export_excel/excel','HomeController@excel')->name('export_excel.excel');
Route::post('/excelData', 'HomeController@excelData')->name('excelData');




//NEW Upload page

Route::get('admin/upload', 'UploadController@index');
Route::get('dataTemplate/convertDataFtoC', 'DataTemplateController@convertDataFtoC');
Route::get('dataTemplate/convertDataInhgOrMmhgToHpa', 'DataTemplateController@convertDataInhgOrMmhgToHpa');
Route::get('dataTemplate/convertDatakmOrMToMs', 'DataTemplateController@convertDatakmOrMToMs');
Route::get('dataTemplate/convertDataInchToMm', 'DataTemplateController@convertDataInchToMm');
Route::get('dataTemplate/storeFile', 'DataTemplateController@storeFile');
Route::get('dataTemplate/cleanTable', 'DataTemplateController@cleanTable');

Route::get('data/{id}/delete', 'DataCrudController@destroy');



//Dashboard
Route::get('admin/dashboard', 'DashboardController@index');
Route::post('admin/dashboard/charts', 'DashboardController@charts');




