<?php
	require('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
		header("location: Login.php");
	}

	$idUsuario = $_SESSION['codigo_usuario'];
	$sql = "Select * FROM usuarios WHERE Usuario='$idUsuario'";
	$result=$mysqli->query($sql);
	$user = $result->fetch_assoc();

	// Formato 24 horas (de 1 a 24) 
	$hora = date('G');
	if (($hora >= 0) AND ($hora < 6)) { 
		$mensaje = "Buena madrugada, "; 
	} else if (($hora >= 6) AND ($hora < 12)) { 
		$mensaje = "Buenos dias, "; 
	} else if (($hora >= 12) AND ($hora < 18)) { 
		$mensaje = "Buenas tardes, "; 
	} else { 
		$mensaje = "Buenas noches, "; 
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Administrador | | LIPACUN</title>
	<?php require_once "scripts.php"; ?>
</head>
<body>
	<center>
		<div class="panel-heading"><!--https://www.lipacun.com/-->
			<a href="Index.php"><img src="../imagenes/iconos/Logo.webp" alt="Logo" class="logo" height="90"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/1.webp" alt="favicon1" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/2.webp" alt="favicon2" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/3.webp" alt="favicon3" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/4.webp" alt="favicon4" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/Cundinamarca_logo.webp" alt="Logo" class="logo" height="90">
		</div><hr>
		
		<div class="contenedor">
	      <div class="admi">
			<h1><?php echo $mensaje. "Administrador."; ?> </h1>
			</div>
		</div>
		
		<footer>
			<div class="footer-container">
				<div class="footer-main-admin">
					<div class="footer-columna-admin">
						<a href="Clubes.php"><button class="botones"><i><img src="../imagenes/iconos/checked-user-male--v1.png"/></i></button></a>
						<a href="Clubes.php"><h3>Validar Nuevos Clubes</h3></a><hr>
					</div><br>

					<div class="footer-columna-admin">
						<a href="Lista_Clubes.php"><button class="botones"><i><img src="../imagenes/iconos/services.png"/></i></button></a>
						<a href="Lista_Clubes.php"><h3>Administrar los Clubes</h3></a><hr>
					</div><br>

					<div class="footer-columna-admin">
						<a href="Lista_Eventos.php"><button class="botones"><i><img src="../imagenes/iconos/edit-calendar.png"/></i></button></a>
						<a href="Lista_Eventos.php"><h3>Administar Eventos</h3></a><hr>
					</div>
					
					<div class="footer-columna-admin">
						<a href="Listar_Deportistas.php"><button class="botones"><i><img src="../imagenes/iconos/group.png"></i></button></a>
						<a href="Listar_Deportistas.php"><h3>Deportistas de Cundinamarca</h3></a><hr>
					</div>
				</div>
			</div>
		</footer>
		<!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
		<div class="footer2">
			<footer>Bienvenido <?php echo $user['Rol'] ?> <button class="fas"><i class="fas fa-user-alt"></i></button>&nbsp; &nbsp;
                <a href="../Logout.php"><button class="btn btn-info">Cerrar Sesión</button></a>
				<a href="Cambiar_Contraseña.php"><button class="btn btn-info">Cambiar Contraseña</button></a>
			</footer>
		</div>
		<!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
	</center>
</body>
</html>