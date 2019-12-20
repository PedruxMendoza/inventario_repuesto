        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <?php if ($this->session->userdata('rol') == 1) { ?>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('usuarioC/index');?>" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Usuarios</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-car-multiple"></i><span class="hide-menu">Vehiculo</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('vehiculo_controller/index');?>" class="sidebar-link"><i class="mdi mdi-car-multiple"></i><span class="hide-menu"> Vehiculos </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('marcaC/index');?>" class="sidebar-link"><i class="fas fa-clipboard"></i><span class="hide-menu"> Marca </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('modeloC/index');?>" class="sidebar-link"><i class="fas fa-car"></i><span class="hide-menu"> Modelo </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('pieza_vehiculoC/index');?>" class="sidebar-link"><i class="fas fa-car-crash"></i><span class="hide-menu"> Pieza Vehiculo </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('vehiculoC/index');?>" class="sidebar-link"><i class="fas fa-truck-pickup"></i><span class="hide-menu"> Clase Vehiculo </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('tipo_motorC/index');?>" class="sidebar-link"><i class="mdi mdi-engine"></i><span class="hide-menu"> Tipo Motor </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('transmisionC/index');?>" class="sidebar-link"><i class="mdi mdi-car-shift-pattern"></i><span class="hide-menu"> Transmision </span></a></li>
                            </ul>
                        </li>                            
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-wrench"></i><span class="hide-menu">Pieza</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('piezaC/index');?>" class="sidebar-link"><i class="fas fa-wrench"></i><span class="hide-menu"> Piezas </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('categoriaC/index');?>" class="sidebar-link"><i class="fas fa-sitemap"></i><span class="hide-menu"> Categoria </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-boxes"></i><span class="hide-menu">Poliza</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('polizaC/index');?>" class="sidebar-link"><i class="fas fa-boxes"></i><span class="hide-menu"> Poliza </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('tipo_contenedorC/index');?>" class="sidebar-link"><i class="fas fa-box-open"></i><span class="hide-menu"> Tipo Contenedor </span></a></li>
                            </ul>
                        </li>

                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('persona_controller/index');?>" aria-expanded="false"><i class="mdi mdi-account-box"></i><span class="hide-menu">Persona</span></a></li>

                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('proveedorC/index');?>" aria-expanded="false"><i class="fas fa-male"></i><span class="hide-menu">Proveedor</span></a></li>

                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('ingresoC/index');?>" aria-expanded="false"><i class="mdi mdi-car-info"></i><span class="hide-menu">Ingreso</span></a></li>                                                             
                        <?php } ?>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('venta_controller/index');?>" aria-expanded="false"><i class="fas fa-cart-arrow-down"></i><span class="hide-menu">Ventas</span></a></li>

                        <?php if ($this->session->userdata('rol') == 2) { ?>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('vender_controller/index');?>" aria-expanded="false"><i class="fas fa-cart-plus"></i><span class="hide-menu">Vender</span></a></li>  
                        <?php } ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>