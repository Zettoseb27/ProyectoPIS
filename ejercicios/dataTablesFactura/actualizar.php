<?php
/*
echo "<pre>";
print_r($_GET);
echo "</pre>";
*/
include 'config.php';


if (isset($_POST['Submit'])) {

    $id = $_POST['id'];
    $ordId = $_POST['Id'];
    $ValorTotal = $_POST['valorTotal'];
    $Descripcion = $_POST['ordDescripcion'];
    $Bebida = $_POST['tipPlaBebida'];
    $Adicional = $_POST['tipPlaAdicional'];
    
    $consulta="update orden set ordId='$ordId', valorTotal='$ValorTotal', ordDescripcion='$Descripcion', ordBebida = '$Bebida', tipPlaAdicional = '$Adicional'  where ordId='$id'";
    
    $result=mysqli_query($connect, $consulta);
    
    header("Location: fetch.php");
    
}

$id = $_GET['id'];

$query = "select  O.ordId,O.ordvalorTotal,
Tp.tipPlaPlato, Tp.tipPlaAdicional, Tp.tipPlaBebida, Tp.tipPlaPostre,
Ms.mesNumeroMesa,
Pl.plaDescripcion
from orden O
join tipo_plato Tp on ordId = Tp.tipPlaId
join mesa Ms on O.ordId = Ms.mesId
join plato Pl on ordId = Pl.plaId
where ordId = $id; ";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {

    $ordId = $row['ordId'];
    $ValorTotal = $row['ordvalorTotal'];
    $Descripcion = $row['plaDescripcion'];
    $Bebida = $row['tipPlaBebida'];
    $Adicional = $row['tipPlaAdicional'];
    $Postre = $row['tipPlaPostre'];
}
?>
<html>
    <head>
        <title>Actualizando Libro...</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container" style="width: 800px; margin-top: 100px;">
            <div class="row">
                <h3>Actualizando Libro...</h3>
                <div class="col-sm-6"> 
                    <form action="" method="post" name="form1">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
                        </div>
                        <div class="form-group">
                            <label>Id</label>
                            <input type="text" name="ordId" class="form-control" value="<?php echo $ordId; ?>" readonly="readonly">

                        </div>
                        <div class="form-group">
                            <label>Valor Total</label>
                            <input type="text" name="Valor Total" class="form-control" value="<?php echo $ValorTotal; ?>">
                        </div>
                        <div class="form-group">
                            <label>Descripcion</label>
                            <input type="text" name="Descripcion" class="form-control" value="<?php echo $Descripcion; ?>">
                        </div>
                        <div class="form-group">
                            <label>Bebida</label>
                            <input type="text" name="Bebida$Bebida" class="form-control" value="<?php echo $Bebida; ?>">
                        </div>
                        <div class="form-group">
                            <label>Adicional</label>
                            <input type="text" name="Bebida$Bebida" class="form-control" value="<?php echo $Adicional; ?>">
                        </div>
                        <div class="form-group">
                            <label>Postre</label>
                            <input type="text" name="Bebida$Bebida" class="form-control" value="<?php echo $Postre; ?>">
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