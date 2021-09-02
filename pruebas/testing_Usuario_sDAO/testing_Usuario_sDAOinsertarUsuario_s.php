<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modelo/RolDAO.php';



$registro['rolId'] = 5;



$Rol=new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

$insertarRol=$Rol->insertar($Rol);


echo "<pre>";
print_r($Rol);
echo "</pre>";