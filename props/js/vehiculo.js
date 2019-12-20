function validar(){

	var modelo        =document.getElementById('modelo').selectedIndex;
	var anio          =document.getElementById('anio').value;
	var color         =document.getElementById('color').value;
	var fingreso      =document.getElementById('fingreso').value;
	var vin           =document.getElementById('vin').value;
	var poliza        =document.getElementById('poliza').selectedIndex;
	var clase         =document.getElementById('clase').selectedIndex;
	var millas        =document.getElementById('millas').value;
	var serie         =document.getElementById('serie').value;
	var transmision   =document.getElementById('transmision').selectedIndex;
	var tm            =document.getElementById('tm').selectedIndex;
	var serial        =document.getElementById('serial').value;
	var ncomprobante  =document.getElementById('ncomprobante').selectedIndex;
	var pingreso      =document.getElementById('pingreso').value;
	/*======================================================================*/
	var hoy             = new Date();
	var ano 			= hoy.getFullYear().toString();
	var fechaFormulario = new Date(fingreso);

	if(modelo == 0){
		document.getElementById("modelo").style.boxShadow = '0 0 15px red';
		alertify.notify('No ha ingresado Modelo!', 'error',10, null);
		return false;
	}else{
		document.getElementById("modelo").style.boxShadow = '0 0 15px green';
	}//cierre else

	if(isNaN(anio) || anio.length == 0){

		document.getElementById("anio").style.boxShadow = '0 0 15px red';
		alertify.notify('No ha ingresado Año!', 'error',10, null);
		return false;
	}else{
		document.getElementById("anio").style.boxShadow = '0 0 15px green';

	}

	if(anio < 0){

		document.getElementById("anio").style.boxShadow = '0 0 15px red'; 
		document.getElementById("anio").value = "";
		document.getElementById("anio").placeholder = "Solo Permite Numeros Positivos";
		alertify.notify('El año no puede ser negativo!', 'error',10, null);
		return false;
	}else{
		document.getElementById("anio").style.boxShadow = '0 0 15px green';

	}	

	if (anio.length == 4){
		document.getElementById("anio").style.boxShadow = '0 0 15px #2BFF15';		
	}else{
		document.getElementById("anio").style.boxShadow = '0 0 15px red'; 
		document.getElementById("anio").value = "";
		document.getElementById("anio").placeholder = "Longitud Permitida: 4";
		alertify.notify('Longitud Permitida en Año: 4!', 'error',10, null);
		return false;
	}

	if(anio > ano){

		document.getElementById("anio").style.boxShadow = '0 0 15px red';
		document.getElementById("anio").value = "";
		document.getElementById("anio").placeholder = "Año no puede ser mayor a la actual";
		alertify.notify('Año: No puede ser mayor a la actual!', 'error',10, null);
		return false;
	}else{
		document.getElementById("anio").style.boxShadow = '0 0 15px green';

	}//cierre else

	if(color.length == 0){

		document.getElementById("color").style.boxShadow = '0 0 15px red'; 
		document.getElementById("color").placeholder = "Debe ingresar un color";
		alertify.notify('Debe ingresar un color!', 'error',10, null);  
		return false;
	}else{
		document.getElementById("color").style.boxShadow = '0 0 15px green';
	}//cierre else

	if(color.length >50){
		document.getElementById("color").style.boxShadow = '0 0 15px red';
		document.getElementById("color").value = "";
		document.getElementById("color").placeholder = "El Maximo es de 50 caracteres"; 
		alertify.notify('Color: El Maximo es de 50 caracteres!', 'error',10, null);  
		return false; 

	}else{

		document.getElementById("color").style.boxShadow = '0 0 15px green';

	}

	if(fingreso == ""){

		document.getElementById("fingreso").style.boxShadow = '0 0 15px red';
		alertify.notify('No ha ingresado Fecha de Ingreso!', 'error',10, null);  
		return false;
	}else{
		document.getElementById("fingreso").style.boxShadow = '0 0 15px green';

	}

	// Comparamos solo las fechas => no las horas!!
	hoy.setHours(0,0,0,0);  // Lo iniciamos a 00:00 horas

	if (hoy < fechaFormulario) {
		document.getElementById("fingreso").style.boxShadow = '0 0 15px red'; 
		document.getElementById("fingreso").value = "";
		alertify.notify('Fecha de Ingreso: No puede ser mayor a la fecha actual!', 'error',10, null);  
		return false;
	}else {
		document.getElementById("fingreso").style.boxShadow = '0 0 15px green';
	}//cierre else


	if(vin.length == 0){

		document.getElementById("vin").style.boxShadow = '0 0 15px red'; 
		document.getElementById("vin").placeholder = "Ingrese el codigo VIN"; 
		alertify.notify('Ingrese el codigo VIN!', 'error',10, null);  
		return false;
	}else{
		document.getElementById("vin").style.boxShadow = '0 0 15px green';
	}

	if (vin.length == 17){
		document.getElementById("vin").style.boxShadow = '0 0 15px #2BFF15';		
	}else{
		document.getElementById("vin").style.boxShadow = '0 0 15px red'; 
		document.getElementById("vin").value = "";
		document.getElementById("vin").placeholder = "Longitud Permitida: 17";
		alertify.notify('Longitud Permitida en VIN: 17!', 'error',10, null); 
		return false;
	}//cierre else

	if(poliza == 0){
		document.getElementById("poliza").style.boxShadow = '0 0 15px red';
		alertify.notify('No ha ingresado Poliza!', 'error',10, null); 
		return false;
	}else{
		document.getElementById("poliza").style.boxShadow = '0 0 15px green';
	}//cierre else


	if(clase == 0){
		document.getElementById("clase").style.boxShadow = '0 0 15px red';
		alertify.notify('No ha ingresado Clase!', 'error',10, null); 
		return false;
	}else{
		document.getElementById("clase").style.boxShadow = '0 0 15px green';

	}//cierre else

	if(millas.length == 0){

		document.getElementById("millas").style.boxShadow = '0 0 15px red'; 
		document.getElementById("millas").placeholder = "el campo millas es obligatorio";
		alertify.notify('El campo millas es obligatorio!', 'error',10, null);  
		return false;
	}else{
		document.getElementById("millas").style.boxShadow = '0 0 15px green';
	}//cierre else

	if(millas < 0){

		document.getElementById("millas").style.boxShadow = '0 0 15px red';
		document.getElementById("millas").value = ""; 
		document.getElementById("millas").placeholder = "Solo se permiten numeros positivos";
		alertify.notify('Las millas no pueden ser negativos!', 'error',10, null);  
		return false;   
	}else{

		document.getElementById("millas").style.boxShadow = '0 0 15px green';		
	}

	if(millas > 800000){
		document.getElementById("millas").style.boxShadow = '0 0 15px red';
		document.getElementById("millas").value = ""; 
		document.getElementById("millas").placeholder = "El valor de millas maximo es: 80 mil";
		alertify.notify('El valor de millas maximo es: 80 mil!', 'error',10, null);  
		return false;   
	}else{

		document.getElementById("millas").style.boxShadow = '0 0 15px green';		
	}

	if(serie.length == 0){

		document.getElementById("serie").style.boxShadow = '0 0 15px red'; 
		document.getElementById("serie").placeholder = "Ingrese un numero de serie";
		alertify.notify('El valor de millas maximo es: 80 mil!', 'error',10, null);  
		return false;
	}else{
		document.getElementById("serie").style.boxShadow = '0 0 15px green';
	}//cierre else

	if(transmision == 0){
		document.getElementById("transmision").style.boxShadow = '0 0 15px red';
		alertify.notify('El campo transmision es obligatorio!', 'error',10, null);  
		return false;
	}else{
		document.getElementById("transmision").style.boxShadow = '0 0 15px green';
	}//cierre else

	if(tm ==0){

		document.getElementById("tm").style.boxShadow = '0 0 15px red';
		alertify.notify('El campo tipo de motor es obligatorio!', 'error',10, null); 
		return false;
	}else{

		document.getElementById("tm").style.boxShadow = '0 0 15px green';
	}//cierre else

	if(serial.length == 0){

		document.getElementById("serial").style.boxShadow = '0 0 15px red';
		document.getElementById("serial").placeholder = "El campo serial es obligatorio";
		alertify.notify('El campo serial es obligatorio!', 'error',10, null); 
		return false;
	}else{

		document.getElementById("serial").style.boxShadow = '0 0 15px green';

	}

	if (serial.length == 20){
		document.getElementById("serial").style.boxShadow = '0 0 15px #2BFF15';		
	}else{
		document.getElementById("serial").style.boxShadow = '0 0 15px red'; 
		document.getElementById("serial").value = "";
		document.getElementById("serial").placeholder = "Longitud Permitida: 20";
		alertify.notify('Longitud Permitida en Serial: 20!', 'error',10, null); 
		return false;
	}///cierre elseif

	if(ncomprobante ==0){

		document.getElementById("ncomprobante").style.boxShadow = '0 0 15px red';
		alertify.notify('El campo numero comprobante es obligatorio!', 'error',10, null); 
		return false;
	}else{

		document.getElementById("ncomprobante").style.boxShadow = '0 0 15px green';
	}//cierre else

	if(pingreso.length == 0){

		document.getElementById("pingreso").style.boxShadow = '0 0 15px red'; 
		document.getElementById("pingreso").placeholder = "Ingrese el precio de ingreso";
		alertify.notify('El campo precio ingreso es obligatorio!', 'error',10, null); 
		return false;
	}else{
		document.getElementById("pingreso").style.boxShadow = '0 0 15px green';
	}//cierre else

	if(pingreso < 0){
		document.getElementById("pingreso").style.boxShadow = '0 0 15px red';
		document.getElementById("pingreso").value = ""; 
		document.getElementById("pingreso").placeholder = "Solo Permite Numeros Positivos";		
		alertify.notify('El precio ingreso no puede ser negativo!', 'error',10, null);
		return false;   
	}else{

		document.getElementById("pingreso").style.boxShadow = '0 0 15px green';		
	}

	if(pingreso > 1000000000000.0){
		document.getElementById("pingreso").style.boxShadow = '0 0 15px red';
		document.getElementById("pingreso").value = "";
		document.getElementById("pingreso").placeholder = "El valor maximo es un billon";
		alertify.notify('El valor de precio ingreso maximo es: un billon', 'error',10, null);
		return false;   
	}else{

		document.getElementById("pingreso").style.boxShadow = '0 0 15px green';		
	}
	return true;

}//cierre function