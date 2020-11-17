<?php

session_start();
extract($_REQUEST); //Extraer los datos del formulario con REQUEST
include("../../config/semana.php");
// require "../../config/ConexionBaseDatos_PDO.php"; //Conexion a la base de datos


// $objConexion=conectaDb(); //Funcion con la conexion 

$pass = MD5($_REQUEST['pass']); //Guardamos la contraseña en una variable cifrada con MD5
$id_usu = $_REQUEST['id']; //Guardamos el id del usuario en una variable


// Consulta a la base de datos
$sql= $objConexion->prepare("select num_usuario, id_usuario, password_usuario from usuarios where id_usuario = :id and password_usuario = :pass");
$sql->bindParam(":id", $id_usu); //pasamos el parametro del id
$sql->bindParam(":pass", $pass); //pasamos el parametro del password
$sql->execute();

$resultado = $sql->fetchAll(); //obtenemos los resultados de la consulta
$existe = $sql->rowCount(); //Obtenemos el numero de registros encontrados

foreach ($resultado as $row) {
	$i = $row['num_usuario']; //Guardamos el numero de usuario en una variable para crear la variable de session con el mismo 
}

if ($existe == 1) {
	
	$_SESSION["usr"] = $i;

	echo "Ok";
}
else{
	echo "Error";
}

?>