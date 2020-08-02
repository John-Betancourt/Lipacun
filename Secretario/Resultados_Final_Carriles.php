<?php 
  require('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
    header("location: ../Administrador/Login.php");
  }

  $idUsuario = $_SESSION['codigo_usuario'];
  $sql = "Select * FROM usuarios WHERE Usuario='$idUsuario'";
  $result=$mysqli->query($sql);
  $row = $result->fetch_assoc();

  $Evento = $_SESSION['Evento'];
  $id_listado = $_REQUEST['id'];
  $_SESSION['id'] = $id_listado; 
 
?><!DOCTYPE html>  
<html lang="es">
<head>
	<title>Resultados Evento <?php echo $Evento; ?></title>
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
							<li class="breadcrumb-item"><a href="Listados_Carriles.php">Listados Carriles</a></li>
							<li class="breadcrumb-item active">Resultados Final</li>
						</ol>
					</div>
					<div class="card text-left">
					  <h5 class="card-header text-uppercase">
						<b><center>Resultados Evento "<?php echo $Evento; ?>"</center></b>
					  </h5>
					  <div class="card-body">
						<hr>
						<div id="tabla"></div>
					  </div>
					  <hr>
					  <center>
					  	<button id="btnprocesarresultados" class="btn btn-outline-warning">Terminar</button>
					  </center><br>
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
			<footer>Bienvenido <?php echo $row['Rol'] ?> <button class="fas"><i class="fas fa-user-alt"></i></button>&nbsp; &nbsp; &nbsp;
                <a href="../Logout.php"><button class="btn btn-info">Cerrar Sesión</button></a>
				<button class="btn btn-info" onclick="history.back()">Volver</button>
            </footer>
		</div>
		<!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
	</center>
	<!-- Modal Subir Resultados -->
	<div class="modal fade" id="subirresultadosmodal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="staticBackdropLabel">Subir Resultados Competencia</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			  <form id="frmsubir" onsubmit="event.preventDefault();" >
				  <div class="form-group">
					  <input type="hidden" class="form-control" id="fase" name="fase" value="Final" required>
					  <label for="numero_deportista">Numero Deportista:</label>
					  <input type="number" class="form-control" id="numero_deportista" name="numero_deportista" onChange="CambioModal()" required>
				  </div>
				  <div class="form-group">
					  <label for="nombres">Nombre(s) y Apellido(s) Deportista:</label>
					  <input type="text" class="form-control" id="nombres" name="nombres" readonly>
				  </div>
				  <div class="form-group">
					  <label for="tipo_patin">Tipo de Patín:</label>
					  <input type="text" class="form-control" id="tipo_patin" name="tipo_patin" readonly>
				  </div>
				  <div class="form-group">
					  <label for="minutos">Minutos:</label>
					  <input type="number" min="0" max="999" step="001" class="form-control" id="minutos" name="minutos" requerid>
				  </div>
				  <div class="form-group">
					  <label for="segundos">Segundos:</label>
					  <input type="number" min="0" max="999" step="001" class="form-control" id="segundos" name="segundos" requerid>
				  </div>
				  <div class="form-group">
					  <label for="milisegundos">Milisegundos:</label>
					  <input type="number" min="0" max="999" step="001" class="form-control" id="milisegundos" name="milisegundos" requerid>
				  </div>
				   <div class="form-group">
					  <label for="Observacion">Observaciones:</label>
					  <select class="form-control" id="Observacion" name="Observacion" required>
					    <option value="0" selected> - Seleccione - </option>
					  	<option value="1">NT</option>
					  	<option value="2">DQST</option>
					  	<option value="3">DQSD</option>
					  </select>
				  </div>
			 
			  </form>
		  </div>
		  <div class="modal-footer">
			<button type="button" id="limpiar" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="button" id="btnSubirresultados" class="btn btn-primary">Subir</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Fin Modal Subir Resultados -->
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
	$('#tabla').load('Tabla_Final_Carriles.php');

	function CargarModal(id){
		  id_listado = "<?php echo $id_listado; ?>";
 		$.ajax({
			type:"POST",
			data: {"id_listado" : id_listado, "id" : id},
			url:"../procesos/obtenDatosSubirResultadosCarriles.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#frmsubir')[0].reset();
				$('#numero_deportista').val(datos['numero_deportista']);
				$('#nombres').val(datos['nombres']);
				$('#tipo_patin').val(datos['tipo_patin']);
					var tiempo = datos['tiempo_final'];
					if(tiempo === null){
						console.log('ok');
					}else{
					var tiempo_array = tiempo == null ? null : tiempo.split(':');
					$('#minutos').val(tiempo_array[0]);
					$('#segundos').val(tiempo_array[1]);
					$('#milisegundos').val(tiempo_array[2]);
					}
					if(datos['observacion']=="NT"){
						$('#Observacion').val(1);
					}else if(datos['observacion']=="DQST"){
						$('#Observacion').val(2);
					}else if(datos['observacion']=="DQSD"){
						$('#Observacion').val(3);
					}
			}
		})
	}
	
	function CambioModal(){
		id_listado = "<?php echo $id_listado; ?>";
		id = $('#numero_deportista').val();
		$.ajax({
			type:"POST",
			data: {"id_listado" : id_listado, "id" : id},
			url:"../procesos/obtenDatosSubirResultadosCarriles.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#frmsubir')[0].reset();
				$('#numero_deportista').val(datos['numero_deportista']);
				$('#nombres').val(datos['nombres']);
				$('#tipo_patin').val(datos['tipo_patin']);
				
				var tiempo = datos['tiempo_final'];
				if(tiempo === null){
					console.log('ok');
				}else{
				var tiempo_array = tiempo == null ? null : tiempo.split(':');
				$('#minutos').val(tiempo_array[0]);
				$('#segundos').val(tiempo_array[1]);
				$('#milisegundos').val(tiempo_array[2]);
				}
				if(datos['observacion']=="NT"){
					$('#Observacion').val(1);
				}else if(datos['observacion']=="DQST"){
					$('#Observacion').val(2);
				}else if(datos['observacion']=="DQSD"){
					$('#Observacion').val(3);
				}else{
					$('#Observacion').val(0);
				}
			}
		})
	}
			
	
	$(document).ready(function(){
		$('#limpiar').click(function() {
		$('#Observacion').val(0);
		});
		
		$('#btnSubirresultados').click(function(){
			datos = $('#frmsubir').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/Subir_Resultados_Carriles.php",
				success:function(R){
					if(R==0){
						alertify.error("ERROR PRESENTADO - No se ha podido subir resultados de la competencia, por favor intente nuevamente");
					}else if(R==1){
						$('#frmsubir')[0].reset();
						alertify.success("Se ha guardado el resultado exitosamente!");
						$('#tabla').load('Tabla_Final_Carriles.php');
					}else if(R==2){
						alertify.error("Proporcione resultados validos para subirlos.");
					}else if(R==22){
						alertify.error("Proporcione un deportista valido.");
					}else if(R==4){
						alertify.error("Alerta: No puede poner observaciones si ingresa valores de tiempo.");
					}else{
						alertify.alert("Error",R);
					}
				}
			});
		});
		
		$('#btnprocesarresultados').click(function(){
			id_listado = "<?php echo $id_listado; ?>";
			fase = $('#fase').val();

			alertify.confirm('Atención','Está seguro que desea terminar de subir resultados?',function(){
				$.ajax({
					type:"POST",
					data: {"id_listado" : id_listado, "fase" : fase},
					url:"../procesos/Resultados_Carriles.php",
					success:function(R){
						if(R=="NULL"){
							alertify.alert("Atención","Faltan deportistas por subir resultados. Por favor revise e intente nuevamente");
						}else if(R=="ERROR"){
							alertify.alert("Error","No se ha podido terminar la prueba");
						}else{
							window.open('Resultados_Carriles.php?id='+<?php echo $id_listado; ?>,'_self');
						}
					}
				});
			},function(){
				alertify.error('Cancelado');
			}).set({labels:{ok:'Si', cancel:'No'}});
		});
	});
</script>
