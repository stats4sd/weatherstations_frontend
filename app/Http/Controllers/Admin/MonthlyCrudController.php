<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Monthly_dataRequest as StoreRequest;
use App\Http\Requests\Monthly_dataRequest as UpdateRequest;
use App\Models\Station;
use Backpack\CRUD\CrudPanel;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class Monthly_dataCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class MonthlyCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        CRUD::setModel('App\Models\Monthly');
        CRUD::setRoute(config('backpack.base.route_prefix') . '/monthly');
        CRUD::setEntityNameStrings('monthly', 'monthly');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->operation('list', function(){
            $this->crud->addColumn('fecha')->makeFirstColumn();
            $this->crud->setColumns([
                [
                    'name' => 'fecha',
                    'label' => 'Fecha',
                    'type' => 'datetime',
                    'format' => 'YYYY-MM',
                ]
            ]);
            $this->crud->setFromDb();
        });

        $this->crud->enableExportButtons();

        // Filter
        $this->crud->addFilter([
            'name' => 'id_station',
            'type' => 'select2',
            'label' => 'Station',
        ],function(){
           
            return Station::all()->pluck('stations', 'id')->toArray();;

        },function($value){
            $this->crud->addClause('where', 'id_station', $value);

        });

        $this->crud->addFilter([ // date filter
          'type' => 'date',
          'name' => 'date',
          'label'=> 'Date'
        ],
        false,
        function($value) { // if the filter is active, apply these constraints
            $year_month = substr($value, 0, 7);
            $this->crud->addClause('where', 'fecha', $year_month);
        });

        $this->crud->addFilter([ // daterange filter
           'type' => 'date_range',
           'name' => 'from_to',
           'label'=> 'Date range'
        ],
        false,
        function($value) { // if the filter is active, apply these constraints
           $dates = json_decode($value);
           $this->crud->addClause('where', 'fecha', '>=', $dates->from);
           $this->crud->addClause('where', 'fecha', '<=', $dates->to . ' 23:59:59');
        });

    }

   
}
