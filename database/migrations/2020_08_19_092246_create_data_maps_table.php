<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_maps', function (Blueprint $table) {
            $table->string('id');
            $table->string('title');
            $table->json('variables'); // ['name', 'label', 'type' (string, longtext, int, decimal, date, timestamp, boolean)]
            $table->string('model');
            $table->boolean('location')->default(0);
            $table->timestamps();
        });
        Schema::table('xls_forms', function (Blueprint $table) {
            $table->string('data_map_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_maps');
        Schema::table('xls_forms', function(Blueprint $table) {
            $table->dropColumn('data_map_id');
        });
    }
}
