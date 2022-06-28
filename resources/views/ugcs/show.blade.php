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
    <h3>Lugares</h3>
    <div class="row">
        <div class="col-xl-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Registro de Unidad de gestión de Cuenca
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
                <form class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Datos de la Unidad de Gestión de Cuenca</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>codigo</label>
                                <p>{{$ugc->codigo}}</p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group ">
                                <label>nombre</label>
                                <p>{{$ugc->nombre}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Estadísticas</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-4">
                            <h5>Cantidad total por mes</h5>
                            <div id="kt_morris_1" style="height:300px;"></div>
                        </div>
                        <div class="col-md-4">
                            <h5>Cantidad por especie</h5>
                            <div id="kt_morris_4" style="height:300px;"></div>
                        </div>
                        <div class="col-md-4">
                            <h5>Cantidad por habitat</h5>
                            <div id="kt_morris_5" style="height:300px;"></div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Registros de monitoreo en la Cuenca</h4>
                        </div>
                    </div>
                    @if ($registros->count() > 0)
                        <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">
                            <table class="kt-datatable__table" style="display: block;">
                                <thead class="kt-datatable__head">
                                    <tr class="kt-datatable__row" style="left: 0px;">
                                        <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Código</span>
                                        </th>
                                    <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 117px;">Especie</span>
                                    </th>
                                    <th data-field="CompanyName" class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 117px;">Nombre en español</span>
                                    </th>
                                    <th data-field="Status" class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 117px;">Fecha de monitoreo</span>
                                    </th>
                                    <th data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 117px;">Cantidad</span>
                                    </th>
                                    <th data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 117px;">Observador</span>
                                    </th>
                                    <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 110px;">Acciones</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="kt-datatable__body" style="">
                                @foreach ($registros as $registro)
                                    <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                        <td data-field="OrderID" class="kt-datatable__cell">
                                            <span style="width: 117px;">{{ $registro->especie->codigo}}</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell">
                                            <span style="width: 117px;">{{ $registro->especie->nombre}}</span>
                                        </td>
                                        <td data-field="ShipDate" class="kt-datatable__cell">
                                            <span style="width: 117px;">{{ $registro->especie->nombre_castellano}}</span>
                                        </td>
                                        <td data-field="CompanyName" class="kt-datatable__cell">
                                            <span style="width: 117px;">{{ $registro->fecha->formatLocalized('%B %d/%y')}}<br>{{ $registro->hora_inicio->format('g:i A')}} - {{ $registro->hora_final->format('g:i A')}}</span>
                                        </td>
                                        <td data-field="Status" class="kt-datatable__cell">
                                            <span style="width: 117px;">{{ $registro->cantidad_total }}</span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 117px;">{{ $registro->user->name }}</span>
                                        </td>
                                        <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="overflow: visible; position: relative; width: 110px;">
                                                <a href="{{ route('registros.show', $registro->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Consultar"><i class="la la-file"></i></a>
                                                <a href="{{ route('registros.edit', $registro->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Modificar"><i class="la la-edit"></i></a>
                                            </span>
                                        </td>
                                    </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $registros->links() }}
                                    </div>
                                @else
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <p style="text-align:center;">Sin registros.</p>
                                        </div>
                                    </div>
                                @endif
                </form>
                <!--end::Form-->

            </div>
            <!--end::Portlet-->
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script type="text/javascript">
        Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'kt_morris_1',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: {!!json_encode($especiesMesDatos)!!},
            // The name of the data record attribute that contains x-values.
            xkey: 'y',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['a'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Total individuos'],
            lineColors: ['#006518', '#161238']
        });
        Morris.Donut({
            element: 'kt_morris_4',
            data: {!!$tiposEspecie!!},
            colors: ['#006518', '#161238', '#5a945e']
        });
        Morris.Donut({
            element: 'kt_morris_5',
            data: {!!$tiposHabitat!!},
            colors: ['#006518', '#161238', '#5a945e']
        });
    </script>
@endsection
