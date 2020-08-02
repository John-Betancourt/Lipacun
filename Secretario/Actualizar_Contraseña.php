<?php
  require('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
    header("location: ../Administrador/Login.php");
  }

  $idUsuario = $_SESSION['codigo_usuario'];
  $perfil_usuario = $_SESSION["perfil_usuario"];
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
if(!empty($_POST)){
  $response = array();
  $clave_actual=$_POST['clave_actual'];
  $nueva_clave=$_POST['nueva_clave'];
  $conf_clave=$_POST['confirmar_clave'];
  $salt='$Lip@cun&';
  $password_encry=md5($salt . $clave_actual);
  //$password_encry=md5($clave_actual);
  $check_Nombre_query="select clave from usuarios WHERE Usuario='$idUsuario' AND Clave='$password_encry'";
  $result_check=$mysqli->query($check_Nombre_query);
  $rows = $result_check->num_rows;

	if ($rows > 0) {
		if ($nueva_clave<>$conf_clave) {
			$response['response'] = "ERROR PRESENTADO - Las Contraseñas no coinciden!";
			$response['type_response'] = 0;
		} else {
			if(strlen($nueva_clave) < 6){
				$response['response'] = "ERROR PRESENTADO  - La Contraseña debe tener mas de 6 caracteres!";
				$response['type_response'] = 0;
			} else {
				if (!preg_match('`[0-9]`',$nueva_clave)){
					$response['response'] = "ERROR PRESENTADO  - La Contraseña debe tener almenos un numero!";
					$response['type_response'] = 0;
				} else {
					$salt='$Lip@cun&';
					$clave_encry=md5($salt . $nueva_clave);
					$query="update usuarios SET Clave = '$clave_encry' WHERE Perfil_Usuario = $perfil_usuario";
					$result=$mysqli->query($query);
					if($result){
						$response['response'] = "Se ha modificado la contraseña exitosamente!";
						$response['type_response'] = 1;
					} else {
						$response['response'] = "ERROR PRESENTADO  - Por favor intente nuevamente, si el problema persiste comuníquese con el administrador del sistema";
						$response['type_response'] = 0;
					}
				}
			}
		}
	} else {
		$response['response'] = "ERROR PRESENTADO - La Contraseña actual no coincide!";
		$response['type_response'] = 0;
	}
}
?>
<script>alert('<?php echo $response['response']; ?>')</script>
<?php if ($response['type_response'] == 0) { ?>
  <script>window.history.back()</script>
<?php }else if ($response['type_response'] == 1) { ?>
  <script>window.open('index.php','_self')</script>
<?php } ?>
</body>
</html>