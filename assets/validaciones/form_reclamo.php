<?php 

// session_start();
require "../../dashboard-design/assets/config/ConexionBaseDatos_PDO.php";
require '../PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$conexion = conectaDb();


extract($_REQUEST);
date_default_timezone_set('America/Bogota');
$fecha_comen = date("y-m-d");
$fecha = "20".$fecha_comen;



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

		$mail->From     = $correo;
		$mail->FromName = $nombre;
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




?>