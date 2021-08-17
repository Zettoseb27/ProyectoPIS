<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloCocinero/CocineroDAO.php";

     $cocId = array(5);

     $menu = new CocineroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);

     $listado=$menu->seleccionarId($cocId);

     echo "<pre>";
     print_r($listado);
     echo "</pre>";

?>