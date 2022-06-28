@extends('layouts.app')

@section('content')
    <h3>Usuarios</h3>
    <div class="row">
        <div class="col-xl-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Consulta de usuario
                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Datos del usuario</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Imagen</label>
                                <img class="img-fluid" src="{{asset('imagenes_usuarios/'.$usuario->imagen)}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Rol</label>
                                <p>{{$usuario->rol->nombre}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>E-mail</label>
                                <p>{{$usuario->email}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>nombre</label>
                                <p>{{$usuario->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Registros de monitoreo del observador</h4>
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
                                            <span style="width: 117px;">Comunidad</span>
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
                                                <span style="width: 117px;">{{ $registro->cantidad }}</span>
                                            </td>
                                            <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                                <span style="width: 117px;">{{ $registro->comunidad->nombre }}</span>
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
