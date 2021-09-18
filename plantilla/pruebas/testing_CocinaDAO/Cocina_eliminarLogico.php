<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH. 'modelos/ConBdMysql.php';
     include_once PATH. 'modelos/modeloCocina/CocinaDAO.php';

     $cociId=array(2);

     $Cocina = new CocinaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $CocinaEliminadorLogico = $Cocina -> eliminadorLogico($cociId);

     echo "<pre>";
    print_r($CocinaEliminadorLogico);
    echo "</pre>";
?>