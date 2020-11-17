<?php 	
require '../../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

if (isset($_POST['idk'])) {
	
	

	ob_start();
	require_once('html_pdf.php');
	$html = ob_get_clean();

	$html2pdf = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF-8');
	$html2pdf->writeHTML($html);
	$html2pdf->output('Generar_pdf_'.$_POST['idk'].'.pdf');

}

?>