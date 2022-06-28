<?php

namespace App\Http\Controllers;

use App\Region;
use App\Pais;
use App\Subregion;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regiones = Region::paginate(15);
        return view('regiones.index', compact('regiones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Region::class);

        $paises = Pais::all();
        return view('regiones.create', compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Region::class);

        Region::create([
            'codigo' => $request['codigo'],
            'nombre' => $request['nombre'],
            'pais_id' => $request['pais_id'],
        ]);

        return redirect('/regiones')->with('status', ['success', 'La región '. $request['nombre'] .' ha sido creada con éxito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        return view('regiones.show', compact('region'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        $this->authorize('update', $region);

        $paises = Pais::all();
        return view('regiones.edit', compact('region','paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        $this->authorize('update', $region);

        $region->fill([
            'codigo' => $request['codigo'],
            'nombre' => $request['nombre'],
            'pais_id' => $request['pais_id'],
        ])->save();

        return redirect('/regiones')->with('status', ['success', 'La región '. $request['nombre'] .' ha sido modificada con éxito']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        //
    }

    public function getSubregiones(Request $request)
    {
        $usuariosJson = Subregion::latest()
            ->select('id', 'nombre', 'codigo')
            ->where('region_id', $request->get('region'))
            ->get();
        return $usuariosJson;
    }
}
