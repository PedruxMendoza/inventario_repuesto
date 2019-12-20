<?php $this->load->helper('ajax_usuario') ?>
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
								<!-- <nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="<?php echo base_url('Welcome/index');?>">Inicio</a></li>
										<li class="breadcrumb-item active" aria-current="page">Usuarios</li>
									</ol>
								</nav> -->
								<button type="button" class="btn btn-info" id="nueUsu">Nuevo usuario</button> 
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
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Usuarios</h4>
									<div class="table-responsive">
										<table id="zero_config" class="table table-bordered table-striped table-dark">
											<thead>
												<tr>
													<th>Correo</th>
													<th>Dui - Persona</th>
													<th>Rol</th>
													<th>Eliminar</th>
													<th>Editar</th>
												</tr>
											</thead>
											<tbody id="tabla_usuarios">

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

				<!-- The Modal -->
				<div class="modal fade" id="usuario">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">

							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title" style="font-family: 'Montserrat', cursive; color: #a8834c;"></h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<!-- Modal body -->
							<div class="modal-body">
								<form id="formUsuario" action="" method="POST" style="font-family: 'Montserrat', cursive; color: #46281e;">
									<input type="hidden" name="id_usuario" id="id" value="0">
									<div class="form-group row">
										<div class="col-lg-12 col-md-12">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Correo</span>
												</div>
												<input type="text"  class="form-control"  name="correo" id="correo" placeholder="Ingrese correo" aria-label="Email" aria-describedby="basic-addon1">
											</div>
											<div class="col-sm-9" id="infoCorreo"></div>
										</div>
									</div>
									<script type="text/javascript">
										$(function () {
											$("#correo").inputmask({ alias: "email" , "clearIncomplete": true});
										});
									</script>
									<div class="form-group row">
										<div class="col-lg-12 col-md-12">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Persona</span>
												</div>
												<select name="dui_persona" id="dui_persona" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
													<option value="">-- Seleccione Dui - Persona --</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-lg-12 col-md-12">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Rol</span>
												</div>
												<select name="id_rol" id="rol" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
													<option value="">-- Seleccione Rol --</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group row" id="oculto">
										<div class="col-lg-12 col-md-12">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Clave</span>
												</div>
												<input type="password" class="form-control"  name="clave" id="contrasenna" placeholder="Ingrese clave" aria-label="Clave" aria-describedby="basic-addon2">
												<div class="input-group-append">
													<button id="show_password" class="btn btn-info" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
												</div>
											</div>
											<br>
											<div class="col-sm-9">
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