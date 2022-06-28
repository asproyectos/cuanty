@extends('layouts.app')

@section('content')
    <h3>Explorar Valores de referencia</h3>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <div class="row">
            <div class="col-xl-4">

                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Amenazas Global
                            </h3>
                        </div>
                        {{--<div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <a href="#" type="button" class="btn btn-success btn-elevate btn-pill">Nuevo</a>
                            </div>
                        </div>--}}
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit">

                        <!--begin: Datatable -->
                        <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">
                            <table class="kt-datatable__table" style="display: block;">
                                <thead class="kt-datatable__head">
                                    <tr class="kt-datatable__row" style="left: 0px;">
                                        <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Código</span>
                                        </th>
                                        <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Nombre</span>
                                        </th>
                                        {{-- <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 110px;">Acciones</span>
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody class="kt-datatable__body" style="">
                                    @foreach ($amenazaGlobal as $amenaza)
                                        <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                            <td data-field="OrderID" class="kt-datatable__cell">
                                                <span style="width: 117px; overflow: visible;">{{ $amenaza->codigo}}</span>
                                            </td>
                                            <td data-field="OrderID" class="kt-datatable__cell">
                                                <span style="width: 117px;">{{ $amenaza->nombre}}</span>
                                            </td>
                                            {{--<td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                                <span style="overflow: visible; position: relative; width: 110px;">
                                                    <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Modificar"><i class="la la-edit"></i></a>
                                                </span>
                                            </td>--}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end: Datatable -->
                    </div>
                </div>
            </div>
            <div class="col-xl-4">

                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Amenazas Nacional
                            </h3>
                        </div>
                        {{--<div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <a href="#" type="button" class="btn btn-success btn-elevate btn-pill">Nuevo</a>
                            </div>
                        </div>--}}
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit">

                        <!--begin: Datatable -->
                        <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">
                            <table class="kt-datatable__table" style="display: block;">
                                <thead class="kt-datatable__head">
                                    <tr class="kt-datatable__row" style="left: 0px;">
                                        <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Código</span>
                                        </th>
                                        <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Nombre</span>
                                        </th>
                                        {{-- <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 110px;">Acciones</span>
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody class="kt-datatable__body" style="">
                                    @foreach ($amenazaNacional as $amenaza)
                                        <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                            <td data-field="OrderID" class="kt-datatable__cell">
                                                <span style="width: 117px; overflow: visible;">{{ $amenaza->codigo}}</span>
                                            </td>
                                            <td data-field="OrderID" class="kt-datatable__cell">
                                                <span style="width: 117px;">{{ $amenaza->nombre}}</span>
                                            </td>
                                            {{--<td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                                <span style="overflow: visible; position: relative; width: 110px;">
                                                    <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Modificar"><i class="la la-edit"></i></a>
                                                </span>
                                            </td>--}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end: Datatable -->
                    </div>
                </div>
            </div>
            <div class="col-xl-4">

                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Categorias de Edad
                            </h3>
                        </div>
                        {{--<div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <a href="#" type="button" class="btn btn-success btn-elevate btn-pill">Nuevo</a>
                            </div>
                        </div>--}}
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit">

                        <!--begin: Datatable -->
                        <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">
                            <table class="kt-datatable__table" style="display: block;">
                                <thead class="kt-datatable__head">
                                    <tr class="kt-datatable__row" style="left: 0px;">
                                        {{-- <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Código</span>
                                        </th> --}}
                                        <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Nombre</span>
                                        </th>
                                        {{-- <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 110px;">Acciones</span>
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody class="kt-datatable__body" style="">
                                    @foreach ($categoriaEdad as $edad)
                                        <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                            {{-- <td data-field="OrderID" class="kt-datatable__cell">
                                                <span style="width: 117px; overflow: visible;">{{ $edad->codigo}}</span>
                                            </td> --}}
                                            <td data-field="OrderID" class="kt-datatable__cell">
                                                <span style="width: 117px;">{{ $edad->nombre}}</span>
                                            </td>
                                            {{--<td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                                <span style="overflow: visible; position: relative; width: 110px;">
                                                    <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Modificar"><i class="la la-edit"></i></a>
                                                </span>
                                            </td>--}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end: Datatable -->
                    </div>
                </div>
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Tipo de hábitat
                            </h3>
                        </div>
                        {{--<div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <a href="#" type="button" class="btn btn-success btn-elevate btn-pill">Nuevo</a>
                            </div>
                        </div>--}}
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit">

                        <!--begin: Datatable -->
                        <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">
                            <table class="kt-datatable__table" style="display: block;">
                                <thead class="kt-datatable__head">
                                    <tr class="kt-datatable__row" style="left: 0px;">
                                        {{-- <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Código</span>
                                        </th> --}}
                                        <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Nombre</span>
                                        </th>
                                        {{-- <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 110px;">Acciones</span>
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody class="kt-datatable__body" style="">
                                    @foreach ($tipoHabitat as $habitat)
                                        <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                            {{-- <td data-field="OrderID" class="kt-datatable__cell">
                                                <span style="width: 117px; overflow: visible;">{{ $habitat->codigo}}</span>
                                            </td> --}}
                                            <td data-field="OrderID" class="kt-datatable__cell">
                                                <span style="width: 117px;">{{ $habitat->nombre}}</span>
                                            </td>
                                            {{--<td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                                <span style="overflow: visible; position: relative; width: 110px;">
                                                    <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Modificar"><i class="la la-edit"></i></a>
                                                </span>
                                            </td>--}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end: Datatable -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">

                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Orden
                            </h3>
                        </div>
                        {{--<div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <a href="#" type="button" class="btn btn-success btn-elevate btn-pill">Nuevo</a>
                            </div>
                        </div>--}}
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit">

                        <!--begin: Datatable -->
                        <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">
                            <table class="kt-datatable__table" style="display: block;">
                                <thead class="kt-datatable__head">
                                    <tr class="kt-datatable__row" style="left: 0px;">
                                        {{-- <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Código</span>
                                        </th> --}}
                                        <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Nombre</span>
                                        </th>
                                        {{-- <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 110px;">Acciones</span>
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody class="kt-datatable__body" style="">
                                    @foreach ($orden as $ordenLocal)
                                        <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                            {{-- <td data-field="OrderID" class="kt-datatable__cell">
                                                <span style="width: 117px; overflow: visible;">{{ $ordenLocal->codigo}}</span>
                                            </td> --}}
                                            <td data-field="OrderID" class="kt-datatable__cell">
                                                <span style="width: 117px;">{{ $ordenLocal->nombre}}</span>
                                            </td>
                                            {{--<td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                                <span style="overflow: visible; position: relative; width: 110px;">
                                                    <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Modificar"><i class="la la-edit"></i></a>
                                                </span>
                                            </td>--}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $orden->links() }}
                        <!--end: Datatable -->
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Familia
                            </h3>
                        </div>
                        {{--<div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <a href="#" type="button" class="btn btn-success btn-elevate btn-pill">Nuevo</a>
                            </div>
                        </div>--}}
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit">

                        <!--begin: Datatable -->
                        <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">
                            <table class="kt-datatable__table" style="display: block;">
                                <thead class="kt-datatable__head">
                                    <tr class="kt-datatable__row" style="left: 0px;">
                                        {{-- <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Código</span>
                                        </th> --}}
                                        <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Nombre</span>
                                        </th>
                                        {{-- <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 110px;">Acciones</span>
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody class="kt-datatable__body" style="">
                                    @foreach ($familia as $familiaLocal)
                                        <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                            {{-- <td data-field="OrderID" class="kt-datatable__cell">
                                                <span style="width: 117px; overflow: visible;">{{ $familiaLocal->codigo}}</span>
                                            </td> --}}
                                            <td data-field="OrderID" class="kt-datatable__cell">
                                                <span style="width: 117px;">{{ $familiaLocal->nombre}}</span>
                                            </td>
                                            {{--<td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                                <span style="overflow: visible; position: relative; width: 110px;">
                                                    <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Modificar"><i class="la la-edit"></i></a>
                                                </span>
                                            </td>--}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $familia->links() }}
                        <!--end: Datatable -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
