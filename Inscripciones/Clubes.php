<?php
	require_once('../clases/conexion_db.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>	
	<title>Inscripción de Clubes y/o Escuelas | | LIPACUN</title>
	<?php require_once "scripts_clubes.php"; ?>
</head>
<body>
	<center>
		<div class="panel-heading">
		<center>
			<h1 class="h1">Formulario para inscripción de Clubes y/o Escuelas</h1>
			<a href="../Login.php"><img src="../imagenes/iconos/Logo.webp" alt="Logo" class="logo" height="90"></a>
			<img src="../imagenes/iconos/1.webp" alt="favicon1" class="logo" height="90">
			<img src="../imagenes/iconos/2.webp" alt="favicon2" class="logo" height="90">
			<img src="../imagenes/iconos/3.webp" alt="favicon3" class="logo" height="90">
			<img src="../imagenes/iconos/4.webp" alt="favicon4" class="logo" height="90">
			<img src="../imagenes/iconos/Cundinamarca_logo.webp" alt="Logo" class="logo" height="90">
		</center>
		</div>
		<div class="panel-body">	

			<form class="borde" action="Registrar_Clubes.php" method="POST" class="form" id="Formulario_Clubes">

				<p style="text-align: top;font-weight: bold;font-style: italic;margin: 0.0em 2.0em;">
				Información basica del Club y/o Escuela</p> <br />
				
				<p><label>Municipio Sede:
				<span style= "color: red">*</span>
				</label>
				<select name="Municipios" class="Corto" required>
					<option value="" selected>- Selecciona un Municipio -</option>
					<?php
						$query = $mysqli -> query ("select * FROM municipios WHERE departamento_id = 25");//select * FROM municipios_cundinamarca where id_municipio !=1101  
						while ($valores = mysqli_fetch_array($query)) {
							echo '<option value="'.$valores['id_municipio'].'">'.$valores['municipio'].'</option>';          
						}
					?>
				</select><br /><p></p>
				
				<p><label>Nombre del club y/o escuela:
				<span style= "color: red">*</span>
				</label>
				<input TYPE="text" NAME="Nombre" class="Largo" maxlength="70" onkeypress="return Alfanumerico(event)" onpaste="return false" required> <br /><p></p> <br />

				<p style="text-align: top;font-weight: bold;font-style: italic;margin: 0.0em 2.0em;">
				Persona responsable de la información</p> <br />

				<p><label>Nombres:
				<span style= "color: red">*</span>
				</label>
				<input TYPE="text" NAME="Nombres" class="Largo" maxlength="20" onkeypress="return Alfabetico(event)" onpaste="return false" required> <br /><p></p>

				<p><label>Apellidos:
				<span style= "color: red">*</span>
				</label>
				<input TYPE="text" NAME="Apellidos" class="Largo" maxlength="20" onkeypress="return Alfabetico(event)" onpaste="return false" required> <br /><p></p>

				<p><label>Numero de Identificación:
					<span style= "color: red">*</span>
				</label>
				<input TYPE="text" NAME="CC" class="Corto" maxlength="12" required> <br /><p></p>

				<p><label>Cargo:
				<span style= "color: red">*</span>
				</label>
				<select name="Cargo" class="Corto" required>
					<option value="" selected>- Selecciona un Cargo -</option>
					<?php
						$query = $mysqli -> query ("SELECT * FROM cargo");     
						while ($valores = mysqli_fetch_array($query)) {
							echo '<option value="'.$valores['id'].'">'.$valores['cargo'].'</option>';
						}
					?>
				</select>
				
				<p><label>Telefono:
				<span style= "color: red">*</span>
				</label>
				<input TYPE="number" NAME="Telefono" class="Corto" minlegth="7" maxlength="10" onkeypress="return Numeros(event)" onpaste="return false" required> <br /><p></p> <br />

				<p style="text-align: top;font-weight: bold;font-style: italic;margin: 0.0em 2.0em;">
				Informacion del Club y/o Escuela</p> <br />

				<p><label>Email Oficial:
				<span style= "color: red">*</span>
				</label>
				<input TYPE="email" NAME="Email" class="Largo" maxlength="50" required> <br /><p></p>

				<p><label>Reconocimiento deportivo:
				<span style= "color: red">*</span>
				</label>
				<select name="Reconocimiento" class="Corto" onchange="hideReconocimiento(this.value)" required>
					<option value="" selected>- Selecciona una respuesta -</option>
					<?php
						$query = $mysqli -> query ("SELECT * FROM reconocimiento");     
						while ($valores = mysqli_fetch_array($query)) {
							echo '<option value="'.$valores['id'].'">'.$valores['reconocimiento'].'</option>';
						}
					?>
				</select><br /><p></p>

				<div class="Reconocimiento" style="display:none">
					<p><label>Numero reconocimiento deportivo:
					<span style= "color: red">*</span>
					</label>
					<input TYPE="text" NAME="No_reconocimiento" class="Corto" maxlength="10"> <br /><p></p>

					<p><label>Fecha reconocimiento deportivo:
					<span style= "color: red">*</span>
					</label>
					<input type="date" name="Fecha_reconocimiento" class="Corto" step="1" min="2013-01-01" max="<?php echo date("Y-m-d");?>" onchange="calcular(this.value)">	
     			</div>

				<p><label>Nombre corto del club y/o escuela:
				<span style= "color: red">*</span>
				</label>
				<input TYPE="text" NAME="Nombre_corto" class="Corto" maxlength="20" onkeypress="return Alfanumerico(event)" onpaste="return false" required> <br /><p></p>

				<p><label>Direccion Oficial del club y/o escuela:
				<span style= "color: red">*</span>
				</label>
				<input TYPE="text" NAME="Direccion" class="Largo" maxlength="30" required> <br /><p></p>

				<!-- Botón de Borrar -->
				<input class="label label-danger" type="reset" name="borrar" value="Borrar">

				<!-- Botón de envío -->
				<input class="label label-info" type="submit" name="enviar" value="Enviar">
				
				<!-- Botón de volver-->
				<button class="label label-info" onclick="history.back()">Volver</button>
					
			</form>
			
		</div>
			
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

		<P style="color: white">NOTA: los datos marcados con (*) deben ser rellenados obligatoriamente | <?php auto_copyright(); // Current year?></P>

	</center>

	<!-- Js File_________________________________ -->

	<!-- Borrar datos -->
	<script type="text/javascript">
       (function() {
         var form = document.getElementById('Formulario_Clubes');
         form.addEventListener('reset', function(event) {
           // si es false entonces que no haga el reset
           if (!confirm('¿Esta Seguro Que Desea borrar los datos?')) {
             event.preventDefault();
           }
         }, false);
       })();
    </script>
			
	<!-- Guardar datos -->
	<script type="text/javascript">
       (function() {
         var form = document.getElementById('Formulario_Clubes');
         form.addEventListener('submit', function(event) {
           // si es false entonces que no envie el formulario
           if (!confirm('¿Esta Seguro Que Desea Continuar?')) {
             event.preventDefault();
           }
         }, false);
       })();
    </script>
</body>
</html>