<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TenDaysRequest as StoreRequest;
use App\Http\Requests\TenDaysRequest as UpdateRequest;
use App\Jobs\ProcessDataExport;
use App\Models\Station;
use Backpack\CRUD\CrudPanel;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

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

        if($this->crud->actionIs('list') || $this->crud->actionIs('search') ){
            $tendays_query = $this->crud->query->getQuery()->toSql();
            $tendays_params = $this->crud->query->getQuery()->getBindings();
            Session(['tendays_query' => $tendays_query ]);
            Session(['tendays_params' => $tendays_params ]);

        }
    }

    public function download(Request $request)
    {
        $scriptName = 'save_data_csv.py';
        $scriptPath = base_path() . '/scripts/' . $scriptName;
        $db_user = config('database.connections.mysql.username');
        $db_password = config('database.connections.mysql.password');
        $db_name = config('database.connections.mysql.database');
        $base_path = base_path();
        $query = Session('tendays_query');
        $params = join(",",Session('tendays_params'));
        $query = '"'.$query.'"';
        $params = '"'.$params.'"';
        $file_name = date('mdY')."tendays.csv";
        
        //python script accepts 7 arguments in this order: db_user db_password db_name base_path() query params
      
        $process = new Process("python {$scriptPath} {$db_user} {$db_password} {$db_name} {$base_path} {$query} {$params} {$file_name}");

        $process->run();
        
        if(!$process->isSuccessful()) {
            
           throw new ProcessFailedException($process);
        
        } 
        Log::info("python done.");
        Log::info($process->getOutput());
    }

   
}
