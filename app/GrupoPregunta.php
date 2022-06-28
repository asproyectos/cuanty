<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoPregunta extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'codigo', 'nombre', 'subtitulo', 'orden', 'activa', 'formulario_id'];

    public function formularios()
    {
        return $this->belongsTo('App\Formulario');
    }

    public function preguntas()
    {
        return $this->hasMany('App\Pregunta');
    }
}
