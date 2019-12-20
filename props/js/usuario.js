	$(document).ready(function(){
		$("#contrasenna").keyup(function () {
			var value = $(this).val();
			validar_clave(value);
		}).keyup();

		//CheckBox mostrar contraseña
		$('#ShowPassword').click(function () {
			$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
		});

		$("#correo").on("blur", function(){
			var value = $(this).val();
			$resp = disponibilidadCorreo(value);
			console.log($resp);
		});

/*		$("#correo").keyup(function () {
			var value = $(this).val();
			$resp = disponibilidadCorreo(value);
			console.log($resp);
		}).keyup();*/
	});

	function mostrarPassword(){
		var cambio = document.getElementById("contrasenna");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
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