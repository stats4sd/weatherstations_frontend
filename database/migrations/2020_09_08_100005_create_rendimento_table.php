<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRendimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendimentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cultivo_id');
            $table->decimal('cantidad_cosechada_kg')->nullable();
            $table->decimal('superficie_cosechada_m2')->nullable();
            $table->decimal('plantas_cosechada')->nullable();
            $table->decimal('peso_muestra_tuberculos')->nullable();
            $table->decimal('peso_danados_tuberculos')->nullable();
            $table->decimal('peso_muestra_grano')->nullable();
            $table->decimal('peso_danado_grano')->nullable();
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
        Schema::dropIfExists('rendimento');
    }
}
