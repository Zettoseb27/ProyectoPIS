<?php

include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloRol/RolDAO.php';

$sId=array(258);

$Rol=new RolDAO(usuId,usuLogin,usuPassaword,usuUsuSesion,usuEstado,usuRemember_token,usu_created_at,usu_updated_at);


$ElimnarlogicaRol=$Rol->EliminarLogico($sId);

echo "<pre>";
print_r($ElimnarlogicaRol);
echo "</pre>";