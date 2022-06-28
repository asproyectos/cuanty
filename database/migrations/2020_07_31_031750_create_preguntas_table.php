<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->smallInteger('grupo_pregunta_id');
            $table->tinyInteger('tipo_pregunta_id'); // Si es selección múltiple o única respuesta 1-unica, 2-multiple
            $table->boolean('activa')->default('1');
            $table->unsignedSmallInteger('orden');
            $table->string('value',10)->default('');
            $table->boolean('na')->default('0');
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
        Schema::dropIfExists('preguntas');
    }
}
