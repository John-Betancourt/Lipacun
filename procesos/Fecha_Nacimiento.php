<?php
	require_once('../clases/conexion_db.php');
	extract($_GET);
	extract($_POST);
	$identificacion = $_POST['dato'];
	$ano_actual = date("Y");
	$mes_actual = date("m");
	$dia_actual = date("d");
	
	if($identificacion=="1"){
		$ano_min = $ano_actual - 7;
		$ano_max = $ano_actual - 4;
		$mes_max = $mes_actual - 6;
		$fecha_min = $ano_min."-".date("m-d");
		$fecha_max = $ano_max."-".$mes_max."-".$dia_actual;
	}else if($identificacion=="2"){
		$ano_min = $ano_actual - 18;
		$ano_max = $ano_actual - 7;
		$fecha_min = $ano_min."-".date("m-d");
		$fecha_max = $ano_max."-".date("m-d");
	}else if($identificacion=="3"){
		$ano_min = "1970-01-01";
		$ano_max = $ano_actual - 18;
		$fecha_min = $ano_min."-".date("m-d");
		$fecha_max = $ano_max."-".date("m-d");
	}else if($identificacion=="4"){
		$ano_min = "1970-01-01";
		$ano_max = $ano_actual - 4;
		$fecha_min = $ano_min."-".date("m-d");
		$fecha_max = $ano_max."-".date("m-d");
	}else if($identificacion=="5"){
		$ano_min = $ano_actual - 7;
		$ano_max = $ano_actual - 4;
		$mes_max = $mes_actual - 6;
		$fecha_min = $ano_min."-".date("m-d");
		$fecha_max = $ano_max."-".$mes_max."-".$dia_actual;
	}
	$html = "<input class='Nacimiento form-control' TYPE='date' NAME='Nacimiento' min='$fecha_min' max='$fecha_max' onChange='FechaNacimiento(this.value)' required>";
	echo $html;
?>
<!-- Main -->
<script src='../js/main-deportistas.js'></script>