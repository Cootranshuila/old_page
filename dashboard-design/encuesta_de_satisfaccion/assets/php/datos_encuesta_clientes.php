
<?php 

require "../../../../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";
$conexion = conectaDb();

extract($_REQUEST);

date_default_timezone_set('America/Bogota');
$fecha = date("d/m/Y");

$sql = $conexion->prepare('INSERT INTO encuesta_turismo (fecha_encuesta, nombre_cliente, correo_cliente, telefono_cliente, pregunta_uno, pregunta_dos, pregunta_tres, pregunta_cuatro, pregunta_cinco, pregunta_seix, pregunta_siete, pregunta_ocho, pregunta_nueve, desea_viajar, nombre_recomendado, correo_recomendado, telefono_recomendado) VALUES (:fecha_encuesta, :nombre_cliente, :correo_cliente, :telefono_cliente, :pregunta_uno, :pregunta_dos, :pregunta_tres, :pregunta_cuatro, :pregunta_cinco, :pregunta_seix, :pregunta_siete, :pregunta_ocho, :pregunta_nueve, :desea_viajar, :nombre_recomendado, :correo_recomendado, :telefono_recomendado)');
$sql->bindParam(':fecha_encuesta', $fecha);
$sql->bindParam(':nombre_cliente', $_REQUEST['name'], PDO::PARAM_STR);
$sql->bindParam(':correo_cliente', $_REQUEST['email'], PDO::PARAM_STR);
$sql->bindParam(':telefono_cliente', $_REQUEST['phone'], PDO::PARAM_INT);
$sql->bindParam(':pregunta_uno', $_REQUEST['customRadioInline1'], PDO::PARAM_STR);
$sql->bindParam(':pregunta_dos', $_REQUEST['customRadioInline12'], PDO::PARAM_STR);
$sql->bindParam(':pregunta_tres', $_REQUEST['customRadioInline13'], PDO::PARAM_STR);
$sql->bindParam(':pregunta_cuatro', $_REQUEST['customRadioInline14'], PDO::PARAM_STR);
$sql->bindParam(':pregunta_cinco', $_REQUEST['customRadioInline15'], PDO::PARAM_STR);
$sql->bindParam(':pregunta_seix', $_REQUEST['customRadioInline16'], PDO::PARAM_STR);
$sql->bindParam(':pregunta_siete', $_REQUEST['customRadioInline17'], PDO::PARAM_STR);
$sql->bindParam(':pregunta_ocho', $_REQUEST['customRadioInline18'], PDO::PARAM_STR);
$sql->bindParam(':pregunta_nueve', $_REQUEST['recomendacionBtn'], PDO::PARAM_STR);
$sql->bindParam(':desea_viajar', $_REQUEST['viajar'], PDO::PARAM_STR);
$sql->bindParam(':nombre_recomendado', $_REQUEST['nameRecomen'], PDO::PARAM_STR);
$sql->bindParam(':correo_recomendado', $_REQUEST['emailRecomen'], PDO::PARAM_STR);
$sql->bindParam(':telefono_recomendado', $_REQUEST['phoneRecomen'], PDO::PARAM_INT);
$sql->execute();

echo $sql->rowCount();

?>



