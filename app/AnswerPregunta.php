<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerPregunta extends Model
{
    protected $table = 'answer_pregunta';
    protected $fillable = [
        'id',
        'pregunta_id',
        'respuesta',
        'answer_id',
    ];
}
