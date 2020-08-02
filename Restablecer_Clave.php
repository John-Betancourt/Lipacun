<?php
  require('clases/conexion_db.php');
?>
<!DOCTYPE html>
<html>
<head>
  <!-- j Query -->
  <script type="text/javascript" src="librerias/jquery.min.js"></script>
  <!-- Bootstrap JS -->
  <script type="text/javascript" src="librerias/bootstrap/bootstrap.min.js"></script>
</head>
<body>
<?php
if(!empty($_POST)){
  $response = array();
  $token=$_REQUEST['Token'];
  $club =$_REQUEST['Club'];
  $nueva_clave=$_POST['nueva_clave'];
  $conf_clave=$_POST['confirmar_clave'];
  
  if ($token !="" or $club !=""){
	  $check_Nombre_query="select * from clubes WHERE nombre_corto_club='$club' AND token='$token'";
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
				$salt='$Lip@cun&';
				$clave_encry=md5($salt . $nueva_clave);
				$query="update clubes SET clave='$clave_encry' WHERE nombre_corto_club='$club'";
				$result=$mysqli->query($query);
				if($result){
					$response['response'] = "Se ha modificado la contraseña exitosamente!";
					$response['type_response'] = 1;
					$query="update clubes SET token = NULL WHERE nombre_corto_club = '$club'";
					$result=$mysqli->query($query);
				}else{
				  $response['response'] = "ERROR PRESENTADO  - Por favor intente nuevamente, si el problema persiste comuníquese con el administrador del sistema";
				  $response['type_response'] = 0;
				}
			}
		}
	  } else {
		$response['response'] = "ERROR PRESENTADO - El enlace está roto o ha expirado!";
		$response['type_response'] = 2;
	  }
  }else{
	  $response['response'] = "ERROR PRESENTADO - El enlace no es valido!";
      $response['type_response'] = 2;
  }
}
?>
<script>alert('<?php echo $response['response']; ?>')</script>
<?php if ($response['type_response'] == 0) { ?>
  <script>window.history.back()</script>
<?php }else { ?>
  <script>window.open('index.php','_self')</script>
<?php } ?>
</body>
</html>