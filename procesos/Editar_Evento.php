<?php
	require_once('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
		header("location: ../Administrador/Login.php");
	}

	if(!empty($_POST['Nombre1'])){
		if(!empty($_POST['Municipio1'])){
			if(!empty($_POST['tipo_evento1'])){
				if(!empty($_POST['fecha_activacion1'])){
					if(!empty($_POST['fecha_evento1'])){
						//recibir los datos del formulario editar evento
						$id=$_POST['id'];
						$nombre=$_POST['Nombre1'];
						$ciudad=$_POST['Municipio1'];
						$tipo_evento=$_POST['tipo_evento1'];
						$fecha_activacion=$_POST['fecha_activacion1'];
						$fecha_evento=$_POST['fecha_evento1'];
						
						$nombre_evento = $_SESSION['nombre_evento'];
						$sql="SELECT * FROM inscripcion_evento_clubes WHERE evento = '$nombre_evento'";
						$resultado=$mysqli->query($sql);
						$row=$resultado->num_rows;
						if($row==0){
							$query="update eventos SET nombre= '$nombre', municipio= '$ciudad', tipo_evento= '$tipo_evento', fecha_activacion= '$fecha_activacion', fecha_evento= '$fecha_evento' WHERE id='$id'";
							$result=$mysqli->query($query);
							if($result){
								echo 1; //Se ha actualizado el evento!
							} else {
								echo 0; //ERROR PRESENTADO  - Por favor intente nuevamente
							}
						}else{
							$sql="DELETE FROM inscripcion_evento_clubes WHERE evento = '$nombre_evento'";
							$resultado=$mysqli->query($sql);
							$query="update eventos SET nombre= '$nombre', municipio= '$ciudad', tipo_evento= '$tipo_evento', fecha_activacion= '$fecha_activacion', fecha_evento= '$fecha_evento' WHERE id='$id'";
							$result=$mysqli->query($query);
							if($result){
								echo 1; //Se ha actualizado el evento!
							} else {
								echo 2; //ERROR PRESENTADO  - Por favor intente nuevamente
							}
						}
					}else{
						echo 55;
					}
				}else{
					if(!empty($_POST['fecha_evento1'])){
						echo 44;
					}
				}
			}else{
				if(!empty($_POST['fecha_activacion1'])){
					if(!empty($_POST['fecha_evento1'])){
						echo 33;
					}
				}
			}
		}else{
			if(!empty($_POST['tipo_evento1'])){
				if(!empty($_POST['fecha_activacion1'])){
					if(!empty($_POST['fecha_evento1'])){
						echo 22;
					}
				}
			}
		}
	}else{
		if(!empty($_POST['Municipio1'])){
			if(!empty($_POST['tipo_evento1'])){
				if(!empty($_POST['fecha_activacion1'])){
					if(!empty($_POST['fecha_evento1'])){
						echo 11;
					}
				}
			}
		}
	}
?>