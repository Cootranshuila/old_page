<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."/third_party/lib/dompdf/dompdf_config.inc.php";

    use Dompdf\Adapter\CPDF;
    use Dompdf\Dompdf;
    use Dompdf\Exception;

    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Html extends DOMPDF {

    }
?>
