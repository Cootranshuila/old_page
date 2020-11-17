<?php
require "../../assets/config/ConexionBaseDatos_PDO.php";

 ?>

<option value="No seleccionado"><small>Seleccione</small></option>
<?php
  $pdo = conectaDb();
  $sql_r = "SELECT * FROM ruta";
  $stmt = $pdo->prepare($sql_r);
  $resul = $stmt->execute();
  $rows=$stmt->fetchAll(\PDO::FETCH_OBJ);
  foreach($rows as $row) { ?>
    <option value="<?php print($row->rutaNombre); ?>"><?php print($row->rutaNombre) ?></option>}
<?php } ?> 

