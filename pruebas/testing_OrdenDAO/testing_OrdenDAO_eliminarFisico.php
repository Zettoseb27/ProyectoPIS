<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';
     include_once PATH.'modelos/modeloOrden/OrdenDAO.php';

     $Id = array(1);

     $orden = new OrdenDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $OrdenEliminadoFisico = $orden->eliminar($Id);

    echo "<pre>";
    print_r($OrdenEliminadoFisico);
    echo "</pre>";
?>