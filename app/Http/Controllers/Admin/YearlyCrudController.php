<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\YearlyRequest as StoreRequest;
use App\Http\Requests\YearlyRequest as UpdateRequest;
use App\Models\Station;
use Backpack\CRUD\CrudPanel;
use Backpack\CRUD\app\Http\Controllers\CrudController;

/**
 * Class YearlyCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class YearlyCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Yearly');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/yearly');
        $this->crud->setEntityNameStrings('yearly', 'yearlies');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->addColumn('fecha')->makeFirstColumn();
        $this->crud->setFromDb();

        // add asterisk for fields that are required in YearlyRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        $this->crud->removeAllButtons();
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
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
