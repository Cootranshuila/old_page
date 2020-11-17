<?php
// se extrae las variables recibidas
extract($_REQUEST);
extract($_POST);
// se hace la conexion a la base de datos
require "dashboard/ConexionBaseDatos_PDO.php";
$objConexion=conectaDb();
$estadoNewPostulado = '';
$visto = 'no';
$consulta = 0;

// se pasa la informacion a variables
$nombres                = $_POST['nombres'];
$apellidos              = $_POST['apellidos'];
$tipo_identificacion    = $_POST['tipo_identificacion'];
$numero_identificacion  = $_POST['numero_identifiacacion'];
$email                  = $_POST['email'];
$nacimiento             = $_POST['nacimiento'];
$genero                 = $_POST['genero'];
$estado_civil           = $_POST['estado_civil'];
$celular                = $_POST['celular'];
$departamento           = $_POST['departamento'];
$ciudad                 = $_POST['ciudad'];
$direccion              = $_POST['direccion'];
$cargo                  = $_POST['cargo'];
$foto                   = $_FILES['fotoPostulado']['name'];
$estado                 = 'Postulado';

if ($cargo == 'Satellite') {
	$newCargo = 'Consignatario Satellite';
}

if ($cargo == 'Auxiliar') {
	$newCargo = 'Auxiliar';
}

if ($cargo == 'Conductor') {
	$newCargo = 'Conductor';
}

if ($cargo == 'Taquillero') {
	$newCargo = 'Consignatario Taquillero';
}


