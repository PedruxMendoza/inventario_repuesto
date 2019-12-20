function validar(){

	var addpieza = document.getElementById('addpieza').selectedIndex;
	var addcantidad = document.getElementById('addcantidad').value;

	if(addpieza == 0){
		document.getElementById("addpieza").style.boxShadow = '0 0 25px red';
		return false;
	}else{
		document.getElementById("addpieza").style.boxShadow = '0 0 0px green';

	}

	if(addcantidad.length == 0){

		document.getElementById("addcantidad").style.boxShadow = '0 0 15px red'; 
		document.getElementById("addcantidad").placeholder = "Este campo es obligatorio";
		return false;
	}else{
		document.getElementById("addcantidad").style.boxShadow = '0 0 0px green';
	}//cierre else

	if(addcantidad < 0){

		document.getElementById("addcantidad").style.boxShadow = '0 0 15px red';
		document.getElementById("addcantidad").value = ""; 
		document.getElementById("addcantidad").placeholder = "Solo se permiten numeros positivos";
		return false;   
	}else{

		document.getElementById("addcantidad").style.boxShadow = '0 0 0px green';		
	}

	return true;


}

function validar2(){

	var dui = document.getElementById('dui').selectedIndex;
	var usuario = document.getElementById('usuario').selectedIndex;
	var factura = document.getElementById('factura').value;

	if(dui == 0){
		document.getElementById("dui").style.boxShadow = '0 0 25px red';
		return false;
	}else{
		document.getElementById("dui").style.boxShadow = '0 0 0px green';

	}

	if(usuario == 0){
		document.getElementById("usuario").style.boxShadow = '0 0 25px red';
		return false;
	}else{
		document.getElementById("usuario").style.boxShadow = '0 0 0px green';

	}	

	if(factura.length == 0){

		document.getElementById("factura").style.boxShadow = '0 0 15px red'; 
		document.getElementById("factura").placeholder = "Este campo es obligatorio";
		return false;
	}else{
		document.getElementById("factura").style.boxShadow = '0 0 0px green';
	}//cierre else

	if(factura.length == 8){
		document.getElementById("factura").style.boxShadow = '0 0 0px green';
 
	}else{

		document.getElementById("factura").style.boxShadow = '0 0 15px red';
		document.getElementById("factura").value = ""; 
		document.getElementById("factura").placeholder = "Longitud Permitida: 8";
		return false;  		
	}

	return true;


}