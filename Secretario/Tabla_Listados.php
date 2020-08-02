<?php
require('../clases/conexion_db.php');
session_start();
//error_reporting(0);

if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>2){
	header("location: ../Administrador/Login.php");
}
?>

<div class="tabla">
	<table class="table table-hover table-striped table-bordered" id="idDataTable" data-page-length="25"><!--table table-hover table-condensed table-bordered-->
		<thead style="background-color: #007bff; color: white; font-weight: bold;">
			<tr>
				<th class="th-sm"><center>No.</center></th>
				<th class="th-sm"><center>Nombres y Apellidos Deportista</center></th>
				<th class="th-sm"><center>Club Deportista</center></th>
			</tr>
		</thead>
		<tbody>
		<?php
			$sql=$_POST['sql'];
			$resultado=$mysqli->query($sql);
			$_SESSION['codigo_sql'] = $sql;

			while($row=mysqli_fetch_array($resultado) ){
				$datos=$row['nombres']."||".$row['apellidos']."||".$row['club'];
		?>
			<tr>
				<td><center><?php echo $row['numero_deportista'] ?></center></td>
				<td><?php echo $row['nombres'].' '.$row['apellidos']; ?></td>
				<td><center><?php echo $row['club'] ?></center></td>
			</tr>
		<?php
			}
		?>
		</tbody>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<th><center>No.</center></th>
				<th><center>Nombres y Apellidos Deportista</center></th>
				<th><center>Club Deportista</center></th>
			</tr>
		</tfoot>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var printCounter = 0;
		
		// Append a caption to the table before the DataTables initialisation
    	//$('#idDataTable').append('<caption style="caption-side: bottom">A fictional company\'s staff table.</caption>');
		
		$('#idDataTable').DataTable({
			dom: 'Bfrtip',
			lengthChange: false,
			buttons: [
				{
					extend:		'copyHtml5',
					text:		'<i class="fa fa-files-o"></i>',
					//text:		'<i class="far fa-copy"></i>',
					titleAttr:	'Copiar Tabla',
					title:		'Listado evento: '+evento,
					messageTop: function Titulo(){
						var Competencia = $("#competencia").val();
						var TipoComp = $("#tipoComp").val();
						var Patin = $('#Patin').val();
						idRama = $('#ListaRama').val();
						var Rama = "";
						if(idRama == 0){
							var Rama = '';
						}else if(idRama == 1){
							var Rama = 'Damas';
						}else if(idRama == 2){
							var Rama = 'Varones';
						}
						Cat = $('#ListaCategoria').val();
						var Categoria = "";
						if(Cat == 0){
							var Categoria = '';
						}else if(Cat == "A"){
							var Categoria = '5 y 6 años';
						}else if(Cat == "B"){
							var Categoria = '7 y 8 años';
						}else if(Cat == "C"){
							var Categoria = '9 y 10 años';
						}else if(Cat == "D"){
							var Categoria = '11 y 12 años';
						}else if(Cat == "E"){
							var Categoria = '13 y 14 años';
						}else if(Cat == "F"){
							var Categoria = '15 +';
						}    

						var mensaje = Competencia + ' ' + TipoComp + '  ' + Patin + '  ' + Rama + ' ' + Categoria ;
						$('#Listado').val(mensaje);
						return mensaje ;
					},
					//messageBottom:	'LIPACUN | Copyright © 2020 Todos los derechos reservados | By Brian y John',
					
				},
				{
					extend:		'excelHtml5',
					text:		'<i class="fa fa-file-excel-o"></i>',
					titleAttr:	'Exportar a Excel',
					className:	'btn btn-success',
					title:		'Listado evento: '+evento,
					messageTop: function Titulo(){
						var Competencia = $("#competencia").val();
						var TipoComp = $("#tipoComp").val();
						var Patin = $('#Patin').val();
						idRama = $('#ListaRama').val();
						var Rama = "";
						if(idRama == 0){
							var Rama = '';
						}else if(idRama == 1){
							var Rama = 'Damas';
						}else if(idRama == 2){
							var Rama = 'Varones';
						}
						Cat = $('#ListaCategoria').val();
						var Categoria = "";
						if(Cat == 0){
							var Categoria = '';
						}else if(Cat == "A"){
							var Categoria = '5 y 6 años';
						}else if(Cat == "B"){
							var Categoria = '7 y 8 años';
						}else if(Cat == "C"){
							var Categoria = '9 y 10 años';
						}else if(Cat == "D"){
							var Categoria = '11 y 12 años';
						}else if(Cat == "E"){
							var Categoria = '13 y 14 años';
						}else if(Cat == "F"){
							var Categoria = '15 +';
						}    

						var mensaje = Competencia + ' ' + TipoComp + '  ' + Patin + '  ' + Rama + ' ' + Categoria ;
						$('#Listado').val(mensaje);
						return mensaje ;
					},
					//messageBottom:	'LIPACUN | Copyright © 2020 Todos los derechos reservados | By Brian y John',
				},
				{
					extend:		'pdfHtml5',
					text:		'<i class="fa fa-file-pdf-o"></i>',
					titleAttr:	'Exportar a PDF',
					className:	'btn btn-danger',
					title:		'Listado evento: '+evento,
					messageTop: function Titulo(){
						var Competencia = $("#competencia").val();
						var TipoComp = $("#tipoComp").val();
						var Patin = $('#Patin').val();
						idRama = $('#ListaRama').val();
						var Rama = "";
						if(idRama == 0){
							var Rama = '';
						}else if(idRama == 1){
							var Rama = 'Damas';
						}else if(idRama == 2){
							var Rama = 'Varones';
						}
						Cat = $('#ListaCategoria').val();
						var Categoria = "";
						if(Cat == 0){
							var Categoria = '';
						}else if(Cat == "A"){
							var Categoria = '5 y 6 años';
						}else if(Cat == "B"){
							var Categoria = '7 y 8 años';
						}else if(Cat == "C"){
							var Categoria = '9 y 10 años';
						}else if(Cat == "D"){
							var Categoria = '11 y 12 años';
						}else if(Cat == "E"){
							var Categoria = '13 y 14 años';
						}else if(Cat == "F"){
							var Categoria = '15 +';
						}    

						var mensaje = Competencia + ' ' + TipoComp + '  ' + Patin + '  ' + Rama + ' ' + Categoria ;
						$('#Listado').val(mensaje);
						return mensaje ;
					},
					//messageBottom:	'LIPACUN | Copyright © 2020 Todos los derechos reservados | By Brian y John',
				},
				{
					extend:		'print',
					text:		'<i class="fa fa-print"></i>',
					titleAttr:	'Imprimir Tabla',
					className:	'btn btn-warning',
					title:		'Listado evento: '+evento,
					title:		'<center>Listado evento: ' + evento + '</center>',
					messageTop: function Titulo(){
						var Competencia = $("#competencia").val();
						var TipoComp = $("#tipoComp").val();
						var Patin = $('#Patin').val();
						idRama = $('#ListaRama').val();
						var Rama = "";
						if(idRama == 0){
							var Rama = '';
						}else if(idRama == 1){
							var Rama = 'Damas';
						}else if(idRama == 2){
							var Rama = 'Varones';
						}
						Cat = $('#ListaCategoria').val();
						var Categoria = "";
						if(Cat == 0){
							var Categoria = '';
						}else if(Cat == "A"){
							var Categoria = '5 y 6 años';
						}else if(Cat == "B"){
							var Categoria = '7 y 8 años';
						}else if(Cat == "C"){
							var Categoria = '9 y 10 años';
						}else if(Cat == "D"){
							var Categoria = '11 y 12 años';
						}else if(Cat == "E"){
							var Categoria = '13 y 14 años';
						}else if(Cat == "F"){
							var Categoria = '15 +';
						}    

						var mensaje = Competencia + ' ' + TipoComp + '  ' + Patin + '  ' + Rama + ' ' + Categoria ;
						$('#Listado').val(mensaje);
						return mensaje ;
					},
					/*messageTop: function () {
						printCounter++;

						if ( printCounter === 1 ) {
							return 'Esta es la primera vez que imprime este documento.';
						}
						else {
							return 'Ha impreso este documento '+printCounter+' veces';
						}
					},*/
					//messageBottom: '<center>LIPACUN | Copyright © 2020 Todos los derechos reservados | By Brian y John</center>',
				}
			],
			language:{
    			"sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "No se encontraron deportistas inscritos =(",
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
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
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
		table.buttons().container()
        .appendTo( '#idDataTable_wrapper .col-md-6:eq(0)' );
	});
</script>