<p><strong>PLANTA TERMOVALLeeeE</strong></p>
<p><strong>Fecha inicial: {{$fechaInicial}}</strong></p>
<p><strong>Fecha final: {{$fechaFinal}}</strong></p>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="min-width: 150px;"><strong>Ronda</strong></th>
            @foreach ($equipos as $equipo)
                <th><strong>{{$equipo->descripcion}}</strong></th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($rondas as $ronda)
            @php
            $ron = \App\Ronda::find($ronda->id);
            @endphp
            <tr>
                <th style="min-width: 150px;"scope="row">{{ $ron->reporte->fecha }} - {{ $ron->numeroRonda->nombre}}</th>
                @foreach ($equipos as $equipo)
                    @if ($ron->respuestas->where('pregunta_id',$equipo->id)->first() != null)
                        @if ($equipo->tipoPregunta->id == 1)
                            <td style="{{$ron->respuestas->where('pregunta_id',$equipo->id)->first()->alarma ? 'background-color:red; color:white;' : ''}}">
                                {{ $ron->respuestas->where('pregunta_id',$equipo->id)->first()->opcion->nombre ?? 'Sin dato' }}
                            </td>
                        @elseif ($equipo->tipoPregunta->id == 3)
                            <td style="{{$ron->respuestas->where('pregunta_id',$equipo->id)->first()->alarma ? 'background-color:red; color:white;' : ''}}">
                                {{ $ron->respuestas->where('pregunta_id',$equipo->id)->first()->extra}}
                            </td>
                        @endif
                    @else
                        <td>Sin registro</td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
