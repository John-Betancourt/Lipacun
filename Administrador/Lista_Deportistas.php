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
  if(!empty($_REQUEST)){
	  $_SESSION['Club'] = $_REQUEST['Club'];
	  $Club = $_SESSION['Club'];
  }else{
	  $Club = $_SESSION['Club'];
  }
  
  if (empty($_SESSION['Club'])){
	  $response['response'] = "ERROR PRESENTADO - No ha seleccionado un club y/o escuela valido.";
	  $response['type_response'] = 0; ?>
	  <script>alert('<?php echo $response['response'] ?>')</script>
	  <script>window.history.back()</script>
<?php } ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista Deportistas Por Club y/o Escuela</title>
	<?php require_once "scripts.php"; ?>
</head>
<body>
	<center>
		<div class="panel-heading"><!--https://www.lipacun.com/-->
			<a href="Lista_Clubes.php"><img src="../imagenes/iconos/Logo.webp" alt="Logo" class="logo" height="90"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/1.webp" alt="favicon1" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/2.webp" alt="favicon2" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/3.webp" alt="favicon3" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/4.webp" alt="favicon4" class="logo" height="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="../imagenes/iconos/Cundinamarca_logo.webp" alt="Logo" class="logo" height="90">
		</div><hr>

		<div class="container">
			<div class="row">
				<div class="col-sm-12">
				<!--div id="navbar"></div><br-->
				<div class="justify-content-end align-items-center"><!--d-flex -->
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="Index.php">Pagina Principal</a></li>
						<li class="breadcrumb-item"><a href="Lista_Clubes.php">Lista Clubes</a></li>
						<li class="breadcrumb-item active">Lista Deportistas por Club</li>
					</ol>
				</div>
					<div class="card text-left">
					  <h5 class="card-header">
						<b><center>Lista Deportistas Club y/o Escuela <?php echo $Club; ?></center></b>
					  </h5>
					  <div class="card-body">
						<!--span class="btn btn-primary">Agregar nuevo</span>
						<hr-->
						<div id="tablaDeportistas"></div>
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
	$(document).ready(function(){
		$('#tablaDeportistas').load('Tabla_Deportistas.php');
	});
</script>

<script type="text/javascript">
	function BajaDeportista(id){
		alertify.confirm('Advertencia','¿Esta seguro de dar baja al deportista con la identificación "'+id+'"?, para confirmar la acción presione continuar.',function(){
			$.ajax({
				type:"POST",
				data:"id="+id,
				url:"../procesos/Deportista_Baja.php",
				success:function(r){
					if(r==0){
						alertify.error("ERROR PRESENTADO - No se ha podido dar de baja al Club y/o Escuela, por favor intente nuevamente.");
					}else if(r==1){
						$('#tablaDeportistas').load('Tabla_Deportistas.php');
						alertify.success("Se ha dado de baja al Club y/o Escuela correctamente.");
					}
				}
			});
		},function(){
			alertify.error('Cancelado');
		}).set({labels:{ok:'Continuar', cancel:'Cancelar'}});
	}
</script>