<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';
     include_once PATH.'modelos/modeloMenu/MenuDAO.php';

     $menId = array(1);

     $menu = new MenuDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $OrdenEliminadoFisico=$menu->eliminar($menId);

    echo "<pre>";
    print_r($OrdenEliminadoFisico);
    echo "</pre>";
?>