@extends('layouts.app')

@section('content')
    <h3>Planta</h3>
    <div class="row">
        <div class="col-xl-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Edición de Sistema
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
                <form id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('sistemas.update',$grupoPregunta->id) }}" role="form" enctype='multipart/form-data'>
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Datos del sistema</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>codigo</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" name="codigo" value="{{$grupoPregunta->codigo}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>nombre</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" name="nombre"  value="{{$grupoPregunta->nombre}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Estado</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <label class="kt-checkbox kt-checkbox--success">
                                        <input name="activa" type="checkbox" {{ $grupoPregunta->activa ? 'checked' : ''}} > Activa
                                        <span></span>
                                    </label>
                                </div>
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
