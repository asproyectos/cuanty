@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
@endsection
@section('content')
    <h3>Rondas</h3>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Análisis de Equipos
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <form method="GET" action="{{ route('equipos.analisis') }}" role="buscar" >
                    <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                        <div class="row align-items-center">
                            {{-- {{ csrf_field() }} --}}
                            <div class="col-xl-4 order-2 order-xl-1">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-1 col-sm-12">Equipos</label>
                                    <div class="col-lg-11 col-md-9 col-sm-12">
                                        <select name="equipos[]" class="form-control kt-select2" id="kt_select2_3" multiple="multiple" required>
                                            @foreach ($grupoPreguntas as $gp)
                                                <optgroup label="{{ $gp->nombre }}">
                                                    @foreach ($gp->preguntas as $p)
                                                        <option value="{{$p->id}}" {{ in_array($p->id, Request::get('equipos') ?: []) ? 'selected' : '' }}>{{$p->descripcion}}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 order-2 order-xl-1">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">Fecha inicial</label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <input value="{{Request::get('fecha_inicial')}}" id="fecha_inicial" name="fecha_inicial" type="text" class="form-control fechas-plugin" readonly="" placeholder="Fecha inicial">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 order-2 order-xl-1">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">Fecha final</label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <input value="{{Request::get('fecha_final')}}" id="fecha_final" name="fecha_final" type="text" class="form-control fechas-plugin" readonly="" placeholder="Fecha final">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1 order-2 order-xl-1">
                                <div class="form-group row">
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <button style="background-color: #ef9f0c; border-color: #ef9f0c;" type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1 order-2 order-xl-1">
                                <div class="form-group row">
                                        <a
                                        id="exportar-boton"
                                        href="{{ route('equipos.show',1)}}"
                                        onclick="event.preventDefault(); document.getElementById('export-form').submit();"
                                        type="button"
                                        class="btn btn-success {{empty(Request::all()) ? 'disabled' : '' }}">
                                            <i class="fa fa-file-excel">
                                            </i>
                                            Exportar
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form id="export-form" class="" action="{{ route('equipos.exportar') }}" method="get">
                    <input type="hidden" id="equipos_export" name="equipos[]" value="{{ implode(',', Request::get('equipos') ?: [] ) }}">
                    <input type="hidden" id="fecha_inicial_export" name="fecha_inicial" value="{{Request::get('fecha_inicial')}}">
                    <input type="hidden" id="fecha_final_export" name="fecha_final" value="{{Request::get('fecha_final')}}">
                </form>
            </div>
            @isset($equipos)
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-12">
                        <canvas id="line-chart" width="400" height="100"></canvas>
                    </div>
                </div>
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="min-width: 150px;">Ronda</th>
                                    @foreach ($equipos as $equipo)
                                        <th>{{$equipo->descripcion}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rondas as $ronda)
                                    @php
                                    $ron = \App\Ronda::find($ronda->id);
                                    @endphp
                                    <tr>
                                        <th style="min-width: 150px;"scope="row">{{ $ron->reporte->fecha }} - {{ $ron->numeroRonda->nombre}}</th>
                                        @foreach ($equipos as $equipo)
                                            @if ($ron->respuestas->where('pregunta_id',$equipo->id)->first() != null)
                                                @if ($equipo->tipoPregunta->id == 1)
                                                    <td class="{{$ron->respuestas->where('pregunta_id',$equipo->id)->first()->alarma ? 'as-alarma-bg' : ''}}">
                                                        {{ $ron->respuestas->where('pregunta_id',$equipo->id)->first()->opcion->nombre ?? 'Sin dato' }}
                                                    </td>
                                                @elseif ($equipo->tipoPregunta->id == 3)
                                                    <td class="{{$ron->respuestas->where('pregunta_id',$equipo->id)->first()->alarma ? 'as-alarma-bg' : ''}}">
                                                        {{ $ron->respuestas->where('pregunta_id',$equipo->id)->first()->extra}}
                                                    </td>
                                                @endif
                                            @else
                                                <td>Sin Registro</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endisset

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script>
    <script src="{{asset('/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js" integrity="sha512-0qNBDZgOKlY8fVi38IMT+vFkFbRdh4jJehDR31fn3a61Vp8DoC1XSERCIW/AgVs+0xjRIuarbBBmt78v1btb3A==" crossorigin="anonymous"></script>

    <script src="{{asset('js/pages/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
    $('.fechas-plugin').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        language: 'es'
    });
    </script>

    <script>
    new Chart(document.getElementById("line-chart"),{
        "type":"line",
        "data":{
            "labels":[{!!$lineChart['labels']!!}],
            "datasets":[{!!$lineChart['datasets']!!}],
        }
        ,"options":{}
    });

    $('#kt_select2_3').change(function() {
        $('#equipos_export').val($('#kt_select2_3').val());
        $( "#exportar-boton" ).addClass( "disabled" );
    });

    $('#fecha_inicial').change(function() {
        $('#fecha_inicial_export').val($('#fecha_inicial').val());
        $( "#exportar-boton" ).addClass( "disabled" );
    });
    $('#fecha_final').change(function() {
        $('#fecha_final_export').val($('#fecha_final').val());
        $( "#exportar-boton" ).addClass( "disabled" );
    });
    </script>
@endsection
