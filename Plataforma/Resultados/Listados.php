<?php
  require('../../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["nombre_corto"]==""){
    header("location: ../../Login.php");
  }

  $idUsuario = $_SESSION['nombre_corto'];
  $sql = "Select * FROM clubes WHERE nombre_corto_club='$idUsuario'";
  $result=$mysqli->query($sql);
  $row = $result->fetch_assoc();

  $Evento = $_REQUEST['Evento'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Listados Evento "<?php echo $Evento ?>"</title>
	<?php require_once "scripts.php"; ?>
</head>
<body>
	<center>
		<div class="panel-heading"><!--https://www.lipacun.com/-->
			<a href="../Eventos.php"><img src="../../imagenes/iconos/Logo.webp" alt="Logo" class="logo" height="90"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../../imagenes/iconos/1.webp" alt="favicon1" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../../imagenes/iconos/2.webp" alt="favicon2" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../../imagenes/iconos/3.webp" alt="favicon3" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../../imagenes/iconos/4.webp" alt="favicon4" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../../imagenes/iconos/Cundinamarca_logo.webp" alt="Logo" class="logo" height="90">
		</div><hr>
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="justify-content-end align-items-center"><!--d-flex -->
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="../Index.php">Pagina Principal</a></li>
							<li class="breadcrumb-item"><a href="../Eventos.php">Administrar Eventos</a></li>
							<li class="breadcrumb-item"><a href="#"><span onclick="history.go(-1)">Resultados Eventos</span></a></li>
							<li class="breadcrumb-item active">Listados</li>
						</ol>
					</div>
					<div class="card text-left">
					  <h5 class="card-header">
						<b><center>Listados Evento "<?php echo $Evento ?>"</center></b>
					  </h5>
					  <div class="card-body">
						<!--span class="btn btn-primary">Agregar nuevo</span>
						<hr-->
						<div class="tabla">
							<table class="table table-hover table-striped table-bordered"  id="idDataTable" data-page-length="25"><!--table table-hover table-condensed table-bordered-->
								<thead style="background-color: #007bff; color: white; font-weight: bold;">
								  <tr>
									<th class="th-sm"><center>#</center></th>
									<th class="th-sm"><center>Nombre Listado</center></th>
									<th class="th-sm"><center>Acción</center></th>
								  </tr>
								</thead>
								<tbody>
								<?php
									$No=1;
									$sql = "SELECT * FROM listados_eventos WHERE evento ='$Evento' AND estado = 'terminado'";
									$result = $mysqli->query($sql);
									while($row=$result->fetch_assoc()){
										$id_listado = $row['id'];
								?>
									<tr>
										<td><center><?php echo $No ?></center></td>
										<td><?php echo $row['nombre_listado'] ?></td>
										<td><center><a href="Visualizar_Resultados.php?id=<?php echo $id_listado ?>"><span class="label label-primary">Resultados</span></a></center></td>
									</tr>
									<?php
										$No +=1;
									}
									$sql1 = "SELECT * FROM listados_carriles WHERE evento ='$Evento' AND estado = 'Terminado'";
									$result1 = $mysqli->query($sql1);
									while($row1=$result1->fetch_assoc()){
										$id_listado_remates = $row1['id'];
								?>
									<tr>
										<td><center><?php echo $No ?></center></td>
										<td>Prueba Carriles "<?php echo $row1['nombre_listado'] ?>"</td>
										<td><center><a href="Visualizar_Resultados_Carriles.php?id=<?php echo $id_listado_remates ?>"><span class="label label-primary">Resultados</span></a></center></td>
									</tr>
									<?php
										$No +=1;
									}
								?>
								</tbody>
								<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
									<tr>
										<th><center>#</center></th>
										<th><center>Nombre Listado</center></th>
										<th><center>Acción</center></th>
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
			<footer>Bienvenido <?php echo $idUsuario; ?> <button class="fas"><i class="fas fa-user-alt"></i></button>&nbsp; &nbsp; &nbsp;
                <a href="../../Logout.php"><button class="btn btn-info">Cerrar Sesión</button></a>
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
                //"sEmptyTable":     "Ningún dato disponible en esta tabla =(",
				"sEmptyTable":     "No hay resultados del evento disponibles por ahora =(",
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

<script type="text/javascript">
	function inscribirClubEvento(id){
		alertify.defaults.theme.cancel = "btn btn-secondary";
		alertify.confirm('Inscribir a Evento','¿Esta seguro de inscribir el Club y/o Escuela al evento  "'+id+'"?, para confirmar la acción presione continuar.',function(){
			$.ajax({
				type:"POST",
				data:"id="+id,
				url:"../procesos/Inscribir_Club_Evento.php",
				success:function(r){
					if(r==0){
						alertify.error("ERROR PRESENTADO -  El club no se ha podido registrar al evento");
					}else if(r==1){
						alertify.success("El club se ha registrado al evento exitosamente!");
						alertify.confirm('El club se ha registrado al evento exitosamente. ¿Desea proceder a la inscripción de deportistas al evento  "'+id+'"?',function(){
							window.open('../Inscripciones/Deportistas_Evento.php?Evento='+id+'','_self');
						},function(){
							alertify.success('No olvide inscribir sus deportistas al evento');
						}).set({labels:{ok:'Aceptar', cancel:'Mas Tarde'}});
					}else if(r==2){
						//alertify.error("ERROR PRESENTADO - El Club ya se encuentra registrado al evento!");
						alertify.confirm('El Club ya se encuentra registrado al evento. ¿Desea proceder a la inscripción de deportistas al evento  "'+id+'"?',function(){
							window.open('../Inscripciones/Deportistas_Evento.php?Evento='+id+'','_self');
						},function(){
							alertify.success('No olvide inscribir sus deportistas al evento');
						}).set({labels:{ok:'Aceptar', cancel:'Mas Tarde'}});
					}
				}
			});
		},function(){
			alertify.error('Cancelado');
		}).set({labels:{ok:'Continuar', cancel:'Cancelar'}});
	}
</script>