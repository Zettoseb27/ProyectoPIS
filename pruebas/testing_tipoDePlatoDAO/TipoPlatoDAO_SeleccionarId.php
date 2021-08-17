<?php
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH."modelos/modelotipoDePlato/tipoDePlatoDAO.php"; 
     
     $tipPlaId = array(3);

     $tipoPlato = new tipoDePlatoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);

     $consulta = $tipoPlato -> seleccionarId($tipPlaId);

     echo "<pre>";
     print_r($consulta);
     echo "</pre>";
?>