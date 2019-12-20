function validar(){

	var proveedor = document.getElementById('proveedor').selectedIndex;
	var estado = document.getElementById('estado').selectedIndex;
	var num_comprobante = document.getElementById('num_comprobante').value;
	var total_compra = document.getElementById('total_compra').value;


	if(proveedor == 0){
		document.getElementById("proveedor").style.boxShadow = '0 0 25px red'; 
		return false;
	}else{
		document.getElementById("proveedor").style.boxShadow = '0 0 0px green';

	}//aqui termina la validacion del nombre_pieza

	if(estado == 0){
		document.getElementById("estado").style.boxShadow = '0 0 25px red'; 
		return false;
	}else{
		document.getElementById("estado").style.boxShadow = '0 0 0px green';

	}//aqui termina la validacion del nombre_marca

	if(num_comprobante.length == 0){

		document.getElementById("num_comprobante").style.boxShadow = '0 0 15px red'; 
		document.getElementById("num_comprobante").placeholder = "Ingrese el numero de comprobante";   
		return false;
	}else{
		document.getElementById("num_comprobante").style.boxShadow = '0 0 15px green';
	}//cierre else

	if(num_comprobante.length == 8){
		document.getElementById("num_comprobante").style.boxShadow = '0 0 0px green';	
 
	}else{

		document.getElementById("num_comprobante").style.boxShadow = '0 0 15px red';
		document.getElementById("num_comprobante").value = "";
		document.getElementById("num_comprobante").placeholder = "Longitud Permitida: 8";   
		return false;  		
	}

	if(total_compra.length == 0){

		document.getElementById("total_compra").style.boxShadow = '0 0 15px red'; 
		document.getElementById("total_compra").placeholder = "Ingrese el precio total de la compra";   
		return false;
	}else{
		document.getElementById("total_compra").style.boxShadow = '0 0 0px green';
	}//cierre else

	if(total_compra <= 0){

		document.getElementById("total_compra").style.boxShadow = '0 0 15px red';
		document.getElementById("total_compra").value = "";
		document.getElementById("total_compra").placeholder = "Cantidad Minima: 1";
		return false;   
	}else{

		document.getElementById("total_compra").style.boxShadow = '0 0 0px green';		
	}

	if(total_compra > 1000000000000.0){
		document.getElementById("total_compra").style.boxShadow = '0 0 15px red';
		document.getElementById("total_compra").value = ""; 
		document.getElementById("total_compra").placeholder = "El valor maximo es un billon";
		return false;   
	}else{

		document.getElementById("total_compra").style.boxShadow = '0 0 0px green';		
	}

	return true;

}