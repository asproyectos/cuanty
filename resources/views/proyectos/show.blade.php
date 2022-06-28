@extends('layouts.app')

@section('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style media="screen">
    .select2.select2-container.select2-container--default{
        width:230px !important;
    }
    #select2-select-especie-container,#select2-select-comunidad-container {
        height:35px;
    }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
@endsection

@section('content')
    <h3>Detalles del Proyecto</h3>
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Información general
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-hover-brand">
                                <i class="la la-arrow-left">
                                </i>
                                Atrás
                            </a>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h6>Nombre del proyecto</h6>
                            <p>{{ $proyecto->nombre}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>Encuestadores</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Rol</th>
                                        <th style="text-align:center">Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proyecto->usuarios as $usuario)
                                        <tr>
                                            <td>{{ $usuario->rol->nombre}}</td>
                                            <td>{{ $usuario->name}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6>Temáticas (Formularios)</h6>

                            <div>
                                @foreach ($formularios as $formulario)
                                    <label style=" padding-right: 25px; ">
                                        @if ($proyecto->formularios->find($formulario->id) != null)
                                            <span style="font-size: 15px;color:#89b94eff"><i class="fas fa-check"></i></span>
                                        @endif
                                        {{ $formulario->nombre }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h6>Fecha del proyecto</h6>
                            <p>{{ $proyecto->fecha}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h6>Fecha de inicio de las encuestas</h6>
                            <p>{{ $proyecto->fecha_inicio_encuesta}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h6>Fecha final de las encuestas</h6>
                            <p>{{ $proyecto->fecha_fin_encuesta}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h6>Número de hogares</h6>
                            <p>{{ $proyecto->numero_hogares}}</p>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <h6>Descripción del Proyecto</h6>
                            <p>{!! nl2br($proyecto->descripcion) !!}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <h6>Consentimiento informado</h6>
                            <br>
                            <button type="button" class="btn btn-sm btn-label-brand btn-bold" data-toggle="modal" data-target="#kt_modal_2"> Ver Consentimiento informado</button>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-12"><h5>Contexto geográfico</h5></div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h6>País</h6>
                            <p>{{ $proyecto->comunidad->subregion->region->pais->nombre}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h6>Región</h6>
                            <p>{{ $proyecto->comunidad->subregion->region->nombre}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h6>Subregión</h6>
                            <p>{{ $proyecto->comunidad->subregion->nombre}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h6>Comunidad</h6>
                            <p>{{ $proyecto->comunidad->nombre }}</p>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-12"><h5>Lider de Comunidad</h5></div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h6>Identificación</h6>
                            <p>{{ $proyecto->encuestado->identificacion }}</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group ">
                            <h6>Nombre</h6>
                            <p>{{ $proyecto->encuestado->nombre }}</p>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-6">
                        <h5>Infraestructura Comunitaria</h5>
                        @if (!empty($proyecto->infraestructuraComunitaria))
                            <a href="{{ route('proyectos.infraestructuras.show', $proyecto->id)}}" class="btn btn-sm btn-label-brand btn-bold">Ver</a>
                            {{-- <a href="{{ route('proyectos.infraestructuras.edit', $proyecto->id)}}" class="btn btn-sm btn-warning btn-bold">Editar</a> --}}
                        @else
                            <a href="{{ route('proyectos.infraestructuras.create', $proyecto->id)}}" class="btn btn-sm btn-success btn-bold">Añadir</a>
                        @endif
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-lg-3">
                        <div class="kt-portlet kt-portlet--tab">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon kt-hidden">
                                        <i class="la la-gear"></i>
                                    </span>
                                    <h3 class="kt-portlet__head-title">
                                        Sexo
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div id="kt_morris_1" style="height:300px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="kt-portlet kt-portlet--tab">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon kt-hidden">
                                        <i class="la la-gear"></i>
                                    </span>
                                    <h3 class="kt-portlet__head-title">
                                        Cómo se considera
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div id="kt_morris_2" style="height:300px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="kt-portlet kt-portlet--tab">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon kt-hidden">
                                        <i class="la la-gear"></i>
                                    </span>
                                    <h3 class="kt-portlet__head-title">
                                        Principal medio de vida
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div id="kt_morris_3" style="height:300px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="kt-portlet kt-portlet--tab">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon kt-hidden">
                                        <i class="la la-gear"></i>
                                    </span>
                                    <h3 class="kt-portlet__head-title">
                                        Años de residencia en la región
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div id="kt_morris_4" style="height:300px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-6">
                        <canvas id="radar-chart" width="400" height="200"></canvas>
                    </div>
                    <div class="col-md-6">
                        <canvas id="scatter-chart" width="400" height="200"></canvas>
                    </div>
                </div>
                <div class="kt-portlet__body ">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="kt-portlet__head-title" style=" padding-left: 20px; ">
                                Estadísticas
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        @if ($proyecto->formularios->find(2))
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-sm">
                                            <thead>
                                                <tr>
                                                    <th colspan="2" style="text-align:center">INDICE MONITOREO ACUERDO CONSERVACIÓN</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ( !is_array($estadisticasIMAC) )
                                                    <tr>
                                                        <td  style="text-align:center">{{$estadisticasIMAC}}</td>
                                                    </tr>
                                                @else
                                                    <tr style=" background: #dbdbdb; font-weight: bold; "><td>Dimensión Socioeconómica </td> <td style="text-align: right;">{{ round($estadisticasIMAC['dimensionSocioeconomica'],2) }}</td></tr>
                                                    <tr><td>Pobreza </td> <td style="text-align: right;">{{ round($estadisticasIMAC['pobreza'],2) }}</td></tr>
                                                    <tr><td>Percepción bienestar </td> <td style="text-align: right;">{{ round($estadisticasIMAC['percepcionBienestar'],2) }}</td></tr>
                                                    <tr><td>Infraestructura comunitaria </td> <td style="text-align: right;">{{ round($estadisticasIMAC['infraestructuraComunitaria'],2) }} </td></tr>
                                                    <tr><td>Diversidad ocupacional </td> <td style="text-align: right;">{{ round($estadisticasIMAC['diversidadOcupacional'],2) }} </td></tr>
                                                    <tr><td>Movilidad ocupacional </td> <td style="text-align: right;"> {{ round($estadisticasIMAC['movilidadOcupacional'],2) }}</td></tr>
                                                    <tr><td>Cambios económicos </td> <td style="text-align: right;"> {{ round($estadisticasIMAC['cambiosEconomicos'],2) }}</td></tr>
                                                    <tr><td>Percepción de cambio en el bienestar </td> <td style="text-align: right;">{{ round($estadisticasIMAC['percepcionCambioBienestar'],2) }}</td></tr>
                                                    <tr style=" background: #dbdbdb; font-weight: bold; "><td>Dimensión Socioecológica </td> <td style="text-align: right;"> {{ round($estadisticasIMAC['dimensionSocioecologica'],2) }}</td></tr>
                                                    <tr><td>Dependencia del uso de recursos naturales </td> <td style="text-align: right;">{{ round($estadisticasIMAC['dependenciaUsoRN'],2) }} </td></tr>
                                                    <tr><td>Habilidad para anticiparse a disturbios </td> <td style="text-align: right;"> {{ round($estadisticasIMAC['anticiparseDisturbios'],2) }}</td></tr>
                                                    <tr><td>Comprensión del entorno natural </td> <td style="text-align: right;"> {{ round($estadisticasIMAC['comprensionEntornoNatural'],2) }} </td></tr>
                                                    <tr><td>Comprensión del recurso objeto del AC </td> <td> Por Calcular</td></tr>
                                                    <tr><td>Cambios en la percepción de conservar </td> <td style="text-align: right;"> {{ round($estadisticasIMAC['cambioPercepcionConservar'],2) }}</td></tr>
                                                    <tr style=" background: #dbdbdb; font-weight: bold; "><td>Dimensión Institucional </td> <td style="text-align: right;"> {{ round($estadisticasIMAC['dimensionInstitucional'],2) }}</td></tr>
                                                    <tr><td>Capital social </td> <td style="text-align: right;"> {{ round($estadisticasIMAC['capitalSocial'],2) }}</td></tr>
                                                    <tr><td>Acción colectiva </td> <td style="text-align: right;">{{ round($estadisticasIMAC['accionColectiva'],2) }}</td></tr>
                                                    <tr><td>Toma de decisiones </td> <td style="text-align: right;">{{ round($estadisticasIMAC['tomaDecisiones'],2) }}</td></tr>
                                                    <tr><td>Cambios en el capital social </td> <td style="text-align: right;">{{ round($estadisticasIMAC['cambiosCapitalSocial'],2) }} </td></tr>
                                                    <tr><td>Conocimiento general del AC </td> <td style="text-align: right;">{{ round($estadisticasIMAC['conocimientoGeneralAC'],2) }} </td></tr>
                                                    <tr><td>Control social del AC </td> <td style="text-align: right;">{{ round($estadisticasIMAC['controlSocialAC'],2) }} </td></tr>
                                                    <tr><td>Percepción del desempeño de los actores del AC </td> <td style="text-align: right;">{{ round($estadisticasIMAC['percepcionDesempenoAC'],2) }}</td></tr>
                                                    <tr><td>Aceptación del AC </td> <td style="text-align: right;"> {{ round($estadisticasIMAC['aceptacionAC'],2) }}</td></tr>
                                                    <tr><td>Nivel de satisfacción del AC </td> <td style="text-align: right;">{{ round($estadisticasIMAC['nivelSatisfaccion'],2) }}</td></tr>
                                                    <tr style=" background: #dbdbdb; font-weight: bold; "><td>INDICE MONITOREO ACUERDO CONSERVACIÓN </td> <td style="text-align: right;"> {{ round($estadisticasIMAC['IMAC'],2) }}</td></tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($proyecto->formularios->find(3))
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-sm">
                                            <thead>
                                                <tr>
                                                    <th colspan="2" style="text-align:center">ENFOQUE CAMBIO CLIMÁTICO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($proyecto->respuestaProyectos->isEmpty())
                                                    <tr>
                                                        <td  style="text-align:center">{{$estadisticasCC}}</td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td>Conocimiento</td>
                                                        <td style="text-align: right;">{{ round($estadisticasCC["conocimientoCC"],2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Preparación comunitaria</td>
                                                        <td style="text-align: right;">{{ round($estadisticasCC["preparacionComunitariaCC"],2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Confianza institucional</td>
                                                        <td style="text-align: right;">{{ round($estadisticasCC["confianzaInstitiucional"],2) }}</td>
                                                    </tr>
                                                    <tr style=" background: #dbdbdb; font-weight: bold; ">
                                                        <td>Percepción</td>
                                                        <td style="text-align: right;">{{ round($estadisticasCC["percepcionCC"],2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Conocimiento sistema alerta temprana</td>
                                                        <td style="text-align: right;">{{ round($estadisticasCC["conocimientoAlertaTemprana"],2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Conocimiento planes, programas, atención desastres</td>
                                                        <td style="text-align: right;">{{ round($estadisticasCC["conocimientoPPAD"],2) }}</td>
                                                    </tr>
                                                    <tr style=" background: #dbdbdb; font-weight: bold; ">
                                                        <td>Institucionalidad Cambio Climático</td>
                                                        <td style="text-align: right;">{{ round($estadisticasCC["institucionalidadCC"],2) }}</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($proyecto->formularios->find(4))
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-sm">
                                            <thead>
                                                <tr>
                                                    <th colspan="4" style="text-align:center;">VALORACIÓN CONTINGENTE<br></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($proyecto->respuestaProyectos->isEmpty())
                                                    <tr>
                                                        <td  style="text-align:center">{{$estadisticasVC}}</td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td rowspan="6">En su concepto, ¿Cuál es el recurso natural con mayor degradación en su territorio?<br></td>
                                                        <td>Pesca</td>
                                                        <td colspan="2" style="text-align: right;">{{round($estadisticasVC["degradacionPesca"],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Agua</td>
                                                        <td style="text-align: right;"  colspan="2">{{round($estadisticasVC["degradacionAgua"],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Suelo</td>
                                                        <td style="text-align: right;"  colspan="2">{{round($estadisticasVC["degradacionSuelo"],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aire</td>
                                                        <td style="text-align: right;"  colspan="2">{{round($estadisticasVC["degradacionAire"],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bosque</td>
                                                        <td style="text-align: right;"  colspan="2">{{round($estadisticasVC["degradacionBosque"],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Fauna y flora</td>
                                                        <td style="text-align: right;"  colspan="2">{{round($estadisticasVC["degradacionFaunaYFlora"],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="12">En un caso hipotético ¿Estaría dispuesto a realizar un aporte en dinero para la conservación de alguno de los siguientes recursos naturales?</td>
                                                        <td rowspan="2">Pesca</td>
                                                        <td>Sí</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["aportePesca"],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>No</td>
                                                        <td style="text-align: right;" >{{100 - round($estadisticasVC["aportePesca"],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2">Agua</td>
                                                        <td>Sí</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["aporteAgua"],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>No</td>
                                                        <td style="text-align: right;" >{{100 - round($estadisticasVC["aporteAgua"],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2">Suelo</td>
                                                        <td>Sí</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["aporteSuelo"],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>No</td>
                                                        <td style="text-align: right;" >{{100 - round($estadisticasVC["aporteSuelo"],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2">Aire</td>
                                                        <td>Sí</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["aporteAire"],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>No</td>
                                                        <td style="text-align: right;" >{{100 - round($estadisticasVC["aporteAire"],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2">Bosque</td>
                                                        <td>Sí</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["aporteBosque"],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>No</td>
                                                        <td style="text-align: right;" >{{100 - round($estadisticasVC["aporteBosque"],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2">Fauna y flora</td>
                                                        <td>Sí</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["aporteFaunaYFlora"],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>No</td>
                                                        <td style="text-align: right;" >{{100 - round($estadisticasVC["aporteFaunaYFlora"],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="30">En caso afirmativo, ¿Con cuánto dinero estaría dispuesto a apoyar mensualmente?  (COP)<br></td>
                                                        <td rowspan="5">Pesca</td>
                                                        <td>$2250 a $6750</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoPesca"][1],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$6751 a $15000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoPesca"][2],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$15001 a $25000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoPesca"][3],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$25001 a $35000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoPesca"][4],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$35000 a $50000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoPesca"][5],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="5">Agua</td>
                                                        <td>$2250 a $6750</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoAgua"][1],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$6751 a $15000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoAgua"][2],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$15001 a $25000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoAgua"][3],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$25001 a $35000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoAgua"][4],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$35000 a $50000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoAgua"][5],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="5">Suelo</td>
                                                        <td>$2250 a $6750</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoSuelo"][1],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$6751 a $15000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoSuelo"][2],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$15001 a $25000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoSuelo"][3],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$25001 a $35000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoSuelo"][4],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$35000 a $50000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoSuelo"][5],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="5">Aire</td>
                                                        <td>$2250 a $6750</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoAire"][1],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$6751 a $15000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoAire"][2],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$15001 a $25000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoAire"][3],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$25001 a $35000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoAire"][4],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$35000 a $50000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoAire"][5],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="5">Bosque</td>
                                                        <td>$2250 a $6750</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoBosque"][1],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$6751 a $15000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoBosque"][2],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$15001 a $25000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoBosque"][3],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$25001 a $35000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoBosque"][4],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$35000 a $50000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoBosque"][5],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="5">Flora y Fauna</td>
                                                        <td>$2250 a $6750</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoFloraYFauna"][1],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$6751 a $15000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoFloraYFauna"][2],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$15001 a $25000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoFloraYFauna"][3],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$25001 a $35000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoFloraYFauna"][4],2)}}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>$35000 a $50000</td>
                                                        <td style="text-align: right;" >{{round($estadisticasVC["apoyoFloraYFauna"][5],2)}}%</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <h4 class="kt-portlet__head-title" style=" padding-left: 20px; ">
                        Encuestas realizadas
                    </h4>

                    <!--begin: Datatable -->
                    <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">
                        <table class="kt-datatable__table" style="display: block;">
                            <thead class="kt-datatable__head">
                                <tr class="kt-datatable__row" style="left: 0px;">
                                    <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 117px;">Identificación</span>
                                    </th>
                                    <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 117px;">Nombre</span>
                                    </th>
                                    @foreach ($proyecto->formularios as $formulario)
                                        <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 110px;">{{ $formulario->nombre }}</span>
                                        </th>
                                    @endforeach
                                    <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 110px;">Acciones</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="kt-datatable__body" style="">
                                @foreach ($proyecto->respuestaProyectos as $rp)
                                    <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                        <td data-field="OrderID" class="kt-datatable__cell">
                                            <span style="width: 117px;">{{ $rp->encuestado->identificacion }}</span>
                                        </td>
                                        <td data-field="OrderID" class="kt-datatable__cell">
                                            <span style="width: 117px;">{{ $rp->encuestado->nombre }} {{ $rp->respuestas->count()}}</span>
                                        </td>
                                        @foreach ($proyecto->formularios as $formulario)
                                            @php
                                            $valor = DB::table('respuesta_proyectos')
                                            ->join('respuestas', 'respuesta_proyectos.id', '=', 'respuestas.respuesta_proyecto_id')
                                            ->join('preguntas', 'respuestas.pregunta_id', '=', 'preguntas.id')
                                            ->where('respuesta_proyectos.id', $rp->id)
                                            ->where('preguntas.formulario_id', $formulario->id)
                                            ->select('respuestas.*')
                                            ->groupBy('respuestas.pregunta_id')
                                            ->get()->count();
                                            @endphp
                                            <td data-field="OrderID" class="kt-datatable__cell" style="text-align:center;">
                                                <span style="width: 117px;">{{ $valor }} / {{ $formulario->preguntas->count()}}</span>
                                                {{-- <span style="width: 117px;">{!! $proyecto->formularios->contains($formulario->id) ? '<span style="font-size: 30px;color:#89b94eff"><i class="fas fa-check"></i><span>' : ''!!}</span> --}}
                                            </td>
                                        @endforeach
                                        <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="overflow: visible; position: relative; width: 110px;">
                                                <div class="btn-group btn-group" role="group" aria-label="...">
                                                    <a href="{{ route('proyectos.encuesta.show', [$proyecto->id,$rp->id])}}" class="btn btn-sm btn-label-brand btn-bold">Más info</a>
                                                    <a href="{{ route('proyectos.encuesta.edit', [$proyecto->id,$rp->id])}}" class="btn btn-sm btn-warning btn-bold">Editar</a>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $proyectos->links() }} --}}
                    </div>
                    <!--end: Datatable -->
                </div>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
    </div>
    <div class="modal fade" id="kt_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Consentimiento informado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    {!!$proyecto->consentimiento_informado!!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js" integrity="sha512-0qNBDZgOKlY8fVi38IMT+vFkFbRdh4jJehDR31fn3a61Vp8DoC1XSERCIW/AgVs+0xjRIuarbBBmt78v1btb3A==" crossorigin="anonymous"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.0-alpha/Chart.min.js" integrity="sha512-sySOoQplygWETKm3HoW/V2tMWbW+5YN72uVutG7os+o3dAxJcJZZWb6S4doE6BTi/SOPkTlo/Y630jp58lNRsA==" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/0.5.7/chartjs-plugin-annotation.js"></script>
    <script src="https://cdn.rawgit.com/chartjs/Chart.js/master/samples/utils.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.0-beta.9/chart.min.js" integrity="sha512-5p2cEHOedK0LHRHWnhJeMNFTSvDkLPbjQ5Jnzrs1qwSgBojyRDG+W9UWjQLjDq4MCfXiZXGfGqmg1Xn+Z0y6eg==" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script> --}}
    <script>
    var myRadarChart = new Chart(document.getElementById('radar-chart'), {
        type: 'radar',
        data: {
            labels: ['Dimensión Socioeconómica ', 'Pobreza', 'Percepción bienestar', 'Infraestructura comunitaria', 'Diversidad ocupacional', 'Movilidad ocupacional', 'Cambios económicos', 'Percepción de cambio en el bienestar', 'Dimensión Socioecológica ', 'Dependencia del uso de recursos naturales  ', 'Habilidad para anticiparse a disturbios ', 'Comprensión del entorno natural', 'Comprensión del recurso objeto del AC', 'Cambios en la percepción de conservar', 'Dimensión Institucional ', 'Capital social', 'Acción colectiva ', 'Toma de decisiones', 'Cambios en el capital social', 'Conocimiento general del AC', 'Control social del AC', 'Percepción del desempeño de los actores del AC', 'Aceptación del AC', 'Nivel de satisfacción del AC'],
            datasets: [{
                label: ['IMAC'],
                data: [{{ number_format($estadisticasIMAC['dimensionSocioeconomica'] ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['pobreza']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['percepcionBienestar']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['infraestructuraComunitaria']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['diversidadOcupacional']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['movilidadOcupacional']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['cambiosEconomicos']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['percepcionCambioBienestar']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['dimensionSocioecologica']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['dependenciaUsoRN']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['anticiparseDisturbios']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['comprensionEntornoNatural']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['comprensionEntornoNatural']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['cambioPercepcionConservar']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['dimensionInstitucional']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['capitalSocial']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['accionColectiva']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['tomaDecisiones']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['cambiosCapitalSocial']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['conocimientoGeneralAC']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['controlSocialAC']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['percepcionDesempenoAC']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['aceptacionAC']  ?? 0,2,'.','').",".
                    number_format($estadisticasIMAC['nivelSatisfaccion']  ?? 0,2,'.','')
                }}],
                backgroundColor:"#bee0e1cc",
                borderColor:"#1d9798cc"
            }]
        }
    });
    var scatterChart = new Chart(document.getElementById('scatter-chart'), {
        type: 'bar',
        data: {
            datasets: [{
                type: "bubble",
                label: 'Pobreza',
                fill: false,
                backgroundColor:"#bee0e1",
                borderColor:"#1d9798",
                data: [{{ implode(',', $scatterPobreza) }}]
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    type: 'linear',
                    position: 'bottom'
                }]
            },
            annotation: {
                annotations: [
                    {
                        drawTime: "afterDatasetsDraw",
                        id: "hline",
                        type: "line",
                        mode: "horizontal",
                        scaleID: "y-axis-0",
                        value: {{ $configuraciones->find(1)->valor}},
                        borderColor: "black",
                        borderWidth: 2,
                        label: {
                            backgroundColor: "red",
                            content: "{{ $configuraciones->find(1)->nombre." - $".$configuraciones->find(1)->valor}}",
                            enabled: true
                        }
                    },
                    {
                        drawTime: "afterDatasetsDraw",
                        id: "hline2",
                        type: "line",
                        mode: "horizontal",
                        scaleID: "y-axis-0",
                        value: {{ $configuraciones->find(2)->valor}},
                        borderColor: "black",
                        borderWidth: 2,
                        label: {
                            backgroundColor: "red",
                            content: "{{ $configuraciones->find(2)->nombre." - $".$configuraciones->find(2)->valor}}",
                            enabled: true
                        }
                    }
                ]
            }
        }
    });
    Morris.Donut({
        element: 'kt_morris_1',
        data: {!!$generos!!},
        colors: ['#bee0e1', '#1d9798']
    });
    Morris.Donut({
        element: 'kt_morris_2',
        data: {!!$considera!!},
        colors: ['#bee0e1', '#1d9798']
    });
    Morris.Donut({
        element: 'kt_morris_3',
        data: {!!$medioVida!!},
        colors: ['#bee0e1', '#1d9798']
    });
    Morris.Donut({
        element: 'kt_morris_4',
        data: {!!$anoresidencia!!},
        colors: ['#bee0e1', '#1d9798']
    });

    var chartData = {
  labels: ["January", "February", "March", "April", "May", "June", "July"],
  datasets: [
    {
      type: "scatter",
      label: "Dataset 1",
      borderColor: window.chartColors.blue,
      borderWidth: 2,
      fill: false,
      data: [
        randomScalingFactor(),
        randomScalingFactor(),
        randomScalingFactor(),
        randomScalingFactor(),
        randomScalingFactor(),
        randomScalingFactor(),
        randomScalingFactor()
      ]
    }
  ]
};
window.onload = function() {
  var ctx = document.getElementById("canvas").getContext("2d");
  window.myMixedChart = new Chart(ctx, {
    type: "bar",
    data: chartData,
    options: {
      responsive: true,
      title: {
        display: true,
        text: "Chart.js Combo Bar Line Chart"
      },
      tooltips: {
        mode: "index",
        intersect: true
      },
      annotation: {
        events: ["click"],
        annotations: [
          {
            drawTime: "afterDatasetsDraw",
            // id: "hline",
            type: "line",
            mode: "horizontal",
            scaleID: "y-axis-0",
            value: 0,
            borderColor: "black",
            borderWidth: 5,
            label: {
              backgroundColor: "red",
              content: "Test Label",
              enabled: true
            },
            onClick: function(e) {
              // The annotation is is bound to the `this` variable
              console.log("Annotation", e.type, this);
            }
          },
          {
            drawTime: "beforeDatasetsDraw",
            type: "box",
            xScaleID: "x-axis-0",
            yScaleID: "y-axis-0",
            xMin: "March",
            xMax: "April",
            yMin: 0,
            yMax: 20,
            backgroundColor: "rgba(101, 33, 171, 0.5)",
            borderColor: "rgb(101, 33, 171)",
            borderWidth: 1,
            onClick: function(e) {
              console.log("Box", e.type, this);
            }
          }
        ]
      }
    }
  });
};
</script>
@endsection
