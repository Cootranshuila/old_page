<?php

require "ConexionBaseDatos_PDO.php";
$objConexion=conectaDb();

$dia = date("l");

$hoy = date("d/m/Y");
// $hoy = '22/07/2019';

$sql= $objConexion->prepare("SELECT * from semana order by num_semana desc limit 1");
$sql->execute();

$resultado = $sql->fetchAll(); 

foreach ($resultado as $row) {
    $fecha = $row['fecha_inicio']; 
    $semana = $row['num_semana'];
}

if ($dia == 'Monday'){ 

    if ($hoy == $fecha) {
        $_SESSION['semana'] = $semana;
    } else {
        $semana_next = $semana+1;
        $sql= $objConexion->prepare("INSERT into semana VALUES ('','$hoy',$semana_next)");
        $sql->execute();
        $_SESSION['semana'] = $semana_next;
    }

} else {
    $_SESSION['semana'] = $semana;
}

// $_SESSION['semana'] = 4;

?>