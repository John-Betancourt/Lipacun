<?php
  require_once('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
    header("location: ../Administrador/Login.php");
  }

	$id=$_POST['id'];
	$listado = $_POST['id_listado'];

	$query="SELECT * FROM `resultados_eventos_competencia_carriles` WHERE numero_deportista= '$id' AND id_listado= '$listado'";
	$result=$mysqli->query($query);
  	$datos = $result->fetch_assoc();
	echo json_encode($datos);
?>