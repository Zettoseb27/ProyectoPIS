<?php

include("config.php");

$id = $_GET['Id'];

$query = "delete from persona where perId=$id";

$result = mysqli_query($connect, $query);

if ($result == 1) {
    $mensaje = "Registro eliminado físicamente";
    session_start();
    $_SESSION['mensaje'] = $mensaje;
}


header("location: fetch.php");

