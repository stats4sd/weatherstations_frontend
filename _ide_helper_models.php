<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Daily
 *
 * @property int|null $id
 * @property string $fecha
 * @property int|null $id_station
 * @property string|null $max_temperatura_interna
 * @property string|null $min_temperatura_interna
 * @property string|null $avg_temperatura_interna
 * @property int|null $max_humedad_interna
 * @property int|null $min_humedad_interna
 * @property string|null $avg_humedad_interna
 * @property string|null $max_temperatura_externa
 * @property string|null $min_temperatura_externa
 * @property string|null $avg_temperatura_externa
 * @property int|null $max_humedad_externa
 * @property int|null $min_humedad_externa
 * @property string|null $avg_humedad_externa
 * @property string|null $max_presion_relativa
 * @property string|null $min_presion_relativa
 * @property string|null $avg_presion_relativa
 * @property string|null $max_presion_absoluta
 * @property string|null $min_presion_absoluta
 * @property string|null $avg_presion_absoluta
 * @property string|null $max_velocidad_viento
 * @property string|null $min_velocidad_viento
 * @property string|null $avg_velocidad_viento
 * @property string|null $max_sensacion_termica
 * @property string|null $min_sensacion_termica
 * @property string|null $avg_sensacion_termica
 * @property string|null $lluvia_24_horas_total
 * @method static \Illuminate\Database\Eloquent\Builder|Daily newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Daily newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Daily query()
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereAvgHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereAvgHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereAvgPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereAvgPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereAvgSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereAvgTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereAvgTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereAvgVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereIdStation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereLluvia24HorasTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMaxHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMaxHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMaxPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMaxPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMaxSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMaxTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMaxTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMaxVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMinHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMinHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMinPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMinPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMinSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMinTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMinTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMinVelocidadViento($value)
 */
	class Daily extends \Eloquent {}
}

