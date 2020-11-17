<?php 

require "../ConexionBaseDatos_PDO.php";
require "conexion.php";
require "PDO_Pagination.php";
$mod = new Conexion;
$conexion = $mod->conectar();
$pagination = new PDO_Pagination($conexion);
extract($_REQUEST);
extract($_POST);
require "seg.php";
$objConexion=conectaDb();

if ($_SESSION['rol'] != 'Postulados' && $_SESSION['rol'] != 'Todos') {
	header("location:../Administrador.php");
}


// 
// consultas del archivo index
// 
$class1 = '';
$class2 = '';
$class3 = '';
$class4 = '';
$echoEstado = '';
$echoCargo = '';

$countTaquillero = 0;
$countSatellite = 0;
$countAuxiliar = 0;
$countConductor = 0;

$cargo = $_GET['cargo'];
$estado = $_GET['estado'];

$sqlVisto = "SELECT * from postulado where visto = 'no' and cargo = 'Consignatario Taquillero'";
$conVisto = $objConexion->prepare($sqlVisto);
$conVisto->execute();
if ($conVisto->rowCount() >= 1) {
	$countTaquillero = $conVisto->rowCount();
}

$sqlVisto2 = "SELECT * from postulado where visto = 'no' and cargo = 'Consignatario Satellite'";
$conVisto2 = $objConexion->prepare($sqlVisto2);
$conVisto2->execute();
if ($conVisto2->rowCount() >= 1) {
	// echo $conVisto2->rowCount();
	$countSatellite = $conVisto2->rowCount();
}

$sqlVisto3 = "SELECT * from postulado where visto = 'no' and cargo = 'Auxiliar'";
$conVisto3 = $objConexion->prepare($sqlVisto3);
$conVisto3->execute();
if ($conVisto3->rowCount() >= 1) {
	$countAuxiliar = $conVisto3->rowCount();
}

$sqlVisto4 = "SELECT * from postulado where visto = 'no' and cargo = 'Conductor'";
$conVisto4 = $objConexion->prepare($sqlVisto4);
$conVisto4->execute();
if ($conVisto4->rowCount() >= 1) {
	$countConductor = $conVisto4->rowCount();
}

// 
// consultas necesarias del archivo view
// 

$sql2 = "SELECT * FROM postulado WHERE numero_identificacion = :numero";
$con2 = $objConexion->prepare($sql2);
$con2->bindParam(':numero', $_REQUEST['id']);
$con2->execute();
$resultado = $con2->fetchAll();

$sqlUpdate = "UPDATE postulado set visto = 'si' where numero_identificacion = :numero";
$conUpdate = $objConexion->prepare($sqlUpdate);
$conUpdate->bindParam(':numero', $_REQUEST['id']);
$conUpdate->execute();


foreach ($resultado as $num) {
	$numDep = $num['departamento'];
	$numCiu = $num['ciudad'];
	$foto = $num['foto'];
	$idk = $num['id'];
	$genero = $num['genero'];
}

$sqlDep = "SELECT * FROM tbldepartamento WHERE idDep = :id";
$conDep = $objConexion->prepare($sqlDep);
$conDep->bindParam(':id', $numDep);
$conDep->execute();
$resDep = $conDep->fetchAll();
foreach ($resDep as $keyDep) {
	$nomDep = $keyDep['nomDep'];
}

$sqlMun = "SELECT * FROM tblmunicipio WHERE idMun = :id";
$conMun = $objConexion->prepare($sqlMun);
$conMun->bindParam(':id', $numCiu);
$conMun->execute();
$resMun = $conMun->fetchAll();
foreach ($resMun as $keyMun) {
	$nomMun = $keyMun['nomMun'];
}

$sqlEdu = "SELECT * FROM educacion where postulado_id = :id";
$conEdu = $objConexion->prepare($sqlEdu);
$conEdu->bindParam(':id', $idk);
$conEdu->execute();
$resConEdu = $conEdu->fetchAll();
$numRowEdu = $conEdu->rowCount();

$sqlExp = "SELECT * FROM experiencia where postulado_id = :id";
$conExp = $objConexion->prepare($sqlExp);
$conExp->bindParam(':id', $idk);
$conExp->execute();
$resConExp = $conExp->fetchAll();
$numRowExp = $conExp->rowCount();

$sqlRefFam = "SELECT * FROM referencias_familiares WHERE postulado_id = :id";
$conRefFam = $objConexion->prepare($sqlRefFam);
$conRefFam->bindParam(':id', $idk);
$conRefFam->execute();
$resConRefFam = $conRefFam->fetchAll();
$numRowRefFam = $conRefFam->rowCount();

$sqlRefLab = "SELECT * FROM referencias_laboral WHERE postulado_id = :id";
$conRefLab = $objConexion->prepare($sqlRefLab);
$conRefLab->bindParam(':id', $idk);
$conRefLab->execute();
$resConRefLab = $conRefLab->fetchAll();

