<?php 

extract($_REQUEST);
extract($_POST);

// Redirecionar con variables de mes y año si no vienen en la URL
if (!isset($_REQUEST['mes']) && !isset($_REQUEST['ano'])) {
  $mes = date('n');
  $ano = date('Y');
  header("location:informes.php?mes=".$mes."&ano=".$ano);
}

require "../assets/config/ConexionBaseDatos_PDO.php";
require "../postulados/seg.php";

$objConexion=conectaDb();

$mes = $_REQUEST['mes'];
$ano = $_REQUEST['ano'];

if (!isset($_REQUEST['modalidad']) || $_REQUEST['modalidad'] == 'Todos') {
  $modalidad = '';
} else {
  $modalidad = 'modalidad = "'.$_REQUEST['modalidad'].'" and';
}


switch ($mes) {
  case '1':
    $fecha_string = 'Enero '.$ano;
    break;
  case '2':
    $fecha_string = 'Febrero '.$ano;
    break;
  case '3':
    $fecha_string = 'Marzo '.$ano;
    break;
  case '4':
    $fecha_string = 'Abril '.$ano;
    break;
  case '5':
    $fecha_string = 'Mayo '.$ano;
    break;
  case '6':
    $fecha_string = 'Junio '.$ano;
    break;
  case '7':
    $fecha_string = 'Julio '.$ano;
    break;
  case '8':
    $fecha_string = 'Agosto '.$ano;
    break;
  case '9':
    $fecha_string = 'Septiembre '.$ano;
    break;
  case '10':
    $fecha_string = 'Octubre '.$ano;
    break;
  case '11':
    $fecha_string = 'Noviembre '.$ano;
    break;
  case '12':
    $fecha_string = 'Diciembre '.$ano;
    break;
  
  default:
    $fecha_string = 'Ocurrio un error '.$ano;
    break;
}

$a = 2019;
$m = 7;

for ($i=1; $i <= 7 ; $i++) { 

  $fecha_1 = $a.'-0'.$m.'-01';
  $fecha_2 = $a.'-0'.$m.'-31';

  $sql_operativos = $objConexion->prepare('SELECT * from operativos where '.$modalidad.' fecha_operativo between "'.$fecha_1.'" and "'.$fecha_2.'"');
  $sql_operativos->execute();

  $cant_operativos[$i] = $sql_operativos->rowCount();

  if ($m == 12) {
    $m = 1;
    $a = 2020;
  } else {
    $m = $m + 1;
  }

}

