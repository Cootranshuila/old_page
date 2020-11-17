<?php 

    require "dashboard/ConexionBaseDatos_PDO.php";
    $conexion = conectaDb();

    date_default_timezone_set('America/Bogota');
    $fecha_comen = date("y-m-d");

    $contDY = "";
    $contVP = "";
    $contPE = "";
    $contPJ = "";
    $contPES = "";
    $contMI = "";

    $sql = $conexion->prepare("select * from comentarios");
    $sql->execute();
    $resultado = $sql->fetchAll();

    // foreach ($resultado as $row) {
    //     if ($row['comentario_flota'] == "Doble Yo") {
    //         $contDY = $contDY + 1;
    //     }
    //     if ($row['comentario_flota'] == "VIP") {
    //         $contVP = $contVP + 1;
    //     }
    //     if ($row['comentario_flota'] == "Platino Expres") {
    //         $contPE = $contPE + 1;
    //     }
    //     if ($row['comentario_flota'] == "Platino JET") {
    //         $contPJ = $contPJ + 1;
    //     }
    //     if ($row['comentario_flota'] == "Platino Especial") {
    //         $contPES = $contPES + 1;
    //     }
    //     if ($row['comentario_flota'] == "MIXTO") {
    //         $contMI = $contMI + 1;
    //     }
    // }

?>





<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- ICON -->
    <link rel="icon" type="image/png" href="assets/images/logo-icon.png" />
    <!-- Page Title -->
    <title>Cootranshuila Info</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="assets/css/simple-line-icons.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="assets/css/set1.css">
    <!-- Swipper Slider -->
    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Publicidad -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
         (adsbygoogle = window.adsbygoogle || []).push({
              google_ad_client: "ca-pub-6033859300113571",
              enable_page_level_ads: true
         });
    </script>

</head>

<body>

<!--============================= MODALES =============================-->


  <!-- MODAL ENCOMIENDAS -->
  <div class="modal fade" id="ModalEncomiendas">
    <div class="modal-dialog mw-100 w-75">
      <div class="modal-content">

        <!-- Modal body -->
        <div class="modal-body">
          <button type="button" class="close mt-4 mr-4" data-dismiss="modal">×</button>
          <div class="booking-checkbox_wrap mt-4">
                <img src="assets/images/loog.png" class="img-fluid img-loo" width="60">
                <h5>Servicios de Encomiendas</h5>
                <hr>
                <div class="container">
                    <div class="customer-content">
                        <div class="customer-review">
                            </br>
                            <h6>ENCOMIENDAS</h6>
                            </br>
                        </div>
                        <div class="customer-rating">9.0</div>
                    </div>
                    <p class="customer-text">Contamos con una moderna flota de furgones para transportar carga de forma confiable y segura. Nuestro servicio de carga se ha logrado extender a los departamentos de: Antioquia, Valle del Cauca, Risaralda y Tolima logrando un cubrimiento del 50% del territorio nacional.
                    </p>
                    <br>
                    <div class="col-lg-6 col-md-12">
                        <p class="customer-text">Prestamos los servicios de carga en todo el país a:</p>
                        <div class="row col-md-12">
                            <div class="col-md-12">
                                <label class="custom-checkbox">
                                    <span class="ti-check-box"></span>
                                    <span class="custom-control-description">Personas naturales.</span>
                                </label> 
                            </div>
                            <div class="col-md-12">
                                <label class="custom-checkbox">
                                   <span class="ti-check-box"></span>
                                   <span class="custom-control-description">Convenios Institucionales.  </span>
                                </label>
                            </div>
                            <div class="col-md-12">
                                <label class="custom-checkbox">
                                   <span class="ti-check-box"></span>
                                   <span class="custom-control-description">Recogida en ciudades principales.  </span>
                                </label>
                            </div>

                            <br>
                            <p class="customer-text">Modalidades del servicio de carga:</p>

                            <div class="col-md-12">
                                <label class="custom-checkbox">
                                    <span class="ti-check-box"></span>
                                    <span class="custom-control-description">Contado.</span>
                                </label> 
                            </div>
                            <div class="col-md-12">
                                <label class="custom-checkbox">
                                   <span class="ti-check-box"></span>
                                   <span class="custom-control-description">Crédito.</span>
                                </label>
                            </div>
                            <div class="col-md-12">
                                <label class="custom-checkbox">
                                   <span class="ti-check-box"></span>
                                   <span class="custom-control-description">Contraentrega.</span>
                                </label>
                            </div>
                            <br><br><br>
                            <div class="col-md-12">
                              <a href="assets/documents/condicion_empresa.pdf" target="_blank"><span class="custom-control-description"><b>Ver contrato de trasnporte terrestre de encomiendas.</b></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 enco">
                        <div class="col-md-12">
                            <img src="assets/images/img/flota/encomiendas.png" class="img-fluid" />
                        </div>
                    </div>
                    <br><br><br>

                    <div class="row col-md-12">
                        <div class="columEnco col-lg-4 col-md-12">
                            <h6><strong>Encomiendas Neiva</strong></h6>
                            <div class="copyright">
                                <ul>
                                    <li><span class="ti-mobile"></span>&nbsp;&nbsp;(8)8701505 | 8708255</a></li><br>
                                </ul>
                            </div>
                        </div>
                        <div class="columEnco col-lg-4 col-md-12">
                            <h6><strong>Encomiendas Bogota</strong></h6>
                            <div class="copyright">
                                <ul>
                                    <li><span class="ti-mobile"></span>&nbsp;&nbsp;5616868 | 5818889</a></li><br>
                                </ul>
                            </div>
                        </div>
                        <div class="columEnco col-lg-4 col-md-12">
                            <h6><strong>Encomiendas Florencia</strong></h6>
                            <div class="copyright">
                                <ul>
                                    <li><span class="ti-mobile"></span>&nbsp;&nbsp;4354848</a></li><br>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <p style="text-align: center;">&copy;Cootranshuila 2018</p>
                    </div>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>

  <!-- MODAL ESTACION SERVICIOS -->
  <div class="modal fade" id="ModalEstacion">
    <div class="modal-dialog mw-100 w-75">
      <div class="modal-content">

        <!-- Modal body -->
        <div class="modal-body">
          <img src="assets/images/loog.png" class="img-fluid img-loo mt-4 ml-3" width="60">
          <button type="button" class="close mt-4 mr-4" data-dismiss="modal">×</button>
          <div class="booking-checkbox_wrap mt-4">
                <h5>Estacion de Servicios</h5>
                <hr>
                <br>
                <div class="container">
                    <p class="customer-text">Contamos con 65 años de experiencia en el mercado. Ofrecemos una Excelente ubicación frente a la glorieta de la cruz roja Neiva.
                    </p>
                    <br>


                    <div class="row col-md-12">
                        <div class="col-lg-6 col-md-12">
                            <p class="customer-text">Nuestro portafolio de servicios consta de:</p>
                            <br><br>
                            <div class="row col-md-12">
                                <div class="col-md-12">
                                    <label class="custom-checkbox">
                                        <span class="ti-check-box"></span>
                                        <span class="custom-control-description">Venta de gasolina (Súper, Corriente y ACPM) las 24 horas.</span>
                                    </label> 
                                </div>
                                <div class="col-md-12">
                                    <label class="custom-checkbox">
                                       <span class="ti-check-box"></span>
                                       <span class="custom-control-description">(GNV) Gas Natural Vehicular las 24 horas.  </span>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="custom-checkbox">
                                       <span class="ti-check-box"></span>
                                       <span class="custom-control-description">Lavado de autos  </span>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="custom-checkbox">
                                       <span class="ti-check-box"></span>
                                       <span class="custom-control-description">Pulida  </span>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="custom-checkbox">
                                       <span class="ti-check-box"></span>
                                       <span class="custom-control-description">Lavado de tapizado  </span>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="custom-checkbox">
                                       <span class="ti-check-box"></span>
                                       <span class="custom-control-description">Cambio de aceite </span>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="custom-checkbox">
                                       <span class="ti-check-box"></span>
                                       <span class="custom-control-description">Engrase  </span>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="custom-checkbox">
                                       <span class="ti-check-box"></span>
                                       <span class="custom-control-description">Montaje de llantas  </span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <p class="customer-text">Vendemos todo lo relacionado al mantenimiento de su automóvil:</p>
                            <br>
                            <div class="row col-md-12">
                                <div class="col-md-12">
                                    <label class="custom-checkbox">
                                        <span class="ti-check-box"></span>
                                        <span class="custom-control-description">Lubricantes</span>
                                    </label> 
                                </div>
                                <div class="col-md-12">
                                    <label class="custom-checkbox">
                                       <span class="ti-check-box"></span>
                                       <span class="custom-control-description">Refrigerantes  </span>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="custom-checkbox">
                                       <span class="ti-check-box"></span>
                                       <span class="custom-control-description">Grasas  </span>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="custom-checkbox">
                                       <span class="ti-check-box"></span>
                                       <span class="custom-control-description">Líquido de frenos  </span>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="custom-checkbox">
                                       <span class="ti-check-box"></span>
                                       <span class="custom-control-description">Agua de batería  </span>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="custom-checkbox">
                                       <span class="ti-check-box"></span>
                                       <span class="custom-control-description">Silicona  </span>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="custom-checkbox">
                                       <span class="ti-check-box"></span>
                                       <span class="custom-control-description">Cera  </span>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="custom-checkbox">
                                       <span class="ti-check-box"></span>
                                       <span class="custom-control-description">Porcelana  </span>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="custom-checkbox">
                                       <span class="ti-check-box"></span>
                                       <span class="custom-control-description">Filtros  </span>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label class="custom-checkbox">
                                       <span class="ti-check-box"></span>
                                       <span class="custom-control-description">Ambientadores </span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div id="myCarousel" class="carousel slide col-md-12 ml-3 mt-4" data-ride="carousel">

                          <!-- Indicators -->
                          <ul class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                          </ul>
                          
                          <!-- The slideshow -->
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img src="assets/images/img/ES-Slide01.jpg" class="img-fluid">
                            </div>
                            <div class="carousel-item">
                              <img src="assets/images/img/ES-Slide02.jpg" class="img-fluid">
                            </div>
                          </div>
                          
                          <!-- Left and right controls -->
                          <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                          </a>
                          <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                          </a>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <p style="text-align: center;">&copy;Cootranshuila 2018</p>
                    </div>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>

    <!-- =================== MODAL COMENTARIOS ============================ -->


    <div class="modal fade" id="ModalComentarios">
        <div class="modal-dialog mw-100 w-75">
          <div class="modal-content">
          
            <!-- Modal Header -->

            <div class="modal-header">
              <img src="assets/images/loog.png" class="ml-2 img-fluid" width="60">
              <h4 class="ml-3 mt-3 modal-title" id="titulo_comen"></h4>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div id="mostrarComen">
                
            </div>
            
                <div class="row justify-content-center">
                    <div class="col-md-4 mt-3 mb-2">
                        <div class="featured-btn-wrap">
                            <button class="btn btn-danger" data-toggle="collapse" data-target="#comentar"><span class="icon-like"></span> COMENTAR</button>
                        </div>
                    </div>
                    <div class="container col-md-10">
                    <div id="comentar" class="collapse"><hr>
                      <form action="dashboard/enviar.php?comentario" method="POST" id="form-comentario">
                            <div class="container">
                              <div class="row">
                                  <div class="form-group col-md-6 ">
                                    <label for="nombre_usuario" class="ml-2">Nombre: </label>
                                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Escriba su nombre" required="required">
                                  </div>
                                  <div class="form-group col-md-6 ">
                                    <label for="genero_usuario" class="ml-2">Genero: </label>
                                    <select class="form-control" name="genero_usuario" id="genero_usuario">
                                        <option value="Hombre">Seleccione</option>
                                        <option value="Hombre">Masculino</option>
                                        <option value="Mujer">Femenino</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-12">
                                    <label for="comentario" class="ml-2">Comentario:</label>
                                    <textarea class="form-control" rows="5" id="comentario" name="comentario" placeholder="Escriba el comentario" required="required"></textarea>
                                  </div>
                                  <input type="text" class="d-none" id="comentario_flota" name="comentario_flota">
                              </div>
                              <div class="justify-content-center">
                                    <div class="col-md-12 mb-2">
                                        <div class="featured-btn-wrap">
                                            <input type="submit" class="btn btn-danger" value="Enviar">
                                        </div>
                                    </div>
                              </div>
                              <div id="alertComen" class="alert mt-3 d-none row justify-content-center">
                                <strong>Enviado!</strong> &nbsp;Comentario enviado correctamente.
                               </div>
                            </div>
                       </form>
                    </div>
                  </div>
                </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
            
          </div>
        </div>
      </div>



    <!-- ======================== FIN MODAL COMENTARIOS ======================= -->


<!--============================= FIN DE MODALES =============================-->
    <!--============================= HEADER =============================-->
    <div class="dark-bg sticky-top">
        <div class="transition">
            <div class="container-fluid is-sticky">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" class="logo img-fluid"></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-menu"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav nav-tabs">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link1 nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Empresa<span class="icon-arrow-down"></span></a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="info.php?empresa=historia">Historia</a>
                                            <a class="dropdown-item" href="info.php?empresa=empresa">Nuestra empresa</a>
                                            <a class="dropdown-item" href="informacion-dian.php">Esal - 2019</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link1 nav-link" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Servicios<span class="icon-arrow-down"></span> </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="https://cootranshuila.teletiquete.com/">Tiquetes online</a>
                                            <a class="dropdown-item" href="info.php?especial">Servicio Especial</a>
                                            <a class="dropdown-item" href="#" id="estacionN">Estacion de servicios</a>
                                            <a class="dropdown-item" href="#" id="encomiendasN">Carga y encomiendas</a>
                                            <a class="dropdown-item" href="info.php?flota">Transporte de pasajeros</a> 
                                        </div>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link1 nav-link" href="index.php#oficinas">Oficinas</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link1 nav-link" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Corporativo<span class="icon-arrow-down"></span></a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="https://silogcootranshuilaerp.sitrans.com.co">Silog Sitrans</a>
                                            <a class="dropdown-item" href="https://accounts.google.com/signin/v2/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ltmpl=default&hd=cootranshuila.com&service=mail&sacu=1&rip=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin">Correo corporativo</a>
                                            <!-- <a class="dropdown-item" href="reporte_fallas/Index.php">Reportes y operativos</a> -->
                                            <a class="dropdown-item" href="dashboard-design/login.php">Administrador</a>
                                        </div>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link1 nav-link" href="info.php?politica">Politica de datos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link1 nav-link" href="info.php?siplat">Siplat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link1 nav-link" href="index.php#contacto">Contactenos</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--//END HEADER -->



    <!-- =================================FLOTA============================== -->
