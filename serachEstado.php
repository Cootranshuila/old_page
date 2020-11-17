<?php
extract($_REQUEST);
extract($_POST);
// se hace la conexion a la base de datos
require "dashboard/ConexionBaseDatos_PDO.php";
$objConexion=conectaDb();
$estate = '';

$sql = "SELECT * from postulado where numero_identificacion = :id ORDER BY id DESC LIMIT 1";
$con = $objConexion->prepare($sql);
$con->bindParam(':id', $_GET['id']);
$con->execute();
$resCon = $con->fetchAll();
if ( $con->rowCount() == 1 ) {
	foreach ($resCon as $key) {
		$id = $key['id'];
		$estate = $key['estado'];
	}
	if ($estate == 'Postulado') {
		echo 'Postulado';
	}
	else{
		if ($estate == 'Rechazado') {
			echo 'Rechazado';
		}
		else{
			$sql2 = "SELECT * from entrevista where postulado_id = :id";
			$con2 = $objConexion->prepare($sql2);
			$con2->bindParam(':id', $id);
			$con2->execute();
			$resCon2 = $con2->fetchAll();
			$datos = array();
			foreach ($resCon2 as $key2) {
				array_push($datos, $key2['fecha']);
				array_push($datos, $key2['hora']);
				array_push($datos, $key2['lugar']);
				array_push($datos, $key2['obs']);
			}
			echo json_encode($datos);
		}
	}
}
else{
	echo "undefined";
}
?>