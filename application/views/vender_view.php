<script src="<?php echo base_url('props/js/vender.js'); ?>"></script>
<?php $this->load->helper('vender') ?>
	<body>
		<!-- ============================================================== -->
		<!-- Preloader - style you can find in spinners.css -->
		<!-- ============================================================== -->
		<div class="preloader">
			<div class="lds-ripple">
				<div class="lds-pos"></div>
				<div class="lds-pos"></div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- Main wrapper - style you can find in pages.scss -->
		<!-- ============================================================== -->
		<div id="main-wrapper">
			<!-- ============================================================== -->
			<!-- Topbar header - style you can find in pages.scss -->
			<!-- ============================================================== -->
			<header class="topbar" data-navbarbg="skin5">
				<nav class="navbar top-navbar navbar-expand-md navbar-dark">
					<div class="navbar-header" data-logobg="skin5">
						<!-- This is for the sidebar toggle which is visible on mobile only -->
						<a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
						<!-- ============================================================== -->
						<!-- Logo -->
						<!-- ============================================================== -->
						<a class="navbar-brand" href="<?php echo base_url('Welcome/index');?>">
							<!-- Logo icon -->
							<b class="logo-icon p-l-10">
								<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
								<!-- Dark Logo icon -->
								<img src="<?php echo base_url('props/assets/images/logo-icon.png') ?>" alt="homepage" class="light-logo" />

							</b>
							<!--End Logo icon -->
							<!-- Logo text -->
							<span class="logo-text">
								<!-- dark Logo text -->
								<!--                              <img src="<?php echo base_url('props/assets/images/logo-text.png') ?>" alt="homepage" class="light-logo" /> -->
								<?= $this->session->userdata('nombre') ?>

							</span>
							<!-- Logo icon -->
							<!-- <b class="logo-icon"> -->
								<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
								<!-- Dark Logo icon -->
								<!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

								<!-- </b> -->
								<!--End Logo icon -->
							</a>
							<!-- ============================================================== -->
							<!-- End Logo -->
							<!-- ============================================================== -->
							<!-- ============================================================== -->
							<!-- Toggle which is visible on mobile only -->
							<!-- ============================================================== -->
							<a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
						</div>
						<!-- ============================================================== -->
						<!-- End Logo -->
						<!-- ============================================================== -->
						<div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
							<!-- ============================================================== -->
							<!-- toggle and nav items -->
							<!-- ============================================================== -->
							<ul class="navbar-nav float-left mr-auto">
								<li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
							</ul>
							<!-- ============================================================== -->
							<!-- Right side toggle and nav items -->
							<!-- ============================================================== -->
							<ul class="navbar-nav float-right">                        

								<!-- ============================================================== -->
								<!-- User profile and search -->
								<!-- ============================================================== -->
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url('props/assets/images/users/1.jpg') ?>" alt="user" class="rounded-circle" width="31"></a>
									<div class="dropdown-menu dropdown-menu-right user-dd animated">
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo base_url().'loginController/cerrar';?>"><i class="fa fa-power-off m-r-5 m-l-5"></i> Cerrar  sesión</a>
										<div class="dropdown-divider"></div>
									</div>
								</li>
								<!-- ============================================================== -->
								<!-- User profile and search -->
								<!-- ============================================================== -->
							</ul>
						</div>
					</nav>
				</header>
				<!-- ============================================================== -->
				<!-- End Topbar header -->
				<!-- ============================================================== -->
				<!-- ============================================================== -->
				<!-- Left Sidebar - style you can find in sidebar.scss  -->
				<!-- ============================================================== -->
				<?php $this->load->view('template/navbar'); ?>
				<!-- ============================================================== -->
				<!-- End Left Sidebar - style you can find in sidebar.scss  -->
				<!-- ============================================================== -->
				<!-- ============================================================== -->
				<!-- Page wrapper  -->
				<!-- ============================================================== -->
				<div class="page-wrapper">
					<!-- ============================================================== -->
					<!-- Bread crumb and right sidebar toggle -->
					<!-- ============================================================== -->
					<div class="page-breadcrumb">
						<div class="row">
							<div class="col-12 d-flex no-block align-items-center">
								<h4 class="page-title">Realizar Venta</h4>
								<div class="ml-auto text-right">
									<button type="button" class="btn btn-success" id="agregar">agregar carrito</button>
								</div>
							</div>
						</div>
					</div>
					<!-- ============================================================== -->
					<!-- End Bread crumb and right sidebar toggle -->
					<!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <h3><b>Factura</b> <span class="pull-right">#5669626</span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b class="text-danger">Material Pro Admin</b></h3>
                                            <p class="text-muted m-l-5">E 104, Dharti-2,
                                                <br/> Nr' Viswakarma Temple,
                                                <br/> Talaja Road,
                                                <br/> Bhavnagar - 364002</p>
                                        </address>
                                    </div>
                                    <div class="pull-right text-right">
                                        <address>
                                            <h3>To,</h3>
                                            <h4 class="font-bold">Gaala & Sons,</h4>
                                            <p class="text-muted m-l-30">E 104, Dharti-2,
                                                <br/> Nr' Viswakarma Temple,
                                                <br/> Talaja Road,
                                                <br/> Bhavnagar - 364002</p>
                                                <?php date_default_timezone_set("America/El_Salvador"); ?>
                                            <p class="m-t-30"><b>Fecha de Venta :</b> <i class="fa fa-calendar"></i> <?php echo date('l d M Y'); ?></p>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
<tr>
							<th width="40%">Nombre Producto</th>
							<th width="10%">Cantidad</th>
							<th width="20%">Precio</th>
							<th width="15%">Total</th>
							<th width="5%">Quitar</th>
						</tr>
                                            </thead>
                                            <tbody>
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
									echo '<script>location.replace("'.base_url('vender_controller/index').'") ;</script>';
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
<!-- 							<tr style="color: white">
								<td  colspan="3" align="right"><strong>Total</strong></td>
								<td>$<strong style="color:green;"><?=$this->cart->format_number($this->cart->total());?></strong></td>
								<td></td>
							</tr> -->
							<?php

						}else{

							?>
							<tr style="color: white">
								<td colspan="4" style="color: red" align="center"><strong>No hay Producto Agregado!</strong></td>
							</tr>
							<?php

						}

						?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                    	                                <?php if(!empty($this->cart->contents())){ ?>
                                        <hr>
                                        <h3><b>Total :</b> $<?=$this->cart->format_number($this->cart->total());?></h3>
                                                                        <?php } ?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
						<?php if(!empty($this->cart->contents())){ ?>
							<button type="button" class="btn btn-success" id="nueva_venta">finalizar compra</button>
						<?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
			<br>
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
