<script>
	$(document).ready(function(){

		mostrarPiezas();

		function mostrarPiezas(){
			$.ajax({

				type: 'ajax',

				url: '<?= base_url('piezaC/get_pieza')?>',

				dataType: 'json',

				success: function(datos){

					var tabla = '';

					var i;

					var n=1;

					for(i=0; i<datos.length; i++){

						tabla +=
						'<tr class="bg-dark">'+
						'<td>'+datos[i].nombre_pieza+'</td>'+
						'<td>'+datos[i].nombre_categoria+'</td>'+

						'<td>'+'<a href="javascript:;" class="btn btn-danger btn-sm borrar" data="'+datos[i].Id_pieza+'">Eliminar</a>'+'</td>'+
						'<td>'+'<a hret="javascript:;" class="btn btn-info btn-sm item-edit" data="'+datos[i].Id_pieza+'">Editar</a>'+'</td>'

						'</tr>'	

						n++;
					}

					$('#tabla_piezas').html(tabla);
				}



			});

		};

		$('#tabla_piezas').on('click', '.borrar', function(){

			$id=$(this).attr('data');
			$('#modalBorrar').modal('show');

			$('#btnBorrar').unbind().click(function(){

				$.ajax({
					type:'ajax',

					method: 'post',

					url: '<?= base_url('piezaC/eliminar')?>',

					data: {id:$id},

					dataType: 'json',

					success: function(respuesta){
						$('#modalBorrar').modal('hide');

						if(respuesta==true){
							alertify.notify('Eliminado Exitosamente', 'success', 10, null);

							mostrarPiezas();
						}else{
							alertify.notify('Error al eliminar!', 'error', 10, null);
						}
					}
				});

			});
		});


		$('#nuePie').click(function(){

			//mostramos el modal que tiene el formulario para ingresar un poliza
			$('#pieza').modal('show');
			$('#oculto').show();
			$('#formPieza')[0].reset();
			//modificamos el titulo del modal
			$('#pieza').find('.modal-title').text('Nueva Pieza');
			//modificamos el atributo action, le agregamos la ruta del controlador y modelo para ingresar
			$('#formPieza').attr('action','<?= base_url('piezaC/ingresar')?>');
		});



		get_categoria();

		function get_categoria(){

			$.ajax({
				
				type: 'ajax',
				
				url: '<?= base_url('piezaC/get_categoria') ?>',
				//Tipo de respuesta que recibiremos
				dataType: 'json',

				
				success: function(datos){
					
					var op = '';

					var i;

					
					op +="<option value=''>--Seleccione una Categoria--</option>";

					for(i=0; i<datos.length; i++){
						//en la variable op vamos guardando cada registro obtenido del modelo
						op +="<option value='"+datos[i].id_categoria+"'>"+datos[i].nombre_categoria+"</option>";
					}
					//al select con el id curso le entregamos la variable op que contiene los option
					$('#categoria').html(op);
				}
			});
		}//fin de funcion para mostrar cursos



		$('#btnGuardar').click(function(){

			
			$url = $('#formPieza').attr('action');
			//capturamos todos los datos del formulario
			$data = $('#formPieza').serialize();
			if (validarformulario() == true) {
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
					$('#pieza').modal('hide');
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
					$('#formPieza')[0].reset();
					//Actualizar la tabla con el nuevo registro
					mostrarPiezas();
				}
			});
		}
	});



		$('#tabla_piezas').on('click', '.item-edit', function(){
			//para capturar el dato segun el boton que demos click
			var id = $(this).attr('data');

			$('#pieza').modal('show');//Para mostrar el modal 
			

			$('#pieza').find('.modal-title').text('Editar pieza');
			//modificamos el atributo action, le agregamos la ruta del controlador y modelo para actualizar
			$('#formPieza').attr('action','<?= base_url('piezaC/actualizar')?>');

			
			$.ajax({
				//tipo de solicitud a realizar
				type: 'ajax',
				
				method: 'post',
				
				url: '<?= base_url('piezaC/get_datos')?>',

				data: {id:id},
				//Tipo de respuesta que recibiremos
				dataType: 'json',


				success: function(datos){

					$('#id').val(datos.Id_pieza);

					$('#nombre_pieza').val(datos.nombre_pieza);
					//en el input del formulario con id "apellido" colocamos la informacion del campo apellido
					$('#categoria').val(datos.id_categoria);

				}
			});
		});//fin de evento editar


	});




</script>