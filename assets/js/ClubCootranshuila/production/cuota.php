<?php

  include('../config/seguridad.php');
  include('../config/ConexionBaseDatos_PDO.php');

  $objConexion=conectaDb();

  $sql= $objConexion->prepare("select * from usuarios where num_usuario = :num");
  $sql->bindParam(":num", $_SESSION['usr']);
  $sql->execute();

  $resultado = $sql->fetchAll();

  foreach ($resultado as $row) {
    $nombre_usuario = $row['nombre_usuario'];
    $rol = $row['tipo_usuario']; //Rol del usuario
  }

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/loog.png" type="image/ico" />

    <title>Cootranshuila Team | Cuota</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col" style="position: fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <!-- <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a> -->
              <img src="images/logo2.png" class="img-responsive" style="padding: 25px; margin-top:-15px;" alt="logo">
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user.png" alt="user" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo $nombre_usuario; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Inicio </a></li>
                  <li class="active"><a href="cuota.php"><i class="fa fa-tasks"></i> Cuota y Aporte </a></li>
                  <li><a><i class="fa fa-edit"></i> Registros </a></li>
                  <li><a><i class="fa fa-sitemap"></i> Actividades </a></li>
                  <?php if($rol == 'Admin'){ ?> <li><a href="usuarios.php"><i class="fa fa-group"></i> Usuarios </a></li> <?php } ?>
                  <!-- <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li> -->
                </ul>
              </div>
              <div class="menu_section">
                <h3>Extras</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bicycle"></i> Rutas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">Crear ruta</a></li>
                      <!-- <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li> -->
                    </ul>
                  </li>
                  <!-- <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li> -->
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/user.png" alt=""><?php echo $nombre_usuario; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <!-- <span class="badge bg-red pull-right">50%</span> -->
                        <span>Configuracion</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ayuda</a></li>
                    <li><a href="../config/cerrar_session.php"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green"></span> <!-- Numero de mensajes o notificaciones  -->
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

          <!-- MI CONTENIDO -->
          <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Cootranshuila Team <small> - Couta y Aporte semanal</small></h2>
                        <div class="filter">
                            <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <!-- <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b> -->
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="bs-example" data-example-id="simple-jumbotron">
                            <div class="jumbotron">
                                <h3><b><?php echo $nombre_usuario; ?>,</b> es la semana <?php echo $_SESSION['semana']; ?></h3>
                                <p style="font-size: 15px; margin-top: 15px;">Dashboard de administrador, Cootranshuila Team &copy;2019. La cuota semanal es de $10.000 y el aporte de $2.000.</p>
                            </div>
                        </div>

                    </div>

                    <!-- Graficas de dona: PROMEDIOS -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-body">

                                <!-- <p>Easy pie chart is a jQuery plugin that uses the canvas element to render highly customizable, very easy to implement, simple pie charts for single values.</p> -->
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="x_title">
                                            <h4>Cuota Mensual</h4>
                                        </div>
                                        <p>Porcentaje de la cuota semanal del total de usuarios de la semana <?php echo $_SESSION['semana']; ?></p>
                                        <span class="chart" data-percent="86">
                                        <span class="percent"></span>
                                        </span>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="x_title">
                                            <h4>Aporte al Club</h4>
                                        </div>
                                        <p>Porcentaje del aporte semanal al club de la semana <?php echo $_SESSION['semana']; ?></p>
                                        <span class="chart" data-percent="73">
                                        <span class="percent"></span>
                                        </span>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="x_title">
                                            <h4>Promedio</h4>
                                        </div>
                                        <p>Porcentaje total de cuotas y aportes de la semana <?php echo $_SESSION['semana']; ?></p>
                                        <span class="chart" data-percent="60">
                                        <span class="percent"></span>
                                        </span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- TABLA DE USUARIOS -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Usuarios <small>usuarios activos</small></h2>
                                <div class="title_right">
                                  <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 form-group pull-right top_search">
                                    <form id="form-buscar" name="form-buscar">
                                      <div class="input-group">
                                        <input type="text" class="form-control" id="buscador" placeholder="Buscar por identificacion o nombre...">
                                        <span class="input-group-btn">
                                          <button class="btn btn-default" type="submit">Buscar</button>
                                        </span>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">

                                <p>Confirmacion de pago de cuota y aporte de al Club por usuario de la semana <?php echo $_SESSION['semana']; ?>.</p>

                                <div class="table-responsive">
                                    <table class="table table-striped jambo_table bulk_action">
                                        <thead>
                                            <tr class="headings">
                                                <th>
                                                    <input type="checkbox" id="check-all" class="flat">
                                                </th>
                                                <th class="column-title">N° </th>
                                                <th class="column-title">Identificacion </th>
                                                <th class="column-title">Nombre </th>
                                                <th class="column-title text-center" width="100px">Cuota </th>
                                                <th class="column-title text-center" width="100px">Aporte </th>

                                                <th class="bulk-actions" colspan="7">
                                                    <a class="antoo" style="color:#fff; font-weight:500;">Usuarios ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php

                                              if ($rol == 'Admin') {
                                                $query = 'select * from usuarios';
                                              } else {
                                                $query = 'select * from usuarios where num_usuario = '.$_SESSION['usr'];
                                              }

                                              $sql= $objConexion->prepare($query);
                                              $sql->execute();

                                              $res = $sql->fetchAll();

                                              foreach ($res as $row) {

                                                $sql_cuota = $objConexion->prepare("select * from usuarios, cuota, semana where usuarios.num_usuario = :num_u and semana.num_semana = :num_s and cuota.semana_cuota != 'Inicial' and usuarios.estado_usuario = 'Activo' and usuarios.num_usuario = cuota.num_usuario_foreign");
                                                $sql_cuota->bindParam(":num_u", $row['num_usuario']);
                                                $sql_cuota->bindParam(":num_s", $_SESSION['semana']);
                                                $sql_cuota->execute();

                                                $res_cuota = $sql_cuota->rowCount();

                                                if ($res_cuota == 1) {
                                                  $cuota_semana = 1;
                                                } else {
                                                  $cuota_semana = 0;
                                                }

                                                $sql_aporte = $objConexion->prepare("select * from usuarios, aporte, semana where usuarios.num_usuario = :num_u and semana.num_semana = :num_s and aporte.semana_aporte != 'Inicial' and usuarios.estado_usuario = 'Activo' and usuarios.num_usuario = aporte.num_usuario_foreign");
                                                $sql_aporte->bindParam(":num_u", $row['num_usuario']);
                                                $sql_aporte->bindParam(":num_s", $_SESSION['semana']);
                                                $sql_aporte->execute();

                                                $res_aporte = $sql_aporte->rowCount();

                                                if ($res_aporte == 1) {
                                                  $aporte_semana = 1;
                                                } else {
                                                  $aporte_semana = 0;
                                                }
                                                echo '<script>console.log('.$cuota_semana.', '.$aporte_semana.');</script>';

                                            ?>

                                                <tr class="even pointer">
                                                    <td class="a-center ">
                                                        <input type="checkbox" class="flat" name="table_records">
                                                    </td>
                                                    <td class=" ">
                                                        <?php echo $row['num_usuario']; ?>
                                                    </td>
                                                    <td class=" ">
                                                        <?php echo $row['id_usuario']; ?>
                                                    </td>
                                                    <td class=" ">
                                                        <?php echo $row['nombre_usuario']; ?>
                                                    </td>
                                                    <td class="text-center">
                                                      <?php if ($rol == 'Admin') { ?>
                                                        <button type="button" id="btn-cuota<?php echo $row['num_usuario']; ?>" onclick="cuota(<?php echo $row['num_usuario'].', '.$_SESSION['semana']; ?>)" class="btn <?php echo ($cuota_semana == 1) ? 'btn-dark" disabled' : 'btn-success"'; ?> "><i class="fa fa-check"></i></button>
                                                      <?php } else { ?>
                                                        <button type="button" class="btn <?php echo ($cuota_semana == 1) ? 'btn-dark' : 'btn-default'; ?>" disabled><i class="fa fa-check"></i></button>
                                                      <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                      <?php if ($rol == 'Admin') { ?>
                                                        <button type="button" id="btn-aporte<?php echo $row['num_usuario']; ?>" onclick="aporte(<?php echo $row['num_usuario'].', '.$_SESSION['semana']; ?>)" class="btn <?php echo ($aporte_semana == 1) ? 'btn-dark" disabled' : 'btn-success"'; ?> "><i class="fa fa-check"></i></button>
                                                      <?php } else { ?>
                                                        <button type="button" class="btn <?php echo ($aporte_semana == 1) ? 'btn-dark' : 'btn-default'; ?>" disabled><i class="fa fa-check"></i></button>
                                                      <?php } ?>
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
          </div>

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <p>©2019 Copyrigth. Cootranshuila Team.</p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- easy-pie-chart -->
    <script src="../vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- My Script -->
    <script src="js/main.js"></script>

    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>

    <script>

      $('#form-buscar').submit(function () {
        var busqueda = $('#buscador').val();
        window.location.href = 'index.php?busqueda='+busqueda;
      });
    
    </script>
	
  </body>
</html>
