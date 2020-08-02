<?php
	header('Content-type:application/xls; charset=utf-8');
	header('Content-Disposition: attachment; filename=MIS DEPORTISTAS.xls');
		
	require('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["nombre_corto"]==""){
		header("location: ../Login.php");
	}

	$idUsuario = $_SESSION['nombre_corto'];

	$query = "SELECT tipo_identificacion.tipo_identificacion, identificacion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, nombre_corto_club, fecha_nacimiento, tipo_patin.tipo_patin, edad, rama.rama, ligado.ligado, fecha_afiliacion, fecha_renovacion, fecha_inscripcion, deportistas.fecha_estado, estados.Estado FROM tipo_identificacion, deportistas, tipo_patin, rama, ligado, estados WHERE deportistas.tipo_identificacion = tipo_identificacion.id AND deportistas.tipo_patin = tipo_patin.id AND deportistas.rama = rama.id AND deportistas.ligado = ligado.id AND deportistas.estado = estados.ID AND nombre_corto_club = '$idUsuario' ORDER BY fecha_nacimiento DESC";
	$resultado = $mysqli->query($query);
?>
<table border="1">
	<tr style="background: #5882FA; color: white">
		<th>#</th>
		<th>IDENTIFICACION</th>
		<th>TIPO DE IDENTIFICACION</th>
		<th>NOMBRES</th>
		<th>APELLIDOS</th>
		<th>NOMBRE CORTO DEL CLUB</th>
	    <th>TIPO DE PATIN</th>
		<th>FECHA DE NACIMIENTO</th>
		<th>EDAD</th>
		<th>RAMA</th>
		<th>LIGADO</th>
		<th>FECHA DE AFILIACION</th>
		<th>FECHA DE RENOVACION</th>
		<th>FECHA DE INSCRIPCION</th>
	</tr>
	<?php
		$No=1;
		while ($row=mysqli_fetch_assoc($resultado)){
			
			?>
				<tr>
					<td><?php echo $No ?></td>
					<td><?php echo $row['identificacion'];?></td>
					<td><?php echo $row['tipo_identificacion'];?></td>
					<td><?php $Nombres = utf8_decode($row['primer_nombre'].' '.$row['segundo_nombre']); echo $Nombres ?></td>
					<td><?php $Apellidos = utf8_decode($row['primer_apellido'].' '.$row['segundo_apellido']); echo $Apellidos?></td>
					<td><?php echo utf8_decode($row['nombre_corto_club']);?></td>
					<td><?php echo $row['tipo_patin'];?></td>
					<td><?php echo $row['fecha_nacimiento'];?></td>
					<td><?php echo $row['edad'];?></td>
					<td><?php echo $row['rama'];?></td>
					<td><?php echo $row['ligado'];?></td>
					<td><?php echo $row['fecha_afiliacion'];?></td>
					<td><?php echo $row['fecha_renovacion'];?></td>
					<td><?php echo $row['fecha_inscripcion'];?></td>
				</tr>
	
			<?php
			$No +=1;
		}
	
	?>
</table>

