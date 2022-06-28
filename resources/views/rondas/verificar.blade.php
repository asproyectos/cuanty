@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection

@section('content')
    <h3>Ronda</h3>
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Datos de la ronda {{$ronda->reporte->fecha}} - {{ $ronda->numeroRonda->nombre }}
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
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-2">
                        <div class="form-group ">
                            <h5>Tipo de ronda</h5>
                            <p>{{ $ronda->tipoRonda->nombre }}</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group ">
                            <h5>Operador de Campo</h5>
                            <p>{{ $ronda->user->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-5 offset-md-2">
                        <div class="form-group ">
                            <h5>Comentario del Operador de Campo</h5>
                            <p>{{ $ronda->comentario ? $ronda->comentario : 'Sin comentario'  }}</p>
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
                                                    <th>{{ $ronda->numeroRonda->nombre }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($grupoPregunta->preguntas->where('activa','1') as $pregunta)
                                                    <tr>
                                                        <th scope="row">{{ $pregunta->id }} - {{ $pregunta->descripcion }}</th>
                                                        <th scope="row">{{ $pregunta->dispositivo }}</th>
                                                        <th scope="row">{{ $pregunta->unidad }}</th>
                                                        <th scope="row">{{ $pregunta->normal }}</th>
                                                        @if ($ronda->respuestas->where('pregunta_id',$pregunta->id)->first() != null)
                                                            @if ($ronda->respuestas->where('pregunta_id',$pregunta->id)->first()->no_aplica)
                                                                <td>No aplica</td>
                                                            @else
                                                                @if ($pregunta->tipoPregunta->id == 1)
                                                                    <td class="{{$ronda->respuestas->where('pregunta_id',$pregunta->id)->first()->alarma ? 'as-alarma-bg' : ''}}">
                                                                        {{ $ronda->respuestas->where('pregunta_id',$pregunta->id)->first()->opcion->nombre ?? 'Sin dato' }}
                                                                    </td>
                                                                @elseif ($pregunta->tipoPregunta->id == 3)
                                                                    <td class="{{$ronda->respuestas->where('pregunta_id',$pregunta->id)->first()->alarma ? 'as-alarma-bg' : ''}}">
                                                                        {{ $ronda->respuestas->where('pregunta_id',$pregunta->id)->first()->extra ?: 'Sin dato' }}
                                                                    </td>
                                                                @endif
                                                            @endif
                                                        @else
                                                            <td>Sin dato</td>
                                                        @endif
                                                    </tr>
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
    <form id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('rondas.verificacion', $ronda->id) }}" role="form" enctype='multipart/form-data'>
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
                                <h5 for="exampleTextarea">Comentario del Operador de Sala de Control</h5>
                                <textarea name="comentario" class="form-control" id="exampleTextarea" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
