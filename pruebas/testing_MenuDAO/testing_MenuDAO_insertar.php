<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloMenu/MenuDAO.php';


$registro['menId'] = 1;
$registro['menIdPlato'] = 1;
$registro['menObservacion'] = "Muy caliente";
$registro['menEstado'] = 1;
$registro['menSesion'] = null;
$registro['menCreated_at'] = "2021-08-12 9:22:00";
$registro['menUpdated_at'] = "2021-08-12 9:22:00";


$menu = new MenuDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

$insertar = $menu -> insertar($registro);


echo "<pre>";
print_r($insertar);
echo "</pre>";