$veri = "select * from postulado where numero_identificacion = :num";
$conVeri = $objConexion->prepare($veri);
$conVeri->bindParam(':num', $numero_identificacion);
$conVeri->execute();
$resVeri = $conVeri->fetchAll();
foreach ($resVeri as $key) {
	$estadoNewPostulado = $key['estado'];
}
if ($estadoNewPostulado == 'Postulado' || $estadoNewPostulado == 'Citado a entrevista' || $estadoNewPostulado == 'En examenes') {
	echo "esta en proceso";
}
else{
	$miDate = date("i");
	// $fotoPostulado  = $_FILES[$foto]['name'];
    $ext       = explode(".", $foto);
    $extencion = strtolower($ext[1]);
    
    $nombre_archivo_copia = $miDate.$numero_identificacion.".".$extencion;
    $ruta = 'imagesPostulados/postulados/';
    if ( move_uploaded_file($_FILES['fotoPostulado']['tmp_name'], $ruta.$nombre_archivo_copia) ){

		$sqlRegistrar = "INSERT INTO postulado(nombres, apellidos, tipo_identificacion, numero_identificacion, email, fecha_nacimiento, genero, estado_civil, numero_celular, departamento, ciudad, direccion, cargo, foto, estado, visto) VALUES (:nombres, :apellidos, :tipo_identificacion, :numero_identificacion, :email, :fecha_nacimiento, :genero, :estado_civil, :numero_celular, :departamento, :ciudad, :direccion, :cargo, :foto, :estado, :visto)";
		$consultaRegistrar = $objConexion->prepare($sqlRegistrar);
		$consultaRegistrar->bindParam(':nombres', $nombres);
		$consultaRegistrar->bindParam(':apellidos', $apellidos);
		$consultaRegistrar->bindParam(':tipo_identificacion', $tipo_identificacion);
		$consultaRegistrar->bindParam(':numero_identificacion', $numero_identificacion);
		$consultaRegistrar->bindParam(':email', $email);
		$consultaRegistrar->bindParam(':fecha_nacimiento', $nacimiento);
		$consultaRegistrar->bindParam(':genero', $genero);
		$consultaRegistrar->bindParam(':estado_civil', $estado_civil);
		$consultaRegistrar->bindParam(':numero_celular', $celular);
		$consultaRegistrar->bindParam(':departamento', $departamento);
		$consultaRegistrar->bindParam(':ciudad', $ciudad);
		$consultaRegistrar->bindParam(':direccion', $direccion);
		$consultaRegistrar->bindParam(':cargo', $newCargo);
		$consultaRegistrar->bindParam(':foto', $nombre_archivo_copia);
		$consultaRegistrar->bindParam(':estado', $estado);
		$consultaRegistrar->bindParam(':visto', $visto);
		$consultaRegistrar->execute();
		if ($consultaRegistrar->rowCount() == 1) {

			$sqlid = "select * from postulado where numero_identificacion = :num and estado = 'Postulado'";
			$conId = $objConexion->prepare($sqlid);
			$conId->bindParam(':num', $numero_identificacion);
			$conId->execute();
			$resId = $conId->fetchAll();
			foreach ($resId as $key) {
				$postulado_id = $key['id'];
			}



			$sqlEducacion = "INSERT INTO educacion(postulado_id, educacion_basica, titulo_obtenido, fecha, modalidad_academica, semestres_aprobados, graduado, titulo_obtenido2, fecha_terminacion, tarjeta_profesional) VALUES (:pos_id, :educacion_basica, :titulo_obtenido, :fecha, :modalidad_academica, :semestres_aprobados, :graduado, :titulo_obtenido2, :fecha_terminacion, :tarjeta_profesional)";
			$consultaEducacion = $objConexion->prepare($sqlEducacion);
			$consultaEducacion->bindParam(':pos_id', $postulado_id);
			$consultaEducacion->bindParam(':educacion_basica', $_POST['educacion'], PDO::PARAM_STR);
			$consultaEducacion->bindParam(':titulo_obtenido', $_POST['titulo'], PDO::PARAM_STR);
			$consultaEducacion->bindParam(':fecha', $_POST['fechaTit'], PDO::PARAM_STR);
			$consultaEducacion->bindParam(':modalidad_academica', $_POST['modalidadEdu'], PDO::PARAM_STR);
			$consultaEducacion->bindParam(':semestres_aprobados', $_POST['semestresEdu'], PDO::PARAM_INT);
			$consultaEducacion->bindParam(':graduado', $_POST['graduadoEdu'], PDO::PARAM_STR);
			$consultaEducacion->bindParam(':titulo_obtenido2', $_POST['nombreTit'], PDO::PARAM_STR);
			$consultaEducacion->bindParam(':fecha_terminacion', $_POST['FechaTerEdu'], PDO::PARAM_STR);
			$consultaEducacion->bindParam(':tarjeta_profesional', $_POST['numeroTar'], PDO::PARAM_INT);
			$consultaEducacion->execute();
			if ($consultaEducacion->rowCount() == 1 ) {
				
				if ($_POST['modalidadEdu2'] != '' && $_POST['semestresEdu2'] != '' && $_POST['graduadoEdu2'] != '' && $_POST['nombreTit2'] != '' && $_POST['FechaTerEdu2'] != '') {
					$sqlEducacion = "INSERT INTO educacion(postulado_id, modalidad_academica, semestres_aprobados, graduado, titulo_obtenido2, fecha_terminacion, tarjeta_profesional) VALUES (:pos_id, :modalidad_academica, :semestres_aprobados, :graduado, :titulo_obtenido2, :fecha_terminacion, :tarjeta_profesional)";
					$consultaEducacion = $objConexion->prepare($sqlEducacion);
					$consultaEducacion->bindParam(':pos_id',              $postulado_id);
					$consultaEducacion->bindParam(':modalidad_academica', $_POST['modalidadEdu2'], PDO::PARAM_STR);
					$consultaEducacion->bindParam(':semestres_aprobados', $_POST['semestresEdu2'], PDO::PARAM_INT);
					$consultaEducacion->bindParam(':graduado',            $_POST['graduadoEdu2'], PDO::PARAM_STR);
					$consultaEducacion->bindParam(':titulo_obtenido2',    $_POST['nombreTit2'], PDO::PARAM_STR);
					$consultaEducacion->bindParam(':fecha_terminacion',   $_POST['FechaTerEdu2'], PDO::PARAM_STR);
					$consultaEducacion->bindParam(':tarjeta_profesional', $_POST['numeroTar2'], PDO::PARAM_INT);
					$consultaEducacion->execute();
				}

				$sqlExp = "INSERT INTO experiencia(postulado_id, empresa, empresa_publica_privada, pais, departamento, municipio, correo_electronico, telefono, fecha_ingreso, fecha_retiro, cargo, direccion) VALUES (:pos_id, :empresa, :empresa_publica_privada, :pais, :departamento, :municipio, :correo_electronico, :telefono, :fecha_ingreso, :fecha_retiro, :cargo, :direccion)";
				$consultaExp = $objConexion->prepare($sqlExp);
				$consultaExp->bindParam(':pos_id',                  $postulado_id);
				$consultaExp->bindParam(':empresa',                 $_POST['empresa'], PDO::PARAM_STR);
				$consultaExp->bindParam(':empresa_publica_privada', $_POST['tipoEmpresa'], PDO::PARAM_STR);
				$consultaExp->bindParam(':pais',                    $_POST['paisEmpre'], PDO::PARAM_STR);
				$consultaExp->bindParam(':departamento',            $_POST['depEmpre'], PDO::PARAM_STR);
				$consultaExp->bindParam(':municipio',               $_POST['munEmpre'], PDO::PARAM_STR);
				$consultaExp->bindParam(':correo_electronico',      $_POST['correoEmpre'], PDO::PARAM_STR);
				$consultaExp->bindParam(':telefono',                $_POST['telEmpre'], PDO::PARAM_INT);
				$consultaExp->bindParam(':fecha_ingreso',           $_POST['fechaIngEmpre'], PDO::PARAM_STR);
				$consultaExp->bindParam(':fecha_retiro',            $_POST['fechaRetEmpre'], PDO::PARAM_STR);
				$consultaExp->bindParam(':cargo',                   $_POST['carEmpre'], PDO::PARAM_STR);
				$consultaExp->bindParam(':direccion',               $_POST['dirEmpre'], PDO::PARAM_STR);
				$consultaExp->execute();
				if ($consultaExp->rowCount() == 1) {
					$consulta = 1;

					
					$sqlRefFam = "INSERT INTO referencias_familiares (postulado_id, nombre, documento, celular) VALUES (:post_id1, :nombre1, :docu1, :celu1), (:post_id2, :nombre2, :docu2, :celu2)";
					$conReFam = $objConexion->prepare($sqlRefFam);
					$conReFam->bindParam(':post_id1', $postulado_id);
					$conReFam->bindParam(':nombre1',  $_POST['refFam1'], PDO::PARAM_STR);
					$conReFam->bindParam(':docu1',    $_POST['refFam2'], PDO::PARAM_STR);
					$conReFam->bindParam(':celu1',    $_POST['refFam3'], PDO::PARAM_INT);
					$conReFam->bindParam(':post_id2', $postulado_id);
					$conReFam->bindParam(':nombre2',  $_POST['refFam4'], PDO::PARAM_STR);
					$conReFam->bindParam(':docu2',    $_POST['refFam5'], PDO::PARAM_STR);
					$conReFam->bindParam(':celu2',    $_POST['refFam6'], PDO::PARAM_INT);
					$conReFam->execute();

					$sqlRefLab = "INSERT INTO referencias_laboral (postulado_id, nombre, documento, celular) VALUES (:post_id1, :nombre1, :docu1, :celu1), (:post_id2, :nombre2, :docu2, :celu2)";
					$conReLab = $objConexion->prepare($sqlRefLab);
					$conReLab->bindParam(':post_id1', $postulado_id);
					$conReLab->bindParam(':nombre1',  $_POST['refLab1'], PDO::PARAM_STR);
					$conReLab->bindParam(':docu1',    $_POST['refLab2'], PDO::PARAM_STR);
					$conReLab->bindParam(':celu1',    $_POST['refLab3'], PDO::PARAM_INT);
					$conReLab->bindParam(':post_id2', $postulado_id);
					$conReLab->bindParam(':nombre2',  $_POST['refLab4'], PDO::PARAM_STR);
					$conReLab->bindParam(':docu2',    $_POST['refLab5'], PDO::PARAM_STR);
					$conReLab->bindParam(':celu2',    $_POST['refLab6'], PDO::PARAM_INT);
					$conReLab->execute();
					

					if ($_POST['empresa2'] != '' && $_POST['tipoEmpresa2'] != '' && $_POST['paisEmpre2'] != '' && $_POST['depEmpre2'] != '' && $_POST['munEmpre2'] != '' && $_POST['correoEmpre2'] != '' && $_POST['telEmpre2'] != '' && $_POST['fechaIngEmpre2'] != '' && $_POST['fechaRetEmpre2'] != '' && $_POST['carEmpre2'] != '' && $_POST['dirEmpre2'] != '') {
						$sqlExp = "INSERT INTO experiencia(postulado_id, empresa, empresa_publica_privada, pais, departamento, municipio, correo_electronico, telefono, fecha_ingreso, fecha_retiro, cargo, direccion) VALUES (:pos_id, :empresa, :empresa_publica_privada, :pais, :departamento, :municipio, :correo_electronico, :telefono, :fecha_ingreso, :fecha_retiro, :cargo, :direccion)";
						$consultaExp = $objConexion->prepare($sqlExp);
						$consultaExp->bindParam(':pos_id',                  $postulado_id);
						$consultaExp->bindParam(':empresa',                 $_POST['empresa2'], PDO::PARAM_STR);
						$consultaExp->bindParam(':empresa_publica_privada', $_POST['tipoEmpresa2'], PDO::PARAM_STR);
						$consultaExp->bindParam(':pais',                    $_POST['paisEmpre2'], PDO::PARAM_STR);
						$consultaExp->bindParam(':departamento',            $_POST['depEmpre2'], PDO::PARAM_STR);
						$consultaExp->bindParam(':municipio',               $_POST['munEmpre2'], PDO::PARAM_STR);
						$consultaExp->bindParam(':correo_electronico',      $_POST['correoEmpre2'], PDO::PARAM_STR);
						$consultaExp->bindParam(':telefono',                $_POST['telEmpre2'], PDO::PARAM_INT);
						$consultaExp->bindParam(':fecha_ingreso',           $_POST['fechaIngEmpre2'], PDO::PARAM_STR);
						$consultaExp->bindParam(':fecha_retiro',            $_POST['fechaRetEmpre2'], PDO::PARAM_STR);
						$consultaExp->bindParam(':cargo',                   $_POST['carEmpre2'], PDO::PARAM_STR);
						$consultaExp->bindParam(':direccion',               $_POST['dirEmpre2'], PDO::PARAM_STR);
						$consultaExp->execute();
					}
				}
				else{
					echo "error al guardar experiencia";
				}
			}
			else{
				echo "error al guardar educacion";
			}
	    }
	    else{
	    	echo "error al guardar la informacion basica";
	    }
    }
    else{
    	echo "error al guardar la imagen de la persona";
    }
}


