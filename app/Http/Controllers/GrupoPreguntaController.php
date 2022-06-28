<?php

namespace App\Http\Controllers;

use App\GrupoPregunta;
use App\Pregunta;
use Illuminate\Http\Request;

class GrupoPreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sistemas = GrupoPregunta::orderBy('orden', 'asc')->paginate(15);
        return view('sistemas.index', compact('sistemas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', GrupoPregunta::class);

        return view('sistemas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', GrupoPregunta::class);


        $sistema = GrupoPregunta::orderBy('orden', 'desc')->first();

        GrupoPregunta::create([
            'codigo' => $request['codigo'],
            'nombre' => $request['nombre'],
            'orden' => $sistema->orden + 1,
            'formulario_id' => 1
        ]);

        \App\Formulario::where('id', 1)->update(['updated_at' => date("Y-m-d H:i:s")]);
        return redirect('/sistemas')->with('status', ['success', 'El sistema '. $request['nombre'] .' ha sido creado con éxito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GrupoPregunta  $grupoPregunta
     * @return \Illuminate\Http\Response
     */
    public function show(GrupoPregunta $grupoPregunta)
    {
        return view('sistemas.show', compact('grupoPregunta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GrupoPregunta  $grupoPregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(GrupoPregunta $grupoPregunta)
    {
        $this->authorize('update', $grupoPregunta);

        return view('sistemas.edit', compact('grupoPregunta') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GrupoPregunta  $grupoPregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GrupoPregunta $grupoPregunta)
    {
        $this->authorize('update', $grupoPregunta);

        $grupoPregunta->fill([
            'codigo' => $request['codigo'],
            'nombre' => $request['nombre'],
            'activa' => $request['activa'] ? 1 : 0,
        ])->save();

        $orden = 1;
        foreach ($request['pregunta'] as $key => $value) {
            $pregunta = Pregunta::find($key);
            $pregunta->orden = $orden;
            $pregunta->save();
            $orden++;
        }

        \App\Formulario::where('id', 1)->update(['updated_at' => date("Y-m-d H:i:s")]);
        return redirect('/sistemas')->with('status', ['success', 'El sistema '. $request['nombre'] .' ha sido modificado con éxito']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GrupoPregunta  $grupoPregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(GrupoPregunta $grupoPregunta)
    {
        //
    }
}
