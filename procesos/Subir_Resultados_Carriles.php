<?php
	require_once('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
		header("location: ../Administrador/Login.php");
	}

	if(!empty($_POST['numero_deportista']) or !empty($_POST['nombres']) or !empty($_POST['tipo_patin'])){
		//recibir los datos del formulario subir resultados
		$id_listado = $_SESSION['id'];
		$etapa_carriles = $_POST['fase'];
		$numero_deportista=$_POST['numero_deportista'];
		$nombre=$_POST['nombres'];
		$tipo_patin=$_POST['tipo_patin'];
		
		if($etapa_carriles=="Octavos"){
			/****************************************************************************************
											- COMPETENCIA REMATES - 
			****************************************************************************************/
			$observacion=$_POST['Observacion'];
			if(empty($_POST['segundos']) or empty($_POST['milisegundos'])){
				if($observacion!=0){
					if($observacion==1){
						$query="UPDATE resultados_eventos_competencia_carriles SET  observacion= 'NT', miliseg_octavos= '999999999999996'   WHERE numero_deportista='$numero_deportista' AND id_listado= '$id_listado'";
					}else if($observacion==2){
						$query="UPDATE resultados_eventos_competencia_carriles SET  observacion= 'DQST', miliseg_octavos= '999999999999997' WHERE numero_deportista='$numero_deportista' AND id_listado= '$id_listado'";
					}else if($observacion==3){
						$query="UPDATE resultados_eventos_competencia_carriles SET  observacion= 'DQSD', miliseg_octavos= '999999999999998' WHERE numero_deportista='$numero_deportista' AND id_listado= '$id_listado'";
					}
					$result=$mysqli->query($query) or die($mysqli->error);
					if($result){
						echo 1; //Se ha guardado los resultados!
					} else {
						echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
					}
				}else{
					echo 2;
				}
			}else{
				if($observacion!=0){
					echo 4;
				}else{
					if(!empty($_POST['minutos'])){
						$minutos=$_POST['minutos'];
					}else{
						$minutos=0;
					}

					$segundos = $_POST['segundos'];
					$miliseg = $_POST['milisegundos'];

					$tiempo = $minutos .":". $segundos .":". $miliseg;
					$tiempo_mil = ($minutos * 60000) + ($segundos * 1000) + $miliseg;

					$query="UPDATE resultados_eventos_competencia_carriles SET tiempo_octavos='$tiempo', miliseg_octavos='$tiempo_mil' WHERE numero_deportista='$numero_deportista' AND id_listado= '$id_listado'";
					$result=$mysqli->query($query);
					
					if($result){
						echo 1; //Se ha guardado los resultados!
					} else {
						echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
					}
				}
			}
	}else if($etapa_carriles=="Cuartos"){
		/****************************************************************************************
											- COMPETENCIA REMATES - 
		****************************************************************************************/
			$observacion=$_POST['Observacion'];
			if(empty($_POST['segundos']) or empty($_POST['milisegundos'])){
				if($observacion!=0){
					if($observacion==1){
						$query="UPDATE resultados_eventos_competencia_carriles SET  observacion= 'NT', miliseg_cuartos= '999999999999996'   WHERE numero_deportista='$numero_deportista' AND id_listado= '$id_listado'";
					}else if($observacion==2){
						$query="UPDATE resultados_eventos_competencia_carriles SET  observacion= 'DQST', miliseg_cuartos= '999999999999997' WHERE numero_deportista='$numero_deportista' AND id_listado= '$id_listado'";
					}else if($observacion==3){
						$query="UPDATE resultados_eventos_competencia_carriles SET  observacion= 'DQSD', miliseg_cuartos= '999999999999998' WHERE numero_deportista='$numero_deportista' AND id_listado= '$id_listado'";
					}
					$result=$mysqli->query($query) or die($mysqli->error);
					if($result){
						echo 1; //Se ha guardado los resultados!
					} else {
						echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
					}
				}else{
					echo 2;
				}
			}else{
				if($observacion!=0){
					echo 4;
				}else{
					if(!empty($_POST['minutos'])){
						$minutos=$_POST['minutos'];
					}else{
						$minutos=0;
					}

					$segundos = $_POST['segundos'];
					$miliseg = $_POST['milisegundos'];

					$tiempo = $minutos .":". $segundos .":". $miliseg;
					$tiempo_mil = ($minutos * 60000) + ($segundos * 1000) + $miliseg;

					$query="UPDATE resultados_eventos_competencia_carriles SET tiempo_cuartos='$tiempo', miliseg_cuartos='$tiempo_mil' WHERE numero_deportista='$numero_deportista' AND id_listado= '$id_listado'";
					$result=$mysqli->query($query);
					
					if($result){
						echo 1; //Se ha guardado los resultados!
					} else {
						echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
					}
				}
			}
		
	}else if($etapa_carriles=="Semifinal"){
		/****************************************************************************************
											- COMPETENCIA REMATES - 
		****************************************************************************************/
			$observacion=$_POST['Observacion'];
			if(empty($_POST['segundos']) or empty($_POST['milisegundos'])){
				if($observacion!=0){
					if($observacion==1){
						$query="UPDATE resultados_eventos_competencia_carriles SET  observacion= 'NT', miliseg_semifinal= '999999999999996', miliseg_final = '999999999999996' WHERE numero_deportista='$numero_deportista' AND id_listado= '$id_listado'";
					}else if($observacion==2){
						$query="UPDATE resultados_eventos_competencia_carriles SET  observacion= 'DQST', miliseg_semifinal= '999999999999997', miliseg_final = '999999999999997' WHERE numero_deportista='$numero_deportista' AND id_listado= '$id_listado'";
					}else if($observacion==3){
						$query="UPDATE resultados_eventos_competencia_carriles SET  observacion= 'DQSD', miliseg_semifinal= '999999999999998', miliseg_final = '99999999999999' WHERE numero_deportista='$numero_deportista' AND id_listado= '$id_listado'";
					}
					$result=$mysqli->query($query) or die($mysqli->error);
					if($result){
						echo 1; //Se ha guardado los resultados!
					} else {
						echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
					}
				}else{
					echo 2;
				}
			}else{
				if($observacion!=0){
					echo 4;
				}else{
					if(!empty($_POST['minutos'])){
						$minutos=$_POST['minutos'];
					}else{
						$minutos=0;
					}

					$segundos = $_POST['segundos'];
					$miliseg = $_POST['milisegundos'];

					$tiempo = $minutos .":". $segundos .":". $miliseg;
					$tiempo_mil = ($minutos * 60000) + ($segundos * 1000) + $miliseg;

					$query="UPDATE resultados_eventos_competencia_carriles SET tiempo_semifinal='$tiempo', miliseg_semifinal='$tiempo_mil' WHERE numero_deportista='$numero_deportista' AND id_listado= '$id_listado'";
					$result=$mysqli->query($query);
					
					if($result){
						echo 1; //Se ha guardado los resultados!
					} else {
						echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
					}
				}
			}
			
	}else if($etapa_carriles=="Final"){
		/****************************************************************************************
											- COMPETENCIA REMATES - 
		****************************************************************************************/
			$observacion=$_POST['Observacion'];
			if(empty($_POST['segundos']) or empty($_POST['milisegundos'])){
				if($observacion!=0){
					if($observacion==1){
						$query="UPDATE resultados_eventos_competencia_carriles SET  observacion= 'NT', miliseg_final= '999999999999996'   WHERE numero_deportista='$numero_deportista' AND id_listado= '$id_listado'";
					}else if($observacion==2){
						$query="UPDATE resultados_eventos_competencia_carriles SET  observacion= 'DQST', miliseg_final= '999999999999997' WHERE numero_deportista='$numero_deportista' AND id_listado= '$id_listado'";
					}else if($observacion==3){
						$query="UPDATE resultados_eventos_competencia_carriles SET  observacion= 'DQSD', miliseg_final= '999999999999998' WHERE numero_deportista='$numero_deportista' AND id_listado= '$id_listado'";
					}
					$result=$mysqli->query($query) or die($mysqli->error);
					if($result){
						echo 1; //Se ha guardado los resultados!
					} else {
						echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
					}
				}else{
					echo 2;
				}
			}else{
				if($observacion!=0){
					echo 4;
				}else{
					if(!empty($_POST['minutos'])){
						$minutos=$_POST['minutos'];
					}else{
						$minutos=0;
					}

					$segundos = $_POST['segundos'];
					$miliseg = $_POST['milisegundos'];

					$tiempo = $minutos .":". $segundos .":". $miliseg;
					$tiempo_mil = ($minutos * 60000) + ($segundos * 1000) + $miliseg;

					$query="UPDATE resultados_eventos_competencia_carriles SET tiempo_final='$tiempo', miliseg_final='$tiempo_mil' WHERE numero_deportista='$numero_deportista' AND id_listado= '$id_listado'";
					$result=$mysqli->query($query);
					
					if($result){
						echo 1; //Se ha guardado los resultados!
					} else {
						echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
					}
				}
			}	
	}
	}else{
		echo 22;//el formulario esta vacio
	}
?>