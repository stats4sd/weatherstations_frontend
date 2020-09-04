<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewManejoParcelaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manejo_parcela', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('comunidad_id');
            $table->string('parcela_id');
            $table->unsignedBigInteger('cultivo_id');
            $table->date('fecha_roturado_suelo')->nullable();
            $table->string('tipo_preparacion_roturado')->nullable();
            $table->date('fecha_rastrado_suelo')->nullable();
            $table->string('tipo_preparacion_rastrado')->nullable();
            $table->date('fecha_fertilizacion')->nullable();
            $table->string('tipo_fertilizacion_suelo')->nullable();
            $table->string('abono_organico')->nullable();
            $table->decimal('abono_cantidad_kg')->nullable();
            $table->string('fertilizante_quimico')->nullable();
            $table->decimal('fertilizante_cantidad_kg')->nullable();
            $table->string('foliar_producto')->nullable();
            $table->string('tipo_riego')->nullable();
            $table->string('fuente_agua')->nullable();
            $table->string('tipo_deshierbe')->nullable();
            $table->date('fecha_aporque')->nullable();
            $table->string('tipo_aporque')->nullable();
            $table->date('fecha_tazeo')->nullable();
            $table->string('tipo_tazeo')->nullable();
            $table->date('fecha_poda')->nullable();
            $table->string('tipo_poda')->nullable();
            $table->date('fecha_control_1')->nullable();
            $table->string('tipo_control_1')->nullable();
            $table->string('tipo_producto_1')->nullable();
            $table->string('producto_1')->nullable();
            $table->date('fecha_control_2')->nullable();
            $table->string('tipo_control_2')->nullable();
            $table->string('tipo_producto_2')->nullable();
            $table->string('producto_2')->nullable();
            $table->unsignedBigInteger('submission_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manejo_parcela');
    }
}
