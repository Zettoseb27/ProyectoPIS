<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloUsuario_s/Usuario_sDAO.php';

$sId=array(258);

$habilitarUsuario_s=new Usuario_sDAO(usuId,usuLogin,usuPassaword,usuUsuSesion,usuEstado,usuRemember_token,usu_created_at,usu_updated_at);


$habilitarUsuario_s=$libros->habilitar($sId);

echo "<pre>";
print_r($habilitarUsuario_s);
echo "</pre>";