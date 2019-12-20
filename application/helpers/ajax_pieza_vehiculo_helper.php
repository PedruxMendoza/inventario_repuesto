<script>
	$(document).ready(function(){

		mostrarPieza_vehiculos();

		function mostrarPieza_vehiculos(){

			$.ajax({

				type: 'ajax',

				url: '<?= base_url('pieza_vehiculoC/get_pieza_vehiculo') ?>',

				dataType: 'json',

				success: function(datos){

					var tabla = '';

					var i;

					var n=1;

					for(i=0; i<datos.length; i++){

						tabla +=
						'<tr class="bg-dark">'+
						'<td>'+datos[i].nombre_pieza +'</td>'+
						'<td>'+datos[i].nombre_modelo +'</td>'+
						'<td>'+datos[i].nombre_marca +'</td>'+

						'<td>'+datos[i].precio_ingreso+'</td>'+
						'<td>'+datos[i].precio_venta+'</td>'+
						'<td>'+datos[i].stock+'</td>'+

						'<td>'+ '<a href="javascript:;" class="btn btn-danger btn-sm borrar" data="'+datos[i].id_pieza_vehiculo+'">Eliminar</a>'+'</td>'+
						

						'<td>'+'<a href="javascript:;" class="btn btn-info btn-sm item-edit" data="'+datos[i].id_pieza_vehiculo+'">Editar</a>'+'</td>'+

						'</tr>';

						n++;
					}
					$('#tabla_pieza_vehiculos').html(tabla);
				}
			});

		};

		$('#tabla_pieza_vehiculos').on('click', '.borrar', function(){

			$id=$(this).attr('data');

			$('#modalBorrar').modal('show');

			$('#btnBorrar').unbind().click(function(){


				$.ajax({

					type: 'ajax',

					method: 'post',

					url: '<?php echo base_url('pieza_vehiculoC/eliminar')?>',

					data: {id:$id},

					dataType: 'json',

					success: function(respuesta){
						$('#modalBorrar').modal('hide');

						if(respuesta==true){
							alertify.notify('Eliminado Exitosamente!', 'success', 10, null);

							mostrarPieza_vehiculos();
						}else{
							alertify.notify('Error al Eliminar!', 'error', 10, null);
						}
					}

				});
			});
		});

		$('#nuePh').click(function(){
			$('#pieza_vehiculo').modal('show');

			// $('#pieza_vehiculo').modal('hide');


			$('#formPieza_vehiculo')[0].reset();

			$('#pieza_vehiculo').find('.modal-title').text('Nuevo Pieza Vehiculo');

			$('#formPieza_vehiculo').attr('action','<?= base_url('pieza_vehiculoC/ingresar')?>');

		});

		get_pieza();//llamado a la funcion para mostrar sexos

		function get_pieza(){
			//Definimos que trabajaremos con ajax
			$.ajax({
				//tipo de solicitud a realizar
				type: 'ajax',
				//direccion hacia donde enviaremos la informacion (controlador/metodo)
				url: '<?= base_url('pieza_vehiculoC/get_pieza') ?>',
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
					op +="<option value=''>--Seleccione una Pieza--</option>";
					//recorremos los datos recibidos, con datos.length obtenemos la longitud del arreglo
					//osea, numero de registros recibidos
					for(i=0; i<datos.length; i++){
						//en la variable op vamos guardando cada registro obtenido del modelo
						op +="<option value='"+datos[i].Id_pieza+"'>"+datos[i].nombre_pieza+"</option>";
					}
					//al select con el id curso le entregamos la variable op que contiene los option
					$('#nombre_pieza').html(op);
				}
			});
		}//fin de funcion para mostrar cursos

		get_vehiculo();

		function get_vehiculo(){
			$.ajax({


				type: 'ajax',

				url: '<?= base_url('pieza_vehiculoC/get_vehiculo')?>',

				dataType: 'json',

				success: function(datos){
					var op='';

					var i;

					op+="<option value=''>--Seleccione Marca - Modelo --</option>";

					for(i=0; i<datos.length; i++){

						op+="<option value='"+datos[i].id_vehiculo+"'>"+datos[i].nombre_modelo+"--"+datos[i].nombre_marca+"</option>";
					}
					$('#nombre_marca').html(op);
				}
			});
		}

		// get_modelo();

		// function get_modelo(){

		// 	$.ajax({

		// 		type: 'ajax',

		// 		url:'<?= base_url('pieza_vehiculoC/get_modelo')?>',

		// 		dataType: 'json',

		// 		success: function(datos){
		// 			var op = '';

		// 			var i;

		// 			op+="<option value=''>--Seleccione un Modelo--</option>";

		// 			for(i=0; i<datos.length; i++){

		// 				op+="<option value='"+datos[i].id_vehiculo+"'>"+datos[i].nombre_modelo+"</option>";
		// 			}

		// 			$('#nombre_modelo').html(op);
		// 		}
		// 	});
		// }

		// //"-->"+datos[i].nombre_marca+

		// get_marca();

		// function get_marca(){
		// 	$.ajax({


		// 		type: 'ajax',

		// 		url: '<?= base_url('pieza_vehiculoC/get_marca')?>',

		// 		dataType: 'json',

		// 		success: function(datos){
		// 			var op='';

		// 			var i;

		// 			op+="<option value=''>--Seleccione una Marca--</option>";

		// 			for(i=0; i<datos.length; i++){

		// 				op+="<option value='"+datos[i].id_vehiculo+"'>"+datos[i].nombre_marca+"</option>";
		// 			}
		// 			$('#nombre_marca').html(op);
		// 		}
		// 	});
		// }

		$('#btnGuardar').click(function(){

			$url=$('#formPieza_vehiculo').attr('action');

			$data= $('#formPieza_vehiculo').serialize();
			if(validar() == true){
			$.ajax({


				type: 'ajax',

				method: 'post',

				url: $url,

				data: $data,

				dataType: 'json',

				success: function(respuesta){
					$('#pieza_vehiculo').modal('hide');
					if(respuesta=='add'){

						alertify.notify('Ingresado Exitosamente!', 'success', 10, null);
					}else if(respuesta=='edi'){

						alertify.notify('Actualizado Exitosamente!', 'success',10, null);
					}else{

						alertify.notify('error al ingresar!', 'error', 10, null);
					}

					$('#formPieza_vehiculo')[0].reset();

					mostrarPieza_vehiculos();
				}
			});
}
		});


		$('#tabla_pieza_vehiculos').on('click', '.item-edit', function(){
			
			var id = $(this).attr('data');

			$('#pieza_vehiculo').modal('show');

			$('#pieza_vehiculo').find('.modal-title').text('Editar Pieza Vehiculo');
		
			$('#clave').hide();
			$('#formPieza_vehiculo').attr('action','<?= base_url('pieza_vehiculoC/actualizar')?>');

			$.ajax({
			
				type: 'ajax',
			
				method: 'post',

				url: '<?= base_url('pieza_vehiculoC/get_datos')?>',
				
				data: {id:id},
			
				dataType: 'json',


				success: function(datos){

					$('#id').val(datos.id_pieza_vehiculo);

					$('#nombre_pieza').val(datos.id_pieza);
		
					$('#nombre_modelo').val(datos.id_vehiculo);
				
					$('#nombre_marca').val(datos.id_vehiculo);
		
					$('#precio_ingreso').val(datos.precio_ingreso);

					$('#precio_venta').val(datos.precio_venta);
			
					$('#stock').val(datos.stock);
					
				}
			});
		});

	});


</script>	
