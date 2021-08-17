<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloUsuario_s/Usuario_sDAO.php';

$usuId=array(15);

$Usuario_s=new Usuario_sDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

$EliminarfisicoUsuario_s=$Usuario_s->eliminar($usuId);

echo "<pre>";
print_r($EliminarfisicoUsuario_s);
echo "</pre>";