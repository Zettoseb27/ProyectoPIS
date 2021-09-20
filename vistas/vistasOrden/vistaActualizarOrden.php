<?php
     
if  (isset($_SESSION['actualizarDatosOrden'])) {
    $actualizarDatosOrden = $_SESSION['actualizarDatosOrden'];
    unset($_SESSION['actualizarLibro']);
}

if  (isset($_SESSION['registroMesa'])) { 
    $registroMesa = $_SESSION['registroMesa']; 
    $Mesa = count($registroMesa); 
} 
    /*echo "<pre>";
    print_r($_SESSION);
    echo "<pre>"; */

    echo "<pre>";
    print_r($_SESSION['registroMesa']);
    echo "<pre>"; 
?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Orden</h2>
    <h3 class="panel-title">Actualización de Orden.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id" name="ordId" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosOrden->ordId)){ echo $actualizarDatosOrden->ordId; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Precio Total" name="ordvalorTotal" type="number"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosOrden->ordvalorTotal)){ echo $actualizarDatosOrden->ordvalorTotal; }
							   ?>">
                    </td>
                </tr>                   
                <tr>
                    <td>
                        <hr>
                        <h6>Numero Mesa</h6>
                        <select class="form-control" id="ordIdMesa" name="ordIdMesa"> 
							<?php
							for ($j=0; $j< $Mesa; $j++) {
							?>
								<option value ="<?php echo $registroMesa[$j]->mesId; ?>" 
								
                                           <?php
                                if (isset($registroMesa[$j]->mesId) && isset($actualizarDatosOrden->ordIdMesa) && ($registroMesa[$j]->mesId == $actualizarDatosOrden->ordIdMesa)) {
                                    echo "selected";
                                }
                                ?>> 
								<?php echo $registroMesa[$j]->mesNumeroMesa; ?></option> 
							<?php
							}
							?>
						</select> 
                        <hr>
                    </td>   
                </tr>   
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarOrden">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarOrden">Actualizar Orden</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>						