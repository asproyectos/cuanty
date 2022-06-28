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
    <h3>Ruta</h3>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Orden de los sistemas
                    </h3>
                </div>
            </div>
            <form id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('rutas.update',1) }}" role="form" enctype='multipart/form-data'>
                @csrf
                {{ method_field('PATCH') }}
                <div class="kt-portlet__body">
                    <div class="col-md-5">
                        <ul id="sortable">
                            @foreach ($formulario->grupoPreguntas->where('activa', 1)->sortBy('orden') as $grupoPregunta)
                                <li class="ui-state-default">
                                    <i style="color:#ef9d00;padding-right: 15px;" class="fas fa-arrows-alt-v"></i>{{ $grupoPregunta->orden }} - {{ $grupoPregunta->nombre }}
                                    <input type="hidden" name="sistema[{{$grupoPregunta->id}}]" value="">
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
