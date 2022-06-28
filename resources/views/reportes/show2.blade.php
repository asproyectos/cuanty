@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection

@section('content')
    <h3>Reporte</h3>
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Datos de la fecha {{$reporte->fecha}}
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <a href="{{ route('reportes.exportar',$reporte->id)}}" type="button" class="btn btn-success">
                                <i class="fa fa-file-excel">
                                </i>
                                Exportar
                            </a>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-hover-brand">
                                <i class="la la-arrow-left">
                                </i>
                                Atrás
                            </a>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        @foreach ($numeroRondas as $numeroRonda)
                                            <th>{{ $numeroRonda->nombre }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">operador de campo</th>
                                        @foreach ($numeroRondas as $numeroRonda)
                                            @if ($reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first())
                                                <td>{{ $reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->user->name }}</td>
                                            @else
                                                <td>Sin registro</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <th scope="row">Comentario del Operador de Campo</th>
                                        @foreach ($numeroRondas as $numeroRonda)
                                            @if ($reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first())
                                                <td>
                                                    <span style="font-size: 20px;"><i class="fas fa-sticky-note as-sticker-{{$reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->tipo_comentario_id}}"></i></span>
                                                    {{ $reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->comentario ?: 'Sin comentario'  }}
                                                </td>
                                            @else
                                                <td>Sin registro</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                    <tr style="background-color:#cfcfcf;">
                                        <th scope="row">operador de sala de control</th>
                                        @foreach ($numeroRondas as $numeroRonda)
                                            @if ($reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first() && isset($reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->verificada))
                                                <td>{{ $reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->verificadaPor->name }}</td>
                                            @else
                                                <td>Sin verificar</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                    <tr style="background-color:#cfcfcf;">
                                        <th scope="row">Comentario del Operador de sala de control</th>
                                        @foreach ($numeroRondas as $numeroRonda)
                                            @if ($reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first() && isset($reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->verificada))
                                                <td>{{ $reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->comentario_verificacion ?: 'Sin comentario' }}</td>
                                            @else
                                                <td>Sin verificar</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="accordion accordion-solid accordion-panel accordion-toggle-svg" id="accordionExample8">
                @foreach ($formulario->grupoPreguntas as $grupoPregunta)
                    <div class="card">
                        <div class="card-header" id="heading{{ $grupoPregunta->id }}8">
                            <div class="card-title" data-toggle="collapse" data-target="#collapse{{ $grupoPregunta->id }}8" aria-expanded="true" aria-controls="collapse{{ $grupoPregunta->id }}8">
                                {{ $grupoPregunta->nombre }} <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                                        <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div id="collapse{{ $grupoPregunta->id }}8" class="collapse" aria-labelledby="heading{{ $grupoPregunta->id}}8" data-parent="#accordionExample8">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Equipo</th>
                                                    <th>Dispositivo</th>
                                                    <th>Unidades</th>
                                                    <th>Normal</th>
                                                    @foreach ($numeroRondas as $numeroRonda)
                                                        <th>{{ $numeroRonda->nombre }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($grupoPregunta->preguntas->where('activa','1') as $pregunta)
                                                    <tr>
                                                        <th scope="row">{{ $pregunta->id }} - {{ $pregunta->descripcion }}</th>
                                                        <th scope="row">{{ $pregunta->dispositivo }}</th>
                                                        <th scope="row">{{ $pregunta->unidad }}</th>
                                                        <th scope="row">{{ $pregunta->normal }}</th>
                                                        @foreach ($numeroRondas as $numeroRonda)
                                                            @if ($reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first())
                                                                @if ($reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->respuestas->where('pregunta_id',$pregunta->id)->first() != null)
                                                                    @if ($reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->respuestas->where('pregunta_id',$pregunta->id)->first()->no_aplica)
                                                                        <td>No aplica</td>
                                                                    @else
                                                                        @if ($pregunta->tipoPregunta->id == 1)
                                                                            <td class="{{$reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->respuestas->where('pregunta_id',$pregunta->id)->first()->alarma ? 'as-alarma-bg' : ''}}" >
                                                                                {{ $reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->respuestas->where('pregunta_id',$pregunta->id)->first()->opcion->nombre ?? 'sin dato' }}
                                                                            </td>
                                                                        @elseif ($pregunta->tipoPregunta->id == 3)
                                                                            <td class="{{$reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->respuestas->where('pregunta_id',$pregunta->id)->first()->alarma ? 'as-alarma-bg' : ''}}" >
                                                                                {{ $reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->respuestas->where('pregunta_id',$pregunta->id)->first()->extra}}
                                                                            </td>
                                                                        @endif
                                                                    @endif
                                                                @else
                                                                    <td>Sin dato</td>
                                                                @endif
                                                            @else
                                                                <td>Sin registro</td>
                                                            @endif
                                                        @endforeach
                                                    </tr>
                                                    <div class="col-3">

                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @if ($reporte->verificado)
        <div class="row" style=" margin-top: 20px; ">
            @csrf
            <div class="col-xl-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Verificación
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5 for="exampleTextarea">Comentario del Jefe de Operaciones</h5>
                                <p>{{ $reporte->comentario }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
