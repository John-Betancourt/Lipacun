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
  if(!empty($_REQUEST)){
	  $_SESSION['Evento'] = $_REQUEST['id'];
	  $Evento = $_SESSION['Evento'];
  }else{
	  $Evento = $_SESSION['Evento'];
  }
  
  if (empty($_SESSION['Evento'])){
	  $response['response'] = "ERROR PRESENTADO - No ha seleccionado un evento valido.";
	  $response['type_response'] = 0; ?>
	  <script>alert('<?php echo $response['response'] ?>')</script>
	  <script>window.history.back()</script>
<?php } ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inscripción || LIPACUN</title>
	<?php require_once "scripts.php"; ?>
</head>
<body>
	<center>
		<div class="panel-heading"><!--https://www.lipacun.com/-->
			<a href="Eventos.php"><img src="../imagenes/iconos/Logo.webp" alt="Logo" class="logo" height="90"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
						<b><center>Deportistas Inscritos al Evento "<?php echo $Evento; ?>"</center></b>
					  </h5>
					  <div class="card-body">
						<!--a href="../Inscripciones/Evento.php"><button class="btn btn-primary">Inscribir Deportista</button></a-->
						<button class="btn btn-outline-primary" data-toggle="modal" data-target="#inscribirdeportistaseventosmodal">
							Inscribir Deportista <i class="fa fa-plus-circle"></i>
						  </button>
						<hr>
						<div id="tablaDeportistasEvento"></div>
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
			<footer>Bienvenido <?php echo $idUsuario; ?> <button class="fas"><i class="fas fa-user-alt"></i></button>&nbsp; &nbsp; &nbsp;
                <a href="../Logout.php"><button class="btn btn-info">Cerrar Sesión</button></a>
				<button class="btn btn-info" onclick="history.back()">Volver</button>
            </footer>
		</div>
		<!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
	</center>
	<!-- Modal Inscribir Deportista Evento -->
	<div class="modal fade" id="inscribirdeportistaseventosmodal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
					  <label for="Evento">Nombre Evento:</label>
					  <select class="form-control" id="Evento" name="Evento" required onchange="CambioEvento()">
						<option selected disabled value="">- Nombre del Evento -</option>
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
				  <div class="form-group">
					  <label for="Identificacion">Identificación Deportista</label>
					  <input type="number" class="form-control" id="Identificacion" name="Identificacion" minlength="8" maxlength="12" required>
				  </div>
			  </form>
		  </div>
		  <div class="modal-footer">
			<button type="button" id="limpiar" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			<button type="button" id="btnAgregardeportistaevento" class="btn btn-primary">Enviar</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Fin Modal Inscribir Deportista Evento -->
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

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDeportistasEvento').load('Tabla_Deportistas_Evento.php');
		$('#Evento').val("<?php echo $Evento ?>");
	});

	function CambioEvento(){
		var evento = $('#Evento').val();
		window.open('Deportistas_Evento.php?id='+evento,'_self');
	}
</script>

<script type="text/javascript">
	$(document).ready(function(){

		$('#limpiar').click(function() {
		$('#Identificacion').val("");
		});

		$('#btnAgregardeportistaevento').click(function(){
			datos=$('#frmnuevo').serialize();
			identificacion = $('#Identificacion').val();
			evento = $('#Evento').val();

			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/Inscribir_Deportista_Evento.php",
				success:function(r){
					if(r==0){
						$('#frmnuevo')[0].reset();
						alertify.error("ERROR PRESENTADO - El deportista no se ha podido registrar al evento");
						$('#Evento').val("<?php echo $Evento ?>");
					}else if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDeportistasEvento').load('Tabla_Deportistas_Evento.php');
						alertify.success("El deportista se ha registrado al evento exitosamente!");
						$('#Evento').val("<?php echo $Evento ?>");
					}else if(r==2){
						$('#frmnuevo')[0].reset();
						alertify.error("Atención - El Deportista ya se encuentra registrado al evento!");
						$('#Evento').val("<?php echo $Evento ?>");
					}else if(r==3){
						$('#frmnuevo')[0].reset();
						alertify.alert("Atención","El deportista que intenta inscribir, no cumple con los requisitos para la inscripción a este evento o no se encuentra ligado a la Liga de Patinaje de Cundinamarca!");
						$('#Evento').val("<?php echo $Evento ?>");
					}else if(r==4){
						$('#frmnuevo')[0].reset();
						alertify.alert("Atención","El deportista que intenta inscribir, está inscrito en otro club! Si realizo el cambio de club, por favor comunicarse con el administrador del sistema");
						$('#Evento').val("<?php echo $Evento ?>");
					}else if(r==5){
						$('#frmnuevo')[0].reset();
						alertify.alert("Atención","El deportista NO tiene numero asignado, por favor comuniquese con el administrador del sistema!");
						$('#Evento').val("<?php echo $Evento ?>");
					}else if(r==6){
						alertify.defaults.theme.cancel = "btn btn-secondary";
						alertify.confirm('Atención','El Deportista que intenta inscribir con la identificación "'+identificacion+'" al evento "'+evento+'", NO EXISTE o se le ha dado de baja. Para inscribirlo al club presione "Inscribir"; Si escribio mal la identificación y desea corregirla presione "Corregir".',function(){
							window.open('../Inscripciones/Form_Deportistas.php','_self');
						},function(){
							
						}).set({labels:{ok:'Inscribir', cancel:'Corregir'}});
					}else if(r==11){
						alertify.error("Por favor seleccione un evento válido.");
					}else if(r==22){
						alertify.error("Proporcione una identificación de deportista válida.");
					}else{
						alertify.error("Por favor llene todos los campos del formulario correctamente");
					}
				}
			});
		});
	});
</script>

<script type="text/javascript">
	function EliminarDeportistaEvento(id){
		alertify.confirm('<strong>Eliminar Deportista del Evento</strong>','¿Esta seguro de eliminar el  deportista "'+id+'" del evento?, para confirmar la acción presione continuar.',function(){
			alertify.defaults.theme.cancel = "btn btn-danger";
			$.ajax({
				type:"POST",
				data:"id="+id,
				url:"../procesos/Eliminar_Deportista_Evento.php",
				success:function(r){
					if(r==0){
						alertify.error("ERROR PRESENTADO - No se ha podido eliminar el deportista del evento, por favor intente nuevamente.");
					}else if(r==1){
						$('#tablaDeportistasEvento').load('Tabla_Deportistas_Evento.php');
						alertify.success("El deportista se ha eliminado del evento correctamente.");
					}
				}
			});
		},function(){
			alertify.error('Cancelado');
		}).set({labels:{ok:'Continuar', cancel:'Cancelar'}});
	}
</script>
