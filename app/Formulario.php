<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    // public function proyectos()
    // {
    //     return $this->belongsToMany('App\Proyecto');
    // }

    public function grupoPreguntas()
    {
        return $this->hasMany('App\GrupoPregunta');
    }


}
