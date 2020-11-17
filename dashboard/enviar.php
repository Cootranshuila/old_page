<?php 

session_start();
require "ConexionBaseDatos_PDO.php";
require '../assets/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$conexion = conectaDb();


extract($_REQUEST);
date_default_timezone_set('America/Bogota');
$fecha_comen = date("y-m-d");
$fecha = "20".$fecha_comen;

// ======================= GUARDAR Y VER COMENTARIOS ======================

if (isset($_REQUEST['comentario'])) {
	
	$sql = $conexion->prepare("insert into comentarios (fecha_comentario, nombre_usuario, genero_usuario, comentario, comentario_flota) values(:fecha, :nom, :gen, :comen, :flo)");
      $sql->bindParam(":fecha", $fecha);
      $sql->bindParam(":nom", $_REQUEST['nombre_usuario']);
      $sql->bindParam(":gen", $_REQUEST['genero_usuario']);
      $sql->bindParam(":comen", $_REQUEST['comentario']);
      $sql->bindParam(":flo", $_REQUEST['comentario_flota']);
      $sql->execute();
      $cont = $sql->rowCount();
      if ($cont == 1) {
      	
      	$servicio = $_REQUEST['comentario_flota'];
	
		$sql = $conexion->prepare("select * from comentarios where comentario_flota = :ser");
		$sql->bindParam(":ser", $servicio);
	    $sql->execute();
	    $resultado = $sql->fetchAll();
			

		foreach ($resultado as $row) { 

			echo " <div class='media border p-3' id='ShowComentario'>";
	              if ($row['genero_usuario'] == 'Hombre') { 
	              	echo " <img src='../assets/images/img/avatarM.png' alt='".$row['nombre_usuario']."' class='mr-3 mt-3 rounded-circle' style='width:60px;'>";
	              } else { 
	                echo " <img src='../assets/images/img/avatarF.png' alt='".$row['nombre_usuario']."' class='mr-3 mt-3 rounded-circle' style='width:60px;'>";
	              }

	                  $date = $row['fecha_comentario'];
	                  $dia = date('d', strtotime(str_replace('-','/', $date)));
	                  $mes = date('m', strtotime(str_replace('-','/', $date)));
	                  $ano = "20".date('y', strtotime(str_replace('-','/', $date)));

	                  $fecha = $dia." del mes ".$mes." de ".$ano;
	                
	              echo "<div class='media-body'>
	                <h6>".$row['nombre_usuario']."<small><i> Publicado el ". $fecha."</i></small></h6>
	                <p>".$row['comentario']."</p>
	              </div>
	            </div> ";

	        } 
      	
      } else {
      	return(print("Error"));
      }

}

if (isset($_REQUEST['mostrarComentario'])) {

	$servicio = $_REQUEST['servicio'];
	
	$sql = $conexion->prepare("select * from comentarios where comentario_flota = :ser");
	$sql->bindParam(":ser", $servicio);
    $sql->execute();
    $resultado = $sql->fetchAll();
		

	foreach ($resultado as $row) { 

		echo " <div class='media border p-3' id='ShowComentario'>";
              if ($row['genero_usuario'] == 'Hombre') { 
              	echo " <img src='../assets/images/img/avatarM.png' alt='".$row['nombre_usuario']."' class='mr-3 mt-3 rounded-circle' style='width:60px;'>";
              } else { 
                echo " <img src='../assets/images/img/avatarF.png' alt='".$row['nombre_usuario']."' class='mr-3 mt-3 rounded-circle' style='width:60px;'>";
              }

                  $date = $row['fecha_comentario'];
                  $dia = date('d', strtotime(str_replace('-','/', $date)));
                  $mes = date('m', strtotime(str_replace('-','/', $date)));
                  $ano = "20".date('y', strtotime(str_replace('-','/', $date)));

                  $fecha = $dia." del mes ".$mes." de ".$ano;
                
              echo "<div class='media-body'>
                <h6>".$row['nombre_usuario']."<small><i> Publicado el ". $fecha."</i></small></h6>
                <p>".$row['comentario']."</p>
              </div>
            </div> ";

    } 
}

// ======================= FIN GUARDAR Y VER COMENTARIOS ======================

// =================== ENVIAR CORREOS A CLIENTES@COOTRANSHUILA.COM ============

