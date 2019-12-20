    $(document).ready(function(){

        $('#info').hide();

/*        $("#clave").on("blur", function(){
          $('#info').hide();
      });*/

        $("#clave").keyup(function () {
            var value = $(this).val();
            validar_clave(value);
        }).keyup();

        //CheckBox mostrar contraseña
        $('#ShowPassword').click(function () {
            $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
        });

/*        $("#clave").focus(function() {
          $('#info').show();
      }); */      

    });

    function validar1(){

     var correo   = document.getElementById('correo').value;
     var clave   = document.getElementById('clave').value;

    //Validar campo obligatorio
    if(correo.length == 0){ 
        document.getElementById("correo").style.boxShadow = '0 0 15px red';       
        return false;
    }else{
        document.getElementById("correo").style.boxShadow = '0 0 15px green';
    }

     //Validar correo
     if(!(/\S+@\S+\.\S+/.test(correo))){
        document.getElementById("correo").style.boxShadow = '0 0 15px red'; 
        document.getElementById("correo").placeholder = "Debe digitar un correo valido";
        return false;
    }else{
        document.getElementById("correo").style.boxShadow = '0 0 0px green';
    }

    if(clave.length == 0){ 
        document.getElementById("clave").style.boxShadow = '0 0 15px red';       
        return false;
    }else{
        document.getElementById("clave").style.boxShadow = '0 0 15px green';
    }

    if(validar_clave(clave) == false)
    {
        document.getElementById("clave").style.boxShadow = '0 0 15px red';
        return false;
    }
    else
    {
        document.getElementById("clave").style.boxShadow = '0 0 0px green';
    }

    if(clave.length > 50){
        document.getElementById("clave").style.boxShadow = '0 0 15px red'; 
        document.getElementById("clave").value = "";
        document.getElementById("clave").placeholder = "Longitud Maxima: 50";   
        return false;
    }else{
        document.getElementById("clave").style.boxShadow = '0 0 0px green';
    }

    return true;

// PARA COLOCAR COLOR A UN INPUT QUE ESTA VACIO
// document.getElementById("nombre").style.backgroundColor = "red";
}

function mostrarPassword(){
    var clave = document.getElementById("clave");
    if(clave.type == "password"){
        clave.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        clave.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
}

function validar_clave(contrasenna)
{
    var mayuscula = false;
    var numero = false;
    var length = false;
    var caracter_raro = false;

    if(contrasenna.length < 8)
    {
        $("#length").css("color", "red");
        $('#length').removeClass('valid').addClass('invalid');
        length = false;
    }else{
        $("#length").css("color", "green");
        $('#length').removeClass('invalid').addClass('valid');
        length = true;
    }

    if (contrasenna.match(/[A-Z]/)) {
        $("#mayuscula").css("color", "green");
        $('#mayuscula').removeClass('invalid').addClass('valid');
        mayuscula = true;
    }else{
        $("#mayuscula").css("color", "red");
        $('#mayuscula').removeClass('valid').addClass('invalid');
        mayuscula = false;              
    }

    if (contrasenna.match(/\d/)) {
        $("#numero").css("color", "green");
        $('#numero').removeClass('invalid').addClass('valid');
        numero = true;
    }else{
        $("#numero").css("color", "red");
        $('#numero').removeClass('valid').addClass('invalid');
        numero = false;             
    }

    if (contrasenna.match(/[!@\^(){}[\]|\-]/)) {
        $("#especial").css("color", "green");
        $('#especial').removeClass('invalid').addClass('valid');
        caracter_raro = true;
    }else{
        $("#especial").css("color", "red");
        $('#especial').removeClass('valid').addClass('invalid');
        caracter_raro = false;              
    }

    if(mayuscula == true && length == true && caracter_raro == true && numero == true)
    {
        return true;
    }else{
        return false;
    }           
}

function validar2(){

 var email   = document.getElementById('email').value;

    //Validar campo obligatorio
    if(email.length == 0){ 
        document.getElementById("email").style.boxShadow = '0 0 15px red';       
        return false;
    }else{
        document.getElementById("email").style.boxShadow = '0 0 15px green';
    }

    //Validar correo
    if(!(/\S+@\S+\.\S+/.test(email))){
        document.getElementById("email").style.boxShadow = '0 0 15px red'; 
        document.getElementById("email").placeholder = "Debe digitar un correo valido";
        return false;
    }else{
        document.getElementById("email").style.boxShadow = '0 0 0px green';
    }    

    return true;

// PARA COLOCAR COLOR A UN INPUT QUE ESTA VACIO
// document.getElementById("nombre").style.backgroundColor = "red";
}