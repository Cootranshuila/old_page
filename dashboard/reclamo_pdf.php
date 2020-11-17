<?php 

session_start();
require('lib/pdf/mpdf.php');
require "ConexionBaseDatos_PDO.php";
$conexion = conectaDb();
$fecha = date("y/m/d");
$responsable = $_SESSION['user'];
	
	if (isset($_REQUEST['edit'])) {
		$query = "select * from reclamos where num_reclamo = ".$_REQUEST['edit'];
	} else{
		$query = "select * from reclamos order by num_reclamo desc limit 1";
	}

	$sql = $conexion->prepare($query);
	$sql->execute();
	$resultado = $sql->fetchAll();
	foreach ($resultado as $row) {

		if (empty($row['respuesta_reclamo'])) {
			$nota = '<div id="notices">
				        <div>NOTA:</div>
				        <div class="notice">Constancia de recibido de reclamo. Por favor guarde este documento. </div>
				      </div>';
			$respuesta = '<main>
					    	<div class="dato">Datos de respuesta:</div>
						      <table>
						        <thead>
						          <tr>
						            <th>Responsable</th>
									<th>Mensaje</th>
									
						          </tr>
						        </thead>
						        <tbody>
						          	echo "<tr>";

									echo "<td>Sin asignar</td>";
									echo "<td>Aun no hay respuesta</td>";
									
									echo "</tr>";
						        </tbody>
						      </table>
					    	</main>';
		} else {
			$nota = '<div id="notices">
				        <div>NOTA:</div>
				        <div class="notice">Constancia de respuesta a su reclamo. Por favor guarde este documento. </div>
				      </div>';
			$respuesta = '<main>
					    	<div class="dato">Datos de respuesta:</div>
						      <table>
						        <thead>
						          <tr>
						            <th>Responsable</th>
									<th>Mensaje</th>
									
						          </tr>
						        </thead>
						        <tbody>
						          	echo "<tr>";

									echo "<td>'.$responsable.'</td>";
									echo "<td>'.$row["respuesta_reclamo"].'</td>";
									
									echo "</tr>";
						        </tbody>
						      </table>
					    	</main>';
		}
		
	$html = '<header class="clearfix">
		      <div>
				<img src="images/logo_coo.jpg" />
			  </div>
		      <h1>RECLAMO N°'.$row["num_reclamo"].'</h1>
		      <div id="company" class="clearfix">
		        <div>Cootranshuila LTDA.</div>
		        <div>20'.$fecha.'<br /> Neiva, Huila</div>
		        <div>(57) 310 695 9595</div>
		        <div><a href="">clientes@cootranshuila.com</a></div>
		      </div>
		      <div id="project">
		        <div>Datos del cliente:</div>
		        <div><span>NOMBRE</span>: '.$row["nom_cli_re"].'</div>
		        <div><span>CONTACTO</span>: '.$row["tel_cli_re"].'</div>
		        <div><span>DIRECCION</span>: '.$row["dir_cli_re"].'</div>
		        <div><span>CORREO</span>: '.$row["correo_cli_re"].'</div>
		      </div>
		    </header>
		    <main>
		    	<div class="dato">Datos del reclamo:</div>
		      <table>
		        <thead>
		          <tr>
		            <th>Clasificacion</th>
					<th>Mensaje</th>
					
		          </tr>
		        </thead>
		        <tbody>
		          	echo "<tr>";

					echo "<td>'.$row["clasificacion"].'</td>";
					echo "<td>'.$row["mensaje_reclamo"].'</td>";
					
					echo "</tr>";
		        </tbody>
		      </table>
		      '.$respuesta.'
		      '.$nota.'
		    </main>
		    <footer>
		      COOTRANSHUILA LTDA. Llegamos lejos.
		    </footer>';

	}
	$mpdf = new mPDF('c', 'A4');
	$css = file_get_contents("css/stylePDF.css");
	$mpdf->WriteHTML($css, 1);
	$mpdf->WriteHTML($html, 2);
	$mpdf->Output('reporte_'.$edit.'.pdf', 'I');
	header("location:Index.php");

?>

