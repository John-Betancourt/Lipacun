<?php
  require_once('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
    header("location: ../Administrador/Login.php");
  }

  $idUsuario = $_SESSION['codigo_usuario'];
  $sql = "Select * FROM usuarios WHERE Usuario='$idUsuario'";
  $result=$mysqli->query($sql);
  $user = $result->fetch_assoc();

  if(!empty($_REQUEST)){
	  $_SESSION['Evento'] = $_REQUEST['Evento'];
  }
  $Evento = $_SESSION['Evento'];

  $sql1 = "SELECT tipo_evento FROM eventos WHERE nombre='$Evento'";
  $sql_result=$mysqli->query($sql1);
  $Array_Evento = $sql_result->fetch_assoc();
  $Tipo_Evento = $Array_Evento['tipo_evento'];
  $_SESSION['Tipo_Evento'] = $Tipo_Evento;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Eventos -> Competencia | LIPACUN</title>
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
			<h1 class="text-uppercase">COMPETENCIAS "<?php echo $Evento ?>"</h1>
			</div>
		</div>
		
		<footer>
			<div class="footer-container">
				<div class="footer-main">
					<div class="footer-columna">
						<a href="Subir_Resultados.php?Competencia=Habilidad"><button class="botones"><i><img src="../imagenes/iconos/figure-kating.png"/></i></button></a>
						<a href="Subir_Resultados.php?Competencia=Habilidad"><h3>Habilidad</h3></a><hr>
					</div>
					
					<div class="footer-columna">
						<a href="#" data-toggle="modal" data-target="#staticBackdrop"><button class="botones"><i><img src="../imagenes/iconos/roller-skatingh.png"/></i></button></a>
						<a href="#" data-toggle="modal" data-target="#staticBackdrop"><h3>Fondo</h3></a><hr>
					</div>
					
					<div class="footer-columna">
						<a href="#" data-toggle="modal" data-target="#staticBackdrop2"><button class="botones"><i><img src="../imagenes/iconos/speed-skating.png"/></i></button></a>
						<a href="#" data-toggle="modal" data-target="#staticBackdrop2"><h3>Velocidad</h3></a><hr>
					</div>
					
					<div class="footer-columna">
						<a href="Subir_Resultados.php?Competencia=Libre"><button class="botones"><i><img src="../imagenes/iconos/roller-skating.png"/></i></button></a>
						<a href="Subir_Resultados.php?Competencia=Libre"><h3>Libre</h3></a><hr>
					</div>

					<div class="footer-columna">
						<a href="#" data-toggle="modal" data-target="#staticBackdrop3"><button class="botones"><i><img src="../imagenes/iconos/report-card.png"/></i></button></a>
						<a href="#" data-toggle="modal" data-target="#staticBackdrop3"><h3>Generar clasificacion por clubes</h3></a><hr>
					</div>
				</div>
			</div>
		</footer>
		<!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
		<div class="footer2">
			<footer>Bienvenido <?php echo $user['Rol'] ?><button class="fas"><i class="fas fa-user-alt"></i></button>&nbsp; &nbsp; &nbsp;
                <a href="../Logout.php"><button class="btn btn-info">Cerrar Sesión</button></a>
				<button class="btn btn-info" onclick="history.back()">Volver</button>
            </footer>
		</div>
		<!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
	</center>
	<!-- Modal Competencias Fondo-->
	<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="staticBackdropLabel">PLATAFORMA LIPACUN</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			Por favor seleccione el tipo de prueba a subir resultados:
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			<a href="Subir_Resultados.php?Evento=<?php echo $Evento; ?>&Competencia=Fondo:%20Puntos"><button type="button" class="btn btn-primary">Puntos</button></a>
			<a href="Subir_Resultados.php?Evento=<?php echo $Evento; ?>&Competencia=Fondo:%20Eliminación"><button type="button" class="btn btn-primary">Eliminación</button></a>
			<a href="Subir_Resultados.php?Evento=<?php echo $Evento; ?>&Competencia=Fondo:%20Puntos%20y%20Eliminación"><button type="button" class="btn btn-primary">Puntos + Eliminación</button></a>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Fin Modal Competencias Fondo-->
	<!-- Modal Competencias Velocidad -->
	<div class="modal fade" id="staticBackdrop2" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="staticBackdropLabel">PLATAFORMA LIPACUN</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			Por favor seleccione el tipo de prueba a subir resultados:
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			<a href="Subir_Resultados.php?Competencia=Velocidad&TipoCompetencia=Contrareloj%20Individual"><button type="button" class="btn btn-primary">Contrareloj Individual</button></a>
			<a href="Listados_Carriles.php"><button type="button" class="btn btn-primary">Carriles</button></a>
			<a href="Subir_Resultados.php?Competencia=Velocidad&TipoCompetencia=Vuelta%20al%20Circuito"><button type="button" class="btn btn-primary">Vuelta al Circuito</button></a>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Fin Modal Competencias Velocidad -->
	<!-- Modal Clasificacion Por Clubes -->
	<div class="modal fade" id="staticBackdrop3" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="staticBackdropLabel">PLATAFORMA LIPACUN</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			Por favor seleccione el tipo de patín:
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><?php
		if($Tipo_Evento=="Escuelas"){?>
			<a href="Resultados_Clubes.php?id=1"><button type="button" class="btn btn-primary">Semiprofesional</button></a>
			<a href="Resultados_Clubes.php?id=2"><button type="button" class="btn btn-primary">Profesional No Avanzado</button></a>
			<a href="Resultados_Clubes.php?id=3" disabled><button type="button" class="btn btn-primary" disabled>Profesional Avanzado</button></a> <?php
		}else if($Tipo_Evento=="Ranking"){ ?>
			<a href="Resultados_Clubes.php?id=1" disabled><button type="button" class="btn btn-primary" disabled>Semiprofesional</button></a>
			<a href="Resultados_Clubes.php?id=2" disabled><button type="button" class="btn btn-primary" disabled>Profesional No Avanzado</button></a>
			<a href="Resultados_Clubes.php?id=3"><button type="button" class="btn btn-primary">Profesional Avanzado</button></a> <?php
		} ?>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Fin Modal Clasificacion Por Clubes -->
</body>
</html>