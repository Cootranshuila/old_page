<?php

session_start();
// require "../../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";

extract($_REQUEST);
// $conexion = conectaDb();

if (isset($_SESSION["usr"])) {

    $user = $_SESSION["usr"];

    $sql = $conexion->prepare("SELECT * from estudiantes where usuario_estudiante = :user");
    $sql->bindParam(":user", $user);
    $sql->execute();

    foreach ($sql->fetchAll() as $row) {
        $n_user = $row['nombre_estudiante'];
    }

    if ($n_user == 'Supertransporte') {
        header("location:../estudiantes.php");
    } 

}

?>