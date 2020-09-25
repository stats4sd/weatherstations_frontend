<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DataMapRequest;
use App\Http\Requests\DataMapStoreRequest;
use App\Http\Requests\DataMapUpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DataMapCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DataMapCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\DataMap');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/datamap');
        $this->crud->setEntityNameStrings('datamap', 'data_maps');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->addColumns([
            [
                'name' => 'id',
                'label' => 'value',
            ],
            [
                'name' => 'title',
                'label' => 'label'
            ],
            [
                'name' => 'variables',
                'label' => 'Number of variables',
                'type' => 'closure',
                'function' => function ($entity) {
                    if (isset($entity->variables) && is_countable($entity->variables)) {
                        return count($entity->variables);
                    }
                    return '';
                }
            ]
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(DataMapStoreRequest::class);

        $this->crud->addFields([
            [
                'name' => 'intro',
                'type' => 'custom_html',
                'value' => '<h4>Data Mapping - Form Module to SQL Table</h4>
                            <ul>
                            <li>The data map here tells the platform how to store the data coming from ODK.
                            <li>Each module of the ODK form must have a data map, which corresponds to a single MySQL table.</li>
                            <li>All variables to be stored in the table should be listed below.</li>
                            </ul>',
            ],
            [
                'name' => 'id',
                'type' => 'text',
                'label' => 'Give the ID of the datamap. This should be the same as the name of the module in the modules choice list for the "modulos" or "modulos_cultivo" questions in the ODK form',
            ],
            [
                'name' => 'title',
                'type' => 'text',
               'label' => 'Give the title / label for the data map',
            ],
            [
                'name' => 'model',
                'type' => 'select2_from_array',
                'label' => 'What SQL Table will this module populate?',
                'options' => [
                    'Parcela' => 'parcela',
                    'Suelo' => 'suelo',
                    'Cultivo' => 'cultivo',
                    'Fenologia' => 'fenologia',
                    'ManejoParcela' => 'manejo_parcela',
                    'Pachagrama' => 'pachagrama',
                    'Plaga' => 'plagas',
                    'Enfermedade' => 'enfermedades',
                    'Rendimento' => 'rendimento',
                ],
            ],
            [
                'name' => 'location',
                'type' => 'boolean',
                'hint' => 'The ODK variable name should be `location`',
                'label' => 'Does this data map include a `location` field? (Note, this will probably be NO for every module except Parcela...)',
            ],
            [
                'name' => 'variables',
                'type' => 'repeatable',
                'label' => 'Add the other variables the data map should look for in the ODK Form',
                'fields' => [
                    [
                        'name' => 'name',
                        'label' => 'ODK Variable Name',
                        'hint' => 'This should be taken from the "name" column of the XLSForm',
                        'type' => 'text',
                        'wrapper' => ['class' => 'form-group col-md-4'],
                    ],
                    [
                        'name' => 'column_name',
                        'label' => 'MySQL Column Name',
                        'type' => 'text',
                        'wrapper' => ['class' => 'form-group col-md-4'],
                    ],
                    [
                        'name' => 'type',
                        'label' => 'Select the variable type',
                        'type' => 'select2_from_array',
                        'wrapper' => ['class' => 'form-group col-md-4'],
                        'options' => [
                            'boolean' => 'Boolean (select_one with yes/no or 1/0 options)',
                            'text' => 'text / select_one',
                            'integer' => 'integer',
                            'decimal' => 'decimal',
                            'select_multiple' => 'select_multiple',
                            'date' => 'date',
                            'timestamp' => 'datetime',
                            'gps' => 'geopoint',
                            'photo' => 'photo',
                        ],
                    ],
                    [
                        'name' => 'in_db',
                        'label' => 'Check only if the variable is confirmed to be in the database.',
                        'hint' => 'If this is checked and the variable is not found in MySQL, it will break the importer! So if in doubt, do not tick!',
                        'type' => 'checkbox',
                        'value' => 0,
                    ],
                ],
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
        $this->crud->modifyField('id', [
            'attributes' => [
                'readonly' => true,
            ],
        ]);
        $this->crud->setValidation(DataMapUpdateRequest::class);
    }
    protected function setupShowOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'id',
                'label' => 'value',
            ],
            [
                'name' => 'title',
                'label' => 'label'
            ],
            [
                'name' => 'model',
                'type' => 'text',
                'label' => 'What SQL Table will this module populate?',
            ],
            [
                'name' => 'location',
                'type' => 'boolean',
                'label' => 'Does this data map include a `location` field?',
            ],
            [
                'name' => 'variables',
                'label' => 'Variables',
                'type' => 'table',
                'columns' => [
                    'name' => 'ODK Variable Name',
                    'column_name' => 'MySQL Column Name',
                    'type' => 'Type',
                    'in_db' => 'Is the variable present in the database?',
                ],
            ]
        ]);
    }
}
