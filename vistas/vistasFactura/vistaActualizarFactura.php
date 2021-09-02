<?php

if (isset($_SESSION['actualizarDatosFactura'])) {
    $actualizarDatosFactura = $_SESSION['actualizarDatosFactura'];
    unset($_SESSION['actualizarLibro']);
}
if (isset($_SESSION['registroCodigoMesero'])) { /* * ************************ */
    $registroCodigoMesero = $_SESSION['registroCodigoMesero'];
    $cantCategorias = count($registroCodigoMesero);
}

/* echo "<pre>";
print_r($_SESSION);
echo "<pre>"; */

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Factura</h2>
    <h3 class="panel-title">Actualización deFactura.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id" name="facId" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosFactura->facId)){ echo $actualizarDatosFactura->facId; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Nombre Cliente" name="facNombreCliente" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosFactura->facNombreCliente)){ echo $actualizarDatosFactura->facNombreCliente; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Orden" name="facIdOrden" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosFactura->facIdOrden)){ echo $actualizarDatosFactura->facIdOrden; }
							   ?>">
                    </td>
                </tr>                  
                <tr>
                </tr>  
                <tr>
                    <td>
                        <p>Codigo Mesero                         
                        <select id="CodigoMesero_codMesId" name="CodigoMesero_codMesId" >
							<?php
							for ($j=0; $j< $cantCategorias; $j++) {
							?>
								<option value ="<?php echo $registroCodigoMesero[$j]->codMesId; ?>" 
								
                                           <?php
                                if (isset($registroCodigoMesero[$j]->codMesId) && isset($actualizarDatosFactura->CodigoMesero_codMesId) && ($registroCodigoMesero[$j]->codMesId == $actualizarDatosFactura->CodigoMesero_codMesId)) {
                                    echo "selected";
                                }
                                ?>> 
								
								<?php echo $registroCodigoMesero[$j]->codMesCodigoMesero; ?></option> 
							<?php
							}
							?>
						</select> </p>

                    </td>                       
                </tr>             
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarLibro">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarLibro">Actualizar Libro</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>						