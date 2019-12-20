function validarFormulario(){

	var dui = document.getElementById('dui').value;
	var nombre1 = document.getElementById('nombre1').value;
	var nombre2 = document.getElementById('nombre2').value;
	var apellido1 = document.getElementById('apellido1').value;
	var apellido2 = document.getElementById('apellido2').value;
	var sexo = document.getElementById('sexo').selectedIndex;
	var telefono = document.getElementById('telefono').value;
	var direccion = document.getElementById('direccion').value;

	if(dui.length == 0){
		document.getElementById("dui").style.boxShadow = '0 0 25px red';
		alertify.notify('No ha ingresado DUI!', 'error',10, null);
		return false;
	}else{
		document.getElementById("dui").style.boxShadow = '0 0 25px green';
	}//aqui termina la validacion del dui

	if(nombre1.length == 0){
		document.getElementById("nombre1").style.boxShadow = '0 0 25px red';
		alertify.notify('No ha ingresado Nombre 1!', 'error',10, null);
		return false;
	}else{

		document.getElementById("nombre1").style.boxShadow = '0 0 25px green';

	}

	if (nombre1.length > 40){
		document.getElementById("nombre1").style.boxShadow = '0 0 15px red'; 
		document.getElementById("nombre1").value = "";
		document.getElementById("nombre1").placeholder = "Longitud Maxima: 50";
		alertify.notify('Longitud Maxima de Nombre 1: 50!', 'error',10, null);
		return false;
	}else{
		document.getElementById("nombre1").style.boxShadow = '0 0 15px #2BFF15';
	}//aqui termina la validacion del primer nombre

	if(nombre2.length == 0){
		document.getElementById("nombre2").style.boxShadow = '0 0 25px red';
		alertify.notify('No ha ingresado Nombre 2!', 'error',10, null);
		return false;
	}else{

		document.getElementById("nombre2").style.boxShadow = '0 0 25px green';

	}

	if (nombre2.length > 40){
		document.getElementById("nombre2").style.boxShadow = '0 0 15px red'; 
		document.getElementById("nombre2").value = "";
		document.getElementById("nombre2").placeholder = "Longitud Maxima: 50"; 
		alertify.notify('Longitud Maxima de Nombre 2: 50!', 'error',10, null);
		return false;
	}else{
		document.getElementById("nombre2").style.boxShadow = '0 0 15px #2BFF15';
	}//aqui termina la validacion del segundo nombre

	if(apellido1.length == 0){
		document.getElementById("apellido1").style.boxShadow = '0 0 25px red'; 
		alertify.notify('No ha ingresado Apellido 1!', 'error',10, null);
		return false;
	}else{

		document.getElementById("apellido1").style.boxShadow = '0 0 25px green';

	}

	if (apellido1.length > 40){
		document.getElementById("apellido1").style.boxShadow = '0 0 15px red'; 
		document.getElementById("apellido1").value = "";
		document.getElementById("apellido1").placeholder = "Longitud Maxima: 50";
		alertify.notify('Longitud Maxima de Apellido 1: 50!', 'error',10, null); 
		return false;
	}else{
		document.getElementById("apellido1").style.boxShadow = '0 0 15px #2BFF15';
	}//aqui termina la validacion del primer apellido

	if(apellido2.length == 0){
		document.getElementById("apellido2").style.boxShadow = '0 0 25px red';
		alertify.notify('No ha ingresado Apellido 2!', 'error',10, null);
		return false;
	}else{

		document.getElementById("apellido2").style.boxShadow = '0 0 25px green';

	}

	if (apellido2.length > 40){
		document.getElementById("apellido2").style.boxShadow = '0 0 15px red'; 
		document.getElementById("apellido2").value = "";
		document.getElementById("apellido2").placeholder = "Longitud Maxima: 50";
		alertify.notify('Longitud Maxima de Apellido 2: 50!', 'error',10, null); 
		return false;
	}else{
		document.getElementById("apellido2").style.boxShadow = '0 0 15px #2BFF15';
	}//aqui termina la validacion del segundo apellido

	if(sexo == 0){
		document.getElementById("sexo").style.boxShadow = '0 0 25px red';
		alertify.notify('No ha ingresado Sexo!', 'error',10, null);
		return false;
	}else{
		document.getElementById("sexo").style.boxShadow = '0 0 25px green';

	}//aqui termina la validacion del sexo

	if(telefono.length == 0){
		document.getElementById("telefono").style.boxShadow = '0 0 25px red';
		alertify.notify('No ha ingresado Telefono!', 'error',10, null);
		return false;
	}else{
		document.getElementById("telefono").style.boxShadow = '0 0 25px green';
	}//aqui termina la validacion del telefono

	if(telefono.length == 9){
		document.getElementById("telefono").style.boxShadow = '0 0 25px green';

	}else{
		document.getElementById("telefono").style.boxShadow = '0 0 25px red';
		alertify.notify('Longitud Permitida en Telefono: 9!', 'error',10, null);
		return false;
	}//aqui termina la validacion del telefono

	if(direccion.length == 0){
		document.getElementById("direccion").style.boxShadow = '0 0 25px red';
		alertify.notify('No ha ingresado Direccion!', 'error',10, null); 
		return false;
	}else{

		document.getElementById("direccion").style.boxShadow = '0 0 25px green';

	}

	if (direccion.length > 150){
		document.getElementById("direccion").style.boxShadow = '0 0 15px red'; 
		document.getElementById("direccion").value = "";
		document.getElementById("direccion").placeholder = "Longitud Maxima: 150";
		alertify.notify('Longitud Permitida en Direccion: 150!', 'error',10, null);
		return false;
	}else{
		document.getElementById("direccion").style.boxShadow = '0 0 15px #2BFF15';
	}//aqui termina la validacion de la direccion

	return true;

}//cieerre function validarFormulario