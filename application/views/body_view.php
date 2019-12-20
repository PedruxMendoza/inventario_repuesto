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
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('Welcome/index');?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
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
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3" data-toggle="modal" data-target="#passModal">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-key-variant"></i></h1>
                                <h6 class="text-white">Cambiar contraseña</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-car-door"></i></h1>
                                <h6 class="text-white">Carroceria: <?php echo $carroceria; ?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-car-shift-pattern"></i></h1>
                                <h6 class="text-white">Transmisión: <?php echo $transmision; ?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-engine"></i></h1>
                                <h6 class="text-white">Motor: <?php echo $motor; ?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-primary text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-car-traction-control"></i></h1>
                                <h6 class="text-white">Suspensión: <?php echo $suspension; ?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-car-electric"></i></h1>
                                <h6 class="text-white">Modulos electronicos: <?php echo $electronico; ?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-car"></i></h1>
                                <h6 class="text-white">Autos: <?php echo $vehiculos; ?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-settings"></i></h1>
                                <h6 class="text-white">Piezas: <?php echo $total; ?></h6>
                            </div>
                        </div>
                    </div>                    
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Site Analysis</h4>
                                        <h5 class="card-subtitle">Overview of Latest Month</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- column -->
                                    <div class="col-lg-9">
                                        <div class="flot-chart">
                                            <div class="flot-chart-content" id="flot-line-chart"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-user m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">2540</h5>
                                                   <small class="font-light">Total Users</small>
                                               </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="bg-dark p-10 text-white text-center">
                                               <i class="fa fa-plus m-b-5 font-16"></i>
                                               <h5 class="m-b-0 m-t-5">120</h5>
                                               <small class="font-light">New Users</small>
                                           </div>
                                       </div>
                                       <div class="col-6 m-t-15">
                                        <div class="bg-dark p-10 text-white text-center">
                                           <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                           <h5 class="m-b-0 m-t-5">656</h5>
                                           <small class="font-light">Total Shop</small>
                                       </div>
                                   </div>
                                   <div class="col-6 m-t-15">
                                    <div class="bg-dark p-10 text-white text-center">
                                       <i class="fa fa-tag m-b-5 font-16"></i>
                                       <h5 class="m-b-0 m-t-5">9540</h5>
                                       <small class="font-light">Total Orders</small>
                                   </div>
                               </div>
                               <div class="col-6 m-t-15">
                                <div class="bg-dark p-10 text-white text-center">
                                   <i class="fa fa-table m-b-5 font-16"></i>
                                   <h5 class="m-b-0 m-t-5">100</h5>
                                   <small class="font-light">Pending Orders</small>
                               </div>
                           </div>
                           <div class="col-6 m-t-15">
                            <div class="bg-dark p-10 text-white text-center">
                               <i class="fa fa-globe m-b-5 font-16"></i>
                               <h5 class="m-b-0 m-t-5">8540</h5>
                               <small class="font-light">Online Orders</small>
                           </div>
                       </div>
                   </div>
               </div>
               <!-- column -->
           </div>
       </div>
   </div>
</div>
</div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

<!-- Modal -->
<div class="modal fade" id="passModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
      <form action="<?php echo base_url('Welcome/cambiarcontra') ?>" method="POST" autocomplete="off" onsubmit="return validar()">
        <div class="d-lg-none">
          <label class="sr-only" for="usuario">Usuario</label>
          <div class="input-group-prepend">
            <div class="input-group-text">Usuario</div>
        </div>
        <input type="number" class="form-control" id="usuario" name="usuario" value="<?php echo $this->session->userdata('id') ?>" readonly>
    </div>
    <div class="input-group mb-2">
      <label class="sr-only" for="passold">Antigua Clave</label>
      <div class="input-group-prepend">
        <div class="input-group-text">Antigua Clave</div>
    </div>
    <input type="password" class="form-control" id="passold" name="clave" placeholder="Digite su antigua clave...">
    <div class="input-group-append">
        <button id="show_password_1" class="btn btn-info" type="button" onclick="mostrarPassword1()"> <span class="fa fa-eye-slash icon1"></span> </button>
    </div>
</div>
<div class="col-sm-9" id="info1">
    <div id="pswd_info1">
        <ul>
            <li id="mayuscula1" class="invalid">Al menos <strong>una mayuscula</strong></li>
            <li id="especial1" class="invalid">Al menos <strong>un caracter especial</strong></li>
            <li id="numero1" class="invalid">Al menos <strong>un numero</strong></li>
            <li id="length1" class="invalid">Por lo menos <strong>8 caracteres</strong></li>
        </ul>
    </div>
</div>
<div class="input-group mb-2">
  <label class="sr-only" for="pass1">Nueva Clave</label>
  <div class="input-group-prepend">
    <div class="input-group-text">Nueva Clave</div>
</div>
<input type="password" class="form-control" id="pass1" name="newclave" placeholder="Digite su nueva clave...">
<div class="input-group-append">
    <button id="show_password_2" class="btn btn-info" type="button" onclick="mostrarPassword2()"> <span class="fa fa-eye-slash icon2"></span> </button>
</div>
</div>
<div class="col-sm-9" id="info2">
    <div id="pswd_info2">
        <ul>
            <li id="mayuscula2" class="invalid">Al menos <strong>una mayuscula</strong></li>
            <li id="especial2" class="invalid">Al menos <strong>un caracter especial</strong></li>
            <li id="numero2" class="invalid">Al menos <strong>un numero</strong></li>
            <li id="length2" class="invalid">Por lo menos <strong>8 caracteres</strong></li>
        </ul>
    </div>
</div>
<div class="input-group mb-2">
  <label class="sr-only" for="pass2">Nueva Clave</label>
  <div class="input-group-prepend">
    <div class="input-group-text">Confirme su Nueva clave</div>
</div>
<input type="password" class="form-control" id="pass2" name="newclave" placeholder="Confirme su nueva clave...">
<div class="input-group-append">
    <button id="show_password_3" class="btn btn-info" type="button" onclick="mostrarPassword3()"> <span class="fa fa-eye-slash icon3"></span> </button>
</div>
</div>
<div class="col-sm-9" id="info3">
    <div id="pswd_info3">
        <ul>
            <li id="mayuscula3" class="invalid">Al menos <strong>una mayuscula</strong></li>
            <li id="especial3" class="invalid">Al menos <strong>un caracter especial</strong></li>
            <li id="numero3" class="invalid">Al menos <strong>un numero</strong></li>
            <li id="length3" class="invalid">Por lo menos <strong>8 caracteres</strong></li>
        </ul>
    </div>
</div>
<br>
<input type="submit" value="Guardar Contraseña" class="btn btn-info">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</form>
</div>
</div>
</div>
</div>
<script type="text/javascript">
            //Este script compara las contraseñas para saber si son identicas 
            //si lo son realiza el INSERT y si no muestra un mensaje de alerta 
            window.onload = function () {
              document.getElementById("pass1").onchange = validatePassword;
              document.getElementById("pass2").onchange = validatePassword;
          }
          function validatePassword(){
              var pass2=document.getElementById("pass2").value;
              var pass1=document.getElementById("pass1").value;
              if(pass1!=pass2)
                document.getElementById("pass1").setCustomValidity("Las contraseñas no coinciden");
            else
                document.getElementById("pass1").setCustomValidity('');  

        }
      //Fin del script
  </script>
  <?php $this->load->view('utils/alertsLogin.php') ?>