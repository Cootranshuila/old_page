<?php
set_time_limit(0);
ini_set('memory_limit', '60M');
if (isset($_POST['idk'])) { 
require "../assets/config/ConexionBaseDatos_PDO.php";
extract($_REQUEST);
$objConexion=conectaDb();
$cedula = '';
$pathImg = '';
$image = '';


$sqlPos = "SELECT * FROM postulado WHERE id = :id";
$conPos = $objConexion->prepare($sqlPos);
$conPos->bindParam(':id', $_POST['idk']);
$conPos->execute();
$resConPos = $conPos->fetchAll();
foreach ($resConPos as $key1) {
	$nombres = $key1['nombres'];
	$apellidos = $key1['apellidos'];
	$tipo_id = $key1['tipo_identificacion'];
	$id = $key1['numero_identificacion'];
	$email = $key1['email'];
	$nacimiento = $key1['fecha_nacimiento'];
	$genero = $key1['genero'];
	$estado_civil = $key1['estado_civil'];
	$celular = $key1['numero_celular'];
	$departamento = $key1['departamento'];
	$ciudad = $key1['ciudad'];
	$direccion = $key1['direccion'];
	$cargo = $key1['cargo'];
}

$nombres = mb_strtolower($nombres, 'UTF-8');
$nombres = ucwords($nombres);

$apellidos = mb_strtolower($apellidos, 'UTF-8');
$apellidos = ucwords($apellidos);

$email = strtolower($email);
// $email = ucwords($email);

$direccion = mb_strtolower($direccion, 'UTF-8');
$direccion = ucwords($direccion);

$sqlDep = "SELECT * FROM tbldepartamento WHERE idDep = :id";
$conDep = $objConexion->prepare($sqlDep);
$conDep->bindParam(':id', $departamento);
$conDep->execute();
$resDep = $conDep->fetchAll();
foreach ($resDep as $keyDep) {
	$nomDep = $keyDep['nomDep'];
}

$sqlMun = "SELECT * FROM tblmunicipio WHERE idMun = :id";
$conMun = $objConexion->prepare($sqlMun);
$conMun->bindParam(':id', $ciudad);
$conMun->execute();
$resMun = $conMun->fetchAll();
foreach ($resMun as $keyMun) {
	$nomMun = $keyMun['nomMun'];
}

$nomDep = strtolower($nomDep);
$nomDep = ucwords($nomDep);

if ( $nomMun != 'BOGOTÁ, D.C.' ) {
	$nomMun = ucwords($nomMun);
	$nomMun = strtolower($nomMun);
}

$sqlEdu = "SELECT * FROM educacion WHERE postulado_id = :id";
$conEdu = $objConexion->prepare($sqlEdu);
$conEdu->bindParam(':id', $_POST['idk']);
$conEdu->execute();
$resConEdu = $conEdu->fetchAll();
foreach ($resConEdu as $keyEdu) {
	$educacion_basica = $keyEdu['educacion_basica'];
	$titulo_obtenido = $keyEdu['titulo_obtenido'];
	$fecha = $keyEdu['fecha'];
	break;
}

$titulo_obtenido = mb_strtolower($titulo_obtenido, 'UTF-8');
$titulo_obtenido = ucfirst($titulo_obtenido);

switch ($educacion_basica) {
	case '1o':
		$educacion_basica = 'Primaria 1o';
		break;

	case '2o':
		$educacion_basica = 'Primaria 2o';
		break;

	case '3o':
		$educacion_basica = 'Primaria 3o';
		break;

	case '4o':
		$educacion_basica = 'Primaria 4o';
		break;

	case '5o':
		$educacion_basica = 'Primaria 5o';
		break;

	case '6o':
		$educacion_basica = 'Secundaria 6o';
		break;

	case '7o':
		$educacion_basica = 'Secundaria 7o';
		break;

	case '8o':
		$educacion_basica = 'Secundaria 8o';
		break;

	case '9o':
		$educacion_basica = 'Secundaria 9o';
		break;

	case '10':
		$educacion_basica = 'Media 10';
		break;

	case '11':
		$educacion_basica = 'Media 11';
		break;
}

$sqlExp = "SELECT * from experiencia WHERE postulado_id = :id";
$conExp = $objConexion->prepare($sqlExp);
$conExp->bindParam(':id', $_POST['idk']);
$conExp->execute();
$resConExp = $conExp->fetchAll();

$sqlRefFam = "SELECT * FROM referencias_familiares WHERE postulado_id = :id";
$conRefFam = $objConexion->prepare($sqlRefFam);
$conRefFam->bindParam(':id', $_POST['idk']);
$conRefFam->execute();
$resConRefFam = $conRefFam->fetchAll();
$numRowRefFam = $conRefFam->rowCount();

$sqlRefLab = "SELECT * FROM referencias_laboral WHERE postulado_id = :id";
$conRefLab = $objConexion->prepare($sqlRefLab);
$conRefLab->bindParam(':id', $_POST['idk']);
$conRefLab->execute();
$resConRefLab = $conRefLab->fetchAll();

if ($cargo == 'Consignatario Satellite') {
	$sqlImg = "SELECT * from files_satellite where postulado_id = :id";
	$conImg = $objConexion->prepare($sqlImg);
	$conImg->bindParam(':id', $_POST['idk']);
	$conImg->execute();
	$resConImg = $conImg->fetchAll();
	if ($conImg->rowCount() == 1) {
		foreach ($resConImg as $keyImg) {
			$image = $keyImg['foto3Satellite'];
		}

		if ($image != '') {
			$pathImg = '../../imagesPostulados/satellite/images/'.$image;
		}
		else{
			$pathImg = '';
		}
	}
}

if ($cargo == 'Consignatario Taquillero') {
	$sqlImg = "SELECT * from files_taquillero where postulado_id = :id";
	$conImg = $objConexion->prepare($sqlImg);
	$conImg->bindParam(':id', $_POST['idk']);
	$conImg->execute();
	$resConImg = $conImg->fetchAll();
	if ($conImg->rowCount() == 1) {
		foreach ($resConImg as $keyImg) {
			$image = $keyImg['foto1Taquillero'];
		}

		if ($image != '') {
			$pathImg = '../../imagesPostulados/taquillero/images/'.$image;
		}
		else{
			$pathImg = '';
		}
	}
}

if ($cargo == 'Auxiliar') {
	$sqlImg = "SELECT * from files_auxiliar where postulado_id = :id";
	$conImg = $objConexion->prepare($sqlImg);
	$conImg->bindParam(':id', $_POST['idk']);
	$conImg->execute();
	$resConImg = $conImg->fetchAll();
	if ($conImg->rowCount() == 1) {
		foreach ($resConImg as $keyImg) {
			$image = $keyImg['foto1Auxiliar'];
		}

		if ($image != '') {
			$pathImg = '../../imagesPostulados/auxiliar/images/'.$image;
		}
		else{
			$pathImg = '';
		}
	}
}

if ($cargo == 'Conductor') {
	$sqlImg = "SELECT * from files_conductor where postulado_id = :id";
	$conImg = $objConexion->prepare($sqlImg);
	$conImg->bindParam(':id', $_POST['idk']);
	$conImg->execute();
	$resConImg = $conImg->fetchAll();
	if ($conImg->rowCount() == 1) {
		foreach ($resConImg as $keyImg) {
			$image = $keyImg['foto1Conductor'];
		}

		if ($image != '') {
			$pathImg = '../../imagesPostulados/conductor/images/'.$image;
		}
		else{
			$pathImg = '';
		}
	}
}

$contItem = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Generar pdf</title>
	<style type="text/css">
		body{
			font:12px/15px "Helvetica Neue",Arial, Helvetica, sans-serif;
		}

		.container{
			padding-right: 35px;
		    padding-left: 35px;
		    margin-right: auto;
		    margin-left: auto;
		    width: 91%;
		    margin-top: 30px;
		}

		.head{
			width: 100%;
			height: 150px;
			border: 1px solid #000;
			border-radius: 15px;
			box-shadow: 7px 7px 0px #000;
		}

		.imgLogo{
			width: 200px;
    		margin-left: 63px;
    		margin-top: 150px;
    		position: absolute;
		}

		.text-center{
			text-align: center;
		}

		.info1{
			margin-top: 10px;
		}

		.num1{
			border: 1px solid #000;
			width: 15px;
			text-align: center;
			background-color: #000;
			color: #fff;
			font-size: 15pt;
			padding: 5px;
			border-radius: 15px;
		}

		.line{
			width: 25px;
			background-color: #28a745;
			height: 2px;
			margin-left: 27px;
			margin-top: -18px;
		}

		.textinfo1{
			border: 1px solid #000;
			width: 300px;
			text-align: center;
			background-color: #000;
			color: #fff;
			font-size: 15pt;
			padding: 5px;
			border-radius: 15px;
			margin-left: 52px;
			margin-top: -30px;
		}

		.infoPersonal{
			border: 1px solid #000;
			width: 99%;
			margin-top: 10px;
			padding-top: 10px;
			padding-right: 10px;
			padding-bottom: 10px;
			padding-left: 18px;
			background-color: #f2fafc;
		}

		.tituloP{
			font-size: 12pt;
			margin-top: -2px;
		}

		.infoP{
			font-size: 15pt;	
		}

		.divider{
			width: 97%;
			height: 2px;
			background-color: #c3c3c3;
			margin-top: -5px;
		}

		.clear{
			clear: both;
		}

		.imgFoto{
			width: 150px;
    		margin-left: 450px;
    		margin-top: 60px;
    		position: absolute;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="head">
			<img src="../../assets/images/logo.png" class="imgLogo">
			<h4 style="position: absolute; margin-top: 70px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FORMATO ÚNICO</h4>
			<h1 style="margin-top: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOJA DE VIDA</h1>
			<?php if ($pathImg != ''): ?>
				<img src="<?php echo $pathImg; ?>" class="imgFoto">
			<?php endif ?>
		</div>

		<div class="info1">
			<div class="num1"><?php $contItem++; echo $contItem; ?></div><div class="line"></div><div class="textinfo1">DATOS PERSONALES</div>
		</div>
		
		<div class="infoPersonal">
			<?php if (strlen($apellidos) >= 19) { ?>
				<p class="tituloP">Apellidos: </p><p class="infoP" style="margin-top: -14px;font-size: 12pt;"><?php echo $apellidos; ?></p>
			<?php }else{ ?>
				<p class="tituloP">Apellidos: </p><p class="infoP" style="margin-top: -14px;"><?php echo $apellidos; ?></p>
			<?php } ?>

			<?php if (strlen($nombres) >= 19) { ?>
				<p class="tituloP" style="margin-left: 240px; margin-top: -65px;">Nombres: </p><p class="infoP" style="margin-top: -14px;margin-left: 240px;font-size: 12pt;"><?php echo $nombres; ?></p>	
			<?php }else{ ?>
				<p class="tituloP" style="margin-left: 240px; margin-top: -60px;">Nombres: </p><p class="infoP" style="margin-top: -14px;margin-left: 240px;"><?php echo $nombres; ?></p>
			<?php } ?>

			<p class="tituloP" style="margin-left: 450px; margin-top: -60px;">Tipo de identificacion: </p><p class="infoP" style="margin-top: -14px;margin-left: 450px;"><?php echo $tipo_id; ?></p>

			<div class="divider"></div>

			<p class="tituloP">Numero de identificacion: </p><p class="infoP" style="margin-top: -14px;"><?php echo $id; ?></p>

			<p class="tituloP" style="margin-left: 240px; margin-top: -60px;">Genero: </p><p class="infoP" style="margin-top: -14px;margin-left: 240px;"><?php echo $genero; ?></p>

			<p class="tituloP" style="margin-left: 450px; margin-top: -60px;">Estado civil: </p><p class="infoP" style="margin-top: -14px;margin-left: 450px;"><?php echo $estado_civil; ?></p>

			<div class="divider"></div>

			<p class="tituloP">Departamento: </p><p class="infoP" style="margin-top: -14px;"><?php echo $nomDep; ?></p>

			<p class="tituloP" style="margin-left: 200px; margin-top: -60px;">Ciudad: </p><p class="infoP" style="margin-top: -14px;margin-left: 200px;"><?php echo $nomMun; ?></p>

			<p class="tituloP" style="margin-left: 370px; margin-top: -60px;">Direccion: </p><p class="infoP" style="margin-top: -14px;margin-left: 370px;"><?php echo $direccion; ?></p>

			<div class="divider"></div>

			<p class="tituloP">Numero de celular: </p><p class="infoP" style="margin-top: -14px;"><?php echo $celular; ?></p>

			<?php if (strlen($email) >= 36) { ?>
				<p class="tituloP" style="margin-left: 200px; margin-top: -60px;">Email: </p><p class="infoP" style="margin-top: -14px;margin-left: 200px;font-size: 12pt;"><?php echo $email; ?></p>
			<?php }else{ ?>
			<p class="tituloP" style="margin-left: 200px; margin-top: -60px;">Email: </p><p class="infoP" style="margin-top: -14px;margin-left: 200px;"><?php echo $email; ?></p>
			<?php } ?>

			<div class="divider"></div>

			<p class="tituloP">Fecha de nacimiento: </p><p class="infoP" style="margin-top: -14px;"><?php echo $nacimiento; ?></p>

			<p class="tituloP" style="margin-left: 200px; margin-top: -60px;">Cargo: </p><p class="infoP" style="margin-top: -14px;margin-left: 200px;"><?php echo $cargo; ?></p>
		</div>


		<div class="info1">
			<div class="num1"><?php $contItem++; echo $contItem; ?></div><div class="line"></div><div class="textinfo1">FORMACIÓN ACADÉMICA</div>
		</div>
		
		<div class="infoPersonal">
			<h5>EDUCACIÓN BÁSICA Y MEDIA</h5>
			<h5 style="margin-top: -10px;font-weight: 100;">Marque con una X el último grado aprobado( los grados de 1o. a 6o. de bachillerato equivalen a los grados 6o. a 11o. de educación básica secundaria y media)</h5>

			<p class="tituloP">Educación básica: </p><p class="infoP" style="margin-top: -12px;"><?php echo $educacion_basica ?>.</p>

			<p class="tituloP" style="margin-left: 180px; margin-top: -60px;">Fecha de grado: </p><p class="infoP" style="margin-top: -12px;margin-left: 180px;"><?php echo $fecha ?></p>

			<?php if (strlen($titulo_obtenido) >= 27) { ?>
				<p class="tituloP" style="margin-left: 360px; margin-top: -60px;">Titulo obtenido: </p><p class="infoP" style="margin-top: -12px;margin-left: 360px; font-size: 12pt;"><?php echo $titulo_obtenido ?></p>
			<?php }else{ ?>
				<p class="tituloP" style="margin-left: 360px; margin-top: -60px;">Titulo obtenido: </p><p class="infoP" style="margin-top: -12px;margin-left: 360px;"><?php echo $titulo_obtenido ?></p>
			<?php } ?>


			<div class="divider"></div>

			<h5>EDUCACION SUPERIOR (PREGRADO Y POSTGRADO)</h5>
			<h5 style="margin-top: -10px;font-weight: 100;">Diligencie este punto en estricto orden cronológico, en modalidad académica escriba: <strong>TC</strong>(TÉCNICA), <strong>TL</strong>(TECNOLÓGICA), <strong>TE</strong>(TECNOLÓGICA ESPECIALIZADA), <strong>UN</strong>(UNIVERSITARIA), <strong>ES</strong>(ESPECIALIZACIÓN), <strong>MG</strong>(MAESTRÍA O MAGISTER), <strong>DOC</strong>(DOCTORADO O PHD).</h5>

			<p class="tituloP" style="font-size: 7pt;"><i>MODALIDAD<br>ACADEMICA</i></p>
			<p class="tituloP" style="margin-left: 75px; margin-top: -29px; font-size: 7pt;"><i>No.SEMESTRES<br>APROBADOS</i></p>
			<p class="tituloP" style="margin-left: 165px; margin-top: -30px; font-size: 7pt;"><i>GRADUADO</i></p>
			<p class="tituloP" style="margin-left: 240px; margin-top: -20px; font-size: 7pt;"><i>NOMBRE DE LOS ESTUDIOS<br>O TÍTULO OBTENIDO</i></p>
			<p class="tituloP" style="margin-left: 450px; margin-top: -30px; font-size: 7pt;"><i>FECHA DE<br>TERMINACION</i></p>
			<p class="tituloP" style="margin-left: 560px; margin-top: -30px; font-size: 7pt;"><i>No. DE TARJETA<br>PROFESIONAL</i></p>
			
			<?php foreach ($resConEdu as $keyEdu) { 
				$titu = $keyEdu['titulo_obtenido2'];
				$titu = mb_strtolower($titu, 'UTF-8');
				$titu = ucfirst($titu);
				?>
				<p class="infoP" style="margin-top: -4px;font-size: 13pt;"><?php echo $keyEdu['modalidad_academica'] ?>.</p>
				<p class="infoP" style="margin-top: -36px;margin-left: 75px;font-size: 13pt;"><?php echo $keyEdu['semestres_aprobados'] ?></p>
				<p class="infoP" style="margin-top: -36px;margin-left: 165px;font-size: 13pt;"><?php echo $keyEdu['graduado'] ?></p>
				<?php if (strlen($titu) >= 26) { 
					$titu = wordwrap($titu, 40, '<br>');
					?>
					<p class="infoP" style="margin-top: -36px;margin-left: 210px;font-size: 9pt;"><?php echo $titu ?></p>
				<?php }else{ ?>
					<p class="infoP" style="margin-top: -36px;margin-left: 240px;font-size: 13pt;"><?php echo $titu ?></p>
				<?php } ?>

				<p class="infoP" style="margin-top: -31px;margin-left: 450px;font-size: 13pt;"><?php echo $keyEdu['fecha_terminacion'] ?></p>
				<p class="infoP" style="margin-top: -36px;margin-left: 560px;font-size: 13pt;"><?php echo $keyEdu['tarjeta_profesional'] ?></p>
			<?php } ?>

			
		</div>
	</div>
	<page>
		<div class="container">
			<div class="info1">
				<div class="num1"><?php $contItem++; echo $contItem; ?></div><div class="line"></div><div class="textinfo1">EXPERIENCIA LABORAL</div>
			</div>

			<div class="infoPersonal">
				<h5 style="font-weight: 100;">relacione su experiencia laboral o de prestación de servicios en estricto orden cronológico comenzado por el actual.</h5>

				<?php foreach ($resConExp as $keyExp) { 
					$empre = $keyExp['empresa'];
					$empre = mb_strtolower($empre, 'UTF-8');
					$empre = ucfirst($empre);

					$pai = $keyExp['pais'];
					$pai = mb_strtolower($pai, 'UTF-8');
					$pai = ucfirst($pai);

					$ema = $keyExp['correo_electronico'];
					// $ema = strtolower($ema);
					// $ema = ucfirst($ema);

					$dep = $keyExp['departamento'];
					$dep = mb_strtolower($dep, 'UTF-8');
					$dep = ucfirst($dep);

					$mun = $keyExp['municipio'];
					$mun = mb_strtolower($mun, 'UTF-8');
					$mun = ucfirst($mun);

					$car = $keyExp['cargo'];
					$car = mb_strtolower($car, 'UTF-8');
					$car = ucfirst($car);

					$dir = $keyExp['direccion'];
					$dir = mb_strtolower($dir, 'UTF-8');
					$dir = ucfirst($dir);

				?>

				<div class="divider" style="background-color: #28a745; margin-top: 30px;"></div>
				
				<?php if (strlen($empre) >= 19) { ?>
					<p class="tituloP">Empresa o entidad: </p><p class="infoP" style="margin-top: -12px; font-size: 12pt;"><?php echo $empre ?></p>
				<?php }else{ ?>
					<p class="tituloP">Empresa o entidad: </p><p class="infoP" style="margin-top: -12px;"><?php echo $empre ?></p>
				<?php } ?>

				<p class="tituloP" style="margin-left: 260px; margin-top: -60px;">Tipo de empresa: </p><p class="infoP" style="margin-top: -12px;margin-left: 260px;"><?php echo $keyExp['empresa_publica_privada']; ?></p>

				<?php if (strlen($pai) >= 15) { ?>
					<p class="tituloP" style="margin-left: 450px; margin-top: -60px;">Pais: </p><p class="infoP" style="margin-top: -12px;margin-left: 450px; font-size: 12pt;"><?php echo $pai ?></p>
				<?php }else{ ?>
					<p class="tituloP" style="margin-left: 450px; margin-top: -60px;">Pais: </p><p class="infoP" style="margin-top: -12px;margin-left: 450px;"><?php echo $pai ?></p>
				<?php } ?>

				<div class="divider"></div>
				
				<?php if (strlen($dep) >= 18) { ?>
					<p class="tituloP">Departamento: </p><p class="infoP" style="margin-top: -12px; font-size: 12pt;"><?php echo $dep ?></p>
				<?php }else{ ?>
					<p class="tituloP">Departamento: </p><p class="infoP" style="margin-top: -12px;"><?php echo $dep ?></p>
				<?php } ?>

				<?php if (strlen($mun) >= 14) { ?>
					<p class="tituloP" style="margin-left: 260px; margin-top: -60px;">Municipio: </p><p class="infoP" style="margin-top: -12px;margin-left: 260px; font-size: 12pt;"><?php echo $mun ?></p>
				<?php }else{ ?>
					<p class="tituloP" style="margin-left: 260px; margin-top: -60px;">Municipio: </p><p class="infoP" style="margin-top: -12px;margin-left: 260px;"><?php echo $mun ?></p>
				<?php } ?>

				<p class="tituloP" style="margin-left: 450px; margin-top: -60px;">Telefono: </p><p class="infoP" style="margin-top: -12px;margin-left: 450px;"><?php echo $keyExp['telefono']; ?></p>

				<div class="divider"></div>

				<?php if (strlen($ema) >= 25) { 
					$emai = wordwrap($ema, 26, '<br>', true);
					?>
					<p class="tituloP">Correo electronico: </p><p class="infoP" style="margin-top: -12px; font-size: 12pt;"><?php echo $emai ?></p>
				<?php }else{ ?>
					<p class="tituloP">Correo electronico: </p><p class="infoP" style="margin-top: -12px;"><?php echo $ema ?></p>
				<?php } ?>

				<p class="tituloP" style="margin-left: 300px; margin-top: -60px;">Fecha de ingreso : </p><p class="infoP" style="margin-top: -12px;margin-left: 300px;"><?php echo $keyExp['fecha_ingreso']; ?></p>

				<p class="tituloP" style="margin-left: 490px; margin-top: -60px;">Fecha de retiro: </p><p class="infoP" style="margin-top: -12px;margin-left: 490px;"><?php echo $keyExp['fecha_retiro']; ?></p>

				<div class="divider"></div>

				<?php if (strlen($car) >= 27) { ?>
					<p class="tituloP">Cargo: </p><p class="infoP" style="margin-top: -12px; font-size: 12pt;"><?php echo $car ?></p>
				<?php }else{ ?>
					<p class="tituloP">Cargo: </p><p class="infoP" style="margin-top: -12px;"><?php echo $car ?></p>
				<?php } ?>

				<?php if (strlen($dir) >= 30) { ?>
					<p class="tituloP" style="margin-left: 300px; margin-top: -60px;">Direccion: </p><p class="infoP" style="margin-top: -12px;margin-left: 300px; font-size: 12pt;"><?php echo $dir ?></p>
				<?php }else{ ?>
					<p class="tituloP" style="margin-left: 300px; margin-top: -60px;">Direccion: </p><p class="infoP" style="margin-top: -12px;margin-left: 300px;"><?php echo $dir ?></p>
				<?php } ?>

				<?php } ?>
								
			</div>
		</div>
	</page>

	<?php if ($numRowRefFam == 2): ?>
		
		<page>
			<div class="container">
				<div class="info1">
					<div class="num1"><?php $contItem++; echo $contItem; ?></div><div class="line"></div><div class="textinfo1">REFERENCIAS FAMILIARES</div>
				</div>

				<div class="infoPersonal">
					<?php foreach ($resConRefFam as $keyRef) { 
						$nom = $keyRef['nombre'];
						$nom = mb_strtolower($nom, 'UTF-8');
						$nom = ucfirst($nom);
					?>

					<div class="divider" style="background-color: #28a745; margin-top: 10px;"></div>
					
					
					<p class="tituloP">Nombre: </p><p class="infoP" style="margin-top: -12px;"><?php echo $nom ?></p>
					<div class="divider"></div>

					<p class="tituloP" style="margin-left: 0px; margin-top: 0px;">Numero de documento: </p><p class="infoP" style="margin-top: -12px;margin-left: 0px;"><?php echo $keyRef['documento']; ?></p>

					<p class="tituloP" style="margin-left: 300px; margin-top: -62px;">Numero de celular: </p><p class="infoP" style="margin-top: -12px;margin-left: 300px;"><?php echo $keyRef['celular']; ?></p>

					<?php } ?>
									
				</div>
			</div>

			<div class="container">
				<div class="info1">
					<div class="num1"><?php $contItem++; echo $contItem; ?></div><div class="line"></div><div class="textinfo1">REFERENCIAS LABORALES</div>
				</div>

				<div class="infoPersonal">
					<?php foreach ($resConRefLab as $keyRef) { 
						$nom = $keyRef['nombre'];
						$nom = mb_strtolower($nom, 'UTF-8');
						$nom = ucfirst($nom);
					?>

					<div class="divider" style="background-color: #28a745; margin-top: 10px;"></div>
					
					
					<p class="tituloP">Nombre: </p><p class="infoP" style="margin-top: -12px;"><?php echo $nom ?></p>
					<div class="divider"></div>

					<p class="tituloP" style="margin-left: 0px; margin-top: 0px;">Numero de documento: </p><p class="infoP" style="margin-top: -12px;margin-left: 0px;"><?php echo $keyRef['documento']; ?></p>

					<p class="tituloP" style="margin-left: 300px; margin-top: -62px;">Numero de celular: </p><p class="infoP" style="margin-top: -12px;margin-left: 300px;"><?php echo $keyRef['celular']; ?></p>

					<?php } ?>
									
				</div>
			</div>
		</page>

	<?php endif ?>

	<?php if ($cargo == 'Conductor'): 
		$sqlFilesCon = "SELECT * from files_conductor where postulado_id = :id";
		$conFilesCon = $objConexion->prepare($sqlFilesCon);
		$conFilesCon->bindParam(':id', $_POST['idk']);
		$conFilesCon->execute();
		$resConFilesCon = $conFilesCon->fetchAll();
		foreach ($resConFilesCon as $keyCon) {
			$cedula           = $keyCon['foto8Conductor'];
			$libretaMilitar   = $keyCon['foto10Conductor'];
			// $estudios = $keyCon['pdf2Conductor'];
			// $foto = $keyCon['foto1Conductor'];
			$antecedentesDici = $keyCon['foto3Conductor'];
			$pasadojudi       = $keyCon['foto4Conductor'];
			$certiExp1        = $keyCon['foto5Conductor'];
			$certiExp2        = $keyCon['foto6Conductor'];
			$simit            = $keyCon['foto7Conductor'];
			$licencia         = $keyCon['foto9Conductor'];
			$certiCondu       = $keyCon['foto12Conductor'];
			$pazSalvo         = $keyCon['foto13Conductor'];
			$eps              = $keyCon['foto14Conductor'];
			$penciones        = $keyCon['foto15Conductor'];
			$examenConduc     = $keyCon['foto16Conductor'];
			$manejoDefensivio = $keyCon['foto17Conductor'];
			$jefeRodamiento   = $keyCon['foto18Conductor'];
		}

		?>
		
		<page>
			<div class="container">
				<div class="info1">
					<div class="num1"><?php $contItem++; echo $contItem; ?></div><div class="line"></div><div class="textinfo1">ANEXOS</div>
				</div>
				<br>
				<img src="../../imagesPostulados/conductor/images/<?php echo $cedula; ?>" width="693" height="693">
			</div>
		</page>
	
		<?php if ($genero == 'Masculino'): ?>
			<page>
				<div class="container">
					<br>
					<img src="../../imagesPostulados/conductor/images/<?php echo $libretaMilitar; ?>" width="693" height="693">
				</div>
			</page>
		<?php endif ?>

		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/conductor/images/<?php echo $antecedentesDici; ?>" width="693" height="693">
			</div>
		</page>
		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/conductor/images/<?php echo $pasadojudi; ?>" width="693" height="693">
			</div>
		</page>
		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/conductor/images/<?php echo $certiExp1; ?>" width="693" height="693">
			</div>
		</page>
		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/conductor/images/<?php echo $certiExp2; ?>" width="693" height="693">
			</div>
		</page>
		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/conductor/images/<?php echo $simit; ?>" width="693" height="693">
			</div>
		</page>
		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/conductor/images/<?php echo $licencia; ?>" width="693" height="693">
			</div>
		</page>
		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/conductor/images/<?php echo $certiCondu; ?>" width="693" height="693">
			</div>
		</page>
		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/conductor/images/<?php echo $pazSalvo; ?>" width="693" height="693">
			</div>
		</page>
		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/conductor/images/<?php echo $eps; ?>" width="693" height="693">
			</div>
		</page>
		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/conductor/images/<?php echo $penciones; ?>" width="693" height="693">
			</div>
		</page>
		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/conductor/images/<?php echo $examenConduc; ?>" width="693" height="693">
			</div>
		</page>
		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/conductor/images/<?php echo $manejoDefensivio; ?>" width="693" height="693">
			</div>
		</page>
		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/conductor/images/<?php echo $jefeRodamiento; ?>" width="693" height="693">
			</div>
		</page><!--  -->

	<?php endif ?>


	<?php if ($cargo == 'Auxiliar'): 
		$sqlFilesAux = "SELECT * from files_auxiliar where postulado_id = :id";
		$conFilesAux = $objConexion->prepare($sqlFilesAux);
		$conFilesAux->bindParam(':id', $_POST['idk']);
		$conFilesAux->execute();
		$resConFilesAux = $conFilesAux->fetchAll();
		foreach ($resConFilesAux as $keyAux) {
			// $fotografia   = $keyAux['foto1Auxiliar'];
			$antecedentes = $keyAux['foto3Auxiliar'];
			// $estudios  = $keyAux['pdf2Conductor'];
			$pasado       = $keyAux['foto4Auxiliar'];
			$exp1         = $keyAux['foto5Auxiliar'];
			$cedula       = $keyAux['foto8Auxiliar']; //
			$libreta      = $keyAux['foto10Auxiliar']; //
			$eps          = $keyAux['foto12Auxiliar'];
			$pensiones    = $keyAux['foto13Auxiliar'];
			$exp2         = $keyAux['foto6Auxiliar'];
		}

		?>
		
		<page>
			<div class="container">
				<div class="info1">
					<div class="num1"><?php $contItem++; echo $contItem; ?></div><div class="line"></div><div class="textinfo1">ANEXOS</div>
				</div>
				<br>
				<img src="../../imagesPostulados/auxiliar/images/<?php echo $cedula; ?>" width="693" height="693">
			</div>
		</page>

		<?php if ($genero == 'Masculino'): ?>
			<page>
				<div class="container">
					<br>
					<img src="../../imagesPostulados/auxiliar/images/<?php echo $libreta; ?>" width="693" height="693">
				</div>
			</page>
		<?php endif ?>

		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/auxiliar/images/<?php echo $antecedentes; ?>" width="693" height="693">
			</div>
		</page>
		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/auxiliar/images/<?php echo $pasado; ?>" width="693" height="693">
			</div>
		</page>
		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/auxiliar/images/<?php echo $eps; ?>" width="693" height="693">
			</div>
		</page>
		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/auxiliar/images/<?php echo $pensiones; ?>" width="693" height="693">
			</div>
		</page>
		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/auxiliar/images/<?php echo $exp1; ?>" width="693" height="693">
			</div>
		</page>
		<page>
			<div class="container">
				<br>
				<img src="../../imagesPostulados/auxiliar/images/<?php echo $exp2; ?>" width="693" height="693">
			</div>
		</page>

	<?php endif ?>


	<?php if ($cargo == 'Consignatario Taquillero'): 
		$sqlFilesTaq = "SELECT * from files_taquillero where postulado_id = :id";
		$conFilesTaq = $objConexion->prepare($sqlFilesTaq);
		$conFilesTaq->bindParam(':id', $_POST['idk']);
		$conFilesTaq->execute();
		$resConFilesTaq = $conFilesTaq->fetchAll();
		foreach ($resConFilesTaq as $keyTaq) {
			$diciplinarios   = $keyTaq['foto2Taquillero'];
			$judicial        = $keyTaq['foto3Taquillero'];
			// $estudios  = $keyTaq['pdf2Conductor'];
			$afiliacion      = $keyTaq['foto8Taquillero']; //
			$exp1            = $keyTaq['foto4Taquillero'];
			$exp2            = $keyTaq['foto5Taquillero'];
			$pensiones       = $keyTaq['foto9Taquillero']; 
			$cedula          = $keyTaq['foto6Taquillero']; 
			$libreta         = $keyTaq['foto7Taquillero'];
			// $fotografia      = $keyTaq['foto1Taquillero'];
		}

		?>
		<?php if ($cedula != ''): ?>
			
			<page>
				<div class="container">
					<div class="info1">
						<div class="num1"><?php $contItem++; echo $contItem; ?></div><div class="line"></div><div class="textinfo1">ANEXOS</div>
					</div>
					<br>
					<img src="../../imagesPostulados/taquillero/images/<?php echo $cedula; ?>" width="693" height="693">
				</div>
			</page>

			<?php if ($genero == 'Masculino'): ?>
				<page>
					<div class="container">
						<br>
						<img src="../../imagesPostulados/taquillero/images/<?php echo $libreta; ?>" width="693" height="693">
					</div>
				</page>
			<?php endif ?>

			<page>
				<div class="container">
					<br>
					<img src="../../imagesPostulados/taquillero/images/<?php echo $diciplinarios; ?>" width="693" height="693">
				</div>
			</page>
			<page>
				<div class="container">
					<br>
					<img src="../../imagesPostulados/taquillero/images/<?php echo $judicial; ?>" width="693" height="693">
				</div>
			</page>
			<page>
				<div class="container">
					<br>
					<img src="../../imagesPostulados/taquillero/images/<?php echo $afiliacion; ?>" width="693" height="693">
				</div>
			</page>
			<page>
				<div class="container">
					<br>
					<img src="../../imagesPostulados/taquillero/images/<?php echo $pensiones; ?>" width="693" height="693">
				</div>
			</page>
			<?php if ($exp1 != ''): ?>
				<page>
					<div class="container">
						<br>
						<img src="../../imagesPostulados/taquillero/images/<?php echo $exp1; ?>" width="693" height="693">
					</div>
				</page>
			<?php endif ?>
			<?php if ($exp2 != ''): ?>
				<page>
					<div class="container">
						<br>
						<img src="../../imagesPostulados/taquillero/images/<?php echo $exp2; ?>" width="693" height="693">
					</div>
				</page>
			<?php endif ?>
		<?php endif ?>
	<?php endif ?>


	<?php if ($cargo == 'Consignatario Satellite'): 
		$sqlFilesSat = "SELECT * from files_satellite where postulado_id = :id";
		$conFilesSat = $objConexion->prepare($sqlFilesSat);
		$conFilesSat->bindParam(':id', $_POST['idk']);
		$conFilesSat->execute();
		$resConFilesSat = $conFilesSat->fetchAll();
		foreach ($resConFilesSat as $keySat) {
			$rut           = $keySat['foto1Satellite'];
			$comercio      = $keySat['foto2Satellite'];
			// $estudios   = $keySat['pdf2Conductor'];
			// $fotografia    = $keySat['foto3Satellite']; 
			$diciplinarios = $keySat['foto4Satellite'];
			$judicial      = $keySat['foto5Satellite'];
			$cedula        = $keySat['foto8Satellite']; 
			$libreta       = $keySat['foto9Satellite']; 
			$exp1          = $keySat['foto6Satellite'];
			$exp2          = $keySat['foto7Satellite'];
		}

		?>
		<?php if ($cedula != ''): ?>
			
			<page>
				<div class="container">
					<div class="info1">
						<div class="num1"><?php $contItem++; echo $contItem; ?></div><div class="line"></div><div class="textinfo1">ANEXOS</div>
					</div>
					<br>
					<img src="../../imagesPostulados/satellite/images/<?php echo $cedula; ?>" width="693" height="693">
				</div>
			</page>

			<?php if ($genero == 'Masculino'): ?>
				<page>
					<div class="container">
						<br>
						<img src="../../imagesPostulados/satellite/images/<?php echo $libreta; ?>" width="693" height="693">
					</div>
				</page>
			<?php endif ?>

			<page>
				<div class="container">
					<br>
					<img src="../../imagesPostulados/satellite/images/<?php echo $diciplinarios; ?>" width="693" height="693">
				</div>
			</page>
			<page>
				<div class="container">
					<br>
					<img src="../../imagesPostulados/satellite/images/<?php echo $judicial; ?>" width="693" height="693">
				</div>
			</page>
			<page>
				<div class="container">
					<br>
					<img src="../../imagesPostulados/satellite/images/<?php echo $rut; ?>" width="693" height="693">
				</div>
			</page>
			<page>
				<div class="container">
					<br>
					<img src="../../imagesPostulados/satellite/images/<?php echo $comercio; ?>" width="693" height="693">
				</div>
			</page>
			<?php if ($exp1 != ''): ?>
				<page>
					<div class="container">
						<br>
						<img src="../../imagesPostulados/satellite/images/<?php echo $exp1; ?>" width="693" height="693">
					</div>
				</page>
			<?php endif ?>
			<?php if ($exp2 != ''): ?>
				<page>
					<div class="container">
						<br>
						<img src="../../imagesPostulados/satellite/images/<?php echo $exp2; ?>" width="693" height="693">
					</div>
				</page>
			<?php endif ?>
		<?php endif ?>
	<?php endif ?>
</body>
</html>

<?php

}

?> 