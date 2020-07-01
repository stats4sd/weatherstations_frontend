<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraFiledsForSensors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data', function (Blueprint $table) {
            
            $table->decimal('soil_4_moist')->nullable()->after('soil_3_moist');
            $table->decimal('soil_temp_3')->nullable()->after('soil_temp_2');
            $table->decimal('soil_temp_4')->nullable()->after('soil_temp_3');
            $table->decimal('leaf_temp_3')->nullable()->after('leaf_temp_2');
            $table->decimal('leaf_temp_4')->nullable()->after('leaf_temp_3');
            $table->decimal('leaf_wet2')->nullable()->after('leaf_wet1');
            $table->decimal('leaf_wet3')->nullable()->after('leaf_wet2');
            $table->decimal('leaf_wet4')->nullable()->after('leaf_wet3');
        });

        Schema::table('data_template', function (Blueprint $table) {

            $table->decimal('soil_4_moist')->nullable()->after('soil_3_moist');
            $table->decimal('soil_temp_3')->nullable()->after('soil_temp_2');
            $table->decimal('soil_temp_4')->nullable()->after('soil_temp_3');
            $table->decimal('leaf_temp_3')->nullable()->after('leaf_temp_2');
            $table->decimal('leaf_temp_4')->nullable()->after('leaf_temp_3');
            $table->decimal('leaf_wet2')->nullable()->after('leaf_wet1');
            $table->decimal('leaf_wet3')->nullable()->after('leaf_wet2');
            $table->decimal('leaf_wet4')->nullable()->after('leaf_wet3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data', function (Blueprint $table) {
            //
        });
    }
}
