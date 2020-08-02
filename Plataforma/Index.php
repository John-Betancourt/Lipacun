<?php
  require_once('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["nombre_corto"]==""){
    header("location: ../Login.php");
  }

  $idUsuario = $_SESSION['nombre_corto'];
  $sql = "Select * FROM clubes WHERE nombre_corto_club='$idUsuario'";
  $result=$mysqli->query($sql);
  $row = $result->fetch_assoc();

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
	<title>Club y/o Escuela de Cundinamarca</title>
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
			<h1><?php echo $mensaje." ".$idUsuario."."; ?> </h1>
			</div>
		</div>
		
		<footer>
			<div class="footer-container">
				<div class="footer-main">
					<div class="footer-columna">
						<a href="../Inscripciones/Deportistas.php"><button class="botones"><i><img src="../imagenes/iconos/add-user-male--v1.png"/></i></button></a>
						<a href="../Inscripciones/Deportistas.php"><h3>Incribir a nuevo deportista</h3></a><hr><!--fa fa-user-->
					</div><br>

					<div class="footer-columna">
						<a href="Eventos.php"><button class="botones"><i><img src="../imagenes/iconos/calendar.png"/></i></button></a>
						<a href="Eventos.php"><h3>Eventos</h3></a><hr><!--fa fa-calendar-->
					</div><br>

					<div class="footer-columna">
						<a href="Listar_Deportistas.php"><button class="botones"><i><img src="../imagenes/iconos/group.png"></i></button></a>
						<a href="Listar_Deportistas.php"><h3>Mis deportistas</h3></a><hr><!--fa fa-users-->
					</div>
				</div>
			</div>
		</footer>
		<!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
		<div class="footer2">
			<footer>Bienvenido <?php echo $idUsuario; ?> <button class="fas"><i class="fas fa-user-alt"></i></button>&nbsp; &nbsp;
                <a href="../Logout.php"><button class="btn btn-info">Cerrar Sesión</button></a><!--fa fa-user-->
				<a href="Cambiar_Contraseña.php"><button class="btn btn-info">Cambiar Contraseña</button></a>
            </footer>
		</div>
		<!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
	</center>
</body>
</html>