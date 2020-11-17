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


$sql1 = "SELECT * from postulado WHERE cargo = '".$cargo."' and estado = '".$estado."'";
$con1 = $objConexion->prepare($sql1);
$con1->execute();
$cantidad = $con1->rowCount();


$pagination->rowCount($cantidad);
$pagination->config(1, 15);
$sql = "SELECT * from postulado WHERE estado = :estado and cargo = :para order by id DESC LIMIT $pagination->start_row, $pagination->max_rows";
$query = $conexion->prepare($sql);
$query->bindParam(':para', $cargo);
$query->bindParam(':estado', $estado);
$query->execute();
$total = $query->rowCount();
$model = array();
while($rows = $query->fetch()){
	$model[] = $rows;
}


if ($_SESSION['rol'] == 'Postulados' || $_SESSION['rol'] == 'Todos') {
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
									Mas
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
									<a onclick="btnExit();" href="../Administrador.php?salir=si" class="text-danger">
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

                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="header">
                                <h3 class="title">Buscar</h3>
                            </div>
                            <div class="content">

                                <form class="" action="buscar.php" method="post">
				                    <div class="input-group mt-1">
				                    	<div class="row">
				                    		<div class="col-6">
				                    			<select name="tipo" class="selectpicker" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
												    <option value="Identificacion">Identificacion</option>
												    <option value="Nombre">Nombre</option>
												    <option value="Apellido">Apellido</option>
												</select>
				                    		</div>
				                    	</div>
				                    </div>
				                    <div class="mt-1">
				                    	<div class="row">
				                    		<div class="col-6">
				                    			<div class="form-group">
												    <input type="text" id="buscar" name="buscar" placeholder="Buscar..." class="form-control" />
												    <button type="submit" class="btn btn-success mt-1"><i class="fa fa-search"></i> Buscar</button>
												</div>
				                    		</div>
				                    	</div>
				                    </div>
				                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
					<?php if ( isset($existe) && $existe == 'no' ) { ?>
						<div class="alert alert-danger">
							El postulado no existe!
						</div>
					<?php } ?>

					<?php if ( isset($del) && $del == 'si' ) { ?>
						<div class="alert alert-success">
							El postulado se ha rechazado
						</div>
					<?php } ?>
				</div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="header">
                                <h3 class="title"><?php echo $echoCargo; ?></h3>


								<?php
					  			if ($_GET['estado'] == 'Postulado' ) { ?>
					  				<?php $echoEstado = 'Postulados' ?>
					  				<a class="btn btn-warning ml-1 mt-1" href="index.php?cargo=<?php echo $_GET['cargo'] ?>&estado=Rechazado"><i class="fa fa-user-times"></i> Rechazados</a>
					  				<a class="btn btn-primary ml-1 mt-1" href="index.php?cargo=<?php echo $_GET['cargo'] ?>&estado=Citado+a+entrevista"><i class="fa fa-calendar-check"></i> Citados a entrevista</a>
					  			<?php }
					  			?>
                                <?php
					  			if ($_GET['estado'] == 'Rechazado' ) { ?>
					  				<?php $echoEstado = 'Rechazados' ?>
					  				<a class="btn btn-success ml-1 mt-1" href="index.php?cargo=<?php echo $_GET['cargo'] ?>&estado=Postulado"><i class="fa fa-user-tie"></i> Postulados</a>
					  				<a class="btn btn-primary ml-1 mt-1" href="index.php?cargo=<?php echo $_GET['cargo'] ?>&estado=Citado+a+entrevista"><i class="fa fa-calendar-check"></i> Citados a entrevista</a>
					  			<?php }
					  			?>
					  			<?php
					  			if ($_GET['estado'] == 'Citado a entrevista' ) { ?>
					  				<?php $echoEstado = 'Citados a entrevista' ?>
					  				<a class="btn btn-success ml-1 mt-1" href="index.php?cargo=<?php echo $_GET['cargo'] ?>&estado=Postulado"><i class="fa fa-user-tie"></i> Postulados</a>
					  				<a class="btn btn-warning ml-1 mt-1" href="index.php?cargo=<?php echo $_GET['cargo'] ?>&estado=Rechazado"><i class="fa fa-user-times"></i> Rechazados</a>
					  			<?php }
					  			?>

                                <hr>
                                <h4 class="title text-center">Lista de <?php echo $echoEstado ?></h4>
                            </div>
                            <div class="content">
                                <div class="table-responsive">
									<table class="table">
									    <thead>
									        <tr>
									            <th>Nombre</th>
									            <th>N° de Documento</th>
									            <th>Email</th>
									            <th>Celular</th>
									            <th class="text-right">Acciones</th>
									        </tr>
									    </thead>
									    <tbody>

									    	<?php
									    		foreach ($model as $row) {
									    			$nombreC = utf8_decode($row['nombres']." ".$row['apellidos']);
									    			$nombreC = strtolower($nombreC);
									    			$stateVisto = $row['visto'];
									    			$nombreC = str_replace('?', '&ntilde;', $nombreC);
									    			if( $stateVisto == 'no'){ ?>
														<tr style="background-color: #b8daff;">
													<?php }else{ ?>
														<tr>
													<?php } ?>
									    			<td><?php echo ucfirst($nombreC); ?></td>
									    			<td><?php echo $row['numero_identificacion']; ?></td>
									    			<td><?php echo $row['email']; ?></td>
									    			<td><?php echo $row['numero_celular']; ?></td>
									    			<!-- <td><?php #echo $row['cargo']; ?></td> -->
									    			<td class="td-actions text-right">
									    				<a href="view.php?id=<?php echo $row['numero_identificacion'] ?>&cargo=<?php echo $_GET['cargo'] ?>&estado=<?php echo $_GET['estado'] ?>" rel="tooltip" title="Ver perfil" class="btn btn-info btn-link btn-sm"><i class="far fa-eye"></i></a>
									    			</td>
									    		</tr>
									    		<?php }
									    	?>
									        
									    </tbody>
									</table>

									<nav aria-label="Page navigation example">
									  	<ul class="pagination pagination-blue">
										  	<?php
											    $pagination->pages("btn1 btn btn-primary ml-2 page-item ");
										  	?>
									  	</ul>
									</nav>
									<!-- <ul class="pagination pagination-blue">
									  	<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
									  	<li class="page-item active"><a class="page-link" href="#">1</a></li>
									  	<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
									</ul> -->
								</div>
                            </div>
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
    	$(document).ready(function(){
    		// demo.initDashboardPageCharts();
        	// demo.initVectorMap();

	       	if("init" in localStorage){
			    
			} else {
			   	$.notify({
            		icon: 'pe-7s-bell',
            		message: "<b>Bienvenido.</b>"

	            },{
	                type: 'success',
	                timer: 4000
	            });
	            localStorage.setItem('init', 'iniciado');
			}

    	});

    	function btnExit(){
    		localStorage.removeItem("init");
    	}
	</script>

</html>
<?php 
}
else{
	header("location:../Administrador.php?x=1");
}
?>