<?php
require('../clases/conexion_db.php');
session_start();

if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["nombre_corto"]==""){
	header("location: ../Login.php");
}

$idUsuario = $_SESSION['nombre_corto'];
$sql = "Select * FROM clubes WHERE nombre_corto_club='$idUsuario'";
$result=$mysqli->query($sql);
$row = $result->fetch_assoc();
$Evento = $_SESSION['Evento'];

$sql = "SELECT tipo_evento FROM eventos WHERE nombre = '$Evento'";
$result1=$mysqli->query($sql);
$array_tipo_evento=$result1->fetch_assoc();
$Tipo_Evento = $array_tipo_evento['tipo_evento'];
if($Tipo_Evento=="Ranking"){
	$sql = "SELECT * FROM inscripcion_deportistas_eventos_ranking WHERE evento = '$Evento' and club = '$idUsuario'";
	$result=$mysqli->query($sql);
	$row=$result->num_rows; ?>
		<div class="tabla">
			<table class="table table-hover table-striped table-bordered"  id="idDataTable"><!--table table-hover table-condensed table-bordered-->
				<thead style="background-color: #007bff; color: white; font-weight: bold;">
				  <tr>
					<th class="th-sm"><center>#</center></th>
					<th class="th-sm"><center>Nombres Deportistas</center></th>
					<th class="th-sm"><center>Apellidos Deportistas</center></th>
					<th class="th-sm"><center>No. Deportista</center></th>
					<th class="th-sm"><center>Acción</center></th>
				  </tr>
				</thead>
				<tbody> <?php
		$No = 1;
		while($row=$result->fetch_assoc()){ ?>
					<tr>
						<td><center><?php echo $No ?></center></td>
						<td><?php echo $row['nombres'] ?></td>
						<td><?php echo $row['apellidos'] ?></td>
						<td><center><?php echo $row['numero_deportista'] ?></center></td>
						<td><center><a href="#" onClick="EliminarDeportistaEvento(<?php echo $row['numero_deportista'] ?>)"><span class="label label-danger">Eliminar</span></a></center></td>
					</tr> <?php
				$No += 1;
		} ?>
				</tbody>
				<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
					<tr>
						<th><center>#</center></th>
						<th><center>Nombres</center></th>
						<th><center>Apellidos</center></th>
						<th><center>No. Deportista</center></th>
						<th><center>Acción</center></th>
					</tr>
				</tfoot>
			</table>
		</div> <?php
}else if($Tipo_Evento=="Escuelas"){
	$sql = "SELECT * FROM inscripcion_deportistas_eventos_escuelas WHERE evento = '$Evento' and club = '$idUsuario'";
	$result=$mysqli->query($sql);
	$row=$result->num_rows;
?>		<div class="tabla">
			<table class="table table-hover table-striped table-bordered"  id="idDataTable"><!--table table-hover table-condensed table-bordered-->
				<thead style="background-color: #007bff; color: white; font-weight: bold;">
				  <tr>
					<th class="th-sm"><center>#</center></th>
					<th class="th-sm"><center>Nombres Deportistas</center></th>
					<th class="th-sm"><center>Apellidos Deportistas</center></th>
					<th class="th-sm"><center>Tipo Patin</center></th>
					<th class="th-sm"><center>No. Deportista</center></th>
					<th class="th-sm"><center>Acción</center></th>
				  </tr>
				</thead>
				<tbody> <?php
		$No = 1;
		while($row=$result->fetch_assoc()){ ?>
					<tr>
						<td><center><?php echo $No ?></center></td>
						<td><?php echo $row['nombres'] ?></td>
						<td><?php echo $row['apellidos'] ?></td>
						<td><center><?php echo $row['tipo_patin'] ?></center></td>
						<td><center><?php echo $row['numero_deportista'] ?></center></td>
						<!--td><center><a href="#" onClick="Eliminar_Deportista_Evento('<!?php echo $row['nombres'] ?>')"><span class="label label-danger">Eliminar</span></a></center></td-->

						<td><center><a href="#" onClick="EliminarDeportistaEvento('<?php echo $row['nombres'] ?>')"><span class="label label-danger"><i class="far fa-trash-alt"></i> Eliminar</span></a></center></td>
					</tr> <?php
		$No += 1;
		} ?>
				</tbody>
				<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
					<tr>
						<th><center>#</center></th>
						<th><center>Nombres</center></th>
						<th><center>Apellidos</center></th>
						<th><center>Tipo Patin</center></th>
						<th><center>No. Deportistas</center></th>
						<th><center>Acción</center></th>
					</tr>
				</tfoot>
			</table>
		</div> <?php
}
?>

<script type="text/javascript">
	$(document).ready(function() {
		$('#idDataTable').DataTable({
			language:{
    			"sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                //"sEmptyTable":     "Ningún dato disponible en esta tabla =(",
				"sEmptyTable":     "No hay deportistas inscritos actualmente =(",
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