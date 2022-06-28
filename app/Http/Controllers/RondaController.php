<?php

namespace App\Http\Controllers;

use App\Ronda;
use App\Reporte;
use App\Respuesta;
use App\Pregunta;
use App\Formulario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RondaController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {

        $rondas = Ronda::join('reportes','reportes.id','rondas.reporte_id');

        if ($request['fecha']) {
            $rondas->where('reportes.fecha', $request['fecha']);
        }
        if ($request['horas']) {
            $rondas->whereIn('rondas.numero_ronda_id', $request['horas']);
        }
        if ($request['campos']) {
            $rondas->whereIn('rondas.user_id', $request['campos']);
        };
        $rondas = $rondas->select('rondas.id')->orderBy('reportes.fecha','desc')->orderBy('rondas.numero_ronda_id','desc')->paginate(15);

        $horas = \App\NumeroRonda::all();
        $campos = \App\User::where('rol_id',2)->get();
        return view('rondas.index', compact('rondas','horas','campos'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }

    public function storeAPI(Request $request)
    {
        $fecha = new \Carbon\Carbon($request['created_at']);
        $usuario = \Auth::user();

        $usuario->verificacion = $request->all();
        $usuario->save();

        // if (!Hash::check($request['password_confirmation'],  $usuario->password)) {
        //     return response()->json([
        //         'code' => '000',
        //         'message' => 'Contraseña de verificación errónea',
        //     ]);
        // }

        $reporte = Reporte::firstOrCreate(['fecha' => $fecha->toDateString()]);

        if ( Ronda::where(['reporte_id' => $reporte->id, 'numero_ronda_id' => $request['round_name_id']])->first() ) {
            $numeroRonda = \App\NumeroRonda::find($request['round_name_id']);
            return response()->json([
                'code' => '000',
                'message' => "Ya existe una ronda a las {$numeroRonda->nombre}, en la fecha {$fecha->toDateString()}.",
            ]);
        }

        $ronda = Ronda::create([
            'reporte_id' => $reporte->id,
            'tipo_ronda_id' => $request['round_type_id'],
            'numero_ronda_id' => $request['round_name_id'],
            'user_id' => $usuario->id,
            'comentario' => $request['round_commentary'],
            'tipo_comentario_id' => $request['tipo_comentario_id'],
            'porcentaje' => $request['round_percentage'],
        ]);

        $totalAlarmasRonda = 0;
        foreach ($request['grupo_preguntas'] as $grupoPregunta) {
            foreach ($grupoPregunta['preguntas'] as $pregunta) {
                $preg = Pregunta::find($pregunta['id']);

                if ($pregunta['na'] == true) {
                    Respuesta::create([
                        'pregunta_id' => $preg->id,
                        'ronda_id' => $ronda->id,
                        'no_aplica' => 1
                    ]);
                } elseif (isset($pregunta['value'])) {
                    if ($preg->tipo_pregunta_id == 3) {
                        Respuesta::create([
                            'pregunta_id' => $preg->id,
                            'extra' => $pregunta['value'],
                            'ronda_id' => $ronda->id,
                            'alarma' => $alarma
                        ]);
                    } elseif ($preg->tipo_pregunta_id == 1) {
                        Respuesta::create([
                            'pregunta_id' => $preg->id,
                            'opcion_id' => $pregunta['value'],
                            'ronda_id' => $ronda->id,
                            'alarma' => $alarma
                        ]);
                    }
                } else {
                    Respuesta::create([
                        'pregunta_id' => $preg->id,
                        'ronda_id' => $ronda->id,
                    ]);
                }
            }
        }

        $ronda->fill([ 'cantidad_alarmas' => $totalAlarmasRonda ])->save();

        $totalAlarmasReporte = 0;
        foreach ($reporte->rondas as $r) {
            $totalAlarmasReporte += $r->cantidad_alarmas;
        }
        $reporte->fill([ 'cantidad_alarmas' => $totalAlarmasReporte ])->save();

        return response()->json([
            'code' => '200',
            'message' => 'Ronda almacenada con éxito',
        ]);

    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Ronda  $ronda
    * @return \Illuminate\Http\Response
    */
    public function show(Ronda $ronda)
    {
        return view('rondas.show', compact('ronda'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Ronda  $ronda
    * @return \Illuminate\Http\Response
    */
    public function edit(Ronda $ronda)
    {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Ronda  $ronda
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Ronda $ronda)
    {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Ronda  $ronda
    * @return \Illuminate\Http\Response
    */
    public function destroy(Ronda $ronda)
    {
        //
    }

    public function verificar(Ronda $ronda)
    {
        $this->authorize('verificar', $ronda);

        $formulario = Formulario::find(1);
        return view('rondas.verificar', compact('ronda','formulario'));
    }

    public function verificacion(Request $request, Ronda $ronda)
    {
        $this->authorize('verificacion', $ronda);

        $usuario = \Auth::user();
        $ronda->fill([ 'verificada' => 1, 'usuario_sala_control_id' => $usuario->id, 'comentario_verificacion' => $request['comentario'] ])->save();

        return redirect('/rondas')->with('status', ['success', "La ronda ".$ronda->reporte->fecha." - ".$ronda->numeroRonda->nombre." ha sido verificada con éxito."]);
    }

    public function anotaciones()
    {
        $rondas = Ronda::whereNotNull('comentario')->orderBy('id','desc')->paginate(30,['*'], 'comentarios');
        $respuestas = Respuesta::where('alarma',1)->orderBy('id','desc')->paginate(30,['*'], 'alarmas');
        return view('rondas.anotaciones', compact('rondas','respuestas'));
    }
}
