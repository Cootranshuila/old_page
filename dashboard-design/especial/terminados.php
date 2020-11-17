<?php 
extract($_REQUEST);
extract($_POST);

if (!isset($_REQUEST['p'])) {
  header("location:terminados.php?p=1");
}
require "../assets/config/ConexionBaseDatos_PDO.php";

require "../postulados/seg.php";

$objConexion=conectaDb();


?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="author" content="cootranshuila">
    <title>Cootranshuila</title>
    <link rel="icon" type="image/png" href="../assets/img/logo-icon.png">
    <!-- Icons-->
    <link href="../assets/css/coreui-icons.min.css" rel="stylesheet">
    <link href="../assets/css/flag-icon.min.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/toastr.min.css" rel="stylesheet">
    <link href="../assets/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
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
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="terminados.php">
        <img class="navbar-brand-full" src="../assets/img/brand/logo.png" width="89" height="25" alt="logo cootranshuila">
        <img class="navbar-brand-minimized" src="../assets/img/brand/loog.png" width="30" height="30" alt="logo cootranshuila">
      </a>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
          <a class="nav-link" href="../index.php">inicio</a>
        </li>
        <?php if ($_SESSION['rol'] == 'PQR' or $_SESSION['rol'] == 'Todos'): ?>
          <li class="nav-item px-3">
            <a class="nav-link" href="#">PQR's</a>
          </li>
        <?php endif ?>
        <?php if ($_SESSION['rol'] == 'Especial' or $_SESSION['rol'] == 'Todos'): ?>
          <li class="nav-item px-3">
            <a class="nav-link" href="../especial/index.php?p=1">Servicio especial</a>
          </li>
          <?php endif ?>
          <?php if ($_SESSION['rol'] == 'Modem y GPS' or $_SESSION['rol'] == 'Todos'): ?>
          <li class="nav-item px-3">
            <a class="nav-link" href="../modemygps/index.php?p=1">Modem y GPS</a>
          </li>
          <?php endif ?>
          <?php if ($_SESSION['rol'] == 'Sanciones' or $_SESSION['rol'] == 'Todos' or $_SESSION['rol'] == 'Operativos'): ?>
          <li class="nav-item px-3">
            <a class="nav-link" href="../sanciones/index.php?p=1">Sanciones</a>
          </li>
          <?php endif ?>
          <?php if ($_SESSION['rol'] == 'Postulados' or $_SESSION['rol'] == 'Todos'): ?>
          <li class="nav-item px-3">
            <a class="nav-link" href="../postulados/index.php?cargo=conductor&estado=Postulado">Postulados</a>
          </li>
          <?php endif ?>
      </ul>
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="index.php" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="img-avatar" src="../assets/img/avatars/face-0.jpg" alt="Usuario">
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-header text-center">
              <strong><i class="fa fa-user"></i> Usuario</strong>
            </div>
            <a class="dropdown-item text-center" href="index.php"><?php echo $_SESSION["user"]; ?></a>
            <div class="dropdown-header text-center">
              <strong><i class="fa fa-users-cog"></i> Configuraciones</strong>
            </div>
            <a class="dropdown-item" href="#">
              <i class="fa fa-key"></i> Cambiar contraseña
            </a>
              <?php if ($_SESSION['rol'] == 'Todos'): ?>                
                <a class="dropdown-item" href="#">
                  <i class="fa fa-users"></i> Agregar usuarios</a>
                <a class="dropdown-item" href="#">
                  <i class="fa fa-unlock-alt"></i> Administrador
                </a>
              <?php endif ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../assets/validaciones/cerrar_session.php">
              <i class="fa fa-sign-out-alt"></i> Salir</a>
          </div>
        </li>
      </ul>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </header>

