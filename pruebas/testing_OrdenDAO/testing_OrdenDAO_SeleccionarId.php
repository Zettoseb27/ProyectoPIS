<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloOrden/OrdenDAO.php";

     $ordId = array(1);

     $orden = new OrdenDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);

     $listado=$orden->seleccionarId($ordId);

     echo "<pre>";
     print_r($listado);
     echo "</pre>";

?>