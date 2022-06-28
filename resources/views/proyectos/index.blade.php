@extends('layouts.app')

@section('content')
    <h3>Listado de Proyectos</h3>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    {{-- <h3 class="kt-portlet__head-title">
                    Filtros de búsqueda
                </h3> --}}
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
                {{-- <div class="row align-items-center">
                <div class="col-md-3 kt-margin-b-20-tablet-and-mobile">
                <div class="kt-input-icon kt-input-icon--left">
                <input type="text" class="form-control" placeholder="Buscar..." id="generalSearch">
                <span class="kt-input-icon__icon kt-input-icon__icon--left">
                <span>
                <i class="la la-search">
            </i>
        </span>
    </span>
</div>
</div>
</div> --}}
</div>
<div class="col-xl-4 order-1 order-xl-2 kt-align-right">
    @can('create', App\Comunidad::class)
        <a style=" background-color: #5a96e5; border-color: #5a96e5; " href="{{ route('proyectos.create')}}" type="button" class="btn btn-success btn-elevate btn-pill">
            <span><i class="fas fa-plus"></i><span>
                Nuevo Proyecto
            </a>
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
                    <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                        <span style="width: 117px;">Nombre</span>
                    </th>
                    <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                        <span style="width: 117px;">Tipo</span>
                    </th>
                    <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort">
                        <span style="width: 117px;">Encuestas</span>
                    </th>
                    <th data-field="CompanyName" class="kt-datatable__cell kt-datatable__cell--sort">
                        <span style="width: 117px;">Fecha de inicio</span>
                    </th>
                    <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                        <span style="width: 110px;">Avance</span>
                    </th>
                    <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                        <span style="width: 110px;">Ubicación</span>
                    </th>
                    @foreach ($formularios as $formulario)
                        <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                            <span style="width: 110px;">{{ $formulario->nombre }}</span>
                        </th>
                    @endforeach
                    <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                        <span style="width: 110px;">Acciones</span>
                    </th>
                </tr>
            </thead>
            <tbody class="kt-datatable__body" style="">
                @foreach ($proyectos as $proyecto)
                    <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                        <td data-field="OrderID" class="kt-datatable__cell">
                            <span style="width: 117px;">{{ $proyecto->id }} - {{ $proyecto->nombre}}</span>
                        </td>
                        <td data-field="OrderID" class="kt-datatable__cell">
                            <span style="width: 117px;">Línea base</span>
                        </td>
                        <td data-field="ShipDate" class="kt-datatable__cell">
                            <span style="text-align: center;font-weight: bold; width: 117px;">{{ $proyecto->respuestaProyectos->count() }} / {{ $proyecto->numero_hogares}}</span>
                        </td>
                        <td data-field="ShipDate" class="kt-datatable__cell">
                            <span style="width: 117px;">{{ $proyecto->fecha}}</span>
                        </td>
                        <td data-field="ShipDate" class="kt-datatable__cell">
                            <span style="width: 117px;text-align: center;font-weight: bold; width: 117px;">{{ round(($proyecto->respuestaProyectos->count()/$proyecto->numero_hogares)*100,0)}}%</span>
                        </td>
                        <td data-field="ShipDate" class="kt-datatable__cell">
                            <span style="width: 117px;">{{ $proyecto->comunidad->nombre }}</span>
                        </td>
                        @foreach ($formularios as $formulario)
                            <td data-field="ShipDate" class="kt-datatable__cell" style=" text-align: center; ">
                                <span style="width: 117px;">{!! $proyecto->formularios->contains($formulario->id) ? '<span style="font-size: 30px;color:#89b94eff"><i class="fas fa-check"></i><span>' : ''!!}</span>
                            </td>
                        @endforeach
                        <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                            <span style="overflow: visible; position: relative; width: 110px;">
                                <div class="btn-group btn-group" role="group" aria-label="...">
                                    <a href="{{ route('proyectos.show', $proyecto->id)}}" class="btn btn-primary">Ver</a>
                                    <a href="{{ route('proyectos.encuesta', $proyecto->id)}}" class="btn btn-success">Añadir encuesta</a>
                                </div>
                                {{-- <a href="{{ route('proyectos.show', $proyecto->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Consultar"><i class="la la-file"></i></a> --}}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $proyectos->links() }}
    </div>
    <!--end: Datatable -->
</div>
</div>
</div>
@endsection
