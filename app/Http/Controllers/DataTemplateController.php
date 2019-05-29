<?php

namespace App\Http\Controllers;

use Alert;
use App\Data;
use App\Models\DataTemplate;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DataTemplateController extends Controller
{
	public function convertFahrenheitToCelsius($value)
	{
		$temp_celsius = (($value-32)*5/9);
		return round($temp_celsius, 2);
	}

	public function convertInhgOrMmhgToHpa($value)
	{
		$pression_unit = Session::get('pression_unit');
		if($pression_unit=="inhg")
		{
			$press_hpa = $value*33.863886666667;
			return round($value*33.863886666667, 2);

		}elseif($pression_unit=="mmhg")
		{
			$press_hpa = $value*1.3332239;
			return round($value*1.3332239);
		}
		
	}
	public function convertDataInhgOrMmhgToHpa()
	{
		set_time_limit(0);
		$pression_unit = Session::get('pression_unit');
		$data_template = DB::select('select fecha_hora, id_station, presion_relativa, presion_absoluta from data_template');
		//dd($pression_unit);
			if($pression_unit!="hpa")
			{
				foreach ($data_template as $value) 
				{
					$pression_relativa_round = $this->convertInhgOrMmhgToHpa($value->presion_relativa);

					$pression_absoluta_round = $this->convertInhgOrMmhgToHpa($value->presion_absoluta);

						DB::table('data_template')
								->where('fecha_hora','=', $value->fecha_hora)
								->where('id_station', '=',$value->id_station)
								->update(
							[
								'presion_relativa' => $pression_relativa_round, 
								'presion_absoluta' => $pression_absoluta_round,
						]);
					\Alert::success('La temperatura interna y externa se ha convertido a grados Celsius.')->flash();
				}
			}
		return Redirect::back();

	}


	public function convertDataFtoC()
	{
		set_time_limit(0);
		$temp_unit = Session::get('temp_unit');
		
		if($temp_unit=='F')
		{
			$data_template = DB::select('select fecha_hora, id_station, temperatura_interna, temperatura_externa, sensacion_termica, punto_rocio from data_template');
			foreach ($data_template as $value) 
			{
				$temp_interna_round = $this->convertFahrenheitToCelsius($value->temperatura_interna);

				$temp_externa_round = $this->convertFahrenheitToCelsius($value->temperatura_externa);

				$sensacion_term_round = $this->convertFahrenheitToCelsius($value->sensacion_termica);

				$punto_rocio_round = $this->convertFahrenheitToCelsius($value->punto_rocio);

					DB::table('data_template')
							->where('fecha_hora','=', $value->fecha_hora)
							->where('id_station', '=',$value->id_station)
							->update(
						[
							'temperatura_interna' => $temp_interna_round, 
							'temperatura_externa' => $temp_externa_round,
							'sensacion_termica' => $sensacion_term_round,
							'punto_rocio' => $punto_rocio_round
					]);
				\Alert::success('La temperatura interna y externa se ha convertido a grados Celsius.')->flash();


			}
			return true;
		} else {
			\Alert::error('La temperatura interna y externa están en grados centígrados según el usuario que cargó los datos.')->flash();
		}

		return false;
		
	}


	


    public function checkvalue()
    {
    	
    	$this->convertDataFtoC();
    	
    	return Redirect::back();
    }
    public function storeFile()
    {

    	$data_template = DB::select('select * from data_template');
    	
		set_time_limit(0);
		

    	foreach ($data_template as $value) {
    		//updateOrInsert
    		
    		//DB::insert('INSERT INTO data (fecha_hora, intervalo, id_station) VALUES ('.$value->fecha_hora.', 15'.','.$value->id_station. ')');

    		DB::table('data')->insert(
    			[ 	
    				'fecha_hora'=> $value->fecha_hora, 
    			 	'intervalo' => $value->intervalo,
    			 	'temperatura_interna' => $value->temperatura_interna,
    			 	'humedad_interna' => $value->humedad_interna,
    			 	'temperatura_externa' => $value->temperatura_externa,
    			 	'humedad_externa' => $value->humedad_externa,
    			 	'presion_relativa' => $value->presion_relativa,
    			 	'presion_absoluta' => $value->presion_absoluta,
    			 	'velocidad_viento' => $value->velocidad_viento,
    			 	'sensacion_termica' => $value->sensacion_termica,
    			 	'rafaga' => $value->rafaga,
    			 	'direccion_del_viento' => $value->rafaga,
    			 	'punto_rocio' => $value->rafaga,
    			 	'lluvia_hora' => $value->lluvia_hora,
    			 	'lluvia_24_horas' => $value->lluvia_24_horas,
    			 	'lluvia_semana' => $value->lluvia_semana,
    			 	'lluvia_mes' => $value->lluvia_mes,
    			 	'lluvia_total' => $value->lluvia_total,
    			 	'hi_temp' => $value->hi_temp,
    			 	'low_temp' => $value->low_temp,
    			 	'wind_cod' => $value->wind_cod,
    			 	'wind_run' => $value->wind_run,
    			 	'hi_speed' => $value->hi_speed,
    			 	'hi_dir' => $value->hi_dir,
    			 	'wind_cod_dom' => $value->wind_cod_dom,
    			 	'wind_chill' => $value->wind_chill,
    			 	'index_heat' => $value->index_heat,
    			 	'index_thw' => $value->index_thw,
    			 	'index_thsw' => $value->index_thsw,
    			 	'rain' => $value->rain,
    			 	'solar_rad' => $value->solar_rad,
    			 	'solar_energy' => $value->solar_energy,
    			 	'radsolar_max' => $value->radsolar_max,
    			 	'uv_index' => $value->uv_index,
    			 	'uv_dose' => $value->uv_dose,
    			 	'uv_max' => $value->uv_max,
    			 	'heat_days_d' => $value->heat_days_d,
    			 	'cool_days_d' => $value->cool_days_d,
    			 	'in_dew' => $value->in_dew,
    			 	'in_heat' => $value->in_heat,
    			 	'in_emc' => $value->in_emc,
    			 	'in_air_density' => $value->in_air_density,
    			 	'evapotran' => $value->evapotran,
    			 	'soil_1_moist' => $value->soil_1_moist,
    			 	'soil_2_moist' => $value->soil_2_moist,
    			 	'leaf_wet1' => $value->leaf_wet1,
    			 	'wind_samp' => $value->wind_samp,
    			 	'wind_tx' => $value->wind_tx,
    			 	'iss_recept' => $value->iss_recept,
    			 	'id_station' => $value->id_station
    		]);
    	}
       	
    	return Redirect::back();

    }
    public function cleanTable()
    {
    	DB::table('data_template')->delete();
    	return Redirect::back();
    }
}
