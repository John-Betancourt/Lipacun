<?php
  require_once('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
    header("location: ../Administrador/Login.php");
  }

	$id=$_POST['id'];
	$evento=$_POST['evento'];

	$query = "SELECT evento, identificacion_deportista, numero_deportista FROM inscripcion_deportistas_eventos_escuelas WHERE evento = '$evento' AND identificacion_deportista = '$id'";
	$result = $mysqli->query($query);
	$datos = $result->fetch_assoc();
	echo json_encode($datos);
?>