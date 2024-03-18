document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('estadisticas_ges_button').addEventListener('click', function () {
        document.getElementById('incidencias_ges').style.display = 'none';
        document.getElementById('estadisticas_ges').style.display = 'grid';
    })

    document.getElementById('incidencias_ges_button').addEventListener('click', function () {
        document.getElementById('estadisticas_ges').style.display = 'none';
        document.getElementById('incidencias_ges').style.display = 'grid';
    })

    listarIncidencias('');
    selectTecnicos();

    document.getElementById('usuario_tecnico').addEventListener('change', function () {
        updateFilter('tecnico');
    })

    document.getElementById('resueltas').addEventListener('click', function () {
        var eye = document.getElementById('eye').className;

        if (eye == 'fa fa-eye') {
            document.getElementById('eye').className = 'fa fa-eye-slash'
            document.getElementById('resueltas').className = 'buttonNoDisplay'
        } else {
            document.getElementById('eye').className = 'fa fa-eye'
            document.getElementById('resueltas').className = 'buttonDisplay'
        }

        updateFilter('Resueltas');
    })

    document.getElementById('orderFec').addEventListener('click', function () {
        var arrowFec = document.getElementById('arrow-fec').className;

        if (arrowFec == 'fa fa-arrow-up') {
            document.getElementById('arrow-fec').className = 'fa fa-arrow-down'
        } else {
            document.getElementById('arrow-fec').className = 'fa fa-arrow-up'
        }

        updateFilter('Fecha')
    })

    document.getElementById('orderPri').addEventListener('click', function () {
        var arrowPri = document.getElementById('arrow-pri').className;

        if (arrowPri == 'fa fa-arrow-up') {
            document.getElementById('arrow-pri').className = 'fa fa-arrow-down'
        } else {
            document.getElementById('arrow-pri').className = 'fa fa-arrow-up'
        }

        updateFilter('Prioridad')
    })

})

function updateFilter(orden) {
    var tecnico = document.getElementById('usuario_tecnico').value;


    if (orden = tecnico) {
        var eye = document.getElementById('eye').className;

        if (eye == 'fa fa-eye') {
            var resolved = 'ocultar';
        } else {
            var resolved = '';
        }
    }

    // if (orden == 'Fecha') {

    // } else if (orden == 'Prioridad') {

    // }

    var arrowFec = document.getElementById('arrow-fec').className;
    var arrowPri = document.getElementById('arrow-pri').className;

    if (arrowPri == 'fa fa-arrow-up') {
        var orderPr = 'PrioASC'
    } else {
        var orderPr = 'PrioDESC'
    }

    if (arrowFec == 'fa fa-arrow-up') {
        var orderFe = 'FechaASC'
    } else {
        var orderFe = 'FechaDESC'
    }


    listarIncidencias(tecnico, resolved, orderFe, orderPr);
}

function selectTecnicos() {
    var selectContainer = document.getElementById('usuario_tecnico');

    var formdata = new FormData();

    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    formdata.append('_token', csrfToken);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/select');
    ajax.onload = function () {
        var options = "";
        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);

            options += "<option value=''>Todos</option>";

            json.forEach(function (item) {
                options += "<option value='" + item.ID_Usuario + "'>"
                options += item.Nom_Usuario + "</option>"
            })

            selectContainer.innerHTML = options;
        } else {
            resultado.innerText = "Error";
        }
    }
    ajax.send(formdata);
}

