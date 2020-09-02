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
            $table->integer('comunidad_id');
            $table->string('parcela_id');
            $table->integer('cultivo_id');
            $table->integer('variedad_id')->nullable();
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
        Schema::dropIfExists('fenologia');
    }
}
