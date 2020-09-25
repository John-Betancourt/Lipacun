<?php
	require_once('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
		header("location: ../Administrador/Login.php");
	}

	if(!empty($_POST['id'])){
		//recibir los datos de administracion de deportistas
		$identificacion=$_POST['id'];
		$fecha_estado= date("Y-m-d");
    	$baja	  = 4;

		$query="UPDATE `deportistas` SET `fecha_estado` = '$fecha_estado', `estado` = '$baja' WHERE `identificacion` = '$identificacion'";
		$result=$mysqli->query($query);
		if($result){
			echo 1; //Se ha dado de baja al deportista del Club y/o Escuela correctamente.
		} else {
			echo 0; //ERROR PRESENTADO - No se ha podido dar de baja al deportista de Club y/o Escuela, por favor intente nuevamente.
		}
	}
?>