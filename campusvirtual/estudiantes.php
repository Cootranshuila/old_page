<?php 

session_start();
require "../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";

extract($_REQUEST);
$conexion = conectaDb();

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
    <title>Cootranshuila - Estudiantes</title>
   
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
                <li class="breadcrumb-item"><a href="#">Siplaft</a></li>
                <li class="breadcrumb-item active" aria-current="page">Estudiantes</li>
            </ol>
        </nav>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Courses Content Start ##### -->
    <div class="single-course-content p-5">
        <div class="container">
            <h4 class="text-center mb-5">Estudiantes</h4>
            <div class="page-content">
                

                <div class="container">

                    <?php 
    
                    if (isset($_SESSION['usr'])) { 
                        
                        $sql_estudiantes_2017 = $conexion->prepare('SELECT * from estudiantes limit 0,100');
                        $sql_estudiantes_2017->execute();

                        $res_estudiantes_2017 = $sql_estudiantes_2017->fetchAll();

                        $sql_estudiantes_2018 = $conexion->prepare('SELECT * from estudiantes limit 101,150');
                        $sql_estudiantes_2018->execute();

                        $res_estudiantes_2018 = $sql_estudiantes_2018->fetchAll();
                        
                        ?>


                        <div class="clever-tabs-content">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab--1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">2017</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab--2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="true">2018</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <!-- Tab Text Descripcion -->
                                <div class="tab-pane fade active show" id="tab1" role="tabpanel" aria-labelledby="tab--1">
                                    <div class="clever-description">

                                        <form id="form-examen1" name="form-examen1">

                                            <div class="list-group">

                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Correo</th>
                                                            <th>Curso</th>
                                                            <th>Aprobado</th>
                                                            <th>Nota</th>
                                                            <th>Diploma</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($res_estudiantes_2017 as $row) {
                                                        ?>  
                                                        <tr>
                                                            <td><?php echo $row['nombre_estudiante'] ?></td>
                                                            <td><?php echo $row['correo_estudiante'] ?></td>
                                                            <td>SIPLAFT</td>
                                                            <td><?php echo $row['aprobado'] ?></td>
                                                            <td><?php echo $row['nota'] ?></td>
                                                            <td><a href="certificado.php?ano=2017&nombre=<?php echo $row['nombre_estudiante'] ?>" target="_blank" class="btn <?php echo $row['aprobado'] == 'Si' ? 'btn-info' : 'btn-dark disabled'; ?>"><i class="fa fa-eye"></i></a></td>
                                                        </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>

                                            </div>

                                        </form>

                                    </div>
                                </div>

                                <!-- Tab Text Contenido -->
                                <div class="tab-pane fade"  id="tab2" role="tabpanel" aria-labelledby="tab--2">
                                    <div class="clever-curriculum">

                                        <form id="form-examen" name="form-examen">

                                            <div class="list-group">

                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Correo</th>
                                                            <th>Curso</th>
                                                            <th>Aprobado</th>
                                                            <th>Nota</th>
                                                            <th>Diploma</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($res_estudiantes_2018 as $row) {
                                                        ?>  
                                                        <tr>
                                                            <td><?php echo $row['nombre_estudiante'] ?></td>
                                                            <td><?php echo $row['correo_estudiante'] ?></td>
                                                            <td>SIPLAFT</td>
                                                            <td><?php echo $row['aprobado'] ?></td>
                                                            <td><?php echo $row['nota'] ?></td>
                                                            <td><a href="certificado.php?ano=2018&nombre=<?php echo $row['nombre_estudiante'] ?>" target="_blank" class="btn <?php echo $row['aprobado'] == 'Si' ? 'btn-info' : 'btn-dark disabled'; ?>"><i class="fa fa-eye"></i></a></td>
                                                        </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>

                                            </div>

                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>


                    <?php } else { ?>
                        <h4 class="text-center p-5">Debe iniciar session.</h4>
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