if (isset($_REQUEST['form-correo'])) {

	$nombre   = $_REQUEST['nombre'];
	$telefono = $_REQUEST['telefono'];
	$correo   = $_REQUEST['correo'];
	$mensaje  = $_REQUEST['mensaje'];

	$respuesta = $_REQUEST['g-recaptcha-response'];
	$secret = '6Le85ocUAAAAANfOONAr3QFCx0_nQW5AZY7n0hv-';
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$respuesta_final = file_get_contents($url.'?secret='.$secret.'&response='.$respuesta);
	$json_respuesta = json_decode($respuesta_final);
	

	if ($json_respuesta->success) {

		$sql = $conexion->prepare("insert into correo_contacto (nombre_usu, telefono_usu, correo_usu, mensaje_usu, fecha_correo) values(:nom, :tel, :correo, :men, :fecha)");
	    $sql->bindParam(":nom", $nombre);
	    $sql->bindParam(":tel", $telefono);
	    $sql->bindParam(":correo", $correo);
	    $sql->bindParam(":men", $mensaje);
	    $sql->bindParam(":fecha", $fecha);
	    $sql->execute();

	    $men  = "Correo enviado por: ".$nombre;
	    $men .= "\nTelefono: ".$telefono;
	    $men .= "\nCorreo: ".$correo;
	    $men .= "\n\n".$mensaje;

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host       = 'smtp.gmail.com';                 // Specify main and backup SMTP servers
		$mail->SMTPAuth   = true;                             // Enable SMTP authentication
		$mail->Username   = 'clientes@cootranshuila.com';     // SMTP username
		$mail->Password   = 'jhon891100';                     // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port       = 465;                              // TCP port to connect to

		$mail->From     = $nombre;
		$mail->FromName = $correo;
		$mail->addAddress('clientes@cootranshuila.com', 'Clientes Cootranshuila');   

		$mail->Subject = 'Correo enviado desde la pagina web';
		$mail->Body    = $men;

		if(!$mail->send()) {
		    echo 'Error del mensaje: ' . $mail->ErrorInfo;
		} else {
		    return(print("Ok"));  
		}

	} else {
		return(print("Error"));  
	}

}

// ================== RECLAMOS ===================

if (isset($_REQUEST['reclamo'])) {

	$clasificacion = $_REQUEST['clasi'];
	$nombre        = $_REQUEST['nombre'];
	$telefono      = $_REQUEST['telefono'];
	$direccion     = $_REQUEST['direccion'];
	$correo        = $_REQUEST['correo'];
	$mensaje       = $_REQUEST['mensaje'];

	$respuesta = $_REQUEST['g-recaptcha-response'];
	$secret = '6Le85ocUAAAAANfOONAr3QFCx0_nQW5AZY7n0hv-';
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$respuesta_final = file_get_contents($url.'?secret='.$secret.'&response='.$respuesta);
	$json_respuesta = json_decode($respuesta_final);
	

	if ($json_respuesta->success) {

		$sql = $conexion->prepare("insert into reclamos (fecha_reclamo, clasificacion, nom_cli_re, tel_cli_re, dir_cli_re, correo_cli_re, mensaje_reclamo) values(:fecha, :clasi, :nom, :tel, :dir, :correo, :men)");
		$sql->bindParam(":fecha", $fecha);
		$sql->bindParam(":clasi", $clasificacion);
	    $sql->bindParam(":nom", $nombre);
	    $sql->bindParam(":tel", $telefono);
	    $sql->bindParam(":dir", $direccion);
	    $sql->bindParam(":correo", $correo);
	    $sql->bindParam(":men", $mensaje);
	    $sql->execute();
	    $resultado = $sql->rowCount();

	    $men  = $clasificacion." enviado por: ".$nombre;
	    $men .= "\nClasificacion: ".$clasificacion;
	    $men .= "\nTelefono: ".$telefono;
	    $men .= "\nDireccion: ".$direccion;
	    $men .= "\nCorreo: ".$correo;
	    $men .= "\n\n".$mensaje;

		$mail->isSMTP();                                       // Set mailer to use SMTP
		$mail->Host        = 'smtp.gmail.com';                 // Specify main and backup SMTP servers
		$mail->SMTPAuth    = true;                             // Enable SMTP authentication
		$mail->Username    = 'clientes@cootranshuila.com';     // SMTP username
		$mail->Password    = 'jhon891100';                     // SMTP password
		$mail->SMTPSecure  = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port        = 465;                              // TCP port to connect to

		$mail->From     = $nombre;
		$mail->FromName = $correo;
		$mail->addAddress('clientes@cootranshuila.com', 'Clientes Cootranshuila');    

		$mail->Subject = $clasificacion.' enviado desde la pagina web';
		$mail->Body    = $men;

		if(!$mail->send()) {
		    echo 'Error del mensaje: ' . $mail->ErrorInfo;
		} else {
		    return(print("Ok"));  
		}
	} else {
		return(print("Error"));  
	}

}

