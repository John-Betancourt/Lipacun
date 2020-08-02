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
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#007bff"><!--dark #009efb-->
  <a class="navbar-brand" href="#" id="btnSalirDeLipacun">LIPACUN &nbsp; |</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="Index.php">INICIO &nbsp; |<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Clubes.php">VALIDAR CLUBES &nbsp; |</a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="Lista_Eventos.php">ADMINISTRAR EVENTOS &nbsp; |</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Lista_Clubes.php">CLUBES &nbsp; |</a>
      </li>				
      <li class="nav-item active">
        <a class="nav-link" href="Listar_Deportistas.php">DEPORTISTAS &nbsp; |</a>
      </li>
    </ul>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
      <?php
      $noti = "SELECT COUNT(*) estado FROM clubes WHERE estado= '3'";
      $result1 = $mysqli->query($noti);
      $cuantas = $result1->fetch_assoc();
      ?>
      <!-- Notificationes -->
      <li class="nav-item dropdown">
              <a href="#"  class="nav-link dropdown-toggle" data-toggle="dropdown" >
              <button type="button" class="btn btn-danger">
                Notificaciones <span class="badge badge-light"><?php echo $cuantas['estado']; ?></span>
              </button>
              <!-- <i><img src="../imagenes/iconos/appointment-reminders.png"/></i> 
              <span class="label1 label-danger"> <!?php echo $cuantas['estado']; ?></span> -->
              </a>
        <ul class="dropdown-menu">
          <li class="header">Tienes <?php echo $cuantas['estado']; ?> notifiaciones</li><hr>
          <li >
            <!-- muestra los clubes no validados -->
            <?php
            $club = "SELECT * FROM clubes WHERE estado= '3'";
            $resultado = $mysqli->query($club);
            while($nombre=$resultado->fetch_assoc()){ 
            ?>
            <ul class="navbar-nav">
              <li>
                <a href="Clubes.php"> <i class="fas fa-user-alt"></i>El club <b><?php echo $nombre['nombre_corto_club']; ?></b> espera por validación. </a><hr>
              </li>
            </ul>
            <?php } ?>
          </li>
        </ul>
      </li>
    </div>
</nav>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnSalirDeLipacun').click(function(){
			alertify.confirm('Esta saliendo de la plataforma LIPACUN','Esta saliendo de la plataforma LIPACUN, para continuar y dirigirse a la pagina de LIPACUN presione continuar.',function(){
				window.open('https://www.lipacun.com/','_self');
			},function(){
				alertify.error('Cancelado');
			}).set({labels:{ok:'Continuar', cancel:'Cancelar'}});
		});
	});
</script>