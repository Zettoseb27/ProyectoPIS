<?php
    /*
    echo "<pre>";
    print_r ($_SESSION['listarDeFactura']);
    echo "</pre>";
    */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--LAS siguientes lìneas se agregan con el propòsito de dar funcionalidad a un DataTable-->
        <!--**************************************** -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> 
        <!--**************************************** -->
    </head>
	
	<body>
<?php
if(isset($_SESSION['listarDeFactura'])){
	
	 $listarDeFactura=$_SESSION['listarDeFactura'];
	 unset($_SESSION['listarDeFactura']);	
}
?>
    <table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre Cliente</th> 
                <th>Codigo Mesero</th>  
                <th>Edit</th> 
                <th>Delete</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($listarDeFactura as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $listarDeFactura[$i]-> facId; ?></td>  
                    <td><?php echo $listarDeFactura[$i]-> facNombreCliente; ?></td>  
                    <td><?php echo $listarDeFactura[$i]-> codMesCodigoMesero; ?></td>  
                    <td><a href="Controlador.php?ruta=actualizarFactura&idAct=<?php echo $listarDeFactura[$i]->facId; ?>">Actualizar</a></td>  
                    <td><a href="Controlador.php?ruta=eliminarFactura&idAct=<?php echo $listarDeFactura[$i]->facId; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                </tr>   
                <?php
                $i++;
            }
            $listarDeFactura=null;
            ?>
        </tbody>
    </table>
    <!--**************************************** -->  
    <!--LAS siguientes lìneas se agregan con el propòsito de dar funcionalidad a un DataTable-->
    <!--**************************************** -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#example').DataTable({
                                pageLength: 5,
                                lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]],
                            });
                        });
    </script>     
    <!--**************************************** -->
    <!--**************************************** -->   
</body>
</html>