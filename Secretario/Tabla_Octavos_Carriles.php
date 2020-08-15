<?php
require('../clases/conexion_db.php');
session_start();

if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
	header("location: ../Administrador/Login.php");
}
$Evento = $_SESSION['Evento'];
$id_listado = $_SESSION['id'];

?>

<div class="tabla">
	<center><h3>llave 1</h3></center>
	<table id="idDataTable1" class="display table table-hover table-striped table-bordered" style="width:100%">
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
		  <tr>
			<th class="th-sm"><center>Posición inicial</center></th>
			<th class="th-sm"><center>#</center></th>
			<th class="th-sm"><center>Deportista</center></th>
			<th class="th-sm"><center>Club</center></th>
			<th class="th-sm"><center>Observcación</center></th>
			<th class="th-sm"><center>Tiempo</center></th>
			<th class="th-sm"><center>Acción</center></th>
		  </tr>
		</thead>
		<tbody>
		<?php
			
			$sql = "SELECT * FROM resultados_eventos_competencia_carriles WHERE nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_octavos = 1 OR nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_octavos = 9 ORDER BY `posicion_octavos` ASC" ;
			$result = $mysqli->query($sql);
			while($row = $result->fetch_assoc()){
				
		?>
			<tr>
				<td><center><?php echo $row['posicion_octavos'] ?></center></td>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'] ?></td>
				<td><?php echo $row['club'] ?></td>
				<td><?php echo $row['observacion'] ?></td>
				<td><?php echo $row['tiempo_octavos'] ?></td>
				<td style="text-align: center;">
				<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
				<span class="fa fa-pencil-square-o"></span>
				</span>
				</td>
			</tr>
			<?php
				//}
			}
		?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>Posición inicial</center></th>
				<th><center>#</center></th>
				<th><center>Deportista</center></th>
				<th><center>Club</center></th>
				<th><center>Observación</center></th>
				<th><center>Tiempo</center></th>
				<th><center>Acción</center></th>
			</tr>
		</tfoot>
	</table>
</div>
<div class="tabla">
	<center><h3>llave 2</h3></center>
	<table id="idDataTable2" class="display table table-hover table-striped table-bordered" style="width:100%">
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
		  <tr>
			<th class="th-sm"><center>Posición inicial</center></th>
			<th class="th-sm"><center>#</center></th>
			<th class="th-sm"><center>Deportista</center></th>
			<th class="th-sm"><center>Club</center></th>
			<th class="th-sm"><center>Observcación</center></th>
			<th class="th-sm"><center>Tiempo</center></th>
			<th class="th-sm"><center>Acción</center></th>
		  </tr>
		</thead>
		<tbody>
		<?php
			
			$sql = "SELECT * FROM resultados_eventos_competencia_carriles WHERE nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_octavos = 2 OR nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_octavos = 10 ORDER BY `posicion_octavos` ASC" ;
			$result = $mysqli->query($sql);
			while($row = $result->fetch_assoc()){
				
		?>
			<tr>
				<td><center><?php echo $row['posicion_octavos'] ?></center></td>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'] ?></td>
				<td><?php echo $row['club'] ?></td>
				<td><?php echo $row['observacion'] ?></td>
				<td><?php echo $row['tiempo_octavos'] ?></td>
				<td style="text-align: center;">
				<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
				<span class="fa fa-pencil-square-o"></span>
				</span>
				</td>
			</tr>
			<?php
				//}
			}
		?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>Posición inicial</center></th>
				<th><center>#</center></th>
				<th><center>Deportista</center></th>
				<th><center>Club</center></th>
				<th><center>Observación</center></th>
				<th><center>Tiempo</center></th>
				<th><center>Acción</center></th>
			</tr>
		</tfoot>
	</table>
</div>

<div class="tabla">
	<center><h3>llave 3</h3></center>
	<table id="idDataTable3" class="display table table-hover table-striped table-bordered" style="width:100%">
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
		  <tr>
			<th class="th-sm"><center>Posición inicial</center></th>
			<th class="th-sm"><center>#</center></th>
			<th class="th-sm"><center>Deportista</center></th>
			<th class="th-sm"><center>Club</center></th>
			<th class="th-sm"><center>Observcación</center></th>
			<th class="th-sm"><center>Tiempo</center></th>
			<th class="th-sm"><center>Acción</center></th>
		  </tr>
		</thead>
		<tbody>
		<?php
			
			$sql = "SELECT * FROM resultados_eventos_competencia_carriles WHERE nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_octavos = 3 OR nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_octavos = 11 ORDER BY `posicion_octavos` ASC" ;
			$result = $mysqli->query($sql);
			while($row = $result->fetch_assoc()){
				
		?>
			<tr>
				<td><center><?php echo $row['posicion_octavos'] ?></center></td>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'] ?></td>
				<td><?php echo $row['club'] ?></td>
				<td><?php echo $row['observacion'] ?></td>
				<td><?php echo $row['tiempo_octavos'] ?></td>
				<td style="text-align: center;">
				<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
				<span class="fa fa-pencil-square-o"></span>
				</span>
				</td>
			</tr>
			<?php
				//}
			}
		?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>Posición inicial</center></th>
				<th><center>#</center></th>
				<th><center>Deportista</center></th>
				<th><center>Club</center></th>
				<th><center>Observación</center></th>
				<th><center>Tiempo</center></th>
				<th><center>Acción</center></th>
			</tr>
		</tfoot>
	</table>
