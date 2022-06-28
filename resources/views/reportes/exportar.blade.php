<p><strong>PLANTA TERMOVALLE</strong></p>
<p><strong>Fecha: {{$reporte->fecha}}</strong></p>

<table>
    <thead>
        <tr>
            <th><strong>Equipo</strong></th>
            <th><strong>Dispositivo</strong></th>
            <th><strong>Unidades</strong></th>
            <th><strong>Normal</strong></th>
            @foreach ($numeroRondas as $numeroRonda)
                <th><strong>{{ $numeroRonda->nombre }}</strong></th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($reporte->getGrupoPreguntas(1) as $grupoPregunta)
            <tr>
                <th colspan="8"> <strong> {{ $grupoPregunta->nombre }}</strong></th>
            </tr>
            @foreach ($reporte->getPreguntas($grupoPregunta->id) as $pregunta)
                <tr>
                    <th scope="row">{{ $pregunta->descripcion }}</th>
                    <th scope="row">{{ $pregunta->dispositivo }}</th>
                    <th scope="row">{{ $pregunta->unidad }}</th>
                    <th scope="row">{{ $pregunta->normal }}</th>
                    @foreach ($numeroRondas as $numeroRonda)
                        @if ($reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first())
                            @if ($reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->respuestas->where('pregunta_id',$pregunta->id)->first() != null)
                                @if ($pregunta->tipo_pregunta_id == 1)
                                    <td style="{{$reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->respuestas->where('pregunta_id',$pregunta->id)->first()->alarma ? 'background-color:red; color:white;' : ''}}">
                                        {{ $reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->respuestas->where('pregunta_id',$pregunta->id)->first()->opcion->nombre ?? 'sin dato' }}
                                    </td>
                                @elseif ($pregunta->tipo_pregunta_id == 3)
                                    <td style="{{$reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->respuestas->where('pregunta_id',$pregunta->id)->first()->alarma ? 'background-color:red; color:white;' : ''}}">
                                        {{ $reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->respuestas->where('pregunta_id',$pregunta->id)->first()->extra}}
                                    </td>
                                @endif
                            @else
                                <td>Sin dato</td>
                            @endif
                        @else
                            <td>Sin registro</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
<table>
    <thead>
        <tr>
            <th colspan="4"><strong>Hora de la ronda</strong></th>
            @foreach ($numeroRondas as $numeroRonda)
                <th><strong>{{ $numeroRonda->nombre }}</strong></th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        <tr>
            <th colspan="4"><strong>Operador de campo</strong></th>
            @foreach ($numeroRondas as $numeroRonda)
                @if ($reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first())
                    <td>{{ $reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->user->name }}</td>
                @else
                    <td>Sin registro</td>
                @endif
            @endforeach
        </tr>
        <tr>
            <th colspan="4"><strong>Comentario del Operador de Campo</strong></th>
            @foreach ($numeroRondas as $numeroRonda)
                @if ($reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first())
                    <td>{{ $reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->comentario ?: 'Sin comentario'  }}</td>
                @else
                    <td>Sin registro</td>
                @endif
            @endforeach
        </tr>
        <tr>
            <th colspan="4"><strong>Operador de sala de control</strong></th>
            @foreach ($numeroRondas as $numeroRonda)
                @if ($reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first() && isset($reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->verificada))
                    <td>{{ $reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->verificadaPor->name }}</td>
                @else
                    <td>Sin verificar</td>
                @endif
            @endforeach
        </tr>
        <tr>
            <th colspan="4"><strong>Comentario del Operador de sala de control</strong></th>
            @foreach ($numeroRondas as $numeroRonda)
                @if ($reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first() && isset($reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->verificada))
                    <td>{{ $reporte->rondas->where('numero_ronda_id',$numeroRonda->id)->first()->comentario_verificacion ?: 'Sin comentario' }}</td>
                @else
                    <td>Sin verificar</td>
                @endif
            @endforeach
        </tr>
    </tbody>
</table>
<p><strong>Jefe de operaciones</strong></p>
@if ($reporte->verificado)
    <p>Nombre: {{ $reporte->user->name }}</p>
    <p>Comentario: {{ $reporte->comentario ?: 'Sin comentario' }}</p>
@else
    <p>Sin verificación</p>
@endif
