<?php
echo "<pre>";
print_r($_GET);
echo "</pre>";

include 'config.php';


if (isset($_POST['Submit'])) {

    $id = $_POST['tipPlaId'];
    $Id = $_POST['tipPlaId'];
    $Plato = $_POST['Plato'];
    $Adicional = $_POST['tipPlaAdicional'];
    $Bebida = $_POST['Bebida'];
    
    $consulta="update tipo_plato set tipPlaAdicional = '$Adicional' where tipPlaId = '$Id'";
    
    $result=mysqli_query($connect, $consulta);
    
    header("Location: fetch.php");
    
}

$id = $_GET['id'];

$query = "select * from tipo_plato where tipPlaId=$id";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {

    $Id = $row['tipPlaId'];
    $Plato = $row['tipPlaPlato'];
    $Adicional = $row['tipPlaAdicional'];
    $Bebida = $row['tipPlaBebida'];
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
                            <input type="text" name="Id" class="form-control" value="<?php echo $Id; ?>" readonly="readonly">

                        </div>
                        <div class="form-group">
                            <label>Titulo</label>
                            <input type="text" name="Plato" class="form-control" value="<?php echo $Plato; ?>">
                        </div>
                        <div class="form-group">
                            <label>Adicional</label>
                            <input type="text" name="Adicional" class="form-control" value="<?php echo $Adicional; ?>">
                        </div>
                        <div class="form-group">
                            <label>Bebida</label>
                            <input type="text" name="Bebida" class="form-control" value="<?php echo $Bebida; ?>">
                        </div>
                        <div class="form-group">
                            <label>Postre</label>
                            <input type="text" name="Postre" class="form-control" value="<?php echo $Postre; ?>">
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