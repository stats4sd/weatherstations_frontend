<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user','UserCrudController');
    Route::crud('data', 'DataCrudController');
    Route::crud('monthly', 'MonthlyCrudController');
    Route::crud('station', 'StationCrudController');
    Route::crud('yearly', 'YearlyCrudController');
    Route::crud('daily', 'DailyCrudController');
    Route::crud('tenDays', 'TenDaysCrudController');
    Route::crud('upload', 'UploadCrudController');
    Route::crud('dataTemplate', 'DataTemplateCrudController');
    Route::crud('meteobridge', 'MeteobridgeCrudController');




}); // this should be the absolute last line of this file