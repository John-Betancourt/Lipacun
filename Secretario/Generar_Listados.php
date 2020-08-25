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
  
  $Evento = $_REQUEST['Evento'];
  $sql = "SELECT tipo_evento FROM eventos WHERE nombre = '$Evento'";
  $result1=$mysqli->query($sql);
  $array_tipo_evento=$result1->fetch_assoc();
  $Tipo_Evento = $array_tipo_evento['tipo_evento'];
?>
<!DOCTYPE html>  
<html lang="es">
<head>
	<title>Generar listado evento: <?php echo $Evento; ?></title>
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
				<div class="col-md-12">
					<div class="justify-content-end align-items-center"><!--d-flex -->
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="Index.php">Pagina Principal</a></li>
							<li class="breadcrumb-item active">Generar Listados</li>
						</ol>
					</div>
					<div class="card text-left">
						<h5 class="card-header text-uppercase">
							<b><center>Generar listado evento: <?php echo $Evento; ?></center></b>
						</h5>
							<div class="card-body">

								<div class="text-left">
									<div class="form-group col-md-12">
										<label for="Mensaje1"><h3><em>Filtros:</em></h3></label>
									</div>
								</div>

								<form>
  									<div class="form-row">
  										<div class="form-group col-md-4">
  											<label for="Patin">Patin:</label>
											<select class="form-control" id="Patin" onChange="LlenarTablaListados('<?php echo $Evento?>')">
												<option value="0"> - Seleccione - </option>
												<?php
													if($Tipo_Evento=="Escuelas"){
													$sql="SELECT * FROM tipo_patin WHERE tipo_patin = 'Semiprofesional' OR tipo_patin = 'Profesional No Avanzado' ORDER BY tipo_patin DESC";
												}else if($Tipo_Evento=="Ranking"){
													$sql="SELECT * FROM tipo_patin WHERE tipo_patin = 'Profesional Avanzado'";
												}
													$resultado=$mysqli->query($sql);

													while($valores= $resultado->fetch_assoc()){
														echo '<option value="'.$valores['tipo_patin'].'">'.$valores['tipo_patin'].'</option>'; 
													}
												?>
											</select>
										</div>

										<div class="form-group col-md-4">
											<label for="Rama">Rama:</label>
											<select class="form-control" id="ListaRama" onChange="LlenarTablaListados('<?php echo $Evento?>')">
												<option value="0"> - Seleccione - </option>
												<?php 

													$sql="SELECT * FROM rama";
													$resultado=$mysqli->query($sql);

													while($valores= $resultado->fetch_assoc()){
														echo '<option value="'.$valores['id'].'">'.$valores['rama'].'</option>'; 
													}
												?>
											</select>
										</div>

										<div class="form-group col-md-4">
											<label for="Categoria">Categoria:</label>
											<select class="form-control" id="ListaCategoria" onChange="LlenarTablaListados('<?php echo $Evento?>')">
												<option value="0"> - Seleccione - </option>
												<?php 
													$sql="SELECT * FROM categoria";
													$resultado=$mysqli->query($sql);

													while($valores= $resultado->fetch_assoc()){
														echo '<option value="'.$valores['categoria'].'">'.$valores['detalles'].'</option>'; 
													}
												?>
											</select>
										</div>
									</div>
								</form><br>

								<div class="text-left">
									<div class="form-group col-md-12">
										<label for="Mensaje1"><h3><em>Datos para guardar listado:</em></h3></label>
									</div>
								</div>

								<form>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="competencia">Competencia:</label>
											<!--input type="text" class="form-control" id="competencia" name="competencia" placeholder="Ingrese nombre competencia" onChange="Titulo()" required-->
											<select class="form-control" id="competencia" name="competencia" onChange="LlenarTablaListados('<?php echo $Evento?>')" required>
												<option value="0"> - Seleccione - </option>
												<option value="Habilidad">Habilidad</option>
												<option value="Fondo_Puntos">Puntos</option>
												<option value="Fondo_Eliminacion">Eliminación</option>
												<option value="Fondo_Puntos_Eliminacion">Puntos + Eliminación</option>
												<option value="Velocidad">Velocidad</option>
												<option value="Libre">Prueba Libre</option>
											</select>
										</div>

										<div class="form-group col-md-6">
											<label for="tipoComp">Tipo Competencia:</label>
											<input type="text" class="TipoComp1 form-control" id="tipoComp" name="tipoComp" placeholder="Ingrese tipo competencia" onChange="Titulo()" required>
											<select class="TipoComp2 form-control" id="tipoComp2" name="tipoComp2" onChange="Titulo()" style="display:none" required>
												<option value="0"> - Seleccione - </option>
												<option value="Contrareloj Individual">Contrareloj Individual</option>
												<option value="Remates" disabled>Remates</option>
												<option value="Vuelta al Circuito">Vuelta al Circuito</option>
											</select>
										</div>
									</div><br>

									<div class="text-left">
										<div class="form-group col-md-12">
											<label for="Mensaje1"><h3><em>Cantidad premiaciones:</em></h3></label>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-4">
											<label for="oro">Oro: <img src="../imagenes/favicon/gold_medal.ico" alt="oro" style="width: 20px; height:20px"></label>
											<input type="number" class="form-control" id="oro" name="oro" placeholder="Oro" step="1" required>
										</div>	

										<div class="form-group col-md-4">
											<label for="plata">Plata: <img src="../imagenes/favicon/silver_medal.ico" alt="plata" style="width: 20px; height:20px"></label>
											<input type="text" class="form-control" id="plata" name="plata" placeholder="Plata" required>
										</div>

										<div class="form-group col-md-4">
											<label for="bronce">Bronce: <img src="../imagenes/favicon/bronze_medal.ico" alt="bronce" style="width: 20px; height:20px"></label>
											<input type="text" class="form-control" id="bronce" name="bronce" placeholder="Bronce" required>
										</div>
									</div><br>
									<div class="form-row">
										<div class="form-group">
											<button type="button" id="GuardarListado" class="btn btn-primary"><i class="far fa-save"></i> Guardar Listado</button>
										</div>
									</div>
								</form>
								<hr>
							<div id="tabla_listados"></div>
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
        <!-- footer -->
		<!-- <div class="footer2">
			<footer>Bienvenido <!?php echo $row['Rol'] ?> <button class="fas"><i class="fas fa-user-alt"></i></button>&nbsp; &nbsp; &nbsp;
                <a href="../Logout.php"><button class="btn btn-info">Cerrar Sesión</button></a>
				<a href="Index.php"><button class="btn btn-info">Volver</button></a>
            </footer>
		</div> -->
        <!-- End footer -->
	</center>
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
	TipoEvento="<?php echo $Tipo_Evento ?>";
	evento="<?php echo $Evento ?>";
	LlenarTablaListados('<?php echo $Evento?>');
	
