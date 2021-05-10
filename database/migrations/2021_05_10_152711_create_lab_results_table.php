<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('soil_sample_id')->nullable();
            $table->string('code')->nullable();
            $table->string('densidad_real')->nullable();
            $table->string('densidad_aparente')->nullable();
            $table->string('humedad_gravimetrica')->nullable();
            $table->string('textura')->nullable();
            $table->string('ph_agua')->nullable();
            $table->string('ph_k_cl')->nullable();
            $table->string('acidez')->nullable();
            $table->string('ce')->nullable();
            $table->string('carbonatos_libres')->nullable();
            $table->string('calcio_intercambiable')->nullable();
            $table->string('magnesio')->nullable();
            $table->string('potasio')->nullable();
            $table->string('sodio')->nullable();
            $table->string('intercambio_cationico')->nullable();
            $table->string('materia_organica')->nullable();
            $table->string('carbono_organico')->nullable();
            $table->string('fosforo')->nullable();
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
        Schema::dropIfExists('lab_results');
    }
}
