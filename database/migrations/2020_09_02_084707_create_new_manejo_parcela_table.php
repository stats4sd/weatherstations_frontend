<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewManejoParcelaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manejo_parcela', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('comunidad_id');
            $table->string('parcela_id');
            $table->string('tipo_fertilización_suelo');
            $table->string('sistema_riego');
            $table->string('metodo_preparacion_suelo');
            $table->integer('deshierbe');
            $table->integer('aporque');
            $table->integer('podas');
            $table->string('tipo_fumigaciones_para_crecimiento');
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
        Schema::dropIfExists('manejo_parcela');
    }
}
