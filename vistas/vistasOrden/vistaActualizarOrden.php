<?php
     
if (isset($_SESSION['actualizarDatosOrden'])) {
    $actualizarDatosOrden = $_SESSION['actualizarDatosOrden'];
    unset($_SESSION['actualizarLibro']);
}
if (isset($_SESSION['registroDatosMenu'])) { 
    $registroDatosMenu = $_SESSION['registroDatosMenu']; 
    $Menu = count($registroDatosMenu); 
} 
if (isset($_SESSION['registroDatosMesa'])) { 
    $registroDatosMesa = $_SESSION['registroDatosMesa']; 
    $Mesa = count($registroDatosMesa); 
} 
if (isset($_SESSION['registroDatosPlato'])) { 
    $registroDatosPlato = $_SESSION['registroDatosPlato']; 
    $Plato = count($registroDatosPlato); 
} 
if (isset($_SESSION['registroDatosTipoDePlato'])) { 
    $registroDatosTipoDePlato = $_SESSION['registroDatosTipoDePlato']; 
    $TipoDePlato = count($registroDatosTipoDePlato); 
} 
?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Orden</h2>
    <h3 class="panel-title">Actualización deOrden.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="ISBN" name="ordId" type="number" pattern="" required="required" autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosOrden->ordId)){ echo $actualizarDatosOrden->ordId; }
							   ?>">
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="AUTOR" name="ordvalorTotal" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosOrden->ordvalorTotal)){ echo $actualizarDatosOrden->ordvalorTotal; }
							   ?>">
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="PRECIO" name="precio" type="number"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosOrden->precio)){ echo $actualizarDatosOrden->precio; }
							   ?>">
                    </td>
                </tr>  
                <tr>
                    <td>
                        <select id="menu" name="menu"> 
							<?php
							for ($j=0; $j< $Menu; $j++) {
							?>
								<option value ="<?php echo $registroDatosMenu[$j]->catLibId; ?>" 
								
                                           <?php
                                if (isset($registroDatosMenu[$j]->catLibId) && isset($actualizarDatosOrden->menu) && ($registroDatosMenu[$j]->catLibId == $actualizarDatosOrden->menu)) {
                                    echo "selected";
                                }
                                ?>                                       

                                        > 
								
								<?php echo $registroDatosMenu[$j]->catLibNombre; ?></option> 
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