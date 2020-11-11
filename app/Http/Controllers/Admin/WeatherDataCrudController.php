<?php

namespace App\Http\Controllers\Admin;

use App\Models\Station;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\WeatherDataRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class WeatherDataCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class WeatherDataCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\WeatherData::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/weather_data');
        CRUD::setEntityNameStrings('weather data', 'weather data');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setColumns([
            [
                'name' => 'fecha',
                'label' => 'Fecha',
                'type' => 'date',
                'format' => 'MM-DD-YYYY',
            ]


        ]);
        CRUD::setFromDb(); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */

        $this->crud->addFilter([
            'name' => 'station',
            'type' => 'select2',
            'label' => 'Station',
        ], function () {
            return Station::all()->pluck('label', 'label')->toArray();
        }, function ($value) {
            $this->crud->addClause('where', 'station', $value);
        });

        $this->crud->addFilter(
            [ // daterange filter
                'type' => 'date_range',
                'name' => 'from_to',
                'label'=> 'Date range'

            ],
            false,
            function ($value) { // if the filter is active, apply these constraints
            $dates = json_decode($value);
            $this->crud->addClause('where', 'fecha', '>=', $dates->from);
            $this->crud->addClause('where', 'fecha', '<=', $dates->to . ' 23:59:59');
        }
        );


        $this->crud->addButtonFromView('top', 'download', 'download', 'end');
        $this->crud->setDefaultPageLength(50);

        /**
         * Get the SQL definition of the query being run:
         * This includes all the active filters;
         * Save it to the session to pass to the download function.
         * $query = string - escaped SQL statement;
         * $params = array - parameters to insert into the escaped SQL query.
         */


        if ($this->crud->actionIs('list') || $this->crud->actionIs('search')) {
            $query = $this->crud->query->getQuery()->toSql();
            $params = $this->crud->query->getQuery()->getBindings();
            Session(['query' => $query ]);
            Session(['params' => $params ]);
        }
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(WeatherDataRequest::class);

        CRUD::setFromDb(); // fields

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function download()
    {
        $scriptName = 'save_data_csv.py';
        $scriptPath = base_path() . '/scripts/' . $scriptName;
        $base_path = base_path();
        $query = Session('query');
        $params = join(",", Session('params'));
        $date = str_replace(':', '', date('c'));
        $date = str_replace('-', '', $date);
        $date = str_replace('+', '', $date);
        $file_name = date('c')."data.csv";
        $query = str_replace('`', ' ', $query);

        //python script accepts 4 arguments in this order: base_path(), query, params and file name
        Log::info($query);

        $process = new Process(['pipenv', 'run', 'python3', $scriptPath, $base_path, $query, $params, $file_name]);

        $process->run();

        if (!$process->isSuccessful()) {
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
