 <?php
/* echo "<pre>";
print_r($_GET);
echo "</pre>"; */


include 'config.php';


if (isset($_POST['Submit'])) {

    $id = $_POST['id'];
    $Id = $_POST['Id'];
    $codMesId = $_POST['codMesId'];
    $CodigoMesero= $_POST['CodigoMesero'];
    $CodigoIdmesero= $_POST['CodigoIdMesero'];
    $Estado= $_POST['Estado'];
    $consulta="update rol set codMesId='$codMesId', codMesIdMesero='$CodigoMesero', codMesCodigoMesero='$CodigoMesero', codMesEstado='$Estado' where rolId='$id'";
    
    $result=mysqli_query($connect, $consulta);
    
    header("Location: fetch.php");
    
}

$id = $_GET['id'];

$query = "select * from rol where rolId=$id";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {

    $codMesId = $row['cosMesId'];
    $CodigoMesero = $row['codMesIdMesero'];
    $CodigoMesero = $row['cosMesCodigoMesero'];
    $Estado = $row['codMesEstado'];
}
?>
<html>
    <head>
        <title>Actualizando CodigoMesero...</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container" style="width: 800px; margin-top: 100px;">
            <div class="row">
                <h3>Actualizando CodigoMesero...</h3>
                <div class="col-sm-6"> 
                    <form action="" method="post" name="form1">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
                        </div>
                        <div class="form-group">
                            <label>ISBN</label>
                            <input type="text" name="Id" class="form-control" value="<?php echo $Id; ?>" readonly="readonly">

                        </div>
                        <div class="form-group">
                            <label>codMesId</label>
                            <input type="text" name="Nombre" class="form-control" value="<?php echo $Nombre; ?>">
                        </div>
                        <div class="form-group">
                            <label>CodigoMesero</label>
                            <input type="text" name="Descripcion" class="form-control" value="<?php echo $Descripcion; ?>">
                        </div>
                        <div class="form-group">
                            <label>CodigoMesero</label>
                            <input type="text" name="Creacion" class="form-control" value="<?php echo $Creacion; ?>"readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label>Estados</label>
                            <input type="text" name="Creacion" class="form-control" value="<?php echo $Creacion; ?>"readonly="readonly">
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