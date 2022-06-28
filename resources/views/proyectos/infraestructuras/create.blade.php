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
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 12px;">Puesto de Salud</h5>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <select class="form-control form-control-sm" name="puesto_de_salud_presencia">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <select class="form-control form-control-sm" name="puesto_de_salud_funcionamiento">
                                    <option value="1">Alto</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Bajo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 12px;">Escuela comunitaria primaria</h5>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <select class="form-control form-control-sm" name="escuela_comunitaria_primaria_presencia">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <select class="form-control form-control-sm" name="escuela_comunitaria_primaria_funcionamiento">
                                    <option value="1">Alto</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Bajo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 12px;">Escuela comunitaria secundaria</h5>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <select class="form-control form-control-sm" name="escuela_comunitaria_secundaria_presencia">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <select class="form-control form-control-sm" name="escuela_comunitaria_secundaria_funcionamiento">
                                    <option value="1">Alto</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Bajo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 12px;">Sede comunitaria</h5>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <select class="form-control form-control-sm" name="sede_comunitaria_presencia">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <select class="form-control form-control-sm" name="sede_comunitaria_funcionamiento">
                                    <option value="1">Alto</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Bajo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 12px;">Espacios recreativos</h5>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <select class="form-control form-control-sm" name="espacios_recreativos_presencia">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <select class="form-control form-control-sm" name="espacios_recreativos_funcionamiento">
                                    <option value="1">Alto</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Bajo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 12px;">Hogar comunitario</h5>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <select class="form-control form-control-sm" name="hogar_comunitario_presencia">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <select class="form-control form-control-sm" name="hogar_comunitario_funcionamiento">
                                    <option value="1">Alto</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Bajo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 12px;">Muelles</h5>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <select class="form-control form-control-sm" name="muelles_presencia">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <select class="form-control form-control-sm" name="muelles_funcionamiento">
                                    <option value="1">Alto</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Bajo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 12px;">Cobertura eléctrica</h5>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <select class="form-control form-control-sm" name="cobertura_electrica_presencia">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <select class="form-control form-control-sm" name="cobertura_electrica_funcionamiento">
                                    <option value="1">Alto</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Bajo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 12px;">Agua potable</h5>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <select class="form-control form-control-sm" name="agua_potable_presencia">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <select class="form-control form-control-sm" name="agua_potable_funcionamiento">
                                    <option value="1">Alto</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Bajo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 12px;">Alcantarillado</h5>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <select class="form-control form-control-sm" name="alcantarillado_presencia">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <select class="form-control form-control-sm" name="alcantarillado_funcionamiento">
                                    <option value="1">Alto</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Bajo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 12px;">Pozos sépticos</h5>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <select class="form-control form-control-sm" name="pozos_septicos_presencia">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <select class="form-control form-control-sm" name="pozos_septicos_funcionamiento">
                                    <option value="1">Alto</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Bajo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 12px;">Señal de celular</h5>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <select class="form-control form-control-sm" name="senal_de_celular_presencia">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <select class="form-control form-control-sm" name="senal_de_celular_funcionamiento">
                                    <option value="1">Alto</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Bajo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: initial;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label></label>
                                <h5 style="text-align:end;margin-top: 12px;">Señal de televisión</h5>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Presencia</label>
                                <select class="form-control form-control-sm" name="senal_de_television_presencia">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Funcionamiento</label>
                                <select class="form-control form-control-sm" name="senal_de_television_funcionamiento">
                                    <option value="1">Alto</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Bajo</option>
                                </select>
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
