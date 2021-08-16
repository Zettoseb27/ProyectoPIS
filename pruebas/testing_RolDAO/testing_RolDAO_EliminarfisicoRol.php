<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloRol/LibroDAO.php';

$sId=array(129);

$Rol=new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$EliminarfisicoRol=$Rol->eliminar($sId);

echo "<pre>";
print_r($EliminarfisicoRol);
echo "</pre>";