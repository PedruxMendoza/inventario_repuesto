    $(document).ready(function(){

        $('#passModal').on('show.bs.modal', function() {
          $('#info1').hide();
          $('#info2').hide();
          $('#info3').hide();
        });

        $("#passold").keyup(function () {
            var value = $(this).val();
            validar_clave1(value);
        }).keyup();

        $("#pass1").keyup(function () {
            var value = $(this).val();
            validar_clave2(value);
        }).keyup();  

        $("#pass2").keyup(function () {
            var value = $(this).val();
            validar_clave3(value);
        }).keyup();  

        //CheckBox mostrar contraseña
        $('#show_password_1').click(function () {
            $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
        });

        $('#show_password_2').click(function () {
            $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
        });

        $('#show_password_3').click(function () {
            $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
        });

        $("#passold").focus(function() {
          $('#info1').show();
          $('#info2').hide();
          $('#info3').hide();
      });

        $("#pass1").focus(function() {
          $('#info1').hide();
          $('#info2').show();
          $('#info3').hide();
      });

        $("#pass2").focus(function() {
          $('#info1').hide();
          $('#info2').hide();
          $('#info3').show();
      });        

    });

    function validar_clave1(contrasenna)
    {
        var mayuscula = false;
        var numero = false;
        var length = false;
        var caracter_raro = false;

        if(contrasenna.length < 8)
        {
            $("#length1").css("color", "red");
            $('#length1').removeClass('valid').addClass('invalid');
            length = false;
        }else{
            $("#length1").css("color", "green");
            $('#length1').removeClass('invalid').addClass('valid');
            length = true;
        }

        if (contrasenna.match(/[A-Z]/)) {
            $("#mayuscula1").css("color", "green");
            $('#mayuscula1').removeClass('invalid').addClass('valid');
            mayuscula = true;
        }else{
            $("#mayuscula1").css("color", "red");
            $('#mayuscula1').removeClass('valid').addClass('invalid');
            mayuscula = false;              
        }

        if (contrasenna.match(/\d/)) {
            $("#numero1").css("color", "green");
            $('#numero1').removeClass('invalid').addClass('valid');
            numero = true;
        }else{
            $("#numero1").css("color", "red");
            $('#numero1').removeClass('valid').addClass('invalid');
            numero = false;             
        }

        if (contrasenna.match(/[!@\^(){}[\]|\-]/)) {
            $("#especial1").css("color", "green");
            $('#especial1').removeClass('invalid').addClass('valid');
            caracter_raro = true;
        }else{
            $("#especial1").css("color", "red");
            $('#especial1').removeClass('valid').addClass('invalid');
            caracter_raro = false;              
        }

        if(mayuscula == true && length == true && caracter_raro == true && numero == true)
        {
            return true;
        }else{
            return false;
        }           
    }

    function validar_clave2(contrasenna)
    {
        var mayuscula = false;
        var numero = false;
        var length = false;
        var caracter_raro = false;

        if(contrasenna.length < 8)
        {
            $("#length2").css("color", "red");
            $('#length2').removeClass('valid').addClass('invalid');
            length = false;
        }else{
            $("#length2").css("color", "green");
            $('#length2').removeClass('invalid').addClass('valid');
            length = true;
        }

        if (contrasenna.match(/[A-Z]/)) {
            $("#mayuscula2").css("color", "green");
            $('#mayuscula2').removeClass('invalid').addClass('valid');
            mayuscula = true;
        }else{
            $("#mayuscula2").css("color", "red");
            $('#mayuscula2').removeClass('valid').addClass('invalid');
            mayuscula = false;              
        }

        if (contrasenna.match(/\d/)) {
            $("#numero2").css("color", "green");
            $('#numero2').removeClass('invalid').addClass('valid');
            numero = true;
        }else{
            $("#numero2").css("color", "red");
            $('#numero2').removeClass('valid').addClass('invalid');
            numero = false;             
        }

        if (contrasenna.match(/[!@\^(){}[\]|\-]/)) {
            $("#especial2").css("color", "green");
            $('#especial2').removeClass('invalid').addClass('valid');
            caracter_raro = true;
        }else{
            $("#especial2").css("color", "red");
            $('#especial2').removeClass('valid').addClass('invalid');
            caracter_raro = false;              
        }

        if(mayuscula == true && length == true && caracter_raro == true && numero == true)
        {
            return true;
        }else{
            return false;
        }           
    }

    function validar_clave3(contrasenna)
    {
        var mayuscula = false;
        var numero = false;
        var length = false;
        var caracter_raro = false;

        if(contrasenna.length < 8)
        {
            $("#length3").css("color", "red");
            $('#length3').removeClass('valid').addClass('invalid');
            length = false;
        }else{
            $("#length3").css("color", "green");
            $('#length3').removeClass('invalid').addClass('valid');
            length = true;
        }

        if (contrasenna.match(/[A-Z]/)) {
            $("#mayuscula3").css("color", "green");
            $('#mayuscula3').removeClass('invalid').addClass('valid');
            mayuscula = true;
        }else{
            $("#mayuscula3").css("color", "red");
            $('#mayuscula3').removeClass('valid').addClass('invalid');
            mayuscula = false;              
        }

        if (contrasenna.match(/\d/)) {
            $("#numero3").css("color", "green");
            $('#numero3').removeClass('invalid').addClass('valid');
            numero = true;
        }else{
            $("#numero3").css("color", "red");
            $('#numero3').removeClass('valid').addClass('invalid');
            numero = false;             
        }

        if (contrasenna.match(/[!@\^(){}[\]|\-]/)) {
            $("#especial3").css("color", "green");
            $('#especial3').removeClass('invalid').addClass('valid');
            caracter_raro = true;
        }else{
            $("#especial3").css("color", "red");
            $('#especial3').removeClass('valid').addClass('invalid');
            caracter_raro = false;              
        }

        if(mayuscula == true && length == true && caracter_raro == true && numero == true)
        {
            return true;
        }else{
            return false;
        }           
    }       

    function validar(){

       var passold = document.getElementById('passold').value;
       var pass1 = document.getElementById('pass1').value;
       var pass2 = document.getElementById('pass2').value;

    //Validar campo obligatorio
    if(passold.length == 0){ 
        document.getElementById("passold").style.boxShadow = '0 0 15px red'; 
        document.getElementById("passold").placeholder = "Este campo es obligatorio";
        
        return false;
    }else{
        document.getElementById("passold").style.boxShadow = '0 0 15px green';
    }

    if(pass1.length == 0){ 
        document.getElementById("pass1").style.boxShadow = '0 0 15px red'; 
        document.getElementById("pass1").placeholder = "Este campo es obligatorio";
        
        return false;
    }else{
        document.getElementById("pass1").style.boxShadow = '0 0 15px green';
    }   

    if(pass2.length == 0){ 
        document.getElementById("pass2").style.boxShadow = '0 0 15px red'; 
        document.getElementById("pass2").placeholder = "Este campo es obligatorio";
        
        return false;
    }else{
        document.getElementById("pass2").style.boxShadow = '0 0 15px green';
    }

    if(passold == pass1){ 
        document.getElementById("pass1").style.boxShadow = '0 0 15px red';
        document.getElementById("pass1").value = '';
        document.getElementById("pass1").placeholder = "Las contraseñas no deben ser las mismas";
        
        return false;
    }else{
        document.getElementById("pass1").style.boxShadow = '0 0 15px green';
    }

    if(validar_clave1(passold) == false)
    {
        document.getElementById("passold").style.boxShadow = '0 0 15px red';
        return false;
    }
    else
    {
        document.getElementById("passold").style.boxShadow = '0 0 0px green';
    }

    if(validar_clave2(pass1) == false)
    {
        document.getElementById("pass1").style.boxShadow = '0 0 15px red';
        return false;
    }
    else
    {
        document.getElementById("pass1").style.boxShadow = '0 0 0px green';
    }  

    if(validar_clave3(pass2) == false)
    {
        document.getElementById("pass2").style.boxShadow = '0 0 15px red';
        return false;
    }
    else
    {
        document.getElementById("pass2").style.boxShadow = '0 0 0px green';
    }  

    return true;

// PARA COLOCAR COLOR A UN INPUT QUE ESTA VACIO
// document.getElementById("nombre").style.backgroundColor = "red";
}

function mostrarPassword1(){
    var passold = document.getElementById("passold");
    if(passold.type == "password"){
        passold.type = "text";
        $('.icon1').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        passold.type = "password";
        $('.icon1').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
}

function mostrarPassword2(){
    var pass1 = document.getElementById("pass1");
    if(pass1.type == "password"){
        pass1.type = "text";
        $('.icon2').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        pass1.type = "password";
        $('.icon2').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
}

function mostrarPassword3(){
    var pass2 = document.getElementById("pass2");
    if(pass2.type == "password"){
        pass2.type = "text";
        $('.icon3').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        pass2.type = "password";
        $('.icon3').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
}