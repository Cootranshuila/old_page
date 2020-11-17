<?php 

require "../assets/config/ConexionBaseDatos_PDO.php";
require "conexion.php";
require "PDO_Pagination.php";
$mod = new Conexion;
$conexion = $mod->conectar();
$pagination = new PDO_Pagination($conexion);
extract($_REQUEST);
extract($_POST);
require "seg.php";
$objConexion=conectaDb();

if ($_SESSION['rol'] != 'Postulados' && $_SESSION['rol'] != 'Todos') {
  header("location:../Administrador.php");
}


// 
// consultas del archivo index
// 
$class1 = '';
$class2 = '';
$class3 = '';
$class4 = '';
$echoEstado = '';
$echoCargo = '';

$countTaquillero = 0;
$countSatellite = 0;
$countAuxiliar = 0;
$countConductor = 0;

$cargo = $_GET['cargo'];
$estado = $_GET['estado'];

$sqlVisto = "SELECT * from postulado where visto = 'no' and cargo = 'Consignatario Taquillero'";
$conVisto = $objConexion->prepare($sqlVisto);
$conVisto->execute();
if ($conVisto->rowCount() >= 1) {
  $countTaquillero = $conVisto->rowCount();
}

$sqlVisto2 = "SELECT * from postulado where visto = 'no' and cargo = 'Consignatario Satellite'";
$conVisto2 = $objConexion->prepare($sqlVisto2);
$conVisto2->execute();
if ($conVisto2->rowCount() >= 1) {
  // echo $conVisto2->rowCount();
  $countSatellite = $conVisto2->rowCount();
}

$sqlVisto3 = "SELECT * from postulado where visto = 'no' and cargo = 'Auxiliar'";
$conVisto3 = $objConexion->prepare($sqlVisto3);
$conVisto3->execute();
if ($conVisto3->rowCount() >= 1) {
  $countAuxiliar = $conVisto3->rowCount();
}

$sqlVisto4 = "SELECT * from postulado where visto = 'no' and cargo = 'Conductor'";
$conVisto4 = $objConexion->prepare($sqlVisto4);
$conVisto4->execute();
if ($conVisto4->rowCount() >= 1) {
  $countConductor = $conVisto4->rowCount();
}

// 
// consultas necesarias del archivo view
// 

$sql2 = "SELECT * FROM postulado WHERE numero_identificacion = :numero";
$con2 = $objConexion->prepare($sql2);
$con2->bindParam(':numero', $_REQUEST['id']);
$con2->execute();
$resultado = $con2->fetchAll();

$sqlUpdate = "UPDATE postulado set visto = 'si' where numero_identificacion = :numero";
$conUpdate = $objConexion->prepare($sqlUpdate);
$conUpdate->bindParam(':numero', $_REQUEST['id']);
$conUpdate->execute();


foreach ($resultado as $num) {
  $numDep = $num['departamento'];
  $numCiu = $num['ciudad'];
  $foto = $num['foto'];
  $idk = $num['id'];
  $genero = $num['genero'];
}

$sqlDep = "SELECT * FROM tbldepartamento WHERE idDep = :id";
$conDep = $objConexion->prepare($sqlDep);
$conDep->bindParam(':id', $numDep);
$conDep->execute();
$resDep = $conDep->fetchAll();
foreach ($resDep as $keyDep) {
  $nomDep = $keyDep['nomDep'];
}

$sqlMun = "SELECT * FROM tblmunicipio WHERE idMun = :id";
$conMun = $objConexion->prepare($sqlMun);
$conMun->bindParam(':id', $numCiu);
$conMun->execute();
$resMun = $conMun->fetchAll();
foreach ($resMun as $keyMun) {
  $nomMun = $keyMun['nomMun'];
}

$sqlEdu = "SELECT * FROM educacion where postulado_id = :id";
$conEdu = $objConexion->prepare($sqlEdu);
$conEdu->bindParam(':id', $idk);
$conEdu->execute();
$resConEdu = $conEdu->fetchAll();
$numRowEdu = $conEdu->rowCount();

