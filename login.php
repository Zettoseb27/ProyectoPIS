<?php
    session_start();
    if (isset($_SESSION['mensaje'])) {
        $mensaje = $_SESSION['mensaje'];
        echo "<script languaje='javascript'>alert('$mensaje')</script>";
        unset($_SESSION['mensaje']);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Pedido Instantaneo</title>
        <script type="text/javascript" src="javascript/funciones.js" defer></script>
        <script type="text/javascript" src="javascript/md5.js"></script>        
    </head>
    <body>
        <div>
            <h3 class="panel-title">Ingrese sus credenciales de Accesso a <br/> "PEDIDO INSTANTANEO"</h3>
        </div>
        <form role="form" method="POST" action="./Controlador.php" name="formLogin">
            <fieldset>
                <input id="InputCorreo" class="form-control" placeholder="Correo Electrónico" name="email" type="email" autofocus>
                <input id="InputPassword" class="form-control" placeholder="Contrasña" name="password" type="password" value="">
                <input type="hidden" name="ruta" value="gestionDeAcceso">
                <input type="button" class="btn btn-lg btn-success btn-block" onclick="validar_logueo();" value="Ingresar">
            </fieldset>
            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                Aún no se ha registrado? 
                <a href="registro.php">
                    Registrese Aquí
                </a>
            </div>
        </form>
        
    </body>
</html>