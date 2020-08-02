<?php
  require_once('clases/conexion_db.php');
  session_start();

  if(isset($_SESSION["codigo_usuario"])){
	  error_reporting(0);
  	if ($_SESSION['nombre_corto']==""){
		if (isset($_SESSION["perfil_usuario"])){
			header("location: Administrador");
		}else{
			unset($_SESSION['codigo_usuario']);
			echo "<script>alert('Su sesión ha expirado, por favor inicie nuevamente.')</script>";
			session_destroy();
			echo "<script>window.open('Login.php','_self')</script>";
		}
    } else {
		$club=$_SESSION['nombre_corto'];
		$query="update clubes SET token = NULL WHERE nombre_corto_club = '$club'";
		$result=$mysqli->query($query);
		header("location: Plataforma");
    }
  }

  if(!empty($_POST)){
    $Usuario = mysqli_real_escape_string($mysqli,$_POST['Username']);
	$Usuario = addslashes($Usuario);
    $Password = mysqli_real_escape_string($mysqli,$_POST['Password']);
    $error = '';

    $salt='$Lip@cun&';
    $password_ency=md5($salt . $Password);
    //$password_ency=md5($Password);
    $sql="Select * FROM clubes WHERE nombre_corto_club='$Usuario'";
    $result=$mysqli->query($sql);
    $rows = $result->num_rows;
	  
    if ($rows > 0) {
		while($row=$result->fetch_assoc()){
			if ($row['estado'] == 1){
				if (utf8_encode($row['clave'])==$password_ency) {
					$_SESSION['codigo_usuario'] = $row['identificacion'];
					$_SESSION['nombre_corto'] = $row['nombre_corto_club'];

					if ($_SESSION['nombre_corto']==""){
						unset($_SESSION['codigo_usuario']);
						echo "<script>alert('Error')</script> <script>window.open('Login.php','_self')</script>";
					} else {
						$club=$_SESSION['nombre_corto'];
						$query="UPDATE clubes SET token = NULL WHERE nombre_corto_club = '$club'";
						$result=$mysqli->query($query);

						$consulta="SELECT * FROM deportistas";
						$resultado=$mysqli->query($consulta);
						while($datos=$resultado->fetch_assoc()){
							$identificacion = $datos['identificacion'];
		   					$tiempo = strtotime($datos['fecha_nacimiento']); 
		   					$ahora = time(); 
		   					$edad = ($ahora-$tiempo)/(60*60*24*365.25); 
		   					$edadFinal = floor($edad);
								
							if($edadFinal >=5 and $edadFinal <=6){
								$categoria= 1;
							}elseif($edadFinal >=7 and $edadFinal <=8){
								$categoria=2;
							}elseif($edadFinal >=9 and $edadFinal <=10){
								$categoria=3;
							}elseif($edadFinal >=11 and $edadFinal <=12){
								$categoria=4;
							}elseif($edadFinal >=13 and $edadFinal <=14){
								$categoria=5;
							}elseif($edadFinal >=15){
								$categoria=6;
							}
							$query="UPDATE deportistas SET edad='$edadFinal', categoria='$categoria' WHERE identificacion='$identificacion' AND nombre_corto_club = '$club'";
							$resultados=$mysqli->query($query);
						}
						header("location: Plataforma");
					}
				} else {
					unset($_SESSION['codigo_usuario']);
					echo "<script>alert('Usuario o Contrase\u00F1a Incorrecta')</script> <script>window.open('Login.php','_self')</script>";
				}
			} else {
				unset($_SESSION['codigo_usuario']);
				echo "<script>alert('El Usuario que Ingreso está Inactivo o No Existe')</script> <script>window.open('Login.php','_self')</script>";
			}
		} 
    } else{
        echo "<script>alert('El Usuario que Ingreso No Existe o está Inactivo')</script> <script>window.open('Login.php','_self')</script>";
      }
    exit();
  }

?>
<!DOCTYPE html>
<html lang="es" >
<head>
	<title>Clubs y/o Escuelas de Cundinamarca || Iniciar Sesión</title>
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
		
		<!-- Login -->
		  <div class="limiter">
			<div class="container-login100">
			  <div class="wrap-login100">
				 <div class="borde">
					<h2>Clubs y/o Escuelas de Cundinamarca || Iniciar Sesión</h2>
				</div>

				<form class="login100-form validate-orm" action="login.php" method="POST">

				  <div class="wrap-input100 validaeinput m-b-26">
					<label for="Username" class="label-input100">Nombre Corto Club y/o Escuela</label>
					<input class="input100" type="text" id="Username" name="Username" placeholder="Ingrese Nombre Corto Club y/o Escuela" required>
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
					  <a href="#" data-toggle="modal" data-target="#Registrarse" class="txt1">
						Regístrate
					  </a>
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
				<a href="Administrador/Login.php"><button class="btn btn-success">Administrador</button></a>
			</footer>
		</div>
	</center>
	<!-- Modal -->
	<div class="modal fade" id="Registrarse" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true"><!-- data-backdrop="static"-->
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="staticBackdropLabel">PLATAFORMA LIPACUN</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			Por favor seleccione el departamento al cual pertenece el Club o Escuela.
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			<a href="Inscripciones/Clubes.php"><button type="button" class="btn btn-primary">Cundinamarca</button></a>
			<a href="Interdepartamentales/Inscripcion_Clubes.php"><button type="button" class="btn btn-primary">Otro Departamento</button></a>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Fin Modal -->
</body>
</html>