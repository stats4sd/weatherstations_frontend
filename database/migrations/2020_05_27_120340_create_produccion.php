<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produccion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('comunidad_id');
            $table->integer('cultivo_id');
            $table->integer('variedad_id');
            $table->string('cantidad_cosechada');
            $table->string('cantidad_cosechada_original');
            $table->string('unidad');
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
        Schema::table('produccion', function (Blueprint $table) {
            //
        });
    }
}
