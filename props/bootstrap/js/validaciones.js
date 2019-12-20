	function validar(){

		var addpieza = document.getElementById('addpieza').selectedIndex;
		var addcantidad = document.getElementById('addcantidad').value;

//validar campo como obligatorio

if(addpieza ==0){
	document.getElementById("addpieza").style.boxShadow = '0 0 15px red';
	return false;
}else{
	document.getElementById("addpieza").style.boxShadow = '0 0 15px green';
}

if(addcantidad <= 0){
	document.getElementById("addcantidad").style.boxShadow = '0 0 15px red';
	document.getElementById("addcantidad").value = '';
	document.getElementById("addcantidad").placeholder = "Cantidad minima: 1";
	return false;
}else{
	document.getElementById("addcantidad").style.boxShadow = '0 0 15px green';
}


return true;
}