</div>

<div class="tabla">
	<center><h3>llave 4</h3></center>
	<table id="idDataTable4" class="display table table-hover table-striped table-bordered" style="width:100%">
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
		  <tr>
			<th class="th-sm"><center>Posición inicial</center></th>
			<th class="th-sm"><center>#</center></th>
			<th class="th-sm"><center>Deportista</center></th>
			<th class="th-sm"><center>Club</center></th>
			<th class="th-sm"><center>Observcación</center></th>
			<th class="th-sm"><center>Tiempo</center></th>
			<th class="th-sm"><center>Acción</center></th>
		  </tr>
		</thead>
		<tbody>
		<?php
			
			$sql = "SELECT * FROM resultados_eventos_competencia_carriles WHERE nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_octavos = 4 OR nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_octavos = 12 ORDER BY `posicion_octavos` ASC" ;
			$result = $mysqli->query($sql);
			while($row = $result->fetch_assoc()){
				
		?>
			<tr>
				<td><center><?php echo $row['posicion_octavos'] ?></center></td>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'] ?></td>
				<td><?php echo $row['club'] ?></td>
				<td><?php echo $row['observacion'] ?></td>
				<td><?php echo $row['tiempo_octavos'] ?></td>
				<td style="text-align: center;">
				<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
				<span class="fa fa-pencil-square-o"></span>
				</span>
				</td>
			</tr>
			<?php
				//}
			}
		?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>Posición inicial</center></th>
				<th><center>#</center></th>
				<th><center>Deportista</center></th>
				<th><center>Club</center></th>
				<th><center>Observación</center></th>
				<th><center>Tiempo</center></th>
				<th><center>Acción</center></th>
			</tr>
		</tfoot>
	</table>
</div>

<div class="tabla">
	<center><h3>llave 5</h3></center>
	<table id="idDataTable5" class="display table table-hover table-striped table-bordered" style="width:100%">
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
		  <tr>
			<th class="th-sm"><center>Posición inicial</center></th>
			<th class="th-sm"><center>#</center></th>
			<th class="th-sm"><center>Deportista</center></th>
			<th class="th-sm"><center>Club</center></th>
			<th class="th-sm"><center>Observcación</center></th>
			<th class="th-sm"><center>Tiempo</center></th>
			<th class="th-sm"><center>Acción</center></th>
		  </tr>
		</thead>
		<tbody>
		<?php
			
			$sql = "SELECT * FROM resultados_eventos_competencia_carriles WHERE nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_octavos = 5 OR nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_octavos = 13 ORDER BY `posicion_octavos` ASC" ;
			$result = $mysqli->query($sql);
			while($row = $result->fetch_assoc()){
				
		?>
			<tr>
				<td><center><?php echo $row['posicion_octavos'] ?></center></td>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'] ?></td>
				<td><?php echo $row['club'] ?></td>
				<td><?php echo $row['observacion'] ?></td>
				<td><?php echo $row['tiempo_octavos'] ?></td>
				<td style="text-align: center;">
				<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
				<span class="fa fa-pencil-square-o"></span>
				</span>
				</td>
			</tr>
			<?php
				//}
			}
		?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>Posición inicial</center></th>
				<th><center>#</center></th>
				<th><center>Deportista</center></th>
				<th><center>Club</center></th>
				<th><center>Observación</center></th>
				<th><center>Tiempo</center></th>
				<th><center>Acción</center></th>
			</tr>
		</tfoot>
	</table>
