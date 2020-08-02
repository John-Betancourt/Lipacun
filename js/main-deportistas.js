function hidePatin(option){
	if(option=="3"){
		$('.Ligado').show()
	}else{
		$('.Ligado').hide()
	}
}

function hideLigado(option){
	if(option=="1"){
    $('.Cundinamarca').show()
  }else{
    $('.Cundinamarca').hide()
    alert("Al momento de un evento el deportista debe estar ligado")
  }
}

function Identificacion(option){
	if(option==""){
    $('.Nacimiento').hide();
	$('.Nacimiento1').show();
  }else{
    $('.Nacimiento1').hide();
	$('.Nacimiento').show();
	
	dato = (option);
	$.ajax({
		data: {"dato" : dato},
		url: "../procesos/Fecha_Nacimiento.php",
		type: "post",
		success: function (data) {
			//alert(data);
			$("#Fecha_Nacimiento").html(data);
		}
	});
  }
}

function FechaNacimiento(value) {
   let fecha = (value); //Fecha reconocimiento
	vec = fecha.split('-'); // Parsea y pasa a un vector
    var fecha1 = new Date(vec[0], vec[1], vec[2]); // crea el Date
	
	var hoy = new Date(); //fecha actual
    var mil1 = hoy.getTime(); //se convierte a milisegundos la fecha actual
    var mil2 = fecha1.getTime(); //se convierte a milisegundos la fecha de nacimiento
    var dias = Math.round((mil1-mil2)/86400000); //se resta la fecha de vencimiento con la fecha actual
	//var diasf = dias; //se restan 30 dias
	edad = Math.floor((dias + 25) / 365);
	$('.Patin1').hide();
	dato = edad;
	$.ajax({
		data: {"dato" : dato},
		url: "../procesos/Tipo_Patin.php",
		type: "post",
		success: function (data) {
			//alert(data);
			$("#Tipo_Patin").html(data);
		}
	});
	if(edad > 4 ){
		document.getElementById('edad').value = edad;
	} else{
		document.getElementById('edad').value = "";
	alert("Lo sentimos, para poder inscribirse al evento tiene que ser MAYOR de 4 años.");
	}
}