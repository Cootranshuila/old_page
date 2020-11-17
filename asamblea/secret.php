<?php

session_start();
require "../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";

$objConexion=conectaDb();

$sql = $objConexion->prepare('SELECT * from formularios where estado = 1');
$sql->execute();

$datos = $sql->fetchAll();

foreach ($datos as $row) {
    $nombre = $row['nombre'];
}
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
                <br><br><br><br><br><br><br><br><br>
                <button type="button" onclick="formulario(1)" class="button" id="form_1" style="width: 100%; <?php echo ($nombre == 'form_1') ? 'background: #000;' : '' ; ?>">Aprobación Orden del día</button><br><br>
                <button type="button" onclick="formulario(2)" class="button" id="form_2" style="width: 100%; <?php echo ($nombre == 'form_2') ? 'background: #000;' : '' ; ?>">Revisión y Aprobación del acta</button><br><br>
                <button type="button" onclick="formulario(3)" class="button" id="form_3" style="width: 100%; <?php echo ($nombre == 'form_3') ? 'background: #000;' : '' ; ?>">Elección de Presidente y Vicepresidente</button><br><br>
                <button type="button" onclick="formulario(4)" class="button" id="form_3" style="width: 100%; <?php echo ($nombre == 'form_4') ? 'background: #000;' : '' ; ?>">Aprovacion de reglamento Asamblea</button><br><br>
                <button type="button" onclick="formulario(5)" class="button" id="form_4" style="width: 100%; <?php echo ($nombre == 'form_5') ? 'background: #000;' : '' ; ?>">Aprobación de los Estados Financieros</button><br><br>
                <button type="button" onclick="formulario(6)" class="button" id="form_5" style="width: 100%; <?php echo ($nombre == 'form_6') ? 'background: #000;' : '' ; ?>">Aprobación de la distribución de Excedentes</button><br><br>
			</div>
		</div>
	</div>
	<!-- end coming soon -->

	<script src="js/jquery.min.js"></script>
    <script src="js/app.js"></script>
    
    <script>
        function formulario(num) {
            $.ajax({
                url: 'php/habilitar.php',
                type: 'POST',
                data: { num:num },
                success: function (data) {
                    window.location.href = 'secret.php';
                }
            })
        }
    </script>

</body>
</html>