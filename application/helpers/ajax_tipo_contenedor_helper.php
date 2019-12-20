<script>
	$(document).ready(function(){

		mostrarTipo_contenedor();

		function mostrarTipo_contenedor(){

			$.ajax({

				type: 'ajax',

				url: '<?= base_url('tipo_contenedorC/get_tipo_contenedor')?>',

				dataType: 'json',

				success: function(datos){

					var tabla= '';

					var i;

					var n=1;

					for(i=0; i<datos.length; i++){

						tabla +=
						'<tr class="bg-dark">'+
						'<td>'+datos[i].nombre_contenedor+'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-danger btn-sm borrar" data="'+datos[i].id_tipo_contenedor+'">Eliminar</a>'+'</td>' +
						'<td>'+'<a href="javascript:;" class="btn btn-info btn-sm item-edit " data="'+datos[i].id_tipo_contenedor+'">Editar</a>'+'</td>' +
						'</tr>';

						n++;
					}

					$('#tabla_tipo_contenedors').html(tabla);

				}

				

			});

		}

		$('#tabla_tipo_contenedors').on('click', '.borrar', function(){

			$id=$(this).attr('data');
			$('#modalBorrar').modal('show');

			$('#btnBorrar').unbind().click(function(){

				$.ajax({
					type:'ajax',

					method: 'post',

					url: '<?= base_url('tipo_contenedorC/eliminar')?>',

					data: {id:$id},

					dataType: 'json',

					success: function(respuesta){
						$('#modalBorrar').modal('hide');

						if(respuesta==true){
							alertify.notify('Eliminado Exitosamente', 'success', 10, null);

							mostrarTipo_contenedor();
						}else{
							alertify.notify('Error al eliminar!', 'error', 10, null);
						}
					}
				});

			});
		});

		$('#nueTc').click(function(){

			
			$('#tipo_contenedor').modal('show');
			$('#oculto').show();

			$('#formTipo_contenedor')[0].reset();

			$('#tipo_contenedor').find('.modal-title').text('Nuevo Contenedor');

			$('#formTipo_contenedor').attr('action','<?= base_url('tipo_contenedorC/ingresar')?>');
		});

		$('#btnGuardar').click(function(){

			$url = $('#formTipo_contenedor').attr('action');
			
			$data = $('#formTipo_contenedor').serialize();

			if(validar() == true){
				$.ajax({
					
					type: 'ajax',
					
					method: 'post',
					
					url: $url,
					
					data: $data,
					
					dataType: 'json',

					
					success: function(respuesta){
						
						$('#tipo_contenedor').modal('hide');
						
						if(respuesta=='add'){
							
							alertify.notify('Ingresado exitosamente!', 'success',10, null);
						}else if(respuesta=='edi'){
							
							alertify.notify('Actualizado exitosamente!', 'success',10, null);
						}else{
							
							alertify.notify('error al ingresar!', 'error',10, null);
						}
						
						$('#formTipo_contenedor')[0].reset();
						
						mostrarTipo_contenedor();
					}
				});
			}
		});

		$('#tabla_tipo_contenedors').on('click', '.item-edit', function(){
			
			var id = $(this).attr('data');

			$('#tipo_contenedor').modal('show');

			$('#tipo_contenedor').find('.modal-title').text('Editar contenedor');
			
			$('#formTipo_contenedor').attr('action','<?= base_url('tipo_contenedorC/actualizar')?>');

			
			$.ajax({
				
				type: 'ajax',
				
				method: 'post',
				
				url: '<?= base_url('tipo_contenedorC/get_datos')?>',

				data: {id:id},
				
				dataType: 'json',


				success: function(datos){

					$('#id').val(datos.id_tipo_contenedor);

					$('#nombre_contenedor').val(datos.nombre_contenedor);
					


				}
			});
		});


	});




</script>