<?php
  require_once('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
    header("location: ../Administrador/Login.php");
  }

	$id=$_POST['id'];
	$NombreTablabd = $_POST['NombreTablabd'];
	$codigo_sql = $_POST['NombreListado'];

	$sql = "SELECT nombre_listado FROM `listados_eventos` WHERE codigo_sql = '$codigo_sql'";
	$result0=$mysqli->query($sql);
  	$array_listado = $result0->fetch_assoc();
  	$nombre_listado = $array_listado['nombre_listado'];

  	$sql="SELECT id FROM listados_eventos WHERE nombre_listado= '$nombre_listado'";
	$resultado=$mysqli->query($sql);
	$array_listado=$resultado->fetch_assoc();
	$id_listado = $array_listado['id'];
	$_SESSION['id_listado'] = $id_listado;

	$query="SELECT * FROM `$NombreTablabd` WHERE numero_deportista= '$id' AND listado= '$id_listado'";
	$result=$mysqli->query($query);
  	$datos = $result->fetch_assoc();
	echo json_encode($datos);
?>