function listarSubcategorias() {
    var resultado = document.getElementById('resultadoe');
    var formdata = new FormData();
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formdata.append('_token', csrfToken);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/subcategoriasView');
    ajax.onload = function() {
        var str = "";
        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            var tabla = "";
            json.forEach(function(item) {
                str = "<tr><td>" + item.ID_subcategoria + "</td>";
                str += "<td>" + item.Nombre_Subcategoria + "</td>";
                str += "<td>" + item.categoria + "</td>";
                str += "<td><button  onclick=editare(" + item.ID_subcategoria + ") class='btn' style='background: green;color:white;display:inline; margin-right: 2%;'>Editar</button><button onclick=eliminare(" + item.ID_subcategoria + ") id='eliminar' class='btn' style='background: red;color:white;display:inline;margin-left: 2%;'>Eliminar</button></td>";
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

function eliminare(ID_Categoria) {


    id = ID_Categoria;

    var formdata = new FormData();
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formdata.append('_token', csrfToken);
    formdata.append('eliminar', id);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/subcategoriasEdit');
    ajax.onload = function() {
        if (ajax.status == 200) {
            Swal.fire({
                position: "top-end",
                title: "La categoria se ha eliminado.",
                showConfirmButton: false,
                timer: 1500
            });
            listarSubcategorias();
        } else {
            resultado.innerText = "Error";
        }
    };
    ajax.send(formdata);
}

function editare(ID_Categoria) {
    id = ID_Categoria;

    var formdata = new FormData();
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formdata.append('_token', csrfToken);
    formdata.append('id', id);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/subcategoriasEdit');
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
                    confirmarSubcategoria(categoria, id);
                }
            });

            // });
        } else {
            resultado.innerText = "Error";
        }
    };
    ajax.send(formdata);
}




function confirmarSubcategoria(categoria, id) {
    var formdata = new FormData();
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formdata.append('_token', csrfToken);
    formdata.append('ide', id);
    formdata.append('subcategoria', categoria);
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/subcategoriasEdit');
    ajax.onload = function() {
        if (ajax.status == 200) {
            Swal.fire({
                position: "top-end",
                title: "La categoria se ha editado.",
                showConfirmButton: false,
                timer: 1500
            });
            listarSubcategorias();
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