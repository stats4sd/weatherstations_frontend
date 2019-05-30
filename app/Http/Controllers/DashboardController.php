<?php

namespace App\Http\Controllers;

use App\Daily;
use App\Dashboard;
use DB;
use Illuminate\Http\Request;
use Khill\Lavacharts\Laravel\LavachartsFacade as Lava;
use Khill\Lavacharts\Lavacharts;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index ()

    {
        $station_data = DB::table('data')->get();
        $stations = DB::table('stations')->get();
       


        $lava_temp_in= new Lavacharts;
        if(!empty($station_data)){
            $data=Daily::select("fecha as 0","max_temperatura_interna as 1", "avg_temperatura_interna as 2","min_temperatura_interna as 3")->get()->toArray();
            $datatable = Lava::DataTable();

            $datatable -> addDateColumn('Date')
                        -> addNumberColumn('Max Temp Int °C')
                        -> addNumberColumn('Mean Temp Int °C')
                        -> addNumberColumn('Min Temp Int °C')
                        -> addRows($data);

            Lava::LineChart('TemperatureIn', $datatable,[
                    'title' => 'DailyTemperatures Interna °C'                 
            ]);
        }

        $lava_temp_out= new Lavacharts;
        if(!empty($station_data)){
            $data=Daily::select("fecha as 0","max_temperatura_externa as 1", "min_temperatura_externa as 2","avg_temperatura_externa as 3")->get()->toArray();
            $datatable = Lava::DataTable();

            $datatable -> addDateColumn('Date')
                        -> addNumberColumn('Max Temp Out °C')
                        -> addNumberColumn('Mean Temp Out °C')
                        -> addNumberColumn('Min Temp Out °C')
                        -> addRows($data);

            Lava::LineChart('TemperatureOut', $datatable,[
                    'title' => 'DailyTemperatures Externa °C'                 
            ]);
        }

        $lava_hum_in= new Lavacharts;
        if(!empty($station_data)){
            $data=Daily::select("fecha as 0","max_humedad_interna as 1", "min_humedad_interna as 2","avg_humedad_interna as 3")->get()->toArray();
            $datatable = Lava::DataTable();

            $datatable -> addDateColumn('Date')
                        -> addNumberColumn('Max Hum In %')
                        -> addNumberColumn('Mean Hum In %')
                        -> addNumberColumn('Min Hum In %')
                        -> addRows($data);

            Lava::LineChart('HumedadIn', $datatable,[
                    'title' => 'DailyHumedad Interna %'                 
            ]);
        }

        $lava_hum_out= new Lavacharts;
        if(!empty($station_data)){
            $data=Daily::select("fecha as 0","max_humedad_externa as 1", "min_humedad_externa as 2","avg_humedad_externa as 3")->get()->toArray();
            $datatable = Lava::DataTable();

            $datatable -> addDateColumn('Date')
                        -> addNumberColumn('Max Hum Out %')
                        -> addNumberColumn('Mean Hum Out %')
                        -> addNumberColumn('Min Hum Out %')
                        -> addRows($data);

            Lava::LineChart('HumedadOut', $datatable,[
                    'title' => 'DailyHumedad Externa %'                 
            ]);
        }

        $lava_hum_out= new Lavacharts;
        if(!empty($station_data)){
            $data=Daily::select("fecha as 0","max_presion_relativa as 1", "min_presion_relativa as 2","avg_presion_relativa as 3")->get()->toArray();
            $datatable = Lava::DataTable();

            $datatable -> addDateColumn('Date')
                        -> addNumberColumn('Max Pres Rel hPa')
                        -> addNumberColumn('Mean Pres Rel hPa')
                        -> addNumberColumn('Min Pres Rel hPa')
                        -> addRows($data);

            Lava::LineChart('PressionR', $datatable,[
                    'title' => 'DailyPresion Relativa hPa'                 
            ]);
        }

        $lava_hum_out= new Lavacharts;
        if(!empty($station_data)){
            $data=Daily::select("fecha as 0","max_presion_absoluta as 1", "min_presion_absoluta as 2","avg_presion_absoluta as 3")->get()->toArray();
            $datatable = Lava::DataTable();

            $datatable -> addDateColumn('Date')
                        -> addNumberColumn('Max Pres Abs hPa')
                        -> addNumberColumn('Mean Pres Abs hPa')
                        -> addNumberColumn('Min Pres Abs hPa')
                        -> addRows($data);

            Lava::LineChart('PressionA', $datatable,[
                    'title' => 'DailyPresion Absoluta hPa'                 
            ]);
        }

        $lava_hum_out= new Lavacharts;
        if(!empty($station_data)){
            $data=Daily::select("fecha as 0","max_velocidad_viento as 1", "min_velocidad_viento as 2","avg_velocidad_viento as 3")->get()->toArray();
            $datatable = Lava::DataTable();

            $datatable -> addDateColumn('Date')
                        -> addNumberColumn('Max Veloc Viento m/s')
                        -> addNumberColumn('Mean Veloc Viento m/s')
                        -> addNumberColumn('Min Veloc Viento m/s')
                        -> addRows($data);

            Lava::LineChart('VelocidadViento', $datatable,[
                    'title' => 'DailyVelocidad Viento m/s'                 
            ]);
        }

        $lava_hum_out= new Lavacharts;
        if(!empty($station_data)){
            $data=Daily::select("fecha as 0","max_sensacion_termica as 1", "min_sensacion_termica as 2","avg_sensacion_termica as 3")->get()->toArray();
            $datatable = Lava::DataTable();

            $datatable -> addDateColumn('Date')
                        -> addNumberColumn('Max Sens Term °C')
                        -> addNumberColumn('Mean Sens Term °C')
                        -> addNumberColumn('Min Sens Term °C')
                        -> addRows($data);

            Lava::LineChart('SensTermica', $datatable,[
                    'title' => 'DailySensacion Termica °C'                 
            ]);
        }




        return view('dashboard');
    }


    
}
