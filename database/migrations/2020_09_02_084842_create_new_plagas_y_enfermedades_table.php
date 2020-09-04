<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewPlagasYEnfermedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plagas_y_enfermedades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('comunidad_id');
            $table->string('parcela_id');
            $table->unsignedBigInteger('cultivo_id');
            $table->unsignedBigInteger('variedad_id')->nullable();
            $table->string('problema')->nullable();
            $table->string('plaga_nombre')->nullable();
            $table->decimal('cantidad_insectos_m2')->nullable();
            $table->date('plaga_fecha')->nullable();
            $table->string('enfermedad_nombre')->nullable();
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
        Schema::dropIfExists('plagas_y_enfermedades');
    }
}
