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

		$sql = $conexion->prepare("INSERT into correo_contacto (nombre_usu, telefono_usu, correo_usu, mensaje_usu, fecha_correo) values(:nom, :tel, :correo, :men, :fecha)");
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

		$mail->From     = $correo;
		$mail->FromName = $nombre;
		$mail->addAddress('clientes@cootranshuila.com', 'Clientes Cootranshuila');   

		$mail->Subject = 'Correo enviado desde la pagina web';
		$mail->Body    = $men;

		if(!$mail->send()) {
		    echo 'Error del mensaje: ' . $mail->ErrorInfo;
		} else {
		    return(print("Ok"));  
		}

	} else {
		// return($json_respuesta);  
		return(print("Error"));  
	}




?>