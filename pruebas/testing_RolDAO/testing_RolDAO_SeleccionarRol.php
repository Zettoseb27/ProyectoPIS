<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloRol/RolDAO.php';

$sId=array(5);


$lRol=new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$SeleccionarRol=$Rol->seleccionarId($sId);

echo "<pre>";
print_r($SeleccionarRol);
echo "</pre>";
