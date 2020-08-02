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
	<title>Clubs y/o Escuelas de Cundinamarca | | LIPACUN</title>
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
						<b><center>Lista Clubes y/o Escuelas de Cundinamarca</center></b>
					  </h5>
					  <div class="card-body">
						<div class="tabla">
							<table class="table table-hover table-striped table-bordered"  id="idDataTable" data-page-length="25"><!--table table-hover table-condensed table-bordered-->
								<thead style="background-color: #007bff; color: white; font-weight: bold;">
									<tr>
										<th class="th-sm"><center>#</center></th>
										<th class="th-sm"><center>Nombre Club y/o Escuela</center></th>
										<th class="th-sm"><center>Nombre del Representante</center></th>
										<th class="th-sm"><center>Municipio</center></th>
										<th class="th-sm"><center>Información Club</center></th>
										<th class="th-sm"><center>Ver Deportistas</center></th>
									</tr>
								</thead>
								<tbody>
								<?php
									$No=1;
									$sql = "SELECT * FROM clubes WHERE estado = '1' AND departamento = 25";
									$result=$mysqli->query($sql);
									while($row=$result->fetch_assoc()){
										$sql = "SELECT municipio FROM municipios WHERE id_municipio = '".$row['municipio']."'";
										$result1=$mysqli->query($sql);
										while($row1=$result1->fetch_assoc()){
								?>
									<tr>
										<td><center><?php echo $No ?></center></td>
										<td><?php echo $row['nombre_completo_club'] ?></td>
										<td><?php $Nombres = $row['nombres'].' '.$row['apellidos']; echo $Nombres ?></td>
										<td><center><?php echo $row1['municipio'] ?></center></td>
										<td><center><a href="Información_Club.php?Club=<?php echo $row['nombre_corto_club'] ?>"><span class="label label-primary">Ver</span></a></center></td>
										<td><center><a href="Lista_Deportistas.php?Club=<?php echo $row['nombre_corto_club'] ?>"><span class="label label-primary">Ver</span></a></center></td>
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
										<th><center>Nombre Club y/o Escuela</center></th>
										<th><center>Nombre del Representante</center></th>
										<th><center>Municipio</center></th>
										<th><center>Información Club</center></th>
										<th><center>Ver Deportistas</center></th>
									</tr>
						        </tfoot>
							</table>
						</div>
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
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
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