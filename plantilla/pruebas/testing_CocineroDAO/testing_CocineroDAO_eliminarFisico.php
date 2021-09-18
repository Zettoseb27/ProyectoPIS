<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';
     include_once PATH.'modelos/modeloCocinero/CocineroDAO.php';

     $cocId = array(123);

     $cocinero = new CocineroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $cocineroEliminadoFisico=$cocinero->eliminar($cocId);

    echo "<pre>";
    print_r($cocineroEliminadoFisico);
    echo "</pre>";
?>