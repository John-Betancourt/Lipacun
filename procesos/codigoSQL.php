<?php
require('../clases/conexion_db.php');
session_start();
error_reporting(0);

if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
	header("location: ../Administrador/Login.php");
}
$sql=$_POST['sql'];
$sql=addslashes($sql);
echo $sql;
?>
