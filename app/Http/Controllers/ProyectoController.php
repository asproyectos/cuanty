<?php

namespace App\Http\Controllers;

use App\Proyecto;
use App\Formulario;
use App\Respuesta;
use App\RespuestaProyecto;
use App\Encuestado;
use App\Pregunta;

use App\Pais;
use App\Region;
use App\Subregion;
use App\Comunidad;
use App\Nacionalidad;
use App\Sexo;
use App\Considera;
use App\MedioVida;
use App\Parentesco;
use App\RangoEdad;
use App\AnoResidencia;
use App\EstadoCivil;
use App\RegimenSalud;

use App\Auxiliar;
use App\Configuracion;

use App\InfraestructuraComunitaria;

use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formularios = Formulario::all();
        $proyectos = Proyecto::paginate(15);
        return view('proyectos.index', compact('proyectos', 'formularios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Cuenca::class);

        $formularios = Formulario::all();
        $paises = Pais::all();
        $regiones = Region::all();
        $subregiones = Subregion::all();
        $comunidades = Comunidad::all();
        return view('proyectos.create', compact('formularios', 'paises', 'regiones', 'subregiones', 'comunidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comunidad = Comunidad::firstOrCreate(
            ['subregion_id' => $request['subregion_id'], 'nombre' => $request['nombre_comunidad']],
            ['subregion_id' => $request['subregion_id'], 'nombre' => $request['nombre_lider']]
        );
        $proyecto = Proyecto::create([
            'nombre' => $request['nombre_proyecto'],
            'fecha' => $request['fecha_proyecto'],
            'fecha_inicio_encuesta' => $request['fecha_inicio'],
            'fecha_fin_encuesta' => $request['fecha_fin'],
            'comunidad_id' => $comunidad->id,
            'numero_hogares' => $request['numero_hogares'],
            'consentimiento_informado' => $request['consentimiento_informado'],
            'descripcion' => $request['descripcion'],
        ]);


        $proyecto->formularios()->attach(array_keys($request['formularios']));

        $encuestado = \App\Encuestado::firstOrCreate(
            ['identificacion' => $request['id_lider']],
            ['nombre' => $request['nombre_lider']]
        );

        $proyecto->encuestado_id = $encuestado->id;
        $proyecto->save();

        return redirect('/proyectos')->with('status', ['success', 'El proyecto '. $request['nombre_proyecto'] .' ha sido creada con éxito']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function encuestaStore(Proyecto $proyecto, Request $request)
    {
        $encuestado = Encuestado::updateOrCreate(
            [
                'identificacion' => $request['identificacion']
            ],
            [
                'nombre' => $request['nombre'],
                'identificacion' => $request['identificacion'],
                'nacionalidad_id' => $request['nacionalidad'],
                'lugar_nacimiento' => $request['lugar_nacimiento'],
                'sexo_id' => $request['sexo'],
            ]
        );

        $user = \Auth::user();
        $rp = RespuestaProyecto::create([
            'proyecto_id' => $proyecto->id,
            'hora_inicio_encuesta' => '',
            'hora_fin_encuesta' => '',
            'considera_id' => $request['considera'],
            'medio_vida_id' => $request['medio_vida'],
            'parentesco_id' => $request['parentesco'],
            'rango_edad_id' => $request['rango_edad'],
            'ano_residencia_id' => $request['ano_residencia'],
            'estado_civil_id' => $request['estado_civil'],
            'leer_escribir' => $request['leer_escribir'],
            'regimen_salud_id' => $request['regimen_salud'],
            'jefe_hogar' => $request['jefe_hogar'],
            'encuestado_id' => $encuestado->id,
            'user_id' => $user->id,

        ]);

        foreach ($request['pregunta'] as $pregunta => $opcion) {
            if ( !is_null($opcion) ) {
                if (is_array($opcion)) {
                    foreach ($opcion as $opc) {
                        Respuesta::create([
                            'pregunta_id' => $pregunta,
                            'opcion_id' => $opc,
                            'respuesta_proyecto_id' => $rp->id
                        ]);
                    }
                } else {
                    $preg = Pregunta::find($pregunta);

                    if ($preg->tipo_pregunta == 3) {
                        Respuesta::create([
                            'pregunta_id' => $pregunta,
                            'extra' => $opcion,
                            'respuesta_proyecto_id' => $rp->id
                        ]);
                    } else {
                        Respuesta::create([
                            'pregunta_id' => $pregunta,
                            'opcion_id' => $opcion,
                            'respuesta_proyecto_id' => $rp->id
                        ]);
                    }

                }
            }
        }

        return redirect('/proyectos')->with('status', ['success', 'La encuesta ha sido creada con éxito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        $this->authorize('create', Cuenca::class);

        $formularios = Formulario::all();
        $configuraciones = Configuracion::all();

        $estadisticasIMAC = "No hay encuestas para calcular";
        $scatterPobreza = [];
        if ($proyecto->respuestaProyectos->isNotEmpty() && $proyecto->formularios->find(2) && $proyecto->infraestructuraComunitaria ) {
            $estadisticasIMAC = $proyecto->calcularIMAC();

            foreach ($proyecto->respuestaProyectos as $index => $rp) {
                $valor = $rp->respuestas->where('pregunta_id','116')->first()->extra / $rp->respuestas->where('pregunta_id','101')->first()->opcion->nombre;
                $scatterPobreza[] = "{x:".(1+$index).",y:".number_format($valor ?? 0,2,'.','').", r: 4}";
            }
            // $scatterPobreza[] = "{x:10,y:5}";
            // dd( json_encode($scatterPobreza));
        }
        $estadisticasCC = "No hay encuestas para calcular";
        if ($proyecto->respuestaProyectos->isNotEmpty() && $proyecto->formularios->find(3)) {
            $estadisticasCC = $proyecto->calcularEnfoqueCambioClimático();
        }
        $estadisticasVC = "No hay encuestas para calcular";
        if ($proyecto->respuestaProyectos->isNotEmpty() && $proyecto->formularios->find(4)) {
            $estadisticasVC = $proyecto->calcularValoracionContingente();
        }

        $generos = \DB::table('proyectos')
            ->select('sexos.nombre as label', \DB::raw('count(distinct encuestados.id) as value'))
            // ->select('sexos.nombre','encuestados.id')
            ->join('respuesta_proyectos', 'proyectos.id', '=', 'respuesta_proyectos.proyecto_id')
            ->join('encuestados', 'encuestados.id', '=', 'respuesta_proyectos.encuestado_id')
            ->join('sexos','sexos.id','=','encuestados.sexo_id')
            ->where('proyectos.id',$proyecto->id)
            ->groupBy('sexos.nombre')
            ->get()->toJson();
        $considera = RespuestaProyecto::select('consideras.nombre as label', \DB::raw('count(*) as value'))
            ->join('proyectos','proyectos.id','=','respuesta_proyectos.proyecto_id')
            ->join('consideras','consideras.id','=','respuesta_proyectos.considera_id')
            ->where('proyectos.id',$proyecto->id)
            ->groupBy('consideras.nombre')
            ->get()->toJson();
        $medioVida = RespuestaProyecto::select('medio_vidas.nombre as label', \DB::raw('count(*) as value'))
            ->join('medio_vidas','medio_vidas.id','=','respuesta_proyectos.medio_vida_id')
            ->join('proyectos','proyectos.id','=','respuesta_proyectos.proyecto_id')
            ->where('proyectos.id',$proyecto->id)
            ->groupBy('medio_vidas.nombre')
            ->get()->toJson();
        $anoresidencia = RespuestaProyecto::select('ano_residencias.nombre as label', \DB::raw('count(*) as value'))
            ->join('ano_residencias','ano_residencias.id','=','respuesta_proyectos.ano_residencia_id')
            ->join('proyectos','proyectos.id','=','respuesta_proyectos.proyecto_id')
            ->where('proyectos.id',$proyecto->id)
            ->groupBy('ano_residencias.nombre')
            ->get()->toJson();

        return view('proyectos.show', compact('proyecto', 'formularios', 'estadisticasIMAC','estadisticasVC', 'estadisticasCC', 'scatterPobreza','generos','considera','medioVida','anoresidencia', 'configuraciones'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function encuesta(Proyecto $proyecto)
    {
        $nacionalidad = Nacionalidad::all();
        $sexo = Sexo::all();
        $considera = Considera::all();
        $medioVida = MedioVida::all();
        $parentesco = Parentesco::all();
        $rangoEdad = RangoEdad::all();
        $anoResidencia = AnoResidencia::all();
        $estadoCivil = EstadoCivil::all();
        $regimenSalud = RegimenSalud::all();
        return view('proyectos.encuesta', compact('proyecto', 'nacionalidad', 'sexo', 'considera', 'medioVida', 'parentesco', 'rangoEdad', 'anoResidencia', 'estadoCivil', 'regimenSalud' ));
    }

    public function encuestaShow(Proyecto $proyecto, RespuestaProyecto $respuestaProyecto)
    {
        return view('proyectos.encuesta_show', compact('proyecto','respuestaProyecto'));
    }

    public function encuestaEdit(Proyecto $proyecto, RespuestaProyecto $respuestaProyecto)
    {
        $nacionalidad = Nacionalidad::all();
        $sexo = Sexo::all();
        $considera = Considera::all();
        $medioVida = MedioVida::all();
        $parentesco = Parentesco::all();
        $rangoEdad = RangoEdad::all();
        $anoResidencia = AnoResidencia::all();
        $estadoCivil = EstadoCivil::all();
        $regimenSalud = RegimenSalud::all();
        return view('proyectos.encuesta_edit', compact('proyecto','respuestaProyecto', 'nacionalidad', 'sexo', 'considera', 'medioVida', 'parentesco', 'rangoEdad', 'anoResidencia', 'estadoCivil', 'regimenSalud' ));
    }

    public function encuestaUpdate(Request $request, Proyecto $proyecto, RespuestaProyecto $respuestaProyecto)
    {
        // dd($request);

        $encuestado = Encuestado::find($respuestaProyecto->encuestado_id);
        $encuestado->fill([
            'nombre' => $request['nombre'],
            'identificacion' => '12345',
            'nacionalidad_id' => $request['nacionalidad'],
            'lugar_nacimiento' => $request['lugar_nacimiento'],
            'sexo_id' => $request['sexo'],
        ]);
        $encuestado->save();


        $respuestaProyecto->fill([
            'proyecto_id' => $proyecto->id,
            'hora_inicio_encuesta' => '',
            'hora_fin_encuesta' => '',
            'considera_id' => $request['considera'],
            'medio_vida_id' => $request['medio_vida'],
            'parentesco_id' => $request['parentesco'],
            'rango_edad_id' => $request['rango_edad'],
            'ano_residencia_id' => $request['ano_residencia'],
            'estado_civil_id' => $request['estado_civil'],
            'leer_escribir' => $request['leer_escribir'],
            'regimen_salud_id' => $request['regimen_salud'],
            'jefe_hogar' => $request['jefe_hogar'],
        ]);
        $respuestaProyecto->save();

        Respuesta::where('respuesta_proyecto_id', $respuestaProyecto->id )->delete();

        foreach ($request['pregunta'] as $pregunta => $opcion) {
            if ( !is_null($opcion) ) {
                if (is_array($opcion)) {
                    foreach ($opcion as $opc) {
                        Respuesta::create([
                            'pregunta_id' => $pregunta,
                            'opcion_id' => $opc,
                            'respuesta_proyecto_id' => $respuestaProyecto->id
                        ]);
                    }
                } else {
                    $preg = Pregunta::find($pregunta);

                    if ($preg->tipo_pregunta == 3) {
                        Respuesta::create([
                            'pregunta_id' => $pregunta,
                            'extra' => $opcion,
                            'respuesta_proyecto_id' => $respuestaProyecto->id
                        ]);
                    } else {
                        Respuesta::create([
                            'pregunta_id' => $pregunta,
                            'opcion_id' => $opcion,
                            'respuesta_proyecto_id' => $respuestaProyecto->id
                        ]);
                    }

                }
            }
        }

        return redirect('/proyectos/'.$proyecto->id)->with('status', ['success', 'La encuesta ha sido editada con éxito']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function infraestructura(Proyecto $proyecto)
    {
        return view('proyectos.infraestructuras.create', compact('proyecto', 'nacionalidad', 'sexo', 'considera', 'medioVida', 'parentesco', 'rangoEdad', 'anoResidencia', 'estadoCivil', 'regimenSalud' ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function infraestructuraStore(Request $request, Proyecto $proyecto)
    {
        // dd($request);
        InfraestructuraComunitaria::create([
            'puesto_de_salud_presencia'  => $request['puesto_de_salud_presencia'],
            'escuela_comunitaria_primaria_presencia'  => $request['escuela_comunitaria_primaria_presencia'],
            'escuela_comunitaria_secundaria_presencia'  => $request['escuela_comunitaria_secundaria_presencia'],
            'sede_comunitaria_presencia'  => $request['sede_comunitaria_presencia'],
            'espacios_recreativos_presencia'  => $request['espacios_recreativos_presencia'],
            'hogar_comunitario_presencia'  => $request['hogar_comunitario_presencia'],
            'muelles_presencia'  => $request['muelles_presencia'],
            'cobertura_electrica_presencia'  => $request['cobertura_electrica_presencia'],
            'agua_potable_presencia'  => $request['agua_potable_presencia'],
            'alcantarillado_presencia'  => $request['alcantarillado_presencia'],
            'pozos_septicos_presencia'  => $request['pozos_septicos_presencia'],
            'senal_de_celular_presencia'  => $request['senal_de_celular_presencia'],
            'senal_de_television_presencia'  => $request['senal_de_television_presencia'],
            'puesto_de_salud_funcionamiento'  => $request['puesto_de_salud_funcionamiento'],
            'escuela_comunitaria_primaria_funcionamiento'  => $request['escuela_comunitaria_primaria_funcionamiento'],
            'escuela_comunitaria_secundaria_funcionamiento'  => $request['escuela_comunitaria_secundaria_funcionamiento'],
            'sede_comunitaria_funcionamiento'  => $request['sede_comunitaria_funcionamiento'],
            'espacios_recreativos_funcionamiento'  => $request['espacios_recreativos_funcionamiento'],
            'hogar_comunitario_funcionamiento'  => $request['hogar_comunitario_funcionamiento'],
            'muelles_funcionamiento'  => $request['muelles_funcionamiento'],
            'cobertura_electrica_funcionamiento'  => $request['cobertura_electrica_funcionamiento'],
            'agua_potable_funcionamiento'  => $request['agua_potable_funcionamiento'],
            'alcantarillado_funcionamiento'  => $request['alcantarillado_funcionamiento'],
            'pozos_septicos_funcionamiento'  => $request['pozos_septicos_funcionamiento'],
            'senal_de_celular_funcionamiento'  => $request['senal_de_celular_funcionamiento'],
            'senal_de_television_funcionamiento'  => $request['senal_de_television_funcionamiento'],
            'proyecto_id' => $proyecto->id,
        ]);
        return redirect('/proyectos/'.$proyecto->id)->with('status', ['success', 'La infraestructura ha sido creada con éxito']);
    }

    public function infraestructuraShow(Proyecto $proyecto)
    {
        return view('proyectos.infraestructuras.show', compact('proyecto'));
    }

    public function comparar()
    {
        $proyectos = Proyecto::all();
        $configuraciones = Configuracion::all();
        $scatterPobreza = [];
        return view('proyectos.comparar', compact('proyectos', 'configuraciones'));
    }

    public function compararProyectos(Request $request)
    {
        $comparacion;
        foreach ($request->get('proyectos') as $i => $idProyecto) {
            $proyecto = Proyecto::find($idProyecto);

            $scatter=[];
            foreach ($proyecto->respuestaProyectos as $j => $rp) {
                $valor = $rp->respuestas->where('pregunta_id','116')->first()->extra / $rp->respuestas->where('pregunta_id','101')->first()->opcion->nombre;
                $scatter[] = ['x' => 1+$j, 'y' => number_format($valor ?? 0,2,'.',''), 'r' => 2];
            }
            $comparacion['scatter'][] = [
                'label' => $proyecto->nombre,
                'backgroundColor' => 'rgba('.\App\Auxiliar::escogerColor($i).',0.4)',
                'borderColor' => 'rgba('.\App\Auxiliar::escogerColor($i).')',
                'data' => $scatter
            ];



            $estadisticasIMAC = $proyecto->calcularIMAC();
            $comparacion['imac'][] = [
                'label' => $proyecto->nombre,
                'backgroundColor' => 'rgba('.\App\Auxiliar::escogerColor($i).',0.4)',
                'borderColor' => 'rgba('.\App\Auxiliar::escogerColor($i).')',
                'fill' => 'false',
                'data' => [
                    number_format($estadisticasIMAC['dimensionSocioeconomica'] ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['pobreza']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['percepcionBienestar']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['infraestructuraComunitaria']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['diversidadOcupacional']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['movilidadOcupacional']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['cambiosEconomicos']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['percepcionCambioBienestar']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['dimensionSocioecologica']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['dependenciaUsoRN']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['anticiparseDisturbios']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['comprensionEntornoNatural']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['comprensionEntornoNatural']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['cambioPercepcionConservar']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['dimensionInstitucional']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['capitalSocial']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['accionColectiva']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['tomaDecisiones']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['cambiosCapitalSocial']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['conocimientoGeneralAC']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['controlSocialAC']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['percepcionDesempenoAC']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['aceptacionAC']  ?? 0,2,'.',''),
                    number_format($estadisticasIMAC['nivelSatisfaccion']  ?? 0,2,'.',''),
                    ]
                ];
        }
        return json_encode($comparacion);
    }



    public function indexApi(Request $request)
    {
        $user = \Auth::user();
        $user->proyectos;
        return response()->json([
            'success_code' => '200',
            'success_message' => 'Consulta de proyectos exitosa',
            'data' => $user->proyectos->load('comunidad:id,nombre')->makeHidden(['pivot','consentimiento_informado','encuestado_id','muestra','municipio','vereda_sector','numero_encuesta','tipo_proyecto_id']),
        ]);
    }

    public function showApi(Proyecto $proyecto)
    {
        $user = \Auth::user();
        // if ($user->rol->id == 3) {
            $data["infraestructura_comunitaria"] = [
                    "nombre" => "Infraestructura Comunitaria",
                    "preguntas" => [
                        ["id" => "puesto_de_salud_presencia", "descripcion" => "Presencia del Puesto de salud", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Sí"], ["id" => 0, "nombre" => "No"]] ],
                        ["id" => "escuela_comunitaria_primaria_presencia", "descripcion" => "Presencia de la Escuela comunitaria primaria", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Sí"], ["id" => 0, "nombre" => "No"]] ],
                        ["id" => "escuela_comunitaria_secundaria_presencia", "descripcion" => "Presencia de la Escuela comunitaria secundaria", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Sí"], ["id" => 0, "nombre" => "No"]] ],
                        ["id" => "sede_comunitaria_presencia", "descripcion" => "Presencia de la Sede comunitaria", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Sí"], ["id" => 0, "nombre" => "No"]] ],
                        ["id" => "espacios_recreativos_presencia", "descripcion" => "Presencia de los Espacios recreativos", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Sí"], ["id" => 0, "nombre" => "No"]] ],
                        ["id" => "hogar_comunitario_presencia", "descripcion" => "Presencia del Hogar comunitario", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Sí"], ["id" => 0, "nombre" => "No"]] ],
                        ["id" => "muelles_presencia", "descripcion" => "Presencia de muelles", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Sí"], ["id" => 0, "nombre" => "No"]] ],
                        ["id" => "cobertura_electrica_presencia", "descripcion" => "Presencia de Cobertura electrica", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Sí"], ["id" => 0, "nombre" => "No"]] ],
                        ["id" => "agua_potable_presencia", "descripcion" => "Presencia de Agua potable", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Sí"], ["id" => 0, "nombre" => "No"]] ],
                        ["id" => "alcantarillado_presencia", "descripcion" => "Presencia de Alcantarillado", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Sí"], ["id" => 0, "nombre" => "No"]] ],
                        ["id" => "pozos_septicos_presencia", "descripcion" => "Presencia de Pozos sépticos", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Sí"], ["id" => 0, "nombre" => "No"]] ],
                        ["id" => "senal_de_celular_presencia", "descripcion" => "Presencia de Señal de celular", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Sí"], ["id" => 0, "nombre" => "No"]] ],
                        ["id" => "senal_de_television_presencia", "descripcion" => "Presencia de Señal de television", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Sí"], ["id" => 0, "nombre" => "No"]] ],
                        ["id" => "puesto_de_salud_funcionamiento", "descripcion" => " Funcionamiento del Puesto de salud", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Alto"], ["id" => 2, "nombre" => "Medio"], ["id" => 3, "nombre" => "Bajo"]] ],
                        ["id" => "escuela_comunitaria_primaria_funcionamiento", "descripcion" => " Funcionamiento de la Escuela comunitaria primaria", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Alto"], ["id" => 2, "nombre" => "Medio"], ["id" => 3, "nombre" => "Bajo"]] ],
                        ["id" => "escuela_comunitaria_secundaria_funcionamiento", "descripcion" => " Funcionamiento de la Escuela comunitaria secundaria", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Alto"], ["id" => 2, "nombre" => "Medio"], ["id" => 3, "nombre" => "Bajo"]] ],
                        ["id" => "sede_comunitaria_funcionamiento", "descripcion" => " Funcionamiento de la Sede comunitaria", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Alto"], ["id" => 2, "nombre" => "Medio"], ["id" => 3, "nombre" => "Bajo"]] ],
                        ["id" => "espacios_recreativos_funcionamiento", "descripcion" => " Funcionamiento de los Espacios recreativos", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Alto"], ["id" => 2, "nombre" => "Medio"], ["id" => 3, "nombre" => "Bajo"]] ],
                        ["id" => "hogar_comunitario_funcionamiento", "descripcion" => " Funcionamiento del Hogar comunitario", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Alto"], ["id" => 2, "nombre" => "Medio"], ["id" => 3, "nombre" => "Bajo"]] ],
                        ["id" => "muelles_funcionamiento", "descripcion" => " Funcionamiento de Muelles", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Alto"], ["id" => 2, "nombre" => "Medio"], ["id" => 3, "nombre" => "Bajo"]] ],
                        ["id" => "cobertura_electrica_funcionamiento", "descripcion" => " Funcionamiento de Cobertura electrica", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Alto"], ["id" => 2, "nombre" => "Medio"], ["id" => 3, "nombre" => "Bajo"]] ],
                        ["id" => "agua_potable_funcionamiento", "descripcion" => " Funcionamiento de Agua potable", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Alto"], ["id" => 2, "nombre" => "Medio"], ["id" => 3, "nombre" => "Bajo"]] ],
                        ["id" => "alcantarillado_funcionamiento", "descripcion" => " Funcionamiento de Alcantarillado", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Alto"], ["id" => 2, "nombre" => "Medio"], ["id" => 3, "nombre" => "Bajo"]] ],
                        ["id" => "pozos_septicos_funcionamiento", "descripcion" => " Funcionamiento de Pozos sépticos", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Alto"], ["id" => 2, "nombre" => "Medio"], ["id" => 3, "nombre" => "Bajo"]] ],
                        ["id" => "senal_de_celular_funcionamiento", "descripcion" => " Funcionamiento de Señal de celular", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Alto"], ["id" => 2, "nombre" => "Medio"], ["id" => 3, "nombre" => "Bajo"]] ],
                        ["id" => "senal_de_television_funcionamiento", "descripcion" => " Funcionamiento de Señal de televisión", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Alto"], ["id" => 2, "nombre" => "Medio"], ["id" => 3, "nombre" => "Bajo"]] ],
            ]];
        // }

        $nacionalidad = Nacionalidad::all()->makeHidden(['created_at', 'updated_at']);
        $considera = Considera::all()->makeHidden(['created_at', 'updated_at']);
        $medioVida = MedioVida::all()->makeHidden(['created_at', 'updated_at']);
        $parentesco = Parentesco::all()->makeHidden(['created_at', 'updated_at']);
        $sexo = Sexo::all()->makeHidden(['created_at', 'updated_at']);
        $rangoEdad = RangoEdad::all()->makeHidden(['created_at', 'updated_at']);
        $anoResidencia = AnoResidencia::all()->makeHidden(['created_at', 'updated_at']);
        $estadoCivil = EstadoCivil::all()->makeHidden(['created_at', 'updated_at']);
        $regimenSalud = RegimenSalud::all()->makeHidden(['created_at', 'updated_at']);

        $data["caracteristicas_sociodemograficas"] = [
                "nombre" => "Características Sociodemográficas",
                "preguntas" => [
                    ["id" => "identificacion", "descripcion" => "Identificación", "tipo_pregunta" => 3],
                    ["id" => "nombre", "descripcion" => "nombre", "tipo_pregunta" => 3],
                    ["id" => "nacionalidad", "descripcion" => "Nacionalidad", "tipo_pregunta" => 1, "opciones" => $nacionalidad],
                    ["id" => "lugar_nacimiento", "descripcion" => "Lugar de nacimiento", "tipo_pregunta" => 3],
                    ["id" => "sexo", "descripcion" => "Sexo", "tipo_pregunta" => 1, "opciones" => $sexo],
                    ["id" => "considera", "descripcion" => "¿Cómo se considera?", "tipo_pregunta" => 1, "opciones" => $considera],
                    ["id" => "medio_vida", "descripcion" => "Principal medio de vida", "tipo_pregunta" => 1, "opciones" => $medioVida],
                    ["id" => "parentesco", "descripcion" => "Parentesco con el jefe del hogar", "tipo_pregunta" => 1, "opciones" => $parentesco],
                    ["id" => "rango_edad", "descripcion" => "Rango de edad", "tipo_pregunta" => 1, "opciones" => $rangoEdad],
                    ["id" => "ano_residencia", "descripcion" => "Años de residencia en la región", "tipo_pregunta" => 1, "opciones" => $anoResidencia],
                    ["id" => "estado_civil", "descripcion" => "Estado civil", "tipo_pregunta" => 1, "opciones" => $estadoCivil],
                    ["id" => "leer_escribir", "descripcion" => "Sabe leer y escribir", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Sí"], ["id" => 0, "nombre" => "No"]] ],
                    ["id" => "regimen_salud", "descripcion" => "Régimen de salud", "tipo_pregunta" => 1, "opciones" => $regimenSalud],
                    ["id" => "jefe_hogar", "descripcion" => "¿Es usted jefe de hogar?", "tipo_pregunta" => 1, "opciones" => [["id" => 1, "nombre" => "Sí"], ["id" => 0, "nombre" => "No"]] ],
                ]];

        $data["formularios"][] = $proyecto->load('formularios','formularios.grupoPreguntas','formularios.grupoPreguntas.preguntas','formularios.grupoPreguntas.preguntas.opciones');

        return response()->json([
            'success_code' => '200',
            'success_message' => 'Descarga del proyecto '.$proyecto->nombre.' exitosa',
            'data' => [$data],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function encuestaStoreApi(Proyecto $proyecto, Request $request)
    {
        $encuestado = Encuestado::updateOrCreate(
            [
                'identificacion' => $request['identificacion']
            ],
            [
                'nombre' => $request['nombre'],
                'identificacion' => $request['identificacion'],
                'nacionalidad_id' => $request['nacionalidad'],
                'lugar_nacimiento' => $request['lugar_nacimiento'],
                'sexo_id' => $request['sexo'],
            ]
        );

        $user = \Auth::user();
        $rp = RespuestaProyecto::create([
            'proyecto_id' => $proyecto->id,
            'hora_inicio_encuesta' => '',
            'hora_fin_encuesta' => '',
            'considera_id' => $request['considera'],
            'medio_vida_id' => $request['medio_vida'],
            'parentesco_id' => $request['parentesco'],
            'rango_edad_id' => $request['rango_edad'],
            'ano_residencia_id' => $request['ano_residencia'],
            'estado_civil_id' => $request['estado_civil'],
            'leer_escribir' => $request['leer_escribir'],
            'regimen_salud_id' => $request['regimen_salud'],
            'jefe_hogar' => $request['jefe_hogar'],
            'encuestado_id' => $encuestado->id,
            'user_id' => $user->id,
        ]);

        foreach ($request['pregunta'] as $pregunta => $opcion) {
            if ( !is_null($opcion) ) {
                if (is_array($opcion)) {
                    foreach ($opcion as $opc) {
                        Respuesta::create([
                            'pregunta_id' => $pregunta,
                            'opcion_id' => $opc,
                            'respuesta_proyecto_id' => $rp->id
                        ]);
                    }
                } else {
                    $preg = Pregunta::find($pregunta);

                    if ($preg->tipo_pregunta == 3) {
                        Respuesta::create([
                            'pregunta_id' => $pregunta,
                            'extra' => $opcion,
                            'respuesta_proyecto_id' => $rp->id
                        ]);
                    } else {
                        Respuesta::create([
                            'pregunta_id' => $pregunta,
                            'opcion_id' => $opcion,
                            'respuesta_proyecto_id' => $rp->id
                        ]);
                    }

                }
            }
        }

        return response()->json([
            'success_code' => '200',
            'success_message' => 'Encuesta del proyecto '.$proyecto->nombre.' almacenada con éxito',
            'data' => ['encuesta_id' => $rp->id],
        ]);
    }

    public function infraestructuraStoreApi(Request $request, Proyecto $proyecto)
    {
        InfraestructuraComunitaria::create([
            'puesto_de_salud_presencia'  => $request['puesto_de_salud_presencia'],
            'escuela_comunitaria_primaria_presencia'  => $request['escuela_comunitaria_primaria_presencia'],
            'escuela_comunitaria_secundaria_presencia'  => $request['escuela_comunitaria_secundaria_presencia'],
            'sede_comunitaria_presencia'  => $request['sede_comunitaria_presencia'],
            'espacios_recreativos_presencia'  => $request['espacios_recreativos_presencia'],
            'hogar_comunitario_presencia'  => $request['hogar_comunitario_presencia'],
            'muelles_presencia'  => $request['muelles_presencia'],
            'cobertura_electrica_presencia'  => $request['cobertura_electrica_presencia'],
            'agua_potable_presencia'  => $request['agua_potable_presencia'],
            'alcantarillado_presencia'  => $request['alcantarillado_presencia'],
            'pozos_septicos_presencia'  => $request['pozos_septicos_presencia'],
            'senal_de_celular_presencia'  => $request['senal_de_celular_presencia'],
            'senal_de_television_presencia'  => $request['senal_de_television_presencia'],
            'puesto_de_salud_funcionamiento'  => $request['puesto_de_salud_funcionamiento'],
            'escuela_comunitaria_primaria_funcionamiento'  => $request['escuela_comunitaria_primaria_funcionamiento'],
            'escuela_comunitaria_secundaria_funcionamiento'  => $request['escuela_comunitaria_secundaria_funcionamiento'],
            'sede_comunitaria_funcionamiento'  => $request['sede_comunitaria_funcionamiento'],
            'espacios_recreativos_funcionamiento'  => $request['espacios_recreativos_funcionamiento'],
            'hogar_comunitario_funcionamiento'  => $request['hogar_comunitario_funcionamiento'],
            'muelles_funcionamiento'  => $request['muelles_funcionamiento'],
            'cobertura_electrica_funcionamiento'  => $request['cobertura_electrica_funcionamiento'],
            'agua_potable_funcionamiento'  => $request['agua_potable_funcionamiento'],
            'alcantarillado_funcionamiento'  => $request['alcantarillado_funcionamiento'],
            'pozos_septicos_funcionamiento'  => $request['pozos_septicos_funcionamiento'],
            'senal_de_celular_funcionamiento'  => $request['senal_de_celular_funcionamiento'],
            'senal_de_television_funcionamiento'  => $request['senal_de_television_funcionamiento'],
            'proyecto_id' => $proyecto->id,
        ]);

        return response()->json([
            'success_code' => '200',
            'success_message' => 'La infraestructura comunitaria del proyecto '.$proyecto->nombre.' almacenada con éxito',
            'data' => [$request],
        ]);
    }
}
