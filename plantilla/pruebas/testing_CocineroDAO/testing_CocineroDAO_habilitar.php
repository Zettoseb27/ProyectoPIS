<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';
     include_once PATH.'modelos/modeloCocinero/CocineroDAO.php';
     
     $cocId=array(3);
     
     $cocinero=new CocineroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

    $cocineroHabilitar = $cocinero ->habilitar($cocId);

    echo "<pre>";
    print_r($cocineroHabilitar);
    echo "</pre>";

?>