<?php
require "../../assets/config/ConexionBaseDatos_PDO.php";

$conexion = conectaDb();

$nombreRuta = $_POST["nombreRuta"];

$sql =$conexion->prepare("INSERT into ruta (rutaNombre) values (:nombre)");
$sql->bindParam(":nombre", $nombreRuta);
$sql->execute();

$resultado = $sql->rowCount();

echo $resultado;

?>