// =================== FIN ENVIAR CORREOS A CLIENTES@COOTRANSHUILA.COM ============

// ======================= RESPUESTA DE LOS CORREOS Y RECLAMOS ========================
	
if (isset($_REQUEST['btn-respuesta'])) {

	$sql = $conexion->prepare("update correo_contacto set respuesta = :res where num_correo = :id");
    $sql->bindParam(":res", $_REQUEST['respuesta']);
    $sql->bindParam(":id", $_REQUEST['id-respuesta']);
    $sql->execute();

    $sql1 = $conexion->prepare("select * from correo_contacto where num_correo = :id");
    $sql1->bindParam(":id", $_REQUEST['id-respuesta']);
    $sql1->execute();
    $resultado = $sql1->fetchAll();
    foreach ($resultado as $row) {
    	$correo = $row['correo_usu'];
    }

    $men = $_REQUEST['respuesta'];

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'clientes@cootranshuila.com';       // SMTP username
	$mail->Password = 'jhon891100';                       // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to

	$mail->setFrom('clientes@cootranshuila.com', 'Clientes Cootranshuila');
	$mail->addAddress($correo, $nombre);     

	$mail->Subject = 'Respuesta COOTRANSHUILA';
	$mail->Body    = $men;

	if(!$mail->send()) {
	    echo 'Error del mensaje: ' . $mail->ErrorInfo;
	} else {
	    header("location:Administrador.php?res-correo=si"); 
	}

}

if (isset($_REQUEST['btn-res'])) {

	$user = $_SESSION['user'];

	$sql = $conexion->prepare("update reclamos set respuesta_reclamo = :res, responsable_reclamo = :responsable where num_reclamo = :id");
    $sql->bindParam(":res", $_REQUEST['respuesta_reclamo']);
    $sql->bindParam(":responsable", $user);
    $sql->bindParam(":id", $_REQUEST['id-respuesta']);
    $sql->execute();
    $cont = $sql->rowCount();
    echo $cont;

    $sql1 = $conexion->prepare("select * from reclamos where num_reclamo = :id");
    $sql1->bindParam(":id", $_REQUEST['id-respuesta']);
    $sql1->execute();
    $resultado = $sql1->fetchAll();
    foreach ($resultado as $row) {
    	$correo = $row['correo_cli_re'];
    }

	$men = $_REQUEST['respuesta'];
	$men .= "\n\nResponsable: ".$user;

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'clientes@cootranshuila.com';       // SMTP username
	$mail->Password = 'jhon891100';                       // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to

	$mail->setFrom('clientes@cootranshuila.com', 'Clientes Cootranshuila');
	$mail->addAddress($correo, $nombre);     

	$mail->Subject = 'Respuesta COOTRANSHUILA';
	$mail->Body    = $men;

	if(!$mail->send()) {
	    echo 'Error del mensaje: ' . $mail->ErrorInfo;
	} else {
	    header("location:Administrador.php?res-reclamo=si"); 
	}
}

// ======================= FIN RESPUESTA DE LOS CORREOS Y RECLAMOS ========================


// =============== ASIGNAR TAREAS =================

if (isset($_REQUEST['btn-asignarco'])) {

  $sql = $conexion->prepare("update correo_contacto set asignado = :dep where num_correo = :id");
    $sql->bindParam(":dep", $_REQUEST['asigdep']);
    $sql->bindParam(":id", $_REQUEST['id-asigco']);
    $sql->execute();
    $cont = $sql->rowCount();
    if ($cont == 1) {
      header("location:Administrador.php?tarea=1");
    }
}

if (isset($_REQUEST['btn-asignarre'])) {

  $sql = $conexion->prepare("update reclamos set asignado_reclamo = :dep where num_reclamo = :id");
    $sql->bindParam(":dep", $_REQUEST['asigdep']);
    $sql->bindParam(":id", $_REQUEST['id-asigre']);
    $sql->execute();
    $cont = $sql->rowCount();
    echo $cont;
    if ($cont == 1) {
      header("location:Administrador.php?tarea=1");
    }
}

// =============== FIN ASIGNAR TAREAS =================

?>