<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewPlagasYEnfermedadesTable extends Migration
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
            $table->string('parcela_id');
            $table->integer('cultivo_id');
            $table->integer('variedad_id')->nullable();
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
        Schema::dropIfExists('plagas_y_enfermedades');
    }
}
