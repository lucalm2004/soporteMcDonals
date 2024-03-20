<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                        <i class="fa fa-user nav-icon"></i>
                        <span  class="nav-text">Usuarios</span>
                    </a>
                </li>

                <li  id="incipage" class="nav-item">
                    <b></b>
                    <b></b>
                    <a href="#">
                        <i class="fa-solid fa-list"></i>
                        <span style="margin-left: 4%" class="nav-text">Categorias</span>
                    </a>
                </li>

                <li class="nav-item">
                    <b></b>
                    <b></b>
                    <a href="#">
                        <i class="fa-solid fa-layer-group"></i>
                        <span style="margin-left: 4%" class="nav-text">Subcategorias</span>
                    </a>
                </li>


            </ul>
        </nav>

        <section id="homeContent" class="content">
            <div class="left-content">
                <div class="activities">
                    <h1>Sedes</h1>
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
                
    </ul>

                <div class="left-bottom">
                    <div class="weekly-schedule">
                        <h1>Subcategorias</h1>
                        <div id="subCat" class="calendar">
                            

                            
                        </div>
                    </div>

                    <div class="personal-bests">
                        <h1>Categorias</h1>
                        <div class="personal-bests-container">
                            <div class="best-item box-one">
                                <p>Hay un total de: <?php use App\Models\categoria;
                                $countIncidencia = categoria::count();
                                echo $countIncidencia; ?> Categorias</p>
                            </div>
                            <?php
                            
                            $registros = categoria::all();

    // Verificar si se encontraron registros
    if ($registros->isNotEmpty()) {
        // Mostrar el primer registro
        echo "<div class='best-item box-two'>";
        echo "<p>" . $registros->first()->Nombre_Categoria . "</p>";
        echo "<img src='https://www.orientsoftware.com/Themes/OrientSoftwareTheme/Content/Images/blog/2021-10-13/software-engineering-practices-1.png' alt='' /> ";
        echo "</div>";

        // Mostrar el segundo registro si hay al menos dos registros
        if ($registros->count() >= 2) {
            echo "<div class='best-item box-three'>";
            echo "<p>" . $registros->skip(1)->first()->Nombre_Categoria . "</p>";
            echo "<img src='https://www.maticad.com/wp-content/uploads/2020/09/req_hard-1-1200x878.png' alt='' />";
            echo "</div>";
        }
    } else {
        echo 'No se encontraron registros.';
    }

                            ?>


                            

                        </div>
                        <button class='btn'>Ver Más</button>

                    </div>
                </div>
            </div>

            <div class="right-content">
                <div class="user-info">

                    <h4><?php $user = session('usuario');
                    echo $user->Nom_Usuario; ?></h4>
                    <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/40b7cce2-c289-4954-9be0-938479832a9c"
                        alt="user" />
                </div>

                <div class="active-calories">
                    <h1 style="align-self: flex-start">Total Usuarios</h1>
                    <div class="active-calories-container">
                        <div class="box" style="--i: <?php use App\Models\usuario;
                        $countUsers = usuario::count();
                        echo $countUsers; ?>%">
                            <div class="circle">
                                <h2><?php echo $countUsers; ?><small>%</small></h2>
                            </div>
                        </div>
                        <div class="calories-content">
                            <p><span>Admin's:</span> <?php $countAdmins = usuario::where('Rol', 'admin')->count();
                            echo $countAdmins; ?></p>
                            <p><span>Gestores:</span> <?php $countGestores = usuario::where('Rol', 'gestor')->count();
                            echo $countGestores; ?></p>
                            <p><span>Clientes:</span> <?php $countClientes = usuario::where('Rol', 'cliente')->count();
                            echo $countClientes; ?></p>
                            <p><span>Tecnicos:</span> <?php $countTenico = usuario::where('Rol', 'tecnico')->count();
                                echo $countTenico; ?></p>
                        </div>
                    </div>
                </div>

                <div class="mobile-personal-bests">
                    <h1>Personal Bests</h1>
                    <div class="personal-bests-container">
                        <div class="best-item box-one">
                            <p>Fastest 5K Run: 22min</p>
                            <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/05dfc444-9ed3-44cc-96af-a9cf195f5820"
                                alt="" />
                        </div>
                        <div class="best-item box-two">
                            <p>Longest Distance Cycling: 4 miles</p>
                            <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/9ca170e9-1252-4fa6-8677-36493540c1f2"
                                alt="" />
                        </div>
                        <div class="best-item box-three">
                            <p>Longest Roller-Skating: 2 hours</p>
                            <img src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/262d1611-ed4c-4297-981c-480cf7f95714"
                                alt="" />
                        </div>
                    </div>
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
        <section id="incidenciasContent" class="content-section" style="display: none;">

            <script>
                $(document).ready(function() {
                    $.ajax({
                        url: '{{ route("categorias.index") }}',
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
    <script src="{{ asset('js/subcategorias.js') }}"></script>

    <script src="https://kit.fontawesome.com/a7409f463b.js" crossorigin="anonymous"></script>
    <script>
        document.getElementById('homepage').addEventListener('click', function () {
        document.getElementById('incidenciasContent').style.display = 'none';
        document.getElementById('homeContent').style.display = 'grid';
    })

    document.getElementById('incipage').addEventListener('click', function () {
        document.getElementById('homeContent').style.display = 'none';
        document.getElementById('incidenciasContent').style.display = 'grid';
        listarCategorias();
    })
    </script>
</body>

</html>