if ($cargo == 'Auxiliar' && $consulta == 1) {

    $sqlAuxiliar = "INSERT INTO files_auxiliar (postulado_id, foto1Auxiliar, foto3Auxiliar, foto4Auxiliar, pdf2Auxiliar, foto5Auxiliar, foto6Auxiliar, foto8Auxiliar, foto10Auxiliar, foto12Auxiliar, foto13Auxiliar) VALUES (:pos_id, :foto1Auxiliar, :foto3Auxiliar, :foto4Auxiliar, :pdf2Auxiliar, :foto5Auxiliar, :foto6Auxiliar, :foto8Auxiliar, :foto10Auxiliar, :foto12Auxiliar, :foto13Auxiliar)";
    $conAuxiliar = $objConexion->prepare($sqlAuxiliar);
    $conAuxiliar->bindParam(':pos_id', $postulado_id);
    $datos = array();
    for ($i = 1 ; $i < 15; $i++) { 
    	if ($i == 2 || $i == 7 || $i == 9 || $i == 11 || $i == 14) {
    		# code...
    	}
    	else{
    		if ($i == 10) {
    			if ($_FILES['foto'.$i.'Auxiliar']['name'] == '') {
					$varF = '';
					array_push($datos, $varF);
				}
				else{
					$foto = "foto".$i."Auxiliar";
				    $nameFoto  = $_FILES[$foto]['name'];
			        $ext       = explode(".", $nameFoto);
			        $extencion = strtolower($ext[1]);
			        
			        $nombre_archivo_copia = $foto."".$postulado_id.".".$extencion;
			        $ruta = 'imagesPostulados/auxiliar/images/';
			        move_uploaded_file($_FILES[$foto]['tmp_name'], $ruta.$nombre_archivo_copia);
			        array_push($datos, $nombre_archivo_copia);
				}
    		}
    		else{
				$foto = "foto".$i."Auxiliar";
			    $nameFoto  = $_FILES[$foto]['name'];
		        $ext       = explode(".", $nameFoto);
		        $extencion = strtolower($ext[1]);
		        
		        $nombre_archivo_copia = $foto."".$postulado_id.".".$extencion;
		        $ruta = 'imagesPostulados/auxiliar/images/';
		        move_uploaded_file($_FILES[$foto]['tmp_name'], $ruta.$nombre_archivo_copia);
		        array_push($datos, $nombre_archivo_copia);
		    }
	    }
    }

    // for ($i = 2 ; $i < 3; $i++) { 
		$pdf = "pdf1Auxiliar";
	    $namePdf  = $_FILES[$pdf]['name'];
        $ext       = explode(".", $namePdf);
        $extencion = strtolower($ext[1]);
        
        $nombre_archivo_copia = $pdf.$postulado_id.".".$extencion;
        $ruta = 'imagesPostulados/auxiliar/pdf/';
        move_uploaded_file($_FILES[$pdf]['tmp_name'], $ruta.$nombre_archivo_copia);
        array_push($datos, $nombre_archivo_copia);
    // }
    $conAuxiliar->bindParam(':foto1Auxiliar', $datos[0]);
    // $conAuxiliar->bindParam(':foto2Auxiliar', $datos[1]);
    $conAuxiliar->bindParam(':foto3Auxiliar', $datos[1]);
    $conAuxiliar->bindParam(':foto4Auxiliar', $datos[2]);
    $conAuxiliar->bindParam(':foto5Auxiliar', $datos[3]);
    $conAuxiliar->bindParam(':foto6Auxiliar', $datos[4]);
    $conAuxiliar->bindParam(':foto8Auxiliar', $datos[5]);
    $conAuxiliar->bindParam(':foto10Auxiliar', $datos[6]);
    $conAuxiliar->bindParam(':foto12Auxiliar', $datos[7]);
    $conAuxiliar->bindParam(':foto13Auxiliar', $datos[8]);
    $conAuxiliar->bindParam(':pdf2Auxiliar', $datos[9]);
    $conAuxiliar->execute();
    if ($conAuxiliar->rowCount() == 1) {
    	echo "registro guardado";
    }
    else{
    	echo "Error al guardar";
    }
}


