<?php
require('../clases/conexion_db.php');
session_start();

if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
	header("location: ../Administrador/Login.php");
}
$Evento = $_SESSION['Evento'];
?>

<div class="tabla">
	<table class="table table-hover table-striped table-bordered"  id="idDataTable"><!--table table-hover table-condensed table-bordered-->
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
		  <tr>
			<th class="th-sm"><center>#</center></th>
			<th class="th-sm"><center>Nombre Listado</center></th>
			<th class="th-sm"><center>Acción</center></th>
			<th class="th-sm"><center>Estado</center></th>
		  </tr>
		</thead>
		<tbody>
		<?php
			$No=1;
			$sql = "SELECT * FROM listados_carriles WHERE evento ='$Evento'";
			$result = $mysqli->query($sql);
			while($row=$result->fetch_assoc()){
				$id_listado = $row['id'];
		?>
			<tr>
				<td><center><?php echo $No ?></center></td>
				<td><?php echo $row['nombre_listado'] ?></td>
				<td><center><a href="Resultados_Octavos_Carriles.php?id=<?php echo $id_listado ?>"><span class="label label-primary">Subir Resultados</span></a></center></td>
				<td><center><?php
				$estado = $row['estado'];
				if($estado==="Pendiente"){ ?>
					<i><img src="../imagenes/iconos/help.png" title="Pendiente"/></i> <?php
				}else if($estado==="Terminado"){ ?>
					<a href="#"><i><img src="../imagenes/iconos/approval.png" title="Terminado" onClick="window.open('Resultados_Carriles.php?id='+<?php echo $id_listado; ?>,'_self');"/></i></a> <?php	
				}?>
				</center></td>
			</tr>
			<?php
				$No +=1;
				//}
			}
		?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>#</center></th>
				<th><center>Nombre Listado</center></th>
				<th><center>Acción</center></th>
				<th><center>Estado</center></th>
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
				"sEmptyTable":     "No hay listados de remates disponibles actualmente =(",
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