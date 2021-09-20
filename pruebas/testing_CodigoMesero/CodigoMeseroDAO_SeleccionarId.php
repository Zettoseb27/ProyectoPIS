<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloCodigoMesero/CodigoMeseroDAO.php";

     $codMesId = array(2);

     $CodigoMesero = new CodigoMeseroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);

     $listado=$CodigoMesero->seleccionarId($codMesId);

     echo "<pre>";
     print_r($listado);
     echo "</pre>";

?>