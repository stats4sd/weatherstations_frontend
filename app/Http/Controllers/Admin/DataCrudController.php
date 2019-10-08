<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DataRequest as StoreRequest;
use App\Http\Requests\DataRequest as UpdateRequest;
use App\Models\Station;
use Backpack\CRUD\CrudPanel;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\CrudPanel\Traits\hasAccessOrFail;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

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

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->enableExportButtons();
        $this->crud->addColumn('fecha_hora')->makeFirstColumn();
        $this->crud->setFromDb();

        // add asterisk for fields that are required in DataRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
 

        //Filter
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
          $this->crud->addClause('where', 'fecha_hora', $value);
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
    }
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(StoreRequest::class);
    }

    protected function setupUpdateOperation()
    {
        $this->crud->setValidation(UpdateRequest::class);
    }
    public function destroy($id)
    {
        dd($id);
        $this->crud->hasAccessOrFail('delete');

        return $this->crud->delete($id);
    }


   

    
}
