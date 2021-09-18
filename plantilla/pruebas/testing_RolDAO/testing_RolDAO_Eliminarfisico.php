<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloRol/RolDAO.php';

$rolId = array(20);


$Rol= new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

$EliminarfisicoRol = $Rol -> eliminar($rolId);

echo "<pre>";
print_r($EliminarfisicoRol);
echo "</pre>";