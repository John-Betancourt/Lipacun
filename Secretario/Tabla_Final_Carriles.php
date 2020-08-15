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
	<center><h3>1ro y 2do</h3></center>
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
			
			$sql = "SELECT * FROM resultados_eventos_competencia_carriles WHERE nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_final = 1 OR nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_final = 2 ORDER BY `posicion_final` ASC" ;
			$result = $mysqli->query($sql);
			while($row = $result->fetch_assoc()){
				
		?>
			<tr>
				<td><center><?php echo $row['posicion_final'] ?></center></td>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'] ?></td>
				<td><?php echo $row['club'] ?></td>
				<td><?php echo $row['observacion'] ?></td>
				<td><?php echo $row['tiempo_final'] ?></td>
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
	<center><h3>3ro y 4to</h3></center>
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
			
			$sql = "SELECT * FROM resultados_eventos_competencia_carriles WHERE nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_final = 3 OR nombre_evento ='$Evento' AND id_listado = '$id_listado' AND posicion_final = 4 ORDER BY `posicion_final` ASC" ;
			$result = $mysqli->query($sql);
			while($row = $result->fetch_assoc()){
				
		?>
			<tr>
				<td><center><?php echo $row['posicion_final'] ?></center></td>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'] ?></td>
				<td><?php echo $row['club'] ?></td>
				<td><?php echo $row['observacion'] ?></td>
				<td><?php echo $row['tiempo_final'] ?></td>
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
					title:		'1ro y 2do',
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
					title:		'3ro y 4to',
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