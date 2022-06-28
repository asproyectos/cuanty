<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $guarded = [];

    public function opcion()
    {
        return $this->belongsTo('App\Opcion');
    }

    public function pregunta()
    {
        return $this->belongsTo('App\Pregunta');
    }

    public function ronda()
    {
        return $this->belongsTo('App\Ronda');
    }
}
