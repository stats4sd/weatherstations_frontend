<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StationRequest as StoreRequest;
use App\Http\Requests\StationRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

/**
 * Class StationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class StationCrudController extends CrudController
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
        $this->crud->setModel('App\Models\Station');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/station');
        $this->crud->setEntityNameStrings('station', 'stations');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();
        $this->crud->setColumns([
            [
                'name' => 'id',
                'label' => 'Id',
                'type' => 'number',
            ],
            [
                'name' => 'hardware_id',
                'label' => 'Hardware id',
                'type' => 'text',
            ],
            [
                'name' => 'label',
                'label' => 'Label',
                'type' => 'text',
            ],
            [
                'name' => 'type',
                'label' => 'Station Type',
                'type' => 'text',
            ],
            [
                'name' => 'latitude',
                'label' => 'latitude',
                'type' => 'text',
            ],
            [
                'name' => 'longitude',
                'label' => 'longitude',
                'type' => 'text',
            ],
            [
                'name' => 'altitude',
                'label' => 'altitude',
                'type' => 'text',
            ],
        ]);

        $this->crud->addFields([
            [
                'name' => 'hardware_id',
                'label' => 'Hardware id',
                'type' => 'text',
            ],
            [
                'name' => 'label',
                'label' => 'Label',
                'type' => 'text',
            ],
            [
                'name' => 'type',
                'label' => 'Station Type',
                'type' => 'select2_from_array',
                'options' => ['davis' => 'Davis', 'chinas' => 'Chinas'],
                'allows_null' => false,
                'default' => 'davis',
            ],
            [
                'name' => 'latitude',
                'label' => 'latitude',
                'type' => 'text',
            ],
            [
                'name' => 'longitude',
                'label' => 'longitude',
                'type' => 'text',
            ],
        ]);
        // add asterisk for fields that are required in StationRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(StoreRequest::class);
    }

    protected function setupUpdateOperation()
    {
        $this->crud->setValidation(UpdateRequest::class);
    }


}
