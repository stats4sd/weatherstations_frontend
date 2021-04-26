<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQrCodeToSueloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suelo', function (Blueprint $table) {
            $table->string('qrcode')->after('pH');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suelo', function (Blueprint $table) {
            $table->string('qrcode');
        });
    }
}
