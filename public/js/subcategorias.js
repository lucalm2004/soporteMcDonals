window.onload = function() {
    var selectContainer = document.getElementById('subCat');
    var resultado = document.getElementById('resultado');
    var formdata = new FormData();
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formdata.append('_token', csrfToken);

    var ajax = new XMLHttpRequest();
    ajax.open('GET', '/sub');
    ajax.onload = function() {
        if (ajax.status == 200) {
            var options = "";
            var json = JSON.parse(ajax.responseText);

            var count = 0;
            json.forEach(function(item) {
                if (count < 7) {
                    options += "<div class='day-and-activity activity-one'>";
                    options += "  <div class='day'>";
                    options += "    <h1></h1>";
                    options += "    <p>" + item.categoria + "</p>"; // Corrected this line
                    options += "  </div>";
                    options += "  <div class='activity'>";
                    options += "    <h2>" + item.Nombre_Subcategoria + "</h2>"; // Corrected this line
                    options += "  </div>";
                    options += "</div>";

                    count++; // Incrementa el contador después de cada iteración
                } else {
                    // Si el contador llega a 4, salimos del bucle forEach
                    return;
                }
            });
            options += "  <button id='subBtn' class='btn'>Ver Más</button>";

            setTimeout(function() {
                document.getElementById('subBtn').addEventListener('click', function() {
                    document.getElementById('homeContent').style.display = 'none';
                    document.getElementById('subcategoriasContent').style.display = 'grid';
                    document.getElementById('homepage').classList.remove("active");
                    document.getElementById('subs').classList.add("active");
                    listarSubcategorias();
                })
            }, 3000);

            selectContainer.innerHTML = options;
        } else {
            selectContainer.innerText = "Error al cargar subcategorías";
        }
    };
    ajax.send(formdata);
}