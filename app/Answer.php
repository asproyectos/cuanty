<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    protected $fillable = [
        'id',
        // 'pregunta_id',
        // 'respuesta',
        'user_id',
    ];
    // public $timestamps=false;



    public function preguntas()
    {
        return $this->belongsToMany('App\Pregunta');
    }

}