<div class="app-body">
 <div class="sidebar">
  <nav class="sidebar-nav">
  <ul class="nav">
  <li class="nav-item">
  <a class="nav-link active" href="../">
  <i class="nav-icon icon-home"></i> Administrador
  </a>
  </li>
  <br>
  <li class="nav-item" >
  <a class="nav-link" href="index.php">
    <i class="nav-icon icon-envelope" ></i> Contratos
  </a>
  </li>
  <li class="nav-item" style="background: #20a8d8;">
  <a class="nav-link" href="index.php" style="cursor: pointer;">
  <i class="nav-icon icon-drawer" style="color: #fff;"></i> Agregar Contrato
  </a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" href="#" role="button" data-toggle="modal" data-target="#primaryModal">
   <i class="nav-icon icon-plus"></i> Agregar
    </a>
   </li> -->
   </ul>
   </nav>
   <button class="sidebar-minimizer brand-minimizer" type="button"></button>
   </div>

   <main class="main">
        <!-- Breadcrumb-->
   <ol class="breadcrumb">
    <li class="breadcrumb-item">Inicio</li>
   <li class="breadcrumb-item">PQR</li>
    <li class="breadcrumb-item active">Agregar Contratos</li>
    <li class="breadcrumb-menu d-md-down-none">
    <div class="reloj"><?php echo date("d / m / y  | ");?>
    <span id="pHoras"></span><span> : </span>
    <span id="pMinutos"></span><span> : </span>
    <span id="pSegundos"></span>
    </div>
    </li>
          <!-- Breadcrumb Menu-->
     </ol>
    <div class="container-fluid">
     <div class="animated fadeIn">
            

            <!-- CONTENT PAGE -->
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header ">
        <i class="fa fa-align-justify "></i> Agregar Contrato 
                     <!-- <div class="text-right float-right"><h4><a href="index.php?p=1"><span class="badge badge-info p-2">Generar consulta SQL</span></a></h4></div> -->
        <form action="/cootranshuila.com/public_html/dashboard/Administrador.php" id="crearRuta" class="form-inline row justify-content-end" style="margin-top: -20px; margin-right: 5px" name="form-ruta" method="post">
          <div id="demo" class="collapse">
            <div class="input-group">
              <input type="text" class="form-control" id="nuevaRuta" required="required" placeholder="Nombre de la ruta" >
                <div class="input-group-append">
                 <button class="btn btn-success" id="hidden.bs.collapse" name="btn-ruta" type="submit"><span class="glyphicon glyphicon-plus-sign"></span>CREAR</button> 
                 
                </div>
            </div>
          </div>

          <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo" style="margin-left: 10px;">Crear nueva ruta</button>
          
        </form>

      </div>
    <div class="card-body">
  <div class="row text-center">

<!--===================ypoc=====================-->
<form action="terminados.php" class="form-inline px-5" id="form_contrato"name="form-contrato" method="post">
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
            <input type="text" class="form-control-plaintext col-md-8" id="contratoAno" name="contratoAno" value="2019" readonly="">
        </div>
      </td>
                <td colspan="" class="d-none">
                  <div class="form-group">
                    <input type="number" class="form-control-plaintext col-md-12" value="1081420457" name="usuarioCedula" id="usuarioCedula" required>
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
                       <?php
                        // Consultar la base de datos
                        $pdo = conectaDb();
                        $sql_r = "SELECT * FROM ruta";
                        $stmt = $pdo->prepare($sql_r);
                        $resul = $stmt->execute();
                        $rows=$stmt->fetchAll(\PDO::FETCH_OBJ);
                        foreach($rows as $row) {
                          ?>
                          
                        <option placeholder="seleccione" value="<?php print($row->rutaNombre); ?>"><?php print($row->rutaNombre) ?></option>}
                          <?php
                          }
                        ?> 
                     </select>                      
                  </div>
                </td>
                <td colspan="2">
                  <div class="form-group">
                    <label for="contratoDestino" class="col-md-4">Destino </label>
                    <select class="form-control-plaintext col-md-6" name="contratoDestino" id="contratoDestino" required="required">
                      <option value="No seleccionado"><small>Seleccione</small></option>
                      <?php
                        $pdo = conectaDb();
                        $sql_r = "SELECT * FROM ruta";
                        $stmt = $pdo->prepare($sql_r);
                        $resul = $stmt->execute();
                        $rows=$stmt->fetchAll(\PDO::FETCH_OBJ);
                        foreach($rows as $row) { ?>
                          <option value="<?php print($row->rutaNombre); ?>"><?php print($row->rutaNombre) ?></option>}
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

                     
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>


          </div>
        </div>
      </main>