<?php 
extract($_REQUEST);
if (isset($_REQUEST['flota'])) { ?>

    <!--============================= BOOKING =============================-->
    <div class="slide-flota">
        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <a href="assets/images/img/flota/dbleyo.jpg" class="grid image-link">
                        <img src="assets/images/img/flota/dbleyo.jpg" class="img-fluid" alt="#">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="assets/images/img/flota/preferencial-vip.jpg" class="grid image-link">
                        <img src="assets/images/img/flota/preferencial-vip.jpg" class="img-fluid" alt="#">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="assets/images/img/flota/Micropref.jpg" class="grid image-link">
                        <img src="assets/images/img/flota/Micropref.jpg" class="img-fluid" alt="#">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="assets/images/img/flota/colectivo.jpg" class="grid image-link">
                        <img src="assets/images/img/flota/colectivo.jpg" class="img-fluid" alt="#">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="assets/images/img/flota/mixto.png" class="grid image-link">
                        <img src="assets/images/img/flota/mixto.png" class="img-fluid" alt="#">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="assets/images/img/flota/especial.png" class="grid image-link">
                        <img src="assets/images/img/flota/especial.png" class="img-fluid" alt="#">
                    </a>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>
    </div>
    <!--//END BOOKING -->
    <!--============================= RESERVE A SEAT =============================-->
    <section class="reserve-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Nuestra Flota</h5>
                    <p class="reserve-description">Cootranshuila LTDA, líder en el sector transportador de Colombia.</p>
                </div>
                <div class="col-md-6">
                    <div class="reserve-seat-block">
                        <div class="reserve-btn">
                            <div class="featured-btn-wrap">
                                <a href="index.php" class="btn btn-danger">COMPRAR TIQUETE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END RESERVE A SEAT -->
    <!--============================= BOOKING DETAILS =============================-->
    <section class="light-bg booking-details_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8 responsive-wrap">
                    <div class="booking-checkbox_wrap">
                        <div class="booking-checkbox">
                            <p>La COOPERATIVA DE TRANSPORTADORES DEL HUILA “COOTRANSHUILA LTDA” dedicada a la prestación de Servicio de Transporte Publico Terrestre, se complace en presentarle su flota y cada uno de sus servicios. <br><br>Conozca los terminos y condiciones de transporte de pasajeros dando <a href="assets/documents/CONDICIONES.pdf" target="_blank" style="color: #737882;"><b>Click Aqui.</b></a></p>
                            <hr> 
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="#dobleyo" style="cursor: pointer;">
                                    <label class="custom-checkbox" >
                                        <span class="ti-check-box"></span>
                                        <span class="custom-control-description" style="cursor: pointer;">Doble Yo</span>
                                    </label> 
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#vip">
                                    <label class="custom-checkbox">
                                       <span class="ti-check-box"></span>
                                       <span class="custom-control-description" style="cursor: pointer;">Preferencial VIP  </span>
                                    </label>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#expres">
                                    <label class="custom-checkbox">
                                        <span class="ti-check-box"></span>
                                        <span class="custom-control-description" style="cursor: pointer;">Platino Expres  </span>
                                    </label>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#jet">
                                    <label class="custom-checkbox">
                                        <span class="ti-check-box"></span>
                                        <span class="custom-control-description" style="cursor: pointer;">Platino Jet </span>
                                    </label>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#especial">
                                    <label class="custom-checkbox">
                                      <span class="ti-check-box"></span>
                                      <span class="custom-control-description" style="cursor: pointer;">Platino Especial</span>
                                    </label>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#mixto">
                                    <label class="custom-checkbox">
                                        <span class="ti-check-box"></span>
                                        <span class="custom-control-description" style="cursor: pointer;">Mixto</span>
                                    </label>
                                </a>
                            </div>
                            <div id="dobleyo"></div>
                        </div>
                    </div>
                    
                    <div class="booking-checkbox_wrap mt-4">
                        <h5>Servicios de Flota</h5>
                        <hr>

                        <!-- INICIO DE SERVICO DOBLE YO -->

                        <div class="customer-review_wrap">
                            <div class="customer-img">
                                <img src="assets/images/img/flota/customer-dble.jpg" class="img-fluid" alt="#">
                                <p>Doble Yo</p>
                                <span>46 Sillas</span>
                            </div>
                            <div class="customer-content-wrap">
                                <div class="customer-content">
                                    <div class="customer-review">
                                        </br>
                                        <h6>Servicio DOBLE YO</h6>
                                        </br>
                                    </div>
                                    <div class="customer-rating">9.5</div>
                                </div>
                                <p class="customer-text">Cootranshuila LTDA, líder en el sector transportador de Colombia, ofrece el servicio <strong>DOBLE YO</strong>, que cuenta con los siguientes servicios:
                                </p>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">Cómodas sillas tipo cama en cuero</span>
                                        </label> 
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                           <span class="ti-check-box"></span>
                                           <span class="custom-control-description">Aire acondicionado regulado  </span>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">Toma corrientes electricos para dispositivos moviles  </span>
                                        </label> 
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">Centro de entretenimineto individual </span>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                          <span class="ti-check-box"></span>
                                          <span class="custom-control-description">Sistema de control de velocidad</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">Baño en cada nivel</span>
                                        </label> 
                                    </div>
                                    <div class="col-md-6">
                                        <label class="custom-checkbox">
                                          <span class="ti-check-box"></span>
                                          <span class="custom-control-description">Refrigerio</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="custom-checkbox">
                                          <span class="ti-check-box"></span>
                                          <span class="custom-control-description">Cobijas higienizadas</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="custom-checkbox">
                                          <span class="ti-check-box"></span>
                                          <span class="custom-control-description">Sistema de vigía</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="custom-checkbox">
                                          <span class="ti-check-box"></span>
                                          <span class="custom-control-description">Seguimiento satelital</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="custom-checkbox">
                                          <span class="ti-check-box"></span>
                                          <span class="custom-control-description">WiFi</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="custom-checkbox">
                                          <span class="ti-check-box"></span>
                                          <span class="custom-control-description">Cámaras de seguridad</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="custom-checkbox">
                                          <span class="ti-check-box"></span>
                                          <span class="custom-control-description">Vehículos último modelo</span>
                                        </label>
                                    </div>
                                </div>

                                <ul>
                                    <li><img src="assets/images/img/flota/dbleyo01.jpg" class="img-fluid" alt="#"></li>
                                    <li><img src="assets/images/img/flota/dbleyo02.jpg" class="img-fluid" alt="#"></li>
                                    <li><img src="assets/images/img/flota/dbleyo03.jpg" class="img-fluid" alt="#"></li>
                                </ul>
                                <div id="vip"></div>
                                <span id="comentarios" style="cursor: pointer;"><?php echo $contDY; ?> Comentarios sobre este servicio</span>
                                <a id="comentarios1"><span class="icon-like"></span>Comentar</a>
                                <div class="loading mt-4 mr-4 d-none" id="loading"></div>
                            </div>
                        </div>

                        <!-- FIN SERVICIO DOBLE YO -->

                        <!-- INICIO SERVICIO PREFERENCIAL VIP -->

                        <hr>
                        <div class="customer-review_wrap">
                            <div class="customer-img">
                                <img src="assets/images/img/flota/customer-VIP.jpg" class="img-fluid" alt="#">
                                <p>Preferencial VIP</p>
                                <span>42 Sillas</span>
                            </div>
                            <div class="customer-content-wrap">
                                <div class="customer-content">
                                    <div class="customer-review">
                                        </br>
                                        <h6>Servicio Preferencial VIP</h6>
                                        </br>
                                    </div>
                                    <div class="customer-rating">9.0</div>
                                </div>
                                <p class="customer-text">Cootranshuila LTDA, líder en el sector transportador de Colombia, ofrece un servicio de Lujo <strong>VIP</strong>, que cuenta con los siguientes servicios:
                                </p>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">Cómodas sillas reclinables</span>
                                        </label> 
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                           <span class="ti-check-box"></span>
                                           <span class="custom-control-description">WiFi (Somos la primera empresa en Colombia en prestar este servicio)</span>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">Uno o dos baños a bordo (dependiendo del modelo del vehículo)  </span>
                                        </label> 
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">Multiples TV </span>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                          <span class="ti-check-box"></span>
                                          <span class="custom-control-description">Refrigerio</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">Sistema de control de velocidad</span>
                                        </label> 
                                    </div>
                                    <div class="col-md-6">
                                        <label class="custom-checkbox">
                                          <span class="ti-check-box"></span>
                                          <span class="custom-control-description">Sistema de vigía</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="custom-checkbox">
                                          <span class="ti-check-box"></span>
                                          <span class="custom-control-description">Seguimiento satelital</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="custom-checkbox">
                                          <span class="ti-check-box"></span>
                                          <span class="custom-control-description">Aire acondicionado</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="custom-checkbox">
                                          <span class="ti-check-box"></span>
                                          <span class="custom-control-description">Cámaras de seguridad</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="custom-checkbox">
                                          <span class="ti-check-box"></span>
                                          <span class="custom-control-description">Vehículos último modelo</span>
                                        </label>
                                    </div>
                                </div>

                                <ul>
                                    <li><img src="assets/images/img/flota/vip01.jpg" class="img-fluid" alt="#"></li>
                                    <li><img src="assets/images/img/flota/vip02.jpg" class="img-fluid" alt="#"></li>
                                    <li><img src="assets/images/img/flota/vip03.jpg" class="img-fluid" alt="#"></li>
                                </ul>
                                <div id="expres"></div>
                                <span id="comentarios2" style="cursor: pointer;"><?php echo $contVP; ?> Comentarios sobre este servicio</span>
                                <a id="comentarios22"><span class="icon-like"></span>Comentar</a>
                                <div class="loading mt-4 mr-4 d-none" id="loading2"></div>
                            </div>
                        </div>

                        <!-- FIN DE SERVICIO PREFERENCIAL VIP -->

                        <!-- INICIO DEL SERVICIO Platino Expres -->

                        <hr>
                        <div class="customer-review_wrap">
                            <div class="customer-img">
                                <img src="assets/images/img/flota/customer-expres.jpg" class="img-fluid" alt="#">
                                <p>Platino Expres</p>
                                <span>36 Sillas</span>
                            </div>
                            <div class="customer-content-wrap">
                                <div class="customer-content">
                                    <div class="customer-review">
                                        </br>
                                        <h6>Servicio Platino Expres</h6>
                                        </br>
                                    </div>
                                    <div class="customer-rating">8.0</div>
                                </div>
                                <p class="customer-text">Cootranshuila LTDA, líder en el sector transportador de Colombia, ofrece el servicio mini-preferencial <strong>Platino Expres</strong>, que cuenta con los siguientes servicios:
                                </p>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">Cómodas sillas reclinables</span>
                                        </label> 
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                           <span class="ti-check-box"></span>
                                           <span class="custom-control-description">Baño a bordo (dependiendo del modelo del vehículo)</span>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">TV</span>
                                        </label> 
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">Sistema de control de velocidad</span>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                          <span class="ti-check-box"></span>
                                          <span class="custom-control-description">Sistema de vigía</span>
                                        </label>
                                    </div>
                                </div>

                                <ul>
                                    <li><img src="assets/images/img/flota/express01.jpg" class="img-fluid" alt="#"></li>
                                    <li><img src="assets/images/img/flota/express02.jpg" class="img-fluid" alt="#"></li>
                                    <li><img src="assets/images/img/flota/express03.jpg" class="img-fluid" alt="#"></li>
                                </ul>
                                <div id="jet"></div>
                                <span id="comentarios3" style="cursor: pointer;"><?php echo $contPE; ?> Comentarios sobre este servicio</span>
                                <a id="comentarios33"><span class="icon-like"></span>Comentar</a>
                                <div class="loading mt-4 mr-4 d-none" id="loading3"></div>
                            </div>
                        </div>

                        <!-- FIN DE SERVICIO PLATINO EXPRES -->

                        <!-- INICIO DE SERVICIO PLATINO JET -->

                        <hr>
                        <div class="customer-review_wrap">
                            <div class="customer-img">
                                <img src="assets/images/img/flota/customer-jet.jpg" class="img-fluid" alt="#">
                                <p>Platino JET</p>
                                <span>18 Sillas</span>
                            </div>
                            <div class="customer-content-wrap">
                                <div class="customer-content">
                                    <div class="customer-review">
                                        </br>
                                        <h6>Servicio Platino JET</h6>
                                        </br>
                                    </div>
                                    <div class="customer-rating">8.0</div>
                                </div>
                                <p class="customer-text">Cootranshuila LTDA, líder en el sector transportador de Colombia, ofrece un servicio de Lujo <strong>Platino Jet</strong>, que cuenta con los siguientes servicios:
                                </p>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">Cómodas sillas reclinables</span>
                                        </label> 
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">TV</span>
                                        </label> 
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">Sistema de control de velocidad</span>
                                        </label>
                                    </div>
                                </div>

                                <ul>
                                    <li><img src="assets/images/img/flota/jep01.jpg" class="img-fluid" alt="#"></li>
                                    <li><img src="assets/images/img/flota/jep02.jpg" class="img-fluid" alt="#"></li>
                                    <!-- <li><img src="images/img/flota/jep03.jpg" class="img-fluid" alt="#"></li> -->
                                </ul>
                                <div id="especial"></div>
                                <span id="comentarios4" style="cursor: pointer;"><?php echo $contPJ; ?> Comentarios sobre este servicio</span>
                                <a id="comentarios44"><span class="icon-like"></span>Comentar</a>
                                <div class="loading mt-4 mr-4 d-none" id="loading4"></div>
                            </div>
                        </div>

                        <!-- FIN DE SERVICIO PLATINO JET -->

                        <!-- INICIO DE SERVICIO PLATINO ESPECIAL -->

                        <hr>
                        <div class="customer-review_wrap">
                            <div class="customer-img">
                                <img src="assets/images/img/flota/customer-especial.jpg" class="img-fluid" alt="#">
                                <p>Platino Especial</p>
                                <span>19 Sillas</span>
                            </div>
                            <div class="customer-content-wrap">
                                <div class="customer-content">
                                    <div class="customer-review">
                                        </br>
                                        <h6>Servicio Platino Especial</h6>
                                        </br>
                                    </div>
                                    <div class="customer-rating">7.0</div>
                                </div>
                                <p class="customer-text">Cootranshuila LTDA, líder en el sector transportador de Colombia, ofrece un servicio de Lujo <strong>Platino Especial</strong>, que cuenta con los siguientes servicios:
                                </p>
                                <br>
                                <div class="row">
                                    <p class="customer-text">BUSES:</p>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">Cómodas sillas reclinables</span>
                                        </label> 
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                           <span class="ti-check-box"></span>
                                           <span class="custom-control-description">Aire acondicionado</span>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">Multiples TV</span>
                                        </label> 
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">Sistema de control de velocidad</span>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                          <span class="ti-check-box"></span>
                                          <span class="custom-control-description">Sistema de vigía</span>
                                        </label>
                                    </div>
                                    <br>
                                    <br>
                                    <p class="customer-text">CAMIONETAS:</p>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">Ultimo modelo</span>
                                        </label> 
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                           <span class="ti-check-box"></span>
                                           <span class="custom-control-description">Aire acondicionado</span>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">Sistema de barra anti - vuelco</span>
                                        </label> 
                                    </div>
                                    <div class="col-md-12">
                                        <label class="custom-checkbox">
                                            <span class="ti-check-box"></span>
                                            <span class="custom-control-description">Extintores externos</span>
                                        </label>
                                    </div>
                                </div>

                                <ul>
                                    <li><img src="assets/images/img/flota/especial01.jpg" class="img-fluid" alt="#"></li>
                                    <li><img src="assets/images/img/flota/especial02.jpg" class="img-fluid" alt="#"></li>
                                    <!-- <li><img src="images/img/flota/camara.png" class="img-fluid" alt="#"></li> -->
                                </ul>
                                <div id="mixto"></div>
                                <span id="comentarios5" style="cursor: pointer;"><?php echo $contPES; ?> Comentarios sobre este servicio</span>
                                <a id="comentarios55"><span class="icon-like"></span>Comentar</a>
                                <div class="loading mt-4 mr-4 d-none" id="loading5"></div>
                            </div>
                        </div>

                        <!-- FIN DE SERVICIO PLATINO ESPECIAL -->

                        <!-- INICIO DE SERVICIO MIXTOS -->

                        <hr>
                        <div class="customer-review_wrap">
                            <div class="customer-img">
                                <img src="assets/images/img/flota/customer-mixto.jpg" class="img-fluid" alt="#">
                                <p>MIXTO</p>
                                <span>40 Sillas</span>
                            </div>
                            <div class="customer-content-wrap">
                                <div class="customer-content">
                                    <div class="customer-review">
                                        </br>
                                        <h6>Servicio de MIXTO</h6>
                                        </br>
                                    </div>
                                    <div class="customer-rating">6.0</div>
                                </div>
                                <p class="customer-text">Cootranshuila LTDA, líder en el sector transportador de Colombia, ofrece el servicio <strong>Mixto</strong> corriente
                                </p>                                    

                                <ul>
                                    <!-- <li><img src="images/img/flota/camara.png" class="img-fluid" alt="#"></li>
                                    <li><img src="images/img/flota/camara.png" class="img-fluid" alt="#"></li>
                                    <li><img src="images/img/flota/camara.png" class="img-fluid" alt="#"></li> -->
                                </ul>
                                <span id="comentarios6" style="cursor: pointer;"><?php echo $contMI; ?> Comentarios sobre este servicio</span>
                                <a id="comentarios66"><span class="icon-like"></span>Comentar</a>
                                <div class="loading mt-4 mr-4 d-none" id="loading6"></div>
                            </div>
                        </div>

                        <!-- FIN DE SERVICIO MIXTOS -->
                        <hr>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-info d-none">
                        <a href="https://www.google.com.co/maps/place/Gazel+Cootranshuila/@2.9422007,-75.2985641,15.96z/data=!4m8!1m2!2m1!1scootranshuila!3m4!1s0x0:0x124afe37583c0179!8m2!3d2.9408511!4d-75.29477" target="_blank"><img src="assets/images/map.png" class="img-fluid" alt="#"></a>
                        <div class="address">
                            <span class="icon-location-pin"></span>
                            <p> Av. 26 No. 4-82, Neiva - Huila</p>
                        </div>
                        <div class="address">
                            <span class="icon-screen-smartphone"></span>
                            <p> (8)875 6365 | 8756368</p>
                        </div>
                        <div class="address">
                            <span class="icon-link"></span>
                            <p>clientes@cootranshuila.com</p>
                        </div>
                        <div class="address">
                            <span class="icon-clock"></span>
                            <p>Lunes - Viernes 07:00 am - 06:00 pm </p>
                        </div>
                        <a href="https://www.google.com.co/maps/place/Gazel+Cootranshuila/@2.9422007,-75.2985641,15.96z/data=!4m8!1m2!2m1!1scootranshuila!3m4!1s0x0:0x124afe37583c0179!8m2!3d2.9408511!4d-75.29477" class="btn btn-danger btn-contact" target="_blank">IR</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END BOOKING DETAILS -->
<?php } ?>
<!--============================= FIN DE FLOTA =============================-->

