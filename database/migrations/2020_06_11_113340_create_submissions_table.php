<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid',255);
            $table->bigInteger('xlsform_id');
            $table->json('content');
            $table->dateTime('fecha_hora');
            $table->decimal('latitude', 9,6);
            $table->decimal('longitude', 9,6);
            $table->decimal('altitude', 9,6);
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
        Schema::dropIfExists('submissions');
    }
}
