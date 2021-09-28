<?php
if (isset($_SESSION['actualizarDatosCodigoMesero'])) {
    $actualizarDatosCodigoMesero = $_SESSION['actualizarDatosCodigoMesero'];    
    unset($_SESSION['actualizarCodigoMesero']); 
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
    <h2 class="panel-title">Actualización de Codigo Mesero.</h2>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id" name="codMesId" type="number" pattern="" required="required"  autofocus readonly="readonly"
                               value="<?php 
									if(isset($actualizarDatosCodigoMesero->codMesId)){ echo $actualizarDatosCodigoMesero->codMesId; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Codigo Mesero" name="codMesCodigoMesero" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosCodigoMesero->codMesCodigoMesero)){ echo $actualizarDatosCodigoMesero->codMesCodigoMesero; }
							   ?>">
                               <hr>
                    </td>
                </tr>
                    <td>  Nombre 
                        <br> <select class="form-control" id="codMesIdMesero" name="codMesIdMesero" pattern="" autofocus  >  
							<?php
							for ($j=0; $j< $Menu; $j++) {
							?>
                               
								<option disabled="" value ="<?php echo $registroPersona[$j]->perId; ?>" 
								
                                           <?php
                                if (isset($registroPersona[$j]->perId) && isset($actualizarDatosCodigoMesero->codMesIdMesero) && ($registroPersona[$j]->perId == $actualizarDatosCodigoMesero->codMesIdMesero)) {
                                    echo "selected";
                                }
                                ?>> 
								<?php echo $registroPersona[$j]->perNombre; ?>
                                <?php echo $registroPersona[$j]->perApellido; ?> </option> 
                            
							<?php
							}
							?>
						</select> 
                        <br>
                    </td>                       
                </tr>           
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarCodigoMesero">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarCodigoMesero">Actualizar Codigo Mesero</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>						