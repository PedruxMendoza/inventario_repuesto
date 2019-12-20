<script src="<?php echo base_url('props/js/pvehiculo.js'); ?>"></script>
<?php $this->load->helper("ajax_pieza_vehiculo") ?>
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
							<h4 class="page-title">pieza vehiculo</h4>
							<div class="ml-auto text-right">
								<button type="button" class="btn btn-success" id="nuePh">Pieza vehiculo</button>
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
					<!-- ============================================================== -->
					<div class="row">
						<div class="col-12">
							
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">pieza vehiculo</h4>
									<div class="table-responsive">
										<table id="zero_config" class="table table-bordered table-striped table-dark">
											<thead>
												<tr>
													<th>Pieza</th>
													<th>Modelo</th>
													<th>Marca</th>
													<th>Precio Ingreso</th>
													<th>Precio Venta</th>
													<th>Stock</th>
													<th>Eliminar</th>
													<th>Editar</th>
												</tr>
											</thead>
											<tbody id="tabla_pieza_vehiculos">

											</tbody>
										</table>
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

				<body>


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

					<div class="modal fade" id="pieza_vehiculo">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">

								<!-- Modal Header -->
								<div class="modal-header">
									<h4 class="modal-title" style="font-family: 'Montserrat', cursive; color: #a8834c;"></h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>


								<div class="modal-body">
									<form id="formPieza_vehiculo" action="" method="POST" style="font-family: 'Montserrat', cursive; color: #46281e;">
										<input type="hidden" name="id_pieza_vehiculo" id="id" value="0">
										<div class="row">
											<!-- 		====================== -->
											<div class="col">
												<div class="input-group">
													<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Pieza</span>
													<select name="id_pieza" id="nombre_pieza" class="form-control">
														<option value="">-- Seleccione la Pieza--</option>
													</select>
												</div>
											</div>
										</div>
										<br>

		<!-- 				<div class="col">
							<div class="input-group">
								<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Modelo</span>
								<select name="nombre_modelo" id="nombre_modelo" class="form-control">
									<option value="">-- Seleccione un Modelo--</option>
								</select>
							</div>
						</div>

						<br> -->
						<div class="col">
							<div class="input-group">
								<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Marca-Modelo</span>
								<select name="nombre_marca" id="nombre_marca" class="form-control">
									<option value="">-- Marca - Modelo--</option>
								</select>
							</div>
						</div>

						<br><!-- ========================= -->

						<div class="col">
							<div class="input-group">
								<span class="input-group-text"><i class="fa fa-tags">&nbsp</i>Precio Ingreso</span>
								<input type="number" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="precio_ingreso" id="precio_ingreso">
							</div>
						</div>
						<br>
						<div class="col">
							<div class="input-group">
								<span class="input-group-text"><i class="fa fa-tags">&nbsp</i>Precio Venta</span>
								<input type="number" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="precio_venta" id="precio_venta">
							</div>
						</div>
						<br>
						<div class="col">
							<div class="input-group">
								<span class="input-group-text"><i class="fa fa-tags">&nbsp</i>Stock</span>
								<input type="number" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="stock" id="stock">
							</div>
						</div>


						<br>

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

<!-- 
	=============================================================================
-->





<body>
	
	

	<table border="1">


	</table>

	<div class="modal" tabindex="-1" role="dialog" id="modalBorrar">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Confirmacion de Eliminar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						
					</button>
					
				</div>
				<div class="modal-body">
					<p>Realmente desea eliminar el registro?</p>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btnBorrar">Si, Borrar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					
				</div>
				
			</div>
			
		</div>

	</div>


	