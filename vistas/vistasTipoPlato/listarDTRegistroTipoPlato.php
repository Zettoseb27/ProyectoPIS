<?php
    /*
    echo "<pre>";
    print_r($_SESSION['listaTipoPlato']);      
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
if(isset($_SESSION['listaTipoPlato'])){
	
	 $listaTipoPlato=$_SESSION['listaTipoPlato'];
	 unset($_SESSION['listaTipoPlato']);
	
}
?>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th> 
                <th>Tipo de Plato</th> 
                <th>Adicional</th> 
                <th>Bebida</th> 
                <th>Postre</th> 
                <th>Edit</th> 
                <th>Delete</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($listaTipoPlato as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $listaTipoPlato[$i]->tipPlaId; ?></td>  
                    <td><?php echo $listaTipoPlato[$i]->tipPlaPlato; ?></td>  
                    <td><?php echo $listaTipoPlato[$i]->tipPlaAdicional; ?></td>  
                    <td><?php echo $listaTipoPlato[$i]->tipPlaBebida; ?></td>  
                    <td><?php echo $listaTipoPlato[$i]->tipPlaPostre; ?></td>   
                    <td><a href="Controlador.php?ruta=ActualizarTipoPlato&idAct=<?php echo $listaTipoPlato[$i]->tipPlaId; ?>">Actualizar</a></td>  
                    <td><a href="Controlador.php?ruta=eliminarTipoPlato&idAct=<?php echo $listaTipoPlato[$i]->tipPlaId; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                </tr>   
                <?php
                $i++;
            }
            $listaTipoPlato=null;
            ?>
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