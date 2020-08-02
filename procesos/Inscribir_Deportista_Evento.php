<?php
require('../clases/conexion_db.php');
session_start();

if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["nombre_corto"]==""){
	header("location: ../Login.php");
}


if(!empty($_POST['Evento'])){
	if(!empty($_POST['Identificacion'])){
		//recibir los datos del formulario nueva competencia
		$Evento=$_POST['Evento'];
		$Club = $_SESSION['nombre_corto'];
		$Deportista=$_POST['Identificacion'];
		
		$consulta = "SELECT * FROM deportistas WHERE estado = 1 AND identificacion = '$Deportista'";//Se verifica si el deportista existe
		$resultado = $mysqli->query($consulta);
		$row1 = $resultado->num_rows;

		if($row1 > 0){//Si existe.
			$consulta2 = "select * FROM deportistas WHERE identificacion = '$Deportista' AND nombre_corto_club = '$Club'";//consulta si el deportista pertenece al club logeado
			$resultado2 = $mysqli->query($consulta2);
			$row2 = $resultado2->num_rows;
			if($row2 > 0){//Si el deportista pertenece

				$consult1 = "select * FROM eventos WHERE nombre = '$Evento'";
				$result1 = $mysqli->query($consult1);
				$datos1 = $result1->fetch_assoc();
				$tipo_evento = $datos1['tipo_evento'];
				$fecha_evento = $datos1['fecha_evento'];

				if($tipo_evento == "Ranking"){
					$consulta0 = "SELECT * FROM deportistas WHERE identificacion = '$Deportista' AND ligado = '1' AND tipo_patin = '3'";//Se verifica si el deportista juega en ranking
					$resultado0 = $mysqli->query($consulta0);
					$row0 = $resultado0->num_rows;
				}else if($tipo_evento == "Escuelas"){
					$consulta0 = "SELECT * FROM deportistas WHERE identificacion = '$Deportista' AND tipo_patin = '1' OR identificacion = '$Deportista' AND tipo_patin = '2'";//Se verifica si el deportista juega en escuelas
					$resultado0 = $mysqli->query($consulta0);
					//echo $consulta0;
					$row0 = $resultado0->num_rows;
				}
				if($row0 > 0){//Si el deportista puede participar en ese tipo de evento, se le capturan todos los datos
					if($tipo_evento == "Ranking"){
						$consulta1 = "SELECT * FROM numero_deportistas WHERE identificacion_deportista = '$Deportista'";
						$resultado1 = $mysqli->query($consulta1);
						$datos5 = $resultado1->fetch_assoc();
						if(!empty($datos5)){//Si el deportista tiene numero
							$datos = $resultado0->fetch_assoc();
							$numero_deportista = $datos5['numero_deportista'];

							$edad = $datos['edad'];
							$primer_nombre = $datos ['primer_nombre'];
							$segundo_nombre = $datos['segundo_nombre'];
							$primer_apellido = $datos['primer_apellido'];
							$segundo_apellido = $datos['segundo_apellido'];
							$nombres = $primer_nombre . ' ' . $segundo_nombre;
							$apellidos = $primer_apellido .' '. $segundo_apellido;
							$id_rama = $datos['rama'];
							$id_categoria = $datos['categoria'];
							$id_patin = $datos['tipo_patin'];

							$consult0 = "SELECT * FROM rama WHERE id = '$id_rama'";
							$result0 = $mysqli->query($consult0);
							$datos0 = $result0->fetch_assoc();
							$rama = $datos0['rama'];
							
							$consult2 = "SELECT * FROM tipo_patin WHERE id = '$id_patin'";
							$result2 = $mysqli->query($consult2);
							$datos2 = $result2->fetch_assoc();
							$tipo_patin = $datos2['tipo_patin'];

							$consult3 = "SELECT * FROM categoria WHERE id = '$id_categoria'";
							$result3 = $mysqli->query($consult3);
							$datos3 = $result3->fetch_assoc();
							$categoria = $datos3['categoria'];

							$consulta3 = "SELECT * FROM inscripcion_deportistas_eventos_ranking WHERE evento = '$Evento' AND identificacion_deportista = '$Deportista'";//consulta si el deportista ya se encuentra  inscrito al evento
							$resultado3 = $mysqli->query($consulta3);
							$row3 = $resultado3->num_rows;
							if($row3 > 0){
								echo 2;//Atención - El Deportista ya se encuentra registrado al evento!
							}else{
								$query = "INSERT INTO inscripcion_deportistas_eventos_ranking(evento, club, identificacion_deportista, numero_deportista, nombres, apellidos, edad, categoria, rama, tipo_patin) VALUES ('$Evento', '$Club', '$Deportista', '$numero_deportista', '$nombres', '$apellidos', '$edad', '$categoria', '$rama', '$tipo_patin')";
								//echo $query;
								$result = $mysqli->query($query);
								if($result){
									echo 1;//El deportista se ha registrado al evento exitosamente!
								} else {
									echo 0;//ERROR PRESENTADO -  El deportista no se ha podido registrar al evento
								}
							}
						}else{
							echo 5;//Atención - El Deportista NO tiene numero asignado, por favor comuniquese con el administrador del sistema!
						}
					}else if($tipo_evento == "Escuelas"){
						$datos = $resultado0->fetch_assoc();
						$edad = $datos['edad'];
						$primer_nombre = $datos ['primer_nombre'];
						$segundo_nombre = $datos['segundo_nombre'];
						$primer_apellido = $datos['primer_apellido'];
						$segundo_apellido = $datos['segundo_apellido'];
						$nombres = $primer_nombre . ' ' . $segundo_nombre;
						$apellidos = $primer_apellido .' '. $segundo_apellido;
						$id_rama = $datos['rama'];
						$id_categoria = $datos['categoria'];
						$id_patin = $datos['tipo_patin'];

						$consult0 = "SELECT * FROM rama WHERE id = '$id_rama'";
						$result0 = $mysqli->query($consult0);
						$datos0 = $result0->fetch_assoc();
						$rama = $datos0['rama'];

						$consult2 = "SELECT * FROM tipo_patin WHERE id = '$id_patin'";
						$result2 = $mysqli->query($consult2);
						$datos2 = $result2->fetch_assoc();
						$tipo_patin = $datos2['tipo_patin'];

						$consult3 = "SELECT * FROM categoria WHERE id = '$id_categoria'";
						$result3 = $mysqli->query($consult3);
						$datos3 = $result3->fetch_assoc();
						$categoria = $datos3['categoria'];

						$consulta3 = "SELECT * FROM inscripcion_deportistas_eventos_escuelas WHERE evento = '$Evento' AND identificacion_deportista = '$Deportista'";//consulta si el deportista ya se encuentra  inscrito al evento
						$resultado3 = $mysqli->query($consulta3);
						$row3 = $resultado3->num_rows;
						if($row3 > 0){
							echo 2;//Atención - El Deportista ya se encuentra registrado al evento!
						}else{
							$query = "INSERT INTO inscripcion_deportistas_eventos_escuelas(evento, club, identificacion_deportista, nombres, apellidos, edad, categoria, rama, tipo_patin) VALUES ('$Evento', '$Club', '$Deportista', '$nombres', '$apellidos', '$edad', '$categoria', '$rama', '$tipo_patin')";
							//echo $query;
							$result = $mysqli->query($query);
							if($result){
								echo 1;//El deportista se ha registrado al evento exitosamente!
							} else {
								echo 0;//ERROR PRESENTADO -  El deportista no se ha podido registrar al evento
							}
						}
					}
				}else{
					echo 3;//Atención - El Deportista que intenta inscribir, no cumple con los requisitos para la inscripcion a este evento!
				}
			}else{
				echo 4;//Atención - El Deportista que intenta inscribir, está inscrito en otro club! Si realizo el cambio de club, por favor comunicarse con el administrador del sistema
			}
		}else{
			echo 6;//El Deportista que intenta inscribir con la identificación "'+identificacion+'" al evento "'+evento+'", NO EXISTE o se le ha dado de baja. Para inscribirlo al club presione "Inscribir"; Si escribio mal la identificación y desea corregirla presione "Corregir".
		}
	}else{
		echo 22;//falta el campo identificacion
	}
}else{
	if(empty($_POST['Identificacion'])){
		echo 12;//faltan ambos campos
	}else{
		echo 11;//falta el campo evento
	}
}
?>