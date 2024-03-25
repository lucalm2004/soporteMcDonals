document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('estadisticas_ges_button').addEventListener('click', function () {
        document.getElementById('incidencias_ges').style.display = 'none';
        document.getElementById('estadisticas_ges').style.display = 'grid';
    });

    document.getElementById('incidencias_ges_button').addEventListener('click', function () {
        document.getElementById('estadisticas_ges').style.display = 'none';
        document.getElementById('incidencias_ges').style.display = 'grid';
    });

    listarIncidencias('');

    selectTecnicos('', function (options) {
        document.getElementById('usuario_tecnico').innerHTML = options;
    });

    document.getElementById('usuario_tecnico').addEventListener('change', function () {
        updateFilter('tecnico');
    });

    document.getElementById('resueltas').addEventListener('click', function () {
        var eye = document.getElementById('eye').className;

        if (eye == 'fa fa-eye') {
            document.getElementById('eye').className = 'fa fa-eye-slash';
            document.getElementById('resueltas').className = 'buttonNoDisplay';
        } else {
            document.getElementById('eye').className = 'fa fa-eye';
            document.getElementById('resueltas').className = 'buttonDisplay';
        }

        updateFilter('Resueltas');
    });

    document.getElementById('orderFec').addEventListener('click', function () {
        var arrowFec = document.getElementById('arrow-fec').className;

        if (arrowFec == 'fa fa-arrow-up') {
            document.getElementById('arrow-fec').className = 'fa fa-arrow-down';
        } else {
            document.getElementById('arrow-fec').className = 'fa fa-arrow-up';
        }

        updateFilter('Fecha');
    });

    document.getElementById('orderPri').addEventListener('click', function () {
        var arrowPri = document.getElementById('arrow-pri').className;

        if (arrowPri == 'fa fa-arrow-up') {
            document.getElementById('arrow-pri').className = 'fa fa-arrow-down';
        } else {
            document.getElementById('arrow-pri').className = 'fa fa-arrow-up';
        }

        updateFilter('Prioridad');
    });


});

function updateFilter(order) {
    var tecnico = document.getElementById('usuario_tecnico').value;

    var eye = document.getElementById('eye').className;

    if (eye == 'fa fa-eye') {
        var resolved = 'mostrar';
    } else {
        var resolved = null;
    }

    var arrowFec = document.getElementById('arrow-fec').className;
    var arrowPri = document.getElementById('arrow-pri').className;

    var orden = {};
    if (order == 'Prioridad') {
        orden['Prioridad'] = (arrowPri == 'fa fa-arrow-up') ? 'ASC' : 'DESC';
        orden['Data_Alta'] = (arrowFec == 'fa fa-arrow-up') ? 'ASC' : 'DESC';
    } else if (order == 'Fecha') {
        orden['Data_Alta'] = (arrowFec == 'fa fa-arrow-up') ? 'ASC' : 'DESC';
        orden['Prioridad'] = (arrowPri == 'fa fa-arrow-up') ? 'ASC' : 'DESC';
    }

    listarIncidencias(tecnico, resolved, orden);
}

function selectTecnicos(tecnico, callback) {
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
                console.log(tecnico + ' ' + item.Nom_Usuario)

                if (item.Nom_Usuario === tecnico) {
                    options += "<option value='" + item.ID_Usuario + "' selected>";
                } else {
                    options += "<option value='" + item.ID_Usuario + "'>";
                }
                options += item.Nom_Usuario + "</option>";
            });

            callback(options);
        }
    };
    ajax.send(formdata);
}

