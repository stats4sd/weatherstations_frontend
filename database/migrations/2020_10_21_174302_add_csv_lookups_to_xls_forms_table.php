<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCsvLookupsToXlsFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('xls_forms', function (Blueprint $table) {
            $table->json('csv_lookups')->comment('should be an array of objects, each with 2 properties: "mysql_view" and "csv_file"');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('xls_forms', function (Blueprint $table) {
            $table->dropColumn('csv_lookups');
        });
    }
}
