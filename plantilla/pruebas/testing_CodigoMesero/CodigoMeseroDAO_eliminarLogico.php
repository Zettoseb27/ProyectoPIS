<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH. 'modelos/ConBdMysql.php';
     include_once PATH. 'modelos/modeloCodigoMesero/CodigoMeseroDAO.php';

     $codMesId=array(8);

     $CodigoMesero = new CodigoMeseroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $codMesEliminadorLogico = $CodigoMesero -> eliminadorLogico($codMesId);

     echo "<pre>";
    print_r($codMesEliminadorLogico);
    echo "</pre>";
?>