if ($cargo == 'Conductor' && $consulta == 1) {
	
    $sqlConductor = "INSERT INTO files_conductor (postulado_id, foto1Conductor, foto3Conductor, foto4Conductor, pdf2Conductor, foto5Conductor, foto6Conductor, foto7Conductor, foto8Conductor, foto9Conductor, foto10Conductor, foto11Conductor, foto12Conductor, foto13Conductor, foto14Conductor, foto15Conductor, foto16Conductor, foto17Conductor, foto18Conductor) VALUES (:pos_id, :foto1Conductor, :foto3Conductor, :foto4Conductor, :pdf2Conductor, :foto5Conductor, :foto6Conductor, :foto7Conductor, :foto8Conductor, :foto9Conductor, :foto10Conductor, :foto11Conductor, :foto12Conductor, :foto13Conductor, :foto14Conductor, :foto15Conductor, :foto16Conductor, :foto17Conductor, :foto18Conductor)";
    $conConductor = $objConexion->prepare($sqlConductor);
    $conConductor->bindParam(':pos_id', $postulado_id);
    $datos = array();
    for ($i = 1 ; $i < 19; $i++) {
    	if ($i == 2 || $i == 10) {
    		if ($i == 10) {
	     		if ($_FILES['foto'.$i.'Conductor']['name'] == '') {
					$varF = '';
					array_push($datos, $varF);
				}
				else{
					$foto = "foto".$i."Conductor";
				    $nameFoto  = $_FILES[$foto]['name'];
			        $ext       = explode(".", $nameFoto);
			        $extencion = strtolower($ext[1]);
			        
			        $nombre_archivo_copia = $foto."".$postulado_id.".".$extencion;
			        $ruta = 'imagesPostulados/conductor/images/';
			        move_uploaded_file($_FILES[$foto]['tmp_name'], $ruta.$nombre_archivo_copia);
			        array_push($datos, $nombre_archivo_copia);
				}
			}
     	} 
     	else{
			$foto = "foto".$i."Conductor";
		    $nameFoto  = $_FILES[$foto]['name'];
	        $ext       = explode(".", $nameFoto);
	        $extencion = strtolower($ext[1]);
	        
	        $nombre_archivo_copia = $foto."".$postulado_id.".".$extencion;
	        $ruta = 'imagesPostulados/conductor/images/';
	        move_uploaded_file($_FILES[$foto]['tmp_name'], $ruta.$nombre_archivo_copia);
	        array_push($datos, $nombre_archivo_copia);
	    }
    }

    // for ($i = 1 ; $i < 3; $i++) { 
		$pdf = "pdf1Conductor";
	    $namePdf  = $_FILES[$pdf]['name'];
        $ext       = explode(".", $namePdf);
        $extencion = strtolower($ext[1]);
        
        $nombre_archivo_copia = $pdf.$postulado_id.".".$extencion;
        $ruta = 'imagesPostulados/conductor/pdf/';
        move_uploaded_file($_FILES[$pdf]['tmp_name'], $ruta.$nombre_archivo_copia);
        array_push($datos, $nombre_archivo_copia);
    // }
    $conConductor->bindParam(':foto1Conductor', $datos[0]);
    // $conConductor->bindParam(':foto2Conductor', $datos[1]);
    $conConductor->bindParam(':foto3Conductor', $datos[1]);
    $conConductor->bindParam(':foto4Conductor', $datos[2]);
    $conConductor->bindParam(':foto5Conductor', $datos[3]);
    $conConductor->bindParam(':foto6Conductor', $datos[4]);
    $conConductor->bindParam(':foto7Conductor', $datos[5]);
    $conConductor->bindParam(':foto8Conductor', $datos[6]);
    $conConductor->bindParam(':foto9Conductor', $datos[7]);
    $conConductor->bindParam(':foto10Conductor', $datos[8]);
    $conConductor->bindParam(':foto11Conductor', $datos[9]);
    $conConductor->bindParam(':foto12Conductor', $datos[10]);
    $conConductor->bindParam(':foto13Conductor', $datos[11]);
    $conConductor->bindParam(':foto14Conductor', $datos[12]);
    $conConductor->bindParam(':foto15Conductor', $datos[13]);
    $conConductor->bindParam(':foto16Conductor', $datos[14]);
    $conConductor->bindParam(':foto17Conductor', $datos[15]);
    $conConductor->bindParam(':foto18Conductor', $datos[16]);
    $conConductor->bindParam(':pdf2Conductor', $datos[17]);
    $conConductor->execute();
    if ($conConductor->rowCount() == 1) {
    	echo "registro guardado";
    }
    else{
    	echo "Error al guardar";
    }	
}
	
