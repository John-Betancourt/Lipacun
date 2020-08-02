<?php
  require('../../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["nombre_corto"]==""){
    header("location: ../../Login.php");
  }

  $idUsuario = $_SESSION['nombre_corto'];
  $sql = "Select * FROM clubes WHERE nombre_corto_club='$idUsuario'";
  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();

  $id_listado = $_REQUEST['id'];

  $sql = "SELECT * FROM listados_eventos WHERE id = '$id_listado'";
  $result1 = $mysqli->query($sql);
  $datos = $result1->fetch_assoc();
  $listado = $datos['nombre_listado'];
  $competencia = $datos['competencia'];
  $oro = $datos['oro'];
  $plata = $datos['plata'];
  $bronce = $datos['bronce'];
  //echo $sql;
  if($competencia=="Habilidad"){
	  $query = "SELECT * FROM resultados_eventos_competencia_habilidad WHERE listado = '$id_listado' ORDER BY final_miliseg ASC";
  }else if($competencia=="Fondo_Puntos"){
	  $query = "SELECT * FROM resultados_eventos_competencia_fondo_puntos WHERE listado = '$id_listado' ORDER BY puntos_totales DESC, orden_llegada ASC";
  }else if($competencia=="Fondo_Eliminacion"){
	  $query = "SELECT * FROM resultados_eventos_competencia_fondo_eliminacion WHERE listado = '$id_listado' ORDER BY posicion ASC";
  }else if($competencia=="Fondo_Puntos_Eliminacion"){
	  $query = "SELECT * FROM resultados_eventos_competencia_fondo_puntos_eliminacion WHERE listado = '$id_listado' ORDER BY posicion ASC";
  }else if($competencia=="Velocidad"){
	  $query = "SELECT * FROM resultados_eventos_competencia_velocidad WHERE listado = '$id_listado' ORDER BY tiempo_miliseg ASC";
  }else if($competencia=="Libre"){
	  $query = "SELECT * FROM resultados_eventos_competencia_libre WHERE listado = '$id_listado' ORDER BY posicion_final ASC";
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Resultados "<?php echo $listado; ?>"</title>
	<?php require_once "scripts.php"; ?>
</head>
<body>
	<center>
		<div class="panel-heading"><!--https://www.lipacun.com/-->
			<a href="../Eventos.php"><img src="../../imagenes/iconos/Logo.webp" alt="Logo" class="logo" height="90"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../../imagenes/iconos/1.webp" alt="favicon1" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../../imagenes/iconos/2.webp" alt="favicon2" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../../imagenes/iconos/3.webp" alt="favicon3" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../../imagenes/iconos/4.webp" alt="favicon4" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../../imagenes/iconos/Cundinamarca_logo.webp" alt="Logo" class="logo" height="90">
		</div><hr>
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="justify-content-end align-items-center"><!--d-flex -->
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="../Index.php">Pagina Principal</a></li>
							<li class="breadcrumb-item"><a href="../Eventos.php">Administrar Eventos</a></li>
							<li class="breadcrumb-item"><a href="#"><span onclick="history.go(-2)">Resultados Eventos</span></a></li>
							<li class="breadcrumb-item"><a href="#"><span onclick="history.go(-1)">Listados</span></a></li>
							<li class="breadcrumb-item active">Visualizar Resultados</li>
						</ol>
					</div>
					<div class="card text-left">
					  <h5 class="card-header text-uppercase">
						<b><center>Resultados "<?php echo $listado; ?>"</center></b>
					  </h5>
					  <div class="card-body"><?php
					if($competencia=="Habilidad"){?>
						<div class="tabla">
							<table class="table table-hover table-striped table-condensed" id="idDataTable"><!--table table-hover table-condensed table-bordered-->
								<thead style="background-color: #007bff; color: white; font-weight: bold;">
								  <tr>
									<th class="th-sm"><center>Posición</center></th>
									<th class="th-sm"><center>No.</center></th>
									<th class="th-sm"><center>Deportista</center></th>
									<th class="th-sm"><center>Club</center></th>
									<th class="th-sm"><center>Faltas</center></th>
									<th class="th-sm"><center>Tiempo Final</center></th>
									<th class="th-sm"><center>Premiación</center></th>
								  </tr>
								</thead>
								<tbody>
								<?php
									$No=1;
									$query = stripslashes($query);
									$result=$mysqli->query($query);
									//echo $query;
									while($row=$result->fetch_assoc()){
										$numero = $row['numero_deportista'];	
								?>
									<tr>
										<td><center><?php echo $No ?></center></td>
										<td><center><?php echo $row['numero_deportista'] ?></center></td>
										<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
										<td><center><?php echo $row['club'] ?></center></td>
										<td><center><?php echo $row['faltas'] ?></center></td>
										<td><center><?php echo $row['tiempo_final'] ?></center></td>
										<td><center><?php echo $row['premiacion'] ?></center></td>
									</tr>
								<?php
									$No +=1;
									}
								?>
								</tbody>
								<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
									<tr>
										<th><center>Posición</center></th>
										<th><center>No.</center></th>
										<th><center>Deportista</center></th>
										<th><center>Club</center></th>
										<th><center>Faltas</center></th>
										<th><center>Tiempo Final</center></th>
										<th><center>Premiación</center></th>
									</tr>
								</tfoot>
							</table>
						</div><?php
					}else if($competencia=="Fondo_Puntos"){?>
						<div class="tabla">
							<table class="table table-hover table-striped table-condensed" id="idDataTable"><!--table table-hover table-condensed table-bordered-->
								<thead style="background-color: #007bff; color: white; font-weight: bold;">
								  <tr>
									<th class="th-sm"><center>Puesto</center></th>
									<th class="th-sm"><center>No.</center></th>
									<th class="th-sm"><center>Deportista</center></th>
									<th class="th-sm"><center>Club</center></th>
									<th class="th-sm"><center>Puntos Totales</center></th>
									<th class="th-sm"><center>Observacion</center></th>
									<th class="th-sm"><center>Premios</center></th>
								  </tr>
								</thead>
								<tbody>
								<?php
									$No=1;
									$query = stripslashes($query);
									$result=$mysqli->query($query);
									//echo $query;
									while($row=$result->fetch_assoc()){
										$numero = $row['numero_deportista'];
								?>
									<tr>
										<td><center><?php echo $No ?></center></td>
										<td><center><?php echo $row['numero_deportista'] ?></center></td>
										<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
										<td><center><?php echo $row['club'] ?></center></td>
										<td><center><?php echo $row['puntos_totales'] ?></center></td>
										<td>
											<center>
												<?php
													if(!empty($row['observacion'])){
														echo $row['observacion'];
													}else{
														echo "Orden Llegada " . $row['orden_llegada'] . "°";
													}
												?>
											</center>
										</td>
										<td><center><?php echo $row['premiacion'] ?></center></td>
									</tr>
								<?php
									$No +=1;
										
									}
								?>
								</tbody>
								<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
									<tr>
										<th><center>Puesto</center></th>
										<th><center>No.</center></th>
										<th><center>Deportista</center></th>
										<th><center>Club</center></th>
										<th><center>Total Puntos</center></th>
										<th><center>Observacion</center></th>
										<th><center>Premios</center></th>
									</tr>
								</tfoot>
							</table>
						</div><?php
					}else if($competencia=="Fondo_Eliminacion"){?>
						<div class="tabla">
							<table class="table table-hover table-striped table-condensed" id="idDataTable"><!--table table-hover table-condensed table-bordered-->
								<thead style="background-color: #007bff; color: white; font-weight: bold;">
								  <tr>
									<th class="th-sm"><center>Puesto</center></th>
									<th class="th-sm"><center>No.</center></th>
									<th class="th-sm"><center>Deportista</center></th>
									<th class="th-sm"><center>Club</center></th>
									<th class="th-sm"><center>Posición</center></th>
									<th class="th-sm"><center>Vuelta eliminado</center></th>
									<th class="th-sm"><center>Observacion</center></th>
									<th class="th-sm"><center>Premios</center></th>
								  </tr>
								</thead>
								<tbody>
								<?php
									$No=1;
									$query = stripslashes($query);
									$result=$mysqli->query($query);
									//echo $query;
									while($row=$result->fetch_assoc()){
										$numero = $row['numero_deportista'];
								?>
									<tr>
										<td><center><?php echo $No ?></center></td>
										<td><center><?php echo $numero ?></center></td>
										<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
										<td><center><?php echo $row['club'] ?></center></td>
										<td><center><?php echo $row['orden_llegada'] ?></center></td>
										<td><center><?php echo $row['vuelta_eliminado'] ?></center></td>
										<td><center><?php echo $row['observacion'] ?></center></td>
										<td><center><?php echo $row['premiacion'] ?></center></td>
									</tr>
								<?php
									$No +=1;
										
									}
								?>
								</tbody>
								<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
									<tr>
										<th><center>Puesto</center></th>
										<th><center>No.</center></th>
										<th><center>Deportista</center></th>
										<th><center>Club</center></th>
										<th><center>Posición</center></th>
										<th><center>Vuelta eliminado</center></th>
										<th><center>Observacion</center></th>
										<th><center>Premios</center></th>
									</tr>
								</tfoot>
							</table>
						</div><?php
					}else if($competencia=="Fondo_Puntos_Eliminacion"){?>
						<div class="tabla">
							<table class="table table-hover table-striped table-condensed" id="idDataTable"><!--table table-hover table-condensed table-bordered-->
								<thead style="background-color: #007bff; color: white; font-weight: bold;">
								  <tr>
									<th class="th-sm"><center>Puesto</center></th>
									<th class="th-sm"><center>No.</center></th>
									<th class="th-sm"><center>Deportista</center></th>
									<th class="th-sm"><center>Club</center></th>
									<th class="th-sm"><center>Vuelta eliminado</center></th>
									<th class="th-sm"><center>Posición de llegada</center></th>
									<th class="th-sm"><center>Puntos Totales</center></th>
									<th class="th-sm"><center>Observacion</center></th>
									<th class="th-sm"><center>Premios</center></th>
								  </tr>
								</thead>
								<tbody>
								<?php
									$No=1;
									$query = stripslashes($query);
									$result=$mysqli->query($query);
									//echo $query;
									while($row=$result->fetch_assoc()){
										$numero = $row['numero_deportista'];
								?>
									<tr>
										<td><center><?php echo $No ?></center></td>
										<td><center><?php echo $numero ?></center></td>
										<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
										<td><center><?php echo $row['club'] ?></center></td>
										<td><center><?php echo $row['vuelta_eliminado'] ?></center></td>
										<td><center><?php echo $row['orden_llegada']  ?></center></td>
										<td><center><?php echo $row['puntos_totales'] ?></center></td>
										<td><center><?php echo $row['observacion'] ?></center></td>
										<td><center><?php echo $row['premiacion'] ?></center></td>
									</tr>
								<?php
									$No +=1;
										
									}
								?>
								</tbody>
								<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
									<tr>
										<th><center>Puesto</center></th>
										<th><center>No.</center></th>
										<th><center>Deportista</center></th>
										<th><center>Club</center></th>
										<th><center>Vuelta eliminado</center></th>
										<th><center>Posición de llegada</center></th>
										<th><center>Puntos Totales</center></th>
										<th><center>Observacion</center></th>
										<th><center>Premios</center></th>
									</tr>
								</tfoot>
							</table>
						</div><?php
					}else if($competencia=="Velocidad"){?>
						  <div class="tabla">
							<table class="table table-hover table-striped table-condensed" id="idDataTable"><!--table table-hover table-condensed table-bordered-->
								<thead style="background-color: #007bff; color: white; font-weight: bold;">
								  <tr>
									<th class="th-sm"><center>Posición</center></th>
									<th class="th-sm"><center>No.</center></th>
									<th class="th-sm"><center>Deportista</center></th>
									<th class="th-sm"><center>Club</center></th>
									<th class="th-sm"><center>Tiempo</center></th>
									<th class="th-sm"><center>Observaciones</center></th>
									<th class="th-sm"><center>Premios</center></th>
								  </tr>
								</thead>
								<tbody>
								<?php
									$No=1;
									$query = stripslashes($query);
									$result=$mysqli->query($query);
									//echo $query;
									while($row=$result->fetch_assoc()){
										$numero = $row['numero_deportista'];
								?>
									<tr>
										<td><center><?php echo $No ?></center></td>
										<td><center><?php echo $numero ?></center></td>
										<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
										<td><center><?php echo $row['club'] ?></center></td>
										<td><center><?php echo $row['tiempo'] ?></center></td>
										<td><center><?php echo $row['observacion'] ?></center></td>
										<td><center><?php echo $row['premiacion'] ?></center></td>
									</tr>
								<?php
									$No +=1;
									}
								?>
								</tbody>
								<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
									<tr>
										<th><center>Posición</center></th>
										<th><center>No.</center></th>
										<th><center>Deportista</center></th>
										<th><center>Club</center></th>
										<th><center>Tiempo</center></th>
										<th><center>Observaciones</center></th>
										<th><center>Premios</center></th>
									</tr>
								</tfoot>
							</table>
						</div><?php
					}else if($competencia=="Libre"){?>
						<div class="tabla">
							<table class="table table-hover table-striped table-condensed" id="idDataTable"><!--table table-hover table-condensed table-bordered-->
								<thead style="background-color: #007bff; color: white; font-weight: bold;">
								  <tr>
									<th class="th-sm"><center>Puesto</center></th>
									<th class="th-sm"><center>No.</center></th>
									<th class="th-sm"><center>Deportista</center></th>
									<th class="th-sm"><center>Club</center></th>
									<th class="th-sm"><center>Posición</center></th>
									<th class="th-sm"><center>Observacion</center></th>
									<th class="th-sm"><center>Premios</center></th>
								  </tr>
								</thead>
								<tbody>
								<?php
									$No=1;
									$query = stripslashes($query) or die($mysqli->error);
									$result=$mysqli->query($query);
									//echo $query;
									while($row=$result->fetch_assoc()){
										$numero = $row['numero_deportista'];
								?>
									<tr>
										<td><center><?php echo $No ?></center></td>
										<td><center><?php echo $row['numero_deportista'] ?></center></td>
										<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
										<td><center><?php echo $row['club'] ?></center></td>
										<td><center><?php echo $row['posicion'] ?></center></td>
										<td><center><?php echo $row['observacion'] ?></center></td>
										<td><center><?php echo $row['premiacion'] ?></center></td>
									</tr>
								<?php
									$No +=1;
										
									}
								?>
								</tbody>
								<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
									<tr>
										<th><center>Puesto</center></th>
										<th><center>No.</center></th>
										<th><center>Deportista</center></th>
										<th><center>Club</center></th>
										<th><center>Posición</center></th>
										<th><center>Observacion</center></th>
										<th><center>Premios</center></th>
									</tr>
								</tfoot>
							</table>
						</div><?php
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
			<footer>Bienvenido <?php echo $idUsuario; ?> <button class="fas"><i class="fas fa-user-alt"></i></button>&nbsp; &nbsp; &nbsp;
                <a href="../../Logout.php"><button class="btn btn-info">Cerrar Sesión</button></a>
				<button class="btn btn-info" onclick="history.back()">Volver</button>
            </footer>
		</div>
		<!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
	</center>
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

<script type="text/javascript">
	$(document).ready(function() {
		var printCounter = 0;
		
		// Append a caption to the table before the DataTables initialisation
    	//$('#idDataTable').append('<caption style="caption-side: bottom">A fictional company\'s staff table.</caption>');
		
		$('#idDataTable').DataTable({
			dom: 'Bfrtip',
			lengthChange: false,
			buttons: [
				{
					extend:		'copyHtml5',
					text:		'<i class="fa fa-files-o"></i>',
					//text:		'<i class="far fa-copy"></i>',
					titleAttr:	'Copiar Tabla',
					//title:		'Listado evento: '+evento,
				},
				{
					extend:		'excelHtml5',
					text:		'<i class="fa fa-file-excel-o"></i>',
					titleAttr:	'Exportar a Excel',
					className:	'btn btn-success',
					//title:		'Listado evento: '+evento,
				},
				{
					extend:		'pdfHtml5',
					text:		'<i class="fa fa-file-pdf-o"></i>',
					titleAttr:	'Exportar a PDF',
					className:	'btn btn-danger',
					//title:		'Listado evento: '+evento,
				},
				{
					extend:		'print',
					text:		'<i class="fa fa-print"></i>',
					titleAttr:	'Imprimir Tabla',
					className:	'btn btn-warning',
					//title:		'Listado evento: '+evento,
				}
			],
			language:{
    			"sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "No se encontraron resultados =(",
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
                    "excel": "Excel",
                    "csv": "CSV",
                    "pdf": "PDF",
                    "print": "Imprimir",
                    "colvis": "Visibilidad",
					copyTitle: 'Copiar al portapapeles',
                	copySuccess: {
						_: 'Copió %d filas al portapapeles',
						1: 'Copió 1 filas al portapapeles'
					}
                }
			}
		});
		table.buttons().container()
        .appendTo( '#idDataTable_wrapper .col-md-6:eq(0)' );
	});
</script>