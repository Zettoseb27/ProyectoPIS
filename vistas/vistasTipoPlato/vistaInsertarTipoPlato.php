<?php

 echo "<pre>";
print_r($_SESSION['registroTipoPlato']);
echo "</pre>"; 
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
}

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Tipo Plato</h2>
    <h3 class="panel-title">Inserción de Tipo Plato.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="ID" name="tipPlaId" type="number" pattern="" required="required" autofocus 
						value=<?php if(isset($_SESSION['tipPlaId'])) echo $_SESSION['tipPlaId']; unset($_SESSION['tipPlaId']);  ?>>
                        <div></div>  
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="PLATO" name="tipPlaPlato" type="text"   required="required" 
						value=<?php if(isset($_SESSION['tipPlaPlato'])) echo $_SESSION['tipPlaPlato']; unset($_SESSION['tipPlaPlato']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="ADICIONAL" name="tipPlaAdicional" type="text"  required="required" 
						value=<?php if(isset($_SESSION['tipPlaAdicional'])) echo $_SESSION['tipPlaAdicional']; unset($_SESSION['tipPlaAdicional']);  ?>>
                        <div></div> 
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="BEBIDA" name="tipPlaBebida" type="text"  required="required" 
						value=<?php if(isset($_SESSION['tipPlaBebida'])) echo $_SESSION['tipPlaBebida']; unset($_SESSION['tipPlaBebida']);  ?>>
                        <div></div>        
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="POSTRE" name="tipPlaPostre" type="text"  required="required" 
						value=<?php if(isset($_SESSION['tipPlaPostre'])) echo $_SESSION['tipPlaPostre']; unset($_SESSION['tipPlaPostre']);  ?>>
                        <div></div>        
                    </td>
                </tr>              
                <tr>
                    <td>            
                        <button type="button" name="ruta" value="cancelarInsertarTipoPlato">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarTipoPlato">Agregar Libro</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>


