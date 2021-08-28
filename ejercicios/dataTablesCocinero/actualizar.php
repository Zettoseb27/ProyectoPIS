 <?php
/* echo "<pre>";
print_r($_GET);
echo "</pre>"; */


include 'config.php';


if (isset($_POST['Submit'])) {

    $id = $_POST['id'];
    $Id = $_POST['Id'];
    $CodigoCocinero = $_POST['CodigoCocinero'];
    $Estado = $_POST['Estado'];
    $Creacion= $_POST['Creacion'];
    
    $consulta="update cocinero set cocIdCodigoCocinero='$CodigoCocinero',cocEstado='$Estado' where cocId='$id'";
    
    $result=mysqli_query($connect, $consulta);
    
    header("Location: fetch.php");
    
}

$id = $_GET['id'];

$query = "select * from cocinero where cocId=$id";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {

    $Id = $row['cocId'];
    $CodigoCocinero = $row['cocIdCodigoCocinero'];
    $Creacion= $row['cocCreated_at'];
    $Estado = $row['cocEstado'];
}
?>
<html>
    <head>
        <title>Actualizando cocinero...</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container" style="width: 800px; margin-top: 100px;">
            <div class="row">
                <h3>Actualizando cocinero...</h3>
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
                            <label>Codigo Cocinero</label>
                            <input type="text" name="CodigoCocinero" class="form-control" value="<?php echo $CodigoCocinero; ?>">
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <input type="text" name="Estado" class="form-control" value="<?php echo $Estado; ?>">
                        </div>
                        <div class="form-group">
                            <label>Creacion</label>
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