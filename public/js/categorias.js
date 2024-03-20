function listarCategorias() {
    var resultado = document.getElementById('resultados');
    var formdata = new FormData();
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formdata.append('_token', csrfToken);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/categoriasView');
    ajax.onload = function() {
        var str = "";
        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            var tabla = "";
            json.forEach(function(item) {
                str = "<tr><td>" + item.ID_Categoria + "</td>";
                str += "<td>" + item.Nombre_Categoria + "</td>";
                str += "<td><button class='btn' style='background: green;color:white;display:inline; margin-right: 2%;'>Editar</button><button class='btn' style='background: red;color:white;display:inline;margin-left: 2%;'>Eliminar</button></td>";
                str += "<td><button class='btn' style='background:blue; color:white'>ℹ️</button</td>";
                str += "</tr>";
                tabla += str;
            });
            resultado.innerHTML = tabla;
        } else {
            resultado.innerText = "Error";
        }
    };
    ajax.send(formdata);
}