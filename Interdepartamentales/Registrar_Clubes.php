<?php
  require('../clases/conexion_db.php');
  
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require '../librerias/PHPMailer/Exception.php';
  require '../librerias/PHPMailer/PHPMailer.php';
  require '../librerias/PHPMailer/SMTP.php';
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
    $response = array();
    $Departamentos=$_POST['Departamentos'];
    if($_POST['Departamentos']==11){
      $Ciudad=107;
    }else{
      $Ciudad=$_POST['Ciudad'];
    }
    $Nombre=$_POST['Nombre'];
    $Nombres=$_POST['Nombres'];
    $Apellidos=$_POST["Apellidos"];
    $CC=$_POST['CC'];
    $Cargo=$_POST['Cargo'];
    $Telefono=$_POST['Telefono'];
    $Email=$_POST['Email'];
    $Reconocimiento=$_POST['Reconocimiento'];
    if($_POST['Reconocimiento']==1){
      $No_reconocimiento=$_POST['No_reconocimiento'];
      $Fecha_reconocimiento=$_POST['Fecha_reconocimiento'];
    }else{
      $No_reconocimiento;
      $Fecha_reconocimiento;
    } 
    $Nombre_corto=$_POST['Nombre_corto'];
    $Direccion=$_POST['Direccion'];
    $fecha_inscripcion=date("Y-m-d");
	  $estado='3';

    $check_Nombre_query="select * from clubes where nombre_completo_club='$Nombre'";
    $result_check=$mysqli->query($check_Nombre_query);
    $rows = $result_check->num_rows;
    $check_Nombre_corto_query="select * from clubes where nombre_corto_club='$Nombre_corto'";
    $result_check=$mysqli->query($check_Nombre_corto_query);
    $rows1 = $result_check->num_rows;

    if ($rows > 0 ) {//compara
      $response['response'] = "ERROR PRESENTADO - El club y/o escuela ya se encontraba registrado! <br />  Nombre: " . $Nombre;
      $response['type_response'] = 0;
      }else if ( $rows1 > 0){
      $response['response'] = "ERROR PRESENTADO - El club y/o escuela ya se encontraba registrado! <br />  Nombre: " . $Nombre_corto;
      $response['type_response'] = 0;
    }else{
    if ($Reconocimiento==1) {//reconocimiento = si
      $query="insert INTO `clubes` (`departamento`, `municipio`, `nombre_completo_club`, `nombres`, `apellidos`, `identificacion`, `cargo`, `telefono`, `email`, `reconocimiento`, `no_reconocimiento`, `fecha_reconocimiento`, `nombre_corto_club`, `direccion`, `fecha_inscripcion`, `estado`) VALUES ('$Departamentos', '$Ciudad', '$Nombre', '$Nombres', '$Apellidos', '$CC', '$Cargo', '$Telefono', '$Email', '$Reconocimiento', '$No_reconocimiento', '$Fecha_reconocimiento', '$Nombre_corto', '$Direccion', '$fecha_inscripcion', '$estado')";
    } else {//reconocimiento = no
      $query="insert INTO `clubes` (`departamento`, `municipio`, `nombre_completo_club`, `nombres`, `apellidos`, `identificacion`, `cargo`, `telefono`, `email`, `reconocimiento`, `nombre_corto_club`, `direccion`, `fecha_inscripcion`, `estado`) VALUES ('$Departamentos', '$Ciudad', '$Nombre', '$Nombres', '$Apellidos', '$CC', '$Cargo', '$Telefono', '$Email', '$Reconocimiento', '$Nombre_corto', '$Direccion', '$fecha_inscripcion', '$estado')";
    }
      $result=$mysqli->query($query);
      if ($result) {
        $para      = $Email;
        $asunto    = 'LIPACUN - REGISTRO DEL CLUB Y/O ESCUELA EXITOSO';
        
        $mail = new PHPMailer(true);
  
          try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                 // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                             // Enable SMTP authentication
            $mail->Username   = 'jobeher2000@gmail.com';          // SMTP username    | bdavidlozano@gmail.com | jobeher2000@gmail.com
            $mail->Password   = 'dep7362@fu';                     // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                              // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->CharSet    = 'UTF-8';
  
  
            //Recipients
            $mail->setFrom('noreply@lipacun.com', 'NoReply Email-Lipacun');
            $mail->addAddress($Email);                            // Add a recipientn
  
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $asunto;
            $mail->Body    = '<h3>Se han registrado los datos del Club y/o Escuela exitosamente!!</h3>
  
              <p>Estamos validando la información enviada, por Favor mantener pendiende del correo electrónico. Pronto nos comunicaremos con usted para la confirmación de las credenciales de usuario.<br>
  
              <p>Nombre Club y/o Escuela: ' . $Nombre . '<br><br><br>
  
              ********************** NO RESPONDER - Mensaje Generado Automáticamente **********************';
  
            $mail->send();
            $response['response'] = "Se ha registrado los datos del Club y/o Escuela exitosamente! Por Favor revisar su correo para la validación de las credenciales de usuario.";
            $response['type_response'] = 1;
  
          } catch (Exception $e) {
            $response['response'] = "ERROR PRESENTADO - No se ha podido registrar el Club y/o Escuela. Verifique que la información suministrada sea la correcta e intente nuevamente, si el problema persiste comuníquese con el administrador del sistema.";
            $response['type_response'] = 0;
          }
      } 
    }
    
    if ($response['type_response'] == 0){ ?>
       <script>alert('<?php echo $response['response']; ?>')</script>
    <script>window.history.back()</script>
    <?php }else{ ?>
       <script>alert('<?php echo $response['response']; ?>')</script>
    <script>window.open('Index.php','_self')</script>
    <?php } ?>
</body>
</html>
