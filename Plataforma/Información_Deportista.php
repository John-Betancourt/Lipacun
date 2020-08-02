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
  
  $Deportista = $_REQUEST['Deportista'];
  if ($Deportista==''){
	  $response['response'] = "ERROR PRESENTADO - No ha seleccionado un deportista valido.";
	  $response['type_response'] = 0; ?>
	  <script>alert('<?php echo $response['response'] ?>')</script>
	  <script>window.history.back()</script><?php
  }
  $sql = "SELECT tipo_identificacion.tipo_identificacion, identificacion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, nombre_corto_club, deportistas.fecha_nacimiento, tipo_patin.tipo_patin as tipo_patin, deportistas.edad, rama.rama, ligado.ligado, fecha_afiliacion, fecha_renovacion, fecha_inscripcion, deportistas.fecha_estado, estados.Estado FROM tipo_identificacion, deportistas, tipo_patin, rama, ligado, estados WHERE deportistas.tipo_identificacion = tipo_identificacion.id AND deportistas.tipo_patin = tipo_patin.id AND deportistas.rama = rama.id AND deportistas.ligado = ligado.id AND deportistas.estado = estados.ID AND nombre_corto_club = '$idUsuario' AND deportistas.identificacion = '$Deportista'";
  $result1=$mysqli->query($sql);
  $row = $result1->num_rows;
  if($row > 0){
	  $row1 = $result1->fetch_assoc();
	  $Nombres=$row1['primer_nombre'].' '.$row1['primer_apellido'];
  }else{
	  $response['response'] = "ERROR PRESENTADO - No ha seleccionado un deportista valido.";
	  $response['type_response'] = 0; ?>
	  <script>alert('<?php echo $response['response'] ?>')</script>
	  <script>window.history.back()</script><?php
  }
  
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
						<li class="breadcrumb-item"><a href="Listar_deportistas.php">Lista Deportistas</a></li>
						<li class="breadcrumb-item active">Información del Deportista</li>
					</ol>
				</div>
				<div class="card text-left">
					<h5 class="card-header">
						<center>Información Deportista <?php echo $Nombres;?></center>
					</h5>
					<div class="card-body">
						<form method="POST">
							<div class="form-group row col-md-12">
								<label for="1" class="col-sm-3 mb-3 col-form-label">Tipo de Identificación:</label>
								<div class="form-group col-md-9">
										<input type="text" value="<?php echo $row1['tipo_identificacion']?>" class="form-control" id="1" readonly>
								</div>
							</div>
							<div class="form-group row col-md-12">
								<label for="2" class="col-sm-3 mb-3 col-form-label">Identificación:</label>
								<div class="form-group col-md-9">
										<input type="text" value="<?php echo $row1['identificacion']?>" class="form-control" id="2" readonly>
								</div>
							</div>
							<div class="form-group row col-md-12">
								<label for="3" class="col-sm-3 mb-3 col-form-label">Primer Nombre:</label>
								<div class="form-group col-md-9">
										<input type="text" value="<?php echo $row1['primer_nombre']?>" class="form-control" id="3" readonly>
								</div>
							</div>
							<div class="form-group row col-md-12">
								<label for="4" class="col-sm-3 mb-3 col-form-label">Segundo Nombre:</label>
								<div class="form-group col-md-9">
										<input type="text" value="<?php echo $row1['segundo_nombre']?>" class="form-control" id="4" readonly>
								</div>
							</div>
							<div class="form-group row col-md-12">
								<label for="5" class="col-sm-3 mb-3 col-form-label">Primer Apellido:</label>
								<div class="form-group col-md-9">
										<input type="text" value="<?php echo $row1['primer_apellido']?>" class="form-control" id="5" readonly>
								</div>
							</div>
							<div class="form-group row col-md-12">
								<label for="6" class="col-sm-3 mb-3 col-form-label">Segundo Apellido:</label>
								<div class="form-group col-md-9">
										<input type="text" value="<?php echo $row1['segundo_apellido']?>" class="form-control" id="6" readonly>
								</div>
							</div>
							<div class="form-group row col-md-12">
								<label for="7" class="col-sm-3 mb-3 col-form-label">Nombre Corto de CLub y/o Escuela:</label>
								<div class="form-group col-md-9">
										<input type="text" value="<?php echo $row1['nombre_corto_club']?>" class="form-control" id="7" readonly>
								</div>
							</div>
							<div class="form-group row col-md-12">
								<label for="8" class="col-sm-3 mb-3 col-form-label">Fecha de Nacimiento:</label>
								<div class="form-group col-md-9">
										<input type="text" value="<?php echo $row1['fecha_nacimiento']?>" class="form-control" id="8" readonly>
								</div>
							</div>
							<div class="form-group row col-md-12">
								<label for="9" class="col-sm-3 mb-3 col-form-label">Tipo de Patín:</label>
								<div class="form-group col-md-9">
										<input type="text" value="<?php echo $row1['tipo_patin']?>" class="form-control" id="9" readonly>
								</div>
							</div>
							<div class="form-group row col-md-12">
								<label for="10" class="col-sm-3 mb-3 col-form-label">Edad:</label>
								<div class="form-group col-md-9">
										<input type="text" value="<?php echo $row1['edad']?>" class="form-control" id="10" readonly>
								</div>
							</div>
							<div class="form-group row col-md-12">
								<label for="11" class="col-sm-3 mb-3 col-form-label">Rama:</label>
								<div class="form-group col-md-9">
									<input type="text" value="<?php echo $row1['rama']?>" class="form-control" id="11" readonly>
								</div>
							</div>
							<div class="form-group row col-md-12">
								<label for="12" class="col-sm-3 mb-3 col-form-label">Ligado:</label>
								<div class="form-group col-md-9">
									<input type="text" value="<?php echo $row1['ligado']?>" class="form-control" id="12" readonly>
								</div>
							</div>
							<div class="form-group row col-md-12">
								<label for="13" class="col-sm-3 mb-3 col-form-label">Fecha de Afiliación:</label>
								<div class="form-group col-md-9">
									<input type="text" value="<?php echo $row1['fecha_afiliacion']?>" class="form-control" id="13" readonly>
								</div>
							</div>
							<div class="form-group row col-md-12">
								<label for="14" class="col-sm-3 mb-3 col-form-label">Fecha de Renovación:</label>
								<div class="form-group col-md-9">
									<input type="text" value="<?php echo $row1['fecha_renovacion']?>" class="form-control" id="14" readonly>
								</div>
							</div>
						</form>
					</div>
					<div class="card-footer text-muted">
						<center>LIPACUN | Copyright <?php auto_copyright(); // Current year?> Todos los derechos reservados | By Brian y John</center>
					</div>
				</div>
			<br></br>
			</div>
		<br></br>
		</div>
	<br></br>
	</div>
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