<?php

session_start();
extract($_REQUEST); //Extraer los datos del formulario con REQUEST
// include("../../config/semana.php");
require "../../config/ConexionBaseDatos_PDO.php"; //Conexion a la base de datos

$objConexion=conectaDb(); //Funcion con la conexion 
$fecha = date("d/m/Y");


// Consulta a la base de datos
$sql= $objConexion->prepare("INSERT into cuota (num_usuario_foreign,fecha_cuota,semana_cuota,cuota,valor_cuota) values (:id, :fecha, :sem, '1', 10000)");
$sql->bindParam(":id", $_REQUEST['id']); //pasamos el parametro del id
$sql->bindParam(":fecha", $fecha); //pasamos el parametro de semana
$sql->bindParam(":sem", $_REQUEST['semana']); //pasamos el parametro de semana
$sql->execute();

$existe = $sql->rowCount(); //Obtenemos el numero de registros encontrados

if ($existe == 1) {
	echo "Ok";
}
else{
	echo "Error";
}

?>