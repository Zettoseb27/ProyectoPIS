<?php
if (isset($_SESSION['actualizarHorarioCocinero'])) {
    $actualizarDatosHorarioCocinero = $_SESSION['actualizarHorarioCocinero'];   
    unset($_SESSION['actualizarCocina']); 
}
if (isset($_SESSION['registroCocinero'])) { /* * ************************ */
    $registroCocinero = $_SESSION['registroCocinero'];
    $Menu = count($registroCocinero);
}
/*
echo "<pre>";
print_r($_SESSION['actualizarHorarioCocinero']);
echo "<pre>"; 
*/
?>
<div class="panel-heading">
    <h2 class="panel-title">Actualización de Horario Cocinero.</h2>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="ISBN" name="horCocId" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosHorarioCocinero->horCocId)){ echo $actualizarDatosHorarioCocinero->horCocId; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Hora Inicio" name="horCocHoraInicio" type="time"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosHorarioCocinero->horCocHoraInicio)){ echo $actualizarDatosHorarioCocinero->horCocHoraInicio; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Hora Final" name="horCocHoraFin" type="time"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosHorarioCocinero->horCocHoraFin)){ echo $actualizarDatosHorarioCocinero->horCocHoraFin; }
							   ?>">
                               <hr>
                    </td>
                </tr>                   
                <tr>
                    <td> Codigo Cocinero
                        <select class="form-control" id="horCocIdCocinero" name="horCocIdCocinero" disabled = ""> 
							<?php
							for ($j=0; $j< $Menu; $j++) {
							?>
								<option value ="<?php echo $registroCocinero[$j]->cocId; ?>" 
								
                                           <?php
                                if (isset($registroCocinero[$j]->cocId) && isset($actualizarDatosHorarioCocinero->horCocIdCocinero) && ($registroCocinero[$j]->cocId == $actualizarDatosHorarioCocinero->horCocIdCocinero)) {
                                    echo "selected";
                                }
                                ?>                                       

                                        > 
								
								<?php echo $registroCocinero[$j]->cocIdCodigoCocinero; ?></option> 
							<?php
							}
							?>
						</select> 
                        <br>
                    </td>                       
                </tr>             
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarHorarioCocinero">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarHorarioCocinero">Actualizar Libro</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>						