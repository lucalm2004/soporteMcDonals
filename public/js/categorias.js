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
                str += "<td><button id='editar' onclick=editar(" + item.ID_Categoria + ") class='btn' style='background: green;color:white;display:inline; margin-right: 2%;'>Editar</button><button onclick=eliminar(" + item.ID_Categoria + ") id='eliminar' class='btn' style='background: red;color:white;display:inline;margin-left: 2%;'>Eliminar</button></td>";
                str += "<td><button onclick='ver(" + item.ID_Categoria + ", \"" + item.Nombre_Categoria + "\")' id='ver' class='btn' style='background:blue; color:white'>ℹ️</button></td>";
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


function eliminar(ID_Categoria) {


    id = ID_Categoria;

    var formdata = new FormData();
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formdata.append('_token', csrfToken);
    formdata.append('eliminar', id);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/categoriasEdit');
    ajax.onload = function() {
        if (ajax.status == 200) {
            Swal.fire({
                position: "top-end",
                title: "La categoria se ha eliminado.",
                showConfirmButton: false,
                timer: 1500
            });
            listarCategorias();
        } else {
            resultado.innerText = "Error";
        }
    };
    ajax.send(formdata);
}

function editar(ID_Categoria) {
    id = ID_Categoria;

    var formdata = new FormData();
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formdata.append('_token', csrfToken);
    formdata.append('id', id);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/categoriasEdit');
    ajax.onload = function() {
        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            // json.forEach(function(pen) {
            Swal.fire({
                title: 'Editar',
                html: '<input id="swal-input1" class="swal2-input" value="' + json + '">',
                showCancelButton: true,
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    const categoria = Swal.getPopup().querySelector('#swal-input1').value
                    if (!categoria) {
                        Swal.showValidationMessage('Por favor ingresa una categoría')
                    }
                    return categoria
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const categoria = result.value;
                    confirmarCategoria(categoria, id);
                }
            });

            // });
        } else {
            resultado.innerText = "Error";
        }
    };
    ajax.send(formdata);
}




function confirmarCategoria(categoria, id) {
    var formdata = new FormData();
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formdata.append('_token', csrfToken);
    formdata.append('ide', id);
    formdata.append('categoria', categoria);
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/categoriasEdit');
    ajax.onload = function() {
        if (ajax.status == 200) {
            Swal.fire({
                position: "top-end",
                title: "La categoria se ha editado.",
                showConfirmButton: false,
                timer: 1500
            });
            listarCategorias();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un problema al editar la categoría. Por favor, inténtalo de nuevo más tarde.'
            });
        }
    };
    ajax.onerror = function() {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un problema de red al intentar editar la categoría. Por favor, verifica tu conexión a Internet y vuelve a intentarlo.'
        });
    };
    ajax.send(formdata);
}


function ver(id, Nombre_Categoria) {
    var formdata = new FormData();
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formdata.append('_token', csrfToken);
    formdata.append('ver', id);
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/categoriasEdit');
    ajax.onload = function() {
        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            var htmlContent = "Subcategorias:";
            json.forEach(function(item) {
                htmlContent += `<p>${item.Nombre_Subcategoria}</p>`;
            });
            Swal.fire({
                title: Nombre_Categoria,
                html: htmlContent,
                icon: "question"
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un problema al editar la categoría. Por favor, inténtalo de nuevo más tarde.'
            });
        }
    };

    ajax.onerror = function() {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un problema de red al intentar editar la categoría. Por favor, verifica tu conexión a Internet y vuelve a intentarlo.'
        });
    };
    ajax.send(formdata);
}