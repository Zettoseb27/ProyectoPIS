<?php
    /*
    echo "<pre>";
    print_r ($_SESSION['listarDeCodigoMesero']);
    echo "</pre>";
    */

     if (isset($_SESSION['mensaje'])) {
        $mensaje = $_SESSION['mensaje'];
        echo "<script languaje='javascript'>alert('$mensaje')</script>";
        unset($_SESSION['mensaje']);
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tabla Orden</title>

    <!-- Custom fonts for this template -->
    <link href="plantilla/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="plantilla/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="plantilla/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style type="text/css">
    .bg-gradient-primary {
    background-color: #616a6b;
    background-image: linear-gradient(
180deg,#616a6b 10%,#616a6b 100%);
    background-size: cover;
}
</style>

</head>

<body id="page-top">
<?php
if(isset($_SESSION['listarDeCodigoMesero'])){
	
	 $listarDeCodigoMesero=$_SESSION['listarDeCodigoMesero'];
	 unset($_SESSION['listarDeCodigoMesero']);	
}
?>
                    <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">Codigo Mesero</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                                <th>Id</th>
                                                <th>Codigo Mesero</th> 
                                                <th>Nombre</th> 
                                                <th>Apellido</th> 
                                                <th>Documento</th>  
                                                <th>Edit</th> 
                                                <th>Delete</th>  
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                                <th>Id</th>
                                                <th>Codigo Mesero</th> 
                                                <th>Nombre</th> 
                                                <th>Apellido</th> -
                                                <th>Documento</th>  
                                                <th>Edit</th> 
                                                <th>Delete</th> 
                                        </tr>
                                    </tfoot>
                                    <tbody>   
                                            <?php
                                            $i = 0;
                                            foreach ($listarDeCodigoMesero as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $listarDeCodigoMesero[$i]-> codMesId; ?></td>  
                                                    <td><?php echo $listarDeCodigoMesero[$i]-> codMesCodigoMesero; ?></td>  
                                                    <td><?php echo $listarDeCodigoMesero[$i]-> perNombre; ?></td>  
                                                    <td><?php echo $listarDeCodigoMesero[$i]-> perApellido; ?></td>   
                                                    <td><?php echo $listarDeCodigoMesero[$i]-> perDocumento; ?></td>  
                                                    <td><a href="Controlador.php?ruta=actualizarCodigoMesero&idAct=<?php echo $listarDeCodigoMesero[$i]->codMesId; ?>">Actualizar</a></td>  
                                                    <td><a href="Controlador.php?ruta=eliminarCodigoMesero&idAct=<?php echo $listarDeCodigoMesero[$i]->codMesId; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                                                </tr>   
                                                <?php  
                                                $i++;
                                            }
                                            $listarDeCodigoMesero=null;
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

    <!-- Page level plugins -->
    <script src="plantilla/endor/datatables/jquery.dataTables.min.js"></script>
    <script src="plantilla/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="plantilla/js/demo/datatables-demo.js"></script>

</body>

</html>