<?php
     if (isset($_SESSION['mensaje'])) {
        $mensaje = $_SESSION['mensaje'];
        echo "<script languaje='javascript'>alert('$mensaje')</script>";
        unset($_SESSION['mensaje']);
    } 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ROL</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">  
    </head>
    <body>

    <?php
     if (isset($_SESSION['listaDeRol'])) {
         $listaDeRol = $_SESSION['listaDeRol'];
         unset($_SESSION['listaDeRol']);
     }
    ?>

                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th> 
                            <th>Nombre</th> 
                            <th>Descripcion</th> 
                            <th>Creacion</th> 
                            <th>Edit</th> 
                            <th>Delete</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($listaDeRol as $key => $value){
                            ?>                       
                            <tr>
                                <td><?php echo $listaDeRol[$i] -> rolId; ?></td>  
                                <td><?php echo $listaDeRol[$i] -> rolNombre; ?></td>  
                                <td><?php echo $listaDeRol[$i] -> rolDescripcion; ?></td>  
                                <td><?php echo $listaDeRol[$i] -> rol_created_at; ?></td>  
                              
                                <td><a href="Controlador.php?ruta=actualizarRol&idAct=<?php echo $listaDeRol[$i] -> rolId; ?>">Actualizar</a></td>  
                                <td><a href="Controlador.php?ruta=eliminarRol&idAct=<?php echo $listaDeRol[$i] -> rolId; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                            </tr>             
                        <?php 
                        $i++;
                        }
                        $listaDeRol = null;
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
