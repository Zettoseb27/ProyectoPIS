<?php
if (isset($_SESSION['actualizarDatosCocina'])) {
    $actualizarDatosCocina = $_SESSION['actualizarDatosCocina'];  
    unset($_SESSION['actualizarCocina']); 
}
if (isset($_SESSION['registroMenu'])) { /* * ************************ */
    $registroMenu = $_SESSION['registroMenu'];
    $Menu = count($registroMenu);
}
/* echo "<pre>";
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
                        <input class="form-control" placeholder="ISBN" name="isbn" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosCocina->isbn)){ echo $actualizarDatosCocina->isbn; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="TITULO" name="titulo" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosCocina->titulo)){ echo $actualizarDatosCocina->titulo; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="AUTOR" name="autor" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosCocina->autor)){ echo $actualizarDatosCocina->autor; }
							   ?>">
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="PRECIO" name="precio" type="number"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosCocina->precio)){ echo $actualizarDatosCocina->precio; }
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
                                if (isset($registroMenu[$j]->catLibId) && isset($actualizarDatosCocina->categoriaLibro_catLibId) && ($registroMenu[$j]->catLibId == $actualizarDatosCocina->categoriaLibro_catLibId)) {
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