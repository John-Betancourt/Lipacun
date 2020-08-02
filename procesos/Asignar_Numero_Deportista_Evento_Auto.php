<?php
	require_once('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
		header("location: ../Administrador/Login.php");
	}

	$numero_deportista = 1;
	$Evento = $_REQUEST['Evento'];
	
    $query = "SELECT identificacion_deportista FROM inscripcion_deportistas_eventos_escuelas WHERE evento = '$Evento' ORDER BY club ASC";
    $resultado = $mysqli->query($query);
	while($deportista=$resultado->fetch_assoc()){
		$identificacion=$deportista['identificacion_deportista'];
		//echo $identificacion . "<br>";
		
		$check_identificacion="SELECT * FROM inscripcion_deportistas_eventos_escuelas WHERE evento = '$Evento' AND identificacion_deportista = '$identificacion'";
		$result_check=$mysqli->query($check_identificacion);
		//$rows = $result_check->num_rows;
		$deportista1=$result_check->fetch_assoc();
		$numero = $deportista1['numero_deportista'];
		//echo $rows . "<br>";
		//echo $check_identificacion . "<br>";

		if(!empty($numero)){//Si el deportista ya tiene numero asignado
			/*$deportista1=$result_check->fetch_assoc();
			$deportista_evento = $deportista1['numero_deportista'];//se almacena en varable el numero actual
			$check_evento="SELECT * FROM inscripcion_deportistas_eventos_escuelas WHERE evento = '$Evento' AND numero_deportista = '$deportista_evento'";
			$result_evento=$mysqli->query($check_evento);
			$rows = $result_evento->num_rows;

			if($rows == 0){//se verifica que el deportista no este inscrito en algun evento
				$rows1 = 1;
				while($rows1 > 0){//se verifica que el numero a asignar este disponible
					$check_numero="SELECT * FROM inscripcion_deportistas_eventos_escuelas WHERE evento = '$Evento' AND numero_deportista = '$numero_deportista'";
					$result_numero=$mysqli->query($check_numero);
					$rows1 = $result_numero->num_rows;
					if($rows1 > 0){//si el numero a asignar esta en uso se le suma 1
						$numero_deportista += 1;
					}
				}//se le actualiza el numero
				$query="UPDATE inscripcion_deportistas_eventos_escuelas SET numero_deportista = '$numero_deportista' WHERE evento = '$Evento' AND identificacion_deportista='$identificacion'";
				$result=$mysqli->query($query);
				if($result){*/
					$response['response'] = "Ya se habia asignado el numero de deportista para el evento!";
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
				$check_numero="SELECT * FROM inscripcion_deportistas_eventos_escuelas WHERE evento = '$Evento' AND numero_deportista = '$numero_deportista'";
				$result_numero=$mysqli->query($check_numero);
				$rows1 = $result_numero->num_rows;
				if($rows1 > 0){//si el numero a asignar esta en uso se le suma 1
					$numero_deportista += 1;
				}
			}//se le asigna el numero
			$query="UPDATE inscripcion_deportistas_eventos_escuelas SET numero_deportista = '$numero_deportista' WHERE evento = '$Evento' AND identificacion_deportista = '$identificacion'";
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
<!--script>window.open('Asignar_Numero.php','_self')</script-->
<script>window.history.back()</script>