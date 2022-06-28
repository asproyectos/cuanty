<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ronda extends Model
{
    protected $fillable = [
        'reporte_id','tipo_ronda_id',
        'numero_ronda_id',
        'user_id',
        'comentario', 'tipo_comentario_id',
        'verificada',
        'usuario_sala_control_id',
        'comentario_verificacion',
        'cantidad_alarmas',
        'porcentaje'
    ];

    public function respuestas()
    {
        return $this->hasMany('App\Respuesta');
    }

    public function reporte()
    {
        return $this->belongsTo('App\Reporte');
    }

    public function tipoComentario()
    {
        return $this->belongsTo('App\TipoComentario');
    }

    public function tipoRonda()
    {
        return $this->belongsTo('App\TipoRonda');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function verificadaPor()
    {
        return $this->belongsTo('App\User','usuario_sala_control_id');
    }

    public function numeroRonda()
    {
        return $this->belongsTo('App\NumeroRonda');
    }

    public function getGrupoPreguntas($formularioId)
    {
        return \DB::table('respuestas')
            ->join('preguntas', 'respuestas.pregunta_id', '=', 'preguntas.id')
            ->join('grupo_preguntas', 'grupo_preguntas.id', '=', 'preguntas.grupo_pregunta_id')
            ->where('respuestas.ronda_id' , $this->id)
            ->where('grupo_preguntas.formulario_id' , $formularioId)
            ->groupBy('grupo_preguntas.id')
            ->orderBy('grupo_preguntas.orden','asc')
            ->select('grupo_preguntas.id','grupo_preguntas.orden','grupo_preguntas.nombre')
            ->get();
    }
    public function getPreguntas($grupoPreguntaId)
    {
        return \DB::table('respuestas')
            ->join('preguntas', 'respuestas.pregunta_id', '=', 'preguntas.id')
            ->where('respuestas.ronda_id' , $this->id)
            ->where('preguntas.grupo_pregunta_id' , $grupoPreguntaId)
            ->groupBy('preguntas.id')
            ->orderBy('preguntas.orden','asc')
            ->select('preguntas.id','preguntas.orden', 'preguntas.descripcion', 'preguntas.dispositivo', 'preguntas.unidad', 'preguntas.normal', 'preguntas.tipo_pregunta_id')
            ->get();
    }
}
