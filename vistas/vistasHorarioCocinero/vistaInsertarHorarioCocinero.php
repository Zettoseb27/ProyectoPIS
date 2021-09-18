<?php

 /*echo "<pre>";  
print_r($_SESSION['registroHorarioCocinero']);
echo "</pre>"; */

if (isset($_SESSION['registroHorarioCocinero'])) {
    $registroHorarioCocinero = $_SESSION['registroHorarioCocinero']; 
    $cantCategorias = count($registroHorarioCocinero);
	//unset($_SESSION['registroHorarioCocinero']);
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
    <h2 class="panel-title">Inserción Horario Cocinero.</h2>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id" name="horCocId" type="number" pattern="" required="required" autofocus 
						value=<?php if(isset($_SESSION['horCocId'])) echo $_SESSION['horCocId']; unset($_SESSION['horCocId']);  ?>>
                        <div></div>  
                    </td>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Hora Inicio" name="horCocHoraInicio" type="time"  required="required" 
						value=<?php if(isset($_SESSION['horCocHoraInicio'])) echo $_SESSION['horCocHoraInicio']; unset($_SESSION['horCocHoraInicio']);  ?>>
                        <div></div>  
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Hora Fin" name="horCocHoraFin" type="time"  required="required" 
						value=<?php if(isset($_SESSION['horCocHoraFin'])) echo $_SESSION['horCocHoraFin']; unset($_SESSION['horCocHoraFin']);  ?>>
                        <div></div>  
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Fecha" name="horCocFecha" type="date"  required="required" 
						value=<?php if(isset($_SESSION['horCocFecha'])) echo $_SESSION['horCocFecha']; unset($_SESSION['horCocFecha']);  ?>>
                        <div></div>  
                    </td>
                </tr>
                <tr>
                    <td>
                        <select class="form-control" id="horCocIdCocinero" name="horCocIdCocinero">    
                            <?php
                            for ($j = 0; $j < $cantCategorias; $j++) {
                                ?>						
                                <option value=<?php echo $registroHorarioCocinero[$j]->cocId; ?>> <?php echo $registroHorarioCocinero[$j]->cocId . " - " . $registroHorarioCocinero[$j]->cocIdCodigoCocinero; ?>   </option>
						    <?php } ?>
                        </select> 
                        <hr>
                    </td>                       
                </tr>             
                <tr class="my-2">            
                    <td >    
                        <button href="#" class="btn btn-danger btn-icon-split" type="submit" name="ruta" value="cancelarInsertarHorarioCocinero"> <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Cancelar</span> </button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button  href="#" class="btn btn-success btn-icon-split" class = ".text-white-50" type="submit" name="ruta" value="insertarHorarioCocinero"><span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Agregar Horario Cocinero</span></button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>
