<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloRol/RolDAO.php';

$sId=array(258);

$Rol=new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);


$habiliatRol=$libros->habilitar($sId);

echo "<pre>";
print_r($habilitarRol);
echo "</pre>";