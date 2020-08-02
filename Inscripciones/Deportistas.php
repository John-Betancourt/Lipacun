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
  $departamento = $row['departamento'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inscripción Deportistas || LIPACUN</title>
	<?php require_once "scripts_deportistas.php"; ?>
</head>
<body>
	<center>
		<div class="panel-heading">
			<center>
				<h1 class="h1">Formulario para inscripción de Deportistas</h1>
				<a href="../Plataforma"><img src="../imagenes/iconos/Logo.webp" alt="Logo" class="logo" height="90"></a>
				<img src="../imagenes/iconos/1.webp" alt="favicon1" class="logo" height="90">
				<img src="../imagenes/iconos/2.webp" alt="favicon2" class="logo" height="90">
				<img src="../imagenes/iconos/3.webp" alt="favicon3" class="logo" height="90">
				<img src="../imagenes/iconos/4.webp" alt="favicon4" class="logo" height="90">
				<img src="../imagenes/iconos/Cundinamarca_logo.webp" alt="Logo" class="logo" height="90">
			</center>
		</div>
				
		<div class="panel-body">
			<form class="borde" action="Registrar_Deportistas.php" class="form" id="Formulario_Deportistas" method="POST">

				<p style="text-align: top;font-weight: bold;font-style: italic;margin: 0.0em 2.0em;">
				Politica de tratamiento de datos</p> <br />

				<textarea class="form-control" rows="9" style="resize: none" disabled>Por favor lea la siguiente información antes de suministrarnos sus datos personales y de autorizar su tratamiento. En cumplimiento del artículo 12  de la Ley 1581 de 2012, nos permitimos informarle lo siguiente: Continuar
(Esta pregunta es obligatoria)
*Autorización

He leído, he sido informado(a), y autorizo a LIPACUN el tratamiento de datos personales para los fines previamente comunicados y acepto la política de tratamiento de datos personales.

Política de  tratamiento de datos personales</textarea>

				<p><label>¿Está de acuerdo con estos terminos?
				<span style= "color: red">*</span>
				</label><br>
				<label> Si<input TYPE="radio" id="Terminos" name="Terminos" value="Si" required></label>
				<label> No<input TYPE="radio" id="Terminos" name="Terminos" value="No" required></label><br><hr><br>

				<p style="text-align: top;font-weight: bold;font-style: italic;margin: 0.0em 2.0em;">
				Información del Deportista</p> <br />

				<input type="hidden" name="departamento" value="<?php echo $departamento ?>">

				<p><label>Tipo de Identificación:
				<span style= "color: red">*</span>
				</label>
				<select name="identificacion" maxlength="2" onchange="Identificacion(this.value)" required>
					<option value="" selected>- Selecciona el tipo de documento -</option>
					<?php
						$query = $mysqli -> query ("select * FROM tipo_identificacion");     
                        while ($valores = mysqli_fetch_array($query)) {
							echo '<option value="'.$valores['id'].'">'.$valores['tipo_identificacion'].'</option>';          
						}
					?>
                </select>

				<p><label>Numero de Identificación:
				<span style= "color: red">*</span>
				</label>
				<input TYPE="text" NAME="CC" class="Corto" minlength="8" maxlength="11" required> <br /><p></p>

				<p><label>Primer Nombre:
				<span style= "color: red">*</span>
				</label>
				<input TYPE="text" NAME="Nom1" class="Corto" maxlength="20" onkeypress="return Letras(event)" onpaste="return false" required> <br /><p></p>

				<p><label>Segundo Nombre:</label>
				<input TYPE="text" NAME="Nom2" class="Corto" maxlength="20" onkeypress="return Letras(event)" onpaste="return false"> <br /><p></p>

				<p><label>Primer Apellido:
				<span style= "color: red">*</span>
				</label>
				<input TYPE="text" NAME="Ape1" class="Corto" maxlength="20" onkeypress="return Letras(event)" onpaste="return false" required> <br /><p></p>

				<p><label>Segundo Apellido:
				<span style= "color: red">*</span>
				</label>
				<input TYPE="text" NAME="Ape2" placeholder="Si no tiene segundo apellido poner N/A" class="Corto" maxlength="10"  onpaste="return false" required> <br /><p></p>

				<p><label>Nombre corto del club y/o escuela:</label>
				<input TYPE="text" NAME="Nombre_corto" class="Corto" maxlength="20" value="<?php echo $idUsuario; ?>" readonly style="opacity: 0.7;"> <br /><p></p>

				<p><label>Fecha nacimiento:
				<span style= "color: red">*</span>
				</label>
				<div class="Fecha_Nacimiento" name="Fecha_Nacimiento" id="Fecha_Nacimiento"></div>
				
				<input class="Nacimiento1 Corto" TYPE="date" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>" onclick="alert('Por favor selecciona el tipo de Identificación.')" readonly>
				<br /><p></p>
				
				<p><label>Edad Calculada:</label>
				<input TYPE="number" NAME="Edad" id="edad" class="Corto" maxlength="2" onkeypress="return Numeros(event)" onpaste="return false" style="opacity: 0.7;" readonly required> <br /><p></p>
				
				<p><label>Tipo de patín:
				<span style= "color: red">*</span>
				</label>
				<div class="Tipo_Patin" name="Tipo_Patin" id="Tipo_Patin"></div>
				
				<select name="Patín" class="Patin1" maxlength="25" onchange="hidePatin(this.value)" onclick="alert('Por favor selecciona la fecha de nacimiento.')">
					<option value="" selected>- Selecciona el tipo de patín -</option>
                </select>


				<p><label>Rama:
				<span style= "color: red">*</span>
				</label>
				<select name="Rama" maxlength="1" required>
					<option value="" selected>- Selecciona -</option>
					<?php
						$query = $mysqli -> query ("select * FROM rama");     
                        while ($valores = mysqli_fetch_array($query)) {
							echo '<option value="'.$valores['id'].'">'.$valores['rama'].'</option>';          
						}
					?>
                </select>
					
				<div class="Ligado" style="display:none">
					<p><label>El deportista se encuentra ligado ante la liga de cundinamarca?
					<span style= "color: red">*</span>
					</label>
					<select name="liga" maxlength="2" onchange="hideLigado(this.value)">
						<option value="" selected>- Selecciona una respuesta -</option>
						<?php
							$query = $mysqli -> query ("select * FROM ligado");     
							while ($valores = mysqli_fetch_array($query)) {
								echo '<option value="'.$valores['id'].'">'.$valores['ligado'].'</option>';          
							}
						?>
					</select>

					<div class="Cundinamarca" style="display:none">
						<p><label>Fecha de afiliacion a la liga de cundinamarca:
						<span style= "color: red">*</span>
						</label>
						<input TYPE="date" NAME="Fecha_afiliacion" class="Corto" maxlength="10" min="2005-01-01" max="<?php echo date("Y-m-d"); ?>"> <br /><p></p>

						<p><label>Fecha ultima renovacion ante la liga de cundinamarca:
						<span style= "color: red">*</span>
						</label>
						<input TYPE="date" NAME="Fecha_renovacion" class="Corto" maxlength="10" min="2019-01-01" max="<?php echo date("Y-m-d"); ?>">
					</div> 
				</div><br /><p></p>

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
         var form = document.getElementById('Formulario_Deportistas');
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
         var form = document.getElementById('Formulario_Deportistas');
         form.addEventListener('submit', function(event) {
			 terminos = $('input[name=Terminos]:checked', '#Formulario_Deportistas').val();
		   if(terminos=="No"){
		   	   alert('No puede continuar con la inscripción si no acepta la política de  tratamiento de datos personales.');
		   	   event.preventDefault();
		   }else{
			   // si es false entonces que no envie el formulario
			   if (!confirm('¿Esta Seguro Que Desea Continuar?')) {
				 event.preventDefault();
			   }
		   }
         }, false);
       })();
    </script>	
</body>
</html>