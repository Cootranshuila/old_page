<?php 

require 'ConexionBaseDatos_PDO.php';

extract($_REQUEST);

$conexion = conectaDb();

$sql = $conexion->prepare('SELECT * from asistencia_fondo where estado = "llego"');
$sql->execute();
$cont =$sql->rowCount();

$porcentaje = round(($cont*100)/150, 2);

if ($cont < 10) {
	echo "0 , 0 0 ".$cont." | ".$porcentaje."%";
} else if ($cont < 100) {
	echo "0 , 0 ".$cont." | ".$porcentaje."%";
} elseif ($cont >= 100) {
	echo "0 , ".$cont." | ".$porcentaje."%";
}
	


?>