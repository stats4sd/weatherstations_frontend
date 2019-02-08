<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class YearlyDataView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS yearly_data");
        DB::statement("
            CREATE VIEW yearly_data AS
            SELECT

                -- ######### START WITH THE GROUP-BY FIELDS
                -- ## We want 'daily'
                -- ## Grouped by weather-station

                LEFT(fecha_hora,4) as fecha,
                id_station as id_station,

                -- #########################################
                -- #########################################

                -- ################# Temperature and Humidity
                -- ## Min and Max

                MAX(temperatura_interna) as max_temperature_interna,
                MIN(temperatura_interna) as min_temperature_interna,

                MAX(humedad_interna) as max_humidad_interna,
                MIN(humedad_interna) as min_humidad_interna,

                MAX(temperatura_externa) as max_temperatura_externa,
                MIN(temperatura_externa) as min_temperatura_externa,

                MAX(humedad_externa) as max_humedad_externa,
                MIN(humedad_externa) as min_humedad_externa,

                -- ################# Pressure
                -- ## Min and Max

                MAX(presion_relativa) as max_presion_relativa,
                MIN(presion_relativa) as min_presion_relativa,

                MAX(presion_absoluta) as max_presion_absoluta,
                MIN(presion_absoluta) as min_presion_absoluta,

                -- ################# Wind Speed
                -- ## Min and Max

                MAX(velocidad_viento) as max_velocidad_viento,
                MIN(velocidad_viento) as min_velocidad_viento,


                -- ################# Heat Sensation?
                -- ## Min and Max

                MAX(sensacion_termica) as max_sensacion_termica,
                MIN(sensacion_termica) as min_sensacion_termica,

                -- ################# Rainfall
                -- ## Rainfall is already totalled per hour, day and week.
                -- ## So, for days we can just use the 24_horas column.

                MAX(lluvia_24_horas) as lluvia_24_horas_total

                FROM data
                GROUP BY fecha, id_station;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS yearly_data");
    }
}
