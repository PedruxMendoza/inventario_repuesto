<?php $this->load->helper('ajax_ingreso'); ?>
<body>
	<button type="button" class="btn btn-success" id="nueIng">Nuevo</button>
	<table border="1">
		<thead>
			<tr>
				<td>Proveedor</td>
				<td>Fecha Hora</td>
				<td>Numero Comprobante</td>
				<td>Total Compra</td>
				<td>Estado</td>
<!-- 				<td>Eliminar</td>
				<td>Editar</td> -->
			</tr>
		</thead>
		<tbody id="tabla_ingresos">
			
		</tbody>
	</table>

		<div class="modal" tabindex="-1" role="dialog" id="modalBorrar">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Confirmacion de eliminar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Realmente desea eliminar el registro?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btnBorrar">Si, borrar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="ingreso">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title" style="font-family: 'Montserrat', cursive; color: #a8834c;"></h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<form id="formIngreso" action="" method="POST" style="font-family: 'Montserrat', cursive; color: #46281e;">
						<input type="hidden" name="id_ingreso" id="id" value="0">
						<div class="row">
							<div class="col">
								<div class="input-group">
									<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Proveedor</span>
									<select name="proveedor" id="proveedor" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
										<option value="">-- Seleccione Proveedor --</option>
									</select>
								</div>
							</div>

						</div>
						<br>
						<div class="row">
							<div class="col">
								<div class="input-group">
									<span class="input-group-text"><i class="fa fa-tags">&nbsp</i>Numero Comprobante</span>
									<input type="number" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="num_comprobante" id="num_comprobante">
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col">
								<div class="input-group">
									<span class="input-group-text"><i class="fa fa-tags">&nbsp</i>Total Compra</span>
									<input type="number" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="total_compra" id="total_compra">
								</div>
							</div>
						</div>

						<br>
						<div class="row">
							<div class="col">
								<div class="input-group">
									<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Estado</span>
									<select name="estado" id="estado" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
										<option value="">-- Seleccione Estado --</option>
									</select>
								</div>
							</div>

						</div>



					</form>							
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" id="btnGuardar" class="btn btn-primary">Guardar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>		