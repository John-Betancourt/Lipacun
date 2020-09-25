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
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista Deportistas de Cundinamarca | LIPACUN</title>
	<?php require_once "scripts.php"; ?>
</head>
<body>
	<center>
		<div class="panel-heading"><!--https://www.lipacun.com/-->
			<a href="Index.php"><img src="../imagenes/iconos/Logo.webp" alt="Logo" class="logo" height="90"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/1.webp" alt="favicon1" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/2.webp" alt="favicon2" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/3.webp" alt="favicon3" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/4.webp" alt="favicon4" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/Cundinamarca_logo.webp" alt="Logo" class="logo" height="90">
		</div><hr>
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="navbar"></div><br>
					<div class="card text-left">
					  <h5 class="card-header">
						<b><center>Lista Deportistas de Cundinamarca</center></b>
					  </h5>
					  <div class="card-body">
						<div class="tabla">
							<table class="table table-hover table-striped table-bordered"  id="idDataTable" data-page-length="50"><!--table table-hover table-condensed table-bordered-->
								<thead style="background-color: #007bff; color: white; font-weight: bold;">
								  <tr>
									<th class="th-sm"><center>#</center></th>
									<th class="th-sm"><center>No. Identificación</center></th>
									<th class="th-sm"><center>Nombres Deportista</center></th>
									<th class="th-sm"><center>Apellidos Deportista</center></th>
									<th class="th-sm"><center>Edad</center></th>
									<th class="th-sm"><center>Estado</center></th>
									<th class="th-sm"><center>Club</center></th>
								  </tr>
								</thead>
								<tbody>
								<?php
									$No=1;
									$sql = "SELECT * FROM deportistas WHERE departamento = 25 ORDER BY nombre_corto_club ASC";
									$result=$mysqli->query($sql);
									while($row=$result->fetch_assoc()){
								?>
									  <tr>
										<td><center><?php echo $No ?></center></td>
										<td><?php echo $row['identificacion'] ?></td>
										<td><?php $Nombres = $row['primer_nombre'].' '.$row['segundo_nombre']; echo $Nombres ?></td>
										<td><?php $Apellidos = $row['primer_apellido'].' '.$row['segundo_apellido']; echo $Apellidos ?></td>
										<td><center><?php echo $row['edad'] ?></center></td>
										<td><center><?php
										 $estado = $row['estado'];
										 if($estado == 1){ ?>
											<span class="label label-success">Activo</span> <?php
										 }else if($estado == 2){ ?>
											<span class="label label-warning">Inactivo</span> <?php
										 }else if($estado == 4){ ?>
											<span class="label label-danger">De baja</span> <?php
										 }
										 ?>
										</center></td>
										<td><center><?php echo $row['nombre_corto_club'] ?></center></td>
									  </tr>
								<?php
									$No +=1;
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
									<th><center>Estado</center></th>
									<th><center>Club</center></th>
								  </tr>
								</tfoot>
							</table>
						</div>
						<hr>
						<center>
							<a href="Excel.php"><button class="btn btn-primary"> <i class="fas fa-file-download"></i> &nbsp; Descargar</button></a> |
							<a href="Asignar_Numero.php"><button class="btn btn-primary">Asignar # para temporada</button></a>
						</center>
					  </div>
					  <div class="card-footer text-muted">
						<center>LIPACUN | Copyright <?php auto_copyright(); // Current year?> Todos los derechos reservados | By Brian y John</center>
					  </div>
					</div>
				</div>
			</div>
			<br><br/>
		</div>
		<br><br/>
		<!-- ============================================================== -->
		<!-- footer -->
		<!-- ============================================================== -->
		<div class="footer2">
			<footer>Bienvenido <?php echo $user['Rol'] ?> <button class="fas"><i class="fas fa-user-alt"></i></button>&nbsp; &nbsp;
                <a href="../Logout.php"><button class="btn btn-info">Cerrar Sesión</button></a>
				<button class="btn btn-info" onclick="history.back()">Volver</button>
            </footer>
		</div>
		<!-- ============================================================== -->
		<!-- End footer -->
		<!-- ============================================================== -->
	</center>
</body>
</html>

<?php
/* 
  No argument required for current year.
  Otherwise, pass start year as a 4-digit value.
*/
function auto_copyright($startYear = null) {
	if (!is_numeric($startYear) || intval($startYear) >= date('Y')) {
		echo "&copy; " . date('Y'); // display current year if $startYear is same or greater than this year
	} else {
		// Display range of years. Replace date('Y') with date('y') to display range of years in YYYY-YY format.
		echo "&copy; " . intval($startYear) . "&ndash;" . date('Y'); 
	}
} 
?>

<script type="text/javascript">
	$(document).ready(function() {
		$('#idDataTable').DataTable({
			language:{
    			"sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "No se encontraron deportistas inscritos =(",
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