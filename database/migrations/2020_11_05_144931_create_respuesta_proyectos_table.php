<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestaProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_proyectos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyecto_id');
            $table->dateTime('hora_inicio_encuesta');
            $table->dateTime('hora_fin_encuesta');
            $table->tinyInteger('considera_id');
            $table->tinyInteger('medio_vida_id');
            $table->tinyInteger('parentesco_id');
            $table->tinyInteger('rango_edad_id');
            $table->tinyInteger('ano_residencia_id');
            $table->tinyInteger('estado_civil_id');
            $table->tinyInteger('leer_escribir');
            $table->tinyInteger('regimen_salud_id');
            $table->boolean('jefe_hogar');
            $table->foreignId('encuestado_id');
            $table->foreignId('user_id');
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
        Schema::dropIfExists('respuesta_proyectos');
    }
}
