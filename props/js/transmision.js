function validar(){

	var tipo_transmision          =document.getElementById('tipo_transmision').value;

	if (tipo_transmision.length == 0){

		document.getElementById("tipo_transmision").style.boxShadow = '0 0 15px red';
		return false;
	}else{

		document.getElementById("tipo_transmision").style.boxShadow = '0 0 15px #2BFF15';
	}

	if (tipo_transmision.length > 40){
		document.getElementById("tipo_transmision").style.boxShadow = '0 0 15px red'; 
		document.getElementById("tipo_transmision").value = "";
		document.getElementById("tipo_transmision").placeholder = "Longitud Maxima: 50"; 
		return false;
	}else{
		document.getElementById("tipo_transmision").style.boxShadow = '0 0 15px #2BFF15';
	}

	return true;
}