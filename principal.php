<?php
     session_start();
?>
<!DOCTYPE html>
<html lang="Es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="principal.css">
    <title>Principal</title>
</head>
<body>
    <div id = "provisional">Interface provisional
        <div class = "gestion"> Menú Operaciones en Tabla Orden
            <br>
                <a href="Controlador.php?ruta = listarOrden&pag=0">Listar Orden</a>
            </br>
                <a href="">Agregar Libros</a>
        </div>
        <br>
        <div class = "gestion">Menú Operaciones en Tabla x-1
            <br>
            <a href="">Listar x-1</a>
            <br>
            <a href="">Agregar x-1</a>
        </div>
        <br>
        <div class = "gestion">Menú Operacion en Tabal x-2
            <br>
            <a href="">listar x-2</a>
            <br>
            <a href="">Agregar x-2</a>
        </div>
        <br>
        <div id = "contenido">
            <br>
                        Zona de Resultados (Aqui la Funcionalidad!!!!)
            <br>
            <br>
            <?php
                 if(isset($_GET['contenido'])){
                     include($_GET['contenido']);
                 }
            ?>
        </div>

    </div>
</body>
</html>