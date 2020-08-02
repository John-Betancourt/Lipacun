function Alfanumerico(e) {
	key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);
    acepta="0123456789aábcdeéfghiíjklmnñoópqrstuúvwxyzAÁBCDEÉFGHIÍJKLMNÑOÓPQRSTUÚVWXYZ.- ";
    especiales="8-37-38-46";
    teclado_especial=false;
	
    for(var i in especiales){
		if(key==especiales[i]){
			teclado_especial=true;
        }
    }
    if(acepta.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
}

function Alfapostrofe(e) {
	key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);
    acepta="0123456789aábcdeéfghiíjklmnñoópqrstuúvwxyzAÁBCDEÉFGHIÍJKLMNÑOÓPQRSTUÚVWXYZ'-";
    especiales="8-37-38-46";
    teclado_especial=false;
	
    for(var i in especiales){
		if(key==especiales[i]){
			teclado_especial=true;
        }
    }
    if(acepta.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
}

function Letras(e) {
	key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);
    acepta="aábcdeéfghiíjklmnñoópqrstuúvwxyzAÁBCDEÉFGHIÍJKLMNÑOÓPQRSTUÚVWXYZ";
    especiales="8-37-38-46";
    teclado_especial=false;
	
    for(var i in especiales){
		if(key==especiales[i]){
			teclado_especial=true;
        }
    }
    if(acepta.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
}

function Alfabetico(e) {
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);
    acepta="aábcdeéfghiíjklmnñoópqrstuúvwxyzAÁBCDEÉFGHIÍJKLMNÑOÓPQRSTUÚVWXYZ ";
    especiales="8-37-38-46";
    teclado_especial=false;
    
    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial=true;
        }
    }
    if(acepta.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
}

function Numeros(e) {
	key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);
    acepta="0123456789";
    especiales="8-37-38-46";
    teclado_especial=false;

	for(var i in especiales){
		if(key==especiales[i]){
			teclado_especial=true;
        }
    }
	if(acepta.indexOf(teclado)==-1 && !teclado_especial){
		return false;
    }
}

function NumerosPuntos(e) {
	key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);
    acepta="0123456789.-";
    especiales="8-37-38-46";
    teclado_especial=false;

	for(var i in especiales){
		if(key==especiales[i]){
			teclado_especial=true;
        }
    }
	if(acepta.indexOf(teclado)==-1 && !teclado_especial){
		return false;
    }
}