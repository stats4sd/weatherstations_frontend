<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TenDaysDataView extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS tendays_data");
        //DB::statement("SELECT DATEADD(LEFT(fecha_hora, 10), 10 day)");
        DB::statement("
            CREATE VIEW tendays_data AS
            SELECT

                -- ######### START WITH THE GROUP-BY FIELDS
                -- ## We want '10 days'
                -- ## Grouped by weather-station

                min(LEFT(fecha_hora, 10)) as min_fecha,
                max(LEFT(fecha_hora,10)) as max_fecha,

                

              

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

                MAX(lluvia_24_horas) as lluvia_24_horas_total,

                floor((to_days(`data`.`fecha_hora`) / 10))  as group_by,
                id_station as id_station

                FROM data
                GROUP BY group_by, id_station;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS tendays_data");
    }
}
