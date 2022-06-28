@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <!--begin:: Widgets/Quick Stats-->
            <div class="row row-full-height">
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-brand" style="height:150px;border-bottom: 3px solid #006518; background-repeat: no-repeat; background-position: right 5px top 5px; background-size: 75px; background-image:url('{{ asset('media/icons/aves.png') }}');">
                        <div class="kt-portlet__body kt-portlet__body--fluid">
                            <div class="kt-widget26">
                                <div class="kt-widget26__content">
                                    <span class="kt-widget26__number">{{$totalEspeciesCuencas}}</span>
                                    <span class="kt-widget26__desc">Total Especies en Cuencas</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-brand" style="height:150px;border-bottom: 3px solid #006518; background-repeat: no-repeat; background-position: right 5px top 5px; background-size: 75px; background-image:url('{{ asset('media/icons/aves_total.png') }}');">
                        <div class="kt-portlet__body kt-portlet__body--fluid">
                            <div class="kt-widget26">
                                <div class="kt-widget26__content">
                                    <span class="kt-widget26__number">{{$totalIndividuosCuencas}}</span>
                                    <span class="kt-widget26__desc">Total individuos en Cuencas</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-brand" style="height:150px;border-bottom: 3px solid #006518; background-repeat: no-repeat; background-position: right 5px top 5px; background-size: 75px; background-image:url('{{ asset('media/icons/aves_extinsion.png') }}');">
                        <div class="kt-portlet__body kt-portlet__body--fluid">
                            <div class="kt-widget26">
                                <div class="kt-widget26__content">
                                    <span class="kt-widget26__number">{{ $totalEspeciesPeligro }}</span>
                                    <span class="kt-widget26__desc">Total Especies en peligro de extinsión</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-brand" style="height:150px;border-bottom: 3px solid #006518; background-repeat: no-repeat; background-position: right 5px top 5px; background-size: 75px; background-image:url('{{ asset('media/icons/aves_total.png') }}');">
                        <div class="kt-portlet__body kt-portlet__body--fluid">
                            <div class="kt-widget26">
                                <div class="kt-widget26__content">
                                    <span class="kt-widget26__number">{{ $totalIndividuosPeligro }}</span>
                                    <span class="kt-widget26__desc">Total individuos en peligro de extinsión</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 col-lg-8 order-lg-3 order-xl-1">
            <!--begin:: Widgets/Sales States-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Especies por Cuencas
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-widget6">
                        <div class="kt-widget6__head">
                            <div class="kt-widget6__item">
                                {{-- <span>#</span> --}}
                                <span style="text-align:center;">Cuenca</span>
                                <span style="text-align:center;">Última fecha de registro</span>
                                <span style="text-align:center;">Total Especies</span>
                                <span></span>
                            </div>
                        </div>
                        <div class="kt-widget6__body">
                            @foreach ($fechas as $fecha)
                                <div class="kt-widget6__item">
                                    {{-- <span>
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                    <input type="checkbox">
                                    <span></span>
                                </label>
                            </span> --}}
                            <span><b>{{$fecha['nombre']}}</b><br>{{$fecha['ugc']}}</span>
                            <span style="text-align:center;">{{$fecha['ultimaFecha']}}</span>
                            <span class="kt-font-success kt-font-bold" style=" text-align: right; color:#006518 !important">{{$fecha['totalEspecies']}}</span>
                            <span><a href="{{ route('cuencas.show', $fecha['id']) }}" style="background-color:#bad320;border-color:#bad320;color:#444444;" type="button" class="btn btn-success btn-elevate btn-pill">Detalles</a></span>
                        </div>
                    @endforeach

                </div>
                {{-- <div class="kt-widget6__foot">
                <div class="kt-widget6__action kt-align-right">
                <a href="#" class="btn btn-label-brand btn-sm btn-bold">Export...</a>
            </div>
        </div> --}}
    </div>
</div>
</div>
<!--end:: Widgets/Sales States-->
</div>
</div>
<div class="row">
    <div class="col-lg-6">

        <!--begin:: Widgets/Activity-->
        <div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Monitoreo de aves por UGC
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-widget17">
                    <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #006518">
                        <div class="kt-widget17__chart" style="height:320px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas id="kt_chart_activities" width="345" height="216" class="chartjs-render-monitor" style="display: block; width: 345px; height: 216px;"></canvas>
                    </div>
                </div>
                <div class="kt-widget17__stats">
                    @foreach ($ugcsTotal as $ugcs)
                        <div class="kt-widget17__items">
                            @foreach ($ugcs as $ugc)
                                <div class="kt-widget17__item">
                                    <span class="" style="color: #006518; font-size: 25px; font-weight: 600;">
                                        {{ $ugc['cantidad']}}
                                    </span>
                                    <span class="kt-widget17__subtitle">
                                        {{ $ugc['nombre']}}
                                    </span>
                                    <span class="kt-widget17__desc">
                                        {{ $ugc['ultimaFecha'] }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!--end:: Widgets/Activity-->
</div>
<div class="col-xl-6">

    <!--begin:: Widgets/User Progress -->
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Especies en vía de extinción (Amenaza nacional:NT, EN, CR)
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="tab-content">
                <div class="tab-pane active" id="kt_widget31_tab1_content">
                    <div class="kt-widget31">
                        @forelse ($listadoEspeciesExtinsion as $especie)
                            <div class="kt-widget31__item">
                                <div class="kt-widget31__content">
                                    <div class="kt-widget31__pic">
                                        <img src="{{ $especie->imagen ? asset('imagenes_especies/'.$especie->imagen) : asset('media/icons/aves.png') }}" alt="">
                                    </div>
                                    <div class="kt-widget31__info">
                                        <a href="{{route('especies.show',$especie->especie_id)}}" class="kt-widget31__username">
                                            {{$especie->nombre_castellano}}
                                        </a>
                                        <p class="kt-widget31__text">
                                            {{$especie->nombre}}
                                        </p>
                                    </div>
                                </div>
                                <div class="kt-widget31__content">
                                    <div class="kt-widget31__progress">
                                        <div class="kt-widget31__stats">
                                            <span><b>{{$especie->value}}</b> individuos total</span>
                                        </div>
                                        {{-- <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> --}}
                                </div>
                                <a href="{{route('especies.show',$especie->especie_id)}}" style="background-color: #ffffff;border-color: #c5c5c5;color:#444444;" type="button" class="btn btn-success btn-elevate btn-pill">Detalles</a>
                            </div>
                        </div>
                        {{-- <div class="kt-widget31__item">
                        <div class="kt-widget31__content">
                        <div class="kt-widget31__pic">
                        <img src="{{ asset('imagenes_especies/patoreal.jpg') }}" alt="">
                    </div>
                    <div class="kt-widget31__info">
                    <a href="{{route('especies.show',5)}}" class="kt-widget31__username">
                    Pato real
                </a>
                <p class="kt-widget31__text">
                LA ESTRELLA
            </p>
        </div>
    </div>
    <div class="kt-widget31__content">
    <div class="kt-widget31__progress">
    <div class="kt-widget31__stats">
    <span>50%</span>
    <span>Población</span>
</div>
<div class="progress progress-sm">
<div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
<a href="{{route('especies.show',5)}}" style="background-color: #ffffff;border-color: #c5c5c5;color:#444444;" type="button" class="btn btn-success btn-elevate btn-pill">Detalles</a>
</div>
</div> --}}
@empty
    <h5 style="text-align:center">Sin datos a mostrar</h5>
@endforelse
</div>
</div>
</div>
</div>
</div>

<!--end:: Widgets/User Progress -->
</div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="kt-portlet kt-portlet--tab">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon kt-hidden">
                        <i class="la la-gear"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Cantidades por mes
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div id="kt_morris_1" style="height:300px;"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">

        <!--begin::Portlet-->
        <div class="kt-portlet kt-portlet--tab">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon kt-hidden">
                        <i class="la la-gear"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Cantidad total por tipo de hábitat
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div id="kt_morris_4" style="height:300px;"></div>
            </div>
        </div>

        <!--end::Portlet-->
    </div>
    <div class="col-lg-4">

        <!--begin::Portlet-->
        <div class="kt-portlet kt-portlet--tab">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon kt-hidden">
                        <i class="la la-gear"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Cantidad total por especie
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div id="kt_morris_5" style="height:300px;"></div>
            </div>
        </div>

        <!--end::Portlet-->
    </div>
</div>
@endsection


@section('scripts')
    {{-- <script src="{{ asset('js/pages/dashboard.js') }}" type="text/javascript"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script type="text/javascript">
    Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'kt_morris_1',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: {!!json_encode($especiesMesDatos)!!},
    // The name of the data record attribute that contains x-values.
    xkey: 'y',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['a'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Total individuos'],
    lineColors: ['#006518', '#161238']
});
Morris.Donut({
    element: 'kt_morris_4',
    data: {!!$tiposHabitat!!},
    colors: ['#006518', '#161238']
});
Morris.Donut({
    element: 'kt_morris_5',
    data: {!!$tiposEspecie!!},
});
var activitiesChart = function() {
    if ($('#kt_chart_activities').length == 0) {
        return;
    }

    var ctx = document.getElementById("kt_chart_activities").getContext("2d");

    var gradient = ctx.createLinearGradient(0, 0, 0, 240);
    gradient.addColorStop(0, Chart.helpers.color('#e14c86').alpha(1).rgbString());
    gradient.addColorStop(1, Chart.helpers.color('#e14c86').alpha(0.3).rgbString());

    var config = {
        type: 'line',
        data: {
            labels: {!!json_encode($registrosMesFecha)!!},
            datasets: [{
                label: "Registros",
                backgroundColor: Chart.helpers.color('#0d6c1a').alpha(1).rgbString(),  //gradient
                borderColor: '#bad320',

                pointBackgroundColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                pointBorderColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                pointHoverBackgroundColor: '#ffffff',
                pointHoverBorderColor: Chart.helpers.color('#ffffff').alpha(0.1).rgbString(),

                //fill: 'start',
                data: {{json_encode($registrosMesDatos)}}
            }]
        },
        options: {
            title: {
                display: false,
            },
            tooltips: {
                mode: 'nearest',
                intersect: false,
                position: 'nearest',
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10
            },
            legend: {
                display: false
            },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    display: false,
                    gridLines: false,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: false,
                    gridLines: false,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    },
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            elements: {
                line: {
                    tension: 0.0000001
                },
                point: {
                    radius: 4,
                    borderWidth: 12
                }
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 10,
                    bottom: 0
                }
            }
        }
    };

    var chart = new Chart(ctx, config);
}
activitiesChart();
</script>

{{-- <script src="{{ asset('js/pages/components/charts/morris-charts.js') }}" type="text/javascript"></script> --}}
@endsection
