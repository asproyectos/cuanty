@extends('layouts.app')

@section('content')
    <h3>Planta</h3>
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Datos del Sistema
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
                            <h5>Sistema</h5>
                            <p>{{ $pregunta->grupoPregunta->nombre}}</p>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-2">
                        <div class="form-group ">
                            <h5>Nombre</h5>
                            <p>{{ $pregunta->descripcion}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h5>dispositivo</h5>
                            <p>{{ $pregunta->dispositivo}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h5>Unidad</h5>
                            <p>{{ $pregunta->unidad}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h5>Tipo de equipo</h5>
                            <p>{{$pregunta->tipoPregunta->nombre}}</p>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-6">
                        <h4>Alarmas</h4>
                        <ul>
                            @foreach ($pregunta->alarmas as $alarma)
                                <li>{{$alarma->tipoAlarma->descripcion}} {{$alarma->opcion_id ? $alarma->opcion->nombre : $alarma->valor}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @if ($pregunta->tipoPregunta->id == 1)
                        <div class="col-md-4">
                            <h4>Opciones</h4>
                            <div class="col-md-12">
                                @if ($pregunta->opciones->isEmpty())
                                    <p>Sin opciones</p>
                                @else
                                    <table class="table table-bordered">
                                        @foreach ($pregunta->opciones->where('activa',1)->sortBy('orden')->chunk(5) as $chunk)
                                            <tr>
                                                @foreach ($chunk as $product)
                                                    <td>{{ $product->nombre }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </table>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
