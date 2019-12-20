function validar(){

	var nombre_pieza = document.getElementById('nombre_pieza').selectedIndex;
	var nombre_marca = document.getElementById('nombre_marca').selectedIndex;
	var precio_ingreso = document.getElementById('precio_ingreso').value;
	var precio_venta = document.getElementById('precio_venta').value;
	var stock = document.getElementById('stock').value;


	if(nombre_pieza == 0){
		document.getElementById("nombre_pieza").style.boxShadow = '0 0 25px red'; 
		return false;
	}else{
		document.getElementById("nombre_pieza").style.boxShadow = '0 0 25px green';

	}//aqui termina la validacion del nombre_pieza

	if(nombre_marca == 0){
		document.getElementById("nombre_marca").style.boxShadow = '0 0 25px red'; 
		return false;
	}else{
		document.getElementById("nombre_marca").style.boxShadow = '0 0 25px green';

	}//aqui termina la validacion del nombre_marca

	if(precio_ingreso.length == 0){

		document.getElementById("precio_ingreso").style.boxShadow = '0 0 15px red'; 
		document.getElementById("precio_ingreso").placeholder = "Ingrese el precio de ingreso";   
		return false;
	}else{
		document.getElementById("precio_ingreso").style.boxShadow = '0 0 15px green';
	}//cierre else

	if(precio_ingreso < 0){

		document.getElementById("precio_ingreso").style.boxShadow = '0 0 15px red';
		document.getElementById("precio_ingreso").value = ""; 
		return false;   
	}else{

		document.getElementById("precio_ingreso").style.boxShadow = '0 0 15px green';		
	}

	if(precio_venta.length == 0){

		document.getElementById("precio_venta").style.boxShadow = '0 0 15px red'; 
		document.getElementById("precio_venta").placeholder = "Ingrese el precio de ingreso";   
		return false;
	}else{
		document.getElementById("precio_venta").style.boxShadow = '0 0 15px green';
	}//cierre else

	if(precio_venta < 0){

		document.getElementById("precio_venta").style.boxShadow = '0 0 15px red';
		document.getElementById("precio_venta").value = ""; 
		return false;   
	}else{

		document.getElementById("precio_venta").style.boxShadow = '0 0 15px green';		
	}

	if(stock.length == 0){

		document.getElementById("stock").style.boxShadow = '0 0 15px red'; 
		document.getElementById("stock").placeholder = "Ingrese el precio de ingreso";   
		return false;
	}else{
		document.getElementById("stock").style.boxShadow = '0 0 15px green';
	}//cierre else

	if(stock < 0){

		document.getElementById("stock").style.boxShadow = '0 0 15px red';
		document.getElementById("stock").value = ""; 
		return false;   
	}else{

		document.getElementById("stock").style.boxShadow = '0 0 15px green';		
	}

	return true;

}