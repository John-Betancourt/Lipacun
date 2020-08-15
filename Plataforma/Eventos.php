<?php
  require('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["nombre_corto"]==""){
    header("location: ../Login.php");
  }

  $idUsuario = $_SESSION['nombre_corto'];
  $sql = "Select * FROM clubes WHERE nombre_corto_club='$idUsuario'";
  $result=$mysqli->query($sql);
  $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Administrar Eventos || LIPACUN</title>
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
			<h1>EVENTOS DE LIPACUN</h1>
			</div>
		</div>
		
		<footer>
			<div class="footer-container">
				<div class="footer-main">
					<div class="footer-columna">
						<a href="Inscribir_Evento.php"><button class="botones"><i><img src="../imagenes/iconos/edit-calendar.png"/></i></button></a>
						<a href="Inscribir_Evento.php"><h3>Inscribir club a evento</h3></a><hr>
					</div><br>

					<div class="footer-columna">
						<a href="#" data-toggle="modal" data-target="#inscribirdeportistaseventosmodal"><button class="botones"><i><img src="../imagenes/iconos/add-user-group-man-man--v1.png"/></i></button></a>
						<a href="#" data-toggle="modal" data-target="#inscribirdeportistaseventosmodal"><h3>Inscribir deportitas a evento</h3></a><hr>
					</div><br>

					<div class="footer-columna">
						<a href="Resultados/Eventos.php"><button class="botones"><i><img src="../imagenes/iconos/report-card.png"/></i></button></a>
						<a href="Resultados/Eventos.php"><h3>Resultados</h3></a><hr>
					</div>
				</div>
			</div>
		</footer><!--<a href="#" data-toggle="modal" data-target="#inscribirdeportistaseventosmodal"-->
		<!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
		<div class="footer2">
			<footer>Bienvenido <?php echo $idUsuario; ?> <button class="fas"><i class="fas fa-user-alt"></i></button>&nbsp; &nbsp;
                <a href="../Logout.php"><button class="btn btn-info">Cerrar Sesión</button></a>
				<button class="btn btn-info" onclick="history.back()">Volver</button>
            </footer>
		</div>
		<!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
	</center>
	<!-- Modal Inscribir a Evento -->
	<div class="modal fade" id="inscribirdeportistaseventosmodal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="staticBackdropLabel"><strong>Evento a Inscribir Deportistas</strong></h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			  <form id="frmnuevo">
				  <div class="form-group">
					  <label for="Evento">Nombre Evento:</label>
					  <select class="form-control" id="Evento" name="Evento" required>
						<option value="0" selected disabled >- Seleccione el Evento -</option>
						<?php
							$query = $mysqli->query("SELECT * FROM inscripcion_evento_clubes WHERE club = '$idUsuario'");
							while ($datos = mysqli_fetch_array($query)) {
								$evento = $datos['evento'];
								$fecha_actual = date("Y-m-d");

								$sql = "SELECT * FROM eventos WHERE nombre = '$evento' AND fecha_evento <= '$fecha_actual'";
								//echo '<option value="'.$sql.'">'.$sql.'</option>';
								$resultado = $mysqli->query($sql);
								$row = $resultado->num_rows;
								if($row > 0){
									$valores = $resultado->fetch_assoc();
									echo '<option value="'.$valores['nombre'].'">'.$valores['nombre'].'</option>';
								}
							}
						?>
					  </select>
				  </div>
			  </form>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			<button type="button" id="btnAgregardeportistaevento" class="btn btn-primary">Enviar</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Fin Modal Inscribir a Evento -->
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregardeportistaevento').click(function(){
			var evento = $('#Evento').val();
			if(evento==null){
				alertify.error("Por favor seleccione un evento válido.");
			}else if(evento!=0){
				window.open('../Plataforma/Deportistas_Evento.php?id='+evento,'_self');
			}
		});
	});
</script>