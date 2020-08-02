<?php
	require('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
		header("location: ../Administrador/Login.php");
	}

	if(!empty($_POST['evento'])){
		if(!empty($_POST['listado_cri'])){
			$evento = $_POST['evento'];
			$nombre_listado = $_POST['listado_cri'];
			
			$consulta1="SELECT * FROM listados_carriles WHERE evento= '$evento' AND nombre_listado= '$nombre_listado'";
			$resultado1 = $mysqli->query($consulta1);
			//echo $consulta;
			$rows = $resultado1->num_rows;
			if($rows > 0){
				echo 2; //ERROR PRESENTADO - El listado ya se encuentra registrado!
			} else {
				$consulta2="SELECT id FROM listados_eventos WHERE evento= '$evento' AND nombre_listado= '$nombre_listado'";
				$resultado2 = $mysqli->query($consulta2);
				$array_listado=$resultado2->fetch_assoc();
				$id_listado = $array_listado['id'];
				$query = "INSERT INTO listados_carriles(evento, nombre_listado, id_listado_carriles, estado) VALUES ('$evento', '$nombre_listado', '$id_listado', 'Pendiente')";
				$result=$mysqli->query($query);
				if($result){
					echo 1; //El listado se ha guardado exitosamente!
				} else {
					echo 0;//ERROR PRESENTADO -  El listado no se ha podido registrar al evento
				}
			}
		}else{
			echo 3;
		}
	}else{
		echo 4;
	}
?>