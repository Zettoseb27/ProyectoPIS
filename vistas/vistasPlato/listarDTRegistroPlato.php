<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php
     if (isset($_SESSION['listaDePlato'])) {
         $listaDePlato = $_SESSION['listaDePlato'];
         unset($_SESSION['listaDePlato']);
     }
    ?>

                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th> 
                            <th>Descripcion</th> 
                            <th>Precion</th> 
                            <th>Estado</th> 
                            <th>Edit</th> 
                            <th>Delete</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($listaDePlato as $key => $value){
                            ?>                       
                            <tr>
                                <td><?php echo $listaDePlato[$i] -> plaId; ?></td>  
                                <td><?php echo $listaDePlato[$i] -> plaDescripcion; ?></td>  
                                <td><?php echo $listaDePlato[$i] -> plaPrecio; ?></td>  
                                <td><?php echo $listaDePlato[$i] -> plaEstado; ?></td>  
                              
                                <td><a href="Controlador.php?ruta=actualizarPlato&idAct=<?php echo $listaDePlato[$i] -> plaId; ?>">Actualizar</a></td>  
                                <td><a href="Controlador.php?ruta=eliminarPlato&idAct=<?php echo $listaDePlato[$i] -> plaId; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                            </tr>             
                        <?php 
                        $i++;
                        }
                        $listaDePlato = null;
                        ?>
                    </tbody>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>