?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../../assets2/img/logo-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Administrador</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../../assets2/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Dashboard core CSS    -->
    <link href="../../assets2/css/light-bootstrap-dashboard.css?v=1.4.1" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../assets2/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../../assets2/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="green" data-image="../../assets2/img/full-screen-image-3.jpg">
        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

        <div class="logo">

			<a href="index.php?cargo=conductor&estado=Postulado" class="simple-text logo-normal">
				&nbsp;&nbsp;&nbsp;Cootranshuila
			</a>
        </div>

    	<div class="sidebar-wrapper">
            <div class="user">
				<div class="info">
					<div class="photo">
	                    <img src="../../assets2/img/faces/face-0.jpg" />
	                </div>

					<a data-toggle="collapse" href="#" class="collapsed" style="cursor: default;">
						<span>
							<?php echo $_SESSION["user"]; ?>
						</span>
                    </a>
				</div>
            </div>

			<ul class="nav">
				<?php if ($_GET['cargo'] == 'conductor' ){
		  			$class1 = 'active';
		  			$echoCargo = 'Conductores';
		  		} ?>
		  		<?php if ($_GET['cargo'] == 'auxiliar' ){
		  			$class2 = 'active';
		  			$echoCargo = 'Auxiliares de conduccion';
		  		} ?>
		  		<?php if ($_GET['cargo'] == 'Consignatario Taquillero' ){
		  			$class3 = 'active';
		  			$echoCargo = 'Consignatarios taquilleros';
		  		} ?>
		  		<?php if ($_GET['cargo'] == 'Consignatario Satellite' ){
		  			$class4 = 'active';
		  			$echoCargo = 'Consignatarios satellites';
		  		} ?>

				
				<?php if ($_SESSION['rol'] == 'Todos'): ?>
					<li class="active">
						<a href="../Administrador.php">
							<i class="fa fa-home"></i>
							<p>Inicio</p>
						</a>
					</li>
				<?php endif ?>

				<li class="active">
					<?php if ($countConductor >= 1){ ?>
						<a href="index.php?cargo=conductor&estado=Postulado" class="<?php echo $class1; ?>">
							<i class="fa fa-car"></i>
							<p>Conductores <span class="badge badge-primary" style="background-color: #447DF7"><?php echo $countConductor ?></span></p>
						</a>
					<?php }
				  	else{ ?>
						<a href="index.php?cargo=conductor&estado=Postulado" class="<?php echo $class1; ?>">
							<i class="fa fa-car"></i>
							<p>Conductores</p>
						</a>
				  	<?php } ?>
				</li>
				<li class="active">
					<?php if ($countAuxiliar >= 1){ ?>
						<a href="index.php?cargo=auxiliar&estado=Postulado" class="<?php echo $class2; ?>">
							<i class="fa fa-hands-helping"></i>
							<p>Auxiliares de conduccion <span class="badge badge-primary" style="background-color: #447DF7"><?php echo $countAuxiliar ?></span></p>
						</a>
					<?php }
				  	else{ ?>
						<a href="index.php?cargo=auxiliar&estado=Postulado" class="<?php echo $class2; ?>">
							<i class="fa fa-hands-helping"></i>
							<p>Auxiliares de conduccion</p>
						</a>
				  	<?php } ?>
				</li>
				<li class="active">
					<?php if ($countTaquillero >= 1){ ?>
						<a href="index.php?cargo=Consignatario+Taquillero&estado=Postulado" class="<?php echo $class3; ?>">
							<i class="fa fa-user-tie"></i>
							<p>Consignatarios taquilleros <span class="badge badge-primary" style="background-color: #447DF7"><?php echo $countTaquillero ?></span></p>
						</a>
					<?php }
				  	else{ ?>
						<a href="index.php?cargo=Consignatario+Taquillero&estado=Postulado" class="<?php echo $class3; ?>">
							<i class="fa fa-user-tie"></i>
							<p>Consignatarios taquilleros</p>
						</a>
				  	<?php } ?>
				</li>
				<li class="active">
					<?php if ($countSatellite >= 1){ ?>
						<a href="index.php?cargo=Consignatario+Satellite&estado=Postulado" class="<?php echo $class4; ?>">
							<i class="fa fa-user-cog"></i>
							<p>Consignatarios satellite <span class="badge badge-primary" style="background-color: #447DF7"><?php echo $countSatellite ?></span></p>
						</a>
					<?php }
				  	else{ ?>
						<a href="index.php?cargo=Consignatario+Satellite&estado=Postulado" class="<?php echo $class4; ?>">
							<i class="fa fa-user-cog"></i>
							<p>Consignatarios satellite</p>
						</a>
				  	<?php } ?>
				</li>
			</ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-minimize">
					<button id="minimizeSidebar" class="btn btn-success btn-fill btn-round btn-icon">
						<i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
						<i class="fa fa-navicon visible-on-sidebar-mini"></i>
					</button>
				</div>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#" style="cursor: default;">Panel de administracion | <?php echo date("d / m / y  | ");?>
						<div class="reloj">
					        <span id="pHoras"></span><span> : </span>
					        <span id="pMinutos"></span><span> : </span>
					        <span id="pSegundos"></span>
					    </div>
					</a>
				</div>
				<div class="collapse navbar-collapse">

					<ul class="nav navbar-nav navbar-right">

						<li class="dropdown dropdown-with-icons">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-list"></i>
								<p class="hidden-md hidden-lg">
									More
									<b class="caret"></b>
								</p>
							</a>
							<ul class="dropdown-menu dropdown-with-icons">
								<li>
									<a href="#" style="cursor: default;">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Configuracion
									</a>
								</li>
								<li class="divider"></li>
								<!-- <li>
									<a href="#">
										<i class="pe-7s-lock"></i> Lock Screen
									</a>
								</li> -->
								<li>
									<a href="../Administrador.php?salir=si" class="text-danger">
										<i class="pe-7s-close-circle"></i>
										Cerrar sesion
									</a>
								</li>
							</ul>
						</li>

					</ul>
				</div>
			</div>
		</nav>

        <div class="main-content">
            <div class="container-fluid">
				<a href="index.php?cargo=<?php echo $_REQUEST['cargo'] ?>&estado=<?php echo $_REQUEST['estado'] ?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> Regresar</a>

                <div class="row mt-1">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="header">
                                <h3 class="title">Datos personales</h3>
                                <hr>
                            </div>
                            <div class="content">
                            	<?php if ($foto != ''){ ?>
									<img src="../../imagesPostulados/postulados/<?php echo $foto ?>" class="img-thumbnail rounded float-right" style="float: right;" alt="foto personal" width="300">
								<?php }else{ ?>
                            		<img src="../../assets2/img/faces/face-0.jpg" alt="foto personal" class="img-thumbnail rounded float-right" style="float: right;">
                            	<?php } ?>

								<?php foreach ($resultado as $key1) { 
						    	$id = $key1['id'];
						    	$miEstado = $key1['estado'];
						    	$nombreC = $key1['nombres']." ".$key1['apellidos'] ?>
									<h5>
										<span class="badge badge-primary" style="font-size: 17px;">Nombre:</span> 
										<?php echo $nombreC; ?>
									</h5>
									<h5>
										<span class="badge badge-primary" style="font-size: 17px;">Tipo de identificacion:</span> 
										 <?php echo $key1['tipo_identificacion']; ?>
									</h5>
									<h5>
										<span class="badge badge-primary" style="font-size: 17px;">Numero de identificacion:</span> 
										<?php echo $key1['numero_identificacion']; ?>
									</h5>
									<h5>
										<span class="badge badge-primary" style="font-size: 17px;">Email:</span>  
										<?php echo $key1['email']; ?>
									</h5>
									<h5>
										<span class="badge badge-primary" style="font-size: 17px;">Genero:</span>  
										<?php echo $key1['genero']; ?>
									</h5>
									<h5>
										<span class="badge badge-primary" style="font-size: 17px;">Estado civil:</span> 
										<?php echo $key1['estado_civil']; ?>
									</h5>
									<h5>
										<span class="badge badge-primary" style="font-size: 17px;">Numero de celular:</span>  <?php echo $key1['numero_celular']; ?>
									</h5>
									<h5>
										<span class="badge badge-primary" style="font-size: 17px;">Departamento:</span> 
										<?php echo $nomDep; ?>
									</h5>
									<h5>
										<span class="badge badge-primary" style="font-size: 17px;">Ciudad:</span> 
										<?php echo $nomMun; ?>
									</h5>
									<h5>
										<span class="badge badge-primary" style="font-size: 17px;">Direccion:</span> 
										<?php echo $key1['direccion']; ?>
									</h5>
									<h5>
										<span class="badge badge-primary" style="font-size: 17px;">Fecha de nacimiento:</span> 
										<?php echo $key1['fecha_nacimiento']; ?>
									</h5>
									<h5>
										<span class="badge badge-primary" style="font-size: 17px;">Cargo:</span> 
										<?php echo $key1['cargo']; ?>
									</h5>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>


				<?php if ($numRowEdu != 0): ?>
                <div class="row mt-1">
                    <div class="col-md-12">
                        <div class="card" style="height: 600px;">
                            <div class="header">
                                <h3 class="title">Formacion academica</h3>
                                <hr>
                            </div>
                            <div class="content">
                            	<h4 class="text-center">Educacion basica y media</h4>
                            	<?php foreach ($resConEdu as $keyEdu) {  ?>
									<h5>
										<span class="badge badge-primary" style="font-size: 17px;">Educacion basica:</span> 
										<?php echo $keyEdu['educacion_basica']; ?>
									</h5>
									<h5>
										<span class="badge badge-primary" style="font-size: 17px;">Titulo obtenido:</span> 
										<?php echo $keyEdu['titulo_obtenido']; ?>
									</h5>
									<h5>
										<span class="badge badge-primary" style="font-size: 17px;">Fecha de grado:</span> 
										<?php echo $keyEdu['fecha']; ?>
									</h5>
								<?php break; } ?>

								<h4 class="text-center">Educacion Superior(pregrado y postgrado)</h4>
								<?php foreach ($resConEdu as $keyEdu) {  
						    	if ($keyEdu['modalidad_academica'] == 'TC') {
						    		$mod = 'Tecnica';
						    	}
						    	if ($keyEdu['modalidad_academica'] == 'TL') {
						    		$mod = 'Tecnologica';
						    	}
						    	if ($keyEdu['modalidad_academica'] == 'TE') {
						    		$mod = 'Tecnologica especializada';
						    	}
						    	if ($keyEdu['modalidad_academica'] == 'UN') {
						    		$mod = 'Universitaria';
						    	}
						    	if ($keyEdu['modalidad_academica'] == 'ES') {
						    		$mod = 'Especializacion';
						    	}
						    	if ($keyEdu['modalidad_academica'] == 'MG') {
						    		$mod = 'Maestria o magister';
						    	}
						    	if ($keyEdu['modalidad_academica'] == 'DOC') {
						    		$mod = 'Doctorado o PHD';
						    	}
						    	?>
									<div style="float: left; width: 50%;">
										<h5><span class="badge badge-primary" style="font-size: 17px;">Modalidad academica:</span> <?php echo $mod; ?></h5>
										<h5><span class="badge badge-primary" style="font-size: 17px;">Semestres aprobados:</span> <?php echo $keyEdu['semestres_aprobados']; ?></h5>
										<h5><span class="badge badge-primary" style="font-size: 17px;">Graduado:</span> <?php echo $keyEdu['graduado']; ?></h5>
										<h5><span class="badge badge-primary" style="font-size: 17px;">Titulo obtenido:</span> <?php echo $keyEdu['titulo_obtenido2']; ?></h5>
										<h5><span class="badge badge-primary" style="font-size: 17px;">Fecha de terminacion:</span> <?php echo $keyEdu['fecha_terminacion']; ?></h5>
										<h5><span class="badge badge-primary" style="font-size: 17px;">N° tarjeta profesional:</span> <?php echo $keyEdu['tarjeta_profesional']; ?></h5>
									</div>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>

				<?php if ($numRowExp != 0): ?>
                <div class="row mt-1">
                    <div class="col-md-12">
                        <div class="card" style="height: 620px;">
                            <div class="header">
                                <h3 class="title">Experiencia laboral</h3>
                                <hr>
                            </div>
                            <div class="content">
								<h4 class="text-center">Empleo actual o contrato anterior</h4>
								
								<?php foreach ($resConExp as $keyExp) {  ?>
									<div style="float: left; width: 50%;">
										<h5><span class="badge badge-primary" style="font-size: 17px;">Empresa o entidad:</span> <?php echo $keyExp['empresa']; ?></h5>
										<h5><span class="badge badge-primary" style="font-size: 17px;">Tipo empresa:</span> <?php echo $keyExp['empresa_publica_privada']; ?></h5>
										<h5><span class="badge badge-primary" style="font-size: 17px;">Pais:</span> <?php echo $keyExp['pais']; ?></h5>
										<h5><span class="badge badge-primary" style="font-size: 17px;">Departamento:</span> <?php echo $keyExp['departamento']; ?></h5>
										<h5><span class="badge badge-primary" style="font-size: 17px;">Municipio:</span> <?php echo $keyExp['municipio']; ?></h5>
										<h5><span class="badge badge-primary" style="font-size: 17px;">Correo electronico:</span> <?php echo $keyExp['correo_electronico']; ?></h5>
										<h5><span class="badge badge-primary" style="font-size: 17px;">Telefono:</span> <?php echo $keyExp['telefono']; ?></h5>
										<h5><span class="badge badge-primary" style="font-size: 17px;">Fecha de ingreso:</span> <?php echo $keyExp['fecha_ingreso']; ?></h5>
										<h5><span class="badge badge-primary" style="font-size: 17px;">Fecha de retiro:</span> <?php echo $keyExp['fecha_retiro']; ?></h5>
										<h5><span class="badge badge-primary" style="font-size: 17px;">Cargo:</span> <?php echo $keyExp['cargo']; ?></h5>
										<h5><span class="badge badge-primary" style="font-size: 17px;">Direccion:</span> <?php echo $keyExp['direccion']; ?></h5>
									</div>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>


				<?php if ($numRowRefFam != 0): ?>
	                <div class="row mt-1">
	                    <div class="col-md-12">
	                        <div class="card" style="height: 240px;">
	                            <div class="header">
	                                <h3 class="title">Referencias Familiares</h3>
	                                <hr>
	                            </div>
	                            <div class="content">
									<?php foreach ($resConRefFam as $keyRef) { ?>
										<div style="float: left; width: 50%;">
											<h5><span class="badge badge-primary" style="font-size: 17px;">Nombre:</span> <?php echo $keyRef['nombre']; ?></h5>
											<h5><span class="badge badge-primary" style="font-size: 17px;">Numero de documento:</span> <?php echo $keyRef['documento']; ?></h5>
											<h5><span class="badge badge-primary" style="font-size: 17px;">Numero de celular:</span> <?php echo $keyRef['celular']; ?></h5>
										</div>
									<?php } ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>

	                <div class="row mt-1">
	                    <div class="col-md-12">
	                        <div class="card" style="height: 240px;">
	                            <div class="header">
	                                <h3 class="title">Referencias Laborales</h3>
	                                <hr>
	                            </div>
	                            <div class="content">
									<?php foreach ($resConRefLab as $keyRef) { ?>
										<div style="float: left; width: 50%;">
											<h5><span class="badge badge-primary" style="font-size: 17px;">Nombre:</span> <?php echo $keyRef['nombre']; ?></h5>
											<h5><span class="badge badge-primary" style="font-size: 17px;">Numero de documento:</span> <?php echo $keyRef['documento']; ?></h5>
											<h5><span class="badge badge-primary" style="font-size: 17px;">Numero de celular:</span> <?php echo $keyRef['celular']; ?></h5>
										</div>
									<?php } ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                <?php endif ?>

				
				<?php if ($_GET['cargo'] == 'Consignatario Taquillero'): 
				$sqlTaquillero = "SELECT * FROM files_taquillero where postulado_id = :id";
				$conTaquillero = $objConexion->prepare($sqlTaquillero);
				$conTaquillero->bindParam(':id', $id);
				$conTaquillero->execute();
				$resTaquillero = $conTaquillero->fetchAll();
				if ($conTaquillero->rowCount() >= 1) {
					
				?>
	                <div class="row mt-1">
	                    <div class="col-md-12">
	                        <div class="card" style="height: 430px;">
	                            <div class="header">
	                                <h3 class="title">Anexos</h3>
	                                <hr>
	                            </div>
	                            <div class="content">
									<?php foreach ($resTaquillero as $key2) { ?>
										<div style="float: left; width: 50%;">
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Vinculado a la empresa:</span> 
												<?php echo $key2['vinculado']; ?>
											</h5>
											<?php if ($key2['foto2Taquillero'] != ''): ?>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Antecedentes diciplinarios:</span> 
												<a href="../../imagesPostulados/taquillero/images/<?php echo $key2['foto2Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Pasado judicial:</span> 
												<a href="../../imagesPostulados/taquillero/images/<?php echo $key2['foto3Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Certificado de afiliacion a EPS:</span>
												 <a href="../../imagesPostulados/taquillero/images/<?php echo $key2['foto8Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<?php if ($key2['foto5Taquillero'] != ''): ?>
												<h5>
													<span class="badge badge-primary" style="font-size: 17px;">Certificado de experiencia laboral 2:</span>
													 <a href="../../imagesPostulados/taquillero/images/<?php echo $key2['foto5Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
												</h5>
											<?php endif ?>
										</div>
										<div style="float: left; width: 50%;">
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Certificado de estudios:</span> 
												<a href="../../imagesPostulados/taquillero/pdf/<?php echo $key2['pdf1Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Certificado fondo de pensiones:</span> 
												<a href="../../imagesPostulados/taquillero/images/<?php echo $key2['foto9Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de cedula:</span> 
												<a href="../../imagesPostulados/taquillero/images/<?php echo $key2['foto6Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Fotografia(fondo azul 3x4):</span> 
												<a href="../../imagesPostulados/taquillero/images/<?php echo $key2['foto1Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<?php if ($genero == 'Masculino'): ?>
												<h5>
													<span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de libreta militar:</span> 
													<a href="../../imagesPostulados/taquillero/images/<?php echo $key2['foto7Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
												</h5>
											<?php endif ?>
											<?php if ($key2['foto4Taquillero'] != ''): ?>
												<h5>
													<span class="badge badge-primary" style="font-size: 17px;">Certificado de experiencia laboral 1:</span> 
													<a href="../../imagesPostulados/taquillero/images/<?php echo $key2['foto4Taquillero'] ?>" class="btn btn-link" target="_blank">Ver..</a>
												</h5>
											<?php endif ?>

											<?php endif ?>
										</div>
									<?php } ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                <?php } endif ?>

                <?php if ($_GET['cargo'] == 'Consignatario Satellite'): 
				$sqlSatellite = "SELECT * FROM files_satellite where postulado_id = :id";
				$conSatellite = $objConexion->prepare($sqlSatellite);
				$conSatellite->bindParam(':id', $id);
				$conSatellite->execute();
				$resSatellite = $conSatellite->fetchAll();
				if ($conSatellite->rowCount() >= 1) {
					
				?>
	                <div class="row mt-1">
	                    <div class="col-md-12">
	                        <div class="card" style="height: 430px;">
	                            <div class="header">
	                                <h3 class="title">Anexos</h3>
	                                <hr>
	                            </div>
	                            <div class="content">
									<?php foreach ($resSatellite as $key2) { ?>
										<div style="float: left; width: 50%;">
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">RUT:</span> 
												<a href="../../imagesPostulados/satellite/images/<?php echo $key2['foto1Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Camara y comercio del establecimiento:</span> 
												<a href="../../imagesPostulados/satellite/images/<?php echo $key2['foto2Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Fotografia(fondo azul 3x4):</span> 
												<a href="../../imagesPostulados/satellite/images/<?php echo $key2['foto3Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Antecedentes diciplinarios:</span>
												 <a href="../../imagesPostulados/satellite/images/<?php echo $key2['foto4Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<?php if ($key2['foto6Satellite'] != ''): ?>
												<h5>
													<span class="badge badge-primary" style="font-size: 17px;">Certificado de experiencia laboral 1:</span>
													 <a href="../../imagesPostulados/satellite/images/<?php echo $key2['foto6Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
												</h5>
											<?php endif ?>
										</div>
										<div style="float: left; width: 50%;">
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Pasado judicial:</span> 
												<a href="../../imagesPostulados/satellite/images/<?php echo $key2['foto5Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Certificado de estudios:</span> 
												<a href="../../imagesPostulados/satellite/pdf/<?php echo $key2['pdf1Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de cedula:</span> 
												<a href="../../imagesPostulados/satellite/images/<?php echo $key2['foto8Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<?php if ($genero == 'Masculino'): ?>
												<h5>
													<span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de libreta militar:</span> 
													<a href="../../imagesPostulados/satellite/images/<?php echo $key2['foto9Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
												</h5>
											<?php endif ?>
											<?php if ($key2['foto7Satellite'] != ''): ?>
												<h5>
													<span class="badge badge-primary" style="font-size: 17px;">Certificado de experiencia laboral 1:</span> 
													<a href="../../imagesPostulados/satellite/images/<?php echo $key2['foto7Satellite'] ?>" class="btn btn-link" target="_blank">Ver..</a>
												</h5>
											<?php endif ?>
										</div>
									<?php } ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                <?php } endif ?>

                <?php if ($_GET['cargo'] == 'auxiliar'): 
				$sqlAuxiliar = "SELECT * FROM files_auxiliar where postulado_id = :id";
				$conAuxiliar = $objConexion->prepare($sqlAuxiliar);
				$conAuxiliar->bindParam(':id', $id);
				$conAuxiliar->execute();
				$resAuxiliar = $conAuxiliar->fetchAll();
				if ($conAuxiliar->rowCount() >= 1) {
					
				?>
	                <div class="row mt-1">
	                    <div class="col-md-12">
	                        <div class="card" style="height: 430px;">
	                            <div class="header">
	                                <h3 class="title">Anexos</h3>
	                                <hr>
	                            </div>
	                            <div class="content">
									<?php foreach ($resAuxiliar as $key2) { ?>
										<div style="float: left; width: 50%;">
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Fotografia(fondo azul 3x4):</span> 
												<a href="../../imagesPostulados/auxiliar/images/<?php echo $key2['foto1Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Antecedentes diciplinarios:</span> 
												<a href="../../imagesPostulados/auxiliar/images/<?php echo $key2['foto3Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Pasado juducial:</span> 
												<a href="../../imagesPostulados/auxiliar/images/<?php echo $key2['foto4Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Certificado de estudios:</span>
												 <a href="../../imagesPostulados/auxiliar/pdf/<?php echo $key2['pdf2Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Certificado de experiencia laboral 1:</span>
												 <a href="../../imagesPostulados/auxiliar/images/<?php echo $key2['foto5Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
										</div>
										<div style="float: left; width: 50%;">
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de cedula:</span> 
												<a href="../../imagesPostulados/auxiliar/images/<?php echo $key2['foto8Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Certificado de afiliacion a EPS:</span> 
												<a href="../../imagesPostulados/auxiliar/images/<?php echo $key2['foto12Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Certificado fondo de pensiones:</span> 
												<a href="../../imagesPostulados/auxiliar/images/<?php echo $key2['foto13Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<?php if ($genero == 'Masculino'): ?>
												<h5>
													<span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de libreta militar:</span> 
													<a href="../../imagesPostulados/auxiliar/images/<?php echo $key2['foto10Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
												</h5>
											<?php endif ?>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Certificado de experiencia laboral 2:</span> 
												<a href="../../imagesPostulados/auxiliar/images/<?php echo $key2['foto6Auxiliar'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
										</div>
									<?php } ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                <?php } endif ?>

                <?php if ($_GET['cargo'] == 'conductor'): 
				$sqlConductor = "SELECT * FROM files_conductor where postulado_id = :id";
				$conConductor = $objConexion->prepare($sqlConductor);
				$conConductor->bindParam(':id', $id);
				$conConductor->execute();
				$resConductor = $conConductor->fetchAll();
				if ($conConductor->rowCount() >= 1) {
					
				?>
	                <div class="row mt-1">
	                    <div class="col-md-12">
	                        <div class="card" style="height: 670px;">
	                            <div class="header">
	                                <h3 class="title">Anexos</h3>
	                                <hr>
	                            </div>
	                            <div class="content">
									<?php foreach ($resConductor as $key2) { ?>
										<div style="float: left; width: 50%;">
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Fotografia fondo azul 3x4:</span> 
												<a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto1Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Antecedentes diciplinarios:</span> 
												<a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto3Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Pasado juducial:</span> 
												<a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto4Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Certificado de estudios:</span>
												 <a href="../../imagesPostulados/conductor/pdf/<?php echo $key2['pdf2Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de pasado judicial:</span>
												 <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto11Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Fotocopia a blanco y negro de certificados de conduccion:</span>
												 <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto12Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Ultimo paz y salvo<br>(Asociado o empresa donde halla laborado):</span>
												 <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto13Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Certificado de afiliacion a EPS:</span>
												 <a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto14Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
										</div>
										<div style="float: left; width: 50%;">
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Certificado de experiencia laboral 1:</span> 
												<a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto5Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Certificado de experiencia laboral 2:</span> 
												<a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto6Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Simit:</span> 
												<a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto7Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<?php if ($genero == 'Masculino'): ?>
												<h5>
													<span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de libreta militar:</span> 
													<a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto10Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
												</h5>
											<?php endif ?>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de cedula:</span> 
												<a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto8Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Fotocopia a color de licencia de conduccion:</span> 
												<a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto9Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Certificado fondo de pensiones:</span> 
												<a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto15Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Examen de conduccion, realizado por el inspector Perito<br> "prueba de conduccion":</span> 
												<a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto16Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Certificado manejo defensivo:</span> 
												<a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto17Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
											<h5>
												<span class="badge badge-primary" style="font-size: 17px;">Concepto jefe rodamiento:</span> 
												<a href="../../imagesPostulados/conductor/images/<?php echo $key2['foto18Conductor'] ?>" class="btn btn-link" target="_blank">Ver..</a>
											</h5>
										</div>
									<?php } ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                <?php } endif ?>


				<?php if ($miEstado == 'Citado a entrevista') {
				$sqlEntrevista = "SELECT * FROM entrevista where postulado_id = :id";
				$conEntrevista = $objConexion->prepare($sqlEntrevista);
				$conEntrevista->bindParam(':id', $id);
				$conEntrevista->execute();
				$resEntrevista = $conEntrevista->fetchAll(); ?>
	                <div class="row mt-1">
	                    <div class="col-md-12">
	                        <div class="card" style="height: 320px;">
	                            <div class="header">
	                                <h3 class="title">Entrevista</h3>
	                                <hr>
	                            </div>
	                            <div class="content">
									<?php foreach ($resEntrevista as $key3) { ?>
										<div>
											<h5><span class="badge badge-primary" style="font-size: 17px;">Fecha:</span> <?php echo $key3['fecha'] ?></h5>
											<h5><span class="badge badge-primary" style="font-size: 17px;">Lugar:</span> <?php echo $key3['lugar'] ?></h5>
											<h5><span class="badge badge-primary" style="font-size: 17px;">Hora:</span> <?php echo $key3['hora'] ?></h5>
											<h5><span class="badge badge-primary" style="font-size: 17px;">Observaciones:</span> <?php echo $key3['obs'] ?></h5>
										</div>
									<?php } ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
            	<?php } ?>


				<?php if ($_GET['estado'] == 'Postulado' ): ?>

					<form action="view_pdf.php" method="post" target="_blank">
						<input type="hidden" name="idk" value="<?php echo $idk; ?>">
						<button type="submit" class="btn btn-primary">
							<i class="fa fa-file-pdf"></i> Generar hoja de vida en pdf
						</button>
					</form>
					<br>

	                <a href="delete.php?id=<?php echo $_REQUEST['id'] ?>&delete=si&cargo=<?php echo $_REQUEST['cargo'] ?>&estado=<?php echo $_REQUEST['estado'] ?>" class="btn btn-danger mt-1"><i class="fa fa-trash-alt"></i> Rechazar hoja de vida del postulado</a>

	                <button type="button" class="btn btn-success mt-1" data-toggle="modal" data-target="#Modal"><i class="fa fa-clock"></i> Citar a entrevista</button>

                <?php endif ?>

                <?php if ($_GET['estado'] == 'Citado a entrevista' ): ?>

					<form action="view_pdf.php" method="post" target="_blank">
						<input type="hidden" name="idk" value="<?php echo $idk; ?>">
						<button type="submit" class="btn btn-primary">
							<i class="fa fa-file-pdf"></i> Generar hoja de vida en pdf
						</button>
					</form>
					<br>

	                <a href="delete.php?id=<?php echo $_REQUEST['id'] ?>&delete=si&cargo=<?php echo $_REQUEST['cargo'] ?>&estado=<?php echo $_REQUEST['estado'] ?>" class="btn btn-danger mt-1"><i class="fa fa-trash-alt"></i> Rechazar hoja de vida del postulado</a>

                <?php endif	 ?>
				

				<!-- Modal -->
				<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  	<div class="modal-dialog" role="document">
				    	<div class="modal-content">
				      		<div class="modal-header" style="background-color: #218838;">
				        		<h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">Citar a entrevista</h5>
				        		<button style="margin-top: -25px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
				          			<span aria-hidden="true" style="color: #fff;">&times;</span>
				        		</button>
				      		</div>
				      		<form action="citar.php" method="get">
					      		<div class="modal-body">
						        	<input type="hidden" name="cargo" value="<?php echo $_GET['cargo'] ?>">
						        	<input type="hidden" name="estado" value="<?php echo $_GET['estado'] ?>">
						        	<input type="hidden" name="id" value="<?php echo $id ?>">
								  	<div class="form-group">
								    	<label for="fecha">Fecha</label>
								    	<input required type="date" class="form-control" id="fecha" name="fecha">
								  	</div>
								  	<div class="form-group">
								    	<label for="hora">Hora</label>
								    	<input required type="time" class="form-control" onchange="onTimeChange()" id="hora1" name="hora1">
								    	<input required type="hidden" class="form-control" id="hora" name="hora">
								  	</div>
								  	<div class="form-group">
								    	<label for="lugar">Lugar</label>
								    	<input required type="text" class="form-control" id="lugar" name="lugar">
								  	</div>
								  	<div class="form-group">
								    	<label for="obs">Observaciones</label>
								    	<input type="text" class="form-control" id="obs" name="obs">
								  	</div>
					      		</div>
					      		<div class="modal-footer">
					        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					        		<button type="submit" class="btn btn-primary">Citar</button>
					      		</div>
				      		</form>
				    	</div>
				  	</div>
				</div>


            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a target="_blank" href="http://www.cootranshuila.com">Cootranshuila</a>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>
    <!--   Core JS Files  -->
    <script src="../../assets2/js/jquery.min.js" type="text/javascript"></script>
	<script src="../../assets2/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../assets2/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>


	<!--  Forms Validations Plugin -->
	<script src="../../assets2/js/jquery.validate.min.js"></script>

	<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
	<script src="../../assets2/js/moment.min.js"></script>

    <!--  Date Time Picker Plugin is included in this js file -->
    <script src="../../assets2/js/bootstrap-datetimepicker.min.js"></script>

    <!--  Select Picker Plugin -->
    <script src="../../assets2/js/bootstrap-selectpicker.js"></script>

	<!--  Checkbox, Radio, Switch and Tags Input Plugins -->
		<script src="../../assets2/js/bootstrap-switch-tags.min.js"></script>

	

    <!--  Notifications Plugin    -->
    <script src="../../assets2/js/bootstrap-notify.js"></script>

    <!-- Sweet Alert 2 plugin -->
	<script src="../../assets2/js/sweetalert2.js"></script>

    <!-- Vector Map plugin -->
	<script src="../../assets2/js/jquery-jvectormap.js"></script>

    

	<!-- Wizard Plugin    -->
    <script src="../../assets2/js/jquery.bootstrap.wizard.min.js"></script>

    <!--  Bootstrap Table Plugin    -->
    <script src="../../assets2/js/bootstrap-table.js"></script>

	<!--  Plugin for DataTables.net  -->
    <script src="../../assets2/js/jquery.datatables.js"></script>

    <!-- Light Bootstrap Dashboard Core javascript and methods -->
	<script src="../../assets2/js/light-bootstrap-dashboard.js?v=1.4.1"></script>

	<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
	<script src="../../assets2/js/demo.js"></script>
	<script type="text/javascript" src="../../assets/js/mainAd.js"></script>

	<script type="text/javascript">
		var inputEle = document.getElementById('hora1');
		function onTimeChange() {
		  var timeSplit = inputEle.value.split(':'),
		    hours,
		    minutes,
		    meridian;
		  hours = timeSplit[0];
		  minutes = timeSplit[1];
		  if (hours > 12) {
		    meridian = 'PM';
		    hours -= 12;
		  } else if (hours < 12) {
		    meridian = 'AM';
		    if (hours == 0) {
		      hours = 12;
		    }
		  } else {
		    meridian = 'PM';
		  }
		  var time = hours + ':' + minutes + ' ' + meridian;
		  $('#hora').val(time);
		}
	</script>


</html>
