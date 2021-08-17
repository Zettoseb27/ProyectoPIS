<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloCocina/CocinaDAO.php";
     
    
     $Cocina = new CocinaDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
     $listadoCompleto = $Cocina -> seleccionarTodos();

     echo "<pre>";
     print_r($listadoCompleto);
     echo "</pre>";

?>