<script>
	$(document).ready(function () {
		
		venta();
		
		function venta() {
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('venta_controller/get_venta') ?>',
				dataType: 'json',

				success: function(datos) {
					var tabla =  '';
					var i ;
					var n= 1;

					for (i = 0;  i < datos.length; i++) {
						tabla += 
						'<tr>'+
						'<td>'+n+'</td>'+
						'<td>'+datos[i].dui_persona+'</td>'+
						'<td>'+datos[i].comprador+'</td>'+
						'<td>'+datos[i].vendedor+'</td>'+
						'<td>'+datos[i].num_factura+'</td>'+
						'<td>'+datos[i].fecha_hora+'</td>'+
						'<td>'+datos[i].total_venta+'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-success btn-sm Actualizar" data="'+datos[i].id_venta+'">Detalles de pedido</a>'+'</td>'+
						'</tr>';
						n++;
					}
					$('#tabla_ventas').html(tabla);
				}
			});
		};

		/*$('#tabla_ventas').on('click','.borrar',function () {
			var id = $(this).attr('data');
			$('#modalBorrar').modal('show');
			$('#btnBorrar').unbind().click(function () {
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: "<?= base_url('venta_controller/eliminar') ?>" ,
					data: {id:id},
					dataType: 'json',

					success: function(respuesta){
						$('#modalBorrar').modal('hide');
						if (respuesta == true) {
							alertify.notify('Eliminado Exitosamente!','success',10,null);
							venta();
						}else{
							alertify.notify('Error al Eliminar!','error',10,null);
						}
					}
				});
			});	
		});*/

	//-------------guardar --------------------------------------------------

	$('#nueva_venta').click(function () {
		$('#venta').modal('show');
		$('#venta').find('.modal-title').text('Nueva Venta');
			/*$('#formAlumno').attr();*/ //captura los datos de el atrubuto
			$('#formVenta').attr('action','<?= base_url('venta_controller/ingresar') ?>');
		});

	get_persona();

	function get_persona() {
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('venta_controller/get_persona');?>',
			dataType: 'json',

			success:function (datos) {
				var op ='';
				var i;
				op += '<option value='+'>--Seleccione la comprador--</option>';
				for (i = 0; i < datos.length ; i++) {
					op += '<option value='+datos[i].dui_persona+'>'+datos[i].dui_persona+' '+datos[i].nombre1+' '+datos[i].nombre2+' '+datos[i].apellido1+' '+datos[i].apellido2+'</option>';
				}
				$('#dui').html(op);
			}
		});
	}

	get_vendedor();

	function get_vendedor() {
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('venta_controller/get_vendedor');?>',
			dataType: 'json',

			success:function (datos) {
				var op ='';
				var i;
				op += '<option value='+'>--Seleccione el Vendedor--</option>';
				for (i = 0; i < datos.length ; i++) {
					op += '<option value='+datos[i].id_usuario+'>'+datos[i].vendedor+'</option>';
				}
				$('#usuario').html(op);
			}
		});
	}


	get_pieza();

	function get_pieza() {
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('venta_controller/get_pieza');?>',
			dataType: 'json',

			success:function (datos) {
				var op ='';
				var i;
				op += '<option value='+'>--Seleccione el Vendedor--</option>';
				for (i = 0; i < datos.length ; i++) {
					op += '<option value='+datos[i].Id_pieza+'>'+datos[i].nombre_pieza+'</option>';
				}
				$('#pieza').html(op);
			}
		});
	}

	$("#pieza").change(function () {
		var id = $("#pieza").val();

		$.ajax({
			type: 'ajax',
			method: 'post',
			data: {id:id},
			url: '<?= base_url('venta_controller/get_precio') ?>',
			dataType: 'json',

			success:function(datos) {
				$('#precio_venta').val(datos.precio_venta);
			}
		});
	});

	$("#btnGuardar").click(function () {
		$url = $('#formVenta').attr('action');
		$data = $('#formVenta').serialize();

		$.ajax({
			type: 'ajax',
			method: 'post',
			url: '<?= base_url('venta_controller/ingresar') ?>',
			data: $data,
			dataType: 'json',

			success:function (respuesta) {
				$("#venta").modal('hide');
				if (respuesta=='add') {
					alertify.notify('Ingresado Exitosamente','success',10,null);
				}else{
					alertify.notify('Error al Ingresar','success',10,null);
				}
				$('#formVenta')[0].reset();
				venta();
			}
		});
	});
//////--------------------------------------------------------------------------------------
	//perdido
	$("#tabla_ventas").on('click','.Actualizar',function() {
		$("#detalle").modal('show');
		var total = 0 ;
		var id = $(this).attr('data');
		$.ajax({
			type: 'ajax',
			method: 'post',
			data: {id:id},
			url: '<?= base_url('venta_controller/get_detalle') ?>',
			dataType: 'json',

			success: function (datos) {
				tabla = '';
				var i;
				var n=1;
				for (i = 0; i < datos.length ; i++) {
					tabla+=
					'<tr>'+
					'<td>'+n+'</td>'+
					'<td>'+datos[i].num_factura+'</td>'+
					'<td>'+datos[i].nombre_pieza+'</td>'+
					'<td>'+datos[i].cantidad+'</td>'+
					'<td>'+datos[i].precio_venta+'</td>'+
					'<td>'+(datos[i].cantidad)*(datos[i].precio_venta)+'</td>'+
					'</tr>';
					n++;
					total= total + ((datos[i].cantidad)*(datos[i].precio_venta));
				}
				$('#tabla_detalle2').html(tabla);
				$('#total').html(total);
			}
		});
	});


});

</script>