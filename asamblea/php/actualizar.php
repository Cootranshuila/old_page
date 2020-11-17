<?php 

extract($_REQUEST);
require "../../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";

$objConexion=conectaDb();


$sql = $objConexion->prepare('SELECT * from asistencia_asamblea where estado = "asistio"');
$sql->execute();

echo $sql->rowCount();

?>

