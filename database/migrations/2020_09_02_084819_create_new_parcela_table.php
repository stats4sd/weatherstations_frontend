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
            $table->unsignedBigInteger('comunidad_id');
            $table->date('fecha')->nullable();
            $table->string('area_originale')->nullable();
            $table->decimal('area_m2')->nullable();
            $table->decimal('pendiente')->nullable();
            $table->integer('drenaje')->nullable();
            $table->integer('salinidad')->nullable();
            $table->decimal('latitude', 9,6);
            $table->string('image')->nullable();
            $table->decimal('longitude', 9,6);
            $table->decimal('altitude', 9,2);
            $table->decimal('accuracy', 9,2);
            $table->unsignedBigInteger('submission_id');
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
