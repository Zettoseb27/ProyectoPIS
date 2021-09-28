<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloUsuario_s/Usuario_sDAO.php';

$usuId = array(2);


<<<<<<< HEAD:pruebas/testing_Usuario_sDAO/testing_Usuario_sDAOSeleccionarUsuario_s.php
$Usuario_sSeleccionado=new LibroDAO(usuId,usuLogin,usuPassaword,usuUsuSesion,usuEstado,usuRemember_token,usu_created_at,usu_updated_at);
=======
$Usuario_sSeleccionado = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
>>>>>>> develop:pruebas/testing_Usuario_sDAO/testing_Usuario_sDAOSeleccionarId.php

$Seleccionado= $Usuario_sSeleccionado-> seleccionarId($usuId);

echo "<pre>";
print_r($Seleccionado);
echo "</pre>";
