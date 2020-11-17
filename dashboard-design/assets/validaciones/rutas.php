<?php

session_start();
extract($_REQUEST);
require "../config/ConexionBaseDatos_PDO.php";

$objConexion=conectaDb();

$sql = $objConexion->prepare('SELECT * from ciudades_silog ORDER BY Nombre ASC');
$sql->execute();

?> <option value="">Origen...</option> <?php

foreach ($sql->fetchAll() as $row) { ?>

	<option value="<?php echo $row['id_busqueda']; ?>"><?php echo $row['Nombre']; ?></option>

<?php }

?>
