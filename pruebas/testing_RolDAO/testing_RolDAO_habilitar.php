<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloRol/RolDAO.php';

$sId=array(258);

$Rol=new RolDAO(rolid, rolnombre, rolDescripcion, rolEstado,rolUsuSesion,rol_created_at,rol_update_at);


$habiliatRol=$libros->habilitar($sId);

echo "<pre>";
print_r($habilitarRol);
echo "</pre>";