
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
								<div class="card-body wizard-content">
									<h4 class="card-title"></h4>
									<h6 class="card-subtitle"></h6>
									<form action="<?php echo base_url().'modeloC/actualizar' ?>" method="POST" onsubmit="return validarFormulario()">
										<?php foreach($nombre_modelo as $nm){  ?>
											<div>
												<h3>Modelo</h3>
												<section>
													<div>
														<input type="hidden" name="id_modelo" required="" value="<?php echo $nm->id_modelo ?>">
													</div>
													<label for="userName">Ingresar Modelo</label>
													<input type="text" name="nombre_modelo" id="modelo" value="<?php echo $nm->nombre_modelo ?>">

													<label for="password">Marca</label>
													<select name="nombre_marca" id="marca" >
														<option value="">--seleccione la marca--</option>
														<?php foreach($nombre_marca as $ma){ ?>
															<option value="<?php echo $ma->id_marca ?>" <?php if($ma->id_marca == $nm->id_marca){ echo 'selected';} ?>><?php echo $ma->nombre_marca ?></option>
														<?php } ?>
													</select>
												</div>
												<br>
												<div>
													<center><input type="submit" value="guardar" class="btn btn-info"></center>
												</div>
											</form>
										<?php } ?>
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