<?php
session_start();
extract($_REQUEST);
require "ConexionBaseDatos_PDO.php";

$objConexion=conectaDb();
$pass = MD5($_REQUEST['pass']);
$id_usu = $_REQUEST['id_usu'];

$sql= $objConexion->prepare("select id_usuario, num_usuario, nombre_usuario, password_usuario, rol_usuario from usuarios where id_usuario = :id and password_usuario = :pass");
	$sql->bindParam(":id", $id_usu);
	$sql->bindParam(":pass", $pass);
	$sql->execute();
	$resultado = $sql->fetchAll();
	$existe = $sql->rowCount();

foreach ($resultado as $row) {
	$nombre = $row['nombre_usuario'];
	$i = $row['num_usuario'];
	$rol = $row['rol_usuario'];
}

	if ($existe == 1) {
		$_SESSION["rol"] = $rol;
		$_SESSION["user"] = $nombre;
		$_SESSION["n-user"] = $i;

		if ($rol == "Postulados") {
			header("location:postulados/index.php?cargo=conductor&estado=Postulado");
		}
		else{
			header("location:Administrador.php");
		}
	}
	else{
		header("location:Administrador.php?x=1");
	}

?>