<!--============================= SERVICIO ESPECIAL =============================-->
<?php 
if (isset($_REQUEST['especial'])) { ?>

<div id="demo" class="carousel slide-flota" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
    <li data-target="#demo" data-slide-to="4"></li>
    <li data-target="#demo" data-slide-to="5"></li>
    <li data-target="#demo" data-slide-to="6"></li>
    <li data-target="#demo" data-slide-to="7"></li>
    <li data-target="#demo" data-slide-to="8"></li>
    <li data-target="#demo" data-slide-to="9"></li>
    <li data-target="#demo" data-slide-to="10"></li>
    <li data-target="#demo" data-slide-to="11"></li>
    <li data-target="#demo" data-slide-to="12"></li>
    <li data-target="#demo" data-slide-to="13"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/img/destinos/1.jpg" width="100%">   
    </div>
    <div class="carousel-item">
      <img src="assets/images/img/destinos/2.jpg" width="100%">  
    </div>
    <div class="carousel-item">
      <img src="assets/images/img/destinos/3.jpg" width="100%">   
    </div>
    <div class="carousel-item">
      <img src="assets/images/img/destinos/4.jpg" width="100%">   
    </div>
    <div class="carousel-item">
      <img src="assets/images/img/destinos/5.jpg" width="100%">   
    </div>
    <div class="carousel-item">
      <img src="assets/images/img/destinos/6.jpg" width="100%">   
    </div>
    <div class="carousel-item">
      <img src="assets/images/img/destinos/7.jpg" width="100%">   
    </div>
    <div class="carousel-item">
      <img src="assets/images/img/destinos/8.jpg" width="100%">   
    </div>
    <div class="carousel-item">
      <img src="assets/images/img/destinos/9.jpg" width="100%">   
    </div>
    <div class="carousel-item">
      <img src="assets/images/img/destinos/10.jpg" width="100%">   
    </div>
    <div class="carousel-item">
      <img src="assets/images/img/destinos/11.jpg" width="100%">   
    </div>
    <div class="carousel-item">
      <img src="assets/images/img/destinos/12.jpg" width="100%">   
    </div>
    <div class="carousel-item">
      <img src="assets/images/img/destinos/13.jpg" width="100%">   
    </div>
    <div class="carousel-item">
      <img src="assets/images/img/destinos/14.jpg" width="100%">   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="styled-heading">
            <h3>Destinos destacados</h3>
        </div>
    </div>
</div>

<section class="light-bg booking-details_wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12 responsive-wrap">
                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox">
                        <img src="assets/images/img/flota/01.png" class="img-fluid">
                        <br>
                        <hr>
                        <br>
                        <img src="assets/images/img/flota/02.png" class="img-fluid">
                        <br>
                        <hr>
                        <br>
                        <img src="assets/images/img/flota/03.png" class="img-fluid">
                        <br>
                        <hr>
                        <br>
                        <img src="assets/images/img/flota/04.png" class="img-fluid">
                        <br>
                        <hr>
                        <br>
                        <img src="assets/images/img/flota/05.png" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php } ?>
<!--============================= FIN DE SERVICIO ESPECIAL =============================-->

