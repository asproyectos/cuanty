<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre','200');
            $table->integer('tipo_proyecto_id');
            $table->date('fecha');
            $table->string('numero_encuesta');
            $table->date('fecha_inicio_encuesta');
            $table->date('fecha_fin_encuesta');
            $table->string('municipio');
            $table->string('vereda_sector');
            $table->string('comunidad_id');
            $table->string('numero_hogares');
            $table->string('muestra');
            $table->foreignId('encuestado_id');
            $table->text('consentimiento_informado');
            $table->text('descripcion');
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
        Schema::dropIfExists('proyectos');
    }
}
