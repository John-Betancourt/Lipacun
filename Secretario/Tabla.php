<?php
require('../clases/conexion_db.php');
session_start();
error_reporting(0);

if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
header("location: ../Administrador/Login.php");
}
$TipoEvento = $_SESSION['tipo_evento'];
$competencia = $_POST['comp'];
if($competencia=="Competencia_Habilidad"){?>
<div class="tabla">
	<table class="table table-hover table-striped table-bordered" id="idDataTable" data-page-length='25'><!--table table-hover table-condensed table-bordered-->
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
			<tr>
				<th class="th-sm"><center>#</center></th>
				<th class="th-sm"><center>Deportista</center></th>
				<th class="th-sm"><center>Club</center></th>
				<th class="th-sm"><center>Tiempo</center></th>
				<th class="th-sm"><center>Faltas</center></th>
				<th class="th-sm"><center>Tiempo Final</center></th>
				<th class="th-sm"><center>Editar</center></th>
			</tr>
		</thead>
		<tbody>
		<?php
		$sql=$_POST['sql'];
		$sql = stripslashes($sql);
		$resultado=$mysqli->query($sql);

		while($row=mysqli_fetch_array($resultado)){
			if($TipoEvento=="Ranking"){
				$numero_deportista = $row['numero_deportista'];
				$sql = "SELECT * FROM numero_deportistas WHERE numero_deportista = '$numero_deportista'";
				$result1=$mysqli->query($sql);
				while($row1=$result1->fetch_assoc()){ ?>
					<tr>
						<td><center><?php echo $row1['numero_deportista'] ?></center></td>
						<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
						<td><center><?php echo $row['club'] ?></center></td>
						<td><center><?php echo $row['tiempo'] ?></center></td>
						<td><center><?php echo $row['faltas'] ?></center></td>
						<td><center><?php echo $row['tiempo_final'] ?></center></td>
						<td style="text-align: center;">
							<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row1['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
								<span class="fa fa-pencil-square-o"></span>
							</span>
						</td>
					</tr> <?php
				}
			}else if($TipoEvento=="Escuelas"){ ?>
				<tr>
					<td><center><?php echo $row['numero_deportista'] ?></center></td>
					<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
					<td><center><?php echo $row['club'] ?></center></td>
					<td><center><?php echo $row['tiempo'] ?></center></td>
					<td><center><?php echo $row['faltas'] ?></center></td>
					<td><center><?php echo $row['tiempo_final'] ?></center></td>
					<td style="text-align: center;">
						<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
							<span class="fa fa-pencil-square-o"></span>
						</span>
					</td>
				</tr> <?php
			}
		} ?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>#</center></th>
				<th><center>Deportista</center></th>
				<th><center>Club</center></th>
				<th><center>Tiempo</center></th>
				<th><center>Faltas</center></th>
				<th><center>Tiempo Final</center></th>
				<th><center>Editar</center></th>
			</tr>
		</tfoot>
	</table>
</div><?php
}else if($competencia=="Competencia_Fondo_Puntos"){?>
<div class="tabla">
	<table class="table table-hover table-striped table-bordered" id="idDataTable" data-page-length='25'><!--table table-hover table-condensed table-bordered-->
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
			<tr>
				<th class="th-sm"><center>#</center></th>
				<th class="th-sm"><center>Deportista</center></th>
				<th class="th-sm"><center>Club</center></th>
				<th class="th-sm"><center>Puntos Totales</center></th>
				<th class="th-sm"><center>Observación</center></th>
				<th class="th-sm"><center>Editar</center></th>
			</tr>
		</thead>
		<tbody>
		<?php
		
		$sql=$_POST['sql'];
		$sql = stripslashes($sql);
		$resultado=$mysqli->query($sql);

		while($row=mysqli_fetch_array($resultado) ){
			if($TipoEvento=="Ranking"){
				$numero_deportista = $row['numero_deportista'];
				$sql = "SELECT * FROM numero_deportistas WHERE numero_deportista = '$numero_deportista'";
				$result1=$mysqli->query($sql);
				while($row1=$result1->fetch_assoc()){ ?>
			<tr>
				<td><center><?php echo $row1['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
				<td><center><?php echo $row['club'] ?></center></td>
				<td>
					<center>
						<?php
							if($row['puntos_totales'] >= 0){
								echo $row['puntos_totales'];
							}
						?>
					</center>
				</td>
				<td><center><?php echo $row['observacion'] ?></center></td>
				<td style="text-align: center;">
					<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
						<span class="fa fa-pencil-square-o"></span>
					</span>
				</td>
			</tr> <?php
				}
			}else if($TipoEvento=="Escuelas"){ ?>
			<tr>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
				<td><center><?php echo $row['club'] ?></center></td>
				<td>
					<center>
						<?php
							if($row['puntos_totales'] >= 0){
								echo $row['puntos_totales'];
							}
						?>
					</center>
				</td>
				<td><center><?php echo $row['observacion'] ?></center></td>
				<td style="text-align: center;">
					<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
						<span class="fa fa-pencil-square-o"></span>
					</span>
				</td>
			</tr> <?php
			}
		} ?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>#</center></th>
				<th><center>Deportista</center></th>
				<th><center>Club</center></th>
				<th><center>Puntos Totales</center></th>
				<th><center>Observación</center></th>
				<th><center>Editar</center></th>
			</tr>
		</tfoot>
	</table>
</div><?php
}else if($competencia=="Competencia_Fondo_Eliminacion"){?>
<div class="tabla">
	<table class="table table-hover table-striped table-bordered" id="idDataTable" data-page-length='25'><!--table table-hover table-condensed table-bordered-->
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
			<tr>
				<th class="th-sm"><center>#</center></th>
				<th class="th-sm"><center>Deportista</center></th>
				<th class="th-sm"><center>Club</center></th>
				<th class="th-sm"><center>Orden Llegada</center></th>
				<th class="th-sm"><center>Vuelta Eliminado</center></th>
				<th class="th-sm"><center>Observación</center></th>
				<th class="th-sm"><center>Editar</center></th>
			</tr>
		</thead>
		<tbody>
		<?php
		
		$sql=$_POST['sql'];
		$sql = stripslashes($sql);
		$resultado=$mysqli->query($sql);

		while($row=mysqli_fetch_array($resultado) ){
			if($TipoEvento=="Ranking"){
				$numero_deportista = $row['numero_deportista'];
				$sql = "SELECT * FROM numero_deportistas WHERE numero_deportista = '$numero_deportista'";
				$result1=$mysqli->query($sql);
				while($row1=$result1->fetch_assoc()){ ?>
			<tr>
				<td><center><?php echo $row1['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
				<td><center><?php echo $row['club'] ?></center></td>
				<td><center><?php echo $row['orden_llegada'] ?></center></td>
				<td><center><?php echo $row['vuelta_eliminado'] ?></center></td>
				<td><center><?php echo $row['observacion'] ?></center></td>
				<td style="text-align: center;">
					<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
						<span class="fa fa-pencil-square-o"></span>
					</span>
				</td>
			</tr> <?php
				}
			}else if($TipoEvento=="Escuelas"){ ?>
			<tr>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
				<td><center><?php echo $row['club'] ?></center></td>
				<td><center><?php echo $row['orden_llegada'] ?></center></td>
				<td><center><?php echo $row['vuelta_eliminado'] ?></center></td>
				<td><center><?php echo $row['observacion'] ?></center></td>
				<td style="text-align: center;">
					<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
						<span class="fa fa-pencil-square-o"></span>
					</span>
				</td>
			</tr> <?php
			}
		} ?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>#</center></th>
				<th><center>Deportista</center></th>
				<th><center>Club</center></th>
				<th><center>Orden Llegada</center></th>
				<th><center>Vuelta Eliminado</center></th>
				<th><center>Observación</center></th>
				<th><center>Editar</center></th>
			</tr>
		</tfoot>
	</table>
</div><?php
}else if($competencia=="Competencia_Fondo_Puntos_Eliminacion"){?>
<div class="tabla">
	<table class="table table-hover table-striped table-bordered" id="idDataTable" data-page-length='25'><!--table table-hover table-condensed table-bordered-->
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
			<tr>
				<th class="th-sm"><center>#</center></th>
				<th class="th-sm"><center>Deportista</center></th>
				<th class="th-sm"><center>Club</center></th>
				<th class="th-sm"><center>Vuelta Eliminado</center></th>
				<th class="th-sm"><center>Orden Llegada</center></th>
				<th class="th-sm"><center>Puntos Totales</center></th>
				<th class="th-sm"><center>Observación</center></th>
				<th class="th-sm"><center>Editar</center></th>
			</tr>
		</thead>
		<tbody>
		<?php
		
		$sql=$_POST['sql'];
		$sql = stripslashes($sql);
		$resultado=$mysqli->query($sql);

		while($row=mysqli_fetch_array($resultado) ){
			if($TipoEvento=="Ranking"){
				$numero_deportista = $row['numero_deportista'];
				$sql = "SELECT * FROM numero_deportistas WHERE numero_deportista = '$numero_deportista'";
				$result1=$mysqli->query($sql);
				while($row1=$result1->fetch_assoc()){ ?>
			<tr>
				<td><center><?php echo $row1['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
				<td><center><?php echo $row['club'] ?></center></td>
				<td><center><?php echo $row['vuelta_eliminado'] ?></center></td>
				<td><center><?php echo $row['orden_llegada'] ?></center></td>
				<td><center><?php echo $row['puntos_totales'] ?></center></td>
				<td><center><?php echo $row['observacion'] ?></center></td>
				<td style="text-align: center;">
					<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
						<span class="fa fa-pencil-square-o"></span>
					</span>
				</td>
			</tr> <?php
				}
			}else if($TipoEvento=="Escuelas"){ ?>
			<tr>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
				<td><center><?php echo $row['club'] ?></center></td>
				<td><center><?php echo $row['vuelta_eliminado'] ?></center></td>
				<td><center><?php echo $row['orden_llegada'] ?></center></td>
				<td><center><?php echo $row['puntos_totales'] ?></center></td>
				<td><center><?php echo $row['observacion'] ?></center></td>
				<td style="text-align: center;">
					<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
						<span class="fa fa-pencil-square-o"></span>
					</span>
				</td>
			</tr> <?php
			}
		} ?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>#</center></th>
				<th><center>Deportista</center></th>
				<th><center>Club</center></th>
				<th><center>Vuelta Eliminado</center></th>
				<th><center>Orden Llegada</center></th>
				<th><center>Puntos Totales</center></th>
				<th><center>Observación</center></th>
				<th><center>Editar</center></th>
			</tr>
		</tfoot>
	</table>
</div><?php
}else if($competencia=="Competencia_Velocidad"){?>
<div class="tabla">
	<table class="table table-hover table-striped table-bordered" id="idDataTable" data-page-length='25'><!--table table-hover table-condensed table-bordered-->
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
			<tr>
				<th class="th-sm"><center>#</center></th>
				<th class="th-sm"><center>Deportista</center></th>
				<th class="th-sm"><center>Club</center></th>
				<th class="th-sm"><center>Tiempo</center></th>
				<th class="th-sm"><center>Observación</center></th>
				<th class="th-sm"><center>Editar</center></th>
			</tr>
		</thead>
		<tbody>
		<?php
		
		$sql=$_POST['sql'];
		$sql = stripslashes($sql);
		$resultado=$mysqli->query($sql);

		while($row=mysqli_fetch_array($resultado)){
			if($TipoEvento=="Ranking"){
				$numero_deportista = $row['numero_deportista'];
				$sql = "SELECT * FROM numero_deportistas WHERE numero_deportista = '$numero_deportista'";
				$result1=$mysqli->query($sql);
				while($row1=$result1->fetch_assoc()){ ?>
			<tr>
				<td><center><?php echo $row1['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
				<td><center><?php echo $row['club'] ?></center></td>
				<td><center><?php echo $row['tiempo'] ?></center></td>
				<td><center><?php echo $row['observacion'] ?></center></td>
				<td style="text-align: center;">
					<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
						<span class="fa fa-pencil-square-o"></span>
					</span>
				</td>
			</tr> <?php
				}
			}else if($TipoEvento=="Escuelas"){ ?>
			<tr>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
				<td><center><?php echo $row['club'] ?></center></td>
				<td><center><?php echo $row['tiempo'] ?></center></td>
				<td><center><?php echo $row['observacion'] ?></center></td>
				<td style="text-align: center;">
					<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
						<span class="fa fa-pencil-square-o"></span>
					</span>
				</td>
			</tr> <?php
			}
		} ?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>#</center></th>
				<th><center>Deportista</center></th>
				<th><center>Club</center></th>
				<th><center>Tiempo</center></th>
				<th><center>Observación</center></th>
				<th><center>Editar</center></th>
			</tr>
		</tfoot>
	</table>
</div><?php
}else if($competencia=="Competencia_Libre"){?>
<div class="tabla">
	<table class="table table-hover table-striped table-bordered" id="idDataTable" data-page-length='25'><!--table table-hover table-condensed table-bordered-->
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
			<tr>
				<th class="th-sm"><center>#</center></th>
				<th class="th-sm"><center>Deportista</center></th>
				<th class="th-sm"><center>Club</center></th>
				<th class="th-sm"><center>Observación</center></th>
				<th class="th-sm"><center>Posición</center></th>
				<th class="th-sm"><center>Editar</center></th>
			</tr>
		</thead>
		<tbody>
		<?php
		
		$sql=$_POST['sql'];
		$sql = stripslashes($sql);
		$resultado=$mysqli->query($sql);

		while($row=mysqli_fetch_array($resultado) ){
			if($TipoEvento=="Ranking"){
				$numero_deportista = $row['numero_deportista'];
				$sql = "SELECT * FROM numero_deportistas WHERE numero_deportista = '$numero_deportista'";
				$result1=$mysqli->query($sql);
				while($row1=$result1->fetch_assoc()){ ?>
			<tr>
				<td><center><?php echo $row1['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
				<td><center><?php echo $row['club'] ?></center></td>
				<td><center><?php echo $row['observacion'] ?></center></td>
				<td><center><?php echo $row['posicion'] ?></center></td>
				<td style="text-align: center;">
					<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
						<span class="fa fa-pencil-square-o"></span>
					</span>
				</td>
			</tr> <?php
				}
			}else if($TipoEvento=="Escuelas"){ ?>
			<tr>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'].' '.$row['apellidos'] ?></td>
				<td><center><?php echo $row['club'] ?></center></td>
				<td><center><?php echo $row['observacion'] ?></center></td>
				<td><center><?php echo $row['posicion'] ?></center></td>
				<td style="text-align: center;">
					<span class="btn btn-warning btn-xs" onClick="CargarModal('<?php echo $row['numero_deportista'] ?>')" data-toggle="modal" data-target="#subirresultadosmodal">
						<span class="fa fa-pencil-square-o"></span>
					</span>
				</td>
			</tr> <?php
			}
		} ?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>#</center></th>
				<th><center>Deportista</center></th>
				<th><center>Club</center></th>
				<th><center>Observación</center></th>
				<th><center>Posición</center></th>
				<th><center>Editar</center></th>
			</tr>
		</tfoot>
	</table>
</div><?php
}?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#idDataTable').DataTable({
			language:{
    			"sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                //"sEmptyTable":     "Ningún dato disponible en esta tabla =(",
				"sEmptyTable":     "No se encontraron deportistas inscritos; Si no ha seleccionado un listado por favor seleccionelo.",
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