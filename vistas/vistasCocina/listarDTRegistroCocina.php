<?php
    /*
    echo "<pre>";
    print_r ($_SESSION['listarDeCocina']);
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
if(isset($_SESSION['listarDeCocina'])){
	
	 $listarDeCocina=$_SESSION['listarDeCocina'];
	 unset($_SESSION['listarDeCocina']);
}
?>
    <table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Estado</th> 
                <th>Observacion</th> 
                <th>Plato</th> 
                <th>Postre</th> 
                <th>Bebida</th> 
                <th>Adicional</th> 
                <th>Edit</th> 
                <th>Delete</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($listarDeCocina as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $listarDeCocina[$i]-> cociId; ?></td>  
                    <td><?php echo $listarDeCocina[$i]-> cociEstado; ?></td>  
                    <td><?php echo $listarDeCocina[$i]-> menObservacion; ?></td>  
                    <td><?php echo $listarDeCocina[$i]-> tipPlaPlato; ?></td>  
                    <td><?php echo $listarDeCocina[$i]-> tipPlaPostre; ?></td>  
                    <td><?php echo $listarDeCocina[$i]-> tipPlaBebida; ?></td>  
                    <td><?php echo $listarDeCocina[$i]-> tipPlaAdicional; ?></td>  
                    <td><a href="Controlador.php?ruta=actualizarCocina&idAct=<?php echo $listarDeCocina[$i]->cociId; ?>">Actualizar</a></td>  
                    <td><a href="Controlador.php?ruta=eliminarCocina&idAct=<?php echo $listarDeCocina[$i]->cociId; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                </tr>   
                <?php
                $i++;
            }
            $listarDeCocina=null;
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