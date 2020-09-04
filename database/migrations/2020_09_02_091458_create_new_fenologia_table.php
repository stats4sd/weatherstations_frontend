<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewFenologiaTable extends Migration
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
            $table->unsignedBigInteger('comunidad_id');
            $table->string('parcela_id');
            $table->unsignedBigInteger('cultivo_id');
            $table->unsignedBigInteger('variedad_id')->nullable();
            $table->integer('epoca_siembra')->nullable();
            $table->date('fecha_siembra')->nullable();
            $table->date('fecha_emergencia')->nullable();
            $table->date('fecha_hojas')->nullable();
            $table->date('fecha_floracion')->nullable();
            $table->date('fecha_fructificacion')->nullable();
            $table->date('fecha_maduracion')->nullable();
            $table->date('fecha_cosecha')->nullable();
            $table->integer('edad_plantacion')->nullable();
            $table->date('fecha_dormida')->nullable();
            $table->date('fecha_hinchada')->nullable();
            $table->date('fecha_cuajado')->nullable();
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
        Schema::dropIfExists('fenologia');
    }
}
