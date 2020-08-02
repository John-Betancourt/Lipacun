<?php
	require_once('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
		header("location: ../Administrador/Login.php");
	}

	if(!empty($_POST['id'])){
		//recibir los datos del validacion clubes para eliminar
		$nombre_corto=$_POST['id'];

		$query="DELETE FROM `clubes` WHERE `nombre_corto_club` = '$nombre_corto'";
		$result=$mysqli->query($query);
		if($result){
			echo 1; //El Club y/o Escuela se ha eliminado correctamente.
		} else {
			echo 0; //ERROR PRESENTADO - No se ha podido eliminar el Club y/o Escuela, por favor intente nuevamente.
		}
	}
?>