?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="author" content="cootranshuila">
    <title>Cootranshuila - Sanciones</title>
    <link rel="icon" type="image/png" href="../assets/img/logo-icon.png">
    <!-- Icons-->
    <link href="../assets/css/coreui-icons.min.css" rel="stylesheet">
    <link href="../assets/css/flag-icon.min.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/simple-line-icons.css" rel="stylesheet">
    <link href="../assets/css/Chart.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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

    <!-- MODAL RESPUESTAS -->
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-info modal-md" role="document">
        <div class="modal-content" id='ModalRespuestas'>
          <div class="modal-body">
            <h3 class="text-center mt-3">Seleccione el mes, año y modalidad</h3>
            <form action="informes.php" method="GET">
              <div class="row p-5">
                <select name="mes" class="col-3 form-control">
                  <option value="1">Enero</option>
                  <option value="2">Febrero</option>
                  <option value="3">Marzo</option>
                  <option value="4">Abril</option>
                  <option value="5">Mayo</option>
                  <option value="6">Junio</option>
                  <option value="7">Julio</option>
                  <option value="8">Agosto</option>
                  <option value="9">Septiembre</option>
                  <option value="10">Octubre</option>
                  <option value="11">Noviembre</option>
                  <option value="12">Diciembre</option>
                </select>
                <div class="col-1"></div>
                <input type="number" name="ano" class="col-3 form-control" value="2019" required placeholder="Escriba el año">
                <div class="col-1"></div>
                <select name="modalidad" class="col-3 form-control">
                  <option value="Todos">Todos</option>
                  <option value="Doble Yo">Doble Yo</option>
                  <option value="VIP">VIP</option>
                  <option value="Platino Expres">Platino Expres</option>
                  <option value="Platino Jet">Platino Jet</option>
                  <option value="Platino Especial">Platino Especial</option>
                  <option value="Mixto">Mixto</option>
                </select>
                <button type="submit" class="text-center btn btn-success mt-3">Enviar</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.modal-content-->
      </div>
      <!-- /.modal-dialog-->
    </div>


    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.php">
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
            <a class="nav-link" href="pqrs/index.php">PQR's</a>
          </li>
        <?php endif ?>
        <?php if ($_SESSION['rol'] == 'Especial' or $_SESSION['rol'] == 'Todos'): ?>
          <li class="nav-item px-3">
            <a class="nav-link" href="#">Servicio especial</a>
          </li>
          <?php endif ?>
          <?php if ($_SESSION['rol'] == 'Modem y GPS' or $_SESSION['rol'] == 'Todos'): ?>
          <li class="nav-item px-3">
            <a class="nav-link" href="#">Modem y GPS</a>
          </li>
          <?php endif ?>
          <?php if ($_SESSION['rol'] == 'Sanciones' or $_SESSION['rol'] == 'Todos' or $_SESSION['rol'] == 'Operativos'): ?>
          <li class="nav-item px-3">
            <a class="nav-link" href="index.php">Sanciones</a>
          </li>
          <?php endif ?>
          <?php if ($_SESSION['rol'] == 'Postulados' or $_SESSION['rol'] == 'Todos'): ?>
          <li class="nav-item px-3">
            <a class="nav-link" href="postulados/index.php?cargo=conductor&estado=Postulado">Postulados</a>
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
          <?php if ($_SESSION['rol'] == 'Sanciones' or $_SESSION['rol'] == 'Todos') { ?>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="nav-icon icon-clock"></i> Operativos en proceso
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="terminados.php">
                <i class="nav-icon icon-check"></i> Operativos terminados
              </a>
            </li>
          <?php } if ($_SESSION['rol'] == 'Operativos' or $_SESSION['rol'] == 'Sanciones' or $_SESSION['rol'] == 'Todos') { ?>
            <li class="nav-item">
              <a class="nav-link" href="agregar-operativo.php">
                <i class="nav-icon icon-plus"></i> Agregar Operativo
              </a>
            </li>
          <?php } 
            if ($_SESSION['rol'] == 'Sanciones' or $_SESSION['rol'] == 'Todos') { ?>
            <li class="nav-title"> Informes</li>
            <li class="nav-item">
              <a class="nav-link" href="informes.php">
                <i class="nav-icon icon-graph"></i> Informes
              </a>
            </li>
          <?php } ?>
          </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
      <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item">Sanciones</li>
          <li class="breadcrumb-item active">Informe mensual</li>
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
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Informe mensual
                    <div class="text-right float-right"><h4><a style="cursor: pointer;" data-toggle="modal" data-target="#infoModal"><span class="badge badge-info p-2"><?php echo $fecha_string; ?></span></a></h4></div>
                  </div>
                  <div class="card-body">

                    <!-- INICIO DE GRAFICAS -->
                    <div class="row">
                      <div class="col-12">

                      <?php 

                        $fecha_ini = $ano.'-0'.$mes.'-01';
                        $fecha_fin = $ano.'-0'.$mes.'-31';
                        $total_op = 0;
                        $op_con_obs = 0;
                        $op_sin_obs = 0;

                        $iniciados = 0;
                        $descargos = 0;
                        $finalizados = 0;

                        $sql_op = $objConexion->prepare('SELECT * from operativos where '.$modalidad.' fecha_operativo between "'.$fecha_ini.'" and "'.$fecha_fin.'"');
                        $sql_op->execute();

                        $data_sql_op = $sql_op->fetchAll();

                        foreach ($data_sql_op as $row) {

                            // Contar el total de operativos, con observacion y sin observaciones
                            $total_op = $total_op + 1;
                            if ($row['observaciones'] == NULL) {
                              $op_sin_obs = $op_sin_obs + 1;
                            } else {
                              $op_con_obs = $op_con_obs + 1;
                            }

                            // Contar la cantidad de operativos por estado Iniciado, en descargos y finalizados
                            switch ($row['estado']) {
                              case 'Iniciado':
                                $iniciados = $iniciados + 1;
                                break;
                              case 'En descargos':
                                $descargos = $descargos + 1;
                                break;
                              case 'Finalizado':
                                $finalizados = $finalizados + 1;
                                break;
                              
                            }

                            // Contar la cantidad de usuarios y cuantos operativos ingreso cada uno

                          
                        }

                      ?>

                        <div class="row">
                          <div class="col-sm-4">
                            <div class="callout callout-info">
                              <small class="text-muted">Total Operativos</small>
                              <br>
                              <strong class="h4"><?php echo $total_op; ?></strong>
                              <div class="chart-wrapper">
                                <canvas id="sparkline-chart-1" width="100" height="30"></canvas>
                              </div>
                            </div>
                          </div>
                          <!-- /.col-->
                          <div class="col-sm-4">
                            <div class="callout callout-danger">
                              <small class="text-muted">Con Observaciones</small>
                              <br>
                              <strong class="h4"><?php echo $op_con_obs; ?></strong>
                              <div class="chart-wrapper">
                                <canvas id="sparkline-chart-2" width="100" height="30"></canvas>
                              </div>
                            </div>
                          </div>
                          <!-- /.col-->
                          <div class="col-sm-4">
                            <div class="callout callout-success">
                              <small class="text-muted">Sin Observaciones</small>
                              <br>
                              <strong class="h4"><?php echo $op_sin_obs; ?></strong>
                              <div class="chart-wrapper">
                                <canvas id="sparkline-chart-4" width="100" height="30"></canvas>
                              </div>
                            </div>
                          </div>
                          <!-- /.row-->
                        </div>

                        <!-- /.row-->
                        <hr class="mt-0">
                        <div class="progress-group mb-4 p-3">
                          <div class="progress-group-prepend">
                            <span class="progress-group-text">Operativos</span>
                          </div>
                          <div class="progress-group-bars">
                            <div class="progress progress-sm mb-1">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress progress-sm mb-1">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo ($op_con_obs * 100) / $total_op; ?>%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress progress-sm">
                              <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo ($op_sin_obs * 100) / $total_op; ?>%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      
                        <div class="card col-md-12">
                          <div class="chart-wrapper">
                            <canvas id="canvas-5"></canvas>
                          </div>
                        </div>
                      
                      
                      </div>
                      <!-- /.col-->
                    </div>

                  </div>
                </div>
              </div>
              

              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Jefes de operativos
                    <!-- <div class="text-right float-right"><h4><a style="cursor: pointer;" data-toggle="modal" data-target="#infoModal"><span class="badge badge-info p-2">Busqueda avanzada</span></a></h4></div> -->
                  </div>
                  <div class="card-body">

                    <table class="table table-responsive-sm">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Nombre</th>
                          <th>Cantidad ingresados</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php

                        $sqlCantidad = $objConexion->prepare('SELECT nom_usuario, count(*) as cantidad from operativos where '.$modalidad.' fecha_operativo between "'.$fecha_ini.'" and "'.$fecha_fin.'" group by nom_usuario order by cantidad desc');
                        $sqlCantidad->execute();

                        $cantxuser = $sqlCantidad->fetchAll();

                        $cant = 1;

                        foreach ($cantxuser as $key) { ?>
                          <tr>
                            <td><b><?php echo $cant; ?></b></td>
                            <td><?php echo $key['nom_usuario']; ?></td>
                            <td><?php echo $key['cantidad']; ?></td>
                          </tr>
                        <?php $cant = $cant + 1; } ?>

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

              <div class="container-flui col-lg-6">
                <div class="animated fadeIn">
                  <div class="card">
            
                      <div class="card" style='border:none; padding:15px;'>
                        <div class="chart-wrapper">
                          <canvas id="canvas"></canvas>
                        </div>
                      </div>
                      
                  </div>  
                </div>
              </div>

              <div class="container-fluid">
                <div class="animated fadeIn">
                  <div class="card">
                      
                      <div class="card" style='border:none; padding:15px;'>
                        <div class="chart-wrapper">
                          <canvas id="chart-legend-bottom"></canvas>
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
    <footer class="app-footer">
      <div>
        <a href="https://www.cootranshuila.com">Cootranshuila</a>
        <span>&copy; 2020.</span>
      </div>
    </footer>
    <!-- CoreUI and necessary plugins-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/pace.min.js"></script>
    <script src="../assets/js/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/coreui.min.js"></script>
    <script src="../assets/js/chart/Chart.js"></script>
    <!-- <script src="../assets/js/charts.js"></script> -->
    <script type="text/javascript" src="../../assets/js/mainAd.js"></script>

    <!-- Plugins and scripts required by this view-->
    <!-- <script src="node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js"></script> -->
    <!-- <script src="js/main.js"></script> -->
    <script>$('[data-toggle="tooltip"]').tooltip();</script>

    <script>
    
      var pieChart = new Chart($('#canvas-5'), {
          type: 'pie',
          data: {
            labels: ['<?php echo $iniciados; ?> Iniciados', '<?php echo $descargos; ?> En descargos', '<?php echo $finalizados; ?> Sancion aplicada'],
            datasets: [{
              data: [<?php echo ($iniciados * 100) / $total_op; ?>, <?php echo ($descargos * 100) / $total_op; ?>, <?php echo ($finalizados * 100) / $total_op; ?>],
              backgroundColor: ['#4dbd74', '#ffce56', '#ff6384'],
              hoverBackgroundColor: ['#4dbd74', '#ffce56', '#ff6384']
            }]
          },
          options: {
            responsive: true
          }
      });
    
    </script>

  <script>

    window.chartColors = {
      color1: 'rgb(255, 99, 132)',
      color2: 'rgb(255, 159, 64)',
      color3: 'rgb(255, 205, 86)',
      color4: 'rgb(75, 192, 192)',
      color5: 'rgb(54, 162, 235)',
      color6: 'rgb(153, 102, 255)',
      color7: 'rgb(201, 203, 207)'
    };

		var color = Chart.helpers.color;
		var barChartData = {
      datasets: [{
        label: 'Base',
        data: [ 0 ]
      }, 
      
      <?php

        $num = 1;
        foreach ($cantxuser as $row) {
          echo "
            {
              label: '".$row['nom_usuario']."',
              backgroundColor: color(window.chartColors.color".$num.").alpha(0.7).rgbString(),
              borderColor: window.chartColors.color".$num.",
              borderWidth: 1,
              data: [ ".$row['cantidad']." ]
            },
          ";
          $num = $num + 1;
        }
      
      ?>
      ]

		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: 'top',
          },
					title: {
						display: true,
						text: 'Operativos aregados por usuario'
					}
				}
			});

    };

    // Chart en meses
    function createConfig(legendPosition, colorName) {
			return {
				type: 'line',
				data: {
					labels: ['Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre', 'Enero'],
					datasets: [{
						label: 'Operativos por mes',
						data: [
              <?php
              for ($i=1; $i <=7 ; $i++) { 
                echo $cant_operativos[$i].',';
              }
              ?>
						],
						backgroundColor: color(window.chartColors.color4).alpha(0.7).rgbString(),
            borderColor: window.chartColors.color4,
						borderWidth: 1
					}]
				},
				options: {
					responsive: true,
					legend: {
						position: legendPosition,
					},
					scales: {
						x: {
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Month'
							}
						},
						y: {
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Value'
							}
						}
					},
					title: {
						display: true,
						text: 'Cantidad operativos por mes'
					}
				}
			};
		}

		// window.onload = function() {
				// var ctx = document.getElementById($('#chart-legend-bottom')).getContext('2d');
				var config = createConfig('bottom', 'green');
				window.myBar2 = new Chart($('#chart-legend-bottom'), config);
		// };
    
	</script>

  </body>
</html>