function validarFormulario(){

   var nombre   = document.getElementById('nombre').value;
   var apellido = document.getElementById('apellido').value;
   var edad   = document.getElementById('edad').value;
   var correo = document.getElementById('correo').value;
   var carrera = document.getElementById('carrera').selectedIndex;
   var sexo = document.getElementById('sexo').selectedIndex;
   var ciudad = document.getElementById('ciudad').selectedIndex;
   var fnacimiento = document.getElementById('fnacimiento').value;




    //Validar campo obligatorio
    if(nombre.length == 0){
        //document.getElementById("nombre").style.borderColor = "red"; 
        document.getElementById("nombre").style.boxShadow = '0 0 15px red'; 
        document.getElementById("nombre").placeholder = "Este campo es obligatorio";   
        return false;
    }else{
        document.getElementById("nombre").style.boxShadow = '0 0 15px green';
    }

    //Validar campo obligatorio
    if(apellido.length == 0){
        document.getElementById("apellido").style.boxShadow = '0 0 15px red'; 
        document.getElementById("apellido").placeholder = "Este campo es obligatorio";
        return false;
    }else{
        document.getElementById("apellido").style.boxShadow = '0 0 15px green';
    }

    if(isNaN(edad) || edad.length == 0){
        document.getElementById("edad").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("edad").style.boxShadow = '0 0 15px green';
    }

    //Validar correo
    if(!(/\S+@\S+\.\S+/.test(correo))){
        document.getElementById("correo").style.boxShadow = '0 0 15px red'; 
        document.getElementById("correo").placeholder = "Debe escribir un correo valido";
        return false;
    }else{
        document.getElementById("correo").style.boxShadow = '0 0 15px green';
    }
        //Validar comboBox
        if(carrera == 0){
            document.getElementById("carrera").style.boxShadow = '0 0 15px red'; 
            return false;
        }else{
            document.getElementById("carrera").style.boxShadow = '0 0 15px green';
        }

        //Validar comboBox
        if(sexo == 0){
            document.getElementById("sexo").style.boxShadow = '0 0 15px red'; 
            return false;
        }else{
            document.getElementById("sexo").style.boxShadow = '0 0 15px green';
        }

                //Validar comboBox
        if(ciudad == 0){
            document.getElementById("ciudad").style.boxShadow = '0 0 15px red'; 
            return false;
        }else{
            document.getElementById("ciudad").style.boxShadow = '0 0 15px green';
        }


    //Validar fecha
    if(fnacimiento == ""){
    	document.getElementById("fnacimiento").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("fnacimiento").style.boxShadow = '0 0 15px green';
    }



    //Validar comboBox
    if(sexo == 0){
    	document.getElementById("sexo").style.boxShadow = '0 0 15px red'; 
    	return false;
    }else{
        document.getElementById("sexo").style.boxShadow = '0 0 15px green';
    }




    return true;

// PARA COLOCAR COLOR A UN INPUT QUE ESTA VACIO
// document.getElementById("nombre").style.backgroundColor = "red";
}