<?php
if (isset($_SESSION['actualizarDatosRol'])) {
    $actualizarDatosRol = $_SESSION['actualizarDatosRol'];
    unset($_SESSION['actualizarRol']);
}
/* echo "<pre>";
print_r($_SESSION);
echo "<pre>"; */

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Rol</h2>
    <h3 class="panel-title">Actualización de Rol.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id" name="rolId" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosRol->rolId)){ echo $actualizarDatosRol->rolId; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Nombre" name="rolNombre" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosRol->rolNombre)){ echo $actualizarDatosRol->rolNombre; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Descripcion" name="rolDescripcion" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosRol->rolDescripcion)){ echo $actualizarDatosRol->rolDescripcion; }
							   ?>">
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Creacion" name="rol_created_at" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosRol->rol_created_at)){ echo $actualizarDatosRol->rol_created_at; }
							   ?>">
                    </td>
                </tr>             
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarRol">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarRol">Actualizar Rol</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>						
