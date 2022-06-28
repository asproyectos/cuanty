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
                            Registro de SubRegión
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
                    <div class="col-md-6">
                        <h4>Datos de la SubRegión</h4>
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-5">
                        <div class="form-group ">
                            <label>País</label>
                            <p>{{$subregion->region->codigo}} - {{$subregion->region->nombre}}</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group ">
                            <label>Código</label>
                            <p>{{$subregion->codigo}}</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group ">
                            <label>Nombre</label>
                            <p>{{$subregion->nombre}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
@endsection
