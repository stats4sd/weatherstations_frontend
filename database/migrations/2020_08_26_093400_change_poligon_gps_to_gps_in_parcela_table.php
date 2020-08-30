<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePoligonGpsToGpsInParcelaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parcela', function (Blueprint $table) {
            $table->decimal('latitude', 9,6)->after('unidad');
            $table->decimal('longitude', 9,6)->after('latitude');
            $table->decimal('altitude', 9,2)->after('longitude');
            $table->decimal('accuracy', 9,2)->after('altitude');
            $table->dropColumn('poligono_gps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parcela', function (Blueprint $table) {
            //
        });
    }
}
