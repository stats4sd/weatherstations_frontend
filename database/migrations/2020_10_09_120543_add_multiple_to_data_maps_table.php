<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleToDataMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_maps', function (Blueprint $table) {
            $table->string('select_multiple')->nullable()->comment('if this is set, this data map is for data at a different level, based on a select_multiple and possibly a repeat group based on that select_multiple response.');
            $table->string('repeat_group')->nullable()->comment('the name of the repeat group to look inside to find the main variables for this data map');
            $table->string('select_multiple_other')->nullable()->comment('the name of the "enter other value" question linked to the select_multiple variable');
            $table->string('inner_name')->nullable()->comment('the jr:choice-name() calculate field that is inside the repeat group. This is used so that we know where to place the "other" name in case there is an "other" option in the select_multiple');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_maps', function (Blueprint $table) {
            $table->dropColumn('select_multiple');
            $table->dropColumn('repeat_group');
        });
    }
}
