<?php
	require_once('clases/conexion_db.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Seleccione su Departamento</title>
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

		<div class="borde">
			<h1>Seleccione Su Departamento</h1>
		</div>

		<!-- Botón de Cundinamarca -->
		<div class="button1">
			<a href="Inscripciones/Clubes.php"><button class="Otros" type="Cundinamarca">Cundinamarca</button></a>
		</div>

		<!-- Botón de Otros Departamentos -->
		<div class="button2">
			<a href="Interdepartamentales/Inscripcion_Clubes.php"><button class="Otros" type="Otros">Otro Departamento</button></a>
		</div>

		<div class="footer">
			<footer>
				<button class="btn btn-success" onclick="history.back()">Volver</button>
			</footer>
		</div>
	</center>
</body>
</html>