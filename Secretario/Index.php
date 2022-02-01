<?php
  require('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
    header("location: ../Administrador/Login.php");
  }

  $idUsuario = $_SESSION['codigo_usuario'];
  $sql = "Select * FROM usuarios WHERE Usuario='$idUsuario'";
  $result=$mysqli->query($sql);
  $user = $result->fetch_assoc();

  // Formato 24 horas (de 1 a 24) 
  $hora = date('G');
  if (($hora >= 0) AND ($hora < 6)) { 
    $mensaje = "Buena madrugada, "; 
  } else if (($hora >= 6) AND ($hora < 12)) { 
    $mensaje = "Buenos dias, "; 
  } else if (($hora >= 12) AND ($hora < 18)) { 
    $mensaje = "Buenas tardes, "; 
  } else { 
    $mensaje = "Buenas noches, "; 
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista Eventos | | LIPACUN</title>
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
		
		<div class="contenedor">
	      <div class="admi">
			<h1><?php echo $mensaje." ".$user['Rol'] ?></h1>
			</div>
		</div><br>
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="card text-left">
					  <h5 class="card-header">
						<b><center>Lista de Eventos</center></b>
					  </h5>
					  <div class="card-body">
						<div class="tabla">
							<table class="table table-hover table-striped table-bordered" id="idDataTable"><!--table table-hover table-condensed table-bordered-->
								<thead style="background-color: #007bff; color: white; font-weight: bold;">
								  <tr>
									<th class="th-sm"><center>#</center></th>
									<th class="th-sm"><center>Nombre Evento</center></th>
									<th class="th-sm"><center>Municipio Evento</center></th>
									<th class="th-sm"><center>Fecha Evento</center></th>
									<th class="th-sm"><center>Acción</center></th>
									<th class="th-sm"><center>Subir</center></th>
								  </tr>
								</thead>
								<tbody>
								<?php
									$No = 1;
									$dia = date("d");
									$diaevento = $dia + 1;
									$fechaevento = date("Y-m")."-".$diaevento;
									//$sql = "SELECT * FROM eventos WHERE fecha_evento = '".$ayer."' AND fecha_evento = '".date("Y-m-d")."' ORDER BY fecha_evento DESC";
									$sql = "SELECT * FROM eventos ORDER BY fecha_evento DESC";
									$result=$mysqli->query($sql);
									while($row=$result->fetch_assoc()){
										$query = "SELECT municipio FROM municipios WHERE id_municipio = '".$row['municipio']."'";
										$resultado_municipio = $mysqli->query($query);
										while($fila = $resultado_municipio->fetch_assoc()){
											if($row['fecha_evento']==$fechaevento or $row['fecha_evento']==date("Y-m-d")){ ?>
												<tr>
													<td><center><?php echo $No ?></center></td>
													<td><?php echo $row['nombre'] ?></td>
													<td><center><?php echo $fila['municipio'] ?></center></td>
													<td><center><?php echo $row['fecha_evento'] ?></center></td>
													<td><center><a href="Generar_Listados.php?Evento=<?php echo $row['nombre']; ?>"><span class="label label-primary">Generar listados</span></a></center></td>
													<td><center><a href="Competencias.php?Evento=<?php echo $row['nombre']; ?>"><span class="label label-primary">Subir resultados</span></a></center></td>
													<!--td><center><a href="Resultados.php?Evento=<?php //echo $row['nombre']; ?>"><span class="label label-primary">Subir resultados</span></a></center></td-->
												</tr> <?php
											}
										$No +=1;
										}
									}
								?>
								</tbody>
								<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
									<tr>
										<th><center>#</center></th>
										<th><center>Nombre Evento</center></th>
										<th><center>Municipio Evento</center></th>
										<th><center>Fecha Evento</center></th>
										<th><center>Acción</center></th>
										<th><center>Subir</center></th>
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
			<footer>Bienvenido <?php echo $user['Rol'] ?><button class="fas"><i class="fas fa-user-alt"></i></button>&nbsp; &nbsp; &nbsp;
                <a href="../Logout.php"><button class="btn btn-info">Cerrar Sesión</button></a>
				<a href="Cambiar_Contraseña.php"><button class="btn btn-info">Cambiar Contraseña</button></a>
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