<?php
  require_once('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
    header("location: ../Administrador/Login.php");
  }

	$id=$_POST['id'];

	$query = "SELECT identificacion_deportista, numero_deportista FROM numero_deportistas WHERE identificacion_deportista = '$id'";
	$result = $mysqli->query($query);
  	$datos = $result->fetch_assoc();
	echo json_encode($datos);
?>