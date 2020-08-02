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
	<title>Inscribir Deportista a Nuevo Evento | LIPACUN</title>
	<?php require_once "scripts_deportistas.php"; ?>
</head>
<body>
	<center>
		<div class="panel-heading">
			<center>
				<h1 class="h1">Inscribir Deportistas a Nuevo Evento</h1>
				<a href="../Plataforma/Eventos.php"><img src="../imagenes/iconos/Logo.webp" alt="Logo" class="logo" height="90"></a>
				<img src="../imagenes/iconos/1.webp" alt="favicon1" class="logo" height="90">
				<img src="../imagenes/iconos/2.webp" alt="favicon2" class="logo" height="90">
				<img src="../imagenes/iconos/3.webp" alt="favicon3" class="logo" height="90">
				<img src="../imagenes/iconos/4.webp" alt="favicon4" class="logo" height="90">
				<img src="../imagenes/iconos/Cundinamarca_logo.webp" alt="Logo" class="logo" height="90">
			</center>
		</div>
				
		<div class="panel-body">
			<form class="borde form needs-validation" id="Inscripcion_Deportistas_Evento"><!--novalidate-->	

				<p style="text-align: top;font-weight: bold;font-style: italic;margin: 0.0em 2.0em;">
				Información del deportista</p> <br/>
				
				<p><label>Evento:*</label>
				<select name="Evento" id="Evento" required>
					<option value="" selected>- Nombre del Evento -</option>
					<?php
						$query = $mysqli->query("SELECT * FROM inscripcion_evento_clubes WHERE club = '$idUsuario'");
						while ($datos = mysqli_fetch_array($query)) {
							$evento = $datos['evento'];
							$fecha_actual = date("Y-m-d");

							$sql = "SELECT * FROM eventos WHERE nombre = '$evento' AND fecha_evento >= '$fecha_actual'";
							//echo '<option value="'.$sql.'">'.$sql.'</option>';
							$resultado = $mysqli->query($sql);
							$row = $resultado->num_rows;
							if($row > 0){
								$valores = $resultado->fetch_assoc();
								echo '<option value="'.$valores['nombre'].'">'.$valores['nombre'].'</option>';
							}
						}
					?>
				</select><br/><p></p>
				
				<!-- Botón de Cancelar -->
				<input type="button" class="label label-custom" onclick="history.back()" value="Cancelar">
				
				<!-- Botón de Enviar -->
				<input type="submit" class="label label-info" id="enviar" name="enviar" value="Enviar"><br>
				
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

	<!-- Borrar datos -->
	<script type="text/javascript">
       (function() {
         var form = document.getElementById('Inscripcion_Deportistas_Evento');
         form.addEventListener('submit', function(event) {
           // si es false entonces que no se envie el formulario
           if (!confirm('¿Esta Seguro Que Desea Continuar?')) {
             event.preventDefault();
           }
         }, false);
       })();

       $('#enviar').click(function(){
       	var evento = $('#Evento').val();
		window.open('../Plataforma/Deportistas_Evento.php?id='+evento,'_self');
       });
    </script>
</body>
</html>