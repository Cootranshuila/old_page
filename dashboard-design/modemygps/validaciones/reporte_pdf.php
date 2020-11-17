<?php 

require('../../assets/lib/pdf/mpdf.php');
require "../../assets/config/ConexionBaseDatos_PDO.php";
$conexion = conectaDb();
$fecha = date("y/m/d");

if (isset($_REQUEST['edit'])) {	
	$edit = $_REQUEST['edit'];
	$sql = $conexion->prepare("select * from reporte where id_reporte = :id");
	$sql->bindParam(":id", $edit);
	$sql->execute();
	$resultado = $sql->fetchAll();
	foreach ($resultado as $row) {
		
	$html = '<header class="clearfix">
		      <div>
				<img src="../../assets/img/logo_coo.jpg" />
			  </div>
		      <h1>REPORTE DE FALLA N°'.$edit.'</h1>
		      <div id="company" class="clearfix">
		        <div>Cootranshuila LTDA.</div>
		        <div>20'.$fecha.'<br /> Neiva, Huila</div>
		        <div>(57) 310 695 9595</div>
		        <div><a href="">clientes@cootranshuila.com</a></div>
		      </div>
		      <div id="project">
		        <div>Datos de quien reporta la falla:</div>
		        <div><span>NOMBRE</span>: '.$row["nombre"].'</div>
		        <div><span>CONTACTO</span>: '.$row["contacto"].'</div>
		      </div>
		    </header>
		    <main>
		    	<div class="dato">Datos del producto:</div>
		      <table>
		        <thead>
		          <tr>
		            <th>Placa</th>
					<th>Tipo</th>
					<th>Id o serie</th>
					<th>Observacion</th>
					
		          </tr>
		        </thead>
		        <tbody>
		          	echo "<tr>";
					echo "<td>'.$row["placa_carro"].'</td>";
					echo "<td>'.$row["tipo_prod"].'</td>";
					echo "<td>'.$row["id_prod"].'</td>";
					echo "<td>'.$row["observacion"].'</td>";
					
					echo "</tr>";
		        </tbody>
		      </table>
		      <div id="notices">
		        <div>NOTA:</div>
		        <div class="notice">Constancia de recibido de producto que reporta falla. Por favor guarde este documento. </div>
		      </div>
		    </main>
		    <footer>
		      COOTRANSHUILA LTDA. Llegamos lejos.
		    </footer>';

	}
	$mpdf = new mPDF('c', 'A4');
	$css = file_get_contents("../../assets/css/estiloPDFreportes.css");
	$mpdf->WriteHTML($css, 1);
	$mpdf->WriteHTML($html, 2);
	$mpdf->Output('reporte_'.$edit.'.pdf', 'I');
	// header("location:Index.php");
}

?>

