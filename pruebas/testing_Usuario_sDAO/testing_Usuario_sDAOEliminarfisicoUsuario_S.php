<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloUsuario_s/Usuario_sDAO.php';

$sId=array(129);

$EliminarUsuario_s=new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$EliminarfisicoUsuario_s=$Usuario_s->eliminar($sId);

echo "<pre>";
print_r($EliminarfisicoUsuario_s);
echo "</pre>";