<?php
	require('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
		header("location: Login.php");
	}
	$numero_deportista = 1;
	
    $query = "SELECT identificacion FROM deportistas WHERE estado = 1 AND tipo_patin = 3 ORDER BY nombre_corto_club ASC";
    $resultado = $mysqli->query($query);
	while($deportista=$resultado->fetch_assoc()){
		$identificacion=$deportista['identificacion'];
		//echo $identificacion . "<br>";
		
		$check_identificacion="SELECT * FROM numero_deportistas WHERE identificacion_deportista='$identificacion'";
		$result_check=$mysqli->query($check_identificacion);
		$rows = $result_check->num_rows;
		//echo $rows . "<br>";
		//echo $check_identificacion . "<br>";

		if($rows > 0){//Si el deportista ya tiene numero asignado
			/*$deportista1=$result_check->fetch_assoc();
			$deportista_evento = $deportista1['numero_deportista'];//se almacena en varable el numero actual
			$check_evento="SELECT * FROM inscripcion_evento_deportistas WHERE numero_deportista='$deportista_evento'";
			$result_evento=$mysqli->query($check_evento);
			$rows = $result_evento->num_rows;

			if($rows == 0){//se verifica que el deportista no este inscrito en algun evento
				$rows1 = 1;
				while($rows1 > 0){//se verifica que el numero a asignar este disponible
					$check_numero="SELECT * FROM numero_deportistas WHERE numero_deportista='$numero_deportista'";
					$result_numero=$mysqli->query($check_numero);
					$rows1 = $result_numero->num_rows;
					if($rows1 > 0){//si el numero a asignar esta en uso se le suma 1
						$numero_deportista += 1;
					}
				}//se le actualiza el numero
				$query="UPDATE numero_deportistas SET numero_deportista='$numero_deportista' WHERE identificacion_deportista='$identificacion'";
				$result=$mysqli->query($query);
				if($result){*/
					$response['response'] = "Ya habia asignado los numero de deportistas para esta temporada!";
					$response['type_response'] = 1;
					/*$numero_deportista += 1;
				}else{
					$response['response'] = "ERROR PRESENTADO  - Por favor intente nuevamente, si el problema persiste comuníquese con el administrador del sistema";
					$response['type_response'] = 0;
				}
			}*/
		} else {//si el deportista no tiene numero asignado
			$rows1 = 1;
			while($rows1 > 0){//se verifica que el numero a asignar este disponible
				$check_numero="SELECT * FROM numero_deportistas WHERE numero_deportista='$numero_deportista'";
				$result_numero=$mysqli->query($check_numero);
				$rows1 = $result_numero->num_rows;
				if($rows1 > 0){//si el numero a asignar esta en uso se le suma 1
					$numero_deportista += 1;
				}
			}//se le asigna el numero
			$query="INSERT INTO numero_deportistas (identificacion_deportista, numero_deportista) VALUES ('$identificacion', '$numero_deportista')";
			$result=$mysqli->query($query);
			if($result){
			  $response['response'] = "Se ha registrado el numero de deportista exitosamente!";
			  $response['type_response'] = 1;
			  $numero_deportista += 1;
			} else {
			  $response['response'] = "ERROR PRESENTADO - No se ha podido registrar el numero de deportista";
			  $response['type_response'] = 0;
			}
		}
	}
?>
<script>alert('<?php echo $response['response'] ?>')</script>
<script>window.history.back()</script>