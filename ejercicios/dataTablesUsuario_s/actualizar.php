<?php
include 'config.php';


if (isset($_POST['Submit'])) {

    $id = $_POST['id'];
    $Id = $_POST['Id'];
    $Login = $_POST['Login'];
    $Estado = $_POST['Estado'];
    
    $consulta="update usuario_s set usuId='$Id', usuLogin='$Login', usuEstado='$Estado'  where usuId='$id'";
    
    $result=mysqli_query($connect, $consulta);
    
    header("Location: fetch.php");
    
}

$id = $_GET['id'];

$query = "select * FROM usuario_s where usuId=$id";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {

    $Id = $row['usuId'];
    $Login = $row['usuLogin'];
    $Estado = $row['usuEstado'];
}
?>
<html>
    <head>
        <title>Actualizando usuario_s...</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container" style="width: 800px; margin-top: 100px;">
            <div class="row">
                <h3>Actualizando Usuario_s...</h3>
                <div class="col-sm-6"> 
                    <form action="" method="post" name="form1">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
                        </div>
                        <div class="form-group">
                            <label>Id</label>
                            <input type="text" name="Id" class="form-control" value="<?php
                             echo $Id; ?>" readonly="readonly">

                        </div>
                        <div class="form-group">
                            <label>Login</label>
                            <input type="text" name="Login" class="form-control" value="<?php echo $Login; ?>">
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