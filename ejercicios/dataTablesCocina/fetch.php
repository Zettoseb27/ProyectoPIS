<?php
session_start();

if(isset($_SESSION['mensaje'])) {//isset()
    $mensaje=$_SESSION['mensaje'];//capturamos mensaje que existe
     echo "<script type='text/javascript'>alert('$mensaje');</script>";//imprimimos mensaje
     unset($_SESSION['mensaje']);// eliminamos mensaje
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>cocina</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">  
    </head>
    <body>
        <div class="container" style="width: 800px; margin-top: 100px;">       
            <div class="row">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th> 
                            <th>Numero Mesa</th> 
                            <th>Plato</th> 
                            <th>Adicional</th>
                            <th>Postre</th> 
                            <th>Edit</th> 
                            <th>Delete</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include './config.php';
                        $query = "select Co.cociId, 
                        Me.mesNumeroMesa,
                        Tp.tipPlaPlato,Tp.tipPlaAdicional,Tp.tipPlaPostre
                        from cocina Co
                        join mesa Me on cociId = mesId
                        join tipo_plato Tp on cociId = tipPlaId;";
                        $sql = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_array($sql)) {
                            ?>                       
                            <tr>
                                <td><?php echo $row["cociId"]; ?></td>  
                                <td><?php echo $row["mesNumeroMesa"]; ?></td>  
                                <td><?php echo $row["tipPlaPlato"]; ?></td>  
                                <td><?php echo $row["tipPlaAdicional"]; ?></td>
                                <td><?php echo $row["tipPlaPostre"]; ?></td>  
                                <td><a href= "actualizar.php? id=<?php echo $row["cociId"]; ?>">Actualizar</a></td>  
                                <td><a href="borrar.php?Id=<?php echo $row["cociId"]; ?>" onclick="return confirm('Est?? seguro de eliminar el registro?')">Eliminar</a></td>  
                            </tr>             
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </body>
</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
                                $(document).ready(function () {
                                    $('#example').DataTable();
                                });
</script>
<!--https://eldesvandejose.com/category/jquery/hacks-y-recursos/el-plugin-datatables-->