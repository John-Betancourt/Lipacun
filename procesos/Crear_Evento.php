<?php
  require_once('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
    header("location: ../Administrador/Login.php");
  }

	if(!empty($_POST['Nombre'])){
		if(!empty($_POST['Municipio'])){
			if(!empty($_POST['tipo_evento'])){
				if(!empty($_POST['fecha_evento'])){
					//recibir los datos del formulario nueva competencia
					$Nombre=$_POST['Nombre'];
					$Ciudad=$_POST['Municipio'];
					$tipo_evento=$_POST['tipo_evento'];
					$Fecha_activacion=date("Y-m-d");
					$Fecha_evento=$_POST['fecha_evento'];

					$identificar="select * from eventos where nombre='$Nombre'";
					$resultado = $mysqli->query($identificar);
					$rows = $resultado->num_rows;
					if($rows > 0){
						echo 2; //ERROR PRESENTADO - El evento ya se encuentra registrado!
					} else {
						$query = "INSERT INTO eventos(nombre,municipio,tipo_evento,fecha_activacion,fecha_evento) VALUES ('$Nombre','$Ciudad','$tipo_evento','$Fecha_activacion','$Fecha_evento')";
						$result=$mysqli->query($query);
						if($result){
							echo 1; //El evento se ha registrado exitosamente!
						} else {
							echo 0; //ERROR PRESENTADO - No se ha podido registrar el evento
						}
					}
				}else{
					echo 44;
				}
			}else{
				if(!empty($_POST['fecha_evento'])){
					echo 33;
				}
			}
		}else{
			if(!empty($_POST['tipo_evento'])){
				if(!empty($_POST['fecha_evento'])){
					echo 22;
				}
			}
		}
	}else{
		if(!empty($_POST['Municipio'])){
			if(!empty($_POST['tipo_evento'])){
				if(!empty($_POST['fecha_evento'])){
					echo 11;
				}
			}
		}
	}
?>