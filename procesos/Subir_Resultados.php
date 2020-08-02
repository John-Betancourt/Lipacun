<?php
	require_once('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
		header("location: ../Administrador/Login.php");
	}

	if(!empty($_POST['numero_deportista']) or !empty($_POST['Nombre']) or !empty($_POST['tipo_patin'])){
		//recibir los datos del formulario subir resultados
		$id_listado=$_SESSION['id_listado'];
		$tipo_competancia=$_POST['tipo_competencia'];
		$numero_deportista=$_POST['numero_deportista'];
		$nombre=$_POST['Nombre'];
		$tipo_patin=$_POST['tipo_patin'];
		if($tipo_competancia=="Habilidad"){
			/****************************************************************************************
											- COMPETENCIA HABILIDAD - 
			****************************************************************************************/
			if(empty($_POST['Segundos1']) or empty($_POST['Milisegundos1'])){
				$faltas=$_POST['Faltas1'];
				if($faltas==4){
					$query="UPDATE resultados_eventos_competencia_habilidad SET tiempo_final= 'DNSP', final_miliseg= 9999999999999999 WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
					$result=$mysqli->query($query);
					if($result){
						echo 1; //Se ha guardado los resultados!
					} else {
						echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
					}
				}else{
					echo 2;
				}
			}else{
				$faltas=$_POST['Faltas1'];
				if($faltas==4){
					echo 3;//no puede poner valores de tiempo si selecciona DNSP
				}else{
					if(!empty($_POST['Minutos1'])){
						$minutos = $_POST['Minutos1'];
					}else{
						$minutos = 0;
					}
					
					$segundos = $_POST['Segundos1'];
					$miliseg = $_POST['Milisegundos1'];
					
					$tiempo = $minutos .":". $segundos .":". $miliseg;
					$tiempo_mil = ($minutos * 60000) + ($segundos * 1000) + $miliseg;
					if($faltas==0){
						$tiempo_final= $tiempo_mil;
					}else if($faltas==1){
						$tiempo_final= $tiempo_mil + 250;
					}else if($faltas==2){
						$tiempo_final= $tiempo_mil + 500;
					}
					if($faltas==3){
						$tiempo_final= 'NT';
					}else{
						$tiempo_final_mil= $tiempo_final;
						$ms = $tiempo_final % 1000;
						$tiempo_final = ($tiempo_final - $ms) / 1000;
						$seg = $tiempo_final % 60;
						$tiempo_final = ($tiempo_final - $seg) / 60;
						$min = $tiempo_final % 60;
						$tiempo_total = $min .":". $seg .":". $ms;
					}
					if($faltas==0){
						$query="UPDATE resultados_eventos_competencia_habilidad SET tiempo= '$tiempo', tiempo_miliseg= '$tiempo_mil', faltas= '$faltas', tiempo_final= '$tiempo', final_miliseg= '$tiempo_final_mil' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
					}else if($faltas==3){
						$query="UPDATE resultados_eventos_competencia_habilidad SET tiempo= '$tiempo', tiempo_miliseg='$tiempo_mil', faltas= '$faltas', tiempo_final= '$tiempo_final', final_miliseg= 999999999999999 WHERE numero_deportista='$numero_deportista' AND listado= '$id_listado'";
					}else{
						$query="UPDATE resultados_eventos_competencia_habilidad SET tiempo= '$tiempo', tiempo_miliseg= '$tiempo_mil', faltas= '$faltas', tiempo_final= '$tiempo_total', final_miliseg= '$tiempo_final_mil' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
					}
					$result=$mysqli->query($query);
					if($result){
						echo 1; //Se ha guardado los resultados!
					} else {
						echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
					}
				}
			}
		}else if($tipo_competancia=="Fondo_Puntos"){
			/*******************************************************************************************
											- COMPETENCIA FONDO PUNTOS - 
			*******************************************************************************************/
			$observacion=$_POST['Observacion2'];
			if(empty($_POST['puntos_totales2'])){
				if($observacion!=0){
					if($observacion==1){
						if(empty($_POST['orden_llegada2'])){
							$query="UPDATE resultados_eventos_competencia_fondo_puntos SET  observacion= 'NT'  , posicion= '-99996' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
						}else{
							echo 11;
							$noempty = 1;
						}
					}else if($observacion==2){
						$query="UPDATE resultados_eventos_competencia_fondo_puntos SET  observacion= 'DQST', posicion= '-99998' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
					}else if($observacion==3){
						$query="UPDATE resultados_eventos_competencia_fondo_puntos SET  observacion= 'DQSD', posicion= '-99999' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
					}else if($observacion==4){
						$query="UPDATE resultados_eventos_competencia_fondo_puntos SET  observacion= 'DNSP', posicion= '-99997' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
					}
					if(empty($noempty)){
						$result=$mysqli->query($query);
						if($result){
							echo 1; //Se ha guardado los resultados!
						} else {
							echo $query; //ERROR PRESENTADO  - Por favor intente nuevamente
						}
					}
				}else{
					if(!empty($_POST['orden_llegada2'])){
						$orden_llegada2 = $_POST['orden_llegada2'];
						$query="UPDATE resultados_eventos_competencia_fondo_puntos SET orden_llegada= '$orden_llegada2', puntos_totales= '0', posicion= '0' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
						$result=$mysqli->query($query);
						if($result){
							echo 1; //Se ha guardado los resultados!
						} else {
							echo $query; //ERROR PRESENTADO  - Por favor intente nuevamente
						}
					}else{
						echo 2;
					}
				}
			}else{
				if($observacion==0){
					$puntos_totales2 = $_POST['puntos_totales2'];
					if(!empty($_POST['orden_llegada2'])){
						$orden_llegada2 = $_POST['orden_llegada2'];
						$posicion2 = ($puntos_totales2 - $orden_llegada2) + 5;
						$query="UPDATE resultados_eventos_competencia_fondo_puntos SET orden_llegada= '$orden_llegada2', puntos_totales= '$puntos_totales2', posicion= '$posicion2' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
					}else{
						$query="UPDATE resultados_eventos_competencia_fondo_puntos SET puntos_totales= '$puntos_totales2', posicion= '$puntos_totales2' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
					}
					
					$result=$mysqli->query($query);
					
					if($result){
						echo 1; //Se ha guardado los resultados!
					} else {
						echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
					}
				}else if($observacion==4){
					echo 4;
				}else{
					$puntos_totales2 = $_POST['puntos_totales2'];
					if($observacion==1){
						$observacion2 = "NT";
						$posicion = -99996;
					}else if($observacion==2){
						$observacion2 = "DQST";
						$posicion = -99998;
					}else if($observacion==3){
						$observacion2 = "DQSD";
						$posicion = -99999;
					}
					if(!empty($_POST['orden_llegada2'])){
						$orden_llegada2 = $_POST['orden_llegada2'];
						$query="UPDATE resultados_eventos_competencia_fondo_puntos SET orden_llegada= '$orden_llegada2', puntos_totales= '$puntos_totales2', observacion ='$observacion2', posicion= '$posicion' WHERE numero_deportista='$numero_deportista' AND listado= '$id_listado'";
					}else{
						$query="UPDATE resultados_eventos_competencia_fondo_puntos SET puntos_totales= '$puntos_totales2', observacion = '$observacion2', posicion= '$posicion' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
					}
					
					$result=$mysqli->query($query);
					
					if($result){
						echo 1; //Se ha guardado los resultados!
					} else {
						echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
					}
				}
			}
		}else if($tipo_competancia=="Fondo_Eliminacion"){
			/***********************************************************************************************
											- COMPETENCIA FONDO ELIMINACIÓN - 
			***********************************************************************************************/
			//$eliminado=$_POST['Eliminado3'];
			$observacion=$_POST['Observacion3'];
			if(empty($_POST['Eliminado3'])){
				//$observacion=$_POST['Observacion3'];
				if($observacion!=0){
					if($observacion==4){//DEPORTISTA NO SE PRESENTA
						if(empty($_POST['orden_llegada3'])){
							if(empty($_POST['vuelta_eliminado3'])){
								$query="UPDATE resultados_eventos_competencia_fondo_eliminacion SET observacion = 'DNSP', posicion= '99997' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
								$result=$mysqli->query($query);
								if($result){
									echo 1; //Se ha guardado los resultados!
								} else {
									echo $query; //ERROR PRESENTADO  - Por favor intente nuevamente
								}
							}else{
								echo 5;
							}
						}else{
							echo 6;
						}
					}else{
						echo 2;
					}
				}else{
					echo 2;
				}
			}else if($_POST['Eliminado3']==1){//NO ELIMINADO
				if(!empty($_POST['orden_llegada3'])){
					if($observacion==0){
						if(empty($_POST['vuelta_eliminado3'])){
							$orden_llegada3=$_POST['orden_llegada3'];
							$query="UPDATE resultados_eventos_competencia_fondo_eliminacion SET eliminado= 'NO', orden_llegada= '$orden_llegada3', posicion= '$orden_llegada3' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
							$result=$mysqli->query($query);
							if($result){
								echo 1; //Se ha guardado los resultados!
							} else {
								echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
							}
						}else{
							echo 8;
						}
					}else if($observacion==4){
						echo 5;
					}else{
						echo 2;
					}
				}else{
					echo 2;
				}
			}else if($_POST['Eliminado3']==2){//SI ELIMINADO
				if(!empty($_POST['vuelta_eliminado3'])){
					$vuelta_eliminado3=$_POST['vuelta_eliminado3'];
					if($observacion==0){
						if(empty($_POST['orden_llegada3'])){
							$posicion3 = $vuelta_eliminado3 + 1;
							$query="UPDATE resultados_eventos_competencia_fondo_eliminacion SET eliminado= 'SI', vuelta_eliminado = '$vuelta_eliminado3', observacion= 'NT', posicion= '$posicion3' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
							$result=$mysqli->query($query);
							if($result){
								echo 1; //Se ha guardado los resultados!
							} else {
								echo $query; //ERROR PRESENTADO  - Por favor intente nuevamente
							}
						}else{
							echo 9;
						}
					}else if($observacion!=4){
						if($observacion==1){
							$observacion3 = "NT";
							$posicion3 = 99996;
						}else if($observacion==2){
							$observacion3 = "DQST";
							$posicion3 = 99998;
						}else if($observacion==3){
							$observacion3 = "DQSD";
							$posicion3 = 99999;
						}
						$query="UPDATE resultados_eventos_competencia_fondo_eliminacion SET eliminado= 'SI', vuelta_eliminado = '$vuelta_eliminado3', observacion= '$observacion3', posicion= '$posicion3' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
						$result=$mysqli->query($query);
						if($result){
							echo 1; //Se ha guardado los resultados!
						} else {
							echo $query; //ERROR PRESENTADO  - Por favor intente nuevamente
						}
					}else{
						echo 5;
					}
				}else{
					echo 2;
				}
			}
		}else if($tipo_competancia=="Fondo_Puntos_Eliminacion"){
			/*******************************************************************************************************
											- COMPETENCIA FONDO PUNTOS Y ELIMINACIÓN - 
			*******************************************************************************************************/
			//$eliminado=$_POST['Eliminado3'];
			$observacion=$_POST['Observacion4'];
			if(empty($_POST['Eliminado4'])){
				//$observacion=$_POST['Observacion3'];
				if($observacion!=0){
					if($observacion==4){//DEPORTISTA NO SE PRESENTA
						if(empty($_POST['orden_llegada4'])){
							if(empty($_POST['puntos_totales4'])){
								$query="UPDATE resultados_eventos_competencia_fondo_puntos_eliminacion SET observacion = 'DNSP', posicion= '99997' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
								$result=$mysqli->query($query);
								if($result){
									echo 1; //Se ha guardado los resultados!
								} else {
									echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
								}
							}else{
								echo 7;
							}
						}else{
							echo 6;
						}
					}else{
						echo 2;
					}
				}else{
					echo 2;
				}
			}else if($_POST['Eliminado4']==1){//NO ELIMINADO
				if(!empty($_POST['orden_llegada4'])){
					if(!empty($_POST['puntos_totales4'])){
						if($observacion==0){
							if(empty($_POST['vuelta_eliminado4'])){
								$orden_llegada4=$_POST['orden_llegada4'];
								$puntos_totales4=$_POST['puntos_totales4'];
								$posicion44 = $orden_llegada4 - $puntos_totales4;
								$query="UPDATE resultados_eventos_competencia_fondo_puntos_eliminacion SET eliminado= 'NO', orden_llegada= '$orden_llegada4', puntos_totales= '$puntos_totales4', posicion= '$posicion44' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
								$result=$mysqli->query($query);
								if($result){
									echo 1; //Se ha guardado los resultados!
								} else {
									echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
								}
							}else{
								echo 8;	
							}
						}else if($observacion==4){
							echo 5;
						}else{
							echo $observacion;
						}
					}else{
						if($observacion==0){
							if(empty($_POST['vuelta_eliminado4'])){
								$orden_llegada4=$_POST['orden_llegada4'];
								$query="UPDATE resultados_eventos_competencia_fondo_puntos_eliminacion SET eliminado= 'NO', orden_llegada= '$orden_llegada4', puntos_totales= '0', posicion= '$orden_llegada4' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
								$result=$mysqli->query($query);
								if($result){
									echo 1; //Se ha guardado los resultados!
								} else {
									echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
								}
							}else{
								echo 8;	
							}
						}else if($observacion==4){
							echo 5;
						}else{
							echo $observacion;
						}
					}
				}else{
					echo 2;
				}
			}else if($_POST['Eliminado4']==2){//SI ELIMINADO
				if(!empty($_POST['vuelta_eliminado4'])){
					$vuelta_eliminado4=$_POST['vuelta_eliminado4'];
					if(empty($_POST['orden_llegada4'])){	
						if(empty($_POST['puntos_totales4'])){//NO TIENE PUNTOS
							if($observacion==0){
								$posicion4 = $vuelta_eliminado4 + 1;
								$query="UPDATE resultados_eventos_competencia_fondo_puntos_eliminacion SET eliminado= 'SI', vuelta_eliminado = '$vuelta_eliminado4', posicion= '$posicion4', observacion= 'NT' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
								$result=$mysqli->query($query);
								if($result){
									echo 1; //Se ha guardado los resultados!
								} else {
									echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
								}
							}else if($observacion!=4){
								if($observacion==1){
									$observacion4 = "NT";
									$posicion4 = 99996;
								}else if($observacion==2){
									$observacion4 = "DQST";
									$posicion4 = 99998;
								}else if($observacion==3){
									$observacion4 = "DQSD";
									$posicion4 = 99999;
								}
								$query="UPDATE resultados_eventos_competencia_fondo_puntos_eliminacion SET eliminado= 'SI', vuelta_eliminado = '$vuelta_eliminado4', observacion= '$observacion4', posicion= '$posicion4' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
								$result=$mysqli->query($query);
								if($result){
									echo 1; //Se ha guardado los resultados!
								} else {
									echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
								}
							}else{
								echo 5;
							}
						}else{//SI TIENE PUNTOS
							$puntos_totales4 = $_POST['puntos_totales4'];
							if($observacion==0){
								$posicion4 = $vuelta_eliminado4 + 1;
								$query="UPDATE resultados_eventos_competencia_fondo_puntos_eliminacion SET eliminado= 'SI', vuelta_eliminado = '$vuelta_eliminado4', puntos_totales= '$puntos_totales4', posicion= '$posicion4', observacion= 'NT' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
								$result=$mysqli->query($query);
								if($result){
									echo 1; //Se ha guardado los resultados!
								} else {
									echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
								}
							}else if($observacion!=4){
								if($observacion==1){
									$observacion4 = "NT";
									$posicion4 = 99996;
								}else if($observacion==2){
									$observacion4 = "DQST";
									$posicion4 = 99998;
								}else if($observacion==3){
									$observacion4 = "DQSD";
									$posicion4 = 99999;
								}
								$query="UPDATE resultados_eventos_competencia_fondo_puntos_eliminacion SET eliminado= 'SI', vuelta_eliminado = '$vuelta_eliminado4', puntos_totales= '$puntos_totales4', observacion= '$observacion4', posicion= '$posicion4' WHERE numero_deportista= '$numero_deportista' AND listado= '$id_listado'";
								$result=$mysqli->query($query);
								if($result){
									echo 1; //Se ha guardado los resultados!
								} else {
									echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
								}
							}else{
								echo 5;
							}
						}
					}else{
						echo 9;
					}
				}else{
					echo 2;
				}
			}else{
				echo 2;
			}
		}else if($tipo_competancia=="Velocidad"){
			/*******************************************************************************************************
											- COMPETENCIA VELOCIDAD - 
			*******************************************************************************************************/
			
			$observacion=$_POST['Observacion5'];
			if(empty($_POST['Segundos5']) or empty($_POST['Milisegundos5'])){
				if($observacion!=0){
					if($observacion==1){
						$query="UPDATE resultados_eventos_competencia_velocidad SET  observacion= 'NT', tiempo_miliseg= '999999999999996'   WHERE numero_deportista='$numero_deportista' AND listado= '$id_listado'";
					}else if($observacion==2){
						$query="UPDATE resultados_eventos_competencia_velocidad SET  observacion= 'DQST', tiempo_miliseg= '999999999999998' WHERE numero_deportista='$numero_deportista' AND listado= '$id_listado'";
					}else if($observacion==3){
						$query="UPDATE resultados_eventos_competencia_velocidad SET  observacion= 'DQSD', tiempo_miliseg= '999999999999999' WHERE numero_deportista='$numero_deportista' AND listado= '$id_listado'";
					}else if($observacion==4){
						$query="UPDATE resultados_eventos_competencia_velocidad SET  observacion= 'DNSP', tiempo_miliseg= '999999999999997' WHERE numero_deportista='$numero_deportista' AND listado= '$id_listado'";
					}
					$result=$mysqli->query($query);
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
					if(!empty($_POST['Minutos5'])){
						$minutos5=$_POST['Minutos5'];
					}else{
						$minutos5=0;
					}

					$segundos5 = $_POST['Segundos5'];
					$miliseg5 = $_POST['Milisegundos5'];

					$tiempo5 = $minutos5 .":". $segundos5 .":". $miliseg5;
					$tiempo_mil = ($minutos5 * 60000) + ($segundos5 * 1000) + $miliseg5;

					$query="UPDATE resultados_eventos_competencia_velocidad SET tiempo='$tiempo5', tiempo_miliseg='$tiempo_mil' WHERE numero_deportista='$numero_deportista' AND listado= '$id_listado'";
					$result=$mysqli->query($query);
					
					if($result){
						echo 1; //Se ha guardado los resultados!
					} else {
						echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
					}
				}
			}
		}else if($tipo_competancia=="Libre"){
			/*******************************************************************************************************
											- COMPETENCIA LIBRE - 
			*******************************************************************************************************/
			
			$observacion=$_POST['Observacion6'];
			if(empty($_POST['posicion'])){
				if($observacion!=0){
					if($observacion==1){
						$query="UPDATE resultados_eventos_competencia_libre SET  observacion= 'NT', posicion_final='500'   WHERE numero_deportista='$numero_deportista' AND listado= '$id_listado'";
					}else if($observacion==2){
						$query="UPDATE resultados_eventos_competencia_libre SET  observacion= 'DQST', posicion_final='502' WHERE numero_deportista='$numero_deportista' AND listado= '$id_listado'";
					}else if($observacion==3){
						$query="UPDATE resultados_eventos_competencia_libre SET  observacion= 'DQSD', posicion_final='503' WHERE numero_deportista='$numero_deportista' AND listado= '$id_listado'";
					}else if($observacion==4){
						$query="UPDATE resultados_eventos_competencia_libre SET  observacion= 'DNSP', posicion_final='501' WHERE numero_deportista='$numero_deportista' AND listado= '$id_listado'";
					}
					$result=$mysqli->query($query);
					if($result){
						echo 1; //Se ha guardado los resultados!
					} else {
						echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
					}
				}else{
					echo 2;
				}
			}else{
				if($observacion>0){
					echo 11;
				}else{
					$posicion= $_POST['posicion'];
					$consulta = "SELECT COUNT(*) posicion FROM resultados_eventos_competencia_libre WHERE posicion= '$posicion' AND listado = '$id_listado'";
					$result1 = $mysqli->query($consulta)  or die($mysqli->error);
					$respuesta = $result1->fetch_assoc();
					$cuantos = $respuesta['posicion'];
					if($cuantos==0){
						$query="UPDATE resultados_eventos_competencia_libre SET  posicion= '$posicion', posicion_final='$posicion'  WHERE numero_deportista='$numero_deportista' AND listado= '$id_listado'";
						$result=$mysqli->query($query);
						
						if($result){
							echo 1; //Se ha guardado los resultados!
						} else {
							echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
						}
					}else{
						echo 10;
					}
				}
		 	}
		}
	}else{
		echo 22;//el formulario esta vacio
	}
?>