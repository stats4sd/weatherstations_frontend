<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeletePrimaryKeysToCoordinateMeteobrige extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meteobridge', function (Blueprint $table) {
            $table->integer('id')->change();
            $table->dropPrimary(['id','latitude', 'longitude']);
            
            $table->primary('id');
          

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meteobrige', function (Blueprint $table) {
            //
        });
    }
}
