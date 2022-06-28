@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection

@section('content')
    <h3>Planta</h3>
    <div class="row">
        <div class="col-xl-12">

            <!--begin::Portlet-->
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
                    <div class="col-md-5">
                        <div class="form-group ">
                            <h5>Código</h5>
                            <p>{{$grupoPregunta->codigo}}</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group ">
                            <h5>Nombre</h5>
                            <p>{{$grupoPregunta->nombre}}</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group ">
                            <h5>Activa</h5>
                            <p>{{ $grupoPregunta->activa ? 'Sí' : 'No'}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Equipos
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            @foreach ($grupoPregunta->preguntas->sortBy('orden')->chunk(5) as $chunk)
                                <tr>
                                    @foreach ($chunk as $product)
                                        <td><span style="font-weight:bold">{{ $product->orden }}</span> - {{ $product->descripcion }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
