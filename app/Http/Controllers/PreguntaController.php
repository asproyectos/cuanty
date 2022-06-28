<?php

namespace App\Http\Controllers;

use App\Exports\AnalisisExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Pregunta;
use App\TipoPregunta;
use App\GrupoPregunta;
use App\Opcion;
use App\Alarma;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $equipos = Pregunta::orderBy('grupo_pregunta_id', 'asc')->orderBy('orden', 'asc');

        if ($request['sistemas']) {
            $equipos->whereIn('preguntas.grupo_pregunta_id', $request['sistemas']);
        }
        if (isset($request['activo'])) {
            if ($request['activo'] != null) {
                $equipos->where('preguntas.activa', $request['activo']);
            }
        }
        if ($request['nombre']) {
            $equipos->where('preguntas.descripcion', 'like' , '%'.$request['nombre'].'%');
        }
        $equipos = $equipos->paginate(15);


        $grupoPreguntas = GrupoPregunta::all();
        return view('equipos.index', compact('equipos','grupoPreguntas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Pregunta::class);

        $tipos = TipoPregunta::where('activo', 1)->get();
        $grupoPreguntas = GrupoPregunta::where('activa', 1)->get();
        return view('equipos.create', compact('tipos', 'grupoPreguntas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Pregunta::class);

        $preg = Pregunta::orderBy('orden', 'desc')->first();
        $pregunta = Pregunta::create([
            'descripcion' => $request['descripcion'],
            'dispositivo' => $request['dispositivo'],
            'unidad' => $request['unidad'],
            'grupo_pregunta_id' => $request['grupo_pregunta_id'],
            'tipo_pregunta_id' => $request['tipo_pregunta_id'],
            'orden' => $preg->orden + 1,
        ]);

        if ($request['tipo_pregunta_id'] == 1) {
            $orden = 1;
            foreach ($request['opciones'] as $opcion) {
                Opcion::create([
                    'nombre' => $opcion,
                    'orden' => $orden,
                    'activa' => 1,
                    'pregunta_id' => $pregunta->id,
                ]);
                $orden++;
            }
            if (!empty($request['alarma-selector'])) {
                foreach ($request['alarma-selector'] as $key => $value) {
                    $op = Opcion::firstOrCreate(
                        ['nombre' => $value,'pregunta_id' => $pregunta->id],
                        ['orden' => $orden,'activa' => 1]
                    );
                    $orden++;
                    Alarma::create([
                        'pregunta_id' => $pregunta->id,
                        'tipo_alarma_id' => $key,
                        'opcion_id' => $op->id
                    ]);
                }
            }
        } else {
            if (!empty($request['alarma-numerico'])) {
                foreach ($request['alarma-numerico'] as $key => $value) {
                    Alarma::create([
                        'pregunta_id' => $pregunta->id,
                        'tipo_alarma_id' => $key,
                        'valor' => $value
                    ]);
                }
            }
        }

        \App\Formulario::where('id', 1)->update(['updated_at' => date("Y-m-d H:i:s")]);
        return redirect('/equipos')->with('status', ['success', 'El Equipo '. $request['nombre'] .' ha sido creado con éxito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        return view('equipos.show', compact('pregunta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregunta $pregunta)
    {
        $this->authorize('create', Pregunta::class);

        $tipos = TipoPregunta::where('activo', 1)->get();
        $grupoPreguntas = GrupoPregunta::where('activa', 1)->get();
        return view('equipos.edit', compact('pregunta', 'tipos', 'grupoPreguntas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pregunta $pregunta)
    {
        $pregunta->fill([
            'descripcion' => $request['descripcion'],
            'activa' => $request['activa'] ? 1 : 0,
            'dispositivo' => $request['dispositivo'],
            'unidad' => $request['unidad'],
            'normal' => $request['normal'],
        ])->save();

        Alarma::where('pregunta_id', $pregunta->id)->delete();

        if ($pregunta->tipo_pregunta_id == 1) {
            Opcion::where('pregunta_id',$pregunta->id)->update(['activa' => 0, 'orden' => 255]);
            $orden = 1;
            foreach ($request['opciones'] as $key => $value ) {
                $identificador = explode(':', $key);
                if ($identificador[0] == 'id') {
                    Opcion::where('id',$identificador[1])->update(['activa' => 1, 'orden' => $orden]);
                } else {
                    Opcion::create([
                        'nombre' => $value,
                        'orden' => $orden,
                        'activa' => 1,
                        'pregunta_id' => $pregunta->id,
                    ]);
                }
                $orden++;
            }
            if (!empty($request['alarma-selector'])) {
                foreach ($request['alarma-selector'] as $key => $value) {
                    $op = Opcion::firstOrCreate(
                        ['nombre' => $value,'pregunta_id' => $pregunta->id],
                        ['orden' => $orden,'activa' => 1]
                    );
                    $orden++;
                    Alarma::create([
                        'pregunta_id' => $pregunta->id,
                        'tipo_alarma_id' => $key,
                        'opcion_id' => $op->id
                    ]);
                }
            }
        } else {
            if (!empty($request['alarma-numerico'])) {
                foreach ($request['alarma-numerico'] as $key => $value) {
                    Alarma::create([
                        'pregunta_id' => $pregunta->id,
                        'tipo_alarma_id' => $key,
                        'valor' => $value
                    ]);
                }
            }
        }

        \App\Formulario::where('id', 1)->update(['updated_at' => date("Y-m-d H:i:s")]);
        return redirect('/equipos')->with('status', ['success', 'El Equipo '. $request['dispositivo'] .' ha sido creado con éxito']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $pregunta)
    {
        //
    }

    public function analisis(Request $request)
    {
        $equipos = Pregunta::find($request['equipos']);
        $rondas = \DB::table('rondas')->join('reportes', 'reportes.id', '=', 'rondas.reporte_id')->join('numero_rondas', 'rondas.numero_ronda_id','numero_rondas.id');
        if ($request['fecha_inicial']) {
            $rondas->where('reportes.fecha', '>=',$request['fecha_inicial']);
        }
        if ($request['fecha_final']) {
            $rondas->where('reportes.fecha', '<=',$request['fecha_final']);
        }
        $rondas = $rondas->select('rondas.*')->get();
        $grupoPreguntas = GrupoPregunta::where('activa', 1)->get();

        $lineChart['datasets'] = "";
        $lineChart['labels'] = "";
        if (!empty($equipos)) {
            $labels = "";
            $datasets = "";
            $equipoChart = [];
            foreach ($rondas as $ronda) {
                $ron = \App\Ronda::find($ronda->id);
                $labels .= '"'.$ron->reporte->fecha.' - '.$ron->numeroRonda->nombre.'",';

                foreach ($equipos as $equipo) {
                    if ($ron->respuestas->where('pregunta_id',$equipo->id)->first() != null) {
                        if ($equipo->tipoPregunta->id == 3) {
                            $equipoChart[$equipo->descripcion][] = $ron->respuestas->where('pregunta_id',$equipo->id)->first()->extra;
                        }
                    } else {
                        $equipoChart[$equipo->descripcion][] = "";
                    }
                }
            }
            $lineChart['labels'] = $labels;
            $i = 1;
            foreach ($equipoChart as $key => $value) {
                $datasets .= '{"label":"'.$key.'","data":['. implode(",", $value) .'],"fill":false,"borderColor":"rgb('.\App\Auxiliar::escogerColor($i).')","lineTension":0.1},';
                $i++;
            }
            $lineChart['datasets'] = $datasets;
        }

        return view('equipos.analisis', compact('grupoPreguntas','rondas','equipos','lineChart'));
    }

    public function exportar(Request $request)
    {
        return Excel::download(new AnalisisExport($request->all()), 'analisis.xlsx');
    }
}
