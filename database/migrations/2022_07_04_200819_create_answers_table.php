<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('pregunta_id');
            // $table->foreignId('pregunta_id')->nullable();
            // $table->foreignId('pregunta_id')->constrained('preguntas');
            $table->foreignId('user_id')->constrained('users');
            // $table->foreignId('formulario_id')->constrained('formularios');
            $table->boolean('estado')->default(1);
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
        Schema::dropIfExists('answers');
    }
}
