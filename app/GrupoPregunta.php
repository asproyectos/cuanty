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
        return $this->belongsTo(Formulario::class, 'formulario_id');
    }

    // public function ciudades() {
    //     return $this->belongsTo(Ciudad::class, 'ciudad_id');
    // }

    public function preguntas()
    {
        return $this->hasMany('App\Pregunta');
    }
}
