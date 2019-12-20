<?php $this->load->helper('vender') ?>

<body>
	<center>
		<h1>Realizar Venta</h1>
		
		<div>
			<div>
					<!-- <p>factura: <?= $this->session->userdata('factura'); ?></p>
					<p>fecha: <?= $this->session->userdata('fecha'); ?></p>
					<p>vendedor: <?= $this->session->userdata('vendedor'); ?></p>
					<p>Comprador:  <?= $this->session->userdata('comprador'); ?></p> -->
					<div>
						<button type="button" class="btn btn-success" id="agregar">agregar carrito</button>
						<?php if(!empty($this->cart->contents())){ ?>
							<button type="button" class="btn btn-success" id="nueva_venta">finalizar compra</button>
						<?php } ?>
					</div>
				</div>
				<div class="container">
					<table border="1">
						<tr>
							<th width="40%">Nombre Producto</th>
							<th width="10%">Cantidad</th>
							<th width="20%">Precio</th>
							<th width="15%">Total</th>
							<th width="5%">Quitar</th>
						</tr>

						<?php

						if(isset($_GET['quitar'])){
							foreach ($this->cart->contents() AS $key => $value){
								if($value['rowid'] == $_GET['quitar']){
									$borrar = array(
										'rowid' => $_GET['quitar'],
										'qty'   => 0
									);
									$this->cart->update($borrar);
									echo '<script>alert("El Producto Fue Eliminado!");</script>';
									echo '<script>location.replace("vender_controller") ;</script>';
								}
							}
						}  


						if(!empty($this->cart->contents())){
							$total = 0;
							foreach ($this->cart->contents() AS $key => $value){?>

								<tr>
									<td><?= $value['name'];?></td>
									<td><?= $value["qty"];?></td>
									<td>$<?= $this->cart->format_number($value["price"]);?></td>
									<td>$<?php echo number_format($value["qty"] * $value["price"],2);?></td>
									<td><a class="btn btn-danger" href="?quitar=<?= $value["rowid"];?>">Quitar</a></td>
								</tr>
								<?php
								$data = array('total' => $total =$this->cart->format_number($this->cart->total())); 
							}
							$this->session->set_userdata($data);
							?>
							<tr style="color: white">
								<td  colspan="3" align="right"><strong>Total</strong></td>
								<td>$<strong style="color:green;"><?=$this->cart->format_number($this->cart->total());?></strong></td>
								<td></td>
							</tr>
							<?php

						}else{

							?>
							<tr style="color: white">
								<td colspan="4" style="color: red" align="center"><strong>No hay Producto Agregado!</strong></td>
							</tr>
							<?php

						}

						?>

					</table>
				</div>
			</div>

			<!-- <div>
				<button type="button" class="btn btn-success" id="nueva_venta">Nuevo</button>
			</div> -->





			<div class="modal fade" id="venta">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title" style="font-family: 'Montserrat', cursive; color: #a8834c;"></h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- 	Modal body -->
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
											<input type="hidden" name="nom_com" id="nom_com" value="">
										</div>
									</div>

									<div class="col">
										<div class="input-group">
											<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Vendedor</span>
											<select name="usuario" id="usuario" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
												<option value="">-- Seleccione el vendedor --</option>
											</select>
											<input type="hidden" name="nom_vende" id="nom_vende">
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

						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="button" id="btnGuardar" class="btn btn-primary">Guardar</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>
			</div>


			<div class="modal fade" id="agregar_producto">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title" style="font-family: 'Montserrat', cursive; color: #a8834c;"></h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- 	Modal body -->
						<div class="modal-body">
							<form id="formAgregar" action="" method="POST" style="font-family: 'Montserrat', cursive; color: #46281e;">
								<div class="row my-3">
									<div class="col">
										<div class="input-group">
											<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Nombre de la pieza</span>
											<select name="addpieza" id="addpieza" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
												<option value="">-- Seleccione una Pieza --</option>
											</select>
										</div>
										<input type="hidden" name="addprecio_venta" id="addprecio_venta" value="">
										<input type="hidden" name="addnombre_pieza" id="addnombre_pieza" value="">
									</div>

									<div class="col">
										<div class="input-group">
											<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Cantidad de piezas</span>
											<input type="number" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="addcantidad" id="addcantidad">
											<br>
											<p id="mensaje"></p>
										</div>
									</div>
								</div>
							</form>							
						</div>

						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="button" id="btnAgregar" class="btn btn-primary">Guardar</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>
			</div>
		</center>
	</div>
</body>
</html>
