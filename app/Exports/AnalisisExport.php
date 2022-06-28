<?php

namespace App\Exports;

use App\Pregunta;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AnalisisExport implements FromView
{
    protected $request;

    function __construct($request) {
        $this->request = $request;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $equipos = Pregunta::find( explode(',', $this->request['equipos'][0]) );
        $rondas = \DB::table('rondas')->join('reportes', 'reportes.id', '=', 'rondas.reporte_id')->join('numero_rondas', 'rondas.numero_ronda_id','numero_rondas.id');
        if ($this->request['fecha_inicial']) {
            $rondas->where('reportes.fecha', '>=',$this->request['fecha_inicial']);
        }
        if ($this->request['fecha_final']) {
            $rondas->where('reportes.fecha', '<=',$this->request['fecha_final']);
        }
        $rondas = $rondas->select('rondas.*')->get();

        return view('equipos.exportar', [
            'equipos' => $equipos,
            'rondas' => $rondas,
            'fechaInicial' => $this->request['fecha_inicial'],
            'fechaFinal' => $this->request['fecha_final'],
        ]);
    }
}
