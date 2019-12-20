<script type="text/javascript">
  function disponibilidadCorreo($correo){
      //Creamos una variable llamada $id en la cual guardaremos el valor digitado en el input
      //dicha variable sera la enviada a la consulta para validar si existe un correo similar

      $.ajax({  
        //Especificamos el tipo de peticion que haremos
        type: 'ajax',
        // especifica si será una petición POST o GET
        method: 'post', 
        // la URL para la petición   
        url: '<?php echo base_url('usuarioC/validarCorreo') ?>',
        // la información a enviar
        // (también es posible utilizar una cadena de datos)  
        //En este caso correo seria el parametro y $id es el valor que se capturo anteriomente del input  
        data: {correo:$correo},
        // el tipo de información que se espera de respuesta
        dataType: 'json',
        
        // código a ejecutar si la petición es satisfactoria;
        success: function(respuesta){  

          //el modelo devolvera con return ya sea false o true el cual evaluamos con el if
          if (respuesta==true) {
            $r = true; 
            //Si nos devuelve true es porque SI EXISTE UN CORREO como el escrito en el input
            $("#infoCorreo").text('Correo ya registrado').css({color: 'red', fontSize: '10px'});
            $("#correo").css('boxShadow', '0 0 15px red');
          }else{
            $r = false; 
            //Si nos devuelve false es porque NO EXISTE UN CORREO como el escrito en el input
            $("#infoCorreo").text('Correo disponible').css({color: 'green', fontSize: '10px'});
          }
        },
      });
      return $r;
    };
    function validar(){

     var correo = $('#correo').val();
     var clave = $('#contrasenna').val();
     var persona = $('#dui_persona').val();
     var rol = $('#rol').val();

        //Validar correo
        if(!(/\S+@\S+\.\S+/.test(correo))){
          document.getElementById("correo").style.boxShadow = '0 0 15px red'; 
          document.getElementById("correo").placeholder = "Debe digitar un correo valido";
          $("#infoCorreo").text('Debe digitar un correo valido').css({color: 'red', fontSize: '10px'});
          return false;
        }else{
          document.getElementById("correo").style.boxShadow = '0 0 0px green';
        }

        if(correo.length > 50){
          document.getElementById("correo").style.boxShadow = '0 0 15px red'; 
          document.getElementById("correo").value = "";
          document.getElementById("correo").placeholder = "Longitud Maxima: 50";   
          return false;
        }else{
          document.getElementById("correo").style.boxShadow = '0 0 0px green';
        }                

        $resp = disponibilidadCorreo(correo);
        if($resp == true){
          return false;
        } 

        if(persona == 0){
          document.getElementById("dui_persona").style.boxShadow = '0 0 15px red'; 
          return false;
        }else{
          document.getElementById("dui_persona").style.boxShadow = '0 0 0px green';
        }

        if(rol == 0){
          document.getElementById("rol").style.boxShadow = '0 0 15px red'; 
          return false;
        }else{
          document.getElementById("rol").style.boxShadow = '0 0 0px green';
        }

        if(clave.length > 50){
          document.getElementById("contrasenna").style.boxShadow = '0 0 15px red'; 
          document.getElementById("contrasenna").value = "";
          document.getElementById("contrasenna").placeholder = "Longitud Maxima: 50";   
          return false;
        }else{
          document.getElementById("contrasenna").style.boxShadow = '0 0 0px green';
        }

        if(clave.length == 0){
          document.getElementById("contrasenna").style.boxShadow = '0 0 15px red';  
          return false;
        }else{
          document.getElementById("contrasenna").style.boxShadow = '0 0 0px green';
        }

        if (status == "add") {
          if(validar_clave(clave) == false)
          {
            document.getElementById("contrasenna").style.boxShadow = '0 0 15px red';
            return false;
          }
          else
          {
            document.getElementById("contrasenna").style.boxShadow = '0 0 0px green';
          }  
        }   

        return true;
      }
    </script>