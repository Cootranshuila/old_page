<?php 

include ('assets/config/seguridad.php');
if (isset($_SESSION['user'])) {
	if (isset($x) && $x == 3) {
		header("location:Administrador.php?x=2");
	}
}
require "assets/config/ConexionBaseDatos_PDO.php";
date_default_timezone_set('America/Bogota');
$fecha = date("y-m-d h:i:s");
$fecha_registro = date("y-m-d");
$hora_registro = date("h:i:s");
extract($_REQUEST);
$conexion = conectaDb();
if (isset($_REQUEST['salir']) && $_REQUEST['salir'] == 'si') {
	unset($_SESSION['user']);
	unset($_SESSION['n-user']);
}
$sql = $conexion->prepare("select * from usuarios where num_usuario = :i");
$sql->bindParam(":i", $_SESSION['n-user']);
$sql->execute();
$resultado = $sql->fetchAll();
foreach ($resultado as $row) {
  $rol = $row['rol_usuario'];
  $tipo = $row['tipo_usuario'];
  $depa = $row['departamento'];
  $cedula = $row['id_usuario'];
  if ($row['estado_usuario'] == 'inactivo') {
  	unset($_SESSION['user']);
	  unset($_SESSION['n-user']);
    header("location:Administrador.php?x=4");
  } 
}

if (isset($_REQUEST['btn-cambiar'])) {
	$apwd = MD5($_REQUEST['apwd']);
	$npwd = MD5($_REQUEST['npwd']);
	$sql = $conexion->prepare("select * from usuarios where num_usuario = :i");
    $sql->bindParam(":i", $_SESSION["n-user"]);
    $sql->execute();
    $resultado = $sql->fetchAll();
    
    foreach ($resultado as $row) {
    	if ($row['password_usuario'] == $apwd) {
    		$sql = $conexion->prepare("update usuarios set password_usuario = :npwd where num_usuario = :num");
    		$sql->bindParam(":npwd", $npwd);
    		$sql->bindParam(":num", $_SESSION['n-user']);
    		$sql->execute();
    		$count = $sql->rowCount();
    		if ($count == 1) {
    			$cambiar_pw = 1;
    		}
    		else{
    			$cambiar_pw = 2;
    		}
    	}
    	else{
    		$cambiar_pw = 0;
    	}
    }
}

if (isset($_REQUEST['btn-ruta'])) {
  $ruta = $_REQUEST['nuevaRuta'];
  $sql = $conexion->prepare("insert into ruta (rutaCodigo, rutaNombre) values ('', :ruta)");
  $sql->bindParam(":ruta", $ruta);
  $sql->execute();
  $resultado = $sql->rowCount();
  if ($resultado == 1) {
    $newRuta = 1;
  }
}

$sqlruta = $conexion->prepare("select * from ruta");
$sqlruta->execute();
$resultadoruta = $sqlruta->fetchAll();

