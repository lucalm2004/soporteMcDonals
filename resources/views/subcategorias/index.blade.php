<div class="left-content">
    <div class="table_container">
        <h1>Administración de Subcategorias</h1><br>
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
                    <th>SubCategoria</th>
                    <th>Categoria</th>
                    <th>Administración</th>
                </tr>
            </thead>
            <tbody id="resultadoe" class="table_body">

            </tbody>
        </table>
    </div>
</div>
<script src="{{ asset('js/crudsub.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

