<?php
	require('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
		header("location: ../Administrador/Login.php");
	}

	if(!empty($_POST['Evento'])){
		if(!empty($_POST['Listado'])){
			if(empty($_POST['Llenar']) & empty($_POST['Actualizar'])){//Sino se procede a llenar la nueva tabla con los deportistas registrados en el evento
				$evento = $_POST['Evento'];
				$nombre_listado = $_POST['Listado'];

				$query="DESC `resultados_eventos_competencia_carriles`";
				$result=$mysqli->query($query);
				if($result){//Se ejecuta descripción de la tabla
					echo 2;//la tabla ya existe
				} else {
					$query="CREATE TABLE `resultados_eventos_competencia_carriles` (id INT(11) NOT NULL AUTO_INCREMENT,
														nombre_evento VARCHAR(100) NOT NULL,
														carriles_listado INT(11) NOT NULL,
														id_listado INT(11) NOT NULL,
														numero_deportista INT(11) NOT NULL,
														nombres VARCHAR(50) NOT NULL,
														tipo_patin VARCHAR(50) NOT NULL,
														club VARCHAR(100) NOT NULL,
														categoria VARCHAR(15) NOT NULL,
														posicion_octavos INT(2) NOT NULL,
														tiempo_octavos VARCHAR(20) NULL,
														miliseg_octavos BIGINT(15) NULL,
														resultados_octavos VARCHAR(20) NULL,
														posicion_cuartos INT(2) NOT NULL,
														tiempo_cuartos VARCHAR(20) NULL,
														miliseg_cuartos BIGINT(15) NULL,
														resultados_cuartos VARCHAR(20) NULL,
														posicion_semifinal INT(2) NOT NULL,
														tiempo_semifinal VARCHAR(20) NULL,
														miliseg_semifinal BIGINT(15) NULL,
														posicion_final INT(2) NOT NULL,
														tiempo_final VARCHAR(20) NULL,
														miliseg_final BIGINT(15) NULL,
														resultados_final VARCHAR(20) NULL,
														observacion VARCHAR(10) NULL,
														premiacion_final varchar(10) NULL,
														PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";
					$result=$mysqli->query($query);
					if($result){//Tabla creada exitosamente.
						$query1="ALTER TABLE `resultados_eventos_competencia_carriles` ADD FOREIGN KEY (`tipo_patin`) REFERENCES `tipo_patin`(`tipo_patin`), ADD FOREIGN KEY (`nombre_evento`) REFERENCES `eventos`(`nombre`), ADD FOREIGN KEY (`carriles_listado`) REFERENCES `listados_eventos`(`id`), ADD FOREIGN KEY (`id_listado`) REFERENCES `listados_carriles`(`id`), ADD FOREIGN KEY (`club`) REFERENCES `inscripcion_evento_clubes`(`club`), ADD FOREIGN KEY (`categoria`) REFERENCES `categorias_resultados`(`categorias_resultados`)";
						
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
					$evento = $_POST['Evento'];
					$nombre_listado = $_POST['Listado'];
					
					$consulta="SELECT * FROM listados_carriles WHERE evento = '$evento' AND nombre_listado = '$nombre_listado'";
					$resultado1=$mysqli->query($consulta);
					$array_listado=$resultado1->fetch_assoc();
					$carriles_listado = $array_listado['id_listado_carriles'];
					$id_listado = $array_listado['id'];
					
					$sql="SELECT * FROM resultados_eventos_competencia_velocidad WHERE evento = '$evento' AND listado = '$carriles_listado' ORDER BY `tiempo_miliseg` ASC";
					$resultado2=$mysqli->query($sql) or die($mysqli->error);
					$No = 1;
					while($datos=mysqli_fetch_array($resultado2)){
						$numero_deportista = $datos['numero_deportista'];
						$nombres = $datos['nombres'] . " " . $datos['apellidos'];
						$tipo_patin= $datos['tipo_patin'];
						$club= $datos['club'];
						$categoria = $datos['categorias'];
						
						$check_identificacion="SELECT * FROM `resultados_eventos_competencia_carriles` WHERE numero_deportista= '$numero_deportista' AND nombre_evento= '$evento' AND id_listado = '$id_listado'";
						$result_check=$mysqli->query($check_identificacion);
						$rows = $result_check->num_rows;
						//echo $check_identificacion;

						if($rows == 0) {//se verifica que el deportista no este en la tabla
							if($No <= 16){
								$query="INSERT INTO `resultados_eventos_competencia_carriles` (nombre_evento, carriles_listado, id_listado, numero_deportista, nombres, tipo_patin, club, categoria, posicion_octavos)
											VALUES ('$evento', '$carriles_listado', '$id_listado', '$numero_deportista', '$nombres', '$tipo_patin', '$club', '$categoria', '$No')";
								$result1=$mysqli->query($query) or die($mysqli->error);
								if(!$result1){//ERROR PRESENTADO - No se ha podido registrar el deportista a la tabla de resultado
									echo 0;
								}
							}
						}
						$No += 1;
					}
					echo 1; //Se ha registrado los deportista a la tabla de resultados!
				}else if(!empty($_POST['Actualizar'])){//Se procede a actualizar los deportistas registrados en la tabla deportista
					$evento = $_POST['Evento'];
					$nombre_listado = $_POST['Listado'];
						
					$consulta="SELECT * FROM listados_carriles WHERE evento = '$evento' AND nombre_listado = '$nombre_listado'";
					$resultado1=$mysqli->query($consulta);
					$array_listado=$resultado1->fetch_assoc();
					$carriles_listado = $array_listado['id_listado_carriles'];
					$id_listado = $array_listado['id'];
						
					$sql="SELECT * FROM resultados_eventos_competencia_velocidad WHERE evento = '$evento' AND listado = '$carriles_listado' ORDER BY `tiempo_miliseg` ASC";
					$resultado2=$mysqli->query($sql);
					$No = 1;
					while($datos=mysqli_fetch_array($resultado2)){
						$numero_deportista = $datos['numero_deportista'];
						$nombres = $datos['nombres'] . " " . $datos['apellidos'];
						$tipo_patin= $datos['tipo_patin'];
						$club= $datos['club'];
						$categoria = $datos['categorias'];
								
						$check_identificacion="SELECT * FROM `resultados_eventos_competencia_carriles` WHERE numero_deportista= '$numero_deportista' AND nombre_evento= '$evento' AND id_listado = '$id_listado'";
						$result_check=$mysqli->query($check_identificacion);
						$rows = $result_check->num_rows;
						//echo $check_identificacion;

						if($rows == 0) {//se verifica que el deportista no este en la tabla
							if($No <= 16){
								$query="INSERT INTO `resultados_eventos_competencia_carriles` (nombre_evento, carriles_listado, id_listado, numero_deportista, nombres, tipo_patin, club, categoria, posicion_octavos)
											VALUES ('$evento', '$carriles_listado', '$id_listado', '$numero_deportista', '$nombres', '$tipo_patin', '$club', '$categoria', '$No')";
								$result1=$mysqli->query($query) or die($mysqli->error);
								if(!$result1){//ERROR PRESENTADO - No se ha podido registrar el deportista a la tabla de resultado
									echo 0;
								}
							}
						}
						$No += 1;
					}
					echo 1; //Se ha registrado los deportista a la tabla de resultados!
				}
			}
		}else{
			echo 3;
		}
	}else{
		echo 4;
	}
?>