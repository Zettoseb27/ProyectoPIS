<?php
if (isset($_SESSION['actualizarDatosPersona'])) {
    $actualizarDatosPersona = $_SESSION['actualizarDatosPersona'];
    unset($_SESSION['actualizarPersona']);
}
/*echo "<pre>";
print_r($_SESSION);
echo "<pre>";*/ 

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Persona</h2>
    <h3 class="panel-title">Actualización de Persona.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id" name="perId" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosPersona->perId)){ echo $actualizarDatosPersona->perId; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Documento" name="perDocumento" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosPersona->perDocumento)){ echo $actualizarDatosPersona->perDocumento; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Nombre" name="perNombre" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosPersona->perNombre)){ echo $actualizarDatosPersona->perNombre; }
							   ?>">
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Apellido" name="perApellido" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosPersona->perApellido)){ echo $actualizarDatosPersona->perApellido; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Creacion" name="per_created_at" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosPersona->per_created_at)){ echo $actualizarDatosPersona->per_created_at; }
							   ?>">
                    </td>
                </tr>            
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarPersona">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarPersona">Actualizar Persona</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>