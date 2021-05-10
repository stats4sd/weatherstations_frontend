<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoilSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soil_samples', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->date('fecha_muestreo')->nullable();
            $table->string('persona_de_contacto')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->string('nombre_propietario')->nullable();
            $table->decimal('latitude', 9,6)->nullable();
            $table->decimal('longitude', 9,6)->nullable();
            $table->decimal('altitude', 9,6)->nullable();
            $table->unsignedBigInteger('region')->nullable();
            $table->unsignedBigInteger('departamento')->nullable();
            $table->unsignedBigInteger('municipio')->nullable();
            $table->unsignedBigInteger('comunidad')->nullable();
            $table->unsignedBigInteger('area_m2')->nullable();
            $table->string('profunidad_muestreo')->nullable();
            $table->string('rocas_gravas')->nullable();
            $table->string('descanso')->nullable();
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
        Schema::dropIfExists('soil_samples');
    }
}