<?php 
if (isset($_REQUEST['empresa'])) { ?>

<!-- <div class="container slide-flota"> -->
  
    <section class="reserve-block slide-flota">
        <div class="container">
            <div class="row justify-content-center">
                <ul class="nav nav-tabs ">
                    <li class="nav-item">
                      <button type="button" class=" btn btn-emp" <?php if ($_REQUEST['empresa'] == 'historia') { echo 'class="active"'; }?> data-toggle="tab" href="#historia">Historia</button>
                    </li>
                    <li class="nav-item">
                      <button type="button" class=" btn btn-emp" <?php if ($_REQUEST['empresa'] == 'empresa') { echo 'class="active"'; }?> data-toggle="tab" href="#empresa">Nuestra empresa</button>
                    </li>
                </ul>
            </div>
        </div>
    </section>
  <!-- Nav tabs -->
    <div class="tab-content">

        <div id="historia" class="tab-pane <?php if ($_REQUEST['empresa'] == 'historia') { echo 'active'; }?>">
            <section class="light-bg booking-details_wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 responsive-wrap">
                            <div class="booking-checkbox_wrap">
                                <div class="booking-checkbox">
                                    <br>
                                      <h3>Historia</h3>
                                      <hr>
                                      <div class="row">
                                        <div class="col-md-6 offset-sm-5 mb-3">
                                            <img src="assets/images/img/flota/logo.png" class="ml-1 mr-2" alt="logo">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" title="1937" data-content="Gestión de Creación de COOTRANSHUILA por parte de Urbano Cabrera.">1937</a>
                                        </div>
                                        <div class="col-md-6 offset-sm-3 mb-3">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" data-placement="left" title="1938" data-content="Escritura de constitución (Marzo 17 en Notaria 1a de Neiva). ">1938</a>
                                            <img src="assets/images/img/flota/logo.png" class="ml-2" alt="logo">
                                        </div>
                                        <div class="col-md-6 offset-sm-5 mb-3">
                                            <img src="assets/images/img/flota/logo.png" class="ml-1 mr-2" alt="logo">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" title="1939" data-content="Liquidación de la empresa por falta de asistencia de socios a Asamblea y Concejo.">1939</a>
                                        </div>
                                        <div class="col-md-6 offset-sm-3 mb-3">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" data-placement="left" title="1942" data-content="<ul><li>En Bus Escalera, Costo por pasaje Neiva - San Mateo (hoy Rivera) 10 centavos.</li>
                                            <li>Por Res. No. 287 (Min. Economía Nacional), nace COOTRANSHUILA LTDA con 22 socios con aporte a capital cada uno de $200 y cuota de admisión de $5. Asume como primer Gerente el Señor Misael Dussan.</li>
                                            <li>Entra el Servicio Mixto o Chiva a zonas rurales de Neiva y Municipios de Teruel, Iquira y La Plata.</li> 
                                            <li>Ampliación de servicios a Campoalegre, Hobo, Gigante, Garzón y Pitalito.</li></ul>">1942</a>
                                            <img src="assets/images/img/flota/logo.png" class="ml-2" alt="logo">
                                        </div>
                                        <div class="col-md-6 offset-sm-5 mb-3">
                                            <img src="assets/images/img/flota/logo.png" class="ml-1 mr-2" alt="logo">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" title="1957" data-content="Se presta el Servicio al Departamento del Caquetá (Florencia - San Vicente) y posteriormente al Departamento del Cauca (Popayán).">1957</a>
                                        </div>
                                        <div class="col-md-6 offset-sm-3 mb-3">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" data-placement="left" title="1972" data-content="Se nombra al Señor Víctor Manuel Beltrán Molina (Q.E.P.D.) como Gerente.">1972</a>
                                            <img src="assets/images/img/flota/logo.png" class="ml-2" alt="logo">
                                        </div>
                                        <div class="col-md-6 offset-sm-5 mb-3">
                                            <img src="assets/images/img/flota/logo.png" class="ml-1 mr-2" alt="logo">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" title="1973" data-content="Ampliación de la capacidad transportadora que solo era de Mixtos, a Buses y Busetas por carretera.">1973</a>
                                        </div>
                                        <div class="col-md-6 offset-sm-3 mb-3">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" data-placement="left" title="1974" data-content="Prestación de Servicio con Buses y Busetas Interdepartamentales lo mismo que Taxis y Camperos Intermunicipales.">1974</a>
                                            <img src="assets/images/img/flota/logo.png" class="ml-2" alt="logo">
                                        </div>
                                        <div class="col-md-6 offset-sm-5 mb-3">
                                            <img src="assets/images/img/flota/logo.png" class="ml-1 mr-2" alt="logo">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" title="1978" data-content="Funcionamiento de Servicio Urbano con Buses y Busetas.">1978</a>
                                        </div>
                                        <div class="col-md-6 offset-sm-3 mb-3">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" data-placement="left" title="1980" data-content="Ampliación de capacidad transportadora de servicio urbano: Buses y Busetas.">1980</a>
                                            <img src="assets/images/img/flota/logo.png" class="ml-2" alt="logo">
                                        </div>
                                        <div class="col-md-6 offset-sm-5 mb-3">
                                            <img src="assets/images/img/flota/logo.png" class="ml-1 mr-2" alt="logo">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" title="1982" data-content="Prestación de Servicio de Transporte de Carga a todo el País con Tractomulas, Doble Troques y Camiones.">1982</a>
                                        </div>
                                        <div class="col-md-6 offset-sm-3 mb-3">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" data-placement="left" title="1983" data-content="Aumento de variedad de servicios con Taxis de Servicio Urbano.">1983</a>
                                            <img src="assets/images/img/flota/logo.png" class="ml-2" alt="logo">
                                        </div>
                                        <div class="col-md-6 offset-sm-5 mb-3">
                                            <img src="assets/images/img/flota/logo.png" class="ml-1 mr-2" alt="logo">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" title="1988" data-content="Prestación del Servicio de Lujo a ciudades: Bogotá, Neiva, Mocoa, Popayán y Cali.">1988</a>
                                        </div>
                                        <div class="col-md-6 offset-sm-3 mb-3">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" data-placement="left" title="1990" data-content="<ul><li>Prestación de Servicio Especial en Buses, Busetas y Colectivo contratados por Empresas Petroleras radicadas en el Huila.</li>
                                            <li>Inauguración de nueva Sede Administrativa y remodelación total de la Estación de Servicio (Costo de $250.000.000), para ofrecer a clientes y asociados una moderna sede para las ventas de combustibles y lubricantes (convenio con Terpel del Sur S.A.).</li>
                                            </ul>">1990</a>
                                            <img src="assets/images/img/flota/logo.png" class="ml-2" alt="logo">
                                        </div>
                                        <div class="col-md-6 offset-sm-5 mb-3">
                                            <img src="assets/images/img/flota/logo.png" class="ml-1 mr-2" alt="logo">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" title="1992" data-content="Celebración de Bodas de Oro de COOTRANSHUILA Ltda.">1992</a>
                                        </div>
                                        <div class="col-md-6 offset-sm-3 mb-3">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" data-placement="left" title="1994" data-content="Prestación de Servicio de Encomiendas en Camiones y Furgones.">1994</a>
                                            <img src="assets/images/img/flota/logo.png" class="ml-2" alt="logo">
                                        </div>
                                        <div class="col-md-6 offset-sm-5 mb-3">
                                            <img src="assets/images/img/flota/logo.png" class="ml-1 mr-2" alt="logo">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" title="1995" data-content="Prestación de Servicio con Buses de Lujo a Ibagué, Armenia, Pereira, Manizales y Mocoa.">1995</a>
                                        </div>
                                        <div class="col-md-6 offset-sm-3 mb-3">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" data-placement="left" title="1998" data-content="Prestación de Servicio en Buses Aero Suite de Lujo. Por Res. No 03256 (Min. Transporte) se adjudica a COOTRANSHUILA la Licencia Internacional de Servicios de Pasajeros.">1998</a>
                                            <img src="assets/images/img/flota/logo.png" class="ml-2" alt="logo">
                                        </div>
                                        <div class="col-md-6 offset-sm-5 mb-3">
                                            <img src="assets/images/img/flota/logo.png" class="ml-1 mr-2" alt="logo">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" title="1999" data-content="Se nombra al Señor Salomón Serrato Suárez, como Gerente General de la Cooperativa.">1999</a>
                                        </div>
                                        <div class="col-md-6 offset-sm-3 mb-3">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" data-placement="left" title="2000" data-content="Fallece el Señor Víctor Manuel Beltrán Molina (26 años como Gerente General).">2000</a>
                                            <img src="assets/images/img/flota/logo.png" class="ml-2" alt="logo">
                                        </div>
                                        <div class="col-md-6 offset-sm-5 mb-3">
                                            <img src="assets/images/img/flota/logo.png" class="ml-1 mr-2" alt="logo">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" title="2001" data-content="Por Res. No 8742 (Min. Transporte) se adjudica a COOTRANSHUILA Ltda, la licencia de Servicio Aero Suite Preferencial de Súper Lujo a Bogotá, Neiva, Cali, Pitalito, San Agustín y La Plata.">2001</a>
                                        </div>
                                        <div class="col-md-6 offset-sm-3 mb-3">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" data-placement="left" title="2002" data-content="COOTRANSHUILA Ltda, cumple 60 años en actividad transportadora cubriendo: Huila, Tolima, Caquetá, Cauca, Putumayo, Cundinamarca, Valle, Quindío, Risaralda y Caldas. (45 oficinas en los 10 Departamentos generando 218 empleos directos y 2.500 indirectos). Hacen parte de la empresa 420 asociados.">2002</a>
                                            <img src="assets/images/img/flota/logo.png" class="ml-2" alt="logo">
                                        </div>
                                        <div class="col-md-6 offset-sm-5 mb-3">
                                            <img src="assets/images/img/flota/logo.png" class="ml-1 mr-2" alt="logo">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" title="2003" data-content="A mediados de Mayo se inicia el proceso de certificación en la norma ISO 9001-2000 Gestión de la Calidad en la modalidad de Servicio Especial de Pasajeros.">2003</a>
                                        </div>
                                        <div class="col-md-6 offset-sm-3 mb-3">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" data-placement="left" title="2004" data-content="Se inicia el proceso de certificación en la norma BASC (Coalición Empresarial Anticontrabando) para la modalidad de Carga.">2004</a>
                                            <img src="assets/images/img/flota/logo.png" class="ml-2" alt="logo">
                                        </div>
                                        <div class="col-md-6 offset-sm-5 mb-3">
                                            <img src="assets/images/img/flota/logo.png" class="ml-1 mr-2" alt="logo">
                                            <a style="color: white; border: 3px solid #ccc;" class="his hisp" data-toggle="popover" title="2005" data-content="<ul><li>El 28 de Enero es recibida la auditoria de BASC.</li><li>El 09 de Febrero se crea la empresa INVERSIONES COOTRANSHUILA S. A. En donde Cootranshuila Ltda. Es propietaria del 36.33% y el resto de capital es adquirido por los asociados de la empresa.</li><li>En Marzo se recibe el informe de BASC en donde nos otorgan la certificación como una empresa que realiza sus operaciones en forma segura y demostrando que se está contra de toda actividad ilícita.</li><li>El 26 de Mayo se recibió la auditoria por parte del Icontec.</li><li>Se recibió el informe de la Auditoria por parte del Icontec en donde nos confieren la Certificación en la ISO 9001-2000 Gestión de la Calidad en la modalidad de Servicio Especial de Pasajeros.</li><li>El 19 de Agosto en una ceremonia muy sobria son entregadas las dos certificaciones tanto por el director de la regional Bogotá de BASC Dr. Edgar Orlando Martínez Mendoza como por el de ICONTEC Dr. Norman Pineda en el centro de convenciones José Eustacio Rivera de Neiva.</li></ul>">2005</a>
                                        </div>
                                        <div class="col-md-6 offset-sm-3 mb-3">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" data-placement="left" title="2006" data-content="<ul><li>En Febrero se inician las labores de construcción de la estación de servicio de INVERSIONES COOTRANSHUILA S.A. la cual se encuentra ubicada en el kilómetro 2 de la vía a Bogotá.</li><li>Durante el mes de Noviembre (01) se inaugura oficialmente la estación de servicio de INVERSIONES COOTRANSHUILA S.A.</li></ul>">2006</a>
                                            <img src="assets/images/img/flota/logo.png" class="ml-2" alt="logo">
                                        </div>
                                        <div class="col-md-6 offset-sm-5 mb-3">
                                            <img src="assets/images/img/flota/logo.png" class="ml-1 mr-2" alt="logo">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" title="2007" data-content="<ul><li>En Mayo se obtiene la recertificación en la norma BASC.</li><li>Se inicia en Agosto la construcción de los surtidores de gas vehicular. Octubre 02 se recibe la auditoria por parte del Icontec y somos nuevamente certificados en la ISO 9001-2000 por un año más.</li><li>En Diciembre se inaugura la estación de gas vehicular y se da al servicio del público.</li></ul>">2007</a>
                                        </div>
                                        <div class="col-md-6 offset-sm-3 mb-3">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" data-placement="left" title="2008" data-content="<ul><li>En marzo 25 se inician los trabajos de remodelación del primer piso del área administrativa, el 27 se realizó la 74 asamblea general ordinaria informativa, en las instalaciones del club campestre en Neiva.</li><li>En Junio 16 se trasladan a las nuevas instalaciones del primer piso. Julio 14 se inician los trabajos de remodelación del segundo piso, los cuales se terminaron el 04 de Noviembre, trasladándose el personal el 08 de Noviembre.</li></ul>">2008</a>
                                            <img src="assets/images/img/flota/logo.png" class="ml-2" alt="logo">
                                        </div>
                                        <div class="col-md-6 offset-sm-5 mb-3">
                                            <img src="assets/images/img/flota/logo.png" class="ml-1 mr-2" alt="logo">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" title="2009" data-content="Se inicia en enero la remodelación de la Estación de Servicio la cual fue terminada en mayo. En julio FENALCO exalto los méritos a Don Salomón Serrato Súarez y le hace merecedor del galardón como buen ciudadano.">2009</a>
                                        </div>
                                        <div class="col-md-6 offset-sm-3 mb-3">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" data-placement="left" title="2010" data-content="Lanzamiento de una moderna flota de buses súper lujo Preferencial VIP, con un equipamiento tecnológico, servicio a bordo, dos conductores, dos baños, música y películas seleccionadas, servicio de WiFi.">2010</a>
                                            <img src="assets/images/img/flota/logo.png" class="ml-2" alt="logo">
                                        </div>
                                        <div class="col-md-6 offset-sm-5 mb-3">
                                            <img src="assets/images/img/flota/logo.png" class="ml-1 mr-2" alt="logo">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" title="2011" data-content="<ul><li>Se realizó una remodelación total a la Sala VIP ubicada en el Terminal de Transportes de la ciudad de Bogotá.</li><li>La empresa fue certificada en OSHAS 18001-2008, otorgada por el instituto de normas técnicas Incontec; esta norma enmarca salud ocupacional, seguridad industrial y HSE.</li></ul>">2011</a>
                                        </div>
                                        <div class="col-md-6 offset-sm-3 mb-3">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" data-placement="left" title="2012" data-content="<ul><li>En octubre fue adjudicado el contrato de prestación de servicio de transporte de personas y cosas con la Electrificadora del Huila por tres años, adquiriendo la empresa 35 camionetas Chevrolet Dimax y tres camionetas Captiva Chevrolet, todos últimos modelos, para cumplir con el contrato.</li><li>Mediante convenio con seguros QBE la empresa empezó a ofrecer directamente en sus instalaciones la venta del seguro obligatorio SOAT.</li></ul>">2012</a>
                                            <img src="assets/images/img/flota/logo.png" class="ml-2" alt="logo">
                                        </div>
                                        <div class="col-md-6 offset-sm-5 mb-3">
                                            <img src="assets/images/img/flota/logo.png" class="ml-1 mr-2" alt="logo">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" title="2013" data-content="<ul><li>Se adquirió lote de terreno de 4.900metrosm cuadrados, ubicados al frente del Terminal de Transporte de Neiva, para futuros proyectos de la empresa.</li><li>Fue adjudicado de nuevo el contrato de servicio Especial de pasajeros con Ecopetrol por un término de tres años.</li><li>El primero de octubre se inició el contrato con Emgesa Concesión el Quimbo del servicio especial empresarial de pasajeros por el término de tres años, inicialmente con diez buses de servicio especial.</li></ul>">2013</a>
                                        </div>
                                        <div class="col-md-6 offset-sm-3 mb-3">
                                            <a style="color: white; border: 3px solid #ccc;" class="his" data-toggle="popover" data-placement="left" title="2014" data-content="<ul><li>A partir del primero de enero asume como Gerente General el doctor Marino Castro Carvajal, luego de la renuncia a este cargo por parte del doctor Salomón Serrato Suárez.</li><li>Se compra lote en Pitalito para la construcción de una moderna Estación de Servicio, gracias a la inversión de la empresa y asociados, denominada Inversiones Cootranshuila del Sur S.A.S.</li><li>En el mes de diciembre ingresan a prestar el servicio cinco vehículos doble piso, convirtiéndose en una nueva modalidad llamada DOBLE YO (Doble Calidad, Doble Confort, Doble lujo y Doble Seguridad) vehículos equipados con neveras, dos baños, sillas en cuero tipo cama, pantallas táctiles en todas las sillas del primer y segundo piso, conexión a internet, tomacorrientes para cargar el celular o cualquier equipo electrónico.</li><li>Se creó la unidad de negocios “COOTRANSHUILA GPS” como herramienta invisible a nuestros usuarios, clientes y asociados que nos ha permitido controlar, apoyar y dar un nivel de seguridad que nos coloca a la vanguardia de grandes empresas.</li></ul>">2014</a>
                                            <img src="assets/images/img/flota/logo.png" class="ml-2" alt="logo">
                                        </div>
                                        <div class="col-md-6 offset-sm-5 mb-3">
                                            <img src="assets/images/img/flota/logo.png" class="ml-1 mr-2" alt="logo">
                                            <a style="color: white" class="his" data-toggle="popover" data-trigger="hover" title="2015" data-content="Inicio de obras de construcción en la denominada Inversiones Cootranshuila del Sur S.A.S., en la ciudad de Pitalito, en la cual se contara con un hotel cómodo, satisfaciendo las necesidades de los huéspedes con zonas ambientales, cafetería y habitaciones confortables.">2015</a>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 responsive-wrap">
                            <div class="booking-checkbox_wrap">
                                <div class="booking-checkbox">
                                    <img src="assets/images/img/empresa/1.jpg" alt="historia" class="img-fluid mb-3 img-his" />
                                    <img src="assets/images/img/empresa/2.jpg" alt="historia" class="img-fluid mb-3 img-his" />
                                    <img src="assets/images/img/empresa/3.jpg" alt="historia" class="img-fluid mb-3 img-his" />
                                    <img src="assets/images/img/empresa/4.jpg" alt="historia" class="img-fluid mb-3 img-his" />
                                    <img src="assets/images/img/empresa/5.jpg" alt="historia" class="img-fluid mb-3 img-his" />
                                    <img src="assets/images/img/empresa/6.jpg" alt="historia" class="img-fluid mb-3 img-his" />
                                    <img src="assets/images/img/empresa/9.jpg" alt="historia" class="img-fluid mb-3 img-his" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div id="empresa" class="tab-pane light-bg <?php if ($_REQUEST['empresa'] == 'empresa') { echo 'active'; }?>"><br>
          <section class="booking-details_wrap">
                <div class="container">
                    <div class="row booking-checkbox_wrap">
                        <div class="col-sm-12 responsive-wrap">
                            <div class="booking-checkbox_wrap">
                                <div class="booking-checkbox">
                                    <h3 class="ml-2">Nuestra empresa</h3>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 responsive-wrap">
                            <div class="booking-checkbox_wrap">
                                <div class="booking-checkbox">
                                    <div class="light-bg p-4">
                                        <h4 class="ml-2">Mision</h4>
                                        <hr>
                                        <p style="text-align: justify;">Somos una empresa del sector cooperativo líder en el servicio del transporte masivo terrestre nacional, trabajamos con mística y en equipo para satisfacer las necesidades y expectativas de los clientes, prestando servicios con seguridad, cumplimiento y calidad para beneficio de los asociados, funcionarios, proveedores y sociedad en general, teniendo en cuenta la responsabilidad social que tenemos con cada uno de ellos para hacer que nuestra organización esté acorde a los requerimientos mínimos exigidos para una sana convivencia.</p>
                                    </div>
                                    <div class="light-bg p-4 mt-3">
                                        <h4 class="ml-2">Vision</h4>
                                        <hr>
                                        <p style="text-align: justify;">Proyectar internacionalmente al área andina nuestros servicios, sin descuidar nuestro liderazgo nacional en el sector transportador, destacándonos por la excelencia en el servicio y a la vez entregando resultados positivos a nuestros asociados y grupos de interes definidos en el programa de responsabilidad social. De esta manera conseguiremos esta meta con la mejor gestion humana, siendo modelo de eficiencia y solidez.</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 responsive-wrap">
                            <div class="booking-checkbox_wrap">
                                <div class="booking-checkbox">
                                    <img src="assets/images/img/empresa/web.png" alt="nuestra empresa" class="img-fluid img-his float-rigth" />
                                    <img src="assets/images/img/empresa/fmla.png" alt="nuestra empresa" class="img-fluid img-his float-rigth mt-4" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 responsive-wrap">
                            <div class="booking-checkbox_wrap">
                                <div class="booking-checkbox">
                                    <div class="light-bg p-4 ">
                                        <h4 class="ml-2">Politica Integral</h4>
                                        <hr>
                                        <p style="text-align: justify;">La COOPERATIVA DE TRANSPORTADORES DEL HUILA “COOTRANSHUILA LTDA” dedicada a la prestación de Servicio de Transporte Publico Terrestre, encomiendas, carga y suministro de combustible, consciente de la importancia  del bienestar  del talento humano, como  eje  para  el desarrollo de su misión, considera como uno de sus propósitos fundamentales la calidad en el servicio, el cuidado de la salud, el bienestar y la seguridad de sus trabajadores, mediante la continua identificación y evaluación de los riesgos que puedan generar accidentes, enfermedades laborales, daños a la propiedad y al medio ambiente, por ello se compromete a garantizar condiciones seguras de trabajo, ambientalmente aceptables,  fomentar el uso de prácticas saludables, brindar formación y entrenamiento, fortalecer las competencias, generar compromiso social con los asociados, trabajadores, contratistas y demás grupos de interés, actuando con transparencia y ética, enmarcados bajo la premisa del amor a la familia, el autocuidado, la protección del medio ambiente y el compromiso con la vida; asegurando el cumplimiento de los requisitos legales, acuerdos cooperativos, especificaciones de los clientes y otros requisitos que suscriba la organización en pro de obtener los mejores beneficios de productividad y eficiencia, a través del mejoramiento continuo  del sistema de Gestión.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-sm-12 responsive-wrap">
                            <div class="booking-checkbox_wrap">
                                <div class="booking-checkbox">
                                    <div class="light-bg p-4 ">
                                        <h4 class="ml-2">Valores Corporativos</h4>
                                        <hr>
                                        <p style="text-align: justify;">Nuestra más alta prioridad es el cliente para quien tenemos nuestra mejor actitud de servicio, el cliente es la razón de ser de nuestro trabajo; le servimos con gusto en forma amable y eficiente; nuestro potencial mas valioso es nuestra gente y la capacidad de trabajar en equipo. Consideramos, atendemos y valoramos a los demás, hacemos un esfuerzo colectivo permanente para el logro de los objetivos comunes. Desarrollamos la capacidad de escuchar, reconocer y optimizar nuestras fortalezas y limitaciones para generar un proceso de aprendizaje continuo. Nuestra mente esta abierta al cambio y la innovación permanente. Estamos en capacidad de adaptarnos a nuevas condiciones y retos. Tenemos la habilidad para implementar, estipular y generar nuevas ideas a fin de obtener más y mejores servicios. Nuestro compromiso es irreprochable y transparente, actuamos con claridad dentro de los principio morales y éticos. Somos coherentes dentro de lo que decimos, pensamos y hacemos, manejamos con responsabilidad la información y recursos que nos han sido confiados. Construimos relaciones de confianza entre nosotros y nuestros clientes.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
    
<!-- </div> -->

<?php } ?>

<!-- ======================================= POLITICA DE DATOS =============================== -->

