<?php 

require('../dashboard-design/assets/lib/pdf/mpdf.php');
require "../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";
$conexion = conectaDb();
$fecha = date("y/m/d");


		
	$html = '<img src="img/bg-img/cer.png" alt="" width="11754px" heigth="1241px" style="    position: relative;float: left;margin: 0 auto;z-index: -1;">
			<p style="font-size: 32px;font-weight: 800;position: relative;float: left;justify-content: center;text-align: center;margin-top: -415px;margin-left: 312;z-index: 1;font-family: cursive;">Leiner Fabian Ortega Ojeda</p>';

	
	$mpdf = new mPDF('c', 'A4');
	// $css = file_get_contents("../../assets/css/estiloPDFreportes.css");
	// $mpdf->WriteHTML($css, 1);
	$mpdf->WriteHTML($html);
	$mpdf->Output('reporte_'.$edit.'.pdf', 'I');
	// header("location:Index.php");


?>

