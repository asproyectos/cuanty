@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection

@section('content')
    <h3>Lugares</h3>
    <div class="row">
        <div class="col-xl-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Registro de Comunidad
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
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-6">
                        <h4>Datos de la Comunidad</h4>
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-5">
                        <div class="form-group ">
                            <label>SubRegión</label>
                            <p>{{$comunidad->subregion->codigo}} - {{$comunidad->subregion->nombre}}</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group ">
                            <label>Código</label>
                            <p>{{$comunidad->codigo}}</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group ">
                            <label>Nombre</label>
                            <p>{{$comunidad->nombre}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <!--begin:: Widgets/Quick Stats-->
            <div class="row row-full-height">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-brand" style="height:150px;border-bottom: 3px solid #1d9798ff; background-repeat: no-repeat; background-position: right 5px top 5px; background-size: 75px; }}');">
                        <div class="kt-portlet__body kt-portlet__body--fluid">
                            <div class="kt-widget26">
                                <div class="kt-widget26__content">
                                    <span class="kt-widget26__number">{{$encuestados}}</span>
                                    <span class="kt-widget26__desc">Encuestados</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-brand" style="height:150px;border-bottom: 3px solid #1d9798ff; background-repeat: no-repeat; background-position: right 5px top 5px; background-size: 75px; }}');">
                        <div class="kt-portlet__body kt-portlet__body--fluid">
                            <div class="kt-widget26">
                                <div class="kt-widget26__content">
                                    <span class="kt-widget26__number">{{$proyectos}}</span>
                                    <span class="kt-widget26__desc">Proyectos</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-brand" style="height:150px;border-bottom: 3px solid #1d9798ff; background-repeat: no-repeat; background-position: right 5px top 5px; background-size: 75px; }}');">
                        <div class="kt-portlet__body kt-portlet__body--fluid">
                            <div class="kt-widget26">
                                <div class="kt-widget26__content">
                                    <span class="kt-widget26__number">{{$respuestas}}</span>
                                    <span class="kt-widget26__desc">Respuestas dadas por encuestados</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-brand" style="height:150px;border-bottom: 3px solid #1d9798ff; background-repeat: no-repeat; background-position: right 5px top 5px; background-size: 75px; }}');">
                        <div class="kt-portlet__body kt-portlet__body--fluid">
                            <div class="kt-widget26">
                                <div class="kt-widget26__content">
                                    <span class="kt-widget26__number">{{$encuestas}}</span>
                                    <span class="kt-widget26__desc">Encuestas totales realizadas</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="kt-portlet kt-portlet--tab">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon kt-hidden">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Sexo
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div id="kt_morris_1" style="height:300px;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="kt-portlet kt-portlet--tab">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon kt-hidden">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Cómo se considera
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div id="kt_morris_2" style="height:300px;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="kt-portlet kt-portlet--tab">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon kt-hidden">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Principal medio de vida
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div id="kt_morris_3" style="height:300px;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="kt-portlet kt-portlet--tab">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon kt-hidden">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Años de residencia en la región
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div id="kt_morris_4" style="height:300px;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="kt-portlet kt-portlet--tab">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon kt-hidden">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Avance IMAC
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div id="kt_morris_5" style="height:300px;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script type="text/javascript">
    Morris.Donut({
        element: 'kt_morris_1',
        data: {!!$generos!!},
        colors: ['#bee0e1', '#1d9798']
    });
    Morris.Donut({
        element: 'kt_morris_2',
        data: {!!$considera!!},
        colors: ['#bee0e1', '#1d9798']
    });
    Morris.Donut({
        element: 'kt_morris_3',
        data: {!!$medioVida!!},
        colors: ['#bee0e1', '#1d9798']
    });
    Morris.Donut({
        element: 'kt_morris_4',
        data: {!!$anoresidencia!!},
        colors: ['#bee0e1', '#1d9798']
    });
    Morris.Line({
        element: 'kt_morris_5',
        data: {!!json_encode($imacs)!!},
        xkey: 'y',
        ykeys: ['a'],
        labels: ['IMAC'],
        lineColors: ['#1d9798', '#bee0e1']
});

</script>
@endsection
