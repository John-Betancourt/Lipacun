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

	$Evento = $_REQUEST['Evento'];
	$_SESSION['Evento'] = $Evento;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Eventos -> Deportistas Inscritos | LIPACUN</title>
	<?php require_once "scripts.php"; ?>
</head>
<body>
	<center>
		<div class="panel-heading"><!--https://www.lipacun.com/-->
			<a href="Index.php"><img src="../imagenes/iconos/Logo.webp" alt="Logo" class="logo" height="90"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/1.webp" alt="favicon1" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/2.webp" alt="favicon2" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/3.webp" alt="favicon3" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/4.webp" alt="favicon4" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/Cundinamarca_logo.webp" alt="Logo" class="logo" height="90">
		</div><hr>
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!--div id="navbar"></div><br-->
					<div class="justify-content-end align-items-center"><!--d-flex -->
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="Index.php">Pagina Principal</a></li>
							<li class="breadcrumb-item"><a href="Lista_Eventos.php">Eventos</a></li>
							<li class="breadcrumb-item active">Deportistas Inscritos al Evento</li>
						</ol>
					</div>
					<div class="card text-left">
					  <h5 class="card-header text-uppercase">
						<b><center>DEPORTISTAS INSCRITOS AL EVENTO "<?php echo $Evento; ?>"</center></b>
					  </h5>
					  <div class="card-body">
						<?php
							$sql = "SELECT tipo_evento FROM eventos WHERE nombre = '$Evento'";
							$result1 = $mysqli->query($sql);
							$row1 = $result1->fetch_assoc();
							$tipo_evento = $row1['tipo_evento'];
							if($tipo_evento == "Ranking"){
								$consulta = "SELECT * FROM inscripcion_deportistas_eventos_ranking WHERE evento = '$Evento' ORDER BY club ASC";
								$resultado = $mysqli->query($consulta);
						?>
						<div class="tabla">
							<table class="table table-hover table-striped table-bordered"  id="idDataTable" data-page-length="25"><!--table table-hover table-condensed table-bordered-->
								<thead  style="background-color: #007bff; color: white; font-weight: bold;">
									<tr>
										<th class="th-sm"><center>#</center></th>
										<th class="th-sm"><center>Deportista</center></th>
										<th class="th-sm"><center>Club</center></th>
										<th class="th-sm"><center>Edad</center></th>
										<th class="th-sm"><center>Rama</center></th>
										<th class="th-sm"><center>No. Deportista</center></th>
									</tr>
								</thead>
								<tbody>
								<?php
									$No = 1;
									while($row = $resultado->fetch_assoc()){
								?>
									<tr>
										<td><center><?php echo $No ?></center></td>
										<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
										<td><center><?php echo $row['club'] ?></center></td>
										<td><center><?php echo $row['edad'] ?></center></td>
										<td><center><?php echo $row['rama'] ?></center></td>
										<td><center><?php echo $row['numero_deportista'] ?></center></td>
									</tr>
								<?php
									$No += 1;
									}
								?>
								</tbody>
								<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
									<tr>
										<th><center>#</center></th>
										<th><center>Deportista</center></th>
										<th><center>Club</center></th>
										<th><center>Edad</center></th>
										<th><center>Rama</center></th>
										<th><center>No. Deportista</center></th>
									</tr>
								</tfoot>
							</table>
						</div>
						<?php
							}else if($tipo_evento == "Escuelas"){
								$consulta = "SELECT * FROM inscripcion_deportistas_eventos_escuelas WHERE evento = '$Evento'";
								$_SESSION['consulta'] = $consulta;
						?>
						<center>
							<button class="btn btn-primary" onClick="AsignarNumeroAuto('<?php echo $Evento; ?>')">Asignar # Automaticamente</button> | 
							<button class="btn btn-primary" onClick="AsignarNumeroManual()" data-toggle="modal" data-target="#asignarnumerodeportistamodal">Asignar # Manualmente</button>
						</center>
						<hr>
						<div id="tablaAsignarNumero"></div>
						<?php
							}
						?>
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
			<footer>Bienvenido <?php echo $user['Rol'] ?> <button class="fas"><i class="fas fa-user-alt"></i></button>&nbsp; &nbsp; &nbsp;
				<a href="../Logout.php"><button class="btn btn-info">Cerrar Sesión</button></a>
				<button class="btn btn-info" onclick="history.back()">Volver</button>
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
			<button type="button" id="btnAsignarNumeroManual" class="btn btn-primary">Asignar</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Fin Modal Asignar Numero Deportista -->
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
					  <label for="Evento1">Evento:</label>
					  <input type="text" class="form-control" id="Evento1" name="Evento1" minlength="8" maxlength="12" readonly>
				  </div>
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
	$(document).ready(function() {
		$('#idDataTable').DataTable({
			language:{
    			"sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                //"sEmptyTable":     "Ningún dato disponible en esta tabla =(",
				"sEmptyTable":     "No hay deportistas inscritos al evento actualmente.",
                "sInfo":           "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
			}
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaAsignarNumero').load('Tabla_Deportistas_Eventos.php');
	});
	
	function AsignarNumeroAuto(id){
		alertify.confirm("Asignar numero de deportista para evento","Está seguro que desea asignar Automaticamente los numero de deportistas para el evento '"+id+"'?, para confirmar la acción, presione continuar, de lo contrario presione cancelar",function(){
			window.open('../procesos/Asignar_Numero_Deportista_Evento_Auto.php?Evento=<?php echo $Evento; ?>','_self');
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
		$('#btnAsignarNumeroManual').click(function(){
			datos=$('#frmasignar').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/Asignar_Numero_Deportista_Evento_Manual.php",
				success:function(r){
					if(r==0){
						$('#frmasignar')[0].reset();
						alertify.error("ERROR PRESENTADO  - No se ha podido asignar el numero de deportista.");
					}else if(r==1){
						$('#frmasignar')[0].reset();
						$('#tablaAsignarNumero').load('Tabla_Deportistas_Eventos.php');
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
						alertify.alert("Atención","El numero de identificación ingresado no corresponde a ningun deportista registrado.");
					}else if(r==11){
						alertify.error("Proporcione un numero de deportista válido.");
					}else if(r==22){
						alertify.error("Proporcione un numero de identificación válido.");
					}else{
						alertify.error("Por favor llene todos los campos del formulario correctamente.");
						//alertify.alert(r);
					}
				}
			});
		});
	});
</script>

<script type="text/javascript">
	evento = "<?php echo $Evento; ?>";
	function EditarNumero(id){
		$.ajax({
			type:"POST",
			//data:"id="+id,
			data: {"id" : id, "evento" : evento},
			url:"../procesos/obtenDatosAsignarNumeroEvento.php",
			success:function(r){
				//alertify.alert("Error "+r);
				datos=jQuery.parseJSON(r);
				$('#Evento1').val(evento);
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
				url:"../procesos/Actualizar_Numero_Deportista_Evento.php",
				success:function(r){
					if(r==0){
						alertify.error("ERROR PRESENTADO  - No se ha podido actualizar el numero de deportista, por favor intente nuevamente");
					}else if(r==1){
						$('#tablaAsignarNumero').load('Tabla_Deportistas_Eventos.php');
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