<?php
    /*
    echo "<pre>";
     print_r ($_SESSION['listarDeMesa']);
     echo "</pre>";
    */
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tabla Mesa</title>

    <!-- Custom fonts for this template -->
    <link href="plantilla/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="plantilla/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php
if(isset($_SESSION['listarDeMesa'])){
	
	 $listarDeMesa=$_SESSION['listarDeMesa'];
	 unset($_SESSION['listarDeMesa']);
	
}
?>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Numero Mesa</th> 
                <th>Cantidad Comensales</th> 
                <th>Created</th> 
                <th>Edit</th> 
                <th>Delete</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($listarDeMesa as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $listarDeMesa[$i]-> mesId; ?></td>  
                    <td><?php echo $listarDeMesa[$i]-> mesNumeroMesa; ?></td>  
                    <td><?php echo $listarDeMesa[$i]-> mesCantidadComensales; ?></td>  
                    <td><?php echo $listarDeMesa[$i]-> mesCreated_at; ?></td>  
                    <td><a href="Controlador.php?ruta=actualizarMesa&idAct=<?php echo $listarDeMesa[$i]->mesId; ?>">Actualizar</a></td>  
                    <td><a href="Controlador.php?ruta=eliminarMesa&idAct=<?php echo $listarDeMesa[$i]->mesId; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                </tr>   
                <?php
                $i++;
            }
            $listarDeMesa=null;
            ?>
        </tbody>
    </table>

    <!-- Bootstrap core JavaScript-->
    <script src="plantilla/vendor/jquery/jquery.min.js"></script>
    <script src="plantilla/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="plantilla/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="plantilla/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="plantilla/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="plantilla/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="plantilla/js/demo/datatables-demo.js"></script>

</body>

</html>