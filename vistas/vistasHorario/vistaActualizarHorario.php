<?php
if (isset($_SESSION['actualizarDatosHorario'])) {
    $actualizarDatosHorario = $_SESSION['actualizarDatosHorario'];   
    unset($_SESSION['ActualizarHorario']);  
}
if (isset($_SESSION['registroCodigoMesero'])) { 
    $registroCodigoMesero = $_SESSION['registroCodigoMesero'];
    $Menu = count($registroCodigoMesero);
} 
/* echo "<pre>";
print_r($_SESSION);
echo "<pre>"; */

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Horario Mesero</h2>
    <h3 class="panel-title">Actualización de Horario Mesero.</h3>
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
                        <input class="form-control" placeholder="Hora de Inicia" name="horHoraInicio" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosHorario->horHoraInicio)){ echo $actualizarDatosHorario->horHoraInicio; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Hora Fin" name="horHoraFin" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosHorario->horHoraFin)){ echo $actualizarDatosHorario->horHoraFin; }
							   ?>">
                    </td>
             </tr>
                    <td> Codigo Mesero 
                        <select id="categoriaPersona_Documento" name="categoriaPersona_Documento"> 
							<?php
                            
							for ($j=0; $j< $Menu; $j++) {
							?>
								<option value ="<?php echo $registroCodigoMesero[$j]->codMesCodigoMesero; ?>" 
								
                                           <?php
                                if (isset($registroCodigoMesero[$j]->codMesCodigoMesero) && isset($actualizarDatosHorario->categoriaPersona_Documento) && ($registroCodigoMesero[$j]->codMesCodigoMesero == $actualizarDatosHorario->categoriaPersona_Documento)) {
                                    echo "selected";
                                }
                                ?>> 
								<?php echo $registroCodigoMesero[$j]->codMesCodigoMesero; ?></option> 
                            
							<?php
							}
                            
							?>
						</select>          
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