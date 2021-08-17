<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloUsuario_s/Usuario_sDAO.php';

$usuId = array(2);


$Usuario_sSeleccionado = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

$Seleccionado= $Usuario_sSeleccionado-> seleccionarId($usuId);

echo "<pre>";
print_r($Seleccionado);
echo "</pre>";
