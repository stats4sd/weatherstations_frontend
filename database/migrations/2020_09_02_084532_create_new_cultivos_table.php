<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewCultivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cultivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lkp_cultivo_id');
            $table->unsignedBigInteger('lkp_variedad_id')->nullable();
            $table->unsignedBigInteger('parcela_id');
            $table->string('propiedad_cultivo')->nullable();
            $table->string('propiedad_variedad')->nullable();
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
        Schema::dropIfExists('cultivos');
    }
}
