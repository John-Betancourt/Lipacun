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
  $tipo_patin = $_REQUEST['id'];
  $Tipo_Evento = $_SESSION['Tipo_Evento'];

	if($tipo_patin==1){
		$Titulo = 'Consolidación resultados por clubes "' . $Evento . '" - Patin Semiprofesional';
	}else if($tipo_patin==2){
		$Titulo = 'Consolidación resultados por clubes "' . $Evento . '" - Patin Profesional No Avanzado';
	}else if($tipo_patin==3){
		$Titulo = 'Consolidación resultados por clubes "' . $Evento . '" - Patin Profesional Avanzado';
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo $Titulo ?></title>
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
							<li class="breadcrumb-item active">Resultados Clubes</li>
						</ol>
					</div>
					<div class="card text-left">
					  <h5 class="card-header">
						<b><center><?php echo $Titulo ?></center></b>
					  </h5>
					  <div class="card-body">
						  <button class="btn btn-outline-success" data-toggle="modal" data-target="#enviarcorreo">
							Enviar por correo <i class="fa fa-plus-circle"></i>
						</button><hr>
						  <form>
							  <div class="form-group row col-sm-8">
							  	<label for="Categorias" class="col-sm-2 mb-3 col-form-label" style="text-align: center"> Tipo Patín:</label>
								<div class="form-group col-sm-2.5">
									<select class="form-control" id="tipo_patin" name="tipo_patin" onchange="CambioPatin()" required>
										<option value="0" disabled> - Seleccione Tipo de Patin - </option> <?php
										if($Tipo_Evento=="Escuelas"){
											$query = $mysqli -> query ("SELECT * FROM tipo_patin WHERE tipo_patin = 'Semiprofesional' OR tipo_patin = 'Profesional No Avanzado' ORDER BY id ASC");
										}else if($Tipo_Evento=="Ranking"){
											$query = $mysqli -> query ("SELECT * FROM tipo_patin WHERE tipo_patin = 'Profesional Avanzado' ORDER BY id ASC");
										} 
										while ($valores1 = mysqli_fetch_array($query)) {
											if($tipo_patin==$valores1['id']){
												echo '<option value="'.$tipo_patin.'" selected>'.$valores1['tipo_patin'].'</option>';
											}else{
												echo '<option value="'.$valores1['id'].'">'.$valores1['tipo_patin'].'</option>';          
											}
										}?>	
									</select>
								</div>
								<label for="Categorias" class="col-sm-2 mb-3 col-form-label" style="text-align: center">Categorias:</label>
								<div class="form-group col-sm-2.5">
									<select class="form-control" id="categorias" name="categorias" onChange="LlenarResult('<?php echo $Evento ?>')" required>
										<option value="0" selected> - Seleccione Categoria - </option>	
										<?php 
											$sql="SELECT * FROM categorias_resultados ORDER BY id";// AND estado = 'pendiente'
											$resultado=$mysqli->query($sql);
											while($valores= $resultado->fetch_assoc()){
												echo '<option value="'.$valores['categorias_resultados'].'">'.$valores['categorias_resultados'].'</option>'; 
											}
										?>		
									</select>
								</div>
							  </div>
						</form><hr>
							<div id="tabla_result"></div>
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
				<button class="btn btn-info" onclick="history.back()">Volver</button></a>
            </footer>
		</div>
		<!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
	</center>
	<!-- Modal envio resultados correo -->
	<div class="modal fade" id="enviarcorreo" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="staticBackdropLabel">Enviar reporte por correo</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			  <form id="frmcorreo">
			  	<input type="hidden" value="<?php echo $Evento ?>" name="evento" id="evento">
				<div class="form-group">
				  <label for="asunto">Asunto:</label>
				  <input type="text" class="form-control" id="asunto" name="asunto" value='Consolidado Clubes "<?php echo $Evento; ?>"' required>
				  </div>
				<div class="form-group">
				  <input type="file"  id="archivo" name="archivo">
				</div>
			  </form>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			<button type="button" id="btnEnviarCorreo" class="btn btn-primary">Enviar</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Fin Modal envio resultados correo -->
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
	LlenarResult('<?php echo $Evento ?>');
	
	function CambioPatin(){
		var id_tipo_patin = $('#tipo_patin').val();
		window.open('Resultados_Clubes.php?id='+id_tipo_patin,'_self');
	}
</script>

<script language="javascript">
	$(function(){
		$('#btnEnviarCorreo').click(function(e){
			alertify.success("Esto tomara un tiempo, por favor espere");
			 e.preventDefault();
			
			var paqueteDeDatos = new FormData();
			
			paqueteDeDatos.append('asunto', $('#asunto').prop('value'));
			paqueteDeDatos.append('evento', $('#evento').prop('value'));
			paqueteDeDatos.append('archivo', $('#archivo')[0].files[0]);
			
			var destino = "Enviar_Correo_Clubes.php";

			$.ajax({
				url: destino,
				type:"POST",
				contentType: false,
				data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
				processData: false,
				cache: false, 
				success:function(e){
					if(e==0){
						alertify.error("ERROR - No se ha podido enviar el correo, por favor intente nuevamente");
					}else if(e==1){
						$('#frmcorreo')[0].reset();
						alertify.success("Los correos se han enviado exitosamente!");
					}else if(e==2){
						alertify.error("Proporcione un archivo de resultados valido para enviar.");
					}else{
						alertify.alert("Error", e);
					}
				}
			});
		});
	});
</script>

