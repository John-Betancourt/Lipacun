<?php
	require_once('clases/conexion_db.php');
	error_reporting(0);
?>
<!DOCTYPE html>
<html lang="es" >
<head>
	<title>Restablecer Contraseña | LIPACUN</title>
	<?php require_once "scripts.php"; ?>
</head>
<body>
	<center>
		<div class="panel-heading"><!--https://www.lipacun.com/-->
			<a href="Index.php"><img src="imagenes/iconos/Logo.webp" alt="Logo" class="logo" height="90"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="imagenes/iconos/1.webp" alt="favicon1" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="imagenes/iconos/2.webp" alt="favicon2" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="imagenes/iconos/3.webp" alt="favicon3" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="imagenes/iconos/4.webp" alt="favicon4" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="imagenes/iconos/Cundinamarca_logo.webp" alt="Logo" class="logo" height="90">
		</div>
		<hr width=80%>
	<?php
		$token=$_REQUEST['Token'];
		$club =$_REQUEST['Club'];
		if ($token =="" or $club ==""){
			$response['response'] = "ERROR PRESENTADO - El enlace no es valido!";
			$response['type_response'] = 0;	?>
			<script>alert('<?php echo $response['response']; ?>')</script>
  <?php }else {	?>
		<script>alert("Requisitos para la nueva contrase\u00F1a: \n - Minimo 6 caracteres")</script>
	<?php	
		}
	?>
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<div class="borde">
						<h2>Restablecer Contraseña | LIPACUN</h2>
					</div>
					<form class="login100-form validate-orm" action="Restablecer_Clave.php?Token=<?php echo $token; ?>&Club=<?php echo $club; ?>" method="POST">
						<div class="wrap-input100 validaeinput m-b-26">
							<span class="label-input100">Nueva Contraseña</span>
							<input class="input100" type="password" minlength="6" name="nueva_clave" placeholder="Ingrese la nueva contraseña" required>
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validte-input m-b-18">
							<span class="label-input100">Confirmar Nueva Contraseña</span>
							<input class="input100" type="password" minlength="6" name="confirmar_clave" placeholder="Confirme la nueva contraseña" required>
							<span class="focus-input100"></span>
						</div>

						<div class="flex-sb-m w-full p-b-30">
							<div class="contact100-form-checkbox">
							</div>
							<div>
							</div>
						</div>

						<div class="container-login100-form-btn">
							<input class="login100-form-btn" type="submit" name="registrar" value="Cambiar Contraseña">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="footer">
			<footer>
				<a href="Login.php"><button class="btn btn-success">Iniciar Sesión</button></a>
				<a href="Seleccione_Departamento.php"><button class="btn btn-success">Registrate</button></a>
			</footer>
		</div>
	</center>
</body>
</html>