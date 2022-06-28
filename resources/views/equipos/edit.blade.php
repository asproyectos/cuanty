@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style media="screen">
    .sortables { list-style-type: none; margin: 0; padding: 0; }
    .sortables li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 0.9em; font-size: 1.4em; }
    .sortables li span { position: absolute; margin-left: -1.3em; }
    </style>
@endsection

@section('content')
    <h3>Planta</h3>
    <div class="row">
        <div class="col-xl-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Editar Equipo
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

                <!--begin::Form-->
                <form id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('equipos.update', $pregunta->id) }}" role="form" enctype='multipart/form-data'>
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Datos del Equipo</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-2">
                            <div class="form-group ">
                                <h5>Sistema</h5>
                                {{$pregunta->grupoPregunta->nombre}}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group ">
                            <h5>Nombre</h5>
                            <div class="kt-input-icon kt-input-icon--right">
                                <input type="text" class="form-control" name="descripcion" value="{{$pregunta->descripcion}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h5>Estado</h5>
                            <div class="kt-input-icon kt-input-icon--right">
                                <label class="kt-checkbox kt-checkbox--success">
                                    <input name="activa" type="checkbox" {{ $pregunta->activa ? 'checked' : ''}} > Activa
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: inherit;">
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h5>dispositivo</h5>
                            <div class="kt-input-icon kt-input-icon--right">
                                <input type="text" class="form-control" name="dispositivo" value="{{$pregunta->dispositivo}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h5>Unidad</h5>
                            <div class="kt-input-icon kt-input-icon--right">
                                <input type="text" class="form-control" name="unidad" value="{{$pregunta->unidad}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h5>Normal</h5>
                            <div class="kt-input-icon kt-input-icon--right">
                                <input type="text" class="form-control" name="normal" value="{{$pregunta->normal}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h5>Tipo de equipo</h5>
                            <p>{{$pregunta->tipoPregunta->nombre}}</p>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: inherit;">
                    <div class="col-md-4">
                        <h4>Generar alarma cuando:</h4>
                        @if ($pregunta->tipo_pregunta_id == 3)
                            <div class="alarma-numerica form-group ">
                                {{-- <h5>Nombre</h5> --}}
                                <div class="input-group">
                                    {{-- <input id="nombre_opcion" type="text" class="form-control"> --}}
                                    <select class="form-control" id="select-alarma-numerico">
                                        <option value="1">Igual que</option>
                                        <option value="2">Mayor que</option>
                                        <option value="3">Mayor/Igual que</option>
                                        <option value="4">Menor que</option>
                                        <option value="5">Menor/Igual que</option>
                                        <option value="6">Y Mayor que</option>
                                        <option value="7">Y Mayor/Igual que</option>
                                        <option value="8">Y Menor que</option>
                                        <option value="9">Y Menor/Igual que</option>
                                        <option value="10">O Mayor que</option>
                                        <option value="11">O Mayor/Igual que</option>
                                        <option value="12">O Menor que</option>
                                        <option value="13">O Menor/Igual que</option>
                                    </select>
                                    <input id="valor-numerico" class="form-control" type="number" step="any" name="" value="">
                                    <div class="input-group-append">
                                        <button id="nueva_alarma" class="btn btn-success" type="button"><i style="color:white" class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <ul class="alarma-numerica sortables" id="sortable-alarmas">
                                @foreach ($pregunta->alarmas as $key => $alarma)
                                    <li id="alarma{{$key}}" class="ui-state-default">
                                        <i style="color:#ef9d00;padding-right: 15px;" class="fas fa-arrows-alt-v"></i>
                                        <div class="input-group">
                                            <input type="text" disabled="" value="{{ $alarma->tipoAlarma->descripcion}} {{ $alarma->valor}}" class="form-control">
                                            <input type="hidden" name="alarma-numerico[{{$alarma->tipo_alarma_id}}]" value="{{ $alarma->valor}}">
                                            <div class="lista-opciones input-group-append">
                                                <button onclick="eliminarAlarma({{$key}})" class="btn btn-danger" type="button">
                                                    <i style="color:white" class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="alarma-selector form-group ">
                                {{-- <h5>Nombre</h5> --}}
                                <div class="input-group">
                                    {{-- <input id="nombre_opcion" type="text" class="form-control"> --}}
                                    <select class="form-control" id="select-alarma-selector">
                                        <option value="14">Igual a</option>
                                        <option value="15">Diferente a</option>

                                    </select>
                                    <input id="valor-selector" class="form-control" type="text" name="" value="">
                                    <div class="input-group-append">
                                        <button id="nueva_alarma_selector" class="btn btn-success" type="button"><i style="color:white" class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <ul class="alarma-selector sortables" id="sortable-alarmas-selector">
                                @foreach ($pregunta->alarmas as $key => $alarma)
                                    <li id="alarma{{$key}}" class="ui-state-default">
                                        <i style="color:#ef9d00;padding-right: 15px;" class="fas fa-arrows-alt-v"></i>
                                        <div class="input-group">
                                            <input type="text" disabled="" value="{{ $alarma->tipoAlarma->descripcion}} {{ $alarma->opcion->nombre}}" class="form-control">
                                            <input type="hidden" name="alarma-selector[15]" value="ON">
                                            <div class="lista-opciones input-group-append">
                                                <button onclick="eliminarAlarma({{$key}})" class="btn btn-danger" type="button">
                                                    <i style="color:white" class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    @if ($pregunta->tipo_pregunta_id == 1)
                        <div class="offset-md-2 col-md-4 opciones">
                            <h4>Opciones</h4>
                            <div class="form-group ">
                                <h5>Nombre</h5>
                                <div class="input-group">
                                    <input id="nombre_opcion" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <button id="nueva_opcion" class="btn btn-success" type="button"><i style="color:white" class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <ul class="sortables" id="sortable">
                                @foreach ($pregunta->opciones->sortBy('orden') as $keyOpcion => $opcion)
                                    <li id="opcion1" class="ui-state-default">
                                        <i style="color:#ef9d00;padding-right: 15px;" class="fas fa-arrows-alt-v"></i>
                                        {{-- <div class="input-group">
                                            <input type="text" name="opciones[]" value="{{$opcion->nombre}}" class="form-control">
                                            <div class="lista-opciones input-group-append">
                                                <button onclick="eliminarOpcion({{$keyOpcion}})" class="btn btn-danger" type="button">
                                                    <i style="color:white" class="fas fa-times"></i>
                                                </button>
                                            </div>

                                        </div> --}}
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <div class="kt-input-icon kt-input-icon--right">
                                                    <label class="kt-checkbox kt-checkbox--success">
                                                        <input name="opciones[id:{{$opcion->id}}]" type="checkbox" {{ $opcion->activa ? 'checked' : ''}} >
                                                        <span style="top: -9px; left: 9px; "></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <input disabled  type="text" class="form-control" value="{{$opcion->nombre}}">
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button style="background-color: #ef9f0c; border-color: #ef9f0c;" type="submit" class="btn btn-primary">Enviar</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Portlet-->
    </div>
