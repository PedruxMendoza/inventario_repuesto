
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
                  <h4 class="card-title">Persona</h4>
                  <h6 class="card-subtitle"></h6>
                  <form action="<?php echo base_url('persona_controller/actualizar') ?>" method="POST" autocomplete="off" onsubmit="return validarFormulario()">
                   <?php foreach ($persona as $valor) { ?>
                     <div>
                      <div>
                        <input type="hidden" class="form-control pull-right"  name="dui_persona" value="<?= $valor->dui_persona ?>" id="dui">
        <script type="text/javascript">
                $(function () {
                  var selector = document.getElementById("dui");

                  var im = new Inputmask("99999999-9", { "clearIncomplete": true });
                  im.mask(selector);
                });
              </script>                        

                        <label for="password">Nombre 1</label>
                        <input type="text" class="form-control pull-right"  name="nombre1" value="<?= $valor->nombre1 ?>" id="nombre1">

                        <label for="confirm">Nombre 2</label>
                        <input type="text" class="form-control pull-right"  name="nombre2" value="<?= $valor->nombre2 ?>" id="nombre2">

                        <label for="confirm">Apellido 1</label>
                        <input type="text" class="form-control pull-right"  name="apellido1" value="<?= $valor->apellido1 ?>" id="apellido1">

                        <label for="password">Apellido 2</label>
                        <input type="text" class="form-control pull-right"  name="apellido2" value="<?= $valor->apellido2 ?>" id="apellido2">

                        <label for="password">Sexo</label>
                        <select class="form-control" name="id_sexo" id="sexo">
                          <option value="" class="form-control pull-right" >Seleccione sexo </option>
                          <?php foreach ($sexo as $s) { ?>
                            <option value="<?= $s->id_sexo ?>" <?php if($s->id_sexo==$valor->id_sexo){echo "Selected";} ?>><?= $s->sexo ?></option>
                          <?php }  ?>
                        </select>
                        <label for="name">Telefono</label>      
                        <input type="text" class="required form-control"  name="telefono" placeholder="Telefono" value="<?= $valor->telefono ?>" id="telefono">

              <script type="text/javascript">
                $(function () {
                  var selector = document.getElementById("telefono");

                  var im = new Inputmask("9999-9999", { "clearIncomplete": true });
                  im.mask(selector);
                });
              </script>                        

                        <label for="surname">Direccion</label>
                        <input type="text" class="form-control pull-right"  name="direccion" value="<?= $valor->direccion ?>" id="direccion">

                        <div class="card-body">
                         <center><input type="submit" value="Actualizar" class="btn btn-info"></center>
                       </div>
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