<?php 
if (isset($_REQUEST['politica'])) { ?>

<section class="reserve-block slide-flota">
    <div class="container">
        <div class="row justify-content-center">
            <div class="booking-checkbox_wrap">
                <div class="booking-checkbox">
                    <h4>Politica de Proteccion de Datos Personales de Clientes</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="light-bg booking-details_wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12 responsive-wrap">
                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox">
                        <div class="row justify-content-center">
                            <a href="http://www.cootranshuila.com/assets/politica_datos/AUTORIZACION.pdf" target="_blank"><button type="button" class="nav-link btn btn-emp mb-5">DESCARGAR FORMATO AQUI</button></a>
                        </div>
                        <p><strong>POLÍTICA DE TRATAMIENTO PROTECCIÓN DE DATOS PERSONALES DE CLIENTES DE COOTRANSHUILA LTDA</strong><hr></p>
                        <br>
                        <p>En cumplimiento a lo dispuesto en la Ley estatutaria 1581 de 2012 y a su Decreto Reglamentario 1377 de 2013, COOTRANSHUILA LTDA, informa la política aplicable a la entidad para el tratamiento protección de datos personales. </p>
                        <br>
                        <p><strong>1. IDENTIFICACIÓN</strong><br>
                        <strong>NOMBRE DE LA INSTITUCIÓN: COOTRANSHUILA LTDA</strong> sometida a la inspección y vigilancia de la Superintendencia de Puertos y Transportes, el Ministerio de Transporte; con el fin de prestar los servicios relacionados en su objeto social, tales como: servicios de Transportes terrestre de pasajeros y carga en su modalidades de urbano, municipal, intermunicipal, escolar, empresarial y de turismo, entre otros, por medio del presente documento, desarrolla la política para el tratamiento de datos personales que será adoptada por la misma, así como la manera y las características del tratamiento que se le debe dar a los datos.</p>

                        <p><strong>DIRECION:</strong> Neiva (Huila) Av. 26 N. 4-82. <br>
                        <strong>CORREOELECTRÓNICO:</strong>  clientes@cootranshuila.com <br>
                        <strong>DEL RESPONSABLE:</strong>  Jhon Freddy Ardila.</p><br>

                        <p><strong>2. MARCO LEGAL</strong><br>
                        Constitución Política, artículo 15. <br>
                        Ley 1266 de 2008 <br>
                        Ley 1581 de 2012 <br>
                        Decretos Reglamentarios 1727 de 2009 y 2952 de 2010, <br>
                        Decreto Reglamentario parcial 1377 de 2013</p>

                        <p><strong>3. GENERALIDADES</strong> <br>
                        Mediante la ley 1581 de 2012 y el Decreto 1377 de 2013 se expidió el Régimen General de Protección de Datos Personales. Por medio de dicha regulación se desarrolla el derecho constitucional que tienen las personas a conocer, actualizar y rectificar las informaciones que se hayan recogido sobre ellas en bases de datos o archivos, y los demás derechos, libertades y garantías constitucionales a que se refiere el artículo 15 de la Constitución Política; así como el derecho a la información consagrado en el artículo 20 de la misma.</p>

                        <p><strong>4. OBJETIVO</strong>
                        <ul>
                            <li>Cumplir el derecho constitucional que tienen todas las personas a conocer, actualizar y rectificar la información que se haya recogido sobre ellas en bases de datos o archivos, según se establece en el Art.15 de la Constitución Política de Colombia.</li>
                            <li>Definir al interior de COOTRANSHUILA LTDA, una serie de políticas, prácticas y procedimiento que den cumplimiento efectivo a las exigencias y disposiciones legales establecidas en el sistema jurídico Colombiano en relación con la protección de datos de carácter personal.</li>
                        </ul>
                        </p>

                        <p><strong>5. ALCANCE</strong><br>
                        Todos los funcionarios de <strong>COOTRANSHUILA LTDA</strong>, deben observar y acatar el cumplimiento de la presente política. <br>
                        Las áreas que tienen mayor interacción con la administración y/o manejo de datos personales, deben observar con mayor rigor el cumplimiento y aplicación a la Ley, asegurar el cumplimiento de la misma y de cualquier norma o disposición que la complemente adicione o modifique. <br>
                        De igual manera, la presente política tendrá plena aplicación frente a las personas naturales o jurídicas (incluidos proveedores y contratistas) con las que <strong>COOTRANSHUILA LTDA</strong>, tenga un vínculo contractual y que tengan o pudieran tener acceso a datos personales de los cuales <strong>COOTRANSHUILA LTDA</strong> es Responsable, siempre que la divulgación de datos personales sea necesaria para el cumplimiento de dichas obligaciones contractuales. <br>
                        Todas las disposiciones que la regulación colombiana establezca en relación con el manejo de información, bases de datos y habeas data se entenderán incorporadas a la presente política. <br></p>

                        <p><strong>6. ÁMBITO DE APLICACIÓN</strong><br>
                        La presente política será aplicable a las bases de datos que se encuentren bajo la administración de <strong>COOTRANSHUILA LTDA</strong>, y que contengan información personal, que hayan sido conocidas por la compañía en virtud de las relaciones comerciales que sostenga con sus clientes, colaboradores y las demás entidades que forman parte del grupo empresarial al cual pertenece. <br>

                        Asimismo, estas políticas serán aplicables cuando el responsable o el encargado del tratamiento de los datos personales, se encuentre o no físicamente en Colombia, realice dicho tratamiento en el marco de un acuerdo firmado con <strong>COOTRANSHUILA LTDA</strong>.</p>

                        <p><strong>7. DEFINICIONES.</strong>
                        <ul>
                            <li><strong>Autorización:</strong> Consentimiento previo, expreso e informado del Titular para llevar a cabo el Tratamiento de datos personales.</li>
                            <li><strong>Aviso de Privacidad:</strong> Comunicación verbal o escrita generada por el responsable dirigido al titular para el tratamiento de sus datos personales, mediante la cual se le informa acerca de la existencia de las políticas de tratamiento de información que le serán aplicables, la forma de acceder a las mismas y las finalidades del tratamiento que se pretende dar a los datos personales.</li>
                            <li><strong>Base de Datos:</strong> Conjunto organizado de datos personales que sea objeto de Tratamiento.</li>
                            <li><strong>Causahabiente:</strong> persona que ha sucedido a otra por causa del fallecimiento de ésta (heredero)</li>
                            <li><strong>Dato personal:</strong> Cualquier información vinculada o que pueda asociarse a una o varias personas naturales determinadas o determinables; este puede ser:</li>
                            <li><strong>Dato personal sensible:</strong> Información que afecta la intimidad de la persona o cuyo uso indebido puede generar su discriminación, tales como aquellos que revelen el origen racial o étnico, la orientación política, las convicciones religiosas o filosóficas, la pertenencia a sindicatos, organizaciones sociales, de derechos humanos o que promueva intereses de cualquier partido político o que garanticen los derechos y garantías de partidos políticos de oposición, así como los datos relativos a la salud, a la vida sexual y los datos biométricos (huellas dactilares, entre otros).</li> 
                            <li><strong>Dato personal público:</strong> Es el dato calificado como tal según los mandatos de la ley o de la Constitución Política y todos aquellos que no sean semiprivados o privados. Son públicos, entre otros, los datos contenidos en documentos públicos, sentencias judiciales debidamente ejecutoriadas que no estén sometidos a reserva y los relativos al estado civil de las personas. Asimismo, los datos personales existentes en el registro mercantil de las Cámaras de Comercio (Artículo 26 del C.Co), los cuales pueden ser obtenidos y ofrecidos sin reserva alguna y sin importar si hacen alusión a información general, privada o personal.</li>
                            <li><strong>Dato personal privado:</strong> Es el dato que por su naturaleza íntima o reservada sólo es relevante para la persona titular del dato. Ejemplos: documentos privados, información extraída a partir de la inspección del domicilio.</li>
                            <li><strong>Dato personal semiprivado:</strong> Es semiprivado el dato que no tiene naturaleza íntima, reservada, ni pública y cuyo conocimiento o divulgación puede interesar no sólo a su titular sino a cierto sector o grupo de personas o a la sociedad en general. Dentro de dicha categoría es posible encontrar el dato referente al cumplimiento e incumplimiento de las obligaciones financieras o los datos relativos a las relaciones con las entidades de la seguridad social, entre otros. </li>
                            <li><strong>Encargado del Tratamiento:</strong> Persona natural o jurídica, pública o privada, que por sí misma o en asocio con otros, realice el Tratamiento de datos personales por cuenta del Responsable del Tratamiento.</li>
                            <li><strong>Ley de Protección de datos:</strong> es la Ley 1581 de 2012 y sus Decretos reglamentarios o las normas que los modifiquen, complementen o sustituyan.</li>
                            <li><strong>Grupo empresarial:</strong> Hace referencia a la situación mediante la cual las actividades de distintas compañías se encuentran encaminadas a cumplir un objetivo común y determinado por la sociedad matriz o controlante, cumpliendo con los requisitos establecidos en el artículo 28 y s.s. de la ley 222 de 1995. En relación con la presente política, se entiende por Grupo empresarial, el conformado COOTRANSHUILA LTDA, y Grupo Sepulvedana. </li>
                            <li><strong>Habeas Data:</strong> De conformidad con lo dispuesto en la ley 1266 de 2008, es el Derecho Constitucional que tienen las personas a conocer, actualizar y rectificar las informaciones que se hayan recogido sobre ellas en bancos de datos, y los demás derechos, libertades y garantías constitucionales relacionadas con la recolección, tratamiento y circulación de datos personales.</li>
                            <li><strong>Responsable del Tratamiento:</strong> Persona natural o jurídica, pública o privada, que por sí misma o en asocio con otros, decida sobre la base de datos y/o el Tratamiento de los datos.</li>
                            <li><strong>Terceros:</strong> Cualquier persona natural o jurídica distinta de COOTRANSHUILA LTDA, sus proveedores, clientes y contrapartes. Asimismo, para efectos de la presente política, se entenderá como tercero cualquier persona natural o jurídica que no se encuentre facultada bajo un vínculo contractual, para conocer información confidencial y/o datos personales contenidos en las bases de datos de la Compañía. </li>
                            <li><strong>Titular del dato:</strong> Persona natural cuyos datos personales sean objeto de Tratamiento. </li>
                            <li><strong>Tratamiento:</strong> Cualquier operación o conjunto de operaciones sobre datos personales, tales como la recolección, almacenamiento, uso, circulación o supresión.</li>
                            <li><strong>Transferencia:</strong> la transferencia de datos tiene lugar cuando el responsable y/o encargado del tratamiento de datos personales, ubicado en Colombia, envía la información o los datos personales a un receptor, que a su vez es responsable del tratamiento y se encuentra dentro o fuera del país. </li>
                            <li><strong>Transmisión:</strong> tratamiento de datos personales que implica la comunicación de los mismos dentro o fuera del territorio de la República de Colombia cuando tenga por objeto la realización de un tratamiento por el encargado por cuenta del responsable.</li>
                        </ul>
                        </p>
                        <br>
                        <p><strong>8. PRINCIPIOS PARA EL TRATAMIENTO DE DATOS PERSONALES</strong></p>
                        <p><strong>COOTRANSHUILA LTDA</strong>, dará estricto cumplimiento a los principios rectores que se exponen en el Artículo 4 del Título II de la ley 1581 del 2012, establecidos para la protección de datos personales, los que se aplicarán de manera integral y que a continuación se citan: </p>
                        <p><strong>8.1 Principio de finalidad:</strong> El Tratamiento debe obedecer a una finalidad legítima de acuerdo con la Constitución y la Ley, la cual debe ser informada al Titular.</p>
                        <p><strong>8.2 Principio de libertad:</strong> El Tratamiento sólo puede ejercerse con el consentimiento, previo, expreso e informado del Titular. Los datos personales no podrán ser obtenidos o divulgados sin previa autorización, o en ausencia de mandato legal o judicial que releve el consentimiento.</p>
                        <p><strong>8.3 Principio de veracidad o calidad:</strong> La información sujeta a Tratamiento debe ser veraz, completa, exacta, actualizada, comprobable y comprensible. Se prohíbe el Tratamiento de datos parciales, incompletos, fraccionados o que induzcan a error. </p>
                        <p><strong>8.4 Principio de transparencia:</strong> En el Tratamiento debe garantizarse el derecho del Titular a obtener del Responsable del Tratamiento o del Encargado del Tratamiento, en cualquier momento y sin restricciones, información acerca de la existencia de datos que le correspondan. </p>
                        <p><strong>8.5 Principio de acceso restringido:</strong> El Tratamiento se sujeta a los límites que se derivan de la naturaleza de los datos personales, de las disposiciones de la ley y la Constitución. En este sentido, el Tratamiento sólo podrá hacerse por personas autorizadas por el Titular y/o por las personas previstas en la ley. </p>
                        <p><strong>8.6 Principio de circulación restringida:</strong> Los datos personales, salvo la información pública, no podrán estar disponibles en Internet u otros medios de divulgación o comunicación masiva, salvo que el acceso sea técnicamente controlable para brindar un conocimiento restringido sólo a los Titulares o terceros autorizados según las disposiciones de ley. </p>
                        <p><strong>8.7 Principio de seguridad:</strong> La información sujeta a Tratamiento por el Responsable del Tratamiento o Encargado del Tratamiento, se deberá manejar con las medidas técnicas, humanas y administrativas que sean necesarias para otorgar seguridad a los registros evitando su adulteración, pérdida, consulta, uso o acceso no autorizado o fraudulento. </p>
                        <p><strong>8.8 Principio de confidencialidad:</strong> Todas las personas que intervengan en el tratamiento de datos personales que no tengan la naturaleza de públicos están obligadas a guardar reserva de la información, inclusive después de finalizada su relación con las labores que comprende el tratamiento, pudiendo sólo realizar suministro o comunicación de datos personales cuando ello corresponda al desarrollo de las actividades autorizadas por ley. </p>
                        <p><strong>8.9 Principio de legalidad:</strong> El tratamiento a que se refiere la presente política es una actividad reglada que debe sujetarse a lo establecido en las disposiciones contenidas en la ley que la desarrollen. </p>
                        <br>

                        <p><strong>9. TRATAMIENTO AL QUE SERÁN SOMETIDOS LOS DATOS PERSONALES Y LA FINALIDAD DEL MISMO.</strong></p>
                        <p><strong>COOTRANSHUILA LTDA</strong>, velará porque los datos personales sean tratados de manera adecuada, ajustada a la ley y de conformidad con las siguientes finalidades: 
                        <ul>
                            <li>Efectuar las gestiones pertinentes para el desarrollo de la etapa precontractual, contractual y post contractual en relación con cualquiera de los productos o servicios ofrecidos o requeridos, o respecto de cualquier negociación que se tenga o inicie con <strong>COOTRANSHUILA LTDA</strong>.</li>
                            <li>Prestar los servicios relacionados en su objeto social, tales como: servicios de Transportes terrestre de pasajeros y carga en sus modalidades de urbano, municipal, intermunicipal, escolar, empresarial y de turismo, entre otros.</li>
                            <li>Gestionar trámites (solicitudes, quejas, reclamos), realizar análisis de todo tipo de riesgo al que se encuentre expuesto <strong>COOTRANSHUILA LTDA</strong>, y efectuar encuestas de satisfacción respecto de los bienes y servicios ofrecidos.</li>
                            <li>Verificar el cumplimiento de requerimientos regulatorios, posibles conflictos de interés, viabilidad financiera, jurídica y comercial devengada de las relaciones comerciales con sus clientes y proveedores. </li>
                            <li>Proporcionar información de contacto y documentos necesarios a la fuerza comercial y/o red de distribución, mercadeo para llevar a cabo las funciones encomendadas por <strong>COOTRANSHUILA LTDA</strong>, realizar labores relacionadas al objeto social de <strong>COOTRANSHUILA LTDA</strong>, o por encargo de <strong>COOTRANSHUILA LTDA</strong>.</li>
                            <li>Dar a conocer, transferir y/o trasmitir los datos personales dentro y fuera del país a terceros a consecuencia de un contrato, ley o vínculo lícito que así lo requiera, para realizar labores relacionadas al objeto social de <strong>COOTRANSHUILA LTDA</strong>, y/o por encargo de <strong>COOTRANSHUILA LTDA</strong>. </li>
                            <li>Facilitar la prestación de servicios de impuestos (presentación de declaraciones y medios magnéticos ante la DIAN) prestaciones sociales y servicios migratorios, tanto en Colombia como en el exterior. </li>
                            <li>Suministrar a las asociaciones gremiales (como Acoltes, entre otras) la información estadística que se genere con el procesamiento de datos personales, necesaria para la realización de estudios y en general, la administración de sistemas de información del sector correspondiente. </li>
                            <li>Crear bases de datos para los fines descritos en la presente política.</li>
                        </ul> 
                        </p>

                        <p>El Tratamiento de datos personales de <strong>niños, niñas y adolescentes</strong> asegurará el respeto a los derechos prevalentes de los <strong>niños, niñas y adolescentes</strong>. <br>
                        El Tratamiento de datos personales de niños, niñas y adolescentes está prohibido, excepto cuando se trate de datos de naturaleza pública, y en la medida que se cumpla con los siguientes parámetros y requisitos:
                        <ul>
                            <li>Que responda y respete el interés superior de los niños, niñas y adolescentes.</li>
                            <li>Que se asegure el respeto de sus derechos fundamentales.</li>
                        </ul>
                        Cumplidos los anteriores requisitos, el representante legal del niño, niña o adolescente otorgará la autorización correspondiente. <br>
                        Todo Responsable y Encargado involucrado en el Tratamiento de los datos personales de niños, niñas y adolescentes, deberá velar por el uso adecuado de los mismos. <br>
                        Es tarea del Estado y las entidades educativas de todo tipo proveer información y capacitar a los representantes legales y tutores sobre los eventuales riesgos a los que se enfrentan los niños, niñas y adolescentes respecto del Tratamiento indebido de sus datos personales, y proveer de conocimiento acerca del uso responsable y seguro por parte de niños, niñas y adolescentes de sus datos personales, su derecho a la privacidad y protección de su información personal y la de los demás. </p>

                        <p><strong>10. DERECHOS DE LOS TITULARES DE LOS DATOS</strong><br>
                        El titular de los datos personales tendrá los siguientes derechos:
                        <ul>
                            <li>Conocer, actualizar, rectificar y/o suprimir los datos personales a través del correo electrónico clientes@cootranshuila.com o la línea nacional 01 8000 933 737 incluyendo empleados. Este derecho se podrá ejercer, entre otros frente a datos parciales, inexactos, incompletos, fraccionados, que induzcan a error, o aquellos cuyo tratamiento esté expresamente prohibido o no haya sido autorizado. </li>
                            <li>Solicitar prueba de la autorización otorgada a <strong>COOTRANSHUILA LTDA</strong>, salvo cuando, de acuerdo con la Ley, el tratamiento de los datos que se está realizando no lo requiera.</li>
                            <li>Ser informado por <strong>COOTRANSHUILA LTDA</strong>, previa solicitud efectuada a través de los canales arriba mencionados, respecto del uso que ésta les ha dado a sus datos personales.</li>
                            <li>Dar trámite a las quejas por infracciones a la ley que regula el tratamiento de datos personales, sus decretos reglamentarios y la presente política. <br>Que se acepte la revocatoria de la autorización y/o supresión del dato personal cuando la Superintendencia de Industria y Comercio haya determinado que en el tratamiento por parte de <strong>COOTRANSHUILA LTDA</strong>, ha incurrido en conductas contrarias a la ley que regula el tratamiento de datos personales o la Constitución.</li>
                            <li>Acceder en forma gratuita, a través de los canales arriba mencionados a los datos personales que hayan sido objeto de tratamiento y se encuentren en las bases de datos de la compañía. </li>
                        </ul>
                        Los derechos de los Titulares, podrán ejercerse por las siguientes personas: <br><br>
                        <ul>
                            <li>Por el Titular, quien deberá acreditar su identidad en forma suficiente por los distintos medios que le ponga a disposición <strong>COOTRANSHUILA LTDA</strong>.</li>
                            <li>Por el representante y/o apoderado del Titular, previa acreditación de la representación o apoderamiento.</li>
                            <li>Los derechos de los niños, niñas o adolescentes se ejercerán por las personas que estén facultadas para representarlos, conforme a la ley.</li>
                            <li>Los causahabientes quienes deberán acreditar el parentesco adjuntando documento que soporte dicho parentesco y copia de su documento de identidad.</li>
                        </ul>
                        <strong>COOTRANSHUILA LTDA</strong>, a través del enlace en su página institucional, “Aviso de Privacidad de Datos” informará acerca de los canales y procedimientos previstos para que el titular pueda ejercer sus derechos de manera efectiva. </p>

                        <p><strong>11. TIPOS DE BASES DE DATOS EN COOTRANSHUILA LTDA. <br>
                        11.1 Base de datos de clientes </strong> <br>
                        Tienen como finalidad utilizar los datos para la debida prestación del servicio o del producto adquirido por el titular con <strong>COOTRANSHUILA LTDA</strong>, así como cumplir con los requerimientos legales en desarrollo de la relación comercial y toda la información pertinente dentro del desarrollo de los productos y servicios ofrecidos por <strong>COOTRANSHUILA LTDA</strong>. <br>
                        Ésta también tiene como finalidad tener un contacto con potenciales clientes con el fin de presentarle los productos y servicios ofrecidos por la empresa. <br><br>
                        <strong>11.2 Base de datos de Proveedores.</strong><br>
                        La base de datos de Proveedores tiene como objeto contar con información actualizada y suficiente acerca de las personas que tienen la calidad de Proveedores o quisieran tenerla. <br><br>
                        <strong>11.3 Base de datos de Empleados.</strong><br>
                        La base de datos de empleados, busca tener actualizada la información de los empleados de la compañía. Dicha información permite que la relación laboral se desarrolle de manera adecuada y logra una mejor comunicación entre la compañía y sus colaboradores. <br><br>
                        <strong>12. DEBERES EN CALIDAD DE RESPONSABLE DEL TRATAMIENTO DE INFORMACIÓN Y CUANDO EL TRATAMIENTO SE REALICE A TRAVÉS DE UN ENCARGADO.</strong><br>
                        Se define como RESPONSABLE a la persona natural o jurídica, pública o privada, que por sí misma o en asocio con otros, decide sobre la base de datos y/o el tratamiento de los datos. Son sus deberes: <br>
                        <ul>
                            <li>Garantizar a través de los canales establecidos, para los Titulares de datos, el pleno y efectivo ejercicio del derecho de hábeas data, es decir, conocer, actualizar o rectificar sus datos personales.</li>
                            <li>Solicitar y conservar, en las condiciones previstas en esta política, copia de la respectiva autorización otorgada por el titular de datos personales.</li>
                            <li>Informar acerca de la finalidad de la recolección y los derechos que le asisten por virtud de la autorización otorgada. Esta comunicación se hará a través de la autorización que suscriba el cliente o el Aviso de Privacidad de Datos.</li>
                            <li>Atender las solicitudes del titular sobre el uso dado a sus datos personales y dar trámite a las consultas y reclamos formulados en los términos señalados en la presente política. </li>
                            <li>Dar trámite a las solicitudes de actualización, rectificación de datos personales cuando sea procedente.</li>
                            <li>Contar con las medidas de seguridad para impedir la adulteración, pérdida, consulta o uso no autorizado de datos personales, los cuales deben quedar de manifiesto en los manuales y demás documentos internos. </li>
                            <li>Observar los principios de veracidad, calidad, seguridad y confidencialidad en los términos establecidos en la presente política.</li>
                            <li>Garantizar que la información suministrada al encargado del tratamiento sea veraz, completa, exacta, actualizada y comprensible. </li>
                            <li>Informar a la autoridad de protección de datos cuando se hayan vulnerado los mecanismos de seguridad y existan riesgos en la administración de los datos personales de los titulares.</li>
                            <li>Informar al Encargado del tratamiento cuando determinada información se encuentra en discusión por parte del titular una vez presentado el reclamo y mientras su resolución se encuentre en trámite. </li>
                        </ul>
                        Cuando se realiza el tratamiento a través de un ENCARGADO, son deberes de <strong>COOTRANSHUILA LTDA</strong>: <br><br>
                        <ul>
                            <li>Suministrar al encargado del tratamiento sólo los datos personales cuyo tratamiento esté previamente autorizado. Cuando se trate de transmisiones nacionales e internacionales se deberá suscribir un contrato de transmisión de datos personales o pactar cláusulas contractuales que contengan lo dispuesto en el artículo 25 del decreto 1377 de 2013.</li>
                            <li>Exigir al encargado del tratamiento en todo momento, el respeto a las condiciones de seguridad y privacidad de la información del Titular. </li>
                        </ul>

                        <p><strong>13. AUTORIZACIÓN</strong><br>
                        <strong>COOTRANSHUILA LTDA</strong> deberá obtener de parte del titular su autorización previa, expresa e informada para recolectar y tratar sus datos personales. Para lo cual, se dejará expresa constancia de ello, según sea el caso de clientes, proveedores o terceros. <br>
                        Esta obligación no es necesaria cuando se trate de datos de naturaleza pública, tratamiento de información para fines históricos, estadísticos o científicos en los cuales no se vincule la información a una persona específica y datos relacionados con el Registro Civil de las Personas. <br><br>
                        <strong>EVENTOS EN LOS CUALES NO ES NECESARIA LA AUTORIZACIÓN DEL TÍTULAR DE LOS DATOS PERSONALES.</strong><br>
                        La autorización del titular de la información no será necesaria en los siguientes casos: 
                        <ul>
                            <li>Información requerida por una entidad pública o administrativa en ejercicio de sus funciones legales o por orden judicial.</li>
                            <li>Datos de naturaleza pública.</li>
                            <li>Casos de urgencia médica o sanitaria.</li>
                            <li>Tratamiento de información autorizado por la ley para fines históricos, estadísticos o científicos. Datos relacionados con el Registro Civil de las personas.</li>
                        </ul>
                        </p>

                        <p><strong>14  PROCEDIMIENTOS ESTABLECIDOS PARA GARANTIZAR EL EJERCICIO DE LOS DERECHOS DE LOS TITULARES. <br>
                        14.1 Consultas </strong> <br>
                        Los Titulares de la información podrán realizar sus consultas de las siguientes formas: 
                        <ul>
                            <li>Solicitudes presentadas a través de documento escrito o vía correo electrónico, serán tramitadas y las respuestas sólo serán remitidas a la dirección electrónica autorizada por el cliente.</li>
                            <li>Solicitudes presentadas telefónicamente a Servicio al Cliente serán tramitadas, luego del resultado positivo en la validación de identidad a través de un cuestionario.</li>
                            <li>Para el caso de causahabientes, se solicitará carta autenticada en la que los beneficiarios de ley den autorización a la persona a realizar consultas sobre los productos de un cliente fallecido, copia de la cédula del autorizado a solicitar información, copia del acta de defunción, documento que soporte el parentesco, en caso se trate de hijos o esposas. Finalmente, la información se remite a la dirección autorizada en la carta.</li>
                        </ul>
                        Una vez que <strong>COOTRANSHUILA LTDA</strong>, reciba la solicitud de información por cualquiera de los medios anteriormente señalados, procederá a revisar la información individual que corresponda al nombre del Titular y en caso exista algún aspecto que deba ser aclarado antes de dar respuesta a la consulta, ésta situación se informará dentro de los cinco (05) días hábiles siguientes a su recibo, con el fin de que el solicitante la aclare. <br>
                         Si no existen aspectos que deban ser aclarados y que impidan proporcionar respuesta a la consulta, se procederá a dar respuesta en un término de diez (10) días hábiles. <br>
                        En el evento que <strong>COOTRANSHUILA LTDA</strong>, necesite de un mayor tiempo para dar respuesta a la consulta, informará al titular de tal situación y dará respuesta en un término que no excederá de cinco (5) días hábiles siguientes al vencimiento del término. </p>

                        <p><strong>14.2 Reclamos</strong><br>
                        El titular o sus causahabientes que consideren que la información contenida en una base de datos administrada por <strong>COOTRANSHUILA LTDA</strong>, debe ser sujeta de corrección, actualización o supresión, o si advierten un incumplimiento de la entidad o de alguno de sus encargados, podrán presentar un reclamo en los siguientes términos: 
                        <ul>
                            <li>El reclamo se formulará con la descripción clara de los hechos que dan lugar al reclamo, la dirección donde desea recibir notificaciones, pudiendo ser esta física o electrónica y adjuntando los documentos que pretenda hacer valer. </li>
                            <li>Si el reclamo resulta incompleto se requerirá al interesado dentro de los cinco (05) días siguientes a la recepción del reclamo para que subsane las fallas. </li>
                            <li>Transcurridos dos (2) meses desde la fecha del requerimiento, sin que el solicitante presente la información requerida, se entenderá que ha desistido del reclamo. </li>
                            <li>En caso que <strong>COOTRANSHUILA LTDA</strong>, no sea competente para resolverlo, dará traslado a quien corresponda en un término máximo de dos (2) días hábiles e informará de la situación al Interesado. <strong>COOTRANSHUILA LTDA</strong>, utilizará la dirección electrónica clientes@cootranshuila.com para estos efectos de tal manera que se pueda identificar en qué momento se da traslado y la respuesta o confirmación de recibido correspondiente. Si no se conoce la persona a quien deba trasladarlo, informará de inmediato al Titular con copia a la Superintendencia de Industria y Comercio.</li>
                            <li>Una vez recibido el reclamo completo, se debe incluir en la base de datos correspondiente la leyenda “reclamo en trámite” y el motivo del mismo, esto debe ocurrir en un término máximo de dos (2) días hábiles. </li>
                            <li>El término máximo para responder el reclamo es de quince (15) días hábiles, si no es posible hacerlo en este término se informará al interesado los motivos de la demora y la fecha en que éste se atenderá, la cual no podrá exceder de ocho (08) días hábiles siguientes al vencimiento del primer término.</li>
                        </ul>
                        </p>

                        <p><strong>15. PERSONA O DEPENDENCIA RESPONSABLE DE LA ATENCIÓN DE PETICIONES, CONSULTAS Y RECLAMOS.</strong><br>
                        El decreto 1377 de 2013 establece lo siguiente: <br>
                        El artículo 13 de la citada norma establece que: “Los responsables del tratamiento deberán desarrollar sus políticas para el Tratamiento de los datos personales y velar porque los Encargados del Tratamiento den cabal cumplimiento a las mismas” <br>
                        El numeral 4 del citado artículo ordena que en las políticas se debe incluir, por lo menos, esta información: “Persona o área responsable de la atención de peticiones, consultas y reclamos….);<br><br>
                        El artículo 23 ordena a todo Responsable o Encargado “designar una persona o área que asuma la función de protección de datos personales, que dará trámite a las solicitudes de los titulares, para el ejercicio de los derechos a que se refiere la Ley 1581 de 2012 y el presente Decreto”;<br> 
                        El artículo 27 establece lo siguiente: “las políticas deberán garantizar: 1. La existencia de una estructura administrativa proporcional a la estructura y tamaño empresarial del Responsable para la adopción e implementación de políticas consistentes con la Ley 1581 de 2012 y este Decreto”<br><br>
                        Por lo anterior, en <strong>COOTRANSHUILA LTDA</strong>, el área de Servicio al Cliente será responsable de velar por el cumplimiento de estas disposiciones. Esta área tendrá una comunicación directa con los responsables de las áreas identificadas a lo largo del presente instructivo: Dirección Jurídica, Mercadeo, Seguridad de la Información, Área de Gestión de Clientes, Gerencia de Operaciones, y cualquier otra área requerida con el fin de garantizar que todos los aspectos señalados queden debidamente atendidos y que los deberes que estipula la ley se cumplan. </p>

                        <p><strong>16.- TRANFERENCIA Y TRANSMISIÓN INTERNACIONAL DE DATOSPERSONALES <br>
                        COOTRANSHUILA LTDA</strong>, en consideración de sus vínculos permanentes u ocasionales de carácter administrativos con entidades internacionales, podrá efectuar transferencia y transmisión de datos personales de los titulares. <br><br>
                        Para la transferencia internacionales de datos personales de los titulares, la <strong>COOTRANSHUILA LTDA</strong>, tomará las medidas necesarias para que los terceros conozcan y se comprometan a observar esta Política, bajo el entendió que la información personal que reciban, únicamente podrán ser utilizada para asuntos directamente relacionados con <strong>COOTRANSHUILA LTDA</strong>, y solamente mientras ésta dure y no podrá ser usada o destinada para propósito o fin diferente. Para la transferencia internacional de datos personales se observará lo previsto en el artículo 26 de la Ley 1581 de 2012. <br><br>
                        Las transmisiones internacionales de datos personales que efectúe <strong>COOTRANSHUILA LTDA</strong>, no requerirán ser informadas al Titular ni contar con su consentimiento cuando medie un contrato de transmisión de datos personales de conformidad al artículo 25 del Decreto 1377 de 2013. <br>
                        Con la aceptación de la presente política, el Titular autoriza expresamente para transferir y transmitida Información Personal. La información será transferida y transmitida, para todas las relaciones que puedan establecerse con <strong>COOTRANSHUILA LTDA</strong>. <br></p>

                        <p><strong>17. LEGISLACIÓN NACIONAL VIGENTE. </strong><br>
                        La presente política se regirá de conformidad con lo previsto en la ley 1581 de 2012 y disposiciones concordantes. En lo referente a la calificación de <strong>COOTRANSHUILA LTDA</strong>, como usuario y fuente de información personal, calificaciones definidas en el artículo tercero (3°) de la ley 1266 de 2008, se aplicarán las disposiciones que sobre la materia se encuentran reguladas por dicha ley.   </p>

                        <p><strong>18. FECHA DE ENTRADA EN VIGENCIA DE LA POLÍTICA DETRATAMIENTO</strong><br>
                        <div id="cookies"></div>
                        Una vez aprobada por el consejo de administración de <strong>COOTRANSHUILA LTDA</strong>, la presente política entra en vigencia. <br>

                        La vigencia de la base de datos será el tiempo razonable y necesario para cumplir las finalidades del tratamiento teniendo en cuenta lo dispuesto en el artículo 11 del decreto 1377 de 2013. </p>
                        
                        <p><strong>19. COOKIES</strong><br>
                        <strong>COOTRANSHUILA LTDA</strong> usa cookies para adquirir datos que se pueden usar con el fin de determinar su ubicación física a través de su dirección de Protocolo de Internet («Dirección IP») y técnicas de geolocalización automáticas, o para adquirir información básica sobre el ordenador, la tableta o el teléfono móvil que usted utilice para visitarnos. Consulte la descripción incluida a continuación. Al utilizar nuestros sitios web, usted autoriza la recopilación y el uso de datos mediante cookies de acuerdo con las condiciones de esta política de privacidad.</p>
                        <p><strong>COOTRANSHUILA LTDA</strong> usa herramientas comunes de recopilación de información, como cookies, etiquetas de píxeles y balizas web, para recoger información acerca del uso general de Internet. Cuando visite nuestros sitios web, se almacena un archivo de cookies en su navegador o en el disco duro de su dispositivo. Nosotros y nuestros socios de mercadotecnia, empresas vinculadas o proveedores de análisis o de servicios (por ejemplo, procesadores de pagos, etc.) utilizamos tecnologías tales como cookies, balizas, etiquetas y scripts. Estas tecnologías sirven para analizar tendencias, administrar el sitio, realizar un seguimiento de sus movimientos por todo el sitio y recopilar información demográfica sobre nuestra base de usuarios en general. Nosotros podremos recibir informes fundamentados en el uso por parte de estas empresas de estas tecnologías tanto de forma pormenorizada como agregada.  Usted nos autoriza a colocar cookies o tecnologías de seguimiento en su dispositivo.</p>
                        <p>Nosotros podremos asociarnos con cualquier tercero para mostrar publicidad en nuestro sitio o para administrar nuestra publicidad en este sitio y en otros sitios. Nuestro socio tercero podrá usar tecnologías tales como cookies para recoger información sobre sus actividades en este sitio en y otros sitios a fin de proporcionarle publicidad en función de sus actividades de navegación e intereses. Al continuar navegando en nuestros sitios web, usted es consciente del uso de cookies, tal y como se describe en esta Política de privacidad. Si no desea permitir el uso de cookies, puede desactivarlas a través de la configuración de su navegador. Sin embargo, hemos de señalar que posiblemente no todos los navegadores de todas las plataformas admitan esta funcionalidad. Asimismo, si desactiva las cookies, puede que nuestros sitios web no funcionen correctamente o que el acceso y sus funciones se vean afectados o limitados.</p>
                         
                        <div class="row justify-content-center">
                            <a href="http://www.cootranshuila.com/assets/politica_datos/AUTORIZACION.pdf" target="_blank"><button type="button" class="nav-link btn btn-emp mb-5">DESCARGAR FORMATO AQUI</button></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php } ?>

