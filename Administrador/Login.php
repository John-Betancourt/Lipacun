<?php
require_once('../clases/conexion_db.php');
session_start();

if(isset($_SESSION["codigo_usuario"]) or isset($_SESSION["perfil_usuario"])){
	error_reporting(0);
	if ($_SESSION['perfil_usuario']==1){
	  header("location: Index.php");
	} elseif ($_SESSION['perfil_usuario']==2) {
		header("location: ../Secretario/");
	} else {
		if(!empty($_SESSION["codigo_usuario"]) or !empty($_SESSION["perfil_usuario"])){
			unset($_SESSION['codigo_usuario']);
			echo "<script>alert('Su sesión ha expirado, por favor inicie nuevamente.')</script>";
			session_destroy();
			echo "<script>window.open('Login.php','_self')</script>";
		}
	}
}

if(!empty($_POST)){
	$Usuario=mysqli_real_escape_string($mysqli,$_POST['Username']);
	$password= mysqli_real_escape_string($mysqli,$_POST['Password']);
	$error = '';

	$salt='$Lip@cun&';
	$password_ency=md5($salt . $password);
	//$password_ency=md5($password);
	$sql="Select * FROM usuarios WHERE Usuario='$Usuario'";
	$result=$mysqli->query($sql);
	$rows = $result->num_rows;

	if ($rows > 0) {
		while($row=$result->fetch_assoc()){
			if (utf8_encode($row['Clave'])==$password_ency) {
				$_SESSION['codigo_usuario'] = $row['Usuario'];
				$_SESSION['perfil_usuario'] = $row['Perfil_Usuario'];

				if ($_SESSION['perfil_usuario']==1){
					header("location: index.php");
				} elseif ($_SESSION['perfil_usuario']==2) {
					header("location: ../Secretario/");
				} 

			} else {
				unset($_SESSION['codigo_usuario']);
				echo "<script>alert('Usuario o Contrase\u00F1a Incorrecta')</script>,<script>window.open('Login.php','_self')</script>";
			}
		}
	} else{
		echo "<script>alert('Usuario o Contrase\u00F1a Incorrecta')</script> <script>window.open('Login.php','_self')</script>";//El Usuario que Ingreso No Existe
	}
	exit();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Administrador || Iniciar Sesión</title>
	<?php require_once "scripts_login.php"; ?>
</head>
<body class="skin-default-dark fixed-layout">
	<center>
		<div class="panel-heading"><!--https://www.lipacun.com/-->
			<a href="../Login.php"><img src="../imagenes/iconos/Logo.webp" alt="Logo" class="logo" height="90"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/1.webp" alt="favicon1" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/2.webp" alt="favicon2" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/3.webp" alt="favicon3" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/4.webp" alt="favicon4" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/Cundinamarca_logo.webp" alt="Logo" class="logo" height="90">
		</div>
		<hr width=80%>
		<!-- Login -->
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<div class="borde">
						<h2>Administrador || Iniciar Sesión</h2>
					</div>
					<form class="login100-form validate-orm" action="login.php" method="POST">
						<div class="wrap-input100 validaeinput m-b-26">
							<label for="Username" class="label-input100">Usuario</label>
							<input class="input100" type="text" id="Username" name="Username" placeholder="Ingrese Su Nombre de Usuario" required>
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validte-input m-b-18">
							<label for="Password" class="label-input100">Contraseña</label>
							<input class="input100" type="password" id="Password" name="Password" placeholder="Ingrese Su Contraseña" required>
							<span class="focus-input100"></span>
						</div>

						<div class="flex-sb-m w-full p-b-30">
							<div class="contact100-form-checkbox">
							</div>
							<div>
							</div>
						</div>

						<div class="container-login100-form-btn">
							<input class="login100-form-btn" type="submit" name="enviar" value="Iniciar sesión">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="footer">
			<footer>
				<button class="btn btn-success" onclick="history.back()">Volver</button>
			</footer>
		</div>
	</center>
</body>
</html>