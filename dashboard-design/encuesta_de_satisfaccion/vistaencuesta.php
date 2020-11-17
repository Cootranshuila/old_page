<?php 

// require "../assets/config/ConexionBaseDatos_PDO.php";
// $conexion = conectaDb();    

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- ICON -->
    <link rel="icon" type="image/png" href="../../assets/images/logo-icon.png" />
    <!-- Page Title -->
    <title>Cootranshuila Encuesta</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="../../assets/css/simple-line-icons.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="../../assets/css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="../../assets/css/set1.css">
    <!-- Swipper Slider -->
    <link rel="stylesheet" href="../../assets/css/swiper.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="../../assets/css/magnific-popup.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- <link rel="stylesheet" href="css/estilo.css"> -->

    <LINK REL=StyleSheet HREF="assets/css/estilo.css" TYPE="text/css" MEDIA=screen> 
    <LINK REL=StyleSheet HREF="assets/css/mdb.css" TYPE="text/css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <!-- <link rel="stylesheet" href="../../assets/css/style.css"> -->
    <link rel="stylesheet" href="assets/css/sweetalert.css">
   



</head>
<body>

<!--============================= MODALES =============================-->


    <!--============================= HEADER =============================-->
    <div class="dark-bg sticky-top">
        <div class="transition">
            <div class="container-fluid is-sticky">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="index.php"><img src="../../assets/images/logo.png" class="logo img-fluid"></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-menu"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav nav-tabs">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link1 nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Empresa<span class="icon-arrow-down"></span></a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="../../info.php?empresa=historia">Historia</a>
                                            <a class="dropdown-item" href="../../info.php?empresa=empresa">Nuestra empresa</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link1 nav-link" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Servicios<span class="icon-arrow-down"></span> </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="https://cootranshuila.teletiquete.com/">Tiquetes online</a>
                                            <a class="dropdown-item" href="info.php?especial">Servicio Especial</a>
                                            <a class="dropdown-item" href="#" id="estacionN">Estacion de servicios</a>
                                            <a class="dropdown-item" href="#" id="encomiendasN">Carga y encomiendas</a>
                                            <a class="dropdown-item" href="../../info.php?flota">Transporte de pasajeros</a> 
                                        </div>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link1 nav-link" href="../../index.php#oficinas">Oficinas</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link1 nav-link" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Corporativo<span class="icon-arrow-down"></span></a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="https://silogcootranshuilaerp.sitrans.com.co">Silog Sitrans</a>
                                            <a class="dropdown-item" href="https://accounts.google.com/signin/v2/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ltmpl=default&hd=cootranshuila.com&service=mail&sacu=1&rip=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin">Correo corporativo</a>
                                            <a class="dropdown-item" href="../../dashboard-design">Administrador</a>
                                        </div>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link1 nav-link" href="../../info.php?politica">Politica de datos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link1 nav-link" href="../../info.php?siplat">Siplat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link1 nav-link" href="../../index.php#contacto">Contactenos</a>
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

<!-- ============== CONTENT PAGE ================= -->

<section class="main-block light-bg mt-5" >
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-12 col-md-11 col-lg-11 pb-2">
            <!--Form with header-->
               <div class="card rounded-2">
                  <!-- <div class="card-header p-0">
                     <div class="bg-successt text-white text-center pt-3 pb-1">
                     <h4 class="text">Resultados encuentas</h4> 
                     </div>
                  </div> -->
                  <div class="card-body">
                     <!--Body-->
                         <div class="row justify-content-left mt-2">
                            <div class="col-4">
                            <select class="custom-select mr-sm-2" id="area"  onclick="load();">
                                <option selected>Seleccione...</option>
                                <option value="estacion">Estacion</option>
                                <option value="transporte">Transporte</option>
                            </select>
                            </div>
                            <div class="col-4 input-group">
                            <input class="form-control" type="date"  id="fecha" onclick="load();">
                            <button type="button"  class="btn btn-outline-success" onclick="load();"><i class="fa fa-search"></i> &nbsp; Buscar</button>
                            </div>
                            <div class="col-3">
                            <button type="button"  class="btn btn-outline-success btn-block" id="exportarexcel"><i class="fa fa-file-excel"></i> &nbsp; Exportar a excel</button>
                            </div>
                         </div>

                         <div id="cargando" class="text-center"></div>
		                 <div class="tabla_encuesta"></div><!-- Datos ajax Final -->
                  </div>


            <!--Form with header-->
            </div>
         </div>
      </div>
   </div>

</section>



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
                        <a href="http://www.supertransporte.gov.co/super/" target="_blank"><img src="../../assets/images/img/footer-logo-1.png" class="img-fluid"></a>
                        <a href="https://www.mintransporte.gov.co/" target="_blank"><img src="../../assets/images/img/footer-logo-2.png" class="img-fluid"></a>
                        <a href="https://www.simit.org.co/" target="_blank"><img src="../../assets/images/img/footer-logo-3.png" class="img-fluid"></a>
                        <a href="https://www.invias.gov.co/" target="_blank"><img src="../../assets/images/img/footer-logo-4.png" class="img-fluid"></a>
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
    <script src="../../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>
    <!-- Magnific popup JS -->
    <script src="../../assets/js/jquery.magnific-popup.js"></script>
    <!-- Swipper Slider JS -->
    <script src="../../assets/js/swiper.min.js"></script>
   <!--    <script src="assets/js/script.js"></script> -->

          <!--  LIBRERIA DEL SWEETALERT -->
       <script src="assets/js/sweetalert.js"></script>

      <script src="assets/js/script.js"></script>
      <script src="assets/js/mdb.js"></script>

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

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover({ html : true });
        });
    </script>

  <!-- Google Analytics CODE {literal} -->

   <!--  <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-75274261-1', 'auto');
      ga('send', 'pageview');
    </script> -->

    <!-- {/literal} END Google Analytics -->

    <!-- Publicidad -->

      <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->

      <!-- Publicidad -->

      <!-- <ins class="adsbygoogle"
           style="display:inline-block;width:728px;height:90px"
           data-ad-client="ca-pub-6033859300113571"
           data-ad-slot="5322158533"></ins>
      <script>

      (adsbygoogle = window.adsbygoogle || []).push({});
      </script> -->
      
    <!-- Publicidad -->
</body>

</html>


