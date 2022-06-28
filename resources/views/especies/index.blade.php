@extends('layouts.app')

@section('content')
    <h3>Explorar Aves</h3>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Aves registradas
                    </h3>
                </div>
                {{-- <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <a href="#" class="btn btn-clean btn-icon-sm">
                            <i class="la la-download">
                            </i>
                            Exportar
                        </a>
                    </div>
                </div> --}}
            </div>
            <div class="kt-portlet__body">

                <!--begin: Search Form -->
                <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                    <div class="row align-items-center">
                        <div class="col-xl-8 order-2 order-xl-1">
                            <div class="row align-items-center">
                                <div class="col-md-6 kt-margin-b-20-tablet-and-mobile">
                                    <div class="kt-input-icon kt-input-icon--left">
                                        <form method="GET" action="{{ url('/aves') }}" role="buscar" >
                                            {{-- {{ csrf_field() }} --}}
                                            <div class="form-group ">
                                                <div class="kt-input-icon kt-input-icon--right">
                                                    <input type="text" class="form-control" name="buscar" placeholder="Buscar..." id="generalSearch">
                                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                                        <span><i class="la la-search"></i></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-xl-4 order-1 order-xl-2 kt-align-right">
                                {{-- <a href="{{ route('especies.create')}}" type="button" class="btn btn-success btn-elevate btn-pill">Nueva especie</a> --}}
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
                                    {{-- <th data-field="RecordID" class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check">
                                        <span style="width: 20px;">
                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid">
                                                <input type="checkbox">&nbsp;<span>
                                                </span>
                                            </label>
                                        </span>
                                    </th> --}}
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
                                    <span style="width: 117px;">Nombre en inglés</span>
                                </th>
                                <th data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Orden</span>
                                </th>
                                <th data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Familia</span>
                                </th>
                                <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 110px;">Acciones</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="kt-datatable__body" style="">
                            @foreach ($especies as $especie)
                                <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                    {{-- <td class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check" data-field="RecordID">
                                        <span style="width: 20px;">
                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                                                <input type="checkbox" value="1">&nbsp;<span>
                                                </span>
                                            </label>
                                        </span>
                                    </td> --}}
                                    <td data-field="OrderID" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $especie->codigo}}</span>
                                    </td>
                                    <td data-field="Country" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $especie->nombre}}</span>
                                    </td>
                                    <td data-field="ShipDate" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $especie->nombre_castellano}}</span>
                                    </td>
                                    <td data-field="ShipDate" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $especie->nombre_ingles}}</span>
                                    </td>
                                    <td data-field="ShipDate" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $especie->orden->nombre}}</span>
                                    </td>
                                    <td data-field="ShipDate" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $especie->familia->nombre}}</span>
                                    </td>
                                    <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                        <span style="overflow: visible; position: relative; width: 110px;">
                                            <a href="{{ route('especies.show', $especie->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Consultar"><i class="la la-file"></i></a>
                                            @can('update', $especie)
                                                <a href="{{ route('especies.edit', $especie->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Modificar"><i class="la la-edit"></i></a>
                                            @endcan
                                        </span>
                                    </td>
                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $especies->appends(request()->query())->links() }}
                                </div>
                                <!--end: Datatable -->
                            </div>
                        </div>
                    </div>
                @endsection
