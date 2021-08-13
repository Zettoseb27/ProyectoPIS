<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloRol/rolDAO.php";
     
    
     $rol = new rolDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
     $listadoCompleto = $rol -> seleccionarTodos();

     echo "<pre>";
     print_r($listadoCompleto);
     echo "</pre>";

?>