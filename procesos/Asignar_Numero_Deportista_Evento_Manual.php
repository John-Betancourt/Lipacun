<?php
	require_once('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
		header("location: ../Administrador/Login.php");
	}

	if(!empty($_POST['Identificacion'])){
		if(!empty($_POST['numero_deportista'])){
			//recibir los datos del formulario asignar numero deportista escuelas
			$identificacion = $_POST['Identificacion'];
			$numero_deportista = $_POST['numero_deportista'];
			
			$check_identificacion = "SELECT * FROM deportistas WHERE estado = 1 AND identificacion = '$identificacion'";
			$result_check = $mysqli->query($check_identificacion);
			$rows = $result_check->num_rows;
			if($rows > 0){//Si existe
				$check_identificacion = "SELECT * FROM deportistas WHERE identificacion = '$identificacion' AND tipo_patin = 1 OR identificacion = '$identificacion' AND tipo_patin = 2";
				$result_check = $mysqli->query($check_identificacion);
				$rows = $result_check->num_rows;
				if($rows > 0){//Si tiene tipo de patin avanzado
					$check_numero = "SELECT * FROM inscripcion_deportistas_eventos_escuelas WHERE identificacion_deportista = '$identificacion'";
					$result_numero = $mysqli->query($check_numero);
					$rows1 = $result_numero->num_rows;
					/*$array_numero = $result_check->fetch_assoc();
					$numero = $array_numero['numero_deportista'];*/
					if($rows1 > 0){//si tiene numero --- !empty($numero) ---
						$Evento = $_SESSION['Evento'];
						$check_numero="SELECT * FROM inscripcion_deportistas_eventos_escuelas WHERE numero_deportista = '$numero_deportista' AND evento = '$Evento'";
						$result_numero=$mysqli->query($check_numero);
						$rows1 = $result_numero->num_rows;
						if($rows1 == 0){//Si el numero está disponible
							$sql="UPDATE inscripcion_deportistas_eventos_escuelas SET numero_deportista = '$numero_deportista' WHERE identificacion_deportista = '$identificacion'";
							$result=$mysqli->query($sql);
							if(!$result){
								echo 0; //ERROR PRESENTADO  - No se ha podido asignar el numero de deportista, por favor intente nuevamente
							} else {
								echo 1; //Se ha asignado el numero deportista exitosamente!
							}
						}else{
							echo 2; //ERROR PRESENTADO - El numero de deportista ingresado ya esta en uso.
						}
					}else{
						echo 3; //ERROR PRESENTADO - El deportista ya tiene numero asignado.
					}
				}else{
				echo 4; //ERROR PRESENTADO - El deportista con la identificacion ingresada, no cuemple con los requisitos para la asignación de numero para la temporada.
				}
			}else{
				echo 5; //ERROR PRESENTADO - El numero de identificación ingresado no corresponde a ningun deportista ya registrado, por favor verifiquelo e intente nuevamente.
			}
		}else{
			echo 11;//Si falta el numero de deportista
		}
	}else{
		if(empty($_POST['numero_deportista'])){
			echo 12;//Si faltan ambos campos
		}else{
			echo 22;//Si falta el numero de identificación
		}
	}
?>