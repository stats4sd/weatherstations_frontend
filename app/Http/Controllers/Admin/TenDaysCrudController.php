<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TenDaysRequest as StoreRequest;
use App\Http\Requests\TenDaysRequest as UpdateRequest;
use App\Models\Station;
use Backpack\CRUD\CrudPanel;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TenDaysCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TenDaysCrudController extends CrudController
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
        CRUD::setModel('App\Models\TenDays');
        CRUD::setRoute(config('backpack.base.route_prefix') . '/tenDays');
        CRUD::setEntityNameStrings('tendays', 'tendays');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->operation('list', function() {

            $this->crud->removeColumn('group_by');
            $this->crud->addColumn('max_fecha')->makeFirstColumn();
            $this->crud->addColumn('min_fecha')->afterColumn('max_fecha');
            $this->crud->setFromDb();

        });
        
        // add asterisk for fields that are required in TenDaysRequest
    
       
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
          $this->crud->addClause('where', 'max_fecha', $value);
        });

        $this->crud->addFilter([ // daterange filter
           'type' => 'date_range',
           'name' => 'from_to',
           'label'=> 'Date range'
        ],
        false,
        function($value) { // if the filter is active, apply these constraints
           $dates = json_decode($value);
           $this->crud->addClause('where', 'max_fecha', '>=', $dates->from);
           $this->crud->addClause('where', 'max_fecha', '<=', $dates->to . ' 23:59:59');
        });
    }

   
}
