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
