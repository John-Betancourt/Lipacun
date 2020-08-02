<?php
	$mysqli=new mysqli("localhost","root","","db_plataforma_lipacun");
	$mysqli -> set_charset('utf8');
	 if (mysqli_connect_errno()) {
		echo 'Conexion Fallida con la base de datos: ',mysqli_connect_error();
		exit();
	 }
?>