<?php
	require('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["nombre_corto"]==""){
	header("location: ../Login.php");
	}

	if(!empty($_POST['id'])){
		
		$Evento = $_POST['id'];
		$Club = $_SESSION['nombre_corto'];

		$consulta="SELECT * FROM inscripcion_evento_clubes WHERE evento='$Evento' AND club='$Club'";
		$resultado = $mysqli->query($consulta);
		$rows = $resultado->num_rows;
		if($rows > 0){
			echo 2; //ERROR PRESENTADO - El Club ya se encuentra registrado al evento!
		} else {
			$query = "INSERT INTO inscripcion_evento_clubes(evento,club) VALUES ('$Evento','$Club')";
			$result=$mysqli->query($query);
			if($result){
				echo 1; //El club se ha registrado al evento exitosamente!
			} else {
				echo 0;//ERROR PRESENTADO -  El club no se ha podido registrar al evento
			}
		}
	}
?>