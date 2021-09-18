<?php
if (isset($_SESSION['actualizarDatosHorarioCocinero'])) {
    $actualizarDatosHorarioCocinero = $_SESSION['actualizarDatosHorarioCocinero'];   
    unset($_SESSION['actualizarCocina']); 
}
if (isset($_SESSION['registroMenu'])) { /* * ************************ */
    $registroMenu = $_SESSION['registroMenu'];
    $Menu = count($registroMenu);
}
echo "<pre>";
print_r($_SESSION['registroCocinero']);
echo "<pre>"; 

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
                        <input class="form-control" placeholder="TITULO" name="horCocHoraInicio" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosHorarioCocinero->horCocHoraInicio)){ echo $actualizarDatosHorarioCocinero->horCocHoraInicio; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="AUTOR" name="autor" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosHorarioCocinero->autor)){ echo $actualizarDatosHorarioCocinero->autor; }
							   ?>">
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="PRECIO" name="precio" type="number"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosHorarioCocinero->precio)){ echo $actualizarDatosHorarioCocinero->precio; }
							   ?>">
                    </td>
                </tr>  
                <tr>
                    <td>
                        <select id="categoriaLibro_catLibId" name="categoriaLibro_catLibId"> 
							<?php
							for ($j=0; $j< $Menu; $j++) {
							?>
								<option value ="<?php echo $registroMenu[$j]->catLibId; ?>" 
								
                                           <?php
                                if (isset($registroMenu[$j]->catLibId) && isset($actualizarDatosHorarioCocinero->categoriaLibro_catLibId) && ($registroMenu[$j]->catLibId == $actualizarDatosHorarioCocinero->categoriaLibro_catLibId)) {
                                    echo "selected";
                                }
                                ?>                                       

                                        > 
								
								<?php echo $registroMenu[$j]->catLibNombre; ?></option> 
							<?php
							}
							?>
						</select> 
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