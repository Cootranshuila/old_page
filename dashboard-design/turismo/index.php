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
    <title>Cootranshuila - Turismo</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"> -->
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

    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <!-- <link rel="stylesheet" type="text/css" href="styles/about.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="styles/about_responsive.css"> -->
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">

    <!-- WhatsHelp.io widget -->
    <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "+57 3208482712", // WhatsApp number
                call_to_action: "Hola, ¿en que te podemos ayudar?", // Call to action
                position: "right", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>
    <!-- /WhatsHelp.io widget -->


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

<!-- CAROUSEL imagenes primer pantallazo -->
<div id="carouselExampleIndicators" style="top:83px; z-index:1;" class="carousel slide mb-5" data-ride="carousel">

  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
  </ol>

  <div class="carousel-inner">
    <div class="carousel-item active">
        <a href="destinos/piscilago">
            <img class="d-block w-100" src="images/Web Banner.png" alt="First slide">
        </a>
    </div>
    <div class="carousel-item">
        <a href="destinos/piscilago">
            <img class="d-block w-100" src="images/Web Banner.png" alt="Second slide">
        </a>
    </div>
    <!-- <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div> -->
  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Atras</span>
  </a>

  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>

</div>

<!-- INTRODUCCION Agencia de viajes -->
<section class="main-block">
   
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-12 col-md-11 col-lg-11 pb-2">

         <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="styled-heading">
                        <h3>Agencia de viajes</h3>
                        <h6 style="color:#ABB2B9;">RNT.72472</h6>
                    </div>
                </div>
            </div>

         </div>
      </div>
   </div>

   <!-- AGENCIA DE VIAJES -->
   <div class="intro">

		<div class="container">
			<div class="row">
				<div class="col">
					<div class="intro_container">
						<div class="row">

							<!-- Intro Item -->
							<div class="col-lg-4 intro_col">
								<div class="intro_item d-flex flex-row align-items-end justify-content-start">
									<div class="intro_icon"><img src="images/beach.svg" alt=""></div>
									<div class="intro_content">
										<div class="intro_title">Los mejores destinos</div>
										<div class="intro_subtitle"><p>Creando tus mejores momentos.</p></div>
									</div>
								</div>
							</div>

							<!-- Intro Item -->
							<div class="col-lg-4 intro_col">
								<div class="intro_item d-flex flex-row align-items-end justify-content-start">
									<div class="intro_icon"><img src="images/wallet.svg" alt=""></div>
									<div class="intro_content">
										<div class="intro_title">Al mejor precio</div>
										<div class="intro_subtitle"><p>Transportando tus sueños.</p></div>
									</div>
								</div>
							</div>

							<!-- Intro Item -->
							<div class="col-lg-4 intro_col">
								<div class="intro_item d-flex flex-row align-items-end justify-content-start">
									<div class="intro_icon"><img src="images/suitcase.svg" alt=""></div>
									<div class="intro_content">
										<div class="intro_title">Todo incluido</div>
										<div class="intro_subtitle"><p>Cootranshuila, agencia de viajes.</p></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>		
			</div>
		</div>
	</div>
   
</section>

<!-- FORMULARIO TE LLAMAMOS -->
<div class="super_conntainer">

  <div class="home">
		
		<!-- Home Slider -->
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slide -->
				<div class="owl-item">
					<div class="background_image img-fluid img-avion" style="background-image:url(images/intro.png)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content">
										<!-- <div class="home_title"><h2>Let us take you away</h2></div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<!-- <div class="home_page_nav">
				<ul class="d-flex flex-column align-items-end justify-content-end">
					<li><a href="#" data-scroll-to="#destinations">Offers<span>01</span></a></li>
					<li><a href="#" data-scroll-to="#testimonials">Testimonials<span>02</span></a></li>
					<li><a href="#" data-scroll-to="#news">Latest<span>03</span></a></li>
				</ul>
			</div> -->
		</div>
	</div>

	<!-- Search -->

	<div class="home_search">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_search_container">
						<div class="home_search_title"><b>¿Te contactamos?</b></div>
						<div class="home_search_content">
							<form class="home_search_form" id="form_agregar_cliente" name="form_agregar_cliente" action='php/agregar_cliente.php' method='GET'>
								<div class="d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
									<input type="text" class="search_input search_input_1" placeholder="Nombre" required="required" name="nombre">
									<input type="email" class="search_input search_input_2" placeholder="Correo" required="required" name="correo">
									<input type="number" class="search_input search_input_3" placeholder="Telefono" required="required" name="telefono">
									<button class="home_search_button">Enviar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>


