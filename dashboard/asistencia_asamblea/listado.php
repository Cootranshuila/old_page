<?php 

require 'assets/validaciones/ConexionBaseDatos_PDO.php';

extract($_REQUEST);

$conexion = conectaDb();

$sql = $conexion->prepare('SELECT * from asistencia_asamblea where estado = "llego" order by numero asc');
$sql->execute();
$res = $sql->fetchAll();

?>


<!DOCTYPE HTML>

<html lang="es">
	<head>
		<title>Asistencia Asamblea</title>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width">
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="icon" type="image/png" href="images/logo-icon.png">
		<link rel="stylesheet" href="assets/css/main.css" />
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="landing">

		<!-- Header -->
			<!-- <header id="header" class="alt">
				<h1><a href="index.php">Asistencia Asamblea</a></h1>
				<a href="#nav"><b id="coo">BIENVENIDOS</b></a>
			</header>

			<section id="banner">
				<br>
				<br>
				<br>
				<i class="icon fa-diamond"></i> -->
				<!-- <img src="images/logo2.png" alt="logo" style="margin-left: 20px">
				<br>
				<br>
				<h2 id="contador">0 , 0 0 0</h2>
				<p>Numero de asistentes</p> -->
				<!-- <ul class="actions"> -->
					<!-- <li><a href="#" class="button big special">Learn More</a></li> -->
				<!-- </ul> -->
			<!-- </section>  -->

		<!-- One -->
			<section id="one" class="wrapper style1">
				<div class="inner" style="text-align: center; margin-top: 10px;">
					<article class="feature">
						<!-- <span class="image"><img src="images/pic01.jpg" alt="" /></span> -->
						<div class="content">
							<h2 style="float: left; margin-right: 20px; margin-left: 30px; margin-top: 10px;"><b>Buscador</b></h2>
							<input type="text" id="busqueda" style="width: 65%; float: left; margin-right: 20px; border-radius: 35px;" placeholder="   Esccriba el numero, cedula o nombre...">
							<button id="buscar" class="alt small" style="margin-top: 10px; margin-bottom: 30px;">Enviar</button>
						</div>
					</article>

					<article class="feature" id="tabla">
						<!-- <span class="image"><img src="images/pic01.jpg" alt="" /></span> -->
						<div class="content">
							<table style="width:100%; text-align: center;">
								<tr>
									<th style="text-align: center;">Numero</th>
									<th style="text-align: center;">Identificacion</th> 
									<th style="text-align: center;">Nombre</th>
									<th style="text-align: center;">Mesa</th>
									<th style="text-align: center;">Estado</th>
								</tr>
								
								<?php foreach ($res as $row) { ?>
								<tr>
									<td id="numero"><?php echo $row['numero']; ?></td>
									<td><?php echo $row['id']; ?></td> 
									<td><?php echo $row['nombre']; ?></td>
									<td><?php echo $row['mesa']; ?></td>
									<?php if ($row['estado'] != '') { ?>
										<td><?php echo $row['estado']; ?></td>
									<?php } else { ?>
										<td><button class="alt small" id="llego" onclick="llego()" style="margin-bottom: 5px;">Llego</button><button class="special small" id="no_llego">No llego</button></td>
									<?php } 

									}?>
									
								</tr>
							</table>
						</div>
				
					</article>
					
				</div>
			</section>


		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<ul class="icons">
						<li>
							<img src="images/logo2.png" alt="logo" style="width: 50%">
						</li>
					</ul>
					<ul class="copyright">
						<li>&copy; Cootranshuila.</li><!-- 
						<li>Images: <a href="http://unsplash.com">Unsplash</a>.</li>
						<li>Design: <a href="http://templated.co">TEMPLATED</a>.</li> -->
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
			
			<script>

				$("#buscar").click(function(){
					// alert($("#numero").html());
					var busqueda = $("#busqueda").val();
					$.ajax({
		              type: 'POST',
		              url: 'assets/validaciones/buscar-estado.php',
		              data: {busqueda:busqueda},
		              success: function(data){
		                // console.log(data);
		                $("#tabla").html(data);
		                // Command: toastr["success"]("Fechas agregadas correctamente.", "Correcto!");
		              }
		            });
				});

			</script>
	</body>
</html>