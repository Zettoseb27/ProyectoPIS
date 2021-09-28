<?php
/*
echo "<pre>";
print_r($_GET);
echo "</pre>";
*/
include 'config.php';


if (isset($_POST['Submit'])) {

    $id = $_POST['id'];
    $cociId = $_POST['cociId'];
    $cociOrden = $_POST['Orden'];
    $cociEstado = $_POST['Estado'];
    $cociObservacion = $_POST['Observacion'];
    
   
    
    header("Location: fetch.php");
    
}

$id = $_GET['id'];

$query = "select cociId, 
Me.mesNumeroMesa,
Tp.tipPlaPlato,Tp.tipPlaAdicional,Tp.tipPlaPostre
from cocina Co
inner join mesa Me on cociId = mesId
inner join tipo_plato Tp on cociId = tipPlaId
where Co.cociId =$id; ";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {

    $Id = $row['cociId'];
    $Mesa = $row['mesNumeroMesa'];
    $Plato = $row['tipPlaPlato'];
    $Adicional = $row['tipPlaAdicional'];
    $Postre = $row['tipPlaPostre'];

}
?>
<html>
    <head>
        <title>Actualizando cocina...</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container" style="width: 800px; margin-top: 100px;">
            <div class="row">
                <h3>Actualizando cocina...</h3>
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
                            <label>Numero Mesa</label>
                            <input type="text" name="NumeroMesa" class="form-control" value="<?php echo $Mesa; ?>"readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label>Plato</label>
                            <input type="text" name="Plato" class="form-control" value="<?php echo $Plato; ?>"
                            readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label>Adicional</label>
                            <input type="text" name="Adicional" class="form-control" value="<?php echo $Adicional; ?>"readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label>Postre</label>
                            <input type="text" name="Postre" class="form-control" value="<?php echo $Postre; ?>"readonly="readonly">
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