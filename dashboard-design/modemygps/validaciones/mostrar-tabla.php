<?php 

   extract($_REQUEST);
   extract($_POST);
   
   require "../../assets/config/ConexionBaseDatos_PDO.php";
   
   require "../../postulados/seg.php";
   $objConexion=conectaDb();

?>


<table class="table table-responsive-sm table-bordered table-sm">
   <thead>
      <tr>
         <th>No. reporte</th>
         <th>Fecha</th>
         <th>Placa</th>
         <th>Tipo</th>
         <th>Id o serie</th>
         <th>Observacion</th>
         <th>Nombre</th>
         <th>Contacto</th>
         <th>Acciones</th>
      </tr>
   </thead>
   <tbody>
      <?php
         // Condicional para ordenar datos de la tabla
         if (isset($_REQUEST['b'])) {
           $order = 'order by '.$_REQUEST['b'].' desc';
         } else {
           $order = '';
         }
         // Condicional para ordenar datos de la tabla por modalidad
         if (isset($_REQUEST['m'])) {
           $likeModalidad = "where modalidad like '".$_REQUEST['m']."'";
         } else {
           $likeModalidad = '';
         }
         // Condicional para mostrar los datos por estado
         if (isset($_REQUEST['e'])) {
           $likeEstado = "where estado like '".$_REQUEST['e']."'";
         } else {
           $likeEstado = '';
         }
         // Condicional para mostrar los datos por nombre de quien los agrego
         if (isset($_REQUEST['a'])) {
           $likeNombre = "where nom_usuario like '".$_REQUEST['a']."'";
         } else {
           $likeNombre = "";
         }
         // Condicional para mostrar los datos por nombre de quien los agrego
         if (!isset($_REQUEST['m']) and !isset($_REQUEST['e']) and !isset($_REQUEST['a'])) {
           $where_estado = "where estado != 'Finalizado'";
         } else {
           $where_estado = "and estado != 'Finalizado'";
         }
         // Consulta para ver cantidad de datos para hacer el paginagor
         $sql_p = $objConexion->prepare("select * from reporte where estado_reporte = 0 and resuelto != ''");
         $sql_p->execute();
         $cont = $sql_p->rowCount();
         // operacion para obtener el inicio de dato por pagina
         $inicio = ($_REQUEST['p'] - 1) * 10;
         // condicion para saber si el usuario ha utilizado el buscador

         if (isset($_REQUEST['buscar'])) {
         
            $busqueda = trim($_REQUEST['buscar']);
            if ($busqueda > 2000) {
              $bus = "fecha LIKE  '".$busqueda."%'";
            } else{
              $bus = "fecha LIKE  '".$busqueda."'";
            }
            if (isset($_REQUEST['terminados']) && $_REQUEST['terminados'] == "terminados") {
              $sqlTabla = "SELECT * from reporte where (id_reporte LIKE  '".$busqueda."' or $bus or placa_carro LIKE  '".$busqueda."' or tipo_prod LIKE  '".$busqueda."' or id_prod LIKE  '".$busqueda."' or observacion LIKE  '%".$busqueda."%' or nombre LIKE  '%".$busqueda."%' or contacto LIKE  '".$busqueda."') AND estado_reporte = 0 AND resuelto != '' order by id_reporte desc limit ".$inicio.", 10";
              $sql_p = $objConexion->prepare("SELECT * from reporte where (id_reporte LIKE  '".$busqueda."' or $bus or placa_carro LIKE  '".$busqueda."' or tipo_prod LIKE  '".$busqueda."' or id_prod LIKE  '".$busqueda."' or observacion LIKE  '%".$busqueda."%' or nombre LIKE  '%".$busqueda."%' or contacto LIKE  '".$busqueda."') AND estado_reporte = 0 AND resuelto != '' order by id_reporte desc");
              $sql_p->execute();
              $cont = $sql_p->rowCount();
            } else {
              $sqlTabla = "SELECT * from reporte where (id_reporte LIKE  '".$busqueda."' or $bus or placa_carro LIKE  '".$busqueda."' or tipo_prod LIKE  '".$busqueda."' or id_prod LIKE  '".$busqueda."' or observacion LIKE  '%".$busqueda."%' or nombre LIKE  '%".$busqueda."%' or contacto LIKE  '".$busqueda."') AND estado_reporte = 0 AND resuelto = '' order by id_reporte desc limit ".$inicio.", 10";
              $sql_p = $objConexion->prepare("SELECT * from reporte where (id_reporte LIKE  '".$busqueda."' or $bus or placa_carro LIKE  '".$busqueda."' or tipo_prod LIKE  '".$busqueda."' or id_prod LIKE  '".$busqueda."' or observacion LIKE  '%".$busqueda."%' or nombre LIKE  '%".$busqueda."%' or contacto LIKE  '".$busqueda."') AND estado_reporte = 0 AND resuelto = '' order by id_reporte desc");
              $sql_p->execute();
              $cont = $sql_p->rowCount();
            }
         } else {

            if (isset($_REQUEST['terminados']) && $_REQUEST['terminados'] == "terminados") {
              $sqlTabla = "select * from reporte where estado_reporte = 0 and resuelto != '' order by id_reporte desc limit ".$inicio.", 10";
              $sql_p = $objConexion->prepare("select * from reporte where estado_reporte = 0 and resuelto != '' order by id_reporte desc");
              $sql_p->execute();
              $cont = $sql_p->rowCount();
            } else {
              $sqlTabla = "select * from reporte where estado_reporte = 0 and resuelto = '' order by id_reporte desc limit ".$inicio.", 10";
              $sql_p = $objConexion->prepare("select * from reporte where estado_reporte = 0 and resuelto = '' order by id_reporte desc");
              $sql_p->execute();
              $cont = $sql_p->rowCount();
            }
         
         }
         
         $sql = $objConexion->prepare($sqlTabla);
         $sql->execute();
         
         $resultado = $sql->fetchAll();
         foreach ($resultado as $row) {
         $puntos = NULL;
         if (strlen($row['observacion']) > 70) {
         $puntos = "...";
         }
         echo "<tr>";
         echo "<td>".$row['id_reporte']."</td>";
         echo "<td>".$row['fecha']."</td>";
         echo "<td>".$row['placa_carro']."</td>";
         echo "<td>".$row['tipo_prod']."</td>";
         echo "<td>".$row['id_prod']."</td>";
         echo "<td width='300px'>".substr($row['observacion'], 0, 70).$puntos."</td>";
         echo "<td>".$row['nombre']."</td>";
         echo "<td>".$row['contacto']."</td>";
         ?>
      <td class="text-center">
         <a role="button" onclick="ver_reporte(<?php echo $row['id_reporte']; ?>)"><button type="button" class="btn btn-info btn-pill" data-toggle="tooltip" data-placement="top" title="Ver reporte"><i class="far fa-eye"></i></button></a>
         <a href="validaciones/reporte_pdf.php?edit=<?php echo $row['id_reporte']; ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Descargar"><button type="button" class="btn btn-success btn-pill" value="Descargar" id="myBtn"><i class="fas fa-file-download"></i></button></a>
      </td>
      <?php } 
         if (isset($_REQUEST['b'])) {
           $url_atras = 'terminados.php?b='.$_REQUEST['b'].'&p='.($_REQUEST['p']-1);
           $url_next = 'terminados.php?b='.$_REQUEST['b'].'&p='.($_REQUEST['p']+1);
         } elseif (isset($_REQUEST['m'])) {
           $url_atras = 'terminados.php?m='.$_REQUEST['m'].'&p='.($_REQUEST['p']-1);
           $url_next = 'terminados.php?m='.$_REQUEST['m'].'&p='.($_REQUEST['p']+1);
         } elseif (isset($_REQUEST['e'])) {
           $url_atras = 'terminados.php?e='.$_REQUEST['e'].'&p='.($_REQUEST['p']-1);
           $url_next = 'terminados.php?e='.$_REQUEST['e'].'&p='.($_REQUEST['p']+1);
         } elseif (isset($_REQUEST['a'])) {
           $url_atras = 'terminados.php?a='.$_REQUEST['a'].'&p='.($_REQUEST['p']-1);
           $url_next = 'terminados.php?a='.$_REQUEST['a'].'&p='.($_REQUEST['p']+1);
         }  elseif (isset($_REQUEST['buscar'])) {
           $url_atras = 'terminados.php?buscar='.$_REQUEST['buscar'].'&p='.($_REQUEST['p']-1);
           $url_next = 'terminados.php?buscar='.$_REQUEST['buscar'].'&p='.($_REQUEST['p']+1);
         } else {
           $url_atras = 'terminados.php?p='.($_REQUEST['p']-1);
           $url_next = 'terminados.php?p='.($_REQUEST['p']+1);
         }
         ?>
      </tr>
   </tbody>
</table>

<script>
  $('[data-toggle="tooltip"]').tooltip();
</script>