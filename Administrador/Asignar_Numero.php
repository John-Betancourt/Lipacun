<?php
  require_once('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
    header("location: Login.php");
  }

  $idUsuario = $_SESSION['codigo_usuario'];
  $sql = "Select * FROM usuarios WHERE Usuario='$idUsuario'";
  $result=$mysqli->query($sql);
  $user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Asignar numero Deportistas | Lipacun</title>
	<?php require_once "scripts.php"; ?>
</head>
<body>
	<center>
		<div class="panel-heading"><!--https://www.lipacun.com/-->
			<a href="Listar_Deportistas.php"><img src="../imagenes/iconos/Logo.webp" alt="Logo" class="logo" height="90"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/1.webp" alt="favicon1" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/2.webp" alt="favicon2" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/3.webp" alt="favicon3" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/4.webp" alt="favicon4" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/Cundinamarca_logo.webp" alt="Logo" class="logo" height="90">
		</div><hr>
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="justify-content-end align-items-center"><!--d-flex -->
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="Index.php">Pagina Principal</a></li>
							<li class="breadcrumb-item"><a href="Listar_Deportistas.php">Lista Deportistas de Cundinamarca</a></li>
							<li class="breadcrumb-item active">Asignar Numero Deportistas</li>
						</ol>
					</div>
					<div class="card text-left">
					  <h5 class="card-header text-uppercase">
						<b><center>Asignar numero de deportistas para temporada | Lipacun</center></b>
					  </h5>
					  <div class="card-body">
						<center>
							<button class="btn btn-primary" onClick="AsignarNumeroAuto()">Asignar # Automaticamente</button> | 
							<button class="btn btn-primary" onClick="AsignarNumeroManual()" data-toggle="modal" data-target="#asignarnumerodeportistamodal">Asignar # Manualmente</button>
						</center>
						<hr>
						<div id="tablaAsignarNumero"></div>
					  </div>
					  <div class="card-footer text-muted">
						<center>LIPACUN | Copyright <?php auto_copyright(); // Current year?> Todos los derechos reservados | By Brian y John</center>
					  </div>
					</div>
				</div>
			</div>
			<br><br/>
		</div>
		<br><br/>
		<!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
		<div class="footer2">
            <footer>Bienvenido <?php echo $user['Rol'] ?> <button class="fas"><i class="fas fa-user-alt"></i></button>&nbsp; &nbsp;
                <a href="../Logout.php"><button class="btn btn-info">Cerrar Sesión</button></a>
				<a href="Listar_Deportistas.php"><button class="btn btn-info">Volver</button></a>
            </footer>
		</div>
		<!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
	</center>
	<!-- Modal Asignar Numero Deportista -->
	<div class="modal fade" id="asignarnumerodeportistamodal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="staticBackdropLabel">Asignar Numero Deportista</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			  <form id="frmasignar">
				  <div class="form-group">
					  <label for="Identificacion">Identificación Deportista:</label>
					  <input type="number" class="form-control" id="Identificacion" name="Identificacion" minlength="8" maxlength="12" required>
				  </div>
				  <div class="form-group">
					  <label for="numero_deportista">Numero Deportista:</label>
					  <input type="number" class="form-control" id="numero_deportista" name="numero_deportista" maxlength="3" required>
				  </div>
			  </form>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="button" id="btnAsignarNumero" class="btn btn-primary">Asignar</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Fin Modal Editar Numero Deportista -->
	<!-- Modal Editar Numero Deportista -->
	<div class="modal fade" id="editarnumerodeportistamodal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="staticBackdropLabel">Editar Numero Deportista</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			  <form id="frmactualizar">
				  <div class="form-group">
					  <label for="Identificacion1">Identificación Deportista:</label>
					  <input type="number" class="form-control" id="Identificacion1" name="Identificacion1" minlength="8" maxlength="12" readonly>
				  </div>
				  <div class="form-group">
					  <label for="numero_deportista1">Numero Deportista:</label>
					  <input type="number" class="form-control" id="numero_deportista1" name="numero_deportista1" maxlength="3" required>
				  </div>
			  </form>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="button" id="btnActualizarNumero" class="btn btn-primary">Actualizar</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Fin Modal Editar Numero Deportista -->
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

<!-- Js Files_________________________________ -->

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaAsignarNumero').load('Tabla_Asignar_Numero.php');
	});
	
	function AsignarNumeroAuto(id){
		alertify.confirm("Asignar numero de deportista para temporada","Está seguro que desea asignar Automaticamente los numero de deportistas para la temporada?, para confirmar la acción, presione continuar, de lo contrario presione cancelar",function(){
			window.open('Registrar_Numero.php','_self');
		},function(){
			alertify.error('Cancelado');
		}).set({labels:{ok:'Continuar', cancel:'Cancelar'}});
	}

	function AsignarNumeroManual(id){
		$('#Identificacion').val(id);
	}
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAsignarNumero').click(function(){
			datos=$('#frmasignar').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/Asignar_Numero_Deportista.php",
				success:function(r){
					if(r==0){
						$('#frmasignar')[0].reset();
						alertify.error("ERROR PRESENTADO  - No se ha podido asignar el numero de deportista.");
					}else if(r==1){
						$('#frmasignar')[0].reset();
						$('#tablaAsignarNumero').load('Tabla_Asignar_Numero.php');
						alertify.success("Se ha asignado el numero de deportista exitosamente!");
					}else if(r==2){
						alertify.alert("Atención","El numero de deportista ingresado, ya está en uso.");
					}else if(r==3){
						$('#frmasignar')[0].reset();
						alertify.alert("Atención","El deportista con la identificacion ingresada, ya tiene numero asignado.");
					}else if(r==4){
						$('#frmasignar')[0].reset();
						alertify.alert("Atención","El deportista con la identificacion ingresada, no cumple con los requisitos para la asignación de numero para la temporada.");
					}else if(r==5){
						$('#frmasignar')[0].reset();
						alertify.alert("Atención","El numero de identificación ingresado no corresponde a ningun deportista registrado o se le ha dado de baja.");
					}else if(r==11){
						alertify.error("Proporcione un numero de deportista válido.");
					}else if(r==22){
						alertify.error("Proporcione un numero de identificación válido.");
					}else{
						alertify.error("Por favor llene todos los campos del formulario correctamente.");
					}
				}
			});
		});
	});
</script>

<script type="text/javascript">	
	function EditarNumero(id){
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:"../procesos/obtenDatosAsignarNumero.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#Identificacion1').val(datos['identificacion_deportista']);
				$('#numero_deportista1').val(datos['numero_deportista']);
			}
		})
	}
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnActualizarNumero').click(function(){
			datos=$('#frmactualizar').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/Actualizar_Numero_Deportista.php",
				success:function(r){
					if(r==0){
						alertify.error("ERROR PRESENTADO  - No se ha podido actualizar el numero de deportista, por favor intente nuevamente");
					}else if(r==1){
						$('#tablaAsignarNumero').load('Tabla_Asignar_Numero.php');
						alertify.success("Se ha actualizado el numero de deportista exitosamente!");
					}else if(r==2){
						alertify.alert("Atención","El numero de deportista ingresado, ya está en uso.");
					}else if(r==11){
						alertify.error("Proporcione un numero de deportista válido.");
					}else{
						alertify.alert("Error "+r);
					}
				}
			});
		});
	});
</script>