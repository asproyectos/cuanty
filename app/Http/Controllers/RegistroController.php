<?php

namespace App\Http\Controllers;

use App\Registro;
use App\ImagenRegistro;
use App\CategoriaEdad;
use App\TipoHabitat;
use App\User;
use App\Especie;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = Registro::paginate(15);
        return view('registros.index', ['registros' => $registros]);
    }

    public function indexApi(Request $request)
    {
        $registros = Registro::with([
            'especie:id,nombre,nombre_castellano',
            'comunidad:id,codigo,nombre,cuenca_id',
            'comunidad.cuenca:id,codigo,nombre,unidad_gestion_cuenca_id',
            'comunidad.cuenca.unidadGestionCuenca:id,codigo,nombre',
            'categoriaEdad:id,codigo,nombre',
            'tipoHabitat:id,codigo,nombre',
            'imagenesRegistro' => function ($query) {
                $query->limit(1);
            }
        ])->where('user_id', $request['userID'])->get();

        foreach ($registros as $registro) {
            $registro->fecha_natural = $registro->fecha->formatLocalized('%B %d/%y');
            $registro->hora_inicio_natural = $registro->hora_inicio->format('g:i A');
            $registro->hora_final_natural = $registro->hora_final->format('g:i A');
            if (!empty($registro->imagenesRegistro)) {
                foreach ($registro->imagenesRegistro as $imagen) {
                    $imagen->nombre = asset('imagenes_registros/'.$imagen->nombre);
                }
            }
        }

        return response()->json([
            'success_code' => '200',
            'success_message' => 'Consulta de listado de registros exitosa',
            'data' => $registros,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edades = CategoriaEdad::all();
        $tiposHabitat = TipoHabitat::all();
        $usuarios = User::all();
        return view('registros.create', compact('edades','tiposHabitat', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registro = Registro::create([
            'fecha' => $request['fecha'],
            'hora_inicio' => $request['hora_inicio'],
            'hora_final' => $request['hora_final'],
            'hora_marea_alta' => $request['hora_marea_alta'],
            'numero_sitio' => $request['numero_sitio'],
            'comunidad_id' => $request['comunidad_id'],
            'latitud' => $request['latitud'],
            'longitud' => $request['longitud'],
            'user_id' => (\Auth::user()->rol_id != 1) ? \Auth::user()->rol_id : $request['observador_id'],
            'especie_id' => $request['especie_id'],
            'cantidad' => $request['cantidad'],
            'cantidad_adulto' => $request['cantidad_adulto'],
            'cantidad_juvenil' => $request['cantidad_juvenil'],
            'cantidad_cria' => $request['cantidad_cria'],
            'cantidad_total' => $request['cantidad_adulto'] + $request['cantidad_juvenil'] + $request['cantidad_cria'] + $request['cantidad'],
            // 'categoria_edad_id' => $request['categoria_edad_id'],
            'tipo_habitat_id' => $request['tipo_habitat_id'],
            'comentarios' => $request['comentarios'],
            'especie_identificada' => isset($request['especie_identificada']) ? 1 : 0,
        ]);

        if ($request['imagenes']) {
            foreach ($request['imagenes'] as $key) {
                $imagenRegistro = ImagenRegistro::find($key);
                $imagenRegistro->registro_id = $registro->id;
                $imagenRegistro->save();
            }
        }

        $especie = Especie::find($request['especie_id']);

        return redirect('/registros')->with('status', ['success', "El registro de {$especie->nombre} ha sido creado con éxito"]);
    }

    public function storeApi(Request $request)
    {
        $registro = Registro::create([
            'fecha' => $request['dateRegister'],
            'hora_inicio' => $request['hourRegister'],
            'hora_final' => $request['hourEnd'],
            'hora_marea_alta' => $request['hourMarea'],
            'numero_sitio' => $request['siteNumber'],
            'comunidad_id' => $request['community'],
            'latitud' => $request['latitud'],
            'longitud' => $request['longitud'],
            'user_id' => $request['id'],
            'especie_id' => $request['specieCode'],
            'cantidad' => $request['specieCant'],
            'cantidad_adulto' => $request['cantidadAdulto'],
            'cantidad_juvenil' => $request['cantidadJuvenil'],
            'cantidad_cria' => $request['cantidadCria'],
            'cantidad_total' => $request['cantidadAdulto'] + $request['cantidadJuvenil'] + $request['cantidadCria'] + $request['specieCant'],
            // 'categoria_edad_id' => $request['ageCategorie'],
            'tipo_habitat_id' => $request['typeInhabits'],
            'comentarios' => $request['comments'],
            'especie_identificada' => $request['especie_identificada']
        ]);

        if ($request['images']) {
            foreach ($request['images'] as $base64_image) {
                if (preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {

                    $data = substr($base64_image, strpos($base64_image, ',') + 1);
                    $data = str_replace(' ', '+', $data);

                    $nombre = \Str::random(20);
                    preg_match('/^data:image\/(\w+);base64,/', $base64_image, $extension);
                    \File::put(public_path('imagenes_registros'). "/{$nombre}.{$extension[1]}", base64_decode($data));

                    ImagenRegistro::create(['nombre' => "{$nombre}.{$extension[1]}", 'registro_id' => $registro->id]);
                }
            }
        }

        $cantidad = Registro::all()->where('user_id', $request['id'])->count();
        return response(['success_code' => 200, 'success_message' => 'registro creado correctamente', 'data' => ['cantidadRegistros' => $cantidad] ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registro)
    {
        return view('registros.show', compact('registro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro $registro)
    {
        $this->authorize('update', $registro);

        $edades = CategoriaEdad::all();
        $tiposHabitat = TipoHabitat::all();
        $usuarios = User::all();
        return view('registros.edit', compact('registro','edades','tiposHabitat', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registro $registro)
    {
        $this->authorize('update', $registro);

        $registro->fill([
            'fecha' => $request['fecha'],
            'hora_inicio' => $request['hora_inicio'],
            'hora_final' => $request['hora_final'],
            'hora_marea_alta' => $request['hora_marea_alta'],
            'numero_sitio' => $request['numero_sitio'],
            'comunidad_id' => $request['comunidad_id'],
            'latitud' => $request['latitud'],
            'longitud' => $request['longitud'],
            'user_id' => (\Auth::user()->rol_id != 1) ? \Auth::user()->rol_id : $request['observador_id'],
            'especie_id' => $request['especie_id'],
            'cantidad' => $request['cantidad'],
            'cantidad_adulto' => $request['cantidad_adulto'],
            'cantidad_juvenil' => $request['cantidad_juvenil'],
            'cantidad_cria' => $request['cantidad_cria'],
            'cantidad_total' => $request['cantidad_adulto'] + $request['cantidad_juvenil'] + $request['cantidad_cria'] + $request['cantidad'],
            // 'categoria_edad_id' => $request['categoria_edad_id'],
            'tipo_habitat_id' => $request['tipo_habitat_id'],
            'comentarios' => $request['comentarios'],
            'especie_identificada' => isset($request['especie_identificada']) ? 1 : 0,
        ]);
        $registro->save();

        if ($request['imagenes']) {
            foreach ($request['imagenes'] as $key) {
                $imagenRegistro = ImagenRegistro::find($key);
                $imagenRegistro->registro_id = $registro->id;
                $imagenRegistro->save();
            }
        }

        if ($request['imagenesBorrar']) {
            foreach ($request['imagenesBorrar'] as $key) {
                $imagenRegistro = ImagenRegistro::find($key);
                $imagenRegistro->delete();
            }
        }

        $especie = Especie::find($request['especie_id']);

        return redirect('/registros')->with('status', ['success', "El registro de {$especie->nombre} ha sido modificado con éxito"]);
    }

    public function exportar() {
        $fileName = 'Registros-CVC-AVES.csv';
        $columnNames = ['blah', 'yada', 'hmm'];//replace this with your own array of string column headers
        $registros = Registro::all();
        // dd($registros);
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=" . $fileName,
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];
        $registros = Registro::all();
        $columns = array(
            'Fecha', 'Hora de inicio', 'Hora final', 'Hora de marea alta', 'Número de sitio', 'UGC',
            'Cuenca', 'Comunidad', 'Latitud', 'Longitud', 'Observador', 'Código de especie', 'Orden',
            'Familia','Especie','Nombre en español','Nombre en inglés','Altura mínima','Altura máxima',
            'Amenza Nacional','Amenza global','Cantidad Crias','Cantidad Juvenil','Cantidad Adultos',
            'Cantidad sin identificar','Cantidad total','Tipo de hábitat', 'Especie identificada', 'Comentarios');

        $callback = function() use ($registros, $columns)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach($registros as $registro) {
                fputcsv($file, array(
                    $registro->fecha->formatLocalized('%B %d/%y'),
                    $registro->hora_inicio->format('g:i A'),
                    $registro->hora_final->format('g:i A'),
                    $registro->hora_marea_alta->format('g:i A'),
                    $registro->numero_sitio,
                    $registro->comunidad->cuenca->unidadGestionCuenca->codigo.' - '.$registro->comunidad->cuenca->unidadGestionCuenca->nombre,
                    $registro->comunidad->cuenca->nombre,
                    $registro->comunidad->nombre,
                    $registro->latitud,
                    $registro->longitud,
                    $registro->user->name,
                    $registro->especie->codigo,
                    $registro->especie->orden->nombre,
                    $registro->especie->familia->nombre,
                    $registro->especie->nombre,
                    $registro->especie->nombre_castellano,
                    $registro->especie->nombre_ingles,
                    $registro->especie->altura_minima,
                    $registro->especie->altura_maxima,
                    $registro->especie->amenazaNacional->nombre,
                    $registro->especie->amenazaGlobal->nombre,
                    $registro->cantidad_cria,
                    $registro->cantidad_juvenil,
                    $registro->cantidad_adulto,
                    $registro->cantidad,
                    $registro->cantidad_total,
                    $registro->tipoHabitat->nombre,
                    $registro->especie_identificada ? 'Sí' : 'No',
                    $registro->comentarios,

                ));
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registro $registro)
    {
        $this->authorize('delete', $registro);

        $nombre = $registro->especie->nombre;
        $registro->delete();
        return redirect('/registros')->with('status', ['success', "El registro de {$nombre} ha sido eliminado con éxito"]);
    }
}
