<?php
echo "<pre>";
print_r($_GET);
echo "</pre>";

include 'config.php';


if (isset($_POST['Submit'])) {

    $id = $_POST['id'];
    $horId = $_POST['horId'];
    $horIdCodigoMesero = $_POST['CodigoMesero'];
    $horHoraInicio = $_POST['HoraInicio'];
    $horHoraFin = $_POST['HoraFin'];
    $horObservacion = $_POST['Observacion'];
    $horEstado = $_POST['Estado'];
    $horcreated_at = $_POST['Creacion'];
    
    $consulta="update HorarioMesero set isbn='$isbn', horId='$horId', horIdCodigoMesero='$CodigoMesero', 
    precio=$precio , horIdCodigoMesero='$CodigoMesero', 
    horHorarioInicio=$HoraInicio , horHoraFin='$HoraFin', 
    horObservacion=$Observacion , horEstado='$Estado', 
    horcreated_at=$Creacion
    where isbn='$id'";

    
    $result=mysqli_query($connect, $consulta);
    
    header("Location: fetch.php");
    
}

$id = $_GET['id'];

$query = "select * from horario where isbn=$id";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {

    $isbn = $row['isbn'];
    $horId = $row['horId'];
    $horCodigoMesero = $row['CodigoMesero'];
    $horHoraInicio = $row['HoraInicio'];
    $horHoraFin = $row['HoraFin'];
    $horObservacion = $row['Observacion'];
    $horEstado = $row['Estado'];
    $horcreated_at = $row['Creacion'];
}
?>
<html>
    <head>
        <title>Actualizando HorarioMesero...</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container" style="width: 800px; margin-top: 100px;">
            <div class="row">
                <h3>Actualizando HorarioMesero...</h3>
                <div class="col-sm-6"> 
                    <form action="" method="post" name="form1">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
                        </div>
                        <div class="form-group">
                            <label>ISBN</label>
                            <input type="text" name="isbn" class="form-control" value="<?php echo $isbn; ?>" readonly="readonly">

                        </div>
                        <div class="form-group">
                            <label>horId</label>
                            <input type="text" name="titulo" class="form-control" value="<?php echo $titulo; ?>">
                        </div>
                        <div class="form-group">
                            <label>CodigoMesero</label>
                            <input type="text" name="autor" class="form-control" value="<?php echo $autor; ?>">
                        </div>
                        <div class="form-group">
                            <label>HoraInicio</label>
                            <input type="text" name="precio" class="form-control" value="<?php echo $precio; ?>">
                        </div>
                        div class="form-group">
                            <label>HoraFin</label>
                            <input type="text" name="precio" class="form-control" value="<?php echo $precio; ?>">
                        </div>
                        div class="form-group">
                            <label>Observacion</label>
                            <input type="text" name="precio" class="form-control" value="<?php echo $precio; ?>">
                        </div>
                        div class="form-group">
                            <label>Estado</label>
                            <input type="text" name="precio" class="form-control" value="<?php echo $precio; ?>">
                        </div>
                        div class="form-group">
                            <label>Creacion</label>
                            <input type="text" name="precio" class="form-control" value="<?php echo $precio; ?>">
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