if ($cargo == 'Taquillero' && $consulta == 1) {
	// echo $postulado_id;

    

 	$datos = array();
    for ($i = 1 ; $i < 10; $i++) { 
		if ($i == 4 || $i == 5) {
			if ($_FILES['foto'.$i.'Taquillero']['name'] == '') {
				$varF = '';
				array_push($datos, $varF);
			}
			else{
				$foto = "foto".$i."Taquillero";
			    $nameFoto  = $_FILES[$foto]['name'];
		        $ext       = explode(".", $nameFoto);
		        $extencion = strtolower($ext[1]);
		        
		        $nombre_archivo_copia = $foto."".$postulado_id.".".$extencion;
		        $ruta = 'imagesPostulados/taquillero/images/';
		        move_uploaded_file($_FILES[$foto]['tmp_name'], $ruta.$nombre_archivo_copia);
		        array_push($datos, $nombre_archivo_copia);
			}
		}
		else{
			if ($i == 7) {
				if ($_FILES['foto'.$i.'Taquillero']['name'] == '') {
					$varF = '';
					array_push($datos, $varF);
				}
				else{
					$foto = "foto".$i."Taquillero";
				    $nameFoto  = $_FILES[$foto]['name'];
			        $ext       = explode(".", $nameFoto);
			        $extencion = strtolower($ext[1]);
			        
			        $nombre_archivo_copia = $foto."".$postulado_id.".".$extencion;
			        $ruta = 'imagesPostulados/taquillero/images/';
			        move_uploaded_file($_FILES[$foto]['tmp_name'], $ruta.$nombre_archivo_copia);
			        array_push($datos, $nombre_archivo_copia);
				}
			}else{
				$foto = "foto".$i."Taquillero";
			    $nameFoto  = $_FILES[$foto]['name'];
		        $ext       = explode(".", $nameFoto);
		        $extencion = strtolower($ext[1]);
		        
		        $nombre_archivo_copia = $foto."".$postulado_id.".".$extencion;
		        $ruta = 'imagesPostulados/taquillero/images/';
		        move_uploaded_file($_FILES[$foto]['tmp_name'], $ruta.$nombre_archivo_copia);
		        array_push($datos, $nombre_archivo_copia);
		    }
	    }
    }

	$pdf = "pdf1Taquillero";
    $namePdf  = $_FILES[$pdf]['name'];
    $ext       = explode(".", $namePdf);
    $extencion = strtolower($ext[1]);
    
    $nombre_archivo_copia = $pdf.$postulado_id.".".$extencion;
    $ruta = 'imagesPostulados/taquillero/pdf/';
    move_uploaded_file($_FILES[$pdf]['tmp_name'], $ruta.$nombre_archivo_copia);
    array_push($datos, $nombre_archivo_copia);

    // echo $datos[0];

    $sqlTaquillero = "INSERT INTO files_taquillero (postulado_id, vinculado, pdf1Taquillero, foto1Taquillero, foto2Taquillero, foto3Taquillero, foto4Taquillero, foto5Taquillero, foto6Taquillero, foto7Taquillero, foto8Taquillero, foto9Taquillero) VALUES (:pos_id, :vinculado, :pdf1Taquillero, :foto1Taquillero, :foto2Taquillero, :foto3Taquillero, :foto4Taquillero, :foto5Taquillero, :foto6Taquillero, :foto7Taquillero, :foto8Taquillero, :foto9Taquillero)";
    $conTaquillero = $objConexion->prepare($sqlTaquillero);
    $conTaquillero->bindParam(':pos_id', $postulado_id);
    $conTaquillero->bindParam(':vinculado', $_POST['taquilleroVin'], PDO::PARAM_STR);

    $conTaquillero->bindParam(':foto1Taquillero', $datos[0], PDO::PARAM_STR);
    $conTaquillero->bindParam(':foto2Taquillero', $datos[1], PDO::PARAM_STR);
    $conTaquillero->bindParam(':foto3Taquillero', $datos[2], PDO::PARAM_STR);
    $conTaquillero->bindParam(':foto4Taquillero', $datos[3], PDO::PARAM_STR);
    $conTaquillero->bindParam(':foto5Taquillero', $datos[4], PDO::PARAM_STR);
    $conTaquillero->bindParam(':foto6Taquillero', $datos[5], PDO::PARAM_STR);
    $conTaquillero->bindParam(':foto7Taquillero', $datos[6], PDO::PARAM_STR);
    $conTaquillero->bindParam(':foto8Taquillero', $datos[7], PDO::PARAM_STR);
    $conTaquillero->bindParam(':foto9Taquillero', $datos[8], PDO::PARAM_STR);
    $conTaquillero->bindParam(':pdf1Taquillero', $datos[9], PDO::PARAM_STR);
    $conTaquillero->execute();
    if ($conTaquillero->rowCount() == 1) {
    	echo "registro guardado";
    }
    else{
    	echo "Error al guardar";
    }
}
		
