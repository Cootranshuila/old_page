<?php

session_start();
extract($_REQUEST);
require "../config/ConexionBaseDatos_PDO.php";

$objConexion=conectaDb();

$sql = $objConexion->prepare('SELECT * from ruta_silog where id_origen = '.$_REQUEST["origen"]);
$sql->execute();

?> <option value="">Destino...</option> <?php

foreach ($sql->fetchAll() as $row) { 

	$sql_2 = $objConexion->prepare('SELECT * from ciudades_silog where id_busqueda = '.$row['id_destino'].'  ORDER BY Nombre ASC');
	$sql_2->execute(); 

	foreach ($sql_2->fetchAll() as $key) {
		?><option value="<?php echo $key['id_busqueda']; ?>"><?php echo $key['Nombre']; ?></option><?php
	}

}



?>

fromCityId=195201&toCityId=195207&onward=10-Dec-2019