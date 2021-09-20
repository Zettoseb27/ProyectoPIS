<?php
/*
echo "<pre>";  
print_r($_SESSION['registroOrden']); 
echo "</pre>"; 
echo "<pre>"; 
print_r($_SESSION['registroMesa']);
echo "</pre>"; 
/*echo "<pre>"; 
print_r($_SESSION['registroTipoDePlato']); 
echo "</pre>"; */

if (isset($_SESSION['registroOrden'])) {
    $registroOrden = $_SESSION['registroOrden']; 
    $cantCategorias = count($registroOrden);
    // unset($_SESSION['registroOrden']);
}
if (isset($_SESSION['registroMesa'])) {
     $registroMesa = $_SESSION['registroMesa']; 
     $cantMesa = count($registroMesa);
     // unset($_SESSION['registroMesa']);
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
    <h2 class="panel-title">Inserción Orden.</h2>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id" name="ordId" type="number" pattern="" required="required" autofocus 
						value=<?php if(isset($_SESSION['ordId'])) echo $_SESSION['ordId']; unset($_SESSION['ordId']);  ?>>
                        <div></div>  
                    </td>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Valor Total" name="ordvalorTotal" type="number"  required="required" 
						value=<?php if(isset($_SESSION['ordvalorTotal'])) echo $_SESSION['ordvalorTotal']; unset($_SESSION['ordvalorTotal']);  ?>>
                        <div></div>  
                    </td>
                </tr>
                <tr>
                    <td>
                        <select class="form-control" id="ordIdMenu" name="ordIdMenu">    
                             <option disabled="">Seleccione Menu</option>
                            <?php
                            for ($j = 0; $j < $cantCategorias; $j++) {
                                ?>						
                                <option value=<?php echo $registroOrden[$j]->menId; ?>> <?php echo $registroOrden[$j]->menId . " - " . $registroOrden[$j]->menId ?>   </option>
						    <?php } ?>
                        </select> 
                        <hr>
                    </td>                       
                </tr> 
                <tr>
                    <td>
                        <select class="form-control" id="ordIdMesa" name="ordIdMesa">
                         <option disabled="">Seleccione  Mesa</option>    
                            <?php
                            for ($i = 0; $i < $cantMesa; $i++) {
                                ?>						
                                <option value=<?php echo $registroMesa[$i]->mesId; ?>> <?php echo "Mesa ".$registroMesa[$i]->mesNumeroMesa. " para ".$registroMesa[$i]->mesCantidadComensales." Comensales"; ?>   </option>
						    <?php } ?>
                        </select> 
                        <hr>
                    </td>                      
                </tr>                
                <tr class="my-2">            
                    <td >    
                        <button href="#" class="btn btn-danger btn-icon-split" type="submit" name="ruta" value="cancelarInsertarOrden"> <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Cancelar</span> </button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button  href="#" class="btn btn-success btn-icon-split" class = ".text-white-50" type="submit" name="ruta" value="insertarOrden"><span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Agregar Orden</span></button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>