if ($cargo == 'Satellite' && $consulta == 1) {

    $sqlSatellite = "INSERT INTO files_satellite (postulado_id, pdf1Satellite, foto1Satellite, foto2Satellite, foto3Satellite, foto4Satellite, foto5Satellite, foto6Satellite, foto7Satellite, foto8Satellite, foto9Satellite) VALUES (:pos_id, :pdf1Satellite, :foto1Satellite, :foto2Satellite, :foto3Satellite, :foto4Satellite, :foto5Satellite, :foto6Satellite, :foto7Satellite, :foto8Satellite, :foto9Satellite)";
    $conSatellite = $objConexion->prepare($sqlSatellite);
    $conSatellite->bindParam(':pos_id', $postulado_id);
    $datos = array();
    for ($i = 1 ; $i < 10; $i++) {
    	if ($i == 6 || $i == 7 || $i == 9) {
    		if ($_FILES['foto'.$i.'Satellite']['name'] == '') {
				$varF = '';
				array_push($datos, $varF);
			}
			else{
				$foto = "foto".$i."Satellite";
			    $nameFoto  = $_FILES[$foto]['name'];
		        $ext       = explode(".", $nameFoto);
		        $extencion = strtolower($ext[1]);
		        
		        $nombre_archivo_copia = $foto."".$postulado_id.".".$extencion;
		        $ruta = 'imagesPostulados/satellite/images/';
		        move_uploaded_file($_FILES[$foto]['tmp_name'], $ruta.$nombre_archivo_copia);
		        array_push($datos, $nombre_archivo_copia);
		    }
    	}
    	else{
			$foto = "foto".$i."Satellite";
		    $nameFoto  = $_FILES[$foto]['name'];
	        $ext       = explode(".", $nameFoto);
	        $extencion = strtolower($ext[1]);
	        
	        $nombre_archivo_copia = $foto."".$postulado_id.".".$extencion;
	        $ruta = 'imagesPostulados/satellite/images/';
	        move_uploaded_file($_FILES[$foto]['tmp_name'], $ruta.$nombre_archivo_copia);
	        array_push($datos, $nombre_archivo_copia);
	    }
    }

    $pdf = "pdf1Satellite";
    $namePdf  = $_FILES[$pdf]['name'];
    $ext       = explode(".", $namePdf);
    $extencion = strtolower($ext[1]);
    
    $nombre_archivo_copia = $pdf.$postulado_id.".".$extencion;
    $ruta = 'imagesPostulados/satellite/pdf/';
    move_uploaded_file($_FILES[$pdf]['tmp_name'], $ruta.$nombre_archivo_copia);
    array_push($datos, $nombre_archivo_copia);

    $conSatellite->bindParam(':foto1Satellite', $datos[0]);
    $conSatellite->bindParam(':foto2Satellite', $datos[1]);
    $conSatellite->bindParam(':foto3Satellite', $datos[2]);
    $conSatellite->bindParam(':foto4Satellite', $datos[3]);
    $conSatellite->bindParam(':foto5Satellite', $datos[4]);
    $conSatellite->bindParam(':foto6Satellite', $datos[5]);
    $conSatellite->bindParam(':foto7Satellite', $datos[6]);
    $conSatellite->bindParam(':foto8Satellite', $datos[7]);
    $conSatellite->bindParam(':foto9Satellite', $datos[8]);
    $conSatellite->bindParam(':pdf1Satellite', $datos[9]);
    $conSatellite->execute();
    if ($conSatellite->rowCount() == 1) {
    	echo "registro guardado";
    }
    else{
    	echo "Error al guardar";
    }	
}

?>