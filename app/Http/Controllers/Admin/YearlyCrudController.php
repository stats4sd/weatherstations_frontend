<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\YearlyRequest as StoreRequest;
use App\Http\Requests\YearlyRequest as UpdateRequest;
use App\Jobs\ProcessDataExport;
use App\Models\Station;
use App\Models\Yearly;
use Backpack\CRUD\CrudPanel;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Request;

/**
 * Class YearlyCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class YearlyCrudController extends CrudController
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
        CRUD::setModel('App\Models\Yearly');
        CRUD::setRoute(config('backpack.base.route_prefix') . '/yearly');
        CRUD::setEntityNameStrings('yearly', 'yearly');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->operation('list', function(){
            $this->crud->addColumn('fecha')->makeFirstColumn();
            $this->crud->setFromDb();
        });

        // add asterisk for fields that are required in YearlyRequest
       
        $this->crud->enableExportButtons();
        $this->crud->addButtonFromView('top', 'download', 'download', 'end');

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

        $this->crud->addFilter([
            'name' => 'fecha',
            'type' => 'select2_multiple',
            'label' => 'Year',
        ],function(){
           
            return Yearly::all()->pluck('fecha', 'id')->toArray();

        },function($values){

           foreach(json_decode($values) as $key => $value) {

               $this->crud->addClause('orWhere', 'id', $value);
            }

        });

        if($this->crud->actionIs('list') || $this->crud->actionIs('search') ){
            $yearly_query = $this->crud->query->getQuery()->toSql();
            $yearly_params = $this->crud->query->getQuery()->getBindings();
            Session(['yearly_query' => $yearly_query ]);
            Session(['yearly_params' => $yearly_params ]);

        }

    }

    public function download(Request $request)
    {
        $query = Session('yearly_query');
        $params = Session('yearly_params');
      
        ProcessDataExport::dispatch($query , $params);
            
        return Storage::url("data/data.csv");
    }

  
}
