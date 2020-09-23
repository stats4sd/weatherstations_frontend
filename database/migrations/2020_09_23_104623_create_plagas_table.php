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
            $table->string('plaga_nombre')->nullable();
            $table->decimal('cantidad_insectos_m2')->nullable();
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
