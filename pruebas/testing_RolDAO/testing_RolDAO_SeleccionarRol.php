<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloRol/RolDAO.php';

$sId=array(5);


$lRol=new LibroDAO(rolid, rolnombre, rolDescripcion, rolEstado,rolUsuSesion,rol_created_at,rol_update_at);

$SeleccionarRol=$Rol->seleccionarId($sId);

echo "<pre>";
print_r($SeleccionarRol);
echo "</pre>";
