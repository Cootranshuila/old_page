<?php 

include ('seguridad.php');

	if (isset($x) && $x == 3) {
		header("location:Administrador.php?x=2");
	}

require "ConexionBaseDatos_PDO.php";
date_default_timezone_set('America/Bogota');
$fecha = date("y-m-d h:i:s");
extract($_REQUEST);

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
if (isset($_REQUEST['btn-actualizar'])) {

  $sql = $conexion->prepare("select * from usuarios where id_usuario = :id");
  $sql->bindParam(":id", $_REQUEST['id_usu']);
  $sql->execute();
  $resultado = $sql->fetchAll();
  foreach ($resultado as $row) {
    if (empty($_REQUEST['pas_usu'])) {
      $password = $row['password_usuario'];
    } else{
      $password = MD5($_REQUEST['pas_usu']);
    }
    $sql = $conexion->prepare("update usuarios set nombre_usuario = :nombre, password_usuario = :pass, tipo_usuario = :tipo, rol_usuario = :rol, estado_usuario = :estado, departamento = :dep where id_usuario = :id");
      $sql->bindParam(":nombre", $_REQUEST['nom_usu']);
      $sql->bindParam(":pass", $password);
      $sql->bindParam(":tipo", $_REQUEST['tipo']);
      $sql->bindParam(":rol", $_REQUEST['rol']);
      $sql->bindParam(":estado", $_REQUEST['estado']);
      $sql->bindParam(":dep", $_REQUEST['departamento']);
      $sql->bindParam(":id", $_REQUEST['id_usu']);
      $sql->execute();
      $con = $sql->rowCount();
      if ($con == 1) {
        header("location:Admin.php?x=1");
      }

  }

}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Administrador</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../assets/css/estilo.css">
  <link rel="icon" type="image/png" href="../assets/images/logo-icon.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php  
if (!empty($_SESSION['user'])) { ?>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-actualizar">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal-header-pas" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 align="center"> ACTUALIZAR DATOS</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" name="actualizar-usu" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <table class="table table-hover table-reportes">
            <thead>
              <tr>
                <th>Identificacion</th>
                <th>Nombre</th>
                <th>Contraseña</th>
                <th>Tipo</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Departamento</th>

              </tr>
            </thead>
            <tbody>
              <?php
                $sql = $conexion->prepare("select * from usuarios where num_usuario = :edit order by nombre_usuario");
                $sql->bindParam("edit", $edit);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row) {

                  echo "<tr>";
                  echo '<td><input id="id_usu" type="text" class="form-control" name="id_usu" value='.$row["id_usuario"].' readonly></td>'; 
                  ?><td><input id="nom_usu" type="text" class="form-control" name="nom_usu" placeholder="Nombre de quien presenta el produucto" value="<?php echo $row["nombre_usuario"]; ?>"></td><?php
                  echo '<td><input id="pas_usu" type="password" class="form-control" name="pas_usu" placeholder="Contraseña"></td>';
                  ?><td> <select class="form-control" id="tipo" name="tipo" value="<?php echo $row["tipo_usuario"]; ?>">
                    <option value="select">Selecione</option>
                    <option value="Admin"<?php if ($row["tipo_usuario"] == 'admin') {echo "selected";} ?>>Admin</option>
                    <option value="General"<?php if ($row["tipo_usuario"] == 'general') {echo "selected";} ?>>General</option>
                  </select>
                  </td>
                  <td>
                    <select class="form-control" id="rol" name="rol" value="<?php echo $row["rol_usuario"]; ?>">
                      <option value="select">Selecione</option>
                      <option value="Correos"<?php if ($row["rol_usuario"] == 'Correos') {echo "selected";} ?>>Correos</option>
                      <option value="Reclamos"<?php if ($row["rol_usuario"] == 'Reclamos') {echo "selected";} ?>>Reclamos</option>
                      <option value="PQR"<?php if ($row["rol_usuario"] == 'PQR') {echo "selected";} ?>>PQR</option>
                      <option value="Especial"<?php if ($row["rol_usuario"] == 'Especial') {echo "selected";} ?>>Especial</option>
                      <option value="Postulados"<?php if ($row["rol_usuario"] == 'Postulados') {echo "selected";} ?>>Postulados</option>
                      <option value="Todos"<?php if ($row["rol_usuario"] == 'Todos') {echo "selected";} ?>>Todos</option>
                    </select>
                  </td>
                  <td> 
                  <select class="form-control" id="estado" name="estado" value="<?php echo $row["estado_usuario"]; ?>">
                    <option value="select">Selecione</option>
                    <option value="Activo"<?php if ($row["estado_usuario"] == 'activo') {echo "selected";} ?>>Activo</option>
                    <option value="Inactivo"<?php if ($row["estado_usuario"] == 'inactivo') {echo "selected";} ?>>Inactivo</option>
                  </select>
                  </td>
                  <td> 
                  <select class="form-control" id="departamento" name="departamento" value="<?php echo $row["departamento"]; ?>">
                    <option value="select">Selecione</option>
                    <option value="Sistemas"<?php if ($row["departamento"] == 'Sistemas') {echo "selected";} ?>>Sistemas</option>
                    <option value="Gefes Rodamiento"<?php if ($row["departamento"] == 'Gefes Rodamiento') {echo "selected";} ?>>Gefes Rodamiento</option>
                    <option value="Recursos Humanos"<?php if ($row["departamento"] == 'Recursos Humanos') {echo "selected";} ?>>Recursos Humanos</option>
                  </select>
                  </td>
                <?php

                }
                echo "</tr>";
               ?>
            </tbody>
          </table>
          
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-default" name="btn-actualizar"><span class="glyphicon glyphicon-floppy-disk"></span> ACTUALIZAR</button></a>
            <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal" align="center"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
