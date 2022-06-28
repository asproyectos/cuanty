<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $fillable = ['fecha', 'verificado', 'user_id', 'comentario','cantidad_alarmas'];

    public function rondas()
    {
        return $this->hasMany('App\Ronda');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getGrupoPreguntas($formularioId)
    {
        return \DB::table('reportes')
            ->join('rondas', 'rondas.reporte_id', '=', 'reportes.id')
            ->join('respuestas', 'respuestas.ronda_id', '=', 'rondas.id')
            ->join('preguntas', 'respuestas.pregunta_id', '=', 'preguntas.id')
            ->join('grupo_preguntas', 'grupo_preguntas.id', '=', 'preguntas.grupo_pregunta_id')
            ->where('reportes.id',$this->id)
            ->groupBy('grupo_preguntas.id')
            ->orderBy('grupo_preguntas.orden','asc')
            ->select('grupo_preguntas.id','grupo_preguntas.orden','grupo_preguntas.nombre')
            ->get();
    }

    public function getPreguntas($grupoPreguntaId)
    {
        return \DB::table('reportes')
            ->join('rondas', 'rondas.reporte_id', '=', 'reportes.id')
            ->join('respuestas', 'respuestas.ronda_id', '=', 'rondas.id')
            ->join('preguntas', 'respuestas.pregunta_id', '=', 'preguntas.id')
            ->where('reportes.id',$this->id)
            ->where('preguntas.grupo_pregunta_id' , $grupoPreguntaId)
            ->groupBy('preguntas.id')
            ->orderBy('preguntas.orden','asc')
            ->select('preguntas.id','preguntas.orden', 'preguntas.descripcion', 'preguntas.dispositivo', 'preguntas.unidad', 'preguntas.normal', 'preguntas.tipo_pregunta_id')
            ->get();
    }
}
