@extends('layouts.app')

@section('content')
    <h3>Lugares</h3>
    <div class="row">
        <div class="col-xl-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Edición de Unidad de Gestión de Cuencas
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
                <form id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('ugcs.update', $ugc->id) }}" role="form" enctype='multipart/form-data'>
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Datos de la Unidad de Gestión de Cuencas</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>codigo</label>
                                <input type="text" class="form-control" name="codigo" required value="{{ $ugc->codigo}}">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group ">
                                <label>nombre</label>
                                <input type="text" class="form-control" name="nombre" required value="{{ $ugc->nombre}}">
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