$sqlExp = "SELECT * FROM experiencia where postulado_id = :id";
$conExp = $objConexion->prepare($sqlExp);
$conExp->bindParam(':id', $idk);
$conExp->execute();
$resConExp = $conExp->fetchAll();
$numRowExp = $conExp->rowCount();

$sqlRefFam = "SELECT * FROM referencias_familiares WHERE postulado_id = :id";
$conRefFam = $objConexion->prepare($sqlRefFam);
$conRefFam->bindParam(':id', $idk);
$conRefFam->execute();
$resConRefFam = $conRefFam->fetchAll();
$numRowRefFam = $conRefFam->rowCount();

$sqlRefLab = "SELECT * FROM referencias_laboral WHERE postulado_id = :id";
$conRefLab = $objConexion->prepare($sqlRefLab);
$conRefLab->bindParam(':id', $idk);
$conRefLab->execute();
$resConRefLab = $conRefLab->fetchAll();

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
      <a class="navbar-brand" href="../index.php">
        <img class="navbar-brand-full" src="../assets/img/brand/logo.png" width="89" height="25" alt="Logo">
        <img class="navbar-brand-minimized" src="../assets/img/brand/loog.png" width="30" height="30" alt="Logo">
      </a>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
          <a class="nav-link" href="../index.php">inicio</a>
        </li>
        <?php if ($_SESSION['rol'] == 'Todos'): ?>
          <li class="nav-item px-3">
            <a class="nav-link" href="../pqrs/index.php">PQR's</a>
          </li>
          <li class="nav-item px-3">
            <a class="nav-link" href="#">Servicio especial</a>
          </li>
          <li class="nav-item px-3">
            <a class="nav-link" href="#">Modem y GPS</a>
          </li>
          <li class="nav-item px-3">
            <a class="nav-link" href="#">Sanciones</a>
          </li>
          <li class="nav-item px-3">
            <a class="nav-link" href="postulados/index.php?cargo=conductor&estado=Postulado">Postulados</a>
          </li>
        <?php endif ?>
        <?php if ($_SESSION['rol'] == 'Postulados'): ?>
          <li class="nav-item px-3">
            <a class="nav-link" href="index.php?cargo=conductor&estado=Postulado">Postulados</a>
          </li>
        <?php endif ?>
      </ul>
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="img-avatar" src="../assets/img/avatars/face-0.jpg" alt="Usuario">
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-header text-center">
              <strong><i class="fa fa-user"></i> Usuario</strong>
            </div>
            <a class="dropdown-item" href="index.php?cargo=conductor&estado=Postulado"><?php echo $_SESSION["user"]; ?></a>
            <div class="dropdown-header text-center">
              <strong><i class="fa fa-users-cog"></i> Configuraciones</strong>
            </div>
            <a class="dropdown-item" href="#">
              <i class="fa fa-key"></i> Cambiar contraseña</a>
            <?php if ($_SESSION['rol'] == 'Todos'): ?>                
              <a class="dropdown-item" href="#">
                <i class="fa fa-users"></i> Agregar usuarios</a>
              <a class="dropdown-item" href="#">
                <i class="fa fa-unlock-alt"></i> Administrador
              </a>
            <?php endif ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../Administrador.php?salir=si">
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
              <a class="nav-link active" href="../index.php">
                <i class="nav-icon icon-home"></i> Administrador
              </a>
            </li>
            <br>
            <li class="nav-item">
              <?php if ($countConductor >= 1){ ?>
                <a href="index.php?cargo=conductor&estado=Postulado" class="nav-link <?php echo $class1; ?>">
                  <i class="fa fa-car"></i>
                   Conductores <span class="badge badge-primary" style="background-color: #447DF7"><?php echo $countConductor ?></span>
                </a>
              <?php }else{ ?>
                <a href="index.php?cargo=conductor&estado=Postulado" class="nav-link <?php echo $class1; ?>">
                  <i class="fa fa-car"></i> Conductores
                </a>
              <?php } ?>
            </li>
            <li class="nav-item">
              <?php if ($countAuxiliar >= 1){ ?>
                <a href="index.php?cargo=auxiliar&estado=Postulado" class="nav-link <?php echo $class2; ?>">
                  <i class="fa fa-hands-helping"></i>
                   Auxiliares de viaje <span class="badge badge-primary" style="background-color: #447DF7"><?php echo $countAuxiliar ?></span>
                </a>
              <?php }else{ ?>
                <a href="index.php?cargo=auxiliar&estado=Postulado" class="nav-link <?php echo $class2; ?>">
                  <i class="fa fa-hands-helping"></i>
                   Auxiliares de viaje
                </a>
              <?php } ?>
            </li>
            <li class="nav-item">
              <?php if ($countTaquillero >= 1){ ?>
                <a href="index.php?cargo=Consignatario+Taquillero&estado=Postulado" class="nav-link <?php echo $class3; ?>">
                  <i class="fa fa-user-tie"></i>
                   Consignatarios taquilleros <span class="badge badge-primary" style="background-color: #447DF7"><?php echo $countTaquillero ?></span>
                </a>
              <?php }else{ ?>
                <a href="index.php?cargo=Consignatario+Taquillero&estado=Postulado" class="nav-link <?php echo $class3; ?>">
                  <i class="fa fa-user-tie"></i>
                   Consignatarios taquilleros
                </a>
              <?php } ?>
            </li>
            <li class="nav-item">
              <?php if ($countSatellite >= 1){ ?>
                <a href="index.php?cargo=Consignatario+Satellite&estado=Postulado" class="nav-link <?php echo $class4; ?>">
                  <i class="fa fa-user-cog"></i>
                   Consignatarios satellite <span class="badge badge-primary" style="background-color: #447DF7"><?php echo $countSatellite ?></span>
                </a>
              <?php }else{ ?>
                <a href="index.php?cargo=Consignatario+Satellite&estado=Postulado" class="nav-link <?php echo $class4; ?>">
                  <i class="fa fa-user-cog"></i>
                   Consignatarios satellite
                </a>
              <?php } ?>
            </li>
          </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
      <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../index.php">Inicio</a>
          </li>
          <li class="breadcrumb-item">
            <a href="index.php?cargo=<?php echo $_REQUEST['cargo'] ?>&estado=<?php echo $_REQUEST['estado'] ?>">Postulados</a>
          </li>
          <li class="breadcrumb-item active">Ver</li>
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

            <a href="index.php?cargo=<?php echo $_REQUEST['cargo'] ?>&estado=<?php echo $_REQUEST['estado'] ?>" class="btn btn-outline-dark mb-3"><i class="fa fa-arrow-left"></i> Regresar</a>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="title">Datos personales</h3>
                  </div>
                  <div class="card-body">
                    <?php if ($foto != ''){ ?>
                      <img src="../../imagesPostulados/postulados/<?php echo $foto ?>" alt="foto personal" class="img-thumbnail rounded float-right" style="float: right;" width="300">
                    <?php }else{ ?>
                      <img src="../assets/img/avatars/face-0.jpg" alt="foto personal" class="img-thumbnail rounded float-right" style="float: right;">
                    <?php } ?>
                      
                    <?php foreach ($resultado as $key1) { 
                    $id = $key1['id'];
                    $miEstado = $key1['estado'];
                    $nombreC = $key1['nombres']." ".$key1['apellidos'] ?>
                      <h5>
                        <span class="badge badge-primary" style="font-size: 17px;">Nombre:</span> 
                        <?php echo $nombreC; ?>
                      </h5>
                      <h5>
                        <span class="badge badge-primary" style="font-size: 17px;">Tipo de identificacion:</span> 
                         <?php echo $key1['tipo_identificacion']; ?>
                      </h5>
                      <h5>
                        <span class="badge badge-primary" style="font-size: 17px;">Numero de identificacion:</span> 
                        <?php echo $key1['numero_identificacion']; ?>
                      </h5>
                      <h5>
                        <span class="badge badge-primary" style="font-size: 17px;">Email:</span>  
                        <?php echo $key1['email']; ?>
                      </h5>
                      <h5>
                        <span class="badge badge-primary" style="font-size: 17px;">Genero:</span>  
                        <?php echo $key1['genero']; ?>
                      </h5>
                      <h5>
                        <span class="badge badge-primary" style="font-size: 17px;">Estado civil:</span> 
                        <?php echo $key1['estado_civil']; ?>
                      </h5>
                      <h5>
                        <span class="badge badge-primary" style="font-size: 17px;">Numero de celular:</span>  <?php echo $key1['numero_celular']; ?>
                      </h5>
                      <h5>
                        <span class="badge badge-primary" style="font-size: 17px;">Departamento:</span> 
                        <?php echo $nomDep; ?>
                      </h5>
                      <h5>
                        <span class="badge badge-primary" style="font-size: 17px;">Ciudad:</span> 
                        <?php echo $nomMun; ?>
                      </h5>
                      <h5>
                        <span class="badge badge-primary" style="font-size: 17px;">Direccion:</span> 
                        <?php echo $key1['direccion']; ?>
                      </h5>
                      <h5>
                        <span class="badge badge-primary" style="font-size: 17px;">Fecha de nacimiento:</span> 
                        <?php echo $key1['fecha_nacimiento']; ?>
                      </h5>
                      <h5>
                        <span class="badge badge-primary" style="font-size: 17px;">Cargo:</span> 
                        <?php echo $key1['cargo']; ?>
                      </h5>
                    <?php } ?>


                  </div>
                </div>
              </div>
            </div>

            <?php if ($numRowEdu != 0): ?>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="title">Formacion academica</h3>
                    </div>
                    <div class="card-body">
                      <h4 class="text-center">Educacion basica y media</h4>
                      <?php foreach ($resConEdu as $keyEdu) {  ?>
                        <h5>
                          <span class="badge badge-primary" style="font-size: 17px;">Educacion basica:</span> 
                           <?php echo $keyEdu['educacion_basica']; ?>
                        </h5>
                        <h5>
                          <span class="badge badge-primary" style="font-size: 17px;">Titulo obtenido:</span> 
                          <?php echo $keyEdu['titulo_obtenido']; ?>
                        </h5>
                        <h5>
                          <span class="badge badge-primary" style="font-size: 17px;">Fecha de grado:</span> 
                          <?php echo $keyEdu['fecha']; ?>
                        </h5>
                      <?php break; } ?>

                      <h4 class="text-center mt-5">Educacion Superior(pregrado y postgrado)</h4>
                      <?php foreach ($resConEdu as $keyEdu) {  
                      if ($keyEdu['modalidad_academica'] == 'TC') {
                        $mod = 'Tecnica';
                      }
                      if ($keyEdu['modalidad_academica'] == 'TL') {
                        $mod = 'Tecnologica';
                      }
                      if ($keyEdu['modalidad_academica'] == 'TE') {
                        $mod = 'Tecnologica especializada';
                      }
                      if ($keyEdu['modalidad_academica'] == 'UN') {
                        $mod = 'Universitaria';
                      }
                      if ($keyEdu['modalidad_academica'] == 'ES') {
                        $mod = 'Especializacion';
                      }
                      if ($keyEdu['modalidad_academica'] == 'MG') {
                        $mod = 'Maestria o magister';
                      }
                      if ($keyEdu['modalidad_academica'] == 'DOC') {
                        $mod = 'Doctorado o PHD';
                      }
                      ?>
                        <div class="row">
                          <div class="col">
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Modalidad academica:</span> <?php echo $mod; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Semestres aprobados:</span> <?php echo $keyEdu['semestres_aprobados']; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Graduado:</span> <?php echo $keyEdu['graduado']; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Titulo obtenido:</span> <?php echo $keyEdu['titulo_obtenido2']; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Fecha de terminacion:</span> <?php echo $keyEdu['fecha_terminacion']; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">N° tarjeta profesional:</span> <?php echo $keyEdu['tarjeta_profesional']; ?></h5>
                          </div>
                        </div>
                      <?php } ?>


                    </div>
                  </div>
                </div>
              </div>
            <?php endif ?>

            <?php if ($numRowExp != 0): ?>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="title">Experiencia laboral</h3>
                    </div>
                    <div class="card-body">
                      <h4 class="text-center">Empleo actual o contrato anterior</h4>
                      <?php foreach ($resConExp as $keyExp) {  ?>
                        <div class="row">
                          <div class="col">
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Empresa o entidad:</span> <?php echo $keyExp['empresa']; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Tipo empresa:</span> <?php echo $keyExp['empresa_publica_privada']; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Pais:</span> <?php echo $keyExp['pais']; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Departamento:</span> <?php echo $keyExp['departamento']; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Municipio:</span> <?php echo $keyExp['municipio']; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Correo electronico:</span> <?php echo $keyExp['correo_electronico']; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Telefono:</span> <?php echo $keyExp['telefono']; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Fecha de ingreso:</span> <?php echo $keyExp['fecha_ingreso']; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Fecha de retiro:</span> <?php echo $keyExp['fecha_retiro']; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Cargo:</span> <?php echo $keyExp['cargo']; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Direccion:</span> <?php echo $keyExp['direccion']; ?></h5>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif ?>

            <?php if ($numRowRefFam != 0): ?>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="title">Referencias Familiares</h3>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <?php foreach ($resConRefFam as $keyRef) { ?>
                          <div class="col">
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Nombre:</span> <?php echo $keyRef['nombre']; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">N° de documento:</span> <?php echo $keyRef['documento']; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Celular:</span> <?php echo $keyRef['celular']; ?></h5>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="title">Referencias Laborales</h3>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <?php foreach ($resConRefLab as $keyRef) { ?>
                          <div class="col">
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Nombre:</span> <?php echo $keyRef['nombre']; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">N° de documento:</span> <?php echo $keyRef['documento']; ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Celular:</span> <?php echo $keyRef['celular']; ?></h5>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif ?>


            <?php if ($_GET['cargo'] == 'Consignatario Taquillero'): 
            $sqlTaquillero = "SELECT * FROM files_taquillero where postulado_id = :id";
            $conTaquillero = $objConexion->prepare($sqlTaquillero);
            $conTaquillero->bindParam(':id', $id);
            $conTaquillero->execute();
            $resTaquillero = $conTaquillero->fetchAll();
            if ($conTaquillero->rowCount() >= 1) {
              
            ?>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="title">Anexos</h3>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <?php foreach ($resTaquillero as $key2) { ?>
                          <div class="col">
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Vinculado a la empresa:</span> 
                              <?php echo $key2['vinculado']; ?>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Antecedentes diciplinarios:</span> 
                              <a href="../../imagesPostulados/taquillero/images/<?php echo $key2['foto2Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Pasado judicial:</span> 
                              <a href="../../imagesPostulados/taquillero/images/<?php echo $key2['foto3Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Certificado de afiliacion a EPS:</span> 
                              <a href="../../imagesPostulados/taquillero/images/<?php echo $key2['foto8Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <?php if ($key2['foto5Taquillero'] != ''): ?>
                              <h5>
                                <span class="badge badge-primary" style="font-size: 17px;">Certificado de experiencia laboral 2:</span> 
                                <a href="../../imagesPostulados/taquillero/images/<?php echo $key2['foto5Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                              </h5>
                            <?php endif ?>
                          </div>
                          <div class="col">
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Certificado de estudios:</span> 
                              <a href="../../imagesPostulados/taquillero/pdf/<?php echo $key2['pdf1Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Certificado fondo de pensiones:</span> 
                              <a href="../../imagesPostulados/taquillero/images/<?php echo $key2['foto9Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de cedula:</span> 
                              <a href="../../imagesPostulados/taquillero/images/<?php echo $key2['foto6Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Fotografia(fondo azul 3x4):</span> 
                              <a href="../../imagesPostulados/taquillero/images/<?php echo $key2['foto1Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <?php if ($genero == 'Masculino'): ?>
                              <h5>
                                <span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de libreta militar:</span> 
                                <a href="../../imagesPostulados/taquillero/images/<?php echo $key2['foto7Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                              </h5>
                            <?php endif ?>
                            <?php if ($key2['foto4Taquillero'] != ''): ?>
                              <h5>
                                <span class="badge badge-primary" style="font-size: 17px;">Certificado de experiencia laboral 1:</span> 
                                <a href="../../imagesPostulados/taquillero/images/<?php echo $key2['foto4Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                              </h5>
                            <?php endif ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } endif ?>

            <?php if ($_GET['cargo'] == 'Consignatario Satellite'): 
            $sqlSatellite = "SELECT * FROM files_satellite where postulado_id = :id";
            $conSatellite = $objConexion->prepare($sqlSatellite);
            $conSatellite->bindParam(':id', $id);
            $conSatellite->execute();
            $resSatellite = $conSatellite->fetchAll();
            if ($conSatellite->rowCount() >= 1) {
              
            ?>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="title">Anexos</h3>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <?php foreach ($resSatellite as $key2) { ?>
                          <div class="col">
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">RUT:</span> 
                              <a href="../../imagesPostulados/satellite/images/<?php echo $key2['foto1Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Camara y comercio del establecimiento:</span> 
                              <a href="../../imagesPostulados/satellite/images/<?php echo $key2['foto2Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Fotografia(fondo azul 3x4):</span> 
                              <a href="../../imagesPostulados/satellite/images/<?php echo $key2['foto3Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Antecedentes diciplinarios:</span> 
                              <a href="../../imagesPostulados/satellite/images/<?php echo $key2['foto4Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <?php if ($key2['foto6Satellite'] != ''): ?>
                              <h5>
                                <span class="badge badge-primary" style="font-size: 17px;">Certificado de experiencia laboral 1:</span> 
                                <a href="../../imagesPostulados/satellite/images/<?php echo $key2['foto6Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                              </h5>
                            <?php endif ?>
                          </div>
                          <div class="col">
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Pasado judicial:</span> 
                              <a href="../../imagesPostulados/satellite/images/<?php echo $key2['foto5Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Certificado de estudios:</span> 
                              <a href="../../imagesPostulados/satellite/pdf/<?php echo $key2['pdf1Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de cedula:</span> 
                              <a href="../../imagesPostulados/satellite/images/<?php echo $key2['foto8Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <?php if ($genero == 'Masculino'): ?>
                              <h5>
                                <span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de libreta militar:</span> 
                                <a href="../../imagesPostulados/satellite/images/<?php echo $key2['foto9Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                              </h5>
                            <?php endif ?>
                            <?php if ($key2['foto7Satellite'] != ''): ?>
                              <h5>
                                <span class="badge badge-primary" style="font-size: 17px;">Certificado de experiencia laboral 1:</span> 
                                <a href="../../imagesPostulados/satellite/images/<?php echo $key2['foto7Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                              </h5>
                            <?php endif ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } endif ?>

            <?php if ($_GET['cargo'] == 'auxiliar'): 
            $sqlAuxiliar = "SELECT * FROM files_auxiliar where postulado_id = :id";
            $conAuxiliar = $objConexion->prepare($sqlAuxiliar);
            $conAuxiliar->bindParam(':id', $id);
            $conAuxiliar->execute();
            $resAuxiliar = $conAuxiliar->fetchAll();
            if ($conAuxiliar->rowCount() >= 1) {
              
            ?>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="title">Anexos</h3>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <?php foreach ($resAuxiliar as $key2) { ?>
                          <div class="col">
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Fotografia(fondo azul 3x4):</span> 
                              <a href="../../imagesPostulados/auxiliar/images/<?php echo $key2['foto1Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Antecedentes diciplinarios:</span> 
                              <a href="../../imagesPostulados/auxiliar/images/<?php echo $key2['foto3Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Pasado juducial:</span> 
                              <a href="../../imagesPostulados/auxiliar/images/<?php echo $key2['foto4Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Certificado de estudios:</span> 
                              <a href="../../imagesPostulados/auxiliar/pdf/<?php echo $key2['pdf2Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Certificado de experiencia laboral 1:</span> 
                              <a href="../../imagesPostulados/auxiliar/images/<?php echo $key2['foto5Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                          </div>
                          <div class="col">
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de cedula:</span> 
                              <a href="../../imagesPostulados/auxiliar/images/<?php echo $key2['foto8Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Certificado de afiliacion a EPS:</span> 
                              <a href="../../imagesPostulados/auxiliar/images/<?php echo $key2['foto12Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Certificado fondo de pensiones:</span> 
                              <a href="../../imagesPostulados/auxiliar/images/<?php echo $key2['foto13Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <?php if ($genero == 'Masculino'): ?>
                              <h5>
                                <span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de libreta militar:</span> 
                                <a href="../../imagesPostulados/auxiliar/images/<?php echo $key2['foto10Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                              </h5>
                            <?php endif ?>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Certificado de experiencia laboral 2:</span> 
                              <a href="../../imagesPostulados/auxiliar/images/<?php echo $key2['foto6Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } endif ?>

            <?php if ($_GET['cargo'] == 'conductor'): 
            $sqlConductor = "SELECT * FROM files_conductor where postulado_id = :id";
            $conConductor = $objConexion->prepare($sqlConductor);
            $conConductor->bindParam(':id', $id);
            $conConductor->execute();
            $resConductor = $conConductor->fetchAll();
            if ($conConductor->rowCount() >= 1) {
              
            ?>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="title">Anexos</h3>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <?php foreach ($resConductor as $key2) { ?>
                          <div class="col">
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Fotografia fondo azul 3x4:</span> 
                              <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto1Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Antecedentes diciplinarios:</span> 
                              <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto3Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Pasado juducial:</span> 
                              <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto4Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Certificado de estudios:</span> 
                              <a href="../../imagesPostulados/conductor/pdf/<?php echo $key2['pdf2Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de pasado judicial:</span> 
                              <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto11Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Certificado fondo de pensiones:</span> 
                              <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto15Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Examen de conduccion, realizado por el inspector Perito<br> "prueba de conduccion":</span> 
                              <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto16Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Certificado manejo defensivo:</span> 
                              <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto17Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Concepto jefe rodamiento:</span> 
                              <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto18Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                          </div>
                          <div class="col">
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Fotocopia a blanco y negro de certificados de conduccion:</span> 
                              <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto12Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Ultimo paz y salvo<br>(Asociado o empresa donde halla laborado):</span> 
                              <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto13Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Certificado de afiliacion a EPS:</span> 
                              <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto14Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <?php if ($genero == 'Masculino'): ?>
                              <h5>
                                <span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de libreta militar:</span> 
                                <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto10Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                              </h5>
                            <?php endif ?>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Certificado de experiencia laboral 1:</span> 
                              <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto5Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Certificado de experiencia laboral 2:</span> 
                              <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto6Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Simit:</span> 
                              <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto7Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de cedula:</span> 
                              <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto8Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                            <h5>
                              <span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de licencia de conduccion:</span> 
                              <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto9Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
                            </h5>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } endif ?>

            <?php if ($miEstado == 'Citado a entrevista') {
            $sqlEntrevista = "SELECT * FROM entrevista where postulado_id = :id";
            $conEntrevista = $objConexion->prepare($sqlEntrevista);
            $conEntrevista->bindParam(':id', $id);
            $conEntrevista->execute();
            $resEntrevista = $conEntrevista->fetchAll(); ?>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="title">Entrevista</h3>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <?php foreach ($resEntrevista as $key3) { ?>
                          <div class="col">
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Fecha:</span> <?php echo $key3['fecha'] ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Lugar:</span> <?php echo $key3['lugar'] ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Hora:</span> <?php echo $key3['hora'] ?></h5>
                            <h5><span class="badge badge-primary" style="font-size: 17px;">Observaciones:</span> <?php echo $key3['obs'] ?></h5>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>

            <?php if ($_GET['estado'] == 'Postulado' ): ?>
              <form action="view_pdf.php" method="post" target="_blank">
                <input type="hidden" name="idk" value="<?php echo $idk; ?>">
                <button type="submit" class="btn btn-outline-primary">
                  <i class="fa fa-file-pdf"></i> Generar hoja de vida en pdf
                </button>
              </form>
              <br>

              <a href="delete.php?id=<?php echo $_REQUEST['id'] ?>&delete=si&cargo=<?php echo $_REQUEST['cargo'] ?>&estado=<?php echo $_REQUEST['estado'] ?>" class="btn btn-outline-danger mt-1 mb-2"><i class="fa fa-trash-alt"></i> Rechazar hoja de vida del postulado</a>

              <button type="button" class="btn btn-outline-success mt-1 mb-2" data-toggle="modal" data-target="#Modal"><i class="fa fa-clock"></i> Citar a entrevista</button>
            <?php endif ?>

            <?php if ($_GET['estado'] == 'Citado a entrevista' ): ?>
              <form action="view_pdf.php" method="post" target="_blank">
                <input type="hidden" name="idk" value="<?php echo $idk; ?>">
                <button type="submit" class="btn btn-outline-primary">
                  <i class="fa fa-file-pdf"></i> Generar hoja de vida en pdf
                </button>
              </form>
              <br>

              <a href="delete.php?id=<?php echo $_REQUEST['id'] ?>&delete=si&cargo=<?php echo $_REQUEST['cargo'] ?>&estado=<?php echo $_REQUEST['estado'] ?>" class="btn btn-outline-danger mt-1 mb-2"><i class="fa fa-trash-alt"></i> Rechazar hoja de vida del postulado</a>
            <?php endif ?>

            <!-- Modal -->
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header" style="background-color: #218838;">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">Citar a entrevista</h5>
                        <button style="margin-top: -25px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: #fff;">&times;</span>
                        </button>
                      </div>
                      <form action="citar.php" method="get">
                        <div class="modal-body">
                          <input type="hidden" name="cargo" value="<?php echo $_GET['cargo'] ?>">
                          <input type="hidden" name="estado" value="<?php echo $_GET['estado'] ?>">
                          <input type="hidden" name="id" value="<?php echo $id ?>">
                        <div class="form-group">
                          <label for="fecha">Fecha</label>
                          <input required type="date" class="form-control" id="fecha" name="fecha">
                        </div>
                        <div class="form-group">
                          <label for="hora">Hora</label>
                          <input required type="time" class="form-control" onchange="onTimeChange()" id="hora1" name="hora1">
                          <input required type="hidden" class="form-control" id="hora" name="hora">
                        </div>
                        <div class="form-group">
                          <label for="lugar">Lugar</label>
                          <input required type="text" class="form-control" id="lugar" name="lugar">
                        </div>
                        <div class="form-group">
                          <label for="obs">Observaciones</label>
                          <input type="text" class="form-control" id="obs" name="obs">
                        </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary">Citar</button>
                        </div>
                      </form>
                  </div>
                </div>
            </div>


          </div>
        </div>
      </main>
    </div>
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
    <script type="text/javascript" src="../../assets/js/mainAd.js"></script>
    <!-- Plugins and scripts required by this view-->
    <!-- <script src="node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js"></script> -->
    <!-- <script src="js/main.js"></script> -->

    <script type="text/javascript">
      var inputEle = document.getElementById('hora1');
      function onTimeChange() {
        var timeSplit = inputEle.value.split(':'),
          hours,
          minutes,
          meridian;
        hours = timeSplit[0];
        minutes = timeSplit[1];
        if (hours > 12) {
          meridian = 'PM';
          hours -= 12;
        } else if (hours < 12) {
          meridian = 'AM';
          if (hours == 0) {
            hours = 12;
          }
        } else {
          meridian = 'PM';
        }
        var time = hours + ':' + minutes + ' ' + meridian;
        $('#hora').val(time);
      }
    </script>
  </body>
</html>
