<?php

session_start();
require "../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";

$objConexion=conectaDb();

$sql_1 = $objConexion->prepare('SELECT * from asistencia_asamblea WHERE `id` ='.$_SESSION['user']);
$sql_1->execute();
$user = $sql_1->fetchAll();

foreach ($user as $usr) {
	if($usr['estado'] == 1) {
		$sql = $objConexion->prepare('UPDATE `asistencia_asamblea` SET `estado`="" WHERE `id` ='.$_SESSION['user']);
		$sql->execute();
		unset($_SESSION['user']);

		header("location:index.php");
	}
}

if (isset($_SESSION['user'])) {
	$sql = $objConexion->prepare('SELECT * from asistencia_asamblea where id = :id');
	$sql->bindParam(':id', $_SESSION['user']);
	$sql->execute();

	$userData = $sql->fetchAll();
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="images/logo-icon.png">
	<title>Cootranshuila LTDA - Asamblea General 2020</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/materialize.css">
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>

	<!-- coming soon -->
	<div class="coming-soon">
		<div class="container">
			<div class="wrapper-content">
				<div class="wrap-desc-top">
					<div class="wrap-icon">
						<div class="icon">
						</div>
					</div>
					<br>
					<span>Total Asistentes</span>
				</div>
				<div class="content-countdown">
					<div class="countdown" data-date="June 01 2019 06:0:0">
						<div class="row">
							<div class="col s4">
								<div class="content">
									<ul>
										<li class="data-number" data-hours>0</li>
									</ul>
								</div>
							</div>
							<div class="col s4">
								<div class="content">
									<ul>
										<li class="data-number" data-minutes>0</li>
									</ul>
								</div>
							</div>
							<div class="col s4">
								<div class="content">
									<ul>
										<li class="data-number" id="total"></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="wrap-desc-top">
					<span id="porcentaje">00,0 %</span>
				</div>
				<div class="wrap-desc-bottom">
					<!-- <span>Stay Tuned to Latest Update</span> -->
				</div>
				<br>
				<hr>
				<div class="content-update">
					<?php 
					if (isset($_SESSION['user'])) { ?>
						<form action="https://www.gotomeet.me/Cootranshuila/asamblea">
							<div class="wrap-title">
								<h5>Bienvenido</h5>
							</div>
							<div class="wrap-title">
								<h5><?php echo $userData[0]['nombre'] ?></h5>
							</div>
							<br>
							<button type="submit" class="button" style="width: 100%;">Ingresar a la trasmision</button>
							<button type="button" class="button" id="votar" data-toggle="modal" data-target=".bd-example-modal-xl" style="width: 100%;">Votar</button>
						</form>
					<?php } else { ?>
						<form id="form_ingresar" method="POST">
							<div class="wrap-title">
								<h5>Verifica tu identidad</h5>
							</div>
							<div class="wrap-form">
								<input type="text" name="identificación" placeholder="Identificación*" required>
							</div>
							<br>
							<div class="wrap-form">
								<input type="password" name="pasw" placeholder="Contraseña*" required>
							</div>
							<div id="err"></div>
							<button type="submit" class="button" style="width: 100%;">Ingresar</button>
						</form>
					<?php } ?>
					
				</div>
			</div>
		</div>
	</div>
	<!-- end coming soon -->

	<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div id="content"></div>
			</div>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="js/app.js"></script>

	<script>

		$('#votar').click(function () {
			$.ajax({
				url: 'php/votar.php',
				type: 'POST',
				success: function (data) {
					console.log(data)

					if (data == 'Ok') {
						$.ajax({
							url: 'votacion.php',
							type: 'GET',
							success: function (data) {
								$('#content').html(data)
							}
						})
					} else {
						$('#content').html(`
						<div class="wrap-title p-5 text-center">
							<h5>Ya realizo su votación</h5>
						</div>
						`)
					}

				}
			})
		})
	
	</script>

</body>
</html>
