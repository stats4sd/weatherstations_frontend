<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateParcelaIdToString extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cultivos', function (Blueprint $table) {
            $table->string('parcela_id')->change();
        });

        Schema::table('suelo', function (Blueprint $table) {
            $table->string('parcela_id')->change();
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
            $table->unsignedBigInteger('parcela_id')->change();
        });

        Schema::table('suelo', function (Blueprint $table) {
            $table->unsignedBigInteger('parcela_id')->change();
        });
    }
}
