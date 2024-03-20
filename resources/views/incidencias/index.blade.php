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
            <th>Fecha de Alta <img src="{{ asset('img/flecha.png') }}" alt="Flecha" id="arrowIcon"></th>
            <th>Fecha de Resolución</th>
            <th>Estado
                <select id="estadoFiltro">
                    <option value="">Todos</option>
                    <option value="sin_asignar">Pendiente</option>
                    <option value="asignada">Asignada</option>
                    <option value="en_trabajo">En trabajo</option>
                    <option value="resuelta">Resuelta</option>
                    <option value="cerrada">Cerrada</option>
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
                    {{ $usuarios[$incidencia->ID_Tecnico] ?? 'Desconocido' }}
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
                            @if($incidencia->Estado === 'cerrada')
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
            var estadoIncidencia = $(this).closest('tr').find('td:nth-child(4)').text().trim();

            // Verificar si la incidencia ya está cerrada
            if (estadoIncidencia.toLowerCase() === 'cerrada') {
                mostrarIncidenciaCerradaAlert();
                return;
            }

            // Obtener el token CSRF de la etiqueta meta
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

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
                    // Realizar una solicitud AJAX al servidor para cambiar el estado de la incidencia
                    $.ajax({
                        url: '/actualizar_estado_incidencia',
                        type: 'POST',
                        data: {
                            id: idIncidencia,
                            estado: 'cerrada',
                            _token: csrfToken // Agregar el token CSRF aquí
                        },
                        success: function(response) {
                            console.log(response); // Verificar la respuesta en la consola del navegador
                            if (response.success) {
                                // Si la solicitud es exitosa, actualizar la interfaz de usuario
                                // Ocultar la fila correspondiente a la incidencia cerrada
                                $('#tablaIncidencias tr.incidencia[data-id="' + idIncidencia + '"]').hide();

                                // Mostrar un mensaje de éxito
                                Swal.fire(
                                    'Incidencia Finalizada',
                                    'La incidencia ha sido finalizada correctamente.',
                                    'success'
                                    ).then((result) => {
                            // Recargar la página
                            location.reload();
                        });
                            } else {
                                // Si hay un error, mostrar un mensaje de error
                                Swal.fire(
                                    'Error',
                                    'Se produjo un error al finalizar la incidencia.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText); // Verificar la respuesta en la consola del navegador
                            // Si hay un error en la solicitud AJAX, mostrar un mensaje de error
                            Swal.fire(
                                'Error',
                                'Se produjo un error al finalizar la incidencia.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

        // Función para mostrar un Sweet Alert indicando que la incidencia ya está cerrada
        function mostrarIncidenciaCerradaAlert() {
            Swal.fire(
                'Incidencia Cerrada',
                'Esta incidencia ya ha sido marcada como cerrada.',
                'info'
            );
        }
    });
</script>
