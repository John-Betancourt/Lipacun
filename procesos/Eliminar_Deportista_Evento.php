<?php
	require('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["nombre_corto"]==""){
	header("location: ../Login.php");
	}

	if(!empty($_POST)){
		$Evento = $_SESSION['Evento'];
		$nombres = $_POST['id'];
		$numero_deportista= $_POST['id'];

		$sql = "SELECT tipo_evento FROM eventos WHERE nombre = '$Evento'";
		$resultado=$mysqli->query($sql);
		$array_tipo_evento=$resultado->fetch_assoc();
		$Tipo_Evento = $array_tipo_evento['tipo_evento'];
		if($Tipo_Evento=="Ranking"){
			$query="DELETE FROM inscripcion_deportistas_eventos_ranking WHERE evento = '$Evento' AND numero_deportista='$numero_deportista'";
		}else if($Tipo_Evento=="Escuelas"){
			$query="DELETE FROM inscripcion_deportistas_eventos_escuelas WHERE evento = '$Evento' AND nombres='$nombres'";
		}
		$result=$mysqli->query($query);
		if ($result) {
			echo 1; //El deportista con el numero $numero_deportista se ha eliminado del evento correctamente.
		} else {
			echo 0; //ERROR PRESENTADO - No se ha podido eliminar el deportista del evento, por favor intente nuevamente.
		}
	}
?>