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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pedido Instantaneo</title>

    <script type="text/javascript" src="javascript/funciones.js" defer></script>
    <script type="text/javascript" src="javascript/md5.js"></script>   

    <!-- Custom fonts for this template-->
    <link href="plantilla/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="plantilla/css/sb-admin-2.min.css" rel="stylesheet">
    
    <style type="text/css">
    .bg-gradient-primary {
    background-color: #616a6b;
    background-image: linear-gradient(
180deg,#616a6b 10%,#616a6b 100%);
    background-size: cover;
}
</style>
</head>

<body class="bg-gradient-primary"  alt="" width="440" height="440">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">   
 
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body --> 
                        <div class="row">
                            <div class="col-lg-6"> <img src="imagenes/Pamela/2.png" alt="" width="450" height="500"></div> 
                            <div class="col-lg-6" width="100" height="100">
                                <div class="p-5" >
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido a P.I.S</h1>
                                    </div>
                                    <form class="user" role="form" method="POST" action="./Controlador.php" name="formLogin">
                                        <div class="form-group">
                                            <input id="InputCorreo" class="form-control form-control-user" placeholder="Correo Electr??nico" name="email" type="email" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input id="InputPassword" class="form-control form-control-user" placeholder="Contras??a" name="password" type="password" value="">
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <div>
                                        <input type="hidden" name="ruta" value="gestionDeAcceso" >
                                        <input type="button" class="btn btn-primary btn-user btn-block" onclick="validar_logueo();"value="Ingresar" >
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="registro.php">Crea una registro</a>
                                    </div>
                                    <hr>
                                    <hr>       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="plantilla/vendor/jquery/jquery.min.js"></script>
    <script src="plantilla/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="plantilla/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="plantilla/js/sb-admin-2.min.js"></script>

</body>

</html>