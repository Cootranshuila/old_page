<?php 

include ('seguridad.php');
if (isset($x) && $x == 3) {
  header("location:Administrador.php?x=2");
}
require "ConexionBaseDatos_PDO.php";
date_default_timezone_set('America/Bogota');
$fecha = date("y-m-d h:i:s");
$conexion = conectaDb();
$sql = $conexion->prepare("select tipo_usuario from usuarios where num_usuario = :i");
$sql->bindParam(":i", $_SESSION['n-user']);
$sql->execute();
$resultado = $sql->fetchAll();
foreach ($resultado as $row) {
  if ($row['tipo_usuario'] == 'general') {
    header("location:Administrador.php");
  } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Agregar usuario</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
  <link rel="icon" type="image/png" href="../assets/images/logo-icon.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron">
  <h2 align="center">Agregar usuarios</h2>
  <?php if (isset($_SESSION['user'])) { ?>
  <div class="container">
    <div class="dropdown dropdown_user pull-right">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $_SESSION['user']; ?> <span class="caret"></span></button>
        <ul class="dropdown-menu">
        <li class="dropdown-header">Configuraciones</li>
        <li><a href="Administrador.php?c=1">Cambiar contraseña</a></li>
        <?php 
            $sql = $conexion->prepare("select tipo_usuario from usuarios where num_usuario = :i");
            $sql->bindParam(":i", $_SESSION['n-user']);
            $sql->execute();
            $resultado = $sql->fetchAll();
            foreach ($resultado as $row) {
              if ($row['tipo_usuario'] == 'admin') { ?>
          <li><a href="agregar_usuario.php">Agregar usuarios</a></li>
          <li><a href="Admin.php">Administrador</a></li>
          <!-- <li><a href="registros.php">Registros</a></li> -->
        <?php } }?>

          <li class="divider"></li>
          <li><a href="Administrador.php?salir=si">Salir</a></li>
        </ul>
    </div>
  </div>
  <?php } ?>
</div>

<div class="container container-agg">

<?php
    extract($_REQUEST);
    if (isset($_REQUEST['agregar'])) {
      $pass = MD5($_REQUEST['pass']);
      // echo $pass;
      $sql = $conexion->prepare("insert into usuarios(id_usuario, nombre_usuario, password_usuario, tipo_usuario, rol_usuario, estado_usuario, departamento) values (:id_usu, :nom, :pass, :tipo, :rol, :estado, :dep)");
      $sql->bindParam(":id_usu", $_REQUEST['id_usu']);
      $sql->bindParam(":nom", $_REQUEST['nom']);
      $sql->bindParam(":pass", $pass);
      $sql->bindParam(":tipo", $_REQUEST['tipo']);
      $sql->bindParam(":rol", $_REQUEST['rol']);
      $sql->bindParam(":estado", $_REQUEST['estado']);
      $sql->bindParam(":dep", $_REQUEST['departamento']);
      $sql->execute();
      $existe = $sql->rowCount();
      if ($existe == 1) {
      
      header("location:Administrador.php?si=2");
      }
      else{
      ?>
      <div class="row text-center"><div class="alert alert-danger col-lg-6 col-lg-offset-3">El usuario <strong>NO</strong> se registro.</div></div>
      <?php
      }
      }
  ?>
    <div class="panel-body panel-body-agg">
      <div class="panel panel-success">
        <div class="panel-heading"><strong>AGREGAR USUARIO</strong></div>
        <div class="panel-body">
        <form name="form1" action="agregar_usuario.php" method="post">
        <div class="page-header">
        <div class="form-group">
        <label class="col-sm-2 control-label">Identificacion: </label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-qrcode"></i></span>
          <input id="id_usu" type="text" class="form-control" name="id_usu" placeholder="Numero de identificacion" required>
        </div>
        </div>
        <div class="form-group">
        <label class="col-sm-2 control-label">Nombre: </label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input id="nom" type="text" class="form-control" name="nom" placeholder="Nombre de usuario" required>
        </div>
        </div>
        <div class="form-group">
        <label class="col-sm-2 control-label">Contraseña: </label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input id="pass" type="password" class="form-control" name="pass" placeholder="Escriba una contraseña" required>
        </div>
        </div>
        <div class="form-group">
        <label class="col-sm-2 control-label">Tipo de usuario: </label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-triangle-right"></i></span>
          <select class="form-control" id="tipo" name="tipo" required>
            <option value="select">Selecione</option>
            <option value="admin">Administrador</option>
            <option value="general">General</option>
          </select>
        </div>
        </div>
        <div class="form-group">
        <label class="col-sm-2 control-label">Rol de usuario: </label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-triangle-right"></i></span>
          <select class="form-control" id="rol" name="rol" required>
            <option value="select">Selecione</option>
            <option value="Correos">Correos</option>
            <option value="Reclamos">Reclamos</option>
            <option value="PQR">PQR</option>
            <option value="Especial">Especial</option>
            <option value="Postulados">Postulados</option>
            <option value="Sanciones">Sanciones</option>
            <option value="Operativos">Operativos</option>
            <option value="Todos">Todos</option>
          </select>
        </div>
        </div>
        <div class="form-group">
        <label class="col-sm-2 control-label">Estado de usuario: </label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-triangle-right"></i></span>
          <select class="form-control" id="estado" name="estado" required>
            <option value="select">Selecione</option>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
          </select>
        </div>
        </div>
        <div class="form-group">
        <label class="col-sm-2 control-label">Departamento: </label>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-triangle-right"></i></span>
          <select class="form-control" id="departamento" name="departamento" required>
            <option value="select">Selecione</option>
            <option value="Sistemas">Sistemas</option>
            <option value="Gefes Rodamiento">Gefes Rodamiento</option>
            <option value="Recursos Humanos">Recursos Humanos</option>
          </select>
        </div>
        </div>
        
        </div>
        <div class="text-center col-lg-11">
        <button type="submit" class="btn btn-md btn-success" name="agregar" id="agregar"><span class="glyphicon glyphicon-floppy-disk"></span>Agregar</button>
        <a href="Administrador.php"><button type="button" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-triangle-left"></span>Volver</button></a>
        </div>
        </div>
        </form>
        </div>
      </div>
    </div>
     
</div>
</body>
</html>