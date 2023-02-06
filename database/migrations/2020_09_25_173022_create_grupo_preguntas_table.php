<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_preguntas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 100);
            $table->string('nombre', 250);
            $table->string('subtitulo', 250);
            $table->smallInteger('orden');
            $table->boolean('activa')->default('1');
            $table->tinyInteger('system_percentage')->default('0');
            // $table->bigInteger('formulario_id')->unsigned();

            $table->smallInteger('formulario_id');
           // $table->foreign('formulario_id')->references('id')->on('formularios')->onDelete('cascade');

           // $table->foreignId('formulario_id')->constrained('formularios');
            $table->boolean('naAll')->default('0');
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
        Schema::dropIfExists('grupo_preguntas');
    }
}
