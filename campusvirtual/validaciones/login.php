<?php

session_start();
require "../../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";

extract($_REQUEST);
$conexion = conectaDb();

$user = $_REQUEST['user'];
$pwd  = MD5($_REQUEST['pwd']);

$sql = $conexion->prepare("SELECT * from estudiantes where usuario_estudiante = :user and pwd_estudiante = :pwd");
$sql->bindParam(":user", $user);
$sql->bindParam(":pwd", $pwd);
$sql->execute();

foreach ($sql->fetchAll() as $row) {
    $n_user = $row['id_estudiante'];
}

if ($sql->rowCount() == 1) {
    $_SESSION["usr"] = $n_user;
    echo 1;
} else {
    echo 0;
}


?>