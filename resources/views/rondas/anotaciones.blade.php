@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection

@section('content')
    <h3>Anotaciones</h3>
    <div class="row">
        <div class="col-lg-6">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Comentarios
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-notes">
                        <div class="kt-notes__items">
                            @foreach ($rondas as $ronda)
                                <div class="kt-notes__item">
                                    <div class="kt-notes__media">
                                        <img class="kt-hidden-" src="{{ asset('imagenes_usuarios/'.$ronda->user->imagen) }}" alt="image">
                                    </div>
                                    <div class="kt-notes__content">
                                        <div class="kt-notes__section">
                                            <div class="kt-notes__info">
                                                <a href="{{ route('usuarios.show', $ronda->user->id)}}" class="kt-notes__title">
                                                    {{$ronda->user->name}}
                                                </a>
                                                <span class="kt-notes__desc">
                                                    <a style="color:#ef9f0b; font-weight:500" href="{{ route('rondas.show', $ronda->id)}}">
                                                        {{$ronda->reporte->fecha}} - {{$ronda->numeroRonda->nombre}}
                                                    </a>
                                                </span>
                                                <span class="kt-badge as-comentario-{{$ronda->tipo_comentario_id}} kt-badge--inline">{{$ronda->tipoComentario->nombre}}</span>
                                            </div>
                                        </div>
                                        <span class="kt-notes__body">
                                            {{$ronda->comentario}}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $rondas->appends(Request::except('comentarios'))->links() }}
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Alertas
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-notes">
                        <div class="kt-notes__items">
                            @foreach ($respuestas as $respuesta)
                                <div class="kt-notes__item">
                                    <div class="kt-notes__media">
                                        <img class="kt-hidden-" src="{{ asset('imagenes_usuarios/'.$respuesta->ronda->user->imagen) }}" alt="image">
                                    </div>
                                    <div class="kt-notes__content">
                                        <div class="kt-notes__section">
                                            <div class="kt-notes__info">
                                                <a href="{{ route('usuarios.show', $respuesta->ronda->user->id)}}" class="kt-notes__title">
                                                    {{$respuesta->ronda->user->name}}
                                                </a>
                                                <span class="kt-notes__desc">
                                                    <a style="color:#ef9f0b; font-weight:500" href="{{ route('rondas.show', $respuesta->ronda->id)}}">
                                                        {{$respuesta->ronda->reporte->fecha}} - {{$respuesta->ronda->numeroRonda->nombre}}
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="kt-notes__body">
                                            <strong>{{$respuesta->pregunta->descripcion}}: </strong>
                                            @if ($respuesta->pregunta->tipoPregunta->id == 1)
                                                <span class="as-alarma">{{$respuesta->opcion->nombre}}</span>
                                            @elseif ($respuesta->pregunta->tipoPregunta->id == 3)
                                                <span class="as-alarma">{{$respuesta->extra}}</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $respuestas->appends(Request::except('alarmas'))->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
