@extends('layouts.app')

@section('content')
    <h3>Listado de rondas</h3>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__body">
                <form method="GET" action="{{ route('rondas.index') }}" role="buscar" >
                    <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                        <div class="row align-items-center">
                            <div class="col-xl-1">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">Fecha</label>
                                    <div class="col-lg-9 col-sm-12">
                                        <input name="fecha" value="{{Request::get('fecha')}}" type="text" class="form-control fechas-plugin" readonly="" placeholder="Fecha">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 order-2 order-xl-1">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-4 col-sm-12">Hora</label>
                                    <div class="col-lg-8 col-md-9 col-sm-12">
                                        <select name="horas[]" class="form-control select2 kt-select2" multiple="multiple" >
                                            @foreach ($horas as $hora)
                                                <option value="{{$hora->id}}" {{ in_array($hora->id, Request::get('horas') ?: []) ? 'selected' : '' }}>{{$hora->nombre}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 order-2 order-xl-1">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">Operadores de campo</label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <select name="campos[]" class="form-control select2 kt-select2" multiple="multiple" >
                                            @foreach ($campos as $campo)
                                                <option value="{{$campo->id}}" {{ in_array($campo->id, Request::get('campos') ?: []) ? 'selected' : '' }}>{{$campo->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 order-2 order-xl-1">
                                <div class="form-group row">
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <button style="background-color: #ef9f0c; border-color: #ef9f0c;" type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">

                <!--begin: Datatable -->
                <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">
                    <table class="kt-datatable__table" style="display: block;">
                        <thead class="kt-datatable__head">
                            <tr class="kt-datatable__row" style="left: 0px;">
                                <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Fecha</span>
                                </th>
                                <th data-field="CompanyName" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Hora</span>
                                </th>
                                <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Tipo de Ronda</span>
                                </th>
                                <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Operador de Campo</span>
                                </th>
                                <th data-field="CompanyName2" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Alarmas generadas</span>
                                </th>
                                <th data-field="CompanyName" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Verificada por</span>
                                </th>
                                <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 110px;">Acciones</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="kt-datatable__body" style="">
                            @foreach ($rondas as $ron)
                                @php
                                $ronda = App\Ronda::find($ron->id);
                                @endphp
                                <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                    <td data-field="ShipDate" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $ronda->reporte->fecha }}</span>
                                    </td>
                                    <td data-field="OrderID" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $ronda->numeroRonda->nombre }}</span>
                                    </td>
                                    <td data-field="CompanyName" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $ronda->tipoRonda->nombre}}</span>
                                    </td>
                                    <td data-field="CompanyName" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $ronda->user->name}}</span>
                                    </td>
                                    <td data-field="CompanyName" class="kt-datatable__cell">
                                        <span style="width: 117px; text-align:right;">{!! $ronda->cantidad_alarmas ? '<span class="as-alarma">'.$ronda->cantidad_alarmas.'</span>' : '<span class="as-exito">sin alarmas</span>' !!}</span>
                                    </td>
                                    <td data-field="CompanyName" class="kt-datatable__cell">
                                        <span style="width: 117px;">
                                            @if ($ronda->verificada)
                                                <span class="as-exito">{{ $ronda->verificadaPor->name}}</span>
                                            @else
                                                <span class="as-alarma">sin verificar</span>
                                            @endif
                                        </span>
                                    </td>
                                    <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                        <span style="overflow: visible; position: relative; width: 110px;">
                                            <a href="{{ route('rondas.show', $ronda->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Consultar"><i class="la la-file"></i></a>
                                            @can('verificar', $ronda)
                                                <a href="{{ route('rondas.verificar', $ronda->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Verificar">
                                                    <i class="la la-check-square"></i>
                                                </a>
                                            @endcan
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $rondas->links() }}
                </div>
                <!--end: Datatable -->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script>
    <script src="{{asset('/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js" integrity="sha512-0qNBDZgOKlY8fVi38IMT+vFkFbRdh4jJehDR31fn3a61Vp8DoC1XSERCIW/AgVs+0xjRIuarbBBmt78v1btb3A==" crossorigin="anonymous"></script>

    <script src="{{asset('js/pages/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
    $('.fechas-plugin').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        language: 'es'
    });
    $('.select2').select2({placeholder: "Selecccione múltiples opciones",});
    </script>
@endsection
