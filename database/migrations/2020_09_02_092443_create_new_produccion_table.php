<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewProduccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendimento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('comunidad_id');
            $table->string('parcela_id');
            $table->unsignedBigInteger('cultivo_id');
            $table->unsignedBigInteger('variedad_id')->nullable();
            $table->decimal('cantidad_cosechada_kg')->nullable();
            $table->decimal('superficie_cosechada_m2')->nullable();
            $table->decimal('rendimiento_cultivo')->nullable();
            $table->decimal('peso_muestra_tuberculos')->nullable();
            $table->decimal('peso_danados_tuberculos')->nullable();
            $table->decimal('porcentaje_gorgojo')->nullable();
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
        Schema::dropIfExists('produccion');
    }
}