<!-- ======================================= FIN POLITICA DE DATOS =============================== -->

<!-- =============================================== SIPLAT ==================================== -->

<?php 
if (isset($_REQUEST['siplat'])) { ?>


<section class="reserve-block slide-flota">
    <div class="container">
        <div class="row justify-content-center">
            <div class="booking-checkbox_wrap">
                <div class="booking-checkbox">
                    <h4>SIPLAT</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="light-bg booking-details_wrap">
    <div class="container booking-checkbox_wrap">
        <div class="row justify-content-center">

            <div class="col-md-10 responsive-wrap">
                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox">
                            <button type="button" class="btn btn-emps mb-2" data-toggle="collapse" data-target="#siplat1">Documento 1</button>
                            <div id="siplat1" class="collapse mb-3">
                                <p><strong>RIESGO DEL LAVADO DE ACTIVOS Y LA FINANCIACION DEL TERRORISMO LA/FT</strong></p>
                                <p>¿Desea mirar el documento?</p>
                                <a href="https://docs.google.com/viewerng/viewer?url=http://cootranshuila.com/assets/SIPLAFT/riesgo.pdf" target="_blank"><button type="button" class="btn btn-em">Si</button></a>
                                <button type="button" class="btn btn-em" data-toggle="collapse" data-target="#siplat1">No</button>
                            </div> 
                    </div>
                </div>
            </div>

            <div class="col-md-10 responsive-wrap">
                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox">
                            <button type="button" class="btn btn-emps mb-2" data-toggle="collapse" data-target="#siplat2">Documento 2</button>
                            <div id="siplat2" class="collapse mb-3">
                                <p><strong>Manual de Procedimientos para la aplicación de las políticas integrales de Prevención y Control del Riesgo de Lavado de Activos y Financiación de Terrorismo (SIPLAFT)</strong></p>
                                <p>¿Desea mirar el documento?</p>
                                <a href="https://docs.google.com/viewerng/viewer?url=http://cootranshuila.com/assets/SIPLAFT/manual.pdf" target="_blank"><button type="button" class="btn btn-em">Si</button></a>
                                <button type="button" class="btn btn-em" data-toggle="collapse" data-target="#siplat2">No</button>
                            </div>    
                    </div>
                </div>
            </div>

            <div class="col-md-10 responsive-wrap">
                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox">
                            <button type="button" class="btn btn-emps mb-2" data-toggle="collapse" data-target="#siplat3">Documento 3</button>
                            <div id="siplat3" class="collapse mb-3">
                                <p><strong>Política del Sistema Integral de Prevención y Control del Riesgo de Lavado de Activos y Financiación de Terrorismo (SIPLAFT)</strong></p>
                                <p>¿Desea mirar el documento?</p>
                                <a href="https://docs.google.com/viewerng/viewer?url=http://cootranshuila.com/assets/SIPLAFT/politica.pdf" target="_blank"><button type="button" class="btn btn-em">Si</button></a>
                                <button type="button" class="btn btn-em" data-toggle="collapse" data-target="#siplat3">No</button>
                            </div>   
                    </div>
                </div>
            </div>

            <div class="col-md-10 responsive-wrap">
                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox">
                            <button type="button" class="btn btn-emps mb-2" data-toggle="collapse" data-target="#siplat4">Documento 4</button>
                            <div id="siplat4" class="collapse mb-3">
                                <p><strong>FORMATO ÚNICO DE CONOCIMIENTO E INSCRIPCIÓN DEL CLIENTE – PROVEEDOR- CONTRATISTA-PERSONA JURIDICA SIPLAFT</strong></p>
                                <p>¿Desea mirar el documento?</p>
                                <a href="https://docs.google.com/viewerng/viewer?url=http://cootranshuila.com/assets/SIPLAFT/PERSONA_JURIDICA.pdf" target="_blank"><button type="button" class="btn btn-em">Si</button></a>
                                <button type="button" class="btn btn-em" data-toggle="collapse" data-target="#siplat4">No</button>
                            </div>   
                    </div>
                </div>
            </div>

            <div class="col-md-10 responsive-wrap">
                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox">
                            <button type="button" class="btn btn-emps mb-2" data-toggle="collapse" data-target="#siplat5">Documento 5</button>
                            <div id="siplat5" class="collapse mb-3">
                                <p><strong>FORMATO ÚNICO DE CONOCIMIENTO E INSCRIPCIÓN DEL CLIENTE – PROVEEDOR- CONTRATISTA- EMPLEADO- PERSONA NATURAL</strong></p>
                                <p>¿Desea mirar el documento?</p>
                                <a href="https://docs.google.com/viewerng/viewer?url=http://cootranshuila.com/assets/SIPLAFT/FORMTAO_EMPLEADOS.pdf" target="_blank"><button type="button" class="btn btn-em">Si</button></a>
                                <button type="button" class="btn btn-em" data-toggle="collapse" data-target="#siplat5">No</button>
                            </div>   
                    </div>
                </div>
            </div>

            <div class="col-md-10 responsive-wrap">
                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox">
                        <a href="campusvirtual/" class="btn btn-emps mb-2">Campus Virtual. Capacitate con nosotros competamente gratis.</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<?php } ?>

