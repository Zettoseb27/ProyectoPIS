 <?php
/* echo "<pre>";
print_r($_GET);
echo "</pre>"; */


include 'config.php';


if (isset($_POST['Submit'])) {

    $id = $_POST['id'];
    $Id = $_POST['Id'];
    $Nombre = $_POST['Nombre'];
    $Descripcion = $_POST['Descripcion'];
    $Creacion = $_POST['Creacion'];
    
    $consulta="update rol set rolId='$Id', rolNombre='$Nombre', rolDescripcion='$Descripcion', rol_created_at='$Creacion' where rolId='$id'";
    
    $result=mysqli_query($connect, $consulta);
    
    header("Location: fetch.php");
    
}

$id = $_GET['id'];

$query = "select * from rol where rolId=$id";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {

    $Id = $row['rolId'];
    $Nombre = $row['rolNombre'];
    $Descripcion = $row['rolDescripcion'];
    $Creacion = $row['rol_created_at'];
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
                            <label>ISBN</label>
                            <input type="text" name="Id" class="form-control" value="<?php echo $Id; ?>" readonly="readonly">

                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="Nombre" class="form-control" value="<?php echo $Nombre; ?>">
                        </div>
                        <div class="form-group">
                            <label>Descripcion</label>
                            <input type="text" name="Descripcion" class="form-control" value="<?php echo $Descripcion; ?>">
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