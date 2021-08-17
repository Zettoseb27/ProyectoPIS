<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloCocina/CocinaDAO.php";

     $cociId = array(2);
     $Cocina = new CocinaDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
     $listado=$Cocina->seleccionarId($cociId);

     echo "<pre>";
     print_r($listado);
     echo "</pre>";

?>