if (isset($_REQUEST['enviar_co'])) {
  $sql = $conexion->prepare("INSERT INTO contrato (contratoNumeroUno, contratoAno, contratoCodigo, contratoEmpresa, contratoNit1, contratoNit2, contratoContratante, contratoNit3, contratoNit4, contratoObjetivo, contratoOrigen, contratoDestino, contratoRecorrido, contratoValor, PagoForma, contratoHoraSalida, contratoPasajeros, contratoConvenio, contratoConsorcio, contratoUnion, contratoCon, contratoDiaInicio, contratoMesInicio, contratoAnoInicio, contratoDiaFin, contratoMesFin, contratoAnoFin, contratoCarateVehiculo, contratoPlaca, contratoModelo, contratoMarca, contratoClase, contratoNumeroInterno, contratoTarOperacion, contratoConduc1Nombre, contratoConduc1Cedula, contratoConduc1Licencia, contratoConduc1Vigencia, contratoConduc2Nombre, contratoConduc2Cedula, contratoConduc2Licencia, contratoConduc2Vigencia, contratoConduc3Nombre, contratoConduc3Cedula, contratoConduc3Licencia, contratoConduc3Vigencia, contratoRespoNombre, contratoRespoCedula, contratoRespoDireccion, contratoRespoTelefono, contratoObservaciones, contratoFechaRealizado, usuarioCedula, contratoValorLetra) VALUES (:contratoNumeroUno, :contratoAno, '', :contratoEmpresa, :contratoNit1, :contratoNit2, :contratoContratante, :contratoNit3, :contratoNit4, :contratoObjetivo, :contratoOrigen, :contratoDestino, :contratoRecorrido, :contratoValor, :PagoForma, :contratoHoraSalida, :contratoPasajeros, :contratoConvenio, :contratoConsorcio, :contratoUnion, :contratoCon, :contratoDiaInicio, :contratoMesInicio, :contratoAnoInicio, :contratoDiaFin, :contratoMesFin, :contratoAnoFin, :contratoCarateVehiculo, :contratoPlaca, :contratoModelo, :contratoMarca, :contratoClase, :contratoNumeroInterno, :contratoTarOperacion, :contratoConduc1Nombre, :contratoConduc1Cedula, :contratoConduc1Licencia, :contratoConduc1Vigencia, :contratoConduc2Nombre, :contratoConduc2Cedula, :contratoConduc2Licencia, :contratoConduc2Vigencia, :contratoConduc3Nombre, :contratoConduc3Cedula, :contratoConduc3Licencia, :contratoConduc3Vigencia, :contratoRespoNombre, :contratoRespoCedula, :contratoRespoDireccion, :contratoRespoTelefono, :contratoObservaciones, :contratoFechaRealizado, :usuarioCedula,:contratoValorLetra)");
  $sql->bindParam(":contratoNumeroUno", $_REQUEST['contratoNumeroUno']);
  $sql->bindParam(":contratoAno", $_REQUEST['contratoAno']);
  $sql->bindParam(":contratoEmpresa", $_REQUEST['contratoEmpresa']);
  $sql->bindParam(":contratoNit1", $_REQUEST['contratoNit1']);
  $sql->bindParam(":contratoNit2", $_REQUEST['contratoNit2']);
  $sql->bindParam(":contratoContratante", $_REQUEST['contratoContratante']);
  $sql->bindParam(":contratoNit3", $_REQUEST['contratoNit3']);
  $sql->bindParam(":contratoNit4", $_REQUEST['contratoNit4']);
  $sql->bindParam(":contratoObjetivo", $_REQUEST['contratoObjetivo']);
  $sql->bindParam(":contratoOrigen", $_REQUEST['contratoOrigen']);
  $sql->bindParam(":contratoDestino", $_REQUEST['contratoDestino']);
  $sql->bindParam(":contratoRecorrido", $_REQUEST['contratoRecorrido']);
  $sql->bindParam(":contratoValor", $_REQUEST['contratoValor']);
  $sql->bindParam(":PagoForma", $_REQUEST['PagoForma']);
  $sql->bindParam(":contratoHoraSalida", $_REQUEST['contratoHoraSalida']);
  $sql->bindParam(":contratoPasajeros", $_REQUEST['contratoPasajeros']);
  $sql->bindParam(":contratoConvenio", $_REQUEST['contratoConvenio']);
  $sql->bindParam(":contratoConsorcio", $_REQUEST['contratoConsorcio']);
  $sql->bindParam(":contratoUnion", $_REQUEST['contratoUnion']);
  $sql->bindParam(":contratoCon", $_REQUEST['contratoCon']);
  $sql->bindParam(":contratoDiaInicio", $_REQUEST['contratoDiaInicio']);
  $sql->bindParam(":contratoMesInicio", $_REQUEST['contratoMesInicio']);
  $sql->bindParam(":contratoAnoInicio", $_REQUEST['contratoAnoInicio']);
  $sql->bindParam(":contratoDiaFin", $_REQUEST['contratoDiaFin']);
  $sql->bindParam(":contratoMesFin", $_REQUEST['contratoMesFin']);
  $sql->bindParam(":contratoAnoFin", $_REQUEST['contratoAnoFin']);
  $sql->bindParam(":contratoCarateVehiculo", $_REQUEST['contratoCarateVehiculo']);
  $sql->bindParam(":contratoPlaca", $_REQUEST['contratoPlaca']);
  $sql->bindParam(":contratoModelo", $_REQUEST['contratoModelo']);
  $sql->bindParam(":contratoMarca", $_REQUEST['contratoMarca']);
  $sql->bindParam(":contratoClase", $_REQUEST['contratoClase']);
  $sql->bindParam(":contratoNumeroInterno", $_REQUEST['contratoNumeroInterno']);
  $sql->bindParam(":contratoTarOperacion", $_REQUEST['contratoTarOperacion']);
  $sql->bindParam(":contratoConduc1Nombre", $_REQUEST['contratoConduc1Nombre']);
  $sql->bindParam(":contratoConduc1Cedula", $_REQUEST['contratoConduc1Cedula']);
  $sql->bindParam(":contratoConduc1Licencia", $_REQUEST['contratoConduc1Licencia']);
  $sql->bindParam(":contratoConduc1Vigencia", $_REQUEST['contratoConduc1Vigencia']);
  $sql->bindParam(":contratoConduc2Nombre", $_REQUEST['contratoConduc2Nombre']);
  $sql->bindParam(":contratoConduc2Cedula", $_REQUEST['contratoConduc2Cedula']);
  $sql->bindParam(":contratoConduc2Licencia", $_REQUEST['contratoConduc2Licencia']);
  $sql->bindParam(":contratoConduc2Vigencia", $_REQUEST['contratoConduc2Vigencia']);
  $sql->bindParam(":contratoConduc3Nombre", $_REQUEST['contratoConduc3Nombre']);
  $sql->bindParam(":contratoConduc3Cedula", $_REQUEST['contratoConduc3Cedula']);
  $sql->bindParam(":contratoConduc3Licencia", $_REQUEST['contratoConduc3Licencia']);
  $sql->bindParam(":contratoConduc3Vigencia", $_REQUEST['contratoConduc3Vigencia']);
  $sql->bindParam(":contratoRespoNombre", $_REQUEST['contratoRespoNombre']);
  $sql->bindParam(":contratoRespoCedula", $_REQUEST['contratoRespoCedula']);
  $sql->bindParam(":contratoRespoDireccion", $_REQUEST['contratoRespoDireccion']);
  $sql->bindParam(":contratoRespoTelefono", $_REQUEST['contratoRespoTelefono']);
  $sql->bindParam(":contratoObservaciones", $_REQUEST['contratoObservaciones']);
  $sql->bindParam(":contratoFechaRealizado", $fecha);
  $sql->bindParam(":usuarioCedula", $_REQUEST['usuarioCedula']);
  $sql->bindParam(":contratoValorLetra", $_REQUEST['contratoValorLetra']);
  $sql->execute();
  $contContrato = $sql->rowCount();
  if ($contContrato == 1) { ?>
    <script type="text/javascript">
      window.open('contrato_pdf.php', '_blank');
    </script>
  <?php }

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Administrador</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../assets/css/estilo.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/footable.standalone.css">
  <link rel="icon" type="image/png" href="../assets/images/logo-icon.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="author" content="cootranshuila">
  <title>Cootranshuila</title>
  <link rel="icon" type="image/png" href="assets/img/logo-icon.png">
  <!-- Icons-->
  <link href="assets/css/coreui-icons.min.css" rel="stylesheet">
  <link href="assets/css/flag-icon.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/css/simple-line-icons.css" rel="stylesheet">
  <!-- Main styles for this application-->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- Global site tag (gtag.js) - Google Analytics-->
  <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    // Shared ID
    gtag('config', 'UA-118965717-3');
    // Bootstrap ID
    gtag('config', 'UA-118965717-5');
  </script>
</head>
<body>


  <!-- MODAL PARA MOSTRAR -->

  <div class="modal fade" id="myModalCorreo" role="dialog">
    <div class="modal-dialog mw-100 w-50">
      <!-- Modal content-->
      <?php 

        $conexion = conectaDb();
        $sql = $conexion->prepare("select * from correo_contacto where num_correo = :i");
        $sql->bindParam(":i", $_REQUEST['ver']);
        $sql->execute();
        $resultado = $sql->fetchAll();
        foreach ($resultado as $row) {
          
       ?>
      <div class="modal-content">
        <div class="modal-header modal-header-pas" style="padding:40px 50px;">
          <h4 class="modal-title">CORREO No. <?php echo $_REQUEST['ver'] ?></h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered">
              <thead>
                <tr align="center">
                  <th colspan="5"></th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td colspan="5">
                    <div class="form-group">
                      <label for="nom_conductor" class="">Nombre del cliente </label>
                      <input type="text" class="form-control col-md-12" placeholder="Escriba el nombre" name="nom_conductor" id="nom_conductor" value="<?php echo $row['nombre_usu']; ?>" required>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td colspan="3">
                    <div class="form-group">
                      <label for="fecha_operativo" class="col-md">Telefono </label>
                      <input type="text" class="form-control" placeholder="Ponga la fecha" name="fecha_operativo" id="fecha_operativo" value="<?php echo $row['telefono_usu']; ?>" required>
                    </div>
                  </td>
                  <td colspan="2">
                    <div class="form-group">
                      <label for="hora_operativo" class="col-md">Fecha </label>
                      <input type="date" class="form-control" name="hora_operativo" id="hora_operativo" value="<?php echo $row['fecha_correo']; ?>" required>
                    </div>
                  </td>
                </tr>
                
                <tr>
                  <td colspan="5">
                    <div class="form-group">
                      <label for="nom_conductor" class="">Correo del cliente </label>
                      <input type="text" class="form-control col-md-12" placeholder="Escriba el nombre" name="nom_conductor" id="nom_conductor" value="<?php echo $row['correo_usu']; ?>" required>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td colspan="5">
                    <div class="form-group">
                      <label for="observaciones">Mensaje:</label>
                      <textarea class="form-control" placeholder="Escriba la observacion" rows="5" id="observaciones" name="observaciones" required><?php echo $row['mensaje_usu']; ?></textarea>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>

            <table class="table table-bordered">
              <thead>
                <tr align="center">
                  <th colspan="5">Respuesta</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td colspan="5">
                    <div class="form-group">
                      <label for="observaciones">Mensaje respuesta:</label>
                      <textarea class="form-control" placeholder="Escriba la observacion" rows="5" id="observaciones" name="observaciones" required><?php if (empty($row['respuesta'])) { echo "Aun no hay respuesta."; } else { echo $row['respuesta']; } ?></textarea>
                    </div>
                  </td>
                </tr>
                 <?php 
                if ($tipo == 'admin') { ?>
                <tr>
                  <td colspan="5">
                    <form action="enviar.php" class="form-inline">
                      <div class="form-group col-md-12">
                        <label for="respuesta" class="col-md-12">Asignar tarea:</label>
                          <select class="form-control col-md-9" <?php if (!empty($row['asignado'])) {echo "readonly";} ?> name="asigdep" required>
                            <option value="">Sin Asignar</option>
                            <option value="Sistemas" <?php if ($row['asignado'] == 'Sistemas') {echo "selected";} ?>>Sistemas</option>
                            <option value="Gefes Rodamiento" <?php if ($row['asignado'] == 'Gefes Rodamiento') {echo "selected";} ?>>Gefes Rodamiento</option>
                            <option value="Recursos Humanos" <?php if ($row['asignado'] == 'Recursos Humanos') {echo "selected";} ?>>Recursos Humanos</option>
                          </select>
                      
                        <input type="text" class="form-control col-md-1" name="id-asigco" value="<?php echo $row['num_correo']; ?>" style="visibility: hidden;">
                        <?php if (empty($row['asignado'])) { ?><button type="submit" name="btn-asignarco" class="btn btn-success" >Enviar</button> <?php } ?>
                      </div>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td colspan="5">
                    <form action="enviar.php" class="form-inline">
                      <label for="respuesta">Responder correo:</label>
                      <textarea type="text" class="form-control col-md-12" id="respuesta" name="respuesta" required <?php if (!empty($row['respuesta'])) {echo "readonly";} ?>><?php echo $row['respuesta']; ?></textarea>
                      <input type="text" class="form-control col-md-5" id="id-respuesta" name="id-respuesta" value="<?php echo $row['num_correo']; ?>" style="visibility: hidden;">
                      <?php if (empty($row['respuesta'])) { ?><button type="submit" id="btn-respuesta" name="btn-respuesta" class="btn btn-success mt-2" >Enviar</button> <?php } ?>
                    </form>
                  </td>
                </tr>
                   <?php 
                } else { ?>
                <td colspan="5">
                  <form action="enviar.php" class="form-inline">
                    <label for="respuesta">Responder correo:</label>
                    <textarea type="text" class="form-control col-md-12" id="respuesta" name="respuesta" required <?php if (!empty($row['respuesta'])) {echo "readonly";} ?>><?php echo $row['respuesta']; ?></textarea>
                    <input type="text" class="form-control col-md-5" id="id-respuesta" name="id-respuesta" value="<?php echo $row['num_correo']; ?>" style="visibility: hidden;">
                    <?php if (empty($row['respuesta'])) { ?><button type="submit" id="btn-respuesta" name="btn-respuesta" class="btn btn-success mt-2" >Enviar</button> <?php } ?>
                  </form>
                </td> <?php
                
                } ?>
                </tr>
              </tbody>

            </table>
        </div>
      </div>
      <?php } ?>
      
    </div>
  </div>


<div class="modal fade" id="myModalReclamo" role="dialog">
    <div class="modal-dialog mw-100 w-50">
      <!-- Modal content-->
      <?php 

        $conexion = conectaDb();
        $sql = $conexion->prepare("select * from reclamos where num_reclamo = :i");
        $sql->bindParam(":i", $_REQUEST['ver2']);
        $sql->execute();
        $resultado = $sql->fetchAll();
        foreach ($resultado as $row) {
          
       ?>
      <div class="modal-content">
        <div class="modal-header modal-header-pas" style="padding:40px 50px;">
          <h4 class="modal-title">RECLAMO No. <?php echo $_REQUEST['ver2'] ?></h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered">
              <thead>
                <tr align="center">
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td colspan="5">
                    <div class="form-group">
                      <label for="nom_conductor" class="">Nombre del cliente </label>
                      <input type="text" class="form-control col-md-12" placeholder="Escriba el nombre" name="nom_conductor" id="nom_conductor" value="<?php echo $row['nom_cli_re']; ?>" required>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td colspan="2">
                    <div class="form-group">
                      <label for="hora_operativo" class="col-md">Fecha </label>
                      <input type="date" class="form-control" name="hora_operativo" id="hora_operativo" value="<?php echo $row['fecha_reclamo']; ?>" required>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="fecha_operativo" class="col-md">Clasificacion </label>
                      <input type="text" class="form-control" placeholder="Ponga la fecha" name="fecha_operativo" id="fecha_operativo" value="<?php echo $row['clasificacion']; ?>" required>
                    </div>
                  </td>
                  <td colspan="2">
                    <div class="form-group">
                      <label for="hora_operativo" class="col-md">Telefono </label>
                      <input type="text" class="form-control" name="hora_operativo" id="hora_operativo" value="<?php echo $row['tel_cli_re']; ?>" required>
                    </div>
                  </td>
                </tr>
                
                <tr>
                  <td colspan="2">
                    <div class="form-group">
                      <label for="hora_operativo" class="col-md">Direccion </label>
                      <input type="text" class="form-control" name="hora_operativo" id="hora_operativo" value="<?php echo $row['dir_cli_re']; ?>" required>
                    </div>
                  </td>
                  <td colspan="3">
                    <div class="form-group">
                      <label for="nom_conductor" class="">Correo del cliente </label>
                      <input type="text" class="form-control col-md-12" placeholder="Escriba el nombre" name="nom_conductor" id="nom_conductor" value="<?php echo $row['correo_cli_re']; ?>" required>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td colspan="5">
                    <div class="form-group">
                      <label for="observaciones">Mensaje:</label>
                      <textarea class="form-control" placeholder="Escriba la observacion" rows="5" id="observaciones" name="observaciones" required><?php echo $row['mensaje_reclamo']; ?></textarea>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>

            <table class="table table-bordered">
              <thead>
                <tr align="center">
                  <th colspan="5">Respuesta</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td colspan="5">
                    <div class="form-group">
                      <label for="observaciones">Responsable:</label>
                      <input type="text" class="form-control col-md-12" placeholder="Escriba el nombre" name="nom_conductor" id="nom_conductor" value="<?php if (empty($row['responsable_reclamo'])) { echo "Aun no hay responsable."; } else { echo $row['responsable_reclamo']; } ?>" required>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="5">
                    <div class="form-group">
                      <label for="observaciones">Mensaje respuesta:</label>
                      <textarea class="form-control" placeholder="Escriba la observacion" rows="5" id="observaciones" name="observaciones" required><?php if (empty($row['respuesta_reclamo'])) { echo "Aun no hay respuesta."; } else { echo $row['respuesta_reclamo']; } ?></textarea>
                    </div>
                  </td>
                </tr>
                <tr>
                  <?php 
                  if ($tipo == 'admin') { ?>
              
                  <td colspan="5">
                    <form action="enviar.php" class="form-inline">
                        <label for="respuesta" class="col-md-12">Asignar tarea:</label>
                        <div class="input-group col-md-12">
                          <select class="form-control col-md-9" <?php if (!empty($row['asignado_reclamo'])) {echo "readonly";} ?> name="asigdep" required>
                            <option value="">Sin Asignar</option>
                            <option value="Sistemas" <?php if ($row['asignado_reclamo'] == 'Sistemas') {echo "selected";} ?>>Sistemas</option>
                            <option value="Gefes Rodamiento" <?php if ($row['asignado_reclamo'] == 'Gefes Rodamiento') {echo "selected";} ?>>Gefes Rodamiento</option>
                            <option value="Recursos Humanos" <?php if ($row['asignado_reclamo'] == 'Recursos Humanos') {echo "selected";} ?>>Recursos Humanos</option>
                          </select>
                      
                        <input type="text" class="col-md-1 form-control" name="id-asigre" value="<?php echo $row['num_reclamo']; ?>" style="visibility: hidden;">
                        <?php if (empty($row['asignado_reclamo'])) { ?><button type="submit" name="btn-asignarre" class="btn btn-success" >Enviar</button> <?php } ?>
                      </div>
                    </form>
                  </td> 
                </tr>
                <tr>
                  <td colspan="5">
                    <form action="enviar.php" class="form-inline">
                      <label for="respuesta_reclamo" class="col-md-12">Responder reclamo:</label>
                      <textarea type="text" class="form-control col-md-12" id="respuesta_reclamo" name="respuesta_reclamo" required <?php if (!empty($row['respuesta_reclamo'])) {echo "readonly";} ?>><?php echo $row['respuesta_reclamo']; ?></textarea>
                      <input type="text" class="col-md-5 form-control" id="id-respuesta" name="id-respuesta" value="<?php echo $row['num_reclamo']; ?>" style="visibility: hidden;">
                      <?php if (empty($row['respuesta_reclamo'])) { ?>
                      <button type="submit" id="btn-res" name="btn-res" class="btn btn-success mt-2" >Enviar</button> <?php } ?>
                    </form>
                  </td>  
                </tr><?php
                } else { ?>
                <tr>
                  <td colspan="5">
                    <form action="enviar.php" class="form-inline">
                      <label for="respuesta_reclamo" class="col-md-12">Responder reclamo:</label>
                      <textarea type="text" class="form-control col-md-12" id="respuesta_reclamo" name="respuesta_reclamo" required <?php if (!empty($row['respuesta_reclamo'])) {echo "readonly";} ?>><?php echo $row['respuesta_reclamo']; ?></textarea>
                      <input type="text" class="col-md-5 form-control" id="id-respuesta" name="id-respuesta" value="<?php echo $row['num_reclamo']; ?>" style="visibility: hidden;">
                      <?php if (empty($row['respuesta_reclamo'])) { ?>
                      <button type="submit" id="btn-res" name="btn-res" class="btn btn-success mt-2" >Enviar</button> <?php } ?>
                    </form>
                  </td>  
                </tr>
                <?php } ?>
              </tbody>

            </table>
        </div>
      </div>
      <?php } ?>
      
  </div>
</div>

<!-- FIN MODAL PARA MOSTAR -->

  <div class="modal fade" id="myModalEditar" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <h4 align="center" class="h4-modal"><span class="glyphicon glyphicon-exclamation-sign"></span> ERROR</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <h2 align="center">Este tipo de usuario no puede editar.</h2>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal" align="center"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>

<?php  
if (!empty($_SESSION['user'])) { ?>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <h4 align="center" class="h4-modal"><span class="glyphicon glyphicon-exclamation-sign"></span> SEGURO DESEA ELIMINAR CORREO</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="padding:40px 50px;">

        <?php if (isset($_REQUEST['correo'])) { ?>
          <form role="form">
            <table class="table tablef table-hover">
              <thead>
                <tr>
                  <th>N° correo</th>
                  <th>Nombre cliente</th>
                  <th>Telefono cliente</th>
                  <th>Correo Cliente</th>
                  <th>Fecha</th>

                </tr>
              </thead>
              <tbody>
                <?php
                  $sql = $conexion->prepare("select * from correo_contacto where num_correo = :id");
                  $sql->bindParam(":id", $edit);
                  $sql->execute();
                  $resultado = $sql->fetchAll();
                  foreach ($resultado as $row) {
                    echo "<tr>";
                    echo "<td>".$row['num_correo']."</td>";
                    echo "<td>".$row['nombre_usu']."</td>";
                    echo "<td>".$row['telefono_usu']."</td>";
                    echo "<td>".$row['correo_usu']."</td>";
                    echo "<td>".$row['fecha_correo']."</td>";
             
                  }
                  echo "</tr>";
                ?>
              </tbody>
            </table>
          </form>
        <?php } 

        if (isset($_REQUEST['reclamo'])) { ?>
          <form role="form">
            <table class="table tablef table-hover">
              <thead>
                <tr>
                  <th>N° reclamo</th>
                  <th>Fecha</th>
                  <th>Clasificacion</th>
                  <th>Nombre</th>
                  <th>Telefono</th>

                </tr>
              </thead>
              <tbody>
                <?php
                  $sql = $conexion->prepare("select * from reclamos where num_reclamo = :id");
                  $sql->bindParam(":id", $edit);
                  $sql->execute();
                  $resultado = $sql->fetchAll();
                  foreach ($resultado as $row) {
                    echo "<tr>";
                    echo "<td>".$row['num_reclamo']."</td>";
                    echo "<td>".$row['fecha_reclamo']."</td>";
                    echo "<td>".$row['clasificacion']."</td>";
                    echo "<td>".$row['nom_cli_re']."</td>";
                    echo "<td>".$row['tel_cli_re']."</td>";
             
                  }
                  echo "</tr>";
                ?>
              </tbody>
            </table>
          </form>
        <?php } ?>
          
        </div>
        <div class="modal-footer">
        	<a href="Administrador.php?eli=<?php echo $edit ?>&eliminar=si"><button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-warning-sign"></span> ELIMINAR</button></a>
            <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal" align="center"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        </div>
      </div>
      
    </div>
  </div>
<?php } 

if (empty($_SESSION['user'])) { ?>
  <div class="modal fade" id="myModalError2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <h4 align="center" class="h4-modal"><span class="glyphicon glyphicon-exclamation-sign"></span> ERROR</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <h2 align="center">Debe iniciar sesion correctamente</h2>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal" align="center"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
<?php } 

if (empty($_SESSION['user'])) { ?>
<div class="modal fade" id="myModalError3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <h4 align="center" class="h4-modal"><span class="glyphicon glyphicon-exclamation-sign"></span> ERROR</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <h2 align="center">El usuario esta inactivo</h2>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal" align="center"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
<?php }

if (empty($_SESSION['user'])) { ?>
<div class="modal fade" id="myModalError1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <h4 align="center" class="h4-modal"><span class="glyphicon glyphicon-exclamation-sign"></span> ERROR</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <h2 align="center">Usuario o contraseña incorrectos</h2>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal" align="center"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
<?php } ?>
  <div class="modal fade" id="myModalPas" role="dialog">
    <div class="modal-dialog mw-100 w-50">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal-header-pas">
          <h4 class="modal-title">CAMBIAR CONTRASEÑA</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="Administrador.php" method="POST">
    		    <div class="form-group">
    		      <label class="control-label col-md-12" for="apwd">Antigua contraseña:</label>
    		      <div class="col-md-12">          
    		        <input type="password" class="form-control" id="apwd" placeholder="Escriba su antigua contraseña" name="apwd" required>
    		      </div>
    		    </div>
    		    <div class="form-group">
    		      <label class="control-label col-md-12" for="npwd">Nueva contraseña:</label>
    		      <div class="col-md-12">          
    		        <input type="password" class="form-control" id="npwd" placeholder="Escriba su nueva contraseña" name="npwd" required>
    		      </div>
    		    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
		      <button type="submit" class="btn btn-success" id="btn-cambiar" name="btn-cambiar">Cambiar contraseña</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>

<!-- _____________________________ MODAL MOSTRAR CONTRATO_____________________________ -->

  <div class="modal fade" id="myModalCon" role="dialog">
    <div class="modal-dialog mw-100 w-75">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal-header-pas">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="container">

          <?php 
          $sql = $conexion->prepare("SELECT * FROM contrato WHERE contratoCodigo = :id");
          $sql->bindParam(":id", $_REQUEST['editCon']);
          $sql->execute();
          $resultado = $sql->fetchAll();

          foreach ($resultado as $key) { 

            $sqlU = $conexion->prepare("SELECT * FROM usuarios WHERE id_usuario = :id");
            $sqlU->bindParam(":id", $key['usuarioCedula']);
            $sqlU->execute();
            $resultadoU = $sqlU->fetchAll();

            foreach ($resultadoU as $row) {
              $nomUsu = $row['nombre_usuario'];
            }
            ?>
            <table class="table table-bordered">

              <thead>
                <tr align="center">
                  <th colspan="6">CONTRATO DEL SERVICIO PÚBLICO DE TRANSPORTE TERRESTRE AUTOMOTOR ESPECIAL</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td colspan="4">
                    <div class="form-group">
                      <label for="txtcontacto" class="col-md-12">Contratado por </label>
                      <input type="text" value="<?php echo $nomUsu; ?>" class="form-control col-md-12" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoNumeroUno" class="col-md-12">No.</label>
                      <input type="number" class="form-control col-md-12" value="441025001" readonly name="contratoNumeroUno" id="contratoNumeroUno">
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoAno" class="col-md-12">Año </label>
                      <input type="text" class="form-control col-md-12" id="contratoAno" name="contratoAno" value="2018" readonly="">
                    </div>
                  </td>
                </tr>

                <tr>
                  <td colspan="5">
                    <div class="form-group">
                      <label for="contratoEmpresa" class="col-md-12">Empresa transportadora </label>
                      <input type="text" class="form-control col-md-12" value="COOPERATIVA DE TRANSPORTADORES DEL HUILA LTDA" name="contratoEmpresa" id="contratoEmpresa" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoNit1" class="col-md-12">Nit </label>
                      <input type="text" class="form-control col-md-12" value="891100299 - 7" name="contratoNit1" id="contratoNit1" readonly>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td colspan="5">
                    <div class="form-group">
                      <label for="contratoContratante" class="col-md-12">Contratante </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoContratante'] ?>" name="contratoContratante" id="contratoContratante" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoNit3" class="col-md-12">Nit </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoNit3']." - ".$key['contratoNit4']; ?>" name="contratoNit3" id="contratoNit3" readonly>
                    </div>
                  </td>
                </tr>

              </tbody>
              <thead>
                <tr align="center">
                  <th colspan="6"></th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td colspan="6">
                    <div class="form-group">
                      <label for="contratoObjetivo" class="col-md-12">Objeto contrato:</label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoObjetivo']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td colspan="4">
                    <div class="form-group">
                      <label for="contratoOrigen" class="col-md-12">Origen </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoOrigen']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="2">
                    <div class="form-group">
                      <label for="contratoDestino" class="col-md-12">Destino </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoDestino']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                </tr>

              </tbody>
              <thead>
                <tr align="center">
                  <th colspan="6"></th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td colspan="6">
                    <div class="form-group">
                      <label for="contratoRecorrido" class="col-md-12">Recorrido:</label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoRecorrido']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td colspan="4">
                    <div class="form-group">
                      <label for="PagoForma" class="col-md-12">Forma pago </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['PagoForma']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="2">
                    <div class="form-group">
                      <label for="contratoValor" class="col-md-12">Valor</label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoValor']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                </tr>
                
                <tr>
                  <td colspan="2">
                    <div class="form-group">
                      <label for="contratoHoraSalida" class="col-md-12">Hora salida </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoHoraSalida']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="2">
                    <div class="form-group">
                      <label for="contratoPasajeros" class="col-md-12">Numero de pasajeros </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoPasajeros']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="2">
                    <div class="form-group">
                      <label for="contratoConvenio" class="col-md-12">Convenio</label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoConvenio']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td colspan="2">
                    <div class="form-group">
                      <label for="contratoConsorcio" class="col-md-12">Consorcio </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoConsorcio']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="3">
                    <div class="form-group">
                      <label for="contratoUnion" class="col-md-12">Unidad temporal </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoUnion']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoCon" class="col-md-12">Con</label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoCon']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                </tr>

              </tbody>
              <thead>
                <tr align="center">
                  <th colspan="6">Vigencia del contrato</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td colspan="3">
                    <div class="form-group">
                      <label for="" class="col-md-12">Fecha inicio </label>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <input type="number" class="form-control col-md-12" value="<?php echo $key['contratoDiaInicio'] ?>" name="contratoDiaInicio" id="contratoDiaInicio" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoMesInicio'] ?>" name="contratoMesInicio" id="contratoMesInicio" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <input type="number" class="form-control col-md-12" value="<?php echo $key['contratoAnoInicio'] ?>" name="contratoAnoInicio" id="contratoAnoInicio" readonly>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td colspan="3">
                    <div class="form-group">
                      <label for="" class="col-md-12">Fecha fin </label>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <input type="number" class="form-control col-md-12" value="<?php echo $key['contratoDiaFin'] ?>" name="contratoDiaFin" id="contratoDiaFin" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoMesFin'] ?>" name="contratoMesFin" id="contratoMesFin" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <input type="number" class="form-control col-md-12" value="<?php echo $key['contratoAnoFin'] ?>" name="contratoAnoFin" id="contratoAnoFin" readonly>
                    </div>
                  </td>
                </tr>

              </tbody>
              <thead>
                <tr align="center">
                  <th colspan="6">Características y datos del vehículo</th>
                </tr>
              </thead>
              <tbody>
              
                <tr>
                  <td colspan="6">
                    <div class="form-group">
                      <label for="contratoCarateVehiculo" class="col-md-12">Caracteristicas</label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoCarateVehiculo']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td colspan="3">
                    <div class="form-group">
                      <label for="contratoPlaca" class="col-md-12">Placa </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoPlaca']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="2">
                    <div class="form-group">
                      <label for="contratoModelo" class="col-md-12">Modelo </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoModelo']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoMarca" class="col-md-12">Marca</label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoMarca']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td colspan="3">
                    <div class="form-group">
                      <label for="contratoClase" class="col-md-12">Clase </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoClase']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="2">
                    <div class="form-group">
                      <label for="contratoNumeroInterno" class="col-md-12">Numero interno </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoNumeroInterno']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoTarOperacion" class="col-md-12">Numero tarjeta operacion</label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoTarOperacion']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                </tr>

              </tbody>
              <thead>
                <tr align="center">
                  <th colspan="6">Datos primer conductor</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td colspan="3">
                    <div class="form-group">
                      <label for="contratoConduc1Nombre" class="col-md-12">Nombre completo </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoConduc1Nombre']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoConduc1Cedula" class="col-md-12">Cedula </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoConduc1Cedula']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoConduc1Licencia" class="col-md-12">N° Licencia</label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoConduc1Licencia']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoConduc1Vigencia" class="col-md-12">Vigencia</label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoConduc1Vigencia']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                </tr>
                
              </tbody>
              <thead>
                <tr align="center">
                  <th colspan="6">Datos segundo conductor</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td colspan="3">
                    <div class="form-group">
                      <label for="contratoConduc1Nombre" class="col-md-12">Nombre completo </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoConduc2Nombre']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoConduc1Cedula" class="col-md-12">Cedula </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoConduc2Cedula']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoConduc1Licencia" class="col-md-12">N° Licencia</label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoConduc2Licencia']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoConduc1Vigencia" class="col-md-12">Vigencia</label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoConduc2Vigencia']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                </tr>

              </tbody>
              <thead>
                <tr align="center">
                  <th colspan="6">Datos tercer conductor</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td colspan="3">
                    <div class="form-group">
                      <label for="contratoConduc1Nombre" class="col-md-12">Nombre completo </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoConduc3Nombre']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoConduc1Cedula" class="col-md-12">Cedula </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoConduc3Cedula']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoConduc1Licencia" class="col-md-12">N° Licencia</label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoConduc3Licencia']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoConduc1Vigencia" class="col-md-12">Vigencia</label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoConduc3Vigencia']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                </tr>

              </tbody>
              <thead>
                <tr align="center">
                  <th colspan="6">Responsable del contratante</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td colspan="3">
                    <div class="form-group">
                      <label for="contratoRespoNombre" class="col-md-12">Nombre completo </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoRespoNombre']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoRespoCedula" class="col-md-12">Cedula </label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoRespoCedula']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoRespoTelefono" class="col-md-12">Telefono</label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoRespoTelefono']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                  <td colspan="1">
                    <div class="form-group">
                      <label for="contratoRespoDireccion" class="col-md-12">Direccion</label>
                      <input type="text" class="form-control col-md-12" value="<?php echo $key['contratoRespoDireccion']; ?>" name="contratoObjetivo" id="contratoObjetivo" readonly>
                    </div>
                  </td>
                </tr>

              </tbody>
              <thead>
                <tr align="center">
                  <th colspan="6"></th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td colspan="6">
                    <div class="form-group">
                      <label for="contratoObservaciones" class="col-md-12">Observaciones:</label>
                      <textarea class="form-control col-md-12" id="contratoObservaciones" name="contratoObservaciones" readonly><?php echo $key['contratoObservaciones']; ?></textarea>
                    </div>
                  </td>
                </tr>

              </tbody>
            </table>
          <?php } ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
      
    </div>
 </div>

