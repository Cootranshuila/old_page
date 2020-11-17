<?php
    // iot.php
    // Importamos la configuración
    require("config.php");
    // Leemos los valores que nos llegan por GET
    
    $tnk =  $_GET["tnk"];
    $mt =   $_GET["mt"];
    $ma =   $_GET["ma"];
    $mtt =  $_GET["mtt"];
    $mp =   $_GET["mp"];
    $mf =   $_GET["mf"];
    $nb1 =  $_GET["nb1"];
    $nb2 =  $_GET["nb2"];

    // Esta es la instrucción para insertar los valores
    /*$query = "INSERT INTO medidas(med_tanque,med_nivel_combustible,med_nivel_agua,med_temperatura,med_presion,med_filtro,med_nivel_bat1,med_nivel_bat2) VALUES('".$tnk."'),('".$mt."'),('".$ma."'),('".$mtt."'),('".$mp."'),('".$mf."'),('".$nb1."'),('".$nb2."')";*/

    $query = "INSERT INTO medidas(med_tanque,med_nivel_combustible,med_nivel_agua,med_temperatura,med_presion,med_filtro,med_nivel_bat1,med_nivel_bat2) VALUES(('".$tnk."'),('".$mt."'),('".$ma."'),('".$mtt."'),('".$mp."'),('".$mf."'),('".$nb1."'),('".$nb2."'))";

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//CONFIGURAR LA ZONA HORARIA
	$db=new PDO ('mysql:host=localhost;dbname=codegas','root','Dus34b7jk9++kmo');
	$db->exec("SET GLOBAL time_zone='-5:00';");
	//$db->exec("SET time_zone='America/Bogota';"); //Solo si existe la tabla de zonas horarias
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //$query = "INSERT INTO medidas(med_nivel_agua) VALUES ('".$ma."'),";
    //$query = "INSERT INTO medidas(med_nivel_combustible) VALUES('".$mt."')";
    // Ejecutamos la instrucción
	mysqli_query($con, $query);
    mysqli_close($con);
?>
