<?php 

session_start();
extract($_REQUEST);
require "../../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";

$objConexion=conectaDb();


$sql = $objConexion->prepare('SELECT * from formularios where estado = 1');
$sql->execute();

$datos = $sql->fetchAll();

foreach ($datos as $dato) {
    $activo = $dato['id'];
}

$sql_u = $objConexion->prepare('SELECT * from asistencia_asamblea where id = '.$_SESSION['user']);
$sql_u->execute();

$datos_u = $sql_u->fetchAll();

foreach ($datos_u as $dato_u) {
    $votacion = $dato_u['votacion'];
}

if ($votacion < $activo) {
    $sql = $objConexion->prepare('UPDATE asistencia_asamblea SET votacion = '.$activo.' WHERE id = '.$_SESSION['user']);
    $sql->execute();
    
    echo 'Ok';
} else {
    echo 'Error';
}



?>