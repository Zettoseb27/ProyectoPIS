<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloUsuario_s/Usuario_sDAO.php';

$sId=array(5);


$Usuario_sSeleccionado=new LibroDAO(usuId,usuLogin,usuPassaword,usuUsuSesion,usuEstado,usuRemember_token,usu_created_at,usu_updated_at);

$Usuario_sSeleccionado=$Usuario_sSeleccionado->seleccionarId($sId);

echo "<pre>";
print_r($Usuario_sSeleccionado);
echo "</pre>";
