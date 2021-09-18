<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';
     include_once PATH.'modelos/modeloCodigoMesero/CodigoMeseroDAO.php';

     $codMesId = array(7);

     $CodigoMesero = new CodigoMeseroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $CodMesEliminadoFisico=$CodigoMesero->eliminar($codMesId);

    echo "<pre>";
    print_r($CodMesEliminadoFisico);
    echo "</pre>";
?>