</div>
    <!--=====pie de pagina=================-->
    <footer class="app-footer">
    <div>
    <a href="https://www.cootranshuila.com">Cootranshuila</a>
    <span>&copy; 2019.</span>
    </div>
    </footer>

    <!-- CoreUI and necessary plugins-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/pace.min.js"></script>
    <script src="../assets/js/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/coreui.min.js"></script>
    <script src="../assets/js/toastr.min.js"></script>
    <script type="text/javascript" src="../../assets/js/mainAd.js"></script>
    <!-- Plugins and scripts required by this view-->
    <!-- <script src="node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js"></script> -->
    <!-- <script src="js/main.js"></script> -->
    <!-- <script>$('[data-toggle="tooltip"]').tooltip();</script> -->
    <script>

      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "800",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }

      //===============ENVIAR CONTRATO==========================

  $("#enviar_co").click(function(){
     
 
      $.ajax({
        type: "POST",
        url: 'validaciones/contrato.php',
        data: $("#form_contrato").serialize(),
        success:function(data){
         

          if (data == 1) { 
            window.open('validaciones/contrato_pdf.php', '_blank'); 
            //console.log(data);
         
          }
        }
      });
      return false;
      });

      



    /*===============peticion crear ruta==========*/
      $("#crearRuta").submit(function(){
         var nombreRuta = $("#nuevaRuta").val();
        
         // alert(nombreRuta)
          $.ajax({
            type: 'POST',
            url: 'validaciones/agregarRuta.php',
            data: {nombreRuta:nombreRuta},
            success: function(data){
              // $("#ver_reporte_content").html(data);
              if (data == 1) {
                $("#nuevaRuta").val("");
                Command: toastr["success"]("Ruta agrada correctamente.", "Correcto!");
                $('#demo').collapse('hide'); 
                // ===================petiicon de consulta de rutas===========================
                $.ajax({
                  type: 'POST',
                  url: 'validaciones/buscarRuta.php',
                  success: function(data){
                    $("#contratoOrigen").html(data);
                    $("#contratoDestino").html(data);

                  }

                });

              } else {
                Command: toastr["error"]("ruta no agregada.", "Error!");

              }

            }

          });

          return false;
      });

      // tabla();

      var res = $("#resultados-hide").html();
      $("#resultados").html(res);
      
      // funcion para redireccionar a la busqueda
      $('#buscar').keyup(function(e){
          if(e.keyCode == 13)
          {
            var busqueda = $('#buscar').val();
            window.location.href = 'correos.php?buscar='+busqueda+"&p=1";
          }
      });

      //PETICION AJAX PARA AGREGAR REPORTES
      $("#agregar-reporte").click(function() {
        if ($("#placa").val() == "") { $("#placa").addClass("is-invalid"); $("#input-placa").removeClass("d-none"); } else { $("#placa").removeClass("is-invalid"); $("#input-placa").addClass("d-none"); }
        if ($("#id_p").val() == "") { $("#id_p").addClass("is-invalid"); $("#input-id_p").removeClass("d-none"); } else { $("#id_p").removeClass("is-invalid"); $("#input-id_p").addClass("d-none"); }
        if ($("#obs").val() == "") { $("#obs").addClass("is-invalid"); $("#input-obs").removeClass("d-none"); } else { $("#obs").removeClass("is-invalid"); $("#input-obs").addClass("d-none"); }
        if ($("#nom").val() == "") { $("#nom").addClass("is-invalid"); $("#input-nom").removeClass("d-none"); } else { $("#nom").removeClass("is-invalid"); $("#input-nom").addClass("d-none"); }
        if ($("#con").val() == "") { $("#con").addClass("is-invalid"); $("#input-con").removeClass("d-none"); } else { $("#con").removeClass("is-invalid"); $("#input-con").addClass("d-none"); }
        if ($("#tipo").val() == "") { $("#tipo").addClass("is-invalid"); $("#input-tipo").removeClass("d-none"); } else { $("#tipo").removeClass("is-invalid"); $("#input-tipo").addClass("d-none"); }

        if ($("#tipo").val() != "" && $("#placa").val() != "" && $("#id_p").val() != "" && $("#obs").val() != "" && $("#nom").val() != "" && $("#con").val() != "") {
          $.ajax({
            type: 'POST',
            url: 'validaciones/insertar-reporte.php',
            data: $("#form-reporte").serialize(),
            success: function(data){
              if (data == 'Ok') {
                Command: toastr["success"]("Reporte agregado correctamente.", "Correcto!");
                $("#form-reporte")[0].reset();
                $('#primaryModal').modal('toggle');
                tabla();
              }
            }
          });
        }
      });

      //FUNCION PARA MOSTRAR LA TABLA
      function tabla(){
        var p = getParameterByName('p');
        var buscar = getParameterByName('buscar');
        $.ajax({
          type: 'POST',
          url: 'validaciones/mostrar-tabla.php',
          data: {p:p, buscar:buscar},
          success: function(data){
            $("#tabla-reportes").html(data);
            // console.log(data);
          }
        });
      }

      //FUNCION PARA OBTENER VALORES DE LA URL
      function getParameterByName(name) {
          name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
          var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
          results = regex.exec(location.search);
          return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
      }

      function ver_reporte(e) {
        $('#Modal_Ver_Reporte').modal('show');
        $.ajax({
          type: 'POST',
          url: 'validaciones/ver_reporte.php',
          data: {e:e},
          success: function(data){
            $("#ver_reporte_content").html(data);
            // console.log(data);
          }
        });
      }

    </script>
  </body>
</html>