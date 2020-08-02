<?php
require_once('../clases/conexion_db.php');
session_start();

if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
	header("location: ../Administrador/Login.php");
}

$id_listado = $_POST['id_listado'];
$etapa_carriles = $_POST['fase'];

if($etapa_carriles==="Octavos"){
	$consulta = "SELECT COUNT(*) cantidad FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' AND miliseg_octavos != 'NULL'";
	$result1 = $mysqli->query($consulta)  or die($mysqli->error);
	$counts = $result1->fetch_assoc();
	$count = $counts['cantidad'];
	if($count<16){
		echo "NULL";
	}else{
		/********************************************************************************************

										DEPORTISTA 1 Y 9
		********************************************************************************************/
		$sql1 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_octavos = 1";
		$consulta1 = $mysqli->query($sql1);
		$resultado1 = $consulta1->fetch_assoc();

		$miliseg_deportista1 = $resultado1['miliseg_octavos'];

		if($miliseg_deportista==NULL){
			$resultado = "NULL";
		}

		$sql2 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_octavos = 9";
		$consulta2 = $mysqli->query($sql2);
		$resultado2 = $consulta2->fetch_assoc();

		$miliseg_deportista9 = $resultado2['miliseg_octavos'];	

		if($miliseg_deportista1 < $miliseg_deportista9){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_octavos = CASE posicion_octavos WHEN 1 THEN '$miliseg_deportista1' WHEN 9 THEN 'Eliminado'  END WHERE posicion_octavos IN (1,9) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);

		}else if ($miliseg_deportista1 > $miliseg_deportista9){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_octavos = CASE posicion_octavos WHEN 1 THEN 'Eliminado' WHEN 9 THEN '$miliseg_deportista9'  END WHERE posicion_octavos IN (1,9) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);
		}		

		/********************************************************************************************

										DEPORTISTA 2 Y 10
		********************************************************************************************/

		$sql3 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_octavos = 2";
		$consulta3 = $mysqli->query($sql3);
		$resultado3 = $consulta3->fetch_assoc();

		$tiempo_deportista2 = $resultado3['miliseg_octavos'];

		$sql4 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_octavos = 10";
		$consulta4 = $mysqli->query($sql4);
		$resultado4 = $consulta4->fetch_assoc();

		$tiempo_deportista10 = $resultado4['miliseg_octavos'];	

		if($tiempo_deportista2 < $tiempo_deportista10){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_octavos = CASE posicion_octavos WHEN 2 THEN '$tiempo_deportista2' WHEN 10 THEN 'Eliminado'  END WHERE posicion_octavos IN (2,10) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);

		}else if ($tiempo_deportista2 > $tiempo_deportista10){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_octavos = CASE posicion_octavos WHEN 2 THEN 'Eliminado' WHEN 10 THEN '$tiempo_deportista10'  END WHERE posicion_octavos IN (2,10) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);
		}		

		/********************************************************************************************

										DEPORTISTA 3 Y 11
		********************************************************************************************/

		$sql5 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_octavos = 3";
		$consulta5 = $mysqli->query($sql5);
		$resultado5 = $consulta5->fetch_assoc();

		$tiempo_deportista3 = $resultado5['miliseg_octavos'];

		$sql6 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_octavos = 11";
		$consulta6 = $mysqli->query($sql6);
		$resultado6 = $consulta6->fetch_assoc();

		$tiempo_deportista11 = $resultado6['miliseg_octavos'];	

		if($tiempo_deportista3 < $tiempo_deportista11){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_octavos = CASE posicion_octavos WHEN 3 THEN '$tiempo_deportista3' WHEN 11 THEN 'Eliminado'  END WHERE posicion_octavos IN (3,11) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);

		}else if ($tiempo_deportista3 > $tiempo_deportista11){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_octavos = CASE posicion_octavos WHEN 3 THEN 'Eliminado' WHEN 11 THEN '$tiempo_deportista11'  END WHERE posicion_octavos IN (3,11) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);
		}

		/********************************************************************************************

										DEPORTISTA 4 Y 12
		********************************************************************************************/

		$sql7 = "SELECT * FROM resultados_eventos_competencia_carriles  WHERE id_listado = '$id_listado' 
		AND posicion_octavos = 4";
		$consulta7 = $mysqli->query($sql7);
		$resultado7 = $consulta7->fetch_assoc();

		$tiempo_deportista4 = $resultado7['miliseg_octavos'];

		$sql8 = "SELECT * FROM resultados_eventos_competencia_carriles  WHERE id_listado = '$id_listado' 
		AND posicion_octavos = 12";
		$consulta8 = $mysqli->query($sql8);
		$resultado8 = $consulta8->fetch_assoc();

		$tiempo_deportista12 = $resultado8['miliseg_octavos'];	

		if($tiempo_deportista4 < $tiempo_deportista12){
			$query = "UPDATE resultados_eventos_competencia_carriles  SET resultados_octavos = CASE posicion_octavos WHEN 4 THEN '$tiempo_deportista4' WHEN 12 THEN 'Eliminado'  END WHERE posicion_octavos IN (4,12) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);

		}else if ($tiempo_deportista4 > $tiempo_deportista12){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_octavos = CASE posicion_octavos WHEN 4 THEN 'Eliminado' WHEN 12 THEN '$tiempo_deportista12'  END WHERE posicion_octavos IN (4,12) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);
		}

		/********************************************************************************************

										DEPORTISTA 5 Y 13
		********************************************************************************************/

		$sql9 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_octavos = 5";
		$consulta9 = $mysqli->query($sql9);
		$resultado9 = $consulta9->fetch_assoc();

		$tiempo_deportista5 = $resultado9['miliseg_octavos'];

		$sql10 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_octavos = 13";
		$consulta10 = $mysqli->query($sql10);
		$resultado10 = $consulta10->fetch_assoc();

		$tiempo_deportista13 = $resultado10['miliseg_octavos'];	

		if($tiempo_deportista5 < $tiempo_deportista13){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_octavos = CASE posicion_octavos WHEN 5 THEN '$tiempo_deportista5' WHEN 13 THEN 'Eliminado'  END WHERE posicion_octavos IN (5,13) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);

		}else if ($tiempo_deportista5 > $tiempo_deportista13){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_octavos = CASE posicion_octavos WHEN 5 THEN 'Eliminado' WHEN 13 THEN '$tiempo_deportista13'  END WHERE posicion_octavos IN (5,13) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);
		}

		/********************************************************************************************

										DEPORTISTA 6 Y 14
		********************************************************************************************/

		$sql11 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_octavos = 6";
		$consulta11 = $mysqli->query($sql11);
		$resultado11 = $consulta11->fetch_assoc();

		$tiempo_deportista6 = $resultado11['miliseg_octavos'];

		$sql12 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_octavos = 14";
		$consulta12 = $mysqli->query($sql12);
		$resultado12 = $consulta12->fetch_assoc();

		$tiempo_deportista14 = $resultado12['miliseg_octavos'];

		if($tiempo_deportista6 < $tiempo_deportista14){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_octavos = CASE posicion_octavos WHEN 6 THEN '$tiempo_deportista6' WHEN 14 THEN 'Eliminado'  END WHERE posicion_octavos IN (6,14) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);

		}else if ($tiempo_deportista6 > $tiempo_deportista14){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_octavos = CASE posicion_octavos WHEN 6 THEN 'Eliminado' WHEN 14 THEN '$tiempo_deportista14'  END WHERE posicion_octavos IN (6,14) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);
		}

		/********************************************************************************************

										DEPORTISTA 7 Y 15
		********************************************************************************************/

		$sql13 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_octavos = 7";
		$consulta13 = $mysqli->query($sql13);
		$resultado13 = $consulta13->fetch_assoc();

		$tiempo_deportista7 = $resultado13['miliseg_octavos'];

		$sql14 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_octavos = 15";
		$consulta14 = $mysqli->query($sql14);
		$resultado14 = $consulta14->fetch_assoc();

		$tiempo_deportista15 = $resultado14['miliseg_octavos'];

		if($tiempo_deportista7 < $tiempo_deportista15){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_octavos = CASE posicion_octavos WHEN 7 THEN '$tiempo_deportista7' WHEN 15 THEN 'Eliminado'  END WHERE posicion_octavos IN (7,15) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);

		}else if ($tiempo_deportista7 > $tiempo_deportista15){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_octavos = CASE posicion_octavos WHEN 7 THEN 'Eliminado' WHEN 15 THEN '$tiempo_deportista15'  END WHERE posicion_octavos IN (7,15) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);
		}

		/********************************************************************************************

										DEPORTISTA 8 Y 16
		********************************************************************************************/

		$sql15 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_octavos = 8";
		$consulta15 = $mysqli->query($sql15);
		$resultado15 = $consulta15->fetch_assoc();

		$tiempo_deportista8 = $resultado15['miliseg_octavos'];

		$sql16 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_octavos = 16";
		$consulta16 = $mysqli->query($sql16);
		$resultado16 = $consulta16->fetch_assoc();

		$tiempo_deportista16 = $resultado16['miliseg_octavos'];

		if($tiempo_deportista8 < $tiempo_deportista16){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_octavos = CASE posicion_octavos WHEN 8 THEN '$tiempo_deportista8' WHEN 16 THEN 'Eliminado'  END WHERE posicion_octavos IN (8,16) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);

		}else if ($tiempo_deportista8 > $tiempo_deportista16){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_octavos = CASE posicion_octavos WHEN 8 THEN 'Eliminado' WHEN 16 THEN '$tiempo_deportista16'  END WHERE posicion_octavos IN (8,16) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);
		}

		$consultad ="SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' AND resultados_octavos != 'Eliminado' ORDER BY `resultados_octavos` ASC";
		$resultado=$mysqli->query($consultad) or die($mysqli->error);

		$No = 1;
		while($row=mysqli_fetch_array($resultado)){
			if($No <= 8){
				$numero_deportista = $row['numero_deportista'];
				$actualizar = "UPDATE resultados_eventos_competencia_carriles SET posicion_cuartos = '$No' WHERE numero_deportista ='$numero_deportista'";
				$resp=$mysqli->query($actualizar);
				if(!$resp){
					echo "ERROR"; //ERROR PRESENTADO  - Por favor intente nuevamente
				}
			}
			$No += 1;
		}
		echo $id_listado;
	}
}else if($etapa_carriles==="Cuartos"){

	$consulta = "SELECT COUNT(*) cantidad FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' AND miliseg_cuartos != 'NULL'";
	$result1 = $mysqli->query($consulta)  or die($mysqli->error);
	$counts = $result1->fetch_assoc();
	$count = $counts['cantidad'];
	if($count<8){
		echo "NULL";
	}else{
		/********************************************************************************************

										DEPORTISTA 1 Y 5
		********************************************************************************************/
		$sql1 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_cuartos = 1";
		$consulta1 = $mysqli->query($sql1);
		$resultado1 = $consulta1->fetch_assoc();

		$miliseg_deportista1 = $resultado1['miliseg_cuartos'];

		$sql2 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_cuartos = 5";
		$consulta2 = $mysqli->query($sql2);
		$resultado2 = $consulta2->fetch_assoc();

		$miliseg_deportista5 = $resultado2['miliseg_cuartos'];	

		if($miliseg_deportista1 < $miliseg_deportista5){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_cuartos = CASE posicion_cuartos WHEN 1 THEN '$miliseg_deportista1' WHEN 5 THEN 'Eliminado'  END WHERE posicion_cuartos IN (1,5) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);

		}else if ($miliseg_deportista1 > $miliseg_deportista5){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_cuartos = CASE posicion_cuartos WHEN 1 THEN 'Eliminado' WHEN 5 THEN '$miliseg_deportista5'  END WHERE posicion_cuartos IN (1,5) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);
		}

		/********************************************************************************************

										DEPORTISTA 2 Y 6
		********************************************************************************************/

		$sql3 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_cuartos = 2";
		$consulta3 = $mysqli->query($sql3);
		$resultado3 = $consulta3->fetch_assoc();

		$tiempo_deportista2 = $resultado3['miliseg_cuartos'];

		$sql4 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_cuartos = 6";
		$consulta4 = $mysqli->query($sql4);
		$resultado4 = $consulta4->fetch_assoc();

		$tiempo_deportista6 = $resultado4['miliseg_cuartos'];	

		if($tiempo_deportista2 < $tiempo_deportista6){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_cuartos = CASE posicion_cuartos WHEN 2 THEN '$tiempo_deportista2' WHEN 6 THEN 'Eliminado'  END WHERE posicion_cuartos IN (2,6) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);

		}else if ($tiempo_deportista2 > $tiempo_deportista6){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_cuartos = CASE posicion_cuartos WHEN 2 THEN 'Eliminado' WHEN 6 THEN '$tiempo_deportista6'  END WHERE posicion_cuartos IN (2,6) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);
		}		

		/********************************************************************************************

										DEPORTISTA 3 Y 7
		********************************************************************************************/

		$sql5 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_cuartos = 3";
		$consulta5 = $mysqli->query($sql5);
		$resultado5 = $consulta5->fetch_assoc();

		$tiempo_deportista3 = $resultado5['miliseg_cuartos'];


		$sql6 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_cuartos = 7";
		$consulta6 = $mysqli->query($sql6);
		$resultado6 = $consulta6->fetch_assoc();

		$tiempo_deportista7 = $resultado6['miliseg_cuartos'];


		if($tiempo_deportista3 < $tiempo_deportista7){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_cuartos = CASE posicion_cuartos WHEN 3 THEN '$tiempo_deportista3' WHEN 7 THEN 'Eliminado'  END WHERE posicion_cuartos IN (3,7) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);

		}else if ($tiempo_deportista3 > $tiempo_deportista7){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_cuartos = CASE posicion_cuartos WHEN 3 THEN 'Eliminado' WHEN 7 THEN '$tiempo_deportista7'  END WHERE posicion_cuartos IN (3,7) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);
		}

		/********************************************************************************************

										DEPORTISTA 4 Y 8
		********************************************************************************************/

		$sql7 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_cuartos = 4";
		$consulta7 = $mysqli->query($sql7);
		$resultado7 = $consulta7->fetch_assoc();

		$tiempo_deportista4 = $resultado7['miliseg_cuartos'];

		$sql8 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_cuartos = 8";
		$consulta8 = $mysqli->query($sql8);
		$resultado8 = $consulta8->fetch_assoc();

		$tiempo_deportista8 = $resultado8['miliseg_cuartos'];	

		if($tiempo_deportista4 < $tiempo_deportista8){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_cuartos = CASE posicion_cuartos WHEN 4 THEN '$tiempo_deportista4' WHEN 8 THEN 'Eliminado'  END WHERE posicion_cuartos IN (4,8) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);

		}else if ($tiempo_deportista4 > $tiempo_deportista8){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_cuartos = CASE posicion_cuartos WHEN 4 THEN 'Eliminado' WHEN 8 THEN '$tiempo_deportista8'  END WHERE posicion_cuartos IN (4,8) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);
		}

		$consultad ="SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' AND resultados_cuartos != 'Eliminado' ORDER BY `resultados_cuartos` ASC";
		$resultado=$mysqli->query($consultad) or die($mysqli->error);

		$No = 1;
		while($row=mysqli_fetch_array($resultado)){
			if($No <= 4){
				$numero_deportista = $row['numero_deportista'];
				$actualizar = "UPDATE resultados_eventos_competencia_carriles SET posicion_semifinal = '$No' WHERE numero_deportista ='$numero_deportista'";
				$resp=$mysqli->query($actualizar);
				if(!$resp){
					echo "ERROR"; //ERROR PRESENTADO  - Por favor intente nuevamente
				}
			}
			$No += 1;
		}
		echo $id_listado;
	}
}else if($etapa_carriles==="Semifinal"){

	$consulta = "SELECT COUNT(*) cantidad FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' AND miliseg_semifinal != 'NULL'";
	$result1 = $mysqli->query($consulta)  or die($mysqli->error);
	$counts = $result1->fetch_assoc();
	$count = $counts['cantidad'];
	if($count<4){
		echo "NULL";
	}else{
		/********************************************************************************************

										DEPORTISTA 1 Y 4
		********************************************************************************************/
		$sql1 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_semifinal = 1";
		$consulta1 = $mysqli->query($sql1);
		$resultado1 = $consulta1->fetch_assoc();

		$miliseg_deportista1 = $resultado1['miliseg_semifinal'];


		$sql2 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_semifinal = 4";
		$consulta2 = $mysqli->query($sql2);
		$resultado2 = $consulta2->fetch_assoc();

		$miliseg_deportista2 = $resultado2['miliseg_semifinal'];	

		if($miliseg_deportista1 < $miliseg_deportista2){
			$query = "UPDATE resultados_eventos_competencia_carriles SET posicion_final = CASE posicion_semifinal WHEN 1 THEN '1' WHEN 4 THEN '3'  END WHERE posicion_semifinal IN (1,4) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);

		}else if ($miliseg_deportista1 > $miliseg_deportista2){
			$query = "UPDATE resultados_eventos_competencia_carriles SET posicion_final = CASE posicion_semifinal WHEN 1 THEN '3' WHEN 4 THEN '1'  END WHERE posicion_semifinal IN (1,4) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);
		}		

		/********************************************************************************************

										DEPORTISTA 2 Y 3
		********************************************************************************************/

		$sql3 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_semifinal = 2";
		$consulta3 = $mysqli->query($sql3);
		$resultado3 = $consulta3->fetch_assoc();

		$tiempo_deportista3 = $resultado3['miliseg_semifinal'];

		$sql4 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_semifinal = 3";
		$consulta4 = $mysqli->query($sql4);
		$resultado4 = $consulta4->fetch_assoc();

		$tiempo_deportista4 = $resultado4['miliseg_semifinal'];	

		if($tiempo_deportista3 < $tiempo_deportista4){
			$query = "UPDATE resultados_eventos_competencia_carriles SET posicion_final = CASE posicion_semifinal WHEN 2 THEN '2' WHEN 3 THEN '4'  END WHERE posicion_semifinal IN (2,3) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);

		}else if ($tiempo_deportista3 > $tiempo_deportista4){
			$query = "UPDATE resultados_eventos_competencia_carriles SET posicion_final = CASE posicion_semifinal WHEN 2 THEN '4' WHEN 3 THEN '2'  END WHERE posicion_semifinal IN (2,3) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);
		}
		echo $id_listado;
	}
}else if($etapa_carriles==="Final"){
	$consulta = "SELECT COUNT(*) cantidad FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' AND miliseg_final != 'NULL'";
	$result1 = $mysqli->query($consulta)  or die($mysqli->error);
	$counts = $result1->fetch_assoc();
	$count = $counts['cantidad'];
	if($count<4){
		echo "NULL";
	}else{
		/********************************************************************************************

										DEPORTISTA 1 Y 2
		********************************************************************************************/
		$sql1 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_final = 1";
		$consulta1 = $mysqli->query($sql1);
		$resultado1 = $consulta1->fetch_assoc();

		$miliseg_deportista1 = $resultado1['miliseg_final'];


		$sql2 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_final = 2";
		$consulta2 = $mysqli->query($sql2);
		$resultado2 = $consulta2->fetch_assoc();

		$miliseg_deportista2 = $resultado2['miliseg_final'];	

		if($miliseg_deportista1 < $miliseg_deportista2){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_final = CASE posicion_final WHEN 1 THEN '1' WHEN 2 THEN '2'  END WHERE posicion_final IN (1,2) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);

		}else if ($miliseg_deportista1 > $miliseg_deportista2){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_final = CASE posicion_final WHEN 1 THEN '2' WHEN 2 THEN '1'  END WHERE posicion_final IN (1,2) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);
		}		

		/********************************************************************************************

										DEPORTISTA 3 Y 4
		********************************************************************************************/

		$sql3 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_final = 3";
		$consulta3 = $mysqli->query($sql3);
		$resultado3 = $consulta3->fetch_assoc();

		$tiempo_deportista3 = $resultado3['miliseg_final'];

		$sql4 = "SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' 
		AND posicion_final = 4";
		$consulta4 = $mysqli->query($sql4);
		$resultado4 = $consulta4->fetch_assoc();

		$tiempo_deportista4 = $resultado4['miliseg_final'];	

		if($tiempo_deportista3 < $tiempo_deportista4){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_final = CASE posicion_final WHEN 3 THEN '3' WHEN 4 THEN '4'  END WHERE posicion_final IN (3,4) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);

		}else if ($tiempo_deportista3 > $tiempo_deportista4){
			$query = "UPDATE resultados_eventos_competencia_carriles SET resultados_final = CASE posicion_final WHEN 3 THEN '4' WHEN 4 THEN '3'  END WHERE posicion_final IN (3,4) AND id_listado = '$id_listado'";
			$result=$mysqli->query($query);
		}

		$consultad ="SELECT * FROM resultados_eventos_competencia_carriles WHERE id_listado = '$id_listado' AND resultados_final != 'NULL' ORDER BY `resultados_final` ASC";
		$resultado=$mysqli->query($consultad) or die($mysqli->error);

		while($row=mysqli_fetch_array($resultado)){
			$numero_deportista = $row['numero_deportista'];
			$orden = $row['resultados_final'];
			if($orden=='1'){
				$actualizar = "UPDATE resultados_eventos_competencia_carriles SET premiacion_final = 'Oro' WHERE numero_deportista ='$numero_deportista'";
				$resp=$mysqli->query($actualizar);
			}
				if($orden=='2'){
				$actualizar = "UPDATE resultados_eventos_competencia_carriles SET premiacion_final = 'Plata' WHERE numero_deportista ='$numero_deportista'";
				$resp=$mysqli->query($actualizar);
			}
				if($orden=='3'){
				$actualizar = "UPDATE resultados_eventos_competencia_carriles SET premiacion_final = 'Bronce' WHERE numero_deportista ='$numero_deportista'";
				$resp=$mysqli->query($actualizar);
			}
				if($orden=='4'){
				$actualizar = "UPDATE resultados_eventos_competencia_carriles SET premiacion_final = '' WHERE numero_deportista ='$numero_deportista'";
				$resp=$mysqli->query($actualizar);
			}

		 }
		$estado = "UPDATE listados_carriles SET estado = 'Terminado' WHERE id = '$id_listado'";
		$respuesta=$mysqli->query($estado);
		if(!$respuesta){
			echo "ERROR"; //ERROR PRESENTADO  - Por favor intente nuevamente
		}
		echo $id_listado;
	}
}
?>