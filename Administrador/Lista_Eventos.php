<?php
  require_once('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
    header("location: Login.php");
  }

  $idUsuario = $_SESSION['codigo_usuario'];
  $sql = "Select * FROM usuarios WHERE Usuario='$idUsuario'";
  $result=$mysqli->query($sql);
  $user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista Eventos | | LIPACUN</title>
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
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="navbar"></div><br>
					<div class="card text-left">
					  <h5 class="card-header">
						<b><center>Lista de Eventos</center></b>
					  </h5>
					  <div class="card-body">
						<button class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevoseventosmodal">
							Nuevo Evento <i class="fa fa-plus-circle"></i>
						</button>
						<hr>
						<div id="tablaEventos"></div>
					  </div>
					  <div class="card-footer text-muted">
						<center>LIPACUN | Copyright <?php auto_copyright(); // Current year?> Todos los derechos reservados | By Brian y John</center>
					  </div>
					</div>
				</div>
			</div>
			<br><br/>
		</div>
		<br><br/>
		<!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
		<div class="footer2">
			<footer>Bienvenido <?php echo $user['Rol'] ?> <button class="fas"><i class="fas fa-user-alt"></i></button>&nbsp; &nbsp;
                <a href="../Logout.php"><button class="btn btn-info">Cerrar Sesión</button></a>
				<button class="btn btn-info" onclick="history.back()">Volver</button>
            </footer>
		</div>
		<!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
	</center>
	<!-- Modal Nuevo Evento -->
	<div class="modal fade" id="agregarnuevoseventosmodal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="staticBackdropLabel">Nuevo Evento</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			  <form id="frmnuevo">
				  <div class="form-group">
					  <label for="Nombre">Nombre Evento:</label>
					  <input type="text" class="form-control" id="Nombre" name="Nombre" required>
				  </div>
				  <div class="form-group">
					  <label for="Municipio">Municipio Evento:</label>
					  <select class="form-control" id="Municipio" name="Municipio" required>
						<option selected disabled value="">- Selecciona un Municipio -</option>
						<?php
							$query = $mysqli -> query ("select * FROM municipios where id_municipio !='1101' and departamento_id = '25'");     
							while ($valores = mysqli_fetch_array($query)) {
								echo '<option value="'.$valores['id_municipio'].'">'.$valores['municipio'].'</option>';          
							}
						?>
					  </select>
				  </div>
				  <div class="form-group">
					  <label for="tipo_evento">Tipo de Evento:</label>
					  <select class="form-control" id="tipo_evento" name="tipo_evento" required>
						<option selected disabled value="">- Selecciona un tipo de evento -</option>
						<?php
							$query = $mysqli -> query ("select * FROM tipo_eventos");     
							while ($valores = mysqli_fetch_array($query)) {
								echo '<option value="'.$valores['tipo_evento'].'">'.$valores['tipo_evento'].'</option>';          
							}
						?>
					  </select>
				  </div>
				  <div class="form-group">
					  <label for="fecha_evento">Fecha Evento:</label>
					  <input type="date" class="form-control" id="fecha_evento" name="fecha_evento" min='<?php echo date("Y-m-d");?>' max='' required>
				  </div>
			  </form>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="button" id="btnAgregarevento" class="btn btn-primary">Terminar</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Fin Modal Nuevo Evento -->
	<!-- Modal Editar Evento -->
	<div class="modal fade" id="editareventosmodal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="staticBackdropLabel">Editar Evento</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			  <form id="frmeditar">
				  <div class="form-group">
					  <label for="id">id:</label>
					  <input type="number" class="form-control" id="id" name="id" readonly>
				  </div>
				  <div class="form-group">
					  <label for="Nombre1">Nombre Evento:</label>
					  <input type="text" class="form-control" id="Nombre1" name="Nombre1" required>
				  </div>
				  <div class="form-group">
					  <label for="Municipio1">Municipio Evento:</label>
					  <select class="form-control" id="Municipio1" name="Municipio1" required>
						<option selected disabled value="">- Selecciona un Municipio -</option>
						<?php
							$query = $mysqli -> query ("select * FROM municipios where id_municipio !='1101'");     
							while ($valores = mysqli_fetch_array($query)) {
								echo '<option value="'.$valores['id_municipio'].'">'.$valores['municipio'].'</option>';          
							}
						?>
					  </select>
				  </div>
				  <div class="form-group">
					  <label for="tipo_evento1">Tipo de Evento:</label>
					  <select class="form-control" id="tipo_evento1" name="tipo_evento1" required>
						<option selected disabled value="">- Selecciona un tipo de evento -</option>
						<?php
							$query = $mysqli -> query ("select * FROM tipo_eventos");     
							while ($valores = mysqli_fetch_array($query)) {
								echo '<option value="'.$valores['tipo_evento'].'">'.$valores['tipo_evento'].'</option>';          
							}
						?>
					  </select>
				  </div>
				  <div class="form-group">
					  <label for="fecha_activacion1">Fecha Activación:</label>
					  <input type="date" class="form-control" id="fecha_activacion1" name="fecha_activacion1" min='<?php echo date("Y-m-d");?>' max='' readonly>
				  </div>
				  <div class="form-group">
					  <label for="fecha_evento1">Fecha Evento:</label>
					  <input type="date" class="form-control" id="fecha_evento1" name="fecha_evento1" min='<?php echo date("Y-m-d");?>' max='' required>
				  </div>
			  </form>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="button" id="btnEditarevento" class="btn btn-primary">Actualizar</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Fin Modal Editar Evento -->
