<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $guarded = [];

    public function formularios()
    {
        return $this->belongsToMany('App\Formulario');
    }

    public function usuarios()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function encuestado()
    {
        return $this->belongsTo('App\Encuestado');
    }

    public function respuestaProyectos()
    {
        return $this->hasMany('App\RespuestaProyecto');
    }

    public function comunidad()
    {
        return $this->belongsTo('App\Comunidad');
    }

    public function infraestructuraComunitaria()
    {
        return $this->hasOne('App\InfraestructuraComunitaria');
    }

    public function calcularIMAC()
    {
        $respuestas;
        $cantidadRespuestas = $this->respuestaProyectos->count();

        //PPI1 Miembros del hogar que tienen 18 años o menos
        $p101_206_211 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '101')
            ->orWhere('respuestas.opcion_id', '206')
            ->orWhere('respuestas.opcion_id', '207')
            ->orWhere('respuestas.opcion_id', '208')
            ->orWhere('respuestas.opcion_id', '209')
            ->orWhere('respuestas.opcion_id', '210')
            ->orWhere('respuestas.opcion_id', '211')
            ->count();
        $p101_205 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '101')
            ->where('respuestas.opcion_id', '205')
            ->count();
        $p101_204 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '101')
            ->where('respuestas.opcion_id', '204')
            ->count();
        $p101_203 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '101')
            ->where('respuestas.opcion_id', '203')
            ->count();
        $p101_591 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '101')
            ->where('respuestas.opcion_id', '591')
            ->count();
        $PPI1 = (($p101_206_211*0 + $p101_205*5 + $p101_204*11 + $p101_203*17 + $p101_591*23) / ($cantidadRespuestas*23))*100;
        //PPI2 Nivel educativo más alto alcanzado por la jefe/esposa del hogar
        $p102_212 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '102')
            ->where('respuestas.opcion_id', '212')
            ->count();
        $p102_213 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '102')
            ->where('respuestas.opcion_id', '213')
            ->count();
        $p102_214 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '102')
            ->where('respuestas.opcion_id', '214')
            ->count();
        $p102_215 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '102')
            ->where('respuestas.opcion_id', '215')
            ->count();
        $p102_216 = \DB::table('respuestas') //No hay jefe / Esposa
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '102')
            ->where('respuestas.opcion_id', '216')
            ->count();
        $p102_593 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '102')
            ->where('respuestas.opcion_id', '593')
            ->count();
        $PPI2 = (($p102_212*0 + $p102_213*3 + $p102_214*6 + $p102_215*9 + $p102_216*8 + $p102_593*17) / ($cantidadRespuestas*8))*100;
        $p104_226 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '104')
        ->where('respuestas.opcion_id', '226')
        ->count();
        $p104_227 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '104')
        ->where('respuestas.opcion_id', '227')
        ->count();
        $p104_228 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '104')
        ->where('respuestas.opcion_id', '228')
        ->count();
        $PPI3 = (($p104_226*0 + $p104_227*+ + $p104_228*11) / ($cantidadRespuestas*11))*100;
        $p105_230 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '105')
        ->where('respuestas.opcion_id', '230')
        ->count();
        $p105_232 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '105')
        ->where('respuestas.opcion_id', '232')
        ->count();
        $p105_233 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '105')
        ->where('respuestas.opcion_id', '233')
        ->count();
        $PPI4 = (($p105_230*0 + $p105_232*4 + $p105_233*11) / ($cantidadRespuestas*11))*100;
        $p106_234 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '106')
        ->where('respuestas.opcion_id', '234')
        ->count();
        $p106_235 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '106')
        ->where('respuestas.opcion_id', '235')
        ->count();
        $PPI5 = (($p106_234*9 + $p106_235*0) / ($cantidadRespuestas*9))*100;
        $p107_236 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '107')
        ->where('respuestas.opcion_id', '236')
        ->count();
        $p107_237 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '107')
        ->where('respuestas.opcion_id', '237')
        ->count();
        $p107_238 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '107')
        ->where('respuestas.opcion_id', '238')
        ->count();
        $p107_239 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '107')
        ->where('respuestas.opcion_id', '239')
        ->count();
        $PPI6 = (($p107_236*0 + $p107_237*2 + $p107_238*3 + $p107_239*6) / ($cantidadRespuestas*3))*100;
        $p108_240 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '108')
        ->where('respuestas.opcion_id', '240')
        ->count();
        $PPI7 = (($p108_240*4) / ($cantidadRespuestas*4))*100;
        $p108_241 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '108')
        ->where('respuestas.opcion_id', '241')
        ->count();
        $PPI8 = (($p108_241*3) / ($cantidadRespuestas*3))*100;
        $p108_242 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '108')
        ->where('respuestas.opcion_id', '242')
        ->count();
        $PPI9 = (($p108_242*4) / ($cantidadRespuestas*4))*100;
        $p109_243 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '109')
        ->where('respuestas.opcion_id', '243')
        ->count();
        $p109_244 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '109')
        ->where('respuestas.opcion_id', '244')
        ->count();
        $p109_245 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '109')
        ->where('respuestas.opcion_id', '245')
        ->count();
        $p109 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '109')
        ->count();
        $PPI10 = (($p109_243*3 + ($p109_244+$p109_245)*9) / ($p109*9))*100;;
        $respuestas['pobreza'] = ($PPI1 + $PPI2 + $PPI3 + $PPI4 + $PPI5 + $PPI6 + $PPI7 + $PPI8 + $PPI9 + $PPI10) / 100;

        $p110_250 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '110')
            ->where('respuestas.opcion_id', '250')
            ->count();
        $p110_249 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '110')
            ->where('respuestas.opcion_id', '249')
            ->count();
        $p110_248 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '110')
            ->where('respuestas.opcion_id', '248')
            ->count();
        $respuestas['percepcionBienestar'] = ($p110_250*3 + $p110_249*6 + $p110_248*8)/($cantidadRespuestas*8)*100;

        // Infraestructura comunitaria
        $if[] = $this->infraestructuraComunitaria->puesto_de_salud_presencia * \App\InfraestructuraComunitaria::$puntaje[$this->infraestructuraComunitaria->puesto_de_salud_funcionamiento];
        $if[] = $this->infraestructuraComunitaria->escuela_comunitaria_primaria_presencia * \App\InfraestructuraComunitaria::$puntaje[$this->infraestructuraComunitaria->escuela_comunitaria_primaria_funcionamiento];
        $if[] = $this->infraestructuraComunitaria->escuela_comunitaria_secundaria_presencia * \App\InfraestructuraComunitaria::$puntaje[$this->infraestructuraComunitaria->escuela_comunitaria_secundaria_funcionamiento];
        $if[] = $this->infraestructuraComunitaria->sede_comunitaria_presencia * \App\InfraestructuraComunitaria::$puntaje[$this->infraestructuraComunitaria->sede_comunitaria_funcionamiento];
        $if[] = $this->infraestructuraComunitaria->espacios_recreativos_presencia * \App\InfraestructuraComunitaria::$puntaje[$this->infraestructuraComunitaria->espacios_recreativos_funcionamiento];
        $if[] = $this->infraestructuraComunitaria->hogar_comunitario_presencia * \App\InfraestructuraComunitaria::$puntaje[$this->infraestructuraComunitaria->hogar_comunitario_funcionamiento];
        $if[] = $this->infraestructuraComunitaria->muelles_presencia * \App\InfraestructuraComunitaria::$puntaje[$this->infraestructuraComunitaria->muelles_funcionamiento];
        $if[] = $this->infraestructuraComunitaria->cobertura_electrica_presencia * \App\InfraestructuraComunitaria::$puntaje[$this->infraestructuraComunitaria->cobertura_electrica_funcionamiento];
        $if[] = $this->infraestructuraComunitaria->agua_potable_presencia * \App\InfraestructuraComunitaria::$puntaje[$this->infraestructuraComunitaria->agua_potable_funcionamiento];
        $if[] = $this->infraestructuraComunitaria->alcantarillado_presencia * \App\InfraestructuraComunitaria::$puntaje[$this->infraestructuraComunitaria->alcantarillado_funcionamiento];
        $if[] = $this->infraestructuraComunitaria->pozos_septicos_presencia * \App\InfraestructuraComunitaria::$puntaje[$this->infraestructuraComunitaria->pozos_septicos_funcionamiento];
        $if[] = $this->infraestructuraComunitaria->senal_de_celular_presencia * \App\InfraestructuraComunitaria::$puntaje[$this->infraestructuraComunitaria->senal_de_celular_funcionamiento];
        $if[] = $this->infraestructuraComunitaria->senal_de_television_presencia * \App\InfraestructuraComunitaria::$puntaje[$this->infraestructuraComunitaria->senal_de_television_funcionamiento];
        $respuestas['infraestructuraComunitaria'] = array_sum($if)/13;

        // Diversidad Ocupacional
        $DO = 0;
        foreach ($this->respuestaProyectos as $rp) {
            $p111 = \DB::table('respuestas')
                ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
                ->where('respuesta_proyectos.id', $rp->id)
                ->where('respuestas.pregunta_id', '111')
                ->count();
            $p103 = \DB::table('opcions')->select('opcions.nombre as valor')
                ->join('respuestas', 'respuestas.opcion_id', '=', 'opcions.id')
                ->where('respuestas.respuesta_proyecto_id', $rp->id)
                ->where('respuestas.pregunta_id', 103)->first();
            $DO += $p111 / $p103->valor;
        }
        $respuestas['diversidadOcupacional'] = (100) - (100/$cantidadRespuestas) * $DO;

        // Dependencia del uso de recursos naturales
        $RN = 0;
        foreach ($this->respuestaProyectos as $rp) {
            $p112 = \DB::table('opcions')->select('opcions.valor as valor')
                ->join('respuestas', 'respuestas.opcion_id', '=', 'opcions.id')
                ->where('respuestas.respuesta_proyecto_id', $rp->id)
                ->where('respuestas.pregunta_id', 112)->first();

            $p103 = \DB::table('opcions')->select('opcions.nombre as valor')
                ->join('respuestas', 'respuestas.opcion_id', '=', 'opcions.id')
                ->where('respuestas.respuesta_proyecto_id', $rp->id)
                ->where('respuestas.pregunta_id', 103)->first();
            $RN += ( 1 - $p112->valor / $p103->valor) * 100;
        }
        $respuestas['dependenciaUsoRN'] = $RN * ( 1 / $cantidadRespuestas);

        $p120_283 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '120')
        ->where('respuestas.opcion_id', '283')
        ->count();
        $respuestas['percepcionCambioBienestar'] = $p120_283 / $cantidadRespuestas * 100;

        $p114_272 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '114')
            ->where('respuestas.opcion_id', '272')
            ->count();
        $p115_274 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '115')
            ->where('respuestas.opcion_id', '274')
            ->count();
        $respuestas['movilidadOcupacional'] = $p114_272 / $p115_274 *100;

        $p117_277 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '117')
            ->where('respuestas.opcion_id', '277')
            ->count();
        $p118_279 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '118')
            ->where('respuestas.opcion_id', '279')
            ->count();
        $p119_281 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '119')
            ->where('respuestas.opcion_id', '281')
            ->count();
        $respuestas['cambiosEconomicos'] = ( ($p117_277/$cantidadRespuestas*100) + ($p118_279/$cantidadRespuestas*100) + ($p119_281/$cantidadRespuestas*100) ) / 3;

        $p121_286  = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '121')
            ->where('respuestas.opcion_id', '286')
            ->count();
        $p121_287  = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '121')
            ->where('respuestas.opcion_id', '287')
            ->count();
        $p121_288  = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '121')
            ->where('respuestas.opcion_id', '288')
            ->count();
        $p121_289  = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '121')
            ->where('respuestas.opcion_id', '289')
            ->count();
        $HAD1 = ($p121_286*0 + $p121_287*0.33 + $p121_288*0.66 + $p121_289*1)/$cantidadRespuestas*100;
        $p122_290  = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '122')
            ->where('respuestas.opcion_id', '290')
            ->count();
        $p122_291  = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '122')
            ->where('respuestas.opcion_id', '291')
            ->count();
        $p122_292  = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '122')
            ->where('respuestas.opcion_id', '292')
            ->count();
        $p122_293  = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '122')
            ->where('respuestas.opcion_id', '293')
            ->count();
        $HAD2 = ($p122_290*0 + $p122_291*0.33 + $p122_292*0.66 + $p122_293*1)/$cantidadRespuestas*100;
        $p123_294  = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '123')
            ->where('respuestas.opcion_id', '294')
            ->count();
        $p123_295  = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '123')
            ->where('respuestas.opcion_id', '295')
            ->count();
        $p123_296  = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '123')
            ->where('respuestas.opcion_id', '296')
            ->count();
        $p123_297  = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '123')
            ->where('respuestas.opcion_id', '297')
            ->count();
        $HAD3 = ($p123_294*0 + $p123_295*0.33 + $p123_296*0.66 + $p123_297*1)/$cantidadRespuestas*100;
        $p124_298  = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '124')
            ->where('respuestas.opcion_id', '298')
            ->count();
        $p124_299  = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '124')
            ->where('respuestas.opcion_id', '299')
            ->count();
        $p124_300  = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '124')
            ->where('respuestas.opcion_id', '300')
            ->count();
        $p124_301  = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '124')
            ->where('respuestas.opcion_id', '301')
            ->count();
        $HAD4 = ($p124_298*0 + $p124_299*0.33 + $p124_300*0.66 + $p124_301*1)/$cantidadRespuestas*100;
        $respuestas['anticiparseDisturbios'] = ( $HAD1 + $HAD2 + $HAD3 + $HAD4  ) / 4;

        $p125_302 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '125')
            ->where('respuestas.opcion_id', '302')
            ->count();
        $p125_303 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '125')
            ->where('respuestas.opcion_id', '303')
            ->count();
        $p125_304 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '125')
            ->where('respuestas.opcion_id', '304')
            ->count();
        $p125_305 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '125')
            ->where('respuestas.opcion_id', '305')
            ->count();
        $p125_306 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '125')
            ->where('respuestas.opcion_id', '306')
            ->count();
        $p125_307 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '125')
            ->where('respuestas.opcion_id', '307')
            ->count();
        $p125_308 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '125')
            ->where('respuestas.opcion_id', '308')
            ->count();
        $p125_309 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '125')
            ->where('respuestas.opcion_id', '309')
            ->count();
        $p125_310 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '125')
            ->where('respuestas.opcion_id', '310')
            ->count();
        $CEN1 = ($p125_302*1 + $p125_303*1 + $p125_304*1 + $p125_305*0.66 + $p125_306*0.33 + $p125_307*0.33 + $p125_308*0.66 + $p125_309*0 + $p125_310*0)/$cantidadRespuestas*100;
        $p126_311 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '126')
            ->where('respuestas.opcion_id', '311')
            ->count();
        $p126_312 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '126')
            ->where('respuestas.opcion_id', '312')
            ->count();
        $p126_313 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '126')
            ->where('respuestas.opcion_id', '313')
            ->count();
        $p126_314 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '126')
            ->where('respuestas.opcion_id', '314')
            ->count();
        $p126_315 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '126')
            ->where('respuestas.opcion_id', '315')
            ->count();
        $p126_316 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '126')
            ->where('respuestas.opcion_id', '316')
            ->count();
        $p126_317 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '126')
            ->where('respuestas.opcion_id', '317')
            ->count();
        $CEN2 = ($p126_311*1 + $p126_312*0.33 + $p126_313*1 + $p126_314*0 + $p126_315*0.33 + $p126_316*0 + $p126_317*0)/$cantidadRespuestas*100;
        $p127_318 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '127')
            ->where('respuestas.opcion_id', '318')
            ->count();
        $p127_319 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '127')
            ->where('respuestas.opcion_id', '319')
            ->count();
        $p127_320 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '127')
            ->where('respuestas.opcion_id', '320')
            ->count();
        $p127_321 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '127')
            ->where('respuestas.opcion_id', '321')
            ->count();
        $p127_322 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '127')
            ->where('respuestas.opcion_id', '322')
            ->count();
        $p127_323 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '127')
            ->where('respuestas.opcion_id', '323')
            ->count();
        $p127_324 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '127')
            ->where('respuestas.opcion_id', '324')
            ->count();
        $p127_325 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '127')
            ->where('respuestas.opcion_id', '325')
            ->count();
        $p127_326 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '127')
            ->where('respuestas.opcion_id', '326')
            ->count();
        $p127_327 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '127')
            ->where('respuestas.opcion_id', '327')
            ->count();
        $CEN3 = ($p127_318*1 + $p127_319*1 + $p127_320*1 + $p127_321*0.66 + $p127_322*0.66 + $p127_323*1 + $p127_324*0.66 + $p127_325*0.33 + $p127_326*1 + $p127_327*1)/$cantidadRespuestas*100;
        $respuestas['comprensionEntornoNatural'] = ( $CEN1 + $CEN2 + $CEN3 ) / 3;

        $p132_353 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '132')
            ->where('respuestas.opcion_id', '353')
            ->count();
        $respuestas['cambioPercepcionConservar'] = $p132_353/$cantidadRespuestas*100;


        // Capital Social
        $CAS1_1 = 0;
        $CAS2_1 = 0;
        foreach ($this->respuestaProyectos as $rp) {
            $p134 = \DB::table('respuestas')
                ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
                ->where('respuesta_proyectos.id', $rp->id)
                ->where('respuestas.pregunta_id', '134')
                ->count();
            $p133 = \DB::table('opcions')->select('opcions.nombre as valor')
                ->join('respuestas', 'respuestas.opcion_id', '=', 'opcions.id')
                ->where('respuestas.respuesta_proyecto_id', $rp->id)
                ->where('respuestas.pregunta_id', 133)->first();
            $CAS1_1 += $p134/$p133->valor;

            $p135 = \DB::table('respuestas')
                ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
                ->where('respuesta_proyectos.id', $rp->id)
                ->where('respuestas.pregunta_id', '134')
                ->count();
            $CAS2_1 += $p135/$p133->valor;
        }
        $CAS1 = $CAS1_1 * (100/$cantidadRespuestas);
        $CAS2 = $CAS2_1 * (100/$cantidadRespuestas);
        $p136_383 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '132')
            ->where('respuestas.opcion_id', '383')
            ->count();
        $p136_384 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '132')
            ->where('respuestas.opcion_id', '384')
            ->count();
        $p136_385 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '132')
            ->where('respuestas.opcion_id', '385')
            ->count();
        $p136_386 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '132')
            ->where('respuestas.opcion_id', '386')
            ->count();
        $p136_387 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '132')
            ->where('respuestas.opcion_id', '387')
            ->count();
        $p136_388 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '132')
            ->where('respuestas.opcion_id', '388')
            ->count();
        $p136_389 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '132')
            ->where('respuestas.opcion_id', '389')
            ->count();
        $p136_390 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '132')
            ->where('respuestas.opcion_id', '390')
            ->count();
        $CAS3 = (($p136_383*0 + $p136_384*0.33 + $p136_385*0.66 + $p136_386*1 + $p136_387*1 + $p136_388*1 + $p136_389*1 + $p136_390*0) / ($cantidadRespuestas*1)) * 100;
        $p137_391 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '137')
            ->where('respuestas.opcion_id', '391')
            ->count();
        $p137_392 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '137')
            ->where('respuestas.opcion_id', '392')
            ->count();
        $p137_393 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '137')
            ->where('respuestas.opcion_id', '393')
            ->count();
        $p137_394 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '137')
            ->where('respuestas.opcion_id', '394')
            ->count();
        $p137_395 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '137')
            ->where('respuestas.opcion_id', '395')
            ->count();
        $p137_396 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '137')
            ->where('respuestas.opcion_id', '396')
            ->count();
        $p137_397 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '137')
            ->where('respuestas.opcion_id', '397')
            ->count();
        $p137_398 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '137')
            ->where('respuestas.opcion_id', '398')
            ->count();
        $CAS4 = (($p137_391*0 + $p137_392*0.99 + $p137_393*0.66 + $p137_394*0.66 + $p137_395*0.66 + $p137_396*1 + $p137_397*0.66 + $p137_398*0) / ($cantidadRespuestas*1)) * 100;
        $p138_399 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '138')
            ->where('respuestas.opcion_id', '399')
            ->count();
        $p138_400 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '138')
            ->where('respuestas.opcion_id', '400')
            ->count();
        $p138_401 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '138')
            ->where('respuestas.opcion_id', '401')
            ->count();
        $p138_402 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '138')
            ->where('respuestas.opcion_id', '402')
            ->count();
        $p138_403 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '138')
            ->where('respuestas.opcion_id', '403')
            ->count();
        $CAS5 = (( $p138_399*0 + $p138_400*0.33 + $p138_401*0.66 + $p138_402*1 + $p138_403*0 ) / ($cantidadRespuestas*1)) * 100;
        $p139_404 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '139')
            ->where('respuestas.opcion_id', '404')
            ->count();
        $p139_405 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '139')
            ->where('respuestas.opcion_id', '405')
            ->count();
        $CAS6 = (($p139_404*0.5 + $p139_405*1) / ($cantidadRespuestas*1)) * 100;
        $respuestas['capitalSocial'] = ( $CAS1 + $CAS2 + $CAS3 + $CAS4 + $CAS5 + $CAS6) / 6;


        // Acción Colectiva
        $p148_441 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '148')
            ->where('respuestas.opcion_id', '441')
            ->count();
        $p148_442 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '148')
            ->where('respuestas.opcion_id', '442')
            ->count();
        $p148_443 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '148')
            ->where('respuestas.opcion_id', '443')
            ->count();
        $p148_444 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '148')
            ->where('respuestas.opcion_id', '444')
            ->count();
        $p148_445 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '148')
            ->where('respuestas.opcion_id', '445')
            ->count();
        $respuestas['accionColectiva'] = ($p148_441*0 + $p148_442*0.66 + $p148_443*1 + $p148_444*0 + $p148_445*0) * (100/$cantidadRespuestas);

        $p149_446 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '149')
        ->where('respuestas.opcion_id', '446')
        ->count();
        $TDC1 = $p149_446 / $cantidadRespuestas * 100;
        $p150_448 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '150')
            ->where('respuestas.opcion_id', '448')
            ->count();
        $TDC2 = $p150_448 / $cantidadRespuestas * 100;
        $p151_450 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '151')
            ->where('respuestas.opcion_id', '450')
            ->count();
        $TDC3 = $p151_450 / $cantidadRespuestas * 100;
        $respuestas['tomaDecisiones'] = ( $TDC1 + $TDC2 + $TDC3) / 3;

        $p152_452 = \DB::table('respuestas')
        ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
        ->where('respuesta_proyectos.proyecto_id', $this->id)
        ->where('respuestas.pregunta_id', '152')
        ->where('respuestas.opcion_id', '452')
        ->count();
        $CCAS1 = $p152_452 / $cantidadRespuestas * 100;
        $p153_454 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '153')
            ->where('respuestas.opcion_id', '454')
            ->count();
        $CCAS2 = $p153_454 / $cantidadRespuestas * 100;
        $respuestas['cambiosCapitalSocial'] = ($CCAS1 + $CCAS2) / 2;

        $p140_406 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '140')
            ->where('respuestas.opcion_id', '406')
            ->count();
        $CGAC1 = $p140_406 / $cantidadRespuestas * 100;
        $p141_408 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '141')
            ->where('respuestas.opcion_id', '408')
            ->count();
        $CGAC3 = $p141_408 / $cantidadRespuestas * 100;
        $p142_410 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '142')
            ->where('respuestas.opcion_id', '410')
            ->count();
        $CGAC4 = $p142_410 / $cantidadRespuestas * 100;
        $p143_412 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '143')
            ->where('respuestas.opcion_id', '412')
            ->count();
        $CGAC5 = $p143_412 / $cantidadRespuestas * 100;
        $p144_414 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '143')
            ->where('respuestas.opcion_id', '414')
            ->count();
        $p144_415 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '143')
            ->where('respuestas.opcion_id', '415')
            ->count();
        $p144_416 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '143')
            ->where('respuestas.opcion_id', '416')
            ->count();
        $p144_417 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '143')
            ->where('respuestas.opcion_id', '417')
            ->count();
        $p144_418 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '143')
            ->where('respuestas.opcion_id', '418')
            ->count();
        $p144_419 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '143')
            ->where('respuestas.opcion_id', '419')
            ->count();
        $p144_420 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '143')
            ->where('respuestas.opcion_id', '420')
            ->count();
        $p144_421 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '143')
            ->where('respuestas.opcion_id', '421')
            ->count();
        $CGAC6 = ( $p144_414*0 + $p144_415*0.66 + $p144_416*1 + $p144_417*1 + $p144_418*1 + $p144_419*0 + $p144_420*0 + $p144_421*0 ) * (100 / $cantidadRespuestas);
        $p145_422 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '145')
            ->where('respuestas.opcion_id', '422')
            ->count();
        $p145_423 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '145')
            ->where('respuestas.opcion_id', '423')
            ->count();
        $p145_424 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '145')
            ->where('respuestas.opcion_id', '424')
            ->count();
        $p145_425 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '145')
            ->where('respuestas.opcion_id', '425')
            ->count();
        $p145_426 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '145')
            ->where('respuestas.opcion_id', '426')
            ->count();
        $p145_427 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '145')
            ->where('respuestas.opcion_id', '427')
            ->count();
        $p145_428 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '145')
            ->where('respuestas.opcion_id', '428')
            ->count();
        $CGAC7 = ($p145_422*1 + $p145_423*1 + $p145_424*1 + $p145_425*0.33 + $p145_426*0 + $p145_427*0 + $p145_428*0) * (100 / $cantidadRespuestas);
        $p146_429 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '146')
            ->where('respuestas.opcion_id', '429')
            ->count();
        $p146_430 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '146')
            ->where('respuestas.opcion_id', '430')
            ->count();
        $p146_431 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '146')
            ->where('respuestas.opcion_id', '431')
            ->count();
        $p146_432 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '146')
            ->where('respuestas.opcion_id', '432')
            ->count();
        $p146_433 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '146')
            ->where('respuestas.opcion_id', '433')
            ->count();
        $CGAC8 = ($p146_429*1 + $p146_430*1 + $p146_431*0 + $p146_432*0 + $p146_433*0) * (100 / $cantidadRespuestas);
        $p147_434 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '147')
            ->where('respuestas.opcion_id', '434')
            ->count();
        $p147_435 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '147')
            ->where('respuestas.opcion_id', '435')
            ->count();
        $p147_436 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '147')
            ->where('respuestas.opcion_id', '436')
            ->count();
        $p147_437 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '147')
            ->where('respuestas.opcion_id', '437')
            ->count();
        $p147_438 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '147')
            ->where('respuestas.opcion_id', '438')
            ->count();
        $p147_439 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '147')
            ->where('respuestas.opcion_id', '439')
            ->count();
        $p147_440 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '147')
            ->where('respuestas.opcion_id', '440')
            ->count();
        $CGAC9 = ($p147_434*1 + $p147_435*0.33 + $p147_436*1 + $p147_437*1 + $p147_438*0.33 + $p147_439*0 + $p147_440*0) * (100 / $cantidadRespuestas);
        $respuestas['conocimientoGeneralAC'] = ($CGAC1 + $CGAC3 + $CGAC4 + $CGAC5 + $CGAC6 + $CGAC7 + $CGAC8 + $CGAC9) / 8;

        $p154_456 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '154')
            ->where('respuestas.opcion_id', '456')
            ->count();
        $p154_457 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '154')
            ->where('respuestas.opcion_id', '457')
            ->count();
        $p154_458 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '154')
            ->where('respuestas.opcion_id', '458')
            ->count();
        $p154_459 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '154')
            ->where('respuestas.opcion_id', '459')
            ->count();
        $p154_460 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '154')
            ->where('respuestas.opcion_id', '460')
            ->count();
        $p154_461 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '154')
            ->where('respuestas.opcion_id', '461')
            ->count();
        $p154_462 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '154')
            ->where('respuestas.opcion_id', '462')
            ->count();
        $p154_463 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '154')
            ->where('respuestas.opcion_id', '463')
            ->count();
        $CTAC1 = $p154_456*1 + $p154_457*0.66 + $p154_458*0 + $p154_459*0.66 + $p154_460*0 + $p154_461*0.66 + $p154_462*0 + $p154_463*0;
        $p155_464 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '155')
            ->where('respuestas.opcion_id', '464')
            ->count();
        $p155_465 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '155')
            ->where('respuestas.opcion_id', '465')
            ->count();
        $p155_466 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '155')
            ->where('respuestas.opcion_id', '466')
            ->count();
        $p155_467 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '155')
            ->where('respuestas.opcion_id', '467')
            ->count();
        $p155_468 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '155')
            ->where('respuestas.opcion_id', '468')
            ->count();
        $CTAC2 = $p155_464*0 + $p155_465*1 + $p155_466*0 + $p155_467*0 + $p155_468*0;
        $p156_469 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '156')
            ->where('respuestas.opcion_id', '469')
            ->count();
        $p156_470 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '156')
            ->where('respuestas.opcion_id', '470')
            ->count();
        $p156_471 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '156')
            ->where('respuestas.opcion_id', '471')
            ->count();
        $p156_472 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '156')
            ->where('respuestas.opcion_id', '472')
            ->count();
        $p156_473 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '156')
            ->where('respuestas.opcion_id', '473')
            ->count();
        $p156_474 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '156')
            ->where('respuestas.opcion_id', '474')
            ->count();
        $p156_475 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '156')
            ->where('respuestas.opcion_id', '475')
            ->count();
        $CTAC3 = $p156_469*0.66 + $p156_470*0.66 + $p156_471*0.33 + $p156_472*1 + $p156_473*0 + $p156_474*0 + $p156_475*0;
        $respuestas['controlSocialAC'] = ($CTAC1 + $CTAC2 + $CTAC3) / 3;

        $p162_486 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '162')
            ->where('respuestas.opcion_id', '486')
            ->count();
        $PAAC1 = $p162_486 / $cantidadRespuestas * 100;
        $p163_489 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '163')
            ->where('respuestas.opcion_id', '489')
            ->count();
        $PAAC2 = $p163_489 / $cantidadRespuestas * 100;
        $p164_492 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '164')
            ->where('respuestas.opcion_id', '492')
            ->count();
        $PAAC3 = $p164_492 / $cantidadRespuestas * 100;
        $p165_495 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '165')
            ->where('respuestas.opcion_id', '495')
            ->count();
        $PAAC4 = $p165_495 / $cantidadRespuestas * 100;
        $p166_498 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '166')
            ->where('respuestas.opcion_id', '498')
            ->count();
        $PAAC5 = $p166_498 / $cantidadRespuestas * 100;
        $respuestas['percepcionDesempenoAC'] = ($PAAC1 + $PAAC2 + $PAAC3 + $PAAC4 + $PAAC5) / 5;

        $p169_511 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '169')
            ->where('respuestas.opcion_id', '511')
            ->count();
        $APAC1 = $p169_511 / $cantidadRespuestas * 100;
        $p170_513 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '170')
            ->where('respuestas.opcion_id', '513')
            ->count();
        $APAC2 = $p170_513 / $cantidadRespuestas * 100;
        $p171_515 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '171')
            ->where('respuestas.opcion_id', '515')
            ->count();
        $p171_516 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '171')
            ->where('respuestas.opcion_id', '516')
            ->count();
        $p171_517 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '171')
            ->where('respuestas.opcion_id', '517')
            ->count();
        $p171_518 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '171')
            ->where('respuestas.opcion_id', '518')
            ->count();
        $p171_519 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '171')
            ->where('respuestas.opcion_id', '519')
            ->count();
        $p171_520 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '171')
            ->where('respuestas.opcion_id', '520')
            ->count();
        $p171_521 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '171')
            ->where('respuestas.opcion_id', '521')
            ->count();
        $APAC3 = $p171_515*1 + $p171_516*1 + $p171_517*1 + $p171_518*1 + $p171_519*1 + $p171_520*0 + $p171_521*0;
        $respuestas['aceptacionAC'] = ($APAC1 + $APAC2 + $APAC3) / 3;

        $p173_532 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '173')
            ->where('respuestas.opcion_id', '532')
            ->count();
        $p173_533 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '173')
            ->where('respuestas.opcion_id', '533')
            ->count();
        $p173_534 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '173')
            ->where('respuestas.opcion_id', '534')
            ->count();
        $NSAC1 = ($p173_532*10 + $p173_533*7 + $p173_534*0) * (10 / $cantidadRespuestas);
        $p174_535 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '174')
            ->where('respuestas.opcion_id', '535')
            ->count();
        $NSAC2 = $p174_535 / $cantidadRespuestas * 100;
        $respuestas['nivelSatisfaccion'] = ($NSAC1 + $NSAC2) / 2;


        $respuestas['dimensionSocioeconomica'] = ($respuestas['pobreza'] + $respuestas['percepcionBienestar'] + $respuestas['infraestructuraComunitaria'] + $respuestas['diversidadOcupacional'] + $respuestas['movilidadOcupacional'] + $respuestas['cambiosEconomicos'] + $respuestas['percepcionCambioBienestar']) / 7;

        $respuestas['dimensionSocioecologica'] = ($respuestas['dependenciaUsoRN'] + $respuestas['anticiparseDisturbios'] + $respuestas['comprensionEntornoNatural'] + $respuestas['cambioPercepcionConservar']) / 4;

        $respuestas['dimensionInstitucional'] = ($respuestas['capitalSocial'] + $respuestas['accionColectiva'] + $respuestas['tomaDecisiones'] + $respuestas['cambiosCapitalSocial'] + $respuestas['conocimientoGeneralAC'] + $respuestas['controlSocialAC'] + $respuestas['percepcionDesempenoAC'] + $respuestas['aceptacionAC'] + $respuestas['nivelSatisfaccion']) / 9;

        $respuestas['IMAC'] = ($respuestas['dimensionSocioeconomica'] + $respuestas['dimensionSocioecologica'] + $respuestas['dimensionInstitucional'])/ 3;

        return $respuestas;
    }

    public function calcularValoracionContingente()
    {
        $respuestas;
        $cantidadRespuestas = $this->respuestaProyectos->count();

        $p301_549 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '301')
            ->where('respuestas.opcion_id', '549')
            ->count();
        $respuestas["degradacionPesca"] = $p301_549 / $cantidadRespuestas * 100;
        $p301_550 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '301')
            ->where('respuestas.opcion_id', '550')
            ->count();
        $respuestas["degradacionAgua"] = $p301_550 / $cantidadRespuestas * 100;
        $p301_551 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '301')
            ->where('respuestas.opcion_id', '551')
            ->count();
        $respuestas["degradacionSuelo"] = $p301_551 / $cantidadRespuestas * 100;
        $p301_552 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '301')
            ->where('respuestas.opcion_id', '552')
            ->count();
        $respuestas["degradacionAire"] = $p301_552 / $cantidadRespuestas * 100;
        $p301_553 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '301')
            ->where('respuestas.opcion_id', '553')
            ->count();
        $respuestas["degradacionBosque"] = $p301_553 / $cantidadRespuestas * 100;
        $p301_554 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '301')
            ->where('respuestas.opcion_id', '554')
            ->count();
        $respuestas["degradacionFaunaYFlora"] = $p301_554 / $cantidadRespuestas * 100;

        $p302_555 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '302')
            ->where('respuestas.opcion_id', '555')
            ->count();
        $respuestas["aportePesca"] = $p302_555 / $cantidadRespuestas * 100;
        $p302_556 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '302')
            ->where('respuestas.opcion_id', '556')
            ->count();
        $respuestas["aporteAgua"] = $p302_556 / $cantidadRespuestas * 100;
        $p302_557 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '302')
            ->where('respuestas.opcion_id', '557')
            ->count();
        $respuestas["aporteSuelo"] = $p302_557 / $cantidadRespuestas * 100;
        $p302_558 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '302')
            ->where('respuestas.opcion_id', '558')
            ->count();
        $respuestas["aporteAire"] = $p302_558 / $cantidadRespuestas * 100;
        $p302_559 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '302')
            ->where('respuestas.opcion_id', '559')
            ->count();
        $respuestas["aporteBosque"] = $p302_559 / $cantidadRespuestas * 100;
        $p302_560 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '302')
            ->where('respuestas.opcion_id', '560')
            ->count();
        $respuestas["aporteFaunaYFlora"] = $p302_560 / $cantidadRespuestas * 100;

        $p3031_561 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3031')
            ->where('respuestas.opcion_id', '561')
            ->count();
        $respuestas["apoyoPesca"][1] = $p3031_561 / $cantidadRespuestas * 100;
        $p3031_562 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3031')
            ->where('respuestas.opcion_id', '562')
            ->count();
        $respuestas["apoyoPesca"][2] = $p3031_562 / $cantidadRespuestas * 100;
        $p3031_563 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3031')
            ->where('respuestas.opcion_id', '563')
            ->count();
        $respuestas["apoyoPesca"][3] = $p3031_563 / $cantidadRespuestas * 100;
        $p3031_564 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3031')
            ->where('respuestas.opcion_id', '564')
            ->count();
        $respuestas["apoyoPesca"][4] = $p3031_564 / $cantidadRespuestas * 100;
        $p3031_565 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3031')
            ->where('respuestas.opcion_id', '565')
            ->count();
        $respuestas["apoyoPesca"][5] = $p3031_565 / $cantidadRespuestas * 100;

        $p3032_566 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3032')
            ->where('respuestas.opcion_id', '566')
            ->count();
        $respuestas["apoyoAgua"][1] = $p3032_566 / $cantidadRespuestas * 100;
        $p3032_567 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3032')
            ->where('respuestas.opcion_id', '567')
            ->count();
        $respuestas["apoyoAgua"][2] = $p3032_567 / $cantidadRespuestas * 100;
        $p3032_568 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3032')
            ->where('respuestas.opcion_id', '568')
            ->count();
        $respuestas["apoyoAgua"][3] = $p3032_568 / $cantidadRespuestas * 100;
        $p3032_569 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3032')
            ->where('respuestas.opcion_id', '569')
            ->count();
        $respuestas["apoyoAgua"][4] = $p3032_569 / $cantidadRespuestas * 100;
        $p3032_570 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3032')
            ->where('respuestas.opcion_id', '570')
            ->count();
        $respuestas["apoyoAgua"][5] = $p3032_570 / $cantidadRespuestas * 100;

        $p3033_571 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3033')
            ->where('respuestas.opcion_id', '571')
            ->count();
        $respuestas["apoyoSuelo"][1] = $p3033_571 / $cantidadRespuestas * 100;
        $p3033_572 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3033')
            ->where('respuestas.opcion_id', '572')
            ->count();
        $respuestas["apoyoSuelo"][2] = $p3033_572 / $cantidadRespuestas * 100;
        $p3033_573 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3033')
            ->where('respuestas.opcion_id', '573')
            ->count();
        $respuestas["apoyoSuelo"][3] = $p3033_573 / $cantidadRespuestas * 100;
        $p3033_574 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3033')
            ->where('respuestas.opcion_id', '574')
            ->count();
        $respuestas["apoyoSuelo"][4] = $p3033_574 / $cantidadRespuestas * 100;
        $p3033_575 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3033')
            ->where('respuestas.opcion_id', '575')
            ->count();
        $respuestas["apoyoSuelo"][5] = $p3033_575 / $cantidadRespuestas * 100;

        $p3034_576 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3034')
            ->where('respuestas.opcion_id', '576')
            ->count();
        $respuestas["apoyoAire"][1] = $p3034_576 / $cantidadRespuestas * 100;
        $p3034_577 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3034')
            ->where('respuestas.opcion_id', '577')
            ->count();
        $respuestas["apoyoAire"][2] = $p3034_577 / $cantidadRespuestas * 100;
        $p3034_578 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3034')
            ->where('respuestas.opcion_id', '578')
            ->count();
        $respuestas["apoyoAire"][3] = $p3034_578 / $cantidadRespuestas * 100;
        $p3034_579 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3034')
            ->where('respuestas.opcion_id', '579')
            ->count();
        $respuestas["apoyoAire"][4] = $p3034_579 / $cantidadRespuestas * 100;
        $p3034_580 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3034')
            ->where('respuestas.opcion_id', '580')
            ->count();
        $respuestas["apoyoAire"][5] = $p3034_580 / $cantidadRespuestas * 100;

        $p3035_581 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3035')
            ->where('respuestas.opcion_id', '581')
            ->count();
        $respuestas["apoyoBosque"][1] = $p3035_581 / $cantidadRespuestas * 100;
        $p3035_582 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3035')
            ->where('respuestas.opcion_id', '582')
            ->count();
        $respuestas["apoyoBosque"][2] = $p3035_582 / $cantidadRespuestas * 100;
        $p3035_583 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3035')
            ->where('respuestas.opcion_id', '583')
            ->count();
        $respuestas["apoyoBosque"][3] = $p3035_583 / $cantidadRespuestas * 100;
        $p3035_584 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3035')
            ->where('respuestas.opcion_id', '584')
            ->count();
        $respuestas["apoyoBosque"][4] = $p3035_584 / $cantidadRespuestas * 100;
        $p3035_585 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3035')
            ->where('respuestas.opcion_id', '585')
            ->count();
        $respuestas["apoyoBosque"][5] = $p3035_585 / $cantidadRespuestas * 100;

        $p3036_586 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3036')
            ->where('respuestas.opcion_id', '586')
            ->count();
        $respuestas["apoyoFloraYFauna"][1] = $p3036_586 / $cantidadRespuestas * 100;
        $p3036_587 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3036')
            ->where('respuestas.opcion_id', '587')
            ->count();
        $respuestas["apoyoFloraYFauna"][2] = $p3036_587 / $cantidadRespuestas * 100;
        $p3036_588 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3036')
            ->where('respuestas.opcion_id', '588')
            ->count();
        $respuestas["apoyoFloraYFauna"][3] = $p3036_588 / $cantidadRespuestas * 100;
        $p3036_589 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3036')
            ->where('respuestas.opcion_id', '589')
            ->count();
        $respuestas["apoyoFloraYFauna"][4] = $p3036_589 / $cantidadRespuestas * 100;
        $p3036_590 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '3036')
            ->where('respuestas.opcion_id', '590')
            ->count();
        $respuestas["apoyoFloraYFauna"][5] = $p3036_590 / $cantidadRespuestas * 100;

        return $respuestas;
    }

    public function calcularEnfoqueCambioClimático()
    {
        $respuestas;
        $cantidadRespuestas = $this->respuestaProyectos->count();

        $p201_537 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '201')
            ->where('respuestas.opcion_id', '537')
            ->count();
        $respuestas["conocimientoCC"] = $p201_537 / $cantidadRespuestas * 100;

        $p202_539 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '202')
            ->where('respuestas.opcion_id', '539')
            ->count();
        $p202_540 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '202')
            ->where('respuestas.opcion_id', '540')
            ->count();
        $p202_541 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '202')
            ->where('respuestas.opcion_id', '541')
            ->count();
        $respuestas["preparacionComunitariaCC"] = ($p202_539*3 + $p202_540*5 + $p202_541*10) / ($cantidadRespuestas*10) * 100;

        $p203_542 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '203')
            ->where('respuestas.opcion_id', '542')
            ->count();
        $p203_543 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '203')
            ->where('respuestas.opcion_id', '543')
            ->count();
        $p203_544 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '203')
            ->where('respuestas.opcion_id', '544')
            ->count();
        $respuestas["confianzaInstitiucional"] = ($p203_542*3 + $p203_543*5 + $p203_544*10) / ($cantidadRespuestas*10) * 100;
        $respuestas["percepcionCC"] = ($respuestas["conocimientoCC"] + $respuestas["preparacionComunitariaCC"] + $respuestas["confianzaInstitiucional"]) / 3;

        $p204_545 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '204')
            ->where('respuestas.opcion_id', '545')
            ->count();
        $respuestas["conocimientoAlertaTemprana"] = $p204_545 / $cantidadRespuestas * 100;
        $p205_547 = \DB::table('respuestas')
            ->join('respuesta_proyectos', 'respuestas.respuesta_proyecto_id', '=', 'respuesta_proyectos.id')
            ->where('respuesta_proyectos.proyecto_id', $this->id)
            ->where('respuestas.pregunta_id', '205')
            ->where('respuestas.opcion_id', '547')
            ->count();
        $respuestas["conocimientoPPAD"] = $p205_547 / $cantidadRespuestas * 100;
        $respuestas["institucionalidadCC"] = ($respuestas["conocimientoAlertaTemprana"] + $respuestas["conocimientoPPAD"]) / 2;

        return $respuestas;
    }
}
