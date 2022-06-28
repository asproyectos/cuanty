@extends('layouts.app')

@section('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style media="screen">
        .select2.select2-container.select2-container--default{
            width:230px !important;
        }
        #select2-select-especie-container,#select2-select-comunidad-container {
            height:35px;
        }
    </style>
@endsection

@section('content')
    <h3>Detalles del Proyecto</h3>
    <div class="row">
        <div class="col-xl-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Información general
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
                <form id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('proyectos.store') }}" role="form" enctype='multipart/form-data'>
                    @csrf
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Nombre del proyecto</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" id="nombre_proyecto" class="form-control" name="nombre_proyecto" required>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-calendar"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Temáticas (Formularios)</label>

                                <div class="kt-checkbox-inline">
                                    @foreach ($formularios as $formulario)
                                        <label class="kt-checkbox kt-checkbox--solid kt-checkbox--brand">
                                            <input type="checkbox" name="formularios[{{$formulario->id}}]"> {{ $formulario->nombre }}
                                            <span></span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Fecha del proyecto</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" id="fecha_proyecto" class="form-control fechas-plugin" name="fecha_proyecto" required>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-calendar"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Fecha de inicio de las encuestas</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" id="fecha_inicio" class="form-control fechas-plugin" name="fecha_inicio" required>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-calendar"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Fecha final de las encuestas</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" id="fecha_inicio" class="form-control fechas-plugin" name="fecha_fin" required>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-calendar"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Número de hogares</label>
                                <input type="number" id="numero_hogares" class="form-control" name="numero_hogares" required>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Descripción del Proyecto</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Consentimiento informado</label>
                                <input id="consentimiento_informado" name="consentimiento_informado" type="hidden">
                                <div id="editor">
                                    <p>Escriba aquí del <strong>consentimiento informado</strong> para este proyecto.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-12"><h5>Contexto geográfico</h5></div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>País</label>
                                <select class="form-control kt-select2" id="select-pais" name="pais_id">
                                    @foreach ($paises as $pais)
                                        <option value="{{ $pais->id}}">{{$pais->codigo}} - {{$pais->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Región</label>
                                <select class="form-control kt-select2" id="select-region" name="region_id">
                                    @foreach ($regiones as $region)
                                        <option value="{{ $region->id}}">{{$region->codigo}} - {{$region->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Subregión</label>
                                <select class="form-control kt-select2" id="select-subregion" name="subregion_id" required>
                                    @foreach ($subregiones as $subregion)
                                        <option value="{{ $subregion->id}}">{{$subregion->codigo}} - {{$subregion->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Comunidad</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" id="nombre_comunidad" class="form-control" name="nombre_comunidad" required>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-map-marker"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-12"><h5>Lider de Comunidad</h5></div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Identificación</label>
                                <input type="text" id="id_lider" class="form-control" name="id_lider" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group ">
                                <label>Nombre</label>
                                <input type="text" id="nombre_lider" class="form-control" name="nombre_lider" required>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-primary">Guardar</button>
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
<script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-timepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/alto-sentido/jquery.fancybox.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
{{-- <script src="{{ asset('js/pages/crud/forms/editors/quill.js') }}" type="text/javascript"></script> --}}
<script type="text/javascript">
$('#hora_inicio, #hora_final, #hora_marea_alta').timepicker({
    minuteStep: 1,
});
$('.fechas-plugin').datepicker({
    format: 'yyyy-mm-dd',
    todayHighlight: true,
    language: 'es'
});

var quill = new Quill('#editor', {
    theme: 'snow'
  });

var form = document.querySelector('form');
form.onsubmit = function() {
    var about = document.querySelector('input[name=consentimiento_informado]');
    about.value = JSON.stringify(quill.getContents());
};

$('.ql-editor').bind('DOMSubtreeModified', function(){
    $('#consentimiento_informado').val($('.ql-editor').html());
});
</script>

<script type="text/javascript">
$('#select-pais').on('change', function() {
    $.ajax({
        url: '/paises/regiones',
        type: 'get',
        data: 'pais='+this.value,
        dataType: 'json',
        success: function(r){
            console.log('algo');
            $('#select-region').empty().append('<option disabled selected>Seleccione una región</option>');
            $('#select-subregion').empty().append('<option disabled selected>Seleccione una subregión</option>');
            for(var k in r) {
                var option = $('<option></option>').attr("value", r[k]['id']).text(r[k]['codigo']+' - '+r[k]['nombre']);
                $("#select-region").append(option);
            }
        }
    }).fail(function( msg ) {
        console.log('error'+msg);
    });
});
$('#select-region').on('change', function() {
    $.ajax({
        url: '/regiones/subregiones',
        type: 'get',
        data: 'region='+this.value,
        dataType: 'json',
        success: function(r){
            console.log('algo');
            $('#select-subregion').empty().append('<option disabled selected>Seleccione una subregión</option>');
            for(var k in r) {
                var option = $('<option></option>').attr("value", r[k]['id']).text(r[k]['codigo']+' - '+r[k]['nombre']);
                $("#select-subregion").append(option);
            }
        }
    }).fail(function( msg ) {
        console.log('error'+msg);
    });
});
</script>


@endsection