<!-- ======================================= FIN SIPLAT =============================== -->

<!-- =============================================== DIAN ==================================== -->

<?php 
if (isset($_REQUEST['dian'])) { ?>


<section class="reserve-block slide-flota">
    <div class="container">
        <div class="row justify-content-center">
            <div class="booking-checkbox_wrap">
                <div class="booking-checkbox">
                    <h4>INFORMACION DIAN</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="light-bg booking-details_wrap">
    <div class="container booking-checkbox_wrap">
        <div class="row justify-content-center">

            <div class="col-md-10 responsive-wrap">
                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox">
                            <button type="button" class="btn btn-emps mb-2" data-toggle="collapse" data-target="#dian1">Documento 1</button>
                            <div id="dian1" class="collapse mb-3">
                                <p><strong>CERTIFICADO ARTICULO 364-5</strong></p>
                                <p>¿Desea mirar el documento?</p>
                                <a href="assets/info-dian/CERTIFICADO ARTICULO 364-5.pdf" target="_blank"><button type="button" class="btn btn-em">Si</button></a>
                                <button type="button" class="btn btn-em" data-toggle="collapse" data-target="#dian1">No</button>
                            </div> 
                    </div>
                </div>
            </div>

            <div class="col-md-10 responsive-wrap">
                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox">
                            <button type="button" class="btn btn-emps mb-2" data-toggle="collapse" data-target="#dian2">Documento 2</button>
                            <div id="dian2" class="collapse mb-3">
                                <p><strong>CERTIFICADO DE EXISTENCIA Y REPRESENTACION LEGAL</strong></p>
                                <p>¿Desea mirar el documento?</p>
                                <a href="assets/info-dian/CERTIFICADO DE EXISTENCIA Y REPRESENTACION LEGAL.pdf" target="_blank"><button type="button" class="btn btn-em">Si</button></a>
                                <button type="button" class="btn btn-em" data-toggle="collapse" data-target="#dian2">No</button>
                            </div>    
                    </div>
                </div>
            </div>

            <div class="col-md-10 responsive-wrap">
                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox">
                            <button type="button" class="btn btn-emps mb-2" data-toggle="collapse" data-target="#dian3">Documento 3</button>
                            <div id="dian3" class="collapse mb-3">
                                <p><strong>CERTIFICADO NO ANTECEDENTES JUDICIALES</strong></p>
                                <p>¿Desea mirar el documento?</p>
                                <a href="assets/info-dian/CERTIFICADO NO ANTECEDENTES JUDICIALES.pdf" target="_blank"><button type="button" class="btn btn-em">Si</button></a>
                                <button type="button" class="btn btn-em" data-toggle="collapse" data-target="#dian3">No</button>
                            </div>   
                    </div>
                </div>
            </div>

            <div class="col-md-10 responsive-wrap">
                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox">
                            <button type="button" class="btn btn-emps mb-2" data-toggle="collapse" data-target="#dian4">Documento 4</button>
                            <div id="dian4" class="collapse mb-3">
                                <p><strong>CERTIFICADO PAGOS A DIRECTIVOS</strong></p>
                                <p>¿Desea mirar el documento?</p>
                                <a href="assets/info-dian/CERTIFICADO PAGOS A DIRECTIVOS.pdf" target="_blank"><button type="button" class="btn btn-em">Si</button></a>
                                <button type="button" class="btn btn-em" data-toggle="collapse" data-target="#dian4">No</button>
                            </div>   
                    </div>
                </div>
            </div>

            <div class="col-md-10 responsive-wrap">
                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox">
                            <button type="button" class="btn btn-emps mb-2" data-toggle="collapse" data-target="#dian5">Documento 5</button>
                            <div id="dian5" class="collapse mb-3">
                                <p><strong>CERTIFICADO REINVERSION DE EXCEDENTES</strong></p>
                                <p>¿Desea mirar el documento?</p>
                                <a href="assets/info-dian/CERTIFICADO REINVERSION DE EXCEDENTES.pdf" target="_blank"><button type="button" class="btn btn-em">Si</button></a>
                                <button type="button" class="btn btn-em" data-toggle="collapse" data-target="#dian5">No</button>
                            </div>   
                    </div>
                </div>
            </div>

            <div class="col-md-10 responsive-wrap">
                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox">
                            <button type="button" class="btn btn-emps mb-2" data-toggle="collapse" data-target="#dian6">Documento 6</button>
                            <div id="dian6" class="collapse mb-3">
                                <p><strong>ESTADOS FINANCIEROS 2018</strong></p>
                                <p>¿Desea mirar el documento?</p>
                                <a href="assets/info-dian/ESTADOS FINANCIEROS 2018.pdf" target="_blank"><button type="button" class="btn btn-em">Si</button></a>
                                <button type="button" class="btn btn-em" data-toggle="collapse" data-target="#dian6">No</button>
                            </div>   
                    </div>
                </div>
            </div>

            <div class="col-md-10 responsive-wrap">
                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox">
                            <button type="button" class="btn btn-emps mb-2" data-toggle="collapse" data-target="#dian7">Documento 7</button>
                            <div id="dian7" class="collapse mb-3">
                                <p><strong>ESTATUTOS COOTRANSHUILA</strong></p>
                                <p>¿Desea mirar el documento?</p>
                                <a href="assets/info-dian/ESTATUTOS COOTRANSHUILA.pdf" target="_blank"><button type="button" class="btn btn-em">Si</button></a>
                                <button type="button" class="btn btn-em" data-toggle="collapse" data-target="#dian7">No</button>
                            </div>   
                    </div>
                </div>
            </div>

            <div class="col-md-10 responsive-wrap">
                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox">
                            <button type="button" class="btn btn-emps mb-2" data-toggle="collapse" data-target="#dian8">Documento 8</button>
                            <div id="dian8" class="collapse mb-3">
                                <p><strong>INFORME GESTION</strong></p>
                                <p>¿Desea mirar el documento?</p>
                                <a href="assets/info-dian/INFORME GESTION.pdf" target="_blank"><button type="button" class="btn btn-em">Si</button></a>
                                <button type="button" class="btn btn-em" data-toggle="collapse" data-target="#dian8">No</button>
                            </div>   
                    </div>
                </div>
            </div>

            <div class="col-md-10 responsive-wrap">
                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox">
                            <button type="button" class="btn btn-emps mb-2" data-toggle="collapse" data-target="#dian9">Documento 9</button>
                            <div id="dian9" class="collapse mb-3">
                                <p><strong>MEMORIA ECONOMICA</strong></p>
                                <p>¿Desea mirar el documento?</p>
                                <a href="assets/info-dian/MEMORIA ECONOMICA.pdf" target="_blank"><button type="button" class="btn btn-em">Si</button></a>
                                <button type="button" class="btn btn-em" data-toggle="collapse" data-target="#dian9">No</button>
                            </div>   
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<?php } ?>

