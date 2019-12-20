<script>
	$(document).ready(function(){

		mostrartransmision();

		function mostrartransmision(){

			$.ajax({

				type: 'ajax',

				url: '<?= base_url('transmisionC/get_transmision')?>',

				dataType: 'json',

				success: function(datos){

					var tabla= '';

					var i;

					var n=1;

					for(i=0; i<datos.length; i++){

						tabla +=
						'<tr class="bg-dark">'+
						'<td>'+datos[i].tipo_transmision+'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-danger btn-sm borrar" data="'+datos[i].id_transmision+'">Eliminar</a>'+'</td>' +
						'<td>'+'<a href="javascript:;" class="btn btn-info btn-sm item-edit " data="'+datos[i].id_transmision+'">Editar</a>'+'</td>' +
						'</tr>';

						n++;
					}

					$('#tabla_transmisions').html(tabla);

				}

				

			});

		}

		$('#tabla_transmisions').on('click', '.borrar', function(){

			$id=$(this).attr('data');
			$('#modalBorrar').modal('show');

			$('#btnBorrar').unbind().click(function(){

				$.ajax({
					type:'ajax',

					method: 'post',

					url: '<?= base_url('transmisionC/eliminar')?>',

					data: {id:$id},

					dataType: 'json',

					success: function(respuesta){
						$('#modalBorrar').modal('hide');

						if(respuesta==true){
							alertify.notify('Eliminado Exitosamente', 'success', 10, null);

							mostrartransmision();
						}else{
							alertify.notify('Error al eliminar!', 'error', 10, null);
						}
					}
				});

			});
		});

		$('#nueTr').click(function(){

			$('#transmision').modal('show');
			$('#oculto').show();

			$('#formTransmision')[0].reset();

			$('#transmision').find('.modal-title').text('Nuevo Transmision');

			$('#formTransmision').attr('action','<?= base_url('transmisionC/ingresar')?>');

		});

		$('#btnGuardar').click(function(){

			$url = $('#formTransmision').attr('action');

			$data = $('#formTransmision').serialize();
			if(validar() == true){
				$.ajax({

					type: 'ajax',

					method: 'post',

					url: $url,

					data: $data,

					dataType: 'json',

					success: function(respuesta){

						$('#transmision').modal('hide');

						if(respuesta=='add'){

							alertify.notify('Ingresado Exitosamente!', 'success', 10, null);

						}else if(respuesta=='edi'){
							alertify.notify('Actualizado Correctamente!', 'success', 10, null);
						}else{
							alertify.notify('Error al ingresar!', 'error',10,null);
						}

						$('#formTransmision')[0].reset();

						mostrartransmision();
					}

				});
			}
		});

		$('#tabla_transmisions').on('click', '.item-edit', function(){

			var id= $(this).attr('data');

			$('#transmision').modal('show');

			$('#oculto').hide();

			$('transmision').find('.modal-title').text('Editar Clase Vehiculo');

			$('#formTransmision').attr('action', '<?= base_url('transmisionC/actualizar')?>');

			$.ajax({

				type: 'ajax',

				method: 'post',

				url: '<?= base_url('transmisionC/get_datos')?>',

				data: {id:id},

				dataType: 'json',

				success: function(datos){

					$('#id').val(datos.id_transmision);

					$('#tipo_transmision').val(datos.tipo_transmision);
				}
			});

		});



	});

</script>