<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plagas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cultivo_id');
            $table->string('name')->nullable();
            $table->decimal('cantidad_insectos_m2')->nullable();
            $table->decimal('cantidad_larvas')->nullable();
            $table->integer('mosca_numero')->nullable();
            $table->integer('mosca_trampas')->nullable();
            $table->integer('mosca_dias')->nullable();
            $table->integer('presencia_mosca')->nullable();
            $table->date('plaga_fecha')->nullable();
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
        Schema::dropIfExists('plagas');
    }
}
