<?php 

extract($_REQUEST);
extract($_POST);

require "../../assets/config/ConexionBaseDatos_PDO.php";
require "../../postulados/seg.php";

$objConexion=conectaDb();

$sql = $objConexion->prepare("UPDATE `reporte` SET `resuelto` = :resuelto, `detalle` = :detalle WHERE `reporte`.`id_reporte` = :id");
$sql->bindParam(":resuelto", $_REQUEST['resuelto']);
$sql->bindParam(":detalle", $_REQUEST['detalle']);
$sql->bindParam(":id", $_REQUEST['id']);
$sql->execute();

if ($sql->rowCount() == 1) {
	echo 'Ok';
} else {
	echo 'Error';
}


?>