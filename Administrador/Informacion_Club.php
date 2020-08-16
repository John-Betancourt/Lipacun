<?php
  require_once('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
    header("location: Login.php");
  }

  $idUsuario = $_SESSION['codigo_usuario'];
  $sql = "Select * FROM usuarios WHERE Usuario='$idUsuario'";
  $result=$mysqli->query($sql);
  $row = $result->fetch_assoc();
  
  $Club = $_REQUEST['Club'];
  if ($Club==''){
	  $response['response'] = "ERROR PRESENTADO - No ha seleccionado un club y/o escuela valido.";
	  $response['type_response'] = 0; ?>
	  <script>alert('<?php echo $response['response'] ?>')</script>
	  <script>window.history.back()</script>
<?php }
  $sql = "SELECT departamentos.departamento, municipios.id_municipio, nombre_completo_club, nombres, apellidos, clubes.identificacion, cargo.id, telefono, clubes.email, reconocimiento.reconocimiento, no_reconocimiento, fecha_reconocimiento, nombre_corto_club, clave, direccion, clubes.fecha_inscripcion, estados.Estado, clubes.token FROM departamentos, municipios, clubes, cargo, reconocimiento, estados WHERE clubes.departamento = departamentos.id_departamento AND clubes.municipio = municipios.id_municipio AND clubes.cargo = cargo.id AND clubes.reconocimiento = reconocimiento.id AND clubes.estado = estados.ID AND clubes.nombre_corto_club = '$Club'";
  $result1=$mysqli->query($sql);
  $row1 = $result1->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Información Club <?php echo $Club; ?> | | LIPACUN</title>
	<?php require_once "scripts.php"; ?>
