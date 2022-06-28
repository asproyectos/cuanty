@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <style media="screen">
    .select2.select2-container.select2-container--default{
        width:230px !important;
    }
    #select2-select-especie-container,#select2-select-comunidad-container {
        height:35px;
    }
    </style>
@endsection

@section('content')
    <h3>Encuesta</h3>
    <div class="row">
        <div class="col-xl-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Encuesta del el Proyecto {{ $proyecto->nombre}}
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
                    <div class="col-md-3">
                        <div class="form-group ">
                            <label>Fecha</label>
                            <p>{{$proyecto->fecha}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <label>Hora de inicio</label>
                            <p>{{$proyecto->fecha_inicio_encuesta}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <label>Hora Final</label>
                            <p>{{$proyecto->fecha_fin_encuesta}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
    <form id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('proyectos.encuesta.store', ['proyecto' => $proyecto->id]) }}" role="form">
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Características sociodemográficas
                            </h3>
                        </div>
                    </div>
                        <div class="kt-portlet__body" style="flex-direction: initial;">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label>nombre</label>
                                    <p>{{ $respuestaProyecto->encuestado->nombre }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label>Nacionalidad</label>
                                    <p>{{ $respuestaProyecto->encuestado->nacionalidad->nombre }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label>Lugar de nacimiento</label>
                                    <p>{{ $respuestaProyecto->encuestado->lugar_nacimiento }}</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label>Sexo</label>
                                    <p>{{ $respuestaProyecto->encuestado->sexo->nombre }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body" style="flex-direction: initial;">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label>¿Cómo se considera?</label>
                                    <p>{{ $respuestaProyecto->considera->nombre }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label>Principal medio de vida</label>
                                    <p>{{ $respuestaProyecto->medioVida->nombre }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label>Parentesco con el jefe del hogar</label>
                                    <p>{{ $respuestaProyecto->parentesco->nombre }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label>Rango de edad</label>
                                    <p>{{ $respuestaProyecto->rangoEdad->nombre }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body" style="flex-direction: initial;">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label>Años de residencia en la región</label>
                                    <p>{{ $respuestaProyecto->medioVida->nombre }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label>Estado civil</label>
                                    <p>{{ $respuestaProyecto->estadoCivil->nombre }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label>Sabe leer y escribir</label>
                                    <p>{{ $respuestaProyecto->leer_escribir ? 'Sí' : 'No' }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label>Régimen de salud</label>
                                    <p>{{ $respuestaProyecto->regimenSalud->nombre }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body" style="flex-direction: initial;">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label>¿Es usted jefe de hogar?</label>
                                    <p>{{ $respuestaProyecto->jefe_hogar ? 'Sí' : 'No' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body" style="flex-direction: initial;">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <button type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#kt_modal_2"> Ver Consentimiento informado</button>
                                </div>
                            </div>
                        </div>
                </div>
                <!--end::Portlet-->
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="accordion accordion-solid accordion-panel accordion-toggle-svg" id="accordionExample8">
                    @foreach ($proyecto->formularios as $formulario)
                        <div class="card">
                            <div class="card-header" id="heading{{ $formulario->id }}8">
                                <div class="card-title" data-toggle="collapse" data-target="#collapse{{ $formulario->id }}8" aria-expanded="true" aria-controls="collapse{{ $formulario->id }}8">
                                    {{ $formulario->nombre }} <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <div id="collapse{{ $formulario->id }}8" class="collapse" aria-labelledby="heading{{ $formulario->id}}8" data-parent="#accordionExample8">
                                <div class="card-body">
                                    {{-- {{$formulario->preguntas}} --}}
                                    <div class="form-group row">
                                        @php
                                        $preg = $formulario->preguntas->first()['grupo_pregunta_id'];
                                        $grupo = \App\GrupoPregunta::find($preg)['nombre'];
                                        @endphp
                                        <h5 style=" padding-top: 15px; " class="col-12">{{ $grupo }}</h5>
                                        @foreach ($formulario->preguntas as $pregunta)
                                            @php
                                            if ($grupo != $pregunta->grupoPregunta->nombre) {
                                                echo '<h5 style=" padding-top: 15px; " class="col-12">'.$pregunta->grupoPregunta->nombre.'</h5>';
                                                $grupo = $pregunta->grupoPregunta->nombre;
                                            }
                                            @endphp
                                            <label for="{{ $pregunta->grupoPregunta->nombre}}" class="col-3 col-form-label">{{ $pregunta->descripcion }}</label>
                                            <div class="col-3">
                                                @if ($pregunta->tipo_pregunta == 1)
                                                    @if ($respuestaProyecto->respuestas->where('pregunta_id',$pregunta->id)->first() != null)
                                                        <p>{{ $respuestaProyecto->respuestas->where('pregunta_id',$pregunta->id)->first()->opcion->nombre }}</p>
                                                    @endif
                                                @elseif ($pregunta->tipo_pregunta == 2)
                                                    @if ($respuestaProyecto->respuestas->where('pregunta_id',$pregunta->id)->first() != null)
                                                        @foreach ($respuestaProyecto->respuestas->where('pregunta_id',$pregunta->id) as $resp)
                                                            {{ $resp->opcion->nombre }}
                                                        @endforeach
                                                    @endif
                                                @elseif ($pregunta->tipo_pregunta == 3)
                                                    @if ($respuestaProyecto->respuestas->where('pregunta_id',$pregunta->id)->first() != null)
                                                        <p>{{ $respuestaProyecto->respuestas->where('pregunta_id',$pregunta->id)->first()->extra }}</p>
                                                    @endif
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script>
@endsection
