<?php 

    require "../../../../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";
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
    <link rel="icon" type="image/png" href="../../../../assets/images/logo-icon.png" />
    <!-- Page Title -->
    <title>Cootranshuila - Piscilago</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../../../../assets/css/bootstrap.min.css"> -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="../../../../assets/css/simple-line-icons.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="../../../../assets/css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="../../../../assets/css/set1.css">
    <!-- Swipper Slider -->
    <link rel="stylesheet" href="../../../../assets/css/swiper.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="../../../../assets/css/magnific-popup.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="../../../../assets/css/style.css">

    <link rel="stylesheet" type="text/css" href="../../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="../../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="../../plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="../../styles/main_styles.css">
    <!-- <link rel="stylesheet" type="text/css" href="styles/about.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="styles/about_responsive.css"> -->
    <link rel="stylesheet" type="text/css" href="../../styles/responsive.css">


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
                            <a class="navbar-brand" href="../../../../index.php"><img src="../../../../assets/images/logo.png" class="logo img-fluid"></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-menu"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav nav-tabs">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link1 nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Empresa<span class="icon-arrow-down"></span></a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="../../../../info.php?empresa=historia">Historia</a>
                                            <a class="dropdown-item" href="../../../../info.php?empresa=empresa">Nuestra empresa</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link1 nav-link" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Servicios<span class="icon-arrow-down"></span> </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="https://cootranshuila.teletiquete.com/">Tiquetes online</a>
                                            <a class="dropdown-item" href="info.php?especial">Servicio Especial</a>
                                            <a class="dropdown-item" href="#" id="estacionN">Estacion de servicios</a>
                                            <a class="dropdown-item" href="#" id="encomiendasN">Carga y encomiendas</a>
                                            <a class="dropdown-item" href="../../../../info.php?flota">Transporte de pasajeros</a> 
                                        </div>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link1 nav-link" href="../../../../index.php#oficinas">Oficinas</a>
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
                                        <a class="nav-link1 nav-link" href="../../../../info.php?politica">Politica de datos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link1 nav-link" href="../../../../info.php?siplat">Siplat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link1 nav-link" href="../../../../index.php#contacto">Contactenos</a>
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


    <div class="home" style="top:83px; z-index:1;">
		
		<!-- Home Slider -->
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slide -->
				<div class="owl-item">
					<div class="background_image" style="background-image:url(images/piscilago_banner.jpg)"></div>
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
    
    <br><br><br>

    <!-- DESCRIPCION -->
    <div class="about">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_subtitle">Mega parque de Colombia</div>
					<div class="section_title"><h2>Piscilago</h2></div>
				</div>
			</div>
			<div class="row about_row">
				<div class="col-lg-6">
					<div class="about_content">
						<div class="text_highlight">Piscilago, el mega parque de Colombia, se encuentra ubicado en el Km 105 vía Bogotá – Girardot a 5 minutos de Melgar.</div>
						<div class="about_text">
							<p>Con un clima promedio de 28°C. Piscilago Colsubsidio es considerado como uno de los parques más visitados del país y reconocidos en Latinoamérica. Es uno de los lugares más importantes de la región, cuenta con variadas atracciones mecánicas, acuáticas y naturales con espacios y programas especialmente diseñados para la conservación de la fauna y la flora.</p>
						</div>
						<div class="button about_button"><a href="#">Ver mas</a></div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about_image"><img src="images/piscilago_banner2.jpg" alt=""></div>
				</div>
			</div>
		</div>
	</div>


<!--============================= FOOTER =============================-->
    <div class="foo-footer mt-5"></div>
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
                        <a href="http://www.supertransporte.gov.co/super/" target="_blank"><img src="../../../../assets/images/img/footer-logo-1.png" class="img-fluid"></a>
                        <a href="https://www.mintransporte.gov.co/" target="_blank"><img src="../../../../assets/images/img/footer-logo-2.png" class="img-fluid"></a>
                        <a href="https://www.simit.org.co/" target="_blank"><img src="../../../../assets/images/img/footer-logo-3.png" class="img-fluid"></a>
                        <a href="https://www.invias.gov.co/" target="_blank"><img src="../../../../assets/images/img/footer-logo-4.png" class="img-fluid"></a>
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
                            <li><span class="ti-user"></span><a href="../../../../formulario_postulado.php">&nbsp;&nbsp;Trabaje con nosotros</a></li>
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
    <script src="../../../../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../../../../assets/js/popper.min.js"></script>
    <script src="../../../../assets/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/main.js"></script>
    <!-- Magnific popup JS -->
    <script src="../../../../assets/js/jquery.magnific-popup.js"></script>
    <!-- Swipper Slider JS -->
    <script src="../../../../assets/js/swiper.min.js"></script>

    <script src="../../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="../../plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="../../plugins/scrollTo/jquery.scrollTo.min.js"></script>
    <script src="../../plugins/easing/easing.js"></script>
    <script src="../../plugins/parallax-js-master/parallax.min.js"></script>
    <script src="../../js/custom.js"></script>

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

</body>

</html>


