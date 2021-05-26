<?php

namespace App\Models;

use App\Models\Station;
use App\Models\Observation;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use LaravelTreats\Model\Traits\HasCompositePrimaryKey;

class Data extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------
    */

    # use HasCompositePrimaryKey;
    protected $primaryKey = 'id';
    protected $table = 'data';
    protected $guarded = ['id'];


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function station()
    {
        return $this->belongsTo(Station::class, 'id_station');
    }

    public function observation()
    {
        return $this->belongsTo(Observation::class, 'observation_id');
    }


    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
