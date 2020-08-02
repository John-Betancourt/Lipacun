<?php
	require_once('../clases/conexion_db.php');
	extract($_GET);
	extract($_POST);
	$var = $_POST['dato'];
	$query = $mysqli -> query("SELECT * FROM municipios WHERE departamento_id = '$var' ORDER BY municipio");
	$html = "<option value=''selected>- Selecciona una Ciudad -</option>";
	while ($valores = mysqli_fetch_array($query)) {
		$html.= '<option value="'.$valores['id_municipio'].'">'.$valores['municipio'].'</option>';
	}
	echo $html;
?>