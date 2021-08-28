<?php

include("config.php");

$id = $_GET['id'];

$query = "delete from horario_cocinero where horCocId=$id";

$result = mysqli_query($connect, $query);

if ($result == 1) {
    $mensaje = "Registro eliminado físicamente";
    session_start();
    $_SESSION['mensaje'] = $mensaje;
}


header("location: fetch.php");

