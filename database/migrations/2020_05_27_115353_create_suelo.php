<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuelo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suelo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('comunidad_id');
            $table->integer('parcela_id');
            $table->string('materia_organica');
            $table->string('textura');
            $table->integer('pH');
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
        Schema::table('suelo', function (Blueprint $table) {
            //
        });
    }
}
