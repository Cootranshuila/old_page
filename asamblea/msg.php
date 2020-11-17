<?php

session_start();
require "../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";

$objConexion=conectaDb();

$sql = $objConexion->prepare('SELECT * from asistencia_asamblea');
$sql->execute();

$datos = $sql->fetchAll();

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="images/logo-icon.png">
	<title>Cootranshuila LTDA - Asamblea General 2020</title>

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
					<span>Enviar mensajes</span>
				</div>
				
				<br>
				<hr>
				<div class="content-update">
					
					<button type="button" onclick="enviar_mensaje()" class="button" style="width: 100%;">Enviar</button>
					
				</div>
			</div>
		</div>
	</div>
	<!-- end coming soon -->

	<script src="js/jquery.min.js"></script>
	<script src="js/app.js"></script>


	<?php 

	foreach ($datos as $dato) { 

		$post['to'] = array('57'.$dato['telefono']);
		$post['text'] = "En estos momentos se esta realizando la Asamblea Cootranshuila. Su acceso, https://cootranshuila.com/asamblea/ su Cedula: ". $dato['id'] ." y Contraseña: ". $dato['pasw'] ;
		$post['from'] = "Asamblea";
		$user ="leicortegagmail";
		$password = 'ORzn19@@';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://dashboard.wausms.com/Api/rest/message");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
		curl_setopt($ch, CURLOPT_HTTPHEADER,
		array(
		"Accept: application/json",
		"Authorization: Basic ".base64_encode($user.":".$password)));
		$result = curl_exec ($ch);

		echo '<script>console.log('.$result.')</script>';

	} ?>

</body>
</html>