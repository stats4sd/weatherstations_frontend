<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DailyRequest as StoreRequest;
use App\Http\Requests\DailyRequest as UpdateRequest;
use App\Jobs\ProcessDataExport;
use App\Models\Station;
use Backpack\CRUD\CrudPanel;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

/**
 * Class DailyCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class DailyCrudController extends CrudController
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
        CRUD::setModel('App\Models\Daily');
        CRUD::setRoute(config('backpack.base.route_prefix') . '/daily');
        CRUD::setEntityNameStrings('daily', 'daily');
    
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->operation('list', function(){
            $this->crud->orderBy('fecha');
            $this->crud->addColumn('fecha')->makeFirstColumn();
            $this->crud->setFromDb();
        });
        

        $this->crud->addButtonFromView('top', 'download', 'download', 'end');
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
          $this->crud->addClause('where', 'fecha', $value);
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

        if($this->crud->actionIs('list') || $this->crud->actionIs('search') ){
            $daily_query = $this->crud->query->getQuery()->toSql();
            $daily_params = $this->crud->query->getQuery()->getBindings();
            Session(['daily_query' => $daily_query ]);
            Session(['daily_params' => $daily_params ]);

        }
    }

    public function download(Request $request)
    {
        $scriptName = 'save_data_csv.py';
        $scriptPath = base_path() . '/scripts/' . $scriptName;
        $base_path = base_path();
        $query = Session('daily_query');
        $params = join(",",Session('daily_params'));
        $query = '"'.$query.'"';
        $params = '"'.$params.'"';
        $file_name = date('mdY')."daily.csv";
        
        //python script accepts 7 arguments in this order: db_user db_password db_name base_path() query params
      
        $process = new Process("python3.7 {$scriptPath} {$base_path} {$query} {$params} {$file_name}");

        $process->run();
        
        if(!$process->isSuccessful()) {
            
           throw new ProcessFailedException($process);
        
        } 
        Log::info("python done.");
        Log::info($process->getOutput());
    }

    
}