</div>
<div class="tabla">
	<center><h3>llave 6</h3></center>
	<table id="idDataTable6" class="display table table-hover table-striped table-bordered" style="width:100%">
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
		  <tr>
			<th class="th-sm"><center>Posición inicial</center></th>
			<th class="th-sm"><center>#</center></th>
			<th class="th-sm"><center>Deportista</center></th>
			<th class="th-sm"><center>Club</center></th>
			<th class="th-sm"><center>Observcación</center></th>
			<th class="th-sm"><center>Tiempo</center></th>
			<th class="th-sm"><center>Acción</center></th>
		  </tr>
		</thead>
		<tbody>
		<?php
			
			$sql = "SELECT * FROM resultados_eventos_competencia_carriles WHERE nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_octavos = 6 OR nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_octavos = 14 ORDER BY `posicion_octavos` ASC" ;
			$result = $mysqli->query($sql);
			while($row = $result->fetch_assoc()){
				
		?>
			<tr>
				<td><center><?php echo $row['posicion_octavos'] ?></center></td>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'] ?></td>
				<td><?php echo $row['club'] ?></td>
				<td><?php echo $row['observacion'] ?></td>
				<td><?php echo $row['tiempo_octavos'] ?></td>
				<td style="text-align: center;">
				<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
				<span class="fa fa-pencil-square-o"></span>
				</span>
				</td>
			</tr>
			<?php
				//}
			}
		?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>Posición inicial</center></th>
				<th><center>#</center></th>
				<th><center>Deportista</center></th>
				<th><center>Club</center></th>
				<th><center>Observación</center></th>
				<th><center>Tiempo</center></th>
				<th><center>Acción</center></th>
			</tr>
		</tfoot>
	</table>
</div>
<div class="tabla">
	<center><h3>llave 7</h3></center>
	<table id="idDataTable7" class="display table table-hover table-striped table-bordered" style="width:100%">
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
		  <tr>
			<th class="th-sm"><center>Posición inicial</center></th>
			<th class="th-sm"><center>#</center></th>
			<th class="th-sm"><center>Deportista</center></th>
			<th class="th-sm"><center>Club</center></th>
			<th class="th-sm"><center>Observcación</center></th>
			<th class="th-sm"><center>Tiempo</center></th>
			<th class="th-sm"><center>Acción</center></th>
		  </tr>
		</thead>
		<tbody>
		<?php
			
			$sql = "SELECT * FROM resultados_eventos_competencia_carriles WHERE nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_octavos = 7 OR nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_octavos = 15 ORDER BY `posicion_octavos` ASC" ;
			$result = $mysqli->query($sql);
			while($row = $result->fetch_assoc()){
				
		?>
			<tr>
				<td><center><?php echo $row['posicion_octavos'] ?></center></td>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'] ?></td>
				<td><?php echo $row['club'] ?></td>
				<td><?php echo $row['observacion'] ?></td>
				<td><?php echo $row['tiempo_octavos'] ?></td>
				<td style="text-align: center;">
				<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
				<span class="fa fa-pencil-square-o"></span>
				</span>
				</td>
			</tr>
			<?php
				//}
			}
		?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>Posición inicial</center></th>
				<th><center>#</center></th>
				<th><center>Deportista</center></th>
				<th><center>Club</center></th>
				<th><center>Observación</center></th>
				<th><center>Tiempo</center></th>
				<th><center>Acción</center></th>
			</tr>
		</tfoot>
	</table>