</body>
</html>

<?php
/* 
  No argument required for current year.
  Otherwise, pass start year as a 4-digit value.
*/
function auto_copyright($startYear = null) {
	if (!is_numeric($startYear) || intval($startYear) >= date('Y')) {
		echo "&copy; " . date('Y'); // display current year if $startYear is same or greater than this year
	} else {
		// Display range of years. Replace date('Y') with date('y') to display range of years in YYYY-YY format.
		echo "&copy; " . intval($startYear) . "&ndash;" . date('Y'); 
	}
}
?>

<!-- Js Files_________________________________ -->

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaEventos').load('Tabla_Eventos.php');
	});
</script>

<script type="text/javascript">
	function agregarFrmActualizar(id){
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:"../procesos/obtenDatosActualizarEvento.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#id').val(datos['id']);
				$('#Nombre1').val(datos['nombre']);
				$('#Municipio1').val(datos['municipio']);
				$('#tipo_evento1').val(datos['tipo_evento']);
				$('#fecha_activacion1').val(datos['fecha_activacion']);
				$('#fecha_evento1').val(datos['fecha_evento']);
			}
		})
	}
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarevento').click(function(){
			datos=$('#frmnuevo').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/Crear_Evento.php",
				success:function(r){
					if(r==0){
						$('#frmnuevo')[0].reset();
						alertify.error("ERROR PRESENTADO - No se ha podido registrar el evento");
					}else if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaEventos').load('Tabla_Eventos.php');
						alertify.success("El evento se ha registrado exitosamente!");
					}else if(r==2){
						$('#frmnuevo')[0].reset();
						alertify.error("ERROR PRESENTADO - El evento ya se encuentra registrado!");
					}else if(r==11){
						alertify.error("Proporcione un nombre de evento válido.");
					}else if(r==22){
						alertify.error("Por favor seleccione un municipio válido.");
					}else if(r==33){
						alertify.error("Por favor seleccione un tipo de evento válido.");
					}else if(r==44){
						alertify.error("Por favor seleccione una fecha válida.");
					}else{
						alertify.error("Por favor llene todos los campos del formulario correctamente");
					}
				}
			});
		});
		$('#btnEditarevento').click(function(){
			datos=$('#frmeditar').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/Editar_Evento.php",
				success:function(r){
					if(r==0){
						alertify.error("ERROR PRESENTADO - No se ha podido actualizar el evento, por favor intente nuevamente");
					}else if(r==1){
						$('#tablaEventos').load('Tabla_Eventos.php');
						alertify.success("Se ha actualizado el evento exitosamente!");
					}else if(r==2){
						alertify.alert("Atención","La edición del evento no esta disponible porque ya hay deportistas inscritos.");
					}else if(r==11){
						alertify.error("Proporcione un nombre de evento válido.");
					}else if(r==22){
						alertify.error("Por favor seleccione un municipio válido.");
					}else if(r==33){
						alertify.error("Por favor seleccione un tipo de evento válido.");
					}else if(r==55){
						alertify.error("Por favor seleccione una fecha de evento válida.");
					}else{
						//alertify.error("Por favor llene todos los campos del formulario correctamente");
						alertify.alert("Error",r);
					}
				}
			});
		});
	});
</script>