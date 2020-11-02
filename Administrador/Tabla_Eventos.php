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

<div class="tabla">
	<table class="table table-hover table-striped table-bordered"  id="idDataTable"><!--table table-hover table-condensed table-bordered-->
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
		  <tr>
			<th class="th-sm"><center>#</center></th>
			<th class="th-sm"><center>Nombre Evento</center></th>
			<th class="th-sm"><center>Municipio Evento</center></th>
			<th class="th-sm"><center>Fecha Evento</center></th>
			<th class="th-sm"><center>Acción</center></th>
			<th class="th-sm"><center>Inscritos</center></th-->
		  </tr>
		</thead>
		<tbody>
		<?php
			$No=1;
			$sql = "SELECT * FROM eventos ORDER BY fecha_evento ASC";
			$result=$mysqli->query($sql);
			while($row=$result->fetch_assoc()){
				$query = "SELECT municipio FROM municipios WHERE id_municipio = '".$row['municipio']."'";
				$resultado_municipio = $mysqli->query($query);
				while($fila = $resultado_municipio->fetch_assoc()){
				$Evento = $row['nombre'];
		?>
			<tr>
				<td><center><?php echo $row['id'] ?></center></td>
				<td><?php echo $Evento ?></td>
				<td><center><?php echo $fila['municipio'] ?></center></td>
				<td><center><?php echo $row['fecha_evento'] ?></center></td>
				<td><center>
					<a href="#" onClick="agregarFrmActualizar(<?php echo $row['id'] ?>)"><span class="label label-danger" data-toggle="modal" data-target="#editareventosmodal"><i class="fa fa-pencil-square-o"></i> Modificar</span></a></center></td>
				<td><center>
					<a href="Deportistas_Inscritos.php?Evento=<?php echo $Evento ?>"><span class="label label-primary"><i class="fas fa-list"></i> Listar</span></a>
				</center></td>
			</tr>
		<?php
			$No +=1;
				}
			}
		?>
		</tbody>
		<tfoot style="background-color: #ccc; color: white; font-weight: bold;"><!--style="background-color: #007bff;#ccc;color: white; font-weight: bold;"-->
			<tr>
				<th><center>#</center></th>
				<th><center>Nombre Evento</center></th>
				<th><center>Municipio Evento</center></th>
				<th><center>Fecha Evento</center></th>
				<th><center>Acción</center></th>
				<th><center>Inscritos</center></th>
			</tr>
		</tfoot>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#idDataTable').DataTable({
			language:{
    			"sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                //"sEmptyTable":     "Ningún dato disponible en esta tabla =(",
				"sEmptyTable":     "No hay eventos disponibles actualmente =(",
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