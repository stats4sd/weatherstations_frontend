<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Monthly_dataRequest as StoreRequest;
use App\Http\Requests\Monthly_dataRequest as UpdateRequest;
use App\Jobs\ProcessDataExport;
use App\Models\Monthly;
use App\Models\Station;
use App\Models\Yearly;
use Backpack\CRUD\CrudPanel;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

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
        $this->crud->addButtonFromView('top', 'download', 'download', 'end');

        $this->crud->operation('list', function(){
            $this->crud->addColumn('year')->makeFirstColumn();
            $this->crud->addColumn('month')->afterColumn('year');
            
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

         $this->crud->addFilter([
            'name' => 'year',
            'type' => 'select2_multiple',
            'label' => 'Years',
        ],function(){

           return Yearly::all()->pluck('fecha', 'fecha')->toArray();

        },function($values){

           foreach(json_decode($values) as $key => $value) {

               $this->crud->addClause('OrWhere', 'year', $value);
            }

        });

        $this->crud->addFilter([
            'name' => 'month',
            'type' => 'select2_multiple',
            'label' => 'Months',
        ],function(){
           
            return [

                '01' => 'Enero',
                '02' => 'Febrero',
                '03' => 'Marzo',
                '04' => 'Abril',
                '05' => 'Mayo',
                '06' => 'Junio',
                '07' => 'Julio',
                '08' => 'Agosto',
                '09' => 'Septiembre',
                '10' => 'Octubre',
                '11' => 'Noviembre',
                '12' => 'Diciembre'
            ];

        },function($values){

           foreach(json_decode($values) as $key => $value) {

               $this->crud->addClause('OrWhere', 'month', $value);
            }

        });

          /**
         * Get the SQL definition of the query being run:
         * This includes all the active filters;
         * Save it to the session to pass to the download function.
         * $query = string - escaped SQL statement;
         * $params = array - parameters to insert into the escaped SQL query.
         */


        if($this->crud->actionIs('list') || $this->crud->actionIs('search') ){
            $monthly_query = $this->crud->query->getQuery()->toSql();
            $monthly_params = $this->crud->query->getQuery()->getBindings();
            Session(['monthly_query' => $monthly_query ]);
            Session(['monthly_params' => $monthly_params ]);

        }

    }

    public function download(Request $request)
    {
        $scriptName = 'save_data_csv.py';
        $scriptPath = base_path() . '/scripts/' . $scriptName;
        $base_path = base_path();
        $query = Session('monthly_query');
        $params = join(",",Session('monthly_params'));
        $query = '"'.$query.'"';
        $params = '"'.$params.'"';
        $file_name = date('mdY')."monthly.csv";
        $query = str_replace('`',' ',$query);

        //python script accepts 4 arguments in this order: base_path(), query, params and file name
        Log::info($query);
      
        $process = new Process("python3.7 {$scriptPath} {$base_path} {$query} {$params} {$file_name}");

        $process->run();
        
        if(!$process->isSuccessful()) {
            
           throw new ProcessFailedException($process);
        
        } else {
            
            $process->getOutput();
        }
        Log::info("python done.");
        Log::info($process->getOutput());

        $path_download =  Storage::url('/data/'.$file_name);
        return response()->json(['path' => $path_download]);
    }

   
}
