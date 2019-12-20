<script>
	$(document).ready(function () {
				//llamamos a la funcion que muestra a TODOS los alumnos en la tabla
		mostrarIngresos();

		//Funcion para mostrar alumnos
		function mostrarIngresos(){
			//Definimos que trabajaremos con ajax
			$.ajax({
				//tipo de solicitud a realizar
				type: 'ajax',
				//direccion donde definiremos el controlador y metodo para obtener los alumnos
				url: '<?= base_url('IngresoC/get_ingresos') ?>',
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
						'<tr>'+
						'<td>'+datos[i].dui_persona+' --> '+datos[i].proveedor+'</td>'+
						'<td>'+datos[i].fecha_hora+'</td>'+
						'<td>'+datos[i].num_comprobante+'</td>'+
						
						'<td>'+datos[i].total_compra+'</td>'+
						'<td>'+datos[i].estado+'</td>'+

						//creamos un boton para eliminar y editar
						//tome en cuenta que cada boton tiene la clase borrar y item-edit segun la accion que corresponda
						'<td>'+'<a href="javascript:;" class="btn btn-danger btn-sm borrar" data="'+datos[i].id_ingreso+'">Eliminar</a>'+
						'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-info btn-sm item-edit" data="'+datos[i].id_ingreso+'">Editar</a>'+
						'</td>'+
						'</tr>';
						//incrementamos la variable que nos sirve de correlativo
						n++;
					}
					//en la vista la etiqueta <tbody> contiene el id "tabla_alumnos"
					//con esta linea entregamos la variable que contiene el cuerpo de la tabla
					$('#tabla_ingresos').html(tabla);
				}
			});
		};//fin de funcion mostrar Alumnos

	//cuando damos click al boton eliminar de cada registro de la tabla_alumnos se ejecutara lo siguiente
	$('#tabla_ingresos').on('click', '.borrar', function(){

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
					url: '<?php echo base_url('IngresoC/eliminar')?>',
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
							//alertify.notify('Eliminado exitosamente!', 'success', 10, null);
							//Llamamos a la funcion para mostrar los alumnos y asi actualizar SOLO LA TABLA y NO TODA LA PAGINA
							mostrarIngresos();
						}else{
						//si la respuesta que recibimos del modelo es FLASE, mostramos una alerta indicando
						//que el registro no se pudo eliminar
						//error tipo de notificacion ---- 10 segundos a mostrar la alerta							
						//alertify.notify('Error al eliminar!', 'error', 10, null);
					}
				}
			});
				
			});

		});

		$('#nueIng').click(function(){

			//mostramos el modal que tiene el formulario para ingresar un poliza
			$('#ingreso').modal('show');
			$('#oculto').show();

			//modificamos el titulo del modal
			$('#ingreso').find('.modal-title').text('Nuevo Ingreso');
			//modificamos el atributo action, le agregamos la ruta del controlador y modelo para ingresar
			$('#formIngreso').attr('action','<?= base_url('ingresoC/ingresar')?>');
		});

		get_persona();//llamado a la funcion para mostrar sexos

		function get_persona(){
			//Definimos que trabajaremos con ajax
			$.ajax({
				//tipo de solicitud a realizar
				type: 'ajax',
				//direccion hacia donde enviaremos la informacion (controlador/metodo)
				url: '<?= base_url('IngresoC/get_proveedor') ?>',
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
					op +="<option value=''>--Seleccione un Proveedor--</option>";
					//recorremos los datos recibidos, con datos.length obtenemos la longitud del arreglo
					//osea, numero de registros recibidos
					for(i=0; i<datos.length; i++){
						//en la variable op vamos guardando cada registro obtenido del modelo
						
						
						 op +="<option value='"+datos[i].id_proveedor+"'> "+datos[i].dui_persona+" --> "+datos[i].proveedor+"</option>";



					}
					//al select con el id curso le entregamos la variable op que contiene los option
					$('#proveedor').html(op);
				}
			});
		}//fin de funcion para mostrar cursos	

		get_estado();//llamado a la funcion para mostrar sexos

		function get_estado(){
			//Definimos que trabajaremos con ajax
			$.ajax({
				//tipo de solicitud a realizar
				type: 'ajax',
				//direccion hacia donde enviaremos la informacion (controlador/metodo)
				url: '<?= base_url('IngresoC/get_estado') ?>',
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
					op +="<option value=''>--Seleccione un Estado--</option>";
					//recorremos los datos recibidos, con datos.length obtenemos la longitud del arreglo
					//osea, numero de registros recibidos
					for(i=0; i<datos.length; i++){
						//en la variable op vamos guardando cada registro obtenido del modelo
						op +="<option value='"+datos[i].id_estado+"'>"+datos[i].estado+"+</option>";
					}
					//al select con el id curso le entregamos la variable op que contiene los option
					$('#estado').html(op);
				}
			});
		}//fin de funcion para mostrar cursos

		$('#btnGuardar').click(function(){

			//capturamos lo que este en el atributo action del formulario
			$url = $('#formIngreso').attr('action');
			//capturamos todos los datos del formulario
			$data = $('#formIngreso').serialize();

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
					$('#ingreso').modal('hide');
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
					$('#formIngreso')[0].reset();
					//Actualizar la tabla con el nuevo registro
					mostrarIngresos();
				}
			});

		});//fin evento del boton guardar del modal

		$('#tabla_ingresos').on('click', '.item-edit', function(){
			//para capturar el dato segun el boton que demos click
			var id = $(this).attr('data');

			$('#ingreso').modal('show');//Para mostrar el modal 
			//en el modal que tiene id llamado alumno buscamos la clase "modal-title" y le agregamos el texto del encabezado
			$('#ingreso').find('.modal-title').text('Editar Ingreso');
			//modificamos el atributo action, le agregamos la ruta del controlador y modelo para actualizar
	
			$('#formIngreso').attr('action','<?= base_url('IngresoC/actualizar')?>');

			//Definimos que trabajaremos con ajax
			$.ajax({
				//tipo de solicitud a realizar
				type: 'ajax',
				//metodo de envio de los datos (puede ser get)
				method: 'post',
				//direccion hacia donde enviaremos la informacion (controlador/metodo)
				url: '<?= base_url('IngresoC/get_datos')?>',
				//datos a enviar, id contiene el id del registro que queremos obtener los datos para mostrarlos en el modal
				data: {id:id},
				//Tipo de respuesta que recibiremos
				dataType: 'json',

			
				success: function(datos){

					$('#id').val(datos.id_ingreso);
					//en el input del formulario con id "id" colocamos la informacion del campo id_alumno
					$('#proveedor').val(datos.id_proveedor);
					//en el input del formulario con id "apellido" colocamos la informacion del campo apellido
					$('#num_comprobante').val(datos.num_comprobante);
					//en el input del formulario con id "sexo" colocamos la informacion del campo id_sexo
					$('#total_compra').val(datos.total_compra);

					$('#estado').val(datos.id_estado);
					
				}
			});
		});//fin de evento editar

	});
</script>