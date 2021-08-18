<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloRol/RolDAO.php';

$rolId = array(2);

<<<<<<< HEAD:pruebas/testing_RolDAO/testing_RolDAO_SeleccionarRol.php

$lRol=new LibroDAO(rolid, rolnombre, rolDescripcion, rolEstado,rolUsuSesion,rol_created_at,rol_update_at);

$SeleccionarRol=$Rol->seleccionarId($sId);
=======
$Rol = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
$SeleccionarRol = $Rol->seleccionarId($rolId);
>>>>>>> develop:pruebas/testing_RolDAO/testing_RolDAO_SeleccionarId.php

echo "<pre>";
print_r($SeleccionarRol);
echo "</pre>";
