<?php

namespace App;

use App\Station;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use \LaravelTreats\Model\Traits\HasCompositePrimaryKey;


class Data extends Model

{
	use CrudTrait;
	use HasCompositePrimaryKey;
    protected $primaryKey = array('fecha_hora','id_station');
    protected $table = 'data';
   // protected $guarded = ['id'];
    protected $fillable = ['id_station'];
    public function station ()
    {

    	return $this->belongsTo(Station::class,'id_station');
    }
}
