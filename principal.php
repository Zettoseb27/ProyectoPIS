<?php
     session_start();
?>
<!DOCTYPE html>
<html lang="Es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PRINCIPAL</title>
</head>
<body>
    <div id="provisional">Interface provisional
        <div class="gestion">Menu de Operaciones de las Tablas Rol 
            <br>
            <a href="Controlador.php?ruta=listarRol&pag=0">Listar Rol</a>
            <br>
            <a href="Controlador.php?ruta=mostrarInsertarRol">Agregar Rol</a>
        </div>
        <div class="gestion">Menu de Operaciones de las Tablas X_1
            <br>
            <a href="">Listar X_1</a>
            <br>
            <a href="">Agregar X_1</a>
        </div>
        <div class="gestion">Menu de Operaciones de las Tablas  X_2 
            <br>
            <a href="">Listar X_2</a>
            <br>
            <a href="">Agregar X_2</a>
        </div>
        <div id="contenido">
            <br>
                Zona de Resultados (Aqui la funcionalidad!!!)
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