<!-- ======================================= FIN DIAN =============================== -->

<!-- ====================================== INFO ======================================== -->

<?php 
if (!isset($_REQUEST['flota']) && !isset($_REQUEST['especial']) && !isset($_REQUEST['empresa']) && !isset($_REQUEST['politica']) && !isset($_REQUEST['siplat']) && !isset($_REQUEST['dian'])) { ?>
    
<section class="reserve-block slide-flota">
    <div class="container">
        <div class="row justify-content-center">
            <div class="booking-checkbox_wrap">
                <div class="booking-checkbox">
                    <h4>Informacion</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="main-block light-bg">
        <div class="container">
            <div class="row">
                
                <div class="col-md-4">
                    <div class="find-place-img_wrap">
                        <div class="grid">
                            <a href="info.php?flota">
                                <figure class="effect-rub">
                                    <img src="assets/images/img/box-2.png" class="img-fluid" alt="flota" />
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="find-place-img_wrap">
                        <div class="grid">
                            <a href="info.php?especial">
                                <figure class="effect-rub">
                                    <img src="assets/images/img/IMAGE.png" class="img-fluid" alt="servicio especial" />
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="find-place-img_wrap">
                        <div class="grid">
                            <a href="info.php?empresa=historia">
                                <figure class="effect-rub">
                                    <img src="assets/images/img/box-historia.png" class="img-fluid" alt="Historia" />
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="find-place-img_wrap">
                        <div class="grid">
                            <a href="info.php?empresa=empresa">
                                <figure class="effect-rub">
                                    <img src="assets/images/img/box-empresa.png" class="img-fluid" alt="Nuestra empresa" />
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="find-place-img_wrap">
                        <div class="grid">
                            <a href="info.php?politica">
                                <figure class="effect-rub">
                                    <img src="assets/images/img/politica.png" class="img-fluid" alt="Politica Datos" />
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="find-place-img_wrap">
                        <div class="grid">
                            <a href="info.php?siplat">
                                <figure class="effect-rub">
                                    <img src="assets/images/img/Siplat.png" class="img-fluid" alt="Siplat" />
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>
                 
                               
            </div>
        </div>
    </section>

<?php } ?>



<!-- =========================================== FIN INFO ================================== -->

<!--============================= FOOTER =============================-->
    <div class="foo-footer"></div>
    <footer class="main-block dark-bg">
        <div class="container">
            <div class="row">
                <div class="colum col-md-4">
                    <h6><strong>Mas informacion</strong></h6>
                    <br>
                    <br>
                    <p>Nuestra más alta prioridad es el cliente para quien tenemos nuestra mejor actitud de servicio, el cliente es la razón de ser de nuestro trabajo; le servimos con gusto en forma amable y eficiente; nuestro potencial mas valioso es nuestra gente y la capacidad de trabajar en equipo.</p>
                    <br>
                    <br>
                    <div class="img-foo">
                        <a href="http://www.supertransporte.gov.co/super/" target="_blank"><img src="assets/images/img/footer-logo-1.png" class="img-fluid"></a>
                        <a href="https://www.mintransporte.gov.co/" target="_blank"><img src="assets/images/img/footer-logo-2.png" class="img-fluid"></a>
                        <a href="https://www.simit.org.co/" target="_blank"><img src="assets/images/img/footer-logo-3.png" class="img-fluid"></a>
                        <a href="https://www.invias.gov.co/" target="_blank"><img src="assets/images/img/footer-logo-4.png" class="img-fluid"></a>
                    </div>
                </div>
                <div class="colum col-md-4">
                    <h6><strong>Redes sociales</strong></h6>
                    <br>
                    <div class="copyright">
                        <ul>
                            <li><a href="https://www.facebook.com/cootranshuilaltdaoficial" target="_blank"><span class="ti-facebook"></span>&nbsp;&nbsp;Siguenos en Facebook</a></li><br>
                            <li><a href="https://twitter.com/cootranshuila" target="_blank"><span class="ti-twitter-alt"></span>&nbsp;&nbsp;Siguenos en Twitter</a></li><br>
                            <li><a href="https://www.instagram.com/cootranshuila" target="_blank"><span class="ti-instagram"></span>&nbsp;&nbsp;Siguenos en Instagram</a></li>
                        </ul>
                    </div>
                </div>
                <div class="colum col-md-4">
                    <h6><strong>Contacto</strong></h6>
                    <br>
                    <br>
                    <div class="copyrightC">
                        <ul>
                            <li><span class="ti-home"></span>&nbsp;&nbsp;Av. 26 No. 4-82, Neiva - Huila</a></li><br>
                            <li><span class="ti-mobile"></span>&nbsp;&nbsp;(8)875 6365 | 8756368</a></li><br>
                            <li><span class="ti-email"></span>&nbsp;&nbsp;clientes@cootranshuila.com</a></li><br>
                            <li><span class="ti-user"></span><a href="formulario_postulado.php">&nbsp;&nbsp;Trabaje con nosotros</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="foo-foo">
        <p class="coo">&copy;Cootranshuila 2019</p>
    </div>


    <!--//END FOOTER -->


    
    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- Magnific popup JS -->
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <!-- Swipper Slider JS -->
    <script src="assets/js/swiper.min.js"></script>


<script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <script>
        if ($('.image-link').length) {
            $('.image-link').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
        if ($('.image-link2').length) {
            $('.image-link2').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
    </script>
    <script>
        $(window).scroll(function() {
            // 100 = The point you would like to fade the nav in.


            if ($(document).scrollTop() > 350) {
                $('.contact-info').removeClass('d-none');
            }
            
            if ($(document).scrollTop() > 3900) {
                $('.contact-info').addClass('d-none');
            }
            else {
                $('.contact-info').removeClass('d-none');
            }
            if ($(document).scrollTop() < 350) {
                $('.contact-info').addClass('d-none');
            }

        });

        $(document).ready(function(){

            $('[data-toggle="popover"]').popover({ html : true });
            $('.nav-link1').css({
                 "color": "rgb(0, 162, 81)"
            });
            
            $("#encomiendasN").click(function(){
                $("#ModalEncomiendas").modal();
            });
            $("#estacionN").click(function(){
                $("#ModalEstacion").modal();
            });
            $("#comentarios").click(function(){
                $("#ModalComentarios").modal();
                $("#loading").removeClass("d-none");
                $("#titulo_comen").html("Comentarios del servicio Doble Yo");
                $("#comentario_flota").val('Doble Yo');  
                $("#comentar").removeClass("show");

                function mostrar_comentarios(){

                    $.ajax({
                        type: "POST",
                        url: "dashboard/enviar.php?mostrarComentario",
                        data: { servicio:"Doble Yo" },
                        success: function(data) {
                            $("#loading").addClass("d-none");                            
                            $("#mostrarComen").html(data);
                        }
                    });

                }

                mostrar_comentarios();

            });
            $("#comentarios1").click(function(){
                $("#ModalComentarios").modal();
                $("#loading").removeClass("d-none");
                $("#titulo_comen").html("Comentarios del servicio Doble Yo");
                $("#comentario_flota").val('Doble Yo'); 
                $("#comentar").addClass("show");

                function mostrar_comentarios(){

                    $.ajax({
                        type: "POST",
                        url: "dashboard/enviar.php?mostrarComentario",
                        data: { servicio:"Doble Yo" },
                        success: function(data) {
                            $("#loading").addClass("d-none");                            
                            $("#mostrarComen").html(data);
                        }
                    });

                }

                mostrar_comentarios();

            });
            $("#comentarios2").click(function(){
                $("#ModalComentarios").modal();
                $("#loading2").removeClass("d-none");
                $("#titulo_comen").html("Comentarios del servicio VIP");
                $("#comentario_flota").val("VIP");
                $("#comentar").removeClass("show");

                function mostrar_comentarios(){

                    $.ajax({
                        type: "POST",
                        url: "dashboard/enviar.php?mostrarComentario",
                        data: { servicio:"VIP" },
                        success: function(data) {
                            $("#loading2").addClass("d-none");                            
                            $("#mostrarComen").html(data);
                        }
                    });

                }

                mostrar_comentarios();

            });
            $("#comentarios22").click(function(){
                $("#ModalComentarios").modal();
                $("#loading2").removeClass("d-none");
                $("#titulo_comen").html("Comentarios del servicio VIP");
                $("#comentario_flota").val("VIP");
                $("#comentar").addClass("show");

                function mostrar_comentarios(){

                    $.ajax({
                        type: "POST",
                        url: "dashboard/enviar.php?mostrarComentario",
                        data: { servicio:"VIP" },
                        success: function(data) {
                            $("#loading2").addClass("d-none");                            
                            $("#mostrarComen").html(data);
                        }
                    });

                }

                mostrar_comentarios();

            });
            $("#comentarios3").click(function(){
                $("#ModalComentarios").modal();
                $("#loading3").removeClass("d-none");
                $("#titulo_comen").html("Comentarios del servicio Platino Expres");
                $("#comentario_flota").val("Platino Expres");
                $("#comentar").removeClass("show");

                function mostrar_comentarios(){

                    $.ajax({
                        type: "POST",
                        url: "dashboard/enviar.php?mostrarComentario",
                        data: { servicio:"Platino Expres" },
                        success: function(data) {
                            $("#loading3").addClass("d-none");                            
                            $("#mostrarComen").html(data);
                        }
                    });

                }

                mostrar_comentarios();

            });
            $("#comentarios33").click(function(){
                $("#ModalComentarios").modal();
                $("#loading3").removeClass("d-none");
                $("#titulo_comen").html("Comentarios del servicio Platino Expres");
                $("#comentario_flota").val("Platino Expres");
                $("#comentar").addClass("show");

                function mostrar_comentarios(){

                    $.ajax({
                        type: "POST",
                        url: "dashboard/enviar.php?mostrarComentario",
                        data: { servicio:"Platino Expres" },
                        success: function(data) {
                            $("#loading3").addClass("d-none");                            
                            $("#mostrarComen").html(data);
                        }
                    });

                }

                mostrar_comentarios();

            });
            $("#comentarios4").click(function(){
                $("#ModalComentarios").modal();
                $("#loading4").removeClass("d-none");
                $("#titulo_comen").html("Comentarios del servicio Platino JET");
                $("#comentario_flota").val("Platino JET");
                $("#comentar").removeClass("show");

                function mostrar_comentarios(){

                    $.ajax({
                        type: "POST",
                        url: "dashboard/enviar.php?mostrarComentario",
                        data: { servicio:"Platino JET" },
                        success: function(data) {
                            $("#loading4").addClass("d-none");                            
                            $("#mostrarComen").html(data);
                        }
                    });

                }

                mostrar_comentarios();

            });
            $("#comentarios44").click(function(){
                $("#ModalComentarios").modal();
                $("#loading4").removeClass("d-none");
                $("#titulo_comen").html("Comentarios del servicio Platino JET");
                $("#comentario_flota").val("Platino JET");
                $("#comentar").addClass("show");

                function mostrar_comentarios(){

                    $.ajax({
                        type: "POST",
                        url: "dashboard/enviar.php?mostrarComentario",
                        data: { servicio:"Platino JET" },
                        success: function(data) {
                            $("#loading4").addClass("d-none");                            
                            $("#mostrarComen").html(data);
                        }
                    });

                }

                mostrar_comentarios();

            });
            $("#comentarios5").click(function(){
                $("#ModalComentarios").modal();
                $("#loading5").removeClass("d-none");
                $("#titulo_comen").html("Comentarios del servicio Platino Especial");
                $("#comentario_flota").val("Platino Especial");
                $("#comentar").removeClass("show");

                function mostrar_comentarios(){

                    $.ajax({
                        type: "POST",
                        url: "dashboard/enviar.php?mostrarComentario",
                        data: { servicio:"Platino Especial" },
                        success: function(data) {
                            $("#loading5").addClass("d-none");                            
                            $("#mostrarComen").html(data);
                        }
                    });

                }

                mostrar_comentarios();

            });
            $("#comentarios55").click(function(){
                $("#ModalComentarios").modal();
                $("#loading5").removeClass("d-none");
                $("#titulo_comen").html("Comentarios del servicio Platino Especial");
                $("#comentario_flota").val("Platino Especial");
                $("#comentar").addClass("show");

                function mostrar_comentarios(){

                    $.ajax({
                        type: "POST",
                        url: "dashboard/enviar.php?mostrarComentario",
                        data: { servicio:"Platino Especial" },
                        success: function(data) {
                            $("#loading5").addClass("d-none");                            
                            $("#mostrarComen").html(data);
                        }
                    });

                }

                mostrar_comentarios();

            });
            $("#comentarios6").click(function(){
                $("#ModalComentarios").modal();
                $("#loading6").removeClass("d-none");
                $("#titulo_comen").html("Comentarios del servicio MIXTO");
                $("#comentario_flota").val("MIXTO");
                $("#comentar").removeClass("show");

                function mostrar_comentarios(){

                    $.ajax({
                        type: "POST",
                        url: "dashboard/enviar.php?mostrarComentario",
                        data: { servicio:"MIXTO" },
                        success: function(data) {
                            $("#loading6").addClass("d-none");                            
                            $("#mostrarComen").html(data);
                        }
                    });

                }

                mostrar_comentarios();

            });
            $("#comentarios66").click(function(){
                $("#ModalComentarios").modal();
                $("#loading6").removeClass("d-none");
                $("#titulo_comen").html("Comentarios del servicio MIXTO");
                $("#comentario_flota").val("MIXTO");
                $("#comentar").addClass("show");

                function mostrar_comentarios(){

                    $.ajax({
                        type: "POST",
                        url: "dashboard/enviar.php?mostrarComentario",
                        data: { servicio:"MIXTO" },
                        success: function(data) {
                            $("#loading6").addClass("d-none");                            
                            $("#mostrarComen").html(data);
                        }
                    });

                }

                mostrar_comentarios();

            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover({ html : true });
        });
    </script>
    <!-- BEGIN JIVOSITE CODE {literal} -->
      <script type='text/javascript'>
        (function(){ var widget_id = '3BLJZfh8Vq';var d=document;var w=window;function l(){
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
      </script>
  <!-- {/literal} END JIVOSITE CODE -->

  <!-- Google Analytics CODE {literal} -->

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-75274261-1', 'auto');
      ga('send', 'pageview');
    </script>

    <!-- {/literal} END Google Analytics -->

    <!-- Publicidad -->

      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

      <!-- Publicidad -->

      <ins class="adsbygoogle"
           style="display:inline-block;width:728px;height:90px"
           data-ad-client="ca-pub-6033859300113571"
           data-ad-slot="5322158533"></ins>
      <script>

      (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
      
    <!-- Publicidad -->
</body>

</html>


