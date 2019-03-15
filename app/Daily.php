<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
    protected $table = 'daily_data';
    protected $fillable = ['max_temperature_interna','min_temperature_interna'];
}
