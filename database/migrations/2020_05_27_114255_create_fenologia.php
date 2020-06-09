<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFenologia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fenologia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('comunidad_id');
            $table->integer('variedad_id');
            $table->date('fecha_siembra');
            $table->date('fecha_emergencia');
            $table->date('fecha_floracion');
            $table->date('fecha_maduracion');
            $table->string('floracion_cultivo_perenne');
            $table->date('cuajado_fruto_perenne');
            $table->date('fecha_cosecha');
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
        Schema::table('fenologia', function (Blueprint $table) {
            //
        });
    }
}
