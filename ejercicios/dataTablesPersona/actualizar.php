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
    $Documento = $_POST['Documento'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Creacion = $_POST['Creacion'];
    
    $consulta="update persona set perDocumento = '$Documento', perNombre = '$Nombre', perApellido = '$Apellido'  where perId='$id'";
    
    $result=mysqli_query($connect, $consulta);
    
    header("Location: fetch.php");
    
}

$id = $_GET['id'];

$query = "select perId ,perDocumento, perNombre, perApellido, per_created_at
from persona
where perId =$id; ";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {

    $ordId = $row['perId'];
    $Documento = $row['perDocumento'];
    $Nombre = $row['perNombre'];
    $Apellido = $row['perApellido'];
    $Creacion = $row['per_created_at'];

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
                            <input type="text" name="Id" class="form-control" value="<?php echo $ordId; ?>" readonly="readonly">

                        </div>
                        <div class="form-group">
                            <label>Documento</label>
                            <input type="text" name="Documento" class="form-control" value="<?php echo $Documento; ?>">
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="Nombre" class="form-control" value="<?php echo $Nombre; ?>">
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" name="Apellido" class="form-control" value="<?php echo $Apellido; ?>">
                        </div>
                        <div class="form-group">
                            <label>Creacion</label>
                            <input type="text" name="Creacion" class="form-control" value="<?php echo $Creacion; ?>">
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