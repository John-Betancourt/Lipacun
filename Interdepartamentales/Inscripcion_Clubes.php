<?php
	require_once('../clases/conexion_db.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inscripción Clubes y/o Escuelas || LIPACUN</title>
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
				<center><strong>Formulario para inscripción de Clubes y/o Escuelas</strong></center>
			</h5>

			<div class="card-body" style="background: linear-gradient(to right, #E0EAFC, #CFDEF3);">

				<form method="POST" action="Registrar_Clubes.php" id="Formulario_Clubes" class="needs-validation" novalidate>
					
                    <div class="text-center">
                        <div class="form-group col-md-12">
                            <label for="Mensaje1"><h3><em>Información basica del Club y/o Escuela</em></h3></label>
                        </div>
                    </div><br>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label><strong>Municipio Sede:</strong></label>
							<span style= "color: red">*</span>
							<i class="fas fa-university"></i>
							<select name="Municipios" class="form-control" required>
								<option value="" selected disabled>- Selecciona un Municipio  -</option>
                                <?php
                                    $query = $mysqli -> query ("select * FROM municipios WHERE departamento_id = 25");
                                    while ($valores = mysqli_fetch_array($query)) {
                                        echo '<option value="'.$valores['id_municipio'].'">'.$valores['municipio'].'</option>';          
                                    }
					            ?>
							</select>
							<div class="valid-feedback">¡Ok válido!</div>
                      		<div class="invalid-feedback">Complete el campo.</div> 
						</div>
						<div class="form-group col-md-6">
							<label><strong>Nombre del club y/o escuela:</strong></label>
							<span style= "color: red">*</span>
							<input type="text" name="Nombre" class="form-control" maxlength="70" onkeypress="return Alfanumerico(event)" onpaste="return false" required>
							<div class="valid-feedback">¡Ok válido!</div>
							<div class="invalid-feedback">Complete el campo.</div> 
						</div>
					</div><br>

                    <div class="text-center">
                        <div class="form-group col-md-12">
                            <label for="Mensaje2"><h3><em>Persona responsable de la información</em></h3></label>
                        </div>
                    </div><br>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="Nombres"><strong>Nombres:</strong></label>
							<span style= "color: red">*</span>
                            <input type="text" name="Nombres" class="form-control" maxlength="20" onkeypress="return Alfabetico(event)" onpaste="return false" required>
                            <div class="valid-feedback">¡Ok válido!</div>
							<div class="invalid-feedback">Complete el campo.</div>  
						</div>
						<div class="form-group col-md-6">
							<label for="Apellidos"><strong>Apellidos:</strong></label>
                            <input type="text" name="Apellidos" class="form-control" maxlength="20" onkeypress="return Alfabetico(event)" onpaste="return false" required>						</div>
                            <div class="valid-feedback">¡Ok válido!</div>
							<div class="invalid-feedback">Complete el campo.</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="Identificacion"><strong>Número de Identificación:</strong></label>
							<span style= "color: red">*</span>
                            <i class="far fa-address-card"></i>
                            <input type="text" name="CC" class="form-control" maxlength="12" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                      		<div class="invalid-feedback">Complete el campo.</div> 
						</div>

						<div class="form-group col-md-4">
							<label for="Cargo"><strong>Cargo:</strong></label>
							<span style= "color: red">*</span>
                            <select name="Cargo" class="form-control" required>
                                <option value="" selected disabled>- Selecciona un Cargo -</option>
                                <?php
                                    $query = $mysqli -> query ("SELECT * FROM cargo");     
                                    while ($valores = mysqli_fetch_array($query)) {
                                        echo '<option value="'.$valores['id'].'">'.$valores['cargo'].'</option>';
                                    }
                                ?>
				            </select>
							<div class="valid-feedback">¡Ok válido!</div>
                      		<div class="invalid-feedback">Complete el campo.</div> 
						</div>
                        <div class="form-group col-md-4">
							<label for="Telefono"><strong>Teléfono o Celular:</strong></label>
							<span style= "color: red">*</span>
                            <i class="fas fa-mobile-alt"></i>
                            <input type="number" name="Telefono" class="form-control" minlegth="7" maxlength="10" onkeypress="return Numeros(event)" onpaste="return false" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                      		<div class="invalid-feedback">Complete el campo.</div> 
						</div>
					</div><br>

                    <div class="text-center">
                        <div class="form-group col-md-12">
                            <label for="Mensaje2"><h3><em>Información del Club y/o Escuela</em></h3></label>
                        </div>
                    </div><br>
					
					<div class="form-group col-md-6">
						<label for="Email"><strong>Email:</strong></label>
						<span style= "color: red">*</span>
                        <i class="far fa-envelope"></i>
						<input type="email" placeholder="Ej. example@gmail.com"  name="Email" class="form-control" maxlength="50" required> 
						<div class="valid-feedback">¡Ok válido!</div>
                      	<div class="invalid-feedback">Complete el campo.</div> 				
					</div>


					<div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Reconocimiento"><strong>Reconocimiento Deportivo:</strong></label>
                            <span style= "color: red">*</span>
                            <select name="Reconocimiento" class="form-control" onchange="hideReconocimiento(this.value)" required>
                                <option value="" selected disabled>- Selecciona una respuesta -</option>
                                <?php
                                    $query = $mysqli -> query ("SELECT * FROM reconocimiento");     
                                    while ($valores = mysqli_fetch_array($query)) {
                                        echo '<option value="'.$valores['id'].'">'.$valores['reconocimiento'].'</option>';
                                    }
                                ?>
                            </select>
                            <div class="valid-feedback">¡Ok válido!</div>
                      	    <div class="invalid-feedback">Complete el campo.</div> 
                        </div>

						<div class="form-group col-md-4">
                            <div class="Reconocimiento" style="display:none">
                                <label for="NumeroRecon"><strong>Número de Reconocimiento:</strong></label>
                                <span style= "color: red">*</span>
                                <input type="text" name="No_reconocimiento" class="form-control" maxlength="10">
                                <div class="valid-feedback">¡Ok válido!</div>
                      	        <div class="invalid-feedback">Complete el campo.</div>
                            </div>
						</div>
                        
						<div class="form-group col-md-4">
                            <div class="Reconocimiento" style="display:none">
                                <label for="Fecha"><strong>Fecha del Reconocimiento:</strong></label>
                                <span style= "color: red">*</span>
                                <i class="far fa-calendar-alt"></i>
                                <input type="date" name="Fecha_reconocimiento" class="form-control" step="1" min="2013-01-01" max="<?php echo date("Y-m-d");?>" onchange="calcular(this.value)">                                
                                <div class="valid-feedback">¡Ok válido!</div>
                      	        <div class="invalid-feedback">Complete el campo.</div>
                            </div>
						</div>
					</div>
										
					<div class="form-row">
						<div class="form-group col-md-6">
                            <label for="NombreEscuela"><strong>Nombre Corto del Club/Escuela:</strong></label>
                            <span style= "color: red">*</span>
                            <input type="text" name="Nombre_corto" class="form-control" maxlength="20" onkeypress="return Alfanumerico(event)" onpaste="return false" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">Complete el campo.</div>
						</div>
						
						<div class="form-group col-md-6">
								<label for="Direccion"><strong>Dirección Oficial del Club y/o Escuela:</strong></label>
								<span style= "color: red">*</span>
                                <i class="fas fa-map-marker-alt"></i>
                                <input type="text" name="Direccion" class="form-control" maxlength="30" required>
                                <div class="valid-feedback">¡Ok válido!</div>
                      			<div class="invalid-feedback">Complete el campo.</div> 
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
         var form = document.getElementById('Formulario_Clubes');
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
		