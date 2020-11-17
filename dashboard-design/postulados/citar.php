<?php
require "../assets/config/ConexionBaseDatos_PDO.php";
extract($_REQUEST);
require "seg.php";
$objConexion=conectaDb();

if ($_SESSION['rol'] != 'Postulados'  && $_SESSION['rol'] != 'Todos') {
	header("location:../Administrador.php");
}


// echo $_GET['id'];
$sql1 = "UPDATE postulado set estado = :estado WHERE id = :id";
$con1 = $objConexion->prepare($sql1);
$con1->bindParam(':id', $_GET['id']);
$estado = 'Citado a entrevista';
$con1->bindParam(':estado', $estado);
$con1->execute();

$sql2 = "INSERT INTO entrevista (postulado_id, fecha, hora, lugar, obs) VALUES (:id, :fecha, :hora, :lugar, :obs)";
$con2 = $objConexion->prepare($sql2);
$con2->bindParam(':id', $_GET['id']);
$con2->bindParam(':fecha', $_GET['fecha']);
$con2->bindParam(':hora', $_GET['hora']);
$con2->bindParam(':lugar', $_GET['lugar']);
$con2->bindParam(':obs', $_GET['obs']);
$con2->execute();

header('location:index.php?cargo='.$_GET['cargo'].'&estado='.$_GET['estado']);

?>