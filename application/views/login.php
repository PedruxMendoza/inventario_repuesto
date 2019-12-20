<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('props/assets/images/favicon.png') ?>">
    <title>Inventario || Login</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Custom CSS -->
    <link href="<?php echo base_url('props/dist/css/style.min.css') ?>" rel="stylesheet">
    <!-- InputMask -->
    <script src="<?php echo base_url('props/dist/js/jquery.inputmask.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="<?php echo base_url('props/js/login.js');?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style type="text/css">
#pswd_info{
    font-size: 10px;
}
#pswd_info ul, li {
    margin:0;
    padding:0;
    list-style-type:none;
}

.invalid {
    background:url(<?php echo base_url('props/images/invalid.png') ?>) no-repeat 0 50%;
    background-size: 10px;
    padding-left:12px;
    line-height:24px;
}
.valid {
    background:url(<?php echo base_url('props/images/valid.png') ?>) no-repeat 0 50%;
    background-size: 10px;
    padding-left:12px;
    line-height:24px;
}
</style>
<body>
    <div class="main-wrapper">
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
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="<?php echo base_url('props/assets/images/logo.pn') ?>g" alt="logo" /></span>
                    </div>
                    <!-- Form -->
                    <form onsubmit="return validar1()" class="form-horizontal m-t-20" id="loginform" action="<?php echo base_url().'loginController/iniciar' ?>" method="POST" autocomplete="off">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Email" aria-label="Email" id="correo" name="correo" aria-describedby="basic-addon1">
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                      $("#correo").inputmask({ alias: "email" , "clearIncomplete": true});
                                  });
                              </script>
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                </div>
                                <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" id="clave" name="clave" aria-describedby="basic-addon1">
                                <div class="input-group-append">
                                    <button id="show_password" class="btn btn-info" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                </div>
                            </div>
                            <div class="col-sm-9" id="info">
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
                    <div class="row border-top border-secondary">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="p-t-20">
                                    <button class="btn btn-info" id="to-recover" type="button"><i class="fa fa-lock m-r-5"></i> ¿Olvidaste tu Contraseña?</button>
                                    <!-- <button class="btn btn-success float-right" type="submit">Login</button> -->
                                    <input type="submit" value="Login" class="btn btn-success float-right">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="recoverform">
                <div class="text-center">
                    <span class="text-white">Ingrese su dirección de correo electrónico a continuación y le enviaremos una contraseña nueva temporal.</span>
                </div>
                <div class="row m-t-20">
                    <!-- Form -->
                    <form class="col-12" action="<?php echo base_url().'sendCorreoController/enviar' ?>" method="POST" autocomplete="off" onsubmit="return validar2()">
                        <!-- email -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
                            <script type="text/javascript">
                                $(function () {
                                  $("#email").inputmask({ alias: "email" , "clearIncomplete": true});
                              });
                          </script>
                      </div>
                      <!-- pwd -->
                      <div class="row m-t-20 p-t-20 border-top border-secondary">
                        <div class="col-12">
                            <a class="btn btn-success" href="#" id="to-login" name="action">Regresar a Login</a>
                            <input type="submit" value="Recuperar" class="btn btn-info float-right">
                            <!-- <button class="btn btn-info float-right" type="button" name="action"></button> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Login box.scss -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper scss in scafholding.scss -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper scss in scafholding.scss -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right Sidebar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right Sidebar -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- All Required js -->
<!-- ============================================================== -->
<?php $this->load->view('utils/alertsLogin.php') ?>
<!-- <script src="props/assets/libs/jquery/dist/jquery.min.js"></script> -->
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo base_url('props/assets/libs/popper.js/dist/umd/popper.min.js') ?>"></script>
<script src="<?php echo base_url('props/assets/libs/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->
<script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){

        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
</script>

</body>

</html>