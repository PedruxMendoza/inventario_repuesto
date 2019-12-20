<script>
	$(document).ready(function(){

		//llamamos a la funcion que muestra a TODOS los polizas en la tabla
		mostrarPolizas();

		//Funcion para mostrar polizas
		function mostrarPolizas(){
			//Definimos que trabajaremos con ajax
			$.ajax({
				//tipo de solicitud a realizar
				type: 'ajax',
				//direccion donde definiremos el controlador y metodo para obtener los polizas
				url: '<?= base_url('polizaC/get_poliza') ?>',
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
						'<td>'+n+'</td>'+
						'<td>'+datos[i].id_poliza+'</td>'+
						'<td>'+datos[i].nombre_contenedor+'</td>'+
						'<td>'+datos[i].cantidad+'</td>'+
						'<td>'+datos[i].peso+'</td>'+
						'<td>'+datos[i].doc_transporte+'</td>'+
						//creamos un boton para eliminar y editar
						//tome en cuenta que cada boton tiene la clase borrar y item-edit segun la accion que corresponda
						'<td>'+'<a href="javascript:;" class="btn btn-danger btn-sm borrar" data="'+datos[i].id_poliza+'">Eliminar</a>'+
						'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-info btn-sm item-edit" data="'+datos[i].id_poliza+'">Editar</a>'+
						'</td>'+
						'</tr>';
						//incrementamos la variable que nos sirve de correlativo
						n++;
					}
					//en la vista la etiqueta <tbody> contiene el id "tabla_polizas"
					//con esta linea entregamos la variable que contiene el cuerpo de la tabla
					$('#tabla_polizas').html(tabla);
				}
			});
		};//fin de funcion mostrar polizas


//**************************************************************************************************************

		//cuando damos click al boton eliminar de cada registro de la tabla_polizas se ejecutara lo siguiente
		$('#tabla_polizas').on('click', '.borrar', function(){

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
					url: '<?php echo base_url('polizaC/eliminar')?>',
					//datos a enviar, $id es el valor capturado anteriomente del boton
					data: {id:$id},
					//Tipo de respuesta que recibiremos
					dataType: 'json',

				//Si la peticion fue exitosa recibiremos una respuesta, en este caso en la variable "respuesta" recibiremos 
				//TRUE o FALSE que nos devolvera el modelo
				success: function(respuesta){
						$('#modalBorrar').modal('hide'); //Para ocultar el modal
						mostrarPolizas();
						//si la respuesta que recibimos del modelo es TRUE, mostramos una alerta indicando
						//que el registro fue eliminado exitosamente
						//success tipo de notificacion ---- 10 segundos a mostrar la alerta
						if(respuesta==true){
							alertify.notify('Eliminado exitosamente!', 'success', 10, null);
							//Llamamos a la funcion para mostrar los polizas y asi actualizar SOLO LA TABLA y NO TODA LA PAGINA
							
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


//agregamos un evento al boton para agregar nuevo poliza
$('#nuePolx').click(function(){

			//mostramos el modal que tiene el formulario para ingresar un poliza
			$('#poliza').modal('show');
			$('#oculto').show();

			//modificamos el titulo del modal
			$('#poliza').find('.modal-title').text('Nuevo Poliza');
			//modificamos el atributo action, le agregamos la ruta del controlador y modelo para ingresar
			$('#formPoliza').attr('action','<?= base_url('polizaC/ingresar')?>');
		});


		get_tipo_contenedor();//llamado a la funcion para mostrar sexos

		function get_tipo_contenedor(){
			//Definimos que trabajaremos con ajax
			$.ajax({
				//tipo de solicitud a realizar
				type: 'ajax',
				//direccion hacia donde enviaremos la informacion (controlador/metodo)
				url: '<?= base_url('polizaC/get_tipo_contenedor') ?>',
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
					op +="<option value=''>--Seleccione un contenedor--</option>";
					//recorremos los datos recibidos, con datos.length obtenemos la longitud del arreglo
					//osea, numero de registros recibidos
					for(i=0; i<datos.length; i++){
						//en la variable op vamos guardando cada registro obtenido del modelo
						op +="<option value='"+datos[i].id_tipo_contenedor+"'>"+datos[i].nombre_contenedor+"</option>";
					}
					//al select con el id curso le entregamos la variable op que contiene los option
					$('#nombre_contenedor').html(op);
				}
			});
		}//fin de funcion para mostrar cursos

		//agregamos un evento al boton del modal GUARDAR
		$('#btnGuardar').click(function(){

			//capturamos lo que este en el atributo action del formulario
			$url = $('#formPoliza').attr('action');
			//capturamos todos los datos del formulario
			$data = $('#formPoliza').serialize();

			if(validarpoliza() == true){
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
					$('#poliza').modal('hide');
					mostrarPolizas();
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
					$('#formPoliza')[0].reset();
					//Actualizar la tabla con el nuevo registro
					
					
				}
			});
		}
		});//fin evento del boton guardar del modal

		// =============================================================================================
		//cuando damos click al boton de editar de cada registro de la tabla_polizas se ejecutara lo siguiente	
		$('#tabla_polizas').on('click', '.item-edit', function(){
			//para capturar el dato segun el boton que demos click
			var id = $(this).attr('data');

			$('#poliza').modal('show');//Para mostrar el modal 
			//en el modal que tiene id llamado poliza buscamos la clase "modal-title" y le agregamos el texto del encabezado
			//$('#').attr()
			$('#oculto').hide();
			$('#poliza').find('.modal-title').text('Editar poliza');
			//modificamos el atributo action, le agregamos la ruta del controlador y modelo para actualizar
			$('#formPoliza').attr('action','<?= base_url('polizaC/actualizar')?>');

			//Definimos que trabajaremos con ajax
			$.ajax({
				//tipo de solicitud a realizar
				type: 'ajax',
				//metodo de envio de los datos (puede ser get)
				method: 'post',
				//direccion hacia donde enviaremos la informacion (controlador/metodo)
				url: '<?= base_url('polizaC/get_datos')?>',
				//datos a enviar, id contiene el id del registro que queremos obtener los datos para mostrarlos en el modal
				data: {id:id},
				//Tipo de respuesta que recibiremos
				dataType: 'json',

				//Si la peticion fue exitosa recibiremos una respuesta, en este caso en la variable "datos" recibiremos la palabra los datos del registro que enviamos el id
				//add la recibiremos cuando una insercion fue exitosa
				//edi la recibiremos cuando una actualizacion fue exitosa
				success: function(datos){
					//en el input del formulario con id "id" colocamos la informacion del campo id_poliza
					$('#id_poliza2').val(datos.id_poliza);
					//en el input del formulario con id "nombre" colocamos la informacion del campo nombre
					$('#nombre_contenedor').val(datos.id_tipo_contenedor);
					//en el input del formulario con id "apellido" colocamos la informacion del campo apellido
					$('#cantidad').val(datos.cantidad);
					//en el input del formulario con id "sexo" colocamos la informacion del campo id_sexo
					$('#peso').val(datos.peso);
					//en el input del formulario con id "curso" colocamos la informacion del campo id_curso
					$('#doc_transporte').val(datos.doc_transporte);
				}
			});
		});//fin de evento editar


	});

</script>