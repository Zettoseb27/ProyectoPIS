<?php


if (isset($_SESSION['actualizarDatosCocinero'])) {
    $actualizarDatosCocinero = $_SESSION['actualizarDatosCocinero'];     
    unset($_SESSION['actualizarDatosCocinero']);  
}
if (isset($_SESSION['registroPersona'])) { 
    $registroPersona = $_SESSION['registroPersona'];
    $Menu = count($registroPersona); 
}

/*echo "<pre>";
print_r($_SESSION);
echo "<pre>"; */


?>
<div class="panel-heading">
    <h2 class="panel-title">Actualización Cocinero</h2>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id" name="cocId" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosCocinero->cocId)){ echo $actualizarDatosCocinero->cocId; }
							   ?>">
                    </td>
                </tr>
                <tr> 
                    <td>                
                        <input class="form-control" placeholder="Codigo Cocinero" name="cocIdCodigoCocinero" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosCocinero->cocIdCodigoCocinero)){ echo $actualizarDatosCocinero->cocIdCodigoCocinero; }
							   ?>">
                    </td>
                </tr>  
                <td>  Nombre 
                        <br> <select class="form-control" id="cocIdCocinero" name="cocIdCocinero" autofocus>  
							<?php
							for ($j=0; $j< $Menu; $j++) {
							?>
								<option disabled="" value ="<?php echo $registroPersona[$j]->perId; ?>" 
								
                                           <?php
                                if (isset($registroPersona[$j]->perId) && isset($actualizarDatosCocinero->cocIdCocinero) && ($registroPersona[$j]->perId == $actualizarDatosCocinero->cocIdCocinero)) {
                                    echo "selected";
                                }
                                ?>> 
								<?php echo $registroPersona[$j]->perNombre; ?>
                                <?php echo $registroPersona[$j]->perApellido; ?> </option> 
                            
							<?php
							}
                            ?>
						</select> 
                    </td>                       
                </tr>            
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarCocinero">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarCocinero">Actualizar Codigo Cocinero</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>						