<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRondasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rondas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reporte_id');
            $table->unsignedTinyInteger('numero_ronda_id');
            $table->unsignedTinyInteger('tipo_ronda_id');
            $table->unsignedTinyInteger('tipo_comentario_id')->default('1');
            $table->text('comentario')->nullable();
            $table->unsignedSmallInteger('cantidad_alarmas')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('usuario_sala_control_id')->nullable();
            $table->boolean('verificada')->nullable();
            $table->text('comentario_verificacion')->nullable();
            $table->unsignedDecimal('porcentaje', 4, 2);
            $table->timestamps();

            $table->unique(['reporte_id', 'numero_ronda_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rondas');
    }
}
