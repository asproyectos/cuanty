<?php

namespace App\Http\Controllers;

use App\User;
use App\Encuestado;
use App\Proyecto;
use App\Formulario;
use App\Respuesta;
use App\Pregunta;
use App\RespuestaProyecto;
use App\Comunidad;

use App\Ronda;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rondas = Ronda::orderBy('id','desc')->limit(5)->get();
        $rondasComentarios = Ronda::whereNotNull('comentario')->orderBy('id','desc')->limit(5)->get();

        return view('home', compact('rondas', 'rondasComentarios'));
    }
}
