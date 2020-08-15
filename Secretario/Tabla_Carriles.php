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
	<table id="idDataTable" class="display table table-hover table-striped table-bordered" style="width:100%" data-page-length='16'>
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
		  <tr>
			<th class="th-sm"><center>Posición</center></th>
			<th class="th-sm"><center>#</center></th>
			<th class="th-sm"><center>Deportista</center></th>
			<th class="th-sm"><center>Club</center></th>
			<th class="th-sm"><center>Premiación</center></th>
		  </tr>
		</thead>
		<tbody>
		<?php
			$No = 1;
			$sql = "SELECT * FROM resultados_eventos_competencia_carriles WHERE nombre_evento ='$Evento' AND id_listado = '$id_listado' AND resultados_final != 'NULL' ORDER BY `resultados_final` ASC" ;
			$result = $mysqli->query($sql);
			while($row = $result->fetch_assoc()){
				
		?>
			<tr>
				<td><center><?php echo $No ?></center></td>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'] ?></td>
				<td><?php echo $row['club'] ?></td>
				<td> <?php
				if(!empty($row['premiacion_final'])){
					echo $row['premiacion_final'];
				}else if(!empty($row['tiempo_final'])){
					echo $row['tiempo_final'];
				}else{
					echo $row['observacion'];
				} ?> </td>
			</tr>
			<?php
				//}
			$No +=1;
			}
			$sql = "SELECT * FROM resultados_eventos_competencia_carriles WHERE nombre_evento ='$Evento' AND id_listado = '$id_listado' AND resultados_cuartos = 'Eliminado' ORDER BY `miliseg_cuartos` ASC" ;
			$result = $mysqli->query($sql);
			while($row = $result->fetch_assoc()){
				
		?>
			<tr>
				<td><center><?php echo 5 ?></center></td>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'] ?></td>
				<td><?php echo $row['club'] ?></td>
				<td> <?php
				if(!empty($row['tiempo_cuartos'])){
					echo $row['tiempo_cuartos'];
				}else{
					echo $row['observacion'];
				} ?> </td>
			</tr>
			<?php
				//}
			$No +=1;
			}
			$sql = "SELECT * FROM resultados_eventos_competencia_carriles WHERE nombre_evento ='$Evento' AND id_listado = '$id_listado' AND resultados_octavos = 'Eliminado' ORDER BY `miliseg_octavos` ASC" ;
			$result = $mysqli->query($sql);
			while($row = $result->fetch_assoc()){
				
		?>
			<tr>
				<td><center><?php echo 9 ?></center></td>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'] ?></td>
				<td><?php echo $row['club'] ?></td>
				<td> <?php
				if(!empty($row['tiempo_octavos'])){
					echo $row['tiempo_octavos'];
				}else{
					echo $row['observacion'];
				} ?> </td>
			</tr>
			<?php
				//}
			$No +=1;
			}
		?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>Posición</center></th>
				<th><center>#</center></th>
				<th><center>Deportista</center></th>
				<th><center>Club</center></th>
				<th><center>Premiación</center></th>
			</tr>
		</tfoot>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		
		$('#idDataTable').DataTable({
			"columnDefs": [
				{ "width": "10%", "targets": 0 }
			],
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