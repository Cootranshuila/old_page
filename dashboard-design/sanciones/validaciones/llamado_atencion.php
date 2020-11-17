<?php 

extract($_REQUEST);
extract($_POST);

require "../../assets/config/ConexionBaseDatos_PDO.php";

require "../../postulados/seg.php";
$objConexion=conectaDb();

// $sql0 = $objConexion->prepare('UPDATE operativos set estado = "En descargos" where num_operativo = :num');
// $sql0->bindParam(':num', $_REQUEST['num']);
// $sql0->execute();

$sql1 = $objConexion->prepare('UPDATE procedimiento set llamado_atencion = "Si" where id_op_foreing = :num');
$sql1->bindParam(':num', $_REQUEST['num']);
$sql1->execute();

if ($sql1->rowCount() == 1) { ?>
	<div class="text-center mt-4">
      <h3><b>Solo se le llamó la atención.</b></h3>
    </div>
<?php } else { ?>
	<div class="row text-center">
      <h4 class="col-md-6">Ha ocurrido un error, contacte al desarrollador.</h4>
    </div>
<?php }


?>