</div>
@endsection


@section('scripts')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>

    $("#tipo_equipo").change(function() {
        if (this.value == 1) {
            $('.opciones').show(500);
            $('.alarma-selector').show(500);
            $('.alarma-numerica').hide(500);
            //  block of code to be executed if condition1 is true
        } else if (this.value == 3) {
            $('.opciones').hide(500);
            $('.alarma-numerica').show(500);
            $('.alarma-selector').hide(500);
        } else {
        }
    });

    function eliminarOpcion(val) {
        console.log(val);
        $("#opcion"+val).remove();
    }

    function eliminarAlarma(val) {
        console.log(val);
        $("#alarma"+val).remove();
    }

    var valor = 0;
    $( "#nueva_opcion" ).click(function() {
        $( "#nombre_opcion" ).focus();
        var nombre = $( "#nombre_opcion" ).val();
        $( "#nombre_opcion" ).val('');
        valor++;
        $("#sortable").append(' <li id="opcion'+valor+'" class="ui-state-default"> <i style="color:#ef9d00;padding-right: 15px;" class="fas fa-arrows-alt-v"></i> <div class="input-group"> <input type="text" name="opciones[nueva:'+valor+']" value="'+nombre+'" class="form-control"> <div class="lista-opciones input-group-append"> <button onclick="eliminarOpcion('+valor+')" class="btn btn-danger" type="button"> <i style="color:white" class="fas fa-times"></i> </button> </div> </div> </li>');
    });

    var valorAlarma = {{ isset($key) ? $key : 0}};
    $( "#nueva_alarma" ).click(function() {
        var txt = $("#select-alarma-numerico option:selected").text();
        var val = $("#select-alarma-numerico option:selected").val();
        var num = $("#valor-numerico").val();
        $( "#valor-numerico" ).focus();
        $( "#valor-numerico" ).val('');
        valorAlarma++;
        $("#sortable-alarmas").append(' <li id="alarma'+valorAlarma+'" class="ui-state-default"> <i style="color:#ef9d00;padding-right: 15px;" class="fas fa-arrows-alt-v"></i> <div class="input-group"> <input type="text" disabled value="'+ txt + ' ' + num +'" class="form-control"><input type="hidden" name="alarma-numerico['+val+']"  value="'+ num +'"> <div class="lista-opciones input-group-append"> <button onclick="eliminarAlarma('+valorAlarma+')" class="btn btn-danger" type="button"> <i style="color:white" class="fas fa-times"></i> </button> </div> </div> </li>');
    });

    var valorAlarmaSelector = {{ isset($key) ? $key : 0}};
    $( "#nueva_alarma_selector" ).click(function() {
        var txt = $("#select-alarma-selector option:selected").text();
        var val = $("#select-alarma-selector option:selected").val();
        var num = $("#valor-selector").val();
        $( "#valor-selector" ).focus();
        $( "#valor-selector" ).val('');
        valorAlarmaSelector++;
        $("#sortable-alarmas-selector").append(' <li id="alarma'+valorAlarmaSelector+'" class="ui-state-default"> <i style="color:#ef9d00;padding-right: 15px;" class="fas fa-arrows-alt-v"></i> <div class="input-group"> <input type="text" disabled value="'+ txt + ' ' + num +'" class="form-control"><input type="hidden" name="alarma-selector['+val+']"  value="'+ num +'"> <div class="lista-opciones input-group-append"> <button onclick="eliminarAlarma('+valorAlarmaSelector+')" class="btn btn-danger" type="button"> <i style="color:white" class="fas fa-times"></i> </button> </div> </div> </li>');
    });

    $( function() {
        $( ".sortables" ).sortable();
        $( ".sortables" ).disableSelection();
    } );
    </script>
@endsection
