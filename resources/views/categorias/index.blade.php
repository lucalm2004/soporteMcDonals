<div class="left-content">
    <div class="table_container">
        <h1>Incidencias de equipo</h1><br>
        <div class='filtros'>
            <label for="usuario_tecnico">Tecnico: </label><select id="usuario_tecnico"></select>
            <button id="resueltas" class="buttonNoDisplay">Incidencias Resueltas <i id="eye"
                    class="fa fa-eye-slash"></i></button>
        </div>
        <br>
        <table class="table">
            <thead class="table_head">
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Administración</th>
                    <th>Información</th>
                </tr>
            </thead>
            <tbody id="resultados" class="table_body">

            </tbody>
        </table>
    </div>
</div>
<script src="{{ asset('js/categorias.js') }}"></script>
