<?php
require('../clases/conexion_db.php');
session_start();
error_reporting(0);

if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
header("location: ../Administrador/Login.php");
}
$evento = $_POST['evento'];
$categoria = $_POST['tipo_cat'];
if($categoria=="Menores"){?>
<div class="tabla">
	<table class="table table-hover table-striped table-bordered" id="idDataTable" data-page-length='25'><!--table table-hover table-condensed table-bordered-->
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
			<tr>
				<th class="th-sm"><center>Posición</center></th>
				<th class="th-sm"><center>Club</center></th>
				<th class="th-sm"><center>Oro</center></th>
				<th class="th-sm"><center>Plata</center></th>
				<th class="th-sm"><center>Bronce</center></th>
				<th class="th-sm"><center>Total</center></th>
			</tr>
		</thead>
		<tbody>
				<?php
						$No=1;
						$sql="SELECT * FROM inscripcion_evento_clubes WHERE evento = '$evento'";
						$resultado=$mysqli->query($sql) or die ($mysqli->error);
						while($row=$resultado->fetch_assoc()){
						$club = $row['club'];
						
						/************************************************************************************
												SABER CUANTOS OROS
						*************************************************************************************/
						$oros = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_habilidad WHERE premiacion= 'oro' AND club = '$club' AND categorias = 'Menores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result1 = $mysqli->query($oros)  or die($mysqli->error);
						$oro = $result1->fetch_assoc();
						$oro_competencia1 = $oro['oros'];
							
						$oros1 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_fondo_puntos WHERE premiacion= 'oro' AND club = '$club' AND categorias = 'Menores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result11 = $mysqli->query($oros1)  or die($mysqli->error);
						$oroo = $result11->fetch_assoc();
						$oro_competencia2 = $oroo['oros'];
							
						$oros2 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_velocidad WHERE premiacion= 'oro' AND club = '$club' AND categorias = 'Menores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result111 = $mysqli->query($oros2)  or die($mysqli->error);
						$orooo = $result111->fetch_assoc();
						$oro_competencia3 = $orooo['oros'];
							
						$oros3 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_fondo_eliminacion WHERE premiacion= 'oro' AND club = '$club' AND categorias = 'Menores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result1111 = $mysqli->query($oros3)  or die($mysqli->error);
						$oroooo = $result1111->fetch_assoc();
						$oro_competencia4 = $oroooo['oros'];
							
						$oros4 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_fondo_puntos_eliminacion WHERE premiacion= 'oro' AND club = '$club' AND categorias = 'Menores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result11111 = $mysqli->query($oros4)  or die($mysqli->error);
						$orooooo = $result11111->fetch_assoc();
						$oro_competencia5 = $orooooo['oros'];
							
						$oros5 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_libre WHERE premiacion= 'oro' AND club = '$club' AND categorias = 'Menores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result111111 = $mysqli->query($oros5)  or die($mysqli->error);
						$oroooooo = $result111111->fetch_assoc();
						$oro_competencia6 = $oroooooo['oros'];
							
						$oros6 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_carriles WHERE premiacion_final= 'oro' AND club = '$club' AND categoria = 'Menores' AND nombre_evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result1111111 = $mysqli->query($oros6)  or die($mysqli->error);
						$orooooooo = $result1111111->fetch_assoc();
						$oro_competencia7 = $orooooooo['oros'];

						$oros_totales = $oro_competencia1 + $oro_competencia2 + $oro_competencia3 + $oro_competencia4 + $oro_competencia5 + $oro_competencia6 + $oro_competencia7;
							
							
							
						/************************************************************************************
												SABER CUANTAS PLATAS
						*************************************************************************************/
							
						$platas = "SELECT COUNT(*)  plata FROM resultados_eventos_competencia_habilidad WHERE premiacion= 'plata' AND club = '$club' AND categorias = 'Menores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result2 = $mysqli->query($platas)  or die ($mysqli->error);
						$plata = $result2->fetch_assoc();
						$plata_competencia1 = $plata['plata'];

						$platas1 = "SELECT COUNT(*) plata FROM resultados_eventos_competencia_fondo_puntos WHERE premiacion= 'plata' AND club = '$club' AND categorias = 'Menores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result22 = $mysqli->query($platas1)  or die ($mysqli->error);
						$plataa = $result22->fetch_assoc();
						$plata_competencia2 = $plataa['plata'];
							
						$platas2 = "SELECT COUNT(*) plata FROM resultados_eventos_competencia_velocidad WHERE premiacion= 'plata' AND club = '$club' AND categorias = 'Menores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result222 = $mysqli->query($platas2)  or die ($mysqli->error);
						$plataaa = $result222->fetch_assoc();
						$plata_competencia3 = $plataaa['plata'];
							
						$platas3 = "SELECT COUNT(*) plata FROM resultados_eventos_competencia_fondo_eliminacion WHERE premiacion= 'plata' AND club = '$club' AND categorias = 'Menores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result2222 = $mysqli->query($platas3)  or die ($mysqli->error);
						$plataaaa = $result2222->fetch_assoc();
						$plata_competencia4 = $plataaaa['plata'];
							
						$platas4 = "SELECT COUNT(*) plata FROM resultados_eventos_competencia_fondo_puntos_eliminacion WHERE premiacion= 'plata' AND club = '$club' AND categorias = 'Menores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result22222 = $mysqli->query($platas4)  or die ($mysqli->error);
						$plataaaaa = $result22222->fetch_assoc();
						$plata_competencia5 = $plataaaaa['plata'];
							
						$platas5 = "SELECT COUNT(*) plata FROM resultados_eventos_competencia_libre WHERE premiacion= 'plata' AND club = '$club' AND categorias = 'Menores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result222222 = $mysqli->query($platas5)  or die ($mysqli->error);
						$plataaaaaa = $result222222->fetch_assoc();
						$plata_competencia6 = $plataaaaaa['plata'];
							
						$platas6 = "SELECT COUNT(*) plata FROM resultados_eventos_competencia_carriles WHERE premiacion_final= 'plata' AND club = '$club' AND categoria = 'Menores' AND nombre_evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result2222222 = $mysqli->query($platas6)  or die ($mysqli->error);
						$plataaaaaaa = $result2222222->fetch_assoc();
						$plata_competencia7 = $plataaaaaaa['plata'];

						$platas_totales = $plata_competencia1 + $plata_competencia2 + $plata_competencia3 + $plata_competencia4 + $plata_competencia5 + $plata_competencia6 + $plata_competencia7;
							
						/************************************************************************************
												SABER CUANTOS BRONCES
						*************************************************************************************/

						$bronces = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_habilidad WHERE premiacion= 'bronce' AND club = '$club' AND categorias = 'Menores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result3 = $mysqli->query($bronces)  or die ($mysqli->error);
						$bronce = $result3->fetch_assoc();
						$bronce_competencia1 = $bronce['bronce'];

						$bronces1 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_fondo_puntos WHERE premiacion= 'bronce' AND club = '$club' AND categorias = 'Menores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result33 = $mysqli->query($bronces1)  or die ($mysqli->error);
						$broncee = $result33->fetch_assoc();
						$bronce_competencia2 = $broncee['bronce'];
							
						$bronces2 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_velocidad WHERE premiacion= 'bronce' AND club = '$club' AND categorias = 'Menores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result333 = $mysqli->query($bronces2)  or die ($mysqli->error);
						$bronceee = $result333->fetch_assoc();
						$bronce_competencia3 = $bronceee['bronce'];
							
						$bronces3 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_fondo_eliminacion WHERE premiacion= 'bronce' AND club = '$club' AND categorias = 'Menores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result3333 = $mysqli->query($bronces3)  or die ($mysqli->error);
						$bronceeee = $result3333->fetch_assoc();
						$bronce_competencia4 = $bronceeee['bronce'];
							
						$bronces4 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_fondo_puntos_eliminacion WHERE premiacion= 'bronce' AND club = '$club' AND categorias = 'Menores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result33333 = $mysqli->query($bronces4)  or die ($mysqli->error);
						$bronceeeee = $result33333->fetch_assoc();
						$bronce_competencia5 = $bronceeeee['bronce'];
							
						$bronces5 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_libre WHERE premiacion= 'bronce' AND club = '$club' AND categorias = 'Menores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result333333 = $mysqli->query($bronces5)  or die ($mysqli->error);
						$bronceeeeee = $result333333->fetch_assoc();
						$bronce_competencia6 = $bronceeeeee['bronce'];
							
						$bronces6 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_carriles WHERE premiacion_final= 'bronce' AND club = '$club' AND categoria = 'Menores' AND nombre_evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result3333333 = $mysqli->query($bronces6)  or die ($mysqli->error);
						$bronceeeeeee = $result3333333->fetch_assoc();
						$bronce_competencia7 = $bronceeeeeee['bronce'];

						$bronces_totales = $bronce_competencia1 + $bronce_competencia2 + $bronce_competencia3 + $bronce_competencia4 + $bronce_competencia5 + $bronce_competencia6 + $bronce_competencia7;
							
						$medallas = $bronces_totales + $platas_totales + $oros_totales;		

		
					?>
						<tr>
							<td><center></center></td>
							<td><?php echo $club ?></td>
							<td><center><?php echo $oros_totales ?></center></td>
							<td><center><?php echo $platas_totales ?></center></td>
							<td><center><?php echo $bronces_totales ?></center></td>
							<td><center><?php echo $medallas ?></center></td>
						</tr>
					<?php
						$No +=1;
							}

					?>
      </tbody>
	  <tfoot style="background-color: #ccc;color: white; font-weight: bold;">
	    <tr>
	      <th><center>Posición</center></th>
	      <th><center>Club</center></th>
	      <th><center>Oros</center></th>
	      <th><center>Platas</center></th>
	      <th><center>Bronces</center></th>
	      <th><center>Total</center></th>
	      </tr>
	    </tfoot>
  </table>
</div><?php
}else if($categoria=="Transicion"){?>
<div class="tabla">
	<table class="table table-hover table-striped table-bordered" id="idDataTable" data-page-length='25'><!--table table-hover table-condensed table-bordered-->
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
			<tr>
				<th class="th-sm"><center>Posición</center></th>
				<th class="th-sm"><center>Club</center></th>
				<th class="th-sm"><center>Oro</center></th>
				<th class="th-sm"><center>Plata</center></th>
				<th class="th-sm"><center>Bronce</center></th>
				<th class="th-sm"><center>Total</center></th>
			</tr>
		</thead>
		<tbody>
				<?php
						$No=1;
						$sql="SELECT * FROM inscripcion_evento_clubes WHERE evento = '$evento'";
						$resultado=$mysqli->query($sql) or die ($mysqli->error);
						while($row=$resultado->fetch_assoc()){
						$club = $row['club'];
							
						/************************************************************************************
												SABER CUANTOS OROS
						*************************************************************************************/
						$oros = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_habilidad WHERE premiacion= 'oro' AND club = '$club' AND categorias = 'Transicion' AND evento= '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result1 = $mysqli->query($oros)  or die($mysqli->error);
						$oro = $result1->fetch_assoc();
						$oro_competencia1 = $oro['oros'];
							
						$oros1 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_fondo_puntos WHERE premiacion= 'oro' AND club = '$club' AND categorias = 'Transicion' AND evento= '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result11 = $mysqli->query($oros1)  or die($mysqli->error);
						$oroo = $result11->fetch_assoc();
						$oro_competencia2 = $oroo['oros'];
							
						$oros2 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_velocidad WHERE premiacion= 'oro' AND club = '$club' AND categorias = 'Transicion' AND evento= '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result111 = $mysqli->query($oros2)  or die($mysqli->error);
						$orooo = $result111->fetch_assoc();
						$oro_competencia3 = $orooo['oros'];
							
						$oros3 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_fondo_eliminacion WHERE premiacion= 'oro' AND club = '$club' AND categorias = 'Transicion' AND evento= '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result1111 = $mysqli->query($oros3)  or die($mysqli->error);
						$oroooo = $result1111->fetch_assoc();
						$oro_competencia4 = $oroooo['oros'];
							
						$oros4 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_fondo_puntos_eliminacion WHERE premiacion= 'oro' AND club = '$club' AND categorias = 'Transicion' AND evento= '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result11111 = $mysqli->query($oros4)  or die($mysqli->error);
						$orooooo = $result11111->fetch_assoc();
						$oro_competencia5 = $orooooo['oros'];
							
						$oros5 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_libre WHERE premiacion= 'oro' AND club = '$club' AND categorias = 'Transicion' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result111111 = $mysqli->query($oros5)  or die($mysqli->error);
						$oroooooo = $result111111->fetch_assoc();
						$oro_competencia6 = $oroooooo['oros'];
							
						$oros6 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_carriles WHERE premiacion_final= 'oro' AND club = '$club' AND categoria = 'Transicion' AND nombre_evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result1111111 = $mysqli->query($oros6)  or die($mysqli->error);
						$orooooooo = $result1111111->fetch_assoc();
						$oro_competencia7 = $orooooooo['oros'];

						$oros_totales = $oro_competencia1 + $oro_competencia2 + $oro_competencia3 + $oro_competencia4 + $oro_competencia5 + $oro_competencia6 + $oro_competencia7;
													
							
						/************************************************************************************
												SABER CUANTAS PLATAS
						*************************************************************************************/
							
						$platas = "SELECT COUNT(*)  plata FROM resultados_eventos_competencia_habilidad WHERE premiacion= 'plata' AND club = '$club' AND categorias = 'Transicion' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result2 = $mysqli->query($platas)  or die ($mysqli->error);
						$plata = $result2->fetch_assoc();
						$plata_competencia1 = $plata['plata'];

						$platas1 = "SELECT COUNT(*)  plata FROM resultados_eventos_competencia_fondo_puntos WHERE premiacion= 'plata' AND club = '$club' AND categorias = 'Transicion' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result22 = $mysqli->query($platas1)  or die ($mysqli->error);
						$plataa = $result22->fetch_assoc();
						$plata_competencia2 = $plataa['plata'];
							
						$platas2 = "SELECT COUNT(*)  plata FROM resultados_eventos_competencia_velocidad WHERE premiacion= 'plata' AND club = '$club' AND categorias = 'Transicion' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result222 = $mysqli->query($platas2)  or die ($mysqli->error);
						$plataaa = $result222->fetch_assoc();
						$plata_competencia3 = $plataaa['plata'];
							
						$platas3 = "SELECT COUNT(*)  plata FROM resultados_eventos_competencia_fondo_eliminacion WHERE premiacion= 'plata' AND club = '$club' AND categorias = 'Transicion' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result2222 = $mysqli->query($platas3)  or die ($mysqli->error);
						$plataaaa = $result2222->fetch_assoc();
						$plata_competencia4 = $plataaaa['plata'];
							
						$platas4 = "SELECT COUNT(*)  plata FROM resultados_eventos_competencia_fondo_puntos_eliminacion WHERE premiacion= 'plata' AND club = '$club' AND categorias = 'Transicion' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result22222 = $mysqli->query($platas4)  or die ($mysqli->error);
						$plataaaaa = $result22222->fetch_assoc();
						$plata_competencia5 = $plataaaaa['plata'];
							
						$platas5 = "SELECT COUNT(*) plata FROM resultados_eventos_competencia_libre WHERE premiacion= 'plata' AND club = '$club' AND categorias = 'Transicion' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result222222 = $mysqli->query($platas5)  or die ($mysqli->error);
						$plataaaaaa = $result222222->fetch_assoc();
						$plata_competencia6 = $plataaaaaa['plata'];
							
						$platas6 = "SELECT COUNT(*) plata FROM resultados_eventos_competencia_carriles WHERE premiacion_final= 'plata' AND club = '$club' AND categoria = 'Transicion' AND nombre_evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result2222222 = $mysqli->query($platas6)  or die ($mysqli->error);
						$plataaaaaaa = $result2222222->fetch_assoc();
						$plata_competencia7 = $plataaaaaaa['plata'];

						$platas_totales = $plata_competencia1 + $plata_competencia2 + $plata_competencia3 + $plata_competencia4 + $plata_competencia5 + $plata_competencia6 + $plata_competencia7;

							
						/************************************************************************************
												SABER CUANTOS BRONCES
						*************************************************************************************/

						$bronces = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_habilidad WHERE premiacion= 'bronce' AND club = '$club' AND categorias = 'Transicion' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result3 = $mysqli->query($bronces)  or die ($mysqli->error);
						$bronce = $result3->fetch_assoc();
						$bronce_competencia1 = $bronce['bronce'];

						$bronces1 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_fondo_puntos WHERE premiacion= 'bronce' AND club = '$club' AND categorias = 'Transicion' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result33 = $mysqli->query($bronces1)  or die ($mysqli->error);
						$broncee = $result33->fetch_assoc();
						$bronce_competencia2 = $broncee['bronce'];
							
						$bronces2 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_velocidad WHERE premiacion= 'bronce' AND club = '$club' AND categorias = 'Transicion' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result333 = $mysqli->query($bronces2)  or die ($mysqli->error);
						$bronceee = $result333->fetch_assoc();
						$bronce_competencia3 = $bronceee['bronce'];
							
						$bronces3 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_fondo_eliminacion WHERE premiacion= 'bronce' AND club = '$club' AND categorias = 'Transicion' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result3333 = $mysqli->query($bronces3)  or die ($mysqli->error);
						$bronceeee = $result3333->fetch_assoc();
						$bronce_competencia4 = $bronceeee['bronce'];
							
						$bronces4 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_fondo_puntos_eliminacion WHERE premiacion= 'bronce' AND club = '$club' AND categorias = 'Transicion' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result33333 = $mysqli->query($bronces4)  or die ($mysqli->error);
						$bronceeeee = $result33333->fetch_assoc();
						$bronce_competencia5 = $bronceeeee['bronce'];
							
						$bronces5 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_libre WHERE premiacion= 'bronce' AND club = '$club' AND categorias = 'Transicion' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result333333 = $mysqli->query($bronces5)  or die ($mysqli->error);
						$bronceeeeee = $result333333->fetch_assoc();
						$bronce_competencia6 = $bronceeeeee['bronce'];
							
						$bronces6 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_carriles WHERE premiacion_final= 'bronce' AND club = '$club' AND categoria = 'Transicion' AND nombre_evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result3333333 = $mysqli->query($bronces6)  or die ($mysqli->error);
						$bronceeeeeee = $result3333333->fetch_assoc();
						$bronce_competencia7 = $bronceeeeeee['bronce'];

						$bronces_totales = $bronce_competencia1 + $bronce_competencia2 + $bronce_competencia3 + $bronce_competencia4 + $bronce_competencia5 + $bronce_competencia6 + $bronce_competencia7;
							
						$medallas = $bronces_totales + $platas_totales + $oros_totales;

				?>
					<tr>
						<td><center></center></td>
						<td><?php echo $club ?></td>
						<td><center><?php echo $oros_totales ?></center></td>
						<td><center><?php echo $platas_totales ?></center></td>
						<td><center><?php echo $bronces_totales ?></center></td>
						<td><center><?php echo $medallas ?></center></td>
					</tr>
				<?php
					$No +=1;
						}

				?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>Posición</center></th>
				<th><center>Club</center></th>
				<th><center>Oros</center></th>
				<th><center>Platas</center></th>
				<th><center>Bronces</center></th>
				<th><center>Total</center></th>
			</tr>
		</tfoot>
	</table>
</div><?php
}else if($categoria=="Mayores"){?>
<div class="tabla">
	<table class="table table-hover table-striped table-bordered" id="idDataTable" data-page-length='25'><!--table table-hover table-condensed table-bordered-->
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
			<tr>
				<th class="th-sm"><center>Posición</center></th>
				<th class="th-sm"><center>Club</center></th>
				<th class="th-sm"><center>Oro</center></th>
				<th class="th-sm"><center>Plata</center></th>
				<th class="th-sm"><center>Bronce</center></th>
				<th class="th-sm"><center>Total</center></th>
		</thead>
		<tbody>
				<?php
						$No=1;
						$sql="SELECT * FROM inscripcion_evento_clubes WHERE evento = '$evento'";
						$resultado=$mysqli->query($sql) or die ($mysqli->error);
						while($row=$resultado->fetch_assoc()){
						$club = $row['club'];
							
						/************************************************************************************
												SABER CUANTOS OROS
						*************************************************************************************/
						$oros = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_habilidad WHERE premiacion= 'oro' AND club = '$club' AND categorias = 'Mayores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result1 = $mysqli->query($oros)  or die($mysqli->error);
						$oro = $result1->fetch_assoc();
						$oro_competencia1 = $oro['oros'];
							
						$oros1 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_fondo_puntos WHERE premiacion= 'oro' AND club = '$club' AND categorias = 'Mayores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result11 = $mysqli->query($oros1)  or die($mysqli->error);
						$oroo = $result11->fetch_assoc();
						$oro_competencia2 = $oroo['oros'];
							
						$oros2 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_velocidad WHERE premiacion= 'oro' AND club = '$club' AND categorias = 'Mayores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result111 = $mysqli->query($oros2)  or die($mysqli->error);
						$orooo = $result111->fetch_assoc();
						$oro_competencia3 = $orooo['oros'];
							
						$oros3 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_fondo_eliminacion WHERE premiacion= 'oro' AND club = '$club' AND categorias = 'Mayores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result1111 = $mysqli->query($oros3)  or die($mysqli->error);
						$oroooo = $result1111->fetch_assoc();
						$oro_competencia4 = $oroooo['oros'];
							
						$oros4 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_fondo_puntos_eliminacion WHERE premiacion= 'oro' AND club = '$club' AND categorias = 'Mayores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result11111 = $mysqli->query($oros4)  or die($mysqli->error);
						$orooooo = $result11111->fetch_assoc();
						$oro_competencia5 = $orooooo['oros'];
							
						$oros5 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_libre WHERE premiacion= 'oro' AND club = '$club' AND categorias = 'Mayores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result111111 = $mysqli->query($oros5)  or die($mysqli->error);
						$oroooooo = $result111111->fetch_assoc();
						$oro_competencia6 = $oroooooo['oros'];
							
						$oros6 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_carriles WHERE premiacion_final= 'oro' AND club = '$club' AND categoria = 'Mayores' AND nombre_evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result1111111 = $mysqli->query($oros6)  or die($mysqli->error);
						$orooooooo = $result1111111->fetch_assoc();
						$oro_competencia7 = $orooooooo['oros'];

						$oros_totales = $oro_competencia1 + $oro_competencia2 + $oro_competencia3 + $oro_competencia4 + $oro_competencia5 + $oro_competencia6 + $oro_competencia7;		
							
							
						/************************************************************************************
												SABER CUANTAS PLATAS
						*************************************************************************************/
							
						$platas = "SELECT COUNT(*)  plata FROM resultados_eventos_competencia_habilidad WHERE premiacion= 'plata' AND club = '$club' AND categorias = 'Mayores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result2 = $mysqli->query($platas)  or die ($mysqli->error);
						$plata = $result2->fetch_assoc();
						$plata_competencia1 = $plata['plata'];

						$platas1 = "SELECT COUNT(*)  plata FROM resultados_eventos_competencia_fondo_puntos WHERE premiacion= 'plata' AND club = '$club' AND categorias = 'Mayores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result22 = $mysqli->query($platas1)  or die ($mysqli->error);
						$plataa = $result22->fetch_assoc();
						$plata_competencia2 = $plataa['plata'];
							
						$platas2 = "SELECT COUNT(*)  plata FROM resultados_eventos_competencia_velocidad WHERE premiacion= 'plata' AND club = '$club' AND categorias = 'Mayores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result222 = $mysqli->query($platas2)  or die ($mysqli->error);
						$plataaa = $result222->fetch_assoc();
						$plata_competencia3 = $plataaa['plata'];
							
						$platas3 = "SELECT COUNT(*)  plata FROM resultados_eventos_competencia_fondo_eliminacion WHERE premiacion= 'plata' AND club = '$club' AND categorias = 'Mayores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result2222 = $mysqli->query($platas3)  or die ($mysqli->error);
						$plataaaa = $result2222->fetch_assoc();
						$plata_competencia4 = $plataaaa['plata'];
							
						$platas4 = "SELECT COUNT(*)  plata FROM resultados_eventos_competencia_fondo_puntos_eliminacion WHERE premiacion= 'plata' AND club = '$club' AND categorias = 'Mayores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result22222 = $mysqli->query($platas4)  or die ($mysqli->error);
						$plataaaaa = $result22222->fetch_assoc();
						$plata_competencia5 = $plataaaaa['plata'];
							
						$platas5 = "SELECT COUNT(*) plata FROM resultados_eventos_competencia_libre WHERE premiacion= 'plata' AND club = '$club' AND categorias = 'Mayores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result222222 = $mysqli->query($platas5)  or die ($mysqli->error);
						$plataaaaaa = $result222222->fetch_assoc();
						$plata_competencia6 = $plataaaaaa['plata'];
							
						$platas6 = "SELECT COUNT(*) plata FROM resultados_eventos_competencia_carriles WHERE premiacion_final= 'plata' AND club = '$club' AND categoria = 'Mayores' AND nombre_evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result2222222 = $mysqli->query($platas6)  or die ($mysqli->error);
						$plataaaaaaa = $result2222222->fetch_assoc();
						$plata_competencia7 = $plataaaaaaa['plata'];

						$platas_totales = $plata_competencia1 + $plata_competencia2 + $plata_competencia3 + $plata_competencia4 + $plata_competencia5 + $plata_competencia6 + $plata_competencia7;
							
							
						/************************************************************************************
												SABER CUANTOS BRONCES
						*************************************************************************************/

						$bronces = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_habilidad WHERE premiacion= 'bronce' AND club = '$club' AND categorias = 'Mayores' AND evento = 'eEvento'";
						$result3 = $mysqli->query($bronces)  or die ($mysqli->error);
						$bronce = $result3->fetch_assoc();
						$bronce_competencia1 = $bronce['bronce'];

						$bronces1 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_fondo_puntos WHERE premiacion= 'bronce' AND club = '$club' AND categorias = 'Mayores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result33 = $mysqli->query($bronces1)  or die ($mysqli->error);
						$broncee = $result33->fetch_assoc();
						$bronce_competencia2 = $broncee['bronce'];
							
						$bronces2 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_velocidad WHERE premiacion= 'bronce' AND club = '$club' AND categorias = 'Mayores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result333 = $mysqli->query($bronces2)  or die ($mysqli->error);
						$bronceee = $result333->fetch_assoc();
						$bronce_competencia3 = $bronceee['bronce'];
							
						$bronces3 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_fondo_eliminacion WHERE premiacion= 'bronce' AND club = '$club' AND categorias = 'Mayores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result3333 = $mysqli->query($bronces3)  or die ($mysqli->error);
						$bronceeee = $result3333->fetch_assoc();
						$bronce_competencia4 = $bronceeee['bronce'];
							
						$bronces4 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_fondo_puntos_eliminacion WHERE premiacion= 'bronce' AND club = '$club' AND categorias = 'Mayores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result33333 = $mysqli->query($bronces4)  or die ($mysqli->error);
						$bronceeeee = $result33333->fetch_assoc();
						$bronce_competencia5 = $bronceeeee['bronce'];
							
						$bronces5 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_libre WHERE premiacion= 'bronce' AND club = '$club' AND categorias = 'Mayores' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result333333 = $mysqli->query($bronces5)  or die ($mysqli->error);
						$bronceeeeee = $result333333->fetch_assoc();
						$bronce_competencia6 = $bronceeeeee['bronce'];
							
						$bronces6 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_carriles WHERE premiacion_final= 'bronce' AND club = '$club' AND categoria = 'Mayores' AND nombre_evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result3333333 = $mysqli->query($bronces6)  or die ($mysqli->error);
						$bronceeeeeee = $result3333333->fetch_assoc();
						$bronce_competencia7 = $bronceeeeeee['bronce'];

						$bronces_totales = $bronce_competencia1 + $bronce_competencia2 + $bronce_competencia3 + $bronce_competencia4 + $bronce_competencia5 + $bronce_competencia6 + $bronce_competencia7;
							
						$medallas = $bronces_totales + $platas_totales + $oros_totales;
	
				?>
					<tr>
						<td><center></center></td>
						<td><?php echo $club ?></td>
						<td><center><?php echo $oros_totales ?></center></td>
						<td><center><?php echo $platas_totales ?></center></td>
						<td><center><?php echo $bronces_totales ?></center></td>
						<td><center><?php echo $medallas ?></center></td>
					</tr>
				<?php
					$No +=1;
						}

				?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>Posición</center></th>
				<th><center>Club</center></th>
				<th><center>Oros</center></th>
				<th><center>Platas</center></th>
				<th><center>Bronces</center></th>
				<th><center>Total</center></th>
			</tr>
		</tfoot>
	</table>
</div><?php
}else if($categoria==0){?>
	<div class="tabla">
	<table class="table table-hover table-striped table-bordered" id="idDataTable"><!--table table-hover table-condensed table-bordered-->
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
			<tr>
				<th class="th-sm"><center>Posición</center></th>
				<th class="th-sm"><center>Club</center></th>
				<th class="th-sm"><center>Oro</center></th>
				<th class="th-sm"><center>Plata</center></th>
				<th class="th-sm"><center>Bronce</center></th>
				<th class="th-sm"><center>Total</center></th>
			</tr>
		</thead>

		<tbody>
				<?php
						$No=1;
						$sql="SELECT * FROM inscripcion_evento_clubes WHERE evento = '$evento'";
						$resultado=$mysqli->query($sql) or die ($mysqli->error);
						while($row=$resultado->fetch_assoc()){
						$club = $row['club'];
							
						/************************************************************************************
												SABER CUANTOS OROS
						*************************************************************************************/
						$oros = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_habilidad WHERE premiacion= 'oro' AND club = '$club' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result1 = $mysqli->query($oros)  or die($mysqli->error);
						$oro = $result1->fetch_assoc();
						$oro_competencia1 = $oro['oros'];
							
						$oros1 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_fondo_puntos WHERE premiacion= 'oro' AND club = '$club' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result11 = $mysqli->query($oros1)  or die($mysqli->error);
						$oroo = $result11->fetch_assoc();
						$oro_competencia2 = $oroo['oros'];
							
						$oros2 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_velocidad WHERE premiacion= 'oro' AND club = '$club' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result111 = $mysqli->query($oros2)  or die($mysqli->error);
						$orooo = $result111->fetch_assoc();
						$oro_competencia3 = $orooo['oros'];
							
						$oros3 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_fondo_eliminacion WHERE premiacion= 'oro' AND club = '$club' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result1111 = $mysqli->query($oros3)  or die($mysqli->error);
						$oroooo = $result1111->fetch_assoc();
						$oro_competencia4 = $oroooo['oros'];
							
						$oros4 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_fondo_puntos_eliminacion WHERE premiacion= 'oro' AND club = '$club' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result11111 = $mysqli->query($oros4)  or die($mysqli->error);
						$orooooo = $result11111->fetch_assoc();
						$oro_competencia5 = $orooooo['oros'];
							
						$oros5 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_libre WHERE premiacion= 'oro' AND club = '$club' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result111111 = $mysqli->query($oros5)  or die($mysqli->error);
						$oroooooo = $result111111->fetch_assoc();
						$oro_competencia6 = $oroooooo['oros'];
							
						$oros6 = "SELECT COUNT(*) oros FROM resultados_eventos_competencia_carriles WHERE premiacion_final= 'oro' AND club = '$club' AND nombre_evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result1111111 = $mysqli->query($oros6)  or die($mysqli->error);
						$orooooooo = $result1111111->fetch_assoc();
						$oro_competencia7 = $orooooooo['oros'];

						$oros_totales = $oro_competencia1 + $oro_competencia2 + $oro_competencia3 + $oro_competencia4 + $oro_competencia5 + $oro_competencia6 + $oro_competencia7;
							
							
							
						/************************************************************************************
												SABER CUANTAS PLATAS
						*************************************************************************************/
							
						$platas = "SELECT COUNT(*)  plata FROM resultados_eventos_competencia_habilidad WHERE premiacion= 'plata' AND club = '$club' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result2 = $mysqli->query($platas)  or die ($mysqli->error);
						$plata = $result2->fetch_assoc();
						$plata_competencia1 = $plata['plata'];

						$platas1 = "SELECT COUNT(*) plata FROM resultados_eventos_competencia_fondo_puntos WHERE premiacion= 'plata' AND club = '$club' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result22 = $mysqli->query($platas1)  or die ($mysqli->error);
						$plataa = $result22->fetch_assoc();
						$plata_competencia2 = $plataa['plata'];
							
						$platas2 = "SELECT COUNT(*) plata FROM resultados_eventos_competencia_velocidad WHERE premiacion= 'plata' AND club = '$club' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result222 = $mysqli->query($platas2)  or die ($mysqli->error);
						$plataaa = $result222->fetch_assoc();
						$plata_competencia3 = $plataaa['plata'];
							
						$platas3 = "SELECT COUNT(*) plata FROM resultados_eventos_competencia_fondo_eliminacion WHERE premiacion= 'plata' AND club = '$club' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result2222 = $mysqli->query($platas3)  or die ($mysqli->error);
						$plataaaa = $result2222->fetch_assoc();
						$plata_competencia4 = $plataaaa['plata'];
							
						$platas4 = "SELECT COUNT(*) plata FROM resultados_eventos_competencia_fondo_puntos_eliminacion WHERE premiacion= 'plata' AND club = '$club' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result22222 = $mysqli->query($platas4)  or die ($mysqli->error);
						$plataaaaa = $result22222->fetch_assoc();
						$plata_competencia5 = $plataaaaa['plata'];
							
						$platas5 = "SELECT COUNT(*) plata FROM resultados_eventos_competencia_libre WHERE premiacion= 'plata' AND club = '$club' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result222222 = $mysqli->query($platas5)  or die ($mysqli->error);
						$plataaaaaa = $result222222->fetch_assoc();
						$plata_competencia6 = $plataaaaaa['plata'];
							
						$platas6 = "SELECT COUNT(*) plata FROM resultados_eventos_competencia_carriles WHERE premiacion_final= 'plata' AND club = '$club' AND nombre_evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result2222222 = $mysqli->query($platas6)  or die ($mysqli->error);
						$plataaaaaaa = $result2222222->fetch_assoc();
						$plata_competencia7 = $plataaaaaaa['plata'];

						$platas_totales = $plata_competencia1 + $plata_competencia2 + $plata_competencia3 + $plata_competencia4 + $plata_competencia5 + $plata_competencia6 + $plata_competencia7;
							
						/************************************************************************************
												SABER CUANTOS BRONCES
						*************************************************************************************/

						$bronces = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_habilidad WHERE premiacion= 'bronce' AND club = '$club' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result3 = $mysqli->query($bronces)  or die ($mysqli->error);
						$bronce = $result3->fetch_assoc();
						$bronce_competencia1 = $bronce['bronce'];

						$bronces1 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_fondo_puntos WHERE premiacion= 'bronce' AND club = '$club' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result33 = $mysqli->query($bronces1)  or die ($mysqli->error);
						$broncee = $result33->fetch_assoc();
						$bronce_competencia2 = $broncee['bronce'];
							
						$bronces2 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_velocidad WHERE premiacion= 'bronce' AND club = '$club' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result333 = $mysqli->query($bronces2)  or die ($mysqli->error);
						$bronceee = $result333->fetch_assoc();
						$bronce_competencia3 = $bronceee['bronce'];
							
						$bronces3 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_fondo_eliminacion WHERE premiacion= 'bronce' AND club = '$club' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result3333 = $mysqli->query($bronces3)  or die ($mysqli->error);
						$bronceeee = $result3333->fetch_assoc();
						$bronce_competencia4 = $bronceeee['bronce'];
							
						$bronces4 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_fondo_puntos_eliminacion WHERE premiacion= 'bronce' AND club = '$club' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result33333 = $mysqli->query($bronces4)  or die ($mysqli->error);
						$bronceeeee = $result33333->fetch_assoc();
						$bronce_competencia5 = $bronceeeee['bronce'];
							
						$bronces5 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_libre WHERE premiacion= 'bronce' AND club = '$club' AND evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result333333 = $mysqli->query($bronces5)  or die ($mysqli->error);
						$bronceeeeee = $result333333->fetch_assoc();
						$bronce_competencia6 = $bronceeeeee['bronce'];
							
						$bronces6 = "SELECT COUNT(*)  bronce FROM resultados_eventos_competencia_carriles WHERE premiacion_final= 'bronce' AND club = '$club' AND nombre_evento = '$evento' AND tipo_patin = 'Profesional Avanzado'";
						$result3333333 = $mysqli->query($bronces6)  or die ($mysqli->error);
						$bronceeeeeee = $result3333333->fetch_assoc();
						$bronce_competencia7 = $bronceeeeeee['bronce'];

						$bronces_totales = $bronce_competencia1 + $bronce_competencia2 + $bronce_competencia3 + $bronce_competencia4 + $bronce_competencia5 + $bronce_competencia6 + $bronce_competencia7;
							
						$medallas = $bronces_totales + $platas_totales + $oros_totales;
							
							

				?>
					<tr>
						<td><center></center></td>
						<td><?php echo $club ?></td>
						<td><center><?php echo $oros_totales ?></center></td>
						<td><center><?php echo $platas_totales ?></center></td>
						<td><center><?php echo $bronces_totales ?></center></td>
						<td><center><?php echo $medallas ?></center></td>
					</tr>
				<?php
					$No +=1;
						}

				?>
		</tbody>
		
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>Posición</center></th>
				<th><center>Club</center></th>
				<th><center>Oros</center></th>
				<th><center>Platas</center></th>
				<th><center>Bronces</center></th>
				<th><center>Total</center></th>
			</tr>
		</tfoot>
	</table>
</div>
<?php
}
?>

