@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/pages/alto-sentido/jquery.fancybox.min.css') }}" rel="stylesheet" type="text/css" />
    <style media="screen">
        #select2-select-especie-container,#select2-select-comunidad-container {
            height:35px;
        }
    </style>
@endsection

@section('content')
    <h3>Aves</h3>
    <div class="row">
        <div class="col-xl-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Registro monitoreo de aves
                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('registros.store') }}" role="form" enctype='multipart/form-data'>
                    @csrf
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Datos del registro</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Fecha de registro</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" id="fecha" class="form-control" name="fecha" required>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-calendar"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Hora de inicio</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" id="hora_inicio" class="form-control" name="hora_inicio" required>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-clock-o"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Hora final</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" id="hora_final" class="form-control" name="hora_final" required>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-clock-o"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Hora marea alta</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" id="hora_marea_alta" class="form-control" name="hora_marea_alta" required>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-clock-o"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Unidad gestión de Cuenca</label>
                                {{-- <div class="col-lg-12 col-md-12 col-sm-12"> --}}
                                    <select class="form-control kt-select2" id="select-comunidad" name="comunidad_id" required>
                                        <option></option>
                                    </select>
                                {{-- </div> --}}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Cuenca</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" placeholder="" id="cuenca" disabled>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-map"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Comunidad</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" placeholder="" id="comunidad" disabled>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-map"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label>Número del sitio</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="number" class="form-control" placeholder="" name="numero_sitio" required>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-list-ol"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Latitud</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" placeholder="" name="latitud" required>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-map-pin"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Longitud</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" placeholder="" name="longitud" required>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-map-pin"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label>Nombre del observador</label>
                                @if (Auth::user()->rol_id != 1)
                                    <p>{{Auth::user()->rol->nombre}}</p>
                                @else
                                    <div class="kt-input-icon kt-input-icon--right">
                                        <select class="form-control" name="observador_id"  required>
                                            <option selected disabled value="">Escoja una opción</option>
                                            @foreach ($usuarios as $usuario)
                                                <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                            <span><i class="la la-user"></i></span>
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Datos del ave</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Código</label>
                                <select class="form-control kt-select2" id="select-especie" name="especie_id" required>
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Orden</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" placeholder="" name="orden" id="orden" disabled>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-map"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Familia</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" placeholder="" name="familia" id="familia" disabled>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-map"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Especie</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" placeholder="" name="especie" id="especie" disabled>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-map"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Nombre en español</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" placeholder="" name="nombre_castellano" id="nombre_castellano" disabled>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-barcode"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Nombre en inglés</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" placeholder="" name="nombre_en_ingles" id="nombre_en_ingles" disabled>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-map"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Altura mínima</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" placeholder="" name="altura_minima" id="altura_minima" disabled>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-sort-numeric-asc"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Altura máxima</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" placeholder="" name="altura_maxima" id="altura_maxima" disabled>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-sort-numeric-desc"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Amenaza nacional(Libros rojos)</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" placeholder="" name="amenaza_nacional_libros_rojos" id="amenaza_nacional_libros_rojos" disabled>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-map"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Amenaza global(IUCN)</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" placeholder="" name="amenaza_global_iucn" id="amenaza_global_iucn" disabled>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-map"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Cantidad cria</label>
                                <input type="number" min="0" value="0" class="form-control" placeholder="" name="cantidad_cria" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Cantidad juvenil</label>
                                <input type="number"  min="0" value="0" class="form-control" placeholder="" name="cantidad_juvenil" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Cantidad adulto</label>
                                <input type="number"  min="0" value="0" class="form-control" placeholder="" name="cantidad_adulto" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Cantidad sin definir</label>
                                <input type="number"  min="0" value="0" class="form-control" placeholder="" name="cantidad" required>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        {{-- <div class="col-md-4">
                            <div class="form-group ">
                                <label>Categoria de edad</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <select class="form-control" name="categoria_edad_id" required>
                                        <option selected disabled value="">Escoja una opción</option>
                                        @foreach ($edades as $edad)
                                            <option value="{{ $edad->id }}">{{ $edad->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-map"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Tipo de hábitat</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <select class="form-control" name="tipo_habitat_id" required>
                                        <option selected disabled value="">Escoja una opción</option>
                                        @foreach ($tiposHabitat as $tipoHabitat)
                                            <option value="{{ $tipoHabitat->id }}">{{ $tipoHabitat->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-map"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Comentarios</label>
                                <textarea class="form-control" name="comentarios" id="exampleTextarea" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Especie identificada</label>
                                <div class="kt-checkbox-list">
                                    <label class="kt-checkbox">
                                        <input type="checkbox" name="especie_identificada"> Se pudo identificar la especie
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Registro fotográfico del ave</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-12">
                            <div class="form-group row" id="imagenes-ave">
                                <div class="col-lg-12 col-md-3 col-sm-12" id="imagenes-ave-mensaje">
                                    <p style="text-align:center;">Sin imágenes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Registro fotográfico a cargar</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="dropzone dropzone-default dropzone-brand" id="imagenes-registro">
                                        <div class="dropzone-msg dz-message needsclick">
                                            <h3 class="dropzone-msg-title">Arrastra archivos, o haz click, para cargarlos.</h3>
                                            <span class="dropzone-msg-desc">Sólo imágenes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-timepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/alto-sentido/jquery.fancybox.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
$('#hora_inicio, #hora_final, #hora_marea_alta').timepicker({
    minuteStep: 1,
});
$('#fecha').datepicker({
    format: 'yyyy-mm-dd',
    todayHighlight: true,
    language: 'es'
});


// Dropzone.options.imagenesRegistro =
// {
// };
    $('#imagenes-registro').dropzone({
        url: '{{ route('imagen-registros.store') }}',
        maxFilesize: 10,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function(file)
        {
        var name = file.upload.filename;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
            },
            type: 'POST',
            url: '{{ route("imagen-registros.delete") }}',
            data: {filename: name},
            success: function (data){
                console.log(data);
                console.log("File has been successfully removed!!");
                $('form').find('input[data-nombre="' + data + '"]').remove()
            },
            error: function(e) {
                console.log(e);
            }});
            var fileRef;
            return (fileRef = file.previewElement) != null ?
            fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
        success: function(file, response)
        {
            $('form#registro').append('<input type="hidden" data-nombre="' + response.data.nombre +'" name="imagenes[]" value="' + response.data.id + '">');
            console.log(response);
        },
        error: function(file, response)
        {
            return false;
        },
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
        }
    });

    $('#select-especie').select2({
        language: "es",
        minimumInputLength: 2,
        templateResult: formatEspecie,
        templateSelection: formatEspecieSelection,
        ajax: {
            url: '{{ route('especies.buscar') }}',
            delay: 250,
            dataType: 'json',
            placeholder: "Busca un ave",
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    $('#select-especie').on('select2:select', function (e) {
        var urlImagenes = "{{ asset('imagenes_especies') }}/";
        $("#imagenes-ave").empty();
        var data = e.params.data;
        $('#orden').val(data.orden);
        $('#familia').val(data.familia);
        $('#especie').val(data.especie);
        $('#nombre_castellano').val(data.nombre_castellano);
        $('#nombre_en_ingles').val(data.nombre_ingles);
        $('#altura_minima').val(data.altura_minima);
        $('#altura_maxima').val(data.altura_maxima);
        $('#amenaza_nacional_libros_rojos').val(data.amenaza_nacional);
        $('#amenaza_global_iucn').val(data.amenaza_global);
        if (data.imagenes.length === 0) {
            $( "#imagenes-ave" ).append(
            `<div class="col-lg-12 col-md-3 col-sm-12" id="imagenes-ave-mensaje">
                <p style="text-align:center;">Sin imágenes</p>
            </div>`);
        } else {
            for (item in data.imagenes) {
                $( "#imagenes-ave" ).append(
                    `<div class="col-lg-3 col-md-3 col-sm-3">
                    <a data-fancybox="gallery" href="` + urlImagenes + data.imagenes[item].nombre + `">
                    <img class="img-fluid" src="` + urlImagenes + data.imagenes[item].nombre + `">
                    </a>
                    </div>`
                );
            }
        }
    });
    function formatEspecie (repo) {
        return repo.text;
    }
    function formatEspecieSelection (repo) {
        return repo.codigo;
    }
    $('#select-comunidad').select2({
        language: "es",
        minimumInputLength: 2,
        templateResult: formatComunidad,
        templateSelection: formatComunidadSelection,
        ajax: {
            url: '{{ route('comunidades.buscar') }}',
            delay: 250,
            dataType: 'json',
            placeholder: "Busca un ave",
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    $('#select-comunidad').on('select2:select', function (e) {
        var data = e.params.data;
        $('#cuenca').val(data.cuenca);
        $('#comunidad').val(data.comunidad);
    });
    function formatComunidad (repo) {
        return repo.text;
    }
    function formatComunidadSelection (repo) {
        return repo.unidadGestionCuenca;
    }
    </script>
@endsection
