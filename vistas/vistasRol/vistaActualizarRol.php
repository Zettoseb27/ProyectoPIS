<?php

if (isset($_SESSION['actualizarDatosRol'])) {
    $actualizarDatosRol = $_SESSION['actualizarDatosRol'];
    unset($_SESSION['actualizarRol']);
}


echo "<pre>";
print_r($_SESSION);
echo "<pre>"; 

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de libros</h2>
    <h3 class="panel-title">Actualización de Libro.</h3>
</div>
<fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                    <input class="form-control" placeholder="ISBN" name="isbn" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosRol->isbn)){ echo $actualizarDatosRol->isbn; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="TITULO" name="titulo" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosRol->titulo)){ echo $actualizarDatosRol->titulo; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="AUTOR" name="autor" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosRol->autor)){ echo $actualizarDatosRol->autor; }
							   ?>">
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="PRECIO" name="precio" type="number"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosRol->precio)){ echo $actualizarDatosRol->precio; }
							   ?>">
                    </td>
                </tr>  
                <tr>
                    <td>
                        <select id="categoriaLibro_catLibId" name="categoriaLibro_catLibId"> 
							<?php
							for ($j=0; $j< $cantCategorias; $j++) {
							?>
								<option value ="<?php echo $registroCategoriasLibros[$j]->catLibId; ?>" 
								
                                           <?php
                                if (isset($registroCategoriasLibros[$j]->catLibId) && isset($actualizarDatosRol->categoriaLibro_catLibId) && ($registroCategoriasLibros[$j]->catLibId == $actualizarDatosRol->categoriaLibro_catLibId)) {
                                    echo "selected";
                                }
                                ?>                                       

                                        > 
								
								<?php echo $registroCategoriasLibros[$j]->catLibNombre; ?></option> 
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