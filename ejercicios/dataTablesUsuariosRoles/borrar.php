<?php

include("config.php");

$id = $_GET['id'];

$query = "delete from usuario_s_roles where id_usuario_s =$id";

$result = mysqli_query($connect, $query);

if ($result == 1) {
    $mensaje = "Registro eliminado físicamente";
    session_start();
    $_SESSION['mensaje'] = $mensaje;
}


header("location: fetch.php");

