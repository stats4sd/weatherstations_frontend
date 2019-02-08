-- THIS IS A WORK IN PROGRESS.
-- THE "FINALISED" VIEWS ARE IN THE MIGRATIONS

-- Use this file to store SQL queries we are exploring to create different types of aggregations.

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



    -- $table->decimal('rafaga')->nullable();

    -- $table->string('direccion_del_viento')->nullable();

    -- $table->decimal('punto_rocio')->nullable();

    -- ################# Rainfall
    -- ## Rainfall is already totalled per hour, day and week.
    -- ## So, for days we can just use the 24_horas column.

    MAX(lluvia_24_horas) as lluvia_24_horas_total

    -- $table->decimal('hi_temp')->nullable();
    -- $table->decimal('low_temp')->nullable();
    -- $table->decimal('wind_cod')->nullable();
    -- $table->decimal('wind_run')->nullable();
    -- $table->decimal('hi_speed')->nullable();
    -- $table->string('hi_dir')->nullable();
    -- $table->decimal('wind_cod_dom')->nullable();
    -- $table->decimal('wind_chill')->nullable();
    -- $table->decimal('index_heat')->nullable();
    -- $table->decimal('index_thw')->nullable();
    -- $table->decimal('index_thsw')->nullable();
    -- $table->decimal('rain')->nullable();
    -- $table->decimal('solar_rad')->nullable();
    -- $table->decimal('solar_energy')->nullable();
    -- $table->decimal('radsolar_max')->nullable();
    -- $table->decimal('uv_index')->nullable();
    -- $table->decimal('uv_dose')->nullable();
    -- $table->decimal('uv_max')->nullable();
    -- $table->decimal('heat_days_d')->nullable();
    -- $table->decimal('cool_days_d')->nullable();
    -- $table->decimal('in_dew')->nullable();
    -- $table->decimal('in_heat')->nullable();
    -- $table->decimal('in_emc')->nullable();
    -- $table->decimal('in_air_density')->nullable();
    -- $table->decimal('evapotran')->nullable();
    -- $table->decimal('soil_1_moist')->nullable();
    -- $table->decimal('soil_2_moist')->nullable();
    -- $table->decimal('leaf_wet1')->nullable();
    -- $table->decimal('wind_samp')->nullable();
    -- $table->decimal('wind_tx')->nullable();
    -- $table->decimal('iss_recept')->nullable();


    FROM data
    GROUP BY fecha, id_station;