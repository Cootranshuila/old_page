<?php

extract($_REQUEST);
extract($_POST);

require "../../assets/config/ConexionBaseDatos_PDO.php";

$objConexion=conectaDb();

$fecha = date("d/m/Y");

$sql = $objConexion->prepare("INSERT into clientes_turismo(fecha_registro, nombre_clientetur, correo_clientetur, telefono_clientetur) values (:fecha, :nombre, :correo, :telefono)");
$sql->bindParam(":fecha", $fecha);
$sql->bindParam(":nombre", $_REQUEST['nombre']);
$sql->bindParam(":correo", $_REQUEST['correo']);
$sql->bindParam(":telefono", $_REQUEST['telefono']);
$sql->execute();

if ($sql->rowCount() == 1) {
	echo 'Ok';
} else {
	echo 'Error';
}

?>