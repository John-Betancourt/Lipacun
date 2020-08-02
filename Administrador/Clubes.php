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
	<title>Clubes y/o Escuelas Pendientes por validación</title>
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
							<b><center>Clubes y/o Escuelas Pendientes por validación</center></b>
						</h5>
					  <div class="card-body">
						<div id="tablaValidarClubes"></div>
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
				<a href="Index.php"><button class="btn btn-info">Volver</button></a>
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
	$(document).ready(function(){
		$('#tablaValidarClubes').load('Tabla_Validar_Clubes.php');
	});
</script>

<script type="text/javascript">
	function Club_Eliminar(id){
		alertify.confirm('Advertencia','¿Esta seguro de eliminar el Club y/o Escuela "'+id+'" de la plataforma?, para confirmar la acción presione continuar.',function(){
			$.ajax({
				type:"POST",
				data:"id="+id,
				url:"../procesos/Club_Eliminar.php",
				success:function(r){
					if(r==0){
						alertify.error("ERROR PRESENTADO - No se ha podido eliminar el deportista del evento, por favor intente nuevamente.");
					}else if(r==1){
						$('#tablaValidarClubes').load('Tabla_Validar_Clubes.php');
						alertify.success("El Club y/o Escuela se ha eliminado correctamente.!");
					}
				}
			});
		},function(){
			alertify.error('Cancelado');
		}).set({labels:{ok:'Continuar', cancel:'Cancelar'}});
	}
</script>