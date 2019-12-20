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
							<h4 class="page-title">Vehiculos</h4>
							<div class="ml-auto text-right">
								<!-- <nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="<?php echo base_url('Welcome/index');?>">Inicio</a></li>
										<li class="breadcrumb-item active" aria-current="page">Usuarios</li>
									</ol>
								</nav> -->
								<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Nuevo vehiculo</button> 
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
						<div class="col-12">
							<div class="collapse" id="collapseExample">
								<div class="card">
									<div class="card-body wizard-content">
										<h4 class="card-title">Nuevo vehiculo</h4>
										<h6 class="card-subtitle"></h6>
										<form id="example-form"  onsubmit="return validar()" action="<?php echo base_url('vehiculo_controller/ingresar') ?>" method="POST" class="m-t-40">
											<div>

												<h3>VEHICULO</h3>
												<section>
													<label for="userName">Modelo</label>
													<select class="required form-control" name="id_modelo" id="modelo">
														<option value="" class="form-control" ></option>
														<?php foreach ($modelo as $e) { ?>
															<option value="<?= $e->id_modelo ?>"><?= $e->nombre_modelo ?></option>
														<?php }  ?>
													</select>

													<label for="anio">Año</label>
													<input id="anio" name="anio" type="number" class="required form-control" id="anio">

													<label for="confirm">Color</label>
													<input type="text" class="required form-control"  name="color" id="color">

													<label for="confirm">Fecha de ingreso</label>
													<input type="date" class="required form-control"  name="fecha_ingreso" id="fingreso">

													<label for="VIN">VIN</label>
													<input type="text" class="required form-control"  name="VIN" id="vin">

													<label for="id_poliza">Poliza</label>
													<select class="required form-control" name="id_poliza" id="poliza" >
														<option value="" class="form-control" ></option>
														<?php foreach ($poliza as $p) { ?>
															<option value="<?= $p->id_poliza ?>"><?= $p->id_poliza ?></option>
														<?php }  ?>
													</select>

												</section>

												<h3>Siguientes</h3>
												<section>
													<label for="id_clase">Clase</label>
													<select class="required form-control" name="id_clase" id="clase">
														<option value="" class="form-control"></option>
														<?php foreach ($clase_vehiculo as $e) { ?>
															<option value="<?= $e->id_clase ?>"><?= $e->nombre_clase ?></option>
														<?php }?>
													</select>

													<label for="millas">Millas</label>
													<input type="text" class="required form-control"  name="millas" id="millas"> 
													<label for="serie">Serie </label>
													<input type="number" class="required form-control"  name="serie" id="serie">

													<label for="id_tipo_transmision">Tipo Transmision</label>
													<select class="required form-control"name="id_tipo_transmision" id="transmision">
														<option value="" class="form-control" >Transmision</option>
														<?php foreach ($transmision as $e) { ?>
															<option value="<?= $e->id_transmision ?>"><?= $e->tipo_transmision ?></option>
														<?php }  ?>
													</select>

													<label for="id_tipo_motor">Tipo Motor</label>
													<select class="required form-control" name="id_tipo_motor" id="tm">
														<option value="" class="form-control" >Tipo Motor</option>
														<?php foreach ($tipo_motor as $e) { ?>
															<option value="<?= $e->id_tipo_motor ?>"><?= $e->nombre_tipo_motor ?></soption>
															<?php }  ?>
														</select>

													</section>
													<h3>Siguiente</h3>
													<section>
														<label for="serial">Serial</label>
														<input type="text" class="required form-control"  name="serial" id="serial">
														<label for="id_ingreso1">Comprobante</label>
														<select class="form-control" name="id_ingreso1" id="ncomprobante" required>
															<option value="" class="required form-control" ></option>
															<?php foreach ($ingreso as $e) { ?>
																<option value="<?= $e->id_ingreso ?>"><?= $e->num_comprobante ?></option>
															<?php }  ?>
														</select>

														<label for="precio_ingreso">Precio ingreso</label>
														<input type="number" class="required form-control"  name="precio_ingreso" id="pingreso">
														<div class="d-lg-none">

															<input type="submit" id="guardar" value="Guardar" class="btn btn-info">
														</div>
													</section>
												</div>
											</form>
										</div>
									</div>
								</div>						
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Vehiculos</h4>
										<div class="table-responsive">
											<table id="zero_config" class="table table-bordered table-striped table-dark">
												<thead>
													<th>N°</th>
													<th>Nombre del Modelo</th>
													<th>Año</th>
													<th>Color</th>
													<th>Fecha de Ingreso</th>
													<th>VIN</th>
													<th>Poliza</th>
													<th>Clase</th>
													<th>Millas</th>
													<th>Serie</th>
													<th>Tipo Transmision</th>
													<th>Tipo Motor</th>
													<th>Serial</th>
													<th>Comprobante</th>
													<th>Precio Ingreso</th>
													<th class="text-center">Eliminar</th>
													<th class="text-center">Actualizar</th>


												</thead>
												<?php foreach ($vehiculo as $valor) { ?>
													<tbody>
														<tr>
															<td><?= $valor->id_vehiculo?></td>
															<td><?= $valor->nombre_modelo?></td>
															<td><?= $valor->anio?></td>
															<td><?= $valor->color?></td>
															<td><?= $valor->fecha_ingreso?></td>
															<td><?= $valor->VIN ?></td>
															<td><?= $valor->id_poliza?></td>
															<td><?= $valor->nombre_clase?></td>
															<td><?= $valor->millas?></td>
															<td><?= $valor->serie?></td>
															<td><?= $valor->tipo_transmision?></td>
															<td><?= $valor->nombre_tipo_motor ?></td>
															<td><?= $valor->serial ?></td>
															<td><?= $valor->num_comprobante ?></td>
															<td><?= $valor->precio_ingreso ?></td>

															<td><a onclick="alerta_eliminar('<?= $valor->id_vehiculo ?>')" class="btn btn-danger">ELIMINAR</a></td>
															<td><a  href="<?php echo base_url('/vehiculo_controller/get_datos/'.$valor->id_vehiculo) ?>"class="btn btn-info">ACTUALIZAR</a></td>


														</tr>
													</tbody>
												<?php }  ?>
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