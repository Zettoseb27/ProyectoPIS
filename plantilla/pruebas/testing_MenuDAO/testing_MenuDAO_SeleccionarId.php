<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloMenu/MenuDAO.php";

     $memId = array(2);

     $menu = new MenuDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);

     $listado=$menu->seleccionarId($memId);

     echo "<pre>";
     print_r($listado);
     echo "</pre>";

?>