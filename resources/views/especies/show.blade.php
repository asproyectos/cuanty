@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/pages/alto-sentido/jquery.fancybox.min.css') }}" rel="stylesheet" type="text/css" />
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
    <h3>Explorar Ave</h3>
    <div class="row">
        <div class="col-xl-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Registro monitoreo de aves
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
                            <h4>Datos del ave</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Código</label>
                                <p>{{$especie->codigo}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Orden</label>
                                <p>{{$especie->orden->nombre}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Familia</label>
                                <p>{{$especie->familia->nombre}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Especie</label>
                                <p>{{$especie->nombre}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Nombre en español</label>
                                <p>{{$especie->nombre_castellano}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Nombre en inglés</label>
                                <p>{{$especie->nombre_ingles}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Altura mínima</label>
                                <p>{{$especie->altura_minima}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Altura máxima</label>
                                <p>{{$especie->altura_maxima}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Amenaza nacional(Libros rojos)</label>
                                <p>{{$especie->amenazaNacional->nombre}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Amenaza global(IUCN)</label>
                                <p>{{$especie->amenazaGlobal->nombre}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Registro fotográfico</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-12">
                            <div class="form-group row">
                                @forelse ($especie->imagenesAve as $imagenAve)
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <a data-fancybox="gallery" href="{{ asset('imagenes_especies/'.$imagenAve->nombre) }}">
                                            <img class="img-fluid" src="{{ asset('imagenes_especies/'.$imagenAve->nombre) }}">
                                        </a>
                                    </div>
                                @empty
                                    <div class="col-lg-12 col-md-3 col-sm-12" id="imagenes-ave-mensaje">
                                        <p style="text-align:center;">Sin imágenes</p>
                                    </div>
                                @endforelse
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
                            <h5>Monitoreos por mes</h5>
                            <div id="kt_morris_2" style="height:300px;"></div>
                        </div>
                        <div class="col-md-4">
                            <h5>Cantidad especies por cuenca</h5>
                            <div id="kt_morris_4" style="height:300px;"></div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Registros de monitoreo de la especie</h4>
                        </div>
                    </div>
                    @if ($registros->count() > 0)
                        <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">
                            <table class="kt-datatable__table" style="display: block;">
                                <thead class="kt-datatable__head">
                                    <tr class="kt-datatable__row" style="left: 0px;">
                                        <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Unidad Gestión de Cuenca</span>
                                        </th>
                                        <th data-field="CompanyName" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Cuenca</span>
                                        </th>
                                        <th data-field="Status" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Comunidad</span>
                                        </th>
                                        <th data-field="Status" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Fecha</span>
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
                                            <span style="width: 117px;">{{ $registro->comunidad->cuenca->unidadGestionCuenca->codigo}} - {{ $registro->comunidad->cuenca->unidadGestionCuenca->nombre}}</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell">
                                            <span style="width: 117px;">{{ $registro->comunidad->cuenca->nombre}}</span>
                                        </td>
                                        <td data-field="ShipDate" class="kt-datatable__cell">
                                            <span style="width: 117px;">{{ $registro->comunidad->nombre}}</span>
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
    <script src="{{ asset('js/pages/alto-sentido/jquery.fancybox.min.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ asset('js/pages/dashboard.js') }}" type="text/javascript"></script> --}}
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
            ykeys: ['a','b', 'c', 'd', 'e',],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Total individuos','Total cria', 'Total juvenil', 'total adulto', 'Total sin definir'],
            // lineColors: ['#006518', '#161238']
        });
        Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'kt_morris_2',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: {!!json_encode($monitoreosMesDatos)!!},
            // The name of the data record attribute that contains x-values.
            xkey: 'y',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['a'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Total monitoreos'],
            // lineColors: ['#006518', '#161238']
        });
        Morris.Donut({
            element: 'kt_morris_4',
            data: {!!$tiposCuenca!!},
            colors: ['#006518', '#161238']
        });
    </script>
@endsection
