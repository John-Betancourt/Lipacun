<?php
	require('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
		header("location: ../Administrador/Login.php");
	}

	if(!empty($_POST['sql']) && !empty($_POST['evento'])){
		$nombre_listado = $_POST['nombre_listado'];
		if($nombre_listado===0){
			echo $nombre_listado;//faltan datos
		}else{
			$evento = $_POST['evento'];

			$consulta="SELECT * FROM listados_eventos WHERE evento='$evento' AND nombre_listado= '$nombre_listado'";
			$resultado = $mysqli->query($consulta);
			//echo $consulta;
			$rows = $resultado->num_rows;
			if($rows > 0){
				echo 2; //ERROR PRESENTADO - El listado ya se encuentra registrado!
			} else {
				$competencia = $_POST['comp'];
				$Tcompetencia = $_POST['tipo_comp'];
				$Oro = $_POST['Oro'];
				$Plata = $_POST['Plata'];
				$Bronce = $_POST['Bronce'];
				$query = "INSERT INTO listados_eventos(evento, nombre_listado, competencia, tipo_competencia, oro, plata, bronce, estado) VALUES ('$evento', '$nombre_listado', '$competencia', '$Tcompetencia', '$Oro', '$Plata', '$Bronce', 'Pendiente')";
				$result=$mysqli->query($query);
				if($result){
					$sql="SELECT id FROM listados_eventos WHERE nombre_listado= '$nombre_listado'";
					$resultado=$mysqli->query($sql);
					$array_listado=$resultado->fetch_assoc();
					$id_listado = $array_listado['id'];
					$codigo_sql = $_POST['sql']." AND listado = '$id_listado'";
					$codigo_sql = addslashes($codigo_sql);
					$query='UPDATE listados_eventos SET codigo_sql = "'.$codigo_sql.'" WHERE id = "'.$id_listado.'"';
					$result=$mysqli->query($query);
					if($result){
						echo 1; //El listado se ha guardado exitosamente!
					}else{
						echo $sql;//ERROR PRESENTADO -  El listado no se ha podido registrar al evento
					}
				} else {
					echo 0;//ERROR PRESENTADO -  El listado no se ha podido registrar al evento
				}
			}
		}
	}
?>