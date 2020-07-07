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
    return redirect('/home');
});

Auth::routes();

Route::resource('home','DataController')->middleware('auth');
Route::post('download','DataController@download');

Route::get('weatherstations', function () {
    return view('weatherstations');
});
Route::post('files','FileController@store');
Route::resource('stations', 'StationController');

Route::post('show', 'DataController@show');
Route::post('all_data','DataController@allData');
Route::post('convertDataFtoC', 'DataTemplateController@convertDataFtoC');
Route::post('convertDataInhgOrMmhgToHpa', 'DataTemplateController@convertDataInhgOrMmhgToHpa');
Route::post('convertDatakmOrMToMs', 'DataTemplateController@convertDatakmOrMToMs');
Route::post('convertDataInchToMm', 'DataTemplateController@convertDataInchToMm');
Route::post('storeFile', 'DataTemplateController@storeFile');
Route::post('cleanTable', 'DataTemplateController@cleanTable');


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
