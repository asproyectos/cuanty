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
                            Creación de Región
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
                <form id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('regiones.store') }}" role="form" enctype='multipart/form-data'>
                    @csrf
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Datos de la Región</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-5">
                            <div class="form-group ">
                                <label>País</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <select class="form-control" name="pais_id" required>
                                        <option selected disabled value="">Escoja una opción</option>
                                        @foreach ($paises as $pais)
                                            <option value="{{ $pais->id }}">{{ $pais->codigo }} - {{ $pais->nombre }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-user"></i></span>
                                    </span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>codigo</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" name="codigo" required>
                                    {{-- <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-calendar"></i></span>
                                    </span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group ">
                                <label>nombre</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" name="nombre" required>
                                    {{-- <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-clock-o"></i></span>
                                    </span> --}}
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
