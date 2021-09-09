<?php

 /*echo "<pre>";  
print_r($_SESSION['registroTipoPlato']);
echo "</pre>"; */

if (isset($_SESSION['registroTipoPlato'])) {
    $registroTipoPlato = $_SESSION['registroTipoPlato'];
    $cantCategorias = count($registroTipoPlato);
	//unset($_SESSION['registroTipoPlato']);
}

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

    <title>Insertar Tipo de Plato</title>

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
    <h2 class="panel-title">Gestión de Plato</h2>
    <h3 class="panel-title">Inserción de Plato.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id" name="plaId" type="number" pattern="" required="required" autofocus 
						value=<?php if(isset($_SESSION['plaId'])) echo $_SESSION['plaId']; unset($_SESSION['plaId']);  ?>>
                        <div></div>  
                    </td>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Descripcion" name="plaDescripcion" type="text"  required="required" 
						value=<?php if(isset($_SESSION['plaDescripcion'])) echo $_SESSION['plaDescripcion']; unset($_SESSION['plaDescripcion']);  ?>>
                        <div></div>  
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Precio" name="plaPrecio" type="number"  required="required"  
						value=<?php if(isset($_SESSION['plaPrecio'])) echo $_SESSION['plaPrecio']; unset($_SESSION['plaPrecio']);  ?>>
                        <div></div>  
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Estado" name="plaEstado" type="number"  required="required" 
						value=<?php if(isset($_SESSION['plaEstado'])) echo $_SESSION['plaEstado']; unset($_SESSION['plaEstado']);  ?>>
                        <div></div>  
                    </td>
                </tr>
                <tr>
                    <td>
                        <select class="form-control" id="plaIdTipoPlato" name="plaIdTipoPlato">    
                            <?php
                            for ($j = 0; $j < $cantCategorias; $j++) {
                                ?>						
                                <option value=<?php echo $registroTipoPlato[$j]->tipPlaId; ?>> <?php echo $registroTipoPlato[$j]->tipPlaId . " - " . $registroTipoPlato[$j]->tipPlaPlato; ?>   </option>
						    <?php } ?>
                        </select> 
                        <hr>
                    </td>                       
                </tr>             
                <tr class="my-2">            
                    <td >    
                        <button href="#" class="btn btn-danger btn-icon-split" type="submit" name="ruta" value="cancelarInsertarTipoPlato"> <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Cancelar</span> </button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button  href="#" class="btn btn-success btn-icon-split" class = ".text-white-50" type="submit" name="ruta" value="insertarPlato"><span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Agregar Plato</span></button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>
