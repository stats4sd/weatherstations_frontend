<?php

namespace App;

use App\Station;
use \LaravelTreats\Model\Traits\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Model;


class Data extends Model

{
	use HasCompositePrimaryKey;
    protected $primaryKey = array('fecha_hora','id_station');
    protected $table = 'data';

    public function station ()
    {

    	return $this->belongsTo(Station::class,'id_station');
    }
}
