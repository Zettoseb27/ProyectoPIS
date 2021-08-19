<?php
echo "<pre>";
print_r($_GET);
echo "</pre>";

include 'config.php';


if (isset($_POST['Submit'])) {

    $id = $_POST['id'];
    $Id = $_POST['Id'];
    $Plato = $_POST['Plato'];
    $Descripcion = $_POST['Descripcion'];
    $Precio = $_POST['Precio'];
    $Estado = $_POST['Estado'];
    
    $consulta="update plato set plaPrecio = '$Precio', plaEstado = '$Estado' where plaId = '$id'";
    
    $result=mysqli_query($connect, $consulta);
    
    header("Location: fetch.php");
    
}

$id = $_GET['id'];

$query = "select pl.plaId, tpl.tipPlaPlato, pl.plaDescripcion ,pl.plaPrecio, pl.plaEstado
from plato pl
join  tipo_plato tpl on pl.plaId = tpl.tipPlaId
where plaId = $id;";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {

    $Id = $row['plaId'];
    $Plato = $row['tipPlaPlato'];
    $Descripcion = $row['plaDescripcion'];
    $Precio = $row['plaPrecio'];
    $Estado = $row['plaEstado'];
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
                            <input type="text" name="Id" class="form-control" value="<?php echo $Id; ?>" readonly="readonly">

                        </div>
                        <div class="form-group">
                            <label>Plato</label>
                            <input type="text" name="Plato" class="form-control" value="<?php echo $Plato; ?>">
                        </div>
                        <div class="form-group">
                            <label>Descripcion</label>
                            <input type="text" name="Descripcion" class="form-control" value="<?php echo $Descripcion; ?>">
                        </div>
                        <div class="form-group">
                            <label>Precio</label>
                            <input type="text" name="Precio" class="form-control" value="<?php echo $Precio; ?>">
                        </div>
                        <div class="form-group">
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