namespace App{
/**
 * App\File
 *
 * @property int $id
 * @property string $path
 * @property string $name
 * @property int $station_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 */
	class File extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Comunidad
 *
 * @property int $id
 * @property int $municipio_id
 * @property string $name
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $altitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Municipio $municipio
 * @method static \Illuminate\Database\Eloquent\Builder|Comunidad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comunidad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comunidad query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comunidad whereAltitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comunidad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comunidad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comunidad whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comunidad whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comunidad whereMunicipioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comunidad whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comunidad whereUpdatedAt($value)
 */
	class Comunidad extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cultivo
 *
 * @property int $id
 * @property string $lkp_cultivo_id
 * @property string|null $lkp_variedad_id
 * @property string $parcela_id
 * @property string|null $propiedad_cultivo
 * @property string|null $propiedad_variedad
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Enfermedade[] $enfermedades
 * @property-read int|null $enfermedades_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Fenologia[] $fenologias
 * @property-read int|null $fenologias_count
 * @property-read \App\Models\LkpCultivo $lkp_cultivos
 * @property-read \App\Models\LkpVariedad|null $lkp_variedad
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ManejoParcela[] $manejo_parcelas
 * @property-read int|null $manejo_parcelas_count
 * @property-read \App\Models\Parcela $parcela
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Plaga[] $plagas
 * @property-read int|null $plagas_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Rendimento[] $rendimentos
 * @property-read int|null $rendimentos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Cultivo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cultivo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cultivo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cultivo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cultivo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cultivo whereLkpCultivoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cultivo whereLkpVariedadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cultivo whereParcelaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cultivo wherePropiedadCultivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cultivo wherePropiedadVariedad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cultivo whereUpdatedAt($value)
 */
	class Cultivo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Daily
 *
 * @property int|null $id
 * @property string $fecha
 * @property int|null $id_station
 * @property string|null $max_temperatura_interna
 * @property string|null $min_temperatura_interna
 * @property string|null $avg_temperatura_interna
 * @property int|null $max_humedad_interna
 * @property int|null $min_humedad_interna
 * @property string|null $avg_humedad_interna
 * @property string|null $max_temperatura_externa
 * @property string|null $min_temperatura_externa
 * @property string|null $avg_temperatura_externa
 * @property int|null $max_humedad_externa
 * @property int|null $min_humedad_externa
 * @property string|null $avg_humedad_externa
 * @property string|null $max_presion_relativa
 * @property string|null $min_presion_relativa
 * @property string|null $avg_presion_relativa
 * @property string|null $max_presion_absoluta
 * @property string|null $min_presion_absoluta
 * @property string|null $avg_presion_absoluta
 * @property string|null $max_velocidad_viento
 * @property string|null $min_velocidad_viento
 * @property string|null $avg_velocidad_viento
 * @property string|null $max_sensacion_termica
 * @property string|null $min_sensacion_termica
 * @property string|null $avg_sensacion_termica
 * @property string|null $lluvia_24_horas_total
 * @property-read \App\Models\Station|null $station
 * @method static \Illuminate\Database\Eloquent\Builder|Daily newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Daily newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Daily query()
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereAvgHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereAvgHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereAvgPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereAvgPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereAvgSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereAvgTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereAvgTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereAvgVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereIdStation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereLluvia24HorasTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMaxHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMaxHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMaxPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMaxPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMaxSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMaxTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMaxTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMaxVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMinHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMinHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMinPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMinPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMinSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMinTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMinTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Daily whereMinVelocidadViento($value)
 */
	class Daily extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DailyDataPreview
 *
 * @property int|null $id
 * @property string|null $fecha
 * @property int $id_station
 * @property string $uploader_id
 * @property string|null $max_temperatura_interna
 * @property string|null $min_temperatura_interna
 * @property string|null $avg_temperatura_interna
 * @property int|null $max_humedad_interna
 * @property int|null $min_humedad_interna
 * @property string|null $avg_humedad_interna
 * @property string|null $max_temperatura_externa
 * @property string|null $min_temperatura_externa
 * @property string|null $avg_temperatura_externa
 * @property int|null $max_humedad_externa
 * @property int|null $min_humedad_externa
 * @property string|null $avg_humedad_externa
 * @property string|null $max_presion_relativa
 * @property string|null $min_presion_relativa
 * @property string|null $avg_presion_relativa
 * @property string|null $max_presion_absoluta
 * @property string|null $min_presion_absoluta
 * @property string|null $avg_presion_absoluta
 * @property string|null $max_velocidad_viento
 * @property string|null $min_velocidad_viento
 * @property string|null $avg_velocidad_viento
 * @property string|null $max_sensacion_termica
 * @property string|null $min_sensacion_termica
 * @property string|null $avg_sensacion_termica
 * @property string|null $lluvia_24_horas_total
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview query()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereAvgHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereAvgHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereAvgPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereAvgPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereAvgSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereAvgTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereAvgTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereAvgVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereIdStation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereLluvia24HorasTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereMaxHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereMaxHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereMaxPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereMaxPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereMaxSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereMaxTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereMaxTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereMaxVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereMinHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereMinHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereMinPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereMinPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereMinSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereMinTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereMinTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereMinVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyDataPreview whereUploaderId($value)
 */
	class DailyDataPreview extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Data
 *
 * @property string $fecha_hora
 * @property int $id
 * @property int|null $intervalo
 * @property string|null $temperatura_interna
 * @property int|null $humedad_interna
 * @property string|null $temperatura_externa
 * @property int|null $humedad_externa
 * @property string|null $presion_relativa
 * @property string|null $presion_absoluta
 * @property string|null $velocidad_viento
 * @property string|null $sensacion_termica
 * @property string|null $rafaga
 * @property string|null $direccion_del_viento
 * @property string|null $punto_rocio
 * @property string|null $lluvia_hora
 * @property string|null $lluvia_24_horas
 * @property string|null $lluvia_semana
 * @property string|null $lluvia_mes
 * @property string|null $lluvia_total
 * @property string|null $hi_temp
 * @property string|null $low_temp
 * @property string|null $wind_cod
 * @property string|null $wind_run
 * @property string|null $hi_speed
 * @property string|null $hi_dir
 * @property string|null $wind_cod_dom
 * @property string|null $wind_chill
 * @property string|null $index_heat
 * @property string|null $index_thw
 * @property string|null $index_thsw
 * @property string|null $rain
 * @property string|null $solar_rad
 * @property string|null $solar_energy
 * @property string|null $radsolar_max
 * @property string|null $uv_index
 * @property string|null $uv_dose
 * @property string|null $uv_max
 * @property string|null $heat_days_d
 * @property string|null $cool_days_d
 * @property string|null $in_dew
 * @property string|null $in_heat
 * @property string|null $in_emc
 * @property string|null $in_air_density
 * @property string|null $evapotran
 * @property string|null $soil_1_moist
 * @property string|null $soil_2_moist
 * @property string|null $leaf_wet1
 * @property string|null $leaf_wet2
 * @property string|null $leaf_wet3
 * @property string|null $leaf_wet4
 * @property string|null $wind_samp
 * @property string|null $wind_tx
 * @property string|null $iss_recept
 * @property int|null $id_station
 * @property string $meteobridge_latitude
 * @property string $meteobridge_longitude
 * @property string $meteobridge_altitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $leaf_temp_1
 * @property string|null $leaf_temp_2
 * @property string|null $leaf_temp_3
 * @property string|null $leaf_temp_4
 * @property string|null $soil_temp_1
 * @property string|null $soil_temp_2
 * @property string|null $soil_temp_3
 * @property string|null $soil_temp_4
 * @property string|null $soil_3_moist
 * @property string|null $soil_4_moist
 * @property int $meteobridge
 * @property string|null $hardware_id
 * @property-read \App\Models\Station|null $station
 * @method static \Illuminate\Database\Eloquent\Builder|Data newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Data newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Data query()
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereCoolDaysD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereDireccionDelViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereEvapotran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereFechaHora($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereHardwareId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereHeatDaysD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereHiDir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereHiSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereHiTemp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereIdStation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereInAirDensity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereInDew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereInEmc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereInHeat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereIndexHeat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereIndexThsw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereIndexThw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereIntervalo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereIssRecept($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereLeafTemp1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereLeafTemp2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereLeafTemp3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereLeafTemp4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereLeafWet1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereLeafWet2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereLeafWet3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereLeafWet4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereLluvia24Horas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereLluviaHora($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereLluviaMes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereLluviaSemana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereLluviaTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereLowTemp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereMeteobridge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereMeteobridgeAltitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereMeteobridgeLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereMeteobridgeLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data wherePresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data wherePresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data wherePuntoRocio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereRadsolarMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereRafaga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereRain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereSoil1Moist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereSoil2Moist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereSoil3Moist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereSoil4Moist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereSoilTemp1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereSoilTemp2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereSoilTemp3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereSoilTemp4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereSolarEnergy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereSolarRad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereUvDose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereUvIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereUvMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereWindChill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereWindCod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereWindCodDom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereWindRun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereWindSamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Data whereWindTx($value)
 */
	class Data extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DataMap
 *
 * @property string $id
 * @property string $title
 * @property array $variables
 * @property string $model
 * @property int $location
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $select_multiple if this is set, this data map is for data at a different level, based on a select_multiple and possibly a repeat group based on that select_multiple response.
 * @property string|null $repeat_group the name of the repeat group to look inside to find the main variables for this data map
 * @property string|null $select_multiple_other the name of the "enter other value" question linked to the select_multiple variable
 * @property string|null $inner_name
 * @property string|null $inner_label
 * @property string|null $select_multiple_other_label the name of the "enter other value" question linked to the select_multiple variable
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap query()
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereInnerLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereInnerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereRepeatGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereSelectMultiple($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereSelectMultipleOther($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereSelectMultipleOtherLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereVariables($value)
 */
	class DataMap extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DataTemplate
 *
 * @property string|null $fecha_hora
 * @property int $id
 * @property int|null $intervalo
 * @property string|null $temperatura_interna
 * @property int|null $humedad_interna
 * @property string|null $temperatura_externa
 * @property int|null $humedad_externa
 * @property string|null $presion_relativa
 * @property string|null $presion_absoluta
 * @property string|null $velocidad_viento
 * @property string|null $sensacion_termica
 * @property string|null $rafaga
 * @property string|null $direccion_del_viento
 * @property string|null $punto_rocio
 * @property string|null $lluvia_hora
 * @property string|null $lluvia_24_horas
 * @property string|null $lluvia_semana
 * @property string|null $lluvia_mes
 * @property string|null $lluvia_total
 * @property string|null $hi_temp
 * @property string|null $low_temp
 * @property string|null $wind_cod
 * @property string|null $wind_run
 * @property string|null $hi_speed
 * @property string|null $hi_dir
 * @property string|null $wind_cod_dom
 * @property string|null $wind_chill
 * @property string|null $index_heat
 * @property string|null $index_thw
 * @property string|null $index_thsw
 * @property string|null $rain
 * @property string|null $solar_rad
 * @property string|null $solar_energy
 * @property string|null $radsolar_max
 * @property string|null $uv_index
 * @property string|null $uv_dose
 * @property string|null $uv_max
 * @property string|null $heat_days_d
 * @property string|null $cool_days_d
 * @property string|null $in_dew
 * @property string|null $in_heat
 * @property string|null $in_emc
 * @property string|null $in_air_density
 * @property string|null $evapotran
 * @property string|null $soil_1_moist
 * @property string|null $soil_2_moist
 * @property string|null $leaf_wet1
 * @property string|null $leaf_wet2
 * @property string|null $leaf_wet3
 * @property string|null $leaf_wet4
 * @property string|null $wind_samp
 * @property string|null $wind_tx
 * @property string|null $iss_recept
 * @property int $id_station
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $leaf_temp_1
 * @property string|null $leaf_temp_2
 * @property string|null $leaf_temp_3
 * @property string|null $leaf_temp_4
 * @property string|null $soil_temp_1
 * @property string|null $soil_temp_2
 * @property string|null $soil_temp_3
 * @property string|null $soil_temp_4
 * @property string|null $soil_3_moist
 * @property string|null $soil_4_moist
 * @property string $uploader_id
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereCoolDaysD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereDireccionDelViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereEvapotran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereFechaHora($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereHeatDaysD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereHiDir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereHiSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereHiTemp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereIdStation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereInAirDensity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereInDew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereInEmc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereInHeat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereIndexHeat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereIndexThsw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereIndexThw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereIntervalo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereIssRecept($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereLeafTemp1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereLeafTemp2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereLeafTemp3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereLeafTemp4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereLeafWet1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereLeafWet2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereLeafWet3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereLeafWet4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereLluvia24Horas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereLluviaHora($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereLluviaMes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereLluviaSemana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereLluviaTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereLowTemp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate wherePresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate wherePresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate wherePuntoRocio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereRadsolarMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereRafaga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereRain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereSoil1Moist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereSoil2Moist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereSoil3Moist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereSoil4Moist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereSoilTemp1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereSoilTemp2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereSoilTemp3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereSoilTemp4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereSolarEnergy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereSolarRad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereUploaderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereUvDose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereUvIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereUvMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereWindChill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereWindCod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereWindCodDom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereWindRun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereWindSamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataTemplate whereWindTx($value)
 */
	class DataTemplate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Departamento
 *
 * @property int $id
 * @property int $region_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Municipio[] $municipios
 * @property-read int|null $municipios_count
 * @property-read \App\Models\Region $region
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento query()
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento whereUpdatedAt($value)
 */
	class Departamento extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Enfermedade
 *
 * @property int $id
 * @property int $cultivo_id
 * @property string|null $name
 * @property int $submission_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cultivo $cultivo
 * @method static \Illuminate\Database\Eloquent\Builder|Enfermedade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Enfermedade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Enfermedade query()
 * @method static \Illuminate\Database\Eloquent\Builder|Enfermedade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enfermedade whereCultivoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enfermedade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enfermedade whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enfermedade whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enfermedade whereUpdatedAt($value)
 */
	class Enfermedade extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Fenologia
 *
 * @property int $id
 * @property int $cultivo_id
 * @property int|null $epoca_siembra
 * @property string|null $fecha_siembra
 * @property string|null $fecha_emergencia
 * @property string|null $fecha_hojas
 * @property string|null $fecha_floracion
 * @property string|null $fecha_fructificacion
 * @property string|null $fecha_maduracion
 * @property string|null $fecha_cosecha
 * @property int|null $edad_plantacion
 * @property string|null $fecha_dormida
 * @property string|null $fecha_hinchada
 * @property string|null $fecha_cuajado
 * @property int $submission_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cultivo $cultivo
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia query()
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia whereCultivoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia whereEdadPlantacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia whereEpocaSiembra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia whereFechaCosecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia whereFechaCuajado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia whereFechaDormida($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia whereFechaEmergencia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia whereFechaFloracion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia whereFechaFructificacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia whereFechaHinchada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia whereFechaHojas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia whereFechaMaduracion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia whereFechaSiembra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fenologia whereUpdatedAt($value)
 */
	class Fenologia extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LkpCultivo
 *
 * @property int $id
 * @property string $name
 * @property string|null $propiedad
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cultivo[] $cultivos
 * @property-read int|null $cultivos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\LkpVariedad[] $variedad
 * @property-read int|null $variedad_count
 * @method static \Illuminate\Database\Eloquent\Builder|LkpCultivo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LkpCultivo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LkpCultivo query()
 * @method static \Illuminate\Database\Eloquent\Builder|LkpCultivo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkpCultivo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkpCultivo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkpCultivo wherePropiedad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkpCultivo whereUpdatedAt($value)
 */
	class LkpCultivo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LkpVariedad
 *
 * @property int $id
 * @property string $lkp_cultivo_id
 * @property string $name
 * @property string|null $propiedad
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\LkpCultivo $lkp_cultivo
 * @method static \Illuminate\Database\Eloquent\Builder|LkpVariedad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LkpVariedad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LkpVariedad query()
 * @method static \Illuminate\Database\Eloquent\Builder|LkpVariedad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkpVariedad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkpVariedad whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkpVariedad whereLkpCultivoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkpVariedad whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkpVariedad wherePropiedad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LkpVariedad whereUpdatedAt($value)
 */
	class LkpVariedad extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ManejoParcela
 *
 * @property int $id
 * @property int $cultivo_id
 * @property string|null $fecha_roturado_suelo
 * @property string|null $tipo_preparacion_roturado
 * @property string|null $fecha_rastrado_suelo
 * @property string|null $tipo_preparacion_rastrado
 * @property string|null $fecha_fertilizacion
 * @property string|null $tipo_fertilizacion_suelo
 * @property string|null $abono_organico
 * @property string|null $abono_cantidad_kg
 * @property string|null $fertilizante_quimico
 * @property string|null $fertilizante_cantidad_kg
 * @property string|null $foliar_producto
 * @property string|null $tipo_riego
 * @property string|null $fuente_agua
 * @property string|null $tipo_deshierbe
 * @property string|null $fecha_aporque
 * @property string|null $tipo_aporque
 * @property string|null $fecha_tazeo
 * @property string|null $tipo_tazeo
 * @property string|null $fecha_poda
 * @property string|null $tipo_poda
 * @property string|null $fecha_control_fitosanitario
 * @property string|null $tipo_control_fitosanitario
 * @property string|null $tipo_producto
 * @property string|null $producto
 * @property int $submission_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cultivo $cultivo
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela query()
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereAbonoCantidadKg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereAbonoOrganico($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereCultivoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereFechaAporque($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereFechaControlFitosanitario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereFechaFertilizacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereFechaPoda($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereFechaRastradoSuelo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereFechaRoturadoSuelo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereFechaTazeo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereFertilizanteCantidadKg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereFertilizanteQuimico($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereFoliarProducto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereFuenteAgua($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereProducto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereTipoAporque($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereTipoControlFitosanitario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereTipoDeshierbe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereTipoFertilizacionSuelo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereTipoPoda($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereTipoPreparacionRastrado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereTipoPreparacionRoturado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereTipoProducto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereTipoRiego($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereTipoTazeo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ManejoParcela whereUpdatedAt($value)
 */
	class ManejoParcela extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Monthly
 *
 * @property int|null $id
 * @property string $fecha
 * @property string $year
 * @property string $month
 * @property int|null $id_station
 * @property string|null $max_temperatura_interna
 * @property string|null $min_temperatura_interna
 * @property string|null $avg_temperatura_interna
 * @property int|null $max_humedad_interna
 * @property int|null $min_humedad_interna
 * @property string|null $avg_humedad_interna
 * @property string|null $max_temperatura_externa
 * @property string|null $min_temperatura_externa
 * @property string|null $avg_temperatura_externa
 * @property int|null $max_humedad_externa
 * @property int|null $min_humedad_externa
 * @property string|null $avg_humedad_externa
 * @property string|null $max_presion_relativa
 * @property string|null $min_presion_relativa
 * @property string|null $avg_presion_relativa
 * @property string|null $max_presion_absoluta
 * @property string|null $min_presion_absoluta
 * @property string|null $avg_presion_absoluta
 * @property string|null $max_velocidad_viento
 * @property string|null $min_velocidad_viento
 * @property string|null $avg_velocidad_viento
 * @property string|null $max_sensacion_termica
 * @property string|null $min_sensacion_termica
 * @property string|null $avg_sensacion_termica
 * @property string|null $lluvia_24_horas_total
 * @property-read \App\Models\Station|null $station
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly query()
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereAvgHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereAvgHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereAvgPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereAvgPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereAvgSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereAvgTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereAvgTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereAvgVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereIdStation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereLluvia24HorasTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMaxHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMaxHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMaxPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMaxPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMaxSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMaxTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMaxTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMaxVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMinHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMinHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMinPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMinPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMinSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMinTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMinTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMinVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereYear($value)
 */
	class Monthly extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MuestraSuelo
 *
 * @property int $id
 * @property string $parcela_id
 * @property int $submission_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Parcela $parcela
 * @method static \Illuminate\Database\Eloquent\Builder|MuestraSuelo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MuestraSuelo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MuestraSuelo query()
 * @method static \Illuminate\Database\Eloquent\Builder|MuestraSuelo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MuestraSuelo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MuestraSuelo whereParcelaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MuestraSuelo whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MuestraSuelo whereUpdatedAt($value)
 */
	class MuestraSuelo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Municipio
 *
 * @property int $id
 * @property int $departamento_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comunidad[] $comunidades
 * @property-read int|null $comunidades_count
 * @property-read \App\Models\Departamento $departamento
 * @method static \Illuminate\Database\Eloquent\Builder|Municipio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Municipio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Municipio query()
 * @method static \Illuminate\Database\Eloquent\Builder|Municipio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipio whereDepartamentoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipio whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipio whereUpdatedAt($value)
 */
	class Municipio extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Parcela
 *
 * @property string $id
 * @property int $comunidad_id
 * @property string|null $fecha
 * @property string|null $area_originale
 * @property string|null $area_m2
 * @property string|null $pendiente
 * @property int|null $drenaje
 * @property int|null $salinidad
 * @property string $latitude
 * @property string|null $image
 * @property string $longitude
 * @property string $altitude
 * @property string $accuracy
 * @property int $submission_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cultivo[] $cultivos
 * @property-read int|null $cultivos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MuestraSuelo[] $muestra_suelos
 * @property-read int|null $muestra_suelos_count
 * @property-read \App\Models\Submission $submissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Suelo[] $suelos
 * @property-read int|null $suelos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela query()
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela whereAccuracy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela whereAltitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela whereAreaM2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela whereAreaOriginale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela whereComunidadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela whereDrenaje($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela wherePendiente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela whereSalinidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcela whereUpdatedAt($value)
 */
	class Parcela extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Plaga
 *
 * @property int $id
 * @property int $cultivo_id
 * @property string|null $name
 * @property string|null $cantidad_insectos_m2
 * @property string|null $cantidad_larvas
 * @property int|null $mosca_numero
 * @property int|null $mosca_trampas
 * @property int|null $mosca_dias
 * @property int|null $presencia_mosca
 * @property string|null $plaga_fecha
 * @property int $submission_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cultivo $cultivo
 * @method static \Illuminate\Database\Eloquent\Builder|Plaga newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plaga newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plaga query()
 * @method static \Illuminate\Database\Eloquent\Builder|Plaga whereCantidadInsectosM2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plaga whereCantidadLarvas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plaga whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plaga whereCultivoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plaga whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plaga whereMoscaDias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plaga whereMoscaNumero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plaga whereMoscaTrampas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plaga whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plaga wherePlagaFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plaga wherePresenciaMosca($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plaga whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plaga whereUpdatedAt($value)
 */
	class Plaga extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\QrCode
 *
 * @property int $id
 * @property string $prefix
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|QrCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QrCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QrCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|QrCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QrCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QrCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QrCode wherePrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QrCode whereUpdatedAt($value)
 */
	class QrCode extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Region
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Departamento[] $departamentos
 * @property-read int|null $departamentos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereUpdatedAt($value)
 */
	class Region extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Rendimento
 *
 * @property int $id
 * @property int $cultivo_id
 * @property string|null $cantidad_cosechada_kg
 * @property string|null $superficie_cosechada_m2
 * @property string|null $peso_muestra_tuberculos
 * @property string|null $peso_danados_tuberculos
 * @property string|null $peso_muestra_grano
 * @property string|null $peso_danado_grano
 * @property int $submission_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $cantidad_cosechada_p
 * @property-read \App\Models\Cultivo $cultivo
 * @method static \Illuminate\Database\Eloquent\Builder|Rendimento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rendimento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rendimento query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rendimento whereCantidadCosechadaKg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendimento whereCantidadCosechadaP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendimento whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendimento whereCultivoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendimento whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendimento wherePesoDanadoGrano($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendimento wherePesoDanadosTuberculos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendimento wherePesoMuestraGrano($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendimento wherePesoMuestraTuberculos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendimento whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendimento whereSuperficieCosechadaM2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rendimento whereUpdatedAt($value)
 */
	class Rendimento extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Station
 *
 * @property int $id
 * @property string|null $hardware_id
 * @property string $label
 * @property string $latitude
 * @property string $longitude
 * @property string $altitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|Station newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station query()
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereAltitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereHardwareId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereUpdatedAt($value)
 */
	class Station extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Submission
 *
 * @property int $id
 * @property string $uuid
 * @property int $xlsform_id
 * @property mixed $content
 * @property string $fecha_hora
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $altitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Xlsform $xls_form
 * @method static \Illuminate\Database\Eloquent\Builder|Submission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereAltitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereFechaHora($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereXlsformId($value)
 */
	class Submission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Suelo
 *
 * @property int $id
 * @property string $parcela_id
 * @property string $materia_organica
 * @property string $textura
 * @property string $pH
 * @property int $submission_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Parcela $parcela
 * @method static \Illuminate\Database\Eloquent\Builder|Suelo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Suelo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Suelo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Suelo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suelo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suelo whereMateriaOrganica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suelo wherePH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suelo whereParcelaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suelo whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suelo whereTextura($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suelo whereUpdatedAt($value)
 */
	class Suelo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TenDays
 *
 * @property int|null $id
 * @property string|null $min_fecha
 * @property string|null $max_fecha
 * @property string|null $max_temperatura_interna
 * @property string|null $min_temperatura_interna
 * @property string|null $avg_temperatura_interna
 * @property int|null $max_humedad_interna
 * @property int|null $min_humedad_interna
 * @property string|null $avg_humedad_interna
 * @property string|null $max_temperatura_externa
 * @property string|null $min_temperatura_externa
 * @property string|null $avg_temperatura_externa
 * @property int|null $max_humedad_externa
 * @property int|null $min_humedad_externa
 * @property string|null $avg_humedad_externa
 * @property string|null $max_presion_relativa
 * @property string|null $min_presion_relativa
 * @property string|null $avg_presion_relativa
 * @property string|null $max_presion_absoluta
 * @property string|null $min_presion_absoluta
 * @property string|null $avg_presion_absoluta
 * @property string|null $max_velocidad_viento
 * @property string|null $min_velocidad_viento
 * @property string|null $avg_velocidad_viento
 * @property string|null $max_sensacion_termica
 * @property string|null $min_sensacion_termica
 * @property string|null $avg_sensacion_termica
 * @property string|null $lluvia_24_horas_total
 * @property int|null $group_by
 * @property int|null $id_station
 * @property-read \App\Models\Station|null $station
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereAvgHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereAvgHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereAvgPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereAvgPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereAvgSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereAvgTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereAvgTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereAvgVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereGroupBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereIdStation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereLluvia24HorasTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereMaxFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereMaxHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereMaxHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereMaxPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereMaxPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereMaxSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereMaxTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereMaxTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereMaxVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereMinFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereMinHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereMinHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereMinPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereMinPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereMinSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereMinTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereMinTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenDays whereMinVelocidadViento($value)
 */
	class TenDays extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Upload
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload query()
 */
	class Upload extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string $type
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $kobo_id
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKoboId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Xlsform
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $xlsfile
 * @property string|null $kobo_id
 * @property string|null $kobo_version_id
 * @property int $is_active If true, form is active and deployed on Kobotools
 * @property string|null $enketo_url
 * @property string|null $link_page
 * @property string|null $description
 * @property array|null $media
 * @property mixed|null $content
 * @property int $live If true, this form is available to projects to use
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property array $csv_lookups should be an array of objects, each with 2 properties: "mysql_view" and "csv_file"
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Submission[] $submissions
 * @property-read int|null $submissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform query()
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereCsvLookups($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereEnketoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereKoboId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereKoboVersionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereLinkPage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereLive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereMedia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereXlsfile($value)
 */
	class Xlsform extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Yearly
 *
 * @property int|null $id
 * @property string $fecha
 * @property int|null $id_station
 * @property string|null $max_temperatura_interna
 * @property string|null $min_temperatura_interna
 * @property string|null $avg_temperatura_interna
 * @property int|null $max_humedad_interna
 * @property int|null $min_humedad_interna
 * @property string|null $avg_humedad_interna
 * @property string|null $max_temperatura_externa
 * @property string|null $min_temperatura_externa
 * @property string|null $avg_temperatura_externa
 * @property int|null $max_humedad_externa
 * @property int|null $min_humedad_externa
 * @property string|null $avg_humedad_externa
 * @property string|null $max_presion_relativa
 * @property string|null $min_presion_relativa
 * @property string|null $avg_presion_relativa
 * @property string|null $max_presion_absoluta
 * @property string|null $min_presion_absoluta
 * @property string|null $avg_presion_absoluta
 * @property string|null $max_velocidad_viento
 * @property string|null $min_velocidad_viento
 * @property string|null $avg_velocidad_viento
 * @property string|null $max_sensacion_termica
 * @property string|null $min_sensacion_termica
 * @property string|null $avg_sensacion_termica
 * @property string|null $lluvia_24_horas_total
 * @property-read \App\Models\Station|null $station
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly query()
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereAvgHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereAvgHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereAvgPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereAvgPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereAvgSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereAvgTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereAvgTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereAvgVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereIdStation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereLluvia24HorasTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMaxHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMaxHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMaxPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMaxPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMaxSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMaxTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMaxTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMaxVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMinHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMinHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMinPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMinPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMinSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMinTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMinTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMinVelocidadViento($value)
 */
	class Yearly extends \Eloquent {}
}

namespace App{
/**
 * App\Monthly
 *
 * @property int|null $id
 * @property string $fecha
 * @property string $year
 * @property string $month
 * @property int|null $id_station
 * @property string|null $max_temperatura_interna
 * @property string|null $min_temperatura_interna
 * @property string|null $avg_temperatura_interna
 * @property int|null $max_humedad_interna
 * @property int|null $min_humedad_interna
 * @property string|null $avg_humedad_interna
 * @property string|null $max_temperatura_externa
 * @property string|null $min_temperatura_externa
 * @property string|null $avg_temperatura_externa
 * @property int|null $max_humedad_externa
 * @property int|null $min_humedad_externa
 * @property string|null $avg_humedad_externa
 * @property string|null $max_presion_relativa
 * @property string|null $min_presion_relativa
 * @property string|null $avg_presion_relativa
 * @property string|null $max_presion_absoluta
 * @property string|null $min_presion_absoluta
 * @property string|null $avg_presion_absoluta
 * @property string|null $max_velocidad_viento
 * @property string|null $min_velocidad_viento
 * @property string|null $avg_velocidad_viento
 * @property string|null $max_sensacion_termica
 * @property string|null $min_sensacion_termica
 * @property string|null $avg_sensacion_termica
 * @property string|null $lluvia_24_horas_total
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly query()
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereAvgHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereAvgHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereAvgPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereAvgPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereAvgSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereAvgTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereAvgTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereAvgVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereIdStation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereLluvia24HorasTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMaxHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMaxHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMaxPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMaxPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMaxSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMaxTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMaxTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMaxVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMinHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMinHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMinPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMinPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMinSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMinTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMinTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMinVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly whereYear($value)
 */
	class Monthly extends \Eloquent {}
}

namespace App{
/**
 * App\Station
 *
 * @property int $id
 * @property string|null $hardware_id
 * @property string $label
 * @property string $latitude
 * @property string $longitude
 * @property string $altitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|Station newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station query()
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereAltitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereHardwareId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereUpdatedAt($value)
 */
	class Station extends \Eloquent {}
}

namespace App{
/**
 * App\Tendays
 *
 * @property int|null $id
 * @property string|null $min_fecha
 * @property string|null $max_fecha
 * @property string|null $max_temperatura_interna
 * @property string|null $min_temperatura_interna
 * @property string|null $avg_temperatura_interna
 * @property int|null $max_humedad_interna
 * @property int|null $min_humedad_interna
 * @property string|null $avg_humedad_interna
 * @property string|null $max_temperatura_externa
 * @property string|null $min_temperatura_externa
 * @property string|null $avg_temperatura_externa
 * @property int|null $max_humedad_externa
 * @property int|null $min_humedad_externa
 * @property string|null $avg_humedad_externa
 * @property string|null $max_presion_relativa
 * @property string|null $min_presion_relativa
 * @property string|null $avg_presion_relativa
 * @property string|null $max_presion_absoluta
 * @property string|null $min_presion_absoluta
 * @property string|null $avg_presion_absoluta
 * @property string|null $max_velocidad_viento
 * @property string|null $min_velocidad_viento
 * @property string|null $avg_velocidad_viento
 * @property string|null $max_sensacion_termica
 * @property string|null $min_sensacion_termica
 * @property string|null $avg_sensacion_termica
 * @property string|null $lluvia_24_horas_total
 * @property int|null $group_by
 * @property int|null $id_station
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereAvgHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereAvgHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereAvgPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereAvgPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereAvgSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereAvgTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereAvgTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereAvgVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereGroupBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereIdStation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereLluvia24HorasTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereMaxFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereMaxHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereMaxHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereMaxPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereMaxPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereMaxSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereMaxTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereMaxTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereMaxVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereMinFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereMinHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereMinHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereMinPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereMinPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereMinSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereMinTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereMinTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tendays whereMinVelocidadViento($value)
 */
	class Tendays extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string $type
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $kobo_id
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKoboId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Yearly
 *
 * @property int|null $id
 * @property string $fecha
 * @property int|null $id_station
 * @property string|null $max_temperatura_interna
 * @property string|null $min_temperatura_interna
 * @property string|null $avg_temperatura_interna
 * @property int|null $max_humedad_interna
 * @property int|null $min_humedad_interna
 * @property string|null $avg_humedad_interna
 * @property string|null $max_temperatura_externa
 * @property string|null $min_temperatura_externa
 * @property string|null $avg_temperatura_externa
 * @property int|null $max_humedad_externa
 * @property int|null $min_humedad_externa
 * @property string|null $avg_humedad_externa
 * @property string|null $max_presion_relativa
 * @property string|null $min_presion_relativa
 * @property string|null $avg_presion_relativa
 * @property string|null $max_presion_absoluta
 * @property string|null $min_presion_absoluta
 * @property string|null $avg_presion_absoluta
 * @property string|null $max_velocidad_viento
 * @property string|null $min_velocidad_viento
 * @property string|null $avg_velocidad_viento
 * @property string|null $max_sensacion_termica
 * @property string|null $min_sensacion_termica
 * @property string|null $avg_sensacion_termica
 * @property string|null $lluvia_24_horas_total
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly query()
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereAvgHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereAvgHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereAvgPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereAvgPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereAvgSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereAvgTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereAvgTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereAvgVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereIdStation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereLluvia24HorasTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMaxHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMaxHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMaxPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMaxPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMaxSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMaxTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMaxTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMaxVelocidadViento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMinHumedadExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMinHumedadInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMinPresionAbsoluta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMinPresionRelativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMinSensacionTermica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMinTemperaturaExterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMinTemperaturaInterna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Yearly whereMinVelocidadViento($value)
 */
	class Yearly extends \Eloquent {}
}

