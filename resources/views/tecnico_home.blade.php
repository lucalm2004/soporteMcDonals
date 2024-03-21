<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/userhome.css') }}">
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
            <img class="logo"
                src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/4cfdcb5a-0137-4457-8be1-6e7bd1f29ebb"
                alt="" />
            <ul>
                <li id="homepage" class="nav-item active">
                    <b></b>
                    <b></b>
                    <a href="#">
                        <i class="fa fa-house nav-icon"></i>
                        <span class="nav-text">Home</span>
                    </a>
                </li>

                <li id="incipage" class="nav-item">
                    <b></b>
                    <b></b>
                    <a href="#">
                        <i class="fa fa-user nav-icon"></i>
                        <span class="nav-text">Incidencias</span>
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
                                <img src="https://www.ejeprime.com/files//fotos/ciudades/22@-recurso-728.jpg"
                                    alt="tennis" />
                                <div class="overlay">
                                    <h3>Barcelona</h3>
                                </div>
                            </div>

                            <div class="image-container img-two">
                                <img src="https://mitreworkspace.com/wp-content/uploads/2017/04/alquiler-oficinas-barcelona-sarria-santgervasi-workspace-business-center-centro-negocios-2-1.jpg.webp"
                                    alt="hiking" />
                                <div class="overlay">
                                    <h3>Oficinas Agbar</h3>
                                </div>
                            </div>

                            <div class="image-container img-three">
                                <img src="https://www.roomdiseno.com/wp-content/uploads/2020/07/Cube_Berlin-3XN-roomdiseno16-750x500.jpg"
                                    alt="running" />
                                <div class="overlay">
                                    <h3>Berlin</h3>
                                </div>
                            </div>

                            <div class="image-container img-four">
                                <img src="https://images.adsttc.com/media/images/61d6/c116/3e4b/31d9/0100/0020/medium_jpg/JWA30.jpg?1641464075"
                                    alt="cycling" />
                                <div class="overlay">
                                    <h3>Oficinas Cube</h3>
                                </div>
                            </div>

                            <div class="image-container img-five">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Edif%C3%ADcio_Montreal_01.JPG/640px-Edif%C3%ADcio_Montreal_01.JPG"
                                    alt="yoga" />
                                <div class="overlay">
                                    <h3>Montreal</h3>
                                </div>
                            </div>

                            <div class="image-container img-six">
                                <img src="https://metspace.com/wp-content/uploads/2023/10/6291ee6e64be79cce51b0d7f_montreal_cowork-header.png"
                                    alt="swimming" />
                                <div class="overlay">
                                    <h3>Oficina Montreal 21</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="left-bottom">
                        <div class="weekly-schedule">
                            <h1>Mis incidencias a resolver</h1>
                            <div class="calendar">
                                <div class="day-and-activity activity-one">
                                    <div class="day">
                                        <h1>01</h1>
                                        <p>SW</p>
                                    </div>
                                    <div class="activity">
                                        <h2>Tienes incidencias pendientes...</h2>
                                        <div class="participants">
                                            <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/e082b965-bb88-4192-bce6-0eb8b0bf8e68"
                                                style="--i: 4" alt="" />
                                        </div>
                                    </div>
                                    <button id="incipage2" class="btn">Ver incidencias</button>
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
                        <h4><?php $user = session('usuario');
                        echo $user->Nom_Usuario; ?></h4>
                        <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/40b7cce2-c289-4954-9be0-938479832a9c"
                            alt="user" />
                    </div>



                    <div class="friends-activity">
                        <h1>Valoraciones</h1>
                        <div class="card-container">
                            <div class="card">
                                <div class="card-user-info">
                                    <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/9290037d-a5b2-4f50-aea3-9f3f2b53b441"
                                        alt="" />
                                    <h2>Jane</h2>
                                </div>
                                <img class="card-img"
                                    src="https://media.licdn.com/dms/image/C4E0DAQHtvwXaDzQZzA/learning-public-crop_288_512/0/1568667753141?e=2147483647&v=beta&t=5D1TuC49hG8L86aLexLgxT8vZK_37h1ZgRRRyCgTbgo"
                                    alt="" />
                                <p>"Acceso remoto solucionado rapidamente. Gracias por vuestra ayuda tan útil y
                                    confiable."🎉</p>
                            </div>

                            <div class="card card-two">
                                <div class="card-user-info">
                                    <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/42616ef2-ba96-49c7-80ea-c3cf1e2ecc89"
                                        alt="" />
                                    <h2>Mike</h2>
                                </div>
                                <img class="card-img"
                                    src="https://cdn.computerhoy.com/sites/navi.axelspringer.es/public/media/image/2021/03/oficina-casa-2251675.jpg"
                                    alt="" />
                                <p>"La reparación del monitor fue rápida."💪</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <section id="incidenciasTecnico" class="content-section">
          <h2>Incidencias para el técnico</h2>
          <table>
              <thead>
                  <tr>
                      <th>Fecha de Alta</th>
                      <th>Estado</th>
                      <th>Prioridad</th>
                  </tr>
              </thead>
              <tbody>
                  @if($incidencias->isEmpty())
                      <tr>
                          <td colspan="3">No hay incidencias para mostrar</td>
                      </tr>
                  @else
                      @foreach($incidencias as $incidencia)
                          <tr>
                              <td>{{ $incidencia->Data_Alta }}</td>
                              <td>{{ $incidencia->Estado }}</td>
                              <td>{{ $incidencia->Prioridad }}</td>
                          </tr>
                      @endforeach
                  @endif
              </tbody>
          </table>
      </section>
      
      

    </main>

    <script src="{{ asset('js/home.js') }}"></script>
    <script>
        document.getElementById('homepage').addEventListener('click', function() {
            document.getElementById('incidenciasTecnico').style.display = 'none';
            document.getElementById('homeContent').style.display = 'grid';
        });

        document.getElementById('incipage').addEventListener('click', function() {
            document.getElementById('homeContent').style.display = 'none';
            document.getElementById('incidenciasTecnico').style.display = 'grid';
        });

        // Event listener para el botón Ver incidencias
        document.getElementById('incipage2').addEventListener('click', function() {
            document.getElementById('homeContent').style.display = 'none';
            document.getElementById('incidenciasTecnico').style.display = 'grid';
        });
    </script>


</body>

</html>
