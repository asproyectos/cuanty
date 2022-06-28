<?php

namespace App\Http\Controllers;

use App\AmenazaGlobal;
use App\AmenazaNacional;
use App\CategoriaEdad;
use App\Genero;
use App\Orden;
use App\TipoHabitat;
use App\Familia;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function configuracion()
    {
        $amenazaGlobal = AmenazaGlobal::all();
        $amenazaNacional = AmenazaNacional::all();
        $categoriaEdad = CategoriaEdad::all();
        $tipoHabitat = TipoHabitat::all();
        $orden = Orden::paginate(15);
        $familia = Familia::paginate(15);
        return view('extras.configuracion',
            compact( 'amenazaGlobal', 'amenazaNacional', 'categoriaEdad', 'orden', 'tipoHabitat', 'familia')
        );
    }

    public function creditos()
    {
        $amenazaGlobal = AmenazaGlobal::all();
        $amenazaNacional = AmenazaNacional::all();
        $categoriaEdad = CategoriaEdad::all();
        $tipoHabitat = TipoHabitat::all();
        $orden = Orden::paginate(15);
        $familia = Familia::paginate(15);
        return view('extras.creditos',
            compact( 'amenazaGlobal', 'amenazaNacional', 'categoriaEdad', 'orden', 'tipoHabitat', 'familia')
        );
    }

    public function orientacion()
    {
        return view('extras.orientacion');
    }
}
