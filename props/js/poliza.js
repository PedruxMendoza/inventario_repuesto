
function validarpoliza(){

	var id_poliza2 = document.getElementById("id_poliza2").value;
	var nombre_contenedor = document.getElementById("nombre_contenedor").selectedIndex;
	var cantidad = document.getElementById("cantidad").value;
	var peso = document.getElementById("peso").value;
	var doc_transporte = document.getElementById("doc_transporte").value;

	
	if(id_poliza2.length == 0){

		document.getElementById("id_poliza2").style.boxShadow = '0 0 15px red'; 
		document.getElementById("id_poliza2").placeholder = "Este campo es obligatorio";   
		return false;
	}else{
		document.getElementById("id_poliza2").style.boxShadow = '0 0 15px green';
	}

	if(id_poliza2 < 0){

		document.getElementById("id_poliza2").style.boxShadow = '0 0 15px red'; 
		document.getElementById("id_poliza2").value = "";
		document.getElementById("id_poliza2").placeholder = "Solo Permite Numeros Positivos"; 
		return false;
	}else{
		document.getElementById("id_poliza2").style.boxShadow = '0 0 15px green';

	}

	if(nombre_contenedor == 0){
		document.getElementById("nombre_contenedor").style.boxShadow = '0 0 15px red'; 
		return false;
	}else{
		document.getElementById("nombre_contenedor").style.boxShadow = '0 0 15px green';
	}

	if(cantidad.length == 0){

		document.getElementById("cantidad").style.boxShadow = '0 0 15px red'; 
		return false;
	}else{
		document.getElementById("cantidad").style.boxShadow = '0 0 15px green';
	}

	if(cantidad < 0){

		document.getElementById("cantidad").style.boxShadow = '0 0 15px red'; 
		document.getElementById("cantidad").value = "";
		document.getElementById("cantidad").placeholder = "Solo Permite Numeros Positivos"; 
		return false;
	}else{
		document.getElementById("cantidad").style.boxShadow = '0 0 15px green';

	}


	if(peso.length == 0){

		document.getElementById("peso").style.boxShadow = '0 0 15px red'; 
		return false;
	}else{
		document.getElementById("peso").style.boxShadow = '0 0 15px green';
	}

	if(peso < 0){

		document.getElementById("peso").style.boxShadow = '0 0 15px red'; 
		document.getElementById("peso").value = "";
		document.getElementById("peso").placeholder = "Solo Permite Numeros Positivos"; 
		return false;
	}else{
		document.getElementById("peso").style.boxShadow = '0 0 15px green';

	}

	if(doc_transporte.length == 0){
		document.getElementById("doc_transporte").style.boxShadow = '0 0 15px red'; 
		return false;
	}else{
		document.getElementById("doc_transporte").style.boxShadow = '0 0 15px green';
	}

	if(doc_transporte.length >50){
		document.getElementById("doc_transporte").style.boxShadow = '0 0 15px red';
		document.getElementById("doc_transporte").value = "";
		document.getElementById("doc_transporte").placeholder = "El Maximo es de 50 caracteres";

		return false;  

	}else{

		document.getElementById("doc_transporte").style.boxShadow = '0 0 15px green';

	}

	return true;

}