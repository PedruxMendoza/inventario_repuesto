function validar(){

	var nombre_contenedor          =document.getElementById('nombre_contenedor').value;

	if (nombre_contenedor.length == 0){

		document.getElementById("nombre_contenedor").style.boxShadow = '0 0 15px red';
		return false;
	}else{

		document.getElementById("nombre_contenedor").style.boxShadow = '0 0 15px #2BFF15';
	}

	if (nombre_contenedor.length > 40){
		document.getElementById("nombre_contenedor").style.boxShadow = '0 0 15px red'; 
		document.getElementById("nombre_contenedor").value = "";
		document.getElementById("nombre_contenedor").placeholder = "Longitud Maxima: 50"; 
		return false;
	}else{
		document.getElementById("nombre_contenedor").style.boxShadow = '0 0 15px #2BFF15';
	}

	return true;
}