<?php
     session_start();

    include_once 'modelos/ConstantesConexion.php';
    include_once PATH . 'controladores/ManejoSesiones/BloqueDeSeguridad.php';

    $seguridad= new BloqueDeSeguridad();
    $seguridad->seguridad("login.php");

     if (isset($_SESSION['mensaje'])) {
        $mensaje = $_SESSION['mensaje'];
        echo "<script languaje='javascript'>alert('$mensaje')</script>";
        unset($_SESSION['mensaje']);
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
     
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pedido Instantaneo</title>

    <!-- Custom fonts for this template-->
    <link href="plantilla/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="plantilla/css/sb-admin-2.min.css" rel="stylesheet">


    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="principal.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i > <img src="Imagenes/Plato/plato.png" alt="" width="40" height="40"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Pedido Instantaneo</div>
            </a>

            <!-- Divider --> <a class="collapse-item">
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="Controlador.php?ruta=listarOrden&pag=0">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Orden</span></a>
                    <a class="nav-link" h href="Controlador.php?ruta=mostrarInsertarOrden">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Listar Orden</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
    
            </li>

            <hr class="sidebar-divider">

            <?php
                        if (in_array(1,$_SESSION['rolesEnSesion'])) {
            ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Administrador
            </div>
                 <!-- ROL -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone"
                    aria-expanded="true" aria-controls="collapseone">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Rol</span>
                </a>
                <div id="collapseone" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion Rol:</h6>
                        <a class="collapse-item" href="Controlador.php?ruta=listarRol&pag=0">Listar</a>
                        <a class="collapse-item" href="Controlador.php?ruta=mostrarInsertarRol">Agregar</a>
                    </div>
                </div>
            </li>
                                    <?php
                        }
                        ?>


            <hr class="sidebar-divider">
            <?php
                        if (in_array(3,$_SESSION['rolesEnSesion'])) {
            ?>        
            <!-- Heading -->
            <div class="sidebar-heading">
                Platos
            </div>
            
            <!-- TIPO DE PLATO -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tipo Plato</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion Tipo Plato:</h6>
                        <a class="collapse-item" href="Controlador.php?ruta=listarTipoPlato&pag=0">Listar</a>
                        <a class="collapse-item" href="Controlador.php?ruta=mostrarInsertarTipoPlato">Agregar</a>
                    </div>
                </div>
            </li>
            <!-- PLATO -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethree"
                    aria-expanded="true" aria-controls="collapsethree">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Plato</span>
                </a>
                <div id="collapsethree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion Plato:</h6>
                        <a class="collapse-item" href="Controlador.php?ruta=listarPlato&pag=0">Listar</a>
                        <a class="collapse-item" href="Controlador.php?ruta=mostrarInsertarPlato">Agregar</a>
                    </div>
                </div>
            </li>
            <!-- MESA -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5"
                    aria-expanded="true" aria-controls="collapse5">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Mesa</span>
                </a>
                <div id="collapse5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion Mesa:</h6>
                        <a class="collapse-item" href="Controlador.php?ruta=listarMesa&pag=0">Listar</a>
                        <a class="collapse-item" href="Controlador.php?ruta=mostrarInsertarMesa">Agregar</a>
                    </div>
                </div>
            </li>
            <!-- MENU 
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse6"
                    aria-expanded="true" aria-controls="collapse6">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Gestion Menu</span>
                </a>
                <div id="collapse6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="Controlador.php?ruta=listarMenu&pag=0">Listar</a>
                        <a class="collapse-item" href="Controlador.php?ruta=mostrarInsertarMenu">Agregar</a>
                    </div>
                </div>
            </li> -->
            <!-- ORDEN -->
           <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse7"
                    aria-expanded="true" aria-controls="collapse7">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Orden</span>
                </a>
                <div id="collapse7" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion Orden:</h6>
                        <a class="collapse-item" href="Controlador.php?ruta=listarOrden&pag=0">Listar</a>
                        <a class="collapse-item" href="Controlador.php?ruta=mostrarInsertarOrden">Agregar</a>
                    </div>
                </div> -->
                <?php
                        }
                        ?>
            </li>

            <hr class="sidebar-divider">
            <?php
                        if (in_array(3,$_SESSION['rolesEnSesion'])) {
            ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Mesero
            </div>

            <!-- CODIGO MESERO -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse8"
                    aria-expanded="true" aria-controls="collapse8">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Mesero</span>
                </a>
                <div id="collapse8" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion Codigo Mesero:</h6>
                        <a class="collapse-item" href="Controlador.php?ruta=listarCodigoMesero&pag=0">Listar</a>
                        <a class="collapse-item" href="Controlador.php?ruta=mostrarInsertarCodigoMesero">Agregar</a>
                    </div>
                </div>
            </li>
            <!-- HORARIO MESERO -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse9"
                    aria-expanded="true" aria-controls="collapse9">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Horario Mesero</span>
                </a>
                <div id="collapse9" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion Horario Mesero:</h6>
                        <a class="collapse-item" href="Controlador.php?ruta=listarHorario&pag=0">Listar</a>
                        <br>
                        <a class="collapse-item" href="Controlador.php?ruta=mostrarInsertarHorario">Agregar</a>
                    </div>
                </div>
                <?php
                        }
                        ?>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <?php
                        if (in_array(2,$_SESSION['rolesEnSesion'])) {
                        ?>     
            <div class="sidebar-heading">
                Cocina

            </div>
            <!-- COCINERO -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse10"
                    aria-expanded="true" aria-controls="collapse10">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Cocinero</span>
                </a>
                <div id="collapse10" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion Cocinero:</h6>
                        <a class="collapse-item" href="Controlador.php?ruta=listarCocinero&pag=0">Listar</a>
                        <br>
                        <?php
                        if (in_array(1,$_SESSION['rolesEnSesion'])) {
                        ?>
                        <a class="collapse-item" href="Controlador.php?ruta=mostrarInsertarCocinero">Agregar</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </li>
            <!-- HORARIO COCINERO -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse11"
                    aria-expanded="true" aria-controls="collapse11">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Horario Cocinero</span>
                </a>
                <div id="collapse11" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion Horario Cocinero:</h6>
                        <a class="collapse-item" href="Controlador.php?ruta=listarHorarioCocinero&pag=0">Listar</a>
                        <br>
                        <?php
                        if (in_array(1,$_SESSION['rolesEnSesion'])) {
                        ?>
                        <a class="collapse-item" href="Controlador.php?ruta=mostrarInsertarHorarioCocinero">Agregar</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu 
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="plantilla/login.html">Login</a>
                        <a class="collapse-item" href="plantilla/register.html">Register</a>
                        <a class="collapse-item" href="plantilla/forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="plantilla/404.html">404 Page</a>
                        <a class="collapse-item active" href="plantilla/blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="plantilla/charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>
                        <?php
                        }
                        ?>

            <!-- Nav Item - Tables 
            <li class="nav-item">
                <a class="nav-link" href="plantilla/tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">  
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="plantilla/img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="plantilla/img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="plantilla/img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php echo $_SESSION['perNombre']. " ".$_SESSION['perApellido'];;
                                    ?>
                                </span>
                                <img class="img-profile rounded-circle" src="plantilla/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configuraciones
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"></h1>
                   <?php
                    if(isset($_GET['contenido'])){
                    include($_GET['contenido']);
                    }
                    ?> 

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
                      <!-- <div>
                            <?php
                            echo '<pre>';
                            print_r($_SESSION);
                            echo '</pre>';
                            ?>
                        </div>  -->
            <!-- Footer -->
<<<<<<< HEAD
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
=======

>>>>>>> develop
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="plantilla/vendor/jquery/jquery.min.js"></script>
    <script src="plantilla/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="plantilla/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="plantilla/js/sb-admin-2.min.js"></script>

<<<<<<< HEAD
=======
    

>>>>>>> develop
</body>

</html>