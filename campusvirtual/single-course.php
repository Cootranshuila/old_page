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
    <title>Cootranshuila - Curso Siplaft</title>
   
    <!-- Favicon -->
    <link rel="icon" href="img/logo-icon.png">
    
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    
</head>

<body>

    <!--  ############### MODALES ############### -->

    <!-- MODAL LOGIN -->
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

    <!-- Modal Presentacion -->
    <div class="modal fade bd-example-modal-lg" id="presentacion" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content p-5">
            

            <div class="container">
                <h4 class="text-center">POLITICA DEL SISTEMA INTEGRAL DE PREVENCIÓN DE LAVADO DE ACTIVOS Y FINANCIACION DEL TERRORISMO (SIPLAFT)</h4>
                <form id="form">

                    <div class="list-group">

                        <div class="list-group-item py-3" data-acc-step>
                            <h5 class="mb-0" data-acc-title>POLITICA</h5>
                            <div data-acc-content>
                                <div class="my-3">
                                    <div class="container">
                                        <p class="text-justify" style="background: #ebebeb;padding: 15px;border-radius: 5px;">La Política que se presenta a continuación tiene por objetivo establecer las bases generales sobre las cuales la Cooperativa administrará la gestión de la prevención y control del riesgo de lavado de activos y financiación del terrorismo (Riesgo LAFT) en los procesos, operaciones y relaciones de negocios que adelante en desarrollo de sus actividades y servirá de guía para la fijación de los procedimientos y herramientas requeridos para la aplicación del Sistema Integral de Prevención y Control del Riesgo LAFT (SIPLAFT) y la capacitación de los involucrados en los procesos de la Cooperativa.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="list-group-item py-3" data-acc-step>
                            <h5 class="mb-0" data-acc-title>OBJETIVO</h5>
                            <div data-acc-content>
                                <div class="my-3 row">
                                    <div class="col-6">
                                        <p class="text-justify" style="background: #ebebeb;padding: 15px;border-radius: 5px;">Contribuir a la creación de una cultura de prevención al interior de la empresa y desarrollar y aplicar la política de cero tolerancia con el lavado de activos y la financiación del terrorismo.</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-justify" style="background: #ebebeb;padding: 15px;border-radius: 5px;">Describir las actividades que deberán desarrollarse respecto de las contrapartes actuales y futuras y respecto del conocimiento de las contrapartes.</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-justify" style="background: #ebebeb;padding: 15px;border-radius: 5px;">Implementar y administrar el Sistema Integral de Prevención y Control del Riesgo de Lavado de Activos y Financiación de Terrorismo (SIPLAFT).</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-justify" style="background: #ebebeb;padding: 15px;border-radius: 5px;">Disminuir o eliminar el Riesgo de LA/FT de la Cooperativa.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="list-group-item py-3" data-acc-step>
                            <h5 class="mb-0" data-acc-title>RESPONSABLES DE LA APLICACION</h5>
                            <div data-acc-content>
                                <div class="my-3">
                                    <div class="row text-center justify-content-center">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Consejo de Administración</li>
                                            <li class="list-group-item">Comité Financiero</li>
                                            <li class="list-group-item">Asamblea de Asociados</li>
                                            <li class="list-group-item">Revisoría Fiscal</li>
                                            <li class="list-group-item">Representante Legal</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="list-group-item py-3" data-acc-step>
                            <h5 class="mb-0" data-acc-title>AMBITO DE APLICACIÓN</h5>
                            <div data-acc-content>
                                <div class="my-3">
                                    <div class="container">
                                        <p class="text-justify" style="background: #ebebeb;padding: 15px;border-radius: 5px;">Todos los asociados, directivos, funcionarios, agentes consignatarios, y contrapartes de la Cooperativa estarán obligadas al cumplimiento de la Política y de los procesos y procedimientos adoptados en aplicación de ella que constituyen el SIPLAFT de la Cooperativa; igualmente la Cooperativa debe dárselos a conocer a los clientes, asociados y demás contrapartes de tal forma que se garantice su aplicación respecto de las relaciones de negocios comerciales o jurídicos que tenga con ellas.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="list-group-item py-3" data-acc-step>
                            <h5 class="mb-0" data-acc-title>POLITICAS MANEJO EFECTIVO</h5>
                            <div data-acc-content>
                                <div class="my-3">
                                    <div class="container">
                                        <p class="text-justify" style="background: #ebebeb;padding: 15px;border-radius: 5px;">Teniendo en cuenta las políticas del sistema de prevención del lavado de activos y prevención del terrorismo definido por la Cooperativa, el monto máximo a recibir en efectivo en las oficinas de la Cooperativa es de $5.000.000.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="list-group-item py-3" data-acc-step>
                            <h5 class="mb-0" data-acc-title>CONCEPTOS</h5>
                            <div data-acc-content>
                                <div class="my-3">
                                    <div class="container">
                                        <p class="text-justify" style="background: #ebebeb;padding: 15px;border-radius: 5px;"><b>Financiación de terrorismo (FT):</b> Es (i) el delito de financiación del terrorismo tipificado en el artículo 345 del Código Penal Colombiano: “Financiación del terrorismo y de grupos de delincuencia organizada y administración de recursos relacionados con actividades terroristas y de la delincuencia organizada. El que directa o indirectamente provea, recolecte, entregue, reciba, administre, aporte, custodie o guarde fondos, bienes o recursos, o realice cualquier otro acto que promueva, organice apoye, mantenga, financie o sostenga económicamente a grupos de delincuencia organizada, grupos armados al margen de la ley o sus integrantes, o a grupos terroristas nacionales o extranjeros, o a terroristas nacionales o extranjeros, o a actividades terroristas….”
                                            <br>(ii) el financiamiento de actos terroristas y de terroristas y organizaciones terroristas (Definición GAFI); y cualquier otra tipificación de otras jurisdicciones donde opera la Compañía;
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="list-group-item py-3" data-acc-step>
                            <h5 class="mb-0" data-acc-title>CONCEPTOS</h5>
                            <div data-acc-content>
                                <div class="my-3">
                                    <div class="container">
                                        <p class="text-justify" style="background: #ebebeb;padding: 15px;border-radius: 5px;"><b>Lavado de Activos (LA):</b> Proceso en virtud del cual los bienes de origen delictivo se integran en el sistema económico legal con apariencia de haber sido obtenidos de forma lícita.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </form>
            </div>


        </div>
      </div>
    </div>

    <!-- Modal video -->
    <div class="modal fade bd-example-modal-lg" id="video" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <iframe width="100%" height="500" src="https://www.youtube.com/embed/9qtsQTsYWAs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>

    <!--  ############# FIN MODALES #############  -->




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
                                <li><a href="index.php#cursos">Cursos</a></li>
                                <li><a href="index.php#instructor">Instructor</a></li>
                                <!-- <li><a href="blog.html">Blog</a></li> -->
                                <li><a href="index.php#event">Contacto</a></li>
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
                                    <a href="index.php#register" class="btn">Registrarse</a>
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

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area">
        <!-- Breadcumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item"><a href="#">Cursos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Siplatf</li>
            </ol>
        </nav>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Single Course Intro Start ##### -->
    <div class="single-course-intro d-flex align-items-center justify-content-center" style="background: #28a7457a;">
        <!-- Content -->
        <div class="single-course-intro-content text-center">
            <!-- Ratings -->
            <div class="ratings">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            <h3>SIPLAFT</h3>
            <div class="meta d-flex align-items-center justify-content-center">
                <a href="#">Sistema de Prevención y Control del lavado de activos</a>
            </div>
            <div class="price">Gratis</div>
        </div>
    </div>
    <!-- ##### Single Course Intro End ##### -->

    <!-- ##### Courses Content Start ##### -->
    <div class="single-course-content section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="course--content">

                        <div class="clever-tabs-content">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link <?php echo !isset($_GET['contenido']) ? 'active' : ''; ?>" id="tab--1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Descripción</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo isset($_GET['contenido']) ? 'active' : ''; ?>" id="tab--2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="true">Contenido</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab--3" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="true">Reviews</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab--4" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="true">Estudiantes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab--5" data-toggle="tab" href="#tab5" role="tab" aria-controls="tab5" aria-selected="true">Foró</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <!-- Tab Text Descripcion -->
                                <div class="tab-pane fade <?php echo !isset($_GET['contenido']) ? 'show active' : ''; ?>" id="tab1" role="tabpanel" aria-labelledby="tab--1">
                                    <div class="clever-description">

                                        <!-- About Course -->
                                        <div class="about-course mb-30">
                                            <h4>Descripcion del curso</h4>
                                            <p>
                                                Contribuir a la creación de una cultura de prevención al interior de la empresa y desarrollar y aplicar la política de cero  tolerancia con el lavado de activos y la financiación del terrorismo.
                                                </br>
                                                Disminuir o eliminar el Riesgo de LA/FT de la Cooperativa.
                                                </br>
                                                Describir las actividades que deberán desarrollarse respecto de las contrapartes actuales y futuras y respecto del conocimiento de las contrapartes.
                                                </br>
                                                Implementar y administrar el Sistema Integral de Prevención y Control del Riesgo de Lavado de Activos y Financiación de Terrorismo (SIPLAFT).
                                            </p>
                                        </div>

                                        <!-- All Instructors -->
                                        <div class="all-instructors mb-30">
                                            <h4>Instructor</h4>

                                            <div class="row">
                                                <!-- Single Instructor -->
                                                <div class="col-lg-6">
                                                    <div class="single-instructor d-flex align-items-center mb-30">
                                                        <div class="instructor-thumb">
                                                            <img src="img/bg-img/t1.png" alt="">
                                                        </div>
                                                        <div class="instructor-info">
                                                            <h5>Lina Aya</h5>
                                                            <span>Oficial de Cumplimiento</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- FAQ -->
                                        <div class="clever-faqs">
                                            <h4>Preguntas frecuentes</h4>

                                            <div class="accordions" id="accordion" role="tablist" aria-multiselectable="true">

                                                <!-- Single Accordian Area -->
                                                <div class="panel single-accordion">
                                                    <h6><a role="button" class="" aria-expanded="true" aria-controls="collapseOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Can I just enroll in a single course? I'm not interested in the entire Specialization?
                                                    <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                    <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    </a></h6>
                                                    <div id="collapseOne" class="accordion-content collapse show">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor.</p>
                                                    </div>
                                                </div>

                                                <!-- Single Accordian Area -->
                                                <div class="panel single-accordion">
                                                    <h6>
                                                        <a role="button" class="collapsed" aria-expanded="true" aria-controls="collapseTwo" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo">What is the refund policy?
                                                        <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                        <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                        </a>
                                                    </h6>
                                                    <div id="collapseTwo" class="accordion-content collapse">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper finibus ac eget ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vulputate id justo quis facilisis.</p>
                                                    </div>
                                                </div>

                                                <!-- Single Accordian Area -->
                                                <div class="panel single-accordion">
                                                    <h6>
                                                        <a role="button" aria-expanded="true" aria-controls="collapseThree" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseThree">What background knowledge is necessary?
                                                        <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                        <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                        </a>
                                                    </h6>
                                                    <div id="collapseThree" class="accordion-content collapse">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper finibus ac eget ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vulputate id justo quis facilisis.</p>
                                                    </div>
                                                </div>

                                                <!-- Single Accordian Area -->
                                                <div class="panel single-accordion">
                                                    <h6>
                                                        <a role="button" aria-expanded="true" aria-controls="collapseFour" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseFour">Do i need to take the courses in a specific order?
                                                        <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                        <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                        </a>
                                                    </h6>
                                                    <div id="collapseFour" class="accordion-content collapse">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper finibus ac eget ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vulputate id justo quis facilisis.</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Tab Text Contenido -->
                                <div class="tab-pane fade <?php echo isset($_GET['contenido']) ? 'show active' : ''; ?>"  id="tab2" role="tabpanel" aria-labelledby="tab--2">
                                    <div class="clever-curriculum">

                                        <!-- About Curriculum -->
                                        <div class="about-curriculum mb-30">
                                            <h4>Politica del sistema integral de prevención de lavado de activos y financiación del terrorismo.</h4>
                                            <p></p>
                                        </div>

                                        <!-- Curriculum Level -->
                                        <div class="curriculum-level mb-30">
                                            <h4 class="d-flex justify-content-between"><span>Semana 1</span> <span>0/5</span></h4>
                                            <h5>Contenido del curso</h5>
                                            <p>Aqui encontraras todo el material necesario para capacitarte en Politica del sistema integral de prevención de lavado de activos y financiación del terrorismo.</p>

                                            <ul class="curriculum-list">
                                                <li><i class="fa fa-file" aria-hidden="true"></i> Material
                                                    <?php
                                                    if (isset($_SESSION['usr'])) { ?>
                                                        <ul>
                                                            <li>
                                                                <span><i class="fa fa-play" aria-hidden="true"></i> Presentacion: <span data-toggle="modal" data-target="#presentacion" style="cursor: pointer; color:rgba(0, 0, 0, 0.8);font-weight: 600;font-size: 14px;">Presentacion SIPLATF</span></span>
                                                                <span><i class="fa fa-clock-o" aria-hidden="true"></i> 10 minutos</span>
                                                            </li>
                                                            <li>
                                                                <span><i class="fa fa-video-camera" aria-hidden="true"></i> Video: <span data-toggle="modal" data-target="#video" style="cursor: pointer; color:rgba(0, 0, 0, 0.8);font-weight: 600;font-size: 14px;">SIPLAFT - GEN</span></span>
                                                                <span><i class="fa fa-clock-o" aria-hidden="true"></i> 06 minutos</span>
                                                            </li>
                                                            <li>
                                                                <span><i class="fa fa-file-text" aria-hidden="true"></i> Lectura 1: <span style="cursor: pointer"><a href="docs/2. Política del Sistema Integral de Prevención y Control del Riesgo de Lavado de Activos y Financiación de Terrorismo (SIPLAFT) ultima version.pdf" target="_blank"> Política del Sistema Integral de Prevención y Control del Riesgo <br> de Lavado de Activos y Financiación de Terrorismo (SIPLAFT) ultima version.pdf</a></span></span>
                                                                <span><i class="fa fa-clock-o" aria-hidden="true"></i> 30 minutos</span>
                                                            </li>
                                                            <li>
                                                                <span><i class="fa fa-file-text" aria-hidden="true"></i> Lectura 2: <span style="cursor: pointer"><a href="docs/3. MANUAL DE PROCEDIMIENTOS APLICACION SIPLAFT.pdf" target="_blank">MANUAL DE PROCEDIMIENTOS APLICACION SIPLAFT.pdf</a></span></span>
                                                                <span><i class="fa fa-clock-o" aria-hidden="true"></i> 25 minutos</span>
                                                            </li>
                                                            <li>
                                                                <span><i class="fa fa-file-text" aria-hidden="true"></i> Lectura 3: <span style="cursor: pointer"><a href="docs/5. Riesgo del lavado de Activos y Financiación del Terrorismo.pdf" target="_blank">Riesgo del lavado de Activos y Financiación del Terrorismo.pdf</a></span></span>
                                                                <span><i class="fa fa-clock-o" aria-hidden="true"></i> 10 minutos</span>
                                                            </li>
                                                        </ul>
                                                    <?php } else { ?>
                                                        
                                                        <div class="ml-5 m-5">
                                                            <h4>Debe iniciar session para ver el material.</h4>
                                                        </div>
                            
                                                    <?php }
                                                    
                                                    ?>
                                                    
                                                </li>
                                                <li class="d-flex justify-content-between mt-4" style="cursor: pointer">
                                                    <span id="btn-examen"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Examen: <b>Examen final</b></span>
                                                    <span>5 Preguntas</span>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>

                                <!-- Tab Text -->
                                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab--3">
                                    <div class="clever-review">

                                        <!-- About Review -->
                                        <div class="about-review mb-30">
                                            <h4>Reviews</h4>
                                            <p>Sed elementum lacus a risus luctus suscipit. Aenean sollicitudin sapien neque, in fermentum lorem dignissim a. Nullam eu mattis quam. Donec porttitor nunc a diam molestie blandit. Maecenas quis ultrices</p>
                                        </div>

                                        <!-- Ratings -->
                                        <div class="clever-ratings d-flex align-items-center mb-30">

                                            <div class="total-ratings text-center d-flex align-items-center justify-content-center">
                                                <div class="ratings-text">
                                                    <h2>4.5</h2>
                                                    <div class="ratings--">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                    </div>
                                                    <span>Rated 5 out of 3 Ratings</span>
                                                </div>
                                            </div>

                                            <div class="rating-viewer">
                                                <!-- Rating -->
                                                <div class="single-rating mb-15 d-flex align-items-center">
                                                    <span>5 STARS</span>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>80%</span>
                                                </div>
                                                <!-- Rating -->
                                                <div class="single-rating mb-15 d-flex align-items-center">
                                                    <span>4 STARS</span>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>20%</span>
                                                </div>
                                                <!-- Rating -->
                                                <div class="single-rating mb-15 d-flex align-items-center">
                                                    <span>3 STARS</span>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>0%</span>
                                                </div>
                                                <!-- Rating -->
                                                <div class="single-rating mb-15 d-flex align-items-center">
                                                    <span>2 STARS</span>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>0%</span>
                                                </div>
                                                <!-- Rating -->
                                                <div class="single-rating mb-15 d-flex align-items-center">
                                                    <span>1 STARS</span>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>0%</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Single Review -->
                                        <div class="single-review mb-30">
                                            <div class="d-flex justify-content-between mb-30">
                                                <!-- Review Admin -->
                                                <div class="review-admin d-flex">
                                                    <div class="thumb">
                                                        <img src="img/bg-img/t1.png" alt="">
                                                    </div>
                                                    <div class="text">
                                                        <h6>Sarah Parker</h6>
                                                        <span>Sep 29, 2017 at 9:48 am</span>
                                                    </div>
                                                </div>
                                                <!-- Ratings -->
                                                <div class="ratings">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis.</p>
                                        </div>

                                        <!-- Single Review -->
                                        <div class="single-review mb-30">
                                            <div class="d-flex justify-content-between mb-30">
                                                <!-- Review Admin -->
                                                <div class="review-admin d-flex">
                                                    <div class="thumb">
                                                        <img src="img/bg-img/t1.png" alt="">
                                                    </div>
                                                    <div class="text">
                                                        <h6>Sarah Parker</h6>
                                                        <span>Sep 29, 2017 at 9:48 am</span>
                                                    </div>
                                                </div>
                                                <!-- Ratings -->
                                                <div class="ratings">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tab Text -->
                                <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab--4">
                                    <div class="clever-members">

                                        <!-- About Members -->
                                        <div class="about-members mb-30">
                                            <h4>Members</h4>
                                            <p>Sed elementum lacus a risus luctus suscipit. Aenean sollicitudin sapien neque, in fermentum lorem dignissim a. Nullam eu mattis quam. Donec porttitor nunc a diam molestie blandit. Maecenas quis ultrices</p>
                                        </div>

                                        <!-- All Members -->
                                        <div class="all-instructors mb-30">
                                            <div class="row">
                                                <!-- Single Members -->
                                                <div class="col-lg-6">
                                                    <div class="single-instructor d-flex align-items-center mb-30">
                                                        <div class="instructor-thumb">
                                                            <img src="img/bg-img/t1.png" alt="">
                                                        </div>
                                                        <div class="instructor-info">
                                                            <h5>Sarah Parker</h5>
                                                            <span>Teacher</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Single Members -->
                                                <div class="col-lg-6">
                                                    <div class="single-instructor d-flex align-items-center mb-30">
                                                        <div class="instructor-thumb">
                                                            <img src="img/bg-img/t2.png" alt="">
                                                        </div>
                                                        <div class="instructor-info">
                                                            <h5>Sarah Parker</h5>
                                                            <span>Teacher</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Single Members -->
                                                <div class="col-lg-6">
                                                    <div class="single-instructor d-flex align-items-center mb-30">
                                                        <div class="instructor-thumb">
                                                            <img src="img/bg-img/t3.png" alt="">
                                                        </div>
                                                        <div class="instructor-info">
                                                            <h5>Sarah Parker</h5>
                                                            <span>Teacher</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Single Members -->
                                                <div class="col-lg-6">
                                                    <div class="single-instructor d-flex align-items-center mb-30">
                                                        <div class="instructor-thumb">
                                                            <img src="img/bg-img/t4.png" alt="">
                                                        </div>
                                                        <div class="instructor-info">
                                                            <h5>Sarah Parker</h5>
                                                            <span>Teacher</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Single Members -->
                                                <div class="col-lg-6">
                                                    <div class="single-instructor d-flex align-items-center mb-30">
                                                        <div class="instructor-thumb">
                                                            <img src="img/bg-img/t1.png" alt="">
                                                        </div>
                                                        <div class="instructor-info">
                                                            <h5>Sarah Parker</h5>
                                                            <span>Teacher</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Single Members -->
                                                <div class="col-lg-6">
                                                    <div class="single-instructor d-flex align-items-center mb-30">
                                                        <div class="instructor-thumb">
                                                            <img src="img/bg-img/t2.png" alt="">
                                                        </div>
                                                        <div class="instructor-info">
                                                            <h5>Sarah Parker</h5>
                                                            <span>Teacher</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Single Members -->
                                                <div class="col-lg-6">
                                                    <div class="single-instructor d-flex align-items-center mb-30">
                                                        <div class="instructor-thumb">
                                                            <img src="img/bg-img/t3.png" alt="">
                                                        </div>
                                                        <div class="instructor-info">
                                                            <h5>Sarah Parker</h5>
                                                            <span>Teacher</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Single Members -->
                                                <div class="col-lg-6">
                                                    <div class="single-instructor d-flex align-items-center mb-30">
                                                        <div class="instructor-thumb">
                                                            <img src="img/bg-img/t4.png" alt="">
                                                        </div>
                                                        <div class="instructor-info">
                                                            <h5>Sarah Parker</h5>
                                                            <span>Teacher</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tab Text -->
                                <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab--5">
                                    <div class="clever-review">

                                        <!-- About Review -->
                                        <div class="about-review mb-30">
                                            <h4>Reviews</h4>
                                            <p>Sed elementum lacus a risus luctus suscipit. Aenean sollicitudin sapien neque, in fermentum lorem dignissim a. Nullam eu mattis quam. Donec porttitor nunc a diam molestie blandit. Maecenas quis ultrices</p>
                                        </div>

                                        <!-- Ratings -->
                                        <div class="clever-ratings d-flex align-items-center mb-30">

                                            <div class="total-ratings text-center d-flex align-items-center justify-content-center">
                                                <div class="ratings-text">
                                                    <h2>4.5</h2>
                                                    <div class="ratings--">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                    </div>
                                                    <span>Rated 5 out of 3 Ratings</span>
                                                </div>
                                            </div>

                                            <div class="rating-viewer">
                                                <!-- Rating -->
                                                <div class="single-rating mb-15 d-flex align-items-center">
                                                    <span>5 STARS</span>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>80%</span>
                                                </div>
                                                <!-- Rating -->
                                                <div class="single-rating mb-15 d-flex align-items-center">
                                                    <span>4 STARS</span>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>20%</span>
                                                </div>
                                                <!-- Rating -->
                                                <div class="single-rating mb-15 d-flex align-items-center">
                                                    <span>3 STARS</span>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>0%</span>
                                                </div>
                                                <!-- Rating -->
                                                <div class="single-rating mb-15 d-flex align-items-center">
                                                    <span>2 STARS</span>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>0%</span>
                                                </div>
                                                <!-- Rating -->
                                                <div class="single-rating mb-15 d-flex align-items-center">
                                                    <span>1 STARS</span>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>0%</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Single Review -->
                                        <div class="single-review mb-30">
                                            <div class="d-flex justify-content-between mb-30">
                                                <!-- Review Admin -->
                                                <div class="review-admin d-flex">
                                                    <div class="thumb">
                                                        <img src="img/bg-img/t1.png" alt="">
                                                    </div>
                                                    <div class="text">
                                                        <h6>Sarah Parker</h6>
                                                        <span>Sep 29, 2017 at 9:48 am</span>
                                                    </div>
                                                </div>
                                                <!-- Ratings -->
                                                <div class="ratings">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis.</p>
                                        </div>

                                        <!-- Single Review -->
                                        <div class="single-review mb-30">
                                            <div class="d-flex justify-content-between mb-30">
                                                <!-- Review Admin -->
                                                <div class="review-admin d-flex">
                                                    <div class="thumb">
                                                        <img src="img/bg-img/t1.png" alt="">
                                                    </div>
                                                    <div class="text">
                                                        <h6>Sarah Parker</h6>
                                                        <span>Sep 29, 2017 at 9:48 am</span>
                                                    </div>
                                                </div>
                                                <!-- Ratings -->
                                                <div class="ratings">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="course-sidebar">
                        <!-- Buy Course -->
                        <a href="single-course.php?contenido" class="btn clever-btn mb-30 w-100">Iniciar curso</a>

                        <!-- Widget -->
                        <div class="sidebar-widget">
                            <h4>Caracteristicas</h4>
                            <ul class="features-list">
                                <li>
                                    <h6><i class="fa fa-clock-o" aria-hidden="true"></i> Duracion</h6>
                                    <h6>1 Semana</h6>
                                </li>
                                <li>
                                    <h6><i class="fa fa-bell" aria-hidden="true"></i> Lecturas</h6>
                                    <h6>4</h6>
                                </li>
                                <li>
                                    <h6><i class="fa fa-file" aria-hidden="true"></i> Examenes</h6>
                                    <h6>1</h6>
                                </li>
                                <!-- <li>
                                    <h6><i class="fa fa-thumbs-up" aria-hidden="true"></i> Pass Percentage</h6>
                                    <h6>60</h6>
                                </li>
                                <li>
                                    <h6><i class="fa fa-thumbs-down" aria-hidden="true"></i> Max Retakes</h6>
                                    <h6>5</h6>
                                </li> -->
                            </ul>
                        </div>

                        <!-- Widget -->
                        <div class="sidebar-widget">
                            <h4>Certificación</h4>
                            <img src="img/bg-img/cer.png" alt="">
                        </div>

                        <!-- Widget -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Courses Content End ##### -->

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
    <!-- Active js -->
    <script src="dist/jquery.accordion-wizard.js"></script>
    <!-- SweetAlert -->
    <script src="../dashboard-design/encuesta_de_satisfaccion/assets/js/sweetalert.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <!-- Mi Script -->
    <script src="js/main.js"></script>

    <script>
        
        var options = {
            mode: 'wizard',
            autoButtonsNextClass: 'btn btn-primary float-right',
            autoButtonsPrevClass: 'btn btn-light',
            stepNumberClass: 'badge badge-pill badge-primary mr-1',
            onSubmit: function() {
                $("#presentacion").modal('hide');
                return false;
            }
        }

        $(function() {

            $("#form").accWizard(options);

        });

        $('#btn-examen').click(function () {
            window.location.href = "examen.php";
        })

    </script>

</body>

</html>