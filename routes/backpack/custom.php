<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::get('', function () {
    return redirect('/admin');
});

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user','UserCrudController');
    Route::crud('data', 'DataCrudController');

    Route::post('data/deleteByFilters', 'DataCrudController@deleteByFilters');
    Route::post('data/download', 'DataCrudController@download');
    
    Route::crud('monthly', 'MonthlyCrudController');
    Route::crud('station', 'StationCrudController');
    Route::crud('yearly', 'YearlyCrudController');
    Route::crud('daily', 'DailyCrudController');
    Route::crud('tenDays', 'TenDaysCrudController');
    Route::crud('upload', 'UploadCrudController');
    Route::crud('dataTemplate', 'DataTemplateCrudController');
    Route::crud('meteobridge', 'MeteobridgeCrudController');

}); // this should be the absolute last line of this file


// Dashboard

Route::get('admin/dashboard', 'DashboardController@index');
Route::get('admin/dashboard/{id}', 'DashboardController@charts');



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





