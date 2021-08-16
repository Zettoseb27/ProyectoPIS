<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloPlato/PlatoDAO.php";

     $plaId = array(1);

     $Plato = new PlatoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);

     $listado = $Plato->seleccionarId($plaId);

     echo "<pre>";
     print_r($listado);
     echo "</pre>";

?>