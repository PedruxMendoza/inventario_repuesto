<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url('props/materialdesignicons/css/materialdesignicons.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('props/fontawesome-free/css/all.css') ?>" rel="stylesheet">
    <!-- <link rel="stylesheet" href="//cdn.materialdesignicons.com/4.7.95/css/materialdesignicons.min.css"> -->
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('props/assets/images/favicon.png') ?>">
    <title><?php echo $title ?></title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url('props/assets/libs/flot/css/float-chart.css') ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('props/dist/css/style.min.css') ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('props/assets/extra-libs/multicheck/multicheck.css') ?>">
    <!--     <link href="props/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet"> -->
    <link href="<?php echo base_url('props/dist/css/style.min.css') ?>" rel="stylesheet">
    <!-- JQuery DataTable Css -->
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--     <link href="../../assets/libs/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">  -->    
    <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">
    <!-- Alertify -->
    <link rel="stylesheet" href="<?php echo base_url('props/alertifyjs/css/alertify.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('props/alertifyjs/css/themes/default.min.css');?>">
    <script src="<?php echo base_url('props/assets/libs/jquery/dist/jquery.min.js') ?>"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url('props/dist/js/jquery.inputmask.js') ?>"></script>   
    <!-- Alertas -->
    <script src="<?php echo base_url('props/alertifyjs/alertify.min.js');?>"></script>   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>      
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<?php if ($title == 'Inventario || Usuario') { ?>
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
<script src="<?php echo base_url('props/js/usuario.js') ?>"></script> 
<?php }elseif ($title == 'Inventario || Vehiculo') { ?>
    <script src="<?php echo base_url('props/js/vehiculo.js') ?>"></script>
    <link href="<?= base_url('props/assets/libs/jquery-steps/jquery.steps.css') ?>" rel="stylesheet">
    <link href="<?= base_url('props/assets/libs/jquery-steps/steps.css') ?>" rel="stylesheet">
<?php }elseif ($title == 'Inventario || Bienvenido') { ?>
    <style type="text/css">
    #pswd_info1{
        font-size: 10px;
    }
    #pswd_info1 ul, li {
        margin:0;
        padding:0;
        list-style-type:none;
    }

    #pswd_info2{
        font-size: 10px;
    }
    #pswd_info2 ul, li {
        margin:0;
        padding:0;
        list-style-type:none;
    }

    #pswd_info3{
        font-size: 10px;
    }
    #pswd_info3 ul, li {
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
<script src="<?php echo base_url('props/js/contras.js');?>"></script>
<?php }elseif ($title == 'Inventario || Persona') { ?>
    <script src="<?php echo base_url('props/js/persona.js') ?>"></script>    
    <link href="<?= base_url('props/assets/libs/jquery-steps/jquery.steps.css') ?>" rel="stylesheet">
    <link href="<?= base_url('props/assets/libs/jquery-steps/steps.css') ?>" rel="stylesheet">
<?php }elseif ($title == 'Inventario || Poliza') { ?>
    <link href="<?= base_url('props/assets/libs/jquery-steps/jquery.steps.css') ?>" rel="stylesheet">
    <link href="<?= base_url('props/assets/libs/jquery-steps/steps.css') ?>" rel="stylesheet">
<?php }elseif ($title == 'Inventario || Marca') { ?>
    <script src="<?php echo base_url('props/js/marca.js'); ?>"></script>
    <link href="<?= base_url('props/assets/libs/jquery-steps/jquery.steps.css') ?>" rel="stylesheet">
    <link href="<?= base_url('props/assets/libs/jquery-steps/steps.css') ?>" rel="stylesheet">
<?php }elseif ($title == 'Inventario || Modelo') { ?>
    <script src="<?php echo base_url('props/js/modelo.js'); ?>"></script>
    <link href="<?= base_url('props/assets/libs/jquery-steps/jquery.steps.css') ?>" rel="stylesheet">
    <link href="<?= base_url('props/assets/libs/jquery-steps/steps.css') ?>" rel="stylesheet">
<?php }elseif ($title == 'Inventario || Pieza') { ?>
    <script src="<?php echo base_url('props/js/pieza.js'); ?>"></script> 
<?php }elseif ($title == 'Inventario || Categoria') { ?>
    <script src="<?php echo base_url('props/js/categoria.js'); ?>"></script> 
<?php } ?></head>