@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <!--begin:: Widgets/Quick Stats-->
            <div class="row">
                <div class="col-sm-12 col-md-2 col-lg-2">
                    <h4>INICIO</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="kt-portlet kt-portlet--tab">
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="iconos-home-as col-lg-2" style="margin-right: 10px;margin-left: 10px;border: 1px solid #ccc!important; border-radius: 16px; height:250px">
                            <a href="{{ route('equipos.analisis')}}">
                                <img style="padding-top:50px;width:100px;" class="img-responsive  center-block-as" src="{{ asset('media/icons/ico-analisis300.png') }}" alt="">
                                <h4 style="text-align:center; padding-top:20px;">Análisis</h4>
                            </a>
                        </div>
                        <div class="iconos-home-as col-lg-2" style="margin-right: 10px;margin-left: 10px;border: 1px solid #ccc!important; border-radius: 16px; height:250px">
                            <a href="{{ route('rondas.index')}}">
                                <img style="padding-top:50px;width:100px;" class="img-responsive  center-block-as" src="{{ asset('media/icons/ico-reportes300.png') }}" alt="">
                                <h4 style="text-align:center;  padding-top:20px;">Reportes de Rondas</h4>
                            </a>
                        </div>
                        <div class="iconos-home-as col-lg-2" style="margin-right: 10px;margin-left: 10px;border: 1px solid #ccc!important; border-radius: 16px; height:250px">
                            <a href="{{ route('rondas.anotaciones')}}">
                                <img style="padding-top:50px;width:100px;" class="img-responsive  center-block-as" src="{{ asset('media/icons/ico-alertas300.png') }}" alt="">
                                <h4 style="text-align:center;  padding-top:20px;">Anotaciones</h4>
                            </a>
                        </div>
                        <div class="iconos-home-as col-lg-2" style="margin-right: 10px;margin-left: 10px;border: 1px solid #ccc!important; border-radius: 16px; height:250px">
                            <a href="{{ route('sistemas.index')}}">
                                <img style="padding-top:50px;width:100px;" class="img-responsive  center-block-as" src="{{ asset('media/icons/ico-sistemas300.png') }}" alt="">
                                <h4 style="text-align:center;  padding-top:20px;">Sistemas</h4>
                            </a>
                        </div>
                        <div class="iconos-home-as col-lg-2" style="margin-right: 10px;margin-left: 10px;border: 1px solid #ccc!important; border-radius: 16px; height:250px">
                            <a href="{{ route('equipos.index')}}">
                                <img style="padding-top:50px;width:100px;" class="img-responsive  center-block-as" src="{{ asset('media/icons/ico-equipos300.png') }}" alt="">
                                <h4 style="text-align:center;  padding-top:20px;">Equipos</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kt-portlet__body kt-portlet__body--fit">
                        <h4>Últimas Rondas <a style="background-color: #ef9f0c; border-color: #ef9f0c;" href="{{ route('rondas.index') }}" class="btn btn-success">Ver Todas</a></h4>
                        <!--begin: Datatable -->
                        <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">
                            <table class="kt-datatable__table" style="display: block;">
                                <thead class="kt-datatable__head">
                                    <tr class="kt-datatable__row" style="left: 0px;">
                                        <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Inspector</span>
                                        </th>
                                        <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Turno</span>
                                        </th>
                                        <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Fecha</span>
                                        </th>
                                        <th data-field="CompanyName" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 117px;">Completado</span>
                                        </th>
                                        <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 110px;">Estado</span>
                                        </th>
                                        <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 110px;">Comentarios</span>
                                        </th>
                                        <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 110px;">Acciones</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="kt-datatable__body" style="">
                                    @foreach ($rondas as $ronda)
                                        <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                            <td data-field="OrderID" class="kt-datatable__cell">
                                                <span style="width: 117px;">{{ $ronda->user->name}}</span>
                                            </td>
                                            <td data-field="OrderID" class="kt-datatable__cell">
                                                <span style="width: 117px;">{{ $ronda->numeroRonda->nombre}}</span>
                                            </td>
                                            <td data-field="ShipDate" class="kt-datatable__cell">
                                                <span  style="width: 117px;">{{ $ronda->reporte->fecha }}</span>
                                            </td>
                                            <td data-field="ShipDate" class="kt-datatable__cell">
                                                <span style=" font-weight:500; text-align: center;width: 117px;">{{ $ronda->porcentaje}}%</span>
                                            </td>
                                            <td data-field="ShipDate" class="kt-datatable__cell">
                                                <span style="width: 117px;text-align: center;font-weight: bold; width: 117px;">{!! $ronda->verificada ? '<span class="as-exito">Verificada</span>' :'<span class="as-alarma">Sin verificar</span>' !!}</span>
                                            </td>
                                            <td data-field="ShipDate" class="kt-datatable__cell">
                                                <span style="text-align: center;width: 117px;">{{$ronda->comentario ? 'Sí': 'No'}}</span>
                                            </td>
                                            <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                                <span style="overflow: visible; position: relative; width: 110px;">
                                                    <div class="btn-group btn-group" role="group" aria-label="...">
                                                        <a style="background-color: #ef9f0c; border-color: #ef9f0c;" href="{{ route('rondas.show', $ronda->id)}}" class="btn btn-primary">Ver</a>
                                                    </div>
                                                </span>
                                            </td>
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
        <div class="col-lg-4">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Comentarios
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-notes">
                        <div class="kt-notes__items">
                            @foreach ($rondasComentarios as $rc)
                                <div class="kt-notes__item">
                                    <div class="kt-notes__media">
                                        <img class="kt-hidden-" src="{{ asset('imagenes_usuarios/'.$rc->user->imagen) }}" alt="image">
                                    </div>
                                    <div class="kt-notes__content">
                                        <div class="kt-notes__section">
                                            <div class="kt-notes__info">
                                                <a href="{{ route('usuarios.show', $rc->user->id)}}" class="kt-notes__title">
                                                    {{$rc->user->name}}
                                                </a>
                                                <span class="kt-notes__desc">
                                                    <a style="color:#ef9f0b; font-weight:500" href="{{ route('rondas.show', $rc->id)}}">
                                                        {{$rc->reporte->fecha}} - {{$rc->numeroRonda->nombre}}
                                                    </a>
                                                </span>
                                                <span class="kt-badge as-comentario-{{$rc->tipo_comentario_id}} kt-badge--inline">{{$rc->tipoComentario->nombre}}</span>
                                            </div>
                                        </div>
                                        <span class="kt-notes__body">
                                            {{$rc->comentario}}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
