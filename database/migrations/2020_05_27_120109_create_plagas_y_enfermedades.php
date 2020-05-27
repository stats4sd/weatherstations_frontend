<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlagasYEnfermedades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plagas_y_enfermedades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('comunidad_id');
            $table->integer('cultivo_id');
            $table->integer('variedad_id');
            $table->string('plaga_incidencia');
            $table->decimal('plaga_severidad');
            $table->string('unidad');
            $table->string('enfermedad_incidencia');
            $table->string('sitio_de_control');
            $table->string('tipo_de_control');
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
        Schema::table('plagas_y_enfermedades', function (Blueprint $table) {
            //
        });
    }
}
