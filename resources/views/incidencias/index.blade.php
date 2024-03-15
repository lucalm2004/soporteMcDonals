

@foreach($incidencias as $incidencia)
    <div class="incidencia">
        <h3>{{ $incidencia->titulo }}</h3>
        <p>{{ $incidencia->descripcion }}</p>
        <p>ID del técnico: {{ $incidencia->ID_Tecnico }}</p>
        <p>Fecha Alta: {{ $incidencia->Data_Alta }}</p>
        <p>Fecha Resolucion: {{ $incidencia->Data_Resolucion }}</p>
        <p>Estado: {{ $incidencia->Estado }}</p>
        <p>Comentario del técnico: {{ $incidencia->Comentario_Tecnico }}</p>
        <p>Última actualización: {{ $incidencia->updated_at }}</p>
    </div>
@endforeach
