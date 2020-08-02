<?php
	require_once('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
		header("location: ../Administrador/Login.php");
	}

	if(!empty($_POST['Identificacion1'])){
		if(!empty($_POST['numero_deportista1'])){
			//recibir los datos del formulario actualizar numero deportista
			$identificacion=$_POST['Identificacion1'];
			$numero_deportista=$_POST['numero_deportista1'];
			$evento=$_POST['Evento1'];
			
			$check_numero="SELECT * FROM inscripcion_deportistas_eventos_escuelas WHERE evento = '$evento' AND numero_deportista='$numero_deportista'";//Se verifica que el numero no este en uso
			$result_numero=$mysqli->query($check_numero);
			$rows1 = $result_numero->num_rows;
			if($rows1 == 0){
				$query="UPDATE inscripcion_deportistas_eventos_escuelas SET numero_deportista= '$numero_deportista' WHERE evento = '$evento' AND identificacion_deportista= '$identificacion'";
				$result=$mysqli->query($query);
				if($result){
					echo 1; //Se ha actualizado el numero deportista exitosamente!
				} else {
					echo $query; //ERROR PRESENTADO  - No se ha podido actualizar el numero de deportista, por favor intente nuevamente
				}
			}else{
				echo 2; //ERROR PRESENTADO - El numero de deportista ingresado ya esta en uso.
			}
		}else{
			echo 11;//Si falta el numero de deportista
		}
	}
?>