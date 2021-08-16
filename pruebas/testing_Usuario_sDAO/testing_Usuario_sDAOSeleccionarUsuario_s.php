<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloUsuario_s/Usuario_sDAO.php';

$sId=array(5);


$Usuario_sSeleccionado=new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$Usuario_sSeleccionado=$Usuario_sSeleccionado->seleccionarId($sId);

echo "<pre>";
print_r($Usuario_sSeleccionado);
echo "</pre>";
