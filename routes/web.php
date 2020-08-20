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
})->middleware('auth');
Route::post('files','FileController@store');
Route::resource('stations', 'StationController');

Route::post('show', 'DataController@show');
Route::post('all_data','DataController@allData');

Route::post('storeFile/{uploader_id}', 'FileController@storeFile');
Route::post('cleanTable/{uploader_id}', 'FileController@cleanTable');

//NEW Upload page

Route::get('admin/upload', 'UploadController@index');
Route::get('data/{id}/delete', 'DataCrudController@destroy');

Route::post('files.store','FileController@store');
//Dashboard
Route::get('admin/dashboard', 'DashboardController@index');
Route::post('admin/dashboard/charts', 'DashboardController@charts');

Route::get('xlsforms/{xlsform}/downloadsubmissions', 'SubmissionController@download')->name('xlsforms.downloadsubmissions');
