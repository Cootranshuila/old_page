<?php 

extract($_REQUEST);
extract($_POST);

require "../../assets/config/ConexionBaseDatos_PDO.php";
require "../../postulados/seg.php";

$objConexion=conectaDb();

$fecha = date("y-m-d h:i:s");
$estado = 0;

$sql = $objConexion->prepare("INSERT into reporte(fecha, placa_carro, tipo_prod, id_prod, observacion, nombre, contacto, estado_reporte) values (:fecha, :placa, :tipo, :id_p, :obs, :nom, :con, :estado)");
$sql->bindParam(":fecha", $fecha);
$sql->bindParam(":placa", $_REQUEST['placa']);
$sql->bindParam(":tipo", $_REQUEST['tipo']);
$sql->bindParam(":id_p", $_REQUEST['id_p']);
$sql->bindParam(":obs", $_REQUEST['obs']);
$sql->bindParam(":nom", $_REQUEST['nom']);
$sql->bindParam(":con", $_REQUEST['con']);
$sql->bindParam(":estado", $estado);
$sql->execute();

if ($sql->rowCount() == 1) {
	echo 'Ok';
} else {
	echo 'Error';
}


?>