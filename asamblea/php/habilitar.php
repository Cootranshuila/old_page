<?php 

session_start();
extract($_REQUEST);
require "../../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";

$objConexion=conectaDb();

$sql = $objConexion->prepare('SELECT * from formularios WHERE formularios.id = '.$_REQUEST['num']);
$sql->execute();

$datos = $sql->fetchAll();

foreach ($datos as $row) {
    if ($row['estado'] == 1) {
        $sql = $objConexion->prepare('UPDATE formularios SET estado = 0 WHERE formularios.id = '.$_REQUEST['num']);
        $sql->execute();
    } else {
        $sql = $objConexion->prepare('UPDATE formularios SET estado = 1 WHERE formularios.id = '.$_REQUEST['num']);
        $sql->execute();
    }
    
}

if ($sql->rowCount() == 1) {
    echo( $_REQUEST['num'] );
} else {
    echo 0;
}


?>