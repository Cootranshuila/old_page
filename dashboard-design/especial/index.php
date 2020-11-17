<?php 
extract($_REQUEST);
extract($_POST);

if (!isset($_REQUEST['p'])) {
  header("location:index.php?p=1");
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
  <li class="nav-item" style="background: #20a8d8;">
  <a class="nav-link" href="terminados.php" style="cursor: pointer;">
    <i class="nav-icon icon-envelope" style="color: #fff;"></i> Contratos
  </a>
  </li>
  <li class="nav-item">
  <a class="nav-link" href="terminados.php">
  <i class="nav-icon icon-drawer"></i> Agregar Contrato
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
    <li class="breadcrumb-menu d-md-down-none"></li>
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
          <i class="fa fa-align-justify"></i> Agregar Contrato 
                    <!-- <div class="text-right float-right"><h4><a href="index.php?p=1"><span class="badge badge-info p-2">Generar consulta SQL</span></a></h4></div> -->
        </div>
        <div class="card-body">
          <div class="row text-center px-3">

            <!--===================ypoc=====================-->
  <div class="col-lg-7 md-auto">
    <input type="text" id="buscar" name="buscar" class="form-control " placeholder="Buscar...">
  </div>

  <select class="form-control col-md-5" name="txtcontacto" id="txtcontacto">
    <option><small>Seleccione</small></option>
    <option value="Empleado">Nombre</option>
    <option value="Empresa">N° Interno</option>
  </select>

    <table class="tableS table table-hover px-5" data-paging="true" data-sorting="true" data-show-toggle="false">
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
        <tr>
          <td colspan="" rowspan="" headers=""></td>
          <td colspan="" rowspan="" headers=""></td>
          <td colspan="" rowspan="" headers=""></td>
          <td colspan="" rowspan="" headers=""></td>
          <td colspan="" rowspan="" headers=""></td>
          <td colspan="" rowspan="" headers=""></td>
          <td colspan="" rowspan="" headers=""></td>
          <td colspan="" rowspan="" headers=""></td>
        </tr>
      </tbody>
    </table>
  </div>
  <nav aria-label="..." style="center">
  <ul class="pagination">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active" aria-current="page">
      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
</div>
</div>
</div> 
</div>
</div>
</div>
</main>       
</div>    
<!---=====================PAGINADOR=========================-->


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