<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifiesToParcela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parcela', function (Blueprint $table) {
            $table->dropColumn('unidad');
            $table->dropColumn('superficie_originale');
            $table->renameColumn('superficie_hectareas', 'area_m2');
            $table->string('area_originale')->before('latitude');
            $table->string('salinidad')->change();

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
            
        });
    }
}
