<?php

namespace App\Models;

use App\Models\Station;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
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
    //protected $fillable = ['id_station'];

    
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function station ()
    {
        return $this->belongsTo(Station::class,'id_station');
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
