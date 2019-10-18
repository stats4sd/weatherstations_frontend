<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Monthly_dataRequest as StoreRequest;
use App\Http\Requests\Monthly_dataRequest as UpdateRequest;
use App\Models\Station;
use App\Models\Monthly;
use App\Models\Yearly;
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

        

    }

   
}
