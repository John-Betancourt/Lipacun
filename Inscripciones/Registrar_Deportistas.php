<?php
  require_once('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["nombre_corto"]==""){
    header("location: ../Login.php");
  }

  $idUsuario = $_SESSION['nombre_corto'];
  $sql = "Select * FROM clubes WHERE nombre_corto_club='$idUsuario'";
  $result=$mysqli->query($sql);
  $row = $result->fetch_assoc();
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
    $tipo_identificacion=$_POST['identificacion'];
	$identificacion=$_POST['CC'];
    $primer_nombre=$_POST['Nom1'];
    if($_POST['Nom2']===""){
      $segundo_nombre="";
    }else{
      $segundo_nombre=$_POST['Nom2'];
    }
    $primer_apellido=$_POST['Ape1'];
    if($_POST["Ape2"]=="N/A"){
		$segundo_apellido="";
	}else{
		$segundo_apellido=$_POST["Ape2"];
	}
    $nombre_corto_club=$_POST['Nombre_corto'];
    $fecha_nacimiento=$_POST['Nacimiento'];
    $tipo_patin=$_POST['Patin'];
    $edad=$_POST['Edad'];
    $rama=$_POST['Rama'];
	if($_POST['liga']===""){
		$ligado=2;
	}else{
		$ligado=$_POST['liga'];	
	}
	$departamento = $_POST['departamento'];
	$fecha_afiliacion=$_POST['Fecha_afiliacion'];
	$fecha_renovacion=$_POST['Fecha_renovacion'];
	$fecha_inscripcion=date("Y-m-d");
  	$fecha_estado = date("Y-m-d");
	$estado=1;
	
	if($edad >=5 and $edad <=6){
		$categoria= 1;
	}elseif($edad >=7 and $edad <=8){
		$categoria=2;
	}elseif($edad >=9 and $edad <=10){
		$categoria=3;
	}elseif($edad >=11 and $edad <=12){
		$categoria=4;
	}elseif($edad >=13 and $edad <=14){
		$categoria=5;
	}elseif($edad >=15){
		$categoria=6;
	}

    $check_identificacion_query="select * from deportistas where identificacion='$identificacion'";
    $result_check=$mysqli->query($check_identificacion_query);
    $rows = $result_check->num_rows;

    if($rows > 0){
		$check_club_query="select * from deportistas where identificacion='$identificacion' and nombre_corto_club = '$nombre_corto_club'";
		$result_check=$mysqli->query($check_club_query);
		$rows1 = $result_check->num_rows;
		if($rows1 > 0){
			$response['response'] = "ERROR PRESENTADO - El deportista ya se encuentra registrado!";
			$response['type_response'] = 0;
    	}else{
			$response['response'] = "ERROR PRESENTADO - El deportista ya se encuentra registrado en otro club!";
			$response['type_response'] = 0;
		}
    } else {
		if($ligado == 1){
			$query="insert INTO deportistas(tipo_identificacion, identificacion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, Nombre_corto_club, fecha_nacimiento, tipo_patin, edad, categoria, rama, ligado, departamento, fecha_afiliacion, fecha_renovacion, fecha_inscripcion, fecha_estado, estado) VALUES ('$tipo_identificacion', '$identificacion', '$primer_nombre', '$segundo_nombre', '$primer_apellido', '$segundo_apellido', '$nombre_corto_club', '$fecha_nacimiento', '$tipo_patin', '$edad', '$categoria', '$rama', '$ligado','$departamento', '$fecha_afiliacion', '$fecha_renovacion', '$fecha_inscripcion', '$fecha_estado', '$estado')";
		}else {
			$query="insert INTO deportistas(tipo_identificacion, identificacion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, Nombre_corto_club, fecha_nacimiento, tipo_patin, edad, categoria, rama, ligado, departamento, fecha_inscripcion, fecha_estado, estado) VALUES ('$tipo_identificacion', '$identificacion', '$primer_nombre', '$segundo_nombre', '$primer_apellido', '$segundo_apellido', '$nombre_corto_club', '$fecha_nacimiento', '$tipo_patin', '$edad', '$categoria', '$rama', '$ligado','$departamento', '$fecha_inscripcion', '$fecha_estado', '$estado')";
		}
        $result=$mysqli->query($query);
        if($result){
          $response['response'] = "Se ha registrado el deportista exitosamente!";
          $response['type_response'] = 1;
        } else {
          $response['response'] = "ERROR PRESENTADO - No se ha podido registrar el deportista";
          $response['type_response'] = 0;
        }
      }
	
	if ($response['type_response'] == 0){ ?>
		<script>alert('<?php echo $response['response']; ?>')</script><script>window.history.back()</script>
	<?php }else{ ?>
		<script>alert('<?php echo $response['response']; ?>')</script><script>window.open('../Plataforma','_self')</script>
	<?php } ?>
	
</body>
</html>
