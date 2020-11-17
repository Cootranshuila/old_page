
<?php 
// require "../assets/config/ConexionBaseDatos_PDO.php";
// $conexion = conectaDb();    
$conexion=@mysqli_connect('localhost', 'root', 'Dus34b7jk9++kmo', 'cootranshuila');
if(!$conexion){
    die("imposible conectarse: ".mysql_error($conexion));
}

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
  $querydos = ($_REQUEST['querydos']);
  $query = ($_REQUEST['query']);
  $tables="encuesta";
  $campos="*";
  $sWhere="area  LIKE '%".$querydos."%' or  fecha  LIKE '%".$query."%'  or area  LIKE '%".$querydos."%' || fecha  LIKE '%".$query."%'";
  $sWhere.=" order by encuesta.id DESC";
   
  include 'pagination.php'; //include pagination file
  //pagination variables
  $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
  $per_page = 10; //cuantos registros quieres mostrar
  $adjacents  = 4; //gap between pages after number of adjacents
  $offset = ($page - 1) * $per_page;
  //Count the total number of row in your table*/
  //  $count_query  = ($conexion ,"SELECT count(*) AS numrows FROM $tables where $sWhere ") or die(mysql_error());
  $count_query = mysqli_query($conexion ,"SELECT count(*) AS numrows FROM $tables where $sWhere ") or die(mysqli_error());

   if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
  else {echo mysqli_error();}

  $tpages = ceil($numrows/$per_page);
  //main query to fetch the data
  $query = mysqli_query($conexion,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
  //loop through fetched data

    
  
  if ($numrows>0){
    
?>

 <div class="table-responsive mt-3">
       <table class="table ">
          <thead class="thead-light">
          <tr>
           <th scope="col"><strong>Fecha</strong></th>
           <th scope="col"><strong>Area</strong></th>
           <th scope="col"><strong>P. uno</strong></th>
           <th scope="col"><strong>P. dos</strong></th>
           <th scope="col"><strong>P. tres</strong></th>
           <th scope="col"><strong>P. cuatro</strong></th>
           <th scope="col"><strong>P. cinco</strong></th>
           <th scope="col"><strong>Sugerencia</strong></th>
          </tr>
          </thead>
          <tbody>
        <?php
            $finales=0;
            while($row = mysqli_fetch_array($query)){ 
              $finales++;
            ?>  
               <tr>
                 <td><?php echo $row['fecha'] ?></td> 
                 <td><?php echo $row['area']; ?></td> 
                 <td><?php echo $row['pregunta_uno']; ?></td> 
                 <td><?php echo $row['pregunta_dos']; ?></td>
                 <td><?php echo $row['pregunta_tres'];  ?></td>
                 <td><?php echo $row['pregunta_cuatro']; ?></td>
                 <td><?php echo $row['pregunta_cinco'];  ?></td>
                 <td><?php echo $row['sugerencia']; ?></td> 
                </tr>
         <?php       
           }
           ?>

          </tbody>
       </table>   
  
</div>       

                <?php 
                  $inicios=$offset+1;
                  $finales+=$inicios -1;  
                ?> 
                    <?php echo '<strong> Registros encontrados '.$numrows.'</strong>'; ?>
                    <nav  aria-label="Page navigation example" class="row justify-content-center align-items-center">
                        <?php echo paginate( $page, $tpages, $adjacents);?>
                    </nav>

  <?php 
  } else{
 echo '<div class="col-lg-12 text-center mt-3"><strong class="text-danger"><h6>No se encontraron coincidencias...</h6></strong></div>';
 }
}
?> 

