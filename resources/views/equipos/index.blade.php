@extends('layouts.app')

@section('content')
    <h3>Planta</h3>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Registros de Equipos
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                    <div class="row align-items-center">
                        <div class="col-xl-10 order-2 order-xl-1">
                            <form method="GET" action="{{ route('equipos.index') }}" role="buscar" >
                                <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                                    <div class="row align-items-center">
                                        <div class="col-xl-5 order-2 order-xl-1">
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-1 col-sm-12">Sistemas</label>
                                                <div class="col-lg-11 col-md-9 col-sm-12">
                                                    <select name="sistemas[]" class="form-control select2 kt-select2" multiple="multiple" >
                                                        @foreach ($grupoPreguntas as $gp)
                                                            <option value="{{$gp->id}}" {{ in_array($gp->id, Request::get('sistemas') ?: []) ? 'selected' : '' }}>{{$gp->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 order-2 order-xl-1">
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3 col-sm-12">Activo</label>
                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                    <select name="activo" class="form-control">
                                                        <option {{ (Request::get('activo') || null !==Request::get('activo')) == null ? 'selected' : '' }} value="">Todos</option>
                                                        <option {{ Request::get('activo') === '1' ? 'selected' : '' }} value="1">Sí</option>
                                                        <option {{ Request::get('activo') === '0' ? 'selected' : '' }} value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 order-2 order-xl-1">
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-3 col-sm-12">Nombre del equipo</label>
                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                    <input type="text" class="form-control" name="nombre" value="{{ (Request::get('nombre') ?: '')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-1 order-2 order-xl-1">
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
                        <div class="col-xl-2 order-1 order-xl-2 kt-align-right">
                            @can('create', App\Pregunta::class)
                                <a style="background-color: #ef9f0c; border-color: #ef9f0c;" href="{{ route('equipos.create')}}" type="button" class="btn btn-success btn-elevate btn-pill">Nuevo Equipo</a>
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
                                    <span style="width: 50px;">Orden</span>
                                </th>
                                <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Sistema</span>
                                </th>
                                <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Nombre</span>
                                </th>
                                <th data-field="CompanyName" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Dispositivo</span>
                                </th>
                                <th data-field="CompanyName" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Unidades</span>
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
                            @foreach ($equipos as $equipo)
                                <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                    <td data-field="ShipDate" class="kt-datatable__cell">
                                        <span style="width: 50px;">{{ $equipo->orden }}</span>
                                    </td>
                                    <td data-field="OrderID" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $equipo->grupoPregunta->nombre}}</span>
                                    </td>
                                    <td data-field="OrderID" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $equipo->descripcion}}</span>
                                    </td>
                                    <td data-field="CompanyName" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $equipo->dispositivo}}</span>
                                    </td>
                                    <td data-field="CompanyName" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $equipo->unidad}}</span>
                                    </td>
                                    <td data-field="CompanyName2" class="kt-datatable__cell">
                                        @if ($equipo->activa)
                                            <span style="width: 117px; font-size: 20px;color:#89b94eff"><i class="fas fa-check"></i><span>
                                        @else
                                            <span style="width: 117px; font-size: 20px;color:#de3d3d"><i class="fas fa-times"></i><span>
                                        @endif
                                    </td>
                                    <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                        <span style="overflow: visible; position: relative; width: 110px;">
                                            <a href="{{ route('equipos.show', $equipo->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Consultar"><i class="la la-file"></i></a>
                                            @can('update', $equipo)
                                                <a href="{{ route('equipos.edit', $equipo->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Modificar"><i class="la la-edit"></i></a>
                                            @endcan
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $equipos->appends(Request::except('page'))->links() }}
                </div>
                <!--end: Datatable -->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script>
    <script src="{{asset('js/pages/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
    $('.select2').select2({placeholder: "Selecccione múltiples opciones",});
    </script>
@endsection
