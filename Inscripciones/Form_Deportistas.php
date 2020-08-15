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
		<div class="card text-left">
			<h5 class="card-header" style="color: white; background: linear-gradient(to right, #4286f4, #4286f4);">
				<center><strong>Formulario de Inscripción de Deportistas</strong></center>
			</h5>

			<div class="card-body" style="background: linear-gradient(to right, #E0EAFC, #CFDEF3);">

				<form method="POST" action="Registrar_Deportistas.php" id="Formulario_Deportistas" class="needs-validation" novalidate>

					<input type="hidden" name="departamento" value="<?php echo $departamento ?>">
					
					<div class="form-row">
						<div class="form-group col-md-6">
							<label><strong>Tipo de Identificación:</strong></label>
							<span style= "color: red">*</span>
							<i class="far fa-address-card"></i>
							<select name="identificacion" maxlength="2" onchange="Identificacion(this.value)" class="form-control" required>
								<option value="" selected>- Selecciona el tipo de documento -</option>
									<?php
										$query = $mysqli -> query ("select * FROM tipo_identificacion");     
										while ($valores = mysqli_fetch_array($query)) {
											echo '<option value="'.$valores['id'].'">'.$valores['tipo_identificacion'].'</option>';          
										}
									?>
							</select>
							<div class="valid-feedback">¡Ok válido!</div>
                      		<div class="invalid-feedback">Complete el campo.</div> 
						</div>
						<div class="form-group col-md-6">
							<label><strong>Identificación:</strong></label>
							<span style= "color: red">*</span>
							<i class="far fa-address-card"></i>
							<input type="text" name="CC" class="form-control" minlength="8" maxlength="11" required>
							<div class="valid-feedback">¡Ok válido!</div>
							<div class="invalid-feedback">Complete el campo.</div> 
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="PrimerNombre"><strong>Primer Nombre:</strong></label>
							<span style= "color: red">*</span>
							<input type="text" name="Nom1" class="form-control" maxlength="20" onkeypress="return Letras(event)" onpaste="return false" required>
							<div class="valid-feedback">¡Ok válido!</div>
                      		<div class="invalid-feedback">Complete el campo.</div> 
						</div>
						<div class="form-group col-md-6">
							<label for="SegundoNombre"><strong>Segundo Nombre:</strong></label>
							<input type="text" name="Nom2" class="form-control" maxlength="20" onkeypress="return Letras(event)" onpaste="return false">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="PrimerApellido"><strong>Primer Apellido:</strong></label>
							<span style= "color: red">*</span>
							<input type="text" name="Ape1" class="form-control" maxlength="20" onkeypress="return Letras(event)" onpaste="return false" required>
							<div class="valid-feedback">¡Ok válido!</div>
                      		<div class="invalid-feedback">Complete el campo.</div> 
						</div>
						<div class="form-group col-md-6">
							<label for="SegundoApellido"><strong>Segundo Apellido:</strong></label>
							<span style= "color: red">*</span>
							<input type="text" name="Ape2" placeholder="Si no tiene segundo apellido poner N/A" class="form-control" maxlength="10"  onpaste="return false" required>
							<div class="valid-feedback">¡Ok válido!</div>
                      		<div class="invalid-feedback">Complete el campo.</div> 
						</div>
					</div>
					
					<div class="form-group col-md-6">
						<label for="Rama"><strong>Rama:</strong></label>
						<span style= "color: red">*</span>
						<select name="Rama" maxlength="1" class="form-control" required>
							<option value="" selected disabled>- Selecciona -</option>
							<?php
								$query = $mysqli -> query ("select * FROM rama");     
								while ($valores = mysqli_fetch_array($query)) {
									echo '<option value="'.$valores['id'].'">'.$valores['rama'].'</option>';          
								}
							?>
						</select>
						<div class="valid-feedback">¡Ok válido!</div>
                      	<div class="invalid-feedback">Complete el campo.</div> 				
					</div>

					<div class="form-group col-md-6">
						<label for="NombreEscuela"><strong>Nombre Corto del Club/Escuela:</strong></label>
						<input type="text" name="Nombre_corto" class="form-control" maxlength="20" value="<?php echo $idUsuario; ?>" readonly style="opacity: 1.5;">
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label><strong>Fecha de Nacimiento:</strong> </label>
							<span style= "color: red">*</span>
							<i class="far fa-calendar-alt"></i>
							<div class="Fecha_Nacimiento" name="Fecha_Nacimiento" id="Fecha_Nacimiento"></div>

							<input type="date" name="fecha_nacimiento"  min="<?php echo date("1970-01-01"); ?>" max="<?php echo date("Y-m-d"); ?>" class="Nacimiento1 form-control form-control-line" onclick="alert('Por favor selecciona el tipo de Identificación.')" readonly>
							<div class="valid-feedback">¡Ok válido!</div>
                      		<div class="invalid-feedback">Complete el campo.</div> 
						</div>
						<div class="form-group col-md-6">
							<label for="Edad"><strong>Edad:</strong></label>
							<input type="number" name="Edad" id="edad" class="form-control" maxlength="2" onkeypress="return Numeros(event)" onpaste="return false"  readonly required>
						</div>
					</div>
										
					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="Patin"><strong>Tipo de Patin:</strong></label>
							<span style= "color: red">*</span> <i class="fas fa-skating"></i>
							<div class="Tipo_Patin" name="Tipo_Patin" id="Tipo_Patin"></div>
							
								<select name="Patín" class="Patin1 form-control" maxlength="25" onchange="hidePatin(this.value)" onclick="alert('Por favor selecciona la fecha de nacimiento.')" required>
									<option value="" selected>- Selecciona el tipo de patín -</option>
								</select>
								<div class="valid-feedback">¡Ok válido!</div>
                      			<div class="invalid-feedback">Complete el campo.</div> 
							</div>
						<div class="form-group col-md-3">
							<div class="Ligado" style="display:none">	
								<label for="Ligado"><strong>Ligado:</strong></label>
								<span style= "color: red">*</span>

								<select name="liga" class="form-control" maxlength="2" onchange="hideLigado(this.value)">
									<option value="" selected>- Selecciona una respuesta -</option>
										<?php
											$query = $mysqli -> query ("select * FROM ligado");     
											while ($valores = mysqli_fetch_array($query)) {
												echo '<option value="'.$valores['id'].'">'.$valores['ligado'].'</option>';          
											}
										?>
								</select>
								<div class="valid-feedback">¡Ok válido!</div>
                      			<div class="invalid-feedback">Complete el campo.</div> 
							</div>	
						</div>

						<div class="form-group col-md-3">
							<div class="Cundinamarca" style="display:none">
								<label for="Afiliacion"><strong>Fecha de Afiliación:</strong></label>
								<span style= "color: red">*</span>
								<input type="date" name="Fecha_afiliacion" class="form-control" maxlength="10" min="2005-01-01" max="<?php echo date("Y-m-d"); ?>"> 
								<div class="valid-feedback">¡Ok válido!</div>
                      			<div class="invalid-feedback">Complete el campo.</div> 
							</div>
						</div>
						
						<div class="form-group col-md-3">
							<div class="Cundinamarca" style="display:none">
								<label for="Renovacion"><strong>Fecha de Renovación:</strong></label>
								<span style= "color: red">*</span>
								<input type="date" name="Fecha_renovacion" class="form-control" maxlength="10" min="2019-01-01" max="<?php echo date("Y-m-d"); ?>">
								<div class="valid-feedback">¡Ok válido!</div>
                      			<div class="invalid-feedback">Complete el campo.</div> 
							</div>
						</div>
					</div>
					<hr>

					<div class="form-group col-md-6">
						<div class="custom-control custom-checkbox">
							<label for="politica">Apreciados Clubes y Escuelas, acogiendo y dando cumplimiento a lo dispuesto en la ley 1581 de 2012 y el Decreto Reglamentario 1377 de 2013 y lo consignado en el artículo 15 de nuestra Constitución Política, adopta y aplica la presente Política para el tratamiento de los datos personales.
								
							LIPACUN, manifiesta que garantiza la intimidad, derechos a la privacidad, y el buen nombre de las personas, durante el proceso del tratamiento de datos personales, en todas las actividades, las cuales tendrán los principios de confidencialidad, seguridad, legalidad, acceso, libertad y transparencia.</label>
							<input class="custom-control-input" type="checkbox" value="" id="invalidCheck" required>
							<label class="custom-control-label" for="invalidCheck">
								Acepto los términos y condiciones
							</label>
							<div class="valid-feedback">¡Aceptado!</div>
							<div class="invalid-feedback">
								Debes estar de acuerdo antes de enviar.
							</div>
						</div>
					</div>
					<br>
					<div class="form-row">
						<div class="form-group col-md-3">
							<button class="btn btn-danger" type="reset"><i class="far fa-trash-alt"></i> Borrar Formulario</button>
						</div>
						<div class="form-group col-md-3">
							<button class="btn btn-primary" type="submit" name="enviar"><i class="fas fa-angle-double-up"></i> Enviar Formulario</button>
						</div>
						<div class="form-group col-md-3">
							<button class="btn btn-success" onclick="history.back()"><i class="fas fa-angle-double-left"></i> Volver</button>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
<!-- Borrar datos -->
<script type="text/javascript">
       (function() {
         var form = document.getElementById('Formulario_Deportistas');
         form.addEventListener('reset', function(event) {
           // si es false entonces que no haga el reset
           if (!confirm('¿Está seguro que desea borrar los datos?')) {
             event.preventDefault();
           }
         }, false);
       })();
	</script>	
	<script type="text/javascript">
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
	  <!-- (function() {
         var form = document.getElementById('Formulario_Deportistas');
         form.addEventListener('submit', function(event) {
           if (!confirm('¿Está Seguro Que desea enviar los datos?')) {
             event.preventDefault();
           }
         }, false);
       })(); -->
</body>
</html>
		