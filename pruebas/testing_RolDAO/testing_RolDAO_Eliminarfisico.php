<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloRol/RolDAO.php';

$rolId = array(1);

<<<<<<< HEAD:pruebas/testing_RolDAO/testing_RolDAO_EliminarfisicoRol.php
$Rol=new RolDAO(rolid, rolnombre, rolDescripcion, rolEstado,rolUsuSesion,rol_created_at,rol_update_at);
=======
$Rol= new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
>>>>>>> develop:pruebas/testing_RolDAO/testing_RolDAO_Eliminarfisico.php

$EliminarfisicoRol = $Rol -> eliminar($rolId);

echo "<pre>";
print_r($EliminarfisicoRol);
echo "</pre>";