<?php 

extract($_REQUEST);
extract($_POST);

require "../../assets/config/ConexionBaseDatos_PDO.php";
require "../../postulados/seg.php";
require '../../assets/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$objConexion=conectaDb();

$id        = $_REQUEST['id'];
$contenido = $_REQUEST['contenido'];

//Se hace la consulta del correo recibiendo la variable id
$sql = $objConexion->prepare("SELECT * from correo_contacto where num_correo = :id");
$sql->bindParam(":id", $id);
$sql->execute();
$resultado = $sql->fetchAll();
foreach ($resultado as $row) {
	$correo = $row['correo_usu'];
	$nombre = $row['nombre_usu'];
}

// $men = "Cordial saludo, \n\nInformo suspensión del señor ".$nombre." por el término de ".$dias_sancion." días a partir de hoy ".$dia_ini." de ".$mes_1." de ".$ano_ini.". Ingresa a rodamiento el ".($dia_fin+1)." de ".$mes_2." de ".$ano_fin.".\n\nGracias,\n\nCorreo generado por el aplicativo de sanciones. (favor verificar informacion)";

// print_r($men);

$mail->isSMTP();       
$mail->isHTML(true);                               // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'clientes@cootranshuila.com';       // SMTP username
$mail->Password = 'jhon891100';                       // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('clientes@cootranshuila.com', 'Clientes Cootranshuila');
$mail->addAddress($correo, $nombre); 

$mail->Subject = 'Respuesta a correo enviado por la pagina web';
$mail->Body    = $contenido;

if(!$mail->send()) {
    echo 'Error del mensaje: ' . $mail->ErrorInfo;
} else {
	// Hacemos un UPDATE en el correo en el campo respuesta.
	$sql = $objConexion->prepare("UPDATE correo_contacto Set respuesta = :respuesta where num_correo = :id");
	$sql->bindParam(":respuesta", $contenido);
	$sql->bindParam(":id", $id);
	$sql->execute();
    echo 'Ok';
}

?>