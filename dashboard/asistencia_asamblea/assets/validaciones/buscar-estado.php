<?php 

require 'ConexionBaseDatos_PDO.php';

extract($_REQUEST);

$conexion = conectaDb();

$sql = $conexion->prepare('SELECT * from asistencia_fondo where numero like "'.$_REQUEST['busqueda'].'" or id like "'.$_REQUEST['busqueda'].'" or nombre like "%'.$_REQUEST['busqueda'].'%"');
$sql->execute();
if ($sql->rowCount() != 0) { ?>

	<div class="content">
		<table style="width:100%; text-align: center;">
			<tr>
				<th style="text-align: center;">Numero</th>
				<th style="text-align: center;">Identificacion</th> 
				<th style="text-align: center;">Nombre</th>
				<th style="text-align: center;">Mesa</th>
				<th style="text-align: center;">Estado</th>
			</tr>
			
			<?php foreach ($sql->fetchAll() as $row) { ?>
			<tr>
				<td id="numero"><?php echo $row['numero']; ?></td>
				<td><?php echo $row['id']; ?></td> 
				<td><?php echo $row['nombre']; ?></td>
				<td><?php echo $row['mesa']; ?></td>
				<?php if ($row['estado'] != '') { ?>
					<td><?php echo $row['estado']; ?></td>
				<?php } else { ?>
					<td><?php echo 'no lledo'; ?></td>
				<?php } 

				}?>
				
			</tr>
		</table>
	</div>

<?php } else { ?>
	<div class="content">
		<h1 style="font-size: 3em; margin-top: 15px;">No se encontraron resultados.</h1>
	</div>
<?php }
	


?>