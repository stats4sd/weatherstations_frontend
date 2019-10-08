<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
class Yearly extends Model
{
	 use CrudTrait;

     protected $table = 'yearly_data';
}
