
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
							<h4 class="page-title">Persona</h4>
							<div class="ml-auto text-right">
								<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
									Nueva Persona
								</button>
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
								<div class="collapse" id="collapseExample">
									<div class="card-body wizard-content">
										<h4 class="card-title">Persona</h4>
										<h6 class="card-subtitle"></h6>
										<form id="example-form" action="<?php echo base_url('persona_controller/ingresar') ?>" method="POST" class="m-t-40" onsubmit="return validarFormulario()">
											<div>
												<h3>Persona</h3>
												<section>

													<label for="userName">DUI</label>
													<input type="text" class="required form-control pull-right"  name="dui_persona" placeholder="Ingrese Dui" id="dui">
				<script type="text/javascript">
                $(function () {
                  var selector = document.getElementById("dui");

                  var im = new Inputmask("99999999-9", { "clearIncomplete": true });
                  im.mask(selector);
                });
              </script>

													<label for="nombre1">Nombre 1</label>
													<input type="text" class="required form-control"  name="nombre1" placeholder="Ingrese Primer Nombre" id="nombre1"> 

													<label for="nombre2">Nombre 2</label>
													<input type="text" class="required form-control"  name="nombre2" placeholder="Ingrese segundo Nombre" id="nombre2">

													<label for="apellido1">Apellido 1</label>
													
													<input type="text" class="required form-control"  name="apellido1" placeholder="Ingrese Primer Nombre" id="apellido1">

													<label for="apellido2">Apellido 2</label>
													<input type="text" class="required form-control"  name="apellido2" placeholder="Ingrese Segundo apellido" id="apellido2">

													<label for="sexo">Sexo</label>
													<select class="form-control" name="id_sexo" id="sexo" required>
														<option value="" class="form-control" >Seleccione un sexo</option>
														<?php foreach ($sexo as $e) { ?>
															<option value="<?= $e->id_sexo ?>"><?= $e->sexo ?></option>
														<?php }  ?>
													</select>
												</section>

												<h3>Siguientes</h3>
												<section>
													<label for="telefono">Telefono</label>			
													<input type="text" class="required form-control"  name="telefono" placeholder="Telefono" id="telefono">
              <script type="text/javascript">
                $(function () {
                  var selector = document.getElementById("telefono");

                  var im = new Inputmask("9999-9999", { "clearIncomplete": true });
                  im.mask(selector);
                });
              </script>
													<label for="direccion">Direccion</label>
													<input type="text" class="required form-control pull-right"  name="direccion" placeholder="Direccion" id="direccion">

													<div class="d-lg-none">
														<input type="submit" id="guardar" value="Guardar" class="btn btn-info">
													</div>
												</section>
											</div>
										</form>
									</div>
								</div>							
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Persona</h4>
										<div class="table-responsive">
											<table id="zero_config" class="table table-bordered table-striped table-dark">
												<thead>
													<th>Dui Persona</th>
													<th>nombre 1</th>
													<th>Nombre 2</th>
													<th>Apellido 1</th>
													<th>Apellido 2</th>
													<th>Sexo</th>
													<th>Direccion</th>
													<th class="text-center">Eliminar</th>
													<th class="text-center">Actualizar</th>


												</thead>
												<?php foreach ($persona as $valor) { ?>
													<tbody>
														<tr>

															<td><?= $valor->dui_persona ?></td>
															<td><?= $valor->nombre1 ?></td>
															<td><?= $valor->nombre2 ?></td>
															<td><?= $valor->apellido1 ?></td>
															<td><?= $valor->apellido2 ?></td>
															<td><?= $valor->sexo ?></td>
															<td><?= $valor->direccion ?></td>

															<td><a href="<?php echo base_url('/persona_controller/eliminar/'.$valor->dui_persona) ?>"class="btn btn-danger">ELIMINAR</a></td>
															<td><a  href="<?php echo base_url('/persona_controller/get_datos/'.$valor->dui_persona) ?>"class="btn btn-info">ACTUALIZAR</a></td>
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
					<form action="<?php echo base_url('persona_controller/ingresar') ?>" method="POST" autocomplete="off" >



