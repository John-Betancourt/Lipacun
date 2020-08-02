<?php
	require('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
		header("location: ../Administrador/Login.php");
	}

	if(!empty($_POST['NombreTablabd'])){
		if(!empty($_POST['TipoCompetencia'])){
			if(empty($_POST['TipoPatin'])){//si hace falta el campo Tipo de Patin se procede a la creacion de la tabla
				
				$NombreTablabd=$_POST['NombreTablabd'];//recibir el nombre de la tabla y almacenar en variable
				$TipoCompetencia=$_POST['TipoCompetencia'];//recibir el Tipo Competencia y almacenar en variable

				$query="DESC `$NombreTablabd`";
				$result=$mysqli->query($query);
				if($result){//Se actualizan los deportistas inscritos en la tabla resultados
					echo 2;//la tabla ya existe
				} else {
					if($TipoCompetencia=="Habilidad"){
						$query="CREATE TABLE `$NombreTablabd` (id INT(11) NOT NULL AUTO_INCREMENT,
															numero_deportista INT(11) NOT NULL,
															nombres VARCHAR(50) NOT NULL,
															apellidos VARCHAR(50) NOT NULL,
															tipo_patin VARCHAR(50) NOT NULL,
															categorias VARCHAR(15) NOT NULL,
															club VARCHAR(100) NOT NULL,
															evento VARCHAR(100) NOT NULL,
															listado INT(11) NOT NULL,
															tiempo VARCHAR(20) NULL,
															tiempo_miliseg BIGINT(15) NULL,
															faltas INT(2) NULL,
															tiempo_final VARCHAR(20) NULL,
															final_miliseg BIGINT(15) NULL,
															premiacion varchar(10) NULL,
															PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";
					}else if($TipoCompetencia=="Fondo_Puntos"){
						$query="CREATE TABLE `$NombreTablabd` (id INT(11) NOT NULL AUTO_INCREMENT,
															numero_deportista INT(11) NOT NULL,
															nombres VARCHAR(50) NOT NULL,
															apellidos VARCHAR(50) NOT NULL,
															tipo_patin VARCHAR(50) NOT NULL,
															categorias VARCHAR(15) NOT NULL,
															club VARCHAR(100) NOT NULL,
															evento VARCHAR(100) NOT NULL,
															listado INT(11) NOT NULL,
															orden_llegada INT(2) NULL,
															puntos_totales INT(4) NULL,
															observacion VARCHAR(10) NULL,
															posicion BIGINT(5) NULL,
															premiacion varchar(10) NULL,
															PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";
					}else if($TipoCompetencia=="Fondo_Eliminacion"){
						$query="CREATE TABLE `$NombreTablabd` (id INT(11) NOT NULL AUTO_INCREMENT,
															numero_deportista INT(11) NOT NULL,
															nombres VARCHAR(50) NOT NULL,
															apellidos VARCHAR(50) NOT NULL,
															tipo_patin VARCHAR(50) NOT NULL,
															categorias VARCHAR(15) NOT NULL,
															club VARCHAR(100) NOT NULL,
															evento VARCHAR(100) NOT NULL,
															listado INT(11) NOT NULL,
															orden_llegada INT(2) NULL,
															eliminado varchar(3) NULL,
															vuelta_eliminado INT(3) NULL,
															observacion VARCHAR(10) NULL,
															posicion BIGINT(5) NULL,
															premiacion varchar(10) NULL,
															PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";
					}else if($TipoCompetencia=="Fondo_Puntos_Eliminacion"){
						$query="CREATE TABLE `$NombreTablabd` (id INT(11) NOT NULL AUTO_INCREMENT,
															numero_deportista INT(11) NOT NULL,
															nombres VARCHAR(50) NOT NULL,
															apellidos VARCHAR(50) NOT NULL,
															tipo_patin VARCHAR(50) NOT NULL,
															categorias VARCHAR(15) NOT NULL,
															club VARCHAR(100) NOT NULL,
															evento VARCHAR(100) NOT NULL,
															listado INT(11) NOT NULL,
															eliminado varchar(3) NULL,
															orden_llegada INT(2) NULL,
															puntos_totales INT(4) NULL,
															vuelta_eliminado INT(3) NULL,
															observacion VARCHAR(10) NULL,
															posicion BIGINT(5) NULL,
															premiacion varchar(10) NULL,
															PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";
					}else if($TipoCompetencia=="Velocidad"){
						$query="CREATE TABLE `$NombreTablabd` (id INT(11) NOT NULL AUTO_INCREMENT,
															numero_deportista INT(11) NOT NULL,
															nombres VARCHAR(50) NOT NULL,
															apellidos VARCHAR(50) NOT NULL,
															tipo_patin VARCHAR(50) NOT NULL,
															categorias VARCHAR(15) NOT NULL,
															club VARCHAR(100) NOT NULL,
															evento VARCHAR(100) NOT NULL,
															listado INT(11) NOT NULL,
															tiempo VARCHAR(20) NULL,
															tiempo_miliseg BIGINT(15) NULL,
															observacion VARCHAR(10) NULL,
															premiacion varchar(10) NULL,
															PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";
					}else if($TipoCompetencia=="Libre"){
						$query="CREATE TABLE `$NombreTablabd` (id INT(11) NOT NULL AUTO_INCREMENT,
															numero_deportista INT(11) NOT NULL,
															nombres VARCHAR(50) NOT NULL,
															apellidos VARCHAR(50) NOT NULL,
															tipo_patin VARCHAR(50) NOT NULL,
															categorias VARCHAR(15) NOT NULL,
															club VARCHAR(100) NOT NULL,
															evento VARCHAR(100) NOT NULL,
															listado INT(11) NOT NULL,
															observacion VARCHAR(10) NULL,
															posicion BIGINT(5) NULL,
															posicion_final BIGINT(5) NULL,
															premiacion varchar(10) NULL,
															PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";
					}
					$result=$mysqli->query($query);
					if($result){//Tabla creada exitosamente.
						//$query1="ALTER TABLE `$NombreTablabd` ADD FOREIGN KEY (`numero_deportista`) REFERENCES `numero_deportistas`(`numero_deportista`), ADD FOREIGN KEY (`tipo_patin`) REFERENCES `tipo_patin`(`tipo_patin`), ADD FOREIGN KEY (`evento`) REFERENCES `inscripcion_evento_deportistas`(`evento`)";
						$query1="ALTER TABLE `$NombreTablabd` ADD FOREIGN KEY (`tipo_patin`) REFERENCES `tipo_patin`(`tipo_patin`), ADD FOREIGN KEY (`evento`) REFERENCES `inscripcion_evento_clubes`(`evento`), ADD FOREIGN KEY (`listado`) REFERENCES `listados_eventos`(`id`), ADD FOREIGN KEY (`club`) REFERENCES `inscripcion_evento_clubes`(`club`), ADD FOREIGN KEY (`categorias`) REFERENCES `categorias_resultados`(`categorias_resultados`)";
						$result1=$mysqli->query($query1) or die($mysqli->error);
						if($result1){//llave foranea creada exitosamente.
							echo 1; 
						} else {
							//$query="DROP TABLE `$NombreTablabd`";
							echo $query1; //ERROR PRESENTADO  - No se ha podido crear la llave foranea
						}
					} else {
						//$query="DROP TABLE `$NombreTablabd`";
						echo 0; //ERROR PRESENTADO  - No se ha podido crear la tabla para subir resultados
					}
				}
			}else{
				if(!empty($_POST['Llenar'])){//Sino se procede a llenar la nueva tabla con los deportistas registrados en el evento
					$NombreTablabd=$_POST['NombreTablabd'];//recibir el nombre de la tabla y almacenar en variable
					$TipoCompetencia=$_POST['TipoCompetencia'];//recibir el Tipo Competencia y almacenar en variable
					$TipoPatin=$_POST['TipoPatin'];//recibir el Tipo de Patin y almacenar en variable
					$NombreEvento=$_POST['NombreEvento'];//recibir el Nombre evento y almacenar en variable
					$nombre_listado=$_POST['nombre_listado'];//recibir el tipo evento y almacenar en variable
					$sql="SELECT id FROM listados_eventos WHERE nombre_listado = '$nombre_listado'";
					$resultado=$mysqli->query($sql);
					$array_listado=$resultado->fetch_assoc();
					$id_listado = $array_listado['id'];
					/*if($TipoEvento=="Ranking"){
						$consulta="SELECT * FROM `inscripcion_deportistas_eventos_ranking` WHERE evento = '$NombreEvento' AND tipo_patin = '$TipoPatin'";
					}else if("Escuelas"){
						$consulta="SELECT * FROM `inscripcion_deportistas_eventos_escuelas` WHERE evento = '$NombreEvento' AND tipo_patin = '$TipoPatin'";
					}*/
					$consulta=$_SESSION['codigo_sql'];
					$consulta = stripslashes($consulta);
					//echo $consulta;
					$result=$mysqli->query($consulta);
					if($result){//consulta exitosa.
						$resultado=$mysqli->query($consulta);

						while($datos=mysqli_fetch_array($resultado) ){
							$numero_deportista=$datos['numero_deportista'];
							$nombres=$datos['nombres'];
							$apellidos=$datos['apellidos'];
							$edad=$datos['edad'];
							if($edad >=7 && $edad<=10){
								$categoria="Menores";
							}else if($edad >=11 && $edad<=13){
								$categoria="Transicion";
							}else if($edad>=14){
								$categoria="Mayores";
							}
							$club=$datos['club'];
							
							$check_identificacion="select * FROM `$NombreTablabd` WHERE numero_deportista='$numero_deportista' AND evento='$NombreEvento'";
							$result_check=$mysqli->query($check_identificacion);
							$rows = $result_check->num_rows;
							//echo $check_identificacion;

							if($rows == 0){//se verifica que el deportista no este en la tabla
								$query="INSERT INTO `$NombreTablabd` (numero_deportista, nombres, apellidos, tipo_patin, categorias, club, evento, listado)
															VALUES ('$numero_deportista', '$nombres', '$apellidos', '$TipoPatin', '$categoria', '$club', '$NombreEvento', '$id_listado')";
								$result1=$mysqli->query($query) or die($mysqli->error);
								if(!$result1){//ERROR PRESENTADO - No se ha podido registrar el deportista a la tabla de resultado
									echo 0; 
								}
							}
						}
						echo 1; //Se ha registrado el deportista a la tabla de resultados!
					} else {
						echo 2; //no hay deportistas inscritos al evento
					}
						
					
				}else if(!empty($_POST['Actualizar'])){//Se procede a actualizar los deportistas registrados en la tabla deportista
					
					$NombreTablabd=$_POST['NombreTablabd'];//recibir el nombre de la tabla y almacenar en variable
					$TipoCompetencia=$_POST['TipoCompetencia'];//recibir el Tipo Competencia y almacenar en variable
					$TipoPatin=$_POST['TipoPatin'];//recibir el Tipo de Patin y almacenar en variable
					$NombreEvento=$_POST['NombreEvento'];//recibir el Tipo de Patin y almacenar en variable
					$nombre_listado=$_POST['nombre_listado'];//recibir el tipo evento y almacenar en variable
					$sql="SELECT id FROM listados_eventos WHERE nombre_listado = '$nombre_listado'";
					$resultado=$mysqli->query($sql);
					$array_listado=$resultado->fetch_assoc();
					$id_listado = $array_listado['id'];
					/*if($TipoEvento=="Ranking"){
						$consulta="SELECT * FROM `inscripcion_deportistas_eventos_ranking` WHERE evento = '$NombreEvento' AND tipo_patin = '$TipoPatin'";
					}else if("Escuelas"){
						$consulta="SELECT * FROM `inscripcion_deportistas_eventos_escuelas` WHERE evento = '$NombreEvento' AND tipo_patin = '$TipoPatin'";
					}*/
					$consulta=$_SESSION['codigo_sql'];
					$consulta = stripslashes($consulta);
					$result=$mysqli->query($consulta);
					if($result){//consulta exitosa.
						$resultado=$mysqli->query($consulta);

						while($datos=mysqli_fetch_array($resultado) ){
							$numero_deportista=$datos['numero_deportista'];
							$nombres=$datos['nombres'];
							$apellidos=$datos['apellidos'];
							$edad=$datos['edad'];
							if($edad >=7 && $edad<=10){
								$categoria="Menores";
							}else if($edad >=11 && $edad<=13){
								$categoria="Transicion";
							}else if($edad>=14){
								$categoria="Mayores";
							}
							$club=$datos['club'];

							$check_identificacion="select * FROM `$NombreTablabd` WHERE numero_deportista='$numero_deportista' AND evento='$NombreEvento' AND listado = '$id_listado'";
							$result_check=$mysqli->query($check_identificacion);
							$rows = $result_check->num_rows;
							//echo $check_identificacion;
							if($rows == 0){//se verifica si el deportista ya se encuentre en la tabla
								$query="INSERT INTO `$NombreTablabd` (numero_deportista, nombres, apellidos, tipo_patin, categorias, club, evento, listado)
															VALUES ('$numero_deportista', '$nombres', '$apellidos', '$TipoPatin', '$categoria', '$club', '$NombreEvento', '$id_listado')";
								$result1=$mysqli->query($query);
								if(!$result1){//ERROR PRESENTADO - No se ha podido registrar el deportista a la tabla de resultado
									echo 0; 
								}
							}
						}
						echo 1; //Se ha registrado el deportista a la tabla de resultados!
					} else {
						echo 2; //no hay deportistas inscritos al evento
					}
				}
			}
		}
	}
?>