$(document).ready(function(){
	$('#GuardarListado').click(function(){
		function Titulo(){
			var Competencia = $("#competencia").val();
			if(Competencia=="Velocidad"){
				var TipoComp = $("#tipoComp2").val();
			}else{
				var TipoComp = $("#tipoComp").val();
			}
			var Patin = $('#Patin').val();
			Oro = $('#oro').val();
			Plata = $('#plata').val();
			Bronce = $('#bronce').val();
			TipoCompetencia = Competencia;
			TCompetencia = TipoComp;
			NombreTablabd="Resultados_Eventos_Competencia_"+TipoCompetencia;
			TipoPatin = Patin;
			NombreEvento= evento;
			
			idRama = $('#ListaRama').val();
			var Rama = "";
			if(idRama == 0){
				var Rama = '';
			}else if(idRama == 1){
				var Rama = 'Damas';
			}else if(idRama == 2){
				var Rama = 'Varones';
			}
			Cat = $('#ListaCategoria').val();
			var Categoria = "";
			if(Cat == 0){
				var Categoria = '';
			}else if(Cat == "A"){
				var Categoria = '5 y 6 años';
			}else if(Cat == "B"){
				var Categoria = '7 y 8 años';
			}else if(Cat == "C"){
				var Categoria = '9 y 10 años';
			}else if(Cat == "D"){
				var Categoria = '11 y 12 años';
			}else if(Cat == "E"){
				var Categoria = '13 y 14 años';
			}else if(Cat == "F"){
				var Categoria = '15 +';
			}
			var mensaje = Competencia + ' ' + TipoComp + '  ' + Patin + '  ' + Rama + ' ' + Categoria ;
			codigo_sql = "SELECT * FROM "+NombreTablabd+" WHERE evento = '"+evento+"'";
			$('#Listado').val(mensaje);
			if(TipoCompetencia==0){
				if(Cat==0){
					if(idRama==0){
						if(TipoPatin==0){
							alertify.error("Selecione un tipo de patin");
						}else{
							alertify.error("Seleccione una rama");
						}
					}else{
						alertify.error("Seleccione una categoria");
					}
				}else {
					alertify.error("Seleccione una competencia");
				}
			}else{
				if(TCompetencia==0 || TCompetencia==''){
					alertify.error("Seleccione un tipo de competencia");
				}else{
					$.ajax({
						type: "POST",
						url: "../procesos/Guardar_Listado.php",
						data: {"sql" : codigo_sql, "evento" : evento, "comp" : TipoCompetencia, "tipo_comp" : TCompetencia, "Oro" : Oro, "Plata" : Plata, "Bronce" : Bronce, "nombre_listado" : mensaje},
						success:function(r){
							if(r==0){
								alertify.error("ERROR PRESENTADO -  El listado no se ha podido guardar");
							}else if(r==1){
								alertify.success("El listado se ha guardado exitosamente!");
							}else if(r==2){
								alertify.error("El listado ya se encuentra registrado!");
							}else if(r==3){
								alertify.error("Proporcione la información completa para guardar listado!");
							}else{
								alertify.alert("Error",r);
							}
						}
					});
					$.ajax({
						type:"POST",
						data: {"NombreTablabd" : NombreTablabd, "TipoCompetencia" : TipoCompetencia, "TipoComp" : TCompetencia},
						url:"../procesos/Crear_Tabla_Resultados_db.php",
						success:function(r){
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
									data: {"NombreTablabd" : NombreTablabd, "TipoCompetencia" : TipoCompetencia, "TipoPatin" : TipoPatin, "NombreEvento" : NombreEvento, "TipoEvento" : TipoEvento, "nombre_listado" : mensaje, "Llenar" : Llenar},//"codigo_sql" : codigoSQL,
									url:"../procesos/Crear_Tabla_Resultados_db.php",
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
									data: {"NombreTablabd" : NombreTablabd, "TipoCompetencia" : TipoCompetencia, "TipoPatin" : TipoPatin, "NombreEvento" : NombreEvento, "TipoEvento" : TipoEvento, "nombre_listado" : mensaje, "Actualizar" : Actualizar},//"codigo_sql" : codigoSQL,
									url:"../procesos/Crear_Tabla_Resultados_db.php",
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
							}else{
								alertify.alert("Error"+r);
							}
						}
					});
				}
			}
			return mensaje ;
		}
		Titulo();
	});
});
</script>