</head>
<body>
	<center>
		<div class="panel-heading"><!--https://www.lipacun.com/-->
			<a href="Lista_Clubes.php"><img src="../imagenes/iconos/Logo.webp" alt="Logo" class="logo" height="90"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/1.webp" alt="favicon1" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/2.webp" alt="favicon2" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/3.webp" alt="favicon3" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/4.webp" alt="favicon4" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/Cundinamarca_logo.webp" alt="Logo" class="logo" height="90">
		</div><hr>
	</center>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="justify-content-end align-items-center"><!--d-flex -->
					<ol class="breadcrumb" style="background: linear-gradient(to right, #E0EAFC, #CFDEF3);">
						<li class="breadcrumb-item"><a href="Index.php">Pagina Principal</a></li>
						<li class="breadcrumb-item"><a href="Lista_Clubes.php">Lista de Clubes</a></li>
						<li class="breadcrumb-item active">Información del Club</li>
					</ol>
				</div>
				<div class="card text-left">
					<h5 class="card-header" style="color: white; background: linear-gradient(to right, #4286f4, #4286f4);">
						<center><strong>Información Club <?php echo $Club; ?></strong></center>
					</h5>
					<div class="card-body" style="background: linear-gradient(to right, #E0EAFC, #CFDEF3);">
						<form action="Actualizar_Club.php" method="POST">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="Departamento"><strong>Departamento:</strong></label>
									<i class="fas fa-city"></i>
									<select class="form-control form-control-line" readonly name="Departamento">
										<?php echo '<option value="'.$row1['departamento'].'" selected>'.$row1['departamento'].'</option>'; ?>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="Ciudad"><strong>Ciudad:</strong></label>
									<i class="fas fa-university"></i>
									<select class="form-control form-control-line" name="ciudad" value="<?php echo $row1['id_municipio']?>">
										<?php
											$query = $mysqli -> query ("select * FROM municipios WHERE departamento_id = 25");//select * FROM municipios_cundinamarca where id_municipio !=1101  
											while ($valores = mysqli_fetch_array($query)) {
												if($row1['id_municipio']==$valores['id_municipio']){
												echo '<option value="'.$valores['id_municipio'].'" selected>'.$valores['municipio'].'</option>';          
		
												}else{
												echo '<option value="'.$valores['id_municipio'].'">'.$valores['municipio'].'</option>';          
												}										
											}
										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-12"><strong>Nombre Completo Club:</strong></label>
								<div class="col-md-12">
									<input type="text" placeholder="" name="nombre_club" value="<?php echo $row1['nombre_completo_club']?>" class="form-control form-control-line">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="Nombres"><strong>Nombre(s) Respresentante:</strong></label>
									<input type="text" placeholder="" name="nombres_representante" value="<?php echo $row1['nombres']?>" class="form-control form-control-line">
								</div>
								<div class="form-group col-md-6">
									<label for="Apellidos"><strong>Apellido(s) Respresentante:</strong></label>
									<input type="text" placeholder="" name="apellidos_representante" value="<?php echo $row1['apellidos']?>" class="form-control form-control-line">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="Identificacion"><strong>Identificación:</strong></label>
									<i class="far fa-address-card"></i>
									<input type="number" minlength="6" name="identificacion" maxlength="11" value="<?php echo $row1['identificacion']?>" class="form-control form-control-line">
								</div>
								<div class="form-group col-md-6">
									<label for="Cargo"><strong>Titulo o Cargo:</strong></label>
									<select class="form-control form-control-line" name="cargo" value="<?php echo $row1['cargo']?>">
										<?php
											$query = $mysqli -> query ("select * FROM cargo");//select * FROM cargo
											while ($valores = mysqli_fetch_array($query)) {
												if($row1['id']==$valores['id']){
													echo '<option value="'.$row1['id'].'" selected>'.$valores['cargo'].'</option>';
												}else{
													echo '<option value="'.$valores['id'].'">'.$valores['cargo'].'</option>';
												}
											}
										?>
									</select>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="Email"><strong>Email:</strong></label>
									<i class="far fa-envelope"></i>
									<input type="email"  placeholder="Ej. example@gmail.com" name="email" value="<?php echo $row1['email']?>" class="form-control form-control-line"  id="example-email">
								</div>
								<div class="form-group col-md-6">
									<label for="Telefono"><strong>Telefono:</strong></label>
									<i class="fas fa-mobile-alt"></i>
									<input type="number" size="10" placeholder="" name="telefono" value="<?php echo $row1['telefono']?>" class="form-control form-control-line">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-2">
									<label for="Reconocimiento"><strong>Reconocimiento:</strong></label>
									<select class="form-control form-control-line" name="reconocimiento" id="reconocimiento" value="<?php echo $row1['reconocimiento'] ?>" onchange="hideReconocimiento(this.value)">
										<?php
											$query = $mysqli -> query ("SELECT * FROM reconocimiento");
											while ($valores = mysqli_fetch_array($query)) {
												if($row1['reconocimiento']==$valores['reconocimiento']){
													echo '<option value="'.$row1['reconocimiento'].'" selected>'.$valores['reconocimiento'].'</option>';
												}else{
													echo '<option value="'.$valores['reconocimiento'].'">'.$valores['reconocimiento'].'</option>';
												}
											}
										?>
									</select>
								</div>

								<div class="form-group col-md-5">
									<div class="Reconocimiento" style="display:none">
										<label for="No_Reconocimiento"><strong>No Reconocimiento:</strong></label>
										<input type="number" size="10" placeholder="" name="numero_reconocimiento" value="<?php echo $row1['no_reconocimiento']?>" class="form-control form-control-line">
									</div>
								</div>
								<div class="form-group col-md-5">
									<div class="Reconocimiento" style="display:none">
										<label for="Fecha_Reconocimiento"><strong>Fecha Reconocimiento:</strong> </label>
										<input type="date" name="fecha_reconocimiento" value="<?php echo $row1['fecha_reconocimiento']?>" class="form-control form-control-line" min="2013-01-01" max="<?php echo date("Y-m-d");?>" onchange="calcular(this.value)">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-12"><strong>Nombre Corto Club:</strong></label>
								<div class="col-md-12">
									<input type="text" name="club" value="<?php echo $row1['nombre_corto_club']?>" class="form-control form-control-line" readonly>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-6">
								  <label for="inputPassword4" ><strong>Contraseña:</strong> <i class="fas fa-unlock-alt"></i></label>
								  <input type="password" name="password" value="<?php echo $row1['clave']?>" class="form-control col-md-12" id="inputPassword4" readonly>
								</div>
								<div class="form-group col-md-6">
								  <label class="col-md-12" for="inputAccion4"><strong>Acción:</strong></label><br>
								  <input type="submit" class="btn btn-primary mb-2" formaction="Restablecer_Contraseña.php?Club=<?php echo $row1['nombre_corto_club']?>" value="Restablecer Contraseña" id="inputAccion4" style="margin: 0px 15px;">
								</div>
							</div>
							<hr>
							<div class="form-group">
								<div class="col-sm-12">
									<button class="btn btn-primary"><i class="fas fa-angle-double-up"></i> Actualizar Información</button>
								</div>
							</div>
						</form>
					</div>
					<div class="card-footer text-muted">
						<center>LIPACUN | Copyright <?php auto_copyright(); // Current year?> Todos los derechos reservados | By Brian y John</center>
					</div>
				</div>
			<br><br/>
			</div>
		<br><br/>
		</div>
	<br><br/>
	</div>
	<!-- ============================================================== -->
	<!-- footer -->
	<!-- ============================================================== -->
	<div class="footer2">
			<footer>Bienvenido <?php echo $row['Rol'] ?> <button class="fas"><i class="fas fa-user-alt"></i></button>&nbsp; &nbsp;
                <a href="../Logout.php"><button class="btn btn-info">Cerrar Sesión</button></a>
				<button class="btn btn-info" onclick="history.back()">Volver</button>
            </footer>
		</div>
	<!-- ============================================================== -->
	<!-- End footer -->
	<!-- ============================================================== -->
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
	function hideReconocimiento(option){
		if(option==1 ||option=="Si"){
			$('.Reconocimiento').show()
		}else{
			$('.Reconocimiento').hide()
		}
	}
	$(document).ready(function(){
		reconocimiento = $('#reconocimiento').val()
		if(reconocimiento=="Si"){
			$('.Reconocimiento').show()
		}else{
			$('.Reconocimiento').hide()
		}
		//alertify.alert(reconocimiento);
		});

</script>