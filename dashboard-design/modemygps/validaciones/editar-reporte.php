<?php 

extract($_REQUEST);
extract($_POST);

require "../../assets/config/ConexionBaseDatos_PDO.php";
require "../../postulados/seg.php";

$objConexion=conectaDb();

$sql = $objConexion->prepare("UPDATE `reporte` SET `placa_carro` = :placa, `tipo_prod` = :tipo, `id_prod` = :id_p, `observacion` = :obs, `nombre` = :nom, `contacto` = :con WHERE `reporte`.`id_reporte` = :id");
$sql->bindParam(":placa", $_REQUEST['placa']);
$sql->bindParam(":tipo", $_REQUEST['tipo']);
$sql->bindParam(":id_p", $_REQUEST['id_p']);
$sql->bindParam(":obs", $_REQUEST['obs']);
$sql->bindParam(":nom", $_REQUEST['nom']);
$sql->bindParam(":con", $_REQUEST['con']);
$sql->bindParam(":id", $_REQUEST['id_reporte']);
$sql->execute();

if ($sql->rowCount() == 1) {
	echo $_REQUEST['id_reporte'];
} else {
	$sql = $objConexion->prepare("SELECT * from reporte where id_reporte = ".$_REQUEST['id_reporte']);
	$sql->execute();
	foreach ($sql->fetchAll() as $row) {
		if ($row['placa_carro'] == $_REQUEST['placa'] and $row['tipo_prod'] == $_REQUEST['tipo'] and $row['id_prod'] == $_REQUEST['id_p'] and $row['observacion'] == $_REQUEST['obs'] and $row['nombre'] == $_REQUEST['nom'] and $row['contacto'] == $_REQUEST['con']) {
			echo $_REQUEST['id_reporte'];
		}
		else {
			echo 'Error';
		}
	}
}


?>