function listarIncidencias(tecnico, resolved, orden) {
    var resultado = document.getElementById('resultado');
    var formdata = new FormData();
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formdata.append('_token', csrfToken);

    if (resolved) {
        formdata.append('resolved', resolved);
    }

    if (orden) {
        for (var key in orden) {
            if (orden.hasOwnProperty(key)) {
                formdata.append('orden[' + key + ']', orden[key]);
                console.log('orden[' + key + ']', orden[key]);
            }
        }
    }

    formdata.append('tecnico', tecnico);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/listar');
    ajax.onload = function () {
        var str = "";
        if (ajax.status == 200) {
            clickTabla();
            var json = JSON.parse(ajax.responseText);
            var tabla = "";
            json.forEach(function (item) {
                str = "<tr><td>" + item.id + "</td>";
                str += "<td>" + item.Sede + "</td>";
                str += "<td>" + item.Cliente + "</td>";
                str += "<td>";
                if (item.Tecnico === null) {
                    str += 'Sin asignar';
                } else {
                    str += item.Tecnico;
                }
                str += "</td>";
                str += "<td>" + item.Data_Alta + "</td>";
                str += "<td>";
                if (item.Data_Resolucion === null) {
                    str += 'Sin resolver';
                } else {
                    str += item.Data_Resolucion;
                }
                str += "</td>";
                str += "<td>" + item.Prioridad + "</td>";
                str += "<td>" + item.Estado + "</td>";
                str += "<td>" + item.Categoria + "</td>";
                str += "<td>" + item.Subcategoria + "</td>";
                str += "</td>";
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

function clickTabla() {
    var tbody = document.querySelector('#table_gest');
    tbody.addEventListener('click', function (e) {
        var tr = e.target.parentNode;
        var firstTd = tr.querySelector('td').innerHTML;

        openIncidencia(firstTd)
    });
}

function openIncidencia(id) {
    var formdata = new FormData();
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formdata.append('_token', csrfToken);
    formdata.append('idIncidencia', id);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/openIncd');
    ajax.onload = function () {
        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            var page = '';

            for (var key in json) {
                if (json.hasOwnProperty(key)) {
                    var item = json[key];

                    selectTecnicos(item.Tecnico, function (options) {
                        page += '<div id="overlay-incidencia" class="overlay-incidencia"></div>';
                        page += '<div id="display-incidencia" class="display-incidencia">';
                        page += '<div class="incidencia-ennards">';
                        page += '<div class="descripcion-incidencia">';
                        page += '<h2>' + item.Categoria + ' - ' + item.Subcategoria + '</h2>';
                        page += '</div>';
                        page += '<div class="tags-incidencia">';
                        page += '<div class="tag-incidencia">';
                        page += '<h3>Estado: ' + item.Estado + '</h3>';
                        page += '</div>';
                        page += '<div class="tag-incidencia">';
                        page += '<h3>Prioridad: ' + item.Prioridad + '</h3>';
                        page += '</div>';
                        page += '<div class="tag-incidencia">';
                        page += '<h3>Tecnico: <select id="tecnico-cambio">' + options + '</select></h3>';
                        page += '</div>';
                        page += '<div class="tag-incidencia">';
                        page += '<h3>Cliente: ' + item.Cliente + '</h3>';
                        page += '</div>';
                        page += '</div>';
                        page += '<div class="coment-incidencia">';
                        page += '<h3>' + item.Comentario_Cliente + '</h3>';
                        page += '</div>';
                        page += '</div>';
                        page += '</div>';

                        document.getElementById('incidencia').innerHTML = page;
                        closeAlert();
                        document.getElementById('tecnico-cambio').addEventListener('change', function () {
                            updateTecnico(this.value);
                        })
                    });
                }
            }
        }
    };
    ajax.send(formdata);
}


function closeAlert() {
    document.getElementById('overlay-incidencia').addEventListener('click', function (e) {
        document.getElementById('display-incidencia').className = 'hide-incidencia'
        document.getElementById('overlay-incidencia').className = 'hide-overlay'

        setTimeout(function () {
            document.getElementById('incidencia').innerHTML = ''
        }, 1000);

    })
}

function updateTecnico(id) {
    var formdata = new FormData();
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formdata.append('_token', csrfToken);
    formdata.append('idIncidencia', id);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '/openIncd');
    ajax.onload = function () {
        if (ajax.status == 200) {

        }
    }
}