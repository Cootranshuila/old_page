<?php 

extract($_REQUEST);
extract($_POST);

require "../../assets/config/ConexionBaseDatos_PDO.php";

require "../../postulados/seg.php";
$objConexion=conectaDb();

// $sql0 = $objConexion->prepare('UPDATE operativos set estado = "En descargos" where num_operativo = :num');
// $sql0->bindParam(':num', $_REQUEST['num']);
// $sql0->execute();

$sql1 = $objConexion->prepare('UPDATE procedimiento set sancion = :sancion, observacion = :observacion where id_op_foreing = :num');
$sql1->bindParam(':sancion', $_REQUEST['sancion']);
$sql1->bindParam(':observacion', $_REQUEST['observacion']);
$sql1->bindParam(':num', $_REQUEST['num']);
$sql1->execute();

if ($sql1->rowCount() == 1) { ?>
	<textarea name="textarea-sancion" readonly id="textarea-sancion" class="form-control mb-3"><?php echo $_REQUEST['sancion']; ?></textarea>
	<textarea name="textarea-observacion" readonly id="textarea-observacion" class="form-control"><?php echo $_REQUEST['observacion']; ?></textarea>
<?php } else { ?>
	<div class="row text-center">
      <h4 class="col-md-6">Ha ocurrido un error, contacte al desarrollador.</h4>
    </div>
<?php }


?>