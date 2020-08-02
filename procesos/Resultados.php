<?php
	require_once('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
		header("location: ../Administrador/Login.php");
	}

	if(!empty($_POST['codigo_SQL'])){
		$codigo_sql = $_POST['codigo_SQL'];
		$sql = 'SELECT * FROM listados_eventos WHERE codigo_sql = "'.$codigo_sql.'"';
		$consulta = $mysqli->query($sql);
		$array_resultado = $consulta->fetch_assoc();
		$id_listado = $array_resultado['id'];
		$competencia = $array_resultado['competencia'];
		
		$sql = stripslashes($codigo_sql);
		$consult = $mysqli->query($sql);
		while($row=$consult->fetch_assoc()){
			if($competencia=="Habilidad"){
				$final_miliseg = $row['final_miliseg'];
				if($final_miliseg==NULL){
					$resultado = "NULL";
				}
			}else if($competencia=="Fondo_Puntos"){
				$puntos_totales = $row['puntos_totales'];
				$observacion = $row['observacion'];
				if($puntos_totales!=NULL or $observacion!=NULL){
					
				}else{
					$resultado = "NULL";
				}
			}else if($competencia=="Fondo_Eliminacion"){
				$posicion = $row['posicion'];
				$observacion = $row['observacion'];
				if($posicion!=NULL or $posicion!=NULL){
					
				}else{
					$resultado = "NULL";
				}
			}else if($competencia=="Fondo_Puntos_Eliminacion"){
				$posicion = $row['posicion'];
				$observacion = $row['observacion'];
				if($posicion!=NULL or $posicion!=NULL){
					
				}else{
					$resultado = "NULL";
				}
			}else if($competencia=="Velocidad"){
				$tiempo_miliseg = $row['tiempo_miliseg'];
				if($tiempo_miliseg==NULL){
					$resultado = "NULL";
				}
			}else if($competencia=="Libre"){
				$posicion = $row['posicion_final'];
				if($posicion==NULL){
					$resultado = "NULL";
				}
			}
		}
		if(!empty($resultado)){
			echo "NULL";
		}else{
			$sql = "UPDATE listados_eventos SET estado = 'terminado' WHERE id = '$id_listado'";
			$consult = $mysqli->query($sql);
			if($consult){
				echo $id_listado;
			}else{
				echo "ERROR";
			}
		}
	}
?>