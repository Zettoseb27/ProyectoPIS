<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH. 'modelos/ConBdMysql.php';
     include_once PATH. 'modelos/modelotipoDePlato/tipoDePlatoDAO.php';
     
     $eliminar = new tipoDePlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $tipPlaId = array(5);

     $eliminarPorId = $eliminar -> eliminar($tipPlaId);

     echo "<pre>";
     print_r($eliminarPorId);
     echo "</pre>";
?>