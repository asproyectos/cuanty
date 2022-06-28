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
                            Creación de Equipo
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
                <form id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('equipos.store') }}" role="form" enctype='multipart/form-data'>
                    @csrf
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Datos del Equipo</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-2">
                            <div class="form-group ">
                                <h5>Sistema</h5>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <select class="form-control" name="grupo_pregunta_id" required>
                                        <option selected disabled value="">Escoja una opción</option>
                                        @foreach ($grupoPreguntas as $gp)
                                            <option value="{{ $gp->id }}">{{ $gp->nombre }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                    <span><i class="la la-user"></i></span>
                                </span> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body" style="flex-direction: inherit;">
                    <div class="col-md-2">
                        <div class="form-group ">
                            <h5>Nombre</h5>
                            <div class="kt-input-icon kt-input-icon--right">
                                <input type="text" class="form-control" name="descripcion" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h5>dispositivo</h5>
                            <div class="kt-input-icon kt-input-icon--right">
                                <input type="text" class="form-control" name="dispositivo" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h5>Unidad</h5>
                            <div class="kt-input-icon kt-input-icon--right">
                                <input type="text" class="form-control" name="unidad" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <h5>Tipo de equipo</h5>
                            <div class="kt-input-icon kt-input-icon--right">
                                <select id="tipo_equipo" class="form-control" name="tipo_pregunta_id" required>
                                    <option selected disabled value="">Escoja una opción</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                                {{-- <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                <span><i class="la la-user"></i></span>
                            </span> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body" style="flex-direction: inherit;">
                <div class="col-md-4">
                    <h4>Generar alarma cuando (Númerico):</h4>
                    <div class="alarma-numerica form-group ">
                        {{-- <h5>Nombre</h5> --}}
                        <div class="input-group">
                            {{-- <input id="nombre_opcion" type="text" class="form-control"> --}}
                            <select class="form-control" id="select-alarmas">
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
                            <input class="form-control" type="number" step="any" name="" value="">
                            <div class="input-group-append">
                                <button id="nueva_alarma" class="btn btn-success" type="button"><i style="color:white" class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <ul class="alarma-numerica sortables" id="sortable-alarmas">
                    </ul>
                    <div class="alarma-selector form-group ">
                        {{-- <h5>Nombre</h5> --}}
                        <div class="input-group">
                            {{-- <input id="nombre_opcion" type="text" class="form-control"> --}}
                            <select class="form-control" id="select-alarmas">
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
                            <select class="form-control" id="select-alarmas">
                                <option value="1">Opción 1</option>
                                <option value="2">Opción 2</option>
                                <option value="3">Opción 3</option>
                            </select>
                            <div class="input-group-append">
                                <button id="nueva_alarma" class="btn btn-success" type="button"><i style="color:white" class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <ul class="alarma-selector sortables" id="sortable-alarmas">
                    </ul>
                </div>
                <div class="offset-md-2 col-md-4 opciones" style="{{ old('tipo_pregunta_id') == 1 ? 'display:block;' : 'display:none' }}">
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
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-primary">Enviar</button>
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
        if ( this.value == 1) {
            $('.opciones').show(500);
        } else {
            $('.opciones').hide(500);
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
        $("#sortable").append(' <li id="opcion'+valor+'" class="ui-state-default"> <i style="color:#ef9d00;padding-right: 15px;" class="fas fa-arrows-alt-v"></i> <div class="input-group"> <input type="text" name="opciones[]" value="'+nombre+'" class="form-control"> <div class="lista-opciones input-group-append"> <button onclick="eliminarOpcion('+valor+')" class="btn btn-danger" type="button"> <i style="color:white" class="fas fa-times"></i> </button> </div> </div> </li>');
    });
    var valorAlarma = 0;
    $( "#nueva_alarma" ).click(function() {
        var txt = $("#select-alarmas option:selected").text();
        var val = $("#select-alarmas option:selected").val();
        valorAlarma++;
        $("#sortable-alarmas").append(' <li id="alarma'+valorAlarma+'" class="ui-state-default"> <i style="color:#ef9d00;padding-right: 15px;" class="fas fa-arrows-alt-v"></i> <div class="input-group"> <input type="text" disabled value="'+ txt +'" class="form-control"><input type="hidden" name="alarmas-numerico[]"  value="'+ val +'"> <div class="lista-opciones input-group-append"> <button onclick="eliminarAlarma('+valorAlarma+')" class="btn btn-danger" type="button"> <i style="color:white" class="fas fa-times"></i> </button> </div> </div> </li>');
    });

    $( function() {
        $( ".sortables" ).sortable();
        $( ".sortables" ).disableSelection();
    } );
    </script>
@endsection
