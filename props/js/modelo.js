function validarFormulario(){

	var modelo = document.getElementById('modelo').value;
	var marca = document.getElementById('marca').selectedIndex;

	if (modelo.length == 0){

		document.getElementById("modelo").style.boxShadow = '0 0 15px red';
		return false;
	}else{

		document.getElementById("modelo").style.boxShadow = '0 0 15px #2BFF15';
	}

	if (modelo.length > 40){
		document.getElementById("modelo").style.boxShadow = '0 0 15px red'; 
		document.getElementById("modelo").value = "";
		document.getElementById("modelo").placeholder = "Longitud Maxima: 50"; 
		return false;
	}else{
		document.getElementById("modelo").style.boxShadow = '0 0 15px #2BFF15';
	}

	if(marca == 0){
		document.getElementById("marca").style.boxShadow = '0 0 15px red'; 
		return false;
	}else{
		document.getElementById("marca").style.boxShadow = '0 0 15px green';
	}

	return true;

}//cierre function