function validarcategoria(){

	var nombre_categoria = document.getElementById('nombre_categoria').value;

	if(nombre_categoria.length == 0){

		document.getElementById("nombre_categoria").style.boxShadow = '0 0 15px red'; 
		document.getElementById("nombre_categoria").placeholder = "Este campo es obligatorio";   
		return false;
	}else{
		document.getElementById("nombre_categoria").style.boxShadow = '0 0 0px green';
	}

	if(nombre_categoria.length >50){
		document.getElementById("nombre_categoria").style.boxShadow = '0 0 15px red';
		document.getElementById("nombre_categoria").value = "";
		document.getElementById("nombre_categoria").placeholder = "El Maximo es de 50 caracteres";

		return false;  

	}else{

		document.getElementById("nombre_categoria").style.boxShadow = '0 0 15px green';

	}

	return true;


}