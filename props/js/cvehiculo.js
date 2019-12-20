function validar(){

	var nombre_clase          =document.getElementById('nombre_clase').value;

	if (nombre_clase.length == 0){

		document.getElementById("nombre_clase").style.boxShadow = '0 0 15px red';
		return false;
	}else{

		document.getElementById("nombre_clase").style.boxShadow = '0 0 15px #2BFF15';
	}

	if (nombre_clase.length > 40){
		document.getElementById("nombre_clase").style.boxShadow = '0 0 15px red'; 
		document.getElementById("nombre_clase").value = "";
		document.getElementById("nombre_clase").placeholder = "Longitud Maxima: 50"; 
		return false;
	}else{
		document.getElementById("nombre_clase").style.boxShadow = '0 0 15px #2BFF15';
	}

	return true;
}