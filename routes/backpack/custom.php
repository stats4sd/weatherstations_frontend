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
    CRUD::resource('user','UserCrudController');
    CRUD::resource('data', 'DataCrudController');
    CRUD::resource('monthly', 'MonthlyCrudController');
    CRUD::resource('station', 'StationCrudController');
    CRUD::resource('yearly', 'YearlyCrudController');
    CRUD::resource('daily', 'DailyCrudController');
    CRUD::resource('tenDays', 'TenDaysCrudController');
    CRUD::resource('upload', 'UploadCrudController');
    CRUD::resource('dataTemplate', 'DataTemplateCrudController');
}); // this should be the absolute last line of this file