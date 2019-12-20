<?php $this->load->helper('venta') ?>

<body>
	<center>
		<h1>Tabla de pedidos</h1>
	<!-- <div>
		<button type="button" class="btn btn-success" id="nueva_venta">Nuevo</button>
	</div> -->
	<table border="1">
		<thead>
			<tr>
				<td>n°</td>
				<td>DUI</td>
				<td>Nombre Completo</td>
				<td>Vendedor</td>
				<td>numero de factura</td>
				<td>Fecha</td>
				<td>Total de venta</td>
				<td>Detalles de Pedidos</td>
			</tr>
		</thead>
		<tbody id='tabla_ventas'>
			
		</tbody>
	</table>
</center>
	<!-- modal
		Button trigger modal -->



		<!-- sModal -->
		<div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Confimacion eliminar</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>Realmente deseas borrar</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" id="btnBorrar" data-dismiss="modal">Si borrar</button>
						<button type="button" class="btn btn-primary">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal detalles -->
		<div class="modal fade" id="detalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Detalles de Venta</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<table border="1">
							<thead>
								<tr>
									<td>n°</td>
									<td>Factura</td>
									<td>Pieza</td>
									<td>Cantidad</td>
									<td>Precio de Venta</td>
									<td>SubTotal</td>
								</tr>
							</thead>
							<tbody id="tabla_detalle2">

							</tbody>
							<tfoot>	
								<tr align="right">
									<!-- <td colspan="2">&nbsp;</td> -->
									<td colspan="5">Total de venta:</td>
									<td id="total"></td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>


		<!-- The Modal INgresar-->
		<!-- <div class="modal fade" id="venta">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
		
					Modal Header
					<div class="modal-header">
						<h4 class="modal-title" style="font-family: 'Montserrat', cursive; color: #a8834c;"></h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
		
					Modal body
					<div class="modal-body">
						<form id="formVenta" action="" method="POST" style="font-family: 'Montserrat', cursive; color: #46281e;">
							<input type="hidden" name="id" id="id" value="0">
							<div class="row my-3">
								<div class="col">
									<div class="input-group">
										<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Comprador</span>
										<select name="dui" id="dui" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
											<option value="">-- Seleccione un Comprador --</option>
										</select>
									</div>
								</div>
								
								<div class="col">
									<div class="input-group">
										<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Vendedor</span>
										<select name="usuario" id="usuario" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
											<option value="">-- Seleccione el vendedor --</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row my-3">
								<div class="col">
									<div class="input-group">
										<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Nombre de la pieza</span>
										<select name="pieza" id="pieza" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
											<option value="">-- Seleccione una Pieza --</option>
										</select>
									</div>
									<input type="hidden" name="precio_venta" id="precio_venta" value="">
								</div>
								
								<div class="col">
									<div class="input-group">
										<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Cantidad de piezas</span>
										<input type="number" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="cantidad" id="cantidad">
									</div>
								</div>
							</div>
							<div class="row my-3">
								<div class="col">
									<div class="input-group">
										<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Numero De factura</span>
										<input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="factura" id="factura">
									</div>
								</div>
							</div>
						</form>							
					</div>
		
					Modal footer
					<div class="modal-footer">
						<button type="button" id="btnGuardar" class="btn btn-primary">Guardar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div> -->
	</body>
	</html>
