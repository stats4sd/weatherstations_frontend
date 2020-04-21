<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoil3MoistToDataDataPreviewMeteobridge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data', function (Blueprint $table) {
            $table->decimal('soil_3_moist')->nullable();
        });
        Schema::table('data_template', function (Blueprint $table) {
            $table->decimal('soil_3_moist')->nullable();
        });
        Schema::table('meteobridge', function (Blueprint $table) {
            $table->decimal('soil_3_moist')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