<script type="text/javascript">
	$(document).ready(function() {
	var t = $('#idDataTable').DataTable({
			"order": [[ 2, "desc" ]],
			 "columnDefs": [
    { "orderData": [ 2, 3, 4 ],    "targets": 2 },
  ],
		
		/*"order": [[ 2, "desc" ]],
			 "columnDefs": [
    { "orderData": [ 2, 4 ],    "targets": 2 },
    { "orderData": 4,           "targets": 4 },
    { "orderData": [ 3, 2 ], "targets": 3 }
  ]*/
		
		/*
		"order": [[ 2, "desc" ]],
			 "columnDefs": [
    { "orderData": [ 2, 3, 4 ],    "targets": 2 },
    { "orderData": 4,           "targets": 4 },
    { "orderData": [ 3, 4 ], "targets": 3 }
  ],
		*/
		
		
		 dom: 'Bfrtip',
			lengthChange: false,
			buttons: [
				{
					extend:		'copyHtml5',
					text:		'<i class="fa fa-files-o"></i>',
					//text:		'<i class="far fa-copy"></i>',
					titleAttr:	'Copiar Tabla',
					//title:		'Listado evento: '+evento,
				},
				{
					extend:		'excelHtml5',
					text:		'<i class="fa fa-file-excel-o"></i>',
					titleAttr:	'Exportar a Excel',
					className:	'btn btn-success',
					//title:		'Listado evento: '+evento,
				},
				{
					extend:		'pdfHtml5',
					text:		'<i class="fa fa-file-pdf-o"></i>',
					titleAttr:	'Exportar a PDF',
					className:	'btn btn-danger',
					//title:		'Listado evento: '+evento,
				},
				{
					extend:		'print',
					text:		'<i class="fa fa-print"></i>',
					titleAttr:	'Imprimir Tabla',
					className:	'btn btn-warning',
					//title:		'Listado evento: '+evento,
				}
			],
			language:{
    			"sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                //"sEmptyTable":     "Ningún dato disponible en esta tabla =(",
				"sEmptyTable":     "No se encontraron resultados; Si no ha seleccionado una categoria por favor seleccionela.",
                "sInfo":           "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
					"sSortDescending": ": Activar para ordenar la columna de manera descendente",
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "excel": "Excel",
                    "csv": "CSV",
                    "pdf": "PDF",
                    "print": "Imprimir",
                    "colvis": "Visibilidad",
					copyTitle: 'Copiar al portapapeles',
                	copySuccess: {
						_: 'Copió %d filas al portapapeles',
						1: 'Copió 1 filas al portapapeles'
					}
                }
			}
			
		});
		t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
		
	});
</script>


