<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloCocinero/CocineroDAO.php';


$registro['cocId'] = 5;
$registro['cocIdCocinero'] = 5;
$registro['cocCodigoCocinero'] = 1234567;
$registro['cocEstado'] = 1;
$registro['cocSesion'] = null;
$registro['cocCreated_at'] = "2018-06-06 15:02:04";
$registro['cocUpdated_at'] = "2018-06-06 15:02:04";


$cocinero = new CocineroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

$insertar = $cocinero -> insertar($registro);


echo "<pre>";
print_r($insertar);
echo "</pre>";