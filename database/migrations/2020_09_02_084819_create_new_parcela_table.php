<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewParcelaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcela', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->integer('comunidad_id');
            $table->bigInteger('submission_id');
            $table->decimal('area_m2');
            $table->string('area_originale');
            $table->string('image');
            $table->string('pendiente');
            $table->string('drenaje');
            $table->string('salinidad');
            $table->decimal('latitude', 9,6);
            $table->decimal('longitude', 9,6);
            $table->decimal('altitude', 9,2);
            $table->decimal('accuracy', 9,2);
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
        Schema::dropIfExists('parcela');
    }
}
