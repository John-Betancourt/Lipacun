<?php
  require_once('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
    header("location: ../Administrador/Login.php");
  }

	$id=$_POST['id'];

	$query = "SELECT id, nombre, municipio, tipo_evento, fecha_activacion, fecha_evento FROM eventos WHERE id = '$id'";
	$result=$mysqli->query($query);
  	$datos = $result->fetch_assoc();
	$_SESSION['nombre_evento'] = $datos['nombre'];
	echo json_encode($datos);
?>