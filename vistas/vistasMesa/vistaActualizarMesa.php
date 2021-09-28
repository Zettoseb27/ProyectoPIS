<?php
if (isset($_SESSION['actualizarDatosMesa'])) {
    $actualizarDatosMesa = $_SESSION['actualizarDatosMesa'];
    unset($_SESSION['actualizarMesa']);
}
/*echo "<pre>";
print_r($_SESSION);
echo "<pre>"; */

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Mesa</h2>
    <h3 class="panel-title">Actualización de Mesa.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="Id" name="mesId" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosMesa->mesId)){ echo $actualizarDatosMesa->mesId; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="Numero de Mesas" name="mesNumeroMesa" type="text"   required="required" 
                               value="<?php 
									if(isset($actualizarDatosMesa->mesNumeroMesa)){ echo $actualizarDatosMesa->mesNumeroMesa; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="Cantidad de Comensales" name="mesCantidadComensales" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosMesa->mesCantidadComensales)){ echo $actualizarDatosMesa->mesCantidadComensales; }
							   ?>">
                               <hr>
                    </td>
                </tr>                               
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarMesa">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmaActualizarMesa">Actualizar Mesa</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>						
