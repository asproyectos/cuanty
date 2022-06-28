@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style media="screen">
    #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 0.9em; font-size: 1.4em; }
    #sortable li span { position: absolute; margin-left: -1.3em; }
    </style>
@endsection



@section('content')
    <h3>Planta</h3>
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Edición de Sistema
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
                <form id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('sistemas.update',$grupoPregunta->id) }}" role="form" enctype='multipart/form-data'>
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-6">
                            <h4>Datos del sistema</h4>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-2">
                            <div class="form-group ">
                                <h5>codigo</h5>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" name="codigo" value="{{$grupoPregunta->codigo}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <h5>nombre</h5>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" name="nombre"  value="{{$grupoPregunta->nombre}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <h5>Estado</h5>
                                <div class="kt-input-icon kt-input-icon--right">
                                    <label class="kt-checkbox kt-checkbox--success">
                                        <input name="activa" type="checkbox" {{ $grupoPregunta->activa ? 'checked' : ''}} > Activa
                                        <span></span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="flex-direction: inherit;">
                        <div class="col-md-5">
                            <h5>Ordenar equipos</h5>
                            <ul id="sortable">
                                @foreach ($grupoPregunta->preguntas->sortBy('orden') as $pregunta)
                                    <li class="ui-state-default">
                                        <i style="color:#ef9d00;padding-right: 15px;" class="fas fa-arrows-alt-v"></i>{{ $pregunta->orden }} - {{ $pregunta->descripcion }}
                                        <input type="hidden" name="pregunta[{{$pregunta->id}}]" value="">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button style="background-color: #ef9f0c; border-color: #ef9f0c;" type="submit" class="btn btn-primary">Enviar</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();
    } );
    </script>
@endsection
