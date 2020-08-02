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
  
  $Deportista = $_REQUEST['Deportista'];
  if ($Deportista==''){
	  $response['response'] = "ERROR PRESENTADO - No ha seleccionado un deportista valido.";
	  $response['type_response'] = 0; ?>
	  <script>alert('<?php echo $response['response'] ?>')</script>
	  <script>window.history.back()</script>
<?php }
  $sql = "SELECT tipo_identificacion.tipo_identificacion, identificacion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, nombre_corto_club, deportistas.fecha_nacimiento, tipo_patin.tipo_patin, deportistas.edad, rama.rama, ligado.id, fecha_afiliacion, fecha_renovacion, fecha_inscripcion, deportistas.fecha_estado, estados.Estado FROM tipo_identificacion, deportistas, tipo_patin, rama, ligado, estados WHERE deportistas.tipo_identificacion = tipo_identificacion.id AND deportistas.tipo_patin = tipo_patin.id AND deportistas.rama = rama.id AND deportistas.ligado = ligado.id AND deportistas.estado = estados.ID AND deportistas.identificacion = '$Deportista'";
  $result1=$mysqli->query($sql);
  $row1 = $result1->fetch_assoc();
  $Nombres=$row1['primer_nombre'].' '.$row1['primer_apellido'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Información Deportista <?php echo $Nombres;?> | | LIPACUN</title>
	<?php require_once "scripts.php"; ?>
</head>
<body>
	<center>
		<div class="panel-heading"><!--https://www.lipacun.com/-->
			<img src="../imagenes/iconos/Logo.webp" alt="Logo" class="logo" height="90" onclick="history.back()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/1.webp" alt="favicon1" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/2.webp" alt="favicon2" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/3.webp" alt="favicon3" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/4.webp" alt="favicon4" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/Cundinamarca_logo.webp" alt="Logo" class="logo" height="90">
		</div><hr>
	</center>
	<div class="container">
		<div class="row">
			<div class="col-sm-11">
				<div class="justify-content-end align-items-center"><!--d-flex -->
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="Index.php">Pagina Principal</a></li>
						<li class="breadcrumb-item"><a href="Lista_Clubes.php">Lista Clubes</a></li>
						<li class="breadcrumb-item"><a href="#"><span onclick="history.back()">Lista Deportistas</span></a></li>
						<li class="breadcrumb-item active">Información del Deportista</li>
					</ol>
				</div>
				<div class="card text-left">
					<h5 class="card-header">
						<center>Información Deportista <?php echo $Nombres;?></center>
					</h5>
					<div class="card-body">
						<form action="Actualizar_Deportistas.php" method="POST">
							<div class="form-group">
								<label class="col-sm-12">Tipo de Identificación</label>
								<div class="col-sm-12">
									<input type="text" name="tipo_identificacion" minlength="6" maxlength="11" value="<?php echo $row1['tipo_identificacion']?>" class="form-control form-control-line" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Identificación</label>
								<div class="col-md-12">
									<input type="number" name="identificacion" minlength="6" maxlength="11" value="<?php echo $row1['identificacion']?>" class="form-control form-control-line" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Primer Nombre</label>
								<div class="col-md-12">
									<input type="text" placeholder="Ingresa aquí el primer nombre" name="primer_nombre" value="<?php echo $row1['primer_nombre']?>" class="form-control form-control-line">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Segundo Nombre</label>
								<div class="col-md-12">
									<input type="text" placeholder="Ingresa aquí el segundo nombre" name="segundo_nombre" value="<?php echo $row1['segundo_nombre']?>" class="form-control form-control-line">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Primer Apellido</label>
								<div class="col-md-12">
									<input type="text" placeholder="Ingresa aquí el primer apellido" name="primer_apellido" value="<?php echo $row1['primer_apellido']?>" class="form-control form-control-line">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Segundo Apellido</label>
								<div class="col-md-12">
									<input type="text" placeholder="Ingresa aquí el segundo apellido" name="segundo_apellido" value="<?php echo $row1['segundo_apellido']?>" class="form-control form-control-line">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Nombre Corto de CLub y/o Escuela</label>
								<div class="col-md-12">
									<input type="text" placeholder="Ej. Administrador Web" value="<?php echo $row1['nombre_corto_club']?>" class="form-control form-control-line" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Fecha de Nacimiento</label>
								<div class="col-md-12">
									<input type="date" name="fecha_nacimiento" value="<?php echo $row1['fecha_nacimiento']?>" class="form-control form-control-line">
								</div>
							</div>

							<div class="form-group">
							<label class="col-sm-12">Tipo de Patín</label>
							<div class="col-sm-12">
								<select class="form-control form-control-line" name="tipo_patin" id="tipo_patin" onchange="hidePatin(this.value)" value="<?php echo $row1['tipo_patin']?>">
									
									<?php
										$query = $mysqli -> query ("SELECT * FROM tipo_patin ORDER BY id ASC");//select * FROM tipo de patin  
										while ($valores1 = mysqli_fetch_array($query)) {
											if($row1['tipo_patin']== $valores1['tipo_patin']){
												echo '<option value="'.$valores1['tipo_patin'].'" selected>'.$valores1['tipo_patin'].'</option>';
											}else{
												echo '<option value="'.$valores1['tipo_patin'].'">'.$valores1['tipo_patin'].'</option>';          
											}
										}
										?>	
								</select>
							</div>
							</div>
							
							<div class="form-group">
							<label class="col-sm-12">Rama</label>
							<div class="col-sm-12">
								<select class="form-control form-control-line" name="rama"  value="<?php echo $row1['rama']?>" >
									
									<?php
										$query = $mysqli -> query ("SELECT * FROM rama ORDER BY id ASC"); 
										while ($valores1 = mysqli_fetch_array($query)) {
											if($row1['rama']== $valores1['rama']){
												echo '<option value="'.$valores1['id'].'" selected>'.$valores1['rama'].'</option>';
											}else{
												echo '<option value="'.$valores1['id'].'">'.$valores1['rama'].'</option>';          
											}
										}
										?>	
								</select>
							</div>
							</div>

							<div class="form-group">
								<div class="Ligado" style="display:none">
									<label class="col-sm-12">Ligado</label>
									<div class="col-sm-12">
										<select class="form-control form-control-line" name="ligado" id="ligado" value="<?php echo $row1['id']?>" onchange="hideLigado(this.value)">
										<?php
											$query = $mysqli -> query ("select * FROM ligado");//select * FROM ligado
											while ($valores = mysqli_fetch_array($query)) {
												if($row1['id']==$valores['id']){
													echo '<option value="'.$row1['id'].'" selected>'.$valores['ligado'].'</option>';
												}else{
													echo '<option value="'.$valores['id'].'">'.$valores['ligado'].'</option>';          
												}
											}
											?>
										</select>
									</div>
								</div>
							</div>
								
							<div class="form-group">
								<div class="Cundinamarca" style="display:none">
									<div class="form-group">
										<label class="col-md-12">Fecha de Afiliación</label>
										<div class="col-md-12">
											<input type="date" name="fecha_afiliacion"  min="2005-01-01" max="<?php echo date("Y-m-d"); ?>" value="<?php echo $row1['fecha_afiliacion']?>" class="form-control form-control-line">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-12">Fecha de Renovación</label>
										<div class="col-md-12">
											<input type="date" name="fecha_renovacion" min="2019-01-01" max="<?php echo date("Y-m-d"); ?>" value="<?php echo $row1['fecha_renovacion']?>" class="form-control form-control-line">
										</div>
									</div>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<div class="col-sm-12">
									<button class="btn btn-primary">Actualizar Información Deportista</button>
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
		<footer>Bienvenido <?php echo $user['Rol'] ?> <button class="fas"><i class="fas fa-user-alt"></i></button>&nbsp; &nbsp;
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
	$(document).ready(function(){
		patin = $('#tipo_patin').val()
		if(patin=="Profesional Avanzado"){
		$('.Ligado').show()
		}else{
		$('.Ligado').hide()
	}
			//alertify.alert(reconocimiento);
	});
	$(document).ready(function(){
		ligado = $('#ligado').val()
		if(ligado==1){
		$('.Cundinamarca').show()
		}else{
		$('.Cundinamarca').hide()
	}
			//alertify.alert(reconocimiento);
	});
	function hidePatin(option){
	if(option=="Profesional Avanzado"){
		$('.Ligado').show()
	}else{
		$('.Ligado').hide()
	}
}

function hideLigado(option){
	if(option=="1"){
    $('.Cundinamarca').show()
  }else{
    $('.Cundinamarca').hide()
    alert("Al momento de un evento el deportista debe estar ligado")
  }
}
</script>