function validarformulario(){


	var nombre_pieza = document.getElementById('nombre_pieza').value;
	var categoria = document.getElementById('categoria').selectedIndex;

	if(nombre_pieza.length == 0){
		document.getElementById("nombre_pieza").style.boxShadow = '0 0 15px red'; 
		document.getElementById("nombre_pieza").placeholder = "Este campo es obligatorio";   
		return false;
	}else{
		document.getElementById("nombre_pieza").style.boxShadow = '0 0 0px green';
	}

	if(nombre_pieza.length >50){
		document.getElementById("nombre_pieza").style.boxShadow = '0 0 15px red';
		document.getElementById("nombre_pieza").value = "";
		document.getElementById("nombre_pieza").placeholder = "El Maximo es de 50 caracteres";

		return false;  

	}else{

		document.getElementById("nombre_pieza").style.boxShadow = '0 0 15px green';

	}

	if(categoria == 0){
		document.getElementById("categoria").style.boxShadow = '0 0 15px red'; 
		return false;
	}else{
		document.getElementById("categoria").style.boxShadow = '0 0 0px green';
	}

	return true;

}//cierre  de validacion validarformulario