<!-- Destinations -->

    <div class="destinations" id="destinations">
		<div class="container">
			<div class="row">
				<div class="col text-center mb-5">
					<div class="section_subtitle">Llegamos lejos</div>
					<div class="section_title"><h2>Paquetes turisticos</h2></div>
				</div>
			</div>
			<!-- <div class="row destination_sorting_row">
				<div class="col">
					<div class="destination_sorting d-flex flex-row align-items-start justify-content-start">
						<div class="sorting">
							<ul class="item_sorting">
								<li>
									<span class="sorting_text">Sort By</span>
									<i class="fa fa-chevron-down" aria-hidden="true"></i>
									<ul>
										<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Show All</span></li>
										<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
										<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Name</span></li>
									</ul>
								</li>
								<li>
									<span class="sorting_text">Categories</span>
									<i class="fa fa-chevron-down" aria-hidden="true"></i>
									<ul>
										<li class="num_sorting_btn"><span>Category</span></li>
										<li class="num_sorting_btn"><span>Category</span></li>
										<li class="num_sorting_btn"><span>Category</span></li>
									</ul>
								</li>
							</ul>
						</div>
						<div class="sort_box ml-auto"><i class="fa fa-th" aria-hidden="true"></i></div>
					</div>
				</div>
			</div> -->
			<div class="row destinations_row">
				<div class="col">
					<div class="destinations_container item_grid" style="position: relative; min-height: 1089px;">

						<!-- Destination Piscilago desde Neiva -->
						<div class="destination item col-lg-4 col-md-6">
							<div class="destination_image">
								<img src="images/vacaciones-00.jpg" alt="">
								<!-- <div class="spec_offer text-center"><a>Oferta Especial</a></div> -->
							</div>
							<div class="destination_content">
								<div class="destination_title"><a>Piscilago | 03/10 Noviembre</a></div>
								<div class="destination_subtitle"><p>Mega parque Colombiano</p></div>
								<div class="destination_price">Por solo $99.000</div>
                                <div class="destination_title"><a>Salida desde Neiva</a></div>
								<div class="destination_list">
									<ul>
										<li>Transporte ida y regreso (Salida desde Neiva)</li>
										<li>Pasaporte Ingreso (Piscina, zoológico y toboganes)</li>
										<li>Refrigerio</li>
										<li>Gorro de Baño</li>
										<li>Almuerzo Piscitour</li>
										<li>Tarjeta de Asistencia Médica</li>
									</ul>
								</div>
                            </div>
                            <select name="piscilago-select" id="piscilago-select" class="form-control mt-3" style="color:#72728c;">
                                <option value="">Seleccione la fecha</option>
                                <option value="https://cootranshuila.teletiquete.com/?optOrigen=74&optDestino=12693&txtFecSalida=2019-11-03&txtFecRegreso=">03 de Noviembre</option>
                                <option value="https://cootranshuila.teletiquete.com/?optOrigen=74&optDestino=12693&txtFecSalida=2019-11-10&txtFecRegreso=">10 de Noviembre</option>
                            </select>
                            <div class="row load_more_row">
                                <div class="col">
                                    <div id="btn-piscilago" class="button load_more_button" style="background: rgba(0, 162, 81, 0.7);"><a id="click-piscilago" style="cursor: not-allowed; color:#fff;">COMPRAR AHORA</a></div>
                                </div>
                            </div>
						</div>

						<!-- Destination Eje Cafetero -->
						<div class="destination item col-lg-4 col-md-6">
							<div class="destination_image">
								<img src="images/eje-cafetero.jpg" alt="">
							</div>
							<div class="destination_content">
								<div class="destination_title"><a>Cafe Extremo | 08 Noviembre</a></div>
								<div class="destination_subtitle"><p>Recorrido de la cultura Cafetera</p></div>
								<div class="destination_price">Por solo $299.000</div>
                                <div class="destination_title"><a>Salida desde Neiva</a></div>
								<div class="destination_list">
									<ul>
										<li>Transporte ida y regreso (Salida desde Neiva)</li>
										<li>Acomodación Múltiple</li>
										<li>Alimentacion</li>
										<li>Seguros</li>
										<li>Guia Turistica</li>
										<li>Acceso completo al parque</li>
									</ul>
								</div>
							</div>
                            <div class="row load_more_row">
                                <div class="col">
                                    <div class="button load_more_button"><a href="https://cootranshuila.teletiquete.com/?optOrigen=74&optDestino=12694&txtFecSalida=2019-11-08&txtFecRegreso=">COMPRAR AHORA</a></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Destination Piscilago desde La Plata -->
						<div class="destination item col-lg-4 col-md-6">
							<div class="destination_image">
								<img src="../../assets/images/piscilago_la_plata.jpg" alt="">
								<!-- <div class="spec_offer text-center"><a>Oferta Especial</a></div> -->
							</div>
							<div class="destination_content">
								<div class="destination_title"><a>Piscilago | 08 Noviembre</a></div>
								<div class="destination_subtitle"><p>Mega parque Colombiano</p></div>
								<div class="destination_price">Por solo $140.000</div>
                                <div class="destination_title"><a>Salida desde La Plata</a></div>
								<div class="destination_list">
									<ul>
										<li>Transporte ida y regreso (Salida desde Neiva)</li>
										<li>Pasaporte Ingreso (Piscina, zoológico y toboganes)</li>
										<li>Refrigerio</li>
										<li>Gorro de Baño</li>
										<li>Almuerzo Piscitour</li>
										<li>Tarjeta de Asistencia Médica</li>
									</ul>
								</div>
                            </div>
                            <div class="row load_more_row">
                                <div class="col">
                                    <div class="button load_more_button"><a href="https://cootranshuila.teletiquete.com/?optOrigen=85&optDestino=12693&txtFecSalida=2019-11-08&txtFecRegreso=">COMPRAR AHORA</a></div>
                                </div>
                            </div>
						</div>

					</div>
				</div>
			</div>
			
		</div>
	</div>

	<!-- Contact -->

	<div class="contact">
		<div class="container">
			<div class="row">

				<!-- Get in touch -->
				<div class="col-lg-6">
					<div class="contact_content">
						<div class="contact_title">Cootranshuila operador turistico.</div>
						<div class="contact_text">
							<p>Ahora podrás adquirir paquetes turísticos con Cootranshuila. <br><br><b>- Cesar Andres Garcia Rios </b><br>coordinador turistico</p>
						</div>
						<div class="contact_list">
							<ul>
								<li>
									<div>direccion:</div>
									<div>Av. 26 # 4 - 82 Neiva, Huila.</div>
								</li>
								<li>
									<div>telefono:</div>
									<div>+57 315 870 6465 </div>
								</li>
								<li>
									<div>correo:</div>
									<div>turismo@coortanshuila.com</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Contact Form -->
				<div class="col-lg-6">
					<div class="contact_form_container">
                        <!-- <div class="contact_title mb-3">Cootranshuila oprador turistico.</div>    -->
						<form action="#" id="contact_form" class="contact_form">
							<div style="margin-bottom: 18px"><input type="text" class="contact_input contact_input_name inpt" placeholder="Nombre completo" required="required"><div class="input_border"></div></div>
							<div class="row">
								<div class="col-lg-6" style="margin-bottom: 18px">
									<div><input type="text" class="contact_input contact_input_email inpt" placeholder="Correo electronico" required="required"><div class="input_border"></div></div>
								</div>
								<div class="col-lg-6" style="margin-bottom: 18px">
									<div><input type="text" class="contact_input contact_input_subject inpt" placeholder="Asunto" required="required"><div class="input_border"></div></div>
								</div>
							</div>
							<div><textarea class="contact_textarea contact_input inpt" placeholder="Mensaje" required="required"></textarea><div class="input_border" style="bottom:3px"></div></div>
							<button class="contact_button">enviar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


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
    <!-- SCRIPT main.js DE TURISMO -->
    <script src="js/main.js"></script>
    <!-- SweerAlert js -->
    <script src="js/sweetalert2.all.min.js"></script>

    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="js/destinations.js"></script>
    <script src="js/custom.js"></script>


    <!-- Facebook Pixel Code -->
    <script> 
      !function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)}; if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0'; n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s)}(window, document,'script', 'https://connect.facebook.net/en_US/fbevents.js'); fbq('init', '1279210772244056'); fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1279210772244056&ev=PageView&noscript=1"/></noscript>
    <!-- End Facebook Pixel Code -->

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

            $('#piscilago-select').change(function () {
                if ($('#piscilago-select').val() != '') {
                    $('#btn-piscilago').css({
                        'background': 'rgb(0, 162, 81)'
                    });
                    $('#click-piscilago').css({
                        'cursor': 'pointer'
                    });
                } else {
                    $('#btn-piscilago').css({
                        'background': 'rgba(0, 162, 81, 0.7)'
                    });
                    $('#click-piscilago').css({
                        'cursor': 'not-allowed'
                    });
                }
            })

            $('#btn-piscilago').click(function () {
                var value = $('#piscilago-select').val();
                if (value) {
                    window.location = value;
                }
            })
        });
    </script>

</body>

</html>


