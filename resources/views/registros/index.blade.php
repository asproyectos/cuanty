@extends('layouts.app')

@section('content')
    <h3>Aves</h3>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Registros de monitoreo
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <a href="{{ route('registros.exportar')}}" class="btn btn-clean btn-icon-sm">
                            <i class="la la-download">
                            </i>
                            Exportar
                        </a>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Search Form -->
                <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                    <div class="row align-items-center">
                        <div class="col-xl-8 order-2 order-xl-1">
                            <div class="row align-items-center">
                            </div>
                        </div>
                        <div class="col-xl-4 order-1 order-xl-2 kt-align-right">
                            <a href="{{ route('registros.create')}}" type="button" class="btn btn-success btn-elevate btn-pill">Nuevo Registro</a>
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
                                <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Código</span>
                                </th>
                                <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Especie</span>
                                </th>
                                <th data-field="CompanyName" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Cantidad</span>
                                </th>
                                <th data-field="Status" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Fecha de monitoreo</span>
                                </th>
                                <th data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">Comunidad</span>
                                </th>
                                <th data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                    <span style="width: 117px;">¿Identificada?</span>
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
                                        <span style="width: 117px;"><b>{{ $registro->especie->nombre}}</b><br>{{ $registro->especie->nombre_castellano}}</span>
                                    </td>
                                    <td data-field="ShipDate" class="kt-datatable__cell">
                                        <span data-placement="top" data-toggle="tooltip" data-html="true" title="Crias: {{$registro->cantidad_cria ? $registro->cantidad_cria : 0 }}<br>Juvenil: {{$registro->cantidad_juvenil ? $registro->cantidad_juvenil : 0}}<br>Adulto: {{$registro->cantidad_adulto ? $registro->cantidad_adulto : 0}}<br>Sin definir: {{$registro->cantidad ? $registro->cantidad : 0}}" style="cursor:pointer; font-weight:700; color:#006518;width: 117px; text-align:center;">{{ $registro->cantidad_total}}
                                        </span>
                                    </td>
                                    <td data-field="CompanyName" class="kt-datatable__cell">
                                        <span style="width: 117px;">{{ $registro->fecha->formatLocalized('%B %d/%y')}}<br>{{ $registro->hora_inicio->format('g:i A')}} - {{ $registro->hora_final->format('g:i A')}}</span>
                                    </td>
                                    <td data-field="Status" class="kt-datatable__cell">
                                        <span data-placement="top" data-toggle="tooltip" data-html="true" title="<b>UGC:</b> {{ $registro->comunidad->cuenca->unidadGestionCuenca->codigo }} | {{ $registro->comunidad->cuenca->unidadGestionCuenca->nombre }}<br><b>Cuenca:</b> {{ $registro->comunidad->cuenca->nombre }}" style="cursor:pointer; font-weight:700; color:#006518;width: 117px; text-align:center;">
                                            {{ $registro->comunidad->nombre }}
                                        </span>
                                        </td>
                                        <td data-field="Type" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="width: 117px; text-align:center;">
                                                <div class="kt-widget__button">
                                                    @if ($registro->especie_identificada)
                                                        <span style="font-weight:600;" class="btn btn-label-success btn-sm">Sí</span>
                                                    @else
                                                        <span style="font-weight:600;" class="btn btn-label-danger btn-sm">No</span>
                                                    @endif
                                                </div>
                                            </span>
                                        </td>
                                        <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="overflow: visible; position: relative; width: 110px;">
                                                <a href="{{ route('registros.show', $registro->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Consultar"><i class="la la-file"></i></a>
                                                @can('update', $registro)
                                                    <a href="{{ route('registros.edit', $registro->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Modificar"><i class="la la-edit"></i></a>
                                                @endcan
                                                @can('update', $registro)
                                                    <a data-toggle="modal" data-form="{{ route('registros.delete', $registro->id) }}" data-especie="{{ $registro->especie->nombre }}" data-target="#kt_modal_1" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Eliminar"><i class="la la-trash"></i></a>
                                                @endcan
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $registros->links() }}
                    </div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
        <div class="modal fade" id="kt_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="eliminar-registro" method="POST" action="">
                    @method('DELETE')
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="body-eliminar"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Eliminar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $('#kt_modal_1').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('especie') // Extract info from data-* attributes
            var url = button.data('form') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('#body-eliminar').text('¿Realmente desea eliminar el registro de la especie ' + recipient + '?')
            modal.find('#eliminar-registro').attr('action', url)
        })
        </script>
    @endsection
