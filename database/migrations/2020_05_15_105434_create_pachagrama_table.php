<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePachagramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pachagrama', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('comunidad_id');
            $table->string('farmer_id');
            $table->integer('intensidad_helada');
            $table->integer('intensidad_lluvia');
            $table->integer('intensidad_granizada');
            $table->integer('intensidad_radiacion_solar');
            $table->date('fecha_siembra');
            $table->date('fecha_emergencia');
            $table->date('fecha_floracion');
            $table->date('fecha_maduracion');
            $table->integer('cultivo_id');
            $table->integer('variedad_id');
            $table->bigInteger('submission_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pachagrama');
    }
}
