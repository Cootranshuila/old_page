<?php

// echo "Bien";

session_start();
extract($_REQUEST); //Extraer los datos del formulario con REQUEST
require "../../config/ConexionBaseDatos_PDO.php"; //Conexion a la base de datos

$objConexion=conectaDb(); //Funcion con la conexion 

$pass = MD5($_REQUEST['pass']); //Guardamos la contraseña en una variable cifrada con MD5

$hoy = date("d/m/Y"); //Fecha actual


// INSERT a la base de datos
$sql= $objConexion->prepare("insert into usuarios (id_usuario, nombre_usuario, password_usuario, tipo_usuario) values (:id, :nom, :pass, 'General', 'Activo')");
$sql->bindParam(":id", $_REQUEST['id']); //pasamos el parametro del id
$sql->bindParam(":nom", $_REQUEST['nombre']); //pasamos el parametro del nombre
$sql->bindParam(":pass", $pass); //pasamos el parametro del password
$sql->execute();

$existe = $sql->rowCount(); //Obtenemos el numero de registros encontrados

if ($existe == 1) {

	$sql_usu = $objConexion->prepare('select * from usuarios order by num_usuario desc limit 1');
	$sql_usu->execute();
	$res_usu = $sql_usu->fetchAll();
	foreach ($res_usu as $row) {
		$num_usu = $row['num_usuario'];
	}

	$sql_cuota = $objConexion->prepare("INSERT into cuota values ('',:id,:fecha,'Inicial','1','20000')");
	$sql_cuota->bindParam(':id', $num_usu);
	$sql_cuota->bindParam(':fecha', $hoy);
	$sql_cuota->execute();
	$con_cuota = $sql_cuota->rowCount();

	if ($con_cuota == 1) {
		
		$sql_aporte = $objConexion->prepare("INSERT into aporte values ('',:id,:fecha,'Inicial','1','2000')");
		$sql_aporte->bindParam(':id', $num_usu);
		$sql_aporte->bindParam(':fecha', $hoy);
		$sql_aporte->execute();
		$con_aporte = $sql_aporte->rowCount();

		if ($con_aporte == 1) {
			echo "Ok";
		}

	}

}
else{
	echo "Error";
}

?>