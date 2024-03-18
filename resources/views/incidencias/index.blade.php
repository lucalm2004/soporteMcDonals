<table class="incidencias-table">
    <caption>Tus incidencias</caption>
    <thead>
        <tr>
            <th colspan="6">
                <label for="checkboxAsignados">Mostrar solo los no resueltos</label>
                <input type="checkbox" id="checkboxAsignados">
            </th>
        </tr>
        <tr>
            <th>ID del Técnico</th>
            <th id="fechaAltaHeader">Fecha de Alta <img src="{{ asset('img/flecha.png') }}" alt="Flecha" id="arrowIcon"></th>
            <th>Fecha de Resolución</th>
            <th>Estado
                <select id="estadoFiltro">
                    <option value="">Todos</option>
                    <option value="sin_asignar">Pendiente</option>
                    <option value="Asignada">Asignada</option>
                    <option value="En trabajo">En trabajo</option>
                    <option value="Resuelta">Resuelta</option>
                    <option value="Cerrada">Cerrada</option>
                </select>
            </th>
            <th>Comentario del Técnico</th>
            <th>Última Actualización</th>
        </tr>
    </thead>
    <tbody id="tablaIncidencias">
        <!-- Aquí se mostrarán las incidencias -->
        @foreach($incidencias as $incidencia)
        <tr class="incidencia">
            <td>
                @if($incidencia->ID_Tecnico)
                    {{ $incidencia->ID_Tecnico }}
                @else
                    No asignado
                @endif
            </td>
            <td>{{ $incidencia->Data_Alta }}</td>
            <td>
                @if($incidencia->Data_Resolucion)
                    {{ $incidencia->Data_Resolucion }}
                @else
                    Todavía no está resuelto
                @endif
            </td>
            <td>{{ $incidencia->Estado }}</td>
            <td>{{ $incidencia->Comentario_Tecnico }}</td>
            <td>{{ $incidencia->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        var ascending = true;

        // Manejar el cambio en el checkbox "Mostrar solo asignados"
        $('#checkboxAsignados').change(function() {
            var mostrarAsignados = $(this).prop('checked');

            // Filtrar las incidencias según su estado
            $('#tablaIncidencias tr.incidencia').each(function() {
                var estado = $(this).find('td:nth-child(4)').text();
                
                if (mostrarAsignados && estado.toLowerCase() === 'resuelta') {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });

        // Manejar el clic en el encabezado de "Fecha de Alta"
        $('#fechaAltaHeader, #arrowIcon').click(function() {
            var rows = $('#tablaIncidencias tbody tr').get();

            // Ordenar las filas por fecha de alta
            rows.sort(function(a, b) {
                var dateA = new Date($(a).find('td:nth-child(2)').text());
                var dateB = new Date($(b).find('td:nth-child(2)').text());

                return ascending ? dateA - dateB : dateB - dateA;
            });

            // Actualizar el orden de las filas en la tabla
            $.each(rows, function(index, row) {
                $('#tablaIncidencias').append(row);
            });

            // Cambiar la dirección del orden
            ascending = !ascending;

            // Cambiar la apariencia de la flecha
            $('#arrowIcon').toggleClass('flipped', !ascending);
        });

        // Manejar el cambio en el select de filtrado por estado
        $('#estadoFiltro').change(function() {
            var estadoSeleccionado = $(this).val();

            // Filtrar las incidencias según el estado seleccionado
            $('#tablaIncidencias tr.incidencia').each(function() {
                var estadoIncidencia = $(this).find('td:nth-child(4)').text();

                if (estadoSeleccionado === '' || estadoIncidencia === estadoSeleccionado) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
