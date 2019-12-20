<?php 
if (isset($msj)) {
	if($msj=='success') { ?>
		<script>
			Swal.fire({
				title: 'Agregado correctamente!!!',
				text: "Se ha insertado correctamente el dato",
				icon: 'success',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../modeloC/index" ; /*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php } 

	if($msj=='successE') { ?>
		<script>
			Swal.fire({
				title: 'Eliminado correctamente!!!',
				text: "Se ha Eliminado correctamente el dato",
				icon: 'success',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../../modeloC/index" ; /*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php } 

	if($msj=='errorE') { ?>
		<script>
			Swal.fire({
				title: 'Error al Eliminar!!!',
				text: "No se ha podido eliminar porque esta relacionado con una tabla",
				icon: 'error',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../../modeloC/index" ; /*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php } 

	if ($msj=='modi') { ?>
		<script>
			Swal.fire({
				title: 'Modificado correctamente!!!',
				text: "Se ha modificado correctamente el dato",
				icon: 'success',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../modeloC/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>

	<?php }

	if ($msj=='ErrorM') { ?>
		<script>
			Swal.fire({
				title: 'Error al Modificar!!!',
				text: "No se han realizado modificaciones",
				icon: 'error',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../modeloC/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php }
}
?>
<!-- PEGAR AQUI ALERTAS DE ELIMINAR (CREADAS EN LAS VISTAS) -->
<script>
	function alerta_eliminar(id){
		Swal.fire({
			title: 'Esta seguro que desea ',
			text: "eliminar?, Esta accion no se podra deshacer!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, eliminar!'
		}).then((result) => {
			if (result.value) {
				window.location.href = "../modeloC/eliminar/"+id;
			}
		})
	}
</script>