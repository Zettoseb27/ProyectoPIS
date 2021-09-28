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
        <title>Tipo Plato</title>

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
                            <th>Plato</th>
                            <th>Observacion</th> 
                            <th>Adicional</th> 
                            <th>Portre</th>  
                            <th>Estado</th>
                            <th>Edit</th> 
                            <th>Delete</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include './config.php';
                        $query = "select me.menId, tp.tipPlaPlato ,me.menObservacion,tp.tipPlaAdicional,
                        tp.tipPlaPostre, me.menEstado
                        from menu me
                        join tipo_plato tp on me.menId = tp.tipPlaId;";
                        
                        $sql = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_array($sql)) {
                            ?>                       
                            <tr>
                                <td><?php echo $row["menId"]; ?></td>  
                                <td><?php echo $row["tipPlaPlato"]?></td>
                                <td><?php echo $row["menObservacion"]; ?></td>  
                                <td><?php echo $row["tipPlaAdicional"]; ?></td> 
                                <td><?php echo $row['tipPlaPostre'] ?></td>
                                <td><?php echo $row["menEstado"]; ?></td> 
                                <td><a href="actualizar.php?id=<?php echo $row["menId"]; ?>">Actualizar</a></td>  
                                <td><a href="borrar.php?id=<?php echo $row["menId"]; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
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