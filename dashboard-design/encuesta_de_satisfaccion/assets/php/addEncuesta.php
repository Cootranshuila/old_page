<?php 
require '../../../../dashboard-design/assets/config/ConexionBaseDatos_PDO.php';

$objConexion= conectaDB();
$fechaActual = new DateTime('now', new DateTimeZone('America/Bogota'));
$fecha=$fechaActual->format('Y/m/d');

      if( isset($_POST['sugerencia'])){
        $sugerencia=$_POST['sugerencia'];
      }else{
        $sugerencia="";
      }

if (isset($_POST['customRadioInlinep']) && isset($_POST['customRadioInline1']) && isset($_POST['customRadioInline12']) && isset($_POST['customRadioInline13']) && isset($_POST['customRadioInline14']) && isset($_POST['customRadioInline15']) ) {


    $area=$_POST['customRadioInlinep'];
    $res_uno=$_POST['customRadioInline1'];
    $res_dos=$_POST['customRadioInline12'];
    $res_tres=$_POST['customRadioInline13'];
    $res_cuatro=$_POST['customRadioInline14'];
    $res_cinco=$_POST['customRadioInline15'];

    if($sql="INSERT INTO encuesta (fecha, area ,pregunta_uno,pregunta_dos, pregunta_tres ,pregunta_cuatro ,pregunta_cinco, sugerencia)values(:fechaent,:areaent,:preg_uno,:preg_dos,:preg_tres,:preg_cuatro,:preg_cinco, :sugeren)"){
    $afilia=$objConexion->prepare($sql);
    $afilia->bindParam(":fechaent",$fecha);
    $afilia->bindParam(":areaent",$area);
    $afilia->bindParam(":preg_uno",$res_uno);
    $afilia->bindParam(":preg_dos",$res_dos);
    $afilia->bindParam(":preg_tres",$res_tres);
    $afilia->bindParam(":preg_cuatro",$res_cuatro);
    $afilia->bindParam(":preg_cinco",$res_cinco);
    $afilia->bindParam(":sugeren",$sugerencia);
    $afilia->execute();
    $afiliation=$afilia->rowCount();
      if ($afiliation>0){
        $messages[]=' Encuesta realizada correctamente';
        }
         else{$errors[]=' Por favor intente nuevamente';}
      }else{ $errors[]=' Por favor intente nuevamente';}
  }else{ $errors[]=' Por favor seleccione una opción en cada pregunta';}


  if (isset($errors)){ 
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
       <?php
            foreach ($errors as $error) {
                echo '<p class="lead text-center text-danger"><strong>¡Error! </strong><em> &nbsp;'.$error.'.</em></p>';
              }
            ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
      <?php
      }
      if (isset($messages)){
        
              foreach ($messages as $message) {
                  echo 'ok';
                }
      }
?>
