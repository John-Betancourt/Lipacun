<?php
  require_once('../clases/conexion_db.php');
  session_start();

  if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
    header("location: Login.php");
  }

  $idUsuario = $_SESSION['codigo_usuario'];
  $perfil_usuario = $_SESSION["perfil_usuario"];
?>
<!DOCTYPE html>
<html>
<head>
  <!-- j Query -->
  <script type="text/javascript" src="../librerias/jquery.min.js"></script>
  <!-- Bootstrap JS -->
  <script type="text/javascript" src="../librerias/bootstrap/bootstrap.min.js"></script> 
</head>
<body>
<?php
if(!empty($_POST)){
  $response = array();
  $club=$_POST['club'];
  $ciudad=$_POST['ciudad'];
  $nombre_club=$_POST['nombre_club'];
  $nombres_representante=$_POST['nombres_representante'];
  $apellidos_representante=$_POST['apellidos_representante'];
  $identificacion=$_POST['identificacion'];
  $cargo=$_POST['cargo'];
  $telefono=$_POST['telefono'];
  $correo=$_POST['email'];
  $reconocimiento=$_POST['reconocimiento'];
  if($reconocimiento=="Si"){
    $reconocimiento=1;
  }else if($reconocimiento=="No"){
    $reconocimiento=2;
  } 
  $no_reconocimiento=$_POST['numero_reconocimiento'];
  $fecha_reconocimiento= $_POST['fecha_reconocimiento'];

      $query="update clubes SET municipio='$ciudad', nombre_completo_club='$nombre_club', nombres= '$nombres_representante',
      apellidos= '$apellidos_representante', identificacion = '$identificacion', cargo= '$cargo', telefono='$telefono',
      email='$correo', reconocimiento='$reconocimiento', no_reconocimiento='$no_reconocimiento', fecha_reconocimiento='$fecha_reconocimiento'
      WHERE nombre_corto_club='$club'";
      $result=$mysqli->query($query);
      if($result){
        $response['response'] = "Se ha actualizado la información del club satisfactoriamente!";
        $response['type_response'] = 1;
      } else {
        $response['response'] = "ERROR PRESENTADO - Por favor intente nuevamente";
        $response['type_response'] = 0;
      }
    
  }

?>
<script>alert('<?php echo $response['response']; ?>')</script>
<?php if ($response['type_response'] == 0) { ?>
  <script>window.history.back()</script>
<?php }else if ($response['type_response'] == 1) { ?>
  <script>window.history.back()</script>
<?php } ?>
</body>
</html>