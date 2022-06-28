@extends('layouts.app')

@section('content')
    <h3>Configuración</h3>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Registros de configuraciones
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                {{-- <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                    <div class="row align-items-center">
                        <div class="col-xl-8 order-2 order-xl-1">
                        </div>
                        <div class="col-xl-4 order-1 order-xl-2 kt-align-right">
                            @can('create', App\Pais::class)
                                <a href="{{ route('paises.create')}}" type="button" class="btn btn-success btn-elevate btn-pill">Nuevo País</a>
                            @endcan
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg d-xl-none">
                            </div>
                        </div>
                    </div>
                </div> --}}

                <!--end: Search Form -->
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">

                <!--begin: Datatable -->
                <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">
                    <table class="kt-datatable__table" style="display: block;">
                        <thead class="kt-datatable__head">
                            <tr class="kt-datatable__row" style="left: 0px;">
                                <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">id</span>
                                </th>
                                <th data-field="CompanyName" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Nombre</span>
                                </th>
                                <th data-field="CompanyName" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Valor</span>
                                </th>
                                <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 110px;">Acciones</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="kt-datatable__body" style="">
                            @foreach ($configuraciones as $configuracion)
                                <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                    <td data-field="OrderID" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $configuracion->id}}</span>
                                    </td>
                                    <td data-field="ShipDate" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $configuracion->nombre}}</span>
                                    </td>
                                    <td data-field="ShipDate" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $configuracion->valor}}</span>
                                    </td>
                                    <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                        <span style="overflow: visible; position: relative; width: 110px;">
                                            @can ('update', $configuracion->id)
                                                <a href="{{ route('configuracion.edit', $configuracion->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Modificar"><i class="la la-edit"></i></a>
                                            @endcan
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $configuraciones->links() }}
                </div>
                <!--end: Datatable -->
            </div>
        </div>
    </div>
@endsection