</div>
<div class="tabla">
	<center><h3>llave 8</h3></center>
	<table id="idDataTable8" class="display table table-hover table-striped table-bordered" style="width:100%">
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
		  <tr>
			<th class="th-sm"><center>Posición inicial</center></th>
			<th class="th-sm"><center>#</center></th>
			<th class="th-sm"><center>Deportista</center></th>
			<th class="th-sm"><center>Club</center></th>
			<th class="th-sm"><center>Observcación</center></th>
			<th class="th-sm"><center>Tiempo</center></th>
			<th class="th-sm"><center>Acción</center></th>
		  </tr>
		</thead>
		<tbody>
		<?php
			
			$sql = "SELECT * FROM resultados_eventos_competencia_carriles WHERE nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_octavos = 8 OR nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_octavos = 16 ORDER BY `posicion_octavos` ASC" ;
			$result = $mysqli->query($sql);
			while($row = $result->fetch_assoc()){
				
		?>
			<tr>
				<td><center><?php echo $row['posicion_octavos'] ?></center></td>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'] ?></td>
				<td><?php echo $row['club'] ?></td>
				<td><?php echo $row['observacion'] ?></td>
				<td><?php echo $row['tiempo_octavos'] ?></td>
				<td style="text-align: center;">
				<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
				<span class="fa fa-pencil-square-o"></span>
				</span>
				</td>
			</tr>
			<?php
				//}
			}
		?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>Posición inicial</center></th>
				<th><center>#</center></th>
				<th><center>Deportista</center></th>
				<th><center>Club</center></th>
				<th><center>Observación</center></th>
				<th><center>Tiempo</center></th>
				<th><center>Acción</center></th>
			</tr>
		</tfoot>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#idDataTable1').DataTable({
			dom: 'Bfrtip',
			lengthChange: false,
			"bPaginate": false, //Ocultar paginación
			"bInfo": false,
			buttons: [
				{
					extend:		'copyHtml5',
					text:		'<i class="fa fa-files-o"></i>',
					//text:		'<i class="far fa-copy"></i>',
					titleAttr:	'Copiar Tabla',
					title:		'llave 1',
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
					copyTitle: 'Copiar al portapapeles',
                	copySuccess: {
						_: 'Copió %d filas al portapapeles',
						1: 'Copió 1 filas al portapapeles'
					}
                }
			}
		});

		$('#idDataTable2').DataTable({
			dom: 'Bfrtip',
			lengthChange: false,
			"bPaginate": false, //Ocultar paginación
			"bInfo": false,
			buttons: [
				{
					extend:		'copyHtml5',
					text:		'<i class="fa fa-files-o"></i>',
					//text:		'<i class="far fa-copy"></i>',
					titleAttr:	'Copiar Tabla',
					title:		'llave 2',
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
					copyTitle: 'Copiar al portapapeles',
                	copySuccess: {
						_: 'Copió %d filas al portapapeles',
						1: 'Copió 1 filas al portapapeles'
					}
                }
			}
		});

		$('#idDataTable3').DataTable({
			dom: 'Bfrtip',
			lengthChange: false,
			"bPaginate": false, //Ocultar paginación
			"bInfo": false,
			buttons: [
				{
					extend:		'copyHtml5',
					text:		'<i class="fa fa-files-o"></i>',
					//text:		'<i class="far fa-copy"></i>',
					titleAttr:	'Copiar Tabla',
					title:		'llave 3',
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
					copyTitle: 'Copiar al portapapeles',
                	copySuccess: {
						_: 'Copió %d filas al portapapeles',
						1: 'Copió 1 filas al portapapeles'
					}
                }
			}
		});
		
		$('#idDataTable4').DataTable({
			dom: 'Bfrtip',
			lengthChange: false,
			"bPaginate": false, //Ocultar paginación
			"bInfo": false,
			buttons: [
				{
					extend:		'copyHtml5',
					text:		'<i class="fa fa-files-o"></i>',
					//text:		'<i class="far fa-copy"></i>',
					titleAttr:	'Copiar Tabla',
					title:		'llave 4',
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
					copyTitle: 'Copiar al portapapeles',
                	copySuccess: {
						_: 'Copió %d filas al portapapeles',
						1: 'Copió 1 filas al portapapeles'
					}
                }
			}
		});

		$('#idDataTable5').DataTable({
			dom: 'Bfrtip',
			lengthChange: false,
			"bPaginate": false, //Ocultar paginación
			"bInfo": false,
			buttons: [
				{
					extend:		'copyHtml5',
					text:		'<i class="fa fa-files-o"></i>',
					//text:		'<i class="far fa-copy"></i>',
					titleAttr:	'Copiar Tabla',
					title:		'llave 5',
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
					copyTitle: 'Copiar al portapapeles',
                	copySuccess: {
						_: 'Copió %d filas al portapapeles',
						1: 'Copió 1 filas al portapapeles'
					}
                }
			}
		});

		$('#idDataTable6').DataTable({
			dom: 'Bfrtip',
			lengthChange: false,
			"bPaginate": false, //Ocultar paginación
			"bInfo": false,
			buttons: [
				{
					extend:		'copyHtml5',
					text:		'<i class="fa fa-files-o"></i>',
					//text:		'<i class="far fa-copy"></i>',
					titleAttr:	'Copiar Tabla',
					title:		'llave 6',
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
					copyTitle: 'Copiar al portapapeles',
                	copySuccess: {
						_: 'Copió %d filas al portapapeles',
						1: 'Copió 1 filas al portapapeles'
					}
                }
			}
		});

		$('#idDataTable7').DataTable({
			dom: 'Bfrtip',
			lengthChange: false,
			"bPaginate": false, //Ocultar paginación
			"bInfo": false,
			buttons: [
				{
					extend:		'copyHtml5',
					text:		'<i class="fa fa-files-o"></i>',
					//text:		'<i class="far fa-copy"></i>',
					titleAttr:	'Copiar Tabla',
					title:		'llave 7',
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
					copyTitle: 'Copiar al portapapeles',
                	copySuccess: {
						_: 'Copió %d filas al portapapeles',
						1: 'Copió 1 filas al portapapeles'
					}
                }
			}
		});
		
		$('#idDataTable8').DataTable({
			dom: 'Bfrtip',
			lengthChange: false,
			"bPaginate": false, //Ocultar paginación
			"bInfo": false,
			buttons: [
				{
					extend:		'copyHtml5',
					text:		'<i class="fa fa-files-o"></i>',
					//text:		'<i class="far fa-copy"></i>',
					titleAttr:	'Copiar Tabla',
					title:		'llave 8',
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
					copyTitle: 'Copiar al portapapeles',
                	copySuccess: {
						_: 'Copió %d filas al portapapeles',
						1: 'Copió 1 filas al portapapeles'
					}
                }
			}
		});
	});
</script>