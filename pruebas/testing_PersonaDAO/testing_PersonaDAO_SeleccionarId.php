<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloPersona/PersonaDAO.php";

     $perId = array(9);

     $orden = new PersonaDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);

     $listado=$orden->seleccionarId($perId);

     echo "<pre>";
     print_r($listado);
     echo "</pre>";

?>