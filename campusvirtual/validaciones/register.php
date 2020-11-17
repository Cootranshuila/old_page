<?php

require "../../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";

extract($_REQUEST);
$conexion = conectaDb();

$sql = $conexion->prepare("INSERT into estudiantes values ('', :nom, :correo, :men, '', '')");
$sql->bindParam(":nom", $_REQUEST['nombre']);
$sql->bindParam(":correo", $_REQUEST['correo']);
$sql->bindParam(":men", $_REQUEST['mensaje']);
$sql->execute();

echo $sql->rowCount();

?>