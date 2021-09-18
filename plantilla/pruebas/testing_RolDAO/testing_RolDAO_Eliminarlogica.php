<?php

include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloRol/RolDAO.php';

$sId=array(258);

$Rol=new RolDAO(rolid, rolnombre, rolDescripcion, rolEstado,rolUsuSesion,rol_created_at,rol_update_at);


$ElimnarlogicaRol=$Rol->EliminarLogico($sId);

echo "<pre>";
print_r($ElimnarlogicaRol);
echo "</pre>";