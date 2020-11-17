<?php
require "dashboard/ConexionBaseDatos_PDO.php";
$objConexion=conectaDb();

if (isset($_POST['idDep']) && !empty($_POST['idDep'])) {
	$sql="select idMun, nomMun from tblmunicipio where idDep = :id order by nomMun";
	$resultado=$objConexion->prepare($sql);
	$resultado->bindParam(':id', $_POST['idDep']);
	$resultado->execute();
	if ($resultado->rowCount()>0) { ?>
		<option>Ciudad</option>
		<?php while ($key = $resultado->fetch()) { ?>
			<option value="<?php echo $key['idMun'] ?>"><?php echo $key['nomMun']; ?></option>
		<?php }
	}
	else{ ?>
		<option value="">Ciudad</option>
	<?php }
}

?>