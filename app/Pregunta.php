<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'descripcion', 'dispositivo', 'unidad', 'grupo_pregunta_id', 'tipo_pregunta_id', 'activa', 'orden', 'normal'];

    public function alarmas()
    {
        return $this->hasMany('App\Alarma');
    }

    public function opciones()
    {
        return $this->hasMany('App\Opcion');
    }

    public function grupoPregunta()
    {
        return $this->belongsTo('App\GrupoPregunta');
    }

    public function tipoPregunta()
    {
        return $this->belongsTo('App\TipoPregunta');
    }
}