<!-- _____________________________ MODAL MOSTRAR CONTRATO_____________________________ -->


<!-- ============================ FIN DE MODALES ====================== -->

<?php 
$titulo = "Inicio";
if (isset($_SESSION['user'])) {
  if ($rol == "Correos") { $titulo = "Correos"; }
  if ($rol == "Reclamos") { $titulo = "Reclamos"; }
  if ($rol == "Especial") { $titulo = "Especial"; }
  if ($rol == "PQR") { $titulo = "PQR"; }
  if ($rol == "Todos") { $titulo = "Administrador"; }
}
?>

<div class="jumbotron">
  <h2 align="center"><?php echo $titulo; ?></h2>
  <?php if (isset($_SESSION['user'])) { ?>
  <div class="container">
    <div class="float-left">
      <form id="buscador" name="buscador" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Buscar" name="buscar" id="buscar" autocomplete="off" required>
          <div class="input-group-btn">
            <button class="btn btn-default" name="btn-buscar" id="btn-buscar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
    <div class="dropdown float-right">
        <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $_SESSION['user']; ?> </button>
        <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-header">Configuraciones</div>
        <a class="dropdown-item"  href="Administrador.php?c=1">Cambiar contraseña</a>
        <?php 
            $sql = $conexion->prepare("select tipo_usuario from usuarios where num_usuario = :i");
            $sql->bindParam(":i", $_SESSION['n-user']);
            $sql->execute();
            $resultado = $sql->fetchAll();
            foreach ($resultado as $row) {
              if ($row['tipo_usuario'] == 'admin') { ?>
          <a class="dropdown-item" href="agregar_usuario.php">Agregar usuarios</a>
          <a class="dropdown-item" href="Admin.php">Administrador</a>
        <?php } }?>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="Administrador.php?salir=si">Salir</a> 
        </div>
    </div>
  </div>
  <?php } ?>
