<script>
	
	$(document).ready(function(){

		mostrarClase_vehiculos();

		function mostrarClase_vehiculos(){


			$.ajax({

				type: 'ajax',

				url: '<?= base_url('vehiculoC/get_vehiculo')?>',

				dataType: 'json',

				success: function(datos){

					var tabla= '';

					var i;

					var n=1;


					for(i=0; i<datos.length; i++){

						tabla+=
						'<tr class="bg-dark">'+
						'<td>'+datos[i].nombre_clase+'</td>'+

						'<td>'+'<a href="javascript:;" class="btn btn-danger btn-sm borrar" data="'+datos[i].id_clase+'">Eliminar</a>'+'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-info btn-sm item-edit" data="'+datos[i].id_clase+'">Editar</a>'+'<td>'+


						'</tr>';
					}
					$('#tabla_clase_vehiculos').html(tabla);

				}

			});


		}

		$('#tabla_clase_vehiculos').on('click', '.borrar', function(){
			$id = $(this).attr('data');

			$('#modalBorrar').modal('show');

			$('#btnBorrar').unbind().click(function() {

				$.ajax({

					type: 'ajax',

					method: 'post',

					url: '<?php echo base_url('vehiculoC/eliminar')?>',

					data: {id:$id},

					dataType: 'json', 

					success: function(respuesta){
						$('#modalBorrar').modal('hide');

						if(respuesta==true){
							alertify.notify('Eliminado Exittosamente!', 'success', 10, null);

							mostrarClase_vehiculos();
						}else{
							alertify.notify('Error al eliminar!', 'error', 10, null);
						}
					}

				});

			});
		});

		$('#nueCv').click(function(){

			$('#clase_vehiculo').modal('show');
			$('#oculto').show();

			$('#formClase_vehiculo')[0].reset();

			$('#clase_vehiculo').find('.modal-title').text('Nueva Clase de Vehiculo');

			$('#formClase_vehiculo').attr('action','<?= base_url('vehiculoC/ingresar')?>');

		});

		$('#btnGuardar').click(function(){

			$url = $('#formClase_vehiculo').attr('action');

			$data = $('#formClase_vehiculo').serialize();
			if(validar() == true){
				$.ajax({

					type: 'ajax',

					method: 'post',

					url: $url,

					data: $data,

					dataType: 'json',

					success: function(respuesta){

						$('#clase_vehiculo').modal('hide');

						if(respuesta=='add'){

							alertify.notify('Ingresado Exitosamente!', 'success', 10, null);

						}else if(respuesta=='edi'){
							alertify.notify('Actualizado Correctamente!', 'success', 10, null);
						}else{
							alertify.notify('Error al ingresar!', 'error',10,null);
						}

						$('#formClase_vehiculo')[0].reset();

						mostrarClase_vehiculos();
					}

				});
			}
		});

		$('#tabla_clase_vehiculos').on('click', '.item-edit', function(){

			var id= $(this).attr('data');

			$('#clase_vehiculo').modal('show');

			$('#oculto').hide();

			$('clase_vehiculo').find('.modal-title').text('Editar Clase Vehiculo');

			$('#formClase_vehiculo').attr('action', '<?= base_url('vehiculoC/actualizar')?>');

			$.ajax({

				type: 'ajax',

				method: 'post',

				url: '<?= base_url('vehiculoC/get_datos')?>',

				data: {id:id},

				dataType: 'json',

				success: function(datos){

					$('#id').val(datos.id_clase);

					$('#nombre_clase').val(datos.nombre_clase);
				}
			});

		});






	});





</script>