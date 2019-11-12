<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\DataTemplate;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Process\Process;
use Exception;

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

		} elseif($pression_unit=="mmhg")
		{
			$press_hpa = $value*1.3332239;
			return round($value*1.3332239, 2);
		}
		
	}
	public function convertkmOrMToMs($value)
	{
		$veloc_viento_unit = Session::get('veloc_viento_unit');
		if($veloc_viento_unit=="km/h")
		{
			$veloc_viento_ms = $value*0.277778;
			return round($veloc_viento_ms, 2);

		} elseif($veloc_viento_unit=="mph")
		{
			$veloc_viento_ms = $value*0.44704;
			return round($veloc_viento_ms, 2);
		}	
	}

	public function convertInchToMm($value)
	{
		$rain_mm = $value*25.4;
		return round($rain_mm, 2);

	}
	public function convertDataInchToMm()
	{
		set_time_limit(0);
		$precip_unit = Session::get('precip_unit');
		$data_template = DB::select('select fecha_hora, id_station, lluvia_hora, lluvia_24_horas, lluvia_semana, lluvia_mes, lluvia_total, rain from data_template');
		if($precip_unit != "mm")
		{
			foreach ($data_template as $value) {
				
				$lluvia_hora_round = $this->convertInchToMm($value->lluvia_hora);
				$lluvia_24_horas_round = $this->convertInchToMm($value->lluvia_24_horas);
				$lluvia_semana_round = $this->convertInchToMm($value->lluvia_semana);
				$lluvia_mes_round = $this->convertInchToMm($value->lluvia_mes);
				$lluvia_total_round = $this->convertInchToMm($value->lluvia_total);
				$rain_round = $this->convertInchToMm($value->rain);

				
				DB::table('data_template')
								->where('fecha_hora','=', $value->fecha_hora)
								->where('id_station', '=',$value->id_station)
								->update(
							[
								'lluvia_hora' => $lluvia_hora_round, 
								'lluvia_24_horas' => $lluvia_24_horas_round,
								'lluvia_semana' => $lluvia_semana_round,
								'lluvia_mes' => $lluvia_mes_round,
								'lluvia_total' => $lluvia_total_round,
								'rain' => $rain_round
						]);
					\Alert::success('La lluvia_hora, lluvia_24_horas, lluvia_semana, lluvia_mes y lluvia_total se han convertido a mm.')->flash();
			}


		}else 
			{
				\Alert::warning('La lluvia_hora, lluvia_24_horas, lluvia_semana, lluvia_mes y lluvia_total está en mm de acuerdo con el usuario que cargó los datos.')->flash();
			}

		return Redirect::back();


	}

	public function convertDatakmOrMToMs()
	{
		set_time_limit(0);
		$veloc_viento_unit = Session::get('veloc_viento_unit');
		$data_template = DB::select('select fecha_hora, id_station, velocidad_viento, rafaga, hi_speed from data_template');
		if($veloc_viento_unit!="m/s")
		{
			foreach ($data_template as $value) 
			{
				$velocidad_viento_round = $this->convertkmOrMToMs($value->velocidad_viento);
				$rafaga_round = $this->convertkmOrMToMs($value->rafaga);
				$hi_speed_round = $this->convertkmOrMToMs($value->hi_speed);

				DB::table('data_template')
								->where('fecha_hora','=', $value->fecha_hora)
								->where('id_station', '=',$value->id_station)
								->update(
							[
								'velocidad_viento' => $velocidad_viento_round, 
								'rafaga' => $rafaga_round,
								'hi_speed' => $hi_speed_round
						]);
					\Alert::success('La velocidad del viento, rafaga y hi_speed se han convertido a m/s.')->flash();
			}


		}else 
			{
				\Alert::warning('La velocidad_viento, rafaga y hi_speed está en m/s de acuerdo con el usuario que cargó los datos.')->flash();

			}

		return Redirect::back();
	}
	
	public function convertDataInhgOrMmhgToHpa()
	{
		set_time_limit(0);
		$pression_unit = Session::get('pression_unit');
		$data_template = DB::select('select fecha_hora, id_station, presion_relativa, presion_absoluta from data_template');

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
					\Alert::success('La presión relativa y absoluta se ha convertido a la hpa.')->flash();
				}
			}else 
			{
				\Alert::warning('La presión relativa y absoluta está en hPa de acuerdo con el usuario que cargó los datos.')->flash();

			}
		return Redirect::back();

	}


	public function convertDataFtoC()
	{
		set_time_limit(0);
		$temp_unit = Session::get('temp_unit');
		
		if($temp_unit=='F')
		{
			$data_template = DB::select('select fecha_hora, id_station, temperatura_interna, temperatura_externa, sensacion_termica, punto_rocio, wind_chill, hi_temp, low_temp from data_template');
			foreach ($data_template as $value) 
			{
				$temp_interna_round = $this->convertFahrenheitToCelsius($value->temperatura_interna);

				$temp_externa_round = $this->convertFahrenheitToCelsius($value->temperatura_externa);

				$sensacion_term_round = $this->convertFahrenheitToCelsius($value->sensacion_termica);

				$punto_rocio_round = $this->convertFahrenheitToCelsius($value->punto_rocio);

				$wind_chill_round = $this->convertFahrenheitToCelsius($value->wind_chill);

				$hi_temp_round = $this->convertFahrenheitToCelsius($value->hi_temp);

				$low_temp_round = $this->convertFahrenheitToCelsius($value->low_temp);

					DB::table('data_template')
							->where('fecha_hora','=', $value->fecha_hora)
							->where('id_station', '=',$value->id_station)
							->update(
						[
							'temperatura_interna' => $temp_interna_round, 
							'temperatura_externa' => $temp_externa_round,
							'sensacion_termica' => $sensacion_term_round,
							'punto_rocio' => $punto_rocio_round,
							'wind_chill' => $wind_chill_round,
							'hi_temp' => $hi_temp_round,
							'low_temp' => $low_temp_round
					]);
				\Alert::success('La temperatura interna y externa se ha convertido a grados Celsius.')->flash();


			}
			
		} else {
			\Alert::warning('La temperatura interna y externa están en grados centígrados según el usuario que cargó los datos.')->flash();
		}

		return Redirect::back();
		
	}



    public function checkvalue()
    {
    	
    	$this->convertDataFtoC();
    	
    	return Redirect::back();
    }
    public function storeFile()
    {

    	$data_template = DB::select('select * from data_template');
    	$scriptPath = base_path() . '/scripts/storeData.py';
    
		
		try {

		$process = new Process("python3.7 {$scriptPath}");

        $process->run();
    	
    	} catch(Exception $e) {

           $message = $e->getMessage();
     
        	\Alert::error("".substr($message, 0, 112)."")->flash();

    	}	finally {

  			\Alert::success('Los datos han sido ingresados ​​exitosamente.')->flash();

		}	
 	
    	return Redirect::back();

    }

    public function cleanTable()
    {
    	DB::table('data_template')->delete();
    	\Alert::success('Los datos han sido eliminados.')->flash();
    	return Redirect::back();

    }
    
}
