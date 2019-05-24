<?php

namespace App\Http\Controllers;

use Alert;
use App\Data;
use App\Models\DataTemplate;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DataTemplateController extends Controller
{
	public function checkTempExterna()
	{
		$celsius = true;  
		$max_temp_externa = DB::select('select max(temperatura_externa) from data_template');
		// $value = $_POST['max(temperatura_externa)'];
		$max_temp_externa=19.20;
		if($max_temp_externa < 32){
			$celsius = true;
		}else {
			$celsius = false;
		}
		return $celsius;
		
	}
    public function checkvalue()
    {
    	if($this->checkTempExterna()==1){
    		\Alert::success('The temperatura externa is in Celsius')->flash();
		} else {
			\Alert::error('<h4>Error Message</h4><p>The following version is still in use.</p><p>Please edit the status in Versions and in Datasets before to delete.</p>')->flash();
      		// return Redirect::to('admin/dataset');
		}
    	
    	return Redirect::back();
    }
    public function storeFile()
    {
    	$data_template = DB::select('select * from data_template');
    	//return $data_template;
    	foreach ($data_template as $value) {
    		//updateOrInsert
    		DB::table('data')->insert(
    			['fecha_hora'=> $value->fecha_hora, 
    			'id_station' => $value->id_station]);
    	}

    	DB::table('data_template')->delete();

    	
    	return Redirect::back();

    }
}
