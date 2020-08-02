function LlenarTablaListados(evento){
	Competencia = $("#competencia").val();
	if(Competencia=="Velocidad"){
		$('.TipoComp1').hide();
		$('.TipoComp2').show();
	}else{
		$('.TipoComp2').hide();
		$('.TipoComp1').show();
	}
	
	patin=$('#Patin').val();
	Cat=$('#ListaCategoria').val();
	idRama=$('#ListaRama').val();
	sql_rama="";
	if(idRama==1){
		sql_rama=" AND rama = 'Damas' ";
	}else if(idRama == 2){
		sql_rama=" AND rama = 'Varones' ";
	}
	sql_patin="";
	if(patin=="Semiprofesional"){
		sql_patin=" AND tipo_patin = 'Semiprofesional' ";
	}else if(patin=="Profesional No Avanzado"){
		sql_patin=" AND tipo_patin = 'Profesional No Avanzado' ";
	}else if(patin=="Profesional Avanzado"){
		sql_patin=" AND tipo_patin = 'Profesional Avanzado' ";
	}
	if(TipoEvento=="Ranking"){
		NombreTabla="inscripcion_deportistas_eventos_ranking";
	}else if(TipoEvento=="Escuelas"){
		NombreTabla="inscripcion_deportistas_eventos_escuelas";
	}
	if(Cat==0){
		sql_cat="";
	}else{
		sql_cat=" AND categoria= '"+ Cat +"' ";
	}
	var cadenas="SELECT * FROM "+ NombreTabla +"  WHERE evento = '"+ evento +"' "+ sql_cat +" "+ sql_rama +" "+ sql_patin +" ORDER BY club";
	
	$.ajax({
		type: "POST",
		url: "Tabla_Listados.php",
		data: {"sql" : cadenas},
		success:function(r){      
			$('#tabla_listados').html(r);
		}
	});
}

function LlenarTabla(){
	var cadenas = $('#Listado').val();		
	var comp = $('#Competencia').val();
	
	$.ajax({
		type: "POST",
		url:"Tabla.php",
		data: {"comp" : comp, "sql" : cadenas},
		success:function(r){      
			$('#tabla').html(r);
		},
		error:function(r){
			alert("Error al cargar: "+r);
		}
	});

}

function LlenarResult(evento){
	var idcategorias = $('#categorias').val();
	var id_tipo_patin = $('#tipo_patin').val();
	
	if(id_tipo_patin==1){
		$.ajax({
			type: "POST",
			url: "Tabla_Clubes_Semiprofesional.php",
			data: {"tipo_cat" : idcategorias, "evento" : evento},
			success:function(r){
				$('#tabla_result').html(r);
			},
			error:function(r){
				alert("Error al cargar: "+r);
			}
		});
	}else if(id_tipo_patin==2){
		$.ajax({
			type: "POST",
			url: "Tabla_Clubes_Profesional_No_Avanzado.php",
			data: {"tipo_cat" : idcategorias, "evento" : evento},
			success:function(r){
				$('#tabla_result').html(r);
			},
			error:function(r){
				alert("Error al cargar: "+r);
			}
		});
	}else if(id_tipo_patin==3){
		$.ajax({
			type: "POST",
			url: "Tabla_Clubes_Profesional_Avanzado.php",
			data: {"tipo_cat" : idcategorias, "evento" : evento},
			success:function(r){
				$('#tabla_result').html(r);
			},
			error:function(r){
				alert("Error al cargar: "+r);
			}
		});
	}
}