<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class LkpCultivo extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'lkp_cultivos';
    protected $guarded = ['created_at'];
    public $incrementing = false;
   

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function cultivos()
    {
        return $this->hasMany(Cultivo::class);
    }

    public function variedad()
    {
        return $this->hasMany(LkpVariedad::class);
    }
}
