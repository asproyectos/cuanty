@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/pages/alto-sentido/jquery.fancybox.min.css') }}" rel="stylesheet" type="text/css" />
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
    <h3>Aves</h3>
    <div class="row">
        <div class="col-xl-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Registro monitoreo de aves
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
                <form class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Datos del registro</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Fecha de registro</label>
                                <p>{{$registro->fecha->formatLocalized('%B %d/%y')}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Hora de inicio</label>
                                <p>{{$registro->hora_inicio->format('g:i A')}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Hora final</label>
                                <p>{{$registro->hora_final->format('g:i A')}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Hora marea alta</label>
                                <p>{{$registro->hora_marea_alta->format('g:i A')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Número del sitio</label>
                                <p>{{$registro->numero_sitio}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Unidad gestión de Cuenca</label>
                                <p>
                                    <a style="color:#006518;font-weight: 500;" href="{{route('ugcs.show',$registro->comunidad->cuenca->unidadGestionCuenca->id)}}">
                                        {{$registro->comunidad->cuenca->unidadGestionCuenca->codigo}} - {{$registro->comunidad->cuenca->unidadGestionCuenca->nombre}}
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Cuenca</label>
                                <p>
                                    <a style="color:#006518;font-weight: 500;" href="{{route('cuencas.show',$registro->comunidad->cuenca->id)}}">
                                        {{$registro->comunidad->cuenca->nombre}}
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Comunidad</label>
                                <p>
                                    <a style="color:#006518;font-weight: 500;" href="{{route('comunidades.show',$registro->comunidad_id)}}">
                                        {{$registro->comunidad->nombre}}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Latitud</label>
                                <p>{{$registro->latitud}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Longitud</label>
                                <p>{{$registro->longitud}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Nombre del observador</label>
                                <p>{{$registro->user->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Datos del ave</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Código</label>
                                <p><a style="color:#006518;font-weight: 500;" href="{{route('especies.show',$registro->especie_id)}}">{{$registro->especie->codigo}}</a></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Orden</label>
                                <p>{{$registro->especie->orden->nombre}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Familia</label>
                                <p>{{$registro->especie->familia->nombre}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Especie</label>
                                <p>{{$registro->especie->nombre}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Nombre en español</label>
                                <p>{{$registro->especie->nombre_castellano}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Nombre en inglés</label>
                                <p>{{$registro->especie->nombre_ingles}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Altura mínima</label>
                                <p>{{$registro->especie->altura_minima}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Altura máxima</label>
                                <p>{{$registro->especie->altura_maxima}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Amenaza nacional(Libros rojos)</label>
                                <p>{{$registro->especie->amenazaNacional->nombre}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Amenaza global(IUCN)</label>
                                <p>{{$registro->especie->amenazaGlobal->nombre}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Cantidad cria</label>
                                <p>{{$registro->cantidad_cria}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Cantidad juvenil</label>
                                <p>{{$registro->cantidad_juvenil}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Cantidad adulto</label>
                                <p>{{$registro->cantidad_adulto}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Cantidad sin definir</label>
                                <p>{{$registro->cantidad}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Cantidad total</label>
                                <p style="color:#006518;font-weight: 500;">{{$registro->cantidad_total}}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Tipo de hábitat</label>
                                <p>{{$registro->tipoHabitat->nombre}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Comentarios</label>
                                <p>{!! nl2br($registro->comentarios) !!}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>¿Especie identificada?</label>
                                <div class="kt-widget__button">
                                    @if ($registro->especie_identificada)
                                        <span style="font-weight:600;" class="btn btn-label-success btn-sm">Sí</span>
                                    @else
                                        <span style="font-weight:600;" class="btn btn-label-danger btn-sm">No</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Registro fotográfico</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-12">
                            <div class="form-group row">
                                @forelse ($registro->imagenesRegistro as $imagenRegistro)
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <a data-fancybox="gallery" href="{{ asset('imagenes_registros/'.$imagenRegistro->nombre) }}">
                                            <img class="img-fluid" src="{{ asset('imagenes_registros/'.$imagenRegistro->nombre) }}">
                                        </a>
                                    </div>
                                @empty
                                    <div class="col-lg-12 col-md-3 col-sm-12" id="imagenes-ave-mensaje">
                                        <p style="text-align:center;">Sin imágenes</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/pages/alto-sentido/jquery.fancybox.min.js') }}" type="text/javascript"></script>
@endsection
