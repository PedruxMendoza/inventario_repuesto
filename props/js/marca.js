function validarFormulario(){

	var marca = document.getElementById('marca').value;

	if (marca.length == 0){

		document.getElementById("marca").style.boxShadow = '0 0 15px red';
		return false;
	}else{

		document.getElementById("marca").style.boxShadow = '0 0 15px #2BFF15';
	}

	if (marca.length > 40){
		document.getElementById("marca").style.boxShadow = '0 0 15px red'; 
		document.getElementById("marca").value = "";
		document.getElementById("marca").placeholder = "Longitud Maxima: 50"; 
		return false;
	}else{
		document.getElementById("marca").style.boxShadow = '0 0 15px #2BFF15';
	}

	return true;

}//cierre de function