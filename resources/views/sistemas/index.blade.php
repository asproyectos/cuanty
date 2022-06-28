@extends('layouts.app')

@section('content')
    <h3>Planta</h3>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Registros de Sistemas
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                    <div class="row align-items-center">
                        <div class="col-xl-8 order-2 order-xl-1">
                        </div>
                        <div class="col-xl-4 order-1 order-xl-2 kt-align-right">
                            @can('create', App\GrupoPregunta::class)
                                <a style="background-color: #ef9f0c; border-color: #ef9f0c;" href="{{ route('sistemas.create')}}" type="button" class="btn btn-success btn-elevate btn-pill">Nuevo Sistema</a>
                            @endcan
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg d-xl-none">
                            </div>
                        </div>
                    </div>
                </div>

                <!--end: Search Form -->
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">

                <!--begin: Datatable -->
                <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">
                    <table class="kt-datatable__table" style="display: block;">
                        <thead class="kt-datatable__head">
                            <tr class="kt-datatable__row" style="left: 0px;">
                                <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Orden</span>
                                </th>
                                <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Código</span>
                                </th>
                                <th data-field="CompanyName" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Nombre</span>
                                </th>
                                <th data-field="CompanyName" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Cantidad de equipos</span>
                                </th>
                                <th data-field="CompanyName2" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Activo</span>
                                </th>
                                <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 110px;">Acciones</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="kt-datatable__body" style="">
                            @foreach ($sistemas as $sistema)
                                <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                    <td data-field="ShipDate" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $sistema->orden }}</span>
                                    </td>
                                    <td data-field="OrderID" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $sistema->codigo}}</span>
                                    </td>
                                    <td data-field="CompanyName" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $sistema->nombre}}</span>
                                    </td>
                                    <td data-field="CompanyName" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $sistema->preguntas->count()}}</span>
                                    </td>
                                    <td data-field="CompanyName2" class="kt-datatable__cell">
                                        @if ($sistema->activa)
                                            <span style="width: 117px; font-size: 20px;color:#89b94eff"><i class="fas fa-check"></i><span>
                                        @else
                                            <span style="width: 117px; font-size: 20px;color:#de3d3d"><i class="fas fa-times"></i><span>
                                        @endif
                                    </td>
                                    <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                        <span style="overflow: visible; position: relative; width: 110px;">
                                            <a href="{{ route('sistemas.show', $sistema->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Consultar"><i class="la la-file"></i></a>
                                            @can('update', $sistema)
                                                <a href="{{ route('sistemas.edit', $sistema->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Modificar"><i class="la la-edit"></i></a>
                                            @endcan
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $sistemas->links() }}
                </div>
                <!--end: Datatable -->
            </div>
        </div>
    </div>
@endsection
