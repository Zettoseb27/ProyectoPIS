<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloUsuario_s/Usuario_sDAO.php';

$usuId=array(15);

<<<<<<< HEAD:pruebas/testing_Usuario_sDAO/testing_Usuario_sDAOEliminarfisicoUsuario_S.php
$EliminarUsuario_s=new LibroDAO(usuId,usuLogin,usuPassaword,usuUsuSesion,usuEstado,usuRemember_token,usu_created_at,usu_updated_at);
=======
$Usuario_s=new Usuario_sDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
>>>>>>> develop:pruebas/testing_Usuario_sDAO/testing_Usuario_sDAO_Eliminarfisico.php

$EliminarfisicoUsuario_s=$Usuario_s->eliminar($usuId);

echo "<pre>";
print_r($EliminarfisicoUsuario_s);
echo "</pre>";