<?php } ?>


<div class="jumbotron jumbotron-index">
 	<h2 align="center">Administrador de cuentas</h2>
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

<div class="container">

  <div class="page-header page-header-index">
	 <h1>Administrador | <small> <?php echo date("d / m / y | ");?>
     <div class="reloj">
          <span id="pHoras"></span><span> : </span>
          <span id="pMinutos"></span><span> : </span>
          <span id="pSegundos"></span>
      </div> 
   </small></h1>
   <div>
     <a href="Administrador.php"><button type="button" class="btn-lg btn-success agg col-md-offset-10" value="Volver"><i class="glyphicon glyphicon-triangle-left"></i> Volver</button></a>
   </div>
  </div>
  <?php 

  if (isset($_REQUEST['x']) && $_REQUEST['x'] == 1) {
    ?>
    <div class="row text-center"><div class="alert alert-success col-lg-6 col-lg-offset-3">Usuario actualizado <strong>correctamente.</strong></div></div>

    <?php
  }
  if (isset($_REQUEST['x']) && $_REQUEST['x'] == 0) {
    ?>
    <div class="row text-center"><div class="alert alert-danger col-lg-6 col-lg-offset-3">Usuario <strong>NO</strong> actualizado.</div></div>

    <?php
  } ?>
  <div class="panel panel-success">
  <div class="panel-heading"><strong><p align="center">USUARIOS</p></strong></div>
  <table class="table table-hover table-reportes">
    <thead>
      <tr>
        <th>Identificacion</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Rol</th>
        <th>Estado</th>
        <th>Departamento</th>

      </tr>
    </thead>
    <tbody>
      <?php
        $sql = $conexion->prepare("select * from usuarios order by nombre_usuario");
        $sql->execute();
        $resultado = $sql->fetchAll();
        foreach ($resultado as $row) {

          echo "<tr>";
          echo "<td>".$row['id_usuario']."</td>";
          echo "<td>".$row['nombre_usuario']."</td>";
          echo "<td>".$row['tipo_usuario']."</td>";
          echo "<td>".$row['rol_usuario']."</td>";
          echo "<td>".$row['estado_usuario']."</td>";
          echo "<td>".$row['departamento']."</td>";

      ?>
      <td>
        <a href="Admin.php?edit=<?php echo $row['num_usuario']; ?>"><button type="button" class="btn btn-warning" value="Editar"><span class="glyphicon glyphicon-pencil"></span></button></a>
      </td>
      <?php
        }
        echo "</tr>";
       ?>
    </tbody>
  </table>
</div>   
 
</div>
</body>
<script type="text/javascript" src="../assets/js/mainAd.js"></script>
<?php 
if (isset($edit) && $edit > 0) { ?>
  <script type="text/javascript">
    $(document).ready(function(){
            $("#myModal").modal();
    });
  </script>
<?php } ?>
</html>