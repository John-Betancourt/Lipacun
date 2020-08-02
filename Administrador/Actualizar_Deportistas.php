<?php
  require_once('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
    header("location: Login.php");
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
   $identificacion=$_POST['identificacion'];
   $tipo_identificacion=$_POST['tipo_identificacion'];
   $primer_nombre=$_POST['primer_nombre'];
   $segundo_nombre=$_POST['segundo_nombre'];
   $primer_apellido=$_POST['primer_apellido'];
   $segundo_apellido=$_POST['segundo_apellido'];
   $fecha_nacimiento=$_POST['fecha_nacimiento'];
   $tipo_patin=$_POST['tipo_patin'];
   if($tipo_patin=="Semiprofesiona"){
    $tipo_patin=1;
  }else if($tipo_patin=="Profesional No Avanzado"){
    $tipo_patin=2;
  }else if($tipo_patin=="Profesional Avanzado"){
    $tipo_patin=3;
  }
   $rama=$_POST['rama'];
   $ligado=$_POST['ligado'];
   $fecha_afiliacion=$_POST['fecha_afiliacion'];
   $fecha_renovacion=$_POST['fecha_renovacion'];

			$query="UPDATE deportistas SET primer_nombre='$primer_nombre', segundo_nombre= '$segundo_nombre',
			primer_apellido='$primer_apellido', segundo_apellido='$segundo_apellido', fecha_nacimiento='$fecha_nacimiento',
			tipo_patin='$tipo_patin', rama='$rama', ligado='$ligado', fecha_afiliacion='$fecha_afiliacion', fecha_renovacion='$fecha_renovacion' 
      WHERE identificacion='$identificacion'";
      //echo $query;
			$result=$mysqli->query($query);
			if($result){
				$response['response'] = "Se ha actualizado la información del club satisfactoriamente!";
				$response['type_response'] = 1;
			} else {
				$response['response'] = "ERROR PRESENTADO  - Por favor intente nuevamente";
				$response['type_response'] = 0;
			}
		
	}

?>
<script>alert('<?php echo $response['response']; ?>')</script>
<?php if ($response['type_response'] == 0) { ?>
  <script>window.history.back()</script>
<?php }else if ($response['type_response'] == 1) { ?>
  <script>window.history.back()</script>
<?php } ?>
</body>
</html>