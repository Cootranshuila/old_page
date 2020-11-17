<?php 

require 'ConexionBaseDatos_PDO.php';

extract($_REQUEST);

$conexion = conectaDb();

$sql = $conexion->prepare('UPDATE asistencia_fondo set estado = "llego" where numero = '.$_REQUEST['numero'].'');
$sql->execute();
if ($sql->rowCount() == 1) { ?>
	<div class="content">
		<h1 style="font-size: 3em; margin-top: 15px;">Se edito correctamente.</h1>
	</div>
<?php } else { ?>
	<div class="content">
		<h1 style="font-size: 3em; margin-top: 15px;">Ha ocurrido un error.</h1>
	</div>
<?php }
	


?>