function listarIncidencias(tecnico, resolved,) {
    var resultado = document.getElementById('resultado');

    var formdata = new FormData();

    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    formdata.append('_token', csrfToken);

    if (!resolved) {
        formdata.append('resolved', resolved);
    }

    if (!resolved) {
        formdata.append('resolved', resolved);
    }

    formdata.append('tecnico', tecnico);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/listar');
    ajax.onload = function () {
        var str = "";
        if (ajax.status == 200) {

            console.log(ajax.responseText)

            var json = JSON.parse(ajax.responseText);
            var tabla = "";
            json.forEach(function (item) {
                str = "<tr><td>" + item.id + "</td>";
                str += "<td>" + item.Sede + "</td>";
                str += "<td>" + item.Cliente + "</td>";
                str += "<td>"
                if (item.Tecnico === null) {
                    str += 'Sin asignar';
                } else {
                    str += item.Tecnico;
                }
                str += "</td>";
                str += "<td>" + item.Data_Alta + "</td>";
                str += "<td>"
                if (item.Data_Resolucion === null) {
                    str += 'Sin resolver';
                } else {
                    str += item.Data_Resolucion;
                }
                str += "</td>"; str += "<td>" + item.Prioridad + "</td>";
                str += "<td>" + item.Estado + "</td>";
                str += "<td>" + item.Categoria + "</td>";
                str += "<td>" + item.Subcategoria + "</td>";
                str += "</td>";
                str += "</tr>";
                tabla += str;
            })
            resultado.innerHTML = tabla;
        } else {
            resultado.innerText = "Error";
        }
    }
    ajax.send(formdata);
}



// function Editar(id) {
//     var formdata = new FormData();

//     var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//     formdata.append('id', id);
//     formdata.append('_token', csrfToken);

//     var ajax = new XMLHttpRequest();
//     ajax.open('POST', '/editar');
//     ajax.onload = function () {
//         if (ajax.status == 200) {

//             var json = JSON.parse(ajax.responseText);
//             document.getElementById('idp').value = json.id;
//             document.getElementById('codigo').value = json.codigo;
//             document.getElementById('producto').value = json.producto;
//             document.getElementById('precio').value = json.precio;
//             document.getElementById('cantidad').value = json.cantidad;
//             document.getElementById('registrar').value = "Actualizar";
//             // idp.value = "";
//             // Reseteamos formulario
//             form.reset();
//             // Refrescamos la lista eliminando los filtros
//             listarProductos('');
//         }
//     }
//     ajax.send(formdata);
// }

// registrar.addEventListener("click", () => {
//     var form = document.getElementById("frm");
//     var formdata = new FormData(form);

//     var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//     formdata.append('_token', csrfToken);

//     var ajax = new XMLHttpRequest();
//     ajax.open('POST', '/registrar');
//     ajax.onload = function () {
//         if (ajax.status == 200) {
//             if (ajax.responseText == "ok") {
//                 // Insert
//                 Swal.fire({
//                     icon: 'success',
//                     title: 'Producto añadido correctamente',
//                     ShowConfirmButton: false,
//                     timer: 1500
//                 });
//                 // Reseteamos formulario
//                 form.reset();
//                 // Refrescamos la lista eliminando los filtros
//                 listarProductos('');
//             } else {
//                 // Update
//                 Swal.fire({
//                     icon: 'success',
//                     title: 'Producto modificado correctamente',
//                     ShowConfirmButton: false,
//                     timer: 1500
//                 });
//                 idp.value = "";
//                 // Reseteamos formulario
//                 form.reset();
//                 // Refrescamos la lista eliminando los filtros
//                 listarProductos('');
//             }
//         } else {
//             respuesta.innerText = `Error`;
//         }
//     }
//     ajax.send(formdata);
// })

// function Eliminar(id) {
//     Swal.fire({
//         title: 'Está seguro de eliminar?',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Si!',
//         cancelButtonText: 'NO'
//     }).then((result) => {
//         var formdata = new FormData();
//         var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
//         formdata.append('_token', csrfToken);
//         formdata.append('id', id);
//         var ajax = new XMLHttpRequest();
//         ajax.open('POST', '/eliminar');
//         ajax.onload = function () {
//             if (ajax.status == 200) {
//                 if (ajax.responseText == "ok") {
//                     listarProductos('');
//                     Swal.fire({
//                         icon: 'success',
//                         title: 'Eliminado',
//                         ShowConfirmButton: false,
//                         timer: 1500
//                     })
//                 }
//             }
//         }
//         ajax.send(formdata);
//     })
// }
