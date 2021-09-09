<?php

if (isset($_SESSION['actualizarDatosPlato'])) {
    $actualizarDatosPlato = $_SESSION['actualizarDatosPlato'];
    unset($_SESSION['actualizarPlato']);
}
if (isset($_SESSION['registroTipoPlato'])) { /* * ************************ */
    $registroTipoPlato = $_SESSION['registroTipoPlato'];
    $cantCategorias = count($registroTipoPlato);
}


/* echo "<pre>";
print_r($_SESSION);
echo "<pre>"; */

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Plato</h2>
    <h3 class="panel-title">Actualización de Plato.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id" name="plaId" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosPlato->plaId)){ echo $actualizarDatosPlato->plaId; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Descripcion" name="plaDescripcion" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosPlato->plaDescripcion)){ echo  $actualizarDatosPlato->plaDescripcion; } 
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Precio" name="plaPrecio" type="number"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosPlato->plaPrecio)){ echo $actualizarDatosPlato->plaPrecio; }
							   ?>">
                               
                    </td>
                </tr> 
                <tr>
                    <td>
                        <select  class="form-control" id="plaIdTipoPlato" name="plaIdTipoPlato"> 
							<?php
							for ($j=0; $j< $cantCategorias; $j++) {
							?>
								<option value ="<?php echo $registroTipoPlato[$j]->tipPlaId; ?>" 
								
                                           <?php
                                if (isset($registroTipoPlato[$j]->tipPlaId) && isset($actualizarDatosPlato->plaIdTipoPlato) && ($registroTipoPlato[$j]->tipPlaId == $actualizarDatosPlato->plaIdTipoPlato)) {
                                    echo "selected";
                                }
                                ?>                                       

                                        > 
								
								<?php echo $registroTipoPlato[$j]->tipPlaPlato; ?></option> 
							<?php
							}
							?>
						</select>
                        <hr> 
                    </td>                       
                </tr>                               
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarPlato">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarPlato">Actualizar Plato</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>						
