<?php
  require_once('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["nombre_corto"]==""){
    header("location: ../Login.php");
  }

  $idUsuario = $_SESSION['nombre_corto'];
  $sql = "Select * FROM clubes WHERE nombre_corto_club='$idUsuario'";
  $result=$mysqli->query($sql);
  $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Cambiar Contraseña || LIPACUN</title>
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
						<center>Cambiar Contraseña</center>
					</h5>
					<div class="card-body">
						<form action="Actualizar_Contraseña.php" id="form_cambiar_clave" method="POST">
							<div class="form-group">
								<label class="col-md-12">Contraseña Actual</label>
								<div class="col-md-12">
									<input type="password" name="clave_actual" placeholder="Ingrese la contraseña actual" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Nueva Contraseña</label>
								<div class="col-md-12">
									<input type="password" minlength="6" name="nueva_clave" placeholder="Ingrese la nueva contraseña"class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Confirmar Nueva Contraseña</label>
								<div class="col-md-12">
									<input type="password" minlength="6" name="confirmar_clave" placeholder="Confirme la nueva contraseña" class="form-control" required>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<div class="col-sm-12">
									<button class="baja btn btn-danger" onclick="history.back()">Cancelar</button>&nbsp;&nbsp;&nbsp;&nbsp;
									<input class="btn btn-primary" name="registrar" type="submit" value="Cambiar Contraseña">
								</div>
							</div>
						</form>
					</div>
					<div class="card-footer text-muted">
						<center>LIPACUN | Copyright <?php auto_copyright(); // Current year?> Todos los derechos reservados | By Brian y John</center>
					</div>
				</div>
				<script>alert("Requisitos minimos para la nueva contrase\u00F1a: \n - 6 caracteres.")</script>
			</div>
		</div>
		<br></br>
	</div>
	<br></br>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="footer2">
            <footer>Bienvenido, <?php echo $idUsuario; ?> <button class="fas"><i class="fas fa-user-alt"></i></button>&nbsp; &nbsp;
                <a href="../Logout.php"><button class="btn btn-info">Cerrar Sesión</button></a>
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