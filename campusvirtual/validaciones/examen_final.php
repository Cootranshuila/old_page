<?php

session_start();
require "../../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";

extract($_REQUEST);
$conexion = conectaDb();

$user  = $_REQUEST['user'];
$nota  = $_REQUEST['nota'];

if ($nota >=3) {
    $aprobado = 'Si';
} else {
    $aprobado = 'No';
}


$sql = $conexion->prepare("UPDATE estudiantes SET aprobado=:aprobado, nota=:nota where id_estudiante = :user");
$sql->bindParam(":aprobado", $aprobado);
$sql->bindParam(":nota", $nota);
$sql->bindParam(":user", $user);
$sql->execute();

if ($sql->rowCount() == 1) {
    echo 1;
} else {
    echo 0;
}


?>