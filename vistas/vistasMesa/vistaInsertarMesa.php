<?php
        /* echo "<pre>";
        print_r($_SESSION['registroRol']);
        echo "</pre>"; */

if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
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

    <title>Insertar Rol</title>

    <!-- Custom fonts for this template-->
    <link href="plantilla/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Mesa</h2>
    <h3 class="panel-title">Actualización de Mesa.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
            <tr>
                    <td>
                        <input class="form-control" placeholder="Id" name="mesId" type="number" pattern="" required="required" autofocus 
						value=<?php if(isset($_SESSION['mesId'])) echo $_SESSION['mesId']; unset($_SESSION['mesId']);  ?>>
                        <div></div>  
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Numero Mesa" name="mesNumeroMesa" type="text"   required="required" 
						value=<?php if(isset($_SESSION['mesNumeroMesa'])) echo $_SESSION['mesNumeroMesa']; unset($_SESSION['mesNumeroMesa']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Cantidad Comensales" name="mesCantidadComensales" type="text"  required="required" 
						value=<?php if(isset($_SESSION['mesCantidadComensales'])) echo $_SESSION['mesCantidadComensales']; unset($_SESSION['mesCantidadComensales']);  ?>>
                        <div></div>
                        <hr> 
                    </td>
                </tr>                  
   
                <tr class="my-2">            
                    <td >    
                        <button href="#" class="btn btn-danger btn-icon-split" type="submit" name="ruta" value="cancelarInsertarMesa"> <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Cancelar</span> </button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button  href="#" class="btn btn-success btn-icon-split" class = ".text-white-50" type="submit" name="ruta" value="insertarMesa"><span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Agregar Mesa</span></button>
                    </td>
                </tr>   
        
            </table>
        </form>
    </fieldset>
</div>						