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
    <title>Cootranshuila - Examen Siplaft</title>
   
    <!-- Favicon -->
    <link rel="icon" href="img/logo-icon.png">
    
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
    <link rel="stylesheet" href="../dashboard-design/encuesta_de_satisfaccion/assets/css/sweetalert.css">
    
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
                <li class="breadcrumb-item">Siplatf</li>
                <li class="breadcrumb-item active" aria-current="page">Examen</li>
            </ol>
        </nav>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Courses Content Start ##### -->
    <div class="single-course-content p-5">
        <div class="container">
            <h4 class="text-center mb-5">Examen Final (SIPLAFT)</h4>
            <div class="page-content">
                

                <div class="container">

                    <?php 
    
                    if (isset($_SESSION['usr'])) { ?>
                        <form id="form-examen" name="form-examen">

                            <div class="list-group">

                                <div class="list-group-item py-3" data-acc-step>
                                    <h5 class="mb-0" data-acc-title>Pregunta 1</h5>
                                    <div data-acc-content>
                                        <div class="my-3">
                                            <div class="container">
                                                <p class="text-justify" style="background: #ebebeb;padding: 15px;border-radius: 5px;">Uno de los objetivos de la política de Lavdos de activos y financiación del terrorismo de Cootranshuila establece:</p>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio" name="pre1" value="a">
                                                    <label class="custom-control-label" for="customRadio">a. Disminuir o eliminar el riesgo de lavado de LA/FT </label>
                                                </div>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio2" name="pre1" value="b">
                                                    <label class="custom-control-label" for="customRadio2">B. Tener certeza de que todas las operaciones cumplen con lo establecido en e SIPLAFT</label>
                                                </div>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio3" name="pre1" value="c">
                                                    <label class="custom-control-label" for="customRadio3">C. Informarse sobre la ocurrencia de cualquier evento</label>
                                                </div>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio4" name="pre1" value="d">
                                                    <label class="custom-control-label" for="customRadio4">D. Ninguna de la anteriores</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="list-group-item py-3" data-acc-step>
                                    <h5 class="mb-0" data-acc-title>Pregunta 2</h5>
                                    <div data-acc-content>
                                        <div class="my-3 row">
                                            <div class="container">
                                                <p class="text-justify" style="background: #ebebeb;padding: 15px;border-radius: 5px;">La sigla SIPLAFT significa:</p>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio5" name="pre2" value="a">
                                                    <label class="custom-control-label" for="customRadio5">a. Sistema Lavado Activos</label>
                                                </div>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio6" name="pre2" value="b">
                                                    <label class="custom-control-label" for="customRadio6">b. Sistema integral de prevención y control del riesgo de Lavado de activos y Financiación del Terrorismo</label>
                                                </div>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio7" name="pre2" value="c">
                                                    <label class="custom-control-label" for="customRadio7">c. Sistema de prevención del terrorismo</label>
                                                </div>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio8" name="pre2" value="d">
                                                    <label class="custom-control-label" for="customRadio8">d. Ninguna de las anteriores</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="list-group-item py-3" data-acc-step>
                                    <h5 class="mb-0" data-acc-title>Pregunta 3</h5>
                                    <div data-acc-content>
                                        <div class="my-3">
                                            <div class="container">
                                                <p class="text-justify" style="background: #ebebeb;padding: 15px;border-radius: 5px;">3.  Dentro de los riesgos de la financiación del terrorismo encontramos:</p>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio9" name="pre3" value="a">
                                                    <label class="custom-control-label" for="customRadio9">a.  Perdida de la reputacion</label>
                                                </div>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio10" name="pre3" value="b">
                                                    <label class="custom-control-label" for="customRadio10">b.  Perdida de relaciones comerciales</label>
                                                </div>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio11" name="pre3" value="c">
                                                    <label class="custom-control-label" for="customRadio11">c.  Todas la anteriores</label>
                                                </div>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio12" name="pre3" value="d">
                                                    <label class="custom-control-label" for="customRadio12">d. Fortalecimiento de los delincuentes</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="list-group-item py-3" data-acc-step>
                                    <h5 class="mb-0" data-acc-title>Pregunta 4</h5>
                                    <div data-acc-content>
                                        <div class="my-3">
                                            <div class="container">
                                                <p class="text-justify" style="background: #ebebeb;padding: 15px;border-radius: 5px;">4. El oficial de cumplimiento de la cooperativa tiene como funciones:</p>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio13" name="pre4" value="a">
                                                    <label class="custom-control-label" for="customRadio13">a. Establecer los procedimientos y procesos para aplicar la politica SIPLAFT</label>
                                                </div>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio14" name="pre4" value="b">
                                                    <label class="custom-control-label" for="customRadio14">b. Actuar con debida diligencia</label>
                                                </div>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio15" name="pre4" value="c">
                                                    <label class="custom-control-label" for="customRadio15">c. Implementar sistema de alertas</label>
                                                </div>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio16" name="pre4" value="d">
                                                    <label class="custom-control-label" for="customRadio16">d. Todas la anteriores</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="list-group-item py-3" data-acc-step>
                                    <h5 class="mb-0" data-acc-title>Pregunta 5</h5>
                                    <div data-acc-content>
                                        <div class="my-3">
                                            <div class="container">
                                                <p class="text-justify" style="background: #ebebeb;padding: 15px;border-radius: 5px;">5. Las operaciones inusuales que usted identifique debe:</p>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio17" name="pre5" value="a">
                                                    <label class="custom-control-label" for="customRadio17">a. Informar al Oficial de cumplimiento</label>
                                                </div>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio18" name="pre5" value="b">
                                                    <label class="custom-control-label" for="customRadio18">b. Informar a la Policia</label>
                                                </div>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio19" name="pre5" value="c">
                                                    <label class="custom-control-label" for="customRadio19">c.  Informar al Consejo de administración </label>
                                                </div>
                                                <div class="custom-control custom-radio m-2">
                                                    <input type="radio" class="custom-control-input" id="customRadio20" name="pre5" value="d">
                                                    <label class="custom-control-label" for="customRadio20">d. Informar a la Revisoría Fiscal</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </form>
                    <?php } else { ?>
                        <h4 class="text-center p-5">Debe iniciar session para realizar el examen.</h4>
                    <?php }

                    ?>

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

            $("#form-examen").accWizard(options);

        });

        $('#form-examen').submit(function () {
            var p1 = $('input:radio[name=pre1]:checked').val();
            var p2 = $('input:radio[name=pre2]:checked').val();
            var p3 = $('input:radio[name=pre3]:checked').val();
            var p4 = $('input:radio[name=pre4]:checked').val();
            var p5 = $('input:radio[name=pre5]:checked').val();

            var nota = 0;
            var user = '<?php echo $_SESSION['usr']; ?>';

            if (p1 == 'a') {
                nota = nota+1;
            }
            if (p2 == 'b') {
                nota = nota+1;
            }
            if (p3 == 'c') {
                nota = nota+1;
            }
            if (p4 == 'd') {
                nota = nota+1;
            }
            if (p5 == 'a') {
                nota = nota+1;
            }

            if (nota >= 3) {
                
                swal({
                    title: "Felicidades!",
                    text: "Aprobo el examen final, su nota es: "+nota,
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'Aceptar'
                },
                function(isConfirm){
                  if (isConfirm) {
                        // swal.close();
                        $("#form-examen")[0].reset();
                        $.ajax({
                            url: 'validaciones/examen_final.php',
                            type: 'POST',
                            data: {nota:nota, user:user},
                            success: function (data) {
                                console.log(data);
                                if (data == 1) {
                                    window.location.href = "single-course.php?contenido";
                                }
                            }
                        })
                    }
                });

            } else {
                
                swal({
                    title: "Por poco :(",
                    text: "No aprobo el examen final, su nota es: "+nota,
                    type: "error",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Enviar',
                    cancelButtonText: 'Intentar de Nuevo'
                },
                function(isConfirm){
                  if (isConfirm) {
                        // swal.close();
                        $("#form-examen")[0].reset();
                        $.ajax({
                            url: 'validaciones/examen_final.php',
                            type: 'POST',
                            data: {nota:nota, user:user},
                            success: function (data) {
                                console.log(data);
                                if (data == 1) {
                                    window.location.href = "single-course.php?contenido";
                                }
                            }
                        })
                    }
                });

            }
        })

    </script>

</body>

</html>