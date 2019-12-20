<script>
	$(document).ready(function(){


		mostrarCategorias();

		function mostrarCategorias(){
			$.ajax({

				type: 'ajax',

				url: '<?= base_url('categoriaC/get_categoria') ?>',

				dataType: 'json',

				success: function(datos){

					var tabla='';

					var i;

					var n=1;

					for(i=0; i<datos.length; i++){

						tabla+=
						'<tr class="bg-dark">'+
						'<td>'+datos[i].nombre_categoria+'</td>'+


						'<td>'+'<a href="javascript:;" class ="btn btn-danger btn-sm borrar" data="'+datos[i].id_categoria+'">Eliminar</a>'+'</td>'+

						'<td>'+'<a href="javascript:;" class="btn btn-info item-edit editar" data="'+datos[i].id_categoria+'">Editar</a>'+
						'</td>'+
						'</tr>';

						n++;
					}

					$('#tabla_categorias').html(tabla);
				}

			});
		};


		$('#tabla_categorias').on('click', '.borrar', function(){

			$id = $(this).attr('data');

			$('#modalBorrar').modal('show'); 

			$('#btnBorrar').unbind().click(function() {

				$.ajax({
					
					type: 'ajax',
					
					method: 'post',

					url: '<?php echo base_url('categoriaC/eliminar')?>',
					
					data: {id:$id},

					dataType: 'json',


					success: function(respuesta){
						$('#modalBorrar').modal('hide'); //Para ocultar el modal
						

						if(respuesta==true){
							alertify.notify('Eliminado exitosamente!', 'success', 10, null);
							
							mostrarCategorias();
						}else{

							alertify.notify('Error al eliminar!', 'error', 10, null);
						}
					}
				});
				
			});

		});

		$('#nueCat').click(function(){

			//mostramos el modal que tiene el formulario para ingresar un poliza
			$('#categoria').modal('show');
			//$('#oculto').show();
			$('#formCategoria')[0].reset();
			//modificamos el titulo del modal
			$('#categoria').find('.modal-title').text('Nueva Categoria');
			//modificamos el atributo action, le agregamos la ruta del controlador y modelo para ingresar
			$('#formCategoria').attr('action','<?= base_url('categoriaC/ingresar')?>');
		});


		$('#btnGuardar').click(function(){

			//capturamos lo que este en el atributo action del formulario
			$url = $('#formCategoria').attr('action');
			//capturamos todos los datos del formulario
			$data = $('#formCategoria').serialize();
			if (validarcategoria() == true){
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

				
				success: function(respuesta){
					//Ocultamos el moda, hide significa "oculto"
					$('#categoria').modal('hide');
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
					$('#formCategoria')[0].reset();
					//Actualizar la tabla con el nuevo registro
					mostrarCategorias();
				}
			});
		}
		});//fin evento del boton guardar del modal

		$('#tabla_categorias').on('click', '.item-edit', function(){
			//para capturar el dato segun el boton que demos click
			var id = $(this).attr('data');

			$('#categoria').modal('show');//Para mostrar el modal 
			//en el modal que tiene id llamado poliza buscamos la clase "modal-title" y le agregamos el texto del encabezado
			//$('#').attr()
			//$('#oculto').hide();
			$('#categoria').find('.modal-title').text('Editar categoria');
			//modificamos el atributo action, le agregamos la ruta del controlador y modelo para actualizar
			$('#formCategoria').attr('action','<?= base_url('categoriaC/actualizar')?>');

			//Definimos que trabajaremos con ajax
			$.ajax({
				//tipo de solicitud a realizar
				type: 'ajax',
				//metodo de envio de los datos (puede ser get)
				method: 'post',
				//direccion hacia donde enviaremos la informacion (controlador/metodo)
				url: '<?= base_url('categoriaC/get_datos')?>',
				//datos a enviar, id contiene el id del registro que queremos obtener los datos para mostrarlos en el modal
				data: {id:id},
				//Tipo de respuesta que recibiremos
				dataType: 'json',

				//Si la peticion fue exitosa recibiremos una respuesta, en este caso en la variable "datos" recibiremos la palabra los datos del registro que enviamos el id
				//add la recibiremos cuando una insercion fue exitosa
				//edi la recibiremos cuando una actualizacion fue exitosa
				success: function(datos){
					//en el input del formulario con id "id" colocamos la informacion del campo id_poliza
					$('#id').val(datos.id_categoria);
					//en el input del formulario con id "nombre" colocamos la informacion del campo nombre
					$('#nombre_categoria').val(datos.nombre_categoria);
					//en el input del formulario con id "apellido" colocamos la informacion del campo apellido
					
				}
			});
		});//fin de evento editar

		

	});



</script>