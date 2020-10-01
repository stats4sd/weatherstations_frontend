<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLkpCultivoAndVariedadToStringIds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cultivos', function (Blueprint $table) {
            $table->string('lkp_cultivo_id')->change();
            $table->string('lkp_variedad_id')->change();
        });

        Schema::table('lkp_cultivos', function (Blueprint $table) {
            $table->string('id')->change();
        });

        Schema::table('lkp_variedades', function (Blueprint $table) {
            $table->string('id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cultivos', function (Blueprint $table) {
            $table->unsignedBigInteger('lkp_cultivo_id')->change();
            $table->unsignedBigInteger('lkp_variedad_id')->change();
        });

        Schema::table('lkp_cultivos', function (Blueprint $table) {
            $table->bigIncrements('id')->primary()->change();
        });

        Schema::table('lkp_variedades', function (Blueprint $table) {
            $table->bigIncrements('id')->primary()->change();
        });
    }
}
