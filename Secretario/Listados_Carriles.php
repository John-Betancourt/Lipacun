<?php
  require('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
    header("location: ../Administrador/Login.php");
  }

  $idUsuario = $_SESSION['codigo_usuario'];
  $sql = "Select * FROM usuarios WHERE Usuario='$idUsuario'";
  $result=$mysqli->query($sql);
  $user = $result->fetch_assoc();

  $Evento = $_SESSION['Evento'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista Competencias Remates | | LIPACUN</title>
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
					<div class="justify-content-end align-items-center"><!--d-flex -->
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="Index.php">Pagina Principal</a></li>
							<li class="breadcrumb-item"><a href="Competencias.php">Módulo Competencias</a></li>
							<li class="breadcrumb-item active">Listados Remates</li>
						</ol>
					</div>
					<div class="card text-left">
					  <h5 class="card-header">
						<b><center>Lista Competencias de Carriles Evento "<?php echo $Evento; ?>"</center></b>
					  </h5>
					  <div class="card-body">
						<button class="btn btn-outline-success" data-toggle="modal" data-target="#agregarlistadorematesmodal">
							Nuevo Listado <i class="fa fa-plus-circle"></i>
						</button>
						<hr>
						<div id="tabla_listados_carriles"></div>
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
			<footer>Bienvenido <?php echo $user['Rol'] ?><button class="fas"><i class="fas fa-user-alt"></i></button>&nbsp; &nbsp; &nbsp;
                <a href="../Logout.php"><button class="btn btn-info">Cerrar Sesión</button></a>
				<button class="btn btn-info" onclick="history.back()">Volver</button>
            </footer>
		</div>
		<!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
	</center>
	<!-- Modal Nuevo Evento -->
	<div class="modal fade" id="agregarlistadorematesmodal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="staticBackdropLabel">Nueva Competencia Carriles</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			  <form id="frmguardar">
				  <div class="form-group">
					  <label for="evento">Nombre Evento:</label>
					  <input type="text" class="form-control" id="evento" name="evento" value="<?php echo $Evento; ?>" readonly>
				  </div>
				  <div class="form-group">
					  <label for="listado_cri">Competencias CRI:</label>
					 <select class="form-control" id="listado_cri" name="listado_cri" required>
						<option selected disabled value="">- Selecciona una competencia -</option>
						<?php
							$query = $mysqli -> query ("SELECT * FROM listados_eventos WHERE evento ='$Evento' AND tipo_competencia = 'Contrareloj Individual' AND estado = 'terminado'");     
							while ($valores = mysqli_fetch_array($query)) {
								$id_listado = $valores['id'];
								$consulta = "SELECT COUNT(*) cantidad FROM resultados_eventos_competencia_velocidad WHERE listado = '$id_listado'";
								$result1 = $mysqli->query($consulta)  or die($mysqli->error);
								$counts = $result1->fetch_assoc();
								$count = $counts['cantidad'];
								if($count>=16){
									echo '<option value="'.$valores['nombre_listado'].'">'.$valores['nombre_listado'].'</option>';
								}
							}
						?>
					  </select>
				  </div>
			  </form>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			<button type="button" id="btnGuardarlistado" class="btn btn-primary">Guardar Listado</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Fin Modal Nuevo Evento -->
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
	$('#tabla_listados_carriles').load('Tabla_Listados_Carriles.php');
	Evento="<?php echo $Evento ?>";
	$(document).ready(function(){
		$('#btnGuardarlistado').click(function(){
			datos=$('#frmguardar').serialize();
			
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/Guardar_listado_Carriles.php",
				success:function(r){
					if(r==0){
						alertify.error("ERROR PRESENTADO -  El listado no se ha podido guardar");
					}else if(r==1){
						alertify.success("El listado se ha guardado exitosamente!");
						$('#tabla_listados_carriles').load('Tabla_Listados_Carriles.php');
						//$('#frmguardar')[0].reset();
						//$('#evento').val('<!?php echo $Evento; ?>');
					}else if(r==2){
						alertify.error("El listado ya se encuentra registrado!");
						$('#frmguardar')[0].reset();
						$('#evento').val('<?php echo $Evento; ?>');
					}else if(r==3){
						alertify.error("Proporcione la información requerida para guardar el listado");
					}else if(r==4){
						alertify.error("ERROR PRESENTADO - por favor recarge esta pagina e intente nuevamente");
					}else{
						alertify.alert("Error: ",r);
					}
				}
			});
			Listado = $('#listado_cri').val();
			$.ajax({
				type:"POST",
				data: {"Evento" : Evento, "Listado" : Listado},
				url:"../procesos/Crear_Tabla_Resultados_Carriles_db.php",
				success:function(r){
					//alertify.success("Todo va bien");
					if(r==0){
						//alertify.success("Creando tabla de subir resultados de la competencia");
						alertify.success("Preparando tabla de subir resultados para su primer uso");
						//alertify.alert("ERROR PRESENTADO", "No se ha podido al intentar crear la tabla para subir resultados");
						alertify.error("Upss... Algo salió mal. :(");
						alertify.alert("ERROR PRESENTADO", "Se ha presentado un error estructural al crear la tabla para subir resultados.");
					}else if(r==1){
						Llenar = "Llenar";
						alertify.success("Preparando tabla de subir resultados para su primer uso");
						$.ajax({
							type:"POST",
							data: {"Evento" : Evento, "Listado" : Listado, "Llenar" : Llenar},
							url:"../procesos/Crear_Tabla_Resultados_Carriles_db.php",
							success:function(R){
								if(R==0){//ERROR PRESENTADO - No se ha podido registrar el deportista a la tabla de resultado
									alertify.error("Upss... Algo salió mal. :(");
									alertify.alert("ERROR PRESENTADO", "Se ha presentado un error estructural al crear la tabla para subir resultados.");
								}else if(R==1){//Se ha registrado el deportista a la tabla de resultados!
									alertify.success("Tabla lista para subir resultados");
								}else if(R==2){//
									alertify.success("No hay deportistas inscritos a la competencia");
								}else{
									alertify.error("Upss... Algo salió mal.");
									alertify.alert("Error ",R);
									//alertify.alert("ERROR PRESENTADO", "Se ha presentado un error estructural al crear la tabla para subir resultados: "+R);
								}
							}
						});
					}else if(r==2){
						Actualizar = "Actualizar";
						alertify.success("Preparando tabla de subir resultados");
						$.ajax({
							type:"POST",
							data: {"Evento" : Evento, "Listado" : Listado, "Actualizar" : Actualizar},
							url:"../procesos/Crear_Tabla_Resultados_Carriles_db.php",
							success:function(R){
								if(R==0){//ERROR PRESENTADO - No se ha podido registrar el deportista a la tabla de resultado
									alertify.error("Upss... Algo salió mal. :(");
									alertify.alert("ERROR PRESENTADO", "No se ha podido actulizar los deportistas inscritos a la tabla de subir resultados.");
								}else if(R==1){//Se ha registrado el deportista a la tabla de resultados!
									alertify.success("Tabla lista para subir resultados");
								}else if(R==2){//
									alertify.success("No hay deportistas inscritos a la competencia");
								}else{
									alertify.error("Upss... Algo salió mal.");
									alertify.alert("Error "+R);
									//alertify.alert("ERROR PRESENTADO", "Se ha presentado un error estructural al crear la tabla para subir resultados: "+R);
								}
							}
						});
					}
				},
				error:function(r){
					alertify.alert("Error: ",r);
				}
			});
		});
	});
</script>