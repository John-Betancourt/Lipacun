<?php
require('../clases/conexion_db.php');
session_start();

set_time_limit(180);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../librerias/PHPMailer/Exception.php';
require '../librerias/PHPMailer/PHPMailer.php';
require '../librerias/PHPMailer/SMTP.php';

if(!empty($_POST['asunto'])){
		if(!empty($_FILES['archivo'])){
			
			$asunto = $_POST['asunto'];
			$listado = $_POST['id_listado'];

			$sql="SELECT evento FROM listados_eventos WHERE id = '$listado'";
			$result = $mysqli->query($sql);
			$evento_array = $result->fetch_assoc();
			$evento = $evento_array['evento'];

			$sql2="SELECT club FROM inscripcion_evento_clubes WHERE evento = '$evento'";
			$result2 = $mysqli->query($sql2);
			while($row=$result2->fetch_assoc()){
				$club = $row['club'];
				$sql3 = "SELECT email FROM clubes WHERE nombre_corto_club = '$club'";
				$result3 = $mysqli->query($sql3);
				$email_array = $result3->fetch_assoc();
				$email = $email_array['email'];

				$mail = new PHPMailer(true);

				try {
					//Server settings
					$mail->SMTPDebug = 0;										// Enable verbose debug output
					$mail->isSMTP();											// Send using SMTP
					$mail->Host       = 'smtp.gmail.com';						// Set the SMTP server to send through
					$mail->SMTPAuth   = true;									// Enable SMTP authentication
					$mail->Username   = 'bdavidlozano@gmail.com';				// SMTP username
					$mail->Password   = 'brianlo_mil1995';						// SMTP password
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;			// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
					$mail->Port       = 587;									// TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
					$mail->CharSet	  = 'UTF-8';


					//Recipients
					$mail->setFrom('bdavidlozano@gmail.com', 'Brian');
					$mail->addAddress($email);								// Add a recipient

					$nombre = $_FILES['archivo']['name'];
					$tam = $_FILES['archivo']['tmp_name'];

					$mail->AddAttachment($tam, $nombre);

					// Attachments
					// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
					//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

					// Content

					$mail->isHTML(true);                                  // Set email format to HTML
					$mail->Subject = $asunto;
					$mail->Body    = '<h3>LIPACUN DICE:</h3>

					<p>Cordial saludo</p>

				    <P>Atentamente nos permitimos remitirles en archivo adjunto al presente mensaje, los resultados de la prueba indicada en el asunto.<br>
					Lo anterior para conocimiento e información de los resultados oficiales.<br>
					Reciban un saludo afectuoso de parte de la Liga de Patinaje de Cundinamarca.</P>';
					
					$mail->send();
					$respuesta = 1;
					$mail->ClearAddresses();
					} catch (Exception $e) {
					$respuesta = 0;
				}
			}
			if($respuesta==1){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			echo 2;//falta archivo
		}
}

/*echo 'Mensaje enviado';
} catch (Exception $e) {
	echo "Error: {$mail->ErrorInfo}";
}

$mail->send();
	echo 1;
} catch (Exception $e) {
	echo 0;
}


$mail->send();
$respuesta = 1;
} catch (Exception $e) {
$respuesta = 0;
}*/
