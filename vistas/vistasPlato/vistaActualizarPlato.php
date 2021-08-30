<?php

if (isset($_SESSION['actualizarDatosPlato'])) {
    $actualizarDatosPlato = $_SESSION['actualizarDatosPlato'];
    unset($_SESSION['actualizarPlato']);
}
if (isset($_SESSION['registroTipoPlato'])) { /* * ************************ */
    $registroTipoPlato = $_SESSION['registroTipoPlato'];
    $cantCategorias = count($registroTipoPlato);
}


/* echo "<pre>";
print_r($_SESSION);
echo "<pre>"; */

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Plato</h2>
    <h3 class="panel-title">Actualización de Plato.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id" name="rolId" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosPlato->rolId)){ echo $actualizarDatosPlato->rolId; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Descripcion" name="rolNombre" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosPlato->rolNombre)){ echo $actualizarDatosPlato->rolNombre; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Precio" name="rolDescripcion" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosPlato->rolDescripcion)){ echo $actualizarDatosPlato->rolDescripcion; }
							   ?>">
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Estado" name="rol_created_at" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosPlato->rol_created_at)){ echo $actualizarDatosPlato->rol_created_at; }
							   ?>">
                    </td>
                </tr>             
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarRol">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarRol">Actualizar Plato</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>						
