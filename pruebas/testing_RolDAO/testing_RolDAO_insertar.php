<?php


    include_once '../../modelos/ConstantesConexion.php';
    include_once PATH.'modelos/ConBdMysql.php';
    include_once PATH.'modelos/modeloRol/RolDAO.php';

    $registro['rolId'] = 10;
    $registro['rolNombre'] = "Dama";
    $registro['rolDescripcion'] = "hACEMOS cOSAS";

    $Rol = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

    $insertar = $Rol->insertar($registro);


    echo "<pre>";
    print_r($insertar);
    echo "</pre>";

?>