<table class="incidencias-table">
    <caption>MIS INCIDENCIAS</caption>
    <thead>
        <tr>
            <th colspan="7">
                <label for="checkboxAsignados">Ocultar incidencias cerradas</label>
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
                    <option value="Sin_asignar">Pendiente</option>
                    <option value="Asignada">Asignada</option>
                    <option value="En_trabajo">En trabajo</option>
                    <option value="Resuelta">Resuelta</option>
                    <option value="Cerrada">Cerrada</option>
                </select>
            </th>
            <th>Modificar Estado</th>
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
                        <!-- Agregar imagen cerrar.png y evento de clic para mostrar Sweet Alert -->
                        <td>
                            @if($incidencia->Estado === 'Cerrada')
                                <img src="{{ asset('img/cerrar.png') }}" class="cerrar-incidencia" alt="Cerrar">
                            @else
                                <img src="{{ asset('img/tick.png') }}" class="cerrar-incidencia" data-id="{{ $incidencia->id }}" alt="Cerrar">
                            @endif
                        </td>
                        
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
                
                if (mostrarAsignados && estado.toLowerCase() === 'cerrada') {
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

        // Agregar evento de clic a la imagen cerrar.png para mostrar Sweet Alert
        $(document).on('click', '.cerrar-incidencia', function() {
            var idIncidencia = $(this).data('id');

            // Mostrar Sweet Alert para confirmar si se desea finalizar la incidencia
            Swal.fire({
                title: '¿Desea finalizar esta incidencia?',
                text: 'Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, finalizar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Aquí puedes agregar la lógica para finalizar la incidencia,
                    // por ejemplo, haciendo una solicitud AJAX al servidor.
                    // Luego, puedes recargar la página o realizar otras acciones según tu necesidad.
                    // Aquí solo mostraremos un mensaje de éxito como ejemplo:
                    Swal.fire(
                        'Incidencia Finalizada',
                        'La incidencia ha sido finalizada correctamente.',
                        'success'
                    );
                }
            });
        });
    });
</script>