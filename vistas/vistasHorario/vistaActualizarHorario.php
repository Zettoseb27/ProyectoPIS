<?php
if (isset($_SESSION['actualizarDatosHorario'])) {
    $actualizarDatosHorario = $_SESSION['actualizarDatosHorario'];   
    unset($_SESSION['ActualizarHorario']);  
}
if (isset($_SESSION['registroCodigoMesero'])) { 
    $registroCodigoMesero = $_SESSION['registroCodigoMesero'];
    $Horario = count($registroCodigoMesero);
} 
/* echo "<pre>";
print_r($_SESSION);
echo "<pre>"; */

?>
<div class="panel-heading">
    <h2 class="panel-title">Actualización de Horario Mesero.</h2>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id" name="horId" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosHorario->horId)){ echo $actualizarDatosHorario->horId; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Hora de Inicia" name="horHoraInicio" type="time"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosHorario->horHoraInicio)){ echo $actualizarDatosHorario->horHoraInicio; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Hora Fin" name="horHoraFin" type="time"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosHorario->horHoraFin)){ echo $actualizarDatosHorario->horHoraFin; }
							   ?>">
                               <hr>
                    </td>
             </tr>
                    <td> Codigo Mesero 
                        <br> <select  class="form-control" id="horIdCodigoMesero" name="horIdCodigoMesero" disabled = ""> 
							<?php
                            
							for ($j=0; $j< $Horario; $j++) {
							?>
								<option value ="<?php echo $registroCodigoMesero[$j]->codMesId; ?>" 
								
                                           <?php
                                if (isset($registroCodigoMesero[$j]->codMesId) && isset($actualizarDatosHorario->horIdCodigoMesero) && ($registroCodigoMesero[$j]->codMesId == $actualizarDatosHorario->horIdCodigoMesero)) {
                                    echo "selected";
                                }
                                ?>> 
								<?php echo $registroCodigoMesero[$j]->codMesCodigoMesero; ?></option> 
                            
							<?php
							}
                            
							?>
						</select>   
                        <br>       
                    </td>                       
                </tr>         
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarHorario">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarHorario">Actualizar Horario Mesero</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>						