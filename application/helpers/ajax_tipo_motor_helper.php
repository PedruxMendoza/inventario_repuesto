<script>
	$(document).ready(function(){

		mostrarTipo_motor();

		function mostrarTipo_motor(){

			$.ajax({

				type: 'ajax',

				url: '<?= base_url('tipo_motorC/get_tipo_motor')?>',

				dataType: 'json',

				success: function(datos){

					var tabla= '';

					var i;

					var n=1;

					for(i=0; i<datos.length; i++){

						tabla +=
						'<tr class="bg-dark">'+
						'<td>'+datos[i].nombre_tipo_motor+'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-danger btn-sm borrar" data="'+datos[i].id_tipo_motor+'">Eliminar</a>'+'</td>' +
						'<td>'+'<a href="javascript:;" class="btn btn-info btn-sm item-edit " data="'+datos[i].id_tipo_motor+'">Editar</a>'+'</td>' +
						'</tr>';

						n++;
					}

					$('#tabla_tipo_motors').html(tabla);

				}

				
			});

		}

		$('#tabla_tipo_motors').on('click', '.borrar', function(){

			$id=$(this).attr('data');
			$('#modalBorrar').modal('show');

			$('#btnBorrar').unbind().click(function(){

				$.ajax({
					type:'ajax',

					method: 'post',

					url: '<?= base_url('tipo_motorC/eliminar')?>',

					data: {id:$id},

					dataType: 'json',

					success: function(respuesta){
						$('#modalBorrar').modal('hide');

						if(respuesta==true){
							alertify.notify('Eliminado Exitosamente', 'success', 10, null);

							mostrarTipo_motor();
						}else{
							alertify.notify('Error al eliminar!', 'error', 10, null);
						}
					}
				});

			});
		});


		$('#nueTm').click(function(){

			
			$('#tipo_motor').modal('show');
			$('#oculto').show();

			$('#formTipo_motor')[0].reset();

			$('#tipomotor').find('.modal-title').text('Nuevo Contenedor');

			$('#formTipo_motor').attr('action','<?= base_url('tipo_motorC/ingresar')?>');
		});

		$('#btnGuardar').click(function(){

			$url = $('#formTipo_motor').attr('action');
			
			$data = $('#formTipo_motor').serialize();

			if(validar() == true){
				$.ajax({
					
					type: 'ajax',
					
					method: 'post',
					
					url: $url,
					
					data: $data,
					
					dataType: 'json',

					
					success: function(respuesta){
						
						$('#tipo_motor').modal('hide');
						
						if(respuesta=='add'){
							
							alertify.notify('Ingresado exitosamente!', 'success',10, null);
						}else if(respuesta=='edi'){
							
							alertify.notify('Actualizado exitosamente!', 'success',10, null);
						}else{
							
							alertify.notify('error al ingresar!', 'error',10, null);
						}
						
						$('#formTipo_motor')[0].reset();
						
						mostrarTipo_motor();
					}
				});
			}
		});

		$('#tabla_tipo_motors').on('click', '.item-edit', function(){
			
			var id = $(this).attr('data');

			$('#tipo_motor').modal('show');

			$('#tipo_motor').find('.modal-title').text('Editar motor');
			
			$('#formTipo_motor').attr('action','<?= base_url('tipo_motorC/actualizar')?>');

			
			$.ajax({
				
				type: 'ajax',
				
				method: 'post',
				
				url: '<?= base_url('tipo_motorC/get_datos')?>',

				data: {id:id},
				
				dataType: 'json',


				success: function(datos){

					$('#id').val(datos.id_tipo_motor);

					$('#nombre_tipo_motor').val(datos.nombre_tipo_motor);
					


				}
			});
		});


	});

</script>