<?php

 require_once('../clases/conexion_db.php');
 session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../librerias/PHPMailer/Exception.php';
require '../librerias/PHPMailer/PHPMailer.php';
require '../librerias/PHPMailer/SMTP.php';

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
    header("location: Login.php");
  }

  $idUsuario = $_SESSION['codigo_usuario'];
?>
<!DOCTYPE html>
<html>
<head>
  <!-- j Query -->
  <script type="text/javascript" src="../librerias/jquery.min.js"></script>
  <!-- Bootstrap JS -->
  <script type="text/javascript" src="../librerias/bootstrap/bootstrap.min.js"></script>
</head>
<body>
 	<?php
    $response	= array();
    $Nombre_corto = $_REQUEST['Club'];
	$Nombre_corto_lashes = addslashes($Nombre_corto);
	$sql		= "Select * FROM clubes WHERE nombre_corto_club='$Nombre_corto_lashes'";
  	$result		= $mysqli->query($sql);
  	$row		= $result->fetch_assoc();
	
	$token		= substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5)),0,40);
	$password	= substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5)),0,8);
	$estado		= '1';
	$salt		= '$Lip@cun&';
    $password_encry=md5($salt . $password);
	//$password_encry	= md5($password);
	$localIP	= gethostbyname(trim('LAPTOP-VMEDQHB1'));//LAPTOP-VMEDQHB1 | DESKTOP-LR3G8IQ
	$Nombre_corto_sin_espacios =str_replace(' ', '%20', $Nombre_corto_lashes);
	$url		= 'http://'.$localIP.'/Lipacun/Restablecer_Contraseña.php?Token='.$token.'&Club='.$Nombre_corto_sin_espacios;

	$query="UPDATE `clubes` SET `clave` = '$password_encry', `estado` = '$estado', `token` = '$token' WHERE `nombre_corto_club` = '$Nombre_corto_lashes'";
	$result=$mysqli->query($query);
	if ($result) {
		$response['response'] = "El Club y/o Escuela se ha activado correctamente.";
		$response['type_response'] = 1;
		$email    = $row['email'];
		$asunto   = 'LIPACUN - SU CUENTA SE HA VALIDADO EXITOSAMENTE';
		
		$mail = new PHPMailer(true);

				try {
					//Server settings
					$mail->SMTPDebug = 0;										// Enable verbose debug output
					$mail->isSMTP();											// Send using SMTP
					$mail->Host       = 'smtp.gmail.com';						// Set the SMTP server to send through
					$mail->SMTPAuth   = true;									// Enable SMTP authentication
					$mail->Username   = 'jobeher2000@gmail.com';				// SMTP username    | bdavidlozano@gmail.com | jobeher2000@gmail.com
					$mail->Password   = 'dep7362@fu';							// SMTP password
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;			// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
					$mail->Port       = 587;									// TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
					$mail->CharSet	  = 'UTF-8';


					//Recipients
					$mail->setFrom('noreply@lipacun.com', 'NoReply Email-Lipacun');
					$mail->addAddress($email);									// Add a recipientn

					$mail->isHTML(true);										// Set email format to HTML
					$mail->Subject = $asunto;
					$mail->Body    = '<h3>¡El proceso de validación del Club y/o Escuela ha culminado exitosamente!</h3>

				    <p>Sus credenciles de usuario son:</p>

				    <p>Nombre Corto Club y/o Escuela: '.$Nombre_corto. '</p>

				    <p>Contraseña: '.$password.'</p>

				    <p>Por favor cambie la contraseña al iniciar sesión o si prefiere, haga click sobre el enlace para cambiarla. Al ir a este enlace, podrá ingresar y confirmar su nueva contraseña</p>

				   <a href="'.$url.'">Cambiar contraseña</a>

				    <p>********************* NO RESPONDER - Mensaje Generado Automáticamente *********************</p>';

					$mail->send();
					$response['response'] = "El Club y/o Escuela se ha activado correctamente.";
		            $response['type_response'] = 1;
				} catch (Exception $e) {
					$response['response'] = "ERROR PRESENTADO - No se ha podido activar el Club y/o Escuela, por favor intente nuevamente.";
					$response['type_response'] = 0;
				}
	}

 ?>

	<script>alert('<?php echo $response['response'] ?>')</script><script>window.history.back()</script>
	
</body>
</html>
