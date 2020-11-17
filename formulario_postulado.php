<?php
require "dashboard/ConexionBaseDatos_PDO.php";
$objConexion=conectaDb();
$sql="select * from tbldepartamento";
$resultado=$objConexion->prepare($sql);
$resultado->execute();
$resultado->fetch();

$resultado2=$objConexion->prepare($sql);
$resultado2->execute();
$resultado2->fetch();

$resultado3=$objConexion->prepare($sql);
$resultado3->execute();
$resultado3->fetch();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Page Title -->
    <title>Cootranshuila</title>

    <!-- ICON -->
    <link rel="icon" type="image/png" href="assets/images/logo-icon.png" />


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="assets/css/simple-line-icons.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="assets/css/set1.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
</head>
<body id="index">

	<!--============================= HEADER =============================-->
    <div class="dark-bg sticky-top">
        <div class="transition">
            <div class="container-fluid is-sticky">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" class="logo img-fluid"></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-menu"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav nav-tabs">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link1 nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Empresa<span class="icon-arrow-down"></span></a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="info.php?empresa=historia">Historia</a>
                                            <a class="dropdown-item" href="info.php?empresa=empresa">Nuestra empresa</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link1 nav-link" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Servicios<span class="icon-arrow-down"></span> </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="https://cootranshuila.teletiquete.com/">Tiquetes online</a>
                                            <a class="dropdown-item" href="info.php?especial">Servicio Especial</a>
                                            <a class="dropdown-item" href="#" id="estacionN">Estacion de servicios</a>
                                            <a class="dropdown-item" href="#" id="encomiendasN">Carga y encomiendas</a>
                                            <a class="dropdown-item" href="info.php?flota">Transporte de pasajeros</a> 
                                        </div>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link1 nav-link" href="index.php#oficinas">Oficinas</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link1 nav-link" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Corporativo<span class="icon-arrow-down"></span></a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="https://silogcootranshuilaerp.sitrans.com.co">Silog Sitrans</a>
                                            <a class="dropdown-item" href="https://accounts.google.com/signin/v2/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ltmpl=default&hd=cootranshuila.com&service=mail&sacu=1&rip=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin">Correo corporativo</a>
                                            <a class="dropdown-item" href="dashboard-design/login.php">Administrador</a>
                                        </div>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link1 nav-link" href="info.php?politica">Politica de datos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link1 nav-link" href="info.php?siplat">Siplat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link1 nav-link" href="index.php#contacto">Contactenos</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <!--//END HEADER -->

    <section class="main-block formulario">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="styled-heading">
                        <h3>Formulario de postulacion</h3>
                    </div>
                </div>
            </div>
			<?php
			if ((isset($_GET['g'])) && ($_GET['g'] == 's')) { ?>
				<div class="alert alert-success text-center">
					Postulacion hecha correctamente.
				</div>
			<?php }
			?>
			<?php
			if ((isset($_GET['g'])) && ($_GET['g'] == 'n')) { ?>
				<div class="alert alert-danger text-center">
					No se ha podido guardar la postulacion.
				</div>
			<?php }
			?>
            <div class="container form-registro">
            	<button type="button" class="btn btn-outline-success ml-3 mt-2" data-toggle="modal" data-target="#miModal">Ver requisitos</button>

            	<button type="button" class="btn btn-outline-info ml-3 mt-2" data-toggle="modal" data-target="#miModal2">Ver estado de postulacion</button>

				<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				  	<div class="modal-dialog modal-lg">
					    <div class="modal-content">
					      	<div class="modal-header">
					        	<h5 class="modal-title">Requisitos</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
					      	</div>
					      	<div class="modal-body">
					        	<div class="form-group row">
								    <label for="verRequisitos" class="col-sm-3 col-form-label">Seleccione el cargo</label>
								    <div class="col-sm-8">
								      <select class="form-control" name="verRequisitos" id="verRequisitos">
								      	<option>Seleccione</option>
								      	<option value="Conductor">Conductor</option>
								      	<option value="auxiliarConductor">Auxiliar de viaje</option>
								      	<option value="Consignatarios">Contratista independiente</option>
								      </select>
								    </div>
							  	</div>
							  	<hr>
							  	<div id="requisitoConductor">
							  		<p>Fotografia fondo azul 3x4.</p>
							  		<p>Fotocopia a blanco y negro de la cedula al 150%.</p>
							  		<p>Antecedentes diciplinarios.</p>
							  		<p>Pasado judicial.</p>
							  		<p>Certificado de estudios en formato PDF.</p>
							  		<p>Dos certificados de experiencia laboral.</p>
							  		<p>Simit.</p>
							  		<p>Fotocopia a color de: Cedula, Licencia de conduccion, Libreta militar y pasado judicial.</p>
							  		<p>Una fotocopia a blanco y negro de certificados de conduccion.</p>
							  		<p>Ultimo paz y salvo (Asociado o empresa donde halla laborado como conductor).</p>
							  		<p>Certificados de afiliacion a EPS y Fondo de pensiones.</p>
							  		<p>Examen de conduccion, realizado por el inspector Perito "prueba de conduccion".</p>
							  		<p>Certificado manejo defensivo.</p>
							  		<p>Concepto jefe rodamiento.</p>
							  		<button type="button" class="ml-1 btn btn-outline-success" data-dismiss="modal" aria-label="Close">
						        		<span aria-hidden="true">Continuar <i class="fa fa-forward"></i></span>
						        	</button>
							  	</div>
							  	<div id="requisitoConsignatario">
							  		<div class="form-group row">
									    <label for="tipoConsignatarioRequisito" class="col-sm-3 col-form-label">Tipo de consignatario</label>
									    <div class="col-sm-8">
									      <select class="form-control" name="tipoConsignatarioRequisito" id="tipoConsignatarioRequisito">
									      	<option>Seleccione</option>
									      	<option value="taquilleros">Consignatarios taquilleros</option>
									      	<option value="satellite">Consignatarios satellite</option>
									      </select>
									    </div>
								  	</div>
								  	<hr>
								  	<div id="requisitoTaquillero">
								  		<p>Pagare si es empleado: Cetificado con ingresos.</p>
								  		<p>Pagare si es Independiente: Certificado de libertad y tradición de bien inmueble.</p>
								  		<button type="button" class="ml-1 btn btn-outline-success" data-dismiss="modal" aria-label="Close">
							        		<span aria-hidden="true">Continuar <i class="fa fa-forward"></i></span>
							        	</button>
								  	</div>
								  	<div id="requisitoSatellite">
								  		<p>Pagare codeudor si es empleado: Cetificado con ingresos.</p>
								  		<p>Pagare codeudor si es Independiente: Certificado de libertad y tradición de bien inmueble.</p>
								  		<p>RUT.</p>
								  		<p>Camara y comercio del establecimiento.</p>
								  		<button type="button" class="ml-1 btn btn-outline-success" data-dismiss="modal" aria-label="Close">
							        		<span aria-hidden="true">Continuar <i class="fa fa-forward"></i></span>
							        	</button>
								  	</div>
							  	</div>
							  	<div id="requisitoAuxiliar">
							  		<p>Fotografia fondo azul 3x4.</p>
							  		<p>Fotocopia a blanco y negro de la cedula al 150%.</p>
							  		<p>Antecedentes diciplinarios.</p>
							  		<p>Pasado judicial.</p>
							  		<p>Certificado de estudios en formato PDF.</p>
							  		<p>Dos certificados de experiencia laboral.</p>
							  		<p>Simit.</p>
							  		<p>Fotocopia a color de: Cedula, Licencia de conduccion, Libreta militar y pasado judicial.</p>
							  		<p>Certificados de afiliacion a EPS y Fondo de pensiones.</p>
							  		<p>Concepto jefe rodamiento.</p>
							  		<div class="row">
								  		<button type="button" class="ml-3 btn btn-outline-success" data-dismiss="modal" aria-label="Close">
							        		<span aria-hidden="true">Continuar <i class="fa fa-forward"></i></span>
							        	</button>
								  	</div>
							  	</div>
					      	</div>
					    </div>
				  	</div>
				</div>

				<div class="modal fade" id="miModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				  	<div class="modal-dialog modal-lg">
					    <div class="modal-content">
					      	<div class="modal-header">
					        	<h5 class="modal-title">Estado de postulacion</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
					      	</div>
					      	<div class="modal-body">
					        	<div class="form-group row">
								    <label for="estadoId" class="col-sm-4 col-form-label">Numero de documento</label>
								    <div class="col-sm-4">
								      <input type="number" name="estadoId" id="estadoId" class="form-control">
								    </div>
								    <button id="btnSerEst" class="btn btn-success">Buscar</button>
							  	</div>
							  	<hr>
							  	<div class="viewEstadoPostulado">
							  		<h6 id="estPos">Se encutra en proceso</h6>
							  	</div>
							  	<div class="viewEstadoEntrevista">
							  		<h5>Citado ha entrevista</h5>
							  		<h6 id="estEnt1">Fecha: Se encutra en proceso</h6>
							  		<h6 id="estEnt2">Hora: Se encutra en proceso</h6>
							  		<h6 id="estEnt3">Lugar: Se encutra en proceso</h6>
							  		<h6 id="estEnt4">Observaciones: Se encutra en proceso</h6>
							  		<a class="btn btn-outline-primary" href="PAGAREDEUDOR.docx" download="PAGAREDEUDOR">Pagare deudor</a> Debe de presertar el documento autenticado.
							  	</div>
					      	</div>
					    </div>
				  	</div>
				</div>
				<br>
				<br>
				<br>
            	<div class="steps">
            		<div class="step ml-1 mt-1 step-select" id="step_1">
            			1
            		</div>
            		<div class="step ml-1 mt-1" id="step_2">
            			2
            		</div>
            		<div class="step ml-1 mt-1" id="step_3">
            			3
            		</div>
            		<div class="step ml-1 mt-1" id="step_4">
            			4
            		</div>
            	</div>
                <div class="row padre">
                    <form novalidate name="postulado_paso1" class="hjo col-8" id="postulado_paso1" action="" method="post" enctype="multipart/form-data">
                		<div id="paso1">
                			<h5>Informacion personal</h5>
                			<div class="linea"></div>
	                    	<div class="row mt-3">
	                    		<span class="form-text text-muted">Los campos que tiene "*" son obligatorios.</span>
	                    		<div class="col-lg-9 col-md-10 col-sm-11 col-12">
			                    	<div class="form-group row">
									    <label for="direccion" class="col-sm-5 col-form-label">Cargo<span class="aster">*</span></label>
									    <div class="col-sm-7">
									    	<select class="form-control inputs" name="cargo" id="cargo">
									    		<option>Seleccione</option>
									    		<option value="Conductor">Conductor</option>
									    		<option value="auxiliarConductor">Auxiliar de viaje</option>
									    		<option value="Consignatarios">Contratista independiente</option>
									    	</select>
									    	<span style="color:red !important; display: none;" id="spanCar" class="hide aster form-text text-muted">Seleccione un cargo.</span>
									    </div>
									</div>
								</div>
	                    		<di class="col-lg-9 col-md-10 col-sm-11 col-12">
			                    	<div class="form-group row">
									    <label for="nombres" class="col-sm-5 col-12 col-form-label">Nombres<span class="aster">*</span></label>
									    <div class="col-sm-7 col-12">
									      	<input required type="text" class="form-control inputs" id="nombres" placeholder="Nombres" name="nombres">
									      	<span style="color:red !important; display: none;" id="spanNombre" class="hide aster form-text text-muted">Debe de tener minimo 3 caracteres.</span>
									    </div>
									</div>
								</di>
								<div class="col-lg-9 col-md-10 col-sm-11 col-12">
			                    	<div class="form-group row">
									    <label for="apellidos" class="col-sm-5 col-form-label">Apellidos<span class="aster">*</span></label>
									    <div class="col-sm-7">
									      	<input required type="text" class="form-control inputs" id="apellidos" placeholder="Apellidos" name="apellidos">
									      	<span style="color:red !important; display: none;" id="spanApellido" class="hide aster form-text text-muted">Debe de tener minimo 3 caracteres.</span>
									    </div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-9 col-md-10 col-sm-11 col-12">
			                    	<div class="form-group row">
									    <label for="tipo_identificacion" class="col-sm-5 col-form-label">Tipo de identificacion<span class="aster">*</span></label>
									    <div class="col-sm-7">
									    	<select required class="form-control inputs" id="tipo_identificacion" name="tipo_identificacion">
									    		<option>Seleccione</option>
									    		<option value="Cedula de ciudadania">Cedula de ciudadania</option>
									    		<option value="Tarjeta de identidad">Tarjeta de identidad</option>
									    		<option value="Cedula de extranjeria">Cedula de extranjeria</option>
									    		<option value="Pasaporte">Pasaporte</option>
									    	</select>
									    	<span style="color:red !important; display: none;" id="spanTipoIde" class="hide aster form-text text-muted">Seleccione un tipo de documento de identificacion.</span>
									    </div>
									</div>
								</div>
								<div class="col-lg-9 col-md-10 col-sm-11 col-12">
			                    	<div class="form-group row">
									    <label for="numero_identifiacacion" class="col-sm-5 col-form-label">Numero de identificacion<span class="aster">*</span></label>
									    <div class="col-sm-7">
									      	<input required type="number" class="form-control inputs" id="numero_identifiacacion" name="numero_identifiacacion" placeholder="123456789">
									      	<span style="color:red !important; display: none;" id="spanIde" class="hide aster form-text text-muted">Debe de tener minimo 7 caracteres y solo numeros.</span>
									    </div>
									</div>
								</div>
								<div class="col-lg-9 col-md-10 col-sm-11 col-12">
			                    	<div class="form-group row">
									    <label for="email" class="col-sm-5 col-form-label">Correo electronico<span class="aster">*</span></label>
									    <div class="col-sm-7">
									      	<input required type="email" class="form-control inputs" id="email" placeholder="ejemplo@ejemplo.com" name="email">
									      	<span style="color:red !important; display: none;" id="spanEmail1" class="hide aster form-text text-muted">El email es necesario.</span>
									      	<span style="color:red !important; display: none;" id="spanEmail2" class="hide aster form-text text-muted">Debe de ser un email valido.</span>
									    </div>
									</div>
								</div>
							</div>
							<div class="row">
	                    		<div class="col-lg-9 col-md-10 col-sm-11 col-12">
			                    	<div class="form-group row">
									    <label for="nacimiento" class="col-sm-5 col-form-label">Fecha de nacimiento<span class="aster">*</span></label>
									    <div class="col-sm-7">
									    	<input required placeholder="01/01/2001" type="text" class="date form-control inputs" name="nacimiento" id="nacimiento">
									    	<span style="color:red !important; display: none;" id="spanfecha1" class="hide aster form-text text-muted">La fecha de nacimiento es necesaria.</span>
									    	<span style="color:red !important; display: none;" id="spanfecha2" class="hide aster form-text text-muted">El año es erroneo.</span>
									    </div>
									</div>
								</div>
								<div class="col-lg-9 col-md-10 col-sm-11 col-12">
			                    	<div class="form-group row">
									    <label for="genero" class="col-sm-5 col-form-label">Genero<span class="aster">*</span></label>
									    <div class="col-sm-7">
									      	<select required class="form-control inputs" name="genero" id="genero">
									      		<option>Genero</option>
									      		<option value="Masculino">Masculino</option>
									      		<option value="Femenino">Femenino</option>
									      	</select>
									      	<span style="color:red !important; display: none;" id="spanGen" class="hide aster form-text text-muted">Debe de seleccionar un genero.</span>
									    </div>
									</div>
								</div>
								<div class="col-lg-9 col-md-10 col-sm-11 col-12">
			                    	<div class="form-group row">
									    <label for="estado_civil" class="col-sm-5 col-form-label">Estado civil<span class="aster">*</span></label>
									    <div class="col-sm-7">
									      	<select required class="form-control inputs" name="estado_civil" id="estado_civil">
									      		<option>Estado civil</option>
									      		<option value="Soltero(a)">Soltero(a)</option>
									      		<option value="Casado(a)">Casado(a)</option>
									      		<option value="separado(a)">separado(a)</option>
									      		<option value="Viudo(a)">Viudo(a)</option>
									      	</select>
									      	<span style="color:red !important; display: none;" id="spanEst" class="hide aster form-text text-muted">Debe de seleccionar un estado civil.</span>
									    </div>
									</div>
								</div>
							</div>
							<div class="row">
	                    		<div class="col-lg-9 col-md-10 col-sm-11 col-12">
			                    	<div class="form-group row">
									    <label for="celular" class="col-sm-5 col-form-label">Numero de celular<span class="aster">*</span></label>
									    <div class="col-sm-7">
									    	<input required type="number" placeholder="celular" class="form-control inputs" name="celular" id="celular">
									    	<span style="color:red !important; display: none;" id="spanCel" class="hide aster form-text text-muted">Debe de ser un numero valido de 10 digitos y solo numeros.</span>
									    </div>
									</div>
								</div>
								<span class="form-text text-muted">Informacion de residencia</span>
								<div class="col-lg-9 col-md-10 col-sm-11 col-12">
			                    	<div class="form-group row">
									    <label for="departamento" class="col-sm-5 col-form-label">Departamento<span class="aster">*</span></label>
									    <div class="col-sm-7">
									      	<select required class="form-control inputs" name="departamento" id="departamento">
									      		<option>Departamento</option>
									      		<?php
									      			if ($resultado->rowCount()>0) {
									      				foreach ($resultado as $dep1) { ?>
									      					<option value="<?php echo $dep1['idDep'] ?>"><?php echo $dep1['nomDep'] ?></option>
									      				<?php }
									      			}
									      		?>
									      	</select>
									      	<span style="color:red !important; display: none;" id="spanDep" class="hide aster form-text text-muted">Debe de seleccionar un departamento.</span>
									    </div>
									</div>
								</div>
								<div class="col-lg-9 col-md-10 col-sm-11 col-12">
			                    	<div class="form-group row">
									    <label for="ciudad" class="col-sm-5 col-form-label">Ciudad<span class="aster">*</span></label>
									    <div class="col-sm-7">
									      	<select required class="form-control inputs" name="ciudad" id="ciudad">
									      		<option>Ciudad</option>
									      	</select>
									      	<span style="color:red !important; display: none;" id="spanCiu" class="hide aster form-text text-muted">Debe de seleccionar una ciudad.</span>
									    </div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-9 col-md-10 col-sm-11 col-12">
			                    	<div class="form-group row">
									    <label for="direccion" class="col-sm-5 col-form-label">Direccion<span class="aster">*</span></label>
									    <div class="col-sm-7">
									    	<input required placeholder="direccion" type="text" class="form-control inputs" name="direccion" id="direccion">
									    	<span style="color:red !important; display: none;" id="spanDir" class="hide aster form-text text-muted">La direccion es necesaria.</span>
									    </div>
									</div>
								</div>
								<div class="col-lg-9 col-md-10 col-sm-11 col-12">
			                    	<div class="form-group row">
									    <label for="fotoPostulado" class="col-sm-5 col-form-label">Foto<span class="aster">*</span></label>
									    <div class="col-sm-7">
									    	<input required type="file" class="form-control inputs" name="fotoPostulado" id="fotoPostulado" size="1000">
									    	<span style="color:red !important; display: none;" id="spanFot1" class="hide aster form-text text-muted">La foto es necesaria.</span>
									    	<span style="color:red !important; display: none;" id="spanFot2" class="hide aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
									    	<span style="color:red !important; display: none;" id="spanFot3" class="hide aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
									    </div>
									</div>
								</div>
							</div>
							<button type="button" id="next1" class="btn1 btn btn-success btn-next">Siguiente <span class="ti-angle-double-right"></span></button>
						</div>
						<div id="paso2">
							<h5>Formacion academica</h5>
                			<div class="linea"></div>
	                    	<div class="row mt-3">
	                    		<span class="form-text text-muted">Los campos que tiene "*" son obligatorios.</span>
	                    		<div class="col-lg-12 col-md-12 col-sm-12 col-12">
	                    			<hr>
	                    			<h6 class="font-weight-light">Educacion basica y media</h6>
	                    			<p>Seleccione el ultimo grado aprobado( los grados de 1o. a 6o. de bachillerato equivalen a los grados 6o. a 11o. de educacion basica secundaria y media).</p>
	                    			<div class="row">
									    <table class="table table-bordered">
										  	<thead>
										    	<tr>
										      		<th class="text-center" colspan="3" scope="col">Educacion basica</th>
										    	</tr>
										  	</thead>
										  	<tbody>
										    	<tr>
										      		<th class="text-center" scope="row">Primaria</th>
										      		<th class="text-center" scope="row">Secundaria</th>
										      		<th class="text-center" scope="row">Media</th>
										    	</tr>
										    	<tr>
										      		<td>
										      			<input value="" type="hidden" name="educacion" checked class="radioEdu">
												  		<input value="1o" class="invalid2 radioEdu" type="radio" id="1o" name="educacion">
												  		<label for="1o">1o.</label>&nbsp;|&nbsp; 

												  		<input value="2o" class="invalid2 radioEdu" type="radio" id="2o" name="educacion">
												  		<label for="2o">2o.</label>&nbsp;|&nbsp;

												  		<input value="3o" class="invalid2 radioEdu" type="radio" id="3o" name="educacion">
												  		<label for="3o">3o.</label>&nbsp;|&nbsp;

												  		<input value="4o" class="invalid2 radioEdu" type="radio" id="4o" name="educacion">
												  		<label for="4o">4o.</label>&nbsp;|&nbsp;

												  		<input value="5o" class="invalid2 radioEdu" type="radio" id="5o" name="educacion">
												  		<label for="5o">5o.</label>
										      		</td>
										      		<td>
										      			<input value="6o" class="invalid2 radioEdu" type="radio" id="6o" name="educacion">
												  		<label for="6o">6o.</label>&nbsp;|&nbsp; 

												  		<input value="7o" class="invalid2 radioEdu" type="radio" id="7o" name="educacion">
												  		<label for="7o">7o.</label>&nbsp;|&nbsp;

												  		<input value="8o" class="invalid2 radioEdu" type="radio" id="8o" name="educacion">
												  		<label for="8o">8o.</label>&nbsp;|&nbsp;

												  		<input value="9o" class="invalid2 radioEdu" type="radio" id="9o" name="educacion">
												  		<label for="9o">9o.</label>
										      		</td>
										      		<td>
										      	  		<input value="10" class="invalid2 radioEdu" type="radio" id="10" name="educacion">
												  		<label for="10">10</label>&nbsp;|&nbsp;

												  		<input value="11" class="invalid2 radioEdu" type="radio" id="11" name="educacion">
												  		<label for="11">11</label>
										      		</td>
										    	</tr>
										  	</tbody>
										</table>
										<span style="color:red !important; display: none;" id="spanRad" class="hideEdu aster form-text text-muted">Seleccione una opcion.</span>
									</div>
			                    	<div class="form-group row">
									    <label for="titulo" class="col-sm-4 col-12 col-form-label">Titulo obtenido<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input required type="text" class="invalid2 form-control" id="titulo" placeholder="Titulo" name="titulo">
									      	<span style="color:red !important; display: none;" id="spanTit" class="hideEdu aster form-text text-muted">Debe de tener minimo 3 caracteres.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="fechaTit" class="col-sm-4 col-12 col-form-label">Fecha<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input type="text" placeholder="01/01/1999" class="date invalid2 form-control" id="fechaTit" name="fechaTit">
									      	<span style="color:red !important; display: none;" id="spanFechaTit" class="hideEdu aster form-text text-muted">La fecha es necesaria.</span>
									      	<span style="color:red !important; display: none;" id="spanFechaTit2" class="hideEdu aster form-text text-muted">El año es incorrecto.</span>
									    </div>
									</div>
									<hr>
									<h6 class="font-weight-light">Educacion superior (pregrado y postgrado)</h6>
	                    			<p>Diligencie este punto en estricto orden cronológico, en modalidad académica escriba: <strong>TC</strong>(TÉCNICA), <strong>TL</strong>(TECNOLÓGICA), <strong>TE</strong>(TECNOLÓGICA ESPECIALIZADA), <strong>UN</strong>(UNIVERSITARIA), <strong>ES</strong>(ESPECIALIZACIÓN), <strong>MG</strong>(MAESTRÍA O MAGISTER), <strong>DOC</strong>(DOCTORADO O PHD).</p>
	                    			<div class="form-group row">
									    <label for="modalidadEdu" class="col-sm-4 col-12 col-form-label">Modalidad académica<span class="aster">*</span></label>
									    <div class="col-sm-3 col-12">
									    	<select class="invalid2 form-control" id="modalidadEdu" name="modalidadEdu">
									    		<option value="">Seleccione</option>
									    		<option value="TC">TC</option>
									    		<option value="TL">TL</option>
									    		<option value="TE">TE</option>
									    		<option value="UN">UN</option>
									    		<option value="ES">ES</option>
									    		<option value="MG">MG</option>
									    		<option value="DOC">DOC</option>
									    	</select>
									      	<span style="color:red !important; display: none;" id="spanMod" class="hideEdu aster form-text text-muted">La modalidad es necesaria.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="semestresEdu" class="col-sm-4 col-12 col-form-label">No. semestres aprobados<span class="aster">*</span></label>
									    <div class="col-sm-3 col-12">
									    	<input type="number" class="invalid2 form-control" name="semestresEdu" id="semestresEdu">
									      	<span style="color:red !important; display: none;" id="spanSem1" class="hideEdu aster form-text text-muted">El numero de semestres es necesario.</span>
									      	<span style="color:red !important; display: none;" id="spanSem2" class="hideEdu aster form-text text-muted">No debe de ser superior a 12.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="graduadoEdu" class="col-sm-4 col-12 col-form-label">Graduado<span class="aster">*</span></label>
									    <div class="col-sm-3 col-12">
									    	<select class="invalid2 form-control" name="graduadoEdu" id="graduadoEdu">
									    		<option value="">Seleccione</option>
									    		<option value="Si">Si</option>
									    		<option value="No">No</option>
									    	</select>
									      	<span style="color:red !important; display: none;" id="spanGra" class="hideEdu aster form-text text-muted">Seleccione una opcion.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="nombreTit" class="col-sm-4 col-12 col-form-label">Nombre de los estudios o titulo obtenido<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									    	<input type="text" name="nombreTit" id="nombreTit" class="invalid2 form-control">
									      	<span style="color:red !important; display: none;" id="spanNomTit" class="hideEdu aster form-text text-muted">El minimo de caracteres es de 3.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="FechaTerEdu" class="col-sm-4 col-12 col-form-label">Fecha de terminacion<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									    	<input type="text" placeholder="01/01/1999" name="FechaTerEdu" id="FechaTerEdu" class="date invalid2 form-control">
									      	<span style="color:red !important; display: none;" id="spanFechTer" class="hideEdu aster form-text text-muted">La fecha es necesaria.</span>
									      	<span style="color:red !important; display: none;" id="spanFechTer2" class="hideEdu aster form-text text-muted">El año es incorrecto.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="numeroTar" class="col-sm-4 col-12 col-form-label">Numero de tarjeta profesional</label>
									    <div class="col-sm-8 col-12">
									    	<input type="number" name="numeroTar" id="numeroTar" class="invalid2 form-control">
									    </div>
									</div>
									<hr>
									<div>
										<h6>Otro Titulo(opcional)</h6>
										<span class="form-text text-muted" style="text-align: right;">Si va a completar esta informacion, por favor llene todos los campos.</span>
										<div class="form-group row">
										    <label for="modalidadEdu2" class="col-sm-4 col-12 col-form-label">Modalidad académica</label>
										    <div class="col-sm-3 col-12">
										    	<select class="form-control" id="modalidadEdu2" name="modalidadEdu2">
										    		<option value="">Seleccione</option>
										    		<option value="TC">TC</option>
										    		<option value="TL">TL</option>
										    		<option value="TE">TE</option>
										    		<option value="UN">UN</option>
										    		<option value="ES">ES</option>
										    		<option value="MG">MG</option>
										    		<option value="DOC">DOC</option>
										    	</select>
										    </div>
										</div>
										<div class="form-group row">
										    <label for="semestresEdu2" class="col-sm-4 col-12 col-form-label">No. semestres aprobados</label>
										    <div class="col-sm-3 col-12">
										    	<input type="number" class="form-control" name="semestresEdu2" id="semestresEdu2">
										    </div>
										</div>
										<div class="form-group row">
										    <label for="graduadoEdu2" class="col-sm-4 col-12 col-form-label">Graduado</label>
										    <div class="col-sm-3 col-12">
										    	<select class="form-control" name="graduadoEdu2" id="graduadoEdu2">
										    		<option value="">Seleccione</option>
										    		<option value="Si">Si</option>
										    		<option value="No">No</option>
										    	</select>
										    </div>
										</div>
										<div class="form-group row">
										    <label for="nombreTit2" class="col-sm-4 col-12 col-form-label">Nombre de los estudios o titulo obtenido</label>
										    <div class="col-sm-8 col-12">
										    	<input type="text" name="nombreTit2" id="nombreTit2" class="form-control">
										    </div>
										</div>
										<div class="form-group row">
										    <label for="FechaTerEdu2" class="col-sm-4 col-12 col-form-label">Fecha de terminacion</label>
										    <div class="col-sm-8 col-12">
										    	<input type="text" placeholder="01/01/1999" name="FechaTerEdu2" id="FechaTerEdu2" class="date form-control">
										    </div>
										</div>
										<div class="form-group row">
										    <label for="numeroTar2" class="col-sm-4 col-12 col-form-label">Numero de tarjeta profesional</label>
										    <div class="col-sm-8 col-12">
										    	<input type="number" name="numeroTar2" id="numeroTar2" class="form-control">
										    </div>
										</div>
									</div>
								</div>
							</div>
							<button type="button" id="next2" class="mt-1 btn1 ml-1 btn btn-success btn-next">Siguiente <span class="ti-angle-double-right"></span></button>
							<button type="button" id="back1" class="mt-1 btn1 ml-1 btn btn-secondary btn-back"><span class="ti-angle-double-left"></span> Anterior</button>
						</div>
						<div id="paso3">
							<h5>Experiencia laboral</h5>
                			<div class="linea"></div>
	                    	<div class="row mt-3">
	                    		<span class="form-text text-muted">Los campos que tiene "*" son obligatorios.</span>
	                    		<div class="col-lg-12 col-md-12 col-sm-12 col-12">
	                    			<hr>
	                    			<p>Relacione su experiencia laboral o de prestacíon de servicios en estricto orden cronológico comenzando por el actual.</p>
	                    			<br>
	                    			<h6 class="font-weight-light">Empleo actual o ultimo empleo</h6>
			                    	<div class="form-group row">
									    <label for="empresa" class="col-sm-4 col-12 col-form-label">Empresa o entidad<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input required type="text" class="invalid3 form-control" id="empresa" placeholder="Nombre" name="empresa">
									      	<span style="color:red !important; display: none;" id="spanEmpre" class="hideExp aster form-text text-muted">Debe de tener minimo 3 caracteres.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="tipoEmpresa" class="col-sm-4 col-12 col-form-label">Empresa publica o privada<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									    	<select class="invalid3 form-control" id="tipoEmpresa" name="tipoEmpresa">
									    		<option value="">Seleccione</option>
									    		<option value="Publica">Publica</option>
									    		<option value="Privada">Privada</option>
									    	</select>
									      	<span style="color:red !important; display: none;" id="spanTipoEmp" class="hideExp aster form-text text-muted">Seleccione una opcion.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="paisEmpre" class="col-sm-4 col-12 col-form-label">Pais<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input required type="text" class="invalid3 form-control" id="paisEmpre" placeholder="Pais de la empresa" name="paisEmpre">
									      	<span style="color:red !important; display: none;" id="spanPaisEmpre" class="hideExp aster form-text text-muted">Debe de tener minimo 3 caracteres.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="depEmpre" class="col-sm-4 col-12 col-form-label">Departamento<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input required type="text" class="invalid3 form-control" id="depEmpre" placeholder="Departamento de la empresa" name="depEmpre">
									      	<span style="color:red !important; display: none;" id="spanDepEmpre" class="hideExp aster form-text text-muted">Debe de tener minimo 3 caracteres.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="munEmpre" class="col-sm-4 col-12 col-form-label">Municipio<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input required type="text" class="invalid3 form-control" id="munEmpre" placeholder="Municipio de la empresa" name="munEmpre">
									      	<span style="color:red !important; display: none;" id="spanMunEmpre" class="hideExp aster form-text text-muted">Debe de tener minimo 3 caracteres.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="correoEmpre" class="col-sm-4 col-12 col-form-label">Correo electronico de la entidad<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input type="email" class="invalid3 form-control" id="correoEmpre" placeholder="Email de la empresa" name="correoEmpre">
									      	<span style="color:red !important; display: none;" id="spanCorEmpre1" class="hideExp aster form-text text-muted">Debe de tener minimo 8 caracteres.</span>
									      	<span style="color:red !important; display: none;" id="spanCorEmpre2" class="hideExp aster form-text text-muted">Debe de ser un email valido.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="telEmpre" class="col-sm-4 col-12 col-form-label">Telefono<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input type="number" class="invalid3 form-control" id="telEmpre" placeholder="Telefono de la empresa" name="telEmpre">
									      	<span style="color:red !important; display: none;" id="spanTelEmpre" class="hideExp aster form-text text-muted">Debe de tener minimo 5 caracteres.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="fechaIngEmpre" class="col-sm-4 col-12 col-form-label">Fecha de ingreso<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input type="text" placeholder="01/01/1999" class="date invalid3 form-control" id="fechaIngEmpre" name="fechaIngEmpre">
									      	<span style="color:red !important; display: none;" id="spanFechaIngEmpre1" class="hideExp aster form-text text-muted">La fecha de ingreso es necesaria.</span>
									      	<span style="color:red !important; display: none;" id="spanFechaIngEmpre2" class="hideExp aster form-text text-muted">El año es incorrecto.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="fechaRetEmpre" class="col-sm-4 col-12 col-form-label">Fecha de retiro<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input type="text" placeholder="01/01/1999" class="date invalid3 form-control" id="fechaRetEmpre" name="fechaRetEmpre">
									      	<span style="color:red !important; display: none;" id="spanFechaRetEmpre1" class="hideExp aster form-text text-muted">La fecha de retiro es necesaria.</span>
									      	<span style="color:red !important; display: none;" id="spanFechaRetEmpre2" class="hideExp aster form-text text-muted">El año es incorrecto.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="carEmpre" class="col-sm-4 col-12 col-form-label">Cargo o contrato actual<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input type="text" placeholder="Cargo" class="invalid3 form-control" id="carEmpre" placeholder="Telefono de la empresa" name="carEmpre">
									      	<span style="color:red !important; display: none;" id="spanCarEmpre" class="hideExp aster form-text text-muted">Debe de tener minimo 3 caracteres.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="dirEmpre" class="col-sm-4 col-12 col-form-label">Direccion<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input type="text" placeholder="Direccion" class="invalid3 form-control" id="dirEmpre" placeholder="Telefono de la empresa" name="dirEmpre">
									      	<span style="color:red !important; display: none;" id="spanDirEmpre" class="hideExp aster form-text text-muted">Debe de tener minimo 3 caracteres.</span>
									    </div>
									</div>
									<hr>
									<div>
										<h6 class="font-weight-light">Empleo o contrato anterior(opcional)</h6>
										<span class="form-text text-muted" style="text-align: right;">Si va a completar esta informacion, por favor llene todos los campos.</span>
				                    	<div class="form-group row">
										    <label for="empresa2" class="col-sm-4 col-12 col-form-label">Empresa o entidad</label>
										    <div class="col-sm-8 col-12">
										      	<input type="text" class="invalid3 form-control" id="empresa2" placeholder="Nombre" name="empresa2">
										    </div>
										</div>
										<div class="form-group row">
										    <label for="tipoEmpresa2" class="col-sm-4 col-12 col-form-label">Empresa publica o privada</label>
										    <div class="col-sm-8 col-12">
										    	<select class="invalid3 form-control" id="tipoEmpresa2" name="tipoEmpresa2">
										    		<option value="">Seleccione</option>
										    		<option value="Publica">Publica</option>
										    		<option value="Privada">Privada</option>
										    	</select>
										    </div>
										</div>
										<div class="form-group row">
										    <label for="paisEmpre2" class="col-sm-4 col-12 col-form-label">Pais</label>
										    <div class="col-sm-8 col-12">
										      	<input type="text" class="invalid3 form-control" id="paisEmpre2" placeholder="Pais de la empresa" name="paisEmpre2">
										    </div>
										</div>
										<div class="form-group row">
										    <label for="depEmpre2" class="col-sm-4 col-12 col-form-label">Departamento</label>
										    <div class="col-sm-8 col-12">
										      	<input required type="text" class="invalid3 form-control" id="depEmpre2" placeholder="Departamento de la empresa" name="depEmpre2">
										    </div>
										</div>
										<div class="form-group row">
										    <label for="munEmpre2" class="col-sm-4 col-12 col-form-label">Municipio</label>
										    <div class="col-sm-8 col-12">
										      	<input required type="text" class="invalid3 form-control" id="munEmpre2" placeholder="Municipio de la empresa" name="munEmpre2">
										    </div>
										</div>
										<div class="form-group row">
										    <label for="correoEmpre2" class="col-sm-4 col-12 col-form-label">Correo electronico de la entidad</label>
										    <div class="col-sm-8 col-12">
										      	<input type="email" class="invalid3 form-control" id="correoEmpre2" placeholder="Email de la empresa" name="correoEmpre2">
										    </div>
										</div>
										<div class="form-group row">
										    <label for="telEmpre2" class="col-sm-4 col-12 col-form-label">Telefono</label>
										    <div class="col-sm-8 col-12">
										      	<input type="number" class="invalid3 form-control" id="telEmpre2" placeholder="Telefono de la empresa" name="telEmpre2">
										    </div>
										</div>
										<div class="form-group row">
										    <label for="fechaIngEmpre2" class="col-sm-4 col-12 col-form-label">Fecha de ingreso</label>
										    <div class="col-sm-8 col-12">
										      	<input type="text" placeholder="01/01/1999" class="date invalid3 form-control" id="fechaIngEmpre2" name="fechaIngEmpre2">
										    </div>
										</div>
										<div class="form-group row">
										    <label for="fechaRetEmpre2" class="col-sm-4 col-12 col-form-label">Fecha de retiro</label>
										    <div class="col-sm-8 col-12">
										      	<input type="text" placeholder="01/01/1999" class="date invalid3 form-control" id="fechaRetEmpre2" name="fechaRetEmpre2">
										    </div>
										</div>
										<div class="form-group row">
										    <label for="carEmpre2" class="col-sm-4 col-12 col-form-label">Cargo o contrato actual</label>
										    <div class="col-sm-8 col-12">
										      	<input type="text" placeholder="Cargo" class="invalid3 form-control" id="carEmpre2" placeholder="Telefono de la empresa" name="carEmpre2">
										    </div>
										</div>
										<div class="form-group row">
										    <label for="dirEmpre2" class="col-sm-4 col-12 col-form-label">Direccion</label>
										    <div class="col-sm-8 col-12">
										      	<input type="text" placeholder="Direccion" class="invalid3 form-control" id="dirEmpre2" placeholder="Telefono de la empresa" name="dirEmpre2">
										    </div>
										</div>
									</div>
								</div>
							</div>
							<h5>Referencias</h5>
                			<div class="linea"></div>
	                    	<div class="row mt-3">
								<span class="form-text text-muted">Los campos que tiene "*" son obligatorios.</span>
	                    		<div class="col-lg-12 col-md-12 col-sm-12 col-12">
	                    			<hr>
	                    			<h6 class="font-weight-light">Referencia familiar N° 1</h6>
			                    	<div class="form-group row">
									    <label for="refFam1" class="col-sm-4 col-12 col-form-label">Nombre completo<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input required type="text" class="invalid3 form-control" id="refFam1" placeholder="Nombre completo" name="refFam1">
									      	<span style="color:red !important; display: none;" id="spanRefFam1" class="hideExp aster form-text text-muted">Debe de tener minimo 3 caracteres.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="refFam2" class="col-sm-4 col-12 col-form-label">Numero de documento<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input required type="number" class="invalid3 form-control" id="refFam2" placeholder="Numero de documento" name="refFam2">
									      	<span style="color:red !important; display: none;" id="spanRefFam2" class="hideExp aster form-text text-muted">Debe de tener minimo 7 caracteres.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="refFam3" class="col-sm-4 col-12 col-form-label">Numero de celular<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input required type="number" class="invalid3 form-control" id="refFam3" placeholder="Numero de celular" name="refFam3">
									      	<span style="color:red !important; display: none;" id="spanRefFam3" class="hideExp aster form-text text-muted">Debe de tener 10 caracteres.</span>
									    </div>
									</div>
									<h6 class="font-weight-light">Referencia familiar N° 2</h6>
			                    	<div class="form-group row">
									    <label for="refFam4" class="col-sm-4 col-12 col-form-label">Nombre completo<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input required type="text" class="invalid3 form-control" id="refFam4" placeholder="Nombre completo" name="refFam4">
									      	<span style="color:red !important; display: none;" id="spanRefFam4" class="hideExp aster form-text text-muted">Debe de tener minimo 3 caracteres.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="refFam5" class="col-sm-4 col-12 col-form-label">Numero de documento<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input required type="number" class="invalid3 form-control" id="refFam5" placeholder="Numero de documento" name="refFam5">
									      	<span style="color:red !important; display: none;" id="spanRefFam5" class="hideExp aster form-text text-muted">Debe de tener minimo 7 caracteres.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="refFam6" class="col-sm-4 col-12 col-form-label">Numero de celular<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input required type="number" class="invalid3 form-control" id="refFam6" placeholder="Numero de celular" name="refFam6">
									      	<span style="color:red !important; display: none;" id="spanRefFam6" class="hideExp aster form-text text-muted">Debe de tener 10 caracteres.</span>
									    </div>
									</div>
									<hr>
									<h6 class="font-weight-light">Referencia laboral N° 1</h6>
			                    	<div class="form-group row">
									    <label for="refLab1" class="col-sm-4 col-12 col-form-label">Nombre completo<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input required type="text" class="invalid3 form-control" id="refLab1" placeholder="Nombre completo" name="refLab1">
									      	<span style="color:red !important; display: none;" id="spanRefLab1" class="hideExp aster form-text text-muted">Debe de tener minimo 3 caracteres.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="refLab2" class="col-sm-4 col-12 col-form-label">Numero de documento<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input required type="number" class="invalid3 form-control" id="refLab2" placeholder="Numero de documento" name="refLab2">
									      	<span style="color:red !important; display: none;" id="spanRefLab2" class="hideExp aster form-text text-muted">Debe de tener minimo 7 caracteres.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="refLab3" class="col-sm-4 col-12 col-form-label">Numero de celular<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input required type="number" class="invalid3 form-control" id="refLab3" placeholder="Numero de celular" name="refLab3">
									      	<span style="color:red !important; display: none;" id="spanRefLab3" class="hideExp aster form-text text-muted">Debe de tener 10 caracteres.</span>
									    </div>
									</div>
									<h6 class="font-weight-light">Referencia laboral N° 2</h6>
			                    	<div class="form-group row">
									    <label for="refLab4" class="col-sm-4 col-12 col-form-label">Nombre completo<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input required type="text" class="invalid3 form-control" id="refLab4" placeholder="Nombre completo" name="refLab4">
									      	<span style="color:red !important; display: none;" id="spanRefLab4" class="hideExp aster form-text text-muted">Debe de tener minimo 3 caracteres.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="refLab5" class="col-sm-4 col-12 col-form-label">Numero de documento<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input required type="number" class="invalid3 form-control" id="refLab5" placeholder="Numero de documento" name="refLab5">
									      	<span style="color:red !important; display: none;" id="spanRefLab5" class="hideExp aster form-text text-muted">Debe de tener minimo 7 caracteres.</span>
									    </div>
									</div>
									<div class="form-group row">
									    <label for="refLab6" class="col-sm-4 col-12 col-form-label">Numero de celular<span class="aster">*</span></label>
									    <div class="col-sm-8 col-12">
									      	<input required type="number" class="invalid3 form-control" id="refLab6" placeholder="Numero de celular" name="refLab6">
									      	<span style="color:red !important; display: none;" id="spanRefLab6" class="hideExp aster form-text text-muted">Debe de tener 10 caracteres.</span>
									    </div>
									</div>
								</div>
	                    	</div>
							<button type="button" id="next3" class="mt-1 btn1 ml-1 btn btn-success btn-next">Siguiente <span class="ti-angle-double-right"></span></button>
							<button type="button" id="back2" class="mt-1 btn1 ml-1 btn btn-secondary btn-back"><span class="ti-angle-double-left"></span> Anterior</button>
						</div>
	                	<div id="paso4">
							<div id="datosConductor">
								<h5>Anexos</h5>
	            				<div class="linea"></div>
	            				<div class="row mt-3">
	            					<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto1Conductor" class="col-sm-5 col-form-label">Fotografia(fondo azul 3x4)<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto1Conductor" id="foto1Conductor" class="form-control inputs2" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
											    <span style="color:red !important; display: none;"class="hideCon text-right foto1Conductor1 aster form-text text-muted">La fotografia es necesaria.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto1Conductor2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto1Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<!-- <div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto2Conductor" class="col-sm-5 col-form-label">Fotocopia a blanco y negro de la cedula al 150%<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto2Conductor" id="foto2Conductor" class="form-control inputs2" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideCon text-right foto2Conductor1 aster form-text text-muted">La fotocopia a blanco y negro de la cedula es necesaria.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto2Conductor2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto2Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div> -->
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto3Conductor" class="col-sm-5 col-form-label">Antecedentes diciplinarios<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto3Conductor" id="foto3Conductor" class="form-control inputs2" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideCon text-right foto3Conductor1 aster form-text text-muted">Los antecedentes diciplinarios son necesarios.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto3Conductor2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto3Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto4Conductor" class="col-sm-5 col-form-label">Pasado judicial<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto4Conductor" id="foto4Conductor" class="form-control inputs2" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideCon text-right foto4Conductor1 aster form-text text-muted">El pasado judicial es necesario.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto4Conductor2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto4Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="pdf1Conductor" class="col-sm-5 col-form-label">Certificado de estudios<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="pdf1Conductor" id="pdf1Conductor" class="form-control inputs2" size="2300">
										    	<span class="form-text text-muted" style="text-align: right;">solo formato PDF</span>
										    	<span style="color:red !important; display: none;"class="hideCon text-right pdf1Conductor1 aster form-text text-muted">El certificado de estudios es necesario.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right pdf1Conductor2 aster form-text text-muted">La extencion debe ser PDF.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right pdf1Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 2.3MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto5Conductor" class="col-sm-5 col-form-label">Certificado de experiencia laboral 1<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto5Conductor" id="foto5Conductor" class="form-control inputs2" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideCon text-right foto5Conductor1 aster form-text text-muted">El certificado de experiencia laboral es necesario.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto5Conductor2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto5Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto6Conductor" class="col-sm-5 col-form-label">Certificado de experiencia laboral 2<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto6Conductor" id="foto6Conductor" class="form-control inputs2" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideCon text-right foto6Conductor1 aster form-text text-muted">El certificado de experiencia laboral es necesario.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto6Conductor2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto6Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto7Conductor" class="col-sm-5 col-form-label">Simit<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto7Conductor" id="foto7Conductor" class="form-control inputs2" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideCon text-right foto7Conductor1 aster form-text text-muted">El simit es necesario.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto7Conductor2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto7Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto8Conductor" class="col-sm-5 col-form-label">Fotocopia a color de cedula<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto8Conductor" id="foto8Conductor" class="form-control inputs2" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideCon text-right foto8Conductor1 aster form-text text-muted">La fotocopia a color de cedula es necesaria.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto8Conductor2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto8Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto9Conductor" class="col-sm-5 col-form-label">Fotocopia a color de licencia de conduccion<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto9Conductor" id="foto9Conductor" class="form-control inputs2" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideCon text-right foto9Conductor1 aster form-text text-muted">La fotocopia a color de licencia de conduccion es necesaria.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto9Conductor2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto9Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto10Conductor" class="col-sm-5 col-form-label">Fotocopia a color de libreta militar<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto10Conductor" id="foto10Conductor" class="form-control inputs2" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideCon text-right foto10Conductor1 aster form-text text-muted">La fotocopia a color de libreta militar es necesaria.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto10Conductor2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto10Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto11Conductor" class="col-sm-5 col-form-label">Fotocopia a color de pasado judicial<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto11Conductor" id="foto11Conductor" class="form-control inputs2" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideCon text-right foto11Conductor1 aster form-text text-muted">La fotocopia a color de pasado judicial es necesaria.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto11Conductor2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto11Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto12Conductor" class="col-sm-5 col-form-label">Fotocopia a blanco y negro de certificados de conduccion<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto12Conductor" id="foto12Conductor" class="form-control inputs2" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideCon text-right foto12Conductor1 aster form-text text-muted">La fotocopia de certificados de conduccion es necesaria.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto12Conductor2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto12Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto13Conductor" class="col-sm-5 col-form-label">Ultimo paz y salvo(Asociado o empresa donde halla laborado)<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto13Conductor" id="foto13Conductor" class="form-control inputs2" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideCon text-right foto13Conductor1 aster form-text text-muted">El ultimo paz y salvo es necesario.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto13Conductor2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto13Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto14Conductor" class="col-sm-5 col-form-label">Certificado de afiliacion a EPS<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto14Conductor" id="foto14Conductor" class="form-control inputs2" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideCon text-right foto14Conductor1 aster form-text text-muted">El certificado de afiliacion a EPS es necesario.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto14Conductor2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto14Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto15Conductor" class="col-sm-5 col-form-label">Certificado fondo de pensiones<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto15Conductor" id="foto15Conductor" class="form-control inputs2" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideCon text-right foto15Conductor1 aster form-text text-muted">El certificado fondo de pensiones es necesaria.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto15Conductor2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto15Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto16Conductor" class="col-sm-5 col-form-label">Examen de conduccion, realizado por el inspector Perito "prueba de conduccion"<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto16Conductor" id="foto16Conductor" class="form-control inputs2" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideCon text-right foto16Conductor1 aster form-text text-muted">El examen de conduccion es necesario.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto16Conductor2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto16Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto17Conductor" class="col-sm-5 col-form-label">Certificado manejo defensivo<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto17Conductor" id="foto17Conductor" class="form-control inputs2" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideCon text-right foto17Conductor1 aster form-text text-muted">El certificado manejo defensivo es necesario.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto17Conductor2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto17Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto18Conductor" class="col-sm-5 col-form-label">Concepto jefe rodamiento<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto18Conductor" id="foto18Conductor" class="form-control inputs2" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideCon text-right foto18Conductor1 aster form-text text-muted">El Concepto jefe rodamiento es necesario.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto18Conductor2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideCon text-right foto18Conductor3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
	            				</div>
							</div>

							<div id="datosConsignatarios">
								<h5>Anexos</h5>
	            				<div class="linea"></div>
	            				<div class="row mt-3">
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto1Conductor" class="col-sm-5 col-form-label">Tipo consignatario<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<select class="form-control" id="tipoConsignatario" id="tipoConsignatario">
										    		<option>Seleccione</option>
										    		<option value="taquilleros">Consignatarios taquilleros</option>
										    		<option value="satellite">Consignatarios satellite</option>
										    	</select>
										    </div>
										</div>
									</div>
	            				</div>
	            				<hr>
	            				<div id="tipoConsignatarioTaquillero">
	            					<div class="row mt-3">
										<div class="col-12">
					                    	<div class="form-group row">
											    <label for="taquilleroVin" class="col-sm-5 col-form-label">Vinculado a la empresa<span class="aster">*</span></label>
											    <div class="col-sm-7">
											    	<select class="form-control" name="taquilleroVin" id="taquilleroVin">
											    		<option>Seleccione</option>
											    		<option value="Si">Si</option>
											    		<option value="No">No</option>
											    	</select>
											    	<span class="form-text text-muted" id="textPagare" style="text-align: right;">Una vez sea citado a entrevista podra descargar el formulario de pagare.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right taquilleroVin aster form-text text-muted">Seleccione una opcion.</span>
											    </div>
											</div>
										</div>
	                				</div>
	                				<div class="row mt-3">
		            					<div class="col-12">
					                    	<div class="form-group row">
											    <label for="foto1Taquillero" class="col-sm-5 col-form-label">Fotografia(fondo azul 3x4)<span class="aster">*</span></label>
											    <div class="col-sm-7">
											    	<input type="file" name="foto1Taquillero" id="foto1Taquillero" class="form-control" size="1000">
											    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
											    	<span style="color:red !important; display: none;"class="hideTaq text-right foto1Taquillero1 aster form-text text-muted">La fotografia es necesaria.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto1Taquillero2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto1Taquillero3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
											    </div>
											</div>
										</div>
										<div class="col-12">
					                    	<div class="form-group row">
											    <label for="foto2Taquillero" class="col-sm-5 col-form-label">Antecedentes diciplinarios<span class="aster">*</span></label>
											    <div class="col-sm-7">
											    	<input type="file" name="foto2Taquillero" id="foto2Taquillero" class="form-control" size="1000">
											    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto2Taquillero1 aster form-text text-muted">Los antecedentes diciplinarios son necesarios.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto2Taquillero2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto2Taquillero3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
											    </div>
											</div>
										</div>
										<div class="col-12">
					                    	<div class="form-group row">
											    <label for="foto3Taquillero" class="col-sm-5 col-form-label">Pasado judicial<span class="aster">*</span></label>
											    <div class="col-sm-7">
											    	<input type="file" name="foto3Taquillero" id="foto3Taquillero" class="form-control" size="1000">
											    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto3Taquillero1 aster form-text text-muted">El pasado judicial es necesario.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto3Taquillero2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto3Taquillero3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
											    </div>
											</div>
										</div>
										<div class="col-12">
					                    	<div class="form-group row">
											    <label for="pdf1Taquillero" class="col-sm-5 col-form-label">Certificado de estudios<span class="aster">*</span></label>
											    <div class="col-sm-7">
											    	<input type="file" name="pdf1Taquillero" id="pdf1Taquillero" class="form-control" size="2300">
											    	<span class="form-text text-muted" style="text-align: right;">solo formato PDF</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right pdf1Taquillero1 aster form-text text-muted">El certificado de estudios es necesario.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right pdf1Taquillero2 aster form-text text-muted">La extencion debe ser PDF.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right pdf1Taquillero3 aster form-text text-muted">El tamaño debe de ser menor a 2.3MB.</span>
											    </div>
											</div>
										</div>
										<div class="col-12">
					                    	<div class="form-group row">
											    <label for="foto4Taquillero" class="col-sm-5 col-form-label">Certificado de experiencia laboral 1</label>
											    <div class="col-sm-7">
											    	<input type="file" name="foto4Taquillero" id="foto4Taquillero" class="form-control" size="1000">
											    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto4Taquillero2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto4Taquillero3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
											    </div>
											</div>
										</div>
										<div class="col-12">
					                    	<div class="form-group row">
											    <label for="foto5Taquillero" class="col-sm-5 col-form-label">Certificado de experiencia laboral 2</label>
											    <div class="col-sm-7">
											    	<input type="file" name="foto5Taquillero" id="foto5Taquillero" class="form-control" size="1000">
											    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto5Taquillero2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto5Taquillero3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
											    </div>
											</div>
										</div>
										<div class="col-12">
					                    	<div class="form-group row">
											    <label for="foto6Taquillero" class="col-sm-5 col-form-label">Fotocopia a color de cedula<span class="aster">*</span></label>
											    <div class="col-sm-7">
											    	<input type="file" name="foto6Taquillero" id="foto6Taquillero" class="form-control" size="1000">
											    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto6Taquillero1 aster form-text text-muted">La Fotocopia de la cedula es necesaria.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto6Taquillero2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto6Taquillero3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
											    </div>
											</div>
										</div>
										<div class="col-12">
					                    	<div class="form-group row">
											    <label for="foto7Taquillero" class="col-sm-5 col-form-label">Fotocopia a color de libreta militar<span class="aster">*</span></label>
											    <div class="col-sm-7">
											    	<input type="file" name="foto7Taquillero" id="foto7Taquillero" class="form-control" size="1000">
											    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto7Taquillero1 aster form-text text-muted">Fotocopia de la libreta militar necesaria.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto7Taquillero2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto7Taquillero3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
											    </div>
											</div>
										</div>
										<div class="col-12">
					                    	<div class="form-group row">
											    <label for="foto8Taquillero" class="col-sm-5 col-form-label">Certificado de afiliacion a EPS<span class="aster">*</span></label>
											    <div class="col-sm-7">
											    	<input type="file" name="foto8Taquillero" id="foto8Taquillero" class="form-control" size="1000">
											    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto8Taquillero1 aster form-text text-muted">Certificado de afiliacion a EPS necesario.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto8Taquillero2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto8Taquillero3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
											    </div>
											</div>
										</div>
										<div class="col-12">
					                    	<div class="form-group row">
											    <label for="foto9Taquillero" class="col-sm-5 col-form-label">Certificado fondo de pensiones<span class="aster">*</span></label>
											    <div class="col-sm-7">
											    	<input type="file" name="foto9Taquillero" id="foto9Taquillero" class="form-control" size="1000">
											    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto9Taquillero1 aster form-text text-muted">Certificado de fondo de pensiones necesario.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto9Taquillero2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
											    	<span style="color:red !important; display: none;" class="hideTaq text-right foto9Taquillero3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
											    </div>
											</div>
										</div>
									</div>
	            				</div>
	            				<div id="tipoConsignatarioSatellite">
	            					<div class="row mt-3">
										<div class="col-12">
					                    	<div class="form-group row">
											    <label for="foto1Satellite" class="col-sm-5 col-form-label">RUT<span class="aster">*</span></label>
											    <div class="col-sm-7">
											    	<input type="file" name="foto1Satellite" id="foto1Satellite" class="form-control" size="1000">
											    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
											    	<span style="color:red !important; display: none;" class="hideSat text-right foto1Satellite1 aster form-text text-muted">El RUT es necesario.</span>
										    		<span style="color:red !important; display: none;" class="hideSat text-right foto1Satellite2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    		<span style="color:red !important; display: none;" class="hideSat text-right foto1Satellite3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
											    </div>
											</div>
										</div>
										<div class="col-12">
					                    	<div class="form-group row">
											    <label for="foto2Satellite" class="col-sm-5 col-form-label">Camara y comercio del establecimiento<span class="aster">*</span></label>
											    <div class="col-sm-7">
											    	<input type="file" name="foto2Satellite" id="foto2Satellite" class="form-control" size="1000">
											    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
											    	<span style="color:red !important; display: none;" class="hideSat text-right foto2Satellite1 aster form-text text-muted">Camara y comercio necesario.</span>
										    		<span style="color:red !important; display: none;" class="hideSat text-right foto2Satellite2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    		<span style="color:red !important; display: none;" class="hideSat text-right foto2Satellite3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
											    </div>
											</div>
										</div>
	                				</div>
	            				</div>
							</div>

							<div id="datosAuxiliar">
								<h5>Anexos</h5>
	            				<div class="linea"></div>
	            				<div class="row mt-3">
	            					<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto1Auxiliar" class="col-sm-5 col-form-label">Fotografia(fondo azul 3x4)<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto1Auxiliar" id="foto1Auxiliar" class="form-control" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideAux text-right foto1Auxiliar1 aster form-text text-muted">La fotografia es necesaria.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto1Auxiliar2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto1Auxiliar3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto3Auxiliar" class="col-sm-5 col-form-label">Antecedentes diciplinarios<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto3Auxiliar" id="foto3Auxiliar" class="form-control" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;"class="hideAux text-right foto3Auxiliar1 aster form-text text-muted">Los antecedentes diciplinarios son necesarios.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto3Auxiliar2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto3Auxiliar3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto4Auxiliar" class="col-sm-5 col-form-label">Pasado judicial<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto4Auxiliar" id="foto4Auxiliar" class="form-control" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto4Auxiliar1 aster form-text text-muted">El pasado judicial es necesario.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto4Auxiliar2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto4Auxiliar3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="pdf1Auxiliar" class="col-sm-5 col-form-label">Certificado de estudios<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="pdf1Auxiliar" id="pdf1Auxiliar" class="form-control" size="2300">
										    	<span class="form-text text-muted" style="text-align: right;">solo formato PDF</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right pdf1Auxiliar1 aster form-text text-muted">El certificado de estudios es necesario.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right pdf1Auxiliar2 aster form-text text-muted">La extencion debe ser PDF.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right pdf1Auxiliar3 aster form-text text-muted">El tamaño debe de ser menor a 2.3MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto5Auxiliar" class="col-sm-5 col-form-label">Certificado de experiencia laboral 1<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto5Auxiliar" id="foto5Auxiliar" class="form-control" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto5Auxiliar1 aster form-text text-muted">Certificado de experiencia laboral necesario.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto5Auxiliar2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto5Auxiliar3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto6Auxiliar" class="col-sm-5 col-form-label">Certificado de experiencia laboral 2<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto6Auxiliar" id="foto6Auxiliar" class="form-control" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto6Auxiliar1 aster form-text text-muted">Certificado de experiencia laboral necesario.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto6Auxiliar2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto6Auxiliar3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto8Auxiliar" class="col-sm-5 col-form-label">Fotocopia a color de cedula<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto8Auxiliar" id="foto8Auxiliar" class="form-control" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto8Auxiliar1 aster form-text text-muted">La Fotocopia de la cedula es necesaria.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto8Auxiliar2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto8Auxiliar3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto10Auxiliar" class="col-sm-5 col-form-label">Fotocopia a color de libreta militar<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto10Auxiliar" id="foto10Auxiliar" class="form-control" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto10Auxiliar1 aster form-text text-muted">Fotocopia de la libreta militar necesaria.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto10Auxiliar2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto10Auxiliar3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto12Auxiliar" class="col-sm-5 col-form-label">Certificado de afiliacion a EPS<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto12Auxiliar" id="foto12Auxiliar" class="form-control" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto12Auxiliar1 aster form-text text-muted">Certificado de afiliacion a EPS necesario.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto12Auxiliar2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto12Auxiliar3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
									<div class="col-12">
				                    	<div class="form-group row">
										    <label for="foto13Auxiliar" class="col-sm-5 col-form-label">Certificado fondo de pensiones<span class="aster">*</span></label>
										    <div class="col-sm-7">
										    	<input type="file" name="foto13Auxiliar" id="foto13Auxiliar" class="form-control" size="1000">
										    	<span class="form-text text-muted" style="text-align: right;">solo formatos PNG, JPG, JPEG</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto13Auxiliar1 aster form-text text-muted">Certificado de fondo de pensiones necesario.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto13Auxiliar2 aster form-text text-muted">La extencion debe ser PNG, JPG, JPEG.</span>
										    	<span style="color:red !important; display: none;" class="hideAux text-right foto13Auxiliar3 aster form-text text-muted">El tamaño debe de ser menor a 1MB.</span>
										    </div>
										</div>
									</div>
								</div>
							</div>
							<br />
							<button type="submit" id="" class="mt-1 finish btnEnd mr-3 btn btn-success btn-next" onclick="preg()">Enviar <span class="ti-save"></span></button>
							<button type="button" id="back3" class="mt-1 btnEnd mr-3 btn btn-secondary btn-back"><span class="ti-angle-double-left"></span> Anterior</button>
						</div>
                    </form>
                </div>
            </div>
        </div>
    </section>


	<!--============================= FOOTER =============================-->
    <div class="foo-footer"></div>
    <footer class="main-block dark-bg">
        <div class="container">
            <div class="row">
                <div class="colum col-md-4">
                    <h6><strong>Mas informacion</strong></h6>
                    <br>
                    <br>
                    <p>Nuestra más alta prioridad es el cliente para quien tenemos nuestra mejor actitud de servicio, el cliente es la razón de ser de nuestro trabajo; le servimos con gusto en forma amable y eficiente; nuestro potencial mas valioso es nuestra gente y la capacidad de trabajar en equipo.</p>
                    <br>
                    <br>
                    <div class="img-foo">
                        <a href="http://www.supertransporte.gov.co/super/" target="_blank"><img src="assets/images/img/footer-logo-1.png" class="img-fluid"></a>
                        <a href="https://www.mintransporte.gov.co/" target="_blank"><img src="assets/images/img/footer-logo-2.png" class="img-fluid"></a>
                        <a href="https://www.simit.org.co/" target="_blank"><img src="assets/images/img/footer-logo-3.png" class="img-fluid"></a>
                        <a href="https://www.invias.gov.co/" target="_blank"><img src="assets/images/img/footer-logo-4.png" class="img-fluid"></a>
                    </div>
                </div>
                <div class="colum col-md-4">
                    <h6><strong>Redes sociales</strong></h6>
                    <br>
                    <div class="copyright">
                        <ul>
                            <li><a href="https://www.facebook.com/cootranshuilaltdaoficial" target="_blank"><span class="ti-facebook"></span>&nbsp;&nbsp;Siguenos en Facebook</a></li><br>
                            <li><a href="https://twitter.com/cootranshuila" target="_blank"><span class="ti-twitter-alt"></span>&nbsp;&nbsp;Siguenos en Twitter</a></li><br>
                            <li><a href="https://www.instagram.com/cootranshuila" target="_blank"><span class="ti-instagram"></span>&nbsp;&nbsp;Siguenos en Instagram</a></li>
                        </ul>
                    </div>
                </div>
                <div class="colum col-md-4">
                    <h6><strong>Contacto</strong></h6>
                    <br>
                    <br>
                    <div class="copyrightC">
                        <ul>
                            <li class="ml-1"><span class="ti-home"></span>&nbsp;&nbsp;Av. 26 No. 4-82, Neiva - Huila</a></li><br>
                            <li class="ml-1"><span class="ti-mobile"></span>&nbsp;&nbsp;(8)875 6365 | 8756368</a></li><br>
                            <li class="ml-1"><span class="ti-email"></span>&nbsp;&nbsp;clientes@cootranshuila.com</a></li>
                            <li class="mt-3"><a href="formulario_postulado.php"><span class="ti-user"></span>&nbsp;&nbsp;Trabaja con nosotros</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="foo-foo">
        <p class="coo">&copy;Cootranshuila 2018</p>
    </div>

    <!--//END FOOTER -->


    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script> -->

    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/formulario_postulado.js"></script>
    <script src="assets/js/jquery.snow.min.1.0.js"></script>


    <!-- <script src="https://wscootranshuila.teletiquete.com/js/jquery-1.9.1.min.js" type="text/javascript"></script> -->

    <!-- <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script> -->

    <!-- <script src="https://wscootranshuila.teletiquete.com/js/tiqOnlinePagWeb.js" type="text/javascript"></script> -->

    <!-- BEGIN JIVOSITE CODE {literal} -->
	
	<script src="https://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
 	<script>
 		$.datepicker.regional['es'] = {
			closeText: 'Cerrar',
			prevText: '< Ant',
			nextText: 'Sig >',
			currentText: 'Hoy',
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
			weekHeader: 'Sm',
			dateFormat: 'dd/mm/yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
		};
		$.datepicker.setDefaults($.datepicker.regional['es']);

		$(function () {
			$('.date').datepicker();
		});
	</script>

	<?php
	if ((isset($_GET['g'])) && ($_GET['g'] == 's')) { ?>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.steps').hide();
				$('.padre').hide();
				$('#miModal').modal('hide');
				$('#miModal2').modal('show');
			});
		</script>
	<?php }
	?>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#departamento').on('change', function(){
				$depId = $(this).val();
				if ($depId) {
					$.ajax({
						url:'buscarCiudad.php',
						type:'post',
						data:{idDep:$depId},
						success:function(html){
							$('#ciudad').html(html);
						}
					})
				}
				else{
					$('#ciudad').html('<option value="">Ciudad</option>');
				}
			});

            $('.nav-link1').css({
                 "color": "rgb(0, 162, 81)"
            });
		});
	</script>   
</body>
</html>