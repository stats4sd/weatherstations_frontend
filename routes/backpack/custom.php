<?php

use App\Events\GenerateFileCompleted;

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
    Route::post('daily/download', 'DailyCrudController@download');
    Route::post('tenDays/download', 'TenDaysCrudController@download');
    Route::post('monthly/download', 'MonthlyCrudController@download');
    Route::post('yearly/download', 'YearlyCrudController@download');

    
    Route::crud('monthly', 'MonthlyCrudController');
    Route::crud('station', 'StationCrudController');
    Route::crud('yearly', 'YearlyCrudController');
    Route::crud('daily', 'DailyCrudController');
    Route::crud('tenDays', 'TenDaysCrudController');
    Route::crud('upload', 'UploadCrudController');
    Route::crud('dataTemplate', 'DataTemplateCrudController');

    Route::crud('region', 'RegionCrudController');
    Route::crud('departamento', 'DepartamentoCrudController');
    Route::crud('municipio', 'MunicipioCrudController');
    Route::crud('comunidad', 'ComunidadCrudController');
    
    Route::crud('cultivo', 'CultivoCrudController');
    Route::crud('variedad', 'VariedadCrudController');
    Route::crud('fenologia', 'FenologiaCrudController');
    Route::crud('parcela', 'ParcelaCrudController');
    Route::crud('suelo', 'SueloCrudController');
    Route::crud('manejoparcela', 'ManejoParcelaCrudController');
    Route::crud('plaga', 'PlagaCrudController');
    Route::crud('enfermedade', 'EnfermedadeCrudController');
    Route::crud('rendimento', 'RendimentoCrudController');
    Route::crud('submission', 'SubmissionCrudController');

    Route::crud('dailydatapreview', 'DailyDataPreviewCrudController');
    Route::crud('xlsform', 'XlsformCrudController');
    Route::crud('datamap', 'DataMapCrudController');
    Route::post('xlsform/{xlsform}/deploytokobo', 'XlsformCrudController@deployToKobo');
    Route::post('xlsform/{xlsform}/syncdata', 'XlsformCrudController@syncData');
    Route::post('xlsform/{xlsform}/archive', 'XlsformCrudController@archiveOnKobo');

}); // this should be the absolute last line of this file