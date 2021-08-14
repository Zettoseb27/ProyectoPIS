<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloUsuariosRoles/UsuariosRolesDAO.php';



$registro['id_usuario_s'] = 8;
$registro['id_rol'] = 8;
$registro['fechaUserRol'] = "2019-10-29 18:52:17";
$registro['estado'] = 1;
$registro['usuRolUsuSesion'] = NULL;
$registro['created_at'] = "2019-10-29 18:52:17";
$registro['update_at'] = "2019-10-29 18:57:17";


$UsuariosRoles=new UsuariosRolesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

$insertar=$UsuariosRoles->insertar($registro);


echo "<pre>";
print_r($insertar);
echo "</pre>";