<?php
echo "<pre>";
print_r($_GET);
echo "</pre>";

include 'config.php';


if (isset($_POST['Submit'])) {

    $id = $_POST['id'];
    $mesId = $_POST['mesId'];
    $mesCantidadComenzales = $_POST['CantidadComenzales'];
    $mesNumeroMesa = $_POST['NumeroMesa'];
    $mesEstado = $_POST['Estado'];
    
    $consulta="update mesa set mesId ='$mesId', CantidadComenzales = '$mesCantidadComenzales' Estado = '$mesEstado'";
    
    $result=mysqli_query($connect, $consulta);
    
    header("Location: fetch.php");
    
}

$id = $_GET['id'];

$query = "select mesId, mesCantidadComenzales, mesNumeroMesa,mesEstado 
from mesa pl
join  mesId, mesCantidadComenzales, mesNumeroMesa,mesEstado 
where plaId = $id;";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {

    $mesId = $row['mesId'];
    $mesCantidadComenzales = $row['CantidadComenzales'];
    $mesNumeroMesa = $row['NumeroMesa'];
    $mesEstado = $row['Estado'];
    
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
                            <label>mesId</label>
                            <input type="text" name="Id" class="form-control" value="<?php echo $Id; ?>" readonly="readonly">

                        </div>
                        <div class="form-group">
                            <label>CantidadComenzales</label>
                            <input type="text" name="Plato" class="form-control" value="<?php echo $Plato; ?>">
                        </div>
                        <div class="form-group">
                            <label>NumeroMesa</label>
                            <input type="text" name="Descripcion" class="form-control" value="<?php echo $Descripcion; ?>">
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <input type="text" name="Precio" class="form-control" value="<?php echo $Precio; ?>">
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