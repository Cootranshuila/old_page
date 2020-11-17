<?php 

session_start();
extract($_REQUEST);
require "../../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";

$objConexion=conectaDb();


$sql = $objConexion->prepare('SELECT * from asistencia_asamblea where id = :id and pasw = :pasw');
$sql->bindParam(':id', $_REQUEST['identificación']);
$sql->bindParam(':pasw', $_REQUEST['pasw']);
$sql->execute();

$userData = $sql->fetchAll();

if ($sql->rowCount() == 1) {

    $_SESSION["user"] = $userData[0]['id'];

    if ($userData[0]['estado'] == '') {
        $sql_update = $objConexion->prepare('UPDATE asistencia_asamblea SET estado = "asistio" WHERE id = '.$userData[0]['id']);
        $sql_update->execute();

        if ($sql_update->rowCount() == 1) {
            echo( $userData[0]['nombre'] );
        } else {
            unset($_SESSION['user']);
            echo 0;
        }

    } else {
        echo( $userData[0]['nombre'] );
    }

} else {
    echo 0;
}

?>