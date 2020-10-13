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
            $table->string('select_multiple_other')->nullable()->comment('the name of the "enter other value" question linked to the select_multiple variable');
            $table->string('select_multiple_other_label')->nullable()->comment('the variable name that contains the "specify other" question. (This is so we can pull in the user-specified label)');
            $table->string('repeat_group')->nullable()->comment('the name of the repeat group to look inside to find the main variables for this data map');
            $table->string('inner_name')->nullable()->comment('the variable name of the calculate with the `selected-at(pos(..))` code (inside the repeat group)');
            $table->string('innter_label')->nullable()->comment('the variable name of the calculate with the `jr:choice-name()` code (inside the repeat group)');
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
            $table->dropColumn('select_multiple_other');
            $table->dropColumn('select_multiple_other_label');
            $table->dropColumn('repeat_group');
            $table->dropColumn('inner_name');
            $table->dropColumn('innter_label');
        });
    }
}
