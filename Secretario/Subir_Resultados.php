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
  $TipoCompetencia = $_REQUEST['Competencia'];

  $sql1 = "SELECT id, tipo_evento FROM eventos WHERE nombre='$Evento'";
  $sql_result=$mysqli->query($sql1);
  $Array_Evento = $sql_result->fetch_assoc();
  $idEvento = $Array_Evento['id'];
  $Tipo_Evento = $Array_Evento['tipo_evento'];
  $_SESSION['tipo_evento'] = $Tipo_Evento;

  if($TipoCompetencia=="Fondo: Puntos"){
	  $TipoCompetencia="Fondo_Puntos";
  }else if($TipoCompetencia=="Fondo: Eliminación"){
	  $TipoCompetencia="Fondo_Eliminacion";
  }else if($TipoCompetencia=="Fondo: Puntos y Eliminación"){
	  $TipoCompetencia="Fondo_Puntos_Eliminacion";
  }
  $NombreTabladb = "Resultados_Eventos_Competencia_".$TipoCompetencia;
  $_SESSION['nombre_tabla_db'] = $NombreTabladb;
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
							<li class="breadcrumb-item active">Resultados</li>
						</ol>
					</div>
					<div class="card text-left">
					  <h5 class="card-header text-uppercase">
						<b><center>Resultados Evento "<?php echo $Evento; ?>"</center></b>
					  </h5>
					  <div class="card-body">
						  <form>
							  <div class="form-group row col-sm-12">
								<?php echo '<input type="hidden" value="'."Competencia_".$TipoCompetencia.'" class="form-control-plaintext" id="Competencia" autofocus="LlenarTabla()" readonly>' ?>
								<label for="Listado" class="col-sm-2 mb-3 col-form-label" style="text-align: center">Listados Evento:</label>
								<div class="form-group col-sm-6">
									<select class="form-control" id="Listado" name="Listado" onChange="LlenarTabla()" required>
										<option value="0" selected disabled> - Seleccione un listado - </option>
										<?php 
											$sql="SELECT * FROM listados_eventos WHERE evento = '$Evento' AND competencia = '$TipoCompetencia'";// AND estado = 'pendiente'
											$resultado=$mysqli->query($sql);
											while($valores= $resultado->fetch_assoc()){
												$codigo_sql = addslashes($valores['codigo_sql']);
												echo '<option value="'.$codigo_sql.'">'.$valores['nombre_listado'].'</option>'; 
											}
										?>	
									</select>
								</div>
							  </div>
						</form>
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
					  <input type="hidden" class="form-control" id="tipo_competencia" name="tipo_competencia" value="<?php echo $TipoCompetencia; ?>" required>
					  <label for="numero_deportista">Numero Deportista:</label>
					  <input type="number" class="form-control" id="numero_deportista" name="numero_deportista" onChange="CambioModal()" required>
				  </div>
				  <div class="form-group">
					  <label for="Nombre">Nombre(s) y Apellido(s) Deportista:</label>
					  <input type="text" class="form-control" id="Nombre" name="Nombre" readonly>
				  </div>
				  <div class="form-group">
					  <label for="tipo_patin">Tipo de Patín:</label>
					  <input type="text" class="form-control" id="tipo_patin" name="tipo_patin" readonly>
				  </div>
			  <?php
				if($TipoCompetencia=="Habilidad"){
				  $html = '<div class="form-group">
					  <label for="Minutos1">Minutos:</label>
					  <input type="number" min="0" max="59" step="1" class="form-control" id="Minutos1" name="Minutos1" required>
				  </div>
				  
				  <div class="form-group">
					  <label for="Segundos1">Segundos:</label>
					  <input type="number" min="0" max="59" step="01" class="form-control" id="Segundos1" name="Segundos1" required>
				  </div>
				  
				  <div class="form-group">
					  <label for="Milisegundos1">Milisegundos:</label>
					  <input type="number" min="0" max="999" step="001" class="form-control" id="Milisegundos1" name="Milisegundos1" required>
				  </div>
				  
				  <div class="form-group">
					  <label for="Faltas1">Faltas:</label>
					  <select class="form-control" id="Faltas1" name="Faltas1" required>
					    <!--option value="" selected disabled>Seleccione las faltas</option-->
					  	<option value="0">0</option>
					  	<option value="1">1</option>	
					  	<option value="2">2</option>	
					  	<option value="3">3</option>	
					  	<option value="4">DNSP</option>	
					  </select>
				  </div>';
				}else if($TipoCompetencia=="Fondo_Puntos"){
				  $html = '<div class="form-group">
					  <label for="orden_llegada2">Posición de Llegada:</label>
					  <input type="number" min="1" max="100" step="1" class="form-control" id="orden_llegada2" name="orden_llegada2" required>
				  </div>
				  
				  <div class="form-group">
					  <label for="puntos_totales2">Puntos Totales:</label>
					  <input type="number" class="form-control" id="puntos_totales2" name="puntos_totales2" required>
				  </div>
				  
				  <div class="form-group">
					  <label for="Observacion2">Observaciones:</label>
					  <select class="form-control" id="Observacion2" name="Observacion2" required>
					    <option value="0" selected> - Seleccione - </option>
					  	<option value="1">NT</option>
					  	<option value="2">DQST</option>	
					  	<option value="3">DQSD</option>	
					  	<option value="4">DNSP</option>	
					  </select>
				  </div>';
				}else if($TipoCompetencia=="Fondo_Eliminacion"){
				   $html = '<div class="form-group">
					  <label for="Eliminado3">Eliminado:</label>
					  <select class="form-control" id="Eliminado3" name="Eliminado3" required>
					    <option value="0" selected> - Seleccione - </option>
					    <option value="1">No</option>
					  	<option value="2">Si</option>
					  </select>
				  </div>

				  <div class="form-group">
					  <label for="orden_llegada3">Posición de Llegada:</label>
					  <input type="number" min="1" max="100" step="1" class="form-control" id="orden_llegada3" name="orden_llegada3" required>
				  </div>
				  
				  <div class="form-group">
					  <label for="vuelta_eliminado3">Vuelta Eliminado:</label>
					  <input type="number" class="form-control" id="vuelta_eliminado3" name="vuelta_eliminado3" required>
				  </div>
				  
				  <div class="form-group">
					  <label for="Observacion3">Observaciones:</label>
					  <select class="form-control" id="Observacion3" name="Observacion3" required>
					    <option value="0" selected> - Seleccione - </option>
					  	<option value="1">NT</option>
					  	<option value="2">DQST</option>
					  	<option value="3">DQSD</option>
					  	<option value="4">DNSP</option>
					  </select>
				  </div>';
				}else if($TipoCompetencia=="Fondo_Puntos_Eliminacion"){
				  $html = '<div class="form-group">
					  <label for="Eliminado4">Eliminado:</label>
					  <select class="form-control" id="Eliminado4" name="Eliminado4" required>
					    <option value="0" selected> - Seleccione - </option>
					    <option value="1">No</option>
					  	<option value="2">Si</option>
					  </select>
				  </div>
				  
				  <div class="form-group">
					  <label for="vuelta_eliminado4">Vuelta Eliminado:</label>
					  <input type="number" class="form-control" id="vuelta_eliminado4" name="vuelta_eliminado4" required>
				  </div>
				  
				  <div class="form-group">
					  <label for="orden_llegada4">Posición de Llegada:</label>
					  <input type="number" min="1" max="100" step="1" class="form-control" id="orden_llegada4" name="orden_llegada4" required>
				  </div>
				  
				  <div class="form-group">
					  <label for="puntos_totales4">Puntos Totales:</label>
					  <input type="number" class="form-control" id="puntos_totales4" name="puntos_totales4" required>
				  </div>
				  
				  <div class="form-group">
					  <label for="Observacion4">Observaciones:</label>
					  <select class="form-control" id="Observacion4" name="Observacion4" required>
					    <option value="0" selected> - Seleccione - </option>
					  	<option value="1">NT</option>
					  	<option value="2">DQST</option>
					  	<option value="3">DQSD</option>
					  	<option value="4">DNSP</option>
					  </select>
				  </div>';
				}else if($TipoCompetencia=="Velocidad"){
				  $html = '<div class="form-group">
					  <label for="Minutos5">Minutos:</label>
					  <input type="number" min="0" max="59" step="1" class="form-control" id="Minutos5" name="Minutos5" required>
				  </div>
				  
				  <div class="form-group">
					  <label for="Segundos5">Segundos:</label>
					  <input type="number" min="0" max="59" step="01" class="form-control" id="Segundos5" name="Segundos5" required>
				  </div>
				  
				  <div class="form-group">
					  <label for="Milisegundos5">Milisegundos:</label>
					  <input type="number" min="0" max="999" step="001" class="form-control" id="Milisegundos5" name="Milisegundos5" required>
				  </div>
				  
				  <div class="form-group">
					  <label for="Observacion5">Observaciones:</label>
					  <select class="form-control" id="Observacion5" name="Observacion5" required>
					    <option value="0" selected> - Seleccione - </option>
					  	<option value="1">NT</option>
					  	<option value="2">DQST</option>
					  	<option value="3">DQSD</option>
					  	<option value="4">DNSP</option>	
					  </select>
				  </div>';
				}else if($TipoCompetencia=="Libre"){
				  $html = '<div class="form-group">
					  <label for="posicion">Posición:</label>
					  <input type="number" min="1" max="100" step="1" class="form-control" id="posicion" name="posicion" required>
				  </div>
				  
				  <div class="form-group">
					  <label for="Observacion6">Observaciones:</label>
					  <select class="form-control" id="Observacion6" name="Observacion6" required>
					    <option value="0" selected> - Seleccione - </option>
					  	<option value="1">NT</option>
					  	<option value="2">DQST</option>	
					  	<option value="3">DQSD</option>	
					  	<option value="4">DNSP</option>	
					  </select>
				  </div>';
				} echo $html; ?>
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
	NombreEvento="<?php echo $Evento; ?>";
	TipoCompetencia="<?php echo $TipoCompetencia; ?>";
	TipoEvento="<?php echo $Tipo_Evento; ?>";
	NombreTablabd="<?php echo $NombreTabladb; ?>";
	alertify.alert("Atención","Por favor Seleccione un listado para continuar");
	LlenarTabla();
	
	function CargarModal(id){
		nombre_listado = $('#Listado').val();
 		$.ajax({
			type:"POST",
			data: {"id" : id, "NombreTablabd" : NombreTablabd, "NombreListado" : nombre_listado},
			url:"../procesos/obtenDatosSubirResultados.php",
			success:function(r){
				//alertify.alert();
				datos=jQuery.parseJSON(r);
				nombres=datos['nombres']+" "+datos['apellidos'];
				$('#frmsubir')[0].reset();
				$('#numero_deportista').val(datos['numero_deportista']);
				$('#Nombre').val(nombres);
				$('#tipo_patin').val(datos['tipo_patin']);
				if(TipoCompetencia=="Habilidad"){
					var tiempo = datos['tiempo'];
					if(tiempo === null){
						console.log('ok');
					}else{
					var tiempo_array = tiempo == null ? null : tiempo.split(':');
					$('#Minutos1').val(tiempo_array[0]);
					$('#Segundos1').val(tiempo_array[1]);
					$('#Milisegundos1').val(tiempo_array[2]);
					}
					if(datos['tiempo_final']=="DNSP"){
						$('#Faltas1').val(4);
					}else{
						$('#Faltas1').val(datos['faltas']);
					}
				}else if(TipoCompetencia=="Fondo_Puntos"){
					$('#orden_llegada2').val(datos['orden_llegada']);
					$('#puntos_totales2').val(datos['puntos_totales']);
					if(datos['observacion']=="NT"){
						$('#Observacion2').val(1);
					}else if(datos['observacion']=="DQST"){
						$('#Observacion2').val(2);
					}else if(datos['observacion']=="DQSD"){
						$('#Observacion2').val(3);
					}else if(datos['observacion']=="DNSP"){
						$('#Observacion2').val(4);
					}
				}else if(TipoCompetencia=="Fondo_Eliminacion"){
					$('#orden_llegada3').val(datos['orden_llegada']);
					if(datos['eliminado']=="NO"){
						$('#Eliminado3').val(1);
					}else if(datos['eliminado']=="SI"){
						$('#Eliminado3').val(2);
					}else{
						$('#Eliminado3').val(0);
					}
					$('#vuelta_eliminado3').val(datos['vuelta_eliminado']);
					if(datos['observacion']=="NT"){
						$('#Observacion3').val(1);
					}else if(datos['observacion']=="DQST"){
						$('#Observacion3').val(2);
					}else if(datos['observacion']=="DQSD"){
						$('#Observacion3').val(3);
					}else if(datos['observacion']=="DNSP"){
						$('#Observacion3').val(4);
					}
				}else if(TipoCompetencia=="Fondo_Puntos_Eliminacion"){
					if(datos['eliminado']=="NO"){
						$('#Eliminado4').val(1);
					}else if(datos['eliminado']=="SI"){
						$('#Eliminado4').val(2);
					}
					$('#vuelta_eliminado4').val(datos['vuelta_eliminado']);
					$('#orden_llegada4').val(datos['orden_llegada']);
					$('#puntos_totales4').val(datos['puntos_totales']);
					if(datos['observacion']=="NT"){
						$('#Observacion4').val(1);
					}else if(datos['observacion']=="DQST"){
						$('#Observacion4').val(2);
					}else if(datos['observacion']=="DQSD"){
						$('#Observacion4').val(3);
					}else if(datos['observacion']=="DNSP"){
						$('#Observacion4').val(4);
					}
				}else if(TipoCompetencia=="Velocidad"){
					tiempo = datos['tiempo'];
					if(tiempo === null){
						console.log('ok');
					}else{
					var tiempo_array = tiempo == null ? null : tiempo.split(':');
					$('#Minutos5').val(tiempo_array[0]);
					$('#Segundos5').val(tiempo_array[1]);
					$('#Milisegundos5').val(tiempo_array[2]);
					}
					if(datos['observacion']=="NT"){
						$('#Observacion5').val(1);
					}else if(datos['observacion']=="DQST"){
						$('#Observacion5').val(2);
					}else if(datos['observacion']=="DQSD"){
						$('#Observacion5').val(3);
					}else if(datos['observacion']=="DNSP"){
						$('#Observacion5').val(4);
					}
				}else if(TipoCompetencia=="Libre"){
					$('#posicion').val(datos['posicion']);
					if(datos['observacion']=="NT"){
						$('#Observacion6').val(1);
					}else if(datos['observacion']=="DQST"){
						$('#Observacion6').val(2);
					}else if(datos['observacion']=="DQSD"){
						$('#Observacion6').val(3);
					}else if(datos['observacion']=="DNSP"){
						$('#Observacion6').val(4);
					}
				}
			}
		})
	}
	
	function CambioModal(){
		nombre_listado = $('#Listado').val();
		id = $('#numero_deportista').val();
		$.ajax({
			type:"POST",
			data: {"id" : id, "NombreTablabd" : NombreTablabd, "NombreListado" : nombre_listado},
			url:"../procesos/obtenDatosSubirResultados.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				nombres=datos['nombres']+" "+datos['apellidos'];
				$('#numero_deportista').val(datos['numero_deportista']);
				$('#Nombre').val(nombres);
				$('#tipo_patin').val(datos['tipo_patin']);
				if(TipoCompetencia=="Habilidad"){
					var tiempo = datos['tiempo'];
					if(tiempo === null){
					$('#Minutos1').val('');
					$('#Segundos1').val('');
					$('#Milisegundos1').val('');
					}else{
					var tiempo_array = tiempo == null ? null : tiempo.split(':');
					$('#Minutos1').val(tiempo_array[0]);
					$('#Segundos1').val(tiempo_array[1]);
					$('#Milisegundos1').val(tiempo_array[2]);
					}
					if(datos['tiempo_final']=="DNSP"){
						$('#Faltas1').val(4);
					}else{
						$('#Faltas1').val(datos['faltas']);
					}
				}else if(TipoCompetencia=="Fondo_Puntos"){
					$('#orden_llegada2').val(datos['orden_llegada']);
					$('#puntos_totales2').val(datos['puntos_totales']);
					if(datos['observacion']=="NT"){
						$('#Observacion2').val(1);
					}else if(datos['observacion']=="DQST"){
						$('#Observacion2').val(2);
					}else if(datos['observacion']=="DQSD"){
						$('#Observacion2').val(3);
					}else if(datos['observacion']=="DNSP"){
						$('#Observacion2').val(4);
					}else{
						$('#Observacion2').val(0);
					}
				}else if(TipoCompetencia=="Fondo_Eliminacion"){
					$('#orden_llegada3').val(datos['orden_llegada']);
					if(datos['eliminado']=="NO"){
						$('#Eliminado3').val(1);
					}else if(datos['eliminado']=="SI"){
						$('#Eliminado3').val(2);
					}else{
						$('#Eliminado3').val(0);
					}
					$('#vuelta_eliminado3').val(datos['vuelta_eliminado']);
					if(datos['observacion']=="NT"){
						$('#Observacion3').val(1);
					}else if(datos['observacion']=="DQST"){
						$('#Observacion3').val(2);
					}else if(datos['observacion']=="DQSD"){
						$('#Observacion3').val(3);
					}else if(datos['observacion']=="DNSP"){
						$('#Observacion3').val(4);
					}else{
						$('#Observacion3').val(0);
					}
				}else if(TipoCompetencia=="Fondo_Puntos_Eliminacion"){
					if(datos['eliminado']=="NO"){
						$('#Eliminado4').val(1);
					}else if(datos['eliminado']=="SI"){
						$('#Eliminado4').val(2);
					}else{
						$('#Eliminado4').val(0);
					}
					$('#vuelta_eliminado4').val(datos['vuelta_eliminado']);
					$('#orden_llegada4').val(datos['orden_llegada']);
					$('#puntos_totales4').val(datos['puntos_totales']);
					if(datos['observacion']=="NT"){
						$('#Observacion4').val(1);
					}else if(datos['observacion']=="DQST"){
						$('#Observacion4').val(2);
					}else if(datos['observacion']=="DQSD"){
						$('#Observacion4').val(3);
					}else if(datos['observacion']=="DNSP"){
						$('#Observacion4').val(4);
					}else{
						$('#Observacion4').val(0);
					}
				}else if(TipoCompetencia=="Velocidad"){
					tiempo = datos['tiempo'];
					if(tiempo === null){
					$('#Minutos5').val('');
					$('#Segundos5').val('');
					$('#Milisegundos5').val('');
					}else{
					var tiempo_array = tiempo == null ? null : tiempo.split(':');
					$('#Minutos5').val(tiempo_array[0]);
					$('#Segundos5').val(tiempo_array[1]);
					$('#Milisegundos5').val(tiempo_array[2]);
					}
					if(datos['observacion']=="NT"){
						$('#Observacion5').val(1);
					}else if(datos['observacion']=="DQST"){
						$('#Observacion5').val(2);
					}else if(datos['observacion']=="DQSD"){
						$('#Observacion5').val(3);
					}else if(datos['observacion']=="DNSP"){
						$('#Observacion5').val(4);
					}else{
						$('#Observacion5').val(0);
					}
				}else if(TipoCompetencia=="Libre"){
					$('#posicion').val(datos['posicion']);
					if(datos['observacion']=="NT"){
						$('#Observacion6').val(1);
					}else if(datos['observacion']=="DQST"){
						$('#Observacion6').val(2);
					}else if(datos['observacion']=="DQSD"){
						$('#Observacion6').val(3);
					}else if(datos['observacion']=="DNSP"){
						$('#Observacion6').val(4);
					}else{
						$('#Observacion6').val(0);
					}
				}
			}
		})
	}
	
	$(document).ready(function(){
		$('#limpiar').click(function() {
		$('#Eliminado3').val(0);
		$('#Eliminado4').val(0);
		$('#Observacion2').val(0);
		$('#Observacion3').val(0);
		$('#Observacion4').val(0);
		$('#Observacion4').val(0);
		$('#Observacion5').val(0);
		$('#Observacion6').val(0);
		});
		
		$('#btnSubirresultados').click(function(){
			datos=$('#frmsubir').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/Subir_Resultados.php",
				success:function(R){
					if(R==0){
						alertify.error("ERROR PRESENTADO - No se ha podido subir resultados de la competencia, por favor intente nuevamente");
					}else if(R==1){
						LlenarTabla();
						$('#frmsubir')[0].reset();
						alertify.success("Se ha guardado el resultado exitosamente!");
					}else if(R==2){
						alertify.error("Proporcione resultados validos para subirlos.");
					}else if(R==22){
						alertify.error("Proporcione un deportista valido.");
					}else if(R==3){
						alertify.error("Alerta: No puede poner DNSP si ingresa valores de tiempo.");
					}else if(R==4){
						alertify.error("Alerta: No puede poner observaciones si ingresa valores de tiempo.");
					}else if(R==5){
						alertify.error("Alerta: No puede poner DNSP si ingresa valores de eliminacion.");
					}else if(R==6){
						alertify.error("Alerta: No puede poner DNSP si ingresa posición de llegada.");
					}else if(R==7){
						alertify.error("Alerta: No puede poner DNSP si ingresa valores de puntos.");
					}else if(R==8){
						alertify.error("Alerta: No puede ingresar vuelta eliminado si no ha sido eliminado.");
					}else if(R==9){
						alertify.error("Alerta: No puede ingresar posición de llegada si ha sido eliminado.");
					}else if(R==10){
						alertify.error("Alerta: Ya hay un deportista en esa posición.");
					}else if(R==11){
						alertify.error("Alerta: No puede poner observaciones si ingresa posicion.");
					}else{
						alertify.alert("Error",R);
					}
				}
			});
		});
		
		$('#btnprocesarresultados').click(function(){
			var codigo_SQL = $('#Listado').val();		
		
			if(!codigo_SQL){
				alertify.alert("Error","Por favor seleccione un listado primero y suba los resultados de la competencia");
			}else{
				$.ajax({
					type:"POST",
					data: {"codigo_SQL" : codigo_SQL},
					url:"../procesos/Resultados.php",
					success:function(R){
						if(R=="NULL"){
							alertify.alert("Atención","Faltan deportistas por subir resultados. Por favor revise e intente nuevamente");
						}else if(R=="ERROR"){
							alertify.alert("Error",R);
						}else{
							//alertify.alert("Error",R);
							alertify.confirm('Atención','Está seguro que desea terminar de subir resultados?',function(){
								window.open('Mostrar_Resultados.php?id='+R,'_self');
							},function(){
								alertify.error('Cancelado');
							}).set({labels:{ok:'Si', cancel:'No'}});
						}
					}
				});
			}
		});
	});
</script>
