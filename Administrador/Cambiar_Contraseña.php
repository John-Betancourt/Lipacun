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
	<title>Cambiar Contraseña | ADMINISTRADOR</title>
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
	</center>
	<div class="container">
		<div class="row">
			<div class="col-sm-11">
				<div class="justify-content-end align-items-center"><!--d-flex -->
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="Index.php">Pagina Principal</a></li>
						<li class="breadcrumb-item active">Cambiar Contraseña</li>
					</ol>
				</div>
				<div class="card text-left">
					<h5 class="card-header">
						<center>Cambiar Contraseña | ADMINISTRADOR</center>
					</h5>
					<div class="card-body">
						<form class="needs-validation" action="Actualizar_Contraseña.php" id="form_cambiar_clave" method="POST" novalidate>
							<div class="form-group">
								<label class="col-md-12">Contraseña Actual</label>
								<div class="col-md-12">
									<input type="password" name="clave_actual" placeholder="Ingrese la contraseña actual" class="form-control" required>
									<div class="invalid-feedback">
										Por favor ingrese la contraseña actual.
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Nueva Contraseña</label>
								<div class="col-md-12">
									<input type="password" minlength="6" name="nueva_clave" placeholder="Ingrese la nueva contraseña"class="form-control" required>
									<div class="invalid-feedback">
										Por favor ingrese la nueva contraseña (Minimo 6 caracteres Alfanumericos).
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Confirmar Nueva Contraseña</label>
								<div class="col-md-12">
									<input type="password" minlength="6" name="confirmar_clave" placeholder="Confirme la nueva contraseña" class="form-control" required>
									<div class="invalid-feedback">
										Por favor confirme la nueva contraseña (Minimo 6 caracteres Alfanumericos).
									</div>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<div class="col-sm-12">
									<button class="baja btn btn-danger" onclick="history.back()">Cancelar</button>&nbsp;&nbsp;
									<input class="btn btn-primary" name="registrar" type="submit" value="Cambiar Contraseña">
								</div>
							</div>
						</form>
					</div>
					<div class="card-footer text-muted">
						<center>LIPACUN | Copyright <?php auto_copyright(); // Current year?> Todos los derechos reservados | By Brian y John</center>
					</div>
				</div>
				<script>alert("Requisitos minimos para la nueva contrase\u00F1a: \n - 6 caracteres \n - 1 letra \n - 1 numero")</script>
			</div>
		</div>
		<br></br>
	</div>
	<br></br>
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

<!-- Js File_________________________________ -->

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	var forms = document.getElementsByClassName('needs-validation');
	// Loop over them and prevent submission
	var validation = Array.prototype.filter.call(forms, function(form) {
	  form.addEventListener('submit', function(event) {
		if (form.checkValidity() === false) {
		  event.preventDefault();
		  event.stopPropagation();
		}
		form.classList.add('was-validated');
	  }, false);
	});
  }, false);
})();
</script>