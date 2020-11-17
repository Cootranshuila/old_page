<?php

require "../assets/config/ConexionBaseDatos_PDO.php";
extract($_REQUEST);
require "seg.php";
$objConexion=conectaDb();

if ($_SESSION['rol'] != 'Postulados'  && $_SESSION['rol'] != 'Todos') {
	header("location:../Administrador.php");
}

if (isset($delete) && $delete == 'si') {

	$sql = "SELECT * FROM postulado WHERE numero_identificacion = :numero and estado = 'Postulado'";
	$con = $objConexion->prepare($sql);
	$con->bindParam(':numero', $_REQUEST['id']);
	$con->execute();
	if ($con->rowCount() >= 1) {
		
		$sql1 = "UPDATE postulado set estado = :estado WHERE numero_identificacion = :numero";
		$con1 = $objConexion->prepare($sql1);
		$con1->bindParam(':numero', $_REQUEST['id']);
		$estado = 'Rechazado';
		$con1->bindParam(':estado', $estado);
		$con1->execute();

		header('location:index.php?del=si&cargo='.$_REQUEST['cargo'].'&estado='.$_REQUEST['estado']);

	}
	else{
		header('location:index.php?existe=no');
	}

}
else{
	header('location:index.php');
}

?>