<?php
	require_once('../clases/conexion_db.php');
	extract($_GET);
	extract($_POST);
	$edad = $_POST['dato'];

	if($edad <= 7){
		$html = "<select name='Patin' class='Patin form-control' maxlength='25' onchange='hidePatin(this.value)' required>";
		$html .= "<option value='' Selected disabled>- Selecciona el tipo de Patín -</option>";
		$query = $mysqli -> query ("SELECT * FROM tipo_patin WHERE id != 3 ORDER BY id");
		while ($valores = mysqli_fetch_array($query)) {
			$html .= '<option value="'.$valores['id'].'">'.$valores['tipo_patin'].'</option>';
		}
	}else{
		$html = "<select name='Patin' class='Patin form-control' maxlength='25' onchange='hidePatin(this.value)' required>";
		$html .= "<option value='' Selected disabled>- Selecciona el tipo de Patín -</option>";
		$query = $mysqli -> query ('SELECT * FROM tipo_patin ORDER BY id');
		while ($valores = mysqli_fetch_array($query)) {
			$html .= '<option value="'.$valores['id'].'">'.$valores['tipo_patin'].'</option>';
		}
	}
echo $html;
//echo $edad;
?>
<!-- Main -->
<script src="../js/main-deportistas.js"></script>