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
  $Club = $_SESSION['Club'];
?>

<div class="tabla">
	<table class="table table-hover table-striped table-bordered"  id="idDataTable" data-page-length="25"><!--table table-hover table-condensed table-bordered-->
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
		  <tr>
			<th class="th-sm"><center>#</center></th>
			<th class="th-sm"><center>No. Identificación</center></th>
			<th class="th-sm"><center>Nombres Deportista</center></th>
			<th class="th-sm"><center>Apellidos Deportista</center></th>
			<th class="th-sm"><center>Edad</center></th>
			<th class="th-sm"><center>Acción</center></th>
			<th class="th-sm"><center>Información Deportistas</center></th>
		  </tr>
		</thead>
		<tbody>
		<?php
			$No=1;
			$sql = "SELECT * FROM deportistas WHERE nombre_corto_club = '$Club' AND estado != 4";
			$result=$mysqli->query($sql);
			while($row=$result->fetch_assoc()){
				$identificacion = $row['identificacion'];
				$sql = "SELECT * FROM numero_deportistas WHERE identificacion_deportista = '$identificacion'";
				$result1=$mysqli->query($sql);
				$rows = $result1->num_rows;
				if($rows > 0){
					while($row1=$result1->fetch_assoc()){
		?>
				<tr>
					<td><center><?php echo $No?></center></td>
					<td><?php echo $identificacion ?></td>
					<td><?php $Nombres = $row['primer_nombre'].' '.$row['segundo_nombre']; echo $Nombres ?></td>
					<td><?php $Apellidos = $row['primer_apellido'].' '.$row['segundo_apellido']; echo $Apellidos ?></td>
					<td><center><?php echo $row['edad'] ?></center></td>
					<td><center><a href="#" onClick="BajaDeportista('<?php echo $row['identificacion'] ?>')"><span class="label label-danger">Dar Baja</span></a></center></td>
					<td><center><a href="Informacion_Deportista.php?Deportista=<?php echo $row['identificacion'] ?>"><span class="label label-primary">Ver</span></a></center></td>
				</tr>
			<?php
				$No +=1;
					}
				}else{
			?>
				<tr>
					<td><center><?php echo $No ?></center></td>
					<td><?php echo $identificacion ?></td>
					<td><?php $Nombres = $row['primer_nombre'].' '.$row['segundo_nombre']; echo $Nombres ?></td>
					<td><?php $Apellidos = $row['primer_apellido'].' '.$row['segundo_apellido']; echo $Apellidos ?></td>
					<td><center><?php echo $row['edad'] ?></center></td>
					<td><center><a href="#" onClick="BajaDeportista('<?php echo $row['identificacion'] ?>')"><span class="label label-danger">Dar Baja</span></a></center></td>
					<td><center><a href="Informacion_Deportista.php?Deportista=<?php echo $row['identificacion'] ?>"><span class="label label-primary">Ver</span></a></center></td>
				</tr>
			<?php
				$No +=1;
				}
			}
		?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>#</center></th>
				<th><center>No. Identificación</center></th>
				<th><center>Nombres Deportista</center></th>
				<th><center>Apellidos Deportista</center></th>
				<th><center>Edad</center></th>
				<th><center>Acción</center></th>
				<th><center>Información Deportistas</center></th>
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
				"sEmptyTable":     "No hay deportistas en el club actual =(",
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