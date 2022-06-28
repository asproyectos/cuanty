<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('identificacion');
            $table->tinyInteger('nacionalidad_id');
            $table->string('lugar_nacimiento');
            $table->tinyInteger('sexo_id');
            $table->boolean('activo');
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
        Schema::dropIfExists('encuestados');
    }
}
