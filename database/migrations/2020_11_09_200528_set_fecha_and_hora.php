<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetFechaAndHora extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("UPDATE data SET fecha = DATE(fecha_hora), fecha_hora = fecha_hora;");
        DB::statement("UPDATE data SET hora = TIME(fecha_hora), fecha_hora = fecha_hora;");
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
