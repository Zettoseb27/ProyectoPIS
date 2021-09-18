<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';
     include_once PATH.'modelos/modelotipoDePlato/tipoDePlatoDAO.php';   

     $habilitar = new tipoDePlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $tipPlaId = array(2);

     $habilitartipoDePlato = $habilitar -> habilitar($tipPlaId);
    
     echo "<pre>";
     print_r ($habilitartipoDePlato);
     echo "</pre>";

?>