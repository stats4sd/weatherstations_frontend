<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcela', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('comunidad_id');
            $table->string('code');
            $table->decimal('superficie_m2');
            $table->decimal('superficie_originale');
            $table->string('unidad');
            $table->polygon('poligono_gps');
            $table->string('pendiente');
            $table->string('drenaje');
            $table->integer('salinidad');
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
        Schema::table('parcela', function (Blueprint $table) {
            //
        });
    }
}
