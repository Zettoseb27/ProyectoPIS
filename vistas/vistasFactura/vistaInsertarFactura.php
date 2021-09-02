<?php

/* echo "<pre>";
print_r($_SESSION['registroCategoriasLibros']);
echo "</pre>"; */

if (isset($_SESSION['registroCategoriasLibros'])) {
    $registroCategoriasLibros = $_SESSION['registroCategoriasLibros'];
    $cantCategorias = count($registroCategoriasLibros);
	//unset($_SESSION['registroCategoriasLibros']);
}
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de libros</h2>
    <h3 class="panel-title">Inserción de Libros.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>
                        <input class="form-control" placeholder="ISBN" name="isbn" type="number" pattern="" required="required" autofocus 
						value=<?php if(isset($_SESSION['isbn'])) echo $_SESSION['isbn']; unset($_SESSION['isbn']);  ?>>
                        <div></div>  
                    </td>
                </tr>
                <tr>
                    <td>                
                        <input class="form-control" placeholder="TITULO" name="titulo" type="text"   required="required" 
						value=<?php if(isset($_SESSION['titulo'])) echo $_SESSION['titulo']; unset($_SESSION['titulo']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="AUTOR" name="autor" type="text"  required="required" 
						value=<?php if(isset($_SESSION['autor'])) echo $_SESSION['autor']; unset($_SESSION['autor']);  ?>>
                        <div></div> 
                    </td>
                </tr>                  
                <tr>
                    <td>                  
                        <input class="form-control" placeholder="PRECIO" name="precio" type="number"  required="required" 
						value=<?php if(isset($_SESSION['precio'])) echo $_SESSION['precio']; unset($_SESSION['precio']);  ?>>
                        <div></div>        
                    </td>
                </tr>  
                <tr>
                    <td>
                        <select id="categoriaLibro_catLibId" name="categoriaLibro_catLibId">    
                            <?php
                            for ($j = 0; $j < $cantCategorias; $j++) {
                                ?>						
                                <option value=<?php echo $registroCategoriasLibros[$j]->catLibId; ?>> <?php echo $registroCategoriasLibros[$j]->catLibId . " - " . $registroCategoriasLibros[$j]->catLibNombre; ?>   </option>
						    <?php } ?>
                        </select> 
                    </td>                       
                </tr>             
                <tr>
                    <td>            
                        <button type="button" name="ruta" value="cancelarInsertarLibro">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarLibro">Agregar Libro</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>



