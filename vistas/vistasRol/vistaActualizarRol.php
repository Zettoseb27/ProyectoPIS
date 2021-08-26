<?php

if (isset($_SESSION['actualizarDatosRol'])) {
    $actualizarDatosRol = $_SESSION['actualizarDatosRol'];
    unset($_SESSION['actualizarRol']);
}


echo "<pre>";
print_r($_SESSION);
echo "<pre>"; 

?>
