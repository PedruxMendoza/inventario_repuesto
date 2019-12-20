<?php $this->load->helper('validacionesUsuario'); ?>
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
							<h4 class="page-title">Usuarios</h4>
							<div class="ml-auto text-right">
								<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
									Nuevo usuario
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
					<div class="row">
						<div class="col-12">
							<div class="collapse" id="collapseExample">
								<div class="card">
									<form action="<?php echo base_url('usuario_controller/ingresar') ?>" method="POST" autocomplete="off"  class="form-horizontal" onsubmit="return validar()">
										<div class="card-body">
											<h4 class="card-title">Nuevo usuario</h4>
											<div class="form-group row">
												<label for="fname" class="col-sm-3 text-right control-label col-form-label">Correo</label>
												<div class="col-sm-9">
													<input type="text"  class="form-control pull-right"  name="correo" id="correo" placeholder="Ingrese correo">

												</div>
												<div class="col-sm-9" id="infoCorreo"></div>
											</div>
											<script type="text/javascript">
												$(function () {
													$("#correo").inputmask({ alias: "email" , "clearIncomplete": true});
												});
											</script>
											<div class="form-group row">
												<label for="email1" class="col-sm-3 text-right control-label col-form-label">Persona</label>
												<div class="col-sm-9">
													<select class="form-control" id="persona"  name="dui_persona" >
														<option value="" class="form-control" >Dui persona</option>
														<?php foreach ($persona as $e) { ?>
															<option value="<?= $e->dui_persona ?>"><?= $e->dui_persona ?></option>
														<?php }  ?>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label for="cono1" class="col-sm-3 text-right control-label col-form-label">Rol</label>
												<div class="col-sm-9">
													<select class="form-control" id="rol" name="id_rol" >
														<option value="" class="form-control" >Rol de la persona</option>
														<?php foreach ($rol as $e) { ?>
															<option value="<?= $e->id_rol ?>"><?= $e->nombre_rol ?></option>
														<?php }  ?>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label for="cono1" class="col-sm-3 text-right control-label col-form-label">Contraseña</label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="password"  class="form-control"  name="clave" id="contrasenna" placeholder="Ingrese clave" aria-describedby="basic-addon2">
														<div class="input-group-append">
															<!-- <span class="input-group-text" id="basic-addon2">$</span> -->
															<button id="show_password" class="btn btn-info" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
														</div>
													</div>
													<div id="pswd_info">
														<ul>
															<li id="mayuscula" class="invalid">Al menos <strong>una mayuscula</strong></li>
															<li id="especial" class="invalid">Al menos <strong>un caracter especial</strong></li>
															<li id="numero" class="invalid">Al menos <strong>un numero</strong></li>
															<li id="length" class="invalid">Por lo menos <strong>8 caracteres</strong></li>
														</ul>
													</div>
												</div>
											</div>

										</div>
										<div class="border-top">
											<div class="card-body">

												<input type="submit" value="Guardar" class="btn btn-info">
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Usuarios</h4>
									<div class="table-responsive">
										<table id="zero_config" class="table table-bordered table-striped table-dark">
											<thead>
												<th>N°</th>
												<th>Correo</th>
												<th>dui_persona</th>
												<th>id_rol</th>
												<th class="text-center">Eliminar</th>
												<th class="text-center">Actualizar</th>
											</thead>
											<?php foreach ($usuario as $valor) { ?>
												<tbody>
													<tr>
														<td><?= $valor->id_usuario ?></td>
														<td><?= $valor->correo ?></td>

														<td><?= $valor->dui_persona ?></td>
														<td><?= $valor->nombre_rol ?></td>

														<td class="text-center"><a href="<?php echo base_url('/usuario_controller/eliminar/'.$valor->id_usuario) ?>"class="btn btn-danger">ELIMINAR</a></td>
														<td class="text-center"><a  href="<?php echo base_url('/usuario_controller/get_datos/'.$valor->id_usuario) ?>"class="btn btn-info">ACTUALIZAR</a></td>


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