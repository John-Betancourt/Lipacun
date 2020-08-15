function hideOtros(option){
	if(option==1101 ||option=="Otro"){
		$('.Departamento').show()
	}else{
		$('.Departamento').hide()
	}
}

function hideDepartamento(option){
	$('#ocultar').show();
	if(option==11 || option=="Bogotá D.C"){
		$('.ciudad1').show();
		$('.Ciudad').hide();
	}else{
	
		$('.Ciudad').show();
		$('.ciudad1').hide();
		dato = (option);
			$.ajax({
				data: {"dato" : dato},
				url: "../Interdepartamentales/obtener_ciudad.php",
				type: "post",
				success: function (data) {
					//alert(response);
					$("#Ciudad").html(data);
				}
			});
	}
}

function hideReconocimiento(option){
	if(option==1 ||option=="Si"){
		$('.Reconocimiento').show()
	}else{
		$('.Reconocimiento').hide()
	}
}

function calcular(value){
	let fecha = (value); //Fecha reconocimiento
	vec = fecha.split('-'); // Parsea y pasa a un vector
    var fecha1 = new Date(vec[0], vec[1], vec[2]); // crea el Date
    fecha1.setFullYear(fecha1.getFullYear()+5); // Hace el cálculo // Fecha de vencimiento
	//cantdias = new Date(fecha1.getFullYear(),fecha1.getMonth(), 0).getDate();//cantidad de dias del mes
	
	suma = fecha1.getDate()+'-'+fecha1.getMonth()+'-'+fecha1.getFullYear(); // carga el resultado en formato fecha
	
	var hoy = new Date(); //fecha actual
    var mil1 = hoy.getTime(); //se convierte a milisegundos la fecha actual
    var mil2 = fecha1.getTime(); //se convierte a milisegundos la fecha de vencimiento
    var dias = Math.round((mil2-mil1)/86400000); //se resta la fecha de vencimiento con la fecha actual
	var diasf = dias - 30; //se restan 30 dias

	if(diasf <= 0){
		alert("NO PUEDE continuar con su registro porque su reconocimiento deportivo venció el " + suma + " por favor RENUEVELO pronto y vuelva a registrarse.");
	}else if (diasf <= 365){
		alert("su reconocimiento deportivo VENCE en " + diasf + " dias, por favor RENUEVELO pronto.");
	}
}
