<?php
/* echo "<pre>";
print_r($_GET);
echo "</pre>"; */

include 'config.php';


if (isset($_POST['Submit'])) {

    $id = $_POST['id'];
    $isbn = $_POST['Id'];
    $FechaInicio = $_POST['FechaInicio'];
    $FechaFin = $_POST['FechaFin'];
    $Fecha = $_POST['Fecha'];
    
    $consulta="update horario_cocinero set horCocFecha='$Fecha', horCocHoraInicio='$FechaInicio', horCocHoraFin='$FechaFin' where horCocId='$id'";
    
    $result=mysqli_query($connect, $consulta);
    
    header("Location: fetch.php");
    
}

$id = $_GET['id'];

$query = "select hc.horCocId, co.cocIdCodigoCocinero, hc.horCocHoraInicio, hc.horCocHoraFin, hc.horCocFecha
from horario_cocinero hc
join cocinero co on hc.horCocId = co.cocId 
where hc.horCocId = $id;";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {

    $isbn = $row['horCocId'];
    $codigo = $row['cocIdCodigoCocinero'];
    $FechaInicio = $row['horCocHoraInicio'];
    $FechaFin = $row['horCocHoraFin'];
    $Fecha = $row['horCocFecha'];
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
                            <input type="text" name="Id" class="form-control" value="<?php echo $isbn; ?>" readonly="readonly">

                        </div>
                        <div class="form-group">
                            <label>Codigo Cocinero</label>
                            <input type="text" name="Codigo Cocinero" class="form-control" value="<?php echo $codigo; ?>" readonly="readonly">

                        </div>
                        <div class="form-group">
                            <label>Fecha Inicio</label>
                            <input type="text" name="FechaInicio" class="form-control" value="<?php echo $FechaInicio; ?>" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label>Fecha Fin</label>
                            <input type="text" name="FechaFin" class="form-control" value="<?php echo $FechaFin; ?>">
                        </div>
                        <div class="form-group">
                            <label>Fecha</label>
                            <input type="text" name="Fecha" class="form-control" value="<?php echo $Fecha; ?>">
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