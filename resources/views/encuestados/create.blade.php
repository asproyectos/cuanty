@extends('layouts.app')

@section('content')
    <h3>Usuarios</h3>
    <div class="row">
        <div class="col-xl-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Creación de usuario
                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('usuarios.store') }}" role="form" enctype='multipart/form-data'>
                    @csrf
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Datos del usuario</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label>Rol</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <select class="form-control" name="rol_id" required>
                                        <option value="" {{ empty(old('rol_id')) ? 'selected' : '' }} disabled>Escoja una opción</option>
                                        @foreach ($roles as $rol)
                                            <option {{old('rol_id') == $rol->id ? 'selected' : ''}} value="{{ $rol->id }}">{{ $rol->codigo }} - {{ $rol->nombre }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-user"></i></span>
                                    </span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label>E-mail</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="email" class="form-control" name="email" required value="{{ old('email')}}">
                                    {{-- <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-calendar"></i></span>
                                    </span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label>nombre</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" name="name" required value="{{ old('name')}}">
                                    {{-- <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-clock-o"></i></span>
                                    </span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Contraseña</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" name="password" required>
                                    {{-- <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-calendar"></i></span>
                                    </span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Confirmar contraseña</label>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" name="password_confirmation" required>
                                    {{-- <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-clock-o"></i></span>
                                    </span> --}}
                                </div>
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
    <script type="text/javascript">
    $('#imagen-usuario').dropzone({
        url: '{{ route('imagen-usuario.store') }}',
        maxFilesize: 10,
        maxFiles: 1,
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
            $('form#registro').append('<input type="hidden" data-nombre="' + response.data +'" name="imagen" value="' + response.data + '">');
            console.log(response);
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
