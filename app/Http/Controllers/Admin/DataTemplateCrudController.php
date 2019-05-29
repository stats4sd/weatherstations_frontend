<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Models\Station;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\DataTemplateRequest as StoreRequest;
use App\Http\Requests\DataTemplateRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class DataTemplateCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class DataTemplateCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\DataTemplate');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/dataTemplate');
        $this->crud->setEntityNameStrings('datatemplate', 'data template');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->addColumn('fecha_hora')->makeFirstColumn();
        $this->crud->addColumn('temperatura_externa')->afterColumn('fecha_hora');
        $this->crud->addColumn('temperatura_interna')->afterColumn('temperatura_externa');
        
        
        $this->crud->addColumn('presion_relativa')->afterColumn('temperatura_interna');
        $this->crud->addColumn('presion_absoluta') ->afterColumn('presion_relativa');
        $this->crud->setFromDb();

        // add asterisk for fields that are required in DataTemplateRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        $this->crud->enableExportButtons();
        $this->crud->removeAllButtons();
        $this->crud->addButtonFromView('top','checkvalueButton', 'checkvalueButton', 'end');
        $this->crud->addButtonFromView('top','convertDataInhgOrMmhgToHpaButton', 'convertDataInhgOrMmhgToHpaButton', 'end');
        $this->crud->addButtonFromView('top', 'cleanTableButton', 'cleanTableButton', 'end' );


        $this->crud->addButtonFromView('top','storeFileButton', 'storeFileButton', 'end');

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
