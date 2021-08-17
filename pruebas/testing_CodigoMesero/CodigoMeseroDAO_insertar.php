<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloCodigoMesero/CodigoMeseroDAO.php';

$registro['codMesId'] = 1;
$registro['codMesIdMesero'] = 1;
$registro['codMesCodigoMesero'] = 2201541;
$registro['codMesEstado'] = 1;
$registro['codMesSesion'] = null;
$registro['codMescreated_at'] = "2019-11-19 18:38:40";
$registro['codMesupdated_at'] = "2019-11-19 18:38:40";

$CodigoMesero = new CodigoMeseroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

$insertar = $CodigoMesero -> insertar($registro);


echo "<pre>";
print_r($insertar);
echo "</pre>";