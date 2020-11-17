<?php 

    require "../../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";
    $conexion = conectaDb();    

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

    <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
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
                            <a class="navbar-brand" href="../../index.php"><img src="../../assets/images/logo.png" class="logo img-fluid"></a>
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
                                        <a class="nav-link1 nav-link" href="../index.php#oficinas">Oficinas</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link1 nav-link" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Corporativo<span class="icon-arrow-down"></span></a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="https://silogcootranshuilaerp.sitrans.com.co">Silog Sitrans</a>
                                            <a class="dropdown-item" href="https://accounts.google.com/signin/v2/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ltmpl=default&hd=cootranshuila.com&service=mail&sacu=1&rip=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin">Correo corporativo</a>
                                            <a class="dropdown-item" href="../">Administrador</a>
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
   <!--     <div class="container col-md-8" >
      <div class="row justify-content-center" >   -->  
   <?php 
      $fechaActual = new DateTime('now', new DateTimeZone('America/Bogota'));
    ?>
   <!-- 
      </div> -->
   <!--     </div> -->
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-12 col-md-11 col-lg-11 pb-2">
            <!--Form with header-->
            <form action="" method="post" id="formencuesta" name="formencuesta">
               <div class="card rounded-2">
                  <div class="card-header p-0">
                     <div class="bg-successt text-white text-center pt-3 pb-1">
                        <!-- <h4 class="text">Encuesta de satisfacción Cootranshuila Tours</h4> -->
                     </div>
                  </div>
                  <div class="card-body p-5">
                     <!--Body-->
                     <div class="form-group">
                        <div class="input-group mb-5">
                           <div class="input-group form-inline col-md-12" id="form-fecha" >
                              <label >FECHA: &nbsp;<b><?php echo $fechaActual->format('Y/m/d'); ?></b></label>
                           </div>
                        </div>

                        <div class="mb-5">
                          <h2 class="h1-responsive h1">Encuesta de satisfacción Cootranshuila Tours</h2>
                          <hr class="my-2">
                          <p>Para nosotros es muy importante su opinion para evaluar la calidad del servicio prestado. La serenidad y sinceridad con la que contestes nos permitira conocer con claridad los aspectos que debemos tener en cuenta para prestar un mejor servicio.</p>
                          <br>
                          <p>Lee cuidadosamente cada pregunta y elige solo una alternativa.</p>
                        </div>

                        <div class="row">
                          <h2 class="h1-responsive h2" style="border-bottom:rgb(0,162,81) solid 2px; padding:0 15px 0 15px;">Datos Personales</h2>
                          <hr class="my-2">
                        </div>

                        <div class="row mb-4">
                          <div class="col-md-4">
                              <div class="md-form mb-0">
                                  <i class="fas fa-user-alt prefix"></i>
                                  <input type="text" id="name" name="name" class="form-control">
                                  <label for="name" class="">Nombre completo *</label>
                              </div>
                          </div>

                          <div class="col-md-5">
                              <div class="md-form mb-0">
                                  <i class="fas fa-at prefix"></i>  
                                  <input type="text" id="email" name="email" class="form-control">
                                  <label for="email" class="">Correo</label>
                              </div>
                          </div>

                          <div class="col-md-3">
                              <div class="md-form mb-0">
                                  <i class="fas fa-mobile-alt prefix"></i>
                                  <input type="text" id="phone" name="phone" class="form-control">
                                  <label for="phone" class="">Telefono</label>
                              </div>
                          </div>
                        </div>

                        <div class="row mt-5">
                          <h2 class="h1-responsive h2" style="border-bottom:rgb(0,162,81) solid 2px; padding:0 15px 0 15px;">Experiencia del Plan Turístico</h2>
                          <hr class="my-2">
                        </div>

                        <!-- Primer pregunta -->
                        <h2 class="h1-responsive h4 mt-4">¿Cómo se entero de la actividad?</h2>

                        <div class="custom-control custom-control-inline row" style="margin-right:0px !important;padding-left:0px !important;">
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline1" name="customRadioInline1" type="radio" value="Amigos o Familiares" class="custom-control-input"/>
                            <label for="customRadioInline1">Amigos o Familiares</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline2" name="customRadioInline1" type="radio" value="Redes sociales" class="custom-control-input"/>
                            <label for="customRadioInline2">Redes sociales</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline3" name="customRadioInline1" type="radio" value="Posters" class="custom-control-input"/>
                            <label for="customRadioInline3">Posters</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline4" name="customRadioInline1" type="radio" value="Otro" class="custom-control-input"/>
                            <label for="customRadioInline4">Otro</label>
                          </div> 
                        </div> 

                        <hr>

                        <!-- Segunda pregunta -->
                        <h2 class="h1-responsive h4 mt-4">¿Por cual canal recibió atención?</h2>

                        <div class="custom-control custom-control-inline row" style="margin-right:0px !important;padding-left:0px !important;">
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline12" name="customRadioInline12" type="radio" value="Telefono" class="custom-control-input"/>
                            <label for="customRadioInline12">Telefono</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline22" name="customRadioInline12" type="radio" value="Redes sociales" class="custom-control-input"/>
                            <label for="customRadioInline22">Redes sociales</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline32" name="customRadioInline12" type="radio" value="Taquilla" class="custom-control-input"/>
                            <label for="customRadioInline32">Taquilla</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline42" name="customRadioInline12" type="radio" value="Vendedor externo" class="custom-control-input"/>
                            <label for="customRadioInline42">Vendedor externo</label>
                          </div> 
                        </div> 

                        <hr>

                        <!-- Tercer pregunta -->
                        <h2 class="h1-responsive h4 mt-4">Califique la atención recibida: </h2>
                        <p>Califique de 1 a 5 siendo 5 Muy Buena y 1 Mala.</p>
                        
                        <h2 class="h1-responsive h4 mt-4 ml-4">Venta </h2>
                        <div class="custom-control custom-control-inline row ml-4" style="margin-right:0px !important;padding-left:0px !important;">
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline13" name="customRadioInline13" type="radio" value="1" class="custom-control-input"/>
                            <label for="customRadioInline13">1</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline23" name="customRadioInline13" type="radio" value="2" class="custom-control-input"/>
                            <label for="customRadioInline23">2</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline33" name="customRadioInline13" type="radio" value="3" class="custom-control-input"/>
                            <label for="customRadioInline33">3</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline43" name="customRadioInline13" type="radio" value="4" class="custom-control-input"/>
                            <label for="customRadioInline43">4</label>
                          </div> 
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline53" name="customRadioInline13" type="radio" value="5" class="custom-control-input"/>
                            <label for="customRadioInline53">5</label>
                          </div>
                        </div> 
                        
                        <h2 class='h1-responsive h4 mt-4 ml-4'>Carro</h2>
                        <div class="custom-control custom-control-inline row ml-4" style="margin-right:0px !important;padding-left:0px !important;">
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline14" name="customRadioInline14" type="radio" value="1" class="custom-control-input"/>
                            <label for="customRadioInline14">1</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline24" name="customRadioInline14" type="radio" value="2" class="custom-control-input"/>
                            <label for="customRadioInline24">2</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline34" name="customRadioInline14" type="radio" value="4" class="custom-control-input"/>
                            <label for="customRadioInline34">4</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline44" name="customRadioInline14" type="radio" value="4" class="custom-control-input"/>
                            <label for="customRadioInline44">4</label>
                          </div> 
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline54" name="customRadioInline14" type="radio" value="5" class="custom-control-input"/>
                            <label for="customRadioInline54">5</label>
                          </div>
                        </div> 
                        
                        <h2 class='h1-responsive h4 mt-4 ml-4'>Hotel </h2>
                        <div class="custom-control custom-control-inline row ml-4" style="margin-right:0px !important;padding-left:0px !important;">
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline15" name="customRadioInline15" type="radio" value="1" class="custom-control-input"/>
                            <label for="customRadioInline15">1</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline25" name="customRadioInline15" type="radio" value="2" class="custom-control-input"/>
                            <label for="customRadioInline25">2</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline35" name="customRadioInline15" type="radio" value="3" class="custom-control-input"/>
                            <label for="customRadioInline35">3</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline45" name="customRadioInline15" type="radio" value="4" class="custom-control-input"/>
                            <label for="customRadioInline45">4</label>
                          </div> 
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline55" name="customRadioInline15" type="radio" value="5" class="custom-control-input"/>
                            <label for="customRadioInline55">5</label>
                          </div>
                        </div> 

                        <hr>

                        <!-- Cuarta pregunta -->
                        <h2 class="h1-responsive h4 mt-4">Califique su experiencia en el viaje: </h2>
                        <p>Califique de 1 a 5 siendo 5 Muy Buena y 1 Mala.</p>
                        
                        <h2 class="h1-responsive h4 mt-4 ml-4">Viaje en el Bus</h2>
                        <div class="custom-control custom-control-inline row ml-4" style="margin-right:0px !important;padding-left:0px !important;">
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline16" name="customRadioInline16" type="radio" value="1" class="custom-control-input"/>
                            <label for="customRadioInline16">1</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline26" name="customRadioInline16" type="radio" value="2" class="custom-control-input"/>
                            <label for="customRadioInline26">2</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline36" name="customRadioInline16" type="radio" value="3" class="custom-control-input"/>
                            <label for="customRadioInline36">3</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline46" name="customRadioInline16" type="radio" value="4" class="custom-control-input"/>
                            <label for="customRadioInline46">4</label>
                          </div> 
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline56" name="customRadioInline16" type="radio" value="5" class="custom-control-input"/>
                            <label for="customRadioInline56">5</label>
                          </div>
                        </div> 
                        
                        <h2 class='h1-responsive h4 mt-4 ml-4'>Hotel</h2>
                        <div class="custom-control custom-control-inline row ml-4" style="margin-right:0px !important;padding-left:0px !important;">
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline17" name="customRadioInline17" type="radio" value="1" class="custom-control-input"/>
                            <label for="customRadioInline17">1</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline27" name="customRadioInline17" type="radio" value="2" class="custom-control-input"/>
                            <label for="customRadioInline27">2</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline37" name="customRadioInline17" type="radio" value="3" class="custom-control-input"/>
                            <label for="customRadioInline37">3</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline47" name="customRadioInline17" type="radio" value="4" class="custom-control-input"/>
                            <label for="customRadioInline47">4</label>
                          </div> 
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline57" name="customRadioInline17" type="radio" value="5" class="custom-control-input"/>
                            <label for="customRadioInline57">5</label>
                          </div>
                        </div> 
                        
                        <h2 class='h1-responsive h4 mt-4 ml-4'>Lugar de Destino</h2>
                        <div class="custom-control custom-control-inline row ml-4" style="margin-right:0px !important;padding-left:0px !important;">
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline18" name="customRadioInline18" type="radio" value="1" class="custom-control-input"/>
                            <label for="customRadioInline18">1</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline28" name="customRadioInline18" type="radio" value="2" class="custom-control-input"/>
                            <label for="customRadioInline28">2</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline38" name="customRadioInline18" type="radio" value="3" class="custom-control-input"/>
                            <label for="customRadioInline38">3</label>
                          </div>
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline48" name="customRadioInline18" type="radio" value="4" class="custom-control-input"/>
                            <label for="customRadioInline48">4</label>
                          </div> 
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline58" name="customRadioInline18" type="radio" value="5" class="custom-control-input"/>
                            <label for="customRadioInline58">5</label>
                          </div>
                        </div> 

                        <hr>

                        <div class="row mt-5">
                          <h2 class="h1-responsive h2" style="border-bottom:rgb(0,162,81) solid 2px; padding:0 15px 0 15px;">¿A donde desearía viajar?</h2>
                          <hr class="my-2">
                        </div>
                        <div class="row mb-5">
                          <div class="col-md-6">
                              <div class="md-form mb-0">
                                  <i class="fas fa-plane prefix"></i>
                                  <input type="text" id="viajar" name="viajar" class="form-control">
                                  <label for="viajar" class="">¿A donde desearía viajar? *</label>
                              </div>
                          </div>
                        </div>

                        <hr>

                        <!-- Recomendacion -->
                        <div class="row">
                          <h2 class="h1-responsive mt-5 h2" style="border-bottom:rgb(0,162,81) solid 2px; padding:0 15px 0 15px;">¿Nos recomendarias?</h2>
                          <hr class="my-2">
                        </div>
                        <div class="custom-control custom-control-inline row mt-3" style="margin-right:0px !important;padding-left:0px !important;">
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline19" name="recomendacionBtn" type="radio" value="si" class="custom-control-input"/>
                            <label for="customRadioInline19">Si</label>
                          </div> 
                          <div class="inputGroup col-auto">
                            <input id="customRadioInline20" name="recomendacionBtn" type="radio" value="no" class="custom-control-input"/>
                            <label for="customRadioInline20">No</label>
                          </div>
                        </div>

                        <div id="recomendacion" class='d-none'>
                          <hr>
                          <h2 class="h1-responsive h4 mt-4">¿A quien nos recomendarias?</h2>
                          <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="md-form mb-0">
                                    <i class="fas fa-user-alt prefix"></i>
                                    <input type="text" id="nameRecomen" name="nameRecomen" class="form-control" required>
                                    <label for="nameRecomen" class="">Nombre completo *</label>
                                    <div class="text-danger" id='nameRecomenResponse'></div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="md-form mb-0">
                                    <i class="fas fa-at prefix"></i>  
                                    <input type="text" id="emailRecomen" name="emailRecomen" class="form-control" required>
                                    <label for="emailRecomen" class="">Correo</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="md-form mb-0">
                                    <i class="fas fa-mobile-alt prefix"></i>
                                    <input type="text" id="phoneRecomen" name="phoneRecomen" class="form-control" required>
                                    <label for="phoneRecomen" class="">Telefono *</label>
                                    <div class="text-danger" id='phoneRecomenResponse'></div>
                                </div>
                            </div>
                          </div>
                        </div>
                      
                        <!-- Boton de enviar -->
                        <div id="resul_encuesta"></div>

                        <div class="text-center mt-5">
                          <button type="button" value="Enviar" class="btn btn-success btn-lg btn-block" id="guardarencuesta">Enviar</button> 
                        </div>
                      
                      </div>

                  </div>
               </div>
            </form>
            <!--Form with header-->
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
                            <li><span class="ti-user"></span><a href="../../formulario_postulado.php">&nbsp;&nbsp;Trabaje con nosotros</a></li>
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

    <script src="assets/js/scriptClientes.js"></script>
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

            $('input[name="recomendacionBtn"]').click(function () {

              if ($('input[name="recomendacionBtn"]:checked').val() == 'si') {
                
                $('#recomendacion').removeClass('d-none');

              } else {
                
                $('#recomendacion').addClass('d-none');

              }
              
            });
            

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover({ html : true });
        });
    </script>

</body>

</html>


