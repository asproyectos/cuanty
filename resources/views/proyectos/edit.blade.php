@extends('layouts.app')

@section('styles')
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
    <h3>Lugares</h3>
    <div class="row">
        <div class="col-xl-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Edición de comunidad
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
                <form id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('comunidades.update',$comunidad->id) }}" role="form" enctype='multipart/form-data'>
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Datos de la comunidad</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-5">
                            <div class="form-group ">
                                <label>Cuenca</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <select class="form-control" name="cuenca_id" required>
                                        @foreach ($cuencas as $cuenca)
                                            <option {{$comunidad->cuenca_id == $cuenca->id ? 'selected' : ''}} value="{{ $cuenca->id }}">{{ $cuenca->codigo }} - {{ $cuenca->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>codigo</label>
                                <input type="text" class="form-control" name="codigo" value="{{$cuenca->codigo}}" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group ">
                                <label>nombre</label>
                                <input type="text" class="form-control" name="nombre" value="{{$cuenca->nombre}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
    </div>
@endsection