</div>
<br><br>
<?php 

if (!isset($_SESSION['user'])) {
	?>

	<!-- <div class="wrapper fadeInDown">
	  <div id="formContent">

	    <form name="form-login" action="ValidarLogin.php" method="POST">
	      <input type="text" id="id_usu" class="fadeIn second login" name="id_usu" autocomplete="off" placeholder="Usuario">
	      <input type="password" id="pass" class="fadeIn third login" name="pass" autocomplete="off" placeholder="Contraseña">
	      <input type="submit" class="btn-lg btn-success fadeIn fourth login" value="Ingresar">
	    </form>

	  </div>
	</div> -->

  <div class="app flex-row align-items-center" style="margin-top: -200px;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1 class="active h2login">Inicia sesion</h1>
                <p class="text-muted">Ingresa con tu cuenta</p>
                <div class="fadeIn first">
                  <img src="../assets/images/user.png" width="90" style="float: right; margin-top: -100px;" alt="User Icon" />
                </div>
                <form name="form-login" action="ValidarLogin.php" method="POST">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-user"></i>
                      </span>
                    </div>
                    <input id="id_usu" name="id_usu" autocomplete="off" class="form-control" type="text" placeholder="Usuario">
                  </div>
                  <div class="input-group mb-4">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-lock"></i>
                      </span>
                    </div>
                    <input id="pass" name="pass" autocomplete="off" class="form-control" type="password" placeholder="Contraseña">
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-primary px-4" type="submit">Ingresar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

	<?php

} 
else {
	if (empty($_SESSION['user'])) {
	  header("location: Administrador.php?x=2");
	}
 ?>
<div class="container">

  <div class="page-header page-header-index">
	 <h1>Panel de administracion | <small> <?php echo date("d / m / y  | ");?>
	 <div class="reloj">
        <span id="pHoras"></span><span> : </span>
        <span id="pMinutos"></span><span> : </span>
        <span id="pSegundos"></span>
    </div>
    </small></h1>
  </div>
  <br><br>

  <?php 

  if (isset($contContrato) && $contContrato == 1) {
      ?>
      <div class="row justify-content-center text-center"><div class="alert alert-success col-md-6">Contrato creado <strong>correctamente.</strong></div></div> <?php
    }

  if (isset($newRuta) && $newRuta == 1) { ?>
      <div class="row justify-content-center text-center"><div class="alert alert-success col-md-6">Ruta creada <strong>correctamente.</strong></div></div>
    <?php }

  if (isset($_REQUEST['tarea']) && $_REQUEST['tarea'] == 1) {

    ?>
    <div class="row justify-content-center text-center"><div class="alert alert-success col-lg-6 col-lg-offset-3">Tarea asignada <strong>correctamente.</strong></div></div>

    <?php
  }

  if (isset($_REQUEST['si']) && $_REQUEST['si'] == 1) {

  	?>
  	<div class="row justify-content-center text-center"><div class="alert alert-success col-lg-6 col-lg-offset-3">Reporte registrado <strong>correctamente.</strong></div></div>

  	<?php
  }
  if (isset($_REQUEST['si']) && $_REQUEST['si'] == 2) {
  	?>
  	<div class="row justify-content-center text-center"><div class="alert alert-success col-lg-6 col-lg-offset-3">Usuario creado <strong>correctamente.</strong></div></div>

  	<?php
  }
  if (isset($_REQUEST['res-correo']) && $_REQUEST['res-correo'] == 'si') {
    ?>
    <div class="row justify-content-center text-center"><div class="alert alert-success col-lg-6 col-lg-offset-3">Correo respondido <strong>correctamente.</strong></div></div>

    <?php
  }
  if (isset($_REQUEST['res-reclamo']) && $_REQUEST['res-reclamo'] == 'si') {
    ?>
    <div class="row justify-content-center text-center"><div class="alert alert-success col-lg-6 col-lg-offset-3">Reclamo respondido <strong>correctamente.</strong></div></div>

    <?php
  }

  if (isset($_REQUEST['eliminar']) && $_REQUEST['eliminar'] == 'si') {
  	?>
  	<div class="row justify-content-center text-center"><div class="alert alert-danger col-lg-6 col-lg-offset-3">No se puede <strong>eliminar.</strong></div></div>
  	
  	<?php
  }

  if (isset($_REQUEST['si_agg']) && $_REQUEST['si_agg'] == 1) {
  	?>
  	<div class="row justify-content-center text-center"><div class="alert alert-success col-lg-6 col-lg-offset-3">Reporte editado <strong>correctamente.</strong></div></div>
  	
  	<?php
  }
  if (isset($cambiar_pw) && $cambiar_pw == 1) {
  	?>
  	<div class="row justify-content-center text-center"><div class="alert alert-success col-lg-6 col-lg-offset-3">Contraseña cambiada <strong>correctamente.</strong></div></div>
  	
  	<?php
  }
  if (isset($cambiar_pw) && $cambiar_pw == 2) {
  	?>
  	<div class="row justify-content-center text-center"><div class="alert alert-danger col-lg-6 col-lg-offset-3">La contraseña <strong>NO</strong> se cambio</div></div>
  	
  	<?php
  }
  if (isset($cambiar_pw) && $cambiar_pw == 0) {
  	?>
  	<div class="row justify-content-center text-center"><div class="alert alert-danger col-lg-6 col-lg-offset-3">Contraseña anterior <strong>incorrecta.</strong></div></div>
  	
  	<?php
  }
  ?>

  <ul class="nav nav-tabs">
    <?php if ($rol == "Todos" or $rol == "Correos" or $rol == "PQR"){ ?>
      <li class="nav-item"><a data-toggle="tab" class="active nav-link" href="#home">Correos</a></li>
    <?php } 
    if ($rol == "Todos" or $rol == "Reclamos" or $rol == "PQR"){ ?>
      <li class="nav-item" <?php if ($rol == "Reclamos"){ ?> class="active" <?php } ?>><a class="nav-link" data-toggle="tab" href="#menu1">Reclamos</a></li>
    <?php }
    if ($rol == "Todos" or $rol == "Especial"){ ?>
      <li class="nav-item" <?php if ($rol == "Especial"){ ?> class="active" <?php } ?>><a class="nav-link" data-toggle="tab" href="#menu2">Especial</a></li>
    <?php } ?>
  </ul><br>

  <div class="tab-content">
  
  <?php if ($rol != "Especial") { ?>

  <!--   CORREOS   -->

  <?php if ($rol == "Correos" or $rol == "Todos" or $rol == "PQR"){ ?>

  <div id="home" <?php if ($rol == "Correos"){ ?> class="active" <?php } ?> class="tab-pane active">
  <table class="table tablef table-hover" data-paging="true" data-sorting="true" data-show-toggle="false" >
    <thead>
      <tr>
        <th data-breakpoints="xs">N°</th>
        <th width="200px">Nombre cliente</th>
        <th>Telefono cliente</th>
        <th width="230px">Correo Cliente</th>
        <th width="200px">Mensaje</th>
        <th>Fecha</th>
        <th></th>

      </tr>
    </thead>
    <tbody>
      <?php

      	if (isset($_REQUEST['btn-buscar'])) {
      		$busqueda = trim($_REQUEST['buscar']);

          if ($busqueda > 2000) {
            $bus = "fecha_correo LIKE  '".$busqueda."%'";
          } else{
            $bus = "fecha_correo LIKE  '".$busqueda."'";
          }

      		if (empty($busqueda)){
    				$texto = 'Búsqueda sin resultados';
    				echo $texto;
    			}

			    else{
  
            if ($tipo == 'admin') {
              $query = "select * from correo_contacto where (num_correo LIKE  '".$busqueda."' or nombre_usu LIKE  '%".$busqueda."%' or telefono_usu LIKE  '".$busqueda."' or correo_usu LIKE  '".$busqueda."' or $bus) and respuesta = '' order by num_correo desc";
            } else {
              $query = "select * from correo_contacto where (num_correo LIKE  '".$busqueda."' or nombre_usu LIKE  '%".$busqueda."%' or telefono_usu LIKE  '".$busqueda."' or correo_usu LIKE  '".$busqueda."' or $bus) and asignado = '" .$depa."' and respuesta = '' order by num_correo desc";
            }
      	  }
          $sql = $conexion->prepare($query);
          $sql->execute();
          $con = $sql->rowCount();
          $resultado = $sql->fetchAll();

	          if ($con == 0) {
	          	echo "<tr>";

	        	  echo "</tr>";
	        	  ?></tbody></table><div class="sin_reportes" align="center">No se encontraron reportes</div><?php
	          }
	        foreach ($resultado as $row) {
	        	
	          echo "<tr>"; 
    
            $puntos = NULL;
            if (strlen($row['mensaje_usu']) > 40) {
              $puntos = "...";
            }
            if (strlen($row['nombre_usu']) > 20) {
              $puntos = "...";
            }
            if (strlen($row['correo_usu']) > 20) {
              $puntos = "...";
            }
	          if ($con == 0) {
	          	echo $con;
	          	?><td class="sin_reportes">No se encontraron reportes</td><?php
	        	echo "</tr>";
	          }
	          echo "<td>".$row['num_correo']."</td>";
            echo "<td>".substr($row['nombre_usu'], 0, 20).$puntos."</td>";
            echo "<td>".$row['telefono_usu']."</td>";
            echo "<td>".substr($row['correo_usu'], 0, 20).$puntos."</td>";
            echo "<td>".substr($row['mensaje_usu'], 0, 40).$puntos."</td>";
            echo "<td>".$row['fecha_correo']."</td>";
            $id = $row['num_correo'];
	          
	      ?>
	      <td>
          <a href="Administrador.php?ver=<?php echo $row['num_correo']; ?>"><button type="button" class="btn btn-info" value="Editar"><i class="far fa-eye"></i></button></a>
          <button type="button" data-toggle="modal" data-target="#myModalEditar" class="btn btn-warning" value="Editar"><i class="fas fa-pencil-alt"></i></button>
          <a href="Administrador.php?edit=<?php echo $row['num_correo']; ?>&correo"><button type="button" class="btn btn-danger" value="Eliminar" id="myBtn"><i class="fas fa-trash-alt"></i></button></a>
        </td>
	      <?php
	        
	        echo "</tr>";
	        
	    }
    }
 
      if (!isset($_REQUEST['btn-buscar'])) {
        if ($tipo == 'admin') {
          $query = "select * from correo_contacto where respuesta = '' order by num_correo desc";
        } else {
          $query = "select * from correo_contacto where asignado = '".$depa."' and respuesta = '' order by num_correo desc";
        }

        $sql = $conexion->prepare($query);
        $sql->execute();
        $resultado = $sql->fetchAll();
        foreach ($resultado as $row) {
            
          $puntos = NULL;
          if (strlen($row['mensaje_usu']) > 40) {
            $puntos = "...";
          }
          if (strlen($row['nombre_usu']) > 20) {
            $puntos = "...";
          }
          if (strlen($row['correo_usu']) > 20) {
            $puntos = "...";
          }
          echo "<tr>";
          echo "<td>".$row['num_correo']."</td>";
          echo "<td>".substr($row['nombre_usu'], 0, 20).$puntos."</td>";
          echo "<td>".$row['telefono_usu']."</td>";
          echo "<td>".substr($row['correo_usu'], 0, 20).$puntos."</td>";
          echo "<td>".substr($row['mensaje_usu'], 0, 40).$puntos."</td>";
          echo "<td>".$row['fecha_correo']."</td>";
          $id = $row['num_correo'];
      ?>
      <td>
        <a href="Administrador.php?ver=<?php echo $row['num_correo']; ?>"><button type="button" class="btn btn-info" value="Editar"><i class="far fa-eye"></i></button></a>
        <button type="button" data-toggle="modal" data-target="#myModalEditar" class="btn btn-warning" value="Editar"><i class="fas fa-pencil-alt"></i></button>
        <a href="Administrador.php?edit=<?php echo $row['num_correo']; ?>&correo"><button type="button" class="btn btn-danger" value="Eliminar" id="myBtn"><i class="fas fa-trash-alt"></i></button></a>
      </td>
      <?php
        }
        echo "</tr>";
      } ?>
    </tbody>
  </table>
  </div>
  <?php } ?>


  <!--   RECLAMOS   -->

  <?php if ($rol == "Reclamos" or $rol == "Todos" or $rol == "PQR"){  ?>

  <div id="menu1" <?php if ($rol == "Reclamos"){ ?> class="active" <?php } ?> class="tab-pane fade">
    <table class="table tablef table-hover table-reportes" data-paging="true" data-sorting="true" data-show-toggle="false" >
    <thead>
      <tr>
        <th data-breakpoints="xs">N°</th>
        <th>Fecha</th>
        <th>Clasificacion</th>
        <th style="width: 180px;">Nombre</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th style="width: 200px;">Mensaje</th>
        <th></th>

      </tr>
    </thead>
    <tbody>
      <?php

        if (isset($_REQUEST['btn-buscar'])) {
          $busqueda = trim($_REQUEST['buscar']);
          if (empty($busqueda)){
            $texto = 'Búsqueda sin resultados';
            echo $texto;
          }
        else{

          if ($busqueda > 2000) {
            $bus = "fecha_reclamo LIKE  '".$busqueda."%'";
          } else{
            $bus = "fecha_reclamo LIKE  '".$busqueda."'";
          }
          if ($tipo == "admin") {
            $query = "select * from reclamos where (num_reclamo LIKE  '".$busqueda."' or $bus or clasificacion LIKE  '".$busqueda."' or nom_cli_re LIKE  '%".$busqueda."%' order) and respuesta_reclamo = '' by num_reclamo desc";
          } else {
            $query = "select * from reclamos where (num_reclamo LIKE  '".$busqueda."' or $bus or clasificacion LIKE  '".$busqueda."' or nom_cli_re LIKE  '%".$busqueda."%') and asignado_reclamo = '".$depa."' and respuesta_reclamo = '' order by num_reclamo desc";
          }
          
          $sqlRe = $conexion->prepare($query);
          $sqlRe->execute();
          $con = $sqlRe->rowCount();
          $resultadoRe = $sqlRe->fetchAll();

            if ($con == 0) {
              echo "<tr>";
              
              echo "</tr>";
            ?></tbody></table><div class="sin_reportes" align="center">No se encontraron reclamos</div><?php
            }
          foreach ($resultadoRe as $row) {
            
            echo "<tr>"; 
            

            $puntos = NULL;
            if (strlen($row['mensaje_reclamo']) > 40) {
              $puntos = "...";
            }
            if (strlen($row['nom_cli_re']) > 20) {
              $puntos = "...";
            }
            if (strlen($row['correo_cli_re']) > 20) {
              $puntos = "...";
            }
            if ($con == 0) {
              echo $con;
              ?><td class="sin_reportes">No se encontraron reclamos</td><?php
            echo "</tr>";
            }
            echo "<td>".$row['num_reclamo']."</td>";
            echo "<td>".$row['fecha_reclamo']."</td>";
            echo "<td>".$row['clasificacion']."</td>";
            echo "<td>".substr($row['nom_cli_re'], 0, 20).$puntos."</td>";
            echo "<td>".$row['tel_cli_re']."</td>";
            echo "<td>".substr($row['correo_cli_re'], 0, 20).$puntos."</td>";
            echo "<td>".substr($row['mensaje_reclamo'], 0, 40).$puntos."</td>";
            $id = $row['num_reclamo'];
        ?>
        <td>
        <a href="Administrador.php?ver2=<?php echo $row['num_reclamo']; ?>"><button type="button" class="btn btn-info" value="Editar"><i class="far fa-eye"></i></button></a>
        <a href="reclamo_pdf.php?edit=<?php echo $row['num_reclamo']; ?>" target="_blank"><button type="button" class="btn btn-success" value="Descargar" id="myBtn"><i class="fas fa-file-pdf"></i></button></a>
      </td>
        <?php
          
          echo "</tr>";
          
           }
         }
      }
 
        else{

        if ($tipo == 'admin') {
          $query = "select * from reclamos where respuesta_reclamo = '' order by num_reclamo desc";
        } else {
          $query = "select * from reclamos where asignado_reclamo = '".$depa."' and respuesta_reclamo = '' order by num_reclamo desc";
        }
        $sqlRe = $conexion->prepare($query);
        $sqlRe->execute();
        $resultadoRe = $sqlRe->fetchAll();
        foreach ($resultadoRe as $row) {
            
          $puntos = NULL;
          if (strlen($row['mensaje_reclamo']) > 50) {
            $puntos = "...";
          }
          if (strlen($row['nom_cli_re']) > 20) {
            $puntos = "...";
          }
          if (strlen($row['correo_cli_re']) > 20) {
            $puntos = "...";
          }
          echo "<tr>"; 
          echo "<td>".$row['num_reclamo']."</td>";
          echo "<td>".$row['fecha_reclamo']."</td>";
          echo "<td>".$row['clasificacion']."</td>";
          echo "<td>".substr($row['nom_cli_re'], 0, 20).$puntos."</td>";
          echo "<td>".$row['tel_cli_re']."</td>";
          echo "<td>".substr($row['correo_cli_re'], 0, 20).$puntos."</td>";
          echo "<td>".substr($row['mensaje_reclamo'], 0, 40).$puntos."</td>";
          $id = $row['num_reclamo'];
      ?>
      <td>
        <a href="Administrador.php?ver2=<?php echo $row['num_reclamo']; ?>"><button type="button" class="btn btn-info" value="Editar"><i class="far fa-eye"></i></button></a>
        <a href="reclamo_pdf.php?edit=<?php echo $row['num_reclamo']; ?>" target="_blank"><button type="button" class="btn btn-success" value="Descargar" id="myBtn"><i class="fas fa-file-pdf"></i></button></a>
      </td>
      <?php
        }
        echo "</tr>";
      } ?>
    </tbody>
  </table>
  </div>
  <?php } } ?>

  <!-- ====================== SERVICIO ESPECIAL ================= -->

  <?php if ($rol == "Especial" or $rol == "Todos"){ ?>

  <div id="menu2" <?php if ($rol == "Especial"){ ?> class="active" <?php } ?> class="tab-pane fade">
    <div class="containe">

    <ul class="nav nav-pills justify-content-center" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#sanciones">Contratos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#agg_sanciones">Agregar contrato</a>
      </li>
    </ul>

    <div class="tab-content">

    <div id="sanciones" class="tab-pane active"><br>
      <div class="containe">

        <table class="tableS table table-hover" data-paging="true" data-sorting="true" data-show-toggle="false">
          <thead class="table-bordered">
            <tr>
              <th colspan="2" class="text-center">Usuario</th>
              <th colspan="3" class="text-center">Contrato</th>
              <th colspan="3" class="text-center">Vehiculo</th>
            </tr>
          </thead>
          <thead class="table-bordered">
            <tr>
              <th>Nombre</th>
              <th>Cedula</th>
              <th>Codigo</th>
              <th>Nombre contratante</th>
              <th>Fecha</th>
              <th>No. interno</th>
              <th>Placa</th>
              <th class="text-center"><i class="fas fa-cog"></i></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $puntos = "...";
               if (isset($_REQUEST['btn-buscar'])) {
                  $busqueda = trim($_REQUEST['buscar']);
                  if ($busqueda > 2000) {
                    $bus = "c.contratoFechaRealizado LIKE  '".$busqueda."%'";
                  } else{
                    $bus = "c.contratoFechaRealizado LIKE  '".$busqueda."'";
                  }

                  $sql = $conexion->prepare("SELECT * FROM usuarios u, contrato c WHERE (u.nombre_usuario LIKE '".$busqueda."%' OR u.id_usuario LIKE '".$busqueda."' OR c.contratoCodigo LIKE '".$busqueda."' OR c.contratoContratante LIKE '".$busqueda."%' OR $bus OR c.contratoNumeroInterno LIKE '".$busqueda."' OR c.contratoPlaca LIKE  '".$busqueda."') AND u.id_usuario = c.usuarioCedula order by contratoCodigo desc limit 500");
                  $sql->execute();
                  $resultado = $sql->fetchAll();

                } else {
                  $sql = $conexion->prepare("SELECT * FROM contrato order by contratoCodigo desc limit 500");
                  $sql->execute();
                  $resultado = $sql->fetchAll();
                }

                foreach ($resultado as $row) {

                  $sql = $conexion->prepare("SELECT * FROM usuarios WHERE id_usuario = :id");
                  $sql->bindParam(":id", $row['usuarioCedula']);
                  $sql->execute();
                  $resultadoU = $sql->fetchAll();

                  foreach ($resultadoU as $key) {
                    echo "<tr>";
                    echo "<td>".$key['nombre_usuario']."</td>";
                    echo "<td>".$key['id_usuario']."</td>";
                  }
                  $puntos = NULL;
                  if (strlen($row['contratoContratante']) > 25) {
                    $puntos = "...";
                  }
                 echo "<td>".$row['contratoCodigo']."</td>";
                 echo "<td>".substr($row['contratoContratante'], 0, 25).$puntos."</td>";
                 echo "<td>".substr($row['contratoFechaRealizado'], 0, 10)."</td>";
                 echo "<td>".$row['contratoNumeroInterno']."</td>";
                 echo "<td>".$row['contratoPlaca']."</td>";
              ?>
              <td>
                <a href="Administrador.php?editCon=<?php echo $row['contratoCodigo']; ?>"><button type="button" class="btn btn-info" value="Editar"><i class="far fa-eye"></i></button></a>
                <a href="contrato_pdf.php?con=<?php echo $row['contratoCodigo']; ?>" target="_blank"><button type="button" class="btn btn-success" value="DescargarSan" id="myBtn"><i class="fas fa-file-download"></i></button></a>
              </td>
              <?php } ?>
            </tr>
          </tbody>
        </table>

      </div>
    </div>



      <div id="agg_sanciones" class="containe tab-pane"><br>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form-inline" name="form-ruta" method="post">
          <button type="button" class="btn btn-primary p-2 ml-2 mb-2 mr-3" data-toggle="collapse" data-target="#demo">Crear nueva ruta</button>
          <div id="demo" class="collapse">
            <div class="input-group">
              <input type="text" class="form-control" name="nuevaRuta" placeholder="Nombre de la ruta">
              <div class="input-group-append">
                <button class="btn btn-success" name="btn-ruta" type="submit"><span class="glyphicon glyphicon-plus-sign"></span>CREAR</button> 
              </div>
            </div>
          </div>
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form-inline" name="form-contrato" method="post">
          <table class="table table-bordered">

            <thead>
              <tr align="center">
                <th colspan="6">CONTRATO DEL SERVICIO PÚBLICO DE TRANSPORTE TERRESTRE AUTOMOTOR ESPECIAL</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td colspan="4">
                  <div class="form-group">
                    <label for="txtcontacto" class="col-md-6">Contratado por </label>
                    <select class="form-control-plaintext col-md-6" name="txtcontacto" id="txtcontacto">
                      <option><small>Seleccione</small></option>
                      <option value="Empleado">Empleado</option>
                      <option value="Empresa">Empresa</option>
                    </select>
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoNumeroUno" class="col-md-2">No.</label>
                    <input type="number" class="form-control-plaintext col-md-10" value="441025001" readonly name="contratoNumeroUno" id="contratoNumeroUno">
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoAno" class="col-md-2">Año </label>
                    <input type="text" class="form-control-plaintext col-md-8" id="contratoAno" name="contratoAno" value="2018" readonly="">
                  </div>
                </td>
                <td colspan="" class="d-none">
                  <div class="form-group">
                    <input type="number" class="form-control-plaintext col-md-12" value="<?php echo $cedula; ?>" name="usuarioCedula" id="usuarioCedula" required>
                  </div>
                </td>
              </tr>

              <tr>
                <td colspan="5">
                  <div class="form-group">
                    <label for="contratoEmpresa" class="col-md-4">Empresa transportadora </label>
                    <input type="text" class="form-control-plaintext col-md-8" value="COOPERATIVA DE TRANSPORTADORES DEL HUILA LTDA" name="contratoEmpresa" id="contratoEmpresa" readonly>
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoNit1" class="col-md-2">Nit </label>
                    <input type="text" class="form-control-plaintext col-md-8" value="891100299" name="contratoNit1" id="contratoNit1" readonly>
                    <input type="text" class="form-control-plaintext col-md-2" value="7" name="contratoNit2" id="contratoNit2" readonly>
                  </div>
                </td>
              </tr>

              <tr>
                <td colspan="5">
                  <div class="form-group">
                    <label for="contratoContratante" class="col-md-4">Contratante </label>
                    <input type="text" class="form-control-plaintext col-md-8" placeholder="Nombre de contratante" name="contratoContratante" id="contratoContratante" required>
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoNit3" class="col-md-2">Nit </label>
                    <input type="number" class="form-control-plaintext col-md-8" placeholder="Escriba el nit" name="contratoNit3" id="contratoNit3" required>
                    <input type="number" class="form-control col-md-2" name="contratoNit4" id="contratoNit4" required>
                  </div>
                </td>
              </tr>

            </tbody>
            <thead>
              <tr align="center">
                <th colspan="6"></th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td colspan="6">
                  <div class="form-group">
                    <label for="contratoObjetivo" class="col-md-12">Objeto contrato:</label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba el objeto del contrato" name="contratoObjetivo" id="contratoObjetivo" required>
                  </div>
                </td>
              </tr>

              <tr>
                <td colspan="4">
                  <div class="form-group">
                    <label for="contratoOrigen" class="col-md-4">Origen </label>
                    <select class="form-control-plaintext col-md-6" name="contratoOrigen" id="contratoOrigen" required="required">
                      <option value="No seleccionado"><small>Seleccione</small></option>
                    <?php foreach ($resultadoruta as $key) { ?>
                      <option value="<?php echo $key['rutaNombre'] ?>"><?php echo $key['rutaNombre']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                </td>
                <td colspan="2">
                  <div class="form-group">
                    <label for="contratoDestino" class="col-md-4">Destino </label>
                    <select class="form-control-plaintext col-md-6" name="contratoDestino" id="contratoDestino" required="required">
                      <option value="No seleccionado"><small>Seleccione</small></option>
                    <?php foreach ($resultadoruta as $key) { ?>
                      <option value="<?php echo $key['rutaNombre'] ?>"><?php echo $key['rutaNombre']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                </td>
              </tr>

            </tbody>
            <thead>
              <tr align="center">
                <th colspan="6"></th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td colspan="6">
                  <div class="form-group">
                    <label for="contratoRecorrido" class="col-md-12">Recorrido:</label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba el recorrido" name="contratoRecorrido" id="contratoRecorrido" required>
                  </div>
                </td>
              </tr>

              <tr>
                <td colspan="4">
                  <div class="form-group">
                    <label for="PagoForma" class="col-md-6">Forma pago </label>
                    <select class="form-control-plaintext col-md-6" name="PagoForma" id="PagoForma">
                      <option><small>Seleccione</small></option>
                      <option value="Credito">Credito</option>
                      <option value="Contado">Contado</option>
                    </select>
                  </div>
                </td>
                <td colspan="2">
                  <div class="form-group">
                    <label for="contratoValor" class="col-md-2">Valor</label>
                    <input type="number" class="form-control-plaintext col-md-10" placeholder="Escriba el valor del contrato" required name="contratoValor" id="contratoValor">
                  </div>
                </td>
              </tr>

              <tr>
                <td colspan="6">
                  <div class="form-group">
                    <label for="contratoValorLetra" class="col-md-12">Valor en letras</label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba el valor en letras" name="contratoValorLetra" id="contratoValorLetra" required>
                  </div>
                </td>
              </tr>
              
              <tr>
                <td colspan="2">
                  <div class="form-group">
                    <label for="contratoHoraSalida" class="col-md">Hora salida </label>
                    <input type="time" class="form-control-plaintext col-md" name="contratoHoraSalida" id="contratoHoraSalida" required>
                  </div>
                </td>
                <td colspan="2">
                  <div class="form-group">
                    <label for="contratoPasajeros" class="col-md-12">Numero de pasajeros </label>
                    <input type="number" class="form-control-plaintext col-md-12" placeholder="Escriba el numero de pasajeros" name="contratoPasajeros" id="contratoPasajeros" required>
                  </div>
                </td>
                <td colspan="2">
                  <div class="form-group">
                    <label for="contratoConvenio" class="col-md-12">Convenio</label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba el convenio" name="contratoConvenio" id="contratoConvenio">
                  </div>
                </td>
              </tr>

              <tr>
                <td colspan="2">
                  <div class="form-group">
                    <label for="contratoConsorcio" class="col-md-12">Consorcio </label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba el consorcio" name="contratoConsorcio" id="contratoConsorcio">
                  </div>
                </td>
                <td colspan="3">
                  <div class="form-group">
                    <label for="contratoUnion" class="col-md-12">Unidad temporal </label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba la unidad temporal" name="contratoUnion" id="contratoUnion">
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoCon" class="col-md-12">Con</label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba el con" name="contratoCon" id="contratoCon">
                  </div>
                </td>
              </tr>

            </tbody>
            <thead>
              <tr align="center">
                <th colspan="6">Vigencia del contrato</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td colspan="3">
                  <div class="form-group">
                    <label for="" class="col-md">Fecha inicio </label>
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <input type="number" class="form-control-plaintext col-md-12" placeholder="Escriba el dia" name="contratoDiaInicio" id="contratoDiaInicio">
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba el mes" name="contratoMesInicio" id="contratoMesInicio">
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <input type="number" class="form-control-plaintext col-md-12" placeholder="Escriba el año" name="contratoAnoInicio" id="contratoAnoInicio">
                  </div>
                </td>
              </tr>

              <tr>
                <td colspan="3">
                  <div class="form-group">
                    <label for="" class="col-md">Fecha fin </label>
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <input type="number" class="form-control-plaintext col-md-12" placeholder="Escriba el dia" name="contratoDiaFin" id="contratoDiaFin">
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba el mes" name="contratoMesFin" id="contratoMesFin">
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <input type="number" class="form-control-plaintext col-md-12" placeholder="Escriba el año" name="contratoAnoFin" id="contratoAnoFin">
                  </div>
                </td>
              </tr>

            </tbody>
            <thead>
              <tr align="center">
                <th colspan="6">Características y datos del vehículo</th>
              </tr>
            </thead>
            <tbody>
            
              <tr>
                <td colspan="6">
                  <div class="form-group">
                    <label for="contratoCarateVehiculo" class="col-md-12">Caracteristicas</label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba las caracteristicas del vehiculo" name="contratoCarateVehiculo" id="contratoCarateVehiculo">
                  </div>
                </td>
              </tr>

              <tr>
                <td colspan="3">
                  <div class="form-group">
                    <label for="contratoPlaca" class="col-md-12">Placa </label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba la placa del vehiculo" name="contratoPlaca" id="contratoPlaca" required>
                  </div>
                </td>
                <td colspan="2">
                  <div class="form-group">
                    <label for="contratoModelo" class="col-md-12">Modelo </label>
                    <input type="number" class="form-control-plaintext col-md-12" placeholder="Escriba el modelo del vehiculo" name="contratoModelo" id="contratoModelo">
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoMarca" class="col-md-12">Marca</label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba la marca del vehiculo" name="contratoMarca" id="contratoMarca">
                  </div>
                </td>
              </tr>

              <tr>
                <td colspan="3">
                  <div class="form-group">
                    <label for="contratoClase" class="col-md-12">Clase </label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba la clase" name="contratoClase" id="contratoClase">
                  </div>
                </td>
                <td colspan="2">
                  <div class="form-group">
                    <label for="contratoNumeroInterno" class="col-md-12">Numero interno </label>
                    <input type="number" class="form-control-plaintext col-md-12" placeholder="Escriba el numero interno del vehiculo" name="contratoNumeroInterno" id="contratoNumeroInterno" required>
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoTarOperacion" class="col-md-12">Numero tarjeta operacion</label>
                    <input type="number" class="form-control-plaintext col-md-12" placeholder="Escriba el numero de tarjeta de operacion" name="contratoTarOperacion" id="contratoTarOperacion">
                  </div>
                </td>
              </tr>

            </tbody>
            <thead>
              <tr align="center">
                <th colspan="6">Datos primer conductor</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td colspan="3">
                  <div class="form-group">
                    <label for="contratoConduc1Nombre" class="col-md-12">Nombre completo </label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba el nombre" name="contratoConduc1Nombre" id="contratoConduc1Nombre">
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoConduc1Cedula" class="col-md-12">Cedula </label>
                    <input type="number" class="form-control-plaintext col-md-12" placeholder="Escriba la cedula" name="contratoConduc1Cedula" id="contratoConduc1Cedula" required>
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoConduc1Licencia" class="col-md-12">N° Licencia</label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba la licencia" name="contratoConduc1Licencia" id="contratoConduc1Licencia">
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoConduc1Vigencia" class="col-md-12">Vigencia</label>
                    <input type="date" class="form-control-plaintext col-md-12" placeholder="Escriba la vigencia" name="contratoConduc1Vigencia" id="contratoConduc1Vigencia">
                  </div>
                </td>
              </tr>
              
            </tbody>
            <thead>
              <tr align="center">
                <th colspan="6">Datos segundo conductor</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td colspan="3">
                  <div class="form-group">
                    <label for="contratoConduc2Nombre" class="col-md-12">Nombre completo </label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba el nombre" name="contratoConduc2Nombre" id="contratoConduc2Nombre">
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoConduc2Cedula" class="col-md-12">Cedula </label>
                    <input type="number" class="form-control-plaintext col-md-12" placeholder="Escriba la cedula" name="contratoConduc2Cedula" id="contratoConduc2Cedula">
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoConduc2Licencia" class="col-md-12">N° Licencia</label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba la licencia" name="contratoConduc2Licencia" id="contratoConduc2Licencia">
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoConduc2Vigencia" class="col-md-12">Vigencia</label>
                    <input type="date" class="form-control-plaintext col-md-12" placeholder="Escriba la vigencia" name="contratoConduc2Vigencia" id="contratoConduc2Vigencia">
                  </div>
                </td>
              </tr>

            </tbody>
            <thead>
              <tr align="center">
                <th colspan="6">Datos tercer conductor</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td colspan="3">
                  <div class="form-group">
                    <label for="contratoConduc3Nombre" class="col-md-12">Nombre completo </label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba el nombre" name="contratoConduc3Nombre" id="contratoConduc3Nombre">
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoConduc3Cedula" class="col-md-12">Cedula </label>
                    <input type="number" class="form-control-plaintext col-md-12" placeholder="Escriba la cedula" name="contratoConduc3Cedula" id="contratoConduc3Cedula">
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoConduc3Licencia" class="col-md-12">N° Licencia</label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba la licencia" name="contratoConduc3Licencia" id="contratoConduc3Licencia">
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoConduc3Vigencia" class="col-md-12">Vigencia</label>
                    <input type="date" class="form-control-plaintext col-md-12" placeholder="Escriba la vigencia" name="contratoConduc3Vigencia" id="contratoConduc3Vigencia">
                  </div>
                </td>
              </tr>

            </tbody>
            <thead>
              <tr align="center">
                <th colspan="6">Responsable del contratante</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td colspan="3">
                  <div class="form-group">
                    <label for="contratoRespoNombre" class="col-md-12">Nombre completo </label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba el nombre" name="contratoRespoNombre" id="contratoRespoNombre" required>
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoRespoCedula" class="col-md-12">Cedula </label>
                    <input type="number" class="form-control-plaintext col-md-12" placeholder="Escriba la cedula" name="contratoRespoCedula" id="contratoRespoCedula" required>
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoRespoTelefono" class="col-md-12">Telefono</label>
                    <input type="number" class="form-control-plaintext col-md-12" placeholder="Escriba el telefono" name="contratoRespoTelefono" id="contratoRespoTelefono" required>
                  </div>
                </td>
                <td colspan="1">
                  <div class="form-group">
                    <label for="contratoRespoDireccion" class="col-md-12">Direccion</label>
                    <input type="text" class="form-control-plaintext col-md-12" placeholder="Escriba la direccion" name="contratoRespoDireccion" id="contratoRespoDireccion" required>
                  </div>
                </td>
              </tr>

            </tbody>
            <thead>
              <tr align="center">
                <th colspan="6"></th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td colspan="6">
                  <div class="form-group">
                    <label for="contratoObservaciones" class="col-md-12">Observaciones:</label>
                    <textarea class="form-control-plaintext" placeholder="Escriba las observaciones" rows="5" id="contratoObservaciones" name="contratoObservaciones" required></textarea>
                  </div>
                </td>
              </tr>
              
              <tr align="center">
                <td colspan="6">
                  <button type="submit" id="enviar_co" name="enviar_co" class="btn btn-success btn-lg">ENVIAR</button>
                </td>
              </tr>

            </tbody>
          </table>
        </form>
      </div>
    </div>

    </div>
  </div>
 <?php } ?>
  <!-- ======================= FIN SERVICIO ESPECIAL ================ -->
  </div>
</div>   
 

</div>
<?php } ?>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/mainAd.js"></script>
<script type="text/javascript" src="../assets/js/footable.js"></script>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/pace.min.js"></script>
<script src="assets/js/perfect-scrollbar.min.js"></script>
<script src="assets/js/coreui.min.js"></script>

<script type="text/javascript">

  jQuery(function($){

    $('.tablef').footable();
    $('.tableS').footable();

  });

	$(document).ready(function(){
	    $("#pas").click(function(){
	        $("#myModalPas").modal();
	    });
	});
  
</script>
<?php 
if (isset($c) && $c == 1) { ?>
	<script type="text/javascript">
		$(document).ready(function(){
		        $("#myModalPas").modal();
		});
	</script>
<?php }
if (isset($edit) && $edit > 1) { ?>
	<script type="text/javascript">
		$(document).ready(function(){
		        $("#myModal").modal();
		});
	</script>
<?php }
if (isset($x) && $x == 2) { ?>
	<script type="text/javascript">
		$(document).ready(function(){
		        $("#myModalError2").modal();
		});
	</script>
<?php }
if (isset($x) && $x == 1) { ?>
	<script type="text/javascript">
		$(document).ready(function(){
		        $("#myModalError1").modal();
		});
	</script>
<?php }
if (isset($x) && $x == 4) { ?>
	<script type="text/javascript">
		$(document).ready(function(){
		        $("#myModalError3").modal();
		});
	</script>
<?php }

if (isset($_REQUEST['ver'])) { ?>
  <script type="text/javascript">
    $(document).ready(function(){
            $("#myModalCorreo").modal();
    });
  </script>
<?php } 
if (isset($_REQUEST['ver2'])) { ?>
  <script type="text/javascript">
    $(document).ready(function(){
            $("#myModalReclamo").modal();
    });
  </script>
<?php } 
if (isset($_REQUEST['editCon'])) { ?>
  <script type="text/javascript">
    $(document).ready(function(){
            $("#myModalCon").modal();
    });
  </script>
<?php } ?>
</html>



