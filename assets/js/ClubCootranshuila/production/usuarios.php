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

    <title>Cootranshuila Team | Usuarios</title>

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
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <style>
     
      .pnotify-center {
          right: calc(50% - 150px) !important;
          /* margin-top: -125px; */
      }
     
    </style>
  </head>

  <body class="nav-md">

  <!-- INICIO DE MODALES -->

  <div class="modal fade" id="modal-agregar-usuario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="x_panel">
          <div class="x_title">
            <h2>Agregar usuario</h2>
            <ul class="nav navbar-right panel_toolbox"  style="min-width: 0px;">
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" id="form-agregar">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-3">Identificacion</label>
                <div class="col-md-9 col-sm-9 col-xs-9">
                  <input type="number" class="form-control" name="id" required placeholder="Escriba la identificacion C.C.">
                  <span class="fa fa-hashtag form-control-feedback right"></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-3">Nombre</label>
                <div class="col-md-9 col-sm-9 col-xs-9">
                  <input type="text" class="form-control" name="nombre" required placeholder="Escriba el nombre">
                  <span class="fa fa-user form-control-feedback right"></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-3">Contraseña</label>
                <div class="col-md-9 col-sm-9 col-xs-9">
                  <input type="password" class="form-control" name="pass" required placeholder="Escriba la contraseña">
                  <span class="fa fa-lock form-control-feedback right"></span>
                </div>
              </div>
              <br>
              <div class="form-group">
                <label class="control-label col-md-8 col-sm-8 col-xs-8 ">¿Paga la cuota y el aporte inicial?</label>
                <div class="col-md-4 col-sm-4 col-xs-4" style="margin-top:5px;">
                  <input type="checkbox" id="cuota_inicial" class="js-switch"/><b id="value-cuota" style="margin-left:10px;">No</b>
                </div>
              </div>
              <div class="ln_solid"></div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary">Cancelar</button>
                  <button type="submit" id="btn-agregar" class="btn btn-success" disabled>Agregar</button>
                </div>
              </div>

            </form>
          </div>
        </div>

        <!-- <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Modal title</h4>
        </div>
        <div class="modal-body">
          <h4>Text in a modal</h4>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
          <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->

      </div>
    </div>
  </div>

  <!-- FIN DE MODALES -->

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
                  <li><a href="cuota.php"><i class="fa fa-tasks"></i> Cuota y Aporte </a></li>
                  <li><a><i class="fa fa-edit"></i> Registros </a></li>
                  <li><a><i class="fa fa-sitemap"></i> Actividades </a></li>
                  <li class="active"><a href="usuarios.php"><i class="fa fa-group"></i> Usuarios </a></li>
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
                        <h2>Cootranshuila Team<small> - Usuarios</small></h2>
                        <div class="filter">
                            <div id="reportranges" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <a href="usuarios.php"><i class="glyphicon glyphicon-calendar fa fa-refresh"></i></a>
                                <!-- <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b> -->
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="bs-example" data-example-id="simple-jumbotron">
                            <div class="jumbotron">
                              <div class="row">
                                <div class="col-md-9 col-sm-8 col-xs-12">
                                  <h3><b>Administrador de usuarios</b></h3>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-12">
                                  <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-agregar-usuario"><i class="fa fa-plus"></i> Agregar usuario</button>
                                </div>
                              </div>
                               <!-- <p style="font-size: 15px; margin-top: 15px;">Dashboard de administrador, Cootranshuila Team &copy;2019. Monitoreo del Club de Ciclismo de Cootranshuila.</p> -->
                            </div>
                        </div>

                    </div>

                    <!-- TABLA DE USUARIOS -->
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Usuarios <small>usuarios activos</small></h2>
                                <ul class="nav navbar-right panel_toolbox" style="min-width: 0px;">
                                    <li>
                                        <a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">

                                <!-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> -->

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
                                                <th class="column-title">Contraseña </th>
                                                <th class="column-title" width="110px">Acciones </th>

                                                <th class="bulk-actions" colspan="7">
                                                    <a class="antoo" style="color:#fff; font-weight:500;">Usuarios ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php

                                              $sql= $objConexion->prepare("select * from usuarios");
                                              $sql->execute();

                                              $res = $sql->fetchAll();

                                              foreach ($res as $row) {

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
                                                    <td class=" ">
                                                        ********
                                                    </td>
                                                    <td class=" ">
                                                        <button type="button" class=" btn btn-info"><i class="fa fa-pencil"></i></button>
                                                        <button type="button" class=" btn btn-danger"><i class="fa fa-trash"></i></button>
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
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- Mi Script -->
    <script>        

      $('#cuota_inicial').change(function() {
        
        if ($('#cuota_inicial').is(":checked")) {
          $('#btn-agregar').removeAttr("disabled");
          $('#value-cuota').text('Si');
        } else {
          $('#btn-agregar').prop("disabled", true);
          $('#value-cuota').text('No');
        }

      });

      $('#form-agregar').submit(function() {
        $.ajax({
          type: 'POST',
          url: 'validaciones/agregar_usuario.php',
          data: $('#form-agregar').serialize(),
          success:  function(data) {
            // console.log(data);
            if (data == 'Ok') {
              // window.location.href = 'index.php';
              $('#modal-agregar-usuario').modal('hide');
              $('#form-agregar')[0].reset();
              new PNotify({
                  title: 'Correcto',
                  text: 'El usuario fue agregado correctamente',
                  type: 'success',
                  hide: true,
                  addclass: 'pnotify-center',
                  styling: 'bootstrap3'
              });
            } else {
              new PNotify({
                  title: 'Error',
                  text: 'Ocurrio un error, contacte al desarrollador',
                  type: 'error',
                  hide: true,
                  addclass: 'pnotify-center',
                  styling: 'bootstrap3'
              });
            }
          }
        });
        return false;
      });
    </script>
	
  </body>
</html>
