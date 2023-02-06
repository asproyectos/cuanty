<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormularioGrupoPreguntaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulario_grupo_pregunta12', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('formulario_id');
            // $table->unsignedTinyInteger('grupo_pregunta_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formulario_grupo_pregunta12');
    }
}
