@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style media="screen">
    .select2.select2-container.select2-container--default{
        width:230px !important;
    }
    #select2-select-especie-container,#select2-select-comunidad-container {
        height:35px;
    }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
@endsection

@section('content')
    {{-- <h3>Comparar Proyectos</h3> --}}
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Comparar Proyectos
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
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h6>Selecciona Proyectos</h6>
                            <select class="form-control kt-select2 kt-selectpicker" multiple id="select-proyectos">
                                @foreach ($proyectos as $proyecto)
                                    <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
                                @endforeach
                            </select>
                            <button id="comparar" type="button" class="btn btn-success" name="button">Generar</button>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: initial;">
                    <div class="col-md-6">
                        <canvas id="radar-chart" width="400" height="200"></canvas>
                    </div>
                    <div class="col-md-6">
                        <canvas id="scatter-chart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js" integrity="sha512-0qNBDZgOKlY8fVi38IMT+vFkFbRdh4jJehDR31fn3a61Vp8DoC1XSERCIW/AgVs+0xjRIuarbBBmt78v1btb3A==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/0.5.7/chartjs-plugin-annotation.js"></script>
    <script src="https://cdn.rawgit.com/chartjs/Chart.js/master/samples/utils.js"></script>
    <script>
    var myRadarChart = new Chart(document.getElementById('radar-chart'), {
        type: 'radar',
        data: {
            labels: ['Dimensión Socioeconómica ', 'Pobreza', 'Percepción bienestar', 'Infraestructura comunitaria', 'Diversidad ocupacional', 'Movilidad ocupacional', 'Cambios económicos', 'Percepción de cambio en el bienestar', 'Dimensión Socioecológica ', 'Dependencia del uso de recursos naturales  ', 'Habilidad para anticiparse a disturbios ', 'Comprensión del entorno natural', 'Comprensión del recurso objeto del AC', 'Cambios en la percepción de conservar', 'Dimensión Institucional ', 'Capital social', 'Acción colectiva ', 'Toma de decisiones', 'Cambios en el capital social', 'Conocimiento general del AC', 'Control social del AC', 'Percepción del desempeño de los actores del AC', 'Aceptación del AC', 'Nivel de satisfacción del AC'],
            datasets: [{
                label: ['IMAC'],
                data: [],
            }]
        }
    });
    var scatterChart = new Chart(document.getElementById('scatter-chart'), {
        type: 'bubble',
        data: {
            datasets: [{
                label: 'Pobreza',
                backgroundColor:"#bee0e1cc",
                borderColor:"#1d9798cc",
                data: []
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    type: 'linear',
                    position: 'bottom'
                }]
            },
            annotation: {
                annotations: [
                    {
                        drawTime: "afterDatasetsDraw",
                        id: "hline",
                        type: "line",
                        mode: "horizontal",
                        scaleID: "y-axis-0",
                        value: {{ $configuraciones->find(1)->valor}},
                        borderColor: "black",
                        borderWidth: 2,
                        label: {
                            backgroundColor: "red",
                            content: "{{ $configuraciones->find(1)->nombre." - $".$configuraciones->find(1)->valor}}",
                            enabled: true
                        }
                    },
                    {
                        drawTime: "afterDatasetsDraw",
                        id: "hline2",
                        type: "line",
                        mode: "horizontal",
                        scaleID: "y-axis-0",
                        value: {{ $configuraciones->find(2)->valor}},
                        borderColor: "black",
                        borderWidth: 2,
                        label: {
                            backgroundColor: "red",
                            content: "{{ $configuraciones->find(2)->nombre." - $".$configuraciones->find(2)->valor}}",
                            enabled: true
                        }
                    }
                ]
            }
        }
    });

    $( "#comparar" ).click(function() {
        $.ajax({
            method: "GET",
            url: "/proyectos/compararProyectos",
            data:{ proyectos: $('#select-proyectos').val() },
            dataType: "json"
            }).done(function( data ) {
                console.log(data);
                myRadarChart.data.datasets = data.imac;
                myRadarChart.update();

                scatterChart.data.datasets = data.scatter;
                scatterChart.update();
        });
    });
</script>
@endsection
