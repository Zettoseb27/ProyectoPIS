<?php
echo "<pre>";
print_r($_GET);
echo "</pre>";

include 'config.php';


if (isset($_POST['Submit'])) {

    $id = $_POST['id'];
    $isbn = $_POST['isbn'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $precio = $_POST['precio'];
    
    $consulta="update libros set isbn='$isbn', titulo='$titulo', autor='$autor', precio=$precio where isbn='$id'";
    
    $result=mysqli_query($connect, $consulta);
    
    header("Location: fetch.php");
    
}

$id = $_GET['id'];

$query = "select * from libros where isbn=$id";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {

    $isbn = $row['isbn'];
    $titulo = $row['titulo'];
    $autor = $row['autor'];
    $precio = $row['precio'];
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
                            <input type="text" name="isbn" class="form-control" value="<?php echo $isbn; ?>" readonly="readonly">

                        </div>
                        <div class="form-group">
                            <label>Titulo</label>
                            <input type="text" name="titulo" class="form-control" value="<?php echo $titulo; ?>">
                        </div>
                        <div class="form-group">
                            <label>Autor</label>
                            <input type="text" name="autor" class="form-control" value="<?php echo $autor; ?>">
                        </div>
                        <div class="form-group">
                            <label>Precio</label>
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