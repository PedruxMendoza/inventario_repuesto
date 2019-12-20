function validar(){

	var dui_persona        =document.getElementById('dui_persona').selectedIndex;
	var telefono = document.getElementById('telefono').value;
	var correo = document.getElementById('correo').value;

	if(dui_persona == 0){
		document.getElementById("dui_persona").style.boxShadow = '0 0 15px red'; 
		return false;
	}else{
		document.getElementById("dui_persona").style.boxShadow = '0 0 15px green';
	}//cierre else


	if(telefono.length == 0){
		document.getElementById("telefono").style.boxShadow = '0 0 25px red'; 
		return false;
	}else{
		document.getElementById("telefono").style.boxShadow = '0 0 25px green';
	}//aqui termina la validacion del telefono

	if(telefono.length == 9){
		document.getElementById("telefono").style.boxShadow = '0 0 25px green';

	}else{
		document.getElementById("telefono").style.boxShadow = '0 0 25px red'; 
		return false;
	}//aqui termina la validacion del telefono

	if(correo.length == 0){
		document.getElementById("correo").style.boxShadow = '0 0 25px red'; 
		return false;
	}else{
		document.getElementById("correo").style.boxShadow = '0 0 25px green';
	}//aqui termina la validacion del correo

	return true;

}