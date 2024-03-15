<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
    <title>Home Support</title>
</head>
<body>
    <main>
        <nav class="main-menu">
          <h1>Mc Donald's Support</h1>
          <img class="logo" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/4cfdcb5a-0137-4457-8be1-6e7bd1f29ebb" alt="" />
          <ul>
            <li id="homepage"  class="nav-item active">
              <b></b>
              <b></b>
              <a href="#">
                <i class="fa fa-house nav-icon"></i>
                <span  class="nav-text">Home</span>
              </a>
            </li>
  
            <li id="incipage"   class="nav-item">
              <b></b>
              <b></b>
              <a href="#">
                <i class="fa fa-user nav-icon"></i>
                <span  class="nav-text">Incidencias</span>
              </a>
            </li>
  
            <li class="nav-item">
              <b></b>
              <b></b>
              <a href="#">
                <i class="fa fa-calendar-check nav-icon"></i>
                <span class="nav-text">Chats</span>
              </a>
            </li>
  
          </ul>
        </nav>
  
  <section id="homeContent" class="content-section">

        <section class="content">
          <div class="left-content">
            <div class="activities">
              <h1>Nuestras Sedes</h1>
              <div class="activity-container">
                <div class="image-container img-one">
                  <img src="https://www.ejeprime.com/files//fotos/ciudades/22@-recurso-728.jpg" alt="tennis" />
                  <div class="overlay">
                    <h3>Barcelona</h3>
                  </div>
                </div>
  
                <div class="image-container img-two">
                  <img src="https://mitreworkspace.com/wp-content/uploads/2017/04/alquiler-oficinas-barcelona-sarria-santgervasi-workspace-business-center-centro-negocios-2-1.jpg.webp" alt="hiking" />
                  <div class="overlay">
                    <h3>Oficinas Agbar</h3>
                  </div>
                </div>
  
                <div class="image-container img-three">
                  <img src="https://www.roomdiseno.com/wp-content/uploads/2020/07/Cube_Berlin-3XN-roomdiseno16-750x500.jpg" alt="running" />
                  <div class="overlay">
                    <h3>Berlin</h3>
                  </div>
                </div>
  
                <div class="image-container img-four">
                  <img src="https://images.adsttc.com/media/images/61d6/c116/3e4b/31d9/0100/0020/medium_jpg/JWA30.jpg?1641464075" alt="cycling" />
                  <div class="overlay">
                    <h3>Oficinas Cube</h3>
                  </div>
                </div>
  
                <div class="image-container img-five">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Edif%C3%ADcio_Montreal_01.JPG/640px-Edif%C3%ADcio_Montreal_01.JPG" alt="yoga" />
                  <div class="overlay">
                    <h3>Montreal</h3>
                  </div>
                </div>
  
                <div class="image-container img-six">
                  <img src="https://metspace.com/wp-content/uploads/2023/10/6291ee6e64be79cce51b0d7f_montreal_cowork-header.png" alt="swimming" />
                  <div class="overlay">
                    <h3>Oficina Montreal 21</h3>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="left-bottom">
              <div class="weekly-schedule">
                <h1>Crear tickets</h1>
                <div class="calendar">
                  <div class="day-and-activity activity-one">
                    <div class="day">
                      <h1>01</h1>
                      <p>SW</p>
                    </div>
                    <div class="activity">
                      <h2>Software</h2>
                      <div class="participants">
                        <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/c61daa1c-5881-43f8-a50f-62be3d235daf" style="--i: 1" alt="" />
                        <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/90affa88-8da0-40c8-abe7-f77ea355a9de" style="--i: 2" alt="" />
                        <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/07d4fa6f-6559-4874-b912-3968fdfe4e5e" style="--i: 3" alt="" />
                        <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/e082b965-bb88-4192-bce6-0eb8b0bf8e68" style="--i: 4" alt="" />
                      </div>
                    </div>
                    <button id="crearSW" class="btn">Crear SW</button>
                  </div>
  
                  <div class="day-and-activity activity-two">
                    <div class="day">
                      <h1>02</h1>
                      <p>HW</p>
                    </div>
                    <div class="activity">
                      <h2>Hardware</h2>
                      <div class="participants">
                        <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/c61daa1c-5881-43f8-a50f-62be3d235daf" style="--i: 1" alt="" />
                        <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/32037044-f076-433a-8a6e-9b80842f29c9" style="--i: 2" alt="" />
                      </div>
                    </div>
                    <button id="crearHW" class="btn">Crear HW</button>
                  </div>
                </div>
              </div>
  



              <div class="personal-bests">
                <h1>Incidencias Comunes</h1>
                <div class="personal-bests-container">
                  <div class="best-item box-one">
                    <p>Problemas con el teclado</p>
                    <img src="{{ asset('img/teclado.png') }}" alt="" />
                  </div>
                  <div class="best-item box-two">
                    <p>Conexion remota fallida</p>
                    <img src="{{ asset('img/error.png') }}" alt="" />
                  </div>
                  <div class="best-item box-three">
                    <p>Proyector sin señal</p>
                    <img src="{{ asset('img/proye.png') }}" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
  
          <div class="right-content">
            <div class="user-info">
              <div class="icon-container">
                <i class="fa fa-bell nav-icon"></i>
                <i class="fa fa-message nav-icon"></i>
              </div>
              <h4>Kelsey Miller</h4>
              <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/40b7cce2-c289-4954-9be0-938479832a9c" alt="user" />
            </div>

 
  
            <div class="friends-activity">
              <h1>Valoraciones</h1>
              <div class="card-container">
                <div class="card">
                  <div class="card-user-info">
                    <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/9290037d-a5b2-4f50-aea3-9f3f2b53b441" alt="" />
                    <h2>Jane</h2>
                  </div>
                  <img class="card-img" src="https://media.licdn.com/dms/image/C4E0DAQHtvwXaDzQZzA/learning-public-crop_288_512/0/1568667753141?e=2147483647&v=beta&t=5D1TuC49hG8L86aLexLgxT8vZK_37h1ZgRRRyCgTbgo" alt="" />
                  <p>"Acceso remoto solucionado rapidamente. Gracias por vuestra ayuda tan útil y confiable."🎉</p>
                </div>
  
                <div class="card card-two">
                  <div class="card-user-info">
                    <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/42616ef2-ba96-49c7-80ea-c3cf1e2ecc89" alt="" />
                    <h2>Mike</h2>
                  </div>
                  <img class="card-img" src="https://cdn.computerhoy.com/sites/navi.axelspringer.es/public/media/image/2021/03/oficina-casa-2251675.jpg" alt="" />
                  <p>"La reparación del monitor fue rápida."💪</p>
                </div>
              </div>
            </div>
          </div>
        </section>
      </section>

      <section id="incidenciasContent" class="content-section" style="display: none;">
          <script>
            $(document).ready(function() {
                $.ajax({
                    url: '{{ route("incidencias.index") }}',
                    method: 'GET',
                    success: function(response) {
                        $('#incidenciasContent').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Hubo un error al obtener las incidencias:', error);
                    }
                });
            });
          </script>

    </section>
    
      </main>
      
      <script src="{{ asset('js/home.js') }}"></script>
      <script>
