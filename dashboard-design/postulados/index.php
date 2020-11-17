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


$sql1 = "SELECT * from postulado WHERE cargo = '".$cargo."' and estado = '".$estado."'";
$con1 = $objConexion->prepare($sql1);
$con1->execute();
$cantidad = $con1->rowCount();


$pagination->rowCount($cantidad);
$pagination->config(1, 15);
$sql = "SELECT * from postulado WHERE estado = :estado and cargo = :para order by id DESC LIMIT $pagination->start_row, $pagination->max_rows";
$query = $conexion->prepare($sql);
$query->bindParam(':para', $cargo);
$query->bindParam(':estado', $estado);
$query->execute();
$total = $query->rowCount();
$model = array();
while($rows = $query->fetch()){
  $model[] = $rows;
}

if ($_GET['cargo'] == 'conductor' ){
  $class1 = 'active';
  $echoCargo = 'Conductores';
} 
if ($_GET['cargo'] == 'auxiliar' ){
  $class2 = 'active';
  $echoCargo = 'Auxiliares de conduccion';
} 
if ($_GET['cargo'] == 'Consignatario Taquillero' ){
  $class3 = 'active';
  $echoCargo = 'Consignatarios taquilleros';
} 
if ($_GET['cargo'] == 'Consignatario Satellite' ){
  $class4 = 'active';
  $echoCargo = 'Consignatarios satellites';
} 


if ($_SESSION['rol'] == 'Postulados' || $_SESSION['rol'] == 'Todos') {
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
          <a class="nav-link" data-toggle="dropdown" href="index.php?cargo=conductor&estado=Postulado" role="button" aria-haspopup="true" aria-expanded="false">
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
          <li class="breadcrumb-item">Postulados</li>
          <li class="breadcrumb-item active"><?php echo $echoCargo; ?></li>
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
            

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-search"></i> Buscar
                  </div>
                  <div class="card-body">
                    <form action="buscar.php" method="post">
                      <div class="row">
                        <div class="form-group col-sm-3">
                          <label for="tipo">Buscar por:</label>
                          <select class="form-control" id="tipo" name="tipo">
                            <option value="Identificacion">Identificacion</option>
                            <option value="Nombre">Nombre</option>
                            <option value="Apellido">Apellido</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-6">
                          <label for="buscar">Parametro de busqueda</label>
                          <input class="form-control" id="buscar" type="text" name="buscar" placeholder="Buscar...">
                        </div>
                        <div class="form-group col-sm-3">
                          <button type="submit" style="margin-top: 28px;" class="btn btn-outline-success">Buscar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-3">
              <?php if ( isset($existe) && $existe == 'no' ) { ?>
                <div class="alert alert-danger">
                  El postulado no existe!
                </div>
              <?php } ?>

              <?php if ( isset($del) && $del == 'si' ) { ?>
                <div class="alert alert-success">
                  El postulado se ha rechazado
                </div>
              <?php } ?>
            </div>


            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-users"></i> <?php echo $echoCargo; ?>
                  </div>
                  <div class="card-body">
                    <?php
                    if ($_GET['estado'] == 'Postulado' ) { ?>
                      <?php $echoEstado = 'Postulados' ?>
                      <a class="btn btn-outline-warning mb-1" href="index.php?cargo=<?php echo $_GET['cargo'] ?>&estado=Rechazado"><i class="fa fa-user-times"></i> Rechazados</a>
                      <a class="btn btn-outline-primary mb-1" href="index.php?cargo=<?php echo $_GET['cargo'] ?>&estado=Citado+a+entrevista"><i class="fa fa-calendar-check"></i> Citados a entrevista</a>
                    <?php }
                    ?>
                                  <?php
                    if ($_GET['estado'] == 'Rechazado' ) { ?>
                      <?php $echoEstado = 'Rechazados' ?>
                      <a class="btn btn-outline-success mb-1" href="index.php?cargo=<?php echo $_GET['cargo'] ?>&estado=Postulado"><i class="fa fa-user-tie"></i> Postulados</a>
                      <a class="btn btn-outline-primary mb-1" href="index.php?cargo=<?php echo $_GET['cargo'] ?>&estado=Citado+a+entrevista"><i class="fa fa-calendar-check"></i> Citados a entrevista</a>
                    <?php }
                    ?>
                    <?php
                    if ($_GET['estado'] == 'Citado a entrevista' ) { ?>
                      <?php $echoEstado = 'Citados a entrevista' ?>
                      <a class="btn btn-outline-success mb-1" href="index.php?cargo=<?php echo $_GET['cargo'] ?>&estado=Postulado"><i class="fa fa-user-tie"></i> Postulados</a>
                      <a class="btn btn-outline-warning mb-1" href="index.php?cargo=<?php echo $_GET['cargo'] ?>&estado=Rechazado"><i class="fa fa-user-times"></i> Rechazados</a>
                    <?php }
                    ?>
                    <hr>
                    <h4 class="title text-center">Lista de <?php echo $echoEstado; ?></h4>
                    <div class="row container">
                      <table class="table table-responsive-sm">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>N° de documento</th>
                            <th>Email</th>
                            <th>Celular</th>
                            <th class="text-right">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            foreach ($model as $row) {
                              $nombreC = utf8_decode($row['nombres']." ".$row['apellidos']);
                              $nombreC = strtolower($nombreC);
                              $stateVisto = $row['visto'];
                              $nombreC = str_replace('?', '&ntilde;', $nombreC);
                              if( $stateVisto == 'no'){ ?>
                              <tr style="background-color: #b8daff;">
                            <?php }else{ ?>
                              <tr>
                            <?php } ?>
                              <td><?php echo ucfirst($nombreC); ?></td>
                              <td><?php echo $row['numero_identificacion']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['numero_celular']; ?></td>
                              <!-- <td><?php #echo $row['cargo']; ?></td> -->
                              <td class="td-actions text-right">
                                <a href="view.php?id=<?php echo $row['numero_identificacion'] ?>&cargo=<?php echo $_GET['cargo'] ?>&estado=<?php echo $_GET['estado'] ?>" data-toggle="tooltip" data-placement="top" title="Ver perfil" class="btn btn-outline-info btn-link btn-sm"><i class="far fa-eye"></i></a>
                              </td>
                            </tr>
                            <?php }
                          ?>
                        </tbody>
                      </table>
                      <ul class="pagination">
                        <?php
                          $pagination->pages("btn1 btn btn-primary ml-2 page-item ");
                        ?>
                      </ul>
                    </div>
                  </div>
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
  </body>
</html>
<?php 
}
else{
  header("location:../Administrador.php?x=1");
}
?>