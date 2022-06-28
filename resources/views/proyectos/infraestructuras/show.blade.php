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
    <h3>Infraestructura Comunitaria</h3>
    <form id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('proyectos.infraestructuras.store', ['proyecto' => $proyecto->id]) }}" role="form">
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Del Proyecto {{ $proyecto->nombre}}
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
                                <label></label>
                                <h5 style="text-align:end;margin-top: 6px;">Puesto de Salud</h5>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <p>{{ $proyecto->infraestructuraComunitaria->puesto_de_salud_presencia ? 'Sí' : 'No'}}</p>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <p>{{ App\InfraestructuraComunitaria::$funcionamientos[$proyecto->infraestructuraComunitaria->puesto_de_salud_funcionamiento] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 6px;">Escuela comunitaria primaria</h5>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <p>{{ $proyecto->infraestructuraComunitaria->escuela_comunitaria_primaria_presencia ? 'Sí' : 'No'}}</p>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <p>{{ App\InfraestructuraComunitaria::$funcionamientos[$proyecto->infraestructuraComunitaria->escuela_comunitaria_primaria_funcionamiento] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 6px;">Escuela comunitaria secundaria</h5>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <p>{{ $proyecto->infraestructuraComunitaria->escuela_comunitaria_secundaria_presencia ? 'Sí' : 'No'}}</p>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <p>{{ App\InfraestructuraComunitaria::$funcionamientos[$proyecto->infraestructuraComunitaria->escuela_comunitaria_secundaria_funcionamiento] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 6px;">Sede comunitaria</h5>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <p>{{ $proyecto->infraestructuraComunitaria->sede_comunitaria_presencia ? 'Sí' : 'No'}}</p>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <p>{{ App\InfraestructuraComunitaria::$funcionamientos[$proyecto->infraestructuraComunitaria->sede_comunitaria_funcionamiento] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 6px;">Espacios recreativos</h5>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <p>{{ $proyecto->infraestructuraComunitaria->espacios_recreativos_presencia ? 'Sí' : 'No'}}</p>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <p>{{ App\InfraestructuraComunitaria::$funcionamientos[$proyecto->infraestructuraComunitaria->espacios_recreativos_funcionamiento] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 6px;">Hogar comunitario</h5>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <p>{{ $proyecto->infraestructuraComunitaria->hogar_comunitario_presencia ? 'Sí' : 'No'}}</p>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <p>{{ App\InfraestructuraComunitaria::$funcionamientos[$proyecto->infraestructuraComunitaria->hogar_comunitario_funcionamiento] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 6px;">Muelles</h5>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <p>{{ $proyecto->infraestructuraComunitaria->muelles_presencia ? 'Sí' : 'No'}}</p>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <p>{{ App\InfraestructuraComunitaria::$funcionamientos[$proyecto->infraestructuraComunitaria->muelles_funcionamiento] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 6px;">Cobertura eléctrica</h5>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <p>{{ $proyecto->infraestructuraComunitaria->cobertura_electrica_presencia ? 'Sí' : 'No'}}</p>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <p>{{ App\InfraestructuraComunitaria::$funcionamientos[$proyecto->infraestructuraComunitaria->cobertura_electrica_funcionamiento] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 6px;">Agua potable</h5>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <p>{{ $proyecto->infraestructuraComunitaria->agua_potable_presencia ? 'Sí' : 'No'}}</p>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <p>{{ App\InfraestructuraComunitaria::$funcionamientos[$proyecto->infraestructuraComunitaria->agua_potable_funcionamiento] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 6px;">Alcantarillado</h5>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <p>{{ $proyecto->infraestructuraComunitaria->alcantarillado_presencia ? 'Sí' : 'No'}}</p>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <p>{{ App\InfraestructuraComunitaria::$funcionamientos[$proyecto->infraestructuraComunitaria->alcantarillado_funcionamiento] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 6px;">Pozos sépticos</h5>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <p>{{ $proyecto->infraestructuraComunitaria->pozos_septicos_presencia ? 'Sí' : 'No'}}</p>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <p>{{ App\InfraestructuraComunitaria::$funcionamientos[$proyecto->infraestructuraComunitaria->pozos_septicos_funcionamiento] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 6px;">Señal de celular</h5>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <p>{{ $proyecto->infraestructuraComunitaria->senal_de_celular_presencia ? 'Sí' : 'No'}}</p>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <p>{{ App\InfraestructuraComunitaria::$funcionamientos[$proyecto->infraestructuraComunitaria->senal_de_celular_funcionamiento] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 6px;">Señal de televisión</h5>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <p>{{ $proyecto->infraestructuraComunitaria->senal_de_television_presencia ? 'Sí' : 'No'}}</p>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <p>{{ App\InfraestructuraComunitaria::$funcionamientos[$proyecto->infraestructuraComunitaria->senal_de_television_funcionamiento] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Portlet-->
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
@endsection
