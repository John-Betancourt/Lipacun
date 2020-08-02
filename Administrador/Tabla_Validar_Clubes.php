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
	<table class="table table-hover table-striped table-bordered"  id="idDataTable" data-page-length="25"><!--table table-hover table-condensed table-bordered-->
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
			<tr>
				<th class="th-sm"><center>#</center></th>
				<th class="th-sm"><center>Nombre Club y/o Escuela</center></th>
				<th class="th-sm"><center>Nombre del Representante</center></th>
				<th class="th-sm"><center>Acción</center></th>
				<th class="th-sm"><center>Validar</center></th>
			</tr>
		</thead>
		<tbody>
		<?php
			$No=1;
			$sql = "Select * FROM clubes WHERE estado = '3'";
			$result=$mysqli->query($sql);
			while($row=$result->fetch_assoc()){
		?>
			<tr>
				<td><center><?php echo $No ?></center></td>
				<td><?php echo $row['nombre_completo_club'] ?></td>
				<td><?php $Nombres = $row['nombres'].' '.$row['apellidos']; echo $Nombres ?></td>
				<td><center><a href="#" onClick="Club_Eliminar('<?php echo $row['nombre_corto_club'] ?>')"><span class="label label-danger"><i class="far fa-trash-alt"></i> Eliminar</span></a></center></td>
				<!--td><center><a href="Eliminar.php?Club=<!?php echo $row['nombre_corto_club'] ?>"><span class="label label-danger"><i class="far fa-trash-alt"></i> Eliminar</span></a></center></td-->
				<td><center><a href="Validar.php?Club=<?php echo $row['nombre_corto_club'] ?>"><span class="label label-primary"><i class="fas fa-check"></i> &nbsp; Validar</span></a></center></td>
			</tr>
		<?php
			$No +=1;
			}
		?>
		</tbody>
		<tfoot style="background-color: #ccc; color: white; font-weight: bold;">
			<tr>
				<th><center>#</center></th>
				<th><center>Nombre Club y/o Escuela</center></th>
				<th><center>Nombre del Representante</center></th>
				<th><center>Acción</center></th>
				<th><center>Validar</center></th>
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
				"sEmptyTable":     "No hay Clubes y/o Escuelas pendientes por validación",
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