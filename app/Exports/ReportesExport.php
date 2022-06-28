<?php

namespace App\Exports;

use App\Reporte;
use App\Formulario;
use App\NumeroRonda;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportesExport implements FromView
{
    protected $id;

    function __construct($id) {
        $this->id = $id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $formulario = Formulario::find(1);
        $numeroRondas = NumeroRonda::all();
        $reporte = Reporte::find($this->id);
        return view('reportes.exportar', [
            'reporte' => $reporte,
            'formulario' => $formulario,
            'numeroRondas' => $numeroRondas,
        ]);
    }
}
