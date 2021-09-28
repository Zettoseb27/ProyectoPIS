<?php

include 'config.php';


if (isset($_POST['Submit'])) {

    $id = $_POST['id'];
    $Id = $_POST['Id'];
    $CantidadComensales = $_POST['CantidadComensales'];
    $NumeroMesa = $_POST['NumeroMesa'];
    $Estado = $_POST['Estado'];
    
    $consulta="update mesa set mesNumeroMesa='$NumeroMesa', mesCantidadComensales ='$CantidadComensales', mesEstado='$Estado' where mesId='$id'"; 
    
    $result=mysqli_query($connect, $consulta);
    
    header("Location: fetch.php");
    
}

$id = $_GET['id'];

$query =  " select mesId,mesNumeroMesa, mesCantidadComensales, mesEstado 
from mesa where mesId=$id;";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {

    $Id = $row['mesId'];
    $CantidadComensales = $row['mesCantidadComensales'];
    $NumeroMesa = $row['mesNumeroMesa'];
    $Estado = $row['mesEstado'];
    
}
?>
<html>
    <head>
        <title>Actualizando Mesa...</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container" style="width: 800px; margin-top: 100px;">
            <div class="row">
                <h3>Actualizando Mesa...</h3>
                <div class="col-sm-6"> 
                    <form action="" method="post" name="form1">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
                        </div>
                        <div class="form-group">
                            <label>Id</label>
                            <input type="text" name="Id" class="form-control" value="<?php echo $Id; ?>" readonly="readonly">

                        </div>
                        <div class="form-group">
                            <label>Cantidad Comensales</label>
                            <input type="text" name="CantidadComensales" class="form-control" value="<?php echo $CantidadComensales; ?>">
                        </div>
                        <div class="form-group">
                            <label>Numero Mesa</label>
                            <input type="text" name="NumeroMesa" class="form-control" value="<?php echo $NumeroMesa; ?>">
                        </div>
                        <div class="form-gro up">
                            <label>Estado</label>
                            <input type="text" name="Estado" class="form-control" value="<?php echo $Estado; ?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="Submit" value="Update" class="btn btn-primary btn-block" name="update">    
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </body>
</html>                    