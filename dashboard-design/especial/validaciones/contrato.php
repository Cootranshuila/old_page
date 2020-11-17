<?php
require "../../assets/config/ConexionBaseDatos_PDO.php";
extract($_REQUEST);
date_default_timezone_set('America/Bogota');
$fecha_comen = date("y-m-d");
$fecha = "20".$fecha_comen;
$conexion = conectaDb();

$sql = $conexion->prepare("INSERT INTO contrato (contratoNumeroUno, contratoAno, contratoCodigo, contratoEmpresa, contratoNit1, contratoNit2, contratoContratante, contratoNit3, contratoNit4, contratoObjetivo, contratoOrigen, contratoDestino, contratoRecorrido, contratoValor, PagoForma, contratoHoraSalida, contratoPasajeros, contratoConvenio, contratoConsorcio, contratoUnion, contratoCon, contratoDiaInicio, contratoMesInicio, contratoAnoInicio, contratoDiaFin, contratoMesFin, contratoAnoFin, contratoCarateVehiculo, contratoPlaca, contratoModelo, contratoMarca, contratoClase, contratoNumeroInterno, contratoTarOperacion, contratoConduc1Nombre, contratoConduc1Cedula, contratoConduc1Licencia, contratoConduc1Vigencia, contratoConduc2Nombre, contratoConduc2Cedula, contratoConduc2Licencia, contratoConduc2Vigencia, contratoConduc3Nombre, contratoConduc3Cedula, contratoConduc3Licencia, contratoConduc3Vigencia, contratoRespoNombre, contratoRespoCedula, contratoRespoDireccion, contratoRespoTelefono, contratoObservaciones, contratoFechaRealizado, usuarioCedula, contratoValorLetra) VALUES (:contratoNumeroUno, :contratoAno, NULL, :contratoEmpresa, :contratoNit1, :contratoNit2, :contratoContratante, :contratoNit3, :contratoNit4, :contratoObjetivo, :contratoOrigen, :contratoDestino, :contratoRecorrido, :contratoValor, :PagoForma, :contratoHoraSalida, :contratoPasajeros, NULL, NULL, NULL, NULL, :contratoDiaInicio, :contratoMesInicio, :contratoAnoInicio, :contratoDiaFin, :contratoMesFin, :contratoAnoFin, :contratoCarateVehiculo, :contratoPlaca, :contratoModelo, :contratoMarca, :contratoClase, :contratoNumeroInterno, :contratoTarOperacion, :contratoConduc1Nombre, :contratoConduc1Cedula, :contratoConduc1Licencia, :contratoConduc1Vigencia, :contratoConduc2Nombre, :contratoConduc2Cedula, :contratoConduc2Licencia, :contratoConduc2Vigencia, :contratoConduc3Nombre, :contratoConduc3Cedula, :contratoConduc3Licencia, :contratoConduc3Vigencia, :contratoRespoNombre, :contratoRespoCedula, :contratoRespoDireccion, :contratoRespoTelefono, :contratoObservaciones, :contratoFechaRealizado, :usuarioCedula,:contratoValorLetra)");

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
  $sql->bindParam(":contratoConduc2Nombre", $_REQUEST['contratoConduc2Nombre'], PDO::PARAM_STR);
  $sql->bindParam(":contratoConduc2Cedula", $_REQUEST['contratoConduc2Cedula'], PDO::PARAM_INT);
  $sql->bindParam(":contratoConduc2Licencia", $_REQUEST['contratoConduc2Licencia'], PDO::PARAM_INT);
  $sql->bindParam(":contratoConduc2Vigencia", $_REQUEST['contratoConduc2Vigencia'], PDO::PARAM_STR);
  $sql->bindParam(":contratoConduc3Nombre", $_REQUEST['contratoConduc3Nombre'], PDO::PARAM_STR);
  $sql->bindParam(":contratoConduc3Cedula", $_REQUEST['contratoConduc3Cedula'], PDO::PARAM_INT);
  $sql->bindParam(":contratoConduc3Licencia", $_REQUEST['contratoConduc3Licencia'], PDO::PARAM_INT);
  $sql->bindParam(":contratoConduc3Vigencia", $_REQUEST['contratoConduc3Vigencia'], PDO::PARAM_STR);
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

  echo $contContrato;

  ?>