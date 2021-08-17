<?php


    include_once '../../modelos/ConstantesConexion.php';
    include_once PATH.'modelos/ConBdMysql.php';
    include_once PATH.'modelos/modeloRol/RolDAO.php';

    $registro['rolId'] = 10;
    $registro['rolNombre'] = "Cliente";
    $registro['rolDescripcion'] = "Cliente";
    $registro['rolEstado'] = 1;
    $registro['rolUsuSesion'] = null;
    $registro['rol_created_at'] = "2019-06-07 10:18:57";
    $registro['rol_updated_at'] = "2019-06-07 10:18:57";

    $Rol = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

    $insertar = $Rol->insertar($registro);


    echo "<pre>";
    print_r($insertar);
    echo "</pre>";

?>