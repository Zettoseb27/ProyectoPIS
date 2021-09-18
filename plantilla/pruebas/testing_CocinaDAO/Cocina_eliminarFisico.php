<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';
     include_once PATH.'modelos/modeloCocina/CocinaDAO.php';

     $cociId = array(1);

     $cocinero = new CocinaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $CocinaEliminadoFisico=$cocinero->eliminar($cociId);

    echo "<pre>";
    print_r($CocinaEliminadoFisico);
    echo "</pre>";
?>