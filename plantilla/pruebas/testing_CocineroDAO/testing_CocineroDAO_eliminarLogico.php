<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH. 'modelos/ConBdMysql.php';
     include_once PATH. 'modelos/modeloCocinero/CocineroDAO.php';

     $cocId=array(2);

     $cocinero = new CocineroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $cocineroEliminadorLogico = $cocinero -> eliminadorLogico($cocId);

     echo "<pre>";
    print_r($cocineroEliminadorLogico);
    echo "</pre>";
?>