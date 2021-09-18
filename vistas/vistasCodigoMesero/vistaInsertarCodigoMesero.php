<?php

 /*echo "<pre>";  
print_r($_SESSION['registroCodigoMesero']);
echo "</pre>"; */

if (isset($_SESSION['registroCodigoMesero'])) {
    $registroCodigoMesero = $_SESSION['registroCodigoMesero']; 
    $cantCategorias = count($registroCodigoMesero);
	//unset($_SESSION['registroCodigoMesero']);
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
    <h2 class="panel-title">Gestión Codigo Mesero</h2>
    <h3 class="panel-title">Inserción Codigo Mesero.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id" name="codMesId" type="number" pattern="" required="required" autofocus 
						value=<?php if(isset($_SESSION['codMesId'])) echo $_SESSION['codMesId']; unset($_SESSION['codMesId']);  ?>>
                        <div></div>  
                    </td>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Codigo Mesero" name="codMesCodigoMesero" type="number"  required="required" 
						value=<?php if(isset($_SESSION['codMesCodigoMesero'])) echo $_SESSION['codMesCodigoMesero']; unset($_SESSION['codMesCodigoMesero']);  ?>>
                        <div></div>  
                    </td>
                </tr>
                <tr>
                    <td>
                        <select class="form-control" id="codMesIdMesero" name="codMesIdMesero">    
                            <?php
                            for ($j = 0; $j < $cantCategorias; $j++) {
                                ?>						
                                <option value=<?php echo $registroCodigoMesero[$j]->perId; ?>> <?php echo $registroCodigoMesero[$j]->perId . " - " . $registroCodigoMesero[$j]->perNombre. "  " . $registroCodigoMesero[$j]->perApellido; ?>   </option>
						    <?php } ?>
                        </select> 
                        <hr>
                    </td>                       
                </tr>             
                <tr class="my-2">            
                    <td >    
                        <button href="#" class="btn btn-danger btn-icon-split" type="submit" name="ruta" value="cancelarInsertarCoodigoMesero"> <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Cancelar</span> </button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button  href="#" class="btn btn-success btn-icon-split" class = ".text-white-50" type="submit" name="ruta" value="insertarCodigoMesero"><span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Agregar Codigo Mesero</span></button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>
