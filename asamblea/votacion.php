<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="images/logo-icon.png">
	<title>Cootranshuila LTDA - Asamblea General 2020</title>

	<link rel="stylesheet" href="css/materialize.css">
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php

session_start();
require "../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";

$objConexion=conectaDb();

if (isset($_SESSION['user']) || $_GET['name'] == 'Daniel') {

    $sql = $objConexion->prepare('SELECT * from formularios where estado = 1');
    $sql->execute();

    $datos = $sql->fetchAll();

    foreach ($datos as $row) { ?>
        <iframe src="<?php echo $row['url']; ?>" width="100%" style="height:96vh;" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>
    <?php } ?>

    <!-- <button type="button" onclick="cerrar()" class="button" style="width: 100%;">Volver a la transmision</button> -->
<?php } else { ?>
    <div class="coming-soon">
		<div class="container">
			<div class="wrapper-content">
                <br><br><br><br><br><br><br>
				<div class="wrap-desc-top">
                    <span>Debe iniciar session</span>
                    <br><br>
                    <button type="button" onclick="location.href='./'" class="button" style="width: 100%;">Ingresar</button>
				</div>
			</div>
		</div>
	</div>
<?php }

?>

<script language="javascript" type="text/javascript"> 
function cerrar() { 
   window.open('','_parent',''); 
   window.close(); 
} 
</script>

</body>
</html>