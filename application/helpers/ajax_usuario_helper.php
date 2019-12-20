<script>
	$(document).ready(function(){
		var status = "";
		//llamamos a la funcion que muestra a TODOS los alumnos en la tabla
		mostrarUsuarios();

		//Funcion para mostrar alumnos
		function mostrarUsuarios(){
			//Definimos que trabajaremos con ajax
			$.ajax({
				//tipo de solicitud a realizar
				type: 'ajax',
				//direccion donde definiremos el controlador y metodo para obtener los alumnos
				url: '<?= base_url('usuarioC/get_usuario') ?>',
				//Tipo de respuesta que recibiremos
				dataType: 'json',

				//Si la peticion fue exitosa recibiremos una respuesta, en este caso en la variable "datos" recibiremos TODOS
				//los registros que nos devuelva el modelo
				success: function(datos){
					//Creamos una variable que servira para crear el cuerpo de la tabla
					var tabla = '';
					//variable para recorrer el for segun la cantidad de registros que nos devuelva el modelo
					var i;
					//variable opcional, esta variable sirve para mostrar un correlativo en el registro
					var n=1;

					//con estructura for recorremos los datos recibidos
					for(i=0; i<datos.length; i++){
						//en la variable tabla (creada anteriormente) llenamos la variable con la estructura del
						//cuerpo de la tabla (TOME EN CUENTA QUE TODO DEBE IR CONCATENADO)
						tabla +=
						'<tr class="bg-dark">'+

						'<td>'+datos[i].correo+'</td>'+
						//'<td>'+datos[i].clave+'</td>'+
						'<td>'+datos[i].dui_persona+' '+datos[i].nombre1+' '+datos[i].nombre2+' '+datos[i].apellido1+' '+datos[i].apellido2+'</td>'+
						'<td>'+datos[i].nombre_rol+'</td>'+

						//creamos un boton para eliminar y editar
						//tome en cuenta que cada boton tiene la clase borrar y item-edit segun la accion que corresponda
						'<td>'+'<a href="javascript:;" class="btn btn-danger btn-sm borrar" data="'+datos[i].id_usuario+'">Eliminar</a>'+
						'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-info btn-sm item-edit" data="'+datos[i].id_usuario+'">Editar</a>'+
						'</td>'+
						'</tr>';
						//incrementamos la variable que nos sirve de correlativo
						n++;
					}
					//en la vista la etiqueta <tbody> contiene el id "tabla_alumnos"
					//con esta linea entregamos la variable que contiene el cuerpo de la tabla
					$('#tabla_usuarios').html(tabla);
				}
			});
		};//fin de funcion mostrar Alumnos



	//cuando damos click al boton eliminar de cada registro de la tabla_alumnos se ejecutara lo siguiente
	$('#tabla_usuarios').on('click', '.borrar', function(){

			$id = $(this).attr('data');//para capturar el dato segun el boton que demos click

			$('#modalBorrar').modal('show'); //Para mostrar el modal de confirmacion de eliminar

			//con unbind().click lo que estamos definiendo es que ESPERE a que presionemos el boton
			//del modal confirmando la eliminacion
			$('#btnBorrar').unbind().click(function() {
				//Definimos que trabajaremos con ajax
				$.ajax({
					//tipo de solicitud a realizar
					type: 'ajax',
					//metodo de envio de los datos (puede ser get)
					method: 'post',
					//direccion hacia donde enviaremos la informacion (controlador/metodo)
					url: '<?php echo base_url('usuarioC/eliminar')?>',
					//datos a enviar, $id es el valor capturado anteriomente del boton
					data: {id:$id},
					//Tipo de respuesta que recibiremos
					dataType: 'json',

				//Si la peticion fue exitosa recibiremos una respuesta, en este caso en la variable "respuesta" recibiremos 
				//TRUE o FALSE que nos devolvera el modelo
				success: function(respuesta){
						$('#modalBorrar').modal('hide'); //Para ocultar el modal
						//si la respuesta que recibimos del modelo es TRUE, mostramos una alerta indicando
						//que el registro fue eliminado exitosamente
						//success tipo de notificacion ---- 10 segundos a mostrar la alerta
						if(respuesta==true){
							alertify.notify('Eliminado exitosamente!', 'success', 10, null);
							//Llamamos a la funcion para mostrar los alumnos y asi actualizar SOLO LA TABLA y NO TODA LA PAGINA
							mostrarUsuarios();
						}else{
						//si la respuesta que recibimos del modelo es FLASE, mostramos una alerta indicando
						//que el registro no se pudo eliminar
						//error tipo de notificacion ---- 10 segundos a mostrar la alerta							
						alertify.notify('Error al eliminar!', 'error', 10, null);
					}
				}
			});
				
			});

		});

	//agregamos un evento al boton para agregar nuevo alumno
	$('#nueUsu').click(function(){
			//mostramos el modal que tiene el formulario para ingresar un alumno
			$('#usuario').modal('show');
			//modificamos el titulo del modal
			$('#usuario').find('.modal-title').text('Nuevo Usuario');
			$('#oculto').show();
			$('#formUsuario')[0].reset();
			//modificamos el atributo action, le agregamos la ruta del controlador y modelo para ingresar
			$('#formUsuario').attr('action','<?= base_url('usuarioC/ingresar')?>');
			status = "add";
			console.log(status);
		});


		get_persona();//llamado a la funcion para mostrar sexos

		function get_persona(){
			//Definimos que trabajaremos con ajax
			$.ajax({
				//tipo de solicitud a realizar
				type: 'ajax',
				//direccion hacia donde enviaremos la informacion (controlador/metodo)
				url: '<?= base_url('usuarioC/get_persona') ?>',
				//Tipo de respuesta que recibiremos
				dataType: 'json',

				//Si la peticion fue exitosa recibiremos una respuesta, en este caso en la variable "respuesta" recibiremos 
				//los registros de la tabla sexo
				success: function(datos){
					//Creamos una variable que servira para crear los option del select
					var op = '';
					//variable para recorrer el for
					var i;

					//agregamos a op un option vacio para que no aparezca ninguna opcion seleccionada
					op +="<option value=''>--Seleccione Dui - Persona--</option>";
					//recorremos los datos recibidos, con datos.length obtenemos la longitud del arreglo
					//osea, numero de registros recibidos
					for(i=0; i<datos.length; i++){
						//en la variable op vamos guardando cada registro obtenido del modelo
						op +="<option value='"+datos[i].dui_persona+"'>"+datos[i].dui_persona+" "+datos[i].nombre1+" "+datos[i].nombre2+" "+datos[i].apellido1+" "+datos[i].apellido2+"</option>";
					}
					//al select con el id sexo le entregamos la variable op que contiene los option
					$('#dui_persona').html(op);
				}
			});
		}//fin de funcion para mostrar sexos


get_rol();//llamado a la funcion para mostrar sexos

function get_rol(){
			//Definimos que trabajaremos con ajax
			$.ajax({
				//tipo de solicitud a realizar
				type: 'ajax',
				//direccion hacia donde enviaremos la informacion (controlador/metodo)
				url: '<?= base_url('usuarioC/get_rol') ?>',
				//Tipo de respuesta que recibiremos
				dataType: 'json',

				//Si la peticion fue exitosa recibiremos una respuesta, en este caso en la variable "respuesta" recibiremos 
				//los registros de la tabla sexo
				success: function(datos){
					//Creamos una variable que servira para crear los option del select
					var op = '';
					//variable para recorrer el for
					var i;

					//agregamos a op un option vacio para que no aparezca ninguna opcion seleccionada
					op +="<option value=''>--Seleccione Rol--</option>";
					//recorremos los datos recibidos, con datos.length obtenemos la longitud del arreglo
					//osea, numero de registros recibidos
					for(i=0; i<datos.length; i++){
						//en la variable op vamos guardando cada registro obtenido del modelo
						op +="<option value='"+datos[i].id_rol+"'>"+datos[i].nombre_rol +"</option>";
					}
					//al select con el id sexo le entregamos la variable op que contiene los option
					$('#rol').html(op);
				}
			});
		}//fin de funcion para mostrar sexos

		//agregamos un evento al boton del modal GUARDAR
		$('#btnGuardar').click(function(){
			$resp = validar();
			console.log($resp);
			if($resp == true){
			//capturamos lo que este en el atributo action del formulario
			$url = $('#formUsuario').attr('action');
			//capturamos todos los datos del formulario
			$data = $('#formUsuario').serialize();
			//Definimos que trabajaremos con ajax
			$.ajax({
				//tipo de solicitud a realizar
				type: 'ajax',
				//metodo de envio de los datos (puede ser get)
				method: 'post',
				//direccion hacia donde enviaremos la informacion (controlador/metodo)
				url: $url,
				//datos a enviar, $data contiene TODA la informacion del formulario
				data: $data,
				//Tipo de respuesta que recibiremos
				dataType: 'json',
				//Si la peticion fue exitosa recibiremos una respuesta, en este caso en la variable "respuesta" recibiremos la palabra add o edi
				//add la recibiremos cuando una insercion fue exitosa
				//edi la recibiremos cuando una actualizacion fue exitosa
				success: function(respuesta){
					//Ocultamos el moda, hide significa "oculto"
					$('#usuario').modal('hide');
					//si la respuesta recibida es add mostramos una alerta de ingreso exitoso
					if(respuesta=='add'){
						//si la respuesta que recibimos del modelo es ADD, mostramos una alerta indicando
						//que el registro fue ingresado exitosamente
						//success tipo de notificacion ---- 10 segundos a mostrar la alerta
						alertify.notify('Ingresado exitosamente!', 'success',10, null);
					}else if(respuesta=='edi'){
						//si la respuesta que recibimos del modelo es EDI, mostramos una alerta indicando
						//que el registro fue actualizado exitosamente
						//success tipo de notificacion ---- 10 segundos a mostrar la alerta
						alertify.notify('Actualizado exitosamente!', 'success',10, null);
					}else{
						//si la respuesta que recibimos del modelo es NO ES ADD o EDI, mostramos una alerta indicando que hubi error al realizar la accion (ya sea insertar o actualizar)
						//error tipo de notificacion ---- 10 segundos a mostrar la alerta
						alertify.notify('error al ingresar!', 'error',10, null);
					}
					//Limpiar inputs de formulario
					$('#formUsuario')[0].reset();
					//Actualizar la tabla con el nuevo registro
					mostrarUsuarios();
				}
			});
		}

		});//fin evento del boton guardar del modal

		//cuando damos click al boton de editar de cada registro de la tabla_alumnos se ejecutara lo siguiente	
		$('#tabla_usuarios').on('click', '.item-edit', function(){
			//para capturar el dato segun el boton que demos click
			var id = $(this).attr('data');

			$('#usuario').modal('show');//Para mostrar el modal 
			//en el modal que tiene id llamado alumno buscamos la clase "modal-title" y le agregamos el texto del encabezado
			$('#usuario').find('.modal-title').text('Editar Usuario');
			//modificamos el atributo action, le agregamos la ruta del controlador y modelo para actualizar
			$('#oculto').hide();
			$("#contrasenna").attr("readonly","readonly");
			$('#formUsuario').attr('action','<?= base_url('usuarioC/actualizar')?>');
			status = "modi";
			console.log(status);

			//Definimos que trabajaremos con ajax
			$.ajax({
				//tipo de solicitud a realizar
				type: 'ajax',
				//metodo de envio de los datos (puede ser get)
				method: 'post',
				//direccion hacia donde enviaremos la informacion (controlador/metodo)
				url: '<?= base_url('usuarioC/get_datos')?>',
				//datos a enviar, id contiene el id del registro que queremos obtener los datos para mostrarlos en el modal
				data: {id:id},
				//Tipo de respuesta que recibiremos
				dataType: 'json',

				//Si la peticion fue exitosa recibiremos una respuesta, en este caso en la variable "datos" recibiremos la palabra los datos del registro que enviamos el id
				//add la recibiremos cuando una insercion fue exitosa
				//edi la recibiremos cuando una actualizacion fue exitosa
				success: function(datos){

					$('#id').val(datos.id_usuario);
					//en el input del formulario con id "id" colocamos la informacion del campo id_alumno
					$('#correo').val(datos.correo);
					//en el input del formulario con id "apellido" colocamos la informacion del campo apellido
					$('#dui_persona').val(datos.dui_persona);
					//en el input del formulario con id "sexo" colocamos la informacion del campo id_sexo
					$('#rol').val(datos.id_rol);
					$('#contrasenna').val(datos.clave);
				}
			});
		});//fin de evento editar


			});//fin de document.ready


		</script>