<?php
     session_start();
     if (isset($_SESSION['mensaje'])) {
        $mensaje = $_SESSION['mensaje'];
        echo "<script languaje='javascript'>alert('$mensaje')</script>";
        unset($_SESSION['mensaje']);
    }
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
    <div id="provisional"> <h3>Interface provisional</h3>
            <!-- ------------------------------------- ROL ------------------------------ -->
            <div class="gestion">Menu de Operaciones de las Tablas Rol 
            <br>
            <a href="Controlador.php?ruta=listarRol&pag=0">Listar Rol</a>
            <br>
            <a href="Controlador.php?ruta=mostrarInsertarRol">Agregar Rol</a>
        </div>
        <!-- ------------------------------------- PERSONA ------------------------------ -->
        <div class="gestion">Menu de Operaciones de las Tablas Persona
            <br>
            <a href="Controlador.php?ruta=listarPersona&pag=0">Listar Persona</a>
            <br>
            <a href="Controlador.php?ruta=mostrarInsertarPersona">Agregar Persona</a>
        </div>
         <!-- ------------------------------------- CODIGO MESERO ------------------------------ -->
        <div class="gestion">Menu de Operaciones de las Tablas Codigo Mesero
            <br>
            <a href="Controlador.php?ruta=listarCodigoMesero&pag=0">Listar Codigo Mesero</a>
            <br>
            <a href="Controlador.php?ruta=mostrarInsertarCodigoMesero">Agregar Codigo Mesero</a>
        </div>
        <!-- ------------------------------------- HORARIO ------------------------------ -->
        <div class="gestion">Menu de Operaciones de las Tablas Codigo Horario Mesero
            <br>
            <a href="Controlador.php?ruta=listarHorario&pag=0">Listar Horario Mesero</a>
            <br>
            <a href="Controlador.php?ruta=mostrarInsertarHorario">Agregar Horario Mesero</a>
        </div>
        <!-- ------------------------------------- COCINERO ------------------------------ -->
        <div class="gestion">Menu de Operaciones de las Tablas Cocinero
            <br>
            <a href="Controlador.php?ruta=listarCocinero&pag=0">Listar Cocinero</a>
            <br>
            <a href="Controlador.php?ruta=mostrarInsertarCocinero">Agregar Cocinero</a>
        </div>
        <!-- ------------------------------------- HORARIO COCINERO ------------------------------ -->
        <div class="gestion">Menu de Operaciones de las Tablas Horario Cocinero
            <br>
            <a href="Controlador.php?ruta=listarHorarioCocinero&pag=0">Listar Horario Cocinero</a>
            <br>
            <a href="Controlador.php?ruta=mostrarInsertarHorarioCocinero">Agregar Horario Cocinero</a>
        </div>
        <!-- ------------------------------------- COCINA ------------------------------ -->
        <div class="gestion">Menu de Operaciones de las Tablas Cocina
            <br>
            <a href="Controlador.php?ruta=listarCocina&pag=0">Listar Cocina</a>
            <br>
            <a href="Controlador.php?ruta=mostrarInsertarCocina">Agregar Cocina</a>
        </div>
    <!-- ------------------------------------- TIPO DE PLATO ------------------------------ -->
        <div class="gestion">Menu de Operaciones de las Tablas Tipo de Plato
            <br>
            <a   href="Controlador.php?ruta=listarTipoPlato&pag=0" id="botton">Listar Tipo de Plato</a>
            <br>
            <a href="Controlador.php?ruta=mostrarInsertarTipoPlato">Agregar Tipo de Plato</a>
        </div>
        <!-- ------------------------------------- PLATO ------------------------------ -->
        <div class="gestion">Menu de Operaciones de las Tablas Plato
            <br>
            <a href="Controlador.php?ruta=listarPlato&pag=0">Listar Plato</a>
            <br>
            <a href="Controlador.php?ruta=mostrarInsertarPlato">Agregar Plato</a>
        </div>
        <!-- ------------------------------------- MENU ------------------------------ -->
        <div class="gestion">Menu de Operaciones de las Tablas Menu
            <br>
            <a href="Controlador.php?ruta=listarMenu&pag=0">Listar Menu</a>
            <br>
            <a href="Controlador.php?ruta=mostrarInsertarMenu">Agregar Menu</a>
        </div>
        <!- ------------------------------------- MESA ------------------------------ -->
        <div class="gestion">Menu de Operaciones de las Tablas Mesa
            <br>
            <a href="Controlador.php?ruta=listarMesa&pag=0">Listar Mesa</a>
            <br>
            <a href="">Agregar Mesa</a>
        </div>
        <!-- ------------------------------------- ORDEN ------------------------------ -->
        <div class="gestion">Menu de Operaciones de las Tablas Orden
            <br>
            <a href="Controlador.php?ruta=listarOrden&pag=0">Listar Orden</a>
            <br>
            <a href="Controlador.php?ruta=mostrarInsertarOrden">Agregar Orden</a>
        </div>
         <!-- ------------------------------------- FACTURA ------------------------------ -->
        <div class="gestion">Menu de Operaciones de las Tablas Factura
            <br>
            <a href="Controlador.php?ruta=listarFactura&pag=0">Listar Factura</a>
            <br>
            <a href="Controlador.php?ruta=mostrarInsertarFactura">Agregar Factura</a>
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