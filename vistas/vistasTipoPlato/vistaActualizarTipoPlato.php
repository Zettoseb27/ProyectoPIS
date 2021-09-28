<?php

if (isset($_SESSION['actualizarDatosTipoPlato'])) { 
    $actualizarDatosTipoPlato = $_SESSION['actualizarDatosTipoPlato'];
    unset($_SESSION['actualizarTipoPlato']); 
}


/* echo "<pre>";
print_r($_SESSION);
echo "<pre>"; */

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Tipo de  Plato</h2>
    <h3 class="panel-title">Actualización de Tipo de  Plato.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id" name="tipPlaId" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosTipoPlato->tipPlaId)){ echo $actualizarDatosTipoPlato->tipPlaId; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Descripcion" name="tipPlaPlato" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosTipoPlato->tipPlaPlato)){ echo $actualizarDatosTipoPlato->tipPlaPlato; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Adicional" name="tipPlaAdicional" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosTipoPlato->tipPlaAdicional)){ echo $actualizarDatosTipoPlato->tipPlaAdicional; }
							   ?>">
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Bebida" name="tipPlaBebida" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosTipoPlato->tipPlaBebida)){ echo $actualizarDatosTipoPlato->tipPlaBebida; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Postre" name="tipPlaPostre" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosTipoPlato->tipPlaPostre)){ echo $actualizarDatosTipoPlato->tipPlaPostre; }
							   ?>">
                    </td>
                </tr>              
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarTipoPlato">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarTipoPlato">Actualizar Tipo Plato</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>						
