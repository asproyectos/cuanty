@extends('layouts.app')

@section('styles')
    <style media="screen">
        .dropzone .dz-preview .dz-image img {
            width: 120px;
        }
    </style>
@endsection


@section('content')
    <h3>Usuarios</h3>
    <div class="row">
        <div class="col-xl-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Edición de usuario
                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('usuarios.update',$usuario->id) }}" role="form" enctype='multipart/form-data'>
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Datos del usuario</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Rol</label>
                                @if (Auth::user()->rol_id != 1)
                                    <p>{{Auth::user()->rol->nombre}}</p>
                                @else
                                    <select class="form-control" name="rol_id" required id="rol">
                                        @foreach ($roles as $rol)
                                            <option value="{{ $rol->id }}" {{ $usuario->rol_id == $rol->id ? 'selected' : '' }}>{{ $rol->codigo }} - {{ $rol->nombre }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>Identificación</label>
                                <input type="identificacion" class="form-control" name="identificacion" required value="{{$usuario->identificacion}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="email" required value="{{$usuario->email}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label>nombre</label>
                                <input type="text" class="form-control" name="name" required value="{{$usuario->name}}">
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Nueva Contraseña</label>
                                <input type="text" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Confirmar nueva contraseña</label>
                                <input type="text" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Imagen de perfil</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="dropzone dropzone-default dropzone-brand" id="imagen-usuario">
                                        <div class="dropzone-msg dz-message needsclick">
                                            <h3 class="dropzone-msg-title">Arrastra tu imagen o haz click para cargarla.</h3>
                                            <span class="dropzone-msg-desc">Sólo imágenes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="kt-form__actions">
                            <button style="background-color:#ef9f0c;border-color:#ef9f0c;" type="submit" class="btn btn-primary">Enviar</button>
                            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
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
    <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
    $('#imagen-usuario').dropzone({
        maxFiles: 1,
        init: function () {
            var myDropzone = this;

            @if ($usuario->imagen != 'user-no-image.png')
                var mockFile = {
                    name: "{{$usuario->imagen}}",
                    // size: 12345,
                    type: 'image/jpg',
                    status: Dropzone.ADDED,
                    url: '{{ asset('imagenes_usuarios/') }}',
                    id: '{{$usuario->imagen}}'
                };
                myDropzone.files.push(mockFile);
                myDropzone.emit("addedfile", mockFile);
                myDropzone.emit("thumbnail", mockFile, '{{ asset('imagenes_usuarios/'.$usuario->imagen) }}');
            @endif
            console.log('cantidad inicial '+myDropzone.files.length);
        },
        url: '{{ route('imagen-usuario.store') }}',
        maxFilesize: 10,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,
        processing: function(file)
        {
            if (this.files.length > 1) {
                this.removeAllFiles();
            }
        },
        removedfile: function(file)
        {
            if (file.status == 'added') {
                $('form#registro').append('<input type="hidden" name="imagenBorrar" value="true">');
            } else {
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
            }
            var fileRef;
            return (fileRef = file.previewElement) != null ?
            fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
        success: function(file, response)
        {
            $('form#registro').append('<input type="hidden" data-nombre="' + response.data +'" name="imagen" value="' + response.data + '">');
        },
        error: function(file, response)
        {
            return false;
        },
        maxfilesexceeded: function(file, response)
        {
            this.removeAllFiles();
            this.addFile(file);
        },
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
        }
    });
    </script>
@endsection
