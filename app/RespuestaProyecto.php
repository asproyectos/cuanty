<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaProyecto extends Model
{
    protected $guarded = [];

    public function encuestado()
    {
        return $this->belongsTo('App\Encuestado');
    }

    public function considera()
    {
        return $this->belongsTo('App\Considera');
    }

    public function medioVida()
    {
        return $this->belongsTo('App\MedioVida');
    }

    public function parentesco()
    {
        return $this->belongsTo('App\Parentesco');
    }

    public function rangoEdad()
    {
        return $this->belongsTo('App\RangoEdad');
    }

    public function anoResidencia()
    {
        return $this->belongsTo('App\AnoResidencia');
    }

    public function estadoCivil()
    {
        return $this->belongsTo('App\EstadoCivil');
    }

    public function regimenSalud()
    {
        return $this->belongsTo('App\RegimenSalud');
    }

    public function respuestas()
    {
        return $this->hasMany('App\Respuesta');
    }
}
