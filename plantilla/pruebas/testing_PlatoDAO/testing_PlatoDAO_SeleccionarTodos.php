<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloPlato/PlatoDAO.php";
     
    
     $plato = new PlatoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
     $listadoCompleto = $plato -> seleccionarTodos();

     echo "<pre>";
     print_r($listadoCompleto);
     echo "</pre>";

?>