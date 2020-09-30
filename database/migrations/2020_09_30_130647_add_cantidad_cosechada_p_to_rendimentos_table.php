<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCantidadCosechadaPToRendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rendimentos', function (Blueprint $table) {
            $table->decimal('cantidad_cosechada_p', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rendimentos', function (Blueprint $table) {
            $table->dropColumn('cantidad_cosechada_p');
        });
    }
}
