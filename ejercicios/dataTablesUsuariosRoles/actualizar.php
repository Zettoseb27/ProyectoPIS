
 <?php
include 'config.php';


if (isset($_POST['Submit'])) {

    $id = $_POST['id'];
    $Id = $_POST['Id'];
    $Estado = $_POST["Estado"];
    $Fecha = $_POST['Fecha'];
    $Cargo = $_POST['Cargo'];
    $Descripcion = $_POST['Descripcion'];

    
    $consulta="update usuario_s_roles set estado='$Estado' where id_usuario_s='$id'";
    
    $result=mysqli_query($connect, $consulta);
    
    header("Location: fetch.php");
    
}

$id = $_GET['id'];

$query = "select id_usuario_s,Ur.estado,Ur.fechaUserRol,Rl.rolNombre,Rl.rolDescripcion,Us.usuLogin
from usuario_s_roles Ur 
join usuario_s Us on Ur.id_usuario_s = Us.usuId
join rol Rl on  Ur.id_usuario_s = Rl.rolId
where id_usuario_s = $id ;";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {

    $id = $row['id_usuario_s'];
    $Estado = $row["estado"];
    $Fecha = $row['fechaUserRol'];
    $Cargo = $row['rolNombre'];
    $Descripcion = $row['rolDescripcion'];
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
                            <input type="text" name="Id" class="form-control" value="<?php echo $id; ?>" readonly="readonly">

                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <input type="text" name="Estado" class="form-control" value="<?php echo $Estado; ?>">
                        </div>
                        <div class="form-group">
                            <label>Fecha</label>
                            <input type="text" name="Fecha" class="form-control" value="<?php echo $Fecha; ?>">
                        </div>
                        <div class="form-group">
                            <label>Cargo</label>
                            <input type="text" name="Cargo" class="form-control" value="<?php echo $Cargo; ?>"
                            readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label>Descripcion</label>
                            <input type="text" name="Descripcion" class="form-control" value="<?php echo $Descripcion; ?>"
                            readonly="readonly">
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