document.getElementById('homepage').addEventListener('click', function () {
        document.getElementById('incidenciasContent').style.display = 'none';
        document.getElementById('homeContent').style.display = 'grid';
    })

    document.getElementById('incipage').addEventListener('click', function () {
        document.getElementById('homeContent').style.display = 'none';
        document.getElementById('incidenciasContent').style.display = 'grid';
    })


 $(document).ready(function(){
    $("#crearSW").click(function(){ // Utiliza el ID del botón
        // Definir la variable global con la URL de las subcategorías
        var subcategoriasRoute = '{{ route("subcategorias", ["idCategoria" => 1]) }}';
        var incidenciaNueva = '{{ route("crear.incidencia") }}';

        // Obtener subcategorías con ID de categoría 1 desde la base de datos
        $.ajax({
            url: subcategoriasRoute,
            method: 'GET',
            success: function(response) {
                // Crear opciones para el select con los datos obtenidos
                var options = '';
                response.forEach(function(subcategoria) {
                    options += '<option value="' + subcategoria.ID_subcategoria + '">' + subcategoria.Nombre_Subcategoria + '</option>';
                });
                // Mostrar SweetAlert con el select y espacio para el comentario
                Swal.fire({
                    title: 'Crear Incidencia',
                    html:
                        '<select id="subcategoria" class="swal2-input">' +
                        options +
                        '</select>' +
                        '<textarea id="comentario" class="swal2-textarea" placeholder="Comentario"></textarea>',
                    focusConfirm: false,
                    preConfirm: () => {
                        // Obtener los valores seleccionados
                        var subcategoriaId = $('#subcategoria').val();
                        var comentario = $('#comentario').val();
                        // Enviar los datos a tu controlador para procesar la creación de la incidencia
                        $.ajax({
                            url: incidenciaNueva,
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}', // Agregar el token CSRF
                                subcategoriaId: subcategoriaId,
                                comentario: comentario
                            },
                            success: function(response) {
                                Swal.fire('¡Incidencia Creada!', '', 'success');
                            },
                            error: function(xhr, status, error) {
                                Swal.fire('Error', 'Hubo un problema al crear la incidencia.', 'error');
                            }
                        });
                    }
                });
            },
            error: function(xhr, status, error) {
                Swal.fire('Error', 'Hubo un problema al obtener las subcategorías.', 'error');
            }
        });
    });
});







          $(document).ready(function(){
              $("#crearHW").click(function(){ // Utiliza el ID del botón
                  // Definir la variable global con la URL de las subcategorías
                  var subcategoriasRoute = '{{ route("subcategorias", ["idCategoria" => 2]) }}';
                  var incidenciaNueva = '{{ route("crear.incidencia") }}';
  
                  // Obtener subcategorías con ID de categoría 1 desde la base de datos
                  $.ajax({
                      url: subcategoriasRoute,
                      method: 'GET',
                      success: function(response) {
                          // Crear opciones para el select con los datos obtenidos
                          var options = '';
                          response.forEach(function(subcategoria) {
                              options += '<option value="' + subcategoria.ID_subcategoria + '">' + subcategoria.Nombre_Subcategoria + '</option>';
                          });
                          // Mostrar SweetAlert con el select y espacio para el comentario
                          Swal.fire({
                              title: 'Crear Incidencia',
                              html:
                                  '<select id="subcategoria" class="swal2-input">' +
                                  options +
                                  '</select>' +
                                  '<textarea id="comentario" class="swal2-textarea" placeholder="Comentario"></textarea>',
                              focusConfirm: false,
                              preConfirm: () => {
                                  // Obtener los valores seleccionados
                                  var subcategoriaId = $('#subcategoria').val();
                                  var comentario = $('#comentario').val();
                                  // Enviar los datos a tu controlador para procesar la creación de la incidencia
                                  $.ajax({
                                      url: incidenciaNueva, // Reemplaza con la URL correcta
                            
                                      method: 'POST',
                                      data: {
                                        _token: '{{ csrf_token() }}', // Agregar el token CSRF
                                          subcategoriaId: subcategoriaId,
                                          comentario: comentario
                                      },
                                      success: function(response) {
                                          Swal.fire('¡Incidencia Creada!', '', 'success');
                                      },
                                      error: function(xhr, status, error) {
                                          Swal.fire('Error', 'Hubo un problema al crear la incidencia.', 'error');
                                      }
                                  });
                              }
                          });
                      },
                      error: function(xhr, status, error) {
                          Swal.fire('Error', 'Hubo un problema al obtener las subcategorías.', 'error');
                      }
                  });
              });
          });
      </script>
    
  
</body>
</html>