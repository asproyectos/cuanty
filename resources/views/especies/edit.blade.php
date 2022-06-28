@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/pages/alto-sentido/jquery.fancybox.min.css') }}" rel="stylesheet" type="text/css" />
    <style media="screen">
        .dropzone .dz-preview .dz-image img {
            width: 120px;
        }
    </style>
@endsection

@section('content')
    <h3>Explorar Ave</h3>
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
                <form id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('especies.update',$especie->id) }}" role="form" enctype='multipart/form-data'>
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Datos del ave</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Código</label>
                                <input type="text" class="form-control" name="codigo" value="{{$especie->codigo}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Orden</label>
                                <select class="form-control" name="orden_id">
                                    @foreach ($orden as $ord)
                                        <option value="{{ $ord->id }}" {{ $ord->id == $especie->orden_id ? 'selected' : '' }}>{{ $ord->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Familia</label>
                                <select class="form-control" name="familia_id">
                                    @foreach ($familia as $fam)
                                        <option value="{{ $fam->id }}" {{ $fam->id == $especie->familia_id ? 'selected' : '' }}>{{ $fam->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Especie</label>
                                <input type="text" class="form-control" name="nombre" value="{{$especie->nombre}}">
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Nombre en español</label>
                                <input type="text" class="form-control" name="nombre_castellano" value="{{$especie->nombre_castellano}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Nombre en inglés</label>
                                <input type="text" class="form-control" name="nombre_ingles" value="{{$especie->nombre_ingles}}">
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Altura mínima</label>
                                <input type="number" class="form-control" name="altura_maxima" value="{{$especie->altura_minima}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Altura máxima</label>
                                <input type="number" class="form-control" name="altura_minima" value="{{$especie->altura_maxima}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Amenaza nacional(Libros rojos)</label>
                                <select class="form-control" name="amenaza_nacional_id">
                                    @foreach ($amenazaNacional as $an)
                                        <option value="{{ $an->id }}" {{ $an->id == $especie->amenaza_nacional_id ? 'selected' : '' }}>{{ $an->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Amenaza global(IUCN)</label>
                                <select class="form-control" name="amenaza_global_id">
                                    @foreach ($amenazaGlobal as $fam)
                                        <option value="{{ $fam->id }}" {{ $fam->id == $especie->amenaza_global_id ? 'selected' : '' }}>{{ $fam->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Registro fotográfico</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="dropzone dropzone-default dropzone-brand" id="imagenes-registro">
                                        <div class="dropzone-msg dz-message needsclick">
                                            <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                            <span class="dropzone-msg-desc">Upload up to 10 files</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <button type="reset" class="btn btn-secondary">Cancelar</button>
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
    <script type="text/javascript">
    // Dropzone.options.imagenesRegistro =
    // {
    // };
    $('#imagenes-registro').dropzone({
        init: function () {
            var myDropzone = this;

            @foreach ($especie->imagenesAve as $imagenEspecie)
                var mockFile = {
                    name: "{{$imagenEspecie->nombre}}",
                    // size: 12345,
                    type: 'image/jpg',
                    status: Dropzone.ADDED,
                    url: '{{ asset('imagenes_especies/') }}',
                    id: {{$imagenEspecie->id}}
                };
                myDropzone.emit("addedfile", mockFile);
                myDropzone.emit("thumbnail", mockFile, '{{ asset('imagenes_especies/'.$imagenEspecie->nombre) }}');
            @endforeach
        },
        url: '{{ route('imagen-especies.store') }}',
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
            console.log(file);
            if (file.status == 'added') {
                $('form#registro').append('<input type="hidden" name="imagenesBorrar[]" value="' + file.id + '">');
            } else {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                    },
                    type: 'POST',
                    url: '{{ route("imagen-especies.delete") }}',
                    data: {filename: name},
                    success: function (data){
                        console.log(data);
                        console.log("File has been successfully removed!!");
                        $('form').find('input[data-nombre="' + data + '"]').remove()
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            }
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
    </script>
@endsection
