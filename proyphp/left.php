        <?php include_once "DB/CRUD.php"; ?>
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Avanzadas</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <script type="text/javascript">
                        
                    </script>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <a class="nav-link" href="<?php echo 'index.php?server='.$opcDB; ?>">Inicio</a>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Catalogos <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Clientes</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Productos</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo "proveedores.php?server=".$opcDB; ?>" onclick=""> Proveedores</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Vendedor</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Usuario</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        
                              
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Procesos</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Ventas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo "compras.php?server=".$opcDB; ?>">Compras</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fa fa-fw fa-rocket"></i>Reportes</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                     
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Proveedores</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Vendedores</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo "reportePeriodoVentas.php?server=".$opcDB; ?>">Ventas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo "articulos-cliente.php?server=".$opcDB; ?>">Compras</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fas fa-fw fa-chart-pie"></i>Estadisticas</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Ventas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo "estadistica-cliente.php?server=".$opcDB; ?>">Clientes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Productos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo "est-general-arts.php?server=".$opcDB; ?>">General</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

