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
  //$Club = $_SESSION['Club'];
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
				<th class="th-sm"><center>Editar</center></th>
			</tr>
		</thead>
		<tbody>
	<?php
		$No=1;
		$consulta=$_SESSION['consulta'];
		$resultado = $mysqli->query($consulta);
		while($row=$resultado->fetch_assoc()){
			$identificacion = $row['identificacion_deportista'];
			$numero_deportista = $row['numero_deportista'];
			if(!empty($numero_deportista)){
	?>
			<tr>
				<td><center><?php echo $No ?></center></td>
				<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
				<td><center><?php echo $row['club'] ?></center></td>
				<td><center><?php echo $row['edad'] ?></center></td>
				<td><center><?php echo $row['rama'] ?></center></td>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><center><a href="#" onClick="EditarNumero('<?php echo $identificacion ?>')"><button class="btn btn-warning" data-toggle="modal" data-target="#editarnumerodeportistamodal"><i class="fa fa-pencil-square-o"></i></button></a>
			</tr>
		<?php
			$No +=1;
			}else{
		?>
			<tr>
				<td><center><?php echo $No ?></center></td>
				<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
				<td><center><?php echo $row['club'] ?></center></td>
				<td><center><?php echo $row['edad'] ?></center></td>
				<td><center><?php echo $row['rama'] ?></center></td>
				<td><center>Sin Numero</center></td>
				<td><center><a href="#" onClick="AsignarNumeroManual('<?php echo $identificacion ?>')"><button class="btn btn-warning" data-toggle="modal" data-target="#asignarnumerodeportistamodal"><i class="fa fa-pencil-square-o"></i></button></a>
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
				<th><center>Deportista</center></th>
				<th><center>Club</center></th>
				<th><center>Edad</center></th>
				<th><center>Rama</center></th>
				<th><center>No. Deportista</center></th>
				<th><center>Editar</center></th>
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