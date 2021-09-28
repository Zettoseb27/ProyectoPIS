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

        <title>Su Proyecto</title>
        <!-- Funciones JavaScript propias del sistema -->
        <script type="text/javascript" src="javascript/funciones.js"></script>
        <!-- Funciones JavaScript propias del sistema -->
        <script type="text/javascript" src="javascript/md5.js"></script>    
    </head>
    <body>
        <div>
            <h3 class="panel-title">Datos básicos de Registro</h3>
        </div>
        <div>
            <form method="POST" action="Controlador.php" id="formRegistro">
                <fieldset>
                    <div>
                        <input placeholder="Documento" name="documento" type="number" required="required" autofocus 
						value=
                               <?php 
							   if (isset($_SESSION['documento'])){
                                   echo "\"".$_SESSION['documento']."\"";
                               unset($_SESSION['documento']);
							   }								   
								?>							   
						>
                        <div></div>
                    </div>
                    <div>
                        <input placeholder="Nombres" name="nombre" type="text"   required="required" 
                           value=<?php
                               if (isset($_SESSION['nombre'])){
                                   echo "\"".$_SESSION['nombre']."\"";
                               unset($_SESSION['nombre']);}
                               ?>
                               >			
						
                        <div></div>
                    </div>
                    <div>
                        <input placeholder="Apellidos" name="apellidos" type="text"  required="required" 
                           value=<?php
                               if (isset($_SESSION['apellidos'])){
                                   echo "\"".$_SESSION['apellidos']."\"";
                               unset($_SESSION['apellidos']);}
                               ?>
                               >
                        <div></div>
                    </div>
                    <div>
                        <input id="InputCorreo" placeholder="Correo Electrónico" name="email" type="email"  required="required" 
                       value=<?php
                               if (isset($_SESSION['email'])){
                                   echo "\"".$_SESSION['email']."\"";
                               unset($_SESSION['email']);}
                               ?>
						>
                        <div></div>
                    </div>
                    <div>
                        <input id="InputPassword" placeholder="Password" name="password" type="password" value=""  required="required">
                    </div>
                    <div>
                        <input id="InputPassword2" class="form-control" placeholder="Confirmar Password" name="password2" type="password" value="">
                    </div>
                    <input type="hidden" name="ruta" value="gestionDeRegistro">
                    <button onclick="valida_registro()">Registrar</button>
                </fieldset>
                <div>
                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                        Ya está registrado? 
                        <a href="login.php">
                            Ingrese Aquí
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>