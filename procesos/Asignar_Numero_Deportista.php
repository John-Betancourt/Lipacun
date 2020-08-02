<?php
	require_once('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
		header("location: ../Administrador/Login.php");
	}

	if(!empty($_POST['Identificacion'])){
		if(!empty($_POST['numero_deportista'])){
			//recibir los datos del formulario asignar numero deportista
			$identificacion=$_POST['Identificacion'];
			$numero_deportista=$_POST['numero_deportista'];
			
			$check_identificacion="SELECT * FROM deportistas WHERE estado = 1  AND identificacion='$identificacion'";
			$result_check=$mysqli->query($check_identificacion);
			$rows = $result_check->num_rows;
			if($rows > 0){
				$check_identificacion="SELECT * FROM deportistas WHERE estado = 1 AND identificacion='$identificacion' AND tipo_patin = 3";
				$result_check=$mysqli->query($check_identificacion);
				$rows = $result_check->num_rows;
				if($rows > 0){
					$check_numero="SELECT * FROM numero_deportistas WHERE identificacion_deportista='$identificacion'";
					$result_numero=$mysqli->query($check_numero);
					$rows1 = $result_numero->num_rows;
					if($rows1 == 0){
						$check_numero="SELECT * FROM numero_deportistas WHERE numero_deportista='$numero_deportista'";
						$result_numero=$mysqli->query($check_numero);
						$rows1 = $result_numero->num_rows;
						if($rows1 == 0){
							$query="INSERT INTO numero_deportistas(identificacion_deportista, numero_deportista) VALUES ('$identificacion', '$numero_deportista')";
							$result=$mysqli->query($query);
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
				echo 5; //ERROR PRESENTADO - El numero de identificación ingresado no corresponde a ningun deportista ya registrado o esta inactivo, por favor verifiquelo e intente nuevamente.
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