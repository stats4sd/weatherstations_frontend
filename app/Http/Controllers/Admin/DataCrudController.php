<?php

namespace App\Http\Controllers\Admin;


use App\Exports\DataExport;
use App\Http\Requests\DataRequest as StoreRequest;
use App\Http\Requests\DataRequest as UpdateRequest;
use App\Jobs\ProcessDataExport;
use App\Models\Data;
use App\Models\Station;
use Backpack\CRUD\CrudPanel;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\CrudPanel\Traits\hasAccessOrFail;
use Backpack\CRUD\app\Library\CrudPanel\Traits\setDefaultPageLength;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Exception;
use Maatwebsite\Excel\Facades\Excel;
use Prologue\Alerts\Facades\Alert;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

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
                'format' => 'MM-DD-YYYY H:mm:s',
            ]
        ]);
             $this->crud->setFromDb();
        });

          $this->crud->operation(['create', 'update'], function() {

            $this->crud->setFromDb();
     
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
        $this->crud->addButtonFromView('top', 'download', 'download', 'end');
        $this->crud->setDefaultPageLength(50);

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
            \Alert::success('<h4>El archivo ha sido subido exitosamente</h4>')->flash();

        }else if (!empty($id_station_pos) and empty($date_pos))
        {
            $response = Data::where('id_station', $bindings[0])->delete();
            \Alert::success('<h4>El archivo ha sido subido exitosamente</h4>')->flash();
        } else if (!empty($date_pos) and empty($id_station_pos))
        {
            $response = Data::whereBetween('fecha_hora', [$bindings[0], $bindings[1]])->delete();
            \Alert::success('<h4>El archivo ha sido subido exitosamente</h4>')->flash();
        } else 
        {
             \Alert::error('<h4>Para eliminar por filtro uno de los filtros debe estar activo</h4>')->flash();

        }

        
    }


    public function download()
    {
        $scriptName = 'save_data_csv.py';
        $scriptPath = base_path() . '/scripts/' . $scriptName;
        $db_user = config('database.connections.mysql.username');
        $db_password = config('database.connections.mysql.password');
        $db_name = config('database.connections.mysql.database');
        $base_path = base_path();
        $query = Session('query');
        $params = join(",",Session('params'));
        $query = '"'.$query.'"';
        $params = '"'.$params.'"';
        $file_name = date('mdY')."data.csv";

        
        //python script accepts 7 arguments in this order: db_user db_password db_name base_path() query params
      
        $process = new Process("python3.7 {$scriptPath} {$db_user} {$db_password} {$db_name} {$base_path} {$query} {$params} {$file_name}");

        $process->run();
        
        if(!$process->isSuccessful()) {
            
           throw new ProcessFailedException($process);
        
        } else {
            
            dd($process->getMessage());
        }
        Log::info("python done.");
        Log::info($process->getOutput());
        #return response($file_name);
       
    }

}
