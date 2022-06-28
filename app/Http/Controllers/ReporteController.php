<?php

namespace App\Http\Controllers;

use App\Exports\ReportesExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Reporte;
use App\Formulario;
use App\NumeroRonda;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reportes = Reporte::join('rondas','reportes.id','rondas.reporte_id');

        if ($request['fecha']) {
            $reportes->where('fecha', $request['fecha']);
        }
        if ($request['campos']) {
            $reportes->whereIn('rondas.user_id', $request['campos']);
        }
        if ($request['jefes']) {
            $reportes->whereIn('reportes.user_id', $request['jefes']);
        };
        $reportes = $reportes->select('reportes.id')->distinct()->orderBy('reportes.fecha','desc')->paginate(15);

        $numeroRondas = NumeroRonda::all();
        $jefes = \App\User::where('rol_id',4)->get();
        $campos = \App\User::where('rol_id',2)->get();
        return view('reportes.index', compact('reportes','numeroRondas','jefes','campos'));
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
     * @param  \App\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function show(Reporte $reporte)
    {
        $numeroRondas = NumeroRonda::all();
        return view('reportes.show', compact('reporte', 'numeroRondas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function edit(Reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reporte $reporte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reporte $reporte)
    {
        //
    }


    public function verificar(Reporte $reporte)
    {
        $this->authorize('verificar', $reporte);

        $formulario = Formulario::find(1);
        $numeroRondas = NumeroRonda::all();
        return view('reportes.verificar', compact('reporte', 'numeroRondas','formulario'));
    }

    public function verificacion(Request $request, Reporte $reporte)
    {
        $this->authorize('verificacion', $reporte);

        $usuario = \Auth::user();
        $reporte->fill([
            'verificado' => 1,
            'user_id' => $usuario->id,
            'comentario' => $request['comentario']
            ])->save();

        return redirect('/reportes')->with('status', ['success', "El reporte del día ".$reporte->fecha." ha sido verificado con éxito."]);
    }

    public function exportar(Reporte $reporte)
    {
        return Excel::download(new ReportesExport($reporte->id), 'reporte-'.$reporte->fecha.'.xlsx');
    }
}
