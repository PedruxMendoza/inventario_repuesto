            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url('props/assets/libs/popper.js/dist/umd/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('props/assets/libs/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('props/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('props/assets/extra-libs/sparkline/sparkline.js') ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('props/dist/js/waves.js') ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url('props/dist/js/sidebarmenu.js') ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url('props/dist/js/custom.min.js') ?>"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="<?php echo base_url('props/assets/libs/flot/excanvas.js') ?>"></script>
    <script src="<?php echo base_url('props/assets/libs/flot/jquery.flot.js') ?>"></script>
    <script src="<?php echo base_url('props/assets/libs/flot/jquery.flot.pie.js') ?>"></script>
    <script src="<?php echo base_url('props/assets/libs/flot/jquery.flot.time.js') ?>"></script>
    <script src="<?php echo base_url('props/assets/libs/flot/jquery.flot.stack.js') ?>"></script>
    <script src="<?php echo base_url('props/assets/libs/flot/jquery.flot.crosshair.js') ?>"></script>
    <script src="<?php echo base_url('props/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') ?>"></script>
    <script src="<?php echo base_url('props/dist/js/pages/chart/chart-page-init.js') ?>"></script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url('props/assets/libs/jquery-datatable/jquery.dataTables.js') ?>"></script>
    <!--     <script src="props/assets/libs/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script> -->
    <script src="<?php echo base_url('props/assets/libs/jquery-datatable/extensions/export/dataTables.buttons.min.js') ?>"></script>
    <script src="<?php echo base_url('props/assets/libs/jquery-datatable/extensions/export/buttons.flash.min.js') ?>"></script>
    <script src="<?php echo base_url('props/assets/libs/jquery-datatable/extensions/export/jszip.min.js') ?>"></script>
    <script src="<?php echo base_url('props/assets/libs/jquery-datatable/extensions/export/pdfmake.min.js') ?>"></script>
    <script src="<?php echo base_url('props/assets/libs/jquery-datatable/extensions/export/vfs_fonts.js') ?>"></script>
    <script src="<?php echo base_url('props/assets/libs/jquery-datatable/extensions/export/buttons.html5.min.js') ?>"></script>
    <script src="<?php echo base_url('props/assets/libs/jquery-datatable/extensions/export/buttons.print.min.js') ?>"></script>    
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
         $('#zero_config').DataTable();         
         $(document).ready(function() {
            $('#one_config').DataTable( {
              "ajax": {
                "url": "data.json",
                "dataSrc": "<?= base_url('usuarioC/get_usuario') ?>"
            },
            dom: 'Bfrtip',
            buttons: [
            'copy', 'excel', 'pdf', 'print'
            ]
        } );
        } );         
    </script>
    <?php if ($title == 'Inventario || Vehiculo') { ?>
        <?php $this->load->view('utils/alertasVehiculos') ?>
        <script src="<?php echo base_url('props/assets/libs/jquery-steps/build/jquery.steps.min.js') ?>"></script>
        <script src="<?php echo base_url('props/assets/libs/jquery-validation/dist/jquery.validate.min.js') ?>"></script>
        <script>
        // Basic Example with form
        var form = $("#example-form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) { element.before(error); },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanging: function(event, currentIndex, newIndex) {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function(event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                //alert("Submitted!");
                $("#guardar").click();
            }
        });


    </script>        
<?php }elseif ($title == 'Inventario || Persona') { ?>
    <script src="<?php echo base_url('props/assets/libs/jquery-steps/build/jquery.steps.min.js') ?>"></script>
    <script src="<?php echo base_url('props/assets/libs/jquery-validation/dist/jquery.validate.min.js') ?>"></script>
    <script>
        // Basic Example with form
        var form = $("#example-form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) { element.before(error); },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanging: function(event, currentIndex, newIndex) {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function(event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                //alert("Submitted!");
                $("#guardar").click();
            }
        });


    </script>
    <?php }elseif ($title == 'Inventario || Marca') { ?>
        <?php $this->load->view('utils/alertasMarcas') ?>
    <?php }elseif ($title == 'Inventario || Modelo') { ?>
        <?php $this->load->view('utils/alertasModelo') ?>          
    <?php } ?>
</body>

</html>