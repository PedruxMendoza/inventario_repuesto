function validar(){

	var nombre_tipo_motor          =document.getElementById('nombre_tipo_motor').value;

	if (nombre_tipo_motor.length == 0){

		document.getElementById("nombre_tipo_motor").style.boxShadow = '0 0 15px red';
		return false;
	}else{

		document.getElementById("nombre_tipo_motor").style.boxShadow = '0 0 15px #2BFF15';
	}

	if (nombre_tipo_motor.length > 40){
		document.getElementById("nombre_tipo_motor").style.boxShadow = '0 0 15px red'; 
		document.getElementById("nombre_tipo_motor").value = "";
		document.getElementById("nombre_tipo_motor").placeholder = "Longitud Maxima: 50"; 
		return false;
	}else{
		document.getElementById("nombre_tipo_motor").style.boxShadow = '0 0 15px #2BFF15';
	}

	return true;
}