<?php

namespace App\Http\Controllers;

use App\Formulario;
use App\NumeroRonda;
use App\TipoRonda;
use App\GrupoPregunta;
use Illuminate\Http\Request;

class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formulario = Formulario::find(1);
        return view('rutas.index', compact('formulario'));
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function show(Formulario $formulario)
    {
        //
    }

    public function empresa()
    {
        $formulario = Formulario::find(1);
        return view('formularios.show', compact('formulario'));
    }
    public function perfilEmprendedor()
    {
        $formulario = Formulario::find(101);
        return view('formularios.show', compact('formulario'));
    }
    public function direccionamientoEstrategico()
    {
        $formulario = Formulario::find(201);
        return view('formularios.show', compact('formulario'));
    }
    public function financiero()
    {
        $formulario = Formulario::find(301);
        return view('formularios.show', compact('formulario'));
    }
    public function mercadeoYVentas()
    {
        $formulario = Formulario::find(401);
        return view('formularios.show', compact('formulario'));
    }
    public function gestionTecnica()
    {
        $formulario = Formulario::find(501);
        return view('formularios.show', compact('formulario'));
    }
    public function administracionNormativa()
    {
        $formulario = Formulario::find(601);
        return view('formularios.show', compact('formulario'));
    }








    /**
     * Display the specified resource.
     *
     * @param  \App\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function showApi(Formulario $formulario)
    {
        $data['ronda'] = NumeroRonda::where('activa', 1)->get()->makeHidden(['created_at', 'updated_at', 'activa']);
        $data['tipo_ronda'] = TipoRonda::where('activa', 1)->get()->makeHidden(['created_at', 'updated_at', 'activa']);
        $data['tipo_comentario'] = \App\TipoComentario::where('activo', 1)->get()->makeHidden(['created_at', 'updated_at', 'activo']);
        $data['actualizado'] = $formulario->updated_at;
        $data['formulario'] = $formulario->with([
            'grupoPreguntas' => function ($query) {
                $query->where('activa', '1')->orderBy('orden', 'asc')->select('id','nombre','orden','formulario_id','system_percentage', 'naAll');
            },'grupoPreguntas.preguntas' => function ($query) {
                $query->where('activa', '1')->orderBy('orden', 'asc')->select('id','descripcion','dispositivo','unidad','tipo_pregunta_id','orden','value','na','grupo_pregunta_id');
            },'grupoPreguntas.preguntas.opciones' => function ($query) {
                $query->where('activa', '1')->select('id','pregunta_id','nombre','orden');
            },])->get()->makeHidden(['updated_at','created_at','descripcion']);

        return response()->json([
            'code' => '200',
            'message' => 'Descarga del sitema '.$formulario->nombre.' exitosa',
            'data' => [$data],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function edit(Formulario $formulario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formulario $formulario)
    {
        $orden = 1;
        foreach ($request['sistema'] as $key => $value) {
            $gp = GrupoPregunta::find($key);
            $gp->orden = $orden;
            $gp->save();
            $orden++;
        }

        \App\Formulario::where('id', 1)->update(['updated_at' => date("Y-m-d H:i:s")]);
        return redirect('/ruta')->with('status', ['success', 'El Orden de los sistemas se ha actualizado con éxito']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formulario $formulario)
    {
        //
    }
}
