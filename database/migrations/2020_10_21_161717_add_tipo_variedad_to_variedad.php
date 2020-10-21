<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoVariedadToVariedad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lkp_variedades', function (Blueprint $table) {
            $table->string('lkp_cultivo_id')->change();
            $table->string('propiedad')->after('name')->nullable();
            $table->string('image')->after('propiedad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lkp_variedades', function (Blueprint $table) {
            //
        });
    }
}
