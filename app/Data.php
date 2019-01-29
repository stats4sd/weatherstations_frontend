<?php

namespace App;

use App\Station;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    public $primaryKey ='id';
    protected $table = 'data';

    public function station ()
    {
    	return $this->belongsTo(Station::class,'id_station');
    }
}
