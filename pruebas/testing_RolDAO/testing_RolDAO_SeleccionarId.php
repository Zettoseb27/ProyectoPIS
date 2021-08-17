<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloRol/RolDAO.php';

$rolId = array(2);

$Rol = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
$SeleccionarRol = $Rol->seleccionarId($rolId);

echo "<pre>";
print_r($SeleccionarRol);
echo "</pre>";
