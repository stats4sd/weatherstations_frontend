<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\DataRequest as StoreRequest;
use App\Http\Requests\DataRequest as UpdateRequest;
use App\Models\Data;
use App\Models\Station;
use Backpack\CRUD\CrudPanel;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\CrudPanel\Traits\hasAccessOrFail;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Prologue\Alerts\Facades\Alert;

/**
 * Class DataCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class DataCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation { destroy as traitDestroy; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
   

    public $station_id_value=0;
   

    public function setup()
    {
       
        

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
       
        CRUD::setModel("App\Models\Data");
        CRUD::setRoute(config('backpack.base.route_prefix').'/data');
        CRUD::setEntityNameStrings('data', 'data');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */


        $this->crud->enableExportButtons();
         

        // add asterisk for fields that are required in DataRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
 
         $this->crud->operation('list', function() {
       // your addColumn, addFilter, addButton calls here, for the List operation
             $this->crud->setColumns([
            [
                'name' => 'fecha_hora',
                'label' => 'Fecha hora',
                'type' => 'datetime',
                'format' => 'DD-MM-YYYY H:mm:s',
            ]
        ]);
             $this->crud->setFromDb();
        });

          $this->crud->operation(['create', 'update'], function() {
        
     
        });
        //Filter
        $this->crud->addFilter([
            'name' => 'id_station',
            'type' => 'select2',
            'label' => 'Station',
        ],function(){

            return Station::all()->pluck('stations', 'id')->toArray();


        },function($value){

            $station_id_value = $value;
           
            $this->crud->addClause('where', 'id_station', $value);

        });
        

        $this->crud->addFilter([ // daterange filter
           'type' => 'date_range',
           'name' => 'from_to',
           'label'=> 'Date range'

        ],
        false,
        function($value) { // if the filter is active, apply these constraints
           $dates = json_decode($value);
           $this->crud->addClause('where', 'fecha_hora', '>=', $dates->from);
           $this->crud->addClause('where', 'fecha_hora', '<=', $dates->to . ' 23:59:59');
        });

        
        $this->crud->addButtonFromView('top', 'deleteByFilters', 'deleteByFilters', 'end');

          /**
         * Get the SQL definition of the query being run:
         * This includes all the active filters;
         * Save it to the session to pass to the download function.
         * $query = string - escaped SQL statement;
         * $params = array - parameters to insert into the escaped SQL query.
         */


        if($this->crud->actionIs('list') || $this->crud->actionIs('search') ){
            $query = $this->crud->query->getQuery()->toSql();
            $params = $this->crud->query->getQuery()->getBindings();
            Session(['query' => $query ]);
            Session(['params' => $params ]);

        }


    }
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(StoreRequest::class);
    }

    protected function setupUpdateOperation()
    {
        $this->crud->setValidation(UpdateRequest::class);
    }


    private function setupShowOperation()
    {
        $this->setupListOperation();
    }

    public function deleteByFilters (Request $request) 
    {
    
        $query = Session('query');
        $bindings = Session('params');
      
        $id_station_pos = strpos($query, 'id_station');
        $date_pos = strpos($query, 'fecha_hora');
        if(!empty($id_station_pos) and !empty($date_pos))
        {
            if($id_station_pos < $date_pos)
            {
                $response = Data::where('id_station', $bindings[0])->whereBetween('fecha_hora', [$bindings[1], $bindings[2]])->delete();


            }else if($id_station_pos > $date_pos)
            {
                $response = Data::where('id_station', $bindings[2])->whereBetween('fecha_hora', [$bindings[0], $bindings[1]])->delete();
            }
        }else if (!empty($id_station_pos) and empty($date_pos))
        {
            $response = Data::where('id_station', $bindings[0])->delete();
        } else if (!empty($date_pos) and empty($id_station_pos))
        {
            $response = Data::whereBetween('fecha_hora', [$bindings[0], $bindings[1]])->delete();
        } else 
        {
             \Alert::success('<h4>El archivo ha sido subido exitosamente</h4>')->flash();

        }

        \Alert::success('Success Message', 'Optional Title')->flash();

        return Redirect::back();
        
    }

}
