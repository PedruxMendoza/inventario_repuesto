<script>
	$(document).ready(function () {

		$('#nueva_venta').click(function () {
			$('#venta').modal('show');
			$('#venta').find('.modal-title').text('Definir datos');
			/*$('#formAlumno').attr();*/ //captura los datos de el atrubuto
			$('#formVenta').attr('action','<?= base_url('vender_controller/ingresar') ?>');
		});

		get_persona();

		function get_persona() {
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('vender_controller/get_persona');?>',
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
				url: '<?= base_url('vender_controller/get_vendedor');?>',
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
				url: '<?= base_url('vender_controller/get_pieza');?>',
				dataType: 'json',

				success:function (datos) {
					var op ='';
					var i;
					op += '<option value='+'>--Seleccione el Vendedor--</option>';
					for (i = 0; i < datos.length ; i++) {
						op += '<option value='+datos[i].Id_pieza+'>'+datos[i].nombre_pieza+'</option>';
					}
					$('#pieza').html(op);
					$('#addpieza').html(op);
				}
			});
		}

		$("#pieza").change(function () {
			var id = $("#pieza").val();

			$.ajax({
				type: 'ajax',
				method: 'post',
				data: {id:id},
				url: '<?= base_url('vender_controller/get_precio') ?>',
				dataType: 'json',

				success:function(datos) {
					$('#precio_venta').val(datos.precio_venta);
				}
			});
			$.ajax({
				type: 'ajax',
				method: 'post',
				data: {id:id},
				url: '<?= base_url('vender_controller/get_nombre') ?>',
				dataType: 'json',

				success:function(datos) {
					$('#nombre_pieza').val(datos.nombre_pieza);
				}
			});

		});

		$("#dui").change(function () {
			var id = $("#dui").val();

			$.ajax({
				type: 'ajax',
				method: 'post',
				data: {id:id},
				url: '<?= base_url('vender_controller/get_comprador') ?>',
				dataType: 'json',

				success:function(datos) {
					$('#nom_com').val(datos.comprador);
				}
			});
		});
		$("#usuario").change(function () {
			var id = $("#usuario").val();

			$.ajax({
				type: 'ajax',
				method: 'post',
				data: {id:id},
				url: '<?= base_url('vender_controller/get_vendedor') ?>',
				dataType: 'json',

				success:function(datos) {
					$('#nom_vende').val(datos.vendedor);
				}
			});
		});

		$("#btnGuardar").click(function () {
			$url = $('#formVenta').attr('action');
			$data = $('#formVenta').serialize();
			if (validar2()==true) {
			$.ajax({
				type: 'ajax',
				method: 'post',
				url: '<?= base_url('vender_controller/ingresar') ?>',
				data: $data,
				dataType: 'json',

				success:function (respuesta) {
					$("#venta").modal('hide');
					if (respuesta=='add') {
						location.replace("<?= base_url('vender_controller/index') ?>");
					}else{
						alertify.notify('Error al vender','success',10,null);
					}
					$('#formVenta')[0].reset();
				}
			});
			}
		});


		$('#agregar').click(function () {
			$('#agregar_producto').modal('show');
			$('#agregar_producto').find('.modal-title').text('agregar nueva prieza');
			/*$('#formAlumno').attr();*/ //captura los datos de el atrubuto
			$('#formAgregar').attr('action','<?= base_url('vender_controller/agregar_producto') ?>');
		});

		$("#addpieza").change(function () {
			var id = $("#addpieza").val();
			$.ajax({
				type: 'ajax',
				method: 'post',
				data: {id:id},
				url: '<?= base_url('vender_controller/get_precio') ?>',
				dataType: 'json',

				success:function(datos) {
					$('#addprecio_venta').val(datos.precio_venta);
				}
			});
			$.ajax({
				type: 'ajax',
				method: 'post',
				data: {id:id},
				url: '<?= base_url('vender_controller/get_nombre') ?>',
				dataType: 'json',

				success:function(datos) {
					$('#addnombre_pieza').val(datos.nombre_pieza);
				}
			});
		});

		$("#btnAgregar").click(function () {
			$url = $('#formAgregar').attr('action');
			$data = $('#formAgregar').serialize();

			if(validar()==true){
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: $url,
					data: $data,
					dataType: 'json',

					success:function (respuesta) {
						$("#agregar_producto").modal('hide');
						if (respuesta=='adda') {
							alertify.notify('Agregado Exitosamente','success',10,null);
							location.replace("<?= base_url('vender_controller/index');?>");
						}else{
							alertify.notify('Error al Agregar','success',10,null);
						}
						$('#formAgregar')[0].reset();
					}
				});
			}
		});

/*		$("#addcantidad").keyup(function () {
			var id = $("#addpieza").val();
			var can = $("#addcantidad").val();
			$.ajax({
				type: 'ajax',
				method: 'post',
				data: {id:id},
				url: '<?= base_url('vender_controller/get_precio') ?>',
				dataType: 'json',

				success:function(datos) {
					if (can >= datos.stock) {
						$("#mensaje").html("No hay suficientes productos");
						$("#btnAgregar").hide();
					}else if (can <= datos.stock) {
						$("#mensaje").html("hay suficientes productos");
						$("#btnAgregar").show();
					}if(can < 0){
						$("#mensaje").html("escoja datos positivos");
						$("#btnAgregar").hide();
					}
				}
			});
		});*/
		function disponibilidadCant($cant){
      //Creamos una variable llamada $id en la cual guardaremos el valor digitado en el input
      //dicha variable sera la enviada a la consulta para validar si existe un correo similar
      var id = $("#addpieza").val();
      $.ajax({
      	type: 'ajax',
      	method: 'post',
      	data: {id:id},
      	url: '<?= base_url('vender_controller/get_precio') ?>',
      	dataType: 'json',

      	success:function(datos) {
      		var stock = parseInt (datos.stock);
      		var cant = parseInt ($cant);
      		if (stock < cant) {
      			$("#mensaje").html("No hay suficientes productos");
      			$("#btnAgregar").hide();
      			$r = false;
      			console.log(datos.stock);
      			console.log($cant);
      		}else if (stock >= cant ) {
      			$("#mensaje").html("hay suficientes productos");
      			$("#btnAgregar").show();
      			console.log(stock);
      			console.log(cant);
      			$r = true;
      		}
      	}
      });
      return $r;
  };		

  $("#addcantidad").on("blur", function(){
  	var value = $(this).val();
  	$resp = disponibilidadCant(value);
  	console.log($resp);
  });
});
</script>