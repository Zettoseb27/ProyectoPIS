<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';
     include_once PATH.'modelos/modeloOrden/OrdenDAO.php';
     
     $ordId=array(7);
     
     $orden=new OrdenDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

    $ordenHabilitar = $orden ->habilitar($ordId);

    echo "<pre>";
    print_r($ordenHabilitar);
    echo "</pre>";

?>