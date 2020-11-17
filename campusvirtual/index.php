<?php 

session_start();
require "../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";

extract($_REQUEST);
$conexion = conectaDb();

if (isset($_SESSION["usr"])) {

    $user = $_SESSION["usr"];

    $sql = $conexion->prepare("SELECT * from estudiantes where id_estudiante = :user");
    $sql->bindParam(":user", $user);
    $sql->execute();

    foreach ($sql->fetchAll() as $row) {
        $n_user = $row['nombre_estudiante'];
    }

    if ($n_user == 'Supertransporte') {
        header("location:estudiantes.php");
    } 

}


if (isset($_SESSION['usr'])) {
    $sql_user = $conexion->prepare('SELECT * from estudiantes where id_estudiante = :id');
    $sql_user->bindParam(":id", $_SESSION['usr']);
    $sql_user->execute();
    $datos_estudiante = $sql_user->fetchAll();
    foreach ($datos_estudiante as $row) {
        $nombre = $row['nombre_estudiante'];
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *Must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Cootranshuila - Campus Virtual</title>

    <!-- Favicon -->
    <link rel="icon" href="img/logo-icon.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
    <link rel="stylesheet" href="../dashboard-design/encuesta_de_satisfaccion/assets/css/sweetalert.css">

</head>

<body>

    <!-- ####### MODALES ####### -->

    <div class="modal fade bd-example-modal-xl" id="signin" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content p-5">
                
                <form class="form-signin" id="form-login">

                    <img class="mb-4" src="img/logo_coo.jpg" alt="">
                    <h1 class="h3 mb-3 mt-3 font-weight-normal text-center">Iniciar session</h1>
                    <label for="inputEmail" class="sr-only">Usuario</label>
                    <input type="text" id="inputEmail" name="user" class="form-control text-center" placeholder="Usuario" required autofocus>
                    <label for="inputPassword" class="sr-only">Contraseña</label>
                    <input type="password" id="inputPassword" name="pwd" class="form-control text-center" placeholder="Contraseña" required>
                    
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
                    
                </form>

            </div>
        </div>
    </div>

    <!-- ####### FIN MODALES ####### -->

    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area d-flex justify-content-between align-items-center">
            <!-- Contact Info -->
            <div class="contact-info">
                <!-- <a href="#"><span>Phone:</span> +44 300 303 0266</a> -->
                <a href="#"><span>Email:</span> clientes@cootranshuila.com</a>
            </div>
            <!-- Follow Us -->
            <div class="follow-us">
                <span>Cootranshuila LTDA.</span>
                <!-- <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> -->
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="clever-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="cleverNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="index.php"><img src="img/logo.png" class="img-fluid logo" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="index.php">Inicio</a></li>
                                <!-- <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="courses.html">Courses</a></li>
                                        <li><a href="single-course.html">Single Courses</a></li>
                                        <li><a href="instructors.html">Instructors</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Single Blog</a></li>
                                        <li><a href="regular-page.html">Regular Page</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </li> -->
                                <li><a href="#cursos">Cursos</a></li>
                                <li><a href="#instructor">Instructor</a></li>
                                <!-- <li><a href="blog.html">Blog</a></li> -->
                                <li><a href="#event">Contacto</a></li>
                            </ul>

                            <!-- Search Button -->
                            <div class="search-area">
                                <form action="#" method="post">
                                    <input type="search" name="search" id="search" placeholder="Buscar">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>

                            <!-- Register / Login -->
                            <?php
                            if (isset($_SESSION['usr'])) { ?>
                                <div class="classynav">
                                    <ul>
                                        <li><a href="#"><?php echo $nombre; ?></a>
                                            <ul class="dropdown">
                                                <li><a href="index.php#cursos">Mis Cursos</a></li>
                                                <li><a href="single-course.html">Diplomas</a></li>
                                                <li><a href="estudiantes.php">Estudiantes</a></li>
                                                <li><a href="validaciones/cerrar_session.php">Salir</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            <?php } else { ?>
                                <div class="register-login-area">
                                    <a href="#register" class="btn">Registrarse</a>
                                    <a data-toggle="modal" data-target="#signin" href="#" class="btn active">Ingresar</a>
                                </div>
                            <?php }
                            
                            ?>

                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area bg-img bg-overlay-2by5" style="background: #28a7457a;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Hero Content -->
                    <div class="hero-content text-center">
                        <h2>Siempre se puede ser mejor</h2>
                        <h5 style="color: #ccc">~ Tiger Woods</h5>
                        <a href="#cursos" class="btn clever-btn mt-5">Comenzar!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Cool Facts Area Start ##### -->
    <section class="cool-facts-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <div class="icon">
                            <img src="img/core-img/docs.svg" alt="">
                        </div>
                        <h2><span class="counter">1</span></h2>
                        <h5>Cursos</h5>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <div class="icon">
                            <img src="img/core-img/calidad.svg" alt="">
                        </div>
                        <h2><span class="counter">2</span></h2>
                        <h5>Aprobados</h5>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="750ms">
                        <div class="icon">
                            <img src="img/core-img/usuarios.svg" alt="">
                        </div>
                        <h2><span class="counter">8</span></h2>
                        <h5>Estudiantes</h5>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="1000ms">
                        <div class="icon">
                            <img src="img/core-img/participacion.svg" alt="">
                        </div>
                        <h2><span class="counter">3</span></h2>
                        <h5>Compartidos</h5>
                    </div>
                </div>
            </div>
            <div id="cursos"></div>
        </div>
    </section>
    <!-- ##### Cool Facts Area End ##### -->

    <!-- ##### Popular Courses Start ##### -->
    <section class="popular-courses-area section-padding-100-0" style="background-image: url(img/core-img/texture.png);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Cursos</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Popular Course -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img src="img/blog-image-17.jpg" alt="">
                        <!-- Course Content -->
                        <div class="course-content">
                            <h4> <a href="single-course.php"> SIPLAFT</a> </h4>
                            <div class="meta d-flex align-items-center">
                                <a href="single-course.php">Sistema de Prevención y Control del lavado de activos</a>
                                <!-- <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">Financiación de terrorismo</a> -->
                            </div>
                            <p>Politica del sistema integral de prevención de lavado de activos y financiación del terrorismo.</p>
                        </div>
                        <!-- Seat Rating Fee -->
                        <div class="seat-rating-fee d-flex justify-content-between">
                            <div class="seat-rating h-100 d-flex align-items-center">
                                <div class="seat">
                                    <i class="fa fa-user" aria-hidden="true"></i> 10
                                </div>
                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i> 4.5
                                </div>
                            </div>
                            <div class="course-fee h-100">
                                <a href="#" class="free">Gratis</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Popular Course -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <img src="img/logo_coo.jpg" style="padding: 45px 25px 45px 25px" alt="">
                        <!-- Course Content -->
                        <div class="course-content">
                            <h4>Proximamente</h4>
                            <div class="meta d-flex align-items-center">
                                <a href="#">Cursos </a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">Gratis</a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis</p>
                        </div>
                        <!-- Seat Rating Fee -->
                        <div class="seat-rating-fee d-flex justify-content-between">
                            <div class="seat-rating h-100 d-flex align-items-center">
                                <div class="seat">
                                    <i class="fa fa-user" aria-hidden="true"></i> 0
                                </div>
                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i> 5
                                </div>
                            </div>
                            <div class="course-fee h-100">
                                <a href="#" class="free">Gratis</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Popular Course -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <img src="img/logo_coo.jpg" style="padding: 45px 25px 45px 25px" alt="">
                        <!-- Course Content -->
                        <div class="course-content">
                            <h4>Proximamente</h4>
                            <div class="meta d-flex align-items-center">
                                <a href="#">Cursos </a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">Gratis</a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis</p>
                        </div>
                        <!-- Seat Rating Fee -->
                        <div class="seat-rating-fee d-flex justify-content-between">
                            <div class="seat-rating h-100 d-flex align-items-center">
                                <div class="seat">
                                    <i class="fa fa-user" aria-hidden="true"></i> 0
                                </div>
                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i> 5
                                </div>
                            </div>
                            <div class="course-fee h-100">
                                <a href="#" class="free">Gratis</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="instructor"></div>
    </section>
    <!-- ##### Popular Courses End ##### -->

    <!-- ##### Best Tutors Start ##### -->
    <section class="best-tutors-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Instructores</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="tutors-slide owl-carousel wow fadeInUp" data-wow-delay="250ms">

                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="img/bg-img/t1.png" alt="">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>Lina Aya</h5>
                                <span>Oficial de Cumplimiento</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum laoreet elit, sit amet tincidunt mauris ultrices vitae.</p>
                                <div class="social-info">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div id="register"></div>
        </div>
    </section>
    <!-- ##### Best Tutors End ##### -->
    
    <!-- ##### Register Now Start ##### -->
    <section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">
        
        <!-- Register Contact Form -->
        <div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="forms">
                            <h4>Cursos Gratis</h4>
                            <form action="#" id="form-register" method="post">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="correo" placeholder="Correo" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <div class="form-group">
                                            <textarea name="mensaje" class="form-control" placeholder="Mensaje" style="height: 75px;padding-top:10px;" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn clever-btn w-100" type="submit">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Register Now Countdown -->
        <div class="register-now-countdown mb-100 wow fadeInUp" data-wow-delay="500ms">
            <h3>Registrate Ahora!</h3>
            <p>Escribenos solicitando tu cuenta de usuario para tener acceso a todos nuestros cursos completamente gratis. Aun estas a tiempo.</p>
            <!-- Register Countdown -->
            <div class="register-countdown">
                <div class="events-cd d-flex flex-wrap" data-countdown="2019-11-23 19:55:53"></div>
            </div>
        </div>
    </section>
    <!-- ##### Register Now End ##### -->

    <!-- ##### Upcoming Events Start ##### -->
    <div id="event"></div>
    <section class="upcoming-events section-padding-100-0 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Eventos</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/bg-img/e1.jpg" alt="">
                            <h6 class="event-date">Agosto 12</h6>
                            <h4 class="event-title">Capacitacion SIPLAFT</h4>
                        </div>
                        <!-- Date & Fee -->
                        <div class="date-fee d-flex justify-content-between">
                            <div class="date">
                                <p><i class="fa fa-clock"></i> Agosto 26 ~ 9:00 am</p>
                            </div>
                            <div class="events-fee">
                                <a href="#" class="free">Gratis</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="500ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/bg-img/e2.jpg" alt="">
                            <h6 class="event-date">Septiembre 02</h6>
                            <h4 class="event-title">Capacitacion SIPLAFT</h4>
                        </div>
                        <!-- Date & Fee -->
                        <div class="date-fee d-flex justify-content-between">
                            <div class="date">
                                <p><i class="fa fa-clock"></i> Septiembre 02 ~ 9:00 am</p>
                            </div>
                            <div class="events-fee">
                                <a href="#" class="free">Gratis</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ##### Upcoming Events End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <div class="foo" style="width: 100%; height:5px; background:#ccc;"></div>
    <footer class="footer-area" style="color:#ccc;">
        <!-- Top Footer Area -->
        <div class="top-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        
                        <!-- Copywrite -->
                        <div class="row mb-2 mt-2">
                            <div class="colum col-md-4">
                                <h6 class="h4" style="color: #ccc;"><strong>Mas informacion</strong></h6>
                                <br>
                                <p style="color: #ccc;font-size: 14px; font-weight: 600;text-align: justify; ">Nuestra más alta prioridad es el cliente para quien tenemos nuestra mejor actitud de servicio, el cliente es la razón de ser de nuestro trabajo; le servimos con gusto en forma amable y eficiente; nuestro potencial mas valioso es nuestra gente y la capacidad de trabajar en equipo.</p>
                                
                                <br>
                                <div class="img-foo">
                                    <a style="padding:10px;" href="http://www.supertransporte.gov.co/super/" target="_blank"><img src="img/footer-logo-1.png" class="img-fluid"></a>
                                    <a style="padding:10px;" href="https://www.mintransporte.gov.co/" target="_blank"><img src="img/footer-logo-2.png" class="img-fluid"></a>
                                    <a style="padding:10px;" href="https://www.simit.org.co/" target="_blank"><img src="img/footer-logo-3.png" class="img-fluid"></a>
                                    <a style="padding:10px;" href="https://www.invias.gov.co/" target="_blank"><img src="img/footer-logo-4.png" class="img-fluid"></a>
                                </div>
                            </div>
                            <div class="colum col-md-4">
                                <h6 class="h4" style="color: #ccc;"><strong>Redes sociales</strong></h6>
                                <br>
                                <div class="copyright">
                                    <ul>
                                        <li><a style="color:#ccc;font-size: 18px; font-weight: 600;" href="https://www.facebook.com/cootranshuilaltdaoficial" target="_blank"><i class="fa fa-facebook-square"></i>&nbsp;&nbsp;Siguenos en Facebook</a></li><br>
                                        <li><a style="color:#ccc;font-size: 18px; font-weight: 600;" href="https://twitter.com/cootranshuila" target="_blank"><i class="fa fa-twitter-square"></i>&nbsp;&nbsp;Siguenos en Twitter</a></li><br>
                                        <li><a style="color:#ccc;font-size: 18px; font-weight: 600;" href="https://www.instagram.com/cootranshuila" target="_blank"><i class="fa fa-instagram"></i>&nbsp;&nbsp;Siguenos en Instagram</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="colum col-md-4">
                                <h6 class="h4" style="color: #ccc;"><strong>Contacto</strong></h6>
                                <br>
                                <div class="copyrightC">
                                    <ul>
                                        <li style="color: #ccc;font-size: 14px; font-weight: 600;" class="ml-1"><span class="fa fa-home"></span>&nbsp;&nbsp;Av. 26 No. 4-82, Neiva - Huila</a></li><br>
                                        <li style="color: #ccc;font-size: 14px; font-weight: 600;" class="ml-1"><span class="fa fa-phone"></span>&nbsp;&nbsp;(8)875 6365 | 8756368</a></li><br>
                                        <li style="color: #ccc;font-size: 14px; font-weight: 600;" class="ml-1"><span class="fa fa-envelope"></span>&nbsp;&nbsp;clientes@cootranshuila.com</a></li><br>
                                        <li style="color: #ccc;font-size: 14px; font-weight: 600;" class="ml-1"><a  style="color:#ccc;" href="formulario_postulado.php"><span class="fa fa-user"></span>&nbsp;&nbsp;Trabaja con nosotros</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer Area -->
        <div class="bottom-footer-area d-flex text-center justify-content-center align-items-center">
            <!-- Follow Us -->
            <div class="follow-us">
                <span>&copy; Cootranshuila 2019</span>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- SweetAlert -->
    <script src="../dashboard-design/encuesta_de_satisfaccion/assets/js/sweetalert.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <!-- Mi Script -->
    <script src="js/main.js"></script>
</body>

</html>