<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloMesa/MesaDAO.php";

     $mesId = array(4);

     $Mesa = new MesaDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);

     $listado=$Mesa->seleccionarId($mesId);

     echo "<pre>";
     print_r($listado);
     echo "</pre>";

?>